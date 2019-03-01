@extends('layouts.app')
@section('content')
<section class="content-header">
  <h1>
    Mitra Kami
    <small>Admin panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">user</li>
  </ol>
</section>
<section class="content">
  <div class="box">
    <div class="box-header">
 
      
         </div>
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Logo</th>
            <th class="text-center">Situs</th>
          
            
          </tr>
        </thead>
        <tbody><?php $a=1;?>
        @foreach($data as $dt)
        <tr>
          <td class="text-center">{{$a++}}</td>
         <td class="text-center">{{$dt->nama}}</td>
          <td align="center">
            <img src="{{ url('uploadgambar') }}/{{ $dt->gambar }}" class="img-responsive" width="100px" height="200px" align="center">
          </td>
         <td align="center"><a class="btn btn-success" href="" target="_blank" ><i class="fa fa-globe"> {{$dt->site}}</i></a></td>
          <td class="text-center">

           
        
        </td>
      </tr>
  @endforeach
    </tbody>

  </table>
</div>
</div>

</section>
@endsection

