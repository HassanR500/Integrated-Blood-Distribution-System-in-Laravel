<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Notification;
use App\Events\RequestCreated;
use App\Notifications\NewRequestNotification;
use App\Models\Bloodrequests;
use App\Models\User;
use App\Models\Stock;
use DB;

class BloodrequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */

     public function index()
{

    $user = Auth::user();
    $pendingCount = Bloodrequests::where('status', 'Pending')->count();
    session(['pendingCount' => $pendingCount]);


    // Check if the user is an admin or blood bank manager
    if ($user->isAdmin() || $user->isBloodBankManager()) {
        $blood_requests = Bloodrequests::orderBy('created_at', 'desc')->get();

        $stocks = Stock::all();

        return view('backend.blood_requests.index', compact('blood_requests', 'stocks', 'pendingCount'));
    }


    // For lab technicians, retrieve their specific blood requests and count
    $labTechnician = $user; // Assign the logged-in user directly to the lab technician variable
    $blood_requests = $labTechnician->blood_requests()->orderBy('created_at', 'desc')->get();

    $bloodRequestCount = $labTechnician->blood_requests()->count(); // Get the count of blood requests for the lab technician
    $stocks = Stock::all();


    return view('backend.blood_requests.index', compact('blood_requests', 'stocks', 'pendingCount', 'bloodRequestCount'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $labTechnicians = User::where('role','LabTechnician')->get();

        $pendingCount = Bloodrequests::where('status','Pending')->count();
        session(['pendingCount' => $pendingCount]);
        return view('backend.blood_requests.create',compact('pendingCount','labTechnicians'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'lab_technician_id' => 'required|exists:users,id',
            'place' => 'required',
            'blood_type' => 'required',
            'amount_needed' => 'required|integer',
            'time_interval' => 'required',
            'technician_name' => 'required',

        ]);
        $validatedData['lab_technician_id'] = $request->input('lab_technician_id');
        $requestData = Bloodrequests::create($validatedData);
        $stock = Stock::where('blood_group', $requestData->blood_type)->first();

        if($stock && $stock->available < $requestData->amount_needed)
        {
            $requestData->status = 'Rejected';
            $requestData->save();

            return redirect('blood_requests')->with('message','Insufficient Stock available. Your request has been rejected');
        }
        $requestData->status = 'Pending';
        $requestData->save();

        $bloodbankmanager = User::where('role','Blood Bank Manager')->get();

        return redirect('blood_requests')->with('message','Your request has been sent Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blood_requests = Bloodrequests::find($id);
        return view('backend.blood_requests.show',compact('blood_requests'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $stocks = Stock::all();

        $blood_requests = Bloodrequests::find($id);
        return view('backend.blood_requests.edit',compact('blood_requests','stocks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blood_requests = Bloodrequests::findorFail($id);
        $input = $request->all();
        $blood_requests->update($input);

        $blood_requests->status = $request->input('status');

        $blood_requests->save();

        return redirect('blood_requests')->with('message','Request Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delrequest = Bloodrequests::find($id);
        $delrequest->delete();

        return redirect('blood_requests')->with('message',$delrequest->amount_needed.' Litres of blood group '. $delrequest->blood_type. ' has been deleted');


    }

    public function acceptAll(Request $request)
   {
    $notAcceptedRequestsCount = Bloodrequests::where('status', '!=', 'Accepted')->count();
    if($notAcceptedRequestsCount > 0)
    {
        Bloodrequests::where('status', '!=', 'Accepted')->update(['status' => 'Accepted']);
        return redirect('blood_requests')->with('success','All requests have been Accepted');
    }
    else{
        return redirect()->back()->with('message','No request to Accept');
    }

   }

   public function deleteAll()
   {
    Bloodrequests::truncate();
    return redirect('blood_requests')->with('message','All requests have been deleted');
   }
}
