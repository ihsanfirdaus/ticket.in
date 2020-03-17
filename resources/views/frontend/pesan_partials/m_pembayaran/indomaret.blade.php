
    <div class="card">
        <div class="card-body">
            <p>Anda memilih metode pembayaran : <b>Indomaret</b></p>
            <img src="{{asset('Front-end/img/Metode Pembayaran/indomaret.png')}}" class="img-center" alt="" width="50%"><br>
            <p>Pemesanan yang dapat dibayar melalui metode ini adalah tiket pesawat yang dibeli paling lambat sebelum keberangkatan / check in.</p>
        </div>
    </div>
    <div class="card">
        <div class="card-body" style="background-color:#dedede">
            <div class="row">
                <div class="col-md-6">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Punya voucher Ticket.in ? Silahkan masukan dibawah sini</label>
                            <input type="text" name="voucher" id="" class="single-in form-control">
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary">Gunakan Voucher</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <h6 style="color:#000">Rincian Harga :</h6>
                        <ul style="margin-top: -15px">
                            <p style="float:left">Dewasa : 1 </p><span style="float:right">Rp 500.000</span>
                            <br>
                            <p style="float:left;margin-left:-75px">Anak : 0 </p><span style="float:right">Rp 0</span>
                            <br>
                            <hr>
                            <p style="float:left">Total : </p><span style="float:right;font-weight:600">Rp 500.000</span>
                        </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <p>Dengan menekan tombol " Bayar ", anda telah setuju dengan <a href="">Syarat & Ketentuan</a> serta <a href="">Kebijakan Privasi Ticket.in</a></p>
                </div>
                <div class="col-md-4">
                    <a href="{{ url('pesan-tiket/konfirmasi-pembayaran-indomaret')}}"><button type="button" class="btn btn-info" style="float:right">Bayar</button></a>
                </div>
            </div>
        </div>
    </div>

      
      <!-- Modal -->
      {{-- <div class="modal fade" id="terms" tabindex="-1" role="dialog" aria-labelledby="termsTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-body">
            <p style="text-align:center;font-size:20px">Syarat dan Ketentuan Pembayaran</p>
            <p>Dengan memilih pembayaran melalui <b>Indomaret</b> anda menyetujui bahwa : </p>
            
            <p><i class="fa fa-square" style="font-size:10px;margin-right:10px"></i>  Metode pembayaran ini bergantung juga kepada jam operasional <b>Indomaret</b> pilihan anda. Hal tersebut sepenuhnya berada diluar kuasa dan tanggung jawab Ticket.in</p></<i> 
                
            <p><i class="fa fa-square" style="font-size:10px;margin-right:10px"></i>  Ada biaya Rp 5.000/transaksi ( tidak termasuk di total transaksi Pemesanan ) untuk pembayaran melalui <b>Indomaret</b> dan dapat berubah sewaktu - waktu tanpa pemberitahuan sebelumnya</p>

            <p><i class="fa fa-square" style="font-size:10px;margin-right:10px"></i>  Pemesanan akan dibatalkan jika pembayaran tidak diterima sebelum batas waktu yang ditentukan</p>
         
            </div>
            <div class="modal-footer" style="border-top:0px">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
              <a href="{{url('pesan-tiket/konfirmasi-pembayaran-indomaret')}}"><button type="button" class="btn btn-primary">Setuju</button></a>
            </div>
          </div>
        </div>
      </div> --}}