<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sop extends Model
{
    protected $table    = 'sops';
    protected $primaryKey = 'id';
    protected $fillable = [ 
        'judul',
        'dokumen', 
       
       
   ];
        
       
       
       
  
}
