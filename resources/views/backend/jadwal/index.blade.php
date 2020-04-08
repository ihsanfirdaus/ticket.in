@extends('layouts/backend')

@section('css-plugin')
<link rel="stylesheet" href="{{asset('SB-Admin/vendor/daterangepicker/daterangepicker.min.css')}}">
<link rel="stylesheet" href="{{asset('SB-Admin/vendor/fontawesome-free/css/fontawesome.min.css')}}">
<style>
  input[type=radio]{
    cursor: pointer;
  }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <i class="icon-calendar"></i>&nbsp;<b>Data Jadwal</b>

          {{-- Button Load Data --}}
          <button id="load-data" class="btn btn-sm btn-success" style="float:right" title="Load Data">
            <i class="icon-sync"></i>
          </button>
          {{-- Button Add Data --}}
          <button id="btn_add" title="Add" style="float:right;margin-right:5px;" class="btn btn-sm btn-primary">
            <i class="icon-plus2"></i>
          </button>

          <button id="btn_cancel" title="Cancel" style="float:right;margin-right:5px;display:none" class="btn btn-sm btn-danger" >
            <i class="icon-minus3"></i>
          </button>
      </div>
      <div class="card-body" id="table_jadwal">
        <div class="table-responsive">
          <table class="table table-bordered" id="list-jadwal" width="100%">
            <thead class="thead-primary">
              <tr>
                <th style="text-align:center">Maskapai</th>
                <th width="90px">Tanggal Berangkat</th>
                <th width="90px">Tanggal Pulang</th>
                <th style="text-align:center">Jurusan</th>
                <th>Harga Tiket</th>
                <th>Tipe Tiket</th>
                <th></th>
              </tr>
            </thead>   
            <tbody>
            </tbody>
          </table>
        </div>   
      </div>
      @include('backend/jadwal/create')
 </div>
</div>
@endsection
@section('js-plugin')
    <script src="{{asset('SB-Admin/vendor/daterangepicker/daterangepicker.min.js')}}"></script>
    <script src="{{asset('SB-Admin/vendor/jquery-mask/jquery.mask.min.js')}}"></script>
@endsection
@section('js-ajax')
    <script src="{{asset('js/backend/jadwal.js')}}"></script>
@endsection

