<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens, HasFactory, Notifiable;

    public function hasRole($role)
    {
        return $this->roles()->where('name',$role)->exists();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'facility_serve',
        'role',
        'password',
        'user_image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function blood_requests()
    {
        return $this->hasMany(Bloodrequests::class, 'lab_technician_id');
    }
    public function blooduse(){
        return $this->hasMany(User::class,'lab_technician_id');
    }
    public function isAdmin()
{
    return $this->role === 'Admin';
}

public function isBloodBankManager()
{
    return $this->role === 'Blood Bank Manager';
}
public function isLabTechnician()
{
    return $this->role === 'LabTechnician';
}
public function labTechnician()
{
    return $this->belongsTo(User::class, 'lab_technician_id');
}

public function doctors()
{
    return $this->hasMany(Doctors::class, 'doctor_id');
}
public function facility()
    {
        return $this->belongsTo(Facilities::class, 'facility_id');
    }
}
