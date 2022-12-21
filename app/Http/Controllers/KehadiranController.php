<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    public function index(){
        return view('pages.inputkehadiran',["title" => "Input Kehadiran"]);
    }
}
