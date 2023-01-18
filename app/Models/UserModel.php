<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_peserta', 'asal_instansi', 'dinas_magang'
    ];

    protected $table = 'users';
}
