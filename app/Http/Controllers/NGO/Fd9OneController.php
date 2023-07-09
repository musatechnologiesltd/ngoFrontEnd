<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NVisa;
use App\Models\Country;
use App\Models\Fd9Form;
use App\Models\Fd9OneForm;
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
use Illuminate\Support\Facades\App;
class Fd9OneController extends Controller
{
    public function index(){
        $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)
        ->value('ngo_type');
        if($checkNgoTypeForForeginNgo == 'Foreign'){

            App::setLocale('sp');
            session()->put('locale','sp');

        }else{

            App::setLocale('en');
            session()->put('locale','en');
        }


        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fd9OneList = Fd9OneForm::where('fd_one_form_id',$ngo_list_all->id)->latest()->get();
        return view('front.fd9OneForm.index',compact('ngo_list_all','fd9OneList'));
    }


    public function create(){
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        return view('front.fd9OneForm.create',compact('ngo_list_all'));
    }


    public function edit($id){
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fd9OneList = Fd9OneForm::where('id',$id)->first();
        return view('front.fd9OneForm.edit',compact('ngo_list_all','fd9OneList'));

    }

    public function show($id){

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fd9OneList = Fd9OneForm::where('id',base64_decode($id))->first();
        return view('front.fd9OneForm.show',compact('ngo_list_all','fd9OneList'));
    }

    public function store(Request $request){

        //dd($request->all());

        $request->validate([
            'foreigner_name_for_subject' => 'required|string',
            'sarok_number' => 'required|string',
            'application_date' => 'required|string',
            'institute_name' => 'required|string',
            'prokolpo_name' => 'required|string',
            'designation_name' => 'required|string',
            'foreigner_name_for_body' => 'required|string',
            'expire_to_date' => 'required|string',
            'expire_from_date' => 'required|string',
            'arrival_date_in_nvisa' => 'required|string',
            'proposed_from_date' => 'required|string',
            'proposed_to_date' => 'required|string',
            'attestation_of_appointment_letter' => 'required|file',
            'copy_of_form_nine' => 'required|file',
            'foreigner_image' => 'required|file',
            'copy_of_nvisa' => 'required|file',
        ]);

        $fdOneFormId = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fd9OneFormInfo = new Fd9OneForm();
        $fd9OneFormInfo->fd_one_form_id = $fdOneFormId->id;
        $fd9OneFormInfo->foreigner_name_for_subject = $request->foreigner_name_for_subject;
        $fd9OneFormInfo->sarok_number = $request->sarok_number;
        $fd9OneFormInfo->application_date = $request->application_date;
        $fd9OneFormInfo->institute_name = $request->institute_name;
        $fd9OneFormInfo->prokolpo_name = $request->prokolpo_name;
        $fd9OneFormInfo->designation_name = $request->designation_name;
        $fd9OneFormInfo->foreigner_name_for_body = $request->foreigner_name_for_body;
        $fd9OneFormInfo->expire_to_date = $request->expire_to_date;
        $fd9OneFormInfo->expire_from_date = $request->expire_from_date;
        $fd9OneFormInfo->arrival_date_in_nvisa = $request->arrival_date_in_nvisa;
        $fd9OneFormInfo->proposed_from_date = $request->proposed_from_date;
        $fd9OneFormInfo->proposed_to_date = $request->proposed_to_date;


        if ($request->hasfile('attestation_of_appointment_letter')) {
           $filePath="fd9OneFormInfo";
           $file = $request->file('attestation_of_appointment_letter');
           $fd9OneFormInfo->attestation_of_appointment_letter =CommonController::pdfUpload($request,$file,$filePath);

       }
       if ($request->hasfile('foreigner_image')) {
        $filePath="fd9OneFormInfo";
        $file = $request->file('foreigner_image');
        $fd9OneFormInfo->foreigner_image =CommonController::imageUpload($request,$file,$filePath);

    }


        if ($request->hasfile('copy_of_nvisa')) {
           $filePath="fd9OneFormInfo";
           $file = $request->file('copy_of_nvisa');
           $fd9OneFormInfo->copy_of_nvisa =CommonController::pdfUpload($request,$file,$filePath);

       }

       if ($request->hasfile('copy_of_form_nine')) {
           $filePath="fd9OneFormInfo";
           $file = $request->file('copy_of_form_nine');
           $fd9OneFormInfo->copy_of_form_nine =CommonController::pdfUpload($request,$file,$filePath);

       }


        $fd9OneFormInfo->save();

        return redirect()->route('fdNineOneForm.index')->with('success','Addedd Successfully');
    }


    public function update(Request $request,$id){
        $fd9OneFormInfo =Fd9OneForm::find($id);
        $fd9OneFormInfo->foreigner_name_for_subject = $request->foreigner_name_for_subject;
        $fd9OneFormInfo->sarok_number = $request->sarok_number;
        $fd9OneFormInfo->application_date = $request->application_date;
        $fd9OneFormInfo->institute_name = $request->institute_name;
        $fd9OneFormInfo->prokolpo_name = $request->prokolpo_name;
        $fd9OneFormInfo->designation_name = $request->designation_name;
        $fd9OneFormInfo->foreigner_name_for_body = $request->foreigner_name_for_body;
        $fd9OneFormInfo->expire_to_date = $request->expire_to_date;
        $fd9OneFormInfo->expire_from_date = $request->expire_from_date;
        $fd9OneFormInfo->arrival_date_in_nvisa = $request->arrival_date_in_nvisa;
        $fd9OneFormInfo->proposed_from_date = $request->proposed_from_date;
        $fd9OneFormInfo->proposed_to_date = $request->proposed_to_date;


        if ($request->hasfile('attestation_of_appointment_letter')) {
           $filePath="fd9OneFormInfo";
           $file = $request->file('attestation_of_appointment_letter');
           $fd9OneFormInfo->attestation_of_appointment_letter =CommonController::pdfUpload($request,$file,$filePath);

       }
       if ($request->hasfile('foreigner_image')) {
        $filePath="fd9OneFormInfo";
        $file = $request->file('foreigner_image');
        $fd9OneFormInfo->foreigner_image =CommonController::imageUpload($request,$file,$filePath);

    }


        if ($request->hasfile('copy_of_nvisa')) {
           $filePath="fd9OneFormInfo";
           $file = $request->file('copy_of_nvisa');
           $fd9OneFormInfo->copy_of_nvisa =CommonController::pdfUpload($request,$file,$filePath);

       }

       if ($request->hasfile('copy_of_form_nine')) {
           $filePath="fd9OneFormInfo";
           $file = $request->file('copy_of_form_nine');
           $fd9OneFormInfo->copy_of_form_nine =CommonController::pdfUpload($request,$file,$filePath);

       }


        $fd9OneFormInfo->save();

        return redirect()->route('fdNineOneForm.index')->with('success','Update Successfully');

    }

    public function destroy($id){

        $admins = Fd9OneForm::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }
        return back()->with('error','Deleted successfully!');
    }


    public function niyogPotroDownload($id){

        $get_file_data = Fd9OneForm::where('id',$id)->value('attestation_of_appointment_letter');

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


    public function formNinePdfDownload($id){

        $get_file_data = Fd9OneForm::where('id',$id)->value('copy_of_form_nine');

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

    public function nVisaCopyDownload($id){

        $get_file_data = Fd9OneForm::where('id',$id)->value('copy_of_nvisa');

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


    public function mainPdfDownload($id){


        $fd9OneList = Fd9OneForm::where('id',$id)->first();


        $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
      'May','June','July','August','September','October','November','December','Saturday','Sunday',
      'Monday','Tuesday','Wednesday','Thursday','Friday');
      $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
      'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
      বুধবার','বৃহস্পতিবার','শুক্রবার'
      );

$file_Name_Custome = "Fd9.1_Form";
        $pdf=PDF::loadView('front.fd9OneForm.mainPdfDownload',[
            'engDATE'=>$engDATE,
            'bangDATE'=>$bangDATE,
            'fd9OneList'=>$fd9OneList

        ],[],['format' => 'A4']);
    return $pdf->stream($file_Name_Custome.''.'.pdf');

    }

    public function mainPdfUpload(Request $request){

        $fd9OneFormInfo = Fd9OneForm::find($request->id);

        if ($request->hasfile('verified_fd_nine_one_form')) {
            $filePath="fd9OneFormInfo";
            $file = $request->file('verified_fd_nine_one_form');

            $fd9OneFormInfo->verified_fd_nine_one_form =CommonController::pdfUpload($request,$file,$filePath);

        }

        $fd9OneFormInfo->save();


        return redirect()->back()->with('success','Update Successfully');
    }
}
