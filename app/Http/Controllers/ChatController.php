<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Labtechinventory;
use App\Models\Stock;
use App\Models\Blooduse;
use App\Models\Bloodrequests;
use Illuminate\Support\Facades\Auth;
class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $pendingCount = Bloodrequests::where('status', 'Pending')->count();
        $stocks = Stock::all();
    
        // Check if the user is a lab technician
        $labtech_inventory = Labtechinventory::with('labTechnician')->get();
    
        return view('backend.lab_inventory.index', compact('labtech_inventory', 'stocks', 'pendingCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
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
        //
    }
}
