<?php

namespace App\Http\Controllers;

use App\Models\tb_jurusan;
use Illuminate\Http\Request;

class TbJurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = tb_jurusan::all()->toArray();
        return ($data);
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
        $data = new tb_jurusan([
            'kode_jurusan' => $request->input('kode_jurusan'),
            'nama_jurusan' => $request->input('nama_jurusan'),
            'deskripsi_jurusan' => $request->input('deskripsi_jurusan')
        ]);

        $data->save();

        return response()->json('Jurusan telah ditambahkan!!');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tb_jurusan  $tb_jurusan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = tb_jurusan::find($id);
        return response()->json($data);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tb_jurusan  $tb_jurusan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $Request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tb_jurusan  $tb_jurusan
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, tb_jurusan $tb_jurusan)
    {
        $data = tb_jurusan::find($id);
        $data -> update($request->all());

        return response()->json('Jurusan telah diupdate !!');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tb_jurusan  $tb_jurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = tb_jurusan::find($id);
        $data->delete();

        return response()->json('Data jurusan telah dihapus !!');
        //
    }
}
