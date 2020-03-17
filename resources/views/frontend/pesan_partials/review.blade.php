@extends('layouts/frontend')

@section('content')
<br>
<div class="container">
    <div class="card">
        <div class="card-body" id="card_notifikasi">
            <div class="row">
                <i class="fa fa-check-circle" id="notif_1"></i>  <p>Harga telah dikonfirmasi. Periksa kembali pemesanan anda, lalu tekan tombol <b>Lanjut ke Pembayaran</b></p>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header background-header"><p>Rincian Penerbangan</p></div>
                <div class="card-body card-content">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body card_detail_penerbangan" style="height:65px">
                                <p>No.Pesanan : <b style="float:right">102213881</b></p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body card-content">
                                <br>
                                <ul>
                                    <li><p style="margin-top: -15px">Sabtu, 29 Februari 2020</p></li>
                                    <li><p style="margin-top: -15px">Bandung ( BDO ) -> Medan ( MDN )</p></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body" style="background-color:#dedede">
                    <h6 style="color:#000">Rincian Harga :</h6>
                    <ul style="margin-top: -15px">
                        <p style="float:left">Dewasa : 1 </p><span style="float:right">Rp 500.000</span>
                        <br>
                        <p style="float:left;margin-left:-75px">Anak : 0 </p><span style="float:right">Rp 0</span>
                        <br>
                        <hr>
                        <p style="float:left">Total : </p><span style="float:right;font-weight:600">Rp 500.000</span>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">  
        <div class="col-md-4">
            <div class="card">
                <div class="card-header background-header"><p>Daftar Penumpang</p></div>
                <div class="card-body Addscroll">
                    <p style="font-weight:600">1. Dewasa</p>   
                    <p>Nama Lengkap : Ihsan Nurul Falah Firdaus</p>
                    <p>No. Kursi : 2</p><br>
                    {{-- <h6 style="color:#000">2. Dewasa</h6>   
                    <p>Nama Lengkap : Lani Suheni</p>
                    <p>No. Kursi : 3</p><br><hr>
                    <h6 style="color:#000">1. Anak</h6>   
                    <p>Nama Lengkap : M Jordan</p>
                    <p>No. Kursi : 4</p><br> --}}
                </div>    
            </div>    
        </div>     
        <div class="col-md-8">
            <div class="card">
                <div class="card-body" style="background-color: #dedede">
                    <h6 style="color:#000">Lanjut ke Pembayaran</h6>
                    <p>Dengan menekan tombol dibawah. Anda menyetujui <a href="
                        ">Syarat & Ketentuan</a> serta <a href="">Kebijakan Privasi </a>Ticket.in</p>

                    <a href="{{url('pesan-tiket/metode-pembayaran')}}"><button type="button" class="btn btn-outline-primary">Lanjut ke Pembayaran &nbsp;<i class="fa fa-arrow-right"></i></button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection