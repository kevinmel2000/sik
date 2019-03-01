<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
	protected $table    = 'data_level';
    protected $primaryKey = 'id';
    protected $fillable = [ 
        'nama','keterangan', 
   ];
  
}