@extends('layouts/frontend')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="border-top: 4px solid #007bff">
                <div class="card-body">
                    <p style="float:left">No Pesanan : <b>554143122</b></p> 
                    <p style="float:right">KD-JDWL | 24 Maret 2020</p>
                    <br><hr>
                    <div class="row">
                        <div class="col-md-6">
                            E-Ticket telah dikirim ke email : <b>ihsanfirdaus0221@gmail.com</b><br>
                            Silahkan cek inbox/spam dari alamat email diatas.    
                        </div>  
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <br>
           <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="jumbotron">
                    <div class="row">
                        <div class="col-md-9">
                            <p style="font-size: 24px"><b>Tidak perlu di Print!</b></p>
                            <p>Tunjukkan <b>E-Ticket</b> di smartphone saat check-in. Log-in ke akun Ticket.in anda di App atau Mobile Web.</p><br>
                            <p>
                               <b>Download dan Install sekarang agar dapat memudahkan anda dalam pembelian E-Ticket.</b>
                            </p>
                        </div>
                        <div class="col-md-3">
                        <img src="{{ asset('Front-end/img/smartphone.png') }}" alt="" width="60%"><br>
                        <a target="_blank" href="https://play.google.com/store/apps/details?id=com.traveloka.android"><img src="{{ asset('Front-end/img/en_badge_web_generic.png') }}" alt="" width="70%"></a>
                        </div>
                        
                    </div>
                </div>
            </div>
           </div>
</div>
@endsection