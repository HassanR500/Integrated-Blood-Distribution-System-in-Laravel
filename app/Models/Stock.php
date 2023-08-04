<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'stock';
    protected $fillable = ['blood_group','available'];
    public function donations()
    {
        return $this->hasMany('App\Models\Donation');
    }

    public function bloodType()
    {
        return $this->hasMany('Stock::class');
    }
 
  
}
