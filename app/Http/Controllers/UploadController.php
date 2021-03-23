<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function upload(Request $request){

        $request -> validate([
            "file" => "required",
        ]);
//        if ($file = $request -> file("file"))
//        {
            $file = $request -> file("file");
            $name = time().$file -> getClientOriginalName();
            Storage::putFileAs("File",$file,$name);
//            return redirect()->route("file");
//            return response()->json(["success"=>"File Uploaded"]);
//        }
//         else
//         {
//             return response()->json(["error"=>"Empty Selection"]);
//         }


    }
}
