<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function success($data,$message = []){
        return $this->res($data,$message,[],200);
    }

    public function error($data,$message = [],$error , $code){
        return $this->res($data,$message,$error,$code);
    }

    protected function res($data,$message,$error,$code){
        return response()->json([
            'data' => $data,
            'message' => $message,
            'error' => $error,
            'code' => $code
        ]);
    }
}
