<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ngo_type_and_language;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use App\Models\NgoMemberNidPhoto;
use Response;
use DateTime;
use DateTimezone;
class NgomemberdocController extends Controller
{
    public function index(){

        $all_ngo_member_doc = NgoMemberNidPhoto::where('user_id',Auth::user()->id)->latest()->get();

        if(count($all_ngo_member_doc) == 0){

            return redirect('/ngoMemberDocument/create');

        }else{

        return view('front.ngo_member_doc.index',compact('all_ngo_member_doc'));
        }
    }


    public function create(){


        return view('front.ngo_member_doc.create');


    }


    public function store(Request $request){
        $time_dy = time().date("Ymd");
        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $main_time = $dt->format('H:i:s');
        $input = $request->all();


        $request->validate([
            'person_name.*' => 'required|string',
            'person_image.*' => 'required',
            'person_nid_copy.*' => 'required',
        ]);


        $condition_main_image = $input['person_name'];


        foreach($condition_main_image as $key => $all_condition_main_image){

            $file_size = number_format($input['person_nid_copy'][$key]->getSize() / 1048576,2);

            $form= new NgoMemberNidPhoto();

            $file=$input['person_nid_copy'][$key];
            $file_image=$input['person_image'][$key];

            $name=$time_dy.$file->getClientOriginalName();
            $name_image=$time_dy.$file_image->getClientOriginalName();

            $file->move('public/uploads/', $name);
            $file_image->move('public/uploads/', $name_image);

            $form->person_image='public/uploads/'.$name_image;
            $form->person_nid_copy='uploads/'.$name;
            $form->person_name=$input['person_name'][$key];
            $form->time_for_api = $main_time;
            $form->user_id = Auth::user()->id;
            $form->person_nid_copy_size =$file_size;
            $form->save();
       }

       return redirect('/ngoMemberDocument')->with('success','Created Successfully');

    }


    public function update(Request $request,$id){


        $time_dy = time().date("Ymd");


            $form= NgoMemberNidPhoto::find($id);

            if ($request->hasfile('person_nid_copy')) {
                $file = $request->file('person_nid_copy');
                $file_size = number_format($file->getSize() / 1048576,2);
                $extension = $time_dy.$file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $form->person_nid_copy =  'uploads/'.$filename;
            $form->person_nid_copy_size =$file_size;

            }
            if ($request->hasfile('person_image')) {
                $file1 = $request->file('person_image');
              $extension1 = $time_dy.$file1->getClientOriginalName();
            $filename1 = $extension1;
            $file->move('public/uploads/', $filename1);
            $form->person_image =  'public/uploads/'.$filename1;

            }
            $form->person_name=$request->person_name;
            $form->user_id = Auth::user()->id;

            $form->save();

            return redirect('/ngoMemberDocument')->with('info','Updated Successfully');


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

        $get_file_data = NgoMemberNidPhoto::where('id',$id)->value('person_nid_copy');

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
