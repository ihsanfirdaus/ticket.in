<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\User;
use App\Jurusan;
use App\Kategori;
use App\Jadwal;
use Laratrust\LaratrustFacade as Laratrust;
class FrontendController extends Controller
{
    public function home(){
        $user = User::all();
        $keberangkatan = Jurusan::distinct()->get(['keberangkatan','bandara_k']);
        $tujuan = Jurusan::distinct()->get(['tujuan','bandara_t']);
        $kategori = Kategori::orderBy('id','asc')->get();

        return view('frontend/home',compact('user','kategori','keberangkatan','tujuan'));
    }
    public function info_tiket_pesawat(Request $request){
        $keberangkatan = Jurusan::distinct()->get(['keberangkatan','bandara_k']);
        $tujuan = Jurusan::distinct()->get(['tujuan','bandara_t']);
        $kategori = Kategori::orderBy('id','asc')->get();

        $jadwal = Jadwal::orderBy('id','desc')->join('jurusans','jadwals.id_jurusan','=','jurusans.id')
                                              ->join('kategoris','jadwals.id_kategori','=','kategoris.id')
                                              ->select('jadwals.*','jurusans.keberangkatan as keberangkatan',
                                              'jurusans.tujuan as tujuan','kategoris.nama_kategori as nama_kategori')
                                              ->where('tipe_tiket','like',"%$request->tipe_tiket%")
                                              ->where('nama_kategori','like',"%$request->kategori_tiket%")
                                              ->where('keberangkatan','like',"%$request->keberangkatan%")
                                              ->where('tujuan','like',"%$request->tujuan%")
                                              ->where('tanggal_berangkat','like',"%$request->tanggal_berangkat%")
                                              ->paginate(3);

        return view('frontend/info-tiket',compact('keberangkatan','tujuan','kategori','jadwal'));
    }
    public function isi_data(Request $request){
        $jadwal = Jadwal::all();

        return view('frontend/pesan_partials/isi_data',compact('jadwal'));
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
    public function k_pembayaran_bri(){
        return view('frontend/pesan_partials/k_pembayaran/bank-bri');
    }
    public function k_pembayaran_bca(){
        return view('frontend/pesan_partials/k_pembayaran/bank-bca');
    }
    public function cetak(){
        return view('frontend/pesan_partials/cetak');
    }
}
