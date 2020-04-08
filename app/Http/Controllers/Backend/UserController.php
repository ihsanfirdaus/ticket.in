<?php

namespace App\Http\Controllers\Backend;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    public function index()
    {
        if(request()->ajax()){
            return datatables()->of(User::where('is_admin','=','0')->get())
            ->addColumn('action', function($data){
            $btn = '<center>
                    <a href="javascript:void(0)"  data-id="'.$data->id.'" class="deleteUser">
                    <button class="btn btn-sm btn-danger">
                        <i class="icon-trash-alt" title="Delete"></i>
                    </button>
                    </a>
                    </center>';

            return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        
        return view('backend/user/index');
    }

    public function destroy($id){

        $user = User::destroy($id);

        return response()->json([
            'success' => true,
            'user'  => $user,
        ], 200);
    }
}
