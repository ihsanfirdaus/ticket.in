<?php

namespace App\Http\Controllers\Backend;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(request()->ajax()){
            return datatables()->of(User::all())
                               ->addColumn('action', function($data){
                                $button = '<center>
                                <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" class="deleteUser">
                                <button class="btn btn-sm btn-danger">
                                 <i class="icon-trash-alt" data-toggle="tooltip" title="Delete"></i>
                                </button>
                                </a>
                                </center>';

                                return $button;
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
