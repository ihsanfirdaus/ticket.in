@extends('layouts/frontend')

@section('content')
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card" id="card_content">
                    <div class="card-body">
                        {{-- JURUSAN --}}
                        <div class="row">
                            <div class="col-md-10">
                                <h4>Bandung ( BDO ) <i class="lnr lnr-arrow-right" style="color:#000"></i> Medan ( MDN )</h4>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="col-md-8">
                        {{-- TANGGAL BERANGKAT --}}
                        <p><script>document.write(new Date());</script></p>
                        {{-- PENUMPANG & KATEGORI TIKET --}}
                        <p>Dewasa: 1, Anak: 0 | Ekonomi</p>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <button id="btn_pencarian" class="btn btn-md btn-primary" type="button" style="float: right;margin-top: -50px">Ubah Pencarian</button>
                            <button id="btn_cancel" class="btn btn-md btn-danger" type="button" style="float: right;margin-top: -50px;display:none">Batal</button>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="container" id="filter_tiket">
                                Filter:                              
                                        <span class="dropdown-toggle" data-toggle="dropdown" style="margin-left: 35px;cursor:pointer">
                                            Airlines <b class="caret"></b>
                                        </span>
                                        <ul class="dropdown-menu" style="padding: 10px">
                                            <li style="margin-bottom: 10px"><input type="checkbox" name="" id=""> Garuda Indonesia 
                                                <img src="{{ asset('img/logo-garudaindo.png')}}" alt="" style="width: 30px;margin-left: 20px;float:right"></li>
                                            <li><input type="checkbox" name="" id=""> Air Asia
                                                <img src="{{ asset('img/logo-airasia.png')}}" alt="" style="width: 30px;margin-left: 20px;float:right">
                                            </li>
                                        </ul>
                            </div>
                        </div>
                        @include('frontend/ubah-pencarian')
                        <hr>
                        <div class="card" id="card_info">
                            <div class="card-body">
                                <div class="row" id="row-info">
                                    <div class="col-md-4">                                        
                                        <img src="{{ asset('img/logo-garudaindo.png')}}" alt="" width="150px" height="100px">
                                    </div>
                                    <div class="col-md-2">
                                        <h5>16:30</h5>
                                        <p>Bandung (HA)</p>
                                    </div>
                                    <div class="col-md-2">
                                        <h5>20:00</h5>
                                        <p>Jakarta (GA)</p>
                                    </div>
                                    <div class="col-md-2">
                                        <h5 style="text-align:center">3 Jam 30 Menit</h5>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="row justify-content-center">
                                            <h4 style="color:#6610f2">Rp500.000</h4><br><br>
                                            <a href="{{ url('pesan-tiket/isi-data')}}"><button class="btn btn-md btn-primary" type="button" id="btn_choose">Pesan &nbsp;<i class="fa fa-check" style="color:#fff"></i></button></a><br>
                                            <button type="button" class="btn btn-outline-info btn-sm" style="margin-top:8px" id="btn_fasilitas">Lihat Fasilitas</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center" id="row-fasilitas"  style="display:none">
                                    <div class="col-md-2">
                                        <i class="fa fa-wifi" style="font-size:40px"></i><br>
                                        <h4>FREE</h4><small class="text-muted">Up to 100mb/s</small>
                                    </div>
                                    <div class="col-md-2">
                                        <i class="fa fa-bed" style="font-size:40px"></i><br>
                                        <h4>FREE</h4><small class="text-muted">Premium Bed</small>
                                    </div>
                                    <div class="col-md-2">
                                        <i class="fa fa-tv" style="font-size:40px"></i><br>
                                        <h4>FREE</h4><small class="text-muted">All Channel in the world</small>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-outline-danger btn-sm" style="margin-top:8px;float:right" id="btn_close_fsl">X</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4"> 
                                        <div class="container-fluid">
                                        <img src="{{ asset('img/logo-airasia.png')}}" alt="" width="100px" height="100px">    
                                        </div>                                       
                                    </div>
                                    <div class="col-md-2">
                                        <h5>20:45</h5>
                                        <p>Bandung (HA)</p>
                                    </div>
                                    <div class="col-md-2">
                                        <h5>22:45</h5>
                                        <p>Jakarta (GA)</p>
                                    </div>
                                    <div class="col-md-2">
                                        <h5 style="text-align:center">2 Jam</h5>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="row justify-content-center">
                                            <h4 style="color:#6610f2">Rp600.000</h4><br><br>
                                            <a href="{{ url('pesan-tiket')}}"><button class="btn btn-md btn-primary" type="button" id="btn_choose">Pesan &nbsp;<i class="fa fa-check" style="color:#fff"></i></button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   <div class="container">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                   </div>
                   <br>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('main-js')
    <script>
        $("#btn_pencarian").click(function() {
            $("#pesan_pesawat").show();
            $("#filter_tiket").hide();
            $("#btn_pencarian").hide();
            $("#btn_cancel").show();
        });
        $("#btn_cancel").click(function() {
           $("#pesan_pesawat").hide();
           $("#filter_tiket").show();
           $("#btn_pencarian").show();
           $("#btn_cancel").hide(); 
        })

        function matchStart(params, data) {
                // If there are no search terms, return all of the data
                if ($.trim(params.term) === '') {
                    return data;
                }

                // Skip if there is no 'children' property
                if (typeof data.children === 'undefined') {
                    return null;
                }

                // `data.children` contains the actual options that we are matching against
                var filteredChildren = [];
                $.each(data.children, function (idx, child) {
                    if (child.text.toUpperCase().indexOf(params.term.toUpperCase()) == 0) {
                    filteredChildren.push(child);
                    }
                });

                // If we matched any of the timezone group's children, then set the matched children on the group
                // and return the group object
                if (filteredChildren.length) {
                    var modifiedData = $.extend({}, data, true);
                    modifiedData.children = filteredChildren;

                    // You can return modified objects from here
                    // This includes matching the `children` how you want in nested data sets
                    return modifiedData;
                }

                // Return `null` if the term should not be displayed
                return null;
        }
        $( "#single-select" ).select2( {
				// width: null,
                // containerCssClass: ':all:',
                matcher: matchStart
		} );
        $( "#single-select2" ).select2( {
				// width: null,
                // containerCssClass: ':all:',
                matcher: matchStart
		} );
    </script>
@endpush
