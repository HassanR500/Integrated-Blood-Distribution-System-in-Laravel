<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Doctors extends Model
{
    use HasFactory;
    protected $table = 'doctors_info';
    protected $primaryKey = 'id';
    protected $fillable = ['patient_name','gender','age','ward_name','bed_no','blood_group','blood_unit','diagnosis','doctor_name','doctor_id'];
    public function doctor()
    {
        return $this->BelongsTo(User::class, 'doctor_id'); 
    }
    public function labTechnicians()
    {
        return $this->BelongsTo(User::class, 'facility_serve');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}

