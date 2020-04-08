<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Maskapai;
use App\Jenis_K;
use Yajra\Datatables\Datatables;
use Validator;
use Illuminate\Support\Str;
use File;

class MaskapaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis_k = Jenis_K::all();

        if(request()->ajax()){
            return datatables()->of(Maskapai::with('jenis_k')->get())
                               ->addColumn('action', function($data){
                $btn = '<center>
                <a href="javascript:void(0)" data-id="'.$data->id.'" class="btn btn-sm btn-warning editMaskapai" title="Edit">
                <i class="icon-pencil3"></i>
                </a> &nbsp;';
                         
                if($data->jadwal->count() > 0){
                    $btn = $btn. '<button class="btn btn-sm btn-danger" disabled><i class="icon-trash-alt"></i></button>';
                }
                else{
                    $btn = $btn. '<a href="javascript:void(0)" data-id="'.$data->id.'" class="btn btn-sm btn-danger deleteMaskapai" title="Delete">
                    <i class="icon-trash-alt"></i>
                    </a></center>';
                }

                return $btn;
                })
                ->addColumn('gambar_maskapai', function($data){
                    $img = '<center>
                    <img class="rounded" src="../img/maskapai/'.$data->gambar_maskapai.'" width="80px"/>
                    </center>';

                    return $img;
                })
                ->rawColumns(['action','gambar_maskapai'])
                ->make(true);
        }
        
        return view('backend/maskapai/index',compact('jenis_k'));
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
            'nama_maskapai' => 'required',
            'jumlah_kursi' => 'required',
            'gambar_maskapai' => 'required|image|max:2048'
        );

        $error = Validator::make($request->all(), $validator);

        if($error->fails()){
            return response()->json([
                'errors' => $error->errors()->all()
            ]);
        }

        $image = $request->file('gambar_maskapai');
        $new_name = rand().'.'.$image->getClientOriginalExtension();

        $image->move(public_path('/img/maskapai'), $new_name);

        $form_data = array(
            'id_jenis' => $request->id_jenis,
            'nama_maskapai' => $request->nama_maskapai,
            'jumlah_kursi' => $request->jumlah_kursi,
            'gambar_maskapai' => $new_name
        );
        Maskapai::create($form_data);

        return redirect()->route('maskapai.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $maskapai = Maskapai::findOrFail($id);

        if($maskapai->gambar_maskapai){
            $old_foto = $maskapai->gambar_maskapai;
            $filepath = public_path() .'/img/maskapai/'. $maskapai->gambar_maskapai;
        try{
            File::delete($filepath);
        }    
        catch(FileNotFoundException $e){
            //File sudah dihapus atau tidak ada
            }
        }

        $maskapai->delete();

        return response()->json([
            'success' => true,
            'data'  => $maskapai,
        ], 200);
    }
}
