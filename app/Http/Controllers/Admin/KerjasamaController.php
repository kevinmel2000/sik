<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Kerjasama;
use App\Model\Mitra;
use Alert;
use File;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class KerjasamaController extends Controller
{
        public function __construct()
    {
        $this->title = 'kerjasama';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;

        $tgl=Carbon::parse()->format('Y-m-d');

        $data = DB::select('SELECT * ,IF(DATEDIFF(STR_TO_DATE(tgl_selesai,"$tgl"), CURDATE())<=0,"Berakhir","Masih Berjalan") status FROM data_kerjasama');
      // dd($data);
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
        
        'mitra' => 'required|string',
        'deskripsi' => 'required|string', 
        'no_kontrak' => 'required|string', 
        'tgl_mulai' => 'required|string', 
        'tgl_selesai' => 'required|string',
        'pengelola' => 'required|string', 
        'jenis' => 'required|string', 
        'bidang' => 'required|string', 
        'regional' => 'required|string',  
        'dokumen' => 'required|file|mimes:docx,pdf,jpg,gif,svg|max:2048',
      ]);

      if ($validator->passes()) {
        $input = $request->all();
        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString()); 
        $input['dokumen'] = $timestamp.'.'.$request->dokumen->getClientOriginalName();
        $request->dokumen->move(storage_path('app/dokumen'), $input['dokumen']);

        Kerjasama::create($input);

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
        $data = Kerjasama::find($id);
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
    $boat=Kerjasama::find($model['id']);  


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


      if ($data = Kerjasama::find($id))
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

    $kerja = Kerjasama::where('id', $id)->firstOrFail();
    $pathToFile = storage_path('app/dokumen/'.$kerja->dokumen);
    return response()->download($pathToFile);
       
    }

       public function cari(Request $request)
       {
     
            $cari = $request->get('cari');
            $data = DB::table('data_kerjasama')->where('mitra', 'LIKE', '%$cari%')->select('id','mitra')->get();
            return response()->json($data);
      
           
    
 
       }
   


       public function akan_berakhir(Request $request)
       {
         $title = $this->title;
           $akanberakhir = DB::select('SELECT * FROM data_kerjasama WHERE date(tgl_selesai) >=date(NOW()) and date(tgl_selesai) <= date(NOW()+INTERVAL 1 MONTH)');

        //    if ($data->id == ($akanberakhir){ 

        //     $echo ="berakhir";

        // } else{
        //        echo "belum "
        //     } 

           return view('admin.'.$this->title.'.akan_berakhir', compact('title','akanberakhir'));
       }

        public function berakhir(Request $request)
       {
         $title = $this->title;
      
          $berakhir = DB::select('SELECT * FROM data_kerjasama WHERE date(tgl_selesai) <= date(NOW())');

      

           return view('admin.'.$this->title.'.berakhir', compact('title','berakhir'));
       }

        public function aktif(Request $request)
       {
         $title = $this->title;
          $aktif = DB::select('SELECT * FROM data_kerjasama WHERE date(tgl_selesai) > date(NOW())');

           return view('admin.'.$this->title.'.aktif', compact('title','aktif'));
       }

     
}
