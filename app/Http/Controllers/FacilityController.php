<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\Bloodrequests;
use App\Models\Facilities;
use App\Models\Stock;
class FacilityController extends Controller
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
        $blood_requests = Bloodrequests::all();
        $facility_need = Facilities::all();
        $stocks = Stock::all();
        return view('backend.facilities.index',compact('blood_requests','stocks','facility_need','pendingCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pendingCount = Bloodrequests::where('status','Pending')->count();
        session(['pendingCount' => $pendingCount]);
        return view('backend.facilities.create',compact('pendingCount'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'facility_name' => 'required',
            'population' => 'required',
            'location' => 'required',
        ]);
        Facilities::create($request->all());
        return redirect('facilities')->with('message', 'Facility created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pendingCount = Bloodrequests::where('status', 'Pending')->count();
        $facility = Facilities::findOrFail($id);

        return view('backend.facilities.edit', compact('facility', 'pendingCount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'facility_name' => 'required',
            'population' => 'required',
            'location' => 'required',
        ]);
        $facility = Facilities::findOrFail($id);
        $facility->update($request->all());
        return redirect('facilities')->with('message', 'Facility Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delfacility = Facilities::find($id);
        $delfacility->delete();
        return redirect('facilities')->with('message', 'Facility Deleted Successfully');
    }
}
