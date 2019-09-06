<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class CheckIsAdminUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role = 1)
    {
	    if (Auth::user()) {

		    if(Auth::user()->role_id == 1 ) {
			    return $next($request);
		    }else{
			    return response()->json(['status' => 200,'message' => 'You dont have permission to access url'],200);
		    }
	    }else{
		    Auth::guard()->logout();
		    $request->session()->invalidate();
		    return response()->json(['status' => 200,'message' => 'Please login.'],200);
	    }

    }
}
