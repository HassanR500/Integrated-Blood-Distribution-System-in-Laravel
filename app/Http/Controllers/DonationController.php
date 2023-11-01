<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Bloodrequests;
use App\Models\Donation;
use App\Events\BloodDonationCreated;
use App\Models\Stock;
use DB;
class DonationController extends Controller
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
        $pendingCount = Bloodrequests::where('status','Pending')->count();
        session(['pendingCount' => $pendingCount]);
        $blood_donation = Donation::all();

        return view('backend.blood_donation.index',compact('blood_donation','pendingCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $pendingCount = Bloodrequests::where('status','Pending')->count();
        session(['pendingCount' => $pendingCount]);
        $blood_donation = Donation::all();
        $stocks = Stock::all();
        return view('backend.blood_donation.create', compact('blood_donation','stocks','pendingCount'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'donor_name' => 'required',
            'donor_address' => 'required',
            'donor_age' => 'required',
            'blood_group' => 'required',
            'amount_donated' => 'required',
            'date' => 'required'
        ]);



        $blood_donation = new Donation();
        $blood_donation->stock_id = $request-> stock_id;
        $blood_donation->donor_name = $request->input('donor_name');
        $blood_donation->donor_address = $request->input('donor_address');
        $blood_donation->donor_age = $request->input('donor_age');
        $blood_donation->blood_group = $request->input('blood_group');
        $blood_donation->amount_donated = $request->input('amount_donated');
        $blood_donation->date = $request->input('date');
        $blood_donation->save();

        event(new BloodDonationCreated($blood_donation));

        return redirect('blood_donation')->with('message','Donor Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $pendingCount = Bloodrequests::where('status','Pending')->count();
        session(['pendingCount' => $pendingCount]);
        $blood_donation = Donation::find($id);
        return view('backend.blood_donation.show',compact('blood_donation','pendingCount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pendingCount = Bloodrequests::where('status','Pending')->count();
        session(['pendingCount' => $pendingCount]);
        $blood_donation = Donation::find($id);
        $stocks = Stock::all();
        return view('backend.blood_donation.edit',compact('blood_donation','stocks','pendingCount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blood_donation = Donation::find($id);
        $blood_donation->stock_id = $request-> stock_id;
        $input = $request->all();
        $blood_donation->update($input);
        return redirect('blood_donation')->with('message','Donor Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deldonor = Donation::find($id);
        $deldonor->delete();

        return redirect('blood_donation')->with('message',$deldonor->donor_name.' of blood group '. $deldonor->blood_group. ' is no longer a donor');
    }
}
