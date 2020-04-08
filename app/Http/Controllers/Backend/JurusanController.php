<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jurusan;
use Yajra\Datatables\Datatables;
use Validator;
class JurusanController extends Controller
{
    public function index(){

        if(request()->ajax()){
            return datatables()->of(Jurusan::latest()->get())
            ->addColumn('bandara_k', function($data){
                $value = '<p>'.$data->bandara_k.' - '.$data->kode_penerbangan_k.'</p>';

                return $value;
            })
            ->addColumn('bandara_t', function($data){
                $value = '<p>'.$data->bandara_t.' - '.$data->kode_penerbangan_t.'</p>';

                return $value;
            })
            ->addColumn('waktu', function($data){
                $value = '<p>'.$data->waktu_k.' - '.$data->waktu_t.'</p>';

                return $value;
            })
            ->addColumn('action', function($data){
            $btn = '<center>
                    <a href="javascript:void(0)" data-id="'.$data->id.'" class="btn btn-sm btn-warning editJurusan" title="Edit">
                    <i class="icon-pencil3"></i>
                    </a> &nbsp;';
                            
            if($data->jadwal->count() > 0){

                $btn = $btn. '<button class="btn btn-sm btn-danger" disabled><i class="icon-trash-alt"></i></button>';

            }else{
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$data->id.'" 
                        class="btn btn-sm btn-danger deleteJurusan" title="Delete">
                        <i class="icon-trash-alt"></i>
                        </a></center>';
            }

            return $btn;
            })
            ->rawColumns(['bandara_k','bandara_t','waktu','action'])
            ->make(true);
        }
        return view('backend/jurusan/index');
    }
    public function store(Request $request){

        $validator = array(
            'bandara_k' => 'required',
            'keberangkatan' => 'required',
            'kode_penerbangan_k' => 'required',
            'waktu_k' => 'required',
            'bandara_t' => 'required',
            'tujuan' => 'required',
            'kode_penerbangan_t',
            'waktu_t' => 'required',
        );

        $error = Validator::make($request->all(), $validator);

        if($error->fails()){
            return response()->json([
                'errors' => $error->errors()->all()
            ]);
        }
        $form_data = array(
            'bandara_k' => $request->bandara_k,
            'keberangkatan' => $request->keberangkatan,
            'kode_penerbangan_k' => $request->kode_penerbangan_k,
            'waktu_k' => $request->waktu_k,
            'bandara_t' => $request->bandara_t,
            'tujuan' => $request->tujuan,
            'kode_penerbangan_t' => $request->kode_penerbangan_t,
            'waktu_t' => $request->waktu_t
        );

        Jurusan::create($form_data);

        return redirect()->route('jurusan.index');
    }

    public function destroy($id){
        
        $jurusan = Jurusan::destroy($id);

        return response()->json($jurusan, 200);
    }
}
