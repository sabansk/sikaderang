<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    public function input(){

        return view('pages.inputkehadiran',["title" => "Input Kehadiran"]);

        // $data = User::where('id',$id)->first();

        // return redirect('/kehadiran')->with('success', 'Submit Success!');
        // kalau disimpan di session nd perlu dipanggil, krn tersimpan di session dan nanti dipanggil di fungsi auth saja...
    }
}