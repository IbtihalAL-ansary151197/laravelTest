<?php

namespace App\Http\Controllers\user\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function login()
    {
          return view('auth.login');
    }

    public function handleLogin(Request $request)
    
    {

        $this->validate($request, [
    'email'=> ['bail', 'required' , 'string', 'email'],
    'password'=> ['bail', 'required' , 'string' ],
    

        ]); 

        $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password ?? "" ) || $user->is_admin){

           return redirect()->back()->withErrors(['email'=> 'information not correct']);

        }

        // save user in session 
        Auth::login($user);
        return redirect()->route('login.user');



    }
}
