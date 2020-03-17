<?php

namespace App\Http\Controllers\Backend;

use App\Kendaraan;
use App\Jenis_K;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Illuminate\Support\Str;
use File;

class KendaraanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis_k = Jenis_K::all();

        if(request()->ajax()){
            return datatables()->of(Kendaraan::with('jenis_k')->get())
                               ->addColumn('action', function($data){
                $btn = '<center>
                <a href="javascript:void(0)" data-id="'.$data->id.'" class="btn btn-sm btn-warning editKendaraan" title="Edit">
                <i class="icon-pencil3"></i>
                </a> &nbsp;';
                               
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$data->id.'" class="btn btn-sm btn-danger deleteKendaraan" title="Delete">
                <i class="icon-trash-alt"></i>
                </a></center>';

                return $btn;
                })
                ->addColumn('gambar_kendaraan', function($data){
                    // $img = '<center>
                    // <img class="rounded" src="../img/kendaraan/'.$data->gambar_kendaraan.'" width="125px" height="115px"/></center>';
                $btn = '<center>
                    <a href="javascript:void(0)" data-id="'.$data->id.'" class="btn btn-sm btn-info lihatKendaraan" title="Lihat Gambar" data-toggle="modal" data-target="#gambar-modal">
                    <i class="icon-file-picture2"></i>
                    </a>
                    </center>';

                return $btn;
                })
                ->rawColumns(['action','gambar_kendaraan'])
                ->make(true);
        }
        
        return view('backend/kendaraan/index',compact('jenis_k'));
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
            'id_jenis' => 'required',
            'nama_kendaraan' => 'required',
            'jumlah_kursi' => 'required',
            // 'gambar_kendaraan' => 'required|image|max:2048'
        );

        $error = Validator::make($request->all(), $validator);

        if($error->fails()){
            return response()->json([
                'errors' => $error->errors()->all()
            ]);
        }

        // $image = $request->file('gambar_kendaraan');
        // $new_name = str_random(6) . '.' . $image->getClientOriginalExtension();

        // $image->move(public_path('/img/kendaraan'), $new_name);

        $form_data = array(
            'id_jenis' => $request->id_jenis,
            'nama_kendaraan' => $request->nama_kendaraan,
            'jumlah_kursi' => $request->jumlah_kursi,
            // 'gambar_kendaraan' => $new_name
        );
        Kendaraan::create($form_data);

        return redirect()->route('kendaraan.index');
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
        $kendaraan = Kendaraan::findOrFail($id);

        // if($kendaraan->gambar_kendaraan){
        //     $old_foto = $kendaraan->gambar_kendaraan;
        //     $filepath = public_path() .'/img/kendaraan/'. $kendaraan->gambar_kendaraan;
        // try{
        //     File::delete($filepath);
        // }    
        // catch(FileNotFoundException $e){
        //     //File sudah dihapus atau tidak ada
        //     }
        // }
        $kendaraan->delete();

        return response()->json([
            'success' => true,
            'user'  => $kendaraan,
        ], 200);
    }
}
