@extends('layouts/backend')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha256-siyOpF/pBWUPgIcQi17TLBkjvNgNQArcmwJB8YvkAgg=" crossorigin="anonymous" />
@endsection

@section('content')
<div class="container-fluid">

    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <i class="icon-calendar"></i>&nbsp;&nbsp;<b>Data Jadwal</b>

          {{-- Button Load Data --}}
          <button id="load-data" class="btn btn-sm btn-success" style="float:right" title="Load Data">
            <i class="icon-sync"></i>
          </button>
          {{-- Button Add Data --}}
          <a href="#modal-add" uk-toggle>
            <button title="Add" style="float:right;margin-right:5px;" class="btn btn-sm btn-primary">
              <i class="icon-plus2"></i>
            </button>
          </a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="list-jadwal" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th width="50px">Tanggal Berangkat</th>
                <th>Kendaraan</th>
                <th>Jumlah Kursi</th>
                <th>Jurusan</th>
                <th>Pengemudi</th>
                <th>Harga Tiket</th>
                <th></th>
              </tr>
            </thead>   
            <tbody>
              @foreach ($jadwal as $data)
                  <tr>
                  <td>{{ $data->id }}</td>
                  <td>{{ $data->tanggal_berangkat }}</td>
                  <td>{{ $data->kendaraan->jenis_kendaraan }} </td>
                  <td>{{ $data->kendaraan->jumlah_kursi }}</td>
                  <td>{{ $data->jurusan->keberangkatan }} - {{ $data->jurusan->tujuan}}
                     ({{ $data->jurusan->waktu }})
                  </td>
                  <td>{{ $data->sopir->nama }}</td>
                  <td>Rp. {{ $data->harga_tiket }}</td>
                  <td>
                      <center>
                      <button title="Edit" type="button" id="'{{$data->id}}'" class="btn btn-sm btn-outline-warning"><i class="icon-pencil"></i></button>
                      <button title="Delete" type="button" id="'{{$data->id}}'" class="btn btn-sm btn-outline-danger"><i class="icon-trash"></i>
                      </button>
                      </center>
                  </td>
                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>   
      </div>
 </div>
 {{-- Modal Add --}}
 <div id="modal-add" uk-modal>
  <div class="uk-modal-dialog">
      <div class="uk-modal-header">
          <h2 class="uk-modal-title">Add Data</h2>
      </div>
      <div class="uk-modal-body">
        <form class="uk-grid-small" uk-grid>
          <div class="uk-width-1-1">
            <label class="uk-form-label">Tanggal Berangkat</label>
            <div class="uk-form-controls">
              <input class="uk-input datepicker" type="text">
            </div>
          </div>
          <div class="uk-width-1-2@s">
            <label class="uk-form-label" for="form-stacked-select">Kendaraan</label>
            <div class="uk-form-controls">
                <select class="uk-select" id="form-stacked-select">
                    @foreach ($kendaraan as $item)
                     <option value="{{ $item->id }}">{{ $item->jenis_kendaraan}}</option>
                    @endforeach
                </select>
            </div>
          </div>
          <div class="uk-width-1-2@s">
            <label class="uk-form-label" for="form-stacked-select">Jurusan</label>
            <div class="uk-form-controls">
                <select class="uk-select" id="form-stacked-select">
                  @foreach ($jurusan as $item)
                  <option value="{{ $item->id }}">
                  {{ $item->keberangkatan}} - {{ $item->tujuan }} ({{ $item->waktu }})</option>
                  @endforeach
                </select>
            </div>
          </div>
          <div class="uk-width-1-2@s">
            <label class="uk-form-label" for="form-stacked-select">Pengemudi</label>
            <div class="uk-form-controls">
                <select class="uk-select" id="form-stacked-select">
                  @foreach ($pengemudi as $item)
                  <option value="{{ $item->id }}">
                  {{ $item->nama }} - {{ $item->peran }}</option>
                  @endforeach
                </select>
            </div>
          </div>
          <div class="uk-width-1-1">
            <label class="uk-form-label">Harga Tiket</label>
            <div class="uk-form-controls">
              <input class="uk-input" type="text" placeholder="Rp.">
            </div>
          </div>
        </form>
      </div>
      <div class="uk-modal-footer uk-text-right">
          <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
          <button class="uk-button uk-button-primary" type="button">Save</button>
      </div>
  </div>
 </div>
 {{-- End Modal Add --}}
</div>
@endsection
@section('js')
    <script src="{{asset('js/backend/jadwal.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha256-bqVeqGdJ7h/lYPq6xrPv/YGzMEb6dNxlfiTUHSgRCp8=" crossorigin="anonymous"></script>
@endsection