<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterAuthRequest;
use App\Models\Company;
use App\Models\UserPermission;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


class AuthController extends Controller
{
    public $loginAfterSignUp = false;

    public function register(RegisterAuthRequest $request)
    {
        $currentUser = Auth::user();
	    $user = new User();
	    $user->name = $request->name;
	    $user->email = $request->email;
	    $user->password = bcrypt($request->password);
	    $user->company_id = $request->company_id;
        $user->created_by = $currentUser->id;
	    $user->role_id = 3;
	    if(isset($request->is_owner) && (!empty($request->is_owner)) && ($request->is_owner == 1)){
		    $user->role_id = 2;
	    }
	    $user->save();
	    $permission = explode(',',$request->permission);
	    foreach ($permission as $p){
		    $userPermission['user_id'] = $user->id;
		    $userPermission['permission_id'] = $p;
		    $userPermission['created_at'] = Carbon::now();
		    $userPermission['updated_at'] = Carbon::now();
		    UserPermission::insert($userPermission);
	    }
	    return response()->json([
		    'success' => true,
	    ], 200);
    }

    public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        $jwt_token = null;
        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }

        return response()->json([
            'success' => true,
            'token' => $jwt_token,
        ]);
    }

    public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);

        try {
            JWTAuth::invalidate($request->token);

            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
    }

    public function getAuthUser(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);

        $user = JWTAuth::authenticate($request->token);

        return response()->json(['user' => $user]);
    }
}
