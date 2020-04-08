<?php

namespace App\Http\Controllers\Backend;
use App\Jadwal;
use App\Maskapai;
use App\Jurusan;
use App\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Jenssegers\Date\Date;
use Validator;
class JadwalController extends Controller
{

    public function index()
    {
        if(request()->ajax()){
            return datatables()->of(Jadwal::with('jurusan','maskapai')
            ->latest()->get())
            ->addColumn('maskapai', function($data){
            $mkp = '<center><img src="../img/maskapai/'.$data->maskapai->gambar_maskapai.'" width="80px"></center>';

            return $mkp;
            })
            ->addColumn('jurusan', function($data){
            $jrs = '<center><p>'
                .$data->jurusan->keberangkatan.
                ' - '.$data->jurusan->tujuan.'<br> ('.$data->jurusan->waktu_k.' - '.$data->jurusan->waktu_t.')'.'</p></center>';
    
            return $jrs;
            })
            ->addColumn('tanggal_berangkat', function($data){
                Date::setLocale('id');
                $tb = Date::parse($data->tanggal_berangkat)->format('j F Y');

                return $tb;
            })
            ->addColumn('tanggal_pulang', function($data){
                Date::setLocale('id');
                $tp = Date::parse($data->tanggal_pulang)->format('j F Y');
                if($data->tanggal_pulang == 0){

                }else{
                    return $tp;
                }
            })
            ->addColumn('harga_tiket', function($data){
            $ht = '<p>Rp '.$data->harga_tiket.'</p>';

            return $ht;
            })
            ->addColumn('action', function($data){
            $btn = '<center>
                    <a href="javascript:void(0)" data-id="'.$data->id.'" 
                    class="btn btn-sm btn-warning editJadwal" title="Edit">
                    <i class="icon-pencil3"></i>
                    </a> &nbsp;';
                        
            $btn = $btn. '<a href="javascript:void(0)" data-id="'.$data->id.'" 
                    class="btn btn-sm btn-danger deleteJadwal" title="Delete">
                    <i class="icon-trash-alt"></i>
                    </a> &nbsp;';

            $btn = $btn. '<a href="javascript:void(0)" data-id="'.$data->id.'" 
                    class="btn btn-sm btn-info detailJadwal" title="Detail">
                    <i class="icon-info3"></i>
                    </a></center>';

            return $btn;
            })
            ->rawColumns(['maskapai','jurusan','tanggal_berangkat','tanggal_pulang','harga_tiket','action'])
            ->make(true);
        }

        $maskapai = Maskapai::orderBy('id','asc')->get();
        $kategori = Kategori::orderBy('id','asc')->get();
        $jurusan = Jurusan::orderBy('id','asc')->get();

        return view('backend/jadwal/index',compact('maskapai','kategori','jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validator = array(
            'kode_jadwal' => 'required',
            'tanggal_berangkat' => 'required',
            'tipe_tiket' => 'required',
            'id_kategori' => 'required',
            'id_maskapai' => 'required',
            'id_jurusan' => 'required',
            'harga_tiket' => 'required'
        );

        $error = Validator::make($request->all(), $validator);

        if($error->fails()){
            return response()->json([
                'errors' => $error->errors()->all()
            ]);
        }
        $form_data = array(
            'kode_jadwal' => $request->kode_jadwal,
            'tipe_tiket' => $request->tipe_tiket,
            'id_kategori' => $request->id_kategori,
            'id_maskapai' => $request->id_maskapai,
            'id_jurusan' => $request->id_jurusan,
            'tanggal_berangkat' => $request->tanggal_berangkat,
            'tanggal_pulang' => $request->tanggal_pulang,
            'harga_tiket' => $request->harga_tiket
        );

        Jadwal::create($form_data);

        return redirect()->route('jadwal.index');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $jadwal = Jadwal::destroy($id);

       return response()->json($jadwal, 200);
    }
}
