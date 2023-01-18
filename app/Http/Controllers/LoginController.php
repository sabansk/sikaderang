<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index(){


        return view('pages.login', [
            "title" => "Log In"

        ]);
    }

    public function authenticate(Request $request){



        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->roles=='superAdmin') {
                return redirect()->intended('/superAdmin');
            }

            else if (Auth::user()->roles=='admin') {
                return redirect()->intended('/admin');
            }
            else {
                return redirect()->intended('/dashboard');
            }
           
            
        }

        return back()->with([
            'loginError' => 'Login failed!',
        ])->onlyInput('email');
    }

    public function logout() {

        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }
}