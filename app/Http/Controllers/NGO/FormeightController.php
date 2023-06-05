<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ngo_type_and_language;
use App\Models\FormEight;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use PDF;
use DateTime;
use DateTimezone;
use Carbon\Carbon;
class FormeightController extends Controller
{


    public function formEightNgoCommitteeMemberPdf(){

        $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
      'May','June','July','August','September','October','November','December','Saturday','Sunday',
      'Monday','Tuesday','Wednesday','Thursday','Friday');
      $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
      'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
      বুধবার','বৃহস্পতিবার','শুক্রবার'
      );

      $file_Name_Custome = 'form_eight';

      $all_partiw = FormEight::where('user_id',Auth::user()->id)

      ->get();

      $all_partiw_form_date = FormEight::where('user_id',Auth::user()->id)

      ->value('form_date');

      $all_partiw_to_date = FormEight::where('user_id',Auth::user()->id)

      ->value('to_date');

      $all_partiw_total_year = FormEight::where('user_id',Auth::user()->id)

      ->value('total_year');

      if(session()->get('locale') == 'en'){


      $pdf=PDF::loadView('front.form.form_eight.form_8_ngo_committee_member_pdf',[
        'all_partiw_form_date'=>$all_partiw_form_date,
        'all_partiw_to_date'=>$all_partiw_to_date,
        'all_partiw_total_year'=>$all_partiw_total_year,
        'all_partiw'=>$all_partiw,
        'engDATE'=>$engDATE,
        'bangDATE'=>$bangDATE


    ],[],['format' => 'A4-L','orientation' => 'L']);
return $pdf->stream($file_Name_Custome.''.'.pdf');
      }else{


        $pdf=PDF::loadView('front.form.form_eight.form_8_ngo_committee_member_pdf_english',[
            'all_partiw_form_date'=>$all_partiw_form_date,
            'all_partiw_to_date'=>$all_partiw_to_date,
            'all_partiw_total_year'=>$all_partiw_total_year,
            'all_partiw'=>$all_partiw,
            'engDATE'=>$engDATE,
            'bangDATE'=>$bangDATE


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






        $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
        'May','June','July','August','September','October','November','December','Saturday','Sunday',
        'Monday','Tuesday','Wednesday','Thursday','Friday');
        $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
        'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
        বুধবার','বৃহস্পতিবার','শুক্রবার'
        );

        $complete_status_fd_eight_id = FormEight::where('user_id',Auth::user()->id)->value('id');
        $complete_status_fd_eight = FormEight::where('user_id',Auth::user()->id)->value('complete_status');
        $complete_status_fd_eight_pdf = FormEight::where('user_id',Auth::user()->id)->value('verified_form_eight');

        return view('front.form.form_eight.formEightNgoCommitteeMemberTotalView',compact('complete_status_fd_eight_id','complete_status_fd_eight','complete_status_fd_eight_pdf','all_partiw','engDATE','bangDATE'));
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

        if(session()->get('locale') == 'en'){

            $data = $difference->y.' বছর '.$vv.' মাস ';
        }else{
       $data = $difference->y.' years '.$vv.' months ';
        }
     return $data;
     }

     public function formEightNgoCommitteeMemberViewFormEdit(){
        $all_data_list = FormEight::where('user_id',Auth::user()->id)->latest()->get();
        $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
        'May','June','July','August','September','October','November','December','Saturday','Sunday',
        'Monday','Tuesday','Wednesday','Thursday','Friday');
        $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
        'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
        বুধবার','বৃহস্পতিবার','শুক্রবার'
        );
        return view('front.form.form_eight.form_8_ngo_committee_member',compact('bangDATE','engDATE','all_data_list'));

     }

    public function index(){

        $all_partiw12 = FormEight::where('user_id',Auth::user()->id)->value('complete_status');

        if(empty($all_partiw12)){



            $all_data_list = FormEight::where('user_id',Auth::user()->id)->latest()->get();
            $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
            'May','June','July','August','September','October','November','December','Saturday','Sunday',
            'Monday','Tuesday','Wednesday','Thursday','Friday');
            $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
            'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
            বুধবার','বৃহস্পতিবার','শুক্রবার'
            );
            if(count($all_data_list) == 0){

                return redirect('/formEightNgoCommitteMember/create');

            }else{

            return view('front.form.form_eight.formEightNgoCommitteeMember',compact('bangDATE','engDATE','all_data_list'));
            }
        }else{


            $complete_status_fd_eight_id = FormEight::where('user_id',Auth::user()->id)->value('id');
            $complete_status_fd_eight = FormEight::where('user_id',Auth::user()->id)->value('complete_status');
            $complete_status_fd_eight_pdf = FormEight::where('user_id',Auth::user()->id)->value('verified_form_eight');


            $all_partiw = FormEight::where('user_id',Auth::user()->id)

            ->get();

            $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
            'May','June','July','August','September','October','November','December','Saturday','Sunday',
            'Monday','Tuesday','Wednesday','Thursday','Friday');
            $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
            'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
            বুধবার','বৃহস্পতিবার','শুক্রবার'
            );

            return view('front.form.form_eight.formEightNgoCommitteeMemberTotalView',compact('complete_status_fd_eight_id','complete_status_fd_eight','complete_status_fd_eight_pdf','all_partiw','engDATE','bangDATE'));


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
            $file = $request->file('verified_form_eight');
            $extension = $time_dy.$file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $updateVerifiedPdf->verified_form_eight =  'uploads/'.$filename;

        }
        $updateVerifiedPdf->save();


        return redirect('/formEightNgoCommitteMember')->with('success','Uploaded Successfully');
    }



    public function store(Request $request){
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
        ]);


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
        $formEightData->user_id = Auth::user()->id;
        $formEightData->save();


        return redirect('/formEightNgoCommitteMember')->with('success','Created Successfully');

    }


    public function update(Request $request,$id){

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
        $formEightData->save();


        return redirect('/formEightNgoCommitteMember')->with('info','Updated Successfully');


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
}
