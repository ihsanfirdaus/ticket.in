@extends('layouts/frontend')

@section('main-css')
<link rel="stylesheet" href="{{asset('Front-end/css/animate.css/animate.min.css')}}">
<style>
    th{
        text-align: center;
    }
    td{
        text-align: center;
    }
    #detail_pencarian{
        border: none;
        box-shadow: 0px 0px 30px 0 rgba(158,158,158,.3);
    }
    #ubah_pencarian{
        border: none;
        box-shadow: 0px 0px 30px 0 rgba(158,158,158,.3);
    }
</style>
@endsection
@section('content')
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card" id="detail_pencarian">
                <div class="card-body">
                    {{-- JURUSAN --}}
                    <div class="row">
                        <div class="col-md-10">
                            <h4>{{ request()->input('keberangkatan') }} <i class="lnr lnr-arrow-right" style="color:#000"></i>
                                {{ request()->input('tujuan') }}</h4>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                    <div class="col-md-8">
                    @php
                        Date::setLocale('id');
                        $date_go = request()->input('tanggal_berangkat');
                        $date_home = request()->input('tanggal_pulang');
                        $tanggal_berangkat = Date::parse($date_go)->format('j F Y');
                        $tanggal_pulang = Date::parse($date_home)->format('j F Y');
                    @endphp
                    {{-- DETAIL PENCARIAN --}}
                    <p>Tipe Tiket: {{ request()->input('tipe_tiket')}}<br>
                    Tanggal Berangkat: {{ $tanggal_berangkat }}<br>
                    Tanggal Pulang: @if ($date_home == 0)
                                        <p></p>
                                    @else
                                        {{ $tanggal_pulang }} <br>
                                    @endif
                    Kategori Tiket: {{request()->input('kategori_tiket')}}</p>                    
                    
                    </div>
                    <div class="col-md-6 ml-auto">
                        <button id="btn_pencarian" class="btn btn-md btn-primary" type="button" style="float: right;margin-top: -50px">Ubah Pencarian</button>
                    </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                @include('frontend/ubah-pencarian')
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card" id="card_content">
                    <div class="card-body">
                        <hr>
                        <div class="row">
                            <div class="container">
                                Filter:                              
                                        {{-- <span class="dropdown-toggle" data-toggle="dropdown" style="margin-left: 35px;cursor:pointer">
                                            Airlines <b class="caret"></b>
                                        </span>
                                        <ul class="dropdown-menu" style="padding: 10px">
                                            <li style="margin-bottom: 10px"><input type="checkbox" name="" id=""> Garuda Indonesia 
                                                <img src="{{ asset('img/logo-garudaindo.png')}}" alt="" style="width: 30px;margin-left: 20px;float:right"></li>
                                            <li><input type="checkbox" name="" id=""> Air Asia
                                                <img src="{{ asset('img/logo-airasia.png')}}" alt="" style="width: 30px;margin-left: 20px;float:right">
                                            </li>
                                        </ul> --}}
                            </div>
                        </div>
                        <hr>
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered" id="table-info">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Maskapai</th>
                                            <th><i class="fa fa-plane-departure" style="color:#007bff;margin-right:10px"></i>Keberangkatan</th>
                                            <th><i class="fa fa-plane-arrival" style="color:#007bff;margin-right:10px"></i>Tujuan</th>
                                            <th><i class="fa fa-clock" style="color:#007bff;margin-right:10px"></i>Waktu</th>
                                            <th>Harga Tiket</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($jadwal as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td><img class="img-center" src="{{asset('img/maskapai/'.$item->maskapai->gambar_maskapai.'')}}" alt="" width="80px"></td>
                                                <td>{{ $item->jurusan->bandara_k }} <br>
                                                   ({{ $item->jurusan->kode_penerbangan_k }})</td>
                                                <td>{{ $item->jurusan->bandara_t }} <br>
                                                   ({{ $item->jurusan->kode_penerbangan_t}})</td>
                                                <td>{{ $item->jurusan->waktu_k}} - {{$item->jurusan->waktu_t}}</td>
                                                <td><h4 style="color:#17A2BB;margin-bottom:10px">Rp{{$item->harga_tiket}}</h4>
                                                    <a href="/isi-data/{{$item->kode_jadwal}}"><button class="btn btn-md btn-primary" id="btn_choose">Pesan &nbsp; <i class="fa fa-check" style="color:#fff"></i></button></a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if ($jadwal->isEmpty())
                                    <p style="text-align:center">Hasil tidak ditemukan :(</p>
                                    @else
                                        Hasil Pencarian : {{ $jadwal->total()}} Tiket
                                    
                                @endif
                                <div style="float:right">{{ $jadwal->appends(request()->input())->links() }}</div>     
                            </div>    
                        </div>                
                                        
                    </div>
                   <br>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('main-js')
    <script>
        const element1 = document.querySelector("#detail_pencarian");
        element1.classList.add("animated", "fadeIn");

        const element2 = document.querySelector("#ubah_pencarian");
        element2.classList.add("animated", "fadeIn");
    </script>
@endsection

