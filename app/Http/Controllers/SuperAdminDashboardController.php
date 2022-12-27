<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminDashboardController extends Controller
{
    public function index(){
        return view('pages.SuperAdminDashboard', ["title" => "Super Admin"]);
    }

}