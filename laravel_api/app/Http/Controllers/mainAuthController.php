<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mainContact;
use App\Models\mainSubscriber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class mainAuthController extends Controller
{
    public function login(){
        return view('mainHome.auth.login')->with('hideFooter',true);
    }

    public function forgot_password(){
        return view('mainHome.auth.forgot-password')->with('hideFooter',true);
    }

    public function home(){
        return view('mainHome.pages.welcome');
    }

    public function about_us(){
        return view('mainHome.pages.about');
    }

    public function services(){
        return view('mainHome.pages.service');
    }

    public function pricing(){
        return view('mainHome.pages.pricing');
    }

    public function contact(){
        return view('mainHome.pages.contact');
    }

    public function send_mail_to_register(){
        return view('mainHome.auth.mail_toRegister')->with('hideFooter',true);
    }

    public function SubmitContact(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        mainContact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        return redirect()->back()->with('success','message sent , We\'ll reply to you soon');
    }

    public function submit_subscription_email(Request $request){
        
        try {
            $request->validate([
                'email' => 'required|email|unique:main_subscribers',
            ], [], [], 'subscription');
            
            mainSubscriber::create([
                'email' => $request->email,
            ]);
            
            return redirect()->back()->with(['success' => 'Subscription successful !']);

        } catch (ValidationException $e) {
            
            return redirect()->back()->with(['error' => $e->errors()['subscription']]);
        
        }

    }

    public function submit_login(Request $request){
        
        $request->validate([
            'username'=>'required|string',
            'password'=>'required|string',
        ],[
            'username.required' =>'',
            'password.required' =>''
        ]);

        if (Auth::guard('shareHolder')->attempt(['username' => $request->username, 'password' => $request->password])) {

            return redirect()->route('main.shareHolder.dashboard');

        }else{

            // Session::flash('error-message','Invalid Username or Password');
            return redirect()->back()->with('error','Invalid Username or Password ,try again !');

        }

    }

    public function logout(){

        // Check which guard is currently authenticated
        if (Auth::guard('shareHolder')->check()) {
            Auth::guard('shareHolder')->logout(); // Logout admin
        } 

        // Redirect to login form
        return redirect()->route('main.login.page');
        
    }

}
