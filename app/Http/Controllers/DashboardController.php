<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class DashboardController extends Controller
{
    public function index(){

        $title ="Dashboard";
        $title2 = "Kehadiran";




        return view('pages.dashboard',[
            "title" => $title,
            "title2" => $title2,
        ]);
    }
}