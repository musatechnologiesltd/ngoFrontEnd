<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
class CommonController extends Controller
{
    public static  function imageUpload($request,$file,$filePath){


        $path = public_path('uploads/'.$filePath);

        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }


        $extension = time().mt_rand(1000000000, 9999999999).$file->getClientOriginalName();
        $filename = $extension;
        $file->move('public/uploads/'.$filePath.'/', $filename);
        $imageUrl =  'public/uploads/'.$filePath.'/'.$filename;


    return $imageUrl;
    //$imageUrl = $this->imageUpload($request);

    }


    public static  function pdfUpload($request,$file,$filePath){


        $path = public_path('uploads/'.$filePath);

        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }


        $extension = time().mt_rand(1000000000, 9999999999).$file->getClientOriginalName();
        $filename = $extension;
        $file->move('public/uploads/'.$filePath.'/', $filename);
        $imageUrl =  'uploads/'.$filePath.'/'.$filename;


    return $imageUrl;
    //$imageUrl = $this->imageUpload($request);

    }



}
