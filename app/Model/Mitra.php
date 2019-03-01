<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    protected $table    = 'mitras';
    protected $primaryKey = 'id';
    protected $fillable = [ 
        'nama',
        'gambar', 
        'site',
   ];
}
