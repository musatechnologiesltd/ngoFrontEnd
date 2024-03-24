<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fd6Form;
use App\Models\Fd6FormProkolpoArea;
use App\Models\NVisa;
use App\Models\Fd2Form;
use App\Models\Fd2FormOtherInfo;
use App\Models\NgoStatus;
use App\Models\Country;
use App\Models\Fd9Form;
use App\Models\NgoDuration;
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
use App\Models\Fd7Form;
use App\Models\Fd7FormProkolpoArea;
use App\Models\NgoRenewInfo;
use App\Models\Fd2FormForFd7Form;
use App\Models\Fd2Fd7OtherInfo;
use Illuminate\Support\Facades\App;
class Fd7FormController extends Controller
{
    public function index(){

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fd7FormList = Fd7Form::where('fd_one_form_id',$ngo_list_all->id)->latest()->get();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id) ->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();

        return view('front.fd7Form.index',compact('ngoDurationLastEx','ngoDurationReg','ngo_list_all','fd7FormList'));
    }


    public function create(){

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();

        return view('front.fd7Form.create',compact('divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

    }

    public function edit($id){

        $fd6Id = base64_decode($id);

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
        $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')->groupBy('city_orporation')->select('city_orporation')->get();
        $fd7FormList = Fd7Form::where('fd_one_form_id',$ngo_list_all->id)->where('id',$fd6Id)->latest()->first();
        $prokolpoAreaList = Fd7FormProkolpoArea::where('fd7_form_id',$fd6Id)->latest()->get();

        return view('front.fd7Form.edit',compact('cityCorporationList','districtList','prokolpoAreaList','fd7FormList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

    }

    public function store(Request $request){

        $request->validate([

            'ngo_name' => 'required|string',
            'ngo_address' => 'required|string',
            'ngo_registration_number' => 'required|string',
            'ngo_registration_date' => 'required|string',
            'ngo_prokolpo_name' => 'required|string',
            'donor_organization_description' => 'required|string',
            'donor_organization_chief_type' => 'required|string',
            'donor_organization_chief_name' => 'required|string',
            'donor_organization_name' => 'required|string',
            'donor_organization_address' => 'required|string',
            'donor_organization_phone' => 'required|string',
            'donor_organization_email' => 'required|string',
            'donor_organization_website' => 'required|string',
            'ongoing_prokolpo_name' => 'required|string',
            'total_prokolpo_cost' => 'required|string',
            'date_of_bureau_approval' => 'required|string',
            'percentage_of_the_original_project' => 'required|string',
            'adverse_impact_on_the_ongoing_project' => 'required|string',
            'ngo_prokolpo_start_date' => 'required|string',
            'ngo_prokolpo_end_date' => 'required|string',
            'bureau_approval_pdf' => 'required|file',
            'letter_from_donor_agency_pdf' => 'required|file',
            'relief_assistance_project_proposal_pdf' => 'required|file',

        ]);

       try{

            DB::beginTransaction();
            $fdOneFormID = FdOneForm::where('user_id',Auth::user()->id)->first();
            $fd7FormInfo = new Fd7Form();
            $fd7FormInfo->fd_one_form_id =$fdOneFormID->id;
            $fd7FormInfo->ngo_name =$request->ngo_name;
            $fd7FormInfo->ngo_address =$request->ngo_address;
            $fd7FormInfo->ngo_registration_number =$request->ngo_registration_number;
            $fd7FormInfo->ngo_registration_date =$request->ngo_registration_date;
            $fd7FormInfo->ngo_prokolpo_name =$request->ngo_prokolpo_name;
            $fd7FormInfo->donor_organization_description =$request->donor_organization_description;
            $fd7FormInfo->donor_organization_chief_type =$request->donor_organization_chief_type;
            $fd7FormInfo->donor_organization_chief_name =$request->donor_organization_chief_name;
            $fd7FormInfo->donor_organization_chief_name =$request->donor_organization_chief_name;
            $fd7FormInfo->donor_organization_address =$request->donor_organization_address;
            $fd7FormInfo->donor_organization_name =$request->donor_organization_name;
            $fd7FormInfo->donor_organization_phone =$request->donor_organization_phone;
            $fd7FormInfo->donor_organization_email =$request->donor_organization_email;
            $fd7FormInfo->donor_organization_website =$request->donor_organization_website;
            $fd7FormInfo->ongoing_prokolpo_name =$request->ongoing_prokolpo_name;
            $fd7FormInfo->total_prokolpo_cost =$request->total_prokolpo_cost;
            $fd7FormInfo->date_of_bureau_approval =$request->date_of_bureau_approval;
            $fd7FormInfo->percentage_of_the_original_project =$request->percentage_of_the_original_project;
            $fd7FormInfo->adverse_impact_on_the_ongoing_project =$request->adverse_impact_on_the_ongoing_project;
            $fd7FormInfo->ngo_prokolpo_start_date =$request->ngo_prokolpo_start_date;
            $fd7FormInfo->ngo_prokolpo_end_date =$request->ngo_prokolpo_end_date;
            $fd7FormInfo->status ='Ongoing';

            $filePath="FdSevenForm";

            if ($request->hasfile('bureau_approval_pdf')) {

                $file = $request->file('bureau_approval_pdf');

                $fd7FormInfo->bureau_approval_pdf =CommonController::pdfUpload($request,$file,$filePath);

            }


            if ($request->hasfile('letter_from_donor_agency_pdf')) {

                $file = $request->file('letter_from_donor_agency_pdf');

                $fd7FormInfo->letter_from_donor_agency_pdf =CommonController::pdfUpload($request,$file,$filePath);

            }


            if ($request->hasfile('relief_assistance_project_proposal_pdf')) {

                $file = $request->file('relief_assistance_project_proposal_pdf');

                $fd7FormInfo->relief_assistance_project_proposal_pdf =CommonController::pdfUpload($request,$file,$filePath);

            }


            $fd7FormInfo->save();



            $input = $request->all();

            $divisionName = $input['division_name'];


            $fd7FormInfoId = $fd7FormInfo->id;



            foreach($divisionName as $key => $divisionName){
                $form= new Fd7FormProkolpoArea();
                $form->fd7_form_id=$fd7FormInfoId;
                $form->division_name=$input['division_name'][$key];
                $form->district_name=$input['district_name'][$key];
                $form->city_corparation_name=$input['city_corparation_name'][$key];

                if(empty($input['upozila_name'][$key])){


                }else{

                    $form->upozila_name=$input['upozila_name'][$key];
                }


                if(empty($input['thana_name'][$key])){


                }else{

                    $form->thana_name=$input['thana_name'][$key];
                }



                if(empty($input['municipality_name'][$key])){


                }else{

                    $form->municipality_name=$input['municipality_name'][$key];
                }



                if(empty($input['ward_name'][$key])){


                }else{

                    $form->ward_name=$input['ward_name'][$key];
                }



                if(empty($input['allocated_budget'][$key])){


                }else{

                    $form->allocated_budget=$input['allocated_budget'][$key];
                }



                if(empty($input['number_of_beneficiaries'][$key])){


                }else{

                    $form->number_of_beneficiaries=$input['number_of_beneficiaries'][$key];
                }

                $form->save();
            }

            DB::commit();
            return redirect()->route('addFd2DetailForFd7',base64_encode($fd7FormInfoId))->with('success','Added Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/')->with('error','some thing went wrong ,this is why you redirect to dashboard');
        }

    }


    public function update(Request $request,$id){

           try{
            DB::beginTransaction();
            $fd7FormInfo = Fd7Form::find($id);
            $fd7FormInfo->ngo_name =$request->ngo_name;
            $fd7FormInfo->ngo_address =$request->ngo_address;
            $fd7FormInfo->ngo_registration_number =$request->ngo_registration_number;
            $fd7FormInfo->ngo_registration_date =$request->ngo_registration_date;
            $fd7FormInfo->ngo_prokolpo_name =$request->ngo_prokolpo_name;
            $fd7FormInfo->donor_organization_description =$request->donor_organization_description;
            $fd7FormInfo->donor_organization_chief_type =$request->donor_organization_chief_type;
            $fd7FormInfo->donor_organization_chief_name =$request->donor_organization_chief_name;
            $fd7FormInfo->donor_organization_address =$request->donor_organization_address;
            $fd7FormInfo->donor_organization_name =$request->donor_organization_name;
            $fd7FormInfo->donor_organization_phone =$request->donor_organization_phone;
            $fd7FormInfo->donor_organization_email =$request->donor_organization_email;
            $fd7FormInfo->donor_organization_website =$request->donor_organization_website;
            $fd7FormInfo->ongoing_prokolpo_name =$request->ongoing_prokolpo_name;
            $fd7FormInfo->total_prokolpo_cost =$request->total_prokolpo_cost;
            $fd7FormInfo->date_of_bureau_approval =$request->date_of_bureau_approval;
            $fd7FormInfo->percentage_of_the_original_project =$request->percentage_of_the_original_project;
            $fd7FormInfo->adverse_impact_on_the_ongoing_project =$request->adverse_impact_on_the_ongoing_project;
            $fd7FormInfo->ngo_prokolpo_start_date =$request->ngo_prokolpo_start_date;
            $fd7FormInfo->ngo_prokolpo_end_date =$request->ngo_prokolpo_end_date;

            $filePath="FdSevenForm";

            if ($request->hasfile('bureau_approval_pdf')) {

                $file = $request->file('bureau_approval_pdf');

                $fd7FormInfo->bureau_approval_pdf =CommonController::pdfUpload($request,$file,$filePath);

            }


            if ($request->hasfile('letter_from_donor_agency_pdf')) {

                $file = $request->file('letter_from_donor_agency_pdf');

                $fd7FormInfo->letter_from_donor_agency_pdf =CommonController::pdfUpload($request,$file,$filePath);

            }


            if ($request->hasfile('relief_assistance_project_proposal_pdf')) {

                $file = $request->file('relief_assistance_project_proposal_pdf');

                $fd7FormInfo->relief_assistance_project_proposal_pdf =CommonController::pdfUpload($request,$file,$filePath);

            }

            $fd7FormInfo->save();

            $input = $request->all();

            $divisionName = $input['division_name'];


            $fd7FormInfoId = $fd7FormInfo->id;

            Fd7FormProkolpoArea::where('fd7_form_id',$fd7FormInfoId)->delete();

            foreach($divisionName as $key => $divisionName){
                $form= new Fd7FormProkolpoArea();
                $form->fd7_form_id=$fd7FormInfoId;
                $form->division_name=$input['division_name'][$key];
                $form->district_name=$input['district_name'][$key];
                $form->city_corparation_name=$input['city_corparation_name'][$key];

                if(empty($input['upozila_name'][$key])){


                }else{

                    $form->upozila_name=$input['upozila_name'][$key];
                }


                if(empty($input['thana_name'][$key])){


                }else{

                    $form->thana_name=$input['thana_name'][$key];
                }



                if(empty($input['municipality_name'][$key])){


                }else{

                    $form->municipality_name=$input['municipality_name'][$key];
                }



                if(empty($input['ward_name'][$key])){


                }else{

                    $form->ward_name=$input['ward_name'][$key];
                }



                if(empty($input['allocated_budget'][$key])){


                }else{

                    $form->allocated_budget=$input['allocated_budget'][$key];
                }



                if(empty($input['number_of_beneficiaries'][$key])){


                }else{

                    $form->number_of_beneficiaries=$input['number_of_beneficiaries'][$key];
                }




                $form->save();
            }

            DB::commit();
            return redirect()->route('editFd2DetailForFd7',base64_encode($fd7FormInfoId))->with('success','Updated Successfuly');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/')->with('error','some thing went wrong ,this is why you redirect to dashboard');
        }
    }


    public function destroy($id){

        $admins = Fd7Form::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }
        return back()->with('error','Deleted successfully!');
    }




    public function show($id){

        $fd7Id = base64_decode($id);

       $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
       $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
       $fd2FormList = Fd2FormForFd7Form::where('fd_one_form_id',$ngo_list_all->id)->where('fd7_form_id',$fd7Id)->latest()->first();
       $fd2OtherInfo = Fd2Fd7OtherInfo::where('fd2_form_for_fd7_form_id',$fd2FormList->id)->latest()->get();
       $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
       $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
       $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
       $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
       $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')->groupBy('city_orporation')->select('city_orporation')->get();
       $fd7FormList = Fd7Form::where('fd_one_form_id',$ngo_list_all->id)->where('id',$fd7Id)->latest()->first();
       $prokolpoAreaList = Fd7FormProkolpoArea::where('fd7_form_id',$fd7Id)->latest()->get();

       return view('front.fd7Form.view',compact('fd2OtherInfo','fd2FormList','cityCorporationList','districtList','prokolpoAreaList','fd7FormList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

   }

   public function reliefAssistanceProjectProposalPdf($id){

    $get_file_data = Fd7Form::where('id',$id)->value('relief_assistance_project_proposal_pdf');

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


   public function authorizationLetter($id){

    $get_file_data = Fd7Form::where('id',$id)->value('bureau_approval_pdf');

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

   public function letterFromDonorAgency($id){

    $get_file_data = Fd7Form::where('id',$id)->value('letter_from_donor_agency_pdf');

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
