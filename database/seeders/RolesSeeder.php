<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role_name' => 'SuperAdmin',
            'role_name_in_lower' => 'superadmin',
        ]);

        DB::table('roles')->insert([
            'role_name' => 'Admin',
            'role_name_in_lower' => 'admin',
        ]);

        DB::table('roles')->insert([
            'role_name' => 'User',
            'role_name_in_lower' => 'user',
        ]);
    }
}

// jadi disini adalah seeder untuk membuat tabel roles 
// yang bertujuan untuk membedakan akun user dan admin 
// menggunakan 'role_id'. Tapi kok BindingResolutionException
// terus?
