@extends('layouts/frontend')

@section('main-css')
<link rel="stylesheet" href="{{ asset('Front-end/file-upload-with-preview/dist/file-upload-with-preview.min.css') }}">
@endsection

@section('content')
    <br>
    <div class="container">
        <div class="card" style="height:85px">
            <div class="card-body" id="card_notifikasi2">
                <div class="row">
                    <i class="fa fa-info-circle" id="notif_3"></i><p>Pastikan anda mencatat no rekening dan jumlah yang harus dibayar.<br>Setelah pembayaran diterima, <b>E-Ticket</b> akan dikirim ke email anda dalam waktu 5 Menit</p>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-7">
                    <div class="card">
                        <div class="card-body">
                        <p style="text-align:center;font-size: 28px">No Rekening</p>
                        <img src="{{asset('Front-end/img/Metode Pembayaran/bank-bca.jpg')}}" alt="" class="img-center" width="50%">
                        <div class="card">
                            <div class="card-body">
                                <p style="text-align:center;font-size:22px;font-weight:600;background-color: #dedede">313771829072631</p>
                            </div>
                        </div>
                        <hr>
                        <p>Cara melakukan pembayaran melalui Bank BCA :</p>
                        <ul>
                            <ol>1. Catat <b>No Rekening</b> yang ada diatas.</ol>
                            <ol>2. Pergilah ke ATM BCA Terdekat.</ol>
                            <ol>3. Lakukan pembayaran, dan anda akan menerima bukti terima pembayaran dari Bank BCA.</ol>
                            <ol>4. Kirim bukti pembayaran dari Bank BCA.</ol>
                            <ol>5. Setelah pemesanan sukses diproses dan pembayaran sudah dikonfirmasi, <b>E-Ticket</b> akan dikirim ke Email anda.</ol>
                        </ul>
                        </div>               
                    </div>
            </div>
            <div class="col-5">
                <div class="card" style="height: 135px">
                    <div class="card-header title-header">Sisa waktu anda untuk melakukan pembayaran : 1 <b>Jam 30 Menit</b></div>
                    <div class="card-body">
                        No. Pesanan : <p style="float:right"><b>50079801</b></p>
                    </div>
                </div><br>
                <div class="card">
                    <div class="card-body" style="background-color:#dedede">
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
                <br>
                <div class="card">
                    <div class="card-header title-header">
                        Pembayaran
                    </div>
                    <div class="card-body">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Atas Nama</label>
                                <input type="text" name="atas_nama" id="" class="single-in form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Nominal Yang Di Transfer</label>
                                <input type="text" name="nominal" id="" class="single-in form-control">
                            </div>
                            <div class="from-group">
                                <div class="custom-file-container" data-upload-id="myUploader">
                                    <label>Bukti Pembayaran <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                    
                                    <label class="custom-file-container__custom-file" >
                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                        <input type="file" name="bukti_pembayaran" class="custom-file-container__custom-file__custom-file-input" accept="*">
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Kirim <i class="fa fa-arrow-right"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('main-js')
<script src="{{ asset('Front-end/file-upload-with-preview/dist/file-upload-with-preview.min.js') }}"></script>
@endsection

@push('play-js')
    <script>
    var myUpload = new FileUploadWithPreview('myUploader', {
        showDeleteButtonOnImages: true,
        text: {
            chooseFile: 'Pilih Gambar ...',
            browse: 'Cari',
            selectedCount: 'files selected'
        },
        maxFileCount: 0,
        presetFiles: []
    });
    </script>
@endpush