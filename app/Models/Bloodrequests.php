<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloodrequests extends Model
{
    use HasFactory;
    protected $table = 'blood_requests';
    protected $primaryKey = 'id';
    protected $fillable = ['place','blood_type','amount_needed','time_interval','technician_name','status','lab_technician_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function labTechnician()
    {
        return $this->belongsTo(User::class, 'lab_technician_id'); 
    }
    
    public static function boot()
    {
        parent::boot();

        static::updated(function ($blood_requests){
         

            if($blood_requests->isDirty('status') && $blood_requests->status === 'Accepted'){
                $requestedAmount = $blood_requests->amount_needed;
                    $stock = Stock::where('blood_group',$blood_requests->blood_type)->first();

                if($stock) {

                    if ($requestedAmount <= $stock->available) {
                        $stock->decrement('available', $requestedAmount);
        
                        // Find the lab technician's inventory
                        $labtech_inventory = Labtechinventory::where('lab_technician_id', $blood_requests->lab_technician_id)
                            ->where('blood_group', $blood_requests->blood_type)
                            ->first();
        
                        if ($labtech_inventory) {
                            $labtech_inventory->increment('available', $requestedAmount);
                        } else {
                            // Create a new lab technician's inventory entry if it doesn't exist
                            $labtech_inventory = new Labtechinventory();
                            $labtech_inventory->blood_group = $blood_requests->blood_type;
                            $labtech_inventory->available = $requestedAmount;
                            $labtech_inventory->lab_technician_id = $blood_requests->lab_technician_id;
                            $labtech_inventory->save();
                        }
                    } else {
                        $blood_requests->status = 'Pending';
                        $blood_requests->save();
                    }

                }
                
            }
        });
    }
}
