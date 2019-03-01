<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Kerjasama;
use App\Model\Perjanjian;
use App\Model\Panduan;
use App\Model\Kontak;
use App\Model\Mitra;

use Alert;
use File;
use DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $datakerja=Kerjasama::count();

         $akanberakhir = DB::select('SELECT count(*) as akanberakhir FROM data_kerjasama WHERE date(tgl_selesai) >=date(NOW()) and date(tgl_selesai) <= date(NOW()+INTERVAL 1 MONTH)');

         $berakhir = DB::select('SELECT COUNT(*) as berakhir FROM data_kerjasama WHERE date(tgl_selesai) <= date(NOW())');

          $aktif = DB::select('SELECT COUNT(*) as aktif FROM data_kerjasama WHERE date(tgl_selesai) > date(NOW())');

        return view('welcome',compact('datakerja','akanberakhir','berakhir','aktif'));
       
    }

   public function kerjasama()
   {
      
        $data = Kerjasama::all();
        return view('kerjasama', compact('data'));
   }

   public function panduan()
   {
      
        $data = Panduan::all();
        return view('panduan', compact('data'));
   }


    public function downloads($id)
    {

    $kerja = Panduan::where('id', $id)->firstOrFail();
    $pathToFile = storage_path('app/dokumen/' . $kerja->dokumen);
    return response()->download($pathToFile);
       
    }


    public function download($id)
    {

    $kerja = Kerjasama::where('id', $id)->firstOrFail();
    $pathToFile = storage_path('app/dokumen/' . $kerja->dokumen);
    return response()->download($pathToFile);
       
    }


       public function cari(Request $request)
       {
       
           $cari = $request->cari;
           $data = DB::table('data_kerjasama')
          ->where('lembaga','like',"%".$cari."%")
           ->orwhere('tgl_kerjasama','like',"%".$cari."%")
            ->paginate();
           return view('kerjasama', compact('data'));
       }

        public function perjanjian()
   {
      
        $data = Perjanjian::all();
        return view('perjanjian', compact('data'));
   }


    public function downloadd($id)
    {

    $kerja = Perjanjian::where('id', $id)->firstOrFail();
    $pathToFile = storage_path('app/dokumen/' . $kerja->dokumen);
    return response()->download($pathToFile);
       
    }


       public function carii(Request $request)
       {
       
           $cari = $request->cari;
           $data = DB::table('data_perjanjian')
          ->where('lembaga','like',"%".$cari."%")
           ->orwhere('pelaksana','like',"%".$cari."%")
            ->paginate();
           return view('perjanjian', compact('data'));
       }

      public function kontak()
   {
      
        $data = Kontak::all();
        return view('kontak', compact('data'));
   }

   public function mitra()
   {
      
        $data = Mitra::all();
        return view('mitra', compact('data'));
   }


}