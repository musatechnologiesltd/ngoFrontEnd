<?php

namespace App\Http\Controllers\NGO\OLDNGO;

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

use Response;
use App\Models\NgoTypeAndLanguage;
use App\Models\FormEight;
use DateTime;
use DateTimezone;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use App\Models\NgoMemberList;
use App\Models\NgoOtherDoc;
use App\Models\NgoMemberNidPhoto;
use App\Models\NameChange;
use App\Models\NgoRenew;
use App\Models\RenewalFile;
use App\Models\NgoRenewInfo;
use App\Http\Controllers\NGO\CommonController;
class FD8Controller extends Controller
{
    public function addDataStepOneFd8($id){

        $deCodeId = base64_decode($id);




        $fdOneData = FdOneForm::where('id',$deCodeId)->first();
        $regnumber = NgoTypeAndLanguage::where('user_id',Auth::user()->id)->first();

        //dd($fdOneData);

        FdOneForm::where('id',$deCodeId)
        ->update([
            'registration_number' => $regnumber->registration
         ]);



        $time_dy = time().date("Ymd");

        $filePath="NgoRenewInfo";

       $ngoRenew = new NgoRenewInfo();
       $ngoRenew->fd_one_form_id = $fdOneData->id;
       $ngoRenew->user_id = Auth::user()->id;
       $ngoRenew->registration_number = $regnumber->registration;
       $ngoRenew->organization_name = $fdOneData->organization_name;
       $ngoRenew->organization_address = $fdOneData->organization_address;
       $ngoRenew->address_of_head_office = $fdOneData->address_of_head_office;
       $ngoRenew->country_of_origin = $fdOneData->country_of_origin;
       $ngoRenew->name_of_head_in_bd = $fdOneData->name_of_head_in_bd;
       $ngoRenew->job_type = $fdOneData->job_type;
       $ngoRenew->address = $fdOneData->address;
       $ngoRenew->phone = $fdOneData->tele_phone_number;
       $ngoRenew->email = $fdOneData->email;
       $ngoRenew->nationality = $fdOneData->nationality;
       $ngoRenew->mobile = $fdOneData->phone;
       $ngoRenew->web_site_name = $fdOneData->web_site_name;
       $ngoRenew->mobile_new = $fdOneData->org_mobile;
       $ngoRenew->email_new = $fdOneData->org_email;
       $ngoRenew->phone_new = $fdOneData->org_phone;
       $ngoRenew->profession = $fdOneData->profession;
       $ngoRenew->save();



       Session::put('newFd8Id',$ngoRenew->id);




       return redirect('/ngoAllRegistrationForm');
    }


    public function addDataStepTwoFd8($id){



        $deCodeId = base64_decode($id);




        $fdOneData = FdOneForm::where('id',$deCodeId)->first();

        //dd($fdOneData);


        $regnumber = NgoTypeAndLanguage::where('user_id',Auth::user()->id)->first();


        if(empty(Session::get('updateFd8Id'))){




        $ngoRenew = NgoRenewInfo::find(Session::get('newFd8Id'));


        }else{

            $ngoRenew = NgoRenewInfo::find(Session::get('updateFd8Id'));
        }


        $ngoRenew->yearly_budget = $fdOneData->annual_budget;
        $ngoRenew->foregin_pdf = $fdOneData->foregin_pdf;
        $ngoRenew->yearly_budget_file =$fdOneData->annual_budget_file;
        $ngoRenew->save();
        Session::put('newFd8Id',$ngoRenew->id);



        if(empty(Session::get('updateFd8Id'))){

}else{
    Session::forget('updateFd8Id');
            }



        if($fdOneData->complete_status = 'go_to_step_three'){

            return redirect('/othersInformation');

        }else{
               return redirect('/ngoAllRegistrationForm');
        }



        //return redirect('/ngoAllRegistrationForm');
    }


    public function addDataStepThreeFd8($id){
        $deCodeId = base64_decode($id);

        $fdOneData = FdOneForm::where('id',$deCodeId)->first();

        // dd($fdOneData);


         $regnumber = NgoTypeAndLanguage::where('user_id',Auth::user()->id)->first();



         $time_dy = time().date("Ymd");

          $ngoRenew = NgoRenewInfo::find(Session::get('newFd8Id'));
          $ngoRenew->main_account_number = $fdOneData->account_number;
          $ngoRenew->main_account_type = $fdOneData->account_type;
          $ngoRenew->name_of_bank = $fdOneData->name_of_bank;
          $ngoRenew->main_account_name_of_branch = $fdOneData->branch_name_of_bank;
          $ngoRenew->bank_address_main = $fdOneData->bank_address;
          $ngoRenew->change_ac_number =$fdOneData->change_ac_number;
          $ngoRenew->copy_of_chalan =$fdOneData->copy_of_chalan;
          $ngoRenew->due_vat_pdf =$fdOneData->due_vat_pdf;
          $ngoRenew->save();






         Session::put('newFd8Id',$ngoRenew->id);
         return redirect('/ngoAllRegistrationForm');


    }



    public function updateDataStepOneFd8($id){

        $deCodeId = base64_decode($id);




        $fdOneData = FdOneForm::where('id',$deCodeId)->first();
        $regnumber = NgoTypeAndLanguage::where('user_id',Auth::user()->id)->first();



        $renewId = NgoRenewInfo::where('fd_one_form_id',$deCodeId)
                                     ->orderBy('id','desc')->value('id');

        //dd($fdOneData);

        FdOneForm::where('id',$deCodeId)
        ->update([
            'registration_number' => $regnumber->registration
         ]);



        $time_dy = time().date("Ymd");

        $filePath="NgoRenewInfo";

       $ngoRenew = NgoRenewInfo::find($renewId);
       $ngoRenew->fd_one_form_id = $fdOneData->id;
       $ngoRenew->organization_name = $fdOneData->organization_name;
       $ngoRenew->organization_address = $fdOneData->organization_address;
       $ngoRenew->address_of_head_office = $fdOneData->address_of_head_office;
       $ngoRenew->country_of_origin = $fdOneData->country_of_origin;
       $ngoRenew->name_of_head_in_bd = $fdOneData->name_of_head_in_bd;
       $ngoRenew->job_type = $fdOneData->job_type;
       $ngoRenew->address = $fdOneData->address;
       $ngoRenew->phone = $fdOneData->tele_phone_number;
       $ngoRenew->email = $fdOneData->email;
       $ngoRenew->nationality = $fdOneData->nationality;
       $ngoRenew->mobile = $fdOneData->phone;
       $ngoRenew->web_site_name = $fdOneData->web_site_name;
       $ngoRenew->mobile_new = $fdOneData->org_mobile;
       $ngoRenew->email_new = $fdOneData->org_email;
       $ngoRenew->phone_new = $fdOneData->org_phone;
       $ngoRenew->profession = $fdOneData->profession;
       $ngoRenew->save();



       Session::put('updateFd8Id',$ngoRenew->id);



if($fdOneData->complete_status = 'go_to_step_two'){

    return redirect('/fieldOfProposedActivities');

}else{
       return redirect('/ngoAllRegistrationForm');
}
    }


}
