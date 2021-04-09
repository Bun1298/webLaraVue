<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_user extends Model
{
    use HasFactory;

    protected $fillable=[
    	'nama_lengkap',
    	'password',
    	'email',
    	'alamat',
    	'status'
    ];
    public $timestamps=false;

}
