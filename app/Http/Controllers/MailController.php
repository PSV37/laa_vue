<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

class MailController extends Controller
{
    public function ForgotEmail($email, $token) {
        try{
            return view('auth.passwords.reset',['token'=>$token]);
        } catch(Exception $e) {

        }
    }
}
