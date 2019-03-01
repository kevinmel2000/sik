<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Panduan extends Model
{
	protected $table    = 'data_panduan';
    protected $primaryKey = 'id';
    protected $fillable = [ 
        'judul',
        'dokumen', 
       
       
   ];
  
}