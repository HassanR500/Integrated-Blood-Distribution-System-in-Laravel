<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Blooduse;
use App\Models\Labtechinventory;
use App\Models\User;

class BloodusesController extends Controller
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
    $labTechnicianId = auth()->user()->id;
    $blood_uses = Blooduse::where('lab_technician_id', $labTechnicianId)->get();

    $labTechnicians = User::where('role', 'LabTechnician')->get();

    return view('backend.blooduse.index', compact('blood_uses', 'labTechnicians'));
}


    public function create()
    {
        $labTechnicians = User::where('role','LabTechnician')->get();

        $blood_uses = Blooduse::all();
        $labtech_inventory = Labtechinventory::all();
        return view('backend.blooduse.create', compact('blood_uses','labtech_inventory','labTechnicians'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'lab_technician_id' => 'required|exists:users,id',
        'patient_name' => 'required',
        'blood_group' => 'required',
        'amount_used' => 'required',
        'place' => 'required',
        'date' => 'required',
        'age' => 'required',
        'gender' => 'required',
        'doctor' => 'required'
    ]);

    $labTechnicianId = $request->input('lab_technician_id');
    $bloodgp = $request->input('blood_group');
    $amtused = $request->input('amount_used');

    $labtech = Labtechinventory::where('blood_group', $bloodgp)->firstOrFail();
    $labtech->decrement('available', $amtused);

    $blooduse = new Blooduse($validatedData);
    $blooduse->lab_technician_id = $labTechnicianId;
    $blooduse->save();

    return redirect('blooduse')->with('success', 'You have successfully created a new patient');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $pat_name = Blooduse::find($id);
        $pat_name->delete();
        
        return redirect('blooduse')->with('warning',$pat_name->patient_name.' has been deleted');
    }
}
