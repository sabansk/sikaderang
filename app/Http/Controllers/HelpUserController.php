<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpUserController extends Controller
{
    public function show(){
        return view('pages.helpUser', ["title" => "Help"]);
    }
}