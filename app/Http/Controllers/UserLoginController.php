<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserLoginController extends Controller
{
    # Login page
    public function login()
    {
        return view('users.login');
    }

    # Authenticate user
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                return redirect()->route('users.dashboard');
            }else{
                return redirect()->back()->with('error', 'Invalid credentials');
            }
        }
    }

    # Register page
    public function register()
    {
        return view('users.register');
    }

    # Process register
    public function processRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('users.login')->with('success', 'Registration successful');
        }
    }

    # Logout user
    public function logout()
    {
        Auth::logout();
        return redirect()->route('users.login')->with('success', 'Logout successful');
    }

    # Dashboard page
    public function dashboard()
    {
        return view('users.dashboard');
    }
}
