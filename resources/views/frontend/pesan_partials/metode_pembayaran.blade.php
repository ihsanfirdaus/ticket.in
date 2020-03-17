@extends('layouts/frontend')

@section('content')
<br>
<div class="container">
    <div class="card" style="height:85px">
        <div class="card-body" id="card_notifikasi">
            <div class="row">
                <i class="fa fa-check-circle" id="notif_2"></i><p>Pemesanan dan Harga untuk pemesan dengan nama <b>Ihsan Nurul Falah Firdaus</b> telah dikonfirmasi <br>Mohon selesaikan Pembayaran untuk menghindari pembatalan oleh maskapai.</p>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header background-header"><h5 style="color:#fff">Metode Pembayaran</h5></div>
                <div class="card-body card-content">
                    <div class="row justify-content-center">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-2">
                                    <img src="{{asset('Front-end/img/Metode Pembayaran/bank-bri.jpg')}}" alt="" width="100px" id="ch_bri">
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-2">
                                    <img src="{{asset('Front-end/img/Metode Pembayaran/bank-bca.jpg')}}" alt="" width="100px" id="ch_bca">
                                </div>
                            </div>
                        </div>
                        {{-- <div class="card">
                            <div class="card-body">
                                <div class="col-md-2">
                                    <img src="{{asset('Front-end/img/Metode Pembayaran/dana.png')}}" alt="" width="100px" style="margin-top:15px">
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-2">
                                    <img src="{{asset('Front-end/img/Metode Pembayaran/gopay.jpg')}}" alt="" width="100px">
                                </div>
                            </div>
                        </div> --}}
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-2">
                                    <img src="{{asset('Front-end/img/Metode Pembayaran/indomaret.png')}}" alt="" width="100px" style="margin-top:15px" id="ch_indomaret">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-7">
           <div id="detail">
            <div class="card">
                <div class="card-header background-header">Sisa Waktu <p style="float:right">2 Jam 55 Menit</p></div>
                <div class="card-body" style="height:65px">
                    <p>No.Pesanan : <b style="float:right">102213881</b></p>
                </div>
            </div>
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
           <div id="indomaret" style="display:none">
               @include('frontend/pesan_partials/m_pembayaran/indomaret')
           </div>
           <div id="bri" style="display:none">
               @include('frontend/pesan_partials/m_pembayaran/bank-bri')
            </div>
            <div id="bca" style="display:none">
                @include('frontend/pesan_partials/m_pembayaran/bank-bca')
             </div>
        </div>
        
        <div class="col-md-5">
            <div class="card">
                <div class="card-header background-header"><p>Penerbangan</p></div>
                <div class="card-body">
                    <br>
                    <ul>
                        <li><p style="margin-top: -15px">Sabtu, 29 Februari 2020</p></li>
                        <li><p style="margin-top: -15px">Bandung ( BDO ) -> Medan ( MDN )</p></li>
                    </ul>
                </div>
            </div><br>
            <div class="card">
                <div class="card-header background-header"><p>Daftar Penumpang</p></div>
                <div class="card-body Addscroll">
                    <p style="color:#000;font-weight:600">1. Dewasa</p>   
                    <p>Nama Lengkap : Ihsan Nurul Falah Firdaus</p>
                    <p>No. Kursi : 2</p><br>
                </div>    
            </div>   
        </div>
    </div>
</div>
@endsection