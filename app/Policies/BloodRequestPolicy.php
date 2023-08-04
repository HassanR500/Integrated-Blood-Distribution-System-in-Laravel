<?php

namespace App\Policies;

use App\Models\Bloodrequests;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BloodRequestPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Bloodrequests $blood_requests)
    {
        if($user->role == 'Admin' || $user->role == 'Blood Bank Manager' ){
            return true;
        }
        
        elseif($user->role == 'LabTechnician'){
            return $user->id == $blood_requests->user_id;
        }
        else{
            return false;
        }
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Bloodrequests $bloodrequests): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Bloodrequests $bloodrequests): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Bloodrequests $bloodrequests): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Bloodrequests $bloodrequests): bool
    {
        //
    }
}
