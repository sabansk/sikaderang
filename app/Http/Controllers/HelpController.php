<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function show(){
        return view('pages.help', ["title" => "Help"]);
    }
}
