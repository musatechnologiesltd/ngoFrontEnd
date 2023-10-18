<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fd2Form;
use App\Models\Fd2FormOtherInfo;
use App\Models\NVisa;
use App\Models\NgoStatus;
use App\Models\Country;
use App\Models\Fd9Form;
use App\Models\Fd6Form;
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
class Fd2FormController extends Controller
{
    public function index(){
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();




    }



    public function addFd2Detail($id){
       $fd6Id = base64_decode($id);
       $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
       $divisionList = DB::table('civilinfos')->groupBy('division_bn')
       ->select('division_bn')->get();



       $fd6FormList = Fd6Form::where('fd_one_form_id',$ngo_list_all->id)
       ->where('id',$fd6Id)->latest()->first();


        return view('front.fd2Form.create',compact('fd6Id','ngo_list_all','divisionList','fd6FormList'));


    }


    public function addFd2DetailForFd7($id){


        $fd7Id = base64_decode($id);
       $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
       $divisionList = DB::table('civilinfos')->groupBy('division_bn')
       ->select('division_bn')->get();



       $fd7FormList = Fd7Form::where('fd_one_form_id',$ngo_list_all->id)
       ->where('id',$fd7Id)->latest()->first();


        return view('front.fd2Form.addFd2DetailForFd7',compact('fd6Id','ngo_list_all','divisionList','fd7FormList'));


    }


    public function edit($id){

        $fd6Id = base64_decode($id);
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $divisionList = DB::table('civilinfos')->groupBy('division_bn')
        ->select('division_bn')->get();

        $fd2FormList = Fd2Form::where('fd_one_form_id',$ngo_list_all->id)
        ->where('fd_six_form_id',$id)->latest()->first();

        $fd6FormList = Fd6Form::where('fd_one_form_id',$ngo_list_all->id)
        ->where('id',$fd6Id)->latest()->first();



        $fd2OtherInfo = Fd2FormOtherInfo::where('fd2_form_id',$fd2FormList->id)->latest()->get();


         return view('front.fd2Form.edit',compact('fd2FormList','fd2OtherInfo','fd6Id','ngo_list_all','divisionList','fd6FormList'));

    }


    public function fd2PdfUpdate(Request $request){

        $fd2FormInfo =Fd2FormOtherInfo::find($request->mid);
        if ($request->hasfile('file')) {
            $filePath="FdTwoForm";
            $file = $request->file('file');

            $fd2FormInfo->file =CommonController::pdfUpload($request,$file,$filePath);

        }


          $fd2FormInfo->save();


          return redirect()->back()->with('success','Added Successfuly');


    }

    public function fd2PdfDestroy($id){

        $admins = Fd2FormOtherInfo::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }
        return back()->with('error','Deleted successfully!');
    }


    public function fd2PdfDownload($id){

        $get_file_data = Fd2FormOtherInfo::where('id',$id)->value('file');

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


    public function fd2MainPdfDownload($id){
        $get_file_data = Fd2Form::where('id',$id)->value('fd_2_form_pdf');

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



    public function create(){

        return view('front.fd2Form.create');
    }


    public function storeFd2DetailForFd7(Request $request){
        
    }



    public function store(Request $request){

        //dd($request->all());

        $request->validate([
            'ngo_name' => 'required|string',
            'ngo_address' => 'required|string',
            'ngo_prokolpo_name' => 'required|string',
            'ngo_prokolpo_duration' => 'required|string',
            'ngo_prokolpo_start_date' => 'required|string',
            'ngo_prokolpo_end_date' => 'required|string',
            'proposed_rebate_amount_bangladeshi_taka' => 'required|string',
            'proposed_rebate_amount_in_foreign_currency' => 'required|string',
            'fd_2_form_pdf' => 'required|file',

        ]);

        $fdOneFormID = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fd2FormInfo = new Fd2Form();
        $fd2FormInfo->fd_one_form_id =$fdOneFormID->id;
        $fd2FormInfo->fd_six_form_id =$request->fd_six_form_id;
        $fd2FormInfo->ngo_name =$request->ngo_name;
        $fd2FormInfo->status ='Ongoing';
        $fd2FormInfo->ngo_address =$request->ngo_address;
        $fd2FormInfo->ngo_prokolpo_name =$request->ngo_prokolpo_name;
        $fd2FormInfo->ngo_prokolpo_duration =$request->ngo_prokolpo_duration;
        $fd2FormInfo->ngo_prokolpo_start_date =$request->ngo_prokolpo_start_date;
        $fd2FormInfo->ngo_prokolpo_end_date =$request->ngo_prokolpo_end_date;

        $fd2FormInfo->proposed_rebate_amount_bangladeshi_taka =$request->proposed_rebate_amount_bangladeshi_taka;
        $fd2FormInfo->proposed_rebate_amount_in_foreign_currency =$request->proposed_rebate_amount_in_foreign_currency;

        if ($request->hasfile('fd_2_form_pdf')) {
            $filePath="FdTwoForm";
            $file = $request->file('fd_2_form_pdf');

            $fd2FormInfo->fd_2_form_pdf =CommonController::pdfUpload($request,$file,$filePath);

        }


          $fd2FormInfo->save();

          $input = $request->all();




          $fd2FormInfoId = $fd2FormInfo->id;

          if (array_key_exists("file", $input)){
            $fileData = $input['file'];
            foreach($fileData as $fileData){


                $form= new Fd2FormOtherInfo();
                if(empty($input['file_name'][$key])){


                }else{

                    $form->file_name=$input['file_name'][$key];
                }
                $file=$input['file'][$key];
               $filePath="Fd2FormOtherInfo";
               $form->file =CommonController::pdfUpload($request,$file,$filePath);
               $form->fd2_form_id = $fd2FormInfoId;
                $form->save();


            }



          }

          return redirect()->route('fd6Form.index')->with('success','Added Successfuly');
    }




    public function update(Request $request,$id){

        $fdOneFormID = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fd2FormInfo = Fd2Form::find($id);
        $fd2FormInfo->ngo_name =$request->ngo_name;
        $fd2FormInfo->ngo_address =$request->ngo_address;
        $fd2FormInfo->ngo_prokolpo_name =$request->ngo_prokolpo_name;
        $fd2FormInfo->ngo_prokolpo_duration =$request->ngo_prokolpo_duration;
        $fd2FormInfo->ngo_prokolpo_start_date =$request->ngo_prokolpo_start_date;
        $fd2FormInfo->ngo_prokolpo_end_date =$request->ngo_prokolpo_end_date;

        $fd2FormInfo->proposed_rebate_amount_bangladeshi_taka =$request->proposed_rebate_amount_bangladeshi_taka;
        $fd2FormInfo->proposed_rebate_amount_in_foreign_currency =$request->proposed_rebate_amount_in_foreign_currency;

        if ($request->hasfile('fd_2_form_pdf')) {
            $filePath="FdTwoForm";
            $file = $request->file('fd_2_form_pdf');

            $fd2FormInfo->fd_2_form_pdf =CommonController::pdfUpload($request,$file,$filePath);

        }


          $fd2FormInfo->save();

          $input = $request->all();




          $fd2FormInfoId = $fd2FormInfo->id;

          if (array_key_exists("file", $input)){
            $fileData = $input['file'];
            foreach($fileData as $fileData){


                $form= new Fd2FormOtherInfo();
                if(empty($input['file_name'][$key])){


                }else{

                    $form->file_name=$input['file_name'][$key];
                }
                $file=$input['file'][$key];
               $filePath="Fd2FormOtherInfo";
               $form->file =CommonController::pdfUpload($request,$file,$filePath);
               $form->fd2_form_id = $fd2FormInfoId;
                $form->save();


            }



          }

          return redirect()->route('fd6Form.index')->with('success','Updated Successfuly');


    }



}
