@extends('layouts/frontend')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body card-content">
                    <form action="#" method="post">
                        <div id="pemesan">
                            <div class="card">
                                <div class="card-header background-header"><p>Data Pemesan</p></div>
                                    <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Nama Kontak</label>
                                                        <input type="text" class="single-in form-control" name="nama_kontak">
                                                        <small class="text-muted">Sesuai dengan KTP/Passport/SIM</small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">No HP (Aktif)</label>
                                                        <input type="text" class="single-in form-control" name="no_hp">
                                                    </div> 
                                                </div>
                                            </div>
                                     </div>
                            </div>
                        </div>
                        <div id="penumpang" style="display:none">
                            <div class="card">
                                <div class="card-header background-header"><p>Data Penumpang</p></div>
                                <div class="card-body Addscroll">
                                    <p style="font-weight:600">1. Dewasa ( 18 Tahun > )</p>
                                    <div class="row justify-content-center">
                                        <div class="col-md-8">
                                        <label for="">Nama Lengkap</label>
                                        <input type="text" class="single-in form-control" name="np_dewasa">
                                        </div>
                                        <div class="col-md-3">
                                        <label for="">No Kursi</label>
                                        <select name="no_kursi" id="" class="single-in form-control">
                                            <option value="">- Pilih -</option>
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4</option>
                                            <option value="">5</option>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">                           
                            <a href="{{url('pesan-tiket/review-pemesanan')}}"><button type="button" class="btn btn-primary" style="float:right;display:none" id="save">Save</button></a>
                        </div>
                    </form>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                        <button type="button" class="btn btn-info" id="next" style="float:right">Selanjutnya ></button>
                        <button type="button" class="btn btn-info" id="prev" style="display:none;float:right">< Sebelumnya</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header background-header">Penerbangan</div>
                <div class="card-body card-content">
                    <br>
                    <ul>
                        <li><p style="margin-top: -15px">Sabtu, 29 Februari 2020</p></li>
                        <li><p style="margin-top: -15px">Bandung ( BDO ) -> Medan ( MDN )</p></li>
                    </ul>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-body" style="background-color:#dedede">
                    <h6 style="color:#000">Rincian Harga :</h6>
                    <ul style="margin-top: -15px">
                        <p style="float:left">Dewasa : 1 </p><span style="float:right">Rp 500.000</span>
                        <br>
                        <p style="float:left;margin-left:-75px">Anak : 0 </p><span style="float:right">Rp 0</span>
                        <br>
                        {{-- <p style="float:left">Bayi : 0 </p><span style="float:right">Rp 0</span> --}}
                        <br>
                        <hr>
                        <p style="float:left">Total : </p><span style="float:right;font-weight:600">Rp 500.000</span>
                    </ul>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection