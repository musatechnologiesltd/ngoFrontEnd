<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NVisa;
use App\Models\NgoStatus;
use App\Models\Country;
use App\Models\NgoDuration;
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
use App\Models\Fc1Form;
use App\Models\NgoRenewInfo;
use App\Models\Fd2FormForFc1Form;
use App\Models\Fd2Fc1OtherInfo;
use Illuminate\Support\Facades\App;
class Fc1FormController extends Controller
{
    public function index(){
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fc1FormList = Fc1Form::where('fd_one_form_id',$ngo_list_all->id)->latest()->get();



        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)
        ->value('ngo_duration_start_date');


        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)
                               ->orderBy('id','desc')->first();

        return view('front.fc1Form.index',compact('ngoDurationLastEx','ngoDurationReg','ngo_list_all','fc1FormList'));
    }


    public function create(){
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)
        ->value('ngo_duration_start_date');


        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)
                               ->orderBy('id','desc')->first();


                               $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)
                               ->value('web_site_name');


            $divisionList = DB::table('civilinfos')->groupBy('division_bn')
            ->select('division_bn')->get();

            //dd($districtList);
            $districtList = DB::table('civilinfos')->groupBy('district_bn')
            ->select('district_bn')->get();
        return view('front.fc1Form.create',compact('districtList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

    }


    public function edit($id){
        $fd6Id = base64_decode($id);

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)
        ->value('ngo_duration_start_date');


        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)
                               ->orderBy('id','desc')->first();


                               $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)
                               ->value('web_site_name');


            $divisionList = DB::table('civilinfos')->groupBy('division_bn')
            ->select('division_bn')->get();

            $districtList = DB::table('civilinfos')->groupBy('district_bn')
            ->select('district_bn')->get();

            $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')->groupBy('city_orporation')
            ->select('city_orporation')->get();

            //dd($districtList);
            $fc1FormList = Fc1Form::where('fd_one_form_id',$ngo_list_all->id)
            ->where('id',$fd6Id)->latest()->first();


        return view('front.fc1Form.edit',compact('cityCorporationList','districtList','prokolpoAreaList','fc1FormList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

    }
}
