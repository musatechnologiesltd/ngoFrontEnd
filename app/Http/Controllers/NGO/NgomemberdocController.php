<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use App\Models\NgoMemberNidPhoto;
use App\Models\FormCompleteStatus;
use Response;
use DateTime;
use DateTimezone;
use App\Http\Controllers\NGO\CommonController;
class NgomemberdocController extends Controller
{
    public function index(){

        CommonController::checkNgotype(1);
        $mainNgoType = CommonController::changeView();

        if($mainNgoType== 'দেশিও'){
            return view('front.ngo_member_doc.index');
        }else{
            return view('front.foreign.ngo_member_doc.index');
        }



    }

    public function ngoMemberDocFinalUpdate(){

        $checkCompleteStatusData = DB::table('form_complete_statuses')->where('user_id',Auth::user()->id)->first();

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
                'ngo_member_nid_photo_status' => 1
                ]);


        }

        return redirect('/ngoAllRegistrationForm');

    }


    public function create(){


        return view('front.ngo_member_doc.create');


    }


    public function store(Request $request){

        $timeDy = time().date("Ymd");
        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $mainTime = $dt->format('H:i:s');
        $input = $request->all();


        $request->validate([
            'member_name.*' => 'required|string',
            'member_image.*' => 'required',
            'member_nid_copy.*' => 'required',
        ]);


        $conditionMainImage = $input['member_name'];
        $fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');

        foreach($conditionMainImage as $key => $allConditionMainImage){

            $fileSize = number_format($input['member_nid_copy'][$key]->getSize() / 1048576,2);

            $form= new NgoMemberNidPhoto();
            $filePath="NgoMemberNidPhoto";
            $file=$input['member_nid_copy'][$key];
            $file_image=$input['member_image'][$key];

            $form->member_image=CommonController::imageUpload($request,$file_image,$filePath);
            $form->member_nid_copy=CommonController::pdfUpload($request,$file,$filePath);
            $form->member_name=$input['member_name'][$key];
            $form->time_for_api = $mainTime;
            $form->fd_one_form_id = $fdOneFormId;
            $form->member_nid_copy_size =$fileSize;
            $form->save();
       }

       return redirect()->back()->with('success','Created Successfully');

    }


    public function update(Request $request,$id){


            $timeDy = time().date("Ymd");
            $form= NgoMemberNidPhoto::find($id);
            $filePath="NgoMemberNidPhoto";
            if ($request->hasfile('member_nid_copy')) {

                $file = $request->file('member_nid_copy');
                $fileSize = number_format($file->getSize() / 1048576,2);
                $form->member_nid_copy=CommonController::pdfUpload($request,$file,$filePath);
                $form->member_nid_copy_size =$fileSize;

            }
            if ($request->hasfile('member_image')) {

                $file1 = $request->file('member_image');
                $form->member_image =CommonController::imageUpload($request,$file1,$filePath);

            }

            $form->member_name=$request->member_name;
            $form->save();

            return redirect()->back()->with('info','Updated Successfully');


    }


    public function destroy($id)
    {

        $admins = NgoMemberNidPhoto::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }

    public function ngoMemberDocumentDownload($id){

        $getFileData = NgoMemberNidPhoto::where('id',$id)->value('member_nid_copy');

        $filePath = url('public/'.$getFileData);
        $filename  = pathinfo($filePath, PATHINFO_FILENAME);
        $file= public_path('/'). $getFileData;

        $headers = array(
                  'Content-Type: application/pdf',
                );

        return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
        ]);
    }
}
