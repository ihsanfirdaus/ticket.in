<br>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body" id="card_add" style="display: none">
            <form method="post" id="form-create" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-2 form-group">
                        <input type="radio" name="tipe_tiket" id="pulang_pergi" class="form-check-input" value="Pulang Pergi" checked="checked">
                        <label for="pulang_pergi" class="form-check-label">
                            Pulang Pergi
                        </label>
                    </div>        
                    <div class="col-md-2 form-group">
                        <input type="radio" name="tipe_tiket" id="sekali_jalan" class="form-check-input" value="Sekali Jalan">
                        <label for="sekali_jalan" class="form-check-label">
                            Sekali Jalan
                        </label>    
                    </div>         
                </div>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="kode_jadwal" value="{{Str::random(10)}}">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4 form-group">
                        <label for="">Tanggal Berangkat</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control startdatepicker" name="tanggal_berangkat" id="tanggal_berangkat" autocomplete="off" data-provide="datepicker">
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="">Tanggal Pulang</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control enddatepicker" name="tanggal_pulang" id="tanggal_pulang" autocomplete="off" data-provide="datepicker">
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="">Kategori Tiket</label>
                        <select name="id_kategori" id="id_kategori" class="form-control">
                            @foreach ($kategori as $item)
                        <option value="{{$item->id}}">{{$item->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="">Maskapai</label>
                        <select name="id_maskapai" id="id_maskapai" class="form-control">
                            @foreach ($maskapai as $item)
                        <option value="{{$item->id}}">{{$item->nama_maskapai}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5 form-group">
                        <label for="">Jurusan</label>
                        <select name="id_jurusan" id="id_jurusan" class="form-control">
                            @foreach ($jurusan as $item)
                        <option value="{{$item->id}}">
                {{$item->keberangkatan}} - {{$item->tujuan}} ({{$item->waktu_k}} - {{$item->waktu_t}})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="">Harga Tiket</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Rp</span>
                            </div>
                        <input type="text" name="harga_tiket" id="harga_tiket" class="form-control rupiah">
                        </div>    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-md btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
