<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blooduse extends Model
{
    use HasFactory;
    protected $table = 'blood_uses';
    protected $primaryKey = 'id';
    protected $fillable = ['patient_name','blood_group','amount_used','place','date','age','gender','doctor','lab_technician_id'];

    public function labtechInventory(){
        return $this->belongsTo(Labtechinventory::class);
    }

    public function labTechnician()
    {
        return $this->belongsTo(User::class, 'lab_technician_id'); 
    }

}
