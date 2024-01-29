<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Response;
use App\Models\NgoTypeAndLanguage;
use App\Models\FormEight;
use App\Models\FdOneMemberList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PDF;
use DateTime;
use DateTimezone;
use Carbon\Carbon;
use Session;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\App;
use App\Models\FdOneForm;
use App\Models\NgoMemberList;
use App\Models\NgoOtherDoc;
use App\Models\NgoMemberNidPhoto;
use App\Models\NameChange;
use App\Models\NgoRenew;
use App\Models\RenewalFile;
use App\Models\NgoRenewInfo;
use App\Models\FdOneBankAccount;
use App\Http\Controllers\NGO\CommonController;
class RenewController extends Controller
{

    public function foreignNgoType(Request $request){

        $structureStatus = $request->structureStatus;

        if($structureStatus == 'Yes'){

        $data = view('front.renew.structureStatusYes')->render();
        return response()->json($data);


        }elseif($structureStatus == 'No'){

        $data = view('front.renew.structureStatusNo')->render();
        return response()->json($data);


        }


    }


    public function localNgoType(Request $request){

        $structureStatus = $request->structureStatus;

        if($structureStatus == 'Yes'){

        $data = view('front.renew.local.structureStatusYes')->render();
        return response()->json($data);


        }elseif($structureStatus == 'No'){

        $data = view('front.renew.local.structureStatusNo')->render();
        return response()->json($data);


        }

    }

        public function fileListForNameChange(Request $request){

            $structureStatus = $request->structureStatus;

            if($structureStatus == 'Yes'){

            $data = view('front.nameChange.structureStatusYes')->render();
            return response()->json($data);


            }elseif($structureStatus == 'No'){

            $data = view('front.nameChange.structureStatusNo')->render();
            return response()->json($data);


            }


    }
    public function renew(){

        $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
        $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();
        $nameChangeListAll =  NgoRenew::where('fd_one_form_id',$ngoListAll->id)->latest()->get();
        CommonController::checkNgotype(1);
        $mainNgoType = CommonController::changeView();

        if($mainNgoType== 'দেশিও'){

        return view('front.renew.renew',compact('ngoListAll','nameChangeListAll'));

        }else{

            return view('front.renew.foreign.renew',compact('ngoListAll','nameChangeListAll'));

        }
    }



    public function ngoRenewStepOne(){

        $getAllDataNew = NgoRenewInfo::where('user_id',Auth::user()->id)->latest()->get();
        $all_parti = FdOneForm::where('user_id',Auth::user()->id)->get();
        $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();
        $nameChangeListAll =  NgoRenew::where('fd_one_form_id',$ngoListAll->id)->latest()->get();
        CommonController::checkNgotype(1);
        $mainNgoType = CommonController::changeView();

        if($mainNgoType== 'দেশিও'){
                return view('front.renew.ngoRenewListNew',compact('getAllDataNew','ngoListAll','nameChangeListAll','all_parti'));
        }else{
                return view('front.renew.foreign.ngoRenewListNew',compact('getAllDataNew','ngoListAll','nameChangeListAll','all_parti'));
        }
    }



    public function updateRenewInformationList(Request $request){

        $timeDy = time().date("Ymd");

        $filePath="NgoRenewInfo";

        $ngoRenew = NgoRenewInfo::find($request->id);
        $ngoRenew->user_id = Auth::user()->id;
        $ngoRenew->registration_number = $request->registration_number;
        $ngoRenew->organization_name = $request->organization_name;
        $ngoRenew->organization_address = $request->organization_address;
        $ngoRenew->address_of_head_office = $request->address_of_head_office;
        $ngoRenew->country_of_origin = $request->country_of_origin;
        $ngoRenew->name_of_head_in_bd = $request->name_of_head_in_bd;
        $ngoRenew->job_type = $request->job_type;
        $ngoRenew->address = $request->address;
        $ngoRenew->chief_name = $request->chief_name;
        $ngoRenew->chief_desi = $request->chief_desi;
        $ngoRenew->phone = $request->phone;
        $ngoRenew->nationality = $request->nationality;
        $ngoRenew->email = $request->email;
        $ngoRenew->mobile = $request->mobile;
        $ngoRenew->web_site_name = $request->web_site_name;
        $ngoRenew->mobile_new = $request->mobile_new;
        $ngoRenew->email_new = $request->email_new;
        $ngoRenew->phone_new = $request->phone_new;
        $ngoRenew->profession = $request->profession;
        $ngoRenew->yearly_budget = $request->yearly_budget;

        if ($request->hasfile('digital_signature')) {

         $filePath="ngoHead";
         $file = $request->file('digital_signature');
         $ngoRenew->digital_signature =CommonController::imageUpload($request,$file,$filePath);

        }

        if ($request->hasfile('digital_seal')) {

            $filePath="ngoHead";
            $file = $request->file('digital_seal');
            $ngoRenew->digital_seal =CommonController::imageUpload($request,$file,$filePath);
        }
        if ($request->hasfile('foregin_pdf')) {

         $file = $request->file('foregin_pdf');
         $ngoRenew->foregin_pdf =CommonController::pdfUpload($request,$file,$filePath);

        }

        if ($request->hasfile('yearly_budget_file')) {

            $file = $request->file('yearly_budget_file');
            $ngoRenew->yearly_budget_file =CommonController::pdfUpload($request,$file,$filePath);

        }

        $ngoRenew->save();
        $mm_id = $ngoRenew->id;

        return redirect('/otherInformationForRenew');

    }


    public function storeRenewInformationList(Request $request){

        $request->validate([

            'digital_signature' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:60|dimensions:width=300,height=80',
            'digital_seal' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:80|dimensions:width=300,height=100',
        ]);

        $timeDy = time().date("Ymd");

       $filePath="NgoRenewInfo";

       $ngoRenew = new NgoRenewInfo();
       $ngoRenew->fd_one_form_id = $request->id;
       $ngoRenew->user_id = Auth::user()->id;
       $ngoRenew->registration_number = $request->registration_number;
       $ngoRenew->organization_name = $request->organization_name;
       $ngoRenew->organization_address = $request->organization_address;
       $ngoRenew->address_of_head_office = $request->address_of_head_office;
       $ngoRenew->country_of_origin = $request->country_of_origin;
       $ngoRenew->name_of_head_in_bd = $request->name_of_head_in_bd;
       $ngoRenew->job_type = $request->job_type;
       $ngoRenew->address = $request->address;
       $ngoRenew->phone = $request->phone;
       $ngoRenew->email = $request->email;
       $ngoRenew->chief_name = $request->chief_name;
       $ngoRenew->chief_desi = $request->chief_desi;
       $ngoRenew->nationality = $request->nationality;
       $ngoRenew->mobile = $request->mobile;
       $ngoRenew->web_site_name = $request->web_site_name;
       $ngoRenew->mobile_new = $request->mobile_new;
       $ngoRenew->email_new = $request->email_new;
       $ngoRenew->phone_new = $request->phone_new;
       $ngoRenew->profession = $request->profession;
       $ngoRenew->yearly_budget = $request->yearly_budget;

       if ($request->hasfile('digital_signature')) {

        $filePath="ngoHead";
        $file = $request->file('digital_signature');
        $ngoRenew->digital_signature =CommonController::imageUpload($request,$file,$filePath);

        }

        if ($request->hasfile('digital_seal')) {

        $filePath="ngoHead";
        $file = $request->file('digital_seal');
        $ngoRenew->digital_seal =CommonController::imageUpload($request,$file,$filePath);

        }

        if ($request->hasfile('foregin_pdf')) {

        $file = $request->file('foregin_pdf');
        $ngoRenew->foregin_pdf = CommonController::pdfUpload($request,$file,$filePath);

        }

        if ($request->hasfile('yearly_budget_file')) {

            $file = $request->file('yearly_budget_file');
            $ngoRenew->yearly_budget_file =CommonController::pdfUpload($request,$file,$filePath);

        }

       $ngoRenew->save();
       $mm_id = $ngoRenew->id;

       return redirect('/allStaffInformationForRenew');

    }


    public function renewInfo($id){

            $getUserIdFrom = NgoRenew::where('id',base64_decode($id))->first();
            $allPartiw1 = FdOneForm::where('id',$getUserIdFrom->fd_one_form_id)->first();
            $getAllDataNew = NgoRenewInfo::where('fd_one_form_id',$getUserIdFrom->fd_one_form_id)->first();
            $allPartiw = FdOneMemberList::where('fd_one_form_id',$getUserIdFrom->fd_one_form_id)->get();
            $getAllDataAdviserBank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',$getUserIdFrom->fd_one_form_id)->first();

            CommonController::checkNgotype(1);

            $mainNgoType = CommonController::changeView();

            if($mainNgoType== 'দেশিও'){

                return view('front.renew.renewInfo',compact('getAllDataAdviserBank','allPartiw1','allPartiw','getAllDataNew','getUserIdFrom'));

            }else{

                return view('front.renew.foreign.renewInfo',compact('getAllDataAdviserBank','allPartiw1','allPartiw','getAllDataNew','getUserIdFrom'));

            }
    }


    public function verifiedFdEightDownload(Request $request){

        $fd9FormInfo = NgoRenewInfo::find($request->id);

        if ($request->hasfile('verified_fd_eight_form')) {

            $filePath="fd8FormInfo";
            $file = $request->file('verified_fd_eight_form');
            $fd9FormInfo->verified_form =CommonController::pdfUpload($request,$file,$filePath);
        }

        $fd9FormInfo->save();

        return redirect()->back()->with('success','Update Successfully');

    }


    public function renewChief(Request $request){

        $name = $request->name;
        $designation = $request->designation;
        $id = $request->id;
        return $data = url('downloadRenewPdf/'.base64_encode($id));

    }

    public function downloadRenewPdf($id){


        $getAllDataNew = NgoRenewInfo::where('id',base64_decode($id))->first();
        $allPartiw1 = FdOneForm::where('id',$getAllDataNew->fd_one_form_id)->first(); $allPartiw = FdOneMemberList::where('fd_one_form_id',$getAllDataNew->fd_one_form_id)->get();
        $getAllDataAdviserBank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',$getAllDataNew->fd_one_form_id)->first();

        $fileNameCustome = 'fd_eight_form';

        $data =view('front.renew.downloadRenewPdf',[
                    'getAllDataNew'=>$getAllDataNew,

                    'allPartiw1'=>$allPartiw1,
                    'allPartiw'=>$allPartiw,
                    'getAllDataAdviserBank'=>$getAllDataAdviserBank

                ])->render();


        $pdfFilePath =$fileNameCustome.'.pdf';


                     $mpdf = new Mpdf([
                        'default_font' => 'nikosh'
                    ]);

                    $mpdf->WriteHTML($data);
                    $mpdf->Output($pdfFilePath, "I");
                    die();


    }


    public function allStaffInformationForRenew(){

        $getUserIdFrom = FdOneForm::where('user_id',Auth::user()->id)->value('id');
        $allPartiw = FdOneMemberList::where('fd_one_form_id',$getUserIdFrom)->get();
        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();

        if($mainNgoType== 'দেশিও'){

        return view('front.renew.allStaffInformationForRenew',compact('allPartiw'));

        }else{

            return view('front.renew.foreign.allStaffInformationForRenew',compact('allPartiw'));

        }
    }

    public function otherInformationForRenew(){

        $getUserIdFrom = FdOneForm::where('user_id',Auth::user()->id)->value('id');
        $allPartiw = FdOneBankAccount::where('fd_one_form_id',$getUserIdFrom)->latest()->limit(1)->get();
        CommonController::checkNgotype(1);
        $mainNgoType = CommonController::changeView();

        if($mainNgoType== 'দেশিও'){

        return view('front.renew.otherInformationForRenew',compact('allPartiw'));

        }else{

            return view('front.renew.foreign.otherInformationForRenew',compact('allPartiw'));

        }
    }

    public function otherInformationForRenewNewPost(Request $request){

        $input = $request->all();
        $conditionMainId = $input['id'];
        foreach($conditionMainId as $key => $conditionMainId){

            $form=FdOneMemberList::find($input['id'][$key]);
            $form->mobile=$input['staff_mobile'][$key];
            $form->email=$input['staff_email'][$key];
            $form->save();

        }

        return redirect()->route('otherInformationForRenew');
    }


    public function otherInformationForRenewGet(Request $request){

        $timeDy = time().date("Ymd");
        $NgorenewinfoGetId = NgoRenewInfo::where('user_id',Auth::user()->id)->orderBy('id','desc')->value('id');
        $filePath="NgoRenewInfo";

        $ngoRenew = NgoRenewInfo::find($NgorenewinfoGetId);
        $ngoRenew->main_account_number = $request->main_account_number;
        $ngoRenew->main_account_type = $request->main_account_type;
        $ngoRenew->name_of_bank = $request->name_of_bank;
        $ngoRenew->main_account_name_of_branch = $request->main_account_name_of_branch;
        $ngoRenew->bank_address_main = $request->bank_address_main;

        if ($request->hasfile('change_ac_number')) {

            $file = $request->file('change_ac_number');
            $ngoRenew->change_ac_number =CommonController::pdfUpload($request,$file,$filePath);
        }

        if ($request->hasfile('copy_of_chalan')) {

            $file = $request->file('copy_of_chalan');
            $ngoRenew->copy_of_chalan =CommonController::pdfUpload($request,$file,$filePath);
        }

        if ($request->hasfile('due_vat_pdf')) {

            $file = $request->file('due_vat_pdf');
            $ngoRenew->due_vat_pdf =CommonController::pdfUpload($request,$file,$filePath);

        }
        $ngoRenew->save();


        $getUserIdFrom = FdOneForm::where('user_id',Auth::user()->id)->value('id');


        $newDataAll = new RenewalFile();
        $newDataAll->fd_one_form_id = $getUserIdFrom;
        $newDataAll->constitution_of_the_organization_has_changed = $request->constitution_of_the_organization_has_changed;
            if ($request->hasfile('constitution_of_the_organization_if_unchanged')) {

                $filePath="RenewalFile";
                $file = $request->file('constitution_of_the_organization_if_unchanged');
                $newDataAll->constitution_of_the_organization_if_unchanged =CommonController::pdfUpload($request,$file,$filePath);

            }
        if ($request->hasfile('final_fd_eight_form')) {

                $filePath="RenewalFile";
                $file = $request->file('final_fd_eight_form');
                $newDataAll->final_fd_eight_form =CommonController::pdfUpload($request,$file,$filePath);

            }

        if ($request->hasfile('nid_and_image_of_executive_committee_members')) {

                $filePath="RenewalFile";
                $file = $request->file('nid_and_image_of_executive_committee_members');
                $newDataAll->nid_and_image_of_executive_committee_members =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('approval_of_executive_committee')) {

                $filePath="RenewalFile";
                $file = $request->file('approval_of_executive_committee');
                $newDataAll->approval_of_executive_committee =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('committee_members_list')) {

                $filePath="RenewalFile";
                $file = $request->file('committee_members_list');
                $newDataAll->committee_members_list =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('registration_renewal_fee')) {

                $filePath="RenewalFile";
                $file = $request->file('registration_renewal_fee');
                $newDataAll->registration_renewal_fee =CommonController::pdfUpload($request,$file,$filePath);

            }

        if ($request->hasfile('list_of_board_of_directors_or_board_of_trustees')) {

                $filePath="RenewalFile";
                $file = $request->file('list_of_board_of_directors_or_board_of_trustees');
                $newDataAll->list_of_board_of_directors_or_board_of_trustees =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('organization_by_laws_or_constitution')) {

                $filePath="RenewalFile";
                $file = $request->file('organization_by_laws_or_constitution');
                $newDataAll->organization_by_laws_or_constitution =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('work_procedure_of_organization')) {

                $filePath="RenewalFile";
                $file = $request->file('work_procedure_of_organization');
                $newDataAll->work_procedure_of_organization =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('last_ten_years_audit_report_and_annual_report_of_the_company')) {

                $filePath="RenewalFile";
                $file = $request->file('last_ten_years_audit_report_and_annual_report_of_the_company');
                $newDataAll->last_ten_years_audit_report_and_annual_report_of_the_company =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('registration_certificate')) {
                $filePath="RenewalFile";
            $file = $request->file('registration_certificate');
            $newDataAll->registration_certificate =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('attested_copy_of_latest_registration_or_renewal_certificate')) {

                $filePath="RenewalFile";
                $file = $request->file('attested_copy_of_latest_registration_or_renewal_certificate');
                $newDataAll->attested_copy_of_latest_registration_or_renewal_certificate =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('right_to_information_act')) {

                $filePath="RenewalFile";
                $file = $request->file('right_to_information_act');
                $newDataAll->right_to_information_act =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('the_constitution_of_the_company_along_with_fee_if_changed')) {

                $filePath="RenewalFile";
                $file = $request->file('the_constitution_of_the_company_along_with_fee_if_changed');
                $newDataAll->the_constitution_of_the_company_along_with_fee_if_changed =CommonController::pdfUpload($request,$file,$filePath);

            }


            if ($request->hasfile('constitution_approved_by_primary_registering_authority')) {

                $filePath="RenewalFile";
                $file = $request->file('constitution_approved_by_primary_registering_authority');
                $newDataAll->constitution_approved_by_primary_registering_authority =CommonController::pdfUpload($request,$file,$filePath);

            }


            if ($request->hasfile('clean_copy_of_the_constitution')) {

                $filePath="RenewalFile";
                $file = $request->file('clean_copy_of_the_constitution');
                $newDataAll->clean_copy_of_the_constitution =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('payment_of_change_fee')) {

                $filePath="RenewalFile";
                $file = $request->file('payment_of_change_fee');
                $newDataAll->payment_of_change_fee =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('section_sub_section_of_the_constitution')) {

                $filePath="RenewalFile";
                $file = $request->file('section_sub_section_of_the_constitution');
                $newDataAll->section_sub_section_of_the_constitution =CommonController::pdfUpload($request,$file,$filePath);

            }


            if ($request->hasfile('previous_constitution_and_current_constitution_compare')) {

                $filePath="RenewalFile";
                $file = $request->file('previous_constitution_and_current_constitution_compare');
                $newDataAll->previous_constitution_and_current_constitution_compare =CommonController::pdfUpload($request,$file,$filePath);

            }

        $newDataAll->save();

        //new code  for renew

        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $mainTime = $dt->format('H:i:s a');

        $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();

        $add_renew_request = new NgoRenew();
        $add_renew_request->fd_one_form_id = $ngoListAll->id;
        $add_renew_request->time_for_api =$mainTime;
        $add_renew_request->status = 'Ongoing';
        $add_renew_request->save();

        return redirect('/renew')->with('success','Renew Request Send Successfully');

    }

    public function foreginPdfDownload($id){

        $getFileData = NgoRenewInfo::where('id',base64_decode($id))->value('foregin_pdf');

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

    public function yearlyBudgetPdfDownload($id){
        $getFileData = NgoRenewInfo::where('id',base64_decode($id))->value('yearly_budget');

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

    public function copyOfChalanPdfDownload($id){
        $getFileData = NgoRenewInfo::where('id',base64_decode($id))->value('copy_of_chalan');

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

    public function dueVatPdfDownload($id){

        $getFileData = NgoRenewInfo::where('id',base64_decode($id))->value('due_vat_pdf');

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

    public function changeAcNumberDownload($id){
        $getFileData = NgoRenewInfo::where('id',base64_decode($id))->value('change_ac_number');

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

