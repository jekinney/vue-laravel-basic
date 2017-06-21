<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PasswordResetController extends Controller
{
    public function send(Request $request)
    {
    	// send reset link email
    }

    public function verify(Request $request)
    {
    	// verify reset token, return user data
    }

    public function update(Request $request)
    {
    	// reset password in users table, set set_password row to is_archived true
    }
}
