<?php
namespace App\Helpers;
use DB;
use App\Model\Penjualan;

class jualdetail {

    public static function jualdetails($no_nota)
    {
        $jualbrg = Penjualan::where('no_nota', $no_nota)->get();
        return $jualbrg;
    }

}