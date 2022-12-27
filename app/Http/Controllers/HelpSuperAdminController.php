<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpSuperAdminController extends Controller
{
    public function show(){
        return view('pages.helpSuperAdmin', ["title" => "Help"]);
    }
}