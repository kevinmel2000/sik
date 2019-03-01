<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Panduan;
use App\Model\Sop;
use Alert;
use File;
use DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class PanduanController extends Controller
{
       public function __construct()
    {
        $this->title = 'panduan';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title; 
        $data = Panduan::all();
        $datas = Sop::all();
     //  $filter = DB::select('SELECT lembaga as lmbg from data_kerjasama');
     //  $year = Carbon::now()->format('Y');
     // $tahun = DB::select('SELECT distinct(EXTRACT(YEAR FROM tgl_kerjasama)) as tahun from data_kerjasama');

      // $tahun = DB::table('data_kerjasama')->where(DB::raw(YEAR('tgl_kerjasama')), $year);

        return view('admin.'.$title.'.index', compact('title','data','datas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

 public function download($id)
    {

    $filesss = Panduan::where('id', $id)->firstOrFail();
    $pathToFile = storage_path('app/dokumen/' . $filesss->dokumen);
    return response()->download($pathToFile);
       
    }

public function downloads($id)
    {

    $filesss = Sop::where('id', $id)->firstOrFail();
    $pathToFile = storage_path('app/dokumen/' . $filesss->dokumen);
    return response()->download($pathToFile);
       
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


      $validator = Validator::make($request->all(), [
        
        'judul' => 'required|string', 
        'dokumen' => 'required|file|mimes:docx,pdf,jpg,gif,svg|max:2048',
      ]);

      if ($validator->passes()) {
        $input = $request->all();
        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString()); 
        $input['dokumen'] = $timestamp.'.'.$request->dokumen->getClientOriginalName();
        $request->dokumen->move(storage_path('app/dokumen'), $input['dokumen']);

        Panduan::create($input);
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
        $data = Panduan::find($id);
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
    $boat=Panduan::find($model['id']);  


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
        //
    }

      public function tambah()
    {
        $title = $this->title;
        $data ="";
        return view('admin.'.$title.'.tambah', compact('title','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function stores(Request $request)
    {


      $validator = Validator::make($request->all(), [
        
        'judul' => 'required|string', 
        'dokumen' => 'required|file|mimes:docx,pdf,jpg,gif,svg|max:2048',
      ]);

      if ($validator->passes()) {
        $input = $request->all();
        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString()); 
        $input['dokumen'] = $timestamp.'.'.$request->dokumen->getClientOriginalName();
        $request->dokumen->move(storage_path('app/dokumen'), $input['dokumen']);

        Sop::create($input);
        Alert::success('Data Berhasil Disimpan', 'Selamat');
      }else{
            Alert::error('Data Gagal Disimpan', 'Maaf');

      }
    
        return Redirect::to('admin/'.$this->title);
    } 
}
