<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Bloodrequests;
use App\Models\Doctors;
use App\Models\User;
use App\Models\Labtechinventory;
use App\Models\Blooduse;
use Illuminate\Support\Facades\Auth;
use DB;

class DoctorController extends Controller
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
        $doctorId = auth()->user()->id;

        $facilityServe = auth()->user()->facility_serve;

        if (auth()->user()->role == 'Admin') {
            $labTechInstructions = Doctors::all();
        } else if (auth()->user()->role == 'LabTechnician') {
            $labTechInstructions = Doctors::join('users', 'doctors_info.doctor_id', '=', 'users.id')
                ->where('users.facility_serve', $facilityServe)
                ->get();
        } else if (auth()->user()->role == 'Doctor') {
            $labTechInstructions = Doctors::join('users', 'doctors_info.doctor_id', '=', 'users.id')
                ->where('users.facility_serve', $facilityServe)
                ->where('users.role', 'Doctor')
                ->get();
        }
        return view('backend.doctor.index', compact('labTechInstructions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $doctors = Doctors::all();
        return view('backend.doctor.create', compact('doctors','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'patient_name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'blood_group' => 'required',
            'blood_unit' => 'required',
            'ward_name' => 'required',
            'bed_no' => 'required',
            'diagnosis' => 'required',
        ]);
    
        $doctorId = auth()->user()->id;
        $doctorName = auth()->user()->name;
        $doctors = new Doctors($validatedData);
        $doctors->doctor_id = $doctorId;
        $doctors->doctor_name = $doctorName;
    
        // Retrieve the doctor's facility
        $facilityServe = auth()->user()->facility_serve;
        $doctors->save();
    
        // Use the with() method to flash data to the session for the redirect
        return redirect('doctor')->with([
            'success' => 'You have successfully created a new Instruction',
        ]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:Done,Not_done',
        ]);
    
        $doctor = Doctors::findOrFail($id);
        $doctor->status = $request->input('status');
        $doctor->save();
    
        if ($doctor->status === 'Done') {
            // Update lab technician inventory
            $amount = $doctor->blood_unit;
            $bloodGroup = $doctor->blood_group;
    
            $labtechInventory = Labtechinventory::where('blood_group', $bloodGroup)->first();
            if ($labtechInventory) {
                $labtechInventory->decrementAvailable($amount);
                $labtechInventory->save();
            }
        }
    
        return redirect('doctor')->with('message', 'Information Updated Successfully');
    }
    
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
