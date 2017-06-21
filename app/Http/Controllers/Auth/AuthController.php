<?php

namespace App\Http\Controllers\Auth;

use App\Users\User;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginForm;
use App\Users\Collections\UserDetails;
use App\Http\Requests\Auth\RegisterForm;
use Tymon\JSTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
	protected $auth; 

    public function __construct(JWTAuth $auth)
    {
    	$this->auth = $auth;
    }

    public function register(RegisterForm $request)
    {
	    $user = User::create([
            'customer_id' => $request->customer_id,
	    	'name' => $request->name,
	    	'email' => $request->email,
	    	'password' => $request->password,
	    ]);

	    $token = $this->auth->attempt($request->only('email', 'password'));

	    return response()->json([
	    	'user' => $user,
	    	'meta' => [
	    		'token' => $token,
	    	],
	    ]);
    }

    public function login(LoginForm $request) 
    {
    	try {
    		if(!$token = $this->auth->attempt($request->only('email', 'password'))) {
    			return response()->json([
    				'errors' => [
    					'root' => 'Could not sign you in with those details.',
    				]
    			], 401);
    		}
    	} catch (JWTException $e) {
    		return response()->json([
    			'errors' => [
    				'root' => 'Could not sign you in with those details.',
    			]
    		], $e->getStatusCode());
    	}

    	return response()->json([
	    	'user' => $request->user(),
	    	'meta' => [
	    		'token' => $token,
	    	],
	    ]);
    }

    public function logout()
    {
    	$this->auth->invalidate($this->auth->getToken());

    	return response(null, 200);
    }

    public function user(Request $request, UserDetails $details)
    {
    	return response()->json([
	    	'user' => $details->format($request->user())
	    ]);
    }
}
