<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\FdOneForm;
use App\Models\FormOneOtherPdfList;
use App\Models\FormOneBankAccount;
use App\Models\FormOneAdviserList;
use App\Models\FormOneSourceOfFund;
use App\Models\FormOneMemberList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use PDF;
use DateTime;
use DateTimezone;
use Response;
use App\Models\Ngo_type_and_language;
use App\Models\Ngo_committee_member;
class FdoneformController extends Controller
{


    public function backFromStepTwo(){
        $particularsOfOrganisationData = FdOneForm::where('user_id',Auth::user()->id)

        ->get();

        return view('front.form.formone.particularsOfOrganisation',compact('particularsOfOrganisationData'));

    }

    public function otherInfoFromOneDownload($id){

        $get_file_data = FormOneOtherPdfList::where('id',$id)->value('information_type');

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

    public function sourceOfFundDocDownload($id){

        $get_file_data = FormOneSourceOfFund::where('id',$id)->value('letter_file');

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

            return view('front.form.formone.particularsOfOrganisation',compact('particularsOfOrganisationData'));

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
            $formOneMemberList = FormOneMemberList::where('fd_one_form_id',Session::get('mm_id'))->get();

            return view('front.form.formone.allStaffDetailsInformation',compact('particularsOfOrganisationData','formOneMemberList'));

         }elseif($formCompleteStatus == 'next_step_from_three'){

            $particularsOfOrganisationData = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->get();

            return view('front.form.formone.othersInformation',compact('particularsOfOrganisationData'));

        }elseif($formCompleteStatus == 'save_and_exit_from_three'){

            $particularsOfOrganisationData = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->get();
            $formOneMemberList = FormOneMemberList::where('fd_one_form_id',Session::get('mm_id'))->get();

            return view('front.form.formone.allStaffDetailsInformation',compact('particularsOfOrganisationData','formOneMemberList'));

        }



    }


    public function fieldOfProposedActivities(){


        $particularsOfOrganisationData = FdOneForm::where('user_id',Auth::user()->id)

        ->get();

        return view('front.form.formone.fieldOfProposedActivities',compact('particularsOfOrganisationData'));

    }

    public function allStaffDetailsInformation(){

        $particularsOfOrganisationData = FdOneForm::where('user_id',Auth::user()->id)->get();


        $formOneMemberList = FormOneMemberList::where('fd_one_form_id',Session::get('mm_id'))->get();

        return view('front.form.formone.allStaffDetailsInformation',compact('particularsOfOrganisationData','formOneMemberList'));

    }

    public function othersInformation(){

        $particularsOfOrganisationData = FdOneForm::where('user_id',Auth::user()->id)->get();

        return view('front.form.formone.othersInformation',compact('particularsOfOrganisationData'));

    }


    public function fdFormOneInfo(){

        $allformOneData = FdOneForm::where('user_id',Auth::user()->id)->first();
        $get_all_data_adviser_bank = DB::table('form_one_bank_accounts')->where('fd_one_form_id',$allformOneData->id)->first();
        $get_all_data_other= DB::table('form_one_other_pdf_lists')->where('fd_one_form_id',$allformOneData->id)->get();
        $get_all_data_adviser = DB::table('form_one_adviser_lists')->where('fd_one_form_id',$allformOneData->id)->get();
        $formOneMemberList = FormOneMemberList::where('fd_one_form_id',$allformOneData->id)->get();
        $get_all_source_of_fund_data = DB::table('form_one_source_of_funds')->where('fd_one_form_id',$allformOneData->id)->get();

       $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
      'May','June','July','August','September','October','November','December','Saturday','Sunday',
      'Monday','Tuesday','Wednesday','Thursday','Friday');
      $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
      'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
      বুধবার','বৃহস্পতিবার','শুক্রবার'
      );

        return view('front.form.formone.fdFormOneInfo',compact('bangDATE','engDATE','get_all_source_of_fund_data','formOneMemberList','get_all_data_adviser','get_all_data_other','get_all_data_adviser_bank','allformOneData'));


    }


    public function particularsOfOrganisationPost(Request $request){


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
        $uploadFormOneData->email = $request->email;
        $uploadFormOneData->profession = $request->profession;
        $uploadFormOneData->citizenship = $arr_all;
        $uploadFormOneData->complete_status = $request->submit_value;
        $uploadFormOneData->time_for_api = $main_time;
        $uploadFormOneData->save();


        $mm_id = $uploadFormOneData->id;

        Session::put('mm_id',$mm_id);

       if($request->submit_value == 'save_and_exit_from_one'){

        return redirect('/fdFormOneInfo');

       }else{

        return redirect('/fieldOfProposedActivities');

       }


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
       $uploadFormOneData->email = $request->email;
       $uploadFormOneData->profession = $request->profession;
       $uploadFormOneData->citizenship = $arr_all;
       $uploadFormOneData->complete_status = $request->submit_value;
       $uploadFormOneData->save();


       $mm_id = $uploadFormOneData->id;

       Session::put('mm_id',$mm_id);

      if($request->submit_value == 'save_and_exit_from_one'){

       return redirect('/fdFormOneInfo');

       }else{

       return redirect('/fieldOfProposedActivities');

       }
     }


    public function uploadFromOnePdf(Request $request){

         $cutomeFileName = time().date("Ymd");

        $uploadVerifiedPdf = FdOneForm::find($request->id);
        if ($request->hasfile('verified_fd_one_form')) {
            $file = $request->file('verified_fd_one_form');
            $extension = $cutomeFileName.$file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $uploadVerifiedPdf->verified_fd_one_form = 'uploads/'.$filename;

        }
        $uploadVerifiedPdf->save();

        return redirect()->back()->with('success','Uploaded successfully!');;
    }





    public function sourceOfFundUpdate(Request $request){



        $cutomeFileName = time().date("Ymd");


        $uploadOneSourceOfFund = FormOneSourceOfFund::find($request->id);
        $uploadOneSourceOfFund->name = $request->name_sour;
        $uploadOneSourceOfFund->address = $request->address;
        if ($request->hasfile('letter_file')) {
            $file = $request->file('letter_file');
            $extension = $cutomeFileName.$file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $uploadOneSourceOfFund->letter_file =  'uploads/'.$filename;

        }
        $uploadOneSourceOfFund->save();

        return redirect()->back();

    }

    public function adviserDataUpdate(Request $request){
        $addAdviserData = FormOneAdviserList::find($request->id);
        $addAdviserData->name = $request->name;
        $addAdviserData->information = $request->information;

        $addAdviserData->save();

        return redirect()->back();

    }

    public function otherInformationAUpdate(Request $request){
        $cutomeFileName = time().date("Ymd");
        $otherInformationData = FormOneOtherPdfList::find($request->mid);

        if ($request->hasfile('letter_file')) {
            $file = $request->file('letter_file');
            $extension = $cutomeFileName.$file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $otherInformationData->letter_file =  'uploads/'.$filename;

        }
        $otherInformationData->save();

        return redirect()->back();

    }


    public function sourceOfFundDelete(Request $request)
    {

        $admins = FormOneSourceOfFund::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }


    public function adviserDataDelete(Request $request)
    {

        $admins = FormOneAdviserList::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }



    public function otherInformationADelete(Request $request)
    {

        $admins = FormOneOtherPdfList::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }



    public function fieldOfProposedActivitiesUpdate(Request $request){

        $cutomeFileName = time().date("Ymd");



        $request->validate([
            'district' => 'required|string',
            'annual_budget' => 'required|string',
            'submit_value' => 'required|string',
        ]);



        $updateDataStepTwo = FdOneForm::find($request->mid);
        $updateDataStepTwo->user_id = Auth::user()->id;
        $updateDataStepTwo->district = $request->district;

        $updateDataStepTwo->annual_budget = $request->annual_budget;
        if ($request->hasfile('plan_of_operation')) {
            $file = $request->file('plan_of_operation');
            $extension = $cutomeFileName.$file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $updateDataStepTwo->plan_of_operation ='uploads/'.$filename;

        }
        $updateDataStepTwo->complete_status = $request->submit_value;
        $updateDataStepTwo->save();


        $stepTwoId = $updateDataStepTwo->id;
        $input = $request->all();

        $personName = $input['name'];


        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $main_time = $dt->format('H:i:s');

     if (array_key_exists("letter_file", $input)){

       $deleteData = FormOneSourceOfFund::where('fd_one_form_id',$stepTwoId)->delete();

        foreach($personName as $key => $personName){
         $form= new FormOneSourceOfFund();
         $form->name=$input['name'][$key];
         $form->address=$input['address'][$key];
         $file=$input['letter_file'][$key];
         $name=time().mt_rand(1000000000, 9999999999).'.'.$file->getClientOriginalExtension();
         $file->move('public/uploads/', $name);
         $form->letter_file='uploads/'.$name;
        $form->fd_one_form_id = $stepTwoId;
        $form->time_for_api = $main_time;
         $form->save();
}
        }


        Session::put('mm_id',$stepTwoId);


        if($request->submit_value == 'save_and_exit_from_two'){

             return redirect('/fdFormOneInfo');

        }else{

            return redirect('/allStaffDetailsInformation');

 }

}



    public function allStaffDetailsInformationPost(Request $request){


        $request->validate([
            'staff_name.*' => 'required|string',
            'staff_position.*' => 'required|string',
            'staff_address.*' => 'required|string',
            'date_of_join.*' => 'required|string',
            'address.*' => 'required|string',
            'salary_statement.*' => 'required|string',
            'other_occupation.*' => 'required|string',
            'submit_value' => 'required|string',
        ]);



        $allStaffDetailInfo = FdOneForm::find($request->id);
        $allStaffDetailInfo->user_id = Auth::user()->id;
        $allStaffDetailInfo->complete_status = $request->submit_value;
        $allStaffDetailInfo->save();


        $input = $request->all();
        $new_cat_dec = $input['staff_name'];

        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $main_time = $dt->format('H:i:s');


        if (array_key_exists("now_working_at", $input)){

            foreach($new_cat_dec as $key => $new_cat_dec){

                if($key == 0){
                    $arr_all = implode(",",$request->citizenship1);
                }elseif($key == 1){

                    $arr_all = implode(",",$request->citizenship2);

                }elseif($key == 2){
                    $arr_all = implode(",",$request->citizenship3);
                }
                elseif($key == 3){
                    $arr_all = implode(",",$request->citizenship4);
                }elseif($key == 4){
                    $arr_all = implode(",",$request->citizenship5);
                }

                $form= new FormOneMemberList();
                $form->name=$input['staff_name'][$key];
                $form->now_working_at=$input['now_working_at'][$key];
                $form->position=$input['staff_position'][$key];
                $form->address=$input['staff_address'][$key];
                $form->date_of_join=$input['date_of_join'][$key];
                $form->citizenship=$arr_all;
                $form->salary_statement=$input['salary_statement'][$key];
                $form->other_occupation	=$input['other_occupation'][$key];
                $form->time_for_api =  $main_time;
                $form->fd_one_form_id = Session::get('mm_id');
                $form->save();
            }


        }else{

        foreach($new_cat_dec as $key => $new_cat_dec){

            if($key == 0){
                $arr_all = implode(",",$request->citizenship1);
            }elseif($key == 1){

                $arr_all = implode(",",$request->citizenship2);

            }elseif($key == 2){
                $arr_all = implode(",",$request->citizenship3);
            }
            elseif($key == 3){
                $arr_all = implode(",",$request->citizenship4);
            }elseif($key == 4){
                $arr_all = implode(",",$request->citizenship5);
            }

            $form= new FormOneMemberList();
            $form->name=$input['staff_name'][$key];
            $form->position=$input['staff_position'][$key];
            $form->address=$input['staff_address'][$key];
            $form->date_of_join=$input['date_of_join'][$key];
            $form->citizenship=$arr_all;
            $form->salary_statement=$input['salary_statement'][$key];
            $form->other_occupation	=$input['other_occupation'][$key];
            $form->time_for_api =  $main_time;
            $form->fd_one_form_id = Session::get('mm_id');
            $form->save();
        }

    }


        if($request->submit_value == 'save_and_exit_from_three'){

 return redirect('/fdFormOneInfo');
}else{

return redirect('/othersInformation');

 }

}


    public function allStaffDetailsInformationUpdate(Request $request){

        $request->validate([
            'staff_name.*' => 'required|string',
            'staff_position.*' => 'required|string',
            'staff_address.*' => 'required|string',
            'date_of_join.*' => 'required|string',
            'address.*' => 'required|string',
            'salary_statement.*' => 'required|string',
            'other_occupation.*' => 'required|string',
            'submit_value' => 'required|string',
        ]);

        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $main_time = $dt->format('H:i:s');

        $delete_all_the_data = FormOneMemberList::where('fd_one_form_id',Session::get('mm_id'))->delete();


        $allStaffDetailInfo = FdOneForm::find($request->id);
        $allStaffDetailInfo->user_id = Auth::user()->id;
        $allStaffDetailInfo->complete_status = $request->submit_value;
        $allStaffDetailInfo->save();


        $input = $request->all();
        $new_cat_dec = $input['staff_name'];


        if (array_key_exists("now_working_at", $input)){


            foreach($new_cat_dec as $key => $new_cat_dec){

                if($key == 0){
                    $arr_all = implode(",",$request->citizenship1);
                }elseif($key == 1){

                    $arr_all = implode(",",$request->citizenship2);

                }elseif($key == 2){
                    $arr_all = implode(",",$request->citizenship3);
                }
                elseif($key == 3){
                    $arr_all = implode(",",$request->citizenship4);
                }elseif($key == 4){
                    $arr_all = implode(",",$request->citizenship5);
                }

                $form= new FormOneMemberList();
                $form->name=$input['staff_name'][$key];
                $form->position=$input['staff_position'][$key];
                $form->now_working_at=$input['now_working_at'][$key];
                $form->address=$input['staff_address'][$key];
                $form->date_of_join=$input['date_of_join'][$key];
                $form->citizenship=$arr_all;
                $form->salary_statement=$input['salary_statement'][$key];
                $form->other_occupation	=$input['other_occupation'][$key];
                $form->time_for_api =  $main_time;
                $form->fd_one_form_id = $request->id;
                $form->save();
            }


        }else{

        foreach($new_cat_dec as $key => $new_cat_dec){

            if($key == 0){
                $arr_all = implode(",",$request->citizenship1);
            }elseif($key == 1){

                $arr_all = implode(",",$request->citizenship2);

            }elseif($key == 2){
                $arr_all = implode(",",$request->citizenship3);
            }
            elseif($key == 3){
                $arr_all = implode(",",$request->citizenship4);
            }elseif($key == 4){
                $arr_all = implode(",",$request->citizenship5);
            }

            $form= new FormOneMemberList();
            $form->name=$input['staff_name'][$key];
            $form->position=$input['staff_position'][$key];
            $form->address=$input['staff_address'][$key];
            $form->date_of_join=$input['date_of_join'][$key];
            $form->citizenship=$arr_all;
            $form->salary_statement=$input['salary_statement'][$key];
            $form->other_occupation	=$input['other_occupation'][$key];
            $form->time_for_api =  $main_time;
            $form->fd_one_form_id = $request->id;
            $form->save();
        }

    }


        if($request->submit_value == 'save_and_exit_from_three'){

 return redirect('/fdFormOneInfo');

}else{

 return redirect('/othersInformation');
 }

    }




    public function othersInformationPost(Request $request){
        $cutomeFileName = time().date("Ymd");

        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));
        $main_time = $dt->format('H:i:s a');


        $request->validate([

            'information_type.*' => 'required',
            'name.*' => 'required',
            'information.*' => 'required',
            'submit_value' => 'required|string',
            'treasury_number' => 'required|string',
            'vat_invoice_number' => 'required|string',
            'attach_the__supporting_papers' => 'required',
            'board_of_revenue_on_fees' => 'required',

        ]);



     $stepFourData = FdOneForm::find($request->id);
     $stepFourData->user_id = Auth::user()->id;
     $stepFourData->treasury_number = $request->treasury_number;
     $stepFourData->vat_invoice_number = $request->vat_invoice_number;

     if ($request->hasfile('attach_the__supporting_papers')) {
         $file = $request->file('attach_the__supporting_papers');
         $extension = $cutomeFileName.$file->getClientOriginalName();
         $filename = $extension;
         $file->move('public/uploads/', $filename);
         $stepFourData->attach_the__supporting_paper ='uploads/'.$filename;

     }


     if ($request->hasfile('board_of_revenue_on_fees')) {
        $file = $request->file('board_of_revenue_on_fees');
        $extension = $cutomeFileName.$file->getClientOriginalName();
        $filename = $extension;
        $file->move('public/uploads/', $filename);
        $stepFourData->board_of_revenue_on_fees = 'uploads/'.$filename;

    }

     $stepFourData->complete_status = $request->submit_value;
     $stepFourData->save();


     $mm_id = $stepFourData->id;



     if(empty($request->account_number)){


     }else{
     $form= new FormOneBankAccount();
     $form->account_number=$request->account_number;
     $form->account_type=$request->account_type;
     $form->name_of_bank=$request->name_of_bank;
     $form->branch_name_of_bank=$request->branch_name_of_bank;
     $form->bank_address=$request->bank_address;
     $form->fd_one_form_id = $request->id;
     $form->time_for_api = $main_time;
     $form->save();
    }

     $input = $request->all();


if (array_key_exists("name", $input)){

        $new_cat_dec = $input['name'];
     foreach($new_cat_dec as $key => $new_cat_dec){

        $form1= new FormOneAdviserList();
        $form1->name=$input['name'][$key];
        $form1->information=$input['information'][$key];
        $form1->fd_one_form_id = $request->id;
        $form1->time_for_api = $main_time;
        $form1->save();

     }

    }

    if (array_key_exists("information_type", $input)){

        $new_cat_dec_new = $input['information_type'];


     foreach($new_cat_dec_new as $key => $new_cat_dec_new){


        $form2= new FormOneOtherPdfList();

        $file=$input['information_type'][$key];
        $name=time().mt_rand(1000000000, 9999999999).'.'.$file->getClientOriginalExtension();
        $file->move('public/uploads/', $name);
        $form2->information_pdf='uploads/'.$name;
        $form2->fd_one_form_id = $request->id;
        $form2->time_for_api = $main_time;
        $form2->save();

     }

    }


    if($request->submit_value == 'all_complete'){

return redirect('/fdFormOneInfo');

}else{

    return redirect('/othersInformation');
}

}


    public function othersInformationUpdate(Request $request){

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

    if ($request->hasfile('attach_the__supporting_papers')) {
        $file = $request->file('attach_the__supporting_papers');
        $extension = $cutomeFileName.$file->getClientOriginalName();
        $filename = $extension;
        $file->move('public/uploads/', $filename);
        $stepFourData->attach_the__supporting_paper = 'uploads/'.$filename;

    }


    if ($request->hasfile('board_of_revenue_on_fees')) {
       $file = $request->file('board_of_revenue_on_fees');
       $extension = $cutomeFileName.$file->getClientOriginalName();
       $filename = $extension;
       $file->move('public/uploads/', $filename);
       $stepFourData->board_of_revenue_on_fees = 'uploads/'.$filename;

   }

    $stepFourData->complete_status = $request->submit_value;
    $stepFourData->save();


    $mm_id = $stepFourData->id;

    if(empty($request->account_number)){


    }else{

    if($request->bank_id == 'p'){

        $form= new FormOneBankAccount();
        $form->account_number=$request->account_number;
        $form->account_type=$request->account_type;
        $form->name_of_bank=$request->name_of_bank;
        $form->branch_name_of_bank=$request->branch_name_of_bank;
        $form->bank_address=$request->bank_address;
        $form->fd_one_form_id = $request->id;
        $form->time_for_api = $main_time;
        $form->save();

    }else{

    $form= FormOneBankAccount::find($request->bank_id);
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

       $form1= new FormOneAdviserList();
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


       $form2= new FormOneOtherPdfList();

       $file=$input['information_type'][$key];
       $name=time().mt_rand(1000000000, 9999999999).'.'.$file->getClientOriginalExtension();
       $file->move('public/uploads/', $name);
       $form2->information_pdf='uploads/'.$name;
       $form2->fd_one_form_id = $request->id;
       $form2->time_for_api = $main_time;
       $form2->save();

    }

   }


   if($request->submit_value == 'all_complete'){

    return redirect('/fdFormOneInfo');

}else{

return redirect('/othersInformation');

}

}


    public function fdFormOneInfoPdf(){

        $allformOneData = FdOneForm::where('user_id',Auth::user()->id)->first();
        $getNgoTypeForPdf = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
        $get_all_data_adviser_bank = DB::table('form_one_bank_accounts')->where('fd_one_form_id',$allformOneData->id)->first();
        $get_all_data_other= DB::table('form_one_other_pdf_lists')->where('fd_one_form_id',$allformOneData->id)->get();
        $get_all_data_adviser = DB::table('form_one_adviser_lists')->where('fd_one_form_id',$allformOneData->id)->get();
        $formOneMemberList = FormOneMemberList::where('fd_one_form_id',$allformOneData->id)->get();
        $get_all_source_of_fund_data = DB::table('form_one_source_of_funds')->where('fd_one_form_id',$allformOneData->id)->get();


        $file_Name_Custome = 'fd_one_form';

        $payment_detail = 11;

        $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
      'May','June','July','August','September','October','November','December','Saturday','Sunday',
      'Monday','Tuesday','Wednesday','Thursday','Friday');
      $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
      'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
      বুধবার','বৃহস্পতিবার','শুক্রবার'
      );


        $pdf=PDF::loadView('front.form.formone.fdFormOneInfoPdf',[
            'getNgoTypeForPdf'=>$getNgoTypeForPdf,
            'engDATE'=>$engDATE,
            'bangDATE'=>$bangDATE,
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
