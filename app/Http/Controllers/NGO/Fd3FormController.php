<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fd6Form;
use App\Models\Fd6FormProkolpoArea;
use App\Models\NVisa;
use App\Models\Fd2Form;
use App\Models\Fd2FormOtherInfo;
use App\Models\NgoStatus;
use App\Models\Country;
use App\Models\Fd9Form;
use App\Models\NgoDuration;
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
use App\Models\Fd3Form;
use App\Models\NgoRenewInfo;
use App\Models\Fd2FormForFd3Form;
use App\Models\Fd2Fd3OtherInfo;
use Illuminate\Support\Facades\App;
class Fd3FormController extends Controller
{
    public function index(){

        $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fd3FormList = Fd3Form::where('fd_one_form_id',$ngoListAll->id)->latest()->get();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngoListAll->id)->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngoListAll->id)->orderBy('id','desc')->first();

        return view('front.fd3Form.index',compact('ngoDurationLastEx','ngoDurationReg','ngoListAll','fd3FormList'));
    }


    public function create(){

        $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngoListAll->id)->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngoListAll->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngoListAll->id)->value('web_site_name');
        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();

        return view('front.fd3Form.create',compact('divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngoListAll'));

    }


    public function edit($id){

        $fd6Id = base64_decode($id);

        $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngoListAll->id)->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngoListAll->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngoListAll->id)->value('web_site_name');
        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
        $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')->groupBy('city_orporation')->select('city_orporation')->get();
        $fd3FormList = Fd3Form::where('fd_one_form_id',$ngoListAll->id)->where('id',$fd6Id)->latest()->first();


        return view('front.fd3Form.edit',compact('cityCorporationList','districtList','fd3FormList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngoListAll'));

    }

    public function store(Request $request){

        $request->validate([

             'ngo_name' => 'required|string',
             'ngo_address' => 'required|string',
             'ngo_registration_number' => 'required|string',
             'ngo_registration_date' => 'required|string',
             'ngo_prokolpo_name' => 'required|string',

        ]);


        $fdOneFormID = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fd3FormInfo = new Fd3Form();
        $fd3FormInfo->fd_one_form_id =$fdOneFormID->id;
        $fd3FormInfo->ngo_name =$request->ngo_name;
        $fd3FormInfo->ngo_address =$request->ngo_address;
        $fd3FormInfo->ngo_registration_number =$request->ngo_registration_number;
        $fd3FormInfo->ngo_registration_date =$request->ngo_registration_date;
        $fd3FormInfo->ngo_prokolpo_name =$request->ngo_prokolpo_name;
        $fd3FormInfo->ngo_prokolpo_duration =$request->ngo_prokolpo_duration;
        $fd3FormInfo->project_approval_exemption_letter_memo_number =$request->project_approval_exemption_letter_memo_number;
        $fd3FormInfo->project_approval_exemption_letter_date =$request->project_approval_exemption_letter_date;
        $fd3FormInfo->exemption_amount_in_previous_year =$request->exemption_amount_in_previous_year;
        $fd3FormInfo->money_received_in_the_previous_year =$request->money_received_in_the_previous_year;
        $fd3FormInfo->date_of_payment =$request->date_of_payment;
        $fd3FormInfo->type_of_foreign_grant =$request->type_of_foreign_grant;
        $fd3FormInfo->foreign_grant_amount =$request->foreign_grant_amount;
        $fd3FormInfo->local_grant_amount =$request->local_grant_amount;
        $fd3FormInfo->description_and_price_of_goods =$request->description_and_price_of_goods;
        $fd3FormInfo->foreigner_donor_full_name =$request->foreigner_donor_full_name;
        $fd3FormInfo->foreigner_donor_occupation =$request->foreigner_donor_occupation;
        $fd3FormInfo->foreigner_donor_address =$request->foreigner_donor_address;
        $fd3FormInfo->foreigner_donor_telephone_number =$request->foreigner_donor_telephone_number;
        $fd3FormInfo->foreigner_donor_fax =$request->foreigner_donor_fax;
        $fd3FormInfo->foreigner_donor_email =$request->foreigner_donor_email;
        $fd3FormInfo->foreigner_donor_nationality =$request->foreigner_donor_nationality;
        $fd3FormInfo->foreigner_donor_is_verified =$request->foreigner_donor_is_verified;
        $fd3FormInfo->foreigner_donor_is_affiliatedrict =$request->foreigner_donor_is_affiliatedrict;
        $fd3FormInfo->organization_name =$request->organization_name;
        $fd3FormInfo->organization_address =$request->organization_address;
        $fd3FormInfo->organization_telephone_number =$request->organization_telephone_number;
        $fd3FormInfo->organization_email =$request->organization_email;
        $fd3FormInfo->organization_fax =$request->organization_fax;
        $fd3FormInfo->organization_website =$request->organization_website;
        $fd3FormInfo->organization_is_verified =$request->organization_is_verified;
        $fd3FormInfo->relation_with_donor =$request->relation_with_donor;
        $fd3FormInfo->organization_ceo_name =$request->organization_ceo_name;
        $fd3FormInfo->organization_ceo_designation =$request->organization_ceo_designation;
        $fd3FormInfo->organization_senior_officer_name_one =$request->organization_senior_officer_name_one;
        $fd3FormInfo->organization_senior_officer_designation_one =$request->organization_senior_officer_designation_one;
        $fd3FormInfo->organization_senior_officer_name_two =$request->organization_senior_officer_name_two;
        $fd3FormInfo->organization_senior_officer_designation_two =$request->organization_senior_officer_designation_two;
        $fd3FormInfo->organization_name_of_executive_responsible_for_bd =$request->organization_name_of_executive_responsible_for_bd;
        $fd3FormInfo->organization_name_of_executive_responsible_for_bd_designation =$request->organization_name_of_executive_responsible_for_bd_designation;
        $fd3FormInfo->objectives_of_the_organization =$request->objectives_of_the_organization;
        $fd3FormInfo->communication_between_NGO_and_donor =$request->communication_between_NGO_and_donor;
        $fd3FormInfo->bank_name =$request->bank_name;
        $fd3FormInfo->bank_address =$request->bank_address;
        $fd3FormInfo->bank_account_name =$request->bank_account_name;
        $fd3FormInfo->bank_account_number =$request->bank_account_number;
        $fd3FormInfo->status ='Ongoing';
        $filePath="FdThreeForm";
        if ($request->hasfile('verified_fd_three_form')) {

            $file = $request->file('verified_fd_three_form');
            $fd3FormInfo->verified_fd_three_form =CommonController::pdfUpload($request,$file,$filePath);

        }

        $fd3FormInfo->save();
        $fd3FormInfoId = $fd3FormInfo->id;

        return redirect()->route('addFd2DetailForFd3',base64_encode($fd3FormInfoId))->with('success','Added Successfuly');
    }

    public function update(Request $request,$id){


        $fd3FormInfo = Fd3Form::find($id);
        $fd3FormInfo->ngo_name =$request->ngo_name;
        $fd3FormInfo->ngo_address =$request->ngo_address;
        $fd3FormInfo->ngo_registration_number =$request->ngo_registration_number;
        $fd3FormInfo->ngo_registration_date =$request->ngo_registration_date;
        $fd3FormInfo->ngo_prokolpo_name =$request->ngo_prokolpo_name;
        $fd3FormInfo->ngo_prokolpo_duration =$request->ngo_prokolpo_duration;
        $fd3FormInfo->project_approval_exemption_letter_memo_number =$request->project_approval_exemption_letter_memo_number;
        $fd3FormInfo->project_approval_exemption_letter_date =$request->project_approval_exemption_letter_date;
        $fd3FormInfo->exemption_amount_in_previous_year =$request->exemption_amount_in_previous_year;
        $fd3FormInfo->money_received_in_the_previous_year =$request->money_received_in_the_previous_year;
        $fd3FormInfo->date_of_payment =$request->date_of_payment;
        $fd3FormInfo->type_of_foreign_grant =$request->type_of_foreign_grant;
        $fd3FormInfo->foreign_grant_amount =$request->foreign_grant_amount;
        $fd3FormInfo->local_grant_amount =$request->local_grant_amount;
        $fd3FormInfo->description_and_price_of_goods =$request->description_and_price_of_goods;
        $fd3FormInfo->foreigner_donor_full_name =$request->foreigner_donor_full_name;
        $fd3FormInfo->foreigner_donor_occupation =$request->foreigner_donor_occupation;
        $fd3FormInfo->foreigner_donor_address =$request->foreigner_donor_address;
        $fd3FormInfo->foreigner_donor_telephone_number =$request->foreigner_donor_telephone_number;
        $fd3FormInfo->foreigner_donor_fax =$request->foreigner_donor_fax;
        $fd3FormInfo->foreigner_donor_email =$request->foreigner_donor_email;
        $fd3FormInfo->foreigner_donor_nationality =$request->foreigner_donor_nationality;
        $fd3FormInfo->foreigner_donor_is_verified =$request->foreigner_donor_is_verified;
        $fd3FormInfo->foreigner_donor_is_affiliatedrict =$request->foreigner_donor_is_affiliatedrict;
        $fd3FormInfo->organization_name =$request->organization_name;
        $fd3FormInfo->organization_address =$request->organization_address;
        $fd3FormInfo->organization_telephone_number =$request->organization_telephone_number;
        $fd3FormInfo->organization_email =$request->organization_email;
        $fd3FormInfo->organization_fax =$request->organization_fax;
        $fd3FormInfo->organization_website =$request->organization_website;
        $fd3FormInfo->organization_is_verified =$request->organization_is_verified;
        $fd3FormInfo->relation_with_donor =$request->relation_with_donor;
        $fd3FormInfo->organization_ceo_name =$request->organization_ceo_name;
        $fd3FormInfo->organization_ceo_designation =$request->organization_ceo_designation;
        $fd3FormInfo->organization_senior_officer_name_one =$request->organization_senior_officer_name_one;
        $fd3FormInfo->organization_senior_officer_designation_one =$request->organization_senior_officer_designation_one;
        $fd3FormInfo->organization_senior_officer_name_two =$request->organization_senior_officer_name_two;
        $fd3FormInfo->organization_senior_officer_designation_two =$request->organization_senior_officer_designation_two;
        $fd3FormInfo->organization_name_of_executive_responsible_for_bd =$request->organization_name_of_executive_responsible_for_bd;
        $fd3FormInfo->organization_name_of_executive_responsible_for_bd_designation =$request->organization_name_of_executive_responsible_for_bd_designation;
        $fd3FormInfo->objectives_of_the_organization =$request->objectives_of_the_organization;
        $fd3FormInfo->communication_between_NGO_and_donor =$request->communication_between_NGO_and_donor;
        $fd3FormInfo->bank_name =$request->bank_name;
        $fd3FormInfo->bank_address =$request->bank_address;
        $fd3FormInfo->bank_account_name =$request->bank_account_name;
        $fd3FormInfo->bank_account_number =$request->bank_account_number;
        $filePath="FdThreeForm";
        if ($request->hasfile('verified_fd_three_form')) {

            $file = $request->file('verified_fd_three_form');
            $fd3FormInfo->verified_fd_three_form =CommonController::pdfUpload($request,$file,$filePath);

        }

        $fd3FormInfo->save();
        $fd3FormInfoId = $fd3FormInfo->id;

        return redirect()->route('editFd2DetailForFd3',base64_encode($fd3FormInfoId))->with('success','Updated Successfuly');

    }


    public function show($id){

       $fd3Id = base64_decode($id);

       $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();
       $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngoListAll->id)->value('ngo_duration_start_date');
       $fd2FormList = Fd2FormForFd3Form::where('fd_one_form_id',$ngoListAll->id)->where('fd3_form_id',$fd3Id)->latest()->first();
       $fd2OtherInfo = Fd2Fd3OtherInfo::where('fd2_form_for_fd3_form_id',$fd2FormList->id)->latest()->get();
       $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngoListAll->id)->orderBy('id','desc')->first();
       $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngoListAll->id)->value('web_site_name');
       $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
       $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
       $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')->groupBy('city_orporation')->select('city_orporation')->get();
       $fd3FormList = Fd3Form::where('fd_one_form_id',$ngoListAll->id)->where('id',$fd3Id)->latest()->first();

       return view('front.fd3Form.view',compact('fd2OtherInfo','fd2FormList','cityCorporationList','districtList','fd3FormList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngoListAll'));

   }

   public function destroy($id){

    $admins = Fd3Form::find($id);
    if (!is_null($admins)) {
        $admins->delete();
    }
    return back()->with('error','Deleted successfully!');
}


public function verifiedFdThreeForm($id){

    $getFileData = Fd3Form::where('id',$id)->value('verified_fd_three_form');
    $filePath = url('public/'.$getFileData);
    $filename  = pathinfo($filePath, PATHINFO_FILENAME);
    $file= public_path('/'). $getFileData;

        $headers = array(
                'Content-Type: application/pdf',
                );

    return Response::make(file_get_contents($file), 200, [
        'content-type'=>'application/pdf',
    ]);

   }
}
