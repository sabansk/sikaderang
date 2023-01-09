<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;


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

    public function get()
    {
        $data = DB::table('users')
            ->select(DB::raw('count(*) as count, nama_peserta'))
            ->groupby('nama_peserta')
            ->get();
        return view('ini_view_dash', ['data' => $data]);
    }
}