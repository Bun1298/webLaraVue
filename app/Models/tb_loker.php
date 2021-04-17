<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_loker extends Model
{
    use HasFactory;

    protected $fillable=[
    	'title_loker',
    	'job_des',
    	'overview',
    	'additional_info',
    	'kontak',
		'uid_alumni',
		'status'
    ];
    public $timestamps=false;

}
