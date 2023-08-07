<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use App;
use Auth;
use App\Models\NgoTypeAndLanguage;
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


    public static function englishToBangla($data){


        $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
        'May','June','July','August','September','October','November','December','Saturday','Sunday',
        'Monday','Tuesday','Wednesday','Thursday','Friday');



        $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
        'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
        বুধবার','বৃহস্পতিবার','শুক্রবার'
        );


        $finalResult = str_replace($engDATE,$bangDATE,$data);

        return $finalResult;
    }


   public static function checkNgotype(){

    $first_form_check = NgoTypeAndLanguage::where('user_id',Auth::user()->id)->value('ngo_language');
    App::setLocale($first_form_check);
    session()->put('locale',$first_form_check);




    }



}
