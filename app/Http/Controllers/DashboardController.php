<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class DashboardController extends Controller
{
    public function show(){

        $title ="Dashboard";
        $title2 = "Total Kehadiran";




        return view('pages.dashboard',[
            "title" => $title,
            "title2" => $title2,
        ]);
    }
}