<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Response;
use App\Models\FormEight;
use App\Models\FdOneForm;
use App\Models\NgoMemberList;
use App\Models\NgoOtherDoc;
use App\Models\NameChangeDoc;
use App\Models\NgoMemberNidPhoto;
use Auth;
use App;
use Session;
use DateTime;
use DateTimezone;
use App\Models\NgoNameChange;
use Illuminate\Support\Str;
use App\Http\Controllers\NGO\CommonController;
class NamechangeController extends Controller
{
    public function nameChange(){

        $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
        $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();
        $nameChangeListAll =  NgoNameChange::where('fd_one_form_id',$ngoListAll->id)->latest()->get();
        CommonController::checkNgotype(1);
        $mainNgoType = CommonController::changeView();

        if($mainNgoType== 'দেশিও'){
        return view('front.nameChange.nameChange',compact('ngoListAll','nameChangeListAll'));
        }else{
            return view('front.nameChange.foreign.nameChange',compact('ngoListAll','nameChangeListAll'));
        }
    }


    public function sendNameChange(){

        $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();

        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();

        if($mainNgoType== 'দেশিও'){

        return view('front.nameChange.sendNameChangePage',compact('ngoListAll'));
        }else{
            return view('front.nameChange.foreign.sendNameChangePage',compact('ngoListAll'));
        }
    }


    public function formEightData(Request $request){


        $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();

             Session::put('previous_name',$request->previous_name);
             Session::put('previous_name_ban',$request->previous_name_ban);
             Session::put('new_name',$request->new_name);
             Session::put('new_name_ban',$request->new_name_ban);


        $formEightList = FormEight::where('fd_one_form_id',$ngoListAll->id)->get();


        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $mainTime = $dt->format('H:i:s a');
        $fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');
        $newDataAdd = new NgoNameChange();
        $newDataAdd->fd_one_form_id = $fdOneFormId;
        $newDataAdd->previous_name_eng =  Session::get('previous_name');
        $newDataAdd->previous_name_ban = Session::get('previous_name_ban');
        $newDataAdd->present_name_eng = Session::get('new_name');
        $newDataAdd->present_name_ban = Session::get('new_name_ban');
        $newDataAdd->status = 'Ongoing';
        $newDataAdd->time_for_api = $mainTime;
        $newDataAdd->save();

        return redirect()->route('addOtherDoc');

    }


    public function formEightDataAdd(Request $request){

        $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();
        $formEightList = FormEight::where('fd_one_form_id',$ngoListAll->id)->get();

        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();

        if($mainNgoType== 'দেশিও'){
                return view('front.nameChange.viewForm8ForChangeAdd',compact('ngoListAll','formEightList'));
        }else{

            return view('front.nameChange.foreign.viewForm8ForChangeAdd',compact('ngoListAll','formEightList'));
        }

    }


    public function ngoCommitteMemberAdd(Request $request){

        $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();
        $formEightList = NgoMemberList::where('fd_one_form_id',$ngoListAll->id)->get();

        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();

        if($mainNgoType== 'দেশিও'){
                return view('front.nameChange.committeeNgoMemberAdd',compact('ngoListAll','formEightList'));
        }else{
            return view('front.nameChange.foreign.committeeNgoMemberAdd',compact('ngoListAll','formEightList'));
        }

    }

    public function nameChangeView($id){

        $fdOneFormInfo = FdOneForm::where('user_id',Auth::user()->id)->first();
        $nameChangeInfo = NgoNameChange::where('id',base64_decode($id))->first();
        $nameChangeInfoDoc = NameChangeDoc::where('ngo_name_change_id',base64_decode($id))->get();
        CommonController::checkNgotype(1);
        $mainNgoType = CommonController::changeView();

        if($mainNgoType== 'দেশিও'){
            return view('front.nameChange.nameChangeView',compact('nameChangeInfoDoc','fdOneFormInfo','nameChangeInfo'));
        }else{
            return view('front.nameChange.foreign.nameChangeView',compact('nameChangeInfoDoc','fdOneFormInfo','nameChangeInfo'));
        }

    }


    public function ngoCommitteMemberEdit($id){
        $allDataList = NgoMemberList::where('member_name_slug',$id)->first();
        $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();
        CommonController::checkNgotype(1);
        $mainNgoType = CommonController::changeView();

        if($mainNgoType== 'দেশিও'){
                return view('front.nameChange.committeeNgoMemberEdit',compact('allDataList','ngoListAll'));
        }else{
            return view('front.nameChange.foreign.committeeNgoMemberEdit',compact('allDataList','ngoListAll'));
        }
    }


    public function ngoCommitteMemberStore(Request $request){

        $timeDy = time().date("Ymd");

        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $mainTime = $dt->format('H:i:s');
        $fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');

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
        ]);

        $ngoMemberData = new NgoMemberList();
        $ngoMemberData->member_name = $request->name;
        $ngoMemberData->member_name_slug = Str::slug($request->name,"_");
        $ngoMemberData->member_designation = $request->desi;
        $ngoMemberData->member_dob = $request->dob;
        $ngoMemberData->time_for_api = $mainTime;
        $ngoMemberData->member_mobile = $request->phone;
        $ngoMemberData->member_nid_no = $request->nid_no;
        $ngoMemberData->member_father_name = $request->father_name;
        $ngoMemberData->member_present_address = $request->present_address;
        $ngoMemberData->member_permanent_address = $request->permanent_address;
        $ngoMemberData->member_name_supouse = $request->name_supouse;
        $ngoMemberData->fd_one_form_id = $fdOneFormId;
        $ngoMemberData->save();


        return redirect('/ngoCommitteMember')->with('success','Created Successfully');
    }



    public function ngoCommitteMemberUpdate(Request $request){
        $timeDy = time().date("Ymd");

        $ngoMemberData = NgoMemberList::find($request->id);
        $ngoMemberData->member_name = $request->name;
        $ngoMemberData->member_name_slug = Str::slug($request->name,"_");
        $ngoMemberData->member_designation = $request->desi;
        $ngoMemberData->member_dob = $request->dob;
        $ngoMemberData->member_mobile = $request->phone;
        $ngoMemberData->member_nid_no = $request->nid_no;
        $ngoMemberData->member_father_name = $request->father_name;
        $ngoMemberData->member_present_address = $request->present_address;
        $ngoMemberData->member_permanent_address = $request->permanent_address;
        $ngoMemberData->member_name_supouse = $request->name_supouse;
        $ngoMemberData->save();


        return redirect('/ngoCommitteMember')->with('success','Created Successfully');

    }


    public function formEightDataStore(Request $request){

        $timeDy = time().date("Ymd");

        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $mainTime = $dt->format('H:i:s');


        $fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');
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
        $formEightData->time_for_api = $mainTime;
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
        $formEightData->save();

        return redirect('/formEightData')->with('success','Created Successfully');
    }


    public function formEightDataEdit($id){


        $allDataList = FormEight::where('name_slug',$id)->first();
        $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();
        CommonController::checkNgotype(1);
        $mainNgoType = CommonController::changeView();

        if($mainNgoType== 'দেশিও'){
                return view('front.nameChange.viewForm8ForChangeEdit',compact('ngoListAll','allDataList'));
        }else{

            return view('front.nameChange.foreign.viewForm8ForChangeEdit',compact('ngoListAll','allDataList'));
        }
    }



    public function formEightDataUpdate(Request $request){
        $timeDy = time().date("Ymd");

        $formEightData =FormEight::find($request->id);
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


        return redirect('/formEightData')->with('info','Updated Successfully');

    }


    public function ngoCommitteMember(Request $request){

        $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();
        $formEightList = NgoMemberList::where('fd_one_form_id',$ngoListAll->id)->get();
        CommonController::checkNgotype(1);
        $mainNgoType = CommonController::changeView();

        if($mainNgoType== 'দেশিও'){
                return view('front.nameChange.committeeNgoMember',compact('ngoListAll','formEightList'));
        }else{
            return view('front.nameChange.foreign.committeeNgoMember',compact('ngoListAll','formEightList'));
        }
    }

    public function ngoMemberNidAndImage(Request $request){

        $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();
        $formEightList = NgoMemberNidPhoto::where('fd_one_form_id',$ngoListAll->id)->get();
        CommonController::checkNgotype(1);
        $mainNgoType = CommonController::changeView();

        if($mainNgoType== 'দেশিও'){
                return view('front.nameChange.ngoMemberIdAndImages',compact('ngoListAll','formEightList'));
        }else{
            return view('front.nameChange.foreign.ngoMemberIdAndImages',compact('ngoListAll','formEightList'));
        }
    }


    public function ngoMemberNidAndImageAdd(){

        $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();
        $formEightList = NgoMemberNidPhoto::where('fd_one_form_id',$ngoListAll->id)->get();
        CommonController::checkNgotype(1);
        $mainNgoType = CommonController::changeView();

        if($mainNgoType== 'দেশিও'){
                return view('front.nameChange.ngoMemberIdAndImagesAdd',compact('ngoListAll','formEightList'));
        }else{

        return view('front.nameChange.foreign.ngoMemberIdAndImagesAdd',compact('ngoListAll','formEightList'));
        }
    }


    public function ngoMemberNidAndImageStore(Request $request){

        $fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');
        $timeDy = time().date("Ymd");
        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $mainTime = $dt->format('H:i:s');
        $input = $request->all();
        $conditionMainImage = $input['person_name'];


        foreach($conditionMainImage as $key => $allConditionMainImage){

            $fileSize = number_format($input['person_nid_copy'][$key]->getSize() / 1048576,2);

            $form= new NgoMemberNidPhoto();
            $filePath="NgoMemberNidPhoto";
            $file=$input['person_nid_copy'][$key];
            $file_image=$input['person_image'][$key];
            $form->member_image=CommonController::imageUpload($request,$file_image,$filePath);
            $form->member_nid_copy=CommonController::pdfUpload($request,$file,$filePath);
            $form->member_name=$input['person_name'][$key];
            $form->time_for_api = $mainTime;
            $form->fd_one_form_id = $fdOneFormId;
            $form->member_nid_copy_size =$fileSize;
            $form->save();
        }

       return redirect('/ngoMemberNidAndImage')->with('success','Created Successfully');
    }


    public function ngoMemberNidAndImageUpdate(Request $request){

        $timeDy = time().date("Ymd");


        $form= NgoMemberNidPhoto::find($request->id);

        if ($request->hasfile('person_nid_copy')) {

            $filePath="NgoMemberNidPhoto";
            $file = $request->file('person_nid_copy');
            $form->member_nid_copy =CommonController::pdfUpload($request,$file,$filePath);
            $fileSize = number_format($file->getSize() / 1048576,2);
            $form->member_nid_copy_size =$fileSize;

        }
        if ($request->hasfile('person_image')) {

            $filePath="NgoMemberNidPhoto";
            $file1 = $request->file('person_image');
            $form->member_image = CommonController::imageUpload($request,$file1,$filePath);

        }
        $form->member_name=$request->person_name;
        $form->save();

        return redirect('/ngoMemberNidAndImage')->with('info','Updated Successfully');
    }



    public function allNgoRelatedDocument(Request $request){

        $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();
        $formEightList = NgoOtherDoc::where('fd_one_form_id',$ngoListAll->id)->get();
        CommonController::checkNgotype(1);
        $mainNgoType = CommonController::changeView();

        if($mainNgoType== 'দেশিও'){
                return view('front.nameChange.allNgoRelatedDocument',compact('ngoListAll','formEightList'));
        }else{
            return view('front.nameChange.foreign.allNgoRelatedDocument',compact('ngoListAll','formEightList'));
        }
    }


    public function addOtherDoc(){

        $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();
        $formEightList = NgoOtherDoc::where('fd_one_form_id',$ngoListAll->id)->get();
        CommonController::checkNgotype(1);
        $mainNgoType = CommonController::changeView();

        if($mainNgoType== 'দেশিও'){
                return view('front.nameChange.addOtherDoc',compact('ngoListAll','formEightList'));
        }else{
            return view('front.nameChange.foreign.addOtherDoc',compact('ngoListAll','formEightList'));
        }
    }

    public function storeOtherDoc(Request $request){

        $timeDy = time().date("Ymd");
        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $mainTime = $dt->format('H:i:s a');
        $input = $request->all();
        $conditionMainImage = $input['primary_portal'];


        $fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');
        $ngoNameChangeId = DB::table('ngo_name_changes')->where('fd_one_form_id',$fdOneFormId)->where('status','Ongoing')->value('id');

        foreach($conditionMainImage as $key => $allConditionMainImage){

            $fileSize = number_format($input['primary_portal'][$key]->getSize() / 1048576,2);

            $form= new NameChangeDoc();
            $file=$input['primary_portal'][$key];
            $filePath="NameChangeDoc";
            $form->pdf_file_list=CommonController::pdfUpload($request,$file,$filePath);
            $form->time_for_api = $mainTime;
            $form->ngo_name_change_id  = $ngoNameChangeId;
            $form->	file_size =$fileSize;
            $form->save();
        }

        return redirect('/nameChange')->with('success','Request Send Successfully');

    }


    public function updateOtherDoc(Request $request){
        $timeDy = time().date("Ymd");

        $ngoOtherDoc =NgoOtherDoc::find($request->id);
        if ($request->hasfile('primary_portal')) {
            $fileSize = number_format($request->primary_portal->getSize() / 1048576,2);
            $file = $request->file('primary_portal');
            $filePath="NgoOtherDoc";
            $ngoOtherDoc->pdf_file_list =CommonController::pdfUpload($request,$file,$filePath);
            $ngoOtherDoc->file_size =$fileSize;

        }
        $ngoOtherDoc->save();

        return redirect('/nameChange')->with('success','Request Send Successfully');
    }


    public function finalSubmitNameChange(Request $request){

        return redirect('/nameChange')->with('success','Request Send Successfully');

    }



    public function formOnePdf($main_id,$id){

        if($id = 'plan'){

            $formOneData = DB::table('fd_one_forms')->where('user_id',$main_id)->value('plan_of_operation');

        }elseif($id = 'invoice'){

            $formOneData = DB::table('fd_one_forms')->where('user_id',$main_id)->value('attach_the__supporting_papers');

        }elseif($id = 'treasury_bill'){

            $formOneData = DB::table('fd_one_forms')->where('user_id',$main_id)->value('board_of_revenue_on_fees');

        }elseif($id = 'final_pdf'){
            $formOneData = DB::table('fd_one_forms')->where('user_id',$main_id)->value('s_pdf');
        }

        $filePath = url('public/'.$formOneData);
        $filename  = pathinfo($filePath, PATHINFO_FILENAME);
        $file= public_path('/'). $formOneData;

        $headers = array(
        'Content-Type: application/pdf',
        );

        return Response::make(file_get_contents($file), 200, [
        'content-type'=>'application/pdf',
        ]);
    }

    public function nameChangeDocDownload($id){

        $formOneData = DB::table('name_change_docs')->where('id',$id)->value('pdf_file_list');

        $filePath = url('public/'.$formOneData);
        $filename  = pathinfo($filePath, PATHINFO_FILENAME);
        $file= public_path('/'). $formOneData;

        $headers = array(
        'Content-Type: application/pdf',
        );

        return Response::make(file_get_contents($file), 200, [
        'content-type'=>'application/pdf',
        ]);

    }

    public function formEightPdf($main_id){

        $fdOneFormId = FdOneForm::where('user_id',Auth::user()->id)->value('id');
        $formOneData = DB::table('form_eights')->where('fd_one_form_id',$fdOneFormId)->value('verified_form_eight');
        $filePath = url('public/'.$formOneData);
        $filename  = pathinfo($filePath, PATHINFO_FILENAME);
        $file= public_path('/'). $formOneData;

        $headers = array(
        'Content-Type: application/pdf',
        );

        return Response::make(file_get_contents($file), 200, [
        'content-type'=>'application/pdf',
        ]);
    }

    public function sourceOfFund($id){

        $formOneData = DB::table('fd_one_source_of_funds')->where('id',$id)->value('letter_file');
        $filePath = url('public/'.$formOneData);
        $filename  = pathinfo($filePath, PATHINFO_FILENAME);
        $file= public_path('/'). $formOneData;

        $headers = array(
        'Content-Type: application/pdf',
        );

        return Response::make(file_get_contents($file), 200, [
        'content-type'=>'application/pdf',
        ]);
    }

    public function otherPdfFromFDOneForm($id){

        $formOneData = DB::table('fd_one_other_pdf_lists')->where('id',$id)->value('information_pdf');
        $filePath = url('public/'.$formOneData);
        $filename  = pathinfo($filePath, PATHINFO_FILENAME);
        $file= public_path('/'). $formOneData;

        $headers = array(
        'Content-Type: application/pdf',
        );

        return Response::make(file_get_contents($file), 200, [
        'content-type'=>'application/pdf',
        ]);
    }



    public function ngoOtherDocument($id){

        $formOneData = DB::table('ngo_other_docs')->where('id',$id)->value('pdf_file_list');
        $filePath = url('public/'.$formOneData);
        $filename  = pathinfo($filePath, PATHINFO_FILENAME);
        $file= public_path('/'). $formOneData;

        $headers = array(
        'Content-Type: application/pdf',
        );

        return Response::make(file_get_contents($file), 200, [
        'content-type'=>'application/pdf',
        ]);
    }



    public function ngoMemberDocument($id){

        $formOneData = DB::table('ngo_member_nid_photos')->where('id',$id)->value('member_nid_copy');
        $filePath = url('public/'.$formOneData);
        $filename  = pathinfo($filePath, PATHINFO_FILENAME);
        $file= public_path('/'). $formOneData;

        $headers = array(
        'Content-Type: application/pdf',
        );

        return Response::make(file_get_contents($file), 200, [
        'content-type'=>'application/pdf',
        ]);
    }
}
