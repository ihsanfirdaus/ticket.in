@extends('layouts/backend')

@section('content')
<div class="container-fluid">

    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <i class="icon-book"></i>&nbsp;&nbsp;<b>Data Pemesanan</b>

          {{-- Button Load Data --}}
          <button id="load-data" class="btn btn-sm btn-success" style="float:right" title="Load Data">
            <i class="icon-sync"></i>
          </button>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="list-pemesanan" width="100%">
            <thead>
              <tr>
                <th>No Pemesanan</th>
                <th>Nama Pemesan</th>
                <th>Jumlah Penumpang</th>
                <th>Harga Total</th>
                <th>Tanggal Pemesanan</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>     
            <tbody> 
            </tbody>
          </table>
        </div>   
      </div>
 </div>
</div>
@endsection
@section('js-ajax')
    <script src="{{asset('js/backend/pemesanan.js')}}"></script>
@endsection