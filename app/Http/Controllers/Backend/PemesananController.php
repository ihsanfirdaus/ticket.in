<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Jenssegers\Date\Date;
use App\Pemesanan;
class PemesananController extends Controller
{
    public function index(){

        if(request()->ajax()){
            return datatables()->of(Pemesanan::latest()->get())
            ->addColumn('nama_pemesan', function($data){
                $np = '<p>'.$data->user->name.'</p>';

                return $np;
            })
            ->addColumn('jumlah_penumpang', function($data){
                $jp = '<p>Dewasa : '.$data->jumlah_penumpang_dewasa.' 
                | Anak : '.$data->jumlah_penumpang_anak.'</p>';

                return $jp;
            })
            ->addColumn('tanggal_pemesanan', function($data){
                Date::setLocale('id');
                $tp = Date::parse($data->tanggal_pemesanan)->format('j F Y');

                return $tp;
            })
            ->addColumn('status', function($data){
                if($data->status_pembayaran == "Belum dibayar"){
                    $sts = '<center><div class="badge badge-danger">Belum dibayar</div></center>';
                    
                    return $sts;
                }
                if($data->status_pembayaran == "Lunas"){
                    $sts = '<center><div class="badge badge-success">Lunas</div></center>';

                    return $sts;
                }
            })
            ->addColumn('action', function($data){
                $btn = '<a href="javascript:void(0)" data-id="'.$data->id.'" 
                        class="btn btn-sm btn-danger deletePemesanan" title="Delete">
                        <i class="icon-trash-alt"></i>
                        </a></center>';

                return $btn;
            })
            ->rawColumns(['nama_pemesan','jumlah_penumpang','tanggal_pemesanan','status','action'])
            ->make(true);
        }
        return view('backend/pemesanan/index');
    }
}
