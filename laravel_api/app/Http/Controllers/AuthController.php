<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login_form(){
        return view('auth.login');
    }

    public function forgotpswd_form(){
        return view('auth.forgotPassword');
    }

    //todo: admin login functionality
    public function login_functionality(Request $request){
        $request->validate([
            'username'=>'required|string',
            'password'=>'required|string',
        ]);

        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            // return redirect()->route('dashboard');
            return redirect()->with('success_login','Admin login well');
        }elseif (Auth::guard('user')->attempt(['username' => $request->username, 'password' => $request->password])) {
            // return redirect()->route('user_dashboard');
            return redirect()->with('success_login','User login well');
        }else{
            Session::flash('error-message','Invalid Email or Password');
            return back();
        }

    }

    
}