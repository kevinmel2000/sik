@extends('admin.layouts.app')
@section('content')
<section class="content-header">
<h1>
Tambah Data Kerjasama
<small>Admin panel</small>
</h1>

</section>
<section class="content">
<div class="row">
<div class="col-md-12">
<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">User/Pengguna</h3>
</div>
<form method="POST" action="{{url('admin/kerjasama/store')}}" enctype="multipart/form-data">
{{ csrf_field() }} 
<div class="box-body">
<div class="form-group-sm">
    <label for="inputEmail3" class="col-sm-3 control-label">Mitra</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" placeholder="Mitra" name="mitra">
    </div>
</div>
<div class="form-group-sm">
   
<label for="inputEmail3" class="col-sm-3 control-label">Nama Kerjasama</label>
<div class="col-sm-9">

<textarea id="editor1" name="deskripsi" rows="4" cols="80"> </textarea>
                   

</div>


</div>

 <div class="form-group-sm">
    <label for="inputPassword3" class="col-sm-3 control-label">Nomor Kontrak</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" placeholder="Nomor Kontrak" name="no_kontrak">
    </div>
</div>
<div class="form-group-sm">
    <label for="inputPassword3" class="col-sm-3 control-label">Jenis</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" placeholder="Jenis" name="jenis">
    </div>
</div>
 <div class="form-group-sm">
    <label for="inputPassword3" class="col-sm-3 control-label">Bidang</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" placeholder="Bidang" name="bidang">
    </div>
</div>
<div class="form-group-sm">
    <label for="inputPassword3" class="col-sm-3 control-label">Tanggal Mulai</label>
    <div class="col-sm-9">
        <input type="date" class="form-control" placeholder="Tanggal Kerjasama" name="tgl_mulai">
    </div>
</div>

 <div class="form-group-sm">
    <label for="inputPassword3" class="col-sm-3 control-label">Tanggal Selesai</label>
    <div class="col-sm-9">
        <input type="date" class="form-control" placeholder="Tanggal Kerjasama" name="tgl_selesai">
    </div>
</div>

    <div class="form-group-sm">
    <label for="inputPassword3" class="col-sm-3 control-label">Regional</label>
    <div class="col-sm-9">
      <!--   <select>
            <option value="Indonesia">Indonesia</option>
            <option value="Indonesia">Amerika</option>
            <option value="Indonesia">Malaysia</option>
            <option value="Indonesia">Singapura</option>
            <option value="Indonesia">Thailand</option>
            <option value="Indonesia">Brunei Darussalam</option>
             <option value="Indonesia">Russia</option>
            <option value="Indonesia">Vietnam</option>
            <option value="Indonesia">Philipina</option>
            <option value="Indonesia">Timor Leste</option>
            <option value="Indonesia">Australia</option>
            <option value="Indonesia">Myanmar</option>
        </select> -->
      <input type="text" class="form-control" placeholder="Regional" name="regional"> 
    </div>
</div>

 <div class="form-group-sm">
    <label for="inputPassword3" class="col-sm-3 control-label">Pengelola</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" placeholder="Jabatan" name="pengelola">
    </div>
</div>

 <div class="form-group-sm">
    <label for="inputPassword3" class="col-sm-3 control-label">Dokumen</label>
    <div class="col-sm-4">
        <input type="file" class="form-control" placeholder="" name="dokumen">
    </div>
</div>
</div>
<div class="box-footer">
<button type="reset" class="btn btn-default">Cancel</button>
<button type="submit" class="btn btn-info pull-right upload-file ">Simpan</button>
</div>
</form>
</div>
</div>
</div>
</section>
<!-- <script type="text/javascript">
$("body").on("click",".upload-file",function(e){
$(this).parents("form").ajaxForm(options);
});

var options = { 
complete: function(response) 
{
if($.isEmptyObject(response.responseJSON.error)){
$("input[name='nama_kerjasama']").val('');
alert('Upload gambar berhasil.');
}else{
printErrorMsg(response.responseJSON.error);
}
}
};

function printErrorMsg (msg) {
$(".print-error-msg").find("ul").html('');
$(".print-error-msg").css('display','block');
$.each( msg, function( key, value ) {
$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
});
}
</script> -->
@endsection

