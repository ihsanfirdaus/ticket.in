@extends('layouts/frontend')

@section('main-css')
    <link rel="stylesheet" href="{{asset('Front-end/css/animate.css/animate.min.css')}}">   
@endsection

@section('content')
<section class="booking-area" id="booking">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="col-lg-10">
		        <ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
					<a class="nav-link" href="#pesawat" role="tab" data-toggle="tab">pesawat</a>
					</li>
					{{-- <li class="nav-item">
					<a class="nav-link" href="#bus" role="tab" data-toggle="tab">bus</a>
					</li> --}}
				</ul>
                        <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="pesawat">
						<form action="{{ route('cari_tiket') }}" class="booking-form" id="pesan_pesawat" method="GET">
							<div class="row justify-content-center">
								<div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="pulang_pergi" name="tipe_tiket" class="custom-control-input" value="Pulang Pergi" checked="checked">
                                    <label class="custom-control-label" for="pulang_pergi">Pulang Pergi</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="sekali_jalan" name="tipe_tiket" class="custom-control-input" value="Sekali Jalan">
                                    <label class="custom-control-label" for="sekali_jalan">Sekali Jalan</label>
                                </div>    
							</div>
							<hr>
							<div class="row justify-content-center">
								<div class="col-md-5">
                                    <label for="">Keberangkatan</label>
									<div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                            <i class="fa fa-plane-departure" style="color:#007bff"></i>
                                            </span>
                                        </div>
                                        <select name="keberangkatan" class="single-in form-control">
                                           @foreach ($keberangkatan as $item)
                                           <option value="{{$item->keberangkatan}}">{{$item->keberangkatan}} - {{$item->bandara_k}}</option>
                                           @endforeach
                                        </select>
                                    </div>
								</div>
								<div class="col-md-5">
                                    <label for="">Tujuan</label>
									<div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                            <i class="fa fa-plane-arrival" style="color:#007bff"></i>
                                            </span>
                                        </div>
                                        <select name="tujuan" class="single-in form-control">
                                            @foreach ($tujuan as $item)
                                            <option value="{{$item->tujuan}}">{{$item->tujuan}} - {{$item->bandara_t}}</option>
                                            @endforeach
                                        </select>
                                    </div>
								</div>
                            </div>
                            <br>
							<div class="row justify-content-center">
                                <div class="col-md-4 form-group">
                                    <label for="">Tanggal Berangkat</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control startDateFlight" name="tanggal_berangkat" id="tanggal_berangkat" autocomplete="off" data-provide="datepicker" placeholder="dd-mm-yyyy" required>
                                    </div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="">Tanggal Pulang</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control endDateFlight" name="tanggal_pulang" id="tanggal_pulang" autocomplete="off" data-provide="datepicker" placeholder="dd-mm-yyyy" required>
                                    </div>
                                </div>
                            </div>	
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <label for="">Kategori</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-ticket-alt" style="color:#007bff"></i></span>
                                        </div>
                                    <select name="kategori_tiket" class="single-in form-control">
                                        @foreach ($kategori as $item)
                                    <option value="{{$item->nama_kategori}}">{{$item->nama_kategori}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                            </div>
							<div class="col-lg-12 d-flex justify-content-end">
								<a href="{{url('info-tiket-pesawat')}}"><button type="submit" class="primary-btn mt-20">Cari Tiket<span class="lnr lnr-arrow-right"></span></button></a>
							</div>		    	
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="bus">
                        {{-- <form class="booking-form" id="pesan_bus">					
                                <div class="row justify-content-center">
                                    <div class="col-md-5">
                                        <label for="">Keberangkatan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                <i class="fa fa-bus-alt" style="color:#007bff"></i>
                                                </span>
                                            </div>
                                            <select name="" id="single-select-bus" class="single-in form-control" placeholder="Cari" style="width:275px">
                                                <optgroup label="Jawa">
                                                    <option value="BDG">Bandung</option>
                                                    <option value="SBY">Surabaya</option>
                                                </optgroup>
                                                <optgroup label="Sumatera">
                                                    <option value="MD">Medan</option>
                                                    <option value="LP">Lampung</option>
                                                    <option value="AC">Aceh</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="">Tujuan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-bus-alt" style="color:#007bff"></i></span>
                                            </div>
                                            <select name="" id="single-select-bus2" class="single-in form-control" style="width:275px">
                                                <optgroup label="Jawa">
                                                    <option value="BDG">Bandung</option>
                                                    <option value="SBY">Surabaya</option>
                                                </optgroup>
                                                <optgroup label="Sumatera">
                                                    <option value="MD">Medan</option>
                                                    <option value="LP">Lampung</option>
                                                    <option value="AC">Aceh</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row justify-content-center">
                                    <div class="col-md-4 form-group">
                                    <label for="">Tanggal Berangkat</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control startDateBus" name="tanggal_berangkat" autocomplete="off" data-provide="datepicker" placeholder="dd-mm-yyyy">
                                        </div>
                                    </div>  
                                    <div class="col-md-3">
                                        <label for="">Jumlah Kursi</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-users" style="color:#007bff"></i></span>
                                            </div>
                                            <input type="number" name="jumlah_kursi" id="jumlah_kursi" class="single-in form-control" placeholder="Jumlah Kursi" min="0" min="50" autocomplete="off">
                                        </div>
                                    </div>
                                </div>	
                            <br>	        
                                <div class="col-lg-12 d-flex justify-content-end">
                                    <button class="primary-btn mt-20">Cari Tiket<span class="lnr lnr-arrow-right"></span></button>
                                </div>
                        </form>		  		 --}}
                    </div>
                </div>
            </div>
        </div>				  		  			 
	</div>
</section>
@endsection
