<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NVisa;
use App\Models\NVisaAuthorizedPersonalOfTheOrg;
use App\Models\NVisaCompensationAndBenifits;
use App\Models\NVisaEmploymentInformation;
use App\Models\NVisaManpowerOfTheOffice;
use App\Models\NVisaNecessaryDocumentForWorkPermit;
use App\Models\NVisaParticularOfSponsorOrEmployer;
use App\Models\NVisaParticularsOfForeignIncumbnet;
use App\Models\NVisaWorkPlaceAddress;
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
class NVisaController extends Controller
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
        $nVisaList = NVisa::where('fd_one_form_id',$ngo_list_all->id)->latest()->get();
        return view('front.nVisa.index',compact('ngo_list_all','nVisaList'));
    }

    public function create(){
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        return view('front.nVisa.create',compact('ngo_list_all'));
    }
}
