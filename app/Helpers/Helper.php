<?php
namespace App\Helpers;
use Validator;
use Image;
use File;
use DB;
use Auth;
class Helper {
	public static function fortgl() {
		for($i=1; $i<=31; $i++){
			$data[] = $i;
		} 
		return $data;
	}
// get tahun 1945-sekarang
	public static function forthn() {
		for($i=date('Y'); $i>='1935'; $i--){
			$data[] = $i;
		}
		return $data;
	}
// 01- januari- 2018
	public static function tgl_indo($tgl){
		$tanggal = substr($tgl,8,2);
		$bulan = Helper::getBulan((int) substr($tgl,5,2));
		$tahun = substr($tgl,0,4);
		$tgl = $tanggal." ".$bulan." ".$tahun;	
		if ($tgl != "--" ) {
			return $tanggal." ".$bulan." ".$tahun;		    		
		}
	}

// tahun - bulan -tanggal
	public static function tgl($tgl) {
		$tanggal = substr($tgl,0,2);
		$bulan = substr($tgl,3,2);
		$tahun = substr($tgl,6,4);
		return $tahun."-".$bulan."-".$tanggal;
	}	
// tanggal -bulan -tahun
	public static function tgl1($tgl)
	{
		$tanggal = substr($tgl,8,2);
		$bulan = substr($tgl,5,2);
		$tahun = substr($tgl,0,4);
		$tgl = $tanggal."-".$bulan."-".$tahun;	

		if ($tgl != "--" ) {
			return $tanggal."-".$bulan."-".$tahun;		    		
		}
	}

	public static function bln($tgl)
	{ 
		$bulan = Helper::getBulan(substr($tgl,5,2)); 
		return $bulan;
	}	

	public static function thn($tgl)
	{ 
		$tahun = substr($tgl,0,4); 
		return $tahun;
	}

	public static function getBulan($bln)
	{
		switch ($bln){ 
			case 1:	return "Januari";  break; 
			case 2: return "Februari";  break; 
			case 3: return "Maret";  break;
			case 4: return "April"; break;
			case 5: return "Mei";  break; 
			case 6: return "Juni"; break; 
			case 7:	return "Juli"; break;
			case 8:	return "Agustus"; break; 
			case 9:	return "September"; break;
			case 10:return "Oktober"; break;
			case 11:return "November"; break;
			case 12:return "Desember"; break; 
		} 
	} 

// fungsi upload gambar produk
	public static function uploadImage($image, $folder, $fileold){    
		$tgl = date('Y-m-d');
		$file = array('file' => $image); 
		$rules = array('file' => 'mimes:jpeg,jpg,gif,png');
		$validator = Validator::make($file, $rules);

		if ($validator->fails() or  $image == NUll) { 
			$fileName = $fileold=='' ? '' : $fileold; 
		} else {  
			$extension = strstr($image->getClientOriginalName(), '.');
			$uniq = uniqid();
			$fileName = $tgl."-".$uniq.$extension;
			$fileName = str_replace('-','',$fileName);

			$image->move($folder, $fileName);
// list($w, $h) = getimagesize($folder.$fileName);
// $w = $w / 2;
// $h = $h / 2;            
//  // open an image file
// $img_medium = Image::make($folder.$fileName);
// // resize image instance
// $img_medium->resize($w, $h);
// // save image in desired format
// $img_medium->save($folder."medium/".$fileName);

// $w = $w / 2;
// $h = $h / 2;   
//  // open an image file
// $img_small = Image::make($folder.$fileName);
// // resize image instance
// $img_small->resize($w, $h);
// // save image in desired format
// $img_small->save($folder."small/".$fileName);

			Helper::DeleteImage($fileold, $folder);
		}
		return $fileName;
	}

// delete foto produk
	public static function deleteImage($image, $folder){
		File::delete($folder.$image); 
// File::delete($folder."medium/".$image); 
// File::delete($folder."small/".$image); 
	}

	public static function uploadFile($image, $path, $file_old){
		$tgl = date('Y-m-d');
		$file = array('file' => $image); 
		$rules = array('file' => 'mimes:pdf');
		$validator = Validator::make($file, $rules);

		if ($validator->fails() or  $image == NUll) { 
			$fileName = $file_old=='' ? '' : $file_old; 
		} else {  
			$extension = strstr($image->getClientOriginalName(), '.');
// dd($extension);
			$uniq = uniqid();
			$fileName = $tgl."_".$uniq.$extension; 
			$image->move($path, $fileName);
			Helper::deleteFile($file_old, $path);
		}
		return $fileName;
	}

	public static function deleteFile($image, $path){
		File::delete($path.$image);  
	}

	public static function kategori(){
		$v = DB::table('kategori')->select('kategori_name')->orderBy('kategori_name','asc')->get();
		return isset($v) ? $v : '';
	}


// get data dari tabel
	public static function getData($table) {
		$model = DB::table($table)->select('*')->get();		
		return isset($model) ? $model : "";  

	}
	public static function hitung($table) {
		$model = DB::table($table)->count();		
		return isset($model) ? $model : "";  
	}
	public static function hitung_group($table,$fld) {
		$model =DB::table($table)->distinct($fld)->count($fld);	
		return isset($model) ? $model : "";  
	}
	public static function hitung_jumlah($table,$fld) {
		$model = DB::table($table)->sum($fld);		
		return isset($model) ? $model : "";  
	}
	public static function getDetail($tbl, $id, $fld, $key) {
		$model = DB::table($tbl)->select($fld)->where($key, $id)->first();	
		$data = isset($model) ? $model->$fld : ""; 	
		return $data;  
	}

	public static function Terbilang($x)
	{
		$abil = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"); 
		if ($x < 12) 
			return " " . $abil[$x]; 
		elseif ($x < 20) 
			return Helper::Terbilang($x - 10) . " Belas"; 
		elseif ($x < 100) 
			return Helper::Terbilang($x / 10) . " Puluh" . Helper::Terbilang($x % 10); 
		elseif ($x < 200) 
			return " Seratus" . Helper::Terbilang($x - 100); 
		elseif ($x < 1000) 
			return Helper::Terbilang($x / 100) . " Ratus" . Helper::Terbilang($x % 100); 
		elseif ($x < 2000) 
			return " Seribu" . Helper::Terbilang($x - 1000); 
		elseif ($x < 1000000) 
			return Helper::Terbilang($x / 1000) . " Ribu" . Helper::Terbilang($x % 1000); 
		elseif ($x < 1000000000) 
			return Helper::Terbilang($x / 1000000) . " Juta" . Helper::Terbilang($x % 1000000); 
	}

}


