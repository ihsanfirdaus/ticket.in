<div class="card" id="ubah_pencarian" style="display:none">
    <div class="card-body">
        <form action="{{ route('cari_tiket') }}" method="GET">
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
            <button id="btn_cancel" class="btn btn-sm btn-danger" type="button" style="float: right;margin-top: -30px">x</button>
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
                        <input type="text" class="form-control startDateFlight" name="tanggal_berangkat" id="tanggal_berangkat" autocomplete="off" data-provide="datepicker" placeholder="dd-mm-yyyy" value="{{ request()->input('tanggal_berangkat')}}" required>
                    </div>
                </div>
                <div class="col-md-4 form-group">
                    <label for="">Tanggal Pulang</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control endDateFlight" name="tanggal_pulang" id="tanggal_pulang" autocomplete="off" data-provide="datepicker" placeholder="dd-mm-yyyy" value="{{ request()->input('tanggal_pulang')}}" required>
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
                        <select name="kategori_tiket" id="kategori_tiket" class="single-in form-control">
                            @foreach ($kategori as $item)
                            <option value="{{$item->nama_kategori}}">{{$item->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
			<div class="col-lg-12 d-flex justify-content-end">
				<button type="submit" class="primary-btn mt-20">Cari Tiket<span class="lnr lnr-arrow-right"></span></button>
			</div>		    	
        </form>
    </div>
</div>

 

