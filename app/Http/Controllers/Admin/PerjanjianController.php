<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Perjanjian;
use App\Model\Kerjasama;
use Alert;
use File;
use DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class PerjanjianController extends Controller
{
     public function __construct()
    {
        $this->title = 'perjanjian';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $title = $this->title; 
        $data = Perjanjian::all();
    

        return view('admin.'.$title.'.index', compact('title','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $title = $this->title;
         $kerja = Kerjasama::all();
        $data ="";
        return view('admin.'.$title.'.create', compact('title','data','kerja'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $validator = Validator::make($request->all(), [
        
        'mitra' => 'required|string',
        'deskripsi' => 'required|string', 
        'pelaksana' => 'required|string', 
        'kegiatan' => 'required|string', 
         'no_kontrak' => 'required|string',
          'tgl_mulai' => 'required|string', 
          'tgl_selesai' => 'required|string',  
           'pj_univ' => 'required|string', 
          'pj_mitra' => 'required|string',
        'dokumen' => 'required|file|mimes:docx,pdf,jpg,gif,svg|max:2048',
      ]);

      if ($validator->passes()) {
        $input = $request->all();
        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString()); 
        $input['dokumen'] = $timestamp.'.'.$request->dokumen->getClientOriginalName();
        $request->dokumen->move(storage_path('app/dokumen'), $input['dokumen']);

        Perjanjian::create($input);
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
        $data = Perjanjian::find($id);
        return view('admin.'.$title.'.edit', compact('title','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function update(Request $request )
     {

   $model = $request->all();
    $boat=Perjanjian::find($model['id']);  


$boat->fill($request->except('dokumen'));


if($file = $request->hasFile('dokumen')) {
     $fullPath = storage_path("app/dokumen/{$boat->dokumen}");
    if (File::exists($fullPath))  {
       File::delete($fullPath);
    }
    $file = $request->file('dokumen') ;
    $fileName = $file->getClientOriginalName() ;
    $destinationPath = storage_path().'/app/dokumen/' ;
    $file->move($destinationPath,$fileName);
    $boat->dokumen = $fileName ;
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
        if ($data = Perjanjian::find($id))
    {
    $filename = $data->dokumen;
    $fullPath = storage_path("app/dokumen/{$data->dokumen}");
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

     public function download($id)
    {

    $kerja = Perjanjian::where('id', $id)->firstOrFail();
    $pathToFile = storage_path('app/dokumen/' . $kerja->dokumen);
    return response()->download($pathToFile);
       
    }

       public function cari(Request $request)
       {

           
        $title = $this->title;
           $cari = $request->cari;
           $data = DB::table('data_perjanjian')
          ->where('lembaga','like',"%".$cari."%")
           ->orwhere('pelaksana','like',"%".$cari."%")
            ->paginate();
           return view('admin.'.$this->title.'.index', compact('title','data'));
       }
}
