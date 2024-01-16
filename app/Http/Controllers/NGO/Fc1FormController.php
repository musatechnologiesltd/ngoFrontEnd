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


        return view('front.fc1Form.edit',compact('cityCorporationList','districtList','fc1FormList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

    }


    public function store(Request $request){

        //dd($request->all());

        $request->validate([

            'ngo_name' => 'required|string',
            'ngo_address' => 'required|string',
            'ngo_telephone_number' => 'required|string',
            'ngo_mobile_number' => 'required|string',
            'ngo_email' => 'required|string',
            'ngo_website' => 'required|string',
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


            //'relation_with_donor' => 'required|string',
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
        $fc1FormInfo = new Fc1Form();
        $fc1FormInfo->fd_one_form_id =$fdOneFormID->id;
        $fc1FormInfo->ngo_name =$request->ngo_name;
        $fc1FormInfo->ngo_address =$request->ngo_address;
        $fc1FormInfo->ngo_telephone_number =$request->ngo_telephone_number;
        $fc1FormInfo->ngo_mobile_number =$request->ngo_mobile_number;
        $fc1FormInfo->ngo_email =$request->ngo_email;

        $fc1FormInfo->ngo_website =$request->ngo_website;
        $fc1FormInfo->ngo_prokolpo_start_date =$request->ngo_prokolpo_start_date;
        $fc1FormInfo->ngo_prokolpo_end_date =$request->ngo_prokolpo_end_date;
        $fc1FormInfo->ngo_district =$request->ngo_district;
        $fc1FormInfo->ngo_sub_district =$request->ngo_sub_district;
        $fc1FormInfo->total_number_of_beneficiaries =$request->total_number_of_beneficiaries;
        $fc1FormInfo->foreigner_donor_full_name =$request->foreigner_donor_full_name;
        $fc1FormInfo->foreigner_donor_occupation =$request->foreigner_donor_occupation;
        $fc1FormInfo->foreigner_donor_address =$request->foreigner_donor_address;
        $fc1FormInfo->foreigner_donor_telephone_number =$request->foreigner_donor_telephone_number;

        $fc1FormInfo->foreigner_donor_fax =$request->foreigner_donor_fax;
        $fc1FormInfo->foreigner_donor_email =$request->foreigner_donor_email;
        $fc1FormInfo->foreigner_donor_nationality =$request->foreigner_donor_nationality;
        $fc1FormInfo->foreigner_donor_is_verified =$request->foreigner_donor_is_verified;
        $fc1FormInfo->foreigner_donor_is_affiliatedrict =$request->foreigner_donor_is_affiliatedrict;

        $fc1FormInfo->organization_name =$request->organization_name;
        $fc1FormInfo->organization_address =$request->organization_address;
        $fc1FormInfo->organization_telephone_number =$request->organization_telephone_number;
        $fc1FormInfo->organization_email =$request->organization_email;
        $fc1FormInfo->organization_fax =$request->organization_fax;
        $fc1FormInfo->organization_website =$request->organization_website;
        $fc1FormInfo->organization_is_verified =$request->organization_is_verified;
        $fc1FormInfo->organization_ceo_name =$request->organization_ceo_name;
        $fc1FormInfo->organization_ceo_designation =$request->organization_ceo_designation;
        $fc1FormInfo->organization_name_of_executive_responsible_for_bd =$request->organization_name_of_executive_responsible_for_bd;
        $fc1FormInfo->organization_name_of_executive_responsible_for_bd_designation =$request->organization_name_of_executive_responsible_for_bd_designation;
        $fc1FormInfo->objectives_of_the_organization =$request->objectives_of_the_organization;
        $fc1FormInfo->relation_with_donor =$request->relation_with_donor;

        $fc1FormInfo->organization_letter_of_commitment =$request->organization_letter_of_commitment;
        $fc1FormInfo->organization_amount_of_foreign_currency =$request->organization_amount_of_foreign_currency;
        $fc1FormInfo->equivalent_amount_of_bd_taka =$request->equivalent_amount_of_bd_taka;
        $fc1FormInfo->commodities_value_in_bangladeshi_currency =$request->commodities_value_in_bangladeshi_currency;
        $fc1FormInfo->bank_name =$request->bank_name;

        $fc1FormInfo->bank_address =$request->bank_address;
        $fc1FormInfo->bank_account_name =$request->bank_account_name;
        $fc1FormInfo->bank_account_number =$request->bank_account_number;
        $fc1FormInfo->status ='Ongoing';

        $filePath="FcOneForm";

        if ($request->hasfile('organization_name_of_the_job_amount_of_money_and_duration_pdf')) {

            $file = $request->file('organization_name_of_the_job_amount_of_money_and_duration_pdf');

            $fc1FormInfo->organization_name_of_the_job_amount_of_money_and_duration_pdf =CommonController::pdfUpload($request,$file,$filePath);

        }


        if ($request->hasfile('verified_fc_one_form')) {

            $file = $request->file('verified_fc_one_form');

            $fc1FormInfo->verified_fc_one_form =CommonController::pdfUpload($request,$file,$filePath);

        }







        $fc1FormInfo->save();

        $fc1FormInfoId = $fc1FormInfo->id;


        return redirect()->route('addFd2DetailForFc1',base64_encode($fc1FormInfoId))->with('success','Added Successfuly');


    }





    public function update(Request $request,$id){


        $fc1FormInfo = Fc1Form::find($id);
        $fc1FormInfo->ngo_name =$request->ngo_name;
        $fc1FormInfo->ngo_address =$request->ngo_address;
        $fc1FormInfo->ngo_telephone_number =$request->ngo_telephone_number;
        $fc1FormInfo->ngo_mobile_number =$request->ngo_mobile_number;
        $fc1FormInfo->ngo_email =$request->ngo_email;

        $fc1FormInfo->ngo_website =$request->ngo_website;
        $fc1FormInfo->ngo_prokolpo_start_date =$request->ngo_prokolpo_start_date;
        $fc1FormInfo->ngo_prokolpo_end_date =$request->ngo_prokolpo_end_date;
        $fc1FormInfo->ngo_district =$request->ngo_district;
        $fc1FormInfo->ngo_sub_district =$request->ngo_sub_district;
        $fc1FormInfo->total_number_of_beneficiaries =$request->total_number_of_beneficiaries;
        $fc1FormInfo->foreigner_donor_full_name =$request->foreigner_donor_full_name;
        $fc1FormInfo->foreigner_donor_occupation =$request->foreigner_donor_occupation;
        $fc1FormInfo->foreigner_donor_address =$request->foreigner_donor_address;
        $fc1FormInfo->foreigner_donor_telephone_number =$request->foreigner_donor_telephone_number;

        $fc1FormInfo->foreigner_donor_fax =$request->foreigner_donor_fax;
        $fc1FormInfo->foreigner_donor_email =$request->foreigner_donor_email;
        $fc1FormInfo->foreigner_donor_nationality =$request->foreigner_donor_nationality;
        $fc1FormInfo->foreigner_donor_is_verified =$request->foreigner_donor_is_verified;
        $fc1FormInfo->foreigner_donor_is_affiliatedrict =$request->foreigner_donor_is_affiliatedrict;

        $fc1FormInfo->organization_name =$request->organization_name;
        $fc1FormInfo->organization_address =$request->organization_address;
        $fc1FormInfo->organization_telephone_number =$request->organization_telephone_number;
        $fc1FormInfo->organization_email =$request->organization_email;
        $fc1FormInfo->organization_fax =$request->organization_fax;
        $fc1FormInfo->organization_website =$request->organization_website;
        $fc1FormInfo->organization_is_verified =$request->organization_is_verified;
        $fc1FormInfo->organization_ceo_name =$request->organization_ceo_name;
        $fc1FormInfo->organization_ceo_designation =$request->organization_ceo_designation;
        $fc1FormInfo->organization_name_of_executive_responsible_for_bd =$request->organization_name_of_executive_responsible_for_bd;
        $fc1FormInfo->organization_name_of_executive_responsible_for_bd_designation =$request->organization_name_of_executive_responsible_for_bd_designation;
        $fc1FormInfo->objectives_of_the_organization =$request->objectives_of_the_organization;
        $fc1FormInfo->relation_with_donor =$request->relation_with_donor;

        $fc1FormInfo->organization_letter_of_commitment =$request->organization_letter_of_commitment;
        $fc1FormInfo->organization_amount_of_foreign_currency =$request->organization_amount_of_foreign_currency;
        $fc1FormInfo->equivalent_amount_of_bd_taka =$request->equivalent_amount_of_bd_taka;
        $fc1FormInfo->commodities_value_in_bangladeshi_currency =$request->commodities_value_in_bangladeshi_currency;
        $fc1FormInfo->bank_name =$request->bank_name;

        $fc1FormInfo->bank_address =$request->bank_address;
        $fc1FormInfo->bank_account_name =$request->bank_account_name;
        $fc1FormInfo->bank_account_number =$request->bank_account_number;
        $fc1FormInfo->status ='Ongoing';

        $filePath="FcOneForm";

        if ($request->hasfile('organization_name_of_the_job_amount_of_money_and_duration_pdf')) {

            $file = $request->file('organization_name_of_the_job_amount_of_money_and_duration_pdf');

            $fc1FormInfo->organization_name_of_the_job_amount_of_money_and_duration_pdf =CommonController::pdfUpload($request,$file,$filePath);

        }

        if ($request->hasfile('verified_fc_one_form')) {

            $file = $request->file('verified_fc_one_form');

            $fc1FormInfo->verified_fc_one_form =CommonController::pdfUpload($request,$file,$filePath);

        }

        $fc1FormInfo->save();

        $fc1FormInfoId = $fc1FormInfo->id;

        return redirect()->route('editFd2DetailForFc1',base64_encode($fc1FormInfoId))->with('success','Updated Successfuly');


    }


    public function destroy($id){

        $admins = Fc1Form::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }
        return back()->with('error','Deleted successfully!');
    }




    public function show($id){
        $fc1Id = base64_decode($id);

       $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

       $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)
       ->value('ngo_duration_start_date');

       $fd2FormList = Fd2FormForFc1Form::where('fd_one_form_id',$ngo_list_all->id)
       ->where('fc1_form_id',$fc1Id)->latest()->first();

       $fd2OtherInfo = Fd2Fc1OtherInfo::where('fd2_form_for_fc1_form_id',$fd2FormList->id)->latest()->get();

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
           ->where('id',$fc1Id)->latest()->first();





       return view('front.fc1Form.view',compact('fd2OtherInfo','fd2FormList','cityCorporationList','districtList','fc1FormList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

   }


   public function fc1PdfDownload($id){


    $get_file_data = Fc1Form::where('id',$id)->value('organization_name_of_the_job_amount_of_money_and_duration_pdf');

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


   public function verifiedFcOneForm($id){

    $get_file_data = Fc1Form::where('id',$id)->value('verified_fc_one_form');

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
