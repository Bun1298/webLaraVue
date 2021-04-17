<?php

namespace App\Http\Controllers;

use App\Models\tb_loker;
use Illuminate\Http\Request;

class TbLokerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = tb_loker::all();
        $datas = collect($data)->sortByDesc('id')->take(8)->toArray();
        return ($datas);
        //
    }

    public function getLive(Request $request){
        $data = tb_loker::where('name','LIKE','%'.$request->keyword.'%')->get();
        return response()->json($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function scopeGetLoker($id){
        $data = tb_loker::find($id);
        return $data;
    }

    public function tambahLowongan(Request $request){
        $input = $request->all();
        $images = array();
        if($_FILES=$request->file('images')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('image',$name);
                $images[]=$name;
            }
        }

        $data= new tb_loker([
            'title_loker' => $request->input('title_loker'),
            'job_des' => $request->input('job_des'),
            'overview' => $request->input('overview'),
            'additional_info' => $request->input('additional_info'),
            'kontak' => $request->input('notelp'),
            'uid' => $request->input('uid_alumni'),
            'status'=>'A'
        ]);
        return response()->json($data);
    }

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
    public function store(Request $request,$id)
    {
        $data = tb_loker::find($id);
        return response()->json($data);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tb_loker  $tb_loker
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $data = tb_loker::find($id);
        return response()->json($data);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tb_loker  $tb_loker
     * @return \Illuminate\Http\Response
     */
    public function edit(tb_loker $tb_loker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tb_loker  $tb_loker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tb_loker $tb_loker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tb_loker  $tb_loker
     * @return \Illuminate\Http\Response
     */
    public function destroy(tb_loker $tb_loker)
    {
        //
    }
}
