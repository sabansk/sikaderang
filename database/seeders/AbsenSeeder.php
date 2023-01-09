<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AbsenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentDateTime = date('Y-m-d H:i:s');
        $nama_peserta = DB::table('users')
            ->where('nama_peserta')->get();
        $asal_instansi = DB::table('users')
            ->where('asal_instansi')->get();
        $dinas_magang = DB::table('users')
            ->where('dinas_magang')->get();


        DB::table('posts')->insert([
            'nama_peserta' => $nama_peserta,
            'asal_instansi' => $asal_instansi,
            'dinas_magang' => $dinas_magang,
            'jenis_absensi' => Str::random(4),
            'jam' => $currentDateTime,
            'foto_absensi' => Str::random(9),
            'geoloc' => Str::random(20),
        ]);
    }
}
