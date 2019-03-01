@extends('admin.layouts.app')
@section('content')
<section class="content-header">
    <h1>
        Tambah Data Perjanjian
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
                <form method="POST" action="{{url('admin/perjanjian/store')}}" enctype="multipart/form-data">
                    {{ csrf_field() }} 
                    <div class="box-body">
                         <div class="form-group-sm">
                            <label for="inputPassword3" class="col-sm-3 control-label">Mitra</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="mitra" style="width: 100%;">
                                    <option selected="selected">--Pilih--</option>
                                    @foreach($kerja as $dt)
                                    <option value="{{$dt->mitra}}">{{$dt->mitra}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                           
                        <label for="inputEmail3" class="col-sm-3 control-label">Deskripsi</label>
                        <div class="col-sm-9">
               
                    <textarea id="editor1" name="deskripsi" rows="4" cols="80"></textarea>
                        </div>
                    
       
                        </div>

                         <div class="form-group-sm">
                            <label for="inputPassword3" class="col-sm-3 control-label">Pelaksana</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Pelaksana" name="pelaksana">
                            </div>
                        </div>

                        <div class="form-group-sm">
                            <label for="inputPassword3" class="col-sm-3 control-label">Kegiatan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Kegiatan" name="kegiatan">
                            </div>
                        </div>
                        <div class="form-group-sm">
                            <label for="inputPassword3" class="col-sm-3 control-label">Nomor Kontrak</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Nomor Kontrak" name="no_kontrak">
                            </div>
                        </div>

                         <div class="form-group-sm">
                            <label for="inputPassword3" class="col-sm-3 control-label">PJ Univ</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="PJ Univ" name="pj_univ">
                            </div>
                        </div>


<div class="form-group-sm">
                            <label for="inputPassword3" class="col-sm-3 control-label">PJ Mitra</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="PJ Mitra" name="pj_mitra">
                            </div>
                        </div>






                         <div class="form-group-sm">
                            <label for="inputPassword3" class="col-sm-3 control-label">Tanggal Mulai</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" placeholder="" name="tgl_mulai">
                            </div>
                        </div>

                         <div class="form-group-sm">
                            <label for="inputPassword3" class="col-sm-3 control-label">Tanggal Selesai</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" placeholder="" name="tgl_selesai">
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

@endsection

