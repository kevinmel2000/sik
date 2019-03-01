@extends('admin.layouts.app')
@section('content')
<section class="content-header">
  <h1>
    Download Panduan
    <small>Admin panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">user</li>
  </ol>
</section>
<section class="content">
  <div class="row">
       
		  
                <div class="col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Panduan Kerjasama

                        </div>
                        <div class="panel-body">
                            @foreach($data as $dt)
                            <p>
                              {{$dt->judul}}
                            </p>

                        </div>
                        <div class="panel-footer">
                           <a class="btn btn-success" href="{{ url('admin/'.$title.'/download/'.$dt->id) }}"> <i class="fa fa-download">Download</i></a>
                                          
                      <a href="{{ url('admin/'.$title.'/edit/'.$dt->id) }}" class="btn btn-danger"> <i class="fa  fa-plus-square"></i> Edit</a>
     
                        </div>
                    </div>
                </div>
  @endforeach 
                <div class="col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Standar Operasional Procedure

                        </div>
                        <div class="panel-body">
                           
                           @foreach($datas as $dt)
                            <p>
                              {{$dt->judul}}
                            </p>

                        </div>
                        <div class="panel-footer">
                           <a class="btn btn-success" href="{{ url('admin/'.$title.'/downloads/'.$dt->id) }}"> <i class="fa fa-download">Download</i></a>
                                          
                      <a href="{{ url('admin/'.$title.'/edit/'.$dt->id) }}" class="btn btn-danger"> <i class="fa  fa-plus-square"></i> Edit</a>
     
                        </div>
                    </div>
                </div>
                 @endforeach 

		  </div><!-- /.row -->

</section>
@endsection

