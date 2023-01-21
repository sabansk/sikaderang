<?php

namespace App\Http\Controllers;
use App\Models\PostModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class KehadiranController extends Controller
{
    public function input(){

        return view('pages.inputkehadiran',["title" => "Input Kehadiran"]);

    }

    public function store(Request $request){

        dd($request->all());

       $validator = Validator::make($request->all(), [

        'jenis_absen' => 'required',
        'jam' => 'required',
        'geoloc' => 'required',
        'foto_absensi' => 'required',
       ]);

       // ngecek validator kalo gagal
       if ($validator->fails()) {

        return response()->json($validator->errors(), 422);
       }

       $post = PostModel::create($validator);

       $post->save();

       //DB::table('posts')->insert($data);


       return response()->json([
        'success' => true,
        'message' => 'Absen berhasil direkap!',
        'data' => 'post'
       ]);
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
