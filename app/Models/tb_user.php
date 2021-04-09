<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_user extends Model
{
    use HasFactory;

    protected $fillable=[
    	'username',
    	'email',
    	'password',
    	'jurusan',
    	'status',
        'nama',
        'tahun_masuk',
        'tahun_lulus',
        'tgl_lahir',
        'no_hp',
        'created_at',
        'updated_at'
    ];
    // public $timestamps = true;
}
