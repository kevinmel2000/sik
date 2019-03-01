@extends('Admin.layouts.app')
@section('content')


        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>
       
        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
      
      <!-- /.row -->
      <div class="row">
      </div>
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$datakerja}}</h3>

              <p>Semua Kerjasama</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-md"></i>
            </div>
            <a href="{{url('admin/kerjasama')}}" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->

         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              @foreach($aktif as $ak)
              <h3>{{$ak->aktif}}</h3>
@endforeach
              <p>Kerjasama Aktif</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-md"></i>
            </div>
            <a href="{{url('admin/kerjasama/aktif')}}" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>


        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
               @foreach($berakhir as $br)

              <h3>{{$br->berakhir}}</h3>
           
          @endforeach
              <p>Kerjasama Berakhir</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="{{url('admin/kerjasama/berakhir')}}" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-olive">
            <div class="inner">
              @foreach($akanberakhir as $ab)

              <h3>{{$ab->akanberakhir}}</h3>
              
              @endforeach
              <p>Kerjasama Akan Berakhir</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="{{url('admin/kerjasama/akan_berakhir')}}" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->

<section class="content-header">
  <h1>
    Statistik
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
    <tr>
      <th>Unit</th>
      <th>Total Kerjasama</th>
       <th>Mitra</th>
    
</tr>
  
  <tr>  
        <td>FEB</td>
        <td>1</td>
         <td>Universitas</td>
      
          
    </tr>
 
</table>

   
</div>
</div>
       




      </div>
        </section>
@endsection