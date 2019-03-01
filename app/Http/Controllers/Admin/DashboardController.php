<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;
use DB;
use Carbon;
use App\Model\Kerjasama;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $datakerja=Kerjasama::count();

         $akanberakhir = DB::select('SELECT count(*) as akanberakhir FROM data_kerjasama WHERE date(tgl_selesai) >=date(NOW()) and date(tgl_selesai) <= date(NOW()+INTERVAL 1 MONTH)');

         $berakhir = DB::select('SELECT COUNT(*) as berakhir FROM data_kerjasama WHERE date(tgl_selesai) <= date(NOW())');

          $aktif = DB::select('SELECT COUNT(*) as aktif FROM data_kerjasama WHERE date(tgl_selesai) > date(NOW())');

          $matrik = DB::select('SELECT YEAR(tgl_mulai) AS tahun, COUNT(kegiatan) as kg, pelaksana AS unit FROM data_perjanjian GROUP BY YEAR(tgl_mulai),pelaksana,kegiatan');

          

        return view('Admin.Dashboard',compact('datakerja','akanberakhir','berakhir','aktif','matrik'));
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
