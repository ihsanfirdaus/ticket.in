<br>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body" id="card_add" style="display:none">
            <form id="form-create" method="POST" enctype="multipart/form-data">
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
                        <div class="col-md-4 form-group">
                            <label for="nama_maskapai">Nama Maskapai</label>
                            <input type="text" name="nama_maskapai" id="nama_maskapai" class="form-control">
                        </div> 
                        <div class="col-md-2 form-group">
                            <label for="jumlah_kursi">Jumlah Kursi</label>
                            <input type="number" name="jumlah_kursi" id="jumlah_kursi" class="form-control"> 
                        </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="custom-file-container" data-upload-id="myUploader">
                                <label>Logo<a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">  x</a></label>
                
                                <label class="custom-file-container__custom-file" >
                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                    <input type="file" name="gambar_maskapai" id="gambar_maskapai" class="custom-file-container__custom-file__custom-file-input" accept="*">
                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                </label>
                                <div class="custom-file-container__image-preview"></div>
                            </div>
                        </div>
                    </div>
                </div>
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
