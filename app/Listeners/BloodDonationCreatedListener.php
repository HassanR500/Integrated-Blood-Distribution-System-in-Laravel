<?php

namespace App\Listeners;


use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\BloodDonationCreated;
use App\Models\Stock;
class BloodDonationCreatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BloodDonationCreated $event)
    {
        $blood_donation = $event->blood_donation;
        
 
        Stock::where('blood_group',$blood_donation->blood_group)
        ->increment('available',$blood_donation->amount_donated);
    }
}
