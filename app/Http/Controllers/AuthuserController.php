<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
use Session;
use Auth;
use DB;
use App\User;

class AuthuserController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user_login = new User;
        $user_login->email = $request->email;
        $user_login->password = $request->password;

        if (Auth::attempt(['email' => $user_login->email, 'password' =>  $user_login->password])) {
            return response()->json([
                'status' => 'Authorize User',
                'data' => $user_login,
            ]);
        } else {
            throw ValidationException::withMessages([
                'email' => [trans('auth.failed')],
            ]);
            return response()->json([
                'status' => 'Unauthorize User',
                'data' => $user_login,
            ]);
        }
    }
}
