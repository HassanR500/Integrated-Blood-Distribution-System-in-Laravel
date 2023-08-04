<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Labtechinventory extends Model
{
    use HasFactory;
    protected $table = 'labtech_inventory';
    protected $primaryKey = 'id';
    protected $fillable = ['blood_group','available'];

    public function bloodUses()
    {
        return $this->hasMany(Blooduse::class);
    }
    public function labTechnician()
    {
        return $this->belongsTo(User::class, 'lab_technician_id');
    }
    public function decrementAvailable($amount)
    {
        $this->decrement('available', $amount);
    }
    
}
