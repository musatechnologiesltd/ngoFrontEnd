<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NVisa;
use App\Models\Country;
use App\Models\Fd9Form;
use App\Models\Fd9OneForm;
use App\Models\Fd9ForeignerEmployeeFamilyMemberList;
use Illuminate\Support\Facades\Crypt;
use DB;
use PDF;
use DateTime;
use DateTimezone;
use Response;
use App\Http\Controllers\NGO\CommonController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Session;
use App\Models\FdOneForm;
use Illuminate\Support\Facades\App;
class Fd9OneController extends Controller
{
    public function index(){
        $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)
        ->value('ngo_type');
        if($checkNgoTypeForForeginNgo == 'Foreign'){

            App::setLocale('sp');
            session()->put('locale','sp');

        }else{

            App::setLocale('en');
            session()->put('locale','en');
        }


        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fd9OneList = Fd9OneForm::where('fd_one_form_id',$ngo_list_all->id)->latest()->get();
        return view('front.fd9OneForm.index',compact('ngo_list_all','fd9OneList'));
    }


    public function create(){
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        return view('front.fd9OneForm.create',compact('ngo_list_all'));
    }
}
