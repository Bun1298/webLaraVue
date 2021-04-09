<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_alumni extends Model
{
    use HasFactory;

    protected $fillable=[
    	'nama',
    	'tahun_masuk',
    	'tahun_lulus',
    	'jurusan',
    	'tgl_lahir',
    	'alamat'
    ];
    public $timestamps=false;
}
