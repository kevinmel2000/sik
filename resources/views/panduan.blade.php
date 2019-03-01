@extends('layouts.app')
@section('content')
<section class="content-header">
  <h1>
    Data Kerjasama
    <small>Admin panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">user</li>
  </ol>
</section>
<section class="content">
  <div class="row">
       
		  
                <div class="col-md-12">
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
                        <a class="btn btn-success" href="{{ url('/downloads/'.$dt->id) }}"> <i class="fa fa-download">Download</i></a>
                                          
             
     
                        </div>
                    </div>
                </div>

		  </div><!-- /.row -->
  @endforeach 
</section>
@endsection

