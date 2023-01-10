<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index() 
    {
        $posts = Post::latest()->get();

        return view('posts', compact('posts'));
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
                'jenis_absensi' => 'required',
                'jam' => 'required',
                'geoloc' => 'required',
                'foto_absensi' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $post = Post::create([
            'jenis_absensi' => $request->jenis_absensi,
            'jam' => $request->jam,
            'geoloc' => $request->geoloc,
            'foto_absensi' => $request->foto_absensi
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Absen berhasil direkap.'
        ]);
    }
}
