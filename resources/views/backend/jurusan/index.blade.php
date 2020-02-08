@extends('layouts/backend')

@section('css-plugin')
  <link rel="stylesheet" href="{{asset('SB-Admin/vendor/timepicker/jquery.timepicker.min.css')}}">
@endsection

@section('js-plugin')
  <script src="{{asset('SB-Admin/vendor/timepicker/jquery.timepicker.min.js')}}"></script>
@endsection
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <i class="icon-map4"></i>&nbsp; <b>Data Jurusan</b>

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
      <div class="card-body" id="table_jurusan">
        <div class="table-responsive">
          <table class="table table-bordered" id="list-jurusan" width="100%">
            <thead class="thead-primary">
              <tr>
                <th>ID</th>
                <th>Keberangkatan</th>
                <th>Tujuan</th>
                <th>Waktu</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>    
      </div>
      @include('backend/jurusan/create')
    </div>
</div>
@endsection
@section('js-ajax')
    <script src="{{asset('js/backend/jurusan.js')}}"></script>
@endsection
@section('js-plugin')
    
@endsection