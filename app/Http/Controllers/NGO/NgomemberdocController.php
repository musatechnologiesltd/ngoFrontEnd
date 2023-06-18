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
class NgomemberdocController extends Controller
{
    public function index(){



        return view('front.ngo_member_doc.index');

    }

    public function ngoMemberDocFinalUpdate(){

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
           'ngo_member_nid_photo_status' => 1
        ]);


   }
   return redirect('/ngoAllRegistrationForm');
    }


    public function create(){


        return view('front.ngo_member_doc.create');


    }


    public function store(Request $request){

        //dd($request->all());
        $time_dy = time().date("Ymd");
        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $main_time = $dt->format('H:i:s');
        $input = $request->all();


        $request->validate([
            'member_name.*' => 'required|string',
            'member_image.*' => 'required',
            'member_nid_copy.*' => 'required',
        ]);


        $condition_main_image = $input['member_name'];
        $fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');

        foreach($condition_main_image as $key => $all_condition_main_image){

            $file_size = number_format($input['member_nid_copy'][$key]->getSize() / 1048576,2);

            $form= new NgoMemberNidPhoto();

            $file=$input['member_nid_copy'][$key];
            $file_image=$input['member_image'][$key];

            $name=$time_dy.$file->getClientOriginalName();
            $name_image=$time_dy.$file_image->getClientOriginalName();

            $file->move('public/uploads/', $name);
            $file_image->move('public/uploads/', $name_image);

            $form->member_image='public/uploads/'.$name_image;
            $form->member_nid_copy='uploads/'.$name;
            $form->member_name=$input['member_name'][$key];
            $form->time_for_api = $main_time;
            $form->fd_one_form_id = $fdOneFormId;
            $form->member_nid_copy_size =$file_size;
            $form->save();
       }

       return redirect()->back()->with('success','Created Successfully');

    }


    public function update(Request $request,$id){


        $time_dy = time().date("Ymd");


            $form= NgoMemberNidPhoto::find($id);

            if ($request->hasfile('member_nid_copy')) {
                $file = $request->file('member_nid_copy');
                $file_size = number_format($file->getSize() / 1048576,2);
                $extension = $time_dy.$file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $form->member_nid_copy =  'uploads/'.$filename;
            $form->member_nid_copy_size =$file_size;

            }
            if ($request->hasfile('member_image')) {
                $file1 = $request->file('member_image');
              $extension1 = $time_dy.$file1->getClientOriginalName();
            $filename1 = $extension1;
            $file->move('public/uploads/', $filename1);
            $form->member_image =  'public/uploads/'.$filename1;

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

        $get_file_data = NgoMemberNidPhoto::where('id',$id)->value('member_nid_copy');

        $file_path = url('public/'.$get_file_data);
                                $filename  = pathinfo($file_path, PATHINFO_FILENAME);

        $file= public_path('/'). $get_file_data;

        $headers = array(
                  'Content-Type: application/pdf',
                );




        return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
        ]);
    }
}
