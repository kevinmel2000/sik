@extends('admin.layouts.app')
@section('content')
<section class="content-header">
    <h1>
        Tambah Data Panduan
        <small>Admin panel</small>
    </h1>
    
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Panduan</h3>
                </div>
                <form method="POST" action="{{url('admin/panduan/store')}}" enctype="multipart/form-data">
                    {{ csrf_field() }} 
                    <div class="box-body">
                       
                        <div class="form-group-sm">
                           
                        <label for="inputEmail3" class="col-sm-3 control-label">Judul</label>
                        <div class="col-sm-9">
               
                    <textarea id="editor1" name="judul" rows="4" cols="80"></textarea>
                                           
                   
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

