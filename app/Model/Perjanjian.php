<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Perjanjian extends Model
{
	protected $table    = 'data_perjanjian';
    protected $primaryKey = 'id';
    protected $fillable = [ 
        'mitra',
        'deskripsi', 
         'pelaksana',
         'kegiatan',
        'no_kontrak', 
         'tgl_mulai',
          'tgl_selesai',
          'pj_univ',
          'pj_mitra',
        'dokumen',

       
   ];
  
}