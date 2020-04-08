<br>
<div class="container-fluid">
    <div class="card shadow mb-4">
    <div class="card-body" id="card_add" style="display:none">
        <form id="form-create" method="post">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="keberangkatan">Keberangkatan</label>
                        <input type="text" name="keberangkatan" id="keberangkatan" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="bandara_k">Bandara</label>
                        <input type="text" name="bandara_k" id="bandara_k" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="kode_penerbangan_k">Kode Penerbangan</label>
                        <input type="text" name="kode_penerbangan_k" id="kode_penerbangan_k" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="waktu_k">Waktu</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-clock"></i></span>
                            </div>
                            <input type="text" name="waktu_k" id="waktu_k" class="form-control clockpicker" autocomplete="off">
                        </div>    
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="tujuan">Tujuan</label>
                        <input type="text" name="tujuan" id="tujuan" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="bandara_t">Bandara</label>
                        <input type="text" name="bandara_t" id="bandara_t" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="kode_penerbangan_t">Kode Penerbangan</label>
                        <input type="text" name="kode_penerbangan_t" id="kode_penerbangan_t" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="waktu_t">Waktu</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-clock"></i></span>
                            </div>
                            <input type="text" name="waktu_t" id="waktu_t" class="form-control clockpicker" autocomplete="off">
                        </div>    
                    </div>
                </div>
            </div>
            <div class="row">
               <div class="col-md-6">           
                   <div class="form-group">
                       <button type="submit" class="btn btn-md btn-primary">Save</button>
                   </div>
                </div>
            </div>
        </form>  
    </div>
    </div>
</div>

