<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Mitra;
use Alert;
use File;
use DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class MitraController extends Controller
{
        public function __construct()
    {
        $this->title = 'mitra';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title; 
        $data = Mitra::all();
   

        return view('admin.'.$title.'.index', compact('title','data'));
    }

        public function create()
    {
        $title = $this->title;
        $data ="";
        return view('admin.'.$title.'.create', compact('title','data'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
            'nama' => 'required|string',
            'site' => 'required|string',
            'gambar' => 'required|image|mimes:jpg,png,jpeg',
            ]);
        $gambar = $request->file('gambar');
        $namaFile = $gambar->getClientOriginalName();
        $request->file('gambar')->move('uploadgambar', $namaFile);
        $do = new Mitra($request->all());
        $do->gambar = $namaFile;
if ($do->save()) {
     

        Alert::success('Data Berhasil Disimpan', 'Selamat');
      }else{
            Alert::error('Data Gagal Disimpan', 'Maaf');

      }
    
        return Redirect::to('admin/'.$this->title);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = $this->title;
        $data = Mitra::find($id);
        return view('admin.'.$title.'.edit', compact('title','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $model = $request->all();
    $boat=Mitra::find($model['id']);  


$boat->fill($request->except('gambar'));

        
    if($file = $request->hasFile('gambar')) {
     $fullPath = public_path("uploadgambar/{$boat->gambar}");
    if (File::exists($fullPath))  {
       File::delete($fullPath);
    }
        $gambar = $request->file('gambar');
        $namaFile = $gambar->getClientOriginalName();
        $request->file('gambar')->move('uploadgambar', $namaFile);
   
  
    $boat->gambar = $namaFile ;
}


if($boat->save()){
     Alert::success('Data Berhasil Diupdate', 'Selamat');
}else{
     Alert::error('Data Gagal Diupdate', 'Maaf');
}
   
return Redirect::to('admin/'.$this->title);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($data = Mitra::find($id))
    {
    $filename = $data->gambar;
    $fullPath = public_path("uploadgambar/{$data->gambar}");
    if (File::exists($fullPath))  {
        File::delete($fullPath);
    }
    $data->delete($fullPath);

    Alert::success('Data Berhasil Dihapus', 'Selamat');
    
        }else{
            Alert::error('Data Gagal Dihapus', 'Maaf');
        }
        return Redirect::to('admin/'.$this->title);
    }
}
