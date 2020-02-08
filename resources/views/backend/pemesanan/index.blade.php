@extends('layouts/backend')
@section('css')
    <style>
      
    </style>
@endsection
@section('content')
<div class="container-fluid">

    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <i class="icon-book"></i>&nbsp;&nbsp;<b>Data Booking</b>

          {{-- Button Load Data --}}
          <button id="load-data" class="btn btn-sm btn-success" style="float:right" title="Load Data">
            <i class="icon-sync"></i>
          </button>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="list-booking" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th width="50px">No Booking</th>
                <th>Jadwal</th>
                <th>Nama Pemesan</th>
                <th width="50px">Jumlah Penumpang</th>
                <th>Harga Total</th>
                <th >Tanggal Booking</th>
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
@section('js')
    <script src="{{asset('js/backend/booking.js')}}"></script>
@endsection