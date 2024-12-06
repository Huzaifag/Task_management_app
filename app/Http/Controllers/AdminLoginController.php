<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminLoginController extends Controller
{
    # Admin login page
    function index(){
        return view('admin.login');
    }

    # Admin authenticate
    function authenticate(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validator->passes()){
            if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
                if(Auth::guard('admin')->user()->role != 'admin'){
                    Auth::guard('admin')->logout();
                    return redirect()
                    ->route('admin.login')
                    ->with('error','You are not authorized to access this page');
                }
                return redirect()
                ->route('admin.dashboard');
            }else{
                return redirect()
                ->route('admin.login')
                ->with('error','Either email or password field is invalid');
            }
        }else{
            return redirect()
            ->route('admin.login')
            ->withInput()
            ->withErrors($validator);
        }
    }

    # Admin logout
    function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'Logout successful');
    }
    # Admin dashboard
    function dashboard(){
        return view('admin.dashboard');
    }
}
