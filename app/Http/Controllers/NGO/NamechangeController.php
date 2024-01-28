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

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $name_change_list_all =  NgoNameChange::where('fd_one_form_id',$ngo_list_all->id)->latest()->get();

        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();

        if($mainNgoType== 'দেশিও'){
        return view('front.name_change.name_change',compact('ngo_list_all','name_change_list_all'));
        }else{
            return view('front.name_change.foreign.name_change',compact('ngo_list_all','name_change_list_all'));
        }
    }


    public function sendNameChange(){

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();

        if($mainNgoType== 'দেশিও'){

        return view('front.name_change.send_name_change_page',compact('ngo_list_all'));
        }else{
            return view('front.name_change.foreign.send_name_change_page',compact('ngo_list_all'));
        }
    }


    public function formEightData(Request $request){


        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

             Session::put('previous_name',$request->previous_name);
             Session::put('previous_name_ban',$request->previous_name_ban);
             Session::put('new_name',$request->new_name);
             Session::put('new_name_ban',$request->new_name_ban);


        $form_eight_list = FormEight::where('fd_one_form_id',$ngo_list_all->id)->get();


        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $main_time = $dt->format('H:i:s a');
        $fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');
        $new_data_add = new NgoNameChange();
        $new_data_add->fd_one_form_id = $fdOneFormId;
        $new_data_add->previous_name_eng =  Session::get('previous_name');
        $new_data_add->previous_name_ban = Session::get('previous_name_ban');
        $new_data_add->present_name_eng = Session::get('new_name');
        $new_data_add->present_name_ban = Session::get('new_name_ban');
        $new_data_add->status = 'Ongoing';
        $new_data_add->time_for_api = $main_time;
        $new_data_add->save();

        return redirect()->route('addOtherDoc');

    }


    public function formEightDataAdd(Request $request){

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $form_eight_list = FormEight::where('fd_one_form_id',$ngo_list_all->id)->get();

        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();

if($mainNgoType== 'দেশিও'){
        return view('front.name_change.view_form_8_for_change_add',compact('ngo_list_all','form_eight_list'));
}else{

    return view('front.name_change.foreign.view_form_8_for_change_add',compact('ngo_list_all','form_eight_list'));
}

    }


    public function ngoCommitteMemberAdd(Request $request){

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $form_eight_list = NgoMemberList::where('fd_one_form_id',$ngo_list_all->id)->get();

        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();

if($mainNgoType== 'দেশিও'){
        return view('front.name_change.committee_ngo_member_add',compact('ngo_list_all','form_eight_list'));
}else{
    return view('front.name_change.foreign.committee_ngo_member_add',compact('ngo_list_all','form_eight_list'));
}

    }

    public function nameChangeView($id){

        $fdOneFormInfo = FdOneForm::where('user_id',Auth::user()->id)->first();


        $nameChangeInfo = NgoNameChange::where('id',base64_decode($id))->first();


        $nameChangeInfoDoc = NameChangeDoc::where('ngo_name_change_id',base64_decode($id))->get();

        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();

if($mainNgoType== 'দেশিও'){
    return view('front.name_change.nameChangeView',compact('nameChangeInfoDoc','fdOneFormInfo','nameChangeInfo'));
}else{
    return view('front.name_change.foreign.nameChangeView',compact('nameChangeInfoDoc','fdOneFormInfo','nameChangeInfo'));

}




    }


    public function ngoCommitteMemberEdit($id){
        $all_data_list = NgoMemberList::where('member_name_slug',$id)->first();
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();

if($mainNgoType== 'দেশিও'){
        return view('front.name_change.committee_ngo_member_edit',compact('all_data_list','ngo_list_all'));
}else{
    return view('front.name_change.foreign.committee_ngo_member_edit',compact('all_data_list','ngo_list_all'));
}
    }


    public function ngoCommitteMemberStore(Request $request){

        $time_dy = time().date("Ymd");

        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $main_time = $dt->format('H:i:s');
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
        $ngoMemberData->time_for_api = $main_time;
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
        $time_dy = time().date("Ymd");

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

        $time_dy = time().date("Ymd");

        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $main_time = $dt->format('H:i:s');


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
        $formEightData->save();


        return redirect('/formEightData')->with('success','Created Successfully');
    }


    public function formEightDataEdit($id){


 $all_data_list = FormEight::where('name_slug',$id)->first();
 $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

 CommonController::checkNgotype(1);

 $mainNgoType = CommonController::changeView();

if($mainNgoType== 'দেশিও'){
        return view('front.name_change.view_form_8_for_change_edit',compact('ngo_list_all','all_data_list'));
}else{

    return view('front.name_change.foreign.view_form_8_for_change_edit',compact('ngo_list_all','all_data_list'));
}
    }



    public function formEightDataUpdate(Request $request){
        $time_dy = time().date("Ymd");

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

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $form_eight_list = NgoMemberList::where('fd_one_form_id',$ngo_list_all->id)->get();

        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();

if($mainNgoType== 'দেশিও'){
        return view('front.name_change.committee_ngo_member',compact('ngo_list_all','form_eight_list'));
}else{
    return view('front.name_change.foreign.committee_ngo_member',compact('ngo_list_all','form_eight_list'));
}
    }



    public function ngoMemberNidAndImage(Request $request){

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $form_eight_list = NgoMemberNidPhoto::where('fd_one_form_id',$ngo_list_all->id)->get();

        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();

if($mainNgoType== 'দেশিও'){
        return view('front.name_change.ngo_member_id_and_images',compact('ngo_list_all','form_eight_list'));
}else{
    return view('front.name_change.foreign.ngo_member_id_and_images',compact('ngo_list_all','form_eight_list'));
}
    }


    public function ngoMemberNidAndImageAdd(){

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $form_eight_list = NgoMemberNidPhoto::where('fd_one_form_id',$ngo_list_all->id)->get();

        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();

if($mainNgoType== 'দেশিও'){
        return view('front.name_change.ngo_member_id_and_images_add',compact('ngo_list_all','form_eight_list'));
}else{

} return view('front.name_change.foreign.ngo_member_id_and_images_add',compact('ngo_list_all','form_eight_list'));
    }


    public function ngoMemberNidAndImageStore(Request $request){

        $fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');
        $time_dy = time().date("Ymd");
        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $main_time = $dt->format('H:i:s');

        $input = $request->all();


        $condition_main_image = $input['person_name'];


        foreach($condition_main_image as $key => $all_condition_main_image){

            $file_size = number_format($input['person_nid_copy'][$key]->getSize() / 1048576,2);

            $form= new NgoMemberNidPhoto();
            $filePath="NgoMemberNidPhoto";
            $file=$input['person_nid_copy'][$key];
            $file_image=$input['person_image'][$key];


            $form->member_image=CommonController::imageUpload($request,$file_image,$filePath);
            $form->member_nid_copy=CommonController::pdfUpload($request,$file,$filePath);

            $form->member_name=$input['person_name'][$key];
            $form->time_for_api = $main_time;
            $form->fd_one_form_id = $fdOneFormId;
            $form->member_nid_copy_size =$file_size;
            $form->save();
       }

       return redirect('/ngoMemberNidAndImage')->with('success','Created Successfully');
    }



    public function ngoMemberNidAndImageUpdate(Request $request){

        $time_dy = time().date("Ymd");


        $form= NgoMemberNidPhoto::find($request->id);

        if ($request->hasfile('person_nid_copy')) {
            $filePath="NgoMemberNidPhoto";
            $file = $request->file('person_nid_copy');



        $form->member_nid_copy =CommonController::pdfUpload($request,$file,$filePath);
        $file_size = number_format($file->getSize() / 1048576,2);
        $form->member_nid_copy_size =$file_size;

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

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $form_eight_list = NgoOtherDoc::where('fd_one_form_id',$ngo_list_all->id)->get();

        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();

if($mainNgoType== 'দেশিও'){
        return view('front.name_change.all_ngo_related_document',compact('ngo_list_all','form_eight_list'));
}else{
    return view('front.name_change.foreign.all_ngo_related_document',compact('ngo_list_all','form_eight_list'));
}
    }


    public function addOtherDoc(){

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $form_eight_list = NgoOtherDoc::where('fd_one_form_id',$ngo_list_all->id)->get();

        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();

if($mainNgoType== 'দেশিও'){
        return view('front.name_change.add_other_doc',compact('ngo_list_all','form_eight_list'));
}else{
    return view('front.name_change.foreign.add_other_doc',compact('ngo_list_all','form_eight_list'));
}
    }




    public function storeOtherDoc(Request $request){

        $time_dy = time().date("Ymd");
        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $main_time = $dt->format('H:i:s a');


        $input = $request->all();


        $condition_main_image = $input['primary_portal'];


        $fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');

        $ngo_name_change_id = DB::table('ngo_name_changes')->where('fd_one_form_id',$fdOneFormId)
        ->where('status','Ongoing')->value('id');

        foreach($condition_main_image as $key => $all_condition_main_image){

            $file_size = number_format($input['primary_portal'][$key]->getSize() / 1048576,2);

            $form= new NameChangeDoc();
            $file=$input['primary_portal'][$key];
            $filePath="NameChangeDoc";
            // $name=$time_dy.$file->getClientOriginalName();
            // $file->move('public/uploads/', $name);
            $form->pdf_file_list=CommonController::pdfUpload($request,$file,$filePath);
            $form->time_for_api = $main_time;
            $form->ngo_name_change_id  = $ngo_name_change_id;
            $form->	file_size =$file_size;
            $form->save();
       }




       return redirect('/nameChange')->with('success','Request Send Successfully');


    }


    public function updateOtherDoc(Request $request){
        $time_dy = time().date("Ymd");

        $ngoOtherDoc =NgoOtherDoc::find($request->id);
      if ($request->hasfile('primary_portal')) {
        $file_size = number_format($request->primary_portal->getSize() / 1048576,2);
            $file = $request->file('primary_portal');
            // $extension = $time_dy.$file->getClientOriginalName();
            // $filename = $extension;
            // $file->move('public/uploads/', $filename);
            $filePath="NgoOtherDoc";
            $ngoOtherDoc->pdf_file_list =CommonController::pdfUpload($request,$file,$filePath);
            $ngoOtherDoc->file_size =$file_size;

        }

        $ngoOtherDoc->save();


        return redirect('/nameChange')->with('success','Request Send Successfully');


    }



    public function finalSubmitNameChange(Request $request){


    //    dd(Session::get('previous_name'));

    //     $dt = new DateTime();
    //     $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

    //     $main_time = $dt->format('H:i:s a');
    //     $fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');
    //     $new_data_add = new NgoNameChange();
    //     $new_data_add->fd_one_form_id = $fdOneFormId;
    //     $new_data_add->previous_name_eng =  Session::get('previous_name');
    //     $new_data_add->previous_name_ban = Session::get('previous_name_ban');
    //     $new_data_add->present_name_eng = Session::get('new_name');
    //     $new_data_add->present_name_ban = Session::get('new_name_ban');
    //     $new_data_add->status = 'Ongoing';
    //     $new_data_add->time_for_api = $main_time;
    //     $new_data_add->save();


        return redirect('/nameChange')->with('success','Request Send Successfully');

    }



    public function formOnePdf($main_id,$id){

        if($id = 'plan'){

            $form_one_data = DB::table('fd_one_forms')->where('user_id',$main_id)->value('plan_of_operation');

        }elseif($id = 'invoice'){

            $form_one_data = DB::table('fd_one_forms')->where('user_id',$main_id)->value('attach_the__supporting_papers');

        }elseif($id = 'treasury_bill'){

            $form_one_data = DB::table('fd_one_forms')->where('user_id',$main_id)->value('board_of_revenue_on_fees');

        }elseif($id = 'final_pdf'){
            $form_one_data = DB::table('fd_one_forms')->where('user_id',$main_id)->value('s_pdf');
        }

        $file_path = url('public/'.$form_one_data);
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file= public_path('/'). $form_one_data;

$headers = array(
'Content-Type: application/pdf',
);

// return Response::download($file,$filename.'.pdf', $headers);

return Response::make(file_get_contents($file), 200, [
'content-type'=>'application/pdf',
]);
    }



    public function nameChangeDocDownload($id){

        $form_one_data = DB::table('name_change_docs')->where('id',$id)->value('pdf_file_list');

        $file_path = url('public/'.$form_one_data);
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file= public_path('/'). $form_one_data;

$headers = array(
'Content-Type: application/pdf',
);

// return Response::download($file,$filename.'.pdf', $headers);

return Response::make(file_get_contents($file), 200, [
'content-type'=>'application/pdf',
]);

    }

    public function formEightPdf($main_id){

        $fdOneFormId = FdOneForm::where('user_id',Auth::user()->id)->value('id');

        $form_one_data = DB::table('form_eights')->where('fd_one_form_id',$fdOneFormId)->value('verified_form_eight');

        $file_path = url('public/'.$form_one_data);
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file= public_path('/'). $form_one_data;

$headers = array(
'Content-Type: application/pdf',
);

// return Response::download($file,$filename.'.pdf', $headers);

return Response::make(file_get_contents($file), 200, [
'content-type'=>'application/pdf',
]);
    }

    public function sourceOfFund($id){

        $form_one_data = DB::table('fd_one_source_of_funds')->where('id',$id)->value('letter_file');
        $file_path = url('public/'.$form_one_data);
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file= public_path('/'). $form_one_data;

$headers = array(
'Content-Type: application/pdf',
);

// return Response::download($file,$filename.'.pdf', $headers);

return Response::make(file_get_contents($file), 200, [
'content-type'=>'application/pdf',
]);
    }

    public function otherPdfFromFDOneForm($id){

        $form_one_data = DB::table('fd_one_other_pdf_lists')->where('id',$id)->value('information_pdf');
        $file_path = url('public/'.$form_one_data);
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file= public_path('/'). $form_one_data;

$headers = array(
'Content-Type: application/pdf',
);

// return Response::download($file,$filename.'.pdf', $headers);

return Response::make(file_get_contents($file), 200, [
'content-type'=>'application/pdf',
]);
    }



    public function ngoOtherDocument($id){

        $form_one_data = DB::table('ngo_other_docs')->where('id',$id)->value('pdf_file_list');
        $file_path = url('public/'.$form_one_data);
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file= public_path('/'). $form_one_data;

$headers = array(
'Content-Type: application/pdf',
);

// return Response::download($file,$filename.'.pdf', $headers);

return Response::make(file_get_contents($file), 200, [
'content-type'=>'application/pdf',
]);
    }



    public function ngoMemberDocument($id){

        $form_one_data = DB::table('ngo_member_nid_photos')->where('id',$id)->value('member_nid_copy');
        $file_path = url('public/'.$form_one_data);
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file= public_path('/'). $form_one_data;

$headers = array(
'Content-Type: application/pdf',
);

// return Response::download($file,$filename.'.pdf', $headers);

return Response::make(file_get_contents($file), 200, [
'content-type'=>'application/pdf',
]);
    }
}
