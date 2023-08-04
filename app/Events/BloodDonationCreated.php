<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use App\Models\Donation;

class BloodDonationCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $blood_donation;

    /**
     * Create a new event instance.
     * 
     * @param \App\Models\Donation $blood_donation
     * @return void
     */
    public function __construct(Donation $blood_donation)
    {
        $this->blood_donation = $blood_donation;
    }

    
}
