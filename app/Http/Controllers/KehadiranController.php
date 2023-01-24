<?php

namespace App\Http\Controllers;
use App\Models\PostModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Storage;

class KehadiranController extends Controller
{
    public function input(){

        return view('pages.inputkehadiran',["title" => "Input Kehadiran"]);

    }

    public function store(Request $request){

    //    dd($request->all()); // ini buat ngecek data dari ajak yang dikirim ke controller apakah sudah masuk atau belum,
        // nanti data yang didapat sama ini dd request ditampilkan dalam bentuk json.

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

       $inputan = $request->all();
       $inputan["user_id"] = Auth::user()->id;


       $img = $request->foto_absensi;
        $folderPath = "uploads/";
        
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';
        
        $file = $folderPath . $fileName;
        Storage::disk('public')->put($file, $image_base64);

        $inputan["foto_absensi"] = $fileName; // bagaimana cara supaya tersimpan di public
        
        // dd('Image uploaded successfully: '.$fileName);


       $post = PostModel::create($inputan);

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
