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
use App\Models\Fc2Form;
use App\Models\NgoRenewInfo;
use App\Models\Fd2FormForFc1Form;
use App\Models\Fd2Fc1OtherInfo;
use App\Models\Fd2FormForFc2Form;
use App\Models\Fd2Fc2OtherInfo;
use Illuminate\Support\Facades\App;
class Fc2FormController extends Controller
{
    public function index(){
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fc2FormList = Fc2Form::where('fd_one_form_id',$ngo_list_all->id)->latest()->get();



        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)
        ->value('ngo_duration_start_date');


        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)
                               ->orderBy('id','desc')->first();

        return view('front.fc2Form.index',compact('ngoDurationLastEx','ngoDurationReg','ngo_list_all','fc2FormList'));
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
        return view('front.fc2Form.create',compact('districtList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

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
            $fc2FormList = Fc2Form::where('fd_one_form_id',$ngo_list_all->id)
            ->where('id',$fd6Id)->latest()->first();


        return view('front.fc2Form.edit',compact('cityCorporationList','districtList','fc2FormList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

    }


    public function store(Request $request){

       // dd($request->all());

        $request->validate([

            'person_full_name' => 'required|string',
            'person_father_name' => 'required|string',
            'person_mother_name' => 'required|string',
            'person_occupation' => 'required|string',
            'person_nid' => 'required|string',


            'person_tin' => 'required|string',
            'person_nationality' => 'required|string',
            'person_full_address' => 'required|string',
            'person_tele_phone_number' => 'required|string',
            'person_mobile' => 'required|string',
            'person_email' => 'required|string',

            'ngo_prokolpo_start_date' => 'required|string',
            'ngo_prokolpo_end_date' => 'required|string',


            'ngo_district' => 'required|string',
            'ngo_sub_district' => 'required|string',
            'total_number_of_beneficiaries' => 'required|string',

            'foreigner_donor_full_name' => 'required|string',
            'foreigner_donor_occupation' => 'required|string',

            'foreigner_donor_address' => 'required|string',
            'foreigner_donor_telephone_number' => 'required|string',
            'foreigner_donor_fax' => 'required|string',
            'foreigner_donor_email' => 'required|string',
            'foreigner_donor_nationality' => 'required|string',
            'foreigner_donor_is_verified' => 'required|string',
            'foreigner_donor_is_affiliatedrict' => 'required|string',
            'organization_name' => 'required|string',
            'organization_address' => 'required|string',
            'organization_telephone_number' => 'required|string',


            'organization_email' => 'required|string',
            'organization_fax' => 'required|string',
            'organization_website' => 'required|string',
            'organization_is_verified' => 'required|string',
            'organization_ceo_name' => 'required|string',
            'organization_ceo_designation' => 'required|string',
            'organization_name_of_executive_responsible_for_bd' => 'required|string',
            'organization_name_of_executive_responsible_for_bd_designation' => 'required|string',
            'objectives_of_the_organization' => 'required|string',


            'relation_with_donor' => 'required|string',
            'organization_letter_of_commitment' => 'required|string',
            'organization_name_of_the_job_amount_of_money_and_duration_pdf' => 'required|file',
            'organization_amount_of_foreign_currency' => 'required|string',
            'equivalent_amount_of_bd_taka' => 'required|string',
            'commodities_value_in_bangladeshi_currency' => 'required|string',
            'bank_name' => 'required|string',
            'bank_address' => 'required|string',

            'bank_account_name' => 'required|string',
            'bank_account_number' => 'required|string',




        ]);

//dd(11);
        $fdOneFormID = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fc2FormInfo = new Fc2Form();
        $fc2FormInfo->fd_one_form_id =$fdOneFormID->id;
        $fc2FormInfo->person_full_name =$request->person_full_name;
        $fc2FormInfo->person_father_name =$request->person_father_name;
        $fc2FormInfo->person_mother_name =$request->person_mother_name;
        $fc2FormInfo->person_occupation =$request->person_occupation;
        $fc2FormInfo->person_nid =$request->person_nid;
        $fc2FormInfo->person_full_address =$request->person_full_address;

        $fc2FormInfo->person_passport =$request->person_passport;
        $fc2FormInfo->person_tin =$request->person_tin;
        $fc2FormInfo->person_nationality =$request->person_nationality;
        $fc2FormInfo->person_tele_phone_number =$request->person_tele_phone_number;
        $fc2FormInfo->person_mobile =$request->person_mobile;
        $fc2FormInfo->person_email =$request->person_email;


        $fc2FormInfo->ngo_prokolpo_start_date =$request->ngo_prokolpo_start_date;
        $fc2FormInfo->ngo_prokolpo_end_date =$request->ngo_prokolpo_end_date;
        $fc2FormInfo->ngo_district =$request->ngo_district;
        $fc2FormInfo->ngo_sub_district =$request->ngo_sub_district;
        $fc2FormInfo->total_number_of_beneficiaries =$request->total_number_of_beneficiaries;
        $fc2FormInfo->foreigner_donor_full_name =$request->foreigner_donor_full_name;
        $fc2FormInfo->foreigner_donor_occupation =$request->foreigner_donor_occupation;
        $fc2FormInfo->foreigner_donor_address =$request->foreigner_donor_address;
        $fc2FormInfo->foreigner_donor_telephone_number =$request->foreigner_donor_telephone_number;

        $fc2FormInfo->foreigner_donor_fax =$request->foreigner_donor_fax;
        $fc2FormInfo->foreigner_donor_email =$request->foreigner_donor_email;
        $fc2FormInfo->foreigner_donor_nationality =$request->foreigner_donor_nationality;
        $fc2FormInfo->foreigner_donor_is_verified =$request->foreigner_donor_is_verified;
        $fc2FormInfo->foreigner_donor_is_affiliatedrict =$request->foreigner_donor_is_affiliatedrict;

        $fc2FormInfo->organization_name =$request->organization_name;
        $fc2FormInfo->organization_address =$request->organization_address;
        $fc2FormInfo->organization_telephone_number =$request->organization_telephone_number;
        $fc2FormInfo->organization_email =$request->organization_email;
        $fc2FormInfo->organization_fax =$request->organization_fax;
        $fc2FormInfo->organization_website =$request->organization_website;
        $fc2FormInfo->organization_is_verified =$request->organization_is_verified;
        $fc2FormInfo->organization_ceo_name =$request->organization_ceo_name;
        $fc2FormInfo->organization_ceo_designation =$request->organization_ceo_designation;
        $fc2FormInfo->organization_name_of_executive_responsible_for_bd =$request->organization_name_of_executive_responsible_for_bd;
        $fc2FormInfo->organization_name_of_executive_responsible_for_bd_designation =$request->organization_name_of_executive_responsible_for_bd_designation;
        $fc2FormInfo->objectives_of_the_organization =$request->objectives_of_the_organization;
        $fc2FormInfo->relation_with_donor =$request->relation_with_donor;

        $fc2FormInfo->organization_letter_of_commitment =$request->organization_letter_of_commitment;
        $fc2FormInfo->organization_amount_of_foreign_currency =$request->organization_amount_of_foreign_currency;
        $fc2FormInfo->equivalent_amount_of_bd_taka =$request->equivalent_amount_of_bd_taka;
        $fc2FormInfo->commodities_value_in_bangladeshi_currency =$request->commodities_value_in_bangladeshi_currency;
        $fc2FormInfo->bank_name =$request->bank_name;

        $fc2FormInfo->bank_address =$request->bank_address;
        $fc2FormInfo->bank_account_name =$request->bank_account_name;
        $fc2FormInfo->bank_account_number =$request->bank_account_number;
        $fc2FormInfo->status ='Ongoing';

        $filePath="FcOneForm";

        if ($request->hasfile('organization_name_of_the_job_amount_of_money_and_duration_pdf')) {

            $file = $request->file('organization_name_of_the_job_amount_of_money_and_duration_pdf');

            $fc2FormInfo->organization_name_of_the_job_amount_of_money_and_duration_pdf =CommonController::pdfUpload($request,$file,$filePath);

        }
        if ($request->hasfile('verified_fc_two_form')) {

            $file = $request->file('verified_fc_two_form');

            $fc2FormInfo->verified_fc_two_form =CommonController::pdfUpload($request,$file,$filePath);

        }
        $fc2FormInfo->save();

        $fc2FormInfoId = $fc2FormInfo->id;


        return redirect()->route('addFd2DetailForFc2',base64_encode($fc2FormInfoId))->with('success','Added Successfuly');


    }





    public function update(Request $request,$id){


        $fc2FormInfo = Fc2Form::find($id);
        $fc2FormInfo->person_full_name =$request->person_full_name;
        $fc2FormInfo->person_father_name =$request->person_father_name;
        $fc2FormInfo->person_mother_name =$request->person_mother_name;
        $fc2FormInfo->person_occupation =$request->person_occupation;
        $fc2FormInfo->person_nid =$request->person_nid;
        $fc2FormInfo->person_full_address =$request->person_full_address;
        $fc2FormInfo->person_passport =$request->person_passport;
        $fc2FormInfo->person_tin =$request->person_tin;
        $fc2FormInfo->person_nationality =$request->person_nationality;
        $fc2FormInfo->person_tele_phone_number =$request->person_tele_phone_number;
        $fc2FormInfo->person_mobile =$request->person_mobile;
        $fc2FormInfo->person_email =$request->person_email;
        $fc2FormInfo->ngo_prokolpo_start_date =$request->ngo_prokolpo_start_date;
        $fc2FormInfo->ngo_prokolpo_end_date =$request->ngo_prokolpo_end_date;
        $fc2FormInfo->ngo_district =$request->ngo_district;
        $fc2FormInfo->ngo_sub_district =$request->ngo_sub_district;
        $fc2FormInfo->total_number_of_beneficiaries =$request->total_number_of_beneficiaries;
        $fc2FormInfo->foreigner_donor_full_name =$request->foreigner_donor_full_name;
        $fc2FormInfo->foreigner_donor_occupation =$request->foreigner_donor_occupation;
        $fc2FormInfo->foreigner_donor_address =$request->foreigner_donor_address;
        $fc2FormInfo->foreigner_donor_telephone_number =$request->foreigner_donor_telephone_number;

        $fc2FormInfo->foreigner_donor_fax =$request->foreigner_donor_fax;
        $fc2FormInfo->foreigner_donor_email =$request->foreigner_donor_email;
        $fc2FormInfo->foreigner_donor_nationality =$request->foreigner_donor_nationality;
        $fc2FormInfo->foreigner_donor_is_verified =$request->foreigner_donor_is_verified;
        $fc2FormInfo->foreigner_donor_is_affiliatedrict =$request->foreigner_donor_is_affiliatedrict;

        $fc2FormInfo->organization_name =$request->organization_name;
        $fc2FormInfo->organization_address =$request->organization_address;
        $fc2FormInfo->organization_telephone_number =$request->organization_telephone_number;
        $fc2FormInfo->organization_email =$request->organization_email;
        $fc2FormInfo->organization_fax =$request->organization_fax;
        $fc2FormInfo->organization_website =$request->organization_website;
        $fc2FormInfo->organization_is_verified =$request->organization_is_verified;
        $fc2FormInfo->organization_ceo_name =$request->organization_ceo_name;
        $fc2FormInfo->organization_ceo_designation =$request->organization_ceo_designation;
        $fc2FormInfo->organization_name_of_executive_responsible_for_bd =$request->organization_name_of_executive_responsible_for_bd;
        $fc2FormInfo->organization_name_of_executive_responsible_for_bd_designation =$request->organization_name_of_executive_responsible_for_bd_designation;
        $fc2FormInfo->objectives_of_the_organization =$request->objectives_of_the_organization;
        $fc2FormInfo->relation_with_donor =$request->relation_with_donor;

        $fc2FormInfo->organization_letter_of_commitment =$request->organization_letter_of_commitment;
        $fc2FormInfo->organization_amount_of_foreign_currency =$request->organization_amount_of_foreign_currency;
        $fc2FormInfo->equivalent_amount_of_bd_taka =$request->equivalent_amount_of_bd_taka;
        $fc2FormInfo->commodities_value_in_bangladeshi_currency =$request->commodities_value_in_bangladeshi_currency;
        $fc2FormInfo->bank_name =$request->bank_name;

        $fc2FormInfo->bank_address =$request->bank_address;
        $fc2FormInfo->bank_account_name =$request->bank_account_name;
        $fc2FormInfo->bank_account_number =$request->bank_account_number;
        $fc2FormInfo->status ='Ongoing';

        $filePath="FcOneForm";

        if ($request->hasfile('organization_name_of_the_job_amount_of_money_and_duration_pdf')) {

            $file = $request->file('organization_name_of_the_job_amount_of_money_and_duration_pdf');

            $fc2FormInfo->organization_name_of_the_job_amount_of_money_and_duration_pdf =CommonController::pdfUpload($request,$file,$filePath);

        }


        if ($request->hasfile('verified_fc_two_form')) {

            $file = $request->file('verified_fc_two_form');

            $fc2FormInfo->verified_fc_two_form =CommonController::pdfUpload($request,$file,$filePath);

        }

        $fc2FormInfo->save();

        $fc2FormInfoId = $fc2FormInfo->id;

        return redirect()->route('editFd2DetailForFc2',base64_encode($fc2FormInfoId))->with('success','Updated Successfuly');


    }


    public function destroy($id){

        $admins = Fc2Form::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }
        return back()->with('error','Deleted successfully!');
    }




    public function show($id){
        $fc2Id = base64_decode($id);

       $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

       $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)
       ->value('ngo_duration_start_date');

       $fd2FormList = Fd2FormForFc2Form::where('fd_one_form_id',$ngo_list_all->id)
       ->where('fc2_form_id',$fc2Id)->latest()->first();

       $fd2OtherInfo = Fd2Fc2OtherInfo::where('fd2_form_for_fc2_form_id',$fd2FormList->id)->latest()->get();

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
           $fc2FormList = Fc2Form::where('fd_one_form_id',$ngo_list_all->id)
           ->where('id',$fc2Id)->latest()->first();





       return view('front.fc2Form.view',compact('fd2OtherInfo','fd2FormList','cityCorporationList','districtList','fc2FormList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

   }


   public function fc2PdfDownload($id){


    $get_file_data = Fc2Form::where('id',$id)->value('organization_name_of_the_job_amount_of_money_and_duration_pdf');

    $file_path = url('public/'.$get_file_data);
                            $filename  = pathinfo($file_path, PATHINFO_FILENAME);

    $file= public_path('/'). $get_file_data;

    $headers = array(
              'Content-Type: application/pdf',
            );

    // return Response::download($file,$filename.'.pdf', $headers);

    return Response::make(file_get_contents($file), 200, [
        'content-type'=>'application/pdf',
    ]);


   }


   public function verifiedFcTwoForm($id){
    $get_file_data = Fc1Form::where('id',$id)->value('verified_fc_two_form');

    $file_path = url('public/'.$get_file_data);
                            $filename  = pathinfo($file_path, PATHINFO_FILENAME);

    $file= public_path('/'). $get_file_data;

    $headers = array(
              'Content-Type: application/pdf',
            );

    // return Response::download($file,$filename.'.pdf', $headers);

    return Response::make(file_get_contents($file), 200, [
        'content-type'=>'application/pdf',
    ]);

   }

}
