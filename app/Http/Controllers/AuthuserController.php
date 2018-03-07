<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
use Session;
use Log;
use Auth;
use DB;
use App\User;
use Mail;
use App\Mail\forgotEmail;

class AuthuserController extends Controller
{   
     /**
     * Custorm Login
     *
     * @return response 
     */
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
        } //End if-else
    } //End Function

    /**
     * Create Custorm Forgot Email
     *
     * @return string response
     */
    public function Forgot(Request $request)
    {
        try{
            $forgot_email = $request->email;
            $getuser = User::where(['email'=> $forgot_email])->first();
            $userMail = $this->sendForgotEmail($getuser);
            if($userMail) {
                return response()->json([
                    'status' => true,
                    'data' => $getuser,
                ]);
            } //End if
        } catch(Exception $e) {

        } //End Try-Catch
    } //End Function


    /**
     * Send Forgot Mail To Email
     *
     * @return success
     */
    private function sendForgotEmail($user)
    {
        try{
            Mail::to($user['email'])->send(new forgotEmail($user));
        } catch(Exception $e) {

        } //End Try-Catch
    }
} //End Class
