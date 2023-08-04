<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Labtechinventory;
use App\Models\Stock;
use App\Models\Blooduse;
use App\Models\Bloodrequests;
use Illuminate\Support\Facades\Auth;
class LabtechinventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $pendingCount = Bloodrequests::where('status', 'Pending')->count();
        $stocks = Stock::all();
        $blood_uses = Blooduse::all();
    
        // Check if the user is a lab technician
        if ($user->isLabTechnician()) {
            $labTechnicianId = $user->id;
            $labtech_inventory = Labtechinventory::where('lab_technician_id', $labTechnicianId)->get();
        } else {
            // For other users (admin, blood bank manager), retrieve all lab technician inventory
            $labtech_inventory = Labtechinventory::all();
        }
    
        return view('backend.lab_inventory.index', compact('labtech_inventory', 'blood_uses', 'stocks', 'pendingCount'));
    }
    

    public function create()
    {
        $pendingCount = Bloodrequests::where('status', 'Pending')->count();
        $stocks = Stock::all();

        return view('backend.lab_inventory.create', compact('stocks', 'pendingCount'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'blood_group' => 'required',
            'available' => 'required',
        ]);

        Labtechinventory::create($request->all());

        return redirect('lab_inventory')->with('success', 'Stock Added Successfully');
    }

    public function edit(string $id)
    {
        $pendingCount = Bloodrequests::where('status', 'Pending')->count();
        $labtech_inventory = Labtechinventory::findOrFail($id);

        return view('backend.lab_inventory.edit', compact('labtech_inventory', 'pendingCount'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'blood_group' => 'required',
            'available' => 'required',
        ]);

        $labtech_inventory = Labtechinventory::findOrFail($id);
        $labtech_inventory->update($request->all());

         if ($doctor->status === 'Done') {
            $amount = $doctor->blood_unit;
            $bloodGroup = $doctor->blood_group;
            $labtechInventory = Labtechinventory::where('blood_group', $bloodGroup)->first();

            if ($labtechInventory) {
                $labtechInventory->decrementAvailable($amount);
                $labtechInventory->save();
            }
        }

        return redirect('lab_inventory')->with('success', 'Stock Updated Successfully');
    }

    public function destroy(string $id)
    {
        Labtechinventory::destroy($id);

        return redirect('lab_inventory')->with('warning', 'Blood group deleted');
    }
}
