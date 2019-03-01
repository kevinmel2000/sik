 @extends('layouts.app')
@section('content')
<section class="content-header">
  <h1>
    Data Kerjasama
    <small>Admin panel</small>
  </h1>
  
</section>
<section class="content">
 <div class="row">
       
		  
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading ">
                            Permintaan Layanan dan Informasi
                        </div>
                        <div class="panel-body">
                        	 @foreach($data as $dt)
Silahkan Kunjungi Situs Kami Untuk Info Lebih Lanjut :
                            <p> <a href="{{$dt->site}}" >http://test.test.ac.id</a></p>
                        </div>
                     
                    </div>
                </div>
				<div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Info Admin
                        </div>
                        <div class="panel-body">
                        	
                            <p>
                            	{{$dt->info}}
                            </p>
                        </div>
                     
                    </div>
                </div>
				 

		  </div>

 @endforeach 
</section>
@endsection