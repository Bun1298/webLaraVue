<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TbJurusanController;
use App\Http\Controllers\TbAlumniController;
use App\Http\Controllers\TbLokerController;
use App\Http\Controllers\TbUserController;
use App\Models\tb_loker;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('api')->group(function(){
	Route::resource('jurusans', TbJurusanController::class);
	Route::resource('alumnis',TbAlumniController::class);
	Route::resource('lokers',TbLokerController::class);
	Route::resource('users',TbUserController::class);
	// Route::get('http://localhost:8000/login');
	// Route::get('/detail_loker/{id}',function($id){
	// 	$data = tb_loker::find($id);
	// 	return response()->json($data);
	// });
});