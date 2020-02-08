@extends('layouts/frontend')

@section('css-plugin')
    {{-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> --}}
@endsection

@section('content')
<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a class="nav-item nav-link active" id="nav-pesawat-tab" data-toggle="tab" href="#nav-pesawat" role="tab" aria-controls="nav-pesawat" aria-selected="true">
        <i class="icon-airplane2"></i> Pesawat</a>
      <a class="nav-item nav-link" id="nav-bus-tab" data-toggle="tab" href="#nav-bus" role="tab" aria-controls="nav-bus" aria-selected="false">
        <i class="icon-bus"></i> Bus</a>
      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">
        <i class="icon-phone"></i> Kontak</a>
    </div>
</nav>
  <div class="tab-content" id="nav-tabContent">

    <div class="tab-pane fade show active" id="nav-pesawat" role="tabpanel" aria-labelledby="nav-pesawat-tab">
    <div class="section" id="content-pesawat">
		<div class="section-center">
			<div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
						<div class="booking-cta">
							<h1>Pesan Tiket Pesawat</h1>
						</div>
					</div>
                </div>
				<div class="row justify-content-center">
					<div class="col-md-7 col-md-offset-1">
						<div class="booking-form">
							<form>
                                <div class="row justify-content-center">
                                    <div class="col-md-4">
                                        <input type="radio" name="type-pergi" id="" value="Sekali Jalan"> Sekali Jalan
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" name="type-pergi" id="" value="Pulang Pergi"> Pulang Pergi
                                    </div>
                                </div>
                                <hr>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="">Dari</label>
											<input class="form-control" type="text" placeholder="Kota">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="">Ke</label>
											<input class="form-control" type="text" placeholder="Kota">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="">Tanggal Berangkat</label>
											<input class="form-control" type="date" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="">Tanggal Pulang</label>
											<input class="form-control" type="date" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="">Kategori</label>
											<select class="form-control">
												<option>Ekonomi</option>
												<option>Bisnis</option>
												<option>Kelas Pertama</option>
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
								</div>
								<div class="form-btn">
									<button class="btn btn-light">Lihat Jadwal</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    </div>
    <div class="tab-pane fade" id="nav-bus" role="tabpanel" aria-labelledby="nav-bus-tab">
        <div class="section" id="content-bus">
            <div class="section-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="booking-cta">
                                <h1>Pesan Tiket Bus</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-7 col-md-offset-1">
                            <div class="booking-form">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Dari</label>
                                                <input class="form-control" type="text" placeholder="Kota">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Ke</label>
                                                <input class="form-control" type="text" placeholder="Kota">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Tanggal Berangkat</label>
                                                <input class="form-control" type="date" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Tanggal Pulang</label>
                                                <input class="form-control" type="date" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Kategori</label>
                                                <select class="form-control">
                                                    <option>Ekonomi</option>
                                                    <option>Bisnis</option>
                                                    <option>Kelas Pertama</option>
                                                </select>
                                                <span class="select-arrow"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-btn">
                                        <button class="btn btn-light">Lihat Jadwal</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
  </div>

  
@endsection