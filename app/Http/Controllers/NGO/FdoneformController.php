<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\FdOneForm;
use App\Models\FdOneOtherPdfList;
use App\Models\FdOneBankAccount;
use App\Models\FdOneAdviserList;
use App\Models\FdOneSourceOfFund;
use App\Models\FdOneMemberList;
use App\Models\FormCompleteStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use PDF;
use DateTime;
use DateTimezone;
use Response;
use App\Http\Controllers\NGO\CommonController;
class FdoneformController extends Controller
{


    public function fromEightChiefForOldNgo(Request $request){



        $name = $request->name;
        $designation = $request->designation;
        $id = $request->id;
        $place  = $request->place;




        if($place == 0){


        }else{

            Session::put('place',$place);
        }



        $formEightData =FdOneForm::find($id);
        $formEightData->chief_name = $name;
        $formEightData->chief_desi = $designation;
        $formEightData->save();

         return $data = url('fdFormEightInfoPdfOld');


    }


    public function fromOneChief(Request $request){

        $name = $request->name;
        $designation = $request->designation;
        $id = $request->id;
        $place  = $request->place;




        if($place == 0){


        }else{

            Session::put('place',$place);
        }



        $formEightData =FdOneForm::find($id);
        $formEightData->chief_name = $name;
        $formEightData->chief_desi = $designation;
        $formEightData->save();

         return $data = url('fdFormOneInfoPdf');


         //dd($data);


    }


    public function backFromStepTwo(){
        $particularsOfOrganisationData = FdOneForm::where('user_id',Auth::user()->id)

        ->get();

        CommonController::checkNgotype();


        $mainNgoType = CommonController::changeView();

        if($mainNgoType== 'দেশিও'){

        return view('front.form.formone.particularsOfOrganisation',compact('particularsOfOrganisationData'));
        }else{
        return view('front.form.foreign.formone.particularsOfOrganisation',compact('particularsOfOrganisationData'));

        }
    }

    public function planOfOperation($id){

        $get_file_data = FdOneForm::where('id',base64_decode($id))->value('plan_of_operation');

        //dd($get_file_data);

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


    public function attachTheSupportingPaper($id){

        $get_file_data = FdOneForm::where('id',base64_decode($id))->value('attach_the__supporting_paper');

        //dd($get_file_data);

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

    public function otherInfoFromOneDownload($id){

        $get_file_data = FdOneOtherPdfList::where('id',$id)->value('information_pdf');



        $file_path = url('public/'.$get_file_data);



                                //$filename  = pathinfo($file_path, PATHINFO_FILENAME);

        $file= public_path('/').$get_file_data;

        //dd($file);

        $headers = array(
                  'Content-Type: application/pdf',
                );

        // return Response::download($file,$filename.'.pdf', $headers);

        return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
        ]);
    }

    public function sourceOfFundDocDownload($id){

        $get_file_data = FdOneSourceOfFund::where('id',base64_decode($id))->value('letter_file');

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

    public function fdOneFormEdit(){

        $particularsOfOrganisationData = FdOneForm::where('user_id',Auth::user()->id)->get();
        CommonController::checkNgotype();


        $mainNgoType = CommonController::changeView();

        if($mainNgoType== 'দেশিও'){
            return view('front.form.formone.particularsOfOrganisation',compact('particularsOfOrganisationData'));
        }else{
            return view('front.form.foreign.formone.particularsOfOrganisation',compact('particularsOfOrganisationData'));
        }
    }

    public function particularsOfOrganisation(){


        $formCompleteStatus= DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('complete_status');


if(empty($formCompleteStatus)){


        $particularsOfOrganisationData = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->get();

        return view('front.form.formone.particularsOfOrganisation',compact('particularsOfOrganisationData'));

         }elseif($formCompleteStatus == 'all_complete'){

            return $this->fdFormOneInfo();

         }elseif($formCompleteStatus == 'save_and_exit_from_one'){

           $particularsOfOrganisationData = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->get();

            return view('front.form.formone.particularsOfOrganisation',compact('particularsOfOrganisationData'));

            }elseif($formCompleteStatus == 'next_step_from_one'){

            $particularsOfOrganisationData = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->get();

            return view('front.form.formone.fieldOfProposedActivities',compact('particularsOfOrganisationData'));

          }elseif($formCompleteStatus == 'save_and_exit_from_two'){

            $particularsOfOrganisationData = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->get();

            return view('front.form.formone.fieldOfProposedActivities',compact('particularsOfOrganisationData'));

          }elseif($formCompleteStatus == 'next_step_from_two'){

            $particularsOfOrganisationData = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->get();
            $formOneMemberList = FdOneMemberList::where('fd_one_form_id',Session::get('mm_id'))->get();

            return view('front.form.formone.allStaffDetailsInformation',compact('particularsOfOrganisationData','formOneMemberList'));

         }elseif($formCompleteStatus == 'next_step_from_three'){

            $particularsOfOrganisationData = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->get();

            return view('front.form.formone.othersInformation',compact('particularsOfOrganisationData'));

        }elseif($formCompleteStatus == 'save_and_exit_from_three'){

            $particularsOfOrganisationData = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->get();
            $formOneMemberList = FdOneMemberList::where('fd_one_form_id',Session::get('mm_id'))->get();

            return view('front.form.formone.allStaffDetailsInformation',compact('particularsOfOrganisationData','formOneMemberList'));

        }



    }


    public function fieldOfProposedActivities(){

        CommonController::checkNgotype();
        $particularsOfOrganisationData = FdOneForm::where('user_id',Auth::user()->id)

        ->get();

        $mainNgoType = CommonController::changeView();

        if($mainNgoType== 'দেশিও'){

        return view('front.form.formone.fieldOfProposedActivities',compact('particularsOfOrganisationData'));
        }else{

            return view('front.form.foreign.formone.fieldOfProposedActivities',compact('particularsOfOrganisationData'));
        }

    }

    public function allStaffDetailsInformation(){

        CommonController::checkNgotype();

        $particularsOfOrganisationData = FdOneForm::where('user_id',Auth::user()->id)->get();


        $formOneMemberList = FdOneMemberList::where('fd_one_form_id',Session::get('mm_id'))->get();

        $mainNgoType = CommonController::changeView();


        if($mainNgoType== 'দেশিও'){


        return view('front.form.formone.allStaffDetailsInformation',compact('particularsOfOrganisationData','formOneMemberList'));
        }else{

            return view('front.form.foreign.formone.allStaffDetailsInformation',compact('particularsOfOrganisationData','formOneMemberList'));

        }
    }

    public function othersInformation(){

        CommonController::checkNgotype();

        $mainNgoType = CommonController::changeView();

        $particularsOfOrganisationData = FdOneForm::where('user_id',Auth::user()->id)->get();

        if($mainNgoType== 'দেশিও'){
        return view('front.form.formone.othersInformation',compact('particularsOfOrganisationData'));
        }else{
            return view('front.form.foreign.formone.othersInformation',compact('particularsOfOrganisationData'));

        }
    }


    public function fdFormOneInfo(){

        $allformOneData = FdOneForm::where('user_id',Auth::user()->id)->first();
        $get_all_data_adviser_bank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',$allformOneData->id)->first();
        $get_all_data_other= DB::table('fd_one_other_pdf_lists')->where('fd_one_form_id',$allformOneData->id)->get();
        $get_all_data_adviser = DB::table('fd_one_adviser_lists')->where('fd_one_form_id',$allformOneData->id)->get();
        $formOneMemberList = FdOneMemberList::where('fd_one_form_id',$allformOneData->id)->get();
        $get_all_source_of_fund_data = DB::table('fd_one_source_of_funds')->where('fd_one_form_id',$allformOneData->id)->get();



        return view('front.form.formone.fdFormOneInfo',compact('get_all_source_of_fund_data','formOneMemberList','get_all_data_adviser','get_all_data_other','get_all_data_adviser_bank','allformOneData'));


    }


    public function particularsOfOrganisationPost(Request $request){
 //dd($request->all());

         $r_number = mt_rand(1000000000000000, 9999999999999999);

         $arr_all = implode(",",$request->citizenship);

         $dt = new DateTime();
         $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

         $main_time = $dt->format('H:i:s');



         $request->validate([
            'organization_name' => 'required|string',
            'organization_name_ban' => 'required|string',
            'address_of_head_office_eng' => 'required|string',
            'organization_address' => 'required|string',
            'address_of_head_office' => 'required|string',
            'country_of_origin' => 'required|string',
            'name_of_head_in_bd' => 'required|string',
            'job_type' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string',
            'profession' => 'required|string',
            'submit_value' => 'required|string',
        ]);




        $uploadFormOneData = new FdOneForm();
        $uploadFormOneData->user_id = Auth::user()->id;
        $uploadFormOneData->registration_number = 0;
        $uploadFormOneData->local_address = 0 ;
        $uploadFormOneData->registration_number_given_by_admin = $r_number;
        $uploadFormOneData->organization_name = $request->organization_name;
        $uploadFormOneData->organization_name_ban = $request->organization_name_ban;
        $uploadFormOneData->address_of_head_office_eng = $request->address_of_head_office_eng;
        $uploadFormOneData->organization_address = $request->organization_address;
        $uploadFormOneData->address_of_head_office = $request->address_of_head_office;
        $uploadFormOneData->country_of_origin = $request->country_of_origin;
        $uploadFormOneData->name_of_head_in_bd = $request->name_of_head_in_bd;
        $uploadFormOneData->job_type = $request->job_type;
        $uploadFormOneData->address = $request->address;
        $uploadFormOneData->phone = $request->phone;
        $uploadFormOneData->tele_phone_number = $request->tele_phone_number;
        $uploadFormOneData->org_phone = $request->org_phone;
        $uploadFormOneData->org_mobile = $request->org_mobile;
        $uploadFormOneData->org_email = $request->org_email;
        $uploadFormOneData->web_site_name = $request->web_site_name;
        $uploadFormOneData->nationality = $request->nationality;
        $uploadFormOneData->email = $request->email;
        $uploadFormOneData->profession = $request->profession;
        $uploadFormOneData->citizenship = $arr_all;
        $uploadFormOneData->complete_status = $request->submit_value;
        $uploadFormOneData->time_for_api = $main_time;

        if ($request->hasfile('digital_signature')) {
            $filePath="ngoHead";
            $file = $request->file('digital_signature');
            $uploadFormOneData->digital_signature =CommonController::imageUpload($request,$file,$filePath);

        }


        if ($request->hasfile('digital_seal')) {
            $filePath="ngoHead";
            $file = $request->file('digital_seal');
            $uploadFormOneData->digital_seal =CommonController::imageUpload($request,$file,$filePath);

        }


        $uploadFormOneData->save();


        $mm_id = $uploadFormOneData->id;

        Session::put('mm_id',$mm_id);

$checkCompleteStatusData = DB::table('form_complete_statuses')
->where('user_id',Auth::user()->id)
->first();

if(!$checkCompleteStatusData){

    $newStatusData = new FormCompleteStatus();
    $newStatusData->user_id = Auth::user()->id;
    $newStatusData->fd_one_form_step_one_status = 1;
    $newStatusData->fd_one_form_step_two_status = 0;
    $newStatusData->fd_one_form_step_three_status = 0;
    $newStatusData->fd_one_form_step_four_status = 0;
    $newStatusData->form_eight_status = 0;
    $newStatusData->ngo_member_status = 0;
    $newStatusData->ngo_member_nid_photo_status = 0;
    $newStatusData->ngo_other_document_status = 0;
    $newStatusData->save();
}else{

    FormCompleteStatus::where('id', $checkCompleteStatusData->id)
    ->update([
        'fd_one_form_step_one_status' => 1
     ]);


}



        return redirect('/ngoAllRegistrationForm');




    }


    public function particularsOfOrganisationUpdate(Request $request){

       $arr_all = implode(",",$request->citizenship);

       $uploadFormOneData = FdOneForm::find($request->id);
       $uploadFormOneData->user_id = Auth::user()->id;
       $uploadFormOneData->organization_name_ban = $request->organization_name_ban;
       $uploadFormOneData->organization_name = $request->organization_name;
       $uploadFormOneData->organization_address = $request->organization_address;
       $uploadFormOneData->address_of_head_office_eng = $request->address_of_head_office_eng;
       $uploadFormOneData->address_of_head_office = $request->address_of_head_office;
       $uploadFormOneData->country_of_origin = $request->country_of_origin;
       $uploadFormOneData->name_of_head_in_bd = $request->name_of_head_in_bd;
       $uploadFormOneData->job_type = $request->job_type;
       $uploadFormOneData->address = $request->address;
       $uploadFormOneData->phone = $request->phone;
       $uploadFormOneData->org_phone = $request->org_phone;
       $uploadFormOneData->org_mobile = $request->org_mobile;
       $uploadFormOneData->org_email = $request->org_email;
       $uploadFormOneData->web_site_name = $request->web_site_name;
       $uploadFormOneData->nationality = $request->nationality;
       $uploadFormOneData->tele_phone_number = $request->tele_phone_number;
       $uploadFormOneData->email = $request->email;
       $uploadFormOneData->profession = $request->profession;
       $uploadFormOneData->citizenship = $arr_all;
       $uploadFormOneData->complete_status = $request->submit_value;

       if ($request->hasfile('digital_signature')) {
        $filePath="ngoHead";
        $file = $request->file('digital_signature');
        $uploadFormOneData->digital_signature =CommonController::imageUpload($request,$file,$filePath);

    }


    if ($request->hasfile('digital_seal')) {
        $filePath="ngoHead";
        $file = $request->file('digital_seal');
        $uploadFormOneData->digital_seal =CommonController::imageUpload($request,$file,$filePath);

    }


       $uploadFormOneData->save();


       $mm_id = $uploadFormOneData->id;

       Session::put('mm_id',$mm_id);

       $checkCompleteStatusData = DB::table('form_complete_statuses')
->where('user_id',Auth::user()->id)
->first();

if(!$checkCompleteStatusData){

    $newStatusData = new FormCompleteStatus();
    $newStatusData->user_id = Auth::user()->id;
    $newStatusData->fd_one_form_step_one_status = 1;
    $newStatusData->fd_one_form_step_two_status = 0;
    $newStatusData->fd_one_form_step_three_status = 0;
    $newStatusData->fd_one_form_step_four_status = 0;
    $newStatusData->form_eight_status = 0;
    $newStatusData->ngo_member_status = 0;
    $newStatusData->ngo_member_nid_photo_status = 0;
    $newStatusData->ngo_other_document_status = 0;
    $newStatusData->save();
}else{

    FormCompleteStatus::where('id', $checkCompleteStatusData->id)
    ->update([
        'fd_one_form_step_one_status' => 1
     ]);


}

if($request->submit_value == 'exit_from_step_one_edit'){

    return redirect('/ngoAllRegistrationForm');


}elseif($request->submit_value == 'go_to_step_two'){
    Session::put('fdOneFormEdit','fdOneFormEdit');
    return redirect('/fieldOfProposedActivities');

}else{

       return redirect('/ngoAllRegistrationForm');
    }


     }


    public function uploadFromOnePdf(Request $request){

         $cutomeFileName = time().date("Ymd");

        $uploadVerifiedPdf = FdOneForm::find($request->id);
        if ($request->hasfile('verified_fd_one_form')) {
            $filePath="verifiedFdOneForm";
            $file = $request->file('verified_fd_one_form');
   $uploadVerifiedPdf->verified_fd_one_form =CommonController::pdfUpload($request,$file,$filePath);

        }
        $uploadVerifiedPdf->save();

        return redirect()->back()->with('success','Uploaded successfully!');
    }


    public function uploadFromEightPdfOld(Request $request){


        $cutomeFileName = time().date("Ymd");

        $uploadVerifiedPdf = FdOneForm::find($request->id);
        if ($request->hasfile('verified_fd_eight_form_old')) {
            $filePath="verifiedFdOneForm";
            $file = $request->file('verified_fd_eight_form_old');
   $uploadVerifiedPdf->verified_fd_eight_form_old =CommonController::pdfUpload($request,$file,$filePath);

        }
        $uploadVerifiedPdf->save();

        return redirect()->back()->with('success','Uploaded successfully!');


    }





    public function sourceOfFundUpdate(Request $request){



        $cutomeFileName = time().date("Ymd");


        $uploadOneSourceOfFund = FdOneSourceOfFund::find($request->id);
        $uploadOneSourceOfFund->name = $request->name_sour;
        $uploadOneSourceOfFund->address = $request->address;
        if ($request->hasfile('letter_file')) {
             $filePath="FdOneSourceOfFund";
            $file = $request->file('letter_file');
   $uploadOneSourceOfFund->letter_file =CommonController::pdfUpload($request,$file,$filePath);

        }
        $uploadOneSourceOfFund->save();

        return redirect()->back();

    }

    public function adviserDataUpdate(Request $request){
        $addAdviserData = FdOneAdviserList::find($request->id);
        $addAdviserData->name = $request->name;
        $addAdviserData->information = $request->information;

        $addAdviserData->save();

        return redirect()->back();

    }

    public function otherInformationAUpdate(Request $request){
        $cutomeFileName = time().date("Ymd");
        $otherInformationData = FdOneOtherPdfList::find($request->mid);

        if ($request->hasfile('letter_file')) {
            $filePath="FdOneOtherPdfList";
            $file = $request->file('letter_file');
   $otherInformationData->letter_file =CommonController::pdfUpload($request,$file,$filePath);

        }
        $otherInformationData->save();

        return redirect()->back();

    }


    public function sourceOfFundDelete(Request $request)
    {

        $admins = FdOneSourceOfFund::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }


    public function adviserDataDelete(Request $request)
    {

        $admins = FdOneAdviserList::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }



    public function otherInformationADelete(Request $request)
    {

        $admins = FdOneOtherPdfList::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }



    public function fieldOfProposedActivitiesUpdate(Request $request){

        //dd($request->all());
        $cutomeFileName = time().date("Ymd");


        if($request->oldOrNew == 'Old'){
            $request->validate([

                'annual_budget' => 'required|string',
                'submit_value' => 'required|string',
            ]);

        }else{
            $request->validate([
                'district' => 'required|string',
                'annual_budget' => 'required|string',
                'submit_value' => 'required|string',
            ]);

        }





        $updateDataStepTwo = FdOneForm::find($request->mid);
        $updateDataStepTwo->user_id = Auth::user()->id;
        $updateDataStepTwo->district = $request->district;

        $updateDataStepTwo->annual_budget = $request->annual_budget;

        if ($request->hasfile('foregin_pdf')) {
            $filePath="FdOneForm";
            $file = $request->file('foregin_pdf');

            $updateDataStepTwo->foregin_pdf =CommonController::pdfUpload($request,$file,$filePath);

        }


        if ($request->hasfile('annual_budget_file')) {
            $filePath="FdOneForm";
            $file = $request->file('annual_budget_file');

            $updateDataStepTwo->annual_budget_file =CommonController::pdfUpload($request,$file,$filePath);

        }

        if ($request->hasfile('plan_of_operation')) {
            $filePath="FdOneForm";
            $file = $request->file('plan_of_operation');

            $updateDataStepTwo->plan_of_operation =CommonController::pdfUpload($request,$file,$filePath);

        }
        $updateDataStepTwo->complete_status = $request->submit_value;
        $updateDataStepTwo->save();


        $stepTwoId = $updateDataStepTwo->id;
        $input = $request->all();




        if($request->oldOrNew == 'Old'){

        }else{

            $personName = $input['name'];


            $dt = new DateTime();
            $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

            $main_time = $dt->format('H:i:s');

     if (array_key_exists("letter_file", $input)){

       $deleteData = FdOneSourceOfFund::where('fd_one_form_id',$stepTwoId)->delete();

        foreach($personName as $key => $personName){
         $form= new FdOneSourceOfFund();
         $form->name=$input['name'][$key];
         $form->address=$input['address'][$key];
         $file=$input['letter_file'][$key];
        //  $name=time().mt_rand(1000000000, 9999999999).'.'.$file->getClientOriginalExtension();
        //  $file->move('public/uploads/', $name);
        //  $form->letter_file='uploads/'.$name;

        $filePath="FdOneSourceOfFund";
        $form->letter_file =CommonController::pdfUpload($request,$file,$filePath);
        $form->fd_one_form_id = $stepTwoId;
        $form->time_for_api = $main_time;
         $form->save();
}
        }

    }
        Session::put('mm_id',$stepTwoId);


        $checkCompleteStatusData = DB::table('form_complete_statuses')
        ->where('user_id',Auth::user()->id)
        ->first();

        if(!$checkCompleteStatusData){

            $newStatusData = new FormCompleteStatus();
            $newStatusData->user_id = Auth::user()->id;
            $newStatusData->fd_one_form_step_one_status = 1;
            $newStatusData->fd_one_form_step_two_status = 1;
            $newStatusData->fd_one_form_step_three_status = 0;
            $newStatusData->fd_one_form_step_four_status = 0;
            $newStatusData->form_eight_status = 0;
            $newStatusData->ngo_member_status = 0;
            $newStatusData->ngo_member_nid_photo_status = 0;
            $newStatusData->ngo_other_document_status = 0;
            $newStatusData->save();
        }else{

            FormCompleteStatus::where('id', $checkCompleteStatusData->id)
            ->update([
                'fd_one_form_step_two_status' => 1
             ]);


        }

        if($request->submit_value == 'exit_from_step_two_edit'){

            return redirect('/ngoAllRegistrationForm');


        }elseif($request->submit_value == 'go_to_step_three'){

            Session::put('fdOneFormEditThree','go_to_step_three');
            return redirect('/allStaffDetailsInformation');


        }else{

               return redirect('/ngoAllRegistrationForm');
            }

}






    public function allStaffDetailsInformationUpdate(Request $request){

        // $request->validate([
        //     'staff_name.*' => 'required|string',
        //     'staff_position.*' => 'required|string',
        //     'staff_address.*' => 'required|string',
        //     'date_of_join.*' => 'required|string',
        //     'address.*' => 'required|string',
        //     'salary_statement.*' => 'required|string',
        //     'other_occupation.*' => 'required|string',
        //     'submit_value' => 'required|string',
        // ]);
        //dd($request->all());
        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $main_time = $dt->format('H:i:s');

        $delete_all_the_data = FdOneMemberList::where('fd_one_form_id',Session::get('mm_id'))->delete();


        $allStaffDetailInfo = FdOneForm::find($request->id);
        $allStaffDetailInfo->user_id = Auth::user()->id;
        $allStaffDetailInfo->complete_status = $request->submit_value;
        $allStaffDetailInfo->save();


        $input = $request->all();
        $new_cat_dec = $input['staff_name'];


        if (array_key_exists("now_working_at", $input)){

//dd(1);
            foreach($new_cat_dec as $key => $new_cat_dec){

                if($key == 0){
                    if(empty($request->citizenship1)){

                        $arr_all = 0 ;
                    }else{
                    $arr_all = implode(",",$request->citizenship1);
                    }
                }elseif($key == 1){

                    if(empty($request->citizenship2)){

                        $arr_all = 0 ;
                    }else{

                    $arr_all = implode(",",$request->citizenship2);
                    }
                }elseif($key == 2){

                    if(empty($request->citizenship3)){

                        $arr_all = 0 ;
                    }else{
                    $arr_all = implode(",",$request->citizenship3);
                    }
                }
                elseif($key == 3){

                    if(empty($request->citizenship4)){

                        $arr_all = 0 ;
                    }else{
                    $arr_all = implode(",",$request->citizenship4);
                    }
                }elseif($key == 4){

                    if(empty($request->citizenship5)){

                        $arr_all = 0 ;
                    }else{
                    $arr_all = implode(",",$request->citizenship5);
                    }
                }

                $dateFormate = date('Y-m-d', strtotime($input['date_of_join'][$key]));


                if(empty($input['staff_name'][$key])){

                }else{
                $form= new FdOneMemberList();
                $form->name=$input['staff_name'][$key];
                $form->position=$input['staff_position'][$key];
                $form->now_working_at=$input['now_working_at'][$key];
                $form->address=$input['staff_address'][$key];

                $form->email=$input['staff_email'][$key];
                $form->mobile=$input['staff_mobile'][$key];


                $form->date_of_join=$dateFormate;
                $form->citizenship=$arr_all;
                $form->salary_statement=$input['salary_statement'][$key];
                $form->other_occupation	=$input['other_occupation'][$key];
                $form->time_for_api =  $main_time;
                $form->fd_one_form_id = $request->id;
                $form->save();
                }
            }


        }else{
           // dd(22);
        foreach($new_cat_dec as $key => $new_cat_dec){

            if($key == 0){
                if(empty($request->citizenship1)){

                    $arr_all = 0 ;
                }else{
                $arr_all = implode(",",$request->citizenship1);
                }
            }elseif($key == 1){

                if(empty($request->citizenship2)){

                    $arr_all = 0 ;
                }else{

                $arr_all = implode(",",$request->citizenship2);
                }
            }elseif($key == 2){

                if(empty($request->citizenship3)){

                    $arr_all = 0 ;
                }else{
                $arr_all = implode(",",$request->citizenship3);
                }
            }
            elseif($key == 3){

                if(empty($request->citizenship4)){

                    $arr_all = 0 ;
                }else{
                $arr_all = implode(",",$request->citizenship4);
                }
            }elseif($key == 4){

                if(empty($request->citizenship5)){

                    $arr_all = 0 ;
                }else{
                $arr_all = implode(",",$request->citizenship5);
                }
            }
            $dateFormate = date('Y-m-d', strtotime($input['date_of_join'][$key]));

            if(empty($input['staff_name'][$key])){

            }else{
            $form= new FdOneMemberList();
            $form->name=$input['staff_name'][$key];
            $form->position=$input['staff_position'][$key];
            $form->address=$input['staff_address'][$key];

            $form->email=$input['staff_email'][$key];
                $form->mobile=$input['staff_mobile'][$key];

            $form->date_of_join=$dateFormate;
            $form->citizenship=$arr_all;
            $form->salary_statement=$input['salary_statement'][$key];
            $form->other_occupation	=$input['other_occupation'][$key];
            $form->time_for_api =  $main_time;
            $form->fd_one_form_id = $request->id;
            $form->save();
            }
        }

    }


    $checkCompleteStatusData = DB::table('form_complete_statuses')
    ->where('user_id',Auth::user()->id)
    ->first();

    if(!$checkCompleteStatusData){

        $newStatusData = new FormCompleteStatus();
        $newStatusData->user_id = Auth::user()->id;
        $newStatusData->fd_one_form_step_one_status = 1;
        $newStatusData->fd_one_form_step_two_status = 1;
        $newStatusData->fd_one_form_step_three_status = 1;
        $newStatusData->fd_one_form_step_four_status = 0;
        $newStatusData->form_eight_status = 0;
        $newStatusData->ngo_member_status = 0;
        $newStatusData->ngo_member_nid_photo_status = 0;
        $newStatusData->ngo_other_document_status = 0;
        $newStatusData->save();
    }else{

        FormCompleteStatus::where('id', $checkCompleteStatusData->id)
        ->update([
            'fd_one_form_step_three_status' => 1
         ]);


    }

    if($request->submit_value == 'exit_from_step_three_edit'){

        return redirect('/ngoAllRegistrationForm');


    }elseif($request->submit_value == 'go_to_step_four'){

        Session::put('fdOneFormEditFour','go_to_step_four');

        return redirect('/othersInformation');
    }else{

           return redirect('/ngoAllRegistrationForm');
        }

    }







    public function othersInformationUpdate(Request $request){
//dd($request->all());
        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $main_time = $dt->format('H:i:s a');


    $cutomeFileName = time().date("Ymd");

    // $request->validate([

    //     'information_type.*' => 'required',
    //     'name.*' => 'required',
    //     'information.*' => 'required',
    //     'complete_status' => 'required|string',
    //     'treasury_number' => 'required|string',
    //     'vat_invoice_number' => 'required|string',
    //     'attach_the__supporting_papers' => 'required',
    //     'board_of_revenue_on_fees' => 'required',

    // ]);

    $stepFourData = FdOneForm::find($request->id);
    $stepFourData->user_id = Auth::user()->id;
    $stepFourData->treasury_number = $request->treasury_number;
    $stepFourData->vat_invoice_number = $request->vat_invoice_number;

    if ($request->hasfile('copy_of_chalan')) {
        $filePath="copy_of_chalan";
        $file = $request->file('copy_of_chalan');
        $stepFourData->copy_of_chalan =CommonController::pdfUpload($request,$file,$filePath);

    }

    if ($request->hasfile('due_vat_pdf')) {
        $filePath="due_vat_pdf";
        $file = $request->file('due_vat_pdf');
        $stepFourData->due_vat_pdf =CommonController::pdfUpload($request,$file,$filePath);

    }

    if ($request->hasfile('change_ac_number')) {
        $filePath="change_ac_number";
        $file = $request->file('change_ac_number');
        $stepFourData->change_ac_number =CommonController::pdfUpload($request,$file,$filePath);

    }





    if ($request->hasfile('attach_the__supporting_papers')) {
        $filePath="attach_the_supporting_papers";
        $file = $request->file('attach_the__supporting_papers');
        $stepFourData->attach_the__supporting_paper =CommonController::pdfUpload($request,$file,$filePath);

    }


    if ($request->hasfile('board_of_revenue_on_fees')) {
       $file = $request->file('board_of_revenue_on_fees');
       $filePath="board_of_revenue_on_fees";
       $stepFourData->board_of_revenue_on_fees =CommonController::pdfUpload($request,$file,$filePath);

   }

    $stepFourData->complete_status = $request->submit_value;
    $stepFourData->save();


    $mm_id = $stepFourData->id;
    $input = $request->all();

    if($request->oldOrNew == 'Old' || $request->oldOrNew == 'New'){


        if(empty($request->bank_id)){
            //dd(112);
            $form= new FdOneBankAccount();
            $form->account_number=$request->account_number;
            $form->account_type=$request->account_type;
            $form->name_of_bank=$request->name_of_bank;
            $form->branch_name_of_bank=$request->branch_name_of_bank;
            $form->bank_address=$request->bank_address;
            $form->fd_one_form_id = $request->id;
            $form->time_for_api = $main_time;
            $form->save();

        }else{
           // dd(114);

        $form= FdOneBankAccount::find($request->bank_id);
        $form->account_number=$request->account_number;
        $form->account_type=$request->account_type;
        $form->name_of_bank=$request->name_of_bank;
        $form->branch_name_of_bank=$request->branch_name_of_bank;
        $form->bank_address=$request->bank_address;
        $form->fd_one_form_id = $request->id;
        $form->time_for_api = $main_time;
        $form->save();
    }

    ///


    if (array_key_exists("information_type", $input)){

        $new_cat_dec_new = $input['information_type'];

if(empty($new_cat_dec_new)){


}else{
     foreach($new_cat_dec_new as $key => $new_cat_dec_new){


        $form2= new FdOneOtherPdfList();
        $filePath="FdOneOtherPdfList";
        $file=$input['information_type'][$key];
        $form2->information_title =$input['information_title'][$key];
        $form2->information_pdf=CommonController::pdfUpload($request,$file,$filePath);
        $form2->fd_one_form_id = $request->id;
        $form2->time_for_api = $main_time;
        $form2->save();

     }
    }
    }

    $checkCompleteStatusData = DB::table('form_complete_statuses')
    ->where('user_id',Auth::user()->id)
    ->first();


    if($request->ngoOrigin == 'local'){
        if(!$checkCompleteStatusData){

            $newStatusData = new FormCompleteStatus();
            $newStatusData->user_id = Auth::user()->id;
            $newStatusData->fd_one_form_step_one_status = 1;
            $newStatusData->fd_one_form_step_two_status = 1;
            $newStatusData->fd_one_form_step_three_status = 1;
            $newStatusData->fd_one_form_step_four_status = 1;
            $newStatusData->form_eight_status = 0;
            $newStatusData->ngo_member_status = 1;
            $newStatusData->ngo_member_nid_photo_status = 1;
            $newStatusData->ngo_other_document_status = 0;
            $newStatusData->save();
        }else{

            FormCompleteStatus::where('id', $checkCompleteStatusData->id)
            ->update([
                'fd_one_form_step_four_status' => 1,
                'ngo_member_status' => 1,
                'ngo_member_nid_photo_status' => 1
             ]);


        }

    }else{

    if(!$checkCompleteStatusData){

        $newStatusData = new FormCompleteStatus();
        $newStatusData->user_id = Auth::user()->id;
        $newStatusData->fd_one_form_step_one_status = 1;
        $newStatusData->fd_one_form_step_two_status = 1;
        $newStatusData->fd_one_form_step_three_status = 1;
        $newStatusData->fd_one_form_step_four_status = 1;
        $newStatusData->form_eight_status = 1;
        $newStatusData->ngo_member_status = 1;
        $newStatusData->ngo_member_nid_photo_status = 1;
        $newStatusData->ngo_other_document_status = 0;
        $newStatusData->save();
    }else{

        FormCompleteStatus::where('id', $checkCompleteStatusData->id)
        ->update([
            'fd_one_form_step_four_status' => 1,
            'form_eight_status' => 1,
            'ngo_member_status' => 1,
            'ngo_member_nid_photo_status' => 1
         ]);


    }


}

    ///


    }else{



    if(empty($request->account_number)){




    }else{

    if($request->bank_id == 'p'){

        $form= new FdOneBankAccount();
        $form->account_number=$request->account_number;
        $form->account_type=$request->account_type;
        $form->name_of_bank=$request->name_of_bank;
        $form->branch_name_of_bank=$request->branch_name_of_bank;
        $form->bank_address=$request->bank_address;
        $form->fd_one_form_id = $request->id;
        $form->time_for_api = $main_time;
        $form->save();

    }else{

    $form= FdOneBankAccount::find($request->bank_id);
    $form->account_number=$request->account_number;
    $form->account_type=$request->account_type;
    $form->name_of_bank=$request->name_of_bank;
    $form->branch_name_of_bank=$request->branch_name_of_bank;
    $form->bank_address=$request->bank_address;
    $form->fd_one_form_id = $request->id;
    $form->time_for_api = $main_time;
    $form->save();
}
    }
    $input = $request->all();




if(in_array(null, $input['name'])){

}else{

    if (array_key_exists("name", $input)){

       $new_cat_dec = $input['name'];
       foreach($new_cat_dec as $key => $new_cat_dec){

       $form1= new FdOneAdviserList();
       $form1->name=$input['name'][$key];
       $form1->information=$input['information'][$key];
       $form1->fd_one_form_id = $request->id;
       $form1->time_for_api = $main_time;
       $form1->save();

    }

   }

}

   if (array_key_exists("information_type", $input)){

       $new_cat_dec_new = $input['information_type'];


    foreach($new_cat_dec_new as $key => $new_cat_dec_new){


       $form2= new FdOneOtherPdfList();
       $filePath="FdOneOtherPdfList";
       $file=$input['information_type'][$key];

       $form2->information_pdf=CommonController::pdfUpload($request,$file,$filePath);
       $form2->fd_one_form_id = $request->id;
       $form2->time_for_api = $main_time;
       $form2->save();

    }

   }

   $checkCompleteStatusData = DB::table('form_complete_statuses')
   ->where('user_id',Auth::user()->id)
   ->first();

   if($request->ngoOrigin == 'local'){
    if(!$checkCompleteStatusData){

        $newStatusData = new FormCompleteStatus();
        $newStatusData->user_id = Auth::user()->id;
        $newStatusData->fd_one_form_step_one_status = 1;
        $newStatusData->fd_one_form_step_two_status = 1;
        $newStatusData->fd_one_form_step_three_status = 1;
        $newStatusData->fd_one_form_step_four_status = 1;
        $newStatusData->form_eight_status = 0;
        $newStatusData->ngo_member_status = 1;
        $newStatusData->ngo_member_nid_photo_status = 1;
        $newStatusData->ngo_other_document_status = 0;
        $newStatusData->save();
    }else{

        FormCompleteStatus::where('id', $checkCompleteStatusData->id)
        ->update([
            'fd_one_form_step_four_status' => 1,
            'ngo_member_status' => 1,
            'ngo_member_nid_photo_status' => 1
         ]);


    }

}else{

if(!$checkCompleteStatusData){

    $newStatusData = new FormCompleteStatus();
    $newStatusData->user_id = Auth::user()->id;
    $newStatusData->fd_one_form_step_one_status = 1;
    $newStatusData->fd_one_form_step_two_status = 1;
    $newStatusData->fd_one_form_step_three_status = 1;
    $newStatusData->fd_one_form_step_four_status = 1;
    $newStatusData->form_eight_status = 1;
    $newStatusData->ngo_member_status = 1;
    $newStatusData->ngo_member_nid_photo_status = 1;
    $newStatusData->ngo_other_document_status = 0;
    $newStatusData->save();
}else{

    FormCompleteStatus::where('id', $checkCompleteStatusData->id)
    ->update([
        'fd_one_form_step_four_status' => 1,
        'form_eight_status' => 1,
        'ngo_member_status' => 1,
        'ngo_member_nid_photo_status' => 1
     ]);


}


}

}
   return redirect('/ngoAllRegistrationForm');

}



public function fdFormEightInfoPdfOld(){

    //dd(11);

    $allformOneData = FdOneForm::where('user_id',Auth::user()->id)->first();
    $getNgoTypeForPdf = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
    $get_all_data_adviser_bank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',$allformOneData->id)->first();
    $get_all_data_other= DB::table('fd_one_other_pdf_lists')->where('fd_one_form_id',$allformOneData->id)->get();
    $get_all_data_adviser = DB::table('fd_one_adviser_lists')->where('fd_one_form_id',$allformOneData->id)->get();
    $formOneMemberList = FdOneMemberList::where('fd_one_form_id',$allformOneData->id)->get();
    $get_all_source_of_fund_data = DB::table('fd_one_source_of_funds')->where('fd_one_form_id',$allformOneData->id)->get();


    $file_Name_Custome = 'fd_eight_form';

    $payment_detail = 11;




    $pdf=PDF::loadView('front.form.foreign.formone.fdFormEightInfoPdfOld',[
        'getNgoTypeForPdf'=>$getNgoTypeForPdf,

        'get_all_source_of_fund_data'=>$get_all_source_of_fund_data,
        'formOneMemberList'=>$formOneMemberList,
        'get_all_data_adviser'=>$get_all_data_adviser,
        'get_all_data_other'=>$get_all_data_other,
        'get_all_data_adviser_bank'=>$get_all_data_adviser_bank,
        'allformOneData'=>$allformOneData

    ],[],['format' => 'A4']);
return $pdf->stream($file_Name_Custome.''.'.pdf');

}


    public function fdFormOneInfoPdf(){

        $allformOneData = FdOneForm::where('user_id',Auth::user()->id)->first();
        $getNgoTypeForPdf = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
        $get_all_data_adviser_bank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',$allformOneData->id)->first();
        $get_all_data_other= DB::table('fd_one_other_pdf_lists')->where('fd_one_form_id',$allformOneData->id)->get();
        $get_all_data_adviser = DB::table('fd_one_adviser_lists')->where('fd_one_form_id',$allformOneData->id)->get();
        $formOneMemberList = FdOneMemberList::where('fd_one_form_id',$allformOneData->id)->get();
        $get_all_source_of_fund_data = DB::table('fd_one_source_of_funds')->where('fd_one_form_id',$allformOneData->id)->get();


        $file_Name_Custome = 'fd_one_form';

        $payment_detail = 11;


        CommonController::checkNgotype();

        $mainNgoType = CommonController::changeView();



        if($mainNgoType== 'দেশিও'){

        $pdf=PDF::loadView('front.form.formone.fdFormOneInfoPdf',[
            'getNgoTypeForPdf'=>$getNgoTypeForPdf,

            'get_all_source_of_fund_data'=>$get_all_source_of_fund_data,
            'formOneMemberList'=>$formOneMemberList,
            'get_all_data_adviser'=>$get_all_data_adviser,
            'get_all_data_other'=>$get_all_data_other,
            'get_all_data_adviser_bank'=>$get_all_data_adviser_bank,
            'allformOneData'=>$allformOneData

        ],[],['format' => 'A4']);
    return $pdf->stream($file_Name_Custome.''.'.pdf');
    }else{


        $pdf=PDF::loadView('front.form.foreign.formone.fdFormOneInfoPdf',[
            'getNgoTypeForPdf'=>$getNgoTypeForPdf,

            'get_all_source_of_fund_data'=>$get_all_source_of_fund_data,
            'formOneMemberList'=>$formOneMemberList,
            'get_all_data_adviser'=>$get_all_data_adviser,
            'get_all_data_other'=>$get_all_data_other,
            'get_all_data_adviser_bank'=>$get_all_data_adviser_bank,
            'allformOneData'=>$allformOneData

        ],[],['format' => 'A4']);
    return $pdf->stream($file_Name_Custome.''.'.pdf');


    }

    }


}
