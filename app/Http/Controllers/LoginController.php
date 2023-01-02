<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function input(){
        return view('pages.login', ["title" => "Log In"]);
    }

    public function store(Request $request){
        return $request()->all;
    }
}