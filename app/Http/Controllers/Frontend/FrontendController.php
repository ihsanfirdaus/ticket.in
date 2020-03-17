<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Kategori;
use Laratrust\LaratrustFacade as Laratrust;
class FrontendController extends Controller
{
    public function home(){
        $user = User::all();
        $kategori = Kategori::orderBy('id','asc')->get();

        return view('frontend/home',compact('user','kategori'));
    }
    public function info_tiket_pesawat(){
        $kategori = Kategori::orderBy('id','asc')->get();

        return view('frontend/info-tiket',compact('kategori'));
    }
    public function isi_data(){
        return view('frontend/pesan_partials/isi_data');
    }
    public function review_pemesanan(){
        return view('frontend/pesan_partials/review');
    }
    public function metode_pembayaran(){
        return view('frontend/pesan_partials/metode_pembayaran');
    }
    public function k_pembayaran_in(){
        return view('frontend/pesan_partials/k_pembayaran/indomaret');
    }
}
