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

use App\Models\NgoRenewInfo;
use Illuminate\Support\Facades\App;
class Fd6FormController extends Controller
{
    public function index(){
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fd6FormList = Fd6Form::where('fd_one_form_id',$ngo_list_all->id)->latest()->get();



        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)
        ->value('ngo_duration_start_date');


        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)
                               ->orderBy('id','desc')->first();

        return view('front.fd6Form.index',compact('ngoDurationLastEx','ngoDurationReg','ngo_list_all','fd6FormList'));
    }



    public function create(){
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)
        ->value('ngo_duration_start_date');


        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)
                               ->orderBy('id','desc')->first();


                               $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)
                               ->value('web_site_name');


            $divisionList = DB::table('civilinfos')->groupBy('division_bn')
            ->select('division_bn')->get();

            //dd($districtList);

        return view('front.fd6Form.create',compact('divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

    }


    public function getDistrictList(Request $request){


        $divisionList = $request->getMainValue;

        $districtList = DB::table('civilinfos')->where('division_bn',$divisionList)->groupBy('district_bn')
            ->select('district_bn')->get();

            $data = view('front.fd6Form.get_district_from_division',compact('districtList'))->render();
            return response()->json($data);


    }


    public function getCityCorporationList(Request $request){


        $divisionList = $request->getMainValue;

        $cityCorporationList = DB::table('civilinfos')->where('division_bn',$divisionList)->whereNotNull('city_orporation')->groupBy('city_orporation')
            ->select('city_orporation')->get();

            $data = view('front.fd6Form.getCityCorporationList',compact('cityCorporationList'))->render();
            return response()->json($data);



    }




    public function store(Request $request){

        //dd($request->all());




        $request->validate([
            'ngo_name' => 'required|string',
            'ngo_registration_date' => 'required|string',
            'ngo_last_renew_date' => 'required|string',
            'ngo_expiration_date' => 'required|string',
            'ngo_address' => 'required|string',
            'ngo_telephone_number' => 'required|string',
            'ngo_mobile_number' => 'required|string',
            'ngo_email_address' => 'required|string',
            'ngo_website' => 'required|string',
            'ngo_prokolpo_name' => 'required|string',
            'ngo_prokolpo_duration' => 'required|string',
            'ngo_prokolpo_start_date' => 'required|string',
            'ngo_prokolpo_end_date' => 'required|string',

            'donor_organization_name' => 'required|string',
            'donor_organization_address' => 'required|string',
            'donor_organization_phone_mobile_email' => 'required|string',
            'donor_organization_website' => 'required|string',
            'money_laundering_and_terrorist_financing' => 'required|string',
            'project_cost' => 'required|string',
            'project_cost_ratio' => 'required|string',
            'administrative_cost' => 'required|string',
            'administrative_ratio' => 'required|string',
            'project_and_administrative_cost' => 'required|string',
            'project_and_administrative_cost_ratio' => 'required|string',
            'project_name' => 'required|string',
            'duration_of_project' => 'required|string',

            'total_allocation_of_project' => 'required|string',
            'total_allocation_in_project_area' => 'required|string',
            'total_beneficiaries' => 'required|string',
            'donor_organization_name_two' => 'required|string',
            'project_proposal_form' => 'required|file',

        ]);

        $fdOneFormID = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fd6FormInfo = new Fd6Form();
        $fd6FormInfo->fd_one_form_id =$fdOneFormID->id;
        $fd6FormInfo->ngo_name =$request->ngo_name;
        $fd6FormInfo->status ='Ongoing';
        $fd6FormInfo->ngo_registration_date =$request->ngo_registration_date;
        $fd6FormInfo->ngo_last_renew_date =$request->ngo_last_renew_date;
        $fd6FormInfo->ngo_expiration_date =$request->ngo_expiration_date;
        $fd6FormInfo->ngo_address =$request->ngo_address;
        $fd6FormInfo->ngo_telephone_number =$request->ngo_telephone_number;
        $fd6FormInfo->ngo_mobile_number =$request->ngo_mobile_number;
        $fd6FormInfo->ngo_email_address =$request->ngo_email_address;
        $fd6FormInfo->ngo_website =$request->ngo_website;
        $fd6FormInfo->ngo_prokolpo_name =$request->ngo_prokolpo_name;
        $fd6FormInfo->ngo_prokolpo_duration =$request->ngo_prokolpo_duration;
        $fd6FormInfo->ngo_prokolpo_start_date =$request->ngo_prokolpo_start_date;
        $fd6FormInfo->ngo_prokolpo_end_date =$request->ngo_prokolpo_end_date;
        $fd6FormInfo->grants_received_from_abroad_first_year =$request->grants_received_from_abroad_first_year;
        $fd6FormInfo->grants_received_from_abroad_second_year =$request->grants_received_from_abroad_second_year;
        $fd6FormInfo->grants_received_from_abroad_third_year =$request->grants_received_from_abroad_third_year;
        $fd6FormInfo->grants_received_from_abroad_fourth_year =$request->grants_received_from_abroad_fourth_year;
        $fd6FormInfo->grants_received_from_abroad_fifth_year =$request->grants_received_from_abroad_fifth_year;
        $fd6FormInfo->grants_received_from_abroad_total =$request->grants_received_from_abroad_total;
        $fd6FormInfo->grants_received_from_abroad_comment =$request->grants_received_from_abroad_comment;
        $fd6FormInfo->donations_made_by_foreign_donors_first_year =$request->donations_made_by_foreign_donors_first_year;
        $fd6FormInfo->donations_made_by_foreign_donors_second_year =$request->donations_made_by_foreign_donors_second_year;
        $fd6FormInfo->donations_made_by_foreign_donors_third_year =$request->donations_made_by_foreign_donors_third_year;
        $fd6FormInfo->donations_made_by_foreign_donors_fourth_year =$request->donations_made_by_foreign_donors_fourth_year;
        $fd6FormInfo->donations_made_by_foreign_donors_fifth_year =$request->donations_made_by_foreign_donors_fifth_year;
        $fd6FormInfo->donations_made_by_foreign_donors_total =$request->donations_made_by_foreign_donors_total;
        $fd6FormInfo->donations_made_by_foreign_donors_comment =$request->donations_made_by_foreign_donors_comment;
        $fd6FormInfo->local_grants_first_year =$request->local_grants_first_year;
        $fd6FormInfo->local_grants_second_year =$request->local_grants_second_year;
        $fd6FormInfo->local_grants_third_year =$request->local_grants_third_year;
        $fd6FormInfo->local_grants_fourth_year =$request->local_grants_fourth_year;
        $fd6FormInfo->local_grants_fifth_year =$request->local_grants_fifth_year;
        $fd6FormInfo->local_grants_donors_total =$request->local_grants_donors_total;
        $fd6FormInfo->local_grants_donors_comment =$request->local_grants_donors_comment;

        $fd6FormInfo->total_first_year =$request->total_first_year;
        $fd6FormInfo->total_second_year =$request->total_second_year;
        $fd6FormInfo->total_third_year =$request->total_third_year;
        $fd6FormInfo->total_fourth_year =$request->total_fourth_year;
        $fd6FormInfo->total_fifth_year =$request->total_fifth_year;
        $fd6FormInfo->total_donors_total =$request->total_donors_total;

        $fd6FormInfo->total_donors_comment =$request->total_donors_comment;
        $fd6FormInfo->donor_organization_name =$request->donor_organization_name;
        $fd6FormInfo->donor_organization_address =$request->donor_organization_address;
        $fd6FormInfo->donor_organization_phone_mobile_email =$request->donor_organization_phone_mobile_email;
        $fd6FormInfo->donor_organization_website =$request->donor_organization_website;
        $fd6FormInfo->money_laundering_and_terrorist_financing =$request->money_laundering_and_terrorist_financing;
        $fd6FormInfo->project_cost =$request->project_cost;
        $fd6FormInfo->project_cost_ratio =$request->project_cost_ratio;
        $fd6FormInfo->administrative_cost =$request->administrative_cost;
        $fd6FormInfo->administrative_ratio =$request->administrative_ratio;
        $fd6FormInfo->project_and_administrative_cost =$request->project_and_administrative_cost;

        $fd6FormInfo->project_and_administrative_cost_ratio =$request->project_and_administrative_cost_ratio;
        $fd6FormInfo->project_name =$request->project_name;
        $fd6FormInfo->duration_of_project =$request->duration_of_project;
        $fd6FormInfo->total_allocation_of_project =$request->total_allocation_of_project;
        $fd6FormInfo->total_allocation_in_project_area =$request->total_allocation_in_project_area;
        $fd6FormInfo->total_beneficiaries =$request->total_beneficiaries;
        $fd6FormInfo->total_population_in_project_area =$request->total_population_in_project_area;
        $fd6FormInfo->donor_organization_name_two =$request->donor_organization_name_two;
        if ($request->hasfile('project_proposal_form')) {
            $filePath="FdSixForm";
            $file = $request->file('project_proposal_form');

            $fd6FormInfo->project_proposal_form =CommonController::pdfUpload($request,$file,$filePath);

        }


          $fd6FormInfo->save();



          $input = $request->all();

          $divisionName = $input['division_name'];


          $fd6FormInfoId = $fd6FormInfo->id;



          foreach($divisionName as $key => $divisionName){
            $form= new Fd6FormProkolpoArea();
            $form->fd6_form_id=$fd6FormInfoId;
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








            $form->save();
   }





        return redirect()->route('addFd2Detail',base64_encode($fd6FormInfoId))->with('success','Added Successfuly');


    }



    public function edit($id){
        $fd6Id = base64_decode($id);

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)
        ->value('ngo_duration_start_date');


        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)
                               ->orderBy('id','desc')->first();


                               $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)
                               ->value('web_site_name');


            $divisionList = DB::table('civilinfos')->groupBy('division_bn')
            ->select('division_bn')->get();

            $districtList = DB::table('civilinfos')->groupBy('district_bn')
            ->select('district_bn')->get();

            $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')->groupBy('city_orporation')
            ->select('city_orporation')->get();

            //dd($districtList);
            $fd6FormList = Fd6Form::where('fd_one_form_id',$ngo_list_all->id)
            ->where('id',$fd6Id)->latest()->first();

            $prokolpoAreaList = Fd6FormProkolpoArea::where('fd6_form_id',$fd6Id)->latest()->get();
        return view('front.fd6Form.edit',compact('cityCorporationList','districtList','prokolpoAreaList','fd6FormList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

    }


    public function update(Request $request,$id){


        $fd6FormInfo = Fd6Form::find($id);

        $fd6FormInfo->ngo_name =$request->ngo_name;

        $fd6FormInfo->ngo_registration_date =$request->ngo_registration_date;
        $fd6FormInfo->ngo_last_renew_date =$request->ngo_last_renew_date;
        $fd6FormInfo->ngo_expiration_date =$request->ngo_expiration_date;
        $fd6FormInfo->ngo_address =$request->ngo_address;
        $fd6FormInfo->ngo_telephone_number =$request->ngo_telephone_number;
        $fd6FormInfo->ngo_mobile_number =$request->ngo_mobile_number;
        $fd6FormInfo->ngo_email_address =$request->ngo_email_address;
        $fd6FormInfo->ngo_website =$request->ngo_website;
        $fd6FormInfo->ngo_prokolpo_name =$request->ngo_prokolpo_name;
        $fd6FormInfo->ngo_prokolpo_duration =$request->ngo_prokolpo_duration;
        $fd6FormInfo->ngo_prokolpo_start_date =$request->ngo_prokolpo_start_date;
        $fd6FormInfo->ngo_prokolpo_end_date =$request->ngo_prokolpo_end_date;
        $fd6FormInfo->grants_received_from_abroad_first_year =$request->grants_received_from_abroad_first_year;
        $fd6FormInfo->grants_received_from_abroad_second_year =$request->grants_received_from_abroad_second_year;
        $fd6FormInfo->grants_received_from_abroad_third_year =$request->grants_received_from_abroad_third_year;
        $fd6FormInfo->grants_received_from_abroad_fourth_year =$request->grants_received_from_abroad_fourth_year;
        $fd6FormInfo->grants_received_from_abroad_fifth_year =$request->grants_received_from_abroad_fifth_year;
        $fd6FormInfo->grants_received_from_abroad_total =$request->grants_received_from_abroad_total;
        $fd6FormInfo->grants_received_from_abroad_comment =$request->grants_received_from_abroad_comment;
        $fd6FormInfo->donations_made_by_foreign_donors_first_year =$request->donations_made_by_foreign_donors_first_year;
        $fd6FormInfo->donations_made_by_foreign_donors_second_year =$request->donations_made_by_foreign_donors_second_year;
        $fd6FormInfo->donations_made_by_foreign_donors_third_year =$request->donations_made_by_foreign_donors_third_year;
        $fd6FormInfo->donations_made_by_foreign_donors_fourth_year =$request->donations_made_by_foreign_donors_fourth_year;
        $fd6FormInfo->donations_made_by_foreign_donors_fifth_year =$request->donations_made_by_foreign_donors_fifth_year;
        $fd6FormInfo->donations_made_by_foreign_donors_total =$request->donations_made_by_foreign_donors_total;
        $fd6FormInfo->donations_made_by_foreign_donors_comment =$request->donations_made_by_foreign_donors_comment;
        $fd6FormInfo->local_grants_first_year =$request->local_grants_first_year;
        $fd6FormInfo->local_grants_second_year =$request->local_grants_second_year;
        $fd6FormInfo->local_grants_third_year =$request->local_grants_third_year;
        $fd6FormInfo->local_grants_fourth_year =$request->local_grants_fourth_year;
        $fd6FormInfo->local_grants_fifth_year =$request->local_grants_fifth_year;
        $fd6FormInfo->local_grants_donors_total =$request->local_grants_donors_total;
        $fd6FormInfo->local_grants_donors_comment =$request->local_grants_donors_comment;

        $fd6FormInfo->total_first_year =$request->total_first_year;
        $fd6FormInfo->total_second_year =$request->total_second_year;
        $fd6FormInfo->total_third_year =$request->total_third_year;
        $fd6FormInfo->total_fourth_year =$request->total_fourth_year;
        $fd6FormInfo->total_fifth_year =$request->total_fifth_year;
        $fd6FormInfo->total_donors_total =$request->total_donors_total;

        $fd6FormInfo->total_donors_comment =$request->total_donors_comment;
        $fd6FormInfo->donor_organization_name =$request->donor_organization_name;
        $fd6FormInfo->donor_organization_address =$request->donor_organization_address;
        $fd6FormInfo->donor_organization_phone_mobile_email =$request->donor_organization_phone_mobile_email;
        $fd6FormInfo->donor_organization_website =$request->donor_organization_website;
        $fd6FormInfo->money_laundering_and_terrorist_financing =$request->money_laundering_and_terrorist_financing;
        $fd6FormInfo->project_cost =$request->project_cost;
        $fd6FormInfo->project_cost_ratio =$request->project_cost_ratio;
        $fd6FormInfo->administrative_cost =$request->administrative_cost;
        $fd6FormInfo->administrative_ratio =$request->administrative_ratio;
        $fd6FormInfo->project_and_administrative_cost =$request->project_and_administrative_cost;

        $fd6FormInfo->project_and_administrative_cost_ratio =$request->project_and_administrative_cost_ratio;
        $fd6FormInfo->project_name =$request->project_name;
        $fd6FormInfo->duration_of_project =$request->duration_of_project;
        $fd6FormInfo->total_allocation_of_project =$request->total_allocation_of_project;
        $fd6FormInfo->total_allocation_in_project_area =$request->total_allocation_in_project_area;
        $fd6FormInfo->total_beneficiaries =$request->total_beneficiaries;
        $fd6FormInfo->total_population_in_project_area =$request->total_population_in_project_area;
        $fd6FormInfo->donor_organization_name_two =$request->donor_organization_name_two;
        if ($request->hasfile('project_proposal_form')) {
            $filePath="FdSixForm";
            $file = $request->file('project_proposal_form');

            $fd6FormInfo->project_proposal_form =CommonController::pdfUpload($request,$file,$filePath);

        }


          $fd6FormInfo->save();



          $input = $request->all();

          $divisionName = $input['division_name'];


          $fd6FormInfoId = $fd6FormInfo->id;


          Fd6FormProkolpoArea::where('fd6_form_id',$fd6FormInfoId)->delete();



          foreach($divisionName as $key => $divisionName){
            $form= new Fd6FormProkolpoArea();
            $form->fd6_form_id=$fd6FormInfoId;
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








            $form->save();
   }





        return redirect()->route('fd2Form.edit',base64_encode($fd6FormInfoId))->with('success','Updated Successfuly');

    }



    public function show($id){
         $fd6Id = base64_decode($id);

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)
        ->value('ngo_duration_start_date');

        $fd2FormList = Fd2Form::where('fd_one_form_id',$ngo_list_all->id)
        ->where('fd_six_form_id',$id)->latest()->first();

        $fd2OtherInfo = Fd2FormOtherInfo::where('fd2_form_id',$fd2FormList->id)->latest()->get();

        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)
                               ->orderBy('id','desc')->first();


                               $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)
                               ->value('web_site_name');


            $divisionList = DB::table('civilinfos')->groupBy('division_bn')
            ->select('division_bn')->get();

            $districtList = DB::table('civilinfos')->groupBy('district_bn')
            ->select('district_bn')->get();

            $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')->groupBy('city_orporation')
            ->select('city_orporation')->get();

            //dd($districtList);
            $fd6FormList = Fd6Form::where('fd_one_form_id',$ngo_list_all->id)
            ->where('id',$fd6Id)->latest()->first();

            $prokolpoAreaList = Fd6FormProkolpoArea::where('fd6_form_id',$fd6Id)->latest()->get();



        return view('front.fd6Form.view',compact('fd2OtherInfo','fd2FormList','cityCorporationList','districtList','prokolpoAreaList','fd6FormList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

    }


    public function destroy($id){

        $admins = Fd6Form::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }
        return back()->with('error','Deleted successfully!');
    }


    public function ProjectProposalFormPdfDownload($id){

        $get_file_data = Fd6Form::where('id',$id)->value('project_proposal_form');

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
}
