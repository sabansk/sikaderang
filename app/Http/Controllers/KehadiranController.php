<?php

namespace App\Http\Controllers;
use App\Models\PostModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KehadiranController extends Controller
{
    public function input(){

        return view('pages.inputkehadiran',["title" => "Input Kehadiran"]);

    }

    public function store(Request $request){

        $this->validate($request, [
            'jenisabsen' => 'required',
        ]);
            //PostModel::create();
            dd(request->all());

           // return redirect('/dashboard');
    }


}

/*
[
                //'id' => $id,
                'nama_peserta' => Str::random(10),
                'asal_instansi' => Str::random(35),
                'dinas_magang' => Str::random(40),
                'jenis_absensi' => $request->jenisabsen, // yang sblh kiri sesuaikan dgn nama field di tabel DB
                'jam' => $request->waktu_absen,
                //'foto_absensi' => $request->foto_absen,
                //'geoloc' => $request->lokasi_absen,
            ]
*/
