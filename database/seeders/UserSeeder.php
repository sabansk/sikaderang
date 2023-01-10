<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama_peserta' => Str::random(10),
            'asal_instansi' => Str::random(35),
            'dinas_magang' => Str::random(40),
            'email' => Str::random(10).'@gowakab.go.id',
            'password' => Hash::make("rahasiabangetloh"),
        ]);
    }
}
