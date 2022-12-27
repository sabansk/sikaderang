<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpAdminController extends Controller
{
    public function show(){
        return view('pages.helpAdmin', ["title" => "Help"]);
    }
}