<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $table = 'blood_donation';
    protected $primaryKey = 'id';
    protected $fillable = ['donor_name','donor_address','donor_age','blood_group','amount_donated','date','stock_id'];

    
    public function stock()
    {
        return $this->belongsTo('App\Models\Stock');
    }
    public static function boot()
    {
        parent::boot();

        static::created(function ($blood_donation){
            $stock = Stock::where('blood_group',$blood_donation->blood_group)->first();
            $stock->increment('available',$blood_donation->amount_donated);
        });
    }
}
