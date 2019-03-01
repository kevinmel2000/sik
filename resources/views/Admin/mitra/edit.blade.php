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
                <form method="POST" action="{{url('admin/mitra/edit')}}" enctype="multipart/form-data">
                    {{ csrf_field() }} 
                    <div class="box-body">
                        

                      

                         <div class="form-group-sm">
                            <label for="inputPassword3" class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-9">
                                    <input type="hidden" class="form-control" value="{{$data->id}}" name="id">
                                <input type="text" class="form-control" placeholder="Pelaksana" name="nama" value="{{$data->nama}}">
                            </div>
                        </div>

                        <div class="form-group-sm">
                            <label for="inputPassword3" class="col-sm-3 control-label">Situs</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Situs" name="site" value="{{$data->site}}">
                            </div>
                        </div>
                       








                         <div class="form-group-sm">
                            <label for="inputPassword3" class="col-sm-3 control-label">Logo</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" placeholder="" name="gambar">
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

