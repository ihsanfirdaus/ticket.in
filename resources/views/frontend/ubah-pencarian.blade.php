<div class="row justify-content-center">
    <div class="col-md-10">
    <form class="booking-form" id="pesan_pesawat" style="display:none">
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
                                        <select name="" id="single-select" class="single-in form-control" style="width:275px">
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
                                        <select name="" id="single-select2" class="single-in form-control" style="width:275px">
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
                                        <input type="text" class="form-control startDateFlight" name="tanggal_berangkat" id="tanggal_berangkat" autocomplete="off" data-provide="datepicker" placeholder="dd-mm-yyyy">
                                    </div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="">Tanggal Pulang</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control endDateFlight" name="tanggal_pulang" id="tanggal_pulang" autocomplete="off" data-provide="datepicker" placeholder="dd-mm-yyyy">
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
                            </div>
							<div class="col-lg-12 d-flex justify-content-end">
								<a href="{{url('info-tiket')}}"><button type="button" class="primary-btn mt-20">Cari Tiket<span class="lnr lnr-arrow-right"></span></button></a>
							</div>		    	
    </form>
</div>
</div>