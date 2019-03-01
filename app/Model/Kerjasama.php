<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kerjasama extends Model
{
	protected $table    = 'data_kerjasama';
    protected $primaryKey = 'id';
    protected $fillable = [ 
        'mitra',
        'deskripsi', 
         'no_kontrak',
          'tgl_mulai',
           'tgl_selesai',
          'regional',
        'dokumen',
          'jenis',
        'bidang',
          'pengelola', 
  
       
   ];
  
}