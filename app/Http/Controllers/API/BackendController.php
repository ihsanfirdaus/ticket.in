<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class BackendController extends Controller
{
    public function listUser(){

        $user = User::all();
        
        $response = [
            'success' => true,
            'data' => $user,
            'message' => 'Berhasil'
        ];

        return response()->json($response, 200);
    }
}
