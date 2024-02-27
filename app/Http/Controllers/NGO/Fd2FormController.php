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
use App\Models\Fd7Form;
use App\Models\Fd2FormForFd7Form;
use App\Models\Fd2Fd7OtherInfo;


use App\Models\Fd3Form;
use App\Models\Fd2FormForFd3Form;
use App\Models\Fd2Fd3OtherInfo;



use App\Models\Fd2FormForFc1Form;
use App\Models\Fd2Fc1OtherInfo;
use App\Models\Fc1Form;
use App\Models\Fc2Form;

use App\Models\Fd2FormForFc2Form;
use App\Models\Fd2Fc2OtherInfo;

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


        return view('front.fd2Form.addFd2DetailForFd7',compact('fd7Id','ngo_list_all','divisionList','fd7FormList'));


    }


    public function addFd2DetailForFd3($id){


        $fd3Id = base64_decode($id);
       $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
       $divisionList = DB::table('civilinfos')->groupBy('division_bn')
       ->select('division_bn')->get();



       $fd3FormList = Fd3Form::where('fd_one_form_id',$ngo_list_all->id)
       ->where('id',$fd3Id)->latest()->first();


        return view('front.fd2Form.addFd2DetailForFd3',compact('fd3Id','ngo_list_all','divisionList','fd3FormList'));


    }


    public function addFd2DetailForFc1($id){


        $fc1Id = base64_decode($id);
       $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
       $divisionList = DB::table('civilinfos')->groupBy('division_bn')
       ->select('division_bn')->get();



       $fc1FormList = Fc1Form::where('fd_one_form_id',$ngo_list_all->id)
       ->where('id',$fc1Id)->latest()->first();


        return view('front.fd2Form.addFd2DetailForFc1',compact('fc1Id','ngo_list_all','divisionList','fc1FormList'));


    }


    public function addFd2DetailForFc2($id){


        $fc2Id = base64_decode($id);
       $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
       $divisionList = DB::table('civilinfos')->groupBy('division_bn')
       ->select('division_bn')->get();



       $fc2FormList = Fc2Form::where('fd_one_form_id',$ngo_list_all->id)
       ->where('id',$fc2Id)->latest()->first();


        return view('front.fd2Form.addFd2DetailForFc2',compact('fc2Id','ngo_list_all','divisionList','fc2FormList'));


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


    public function editFd2DetailForFd7($id){


        $fd7Id = base64_decode($id);

        //dd($fd7Id);

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $divisionList = DB::table('civilinfos')->groupBy('division_bn')
        ->select('division_bn')->get();

        $fd2FormList = Fd2FormForFd7Form::where('fd_one_form_id',$ngo_list_all->id)
        ->where('fd7_form_id',$fd7Id)->latest()->first();

        $fd7FormList = Fd7Form::where('fd_one_form_id',$ngo_list_all->id)
        ->where('id',$fd7Id)->latest()->first();

        if(!$fd2FormList){

            $fd2OtherInfo = Fd2Fd7OtherInfo::where('fd2_form_for_fd7_form_id',0)->latest()->get();


         return view('front.fd2Form.addFd2DetailForFd7',compact('fd2FormList','fd2OtherInfo','fd7Id','ngo_list_all','divisionList','fd7FormList'));

        }else{

        $fd2OtherInfo = Fd2Fd7OtherInfo::where('fd2_form_for_fd7_form_id',$fd2FormList->id)->latest()->get();


         return view('front.fd2Form.editFd2DetailForFd7',compact('fd2FormList','fd2OtherInfo','fd7Id','ngo_list_all','divisionList','fd7FormList'));
        }

    }


    public function editFd2DetailForFc2($id){


        $fc2Id = base64_decode($id);



        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();


        $divisionList = DB::table('civilinfos')->groupBy('division_bn')
        ->select('division_bn')->get();

        $fd2FormList = Fd2FormForFc2Form::where('fd_one_form_id',$ngo_list_all->id)
        ->where('fc2_form_id',$fc2Id)->latest()->first();



        $fc2FormList = Fc2Form::where('fd_one_form_id',$ngo_list_all->id)
        ->where('id',$fc2Id)->latest()->first();



        if(!$fd2FormList){
            $fd2OtherInfo = Fd2Fc2OtherInfo::where('fd2_form_for_fc2_form_id',0)->latest()->get();
            return view('front.fd2Form.addFd2DetailForFc2',compact('fd2FormList','fd2OtherInfo','fc2Id','ngo_list_all','divisionList','fc2FormList'));

        }else{



        $fd2OtherInfo = Fd2Fc2OtherInfo::where('fd2_form_for_fc2_form_id',$fd2FormList->id)->latest()->get();
        return view('front.fd2Form.editFd2DetailForFc2',compact('fd2FormList','fd2OtherInfo','fc2Id','ngo_list_all','divisionList','fc2FormList'));
    }




    }

    public function editFd2DetailForFd3($id){


        $fd3Id = base64_decode($id);

        //dd($fd3Id);

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $divisionList = DB::table('civilinfos')->groupBy('division_bn')
        ->select('division_bn')->get();

        $fd2FormList = Fd2FormForFd3Form::where('fd_one_form_id',$ngo_list_all->id)
        ->where('fd3_form_id',$fd3Id)->latest()->first();

        $fd3FormList = Fd3Form::where('fd_one_form_id',$ngo_list_all->id)
        ->where('id',$fd3Id)->latest()->first();


        if(!$fd2FormList){

            $fd2OtherInfo = Fd2Fd3OtherInfo::where('fd2_form_for_fd3_form_id',0)->latest()->get();


         return view('front.fd2Form.addFd2DetailForFd3',compact('fd2FormList','fd2OtherInfo','fd3Id','ngo_list_all','divisionList','fd3FormList'));

        }else{
        $fd2OtherInfo = Fd2Fd3OtherInfo::where('fd2_form_for_fd3_form_id',$fd2FormList->id)->latest()->get();


         return view('front.fd2Form.editFd2DetailForFd3',compact('fd2FormList','fd2OtherInfo','fd3Id','ngo_list_all','divisionList','fd3FormList'));

        }
    }


    public function editFd2DetailForFc1($id){


        $fc1Id = base64_decode($id);

        //dd($fc1Id);

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $divisionList = DB::table('civilinfos')->groupBy('division_bn')
        ->select('division_bn')->get();

        $fd2FormList = Fd2FormForFc1Form::where('fd_one_form_id',$ngo_list_all->id)
        ->where('fc1_form_id',$fc1Id)->latest()->first();

        $fc1FormList = Fc1Form::where('fd_one_form_id',$ngo_list_all->id)
        ->where('id',$fc1Id)->latest()->first();


        if(!$fd2FormList){

            $fd2OtherInfo = Fd2Fc1OtherInfo::where('fd2_form_for_fc1_form_id',0)->latest()->get();


            return view('front.fd2Form.addFd2DetailForFc1',compact('fd2FormList','fd2OtherInfo','fc1Id','ngo_list_all','divisionList','fc1FormList'));

        }else{



        $fd2OtherInfo = Fd2Fc1OtherInfo::where('fd2_form_for_fc1_form_id',$fd2FormList->id)->latest()->get();


         return view('front.fd2Form.editFd2DetailForFc1',compact('fd2FormList','fd2OtherInfo','fc1Id','ngo_list_all','divisionList','fc1FormList'));
        }

    }


    public function fd2PdfUpdate(Request $request){

        try{
            DB::beginTransaction();

        $fd2FormInfo =Fd2FormOtherInfo::find($request->mid);
        if ($request->hasfile('file')) {
            $filePath="FdTwoForm";
            $file = $request->file('file');

            $fd2FormInfo->file =CommonController::pdfUpload($request,$file,$filePath);

        }


          $fd2FormInfo->save();

          DB::commit();
          return redirect()->back()->with('success','Added Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/')->with('error','some thing went wrong ,this is why you redirect to dashboard');
        }
    }

    public function fd2ForFc2PdfUpdate(Request $request){

        try{
            DB::beginTransaction();

        $fd2FormInfo =Fd2Fc2OtherInfo::find($request->mid);
        if ($request->hasfile('file')) {
            $filePath="FdTwoForm";
            $file = $request->file('file');

            $fd2FormInfo->file =CommonController::pdfUpload($request,$file,$filePath);

        }


          $fd2FormInfo->save();

          DB::commit();
          return redirect()->back()->with('success','Added Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/')->with('error','some thing went wrong ,this is why you redirect to dashboard');
        }
    }


    public function fd2ForFc1PdfUpdate(Request $request){
        try{
            DB::beginTransaction();

        $fd2FormInfo =Fd2Fc1OtherInfo::find($request->mid);
        if ($request->hasfile('file')) {
            $filePath="FdTwoForm";
            $file = $request->file('file');

            $fd2FormInfo->file =CommonController::pdfUpload($request,$file,$filePath);

        }


          $fd2FormInfo->save();

          DB::commit();
          return redirect()->back()->with('success','Added Successfuly');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/')->with('error','some thing went wrong ,this is why you redirect to dashboard');
        }

    }


    public function fd2ForFd7PdfUpdate(Request $request){

        try{
            DB::beginTransaction();

        $fd2FormInfo =Fd2Fd7OtherInfo::find($request->mid);
        if ($request->hasfile('file')) {
            $filePath="FdTwoForm";
            $file = $request->file('file');

            $fd2FormInfo->file =CommonController::pdfUpload($request,$file,$filePath);

        }


          $fd2FormInfo->save();

          DB::commit();
          return redirect()->back()->with('success','Added Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/')->with('error','some thing went wrong ,this is why you redirect to dashboard');
        }
    }


    public function fd2ForFd3PdfUpdate(Request $request){

        try{
            DB::beginTransaction();

        $fd2FormInfo =Fd2Fd3OtherInfo::find($request->mid);
        if ($request->hasfile('file')) {
            $filePath="FdTwoForm";
            $file = $request->file('file');

            $fd2FormInfo->file =CommonController::pdfUpload($request,$file,$filePath);

        }


          $fd2FormInfo->save();

          DB::commit();
          return redirect()->back()->with('success','Added Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/')->with('error','some thing went wrong ,this is why you redirect to dashboard');
        }
    }

    public function fd2PdfDestroy($id){

        try{
            DB::beginTransaction();

        $admins = Fd2FormOtherInfo::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }
        DB::commit();
        return back()->with('error','Deleted successfully!');

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect('/')->with('error','some thing went wrong ,this is why you redirect to dashboard');
    }
    }

    public function deleteFd2DetailForFd7($id){

        try{
            DB::beginTransaction();

        $admins = Fd2Fd7OtherInfo::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }
        DB::commit();
        return back()->with('error','Deleted successfully!');

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect('/')->with('error','some thing went wrong ,this is why you redirect to dashboard');
    }
    }

    public function deleteFd2DetailForFd3($id){

        try{
            DB::beginTransaction();

        $admins = Fd2Fd3OtherInfo::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }
        DB::commit();
        return back()->with('error','Deleted successfully!');

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect('/')->with('error','some thing went wrong ,this is why you redirect to dashboard');
    }
    }

    public function deleteFd2DetailForFc2($id){
        try{
            DB::beginTransaction();

        $admins = Fd2Fc2OtherInfo::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }
        DB::commit();
        return back()->with('error','Deleted successfully!');

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect('/')->with('error','some thing went wrong ,this is why you redirect to dashboard');
    }
    }
    public function deleteFd2DetailForFc1($id){


        try{
            DB::beginTransaction();
        $admins = Fd2Fc1OtherInfo::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }
        DB::commit();
        return back()->with('error','Deleted successfully!');

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect('/')->with('error','some thing went wrong ,this is why you redirect to dashboard');
    }
    }


    public function downloadFd2DetailForFd7Other($id){

        $get_file_data = Fd2Fd7OtherInfo::where('id',$id)->value('file');

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


    public function downloadFd2DetailForFd3Other($id){

        $get_file_data = Fd2Fd3OtherInfo::where('id',$id)->value('file');

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


    public function downloadFd2DetailForFc2Other($id){

        $get_file_data = Fd2Fc2OtherInfo::where('id',$id)->value('file');

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


    public function downloadFd2DetailForFc1Other($id){

        $get_file_data = Fd2Fc1OtherInfo::where('id',$id)->value('file');

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

    public function downloadFd2DetailForFd7($id){


        $get_file_data = Fd2FormForFd7Form::where('id',$id)->value('fd_2_form_pdf');

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

    public function downloadFd2DetailForFd3($id){


        $get_file_data = Fd2FormForFd3Form::where('id',$id)->value('fd_2_form_pdf');

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

    public function downloadFd2DetailForFc2($id){


        $get_file_data = Fd2FormForFc2Form::where('id',$id)->value('fd_2_form_pdf');

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

    public function downloadFd2DetailForFc1($id){


        $get_file_data = Fd2FormForFc1Form::where('id',$id)->value('fd_2_form_pdf');

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

    //fc1

    public function storeFd2DetailForFd7(Request $request){


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


        try{
            DB::beginTransaction();

        $fdOneFormID = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fd2FormInfo = new Fd2FormForFd7Form();
        $fd2FormInfo->fd_one_form_id =$fdOneFormID->id;
        $fd2FormInfo->fd7_form_id =base64_decode($request->fd7_form_id);
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
            foreach($fileData as $key=>$fileData){


                $form= new Fd2Fd7OtherInfo();
                if(empty($input['file_name'][$key])){


                }else{

                    $form->file_name=$input['file_name'][$key];
                }
                $file=$input['file'][$key];
               $filePath="Fd2FormOtherInfo";
               $form->file =CommonController::pdfUpload($request,$file,$filePath);
               $form->fd2_form_for_fd7_form_id  = $fd2FormInfoId;
                $form->save();


            }



          }
          DB::commit();
          return redirect()->route('fd7Form.index')->with('success','Added Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/')->with('error','some thing went wrong ,this is why you redirect to dashboard');
        }

    }
    // end fc1

    public function storeFd2DetailForFc1(Request $request){


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


        try{
            DB::beginTransaction();

        $fdOneFormID = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fd2FormInfo = new Fd2FormForFc1Form();
        $fd2FormInfo->fd_one_form_id =$fdOneFormID->id;
        $fd2FormInfo->fc1_form_id =base64_decode($request->fc1_form_id);
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
            foreach($fileData as $key=>$fileData){


                $form= new Fd2Fc1OtherInfo();
                if(empty($input['file_name'][$key])){


                }else{

                    $form->file_name=$input['file_name'][$key];
                }
                $file=$input['file'][$key];
               $filePath="Fd2Fc1OtherInfo";
               $form->file =CommonController::pdfUpload($request,$file,$filePath);
               $form->fd2_form_for_fc1_form_id  = $fd2FormInfoId;
                $form->save();


            }



          }
          DB::commit();
          return redirect()->route('fc1Form.index')->with('success','Added Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/')->with('error','some thing went wrong ,this is why you redirect to dashboard');
        }

    }


    public function storeFd2DetailForFc2(Request $request){


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



        try{
            DB::beginTransaction();
        $fdOneFormID = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fd2FormInfo = new Fd2FormForFc2Form();
        $fd2FormInfo->fd_one_form_id =$fdOneFormID->id;
        $fd2FormInfo->fc2_form_id =base64_decode($request->fc2_form_id);
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
            foreach($fileData as $key=>$fileData){


                $form= new Fd2Fc2OtherInfo();
                if(empty($input['file_name'][$key])){


                }else{

                    $form->file_name=$input['file_name'][$key];
                }
                $file=$input['file'][$key];
               $filePath="Fd2Fc2OtherInfo";
               $form->file =CommonController::pdfUpload($request,$file,$filePath);
               $form->fd2_form_for_fc2_form_id  = $fd2FormInfoId;
                $form->save();


            }



          }
          DB::commit();
          return redirect()->route('fc2Form.index')->with('success','Added Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/')->with('error','some thing went wrong ,this is why you redirect to dashboard');
        }

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

        try{
            DB::beginTransaction();

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
            foreach($fileData as $key=>$fileData){


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
          DB::commit();
          return redirect()->route('fd6Form.index')->with('success','Added Successfuly');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/')->with('error','some thing went wrong ,this is why you redirect to dashboard');
        }
    }




    public function update(Request $request,$id){
        try{
            DB::beginTransaction();
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
          DB::commit();
          return redirect()->route('fd6Form.index')->with('success','Updated Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/')->with('error','some thing went wrong ,this is why you redirect to dashboard');
        }
    }



    public function updateFd2DetailForFd7(Request $request){
        try{
            DB::beginTransaction();

        //dd(11);
        $fdOneFormID = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fd2FormInfo = Fd2FormForFd7Form::find($request->id);
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


                $form= new Fd2Fd7OtherInfo();
                if(empty($input['file_name'][$key])){


                }else{

                    $form->file_name=$input['file_name'][$key];
                }
                $file=$input['file'][$key];
               $filePath="Fd2FormOtherInfo";
               $form->file =CommonController::pdfUpload($request,$file,$filePath);
               $form->fd2_form_for_fd7_form_id = $fd2FormInfoId;
                $form->save();


            }



          }
          DB::commit();
          return redirect()->route('fd7Form.index')->with('success','Updated Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/')->with('error','some thing went wrong ,this is why you redirect to dashboard');
        }
    }



    public function updateFd2DetailForFc1(Request $request){
        try{
            DB::beginTransaction();

        //dd(11);
        $fdOneFormID = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fd2FormInfo = Fd2FormForFc1Form::find($request->id);
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


                $form= new Fd2Fc1OtherInfo();
                if(empty($input['file_name'][$key])){


                }else{

                    $form->file_name=$input['file_name'][$key];
                }
                $file=$input['file'][$key];
               $filePath="Fd2Fc1OtherInfo";
               $form->file =CommonController::pdfUpload($request,$file,$filePath);
               $form->fd2_form_for_fc1_form_id = $fd2FormInfoId;
                $form->save();


            }



          }
          DB::commit();
          return redirect()->route('fc1Form.index')->with('success','Updated Successfuly');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/')->with('error','some thing went wrong ,this is why you redirect to dashboard');
        }

    }


    public function updateFd2DetailForFc2(Request $request){
        try{
            DB::beginTransaction();

        //dd(11);
        $fdOneFormID = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fd2FormInfo = Fd2FormForFc2Form::find($request->id);
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


                $form= new Fd2Fc2OtherInfo();
                if(empty($input['file_name'][$key])){


                }else{

                    $form->file_name=$input['file_name'][$key];
                }
                $file=$input['file'][$key];
               $filePath="Fd2Fc2OtherInfo";
               $form->file =CommonController::pdfUpload($request,$file,$filePath);
               $form->fd2_form_for_fc2_form_id = $fd2FormInfoId;
                $form->save();


            }



          }
          DB::commit();
          return redirect()->route('fc2Form.index')->with('success','Updated Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/')->with('error','some thing went wrong ,this is why you redirect to dashboard');
        }
    }



    public function storeFd2DetailForFd3(Request $request){


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

        try{
            DB::beginTransaction();


        $fdOneFormID = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fd2FormInfo = new Fd2FormForFd3Form();
        $fd2FormInfo->fd_one_form_id =$fdOneFormID->id;
        $fd2FormInfo->fd3_form_id =base64_decode($request->fd3_form_id);
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
            foreach($fileData as $key=>$fileData){


                $form= new Fd2Fd3OtherInfo();
                if(empty($input['file_name'][$key])){


                }else{

                    $form->file_name=$input['file_name'][$key];
                }
                $file=$input['file'][$key];
               $filePath="Fd2FormOtherInfo";
               $form->file =CommonController::pdfUpload($request,$file,$filePath);
               $form->fd2_form_for_fd3_form_id  = $fd2FormInfoId;
                $form->save();


            }



          }
          DB::commit();
          return redirect()->route('fd3Form.index')->with('success','Added Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/')->with('error','some thing went wrong ,this is why you redirect to dashboard');
        }

    }


    public function updateFd2DetailForFd3(Request $request){

        try{
            DB::beginTransaction();
        //dd(11);
        $fdOneFormID = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fd2FormInfo = Fd2FormForFd3Form::find($request->id);
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


                $form= new Fd2Fd3OtherInfo();
                if(empty($input['file_name'][$key])){


                }else{

                    $form->file_name=$input['file_name'][$key];
                }
                $file=$input['file'][$key];
               $filePath="Fd2FormOtherInfo";
               $form->file =CommonController::pdfUpload($request,$file,$filePath);
               $form->fd2_form_for_fd3_form_id = $fd2FormInfoId;
                $form->save();


            }



          }
          DB::commit();
          return redirect()->route('fd3Form.index')->with('success','Updated Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/')->with('error','some thing went wrong ,this is why you redirect to dashboard');
        }
    }



}
