<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Response;
use App\Models\FormEight;
use App\Models\FdFiveForm;
use App\Models\FdOneForm;
use App\Models\NgoMemberList;
use App\Models\NgoOtherDoc;
use App\Models\NameChangeDoc;
use App\Models\NgoMemberNidPhoto;
use App\Models\NgoRenewInfo;
use Auth;
use App;
use Session;
use DateTime;
use DateTimezone;
use App\Models\NgoNameChange;
use App\Models\DocumentForAmendmentOrApprovalOfConstitution;
use Illuminate\Support\Str;
use App\Http\Controllers\NGO\CommonController;
class FdFiveFormController extends Controller
{
    public function index(){

        $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)
        ->value('ngo_type');

        $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fdFiveForm =  FdFiveForm::where('fdId',$ngoListAll->id)->latest()->get();

        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();


        return view('front.fdFiveForm.index',compact('ngoListAll','fdFiveForm'));

    }


    public function create(){

        $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)
        ->value('ngo_type');

        $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fdFiveForm =  FdFiveForm::where('fdId',$ngoListAll->id)->latest()->get();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngoListAll->id)
        ->value('web_site_name');
        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();


        return view('front.fdFiveForm.create',compact('renewWebsiteName','ngoListAll','fdFiveForm'));
    }



    public function store(Request $request){

        $request->validate([

            'file_one' => 'required|file',

        ]);


      try{
        DB::beginTransaction();
         $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
         $fd9FormInfo = new FdFiveForm();
         $fd9FormInfo->status = 'Ongoing';
         $fd9FormInfo->fdId = $ngo_list_all->id;

         if ($request->hasfile('file_one')) {
            $filePath="FdFiveForm";
            $file = $request->file('file_one');
            $fd9FormInfo->file_one =CommonController::pdfUpload($request,$file,$filePath);

        }

         $fd9FormInfo->save();

    DB::commit();
       return redirect()->route('fdFiveForm.index')->with('success','Created Successfully');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect('/')->with('error','some thing went wrong ,this is why you redirect to dashboard');
    }
    }




    public function edit($id){

        $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)
        ->value('ngo_type');

        $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fdFiveForm =  FdFiveForm::where('id',$id)->first();

        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();

        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngoListAll->id)
        ->value('web_site_name');
        return view('front.fdFiveForm.edit',compact('renewWebsiteName','ngoListAll','fdFiveForm'));
    }


    public function update(Request $request,$id){




      try{
        DB::beginTransaction();
         $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
         $fd9FormInfo = FdFiveForm::find($id);

         $fd9FormInfo->fdId = $ngo_list_all->id;

         if ($request->hasfile('file_one')) {
            $filePath="FdFiveForm";
            $file = $request->file('file_one');
            $fd9FormInfo->file_one =CommonController::pdfUpload($request,$file,$filePath);

        }

         $fd9FormInfo->save();

    DB::commit();
       return redirect()->route('fdFiveForm.index')->with('success','Updated Successfully');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect('/')->with('error','some thing went wrong ,this is why you redirect to dashboard');
    }
    }



    public function show($id){

        $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)
        ->value('ngo_type');

        $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fdFiveFormPdf =  FdFiveForm::where('id',$id)->first();

        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();


        return view('front.fdFiveForm.view',compact('ngoListAll','fdFiveFormPdf'));
    }



    public function fdFiveFormPdf($id){



            $form_one_data = DB::table('fd_five_forms')->where('id',$id)->value('file_one');



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


    public function destroy($id){
        try{
            DB::beginTransaction();
        $admins = FdFiveForm::find($id);
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
}
