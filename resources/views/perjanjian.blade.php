@extends('layouts.app')
@section('content')
<section class="content-header">
  <h1>
    Data Realisasi Kerjasama
    <small>Admin panel</small>
  </h1>
 
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
            <th class="text-center">Mitra</th>
            <th class="text-center">Deskripsi</th>
           <th class="text-center">Pelaksana</th>
            <th class="text-center">Kegiatan</th>
           <th class="text-center">Tanggal</th>
          <!--   <th class="text-center">Dokumen</th> -->
            <th class="text-center" width="10%">Aksi</th>
          </tr>
        </thead>
        <tbody><?php $a=1;?>
        @foreach($data as $dt)
        <tr>
          <td class="text-center">{{$a++}}</td>
         <td class="text-center">{{$dt->mitra}}</td>
          <td class="text-center">{{$dt->deskripsi}}</td>
          <td class="text-center">{{$dt->pelaksana}}</td>
         <td class="text-center">{{$dt->kegiatan}}</td>
     <td>{{Carbon\Carbon::parse($dt->tgl_mulai)->format('d-m-Y')}} / {{Carbon\Carbon::parse($dt->tgl_selesai)->format('d-m-Y')}}</td> 
          <td class="text-center">
            
                    
           <a class="btn btn-success" data-toggle="modal" data-target="#modal-{{$dt->id}}"  href="#">Details</a>
               
               <div class="modal fade" id="modal-{{$dt->id}}" aria-labelledby="myLargeModalLabel">
               <div class="modal-dialog modal-lg" role="document">
          
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Details Kerjasama</h4>
              </div>
              <div class="modal-body">
                     <table class="table table-bordered">
  
    <tr>
     <th>Mitra</th>
     <td>{{ $dt->mitra }}</td>
    </tr>
    <tr>
     <th>Deskripsi</th>
     <td>{{ $dt->deskripsi }}</td>
    </tr>
    <tr>
     <th>No.Kontrak</th>
     <td>{{ $dt->no_kontrak }}</td>
    </tr>
    <tr>
      <th>Pelaksana</th>
      <td>{{$dt->pelaksana}}</td>
    </tr>
    <tr>

     <th>Kegiatan</th>
     <td>{{ $dt->kegiatan }}</td>
    </tr>
    <tr>
      <th>Tanggal Mulai</th>
      <td> {{  $dt->tgl_mulai }}</td>
    </tr>
     <tr>
     <th>Tanggal Selesai</th>
     <td>{{ $dt->tgl_selesai }}</td>
    </tr>
    <tr>
     <th>PJ Univ</th>
     <td>{{ $dt->pj_univ}}</td>
    </tr>
     <tr>
     <th>PJ Mitra</th>
     <td>{{ $dt->pj_mitra }}</td>
    </tr>
  
  </table>
              </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a class="btn btn-success" href="{{ url('download/'.$dt->id) }}"> <i class="fa fa-download"> Download </i></a>
      </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>












            </form> 
          </button>
        </td>
      </tr>
  @endforeach
    </tbody>

  </table>
</div>
</div>

</section>
@endsection

