<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Auth;

class AuthController extends Controller
{
    //
    public function getSignUp(){
        return view('signup');
    }
    public function postSignUp(Request  $request){
       $this -> validate($request,[
           "email" =>'required|unique:users|email|max:255',
           "password" =>'required|min:6',
       ]);
       User::create([
           'email' => $request -> input('email'),
               'password' =>bcrypt($request -> input('password')),
           ]
       );
       return redirect()
           -> route('home')
           -> with('info','Welcome ');
    }

    public function getSignIn(){
        return view('signIn');
    }
    public function postSignIn(Request $request){
        $this -> validate($request,[
            "email" =>'required|max:255',
            "password" =>'required|min:6',
        ]);

        if(!Auth::attempt($request->only(['email','password']),$request->has('remember'))){
            return redirect()->back()->with('info', 'Incorrect login or password');
        }
        return redirect()->route('home')->with('message', 'Success sign in');
    }

    public function getSignOut(){
        Auth::logout();
        return redirect()->route('home');
    }
}
