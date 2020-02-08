<?php

namespace App\Http\Controllers\Backend;

use App\Jurusan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;

class JurusanController extends Controller
{
    public function index(){

        if(request()->ajax()){
            return datatables()->of(Jurusan::all())
                               ->addColumn('action', function($data){
                                $btn = '<center>
                                <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" class="btn btn-sm btn-warning editJurusan" data-toggle="tooltip" title="Edit">
                                <i class="icon-pencil3"></i>
                                </a> &nbsp;';
                                               
                                $btn = $btn. '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" class="btn btn-sm btn-danger deleteJurusan" data-toggle="tooltip" title="Delete">
                                <i class="icon-trash-alt"></i>
                                </a></center>';
                
                                return $btn;
                               })
                               ->rawColumns(['action'])
                               ->make(true);
        }
        return view('backend/jurusan/index');
    }
    public function store(Request $request){

        $validator = array(
            'keberangkatan' => 'required',
            'tujuan' => 'required',
            'waktu' => 'required',
        );

        $error = Validator::make($request->all(), $validator);

        if($error->fails()){
            return response()->json([
                'errors' => $error->errors()->all()
            ]);
        }
        $form_data = array(
            'keberangkatan' => $request->keberangkatan,
            'tujuan' => $request->tujuan,
            'waktu' => $request->waktu,
        );

        Jurusan::create($form_data);

        return redirect()->route('jurusan.index');
    }

    public function destroy($id){
        $jurusan = Jurusan::destroy($id);

        return response()->json($jurusan, 200);
    }
}
