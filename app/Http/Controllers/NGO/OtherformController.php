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
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\App;
use Hash;
use Illuminate\Support\Str;
use Mail;
use DateTime;
use DateTimezone;
class OtherformController extends Controller
{


    public function frequentlyAskQuestion(){

        return view('front.other.frequently_ask_question');
    }


    public function informationResetPage(){

        return view('front.other.informationResetPage');
    }

    public function changeLanguage(Request $request){


        $get_lang =  session()->get('locale');

        if($get_lang == 'en'){
            App::setLocale('sp');
            session()->put('locale','sp');

        }else{
            App::setLocale('en');
            session()->put('locale','en');

        }

        return redirect()->back();

    }


    public function change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);

        return redirect()->back();
    }

    public function resetAllData(){

        $all_ngo_member_doc = NgoMemberNidPhoto::where('user_id',Auth::user()->id)->count();
        $all_data_list = NgoMemberList::where('user_id',Auth::user()->id)->count();
        $ngo_list_all = NgoOtherDoc::where('user_id',Auth::user()->id)->count();
        $all_data_list1 = FormEight::where('user_id',Auth::user()->id)->count();
        $all_parti = FdOneForm::where('user_id',Auth::user()->id)->count();
        $first_form_check = NgoTypeAndLanguage::where('user_id',Auth::user()->id)->count();


        $getFdOneFormId = FdOneForm::where('user_id',Auth::user()->id)->value('id');




        $first_form_check_adviser = DB::table('form_one_adviser_lists')->where('fd_one_form_id',$getFdOneFormId)->count();
        $first_form_check_staff = DB::table('form_one_member_lists')->where('fd_one_form_id',$getFdOneFormId)->count();
        $first_form_check_account = DB::table('form_one_bank_accounts')->where('fd_one_form_id',$getFdOneFormId)->count();
        $first_form_check_account_info = DB::table('form_one_other_pdf_lists')->where('fd_one_form_id',$getFdOneFormId)->count();
        $first_form_check_sourceoffunds = DB::table('form_one_source_of_funds')->where('fd_one_form_id',$getFdOneFormId)->count();

        $get_final_result = $first_form_check_sourceoffunds+$first_form_check_account_info+$first_form_check_account+$first_form_check_staff+$first_form_check_adviser+$all_ngo_member_doc + $all_data_list + $ngo_list_all + $all_data_list + $all_parti + $first_form_check;

        if($get_final_result == 0){

            return redirect('/dashboard')->with('error','You did not add any information');

          }else{
          //e//

          session()->forget('locale');

          if($first_form_check_adviser == 0){



            }else{
                $all_ngo_member_doc = DB::table('form_one_adviser_lists')->where('fd_one_form_id',$getFdOneFormId)
        ->delete();

            }



           if($first_form_check_staff == 0){



            }else{
                $all_ngo_member_doc = DB::table('form_one_member_lists')->where('fd_one_form_id',$getFdOneFormId)
        ->delete();

            }



           if($first_form_check_account == 0){



            }else{
                $all_ngo_member_doc = DB::table('form_one_bank_accounts')->where('fd_one_form_id',$getFdOneFormId)
        ->delete();

            }

                     if($first_form_check_account_info == 0){



            }else{
                $all_ngo_member_doc = DB::table('form_one_other_pdf_lists')->where('fd_one_form_id',$getFdOneFormId)
        ->delete();

            }



           if($first_form_check_sourceoffunds == 0){



            }else{
                $all_ngo_member_doc = DB::table('form_one_source_of_funds')->where('fd_one_form_id',$getFdOneFormId)
        ->delete();

            }



            if($all_ngo_member_doc == 0){



            }else{
                $all_ngo_member_doc = NgoMemberNidPhoto::where('user_id',Auth::user()->id)
                ->delete();

            }


            if($all_data_list1 == 0){



            }else{
                $all_data_list1 = FormEight::where('user_id',Auth::user()->id)
                ->delete();

            }


            if($all_data_list == 0){



            }else{
                $all_data_list = NgoMemberList::where('user_id',Auth::user()->id)
                ->delete();

            }

            if($ngo_list_all == 0){


            }else{
                $ngo_list_all = NgoOtherDoc::where('user_id',Auth::user()->id)
                ->delete();

            }



            if($all_parti == 0){


            }else{

                $all_parti = FdOneForm::where('user_id',Auth::user()->id)
                ->delete();
            }


            if($first_form_check == 0){


            }else{
                $first_form_check = NgoTypeAndLanguage::where('user_id',Auth::user()->id)
                ->delete();

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

        $main_time = $dt->format('H:i:s');

        $category_list = new NgoTypeAndLanguage();
        $category_list->ngo_type = $request->ngo_origin;
        $category_list->ngo_language = $request->input_language;
        $category_list->user_id =Auth::user()->id;
        $category_list->time_for_api =$main_time;
        $category_list->save();

        App::setLocale($request->input_language);
        session()->put('locale', $request->input_language);

        $first_form_check = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('first_one_form_check_status');


        if($first_form_check == 1){

            return redirect('ngoAllRegistrationForm');

        }else{

            return redirect('ngoRegistrationFirstInfo');


        }


    }

    public function ngoRegistrationFirstInfo(){


        return view('front.firstTwoStep.ngoRegistrationFirstInfo');


    }


    public function ngoRegistrationFirstInfoPost(Request $request){

        DB::table('ngo_type_and_languages')
->where('user_id',Auth::user()->id)
->update(['first_one_form_check_status'=>1]);

return redirect('ngoAllRegistrationForm');

    }



    public function ngoAllRegistrationForm(){




        $first_form_check = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('first_one_form_check_status');




        $ngoLanguage = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_language');

        if($first_form_check == 1){

            return view('front.firstTwoStep.ngoAllRegistrationForm');

        }elseif(!empty($ngoLanguage)){
            return view('front.firstTwoStep.ngoRegistrationFirstInfo');
        }else{
            return view('front.firstTwoStep.ngoTypeAndLanguage');

        }


    }


    //////3 march ///////////

    public function ngoInstructionPage(){

        return view('front.instruction_page.ngo_instruction_page');
    }


    public function ngoRegistrationFeeList(){


        return view('front.ngo_registration_fee.ngo_registration_fee_list');
    }


    public function finalSubmitRegForm(Request $request){



        $get_reg_id = FdOneForm::where('user_id',Auth::user()->id)->value('registration_number');


        $category_list = new NgoStatus();
        $category_list->user_id = Auth::user()->id;
        $category_list->reg_id = $get_reg_id;
        $category_list->reg_type = $request->reg_type;
        $category_list->status = 'Ongoing';
        $category_list->email = Auth::user()->email;
        $category_list->save();

            $get_v_email = Auth::user()->email;

        Mail::send('emails.reg_number_list', ['token' => $get_reg_id], function($message) use($get_v_email){
            $message->to($get_v_email);
            $message->subject('Ngo Registration Mail');
        });


        return redirect()->back();


    }


    public function statusPage(){

        return view('front.status_page.status_page');

    }


    public function checkStatusRegFrom(Request $request){


        $get_all_the_data_reg = NgoStatus::where('email',$request->email)
        ->where('reg_type',$request->reg_type)
        ->where('reg_id',$request->reg_id)->value('reg_id');


        $get_all_the_data_status = NgoStatus::where('email',$request->email)
        ->where('reg_type',$request->reg_type)
        ->where('reg_id',$request->reg_id)->value('status');


        if(empty($get_all_the_data_reg)){

            return view('front.status_page.check_status_reg_from_empty');

        }else{

            return view('front.status_page.check_status_reg_from_full',compact('get_all_the_data_reg','get_all_the_data_status'));

        }
    }


    public function emailVerifyPage(){



        return view('front.auth_page.err_msg_all');


    }

    public function emailVerifiedPage(){
        return view('front.auth_page.first_reg_mail');

    }
}
