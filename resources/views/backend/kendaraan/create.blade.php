<br>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body" id="card_add" style="display:none">
            <form id="form-create" method="POST">
                @csrf
                {{-- Row : 1 --}}
                <div class="row justify-content-center">
                        <div class="col-md-2 form-group">
                            <label for="jenis_k">Jenis</label>
                            <select name="id_jenis" id="id_jenis" class="form-control">
                                @foreach ($jenis_k as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->jenis_kendaraan }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="jumlah_kursi">Jumlah Kursi</label>
                            <input type="number" name="jumlah_kursi" id="jumlah_kursi" class="form-control"> 
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="nama_kendaraan">Nama</label>
                            <input type="text" name="nama_kendaraan" id="nama_kendaraan" class="form-control">
                        </div> 
                </div>
                {{-- <div class="row justify-content-center">
                    <div class="col-md-4 form-group">
                            <label for="gambar_kendaraan">Gambar</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                <span class="btn btn-secondary btn-file">
                                    <input type="file" name="gambar_kendaraan" id="gambar_kendaraan" class="imgInp">
                                </span>
                                </span>
                                    <input type="hidden" class="form-control" readonly>
                            </div>
                            <br>
                                <img style="width: 200px" id='img-upload'/>
                        </div>
                </div> --}}
                {{-- Row : 2 --}}
                <div class="row">
                    <div class="col-md-6 form-group">
                        <button type="submit" class="btn btn-md btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
