@extends('layouts/frontend')

@section('main-css')
    <style>
        #isi_data{
        border: none;
        box-shadow: 0px 0px 30px 0 rgba(158,158,158,.3);
        }    
    </style>    
@endsection

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card" id="isi_data">
                <div class="card-body">
                    <form action="#" method="POST">
                        <div class="card">
                            <div class="card-header background-header"><p>Data Pemesan</p></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">No HP ( Aktif )</label>
                                            <input type="text" class="single-in form-control" id="" name="phone_number" value="{{ Auth::user()->phone_number }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Jumlah Penumpang (D)</label>
                                            <input type="number" class="single-in form-control" name="jumlah_penumpang_dewasa" min="0" max="5" placeholder="0">
                                            <small class="text-muted">D : Dewasa</small>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Jumlah Penumpang (A)</label>
                                            <input type="number" class="single-in form-control" name="jumlah_penumpang_anak" min="0" max="5" placeholder="0">
                                            <small class="text-muted">A : Anak</small>
                                        </div>
                                    </div>
                                </div>                               
                        </div><br>
                        <button type="submit" class="btn btn-md btn-primary" style="float:right">Save</button>   
                    </form>
                    <br>
                </div>
            </div>
        </div>
        @foreach ($jadwal as $item)
        <div class="col-md-4">
            <div class="card" id="isi_data">
                <div class="card-header background-header">Jadwal Penerbangan</div>
                    <div class="card-body card-content">
                        <br>
                        <ul>
                            @php
                                Date::setLocale('id');
                                $date_go = Date::parse($item->tanggal_berangkat)->format('l, j F Y');
                                $date_back = Date::parse($item->tanggal_pulang)->format('l, j F Y');
                            @endphp
                            <li><p style="margin-top: -15px">Tanggal Berangkat : {{ $date_go }}</p></li>
                            <li><p style="margin-top: -15px">Tanggal Pulang : 
                            @if ($item->tanggal_pulang == 0)
                                @else
                                {{ $date_back }}
                            @endif</p></li>
                            <li><p style="margin-top: -15px">Waktu : {{$item->jurusan->waktu_k}} - {{$item->jurusan->waktu_t}}</p></li>
                            <li><img src="{{ asset('img/maskapai/'.$item->maskapai->gambar_maskapai.'')}}" alt="" width="100px" class="img-center"></li><br>
                            <li><p style="margin-top: -15px;text-align:center">
                            {{$item->jurusan->keberangkatan}} ( {{$item->jurusan->kode_penerbangan_k}} ) -> 
                            {{$item->jurusan->tujuan}} ( {{$item->jurusan->kode_penerbangan_t}} )</p></li>
                        </ul>
                    </div>
            </div>
            <br>
        </div> 
        @endforeach
    </div>
</div>
@endsection