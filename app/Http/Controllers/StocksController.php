<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Bloodrequests;
use App\Models\Donation;

class StocksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pendingCount = Bloodrequests::where('status', 'Pending')->count();
        $stocks = Stock::all();
        $blood_donation = Donation::all();
        $blood_requests = Bloodrequests::all();

        return view('backend.stocks.index', compact('stocks', 'blood_donation', 'blood_requests', 'pendingCount'));
    }

    public function create()
    {
        $pendingCount = Bloodrequests::where('status', 'Pending')->count();
        $stocks = Stock::all();
        $blood_donation = Donation::all();

        return view('backend.stocks.create', compact('stocks', 'blood_donation', 'pendingCount'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'blood_group' => 'required',
            'available' => 'required',
        ]);

        Stock::create($request->all());

        return redirect('stocks')->with('message', 'Stock Added Successfully');
    }

    public function edit(string $id)
    {
        $pendingCount = Bloodrequests::where('status', 'Pending')->count();
        $stocks = Stock::findOrFail($id);

        return view('backend.stocks.edit', compact('stocks', 'pendingCount'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'blood_group' => 'required',
            'available' => 'required',
        ]);

        $stocks = Stock::findOrFail($id);
        $stocks->update($request->all());

        return redirect('stocks')->with('message', 'Stock Updated Successfully');
    }

    public function destroy(string $id)
    {
        $delstocks = Stock::findOrFail($id);
        $delstocks->delete();

        return redirect('stocks')->with('message', $delstocks->available . ' of blood group ' . $delstocks->blood_group . ' has been reduced from stock');
    }
}
