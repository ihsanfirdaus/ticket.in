<?php

namespace App\Http\Controllers\Backend;
use App\Jadwal;
use App\Kendaraan;
use App\Jurusan;
use App\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
class JadwalController extends Controller
{

    public function index()
    {
        if(request()->ajax()){
            return datatables()->of(Jadwal::with('jurusan')->orderBy("id","desc")->get())
                               ->addColumn('action', function($data){
                $btn = '<center>
                <a href="javascript:void(0)" data-id="'.$data->id.'" class="btn btn-sm btn-warning editJadwal" title="Edit">
                <i class="icon-pencil3"></i>
                </a> &nbsp;';
                               
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$data->id.'" class="btn btn-sm btn-danger deleteJadwal" title="Delete">
                <i class="icon-trash-alt"></i>
                </a> &nbsp;';

                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$data->id.'" class="btn btn-sm btn-info detailJadwal" title="Detail">
                <i class="icon-info3"></i>
                </a></center>';

                return $btn;
                })
                ->addColumn('jurusan', function($data){
                $jurusan = '<p>'
                .$data->jurusan->keberangkatan.
                '-'.$data->jurusan->tujuan.' ('.$data->jurusan->waktu.')'.'</p>';

                return $jurusan;
                })
                ->addColumn('harga_tiket', function($data){
                $harga_tiket = '<p>Rp '.$data->harga_tiket.'</p>';

                return $harga_tiket;
                })
                ->rawColumns(['action','jurusan','harga_tiket'])
                ->make(true);
        }

        $kendaraan = Kendaraan::orderBy('id','asc')->get();
        $kategori = Kategori::orderBy('id','asc')->get();
        $jurusan = Jurusan::orderBy('id','asc')->get();

        return view('backend/jadwal/index',compact('kendaraan','kategori','jurusan'));
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
            'tanggal_berangkat' => 'required',
            'tipe_tiket' => 'required',
            'id_kategori' => 'required',
            'id_kendaraan' => 'required',
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
            'tanggal_berangkat' => $request->tanggal_berangkat,
            'tanggal_pulang' => $request->tanggal_pulang,
            'tipe_tiket' => $request->tipe_tiket,
            'id_kategori' => $request->id_kategori,
            'id_kendaraan' => $request->id_kendaraan,
            'id_jurusan' => $request->id_jurusan,
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
