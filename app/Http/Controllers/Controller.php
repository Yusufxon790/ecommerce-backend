<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function response($data){
        return response()->json([
            'data'=>$data,
        ]);
    }
    public function success(string $message, $data=[]){
        return response()->json([
            'success'=>true,
            'status'=>'success',
            'message'=>$message ?? 'operation successfull',
            'data'=>$data
        ]);
    }
    public function error(string $message, $data=[]){
        return response()->json([
            'success'=>false,
            'status'=>'erorr',
            'message'=>$message ?? 'error occured',
            'data'=>$data
        ],400);

    }
}
