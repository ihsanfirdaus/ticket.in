@extends('layouts/frontend')

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
						<form class="booking-form" id="pesan_pesawat" data-toggle="validator" role="form">
							<div class="row justify-content-center">
								<div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="pulang_pergi" name="tipe_tiket" class="custom-control-input" checked="checked">
                                    <label class="custom-control-label" for="pulang_pergi">Pulang Pergi</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="sekali_jalan" name="tipe_tiket" class="custom-control-input">
                                    <label class="custom-control-label" for="sekali_jalan">Sekali Jalan</label>
                                </div>    
							</div>
							<hr>
							<div class="row justify-content-center">
								<div class="col-md-5">
                                    <label for="Departure">Keberangkatan</label>
									<div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                            <i class="fa fa-plane-departure" style="color:#007bff"></i>
                                            </span>
                                        </div>
                                        <select name="keberangkatan" id="keberangkatan" class="single-in form-control" placeholder="Cari">
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
                                    <label for="Arrival">Tujuan</label>
									<div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                            <i class="fa fa-plane-arrival" style="color:#007bff"></i>
                                            </span>
                                        </div>
                                        <select name="tujuan" id="tujuan" class="single-in form-control">
                                            <optgroup label="Jawa">
                                                {{-- <option value="BDG">Bandung</option> --}}
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
                            <br>	
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <label for="">Kategori</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-ticket-alt" style="color:#007bff"></i></span>
                                        </div>
                                    <select name="id_kategori" id="id_kategori" class="single-in form-control">
                                        @foreach ($kategori as $item)
                                    <option value="{{$item->id}}">{{$item->nama_kategori}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="card">
                                        <div class="card-body">
                                        <p style="text-align:center">Penumpang</p>
                                        <hr>
                                        <div class="row justify-content-center">
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" id="without_child" name="opsi_anak" class="custom-control-input">
                                                <label class="custom-control-label" for="without_child">Tidak ada anak</label>
                                            </div>
                                        </div>
                                        <hr>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-users" style="color:#007bff"></i></span>
                                        </div>
                                        <input type="number" title="Umur 18 Tahun >" name="dewasa" id="dewasa" class="single-in form-control" placeholder="Dewasa" autocomplete="off" required>
                                        <input type="number" title="Umur 2 - 17 Tahun" name="anak" id="anak" class="single-in form-control" placeholder="Anak" autocomplete="off">
                                    </div>
                                        </div>
                                    </div>
								</div>
                            </div>
							<div class="col-lg-12 d-flex justify-content-end">
								<a href="{{url('info-tiket-pesawat')}}"><button type="button" class="primary-btn mt-20">Cari Tiket<span class="lnr lnr-arrow-right"></span></button></a>
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
@push('main-js')
    <script>
        

    </script>
@endpush