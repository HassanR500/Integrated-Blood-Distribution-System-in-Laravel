<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bloodrequests;
use App\Models\Donation;
use App\Models\Stock;
use App\Models\User;
Use App\Models\Bookcategory;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewRequestNotification;
use App\Models\Labtechinventory;
use App\Models\Blooduse;
use App\Models\Doctors;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userCount = User::where('role', '<>', 'Admin')->count();
        $userCountManager = User::where('role', 'Blood Bank Manager')->count();
        $userCountLabtech = User::where('role', 'LabTechnician')->count();
        $userCountDoctor = User::where('role', 'Doctor')->count();
        $user = Auth::user();
        $pendingCount = Bloodrequests::where('status','Pending')->count();
        session(['pendingCount' => $pendingCount]);

        //Donations
        $blood_donation = Donation::all();
        $blood_donationgraph = Donation::groupBy('blood_group')
        ->select('blood_group', DB::raw('SUM(amount_donated) as total_amount_donated'))
        ->get();

        //requests
        if ($user->isAdmin() || $user->isBloodBankManager()) {
            $blood_requests = Bloodrequests::all();
            $blood_requestscounted = Bloodrequests::groupBy('blood_type')
                ->select('blood_type', DB::raw('SUM(amount_needed) as total_amount_needed'))
                ->get();
        } else {
            $blood_requests = $user->blood_requests;
            $blood_requestscounted = $user->blood_requests()
                ->groupBy('blood_type')
                ->select('blood_type', DB::raw('SUM(amount_needed) as total_amount_needed'))
                ->get();
        }
    


            $isNewRequestReceived = true;
        //requests-facility
        
        $blood_requestscounted_facility = Bloodrequests::groupBy('place')
        ->select('place', DB::raw('SUM(amount_needed) as total_amount_needed'))
        ->get();

        
        

        //Stocks
        $stocks = Stock::sum('available');
        $stockcounted = Stock::all();

        $labTechnicianId = $user->id;

    // Fetch lab technician inventory data for the current lab technician
        $labtech_inventory = Labtechinventory::where('lab_technician_id', $labTechnicianId)->get();

    // Calculate the total available inventory for the current lab technician
    $lab_inventory = $labtech_inventory->sum('available');

    // Fetch lab technician inventory data for each blood group for the current lab technician
    $labtech_inventory_facility = Labtechinventory::where('lab_technician_id', $labTechnicianId)
    ->groupBy('blood_group')
    ->select('blood_group', DB::raw('SUM(available) as total_available'))
    ->get();


        $labTechnicianId = $user->id;
        // Fetch blood use data for the current lab technician
        $blooduse = Blooduse::where('lab_technician_id', $labTechnicianId)->get();

        // Calculate the total amount used for the current lab technician
        $bloodused = $blooduse->sum('amount_used');

        // Fetch blood use data for each blood group for the current lab technician
        $labtech_blooduse_facility = Blooduse::where('lab_technician_id', $labTechnicianId)
            ->groupBy('blood_group')
            ->select('blood_group', DB::raw('SUM(amount_used) as total_amount_used'))
            ->get();

        // Fetch order data for each blood group for the current Doctor
        $doctorID = $user->id;
        $doctor_instruction = Doctors::where('doctor_id', $doctorID)
        ->groupBy('blood_group')
        ->select('blood_group', DB::raw('SUM(blood_unit) as total_blood_unit'))
        ->get();

        $bloodInstCount = Doctors::where('doctor_id', $doctorID)->get();
        
        return view('home', compact('blood_donation','blood_donationgraph','blood_requests','blood_requestscounted','blood_requestscounted_facility','stocks','stockcounted','isNewRequestReceived','labtech_inventory','blooduse','lab_inventory','bloodused','labtech_inventory_facility','labtech_blooduse_facility','pendingCount','doctor_instruction','bloodInstCount','userCount','userCountManager','userCountLabtech','userCountDoctor'));
    }
  
}
