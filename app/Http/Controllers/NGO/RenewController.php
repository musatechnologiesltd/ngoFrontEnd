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
use Illuminate\Support\Facades\App;
use App\Models\FdOneForm;
use App\Models\NgoMemberList;
use App\Models\NgoOtherDoc;
use App\Models\NgoMemberNidPhoto;
use App\Models\NameChange;
use App\Models\NgoRenew;
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
    public function renew(){
        $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)
        ->value('ngo_type');
        // if($checkNgoTypeForForeginNgo == 'Foreign'){

        //     App::setLocale('sp');
        //     session()->put('locale','sp');

        // }else{

        //     App::setLocale('en');
        //     session()->put('locale','en');
        // }


        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        //dd($ngo_list_all->id);
        $name_change_list_all =  NgoRenew::where('fd_one_form_id',$ngo_list_all->id)->latest()->get();


        CommonController::checkNgotype();

        $mainNgoType = CommonController::changeView();

        if($mainNgoType== 'দেশিও'){

        return view('front.renew.renew',compact('ngo_list_all','name_change_list_all'));
        }else{
            return view('front.renew.foreign.renew',compact('ngo_list_all','name_change_list_all'));
        }
    }



    public function ngoRenewStepOne(){

        $get_all_data_new = NgoRenewInfo::where('user_id',Auth::user()->id)->latest()->get();
         $all_parti = FdOneForm::where('user_id',Auth::user()->id)->get();
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $name_change_list_all =  NgoRenew::where('fd_one_form_id',$ngo_list_all->id)->latest()->get();


        CommonController::checkNgotype();

        $mainNgoType = CommonController::changeView();

  if($mainNgoType== 'দেশিও'){
        return view('front.renew.ngo_renew_list_new',compact('get_all_data_new','ngo_list_all','name_change_list_all','all_parti'));
  }else{
    return view('front.renew.foreign.ngo_renew_list_new',compact('get_all_data_new','ngo_list_all','name_change_list_all','all_parti'));
  }
    }



    public function updateRenewInformationList(Request $request){



        $time_dy = time().date("Ymd");


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
        $ngoRenew->phone = $request->phone;
        $ngoRenew->nationality = $request->nationality;
        $ngoRenew->email = $request->email;
        $ngoRenew->mobile = $request->mobile;
        $ngoRenew->web_site_name = $request->web_site_name;
        $ngoRenew->mobile_new = $request->mobile_new;
        $ngoRenew->email_new = $request->email_new;
        $ngoRenew->phone_new = $request->phone_new;
        $ngoRenew->profession = $request->profession;
        if ($request->hasfile('foregin_pdf')) {
         $file = $request->file('foregin_pdf');

         $ngoRenew->foregin_pdf =CommonController::pdfUpload($request,$file,$filePath);

     }


     if ($request->hasfile('yearly_budget')) {
         $file = $request->file('yearly_budget');

         $ngoRenew->yearly_budget =CommonController::pdfUpload($request,$file,$filePath);

     }



        $ngoRenew->save();


        $mm_id = $ngoRenew->id;

return redirect('/allStaffInformationForRenew');



    }


    public function storeRenewInformationList(Request $request){




        $time_dy = time().date("Ymd");

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
       $ngoRenew->nationality = $request->nationality;
       $ngoRenew->mobile = $request->mobile;
       $ngoRenew->web_site_name = $request->web_site_name;
       $ngoRenew->mobile_new = $request->mobile_new;
       $ngoRenew->email_new = $request->email_new;
       $ngoRenew->phone_new = $request->phone_new;
       $ngoRenew->profession = $request->profession;

       if ($request->hasfile('foregin_pdf')) {
        $file = $request->file('foregin_pdf');

        $ngoRenew->foregin_pdf = CommonController::pdfUpload($request,$file,$filePath);

    }


    if ($request->hasfile('yearly_budget')) {
        $file = $request->file('yearly_budget');

        $ngoRenew->yearly_budget =CommonController::pdfUpload($request,$file,$filePath);

    }



       $ngoRenew->save();


       $mm_id = $ngoRenew->id;

return redirect('/allStaffInformationForRenew');



    }


    public function renewInfo($id){

           $getUserIdFrom = NgoRenew::where('id',base64_decode($id))->first();
           $all_partiw1 = FdOneForm::where('id',$getUserIdFrom->fd_one_form_id)->first();
           $get_all_data_new = NgoRenewInfo::where('fd_one_form_id',$getUserIdFrom->fd_one_form_id)->first();
           $all_partiw = FdOneMemberList::where('fd_one_form_id',$getUserIdFrom->fd_one_form_id)->get();
           $get_all_data_adviser_bank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',$getUserIdFrom->fd_one_form_id)->first();

           CommonController::checkNgotype();

        $mainNgoType = CommonController::changeView();

        if($mainNgoType== 'দেশিও'){


        return view('front.renew.renewInfo',compact('get_all_data_adviser_bank','all_partiw1','all_partiw','get_all_data_new','getUserIdFrom'));
        }else{
            return view('front.renew.foreign.renewInfo',compact('get_all_data_adviser_bank','all_partiw1','all_partiw','get_all_data_new','getUserIdFrom'));

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

        $formEightData =NgoRenewInfo::find($id);
        $formEightData->chief_name = $name;
        $formEightData->chief_desi = $designation;
        $formEightData->save();

         return $data = url('downloadRenewPdf/'.base64_encode($id));

    }

    public function downloadRenewPdf($id){

        //dd(33);
        $get_all_data_new = NgoRenewInfo::where('id',base64_decode($id))->first();

        //$getUserIdFrom = NgoRenew::where('id',base64_decode($id))->first();
        $all_partiw1 = FdOneForm::where('id',$get_all_data_new->fd_one_form_id)->first();

        $all_partiw = FdOneMemberList::where('fd_one_form_id',$get_all_data_new->fd_one_form_id)->get();
        $get_all_data_adviser_bank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',$get_all_data_new->fd_one_form_id)->first();


        $file_Name_Custome = 'fd_eight_form';





        $pdf=PDF::loadView('front.renew.downloadRenewPdf',[
            'get_all_data_new'=>$get_all_data_new,

            'all_partiw1'=>$all_partiw1,
            'all_partiw'=>$all_partiw,
            'get_all_data_adviser_bank'=>$get_all_data_adviser_bank

        ],[],['format' => 'A4']);
    return $pdf->stream($file_Name_Custome.''.'.pdf');


    }


    public function allStaffInformationForRenew(){

        $getUserIdFrom = FdOneForm::where('user_id',Auth::user()->id)->value('id');
        $all_partiw = FdOneMemberList::where('fd_one_form_id',$getUserIdFrom)->get();

        CommonController::checkNgotype();

        $mainNgoType = CommonController::changeView();

        if($mainNgoType== 'দেশিও'){

        return view('front.renew.all_staff_information_for_renew',compact('all_partiw'));
        }else{

            return view('front.renew.foreign.all_staff_information_for_renew',compact('all_partiw'));

        }
    }

    public function otherInformationForRenew(){
        $getUserIdFrom = FdOneForm::where('user_id',Auth::user()->id)->value('id');
        $all_partiw = FdOneBankAccount::where('fd_one_form_id',$getUserIdFrom)->get();


        CommonController::checkNgotype();

        $mainNgoType = CommonController::changeView();

        if($mainNgoType== 'দেশিও'){

        return view('front.renew.other_information_for_renew',compact('all_partiw'));
        }else{

            return view('front.renew.foreign.other_information_for_renew',compact('all_partiw'));

        }
    }

    public function otherInformationForRenewNewPost(Request $request){
       // dd($request->all());

        $input = $request->all();


        $condition_main_id = $input['id'];
        foreach($condition_main_id as $key => $condition_main_id){
              $form=FdOneMemberList::find($input['id'][$key]);
                $form->mobile=$input['staff_mobile'][$key];
                $form->email=$input['staff_email'][$key];

                $form->save();
        }

        return redirect()->route('otherInformationForRenew');
    }


    public function otherInformationForRenewGet(Request $request){
//dd($request->copy_of_chalan);
        $time_dy = time().date("Ymd");

       $Ngorenewinfo_get_id = NgoRenewInfo::where('user_id',Auth::user()->id)
       ->orderBy('id','desc')->value('id');
       $filePath="NgoRenewInfo";

        $ngoRenew = NgoRenewInfo::find($Ngorenewinfo_get_id);
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



        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $main_time = $dt->format('H:i:s a');


        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        //dd($ngo_list_all->id);
        $add_renew_request = new NgoRenew();
        $add_renew_request->fd_one_form_id = $ngo_list_all->id;
        $add_renew_request->time_for_api =$main_time;
        $add_renew_request->status = 'Ongoing';
        $add_renew_request->save();

        return redirect('/renew')->with('success','Renew Request Send Successfully');

    }

    public function foreginPdfDownload($id){

        $get_file_data = NgoRenewInfo::where('id',base64_decode($id))->value('foregin_pdf');

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

    public function yearlyBudgetPdfDownload($id){
        $get_file_data = NgoRenewInfo::where('id',base64_decode($id))->value('yearly_budget');

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

    public function copyOfChalanPdfDownload($id){
        $get_file_data = NgoRenewInfo::where('id',base64_decode($id))->value('copy_of_chalan');

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

    public function dueVatPdfDownload($id){

        $get_file_data = NgoRenewInfo::where('id',base64_decode($id))->value('due_vat_pdf');

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
        public function changeAcNumberDownload($id){
            $get_file_data = NgoRenewInfo::where('id',base64_decode($id))->value('change_ac_number');

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

