<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormEight;
use App\Models\FormCompleteStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use PDF;
use DateTime;
use DateTimezone;
use Carbon\Carbon;
use App\Http\Controllers\NGO\CommonController;
class FormeightController extends Controller
{


    public function formEightNgoCommitteeMemberPdf(){

//dd(1);

      $file_Name_Custome = 'form_eight';
      $fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');
      $all_partiw = FormEight::where('fd_one_form_id',$fdOneFormId)

      ->get();


      $signDataNew = FormEight::where('fd_one_form_id',$fdOneFormId)

      ->first();



      $all_partiw_form_date = FormEight::where('fd_one_form_id',$fdOneFormId)

      ->value('form_date');

      $all_partiw_to_date = FormEight::where('fd_one_form_id',$fdOneFormId)

      ->value('to_date');

      $all_partiw_total_year = FormEight::where('fd_one_form_id',$fdOneFormId)

      ->value('total_year');

      if(session()->get('locale') == 'en' || empty(session()->get('locale')) ){


      $pdf=PDF::loadView('front.form.form_eight.form_8_ngo_committee_member_pdf',[
        'all_partiw_form_date'=>$all_partiw_form_date,
        'all_partiw_to_date'=>$all_partiw_to_date,
        'all_partiw_total_year'=>$all_partiw_total_year,
        'all_partiw'=>$all_partiw,
        'signDataNew'=>$signDataNew,


    ],[],['format' => 'A4-L','orientation' => 'L']);
return $pdf->stream($file_Name_Custome.''.'.pdf');
      }else{


        $pdf=PDF::loadView('front.form.form_eight.form_8_ngo_committee_member_pdf_english',[
            'all_partiw_form_date'=>$all_partiw_form_date,
            'all_partiw_to_date'=>$all_partiw_to_date,
            'all_partiw_total_year'=>$all_partiw_total_year,
            'all_partiw'=>$all_partiw,
            'signDataNew'=>$signDataNew,


        ],[],['format' => 'A4-L','orientation' => 'L']);
    return $pdf->stream($file_Name_Custome.''.'.pdf');


      }


    }

    public function formEightNgoCommitteeMemberTotalView(Request $request){




        $start_date_one = date("d/m/Y", strtotime($request->form_date));
        //dd($request->start_date_one);

        $end_date_one = date("d/m/Y", strtotime($request->to_date));

        $startDate = Carbon::createFromFormat('d/m/Y', $start_date_one);
        $endDate = Carbon::createFromFormat('d/m/Y', $end_date_one);





        $all_partiw = FormEight::where('user_id',Auth::user()->id)->whereBetween(DB::raw('DATE(created_at)'), [$request->form_date, $request->to_date])->get();


                        if(count($all_partiw) > 0){

                            $users_update = FormEight::where('user_id',Auth::user()->id)
                            ->whereNull('form_date')
                            ->update([
                                'form_date' => $start_date_one,
                                'to_date' => $end_date_one,
                                'total_year' => $request->total_year,
                                'complete_status'=>'complete'
                             ]);



                        }

                        //dd($users);








        $complete_status_fd_eight_id = FormEight::where('user_id',Auth::user()->id)->value('id');
        $complete_status_fd_eight = FormEight::where('user_id',Auth::user()->id)->value('complete_status');
        $complete_status_fd_eight_pdf = FormEight::where('user_id',Auth::user()->id)->value('verified_form_eight');

        return view('front.form.form_eight.formEightNgoCommitteeMemberTotalView',compact('complete_status_fd_eight_id','complete_status_fd_eight','complete_status_fd_eight_pdf','all_partiw'));
    }

    public function formEightNgoCommitteeMemberTotalYear(Request $request){

        $datetime1 = new DateTime($request->form_date);
    $datetime2 = new DateTime($request->to_date);
    $difference = $datetime1->diff($datetime2);

    $vv = ($difference->m)+1;

    $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
        'May','June','July','August','September','October','November','December','Saturday','Sunday',
        'Monday','Tuesday','Wednesday','Thursday','Friday');
        $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
        'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
        বুধবার','বৃহস্পতিবার','শুক্রবার'
        );

        if(session()->get('locale') == 'en' || empty(session()->get('locale'))){

            $data = $difference->y.' বছর '.$vv.' মাস ';
        }else{
       $data = $difference->y.' years '.$vv.' months ';
        }



        $fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');
        $formEightData = DB::table('form_eights')
        ->where('fd_one_form_id',$fdOneFormId)->value('id');

        if(empty($formEightData)){
            if(session()->get('locale') == 'en' || empty(session()->get('locale'))){
              $msg ="এনজিও কমিটি সদস্য যুক্ত করুন ";
            }else{
              $msg ="Add NGO committee members";
            }
        }else{

            $msg="";
        }


        $response = [
            'data' => $data,
            'msg' => $msg
        ];

          return response()->json($response);



     return $data;
     }

     public function formEightNgoCommitteeMemberViewFormEdit(){
        $fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');
        $all_data_list = FormEight::where('fd_one_form_id',$fdOneFormId)->latest()->get();
        $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
        'May','June','July','August','September','October','November','December','Saturday','Sunday',
        'Monday','Tuesday','Wednesday','Thursday','Friday');
        $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
        'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
        বুধবার','বৃহস্পতিবার','শুক্রবার'
        );
        return view('front.form.form_eight.formEightNgoCommitteeMember',compact('bangDATE','engDATE','all_data_list'));

     }

    public function index(){

        CommonController::checkNgotype(1);
        $mainNgoType = CommonController::changeView();

        if($mainNgoType== 'দেশিও'){

            return view('front.form.form_eight.formEightNgoCommitteeMember');
        }else{
            return view('front.form.foreign.form_eight.formEightNgoCommitteeMember');
        }


    }


    public function edit($id){
        $all_data_list = FormEight::where('name_slug',$id)->first();

        return view('front.form.form_eight.formEightNgoCommitteeMemberEdit',compact('all_data_list'));

    }


    public function create(){

        return view('front.form.form_eight.formEightNgoCommitteeMemberCreate');
    }



    public function uploadFromEightPdf(Request $request){



        $time_dy = time().date("Ymd");

        $updateVerifiedPdf =FormEight::find($request->id);
        if ($request->hasfile('verified_form_eight')) {

            $filePath="FdOneOtherPdfList";
            $file = $request->file('verified_form_eight');
            $updateVerifiedPdf->verified_form_eight =CommonController::pdfUpload($request,$file,$filePath);

        }
        $updateVerifiedPdf->save();


        return redirect()->back()->with('success','Uploaded Successfully');
    }



    public function store(Request $request){


       //dd($request->all());
        $time_dy = time().date("Ymd");

        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $main_time = $dt->format('H:i:s');


        $request->validate([
            'name' => 'required|string',
            'desi' => 'required|string',
            'dob' => 'required|string',
            'phone' => 'required|string',
            'nid_no' => 'required|string',
            'father_name' => 'required|string',
            'present_address' => 'required|string',
            'permanent_address' => 'required|string',
            'name_supouse' => 'required|string',
            'edu_quali' => 'required|string',
            'profession' => 'required|string',
            'job_des' => 'required|string',
            'service_status' => 'required|string',
            'job_sign' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:60|dimensions:width=300,height=80',
        ]);






        $fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');
        $formEightData = new FormEight();
        $formEightData->name = $request->name;
        $formEightData->name_slug = Str::slug($request->name,"_");
        $formEightData->desi = $request->desi;
        $formEightData->dob = $request->dob;
        $formEightData->time_for_api = $main_time;
        $formEightData->phone = $request->phone;
        $formEightData->nid_no = $request->nid_no;
        $formEightData->father_name = $request->father_name;
        $formEightData->present_address = $request->present_address;
        $formEightData->permanent_address = $request->permanent_address;
        $formEightData->name_supouse = $request->name_supouse;
        $formEightData->edu_quali = $request->edu_quali;
        $formEightData->profession = $request->profession;
        $formEightData->job_des = $request->job_des;
        $formEightData->service_status = $request->service_status;
        $formEightData->fd_one_form_id = $fdOneFormId;


        if ($request->hasfile('job_picture')) {
            $filePath="FormEight";
            $file = $request->file('job_picture');
            $formEightData->job_picture =CommonController::imageUpload($request,$file,$filePath);

        }


        if ($request->hasfile('job_sign')) {
            $filePath="FormEight";
            $file = $request->file('job_sign');
            $formEightData->job_sign =CommonController::imageUpload($request,$file,$filePath);

        }


        $formEightData->save();


        return redirect()->back()->with('success','Created Successfully');

    }


    public function update(Request $request,$id){


        $request->validate([

            'job_sign' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:60|dimensions:width=300,height=80',

        ]);

        $time_dy = time().date("Ymd");

        $formEightData =FormEight::find($id);
        $formEightData->name = $request->name;
        $formEightData->name_slug = Str::slug($request->name,"_");
        $formEightData->desi = $request->desi;
        $formEightData->dob = $request->dob;
        $formEightData->phone = $request->phone;
        $formEightData->nid_no = $request->nid_no;
        $formEightData->father_name = $request->father_name;
        $formEightData->present_address = $request->present_address;
        $formEightData->permanent_address = $request->permanent_address;
        $formEightData->name_supouse = $request->name_supouse;
        $formEightData->edu_quali = $request->edu_quali;
        $formEightData->profession = $request->profession;
        $formEightData->job_des = $request->job_des;
        $formEightData->service_status = $request->service_status;

        if ($request->hasfile('job_picture')) {
            $filePath="FormEight";
            $file = $request->file('job_picture');
            $formEightData->job_picture =CommonController::imageUpload($request,$file,$filePath);

        }


        if ($request->hasfile('job_sign')) {
            $filePath="FormEight";
            $file = $request->file('job_sign');
            $formEightData->job_sign =CommonController::imageUpload($request,$file,$filePath);

        }


        $formEightData->save();


        return redirect()->back()->with('info','Updated Successfully');


    }

    public function destroy($id)
    {

        $admins = FormEight::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }


    public function formEightNgoCommitteeMemberView(Request $request){



        $all_data_list = FormEight::where('id',$request->id_for_pass)->first();

        return view('front.form.form_eight.formEightNgoCommitteeMemberView',compact('all_data_list'));


    }


    public function updateDateData(Request $request){




        $start_date_one = date("Y-m-d", strtotime($request->form_date));


        $end_date_one = date("Y-m-d", strtotime($request->to_date));

        // $startDate = Carbon::createFromFormat('d/m/Y', $start_date_one);
        // $endDate = Carbon::createFromFormat('d/m/Y', $end_date_one);

        $fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');



        $all_partiw = FormEight::where('fd_one_form_id',$fdOneFormId)
        ->whereBetween(DB::raw('DATE(created_at)'), [$start_date_one,$end_date_one])
        ->get();
        //dd($all_partiw);

                        if(count($all_partiw) > 0){
                            //dd(22);
                            FormEight::where('fd_one_form_id',$fdOneFormId)
                            ->whereNull('form_date')
                            ->update([
                                'form_date' => $start_date_one,
                                'to_date' => $end_date_one,
                                'total_year' => $request->total_year,
                                'complete_status'=>'complete'
                             ]);



                        }
                        //dd(33);
                        $checkCompleteStatusData = DB::table('form_complete_statuses')
   ->where('user_id',Auth::user()->id)
   ->first();

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
           'form_eight_status' => 1
        ]);


   }


        $data = url('/ngoAllRegistrationForm');
        return $data;

    }




    public function formEightNewData(Request $request){

        //dd($request->all());

        $request->validate([

            'signature_one' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:60|dimensions:width=300,height=80',
            'seal_one' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:80|dimensions:width=300,height=100',
        ]);


        $checkValueFirst = FormEight::where('fd_one_form_id',$request->fd_one_form_id)
        ->value('name_one');



        if ($request->hasfile('signature_one')) {
            $filePath="FormEight";
            $file = $request->file('signature_one');
            $signature_one =CommonController::imageUpload($request,$file,$filePath);

        }else{
            $signature_one = 0;
        }


        if ($request->hasfile('seal_one')) {
            $filePath="seal_one";
            $file = $request->file('seal_one');
            $seal_one =CommonController::imageUpload($request,$file,$filePath);

        }else{

            $seal_one = 0;
        }





        if($checkValueFirst == 0){


            FormEight::where('fd_one_form_id',$request->fd_one_form_id)
            ->update([
                'name_one' => $request->name_one,
                'designation_one' => $request->designation_one,
                'signature_one' => $signature_one,
                'seal_one' => $seal_one,
             ]);

        }else{

            FormEight::where('fd_one_form_id',$request->fd_one_form_id)
            ->update([
                'name_two' => $request->name_one,
                'designation_two' => $request->designation_one,
                'signature_two' => $signature_one,
                'seal_two' => $seal_one,
                'employee_add_status'=>'yes'
             ]);

        }
        return redirect()->back()->with('info','Added Successfully');
    }



    public function formEightNewDataUpdate (Request $request){


        $request->validate([

            'signature_one' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:60|dimensions:width=300,height=80',
            'seal_one' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:80|dimensions:width=300,height=100',

            'signature_two' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:60|dimensions:width=300,height=80',
            'seal_two' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:80|dimensions:width=300,height=100',
        ]);


        //dd($request->all());
        if(empty($request->name_two)){



//dd(11);
            if ($request->hasfile('signature_one')) {
                $filePath="FormEight";
                $file = $request->file('signature_one');
                $signature_one =CommonController::imageUpload($request,$file,$filePath);

            }else{
                $signature_one =FormEight::where('fd_one_form_id',$request->fd_one_form_id)->value('signature_one');
            }


            if ($request->hasfile('seal_one')) {
                $filePath="seal_one";
                $file = $request->file('seal_one');
                $seal_one =CommonController::imageUpload($request,$file,$filePath);

            }else{

                $seal_one = FormEight::where('fd_one_form_id',$request->fd_one_form_id)->value('seal_one');
            }


            FormEight::where('fd_one_form_id',$request->fd_one_form_id)
            ->update([
                'name_one' => $request->name_one,
                'designation_one' => $request->designation_one,
                'signature_one' => $signature_one,
                'seal_one' => $seal_one,
             ]);

        }else{

            //dd(111);


            if ($request->hasfile('signature_two')) {
                $filePath="FormEight";
                $file = $request->file('signature_two');
                $signature_one =CommonController::imageUpload($request,$file,$filePath);

            }else{
                $signature_one =FormEight::where('fd_one_form_id',$request->fd_one_form_id)->value('signature_two');
            }


            if ($request->hasfile('seal_two')) {
                $filePath="seal_two";
                $file = $request->file('seal_two');
                $seal_one =CommonController::imageUpload($request,$file,$filePath);

            }else{

                $seal_one = FormEight::where('fd_one_form_id',$request->fd_one_form_id)->value('seal_two');
            }

            FormEight::where('fd_one_form_id',$request->fd_one_form_id)
            ->update([
                'name_two' => $request->name_two,
                'designation_two' => $request->designation_two,
                'signature_two' => $signature_one,
                'seal_two' => $seal_one,
                'employee_add_status'=>'yes'
             ]);




        }
        return redirect()->back()->with('info','Added Successfully');

    }
}
