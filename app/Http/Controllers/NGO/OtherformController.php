<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NgoTypeAndLanguage;
use App\Models\FdOneForm;
use App\Models\NgoMemberList;
use App\Models\FormEight;
use App\Models\NgoMemberNidPhoto;
use App\Models\NgoOtherDoc;
use App\Models\NgoStatus;
use App\Http\Controllers\NGO\CommonController;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\App;
use Hash;
use Illuminate\Support\Str;
use Mail;
use DateTime;
use DateTimezone;
use App\Models\FdOneOtherPdfList;
use App\Models\FdOneBankAccount;
use App\Models\FdOneAdviserList;
use App\Models\FdOneSourceOfFund;
use App\Models\FdOneMemberList;
use Response;
use Session;
use App\Models\NgoRenew;
class OtherformController extends Controller
{


    public function allNoticeBoard(){
        $url = DB::table('system_information')->first();

        if(!$url){

          $adminUrl = '';
        }else{
            $adminUrl = $url->system_admin_url;

        }

        $noticeList = DB::table('notices')->latest()->get();
        return view('front.other.allNoticeBoard',compact('noticeList','adminUrl'));
    }

    public function viewNotice($id){
        $url = DB::table('system_information')->first();

        if(!$url){

          $adminUrl = '';
        }else{
            $adminUrl = $url->system_admin_url;

        }
        $noticeList = DB::table('notices')->where('id',$id)->value('pdf');
        return view('front.other.viewNotice',compact('noticeList','adminUrl'));
    }


    public function frequentlyAskQuestion(){

        return view('front.other.frequentlyAskQuestion');
    }


    public function informationResetPage(){

        return view('front.other.informationResetPage');
    }

    public function changeLanguage($lan){

       session()->put('locale',$lan);
       CommonController::checkNgotype($lan);
       return redirect()->back();

    }


    public function change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);

        return redirect()->back();
    }

    public function resetAllData(){

        $getFdOneFormId = FdOneForm::where('user_id',Auth::user()->id)->value('id');
        $allNgoMemberDoc = NgoMemberNidPhoto::where('fd_one_form_id',$getFdOneFormId )->count();
        $allDataList = NgoMemberList::where('fd_one_form_id',$getFdOneFormId )->count();
        $ngoListAll = NgoOtherDoc::where('fd_one_form_id',$getFdOneFormId )->count();
        $allDataList1 = FormEight::where('fd_one_form_id',$getFdOneFormId) ->count();
        $allParti = FdOneForm::where('user_id',Auth::user()->id)->count();
        $firstFormCheck = NgoTypeAndLanguage::where('user_id',Auth::user()->id)->count();
        $firstFormCheckAdviser = DB::table('fd_one_adviser_lists')->where('fd_one_form_id',$getFdOneFormId)->count();
        $firstFormStaff = DB::table('fd_one_member_lists')->where('fd_one_form_id',$getFdOneFormId)->count();
        $firstFormCheckAccount = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',$getFdOneFormId)->count();
        $firstFormCheckAccountInfo = DB::table('fd_one_other_pdf_lists')->where('fd_one_form_id',$getFdOneFormId)->count();
        $firstFormCheckSourceOfFunds = DB::table('fd_one_source_of_funds')->where('fd_one_form_id',$getFdOneFormId)->count();
        $checkCompleteStatus = DB::table('form_complete_statuses')->where('user_id',Auth::user()->id)->count();
        $getFinalResult = $checkCompleteStatus + $firstFormCheckSourceOfFunds+$firstFormCheckAccountInfo+$firstFormCheckAccount+$firstFormStaff+$firstFormCheckAdviser+$allNgoMemberDoc + $allDataList + $ngoListAll + $allDataList + $allParti + $firstFormCheck;

        if($getFinalResult == 0){

            return redirect('/dashboard')->with('error','You did not add any information');

          }else{

            if($checkCompleteStatus == 0){
            }else{

                $checkCompleteStatus = DB::table('form_complete_statuses')->where('user_id',Auth::user()->id) ->delete();
            }

            if($firstFormCheckAdviser == 0){
            }else{

                $allNgoMemberDoc = DB::table('fd_one_adviser_lists')->where('fd_one_form_id',$getFdOneFormId)->delete();

            }

            if($firstFormStaff == 0){

            }else{

                $allNgoMemberDoc = DB::table('fd_one_member_lists')->where('fd_one_form_id',$getFdOneFormId)->delete();

            }

            if($firstFormCheckAccount == 0){

            }else{

                $allNgoMemberDoc = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',$getFdOneFormId)->delete();

            }

            if($firstFormCheckAccountInfo == 0){

            }else{

                $allNgoMemberDoc = DB::table('fd_one_other_pdf_lists')->where('fd_one_form_id',$getFdOneFormId)->delete();

            }

            if($firstFormCheckSourceOfFunds == 0){

            }else{

                $allNgoMemberDoc = DB::table('fd_one_source_of_funds')->where('fd_one_form_id',$getFdOneFormId) ->delete();

            }

            if($allNgoMemberDoc == 0){

            }else{

                $allNgoMemberDoc = NgoMemberNidPhoto::where('fd_one_form_id',$getFdOneFormId)->delete();

            }


            if($allDataList1 == 0){

            }else{

                $allDataList1 = FormEight::where('fd_one_form_id',$getFdOneFormId)->delete();

            }


            if($allDataList == 0){

            }else{

                $allDataList = NgoMemberList::where('fd_one_form_id',$getFdOneFormId)->delete();

            }

            if($ngoListAll == 0){

            }else{

                $ngoListAll = NgoOtherDoc::where('fd_one_form_id',$getFdOneFormId)->delete();

            }

            if($allParti == 0){

            }else{

                $allParti = FdOneForm::where('id',$getFdOneFormId)->delete();

            }


            if($firstFormCheck == 0){

            }else{

                $firstFormCheck = NgoTypeAndLanguage::where('user_id',Auth::user()->id)->delete();

            }

        return redirect('/dashboard')->with('error','Successfully Deleted');

        }

    }

    public function ngoTypeAndLanguage(){

        return view('front.firstTwoStep.ngoTypeAndLanguage');
    }


    public function ngoTypeAndLanguagePost(Request $request){


        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $mainTime = $dt->format('H:i:s');

        $languageData = new NgoTypeAndLanguage();
        $languageData->ngo_type = $request->ngo_origin;
        if($request->ngo_origin == 'দেশিও'){
        $languageData->ngo_language ='en';
        }else{
            $languageData->ngo_language ='sp';
        }
        $languageData->ngo_type_new_old = $request->ngo_type;
        if(empty($request->reg_number)){
        $languageData->registration =0;
        }else{
            $languageData->registration = $request->reg_number;
        }
        if(empty($request->last_renew_date)){
        $languageData->last_renew_date = 0;
        }else{
        $languageData->last_renew_date = $request->last_renew_date;
        }
        $languageData->user_id =Auth::user()->id;
        $languageData->time_for_api =$mainTime;
        $languageData->save();

        if($request->ngo_origin == 'দেশিও'){

        App::setLocale('en');
        session()->put('locale','en');
        }else{
        App::setLocale('sp');
        session()->put('locale','sp');
        }

        $firstFormCheck = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('first_one_form_check_status');


        if($firstFormCheck == 1){

            return redirect('ngoAllRegistrationForm');

        }else{

            return redirect('ngoRegistrationFirstInfo');

        }

    }

    public function ngoRegistrationFirstInfo(){

        return view('front.firstTwoStep.ngoRegistrationFirstInfo');

    }


    public function ngoRegistrationFirstInfoPost(Request $request){

        DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->update(['first_one_form_check_status'=>1]);
        return redirect('ngoAllRegistrationForm');

    }

    public function ngoAllRegistrationForm(){


        CommonController::checkNgotype(1);
        $firstFormCheck = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('first_one_form_check_status');
        $ngoLanguage = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_language');
        $mainNgoType = CommonController::changeView();

        if($firstFormCheck == 1){

            return view('front.firstTwoStep.ngoAllRegistrationForm');

        }elseif(!empty($ngoLanguage)){
            return view('front.firstTwoStep.ngoRegistrationFirstInfo');
        }else{
            return view('front.firstTwoStep.ngoTypeAndLanguage');

        }


    }

    public function ngoInstructionPage(){

        return view('front.instructionPage.ngoInstructionPage');
    }


    public function ngoRegistrationFeeList(){

        return view('front.ngoRegistrationFee.ngoRegistrationFeeList');
    }


    public function finalSubmitRegForm(Request $request){

        $mainNgoTypeOld = NgoTypeAndLanguage::where('user_id',Auth::user()->id)->value('ngo_type_new_old');

        if($mainNgoTypeOld == 'Old'){

            $getRegId = FdOneForm::where('user_id',Auth::user()->id)->first();

            $dt = new DateTime();
            $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

            $mainTime = $dt->format('H:i:s a');
            $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();

            $addRenewRequest = new NgoRenew();
            $addRenewRequest->fd_one_form_id = $ngoListAll->id;
            $addRenewRequest->time_for_api =$mainTime;
            $addRenewRequest->status = 'Ongoing';
            $addRenewRequest->save();

            $getVEmail = Auth::user()->email;
            $firstFormCheck = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('registration');

            Mail::send('emails.oldRenew', ['token' => $firstFormCheck,'organization_name' => $getRegId->organization_name], function($message) use($getVEmail){
            $message->to($getVEmail);
            $message->subject('Old NGOAB Renew Service');
            });

        }else{

            $getRegId = FdOneForm::where('user_id',Auth::user()->id)->first();


            $registrationData = new NgoStatus();
            $registrationData->fd_one_form_id = $getRegId->id;
            $registrationData->reg_id = $getRegId->registration_number_given_by_admin;
            $registrationData->reg_type = $request->reg_type;
            $registrationData->status = 'Ongoing';
            $registrationData->email = Auth::user()->email;
            $registrationData->save();

            $getVEmail = Auth::user()->email;

            Mail::send('emails.reg_number_list', ['token' => $getRegId->registration_number_given_by_admin,'organization_name' => $getRegId->organization_name], function($message) use($getVEmail){
                $message->to($getVEmail);
                $message->subject('NGOAB Registration Service || Tracking Number');
            });

        }

        return redirect()->back();

    }

    public function renewalSubmitForOld(Request $request){

        $getRegId = FdOneForm::where('user_id',Auth::user()->id)->first();
        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $mainTime = $dt->format('H:i:s a');


        $addRenewRequest = new NgoRenew();
        $addRenewRequest->fd_one_form_id = $getRegId->id;
        $addRenewRequest->time_for_api =$mainTime;
        $addRenewRequest->status = 'Ongoing';
        $addRenewRequest->save();

        $getVEmail = Auth::user()->email;
        $firstFormCheck = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('registration');

        Mail::send('emails.oldRenew', ['token' => $firstFormCheck,'organization_name' => $getRegId->organization_name], function($message) use($getVEmail){
            $message->to($getVEmail);
            $message->subject('Old NGOAB Renew Service');
        });

        return redirect()->back();
    }


    public function statusPage(){

        return view('front.statusPage.statusPage');

    }


    public function checkStatusRegFrom(Request $request){


        $getAllTheDataReg = NgoStatus::where('email',$request->email)
        ->where('reg_type',$request->reg_type)
        ->where('reg_id',$request->reg_id)->value('reg_id');


        $getAllTheDataStatus = NgoStatus::where('email',$request->email)
        ->where('reg_type',$request->reg_type)
        ->where('reg_id',$request->reg_id)->value('status');


        if(empty($getAllTheDataReg)){

            return view('front.statusPage.checkStatusRegFromEmpty');

        }else{

            return view('front.statusPage.checkStatusRegFromFull',compact('getAllTheDataReg','getAllTheDataStatus'));

        }
    }


    public function emailVerifyPage(){

        return view('front.authPage.errMsgAll');

    }

    public function emailVerifiedPage(){

        return view('front.authPage.firstRegMail');

    }
}
