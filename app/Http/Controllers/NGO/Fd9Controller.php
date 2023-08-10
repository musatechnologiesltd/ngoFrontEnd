<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NVisa;
use App\Models\NgoStatus;
use App\Models\Country;
use App\Models\Fd9Form;
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
class Fd9Controller extends Controller
{
    public function edit($id){
//dd($id);
        $nVisaId = base64_decode($id);
        $getCityzenshipData = Country::whereNotNull('country_people_english')
        ->whereNotNull('country_people_bangla')->orderBy('id','asc')->get();


$countryList = Country::orderBy('id','asc')->get();
$ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

$fdNineData =Fd9Form::where('n_visa_id',$nVisaId)->first();

//dd($fdNineData);
return view('front.fdNineForm.create',compact('fdNineData','nVisaId','ngo_list_all','countryList','getCityzenshipData'));

    }


    public function store(Request $request){


        $request->validate([
            'fd9_foreigner_name' => 'required|string',
            'fd9_father_name' => 'required|string',
            'fd9_husband_or_wife_name' => 'required|string',
            'fd9_mother_name' => 'required|string',
            'fd9_birth_place' => 'required|string',
            'fd9_dob' => 'required|string',
            'fd9_passport_number' => 'required|string',
            'fd9_foreigner_passport_size_photo' => 'required|file',
            'fd9_copy_of_passport' => 'required|file',
            'fd9_passport_issue_date' => 'required|string',
            'fd9_passport_expiration_date' => 'required|string',
            'fd9_identification_mark_given_in_passport' => 'required|string',
            'fd9_male_or_female' => 'required|string',
            'fd9_marital_status' => 'required|string',
            'fd9_nationality_or_citizenship' => 'required|string',
            'fd9_details_if_multiple_citizenships' => 'required|string',
            'fd9_previous_citizenship_is_grounds_for_non_retention' => 'required|string',
            'fd9_current_address' => 'required|string',
            'fd9_number_of_family_members' => 'required|string',
            'fd9_academic_qualification' => 'required|file',
            'fd9_technical_and_other_qualifications_if_any' => 'required|file',
            'fd9_past_experience' => 'required|file',
            'fd9_countries_that_have_traveled' => 'required|string',
            'fd9_offered_post' => 'required|file',
            'fd9_name_of_proposed_project' => 'required|file',
            'fd9_date_of_appointment' => 'required|string',
            'fd9_extension_date' => 'required|string',
            'fd9_post_available_for_foreigner_and_working' => 'required|string',
            'fd9_previous_work_experience_in_bangladesh' => 'required|string',
            'fd9_total_foreigner_working' => 'required|string',
            'fd9_other_information' => 'required|string',
        ]);

      //dd($request->passport_photocopy);


         $fd9FormInfo = new Fd9Form();
         $fd9FormInfo->n_visa_id = $request->nVisaId;
         $fd9FormInfo->fd9_foreigner_name = $request->fd9_foreigner_name;
         $fd9FormInfo->fd9_father_name = $request->fd9_father_name;
         $fd9FormInfo->fd9_husband_or_wife_name = $request->fd9_husband_or_wife_name;
         $fd9FormInfo->fd9_mother_name = $request->fd9_mother_name;
         $fd9FormInfo->fd9_birth_place = $request->fd9_birth_place;
         $fd9FormInfo->fd9_dob = $request->fd9_dob;
         $fd9FormInfo->fd9_passport_number = $request->fd9_passport_number;
         $fd9FormInfo->fd9_passport_issue_date = $request->fd9_passport_issue_date;
         $fd9FormInfo->fd9_passport_expiration_date = $request->fd9_passport_expiration_date;
         $fd9FormInfo->fd9_identification_mark_given_in_passport = $request->fd9_identification_mark_given_in_passport;
         $fd9FormInfo->fd9_male_or_female = $request->fd9_male_or_female;
         $fd9FormInfo->fd9_marital_status = $request->fd9_marital_status;
         $fd9FormInfo->fd9_nationality_or_citizenship = $request->fd9_nationality_or_citizenship;
         $fd9FormInfo->fd9_details_if_multiple_citizenships = $request->fd9_details_if_multiple_citizenships;
         $fd9FormInfo->fd9_previous_citizenship_is_grounds_for_non_retention = $request->fd9_previous_citizenship_is_grounds_for_non_retention;
         $fd9FormInfo->fd9_current_address = $request->fd9_current_address;
         $fd9FormInfo->fd9_number_of_family_members = $request->fd9_number_of_family_members;

         if ($request->hasfile('fd9_academic_qualification')) {
            $filePath="fd9FormInfo";
            $file = $request->file('fd9_academic_qualification');
            $fd9FormInfo->fd9_academic_qualification =CommonController::pdfUpload($request,$file,$filePath);

        }



         if ($request->hasfile('fd9_technical_and_other_qualifications_if_any')) {
            $filePath="fd9FormInfo";
            $file = $request->file('fd9_technical_and_other_qualifications_if_any');
            $fd9FormInfo->fd9_technical_and_other_qualifications_if_any =CommonController::pdfUpload($request,$file,$filePath);

        }

        if ($request->hasfile('fd9_past_experience')) {
            $filePath="fd9FormInfo";
            $file = $request->file('fd9_past_experience');
            $fd9FormInfo->fd9_past_experience =CommonController::pdfUpload($request,$file,$filePath);

        }





         $fd9FormInfo->fd9_countries_that_have_traveled = $request->fd9_countries_that_have_traveled;


         if ($request->hasfile('fd9_offered_post')) {
            $filePath="fd9FormInfo";
            $file = $request->file('fd9_offered_post');
            $fd9FormInfo->fd9_offered_post =CommonController::pdfUpload($request,$file,$filePath);

        }
        if ($request->hasfile('fd9_name_of_proposed_project')) {
            $filePath="fd9FormInfo";
            $file = $request->file('fd9_name_of_proposed_project');
            $fd9FormInfo->fd9_name_of_proposed_project =CommonController::pdfUpload($request,$file,$filePath);

        }
         $fd9FormInfo->fd9_date_of_appointment = $request->fd9_date_of_appointment;
         $fd9FormInfo->fd9_extension_date = $request->fd9_extension_date;
         $fd9FormInfo->fd9_post_available_for_foreigner_and_working = $request->fd9_post_available_for_foreigner_and_working;
         $fd9FormInfo->fd9_previous_work_experience_in_bangladesh = $request->fd9_previous_work_experience_in_bangladesh;
         $fd9FormInfo->fd9_total_foreigner_working = $request->fd9_total_foreigner_working;
         $fd9FormInfo->fd9_other_information = $request->fd9_other_information;
         if ($request->hasfile('fd9_foreigner_passport_size_photo')) {
            $filePath="fd9FormInfo";
            $file = $request->file('fd9_foreigner_passport_size_photo');
            $fd9FormInfo->fd9_foreigner_passport_size_photo =CommonController::imageUpload($request,$file,$filePath);

        }
        if ($request->hasfile('fd9_copy_of_passport')) {
            $filePath="fd9FormInfo";
            $file = $request->file('fd9_copy_of_passport');
            $fd9FormInfo->fd9_copy_of_passport =CommonController::pdfUpload($request,$file,$filePath);

        }
         $fd9FormInfo->save();


         $fd9FormId = $fd9FormInfo->id;


         $input = $request->all();


    //     $family_member_name_list = $input['family_member_name'];


    //     foreach($family_member_name_list as $key => $family_member_name_list){


    //         $form= new Fd9ForeignerEmployeeFamilyMemberList();
    //         $form->fd9_form_id = $fd9FormId;
    //         $form->family_member_name = $input['family_member_name'][$key];
    //         $form->family_member_age = $input['family_member_age'][$key];
    //         $form->save();
    //    }



       return redirect()->route('nVisa.index')->with('success','Created Successfully');


    }


    public function update(Request $request,$id){


        $fd9FormInfo = Fd9Form::find($id);
        $fd9FormInfo->fd9_foreigner_name = $request->fd9_foreigner_name;
        $fd9FormInfo->fd9_father_name = $request->fd9_father_name;
        $fd9FormInfo->fd9_husband_or_wife_name = $request->fd9_husband_or_wife_name;
        $fd9FormInfo->fd9_mother_name = $request->fd9_mother_name;
        $fd9FormInfo->fd9_birth_place = $request->fd9_birth_place;
        $fd9FormInfo->fd9_dob = $request->fd9_dob;
        $fd9FormInfo->fd9_passport_number = $request->fd9_passport_number;
        $fd9FormInfo->fd9_passport_issue_date = $request->fd9_passport_issue_date;
        $fd9FormInfo->fd9_passport_expiration_date = $request->fd9_passport_expiration_date;
        $fd9FormInfo->fd9_identification_mark_given_in_passport = $request->fd9_identification_mark_given_in_passport;
        $fd9FormInfo->fd9_male_or_female = $request->fd9_male_or_female;
        $fd9FormInfo->fd9_marital_status = $request->fd9_marital_status;
        $fd9FormInfo->fd9_nationality_or_citizenship = $request->fd9_nationality_or_citizenship;
        $fd9FormInfo->fd9_details_if_multiple_citizenships = $request->fd9_details_if_multiple_citizenships;
        $fd9FormInfo->fd9_previous_citizenship_is_grounds_for_non_retention = $request->fd9_previous_citizenship_is_grounds_for_non_retention;
        $fd9FormInfo->fd9_current_address = $request->fd9_current_address;
        $fd9FormInfo->fd9_number_of_family_members = $request->fd9_number_of_family_members;

        if ($request->hasfile('fd9_academic_qualification')) {
           $filePath="fd9FormInfo";
           $file = $request->file('fd9_academic_qualification');
           $fd9FormInfo->fd9_academic_qualification =CommonController::pdfUpload($request,$file,$filePath);

       }



        if ($request->hasfile('fd9_technical_and_other_qualifications_if_any')) {
           $filePath="fd9FormInfo";
           $file = $request->file('fd9_technical_and_other_qualifications_if_any');
           $fd9FormInfo->fd9_technical_and_other_qualifications_if_any =CommonController::pdfUpload($request,$file,$filePath);

       }

       if ($request->hasfile('fd9_past_experience')) {
           $filePath="fd9FormInfo";
           $file = $request->file('fd9_past_experience');
           $fd9FormInfo->fd9_past_experience =CommonController::pdfUpload($request,$file,$filePath);

       }





        $fd9FormInfo->fd9_countries_that_have_traveled = $request->fd9_countries_that_have_traveled;


        if ($request->hasfile('fd9_offered_post')) {
           $filePath="fd9FormInfo";
           $file = $request->file('fd9_offered_post');
           $fd9FormInfo->fd9_offered_post =CommonController::pdfUpload($request,$file,$filePath);

       }
       if ($request->hasfile('fd9_name_of_proposed_project')) {
           $filePath="fd9FormInfo";
           $file = $request->file('fd9_name_of_proposed_project');
           $fd9FormInfo->fd9_name_of_proposed_project =CommonController::pdfUpload($request,$file,$filePath);

       }
        $fd9FormInfo->fd9_date_of_appointment = $request->fd9_date_of_appointment;
        $fd9FormInfo->fd9_extension_date = $request->fd9_extension_date;
        $fd9FormInfo->fd9_post_available_for_foreigner_and_working = $request->fd9_post_available_for_foreigner_and_working;
        $fd9FormInfo->fd9_previous_work_experience_in_bangladesh = $request->fd9_previous_work_experience_in_bangladesh;
        $fd9FormInfo->fd9_total_foreigner_working = $request->fd9_total_foreigner_working;
        $fd9FormInfo->fd9_other_information = $request->fd9_other_information;
        if ($request->hasfile('fd9_foreigner_passport_size_photo')) {
           $filePath="fd9FormInfo";
           $file = $request->file('fd9_foreigner_passport_size_photo');
           $fd9FormInfo->fd9_foreigner_passport_size_photo =CommonController::imageUpload($request,$file,$filePath);

       }
       if ($request->hasfile('fd9_copy_of_passport')) {
           $filePath="fd9FormInfo";
           $file = $request->file('fd9_copy_of_passport');
           $fd9FormInfo->fd9_copy_of_passport =CommonController::pdfUpload($request,$file,$filePath);

       }
        $fd9FormInfo->save();


        $fd9FormId = $fd9FormInfo->id;


        $input = $request->all();


    //    $family_member_name_list = $input['family_member_name'];

    //    Fd9ForeignerEmployeeFamilyMemberList::where('fd9_form_id',$fd9FormId)->delete();

    //    foreach($family_member_name_list as $key => $family_member_name_list){


    //        $form= new Fd9ForeignerEmployeeFamilyMemberList();
    //        $form->fd9_form_id = $fd9FormId;
    //        $form->family_member_name = $input['family_member_name'][$key];
    //        $form->family_member_age = $input['family_member_age'][$key];
    //        $form->save();
    //   }



      return redirect()->route('nVisa.index')->with('success','Updated Successfully');


    }

    public function show($id){


    }


    public function mainFd9PdfDownload($id){


        $nVisaEdit = NVisa::where('id',$id)
       ->with(['nVisaParticularOfSponsorOrEmployer','nVisaParticularsOfForeignIncumbnet','nVisaEmploymentInformation','nVisaWorkPlaceAddress','nVisaAuthorizedPersonalOfTheOrg','nVisaNecessaryDocumentForWorkPermit','nVisaManpowerOfTheOffice','fd9Form'])->first();

       $getCityzenshipData = Country::whereNotNull('country_people_english')
       ->whereNotNull('country_people_bangla')->orderBy('id','asc')->get();


$countryList = Country::orderBy('id','asc')->get();
$ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
$ngoStatus = NgoStatus::where('fd_one_form_id',$ngo_list_all->id)->first();




$file_Name_Custome = "Fd9_Form";
        $pdf=PDF::loadView('front.fdNineForm.mainFd9PdfDownload',[

            'nVisaEdit'=>$nVisaEdit,
            'getCityzenshipData'=>$getCityzenshipData,
            'countryList'=>$countryList,
            'ngo_list_all'=>$ngo_list_all,
            'ngoStatus'=>$ngoStatus

        ],[],['format' => 'A4']);
    return $pdf->stream($file_Name_Custome.''.'.pdf');

    }

    public function mainFd9PdfUpload(Request $request){

        $fd9FormInfo = Fd9Form::find($request->id);

        if ($request->hasfile('verified_fd_nine_form')) {
            $filePath="fd9FormInfo";
            $file = $request->file('verified_fd_nine_form');

            $fd9FormInfo->verified_fd_nine_form =CommonController::pdfUpload($request,$file,$filePath);

        }

        $fd9FormInfo->save();


        return redirect()->back()->with('success','Update Successfully');
    }
}
