<br>
<div class="container-fluid">
    <div class="card shadow mb-4">
    <div class="card-body" id="card_add" style="display:none">
        <form id="form-create" method="post">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="keberangkatan">Keberangkatan</label>
                        <input type="text" name="keberangkatan" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tujuan">Tujuan</label>
                        <input type="text" name="tujuan" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="waktu">Waktu</label>
                        <input type="text" name="waktu" id="timepicker" class="form-control" required>
                    </div>
                </div>
            </div>
            
        </form>
            <div class="row">
               <div class="col-md-6">           
                   <div class="form-group">
                       <button id="btn_save" class="btn btn-md btn-primary">Save</button>
                   </div>
                </div>
            </div>
    </div>
    </div>
</div>

