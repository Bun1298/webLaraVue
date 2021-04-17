<?php

namespace App\Http\Controllers;

use App\Models\tb_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TbUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = tb_user::all();
        return ("User terverifikasi");
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = new tb_user([
            'username' => $request -> input('username'),
            'email' => $request -> input('email'),
            'password' => $request -> input('password'),
            'jurusan' => $request -> input('jurusan'),
            'status' => $request -> input('status'),
            'nama' => $request -> input('nama'),
            'tahun_masuk' => $request -> input('tahun_masuk'),
            'tahun_lulus' => $request -> input('tahun_lulus'),
            'tgl_lahir' => $request -> input('date'),
            'no_hp' => $request -> input('no_hp'),
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]);
        $data->save();

        return response()->json("user telah berhasil ditambah");
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tb_user  $tb_user
     * @return \Illuminate\Http\Response
     */
    public function scopeGetLogin(Request $request){
        $error = "";
        $email = $request->input('email');
        $password = $request->input('password');
        $result = DB::select('select id,status from tb_users where email = :email and password =:password',['email'=>$email,'password'=>$password]);
        if($result != null){
            return $result;
        }else{
            return "kosong";
        }
        // User berhasil verifikasi
    }

    public function scopeGetAdmin($id){
        $data = tb_user::find($id);
        return response()->json($data);
        // error_log("tayo");
        // return $ids;
    }

    public function show(Request $request)
    {
        return "HEY";
        // $email = $request->input('email');
        // return $email;
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tb_user  $tb_user
     * @return \Illuminate\Http\Response
     */
    public function edit(tb_user $tb_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tb_user  $tb_user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tb_user $tb_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tb_user  $tb_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(tb_user $tb_user)
    {
        //
    }
}
