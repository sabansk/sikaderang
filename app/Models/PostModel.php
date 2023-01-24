<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = [

        'jenis_absensi',
        'jam',
        'foto_absensi',
       'geoloc',
    ];
    protected $table = 'posts';

    public $timestamps = false;




}