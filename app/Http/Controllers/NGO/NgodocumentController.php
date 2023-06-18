<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use Response;
use App\Models\NgoOtherDoc;
use DateTime;
use DateTimezone;
class NgodocumentController extends Controller
{
    public function index(){



        return view('front.ngo_doc.index');

    }


    public function create(){

        return view('front.ngo_doc.create');

    }


    public function store(Request $request){
        $time_dy = time().date("Ymd");
        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $main_time = $dt->format('H:i:s a');

        $request->validate([
            'pdf_file_list.*'=>'required|mimes:pdf',

        ]);



        $input = $request->all();


        $condition_main_image = $input['pdf_file_list'];
        $fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');
        foreach($condition_main_image as $key => $all_condition_main_image){

            $file_size = number_format($input['pdf_file_list'][$key]->getSize() / 1048576,2);

            $form= new NgoOtherDoc();
            $file=$input['pdf_file_list'][$key];
            $name=$time_dy.$file->getClientOriginalName();
            $file->move('public/uploads/', $name);
            $form->pdf_file_list='uploads/'.$name;
            $form->time_for_api = $main_time;
            $form->fd_one_form_id = $fdOneFormId;
            $form->file_size =$file_size;
            $form->save();
       }




         return redirect()->back()->with('success','Created Successfully');


    }


    public function ngoDocumentDownload($id){

        $get_file_data = NgoOtherDoc::where('id',$id)->value('pdf_file_list');

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


    public function destroy($id)
    {

        $admins = NgoOtherDoc::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }


    public function update(Request $request,$id){
        $time_dy = time().date("Ymd");

        $updateOtherPdf =NgoOtherDoc::find($id);
        $updateOtherPdf->fd_one_form_id = $fdOneFormId;
      if ($request->hasfile('pdf_file_list')) {
        $file_size = number_format($request->pdf_file_list->getSize() / 1048576,2);
            $file = $request->file('pdf_file_list');
            $extension = $time_dy.$file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $updateOtherPdf->pdf_file_list =  'uploads/'.$filename;
            $updateOtherPdf->file_size =$file_size;

        }

        $updateOtherPdf->save();


        return redirect()->back()->with('success','Created Successfully');


    }
}
