<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BloodRequestAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        $blood_requestId = $request->route('blood_requests');
        if($user->role === 'Admin' || $user->role === 'Blood Bank Manager')
        {
            return $next($request);
        }
        elseif($user->role === 'LabTechnician' || $user->role === 'Blood Bank Manager')
        {
            $blood_request = \App\Models\Bloodrequests::findOrFail($blood_requestId);

            if($blood_request->user_id === $user->id){
                return $next($request);
            }
        }
        abort(403, 'Unauthorized');
    }
}
