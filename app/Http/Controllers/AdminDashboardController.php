<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function show(){
        return view('pages.AdminDashboard', ["title" => "Admin"]);
    }

}