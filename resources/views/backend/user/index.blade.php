@extends('layouts/backend')

@section('css-plugin')
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <i class="icon-user"></i>&nbsp;&nbsp;<b>Data User</b>
          <button id="load-data" class="btn btn-sm btn-success" style="float:right" title="Load Data">
            <i class="icon-sync"></i>
          </button>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="list-user" width="100%">
            <thead class="thead-primary">
              <tr>
                <th>Nama</th>
                <th>Email</th>
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
    <script src="{{asset('js/backend/user.js')}}"></script>
@endsection




