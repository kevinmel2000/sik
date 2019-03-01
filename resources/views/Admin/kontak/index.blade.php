@extends('admin.layouts.app')
@section('content')
<section class="content-header">
  <h1>
 KONTAK ADMIN
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
                           Kontak Admin

                        </div>
                        <div class="panel-body">
                            @foreach($data as $dt)
                            <p>
                              {{$dt->info}}
                            </p>

                        </div>
                        <div class="panel-footer">
                        
                                          
                      <a href="{{ url('admin/'.$title.'/edit/'.$dt->id) }}" class="btn btn-danger"> <i class="fa  fa-plus-square"></i> Edit</a>
     
                        </div>
                    </div>
                </div>

      </div><!-- /.row -->
  @endforeach 
</section>
@endsection
