<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function storeFile(Request $request){
        $fileName = time().'_'.$request->file('file')->getClientOriginalName();
        $file = new File();
        $file->file = $fileName;
        $file->save();
        $request->file('file')->storeAs('test' , $fileName);
        return response()->json([
            'data' => $file
        ]);
    }
}
