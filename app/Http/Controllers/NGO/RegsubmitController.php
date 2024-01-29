<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NgoTypeAndLanguage;
use App\Models\FormEight;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use App;
use PDF;
use DateTime;
use DateTimezone;
use Carbon\Carbon;
use Session;
use App\Models\FdOneForm;
use App\Models\FdOneOtherPdfList;
use App\Models\FdOneBankAccount;
use App\Models\FdOneAdviserList;
use App\Models\FdOneSourceOfFund;
use App\Models\FdOneMemberList;
use Response;
use App\Models\NgoMemberList;
use App\Models\NgoOtherDoc;
use App\Models\NgoMemberNidPhoto;
use App\Models\RenewalFile;
use App\Http\Controllers\NGO\CommonController;
class RegsubmitController extends Controller
{
    public function regSubmitList(){

        $getFormOneId = FdOneForm::where('user_id',Auth::user()->id)->value('id');
        $getDateFdNgoDocMem = NgoMemberNidPhoto::where('fd_one_form_id', $getFormOneId)->value('updated_at');
        $getDateFdNgoDoc = NgoOtherDoc::where('fd_one_form_id', $getFormOneId)->value('updated_at');
        $getDateFdNgomember = NgoMemberList::where('fd_one_form_id', $getFormOneId)->value('updated_at');
        $getDateFdEight = FormEight::where('fd_one_form_id', $getFormOneId)->value('updated_at');
        $getDateFdOne = FdOneForm::where('user_id',Auth::user()->id)->value('updated_at');
        $getDateLanOne = NgoTypeAndLanguage::where('user_id',Auth::user()->id)->value('updated_at');
        $getValueFdOneOne = NgoTypeAndLanguage::where('user_id',Auth::user()->id)->value('first_one_form_check_status');
        $completeStatusFdOnePdfOld = FdOneForm::where('user_id',Auth::user()->id)->value('chief_name');
        $completeStatusFdOne = FdOneForm::where('user_id',Auth::user()->id)->value('complete_status');
        $completeStatusFdOnePdf = FdOneForm::where('user_id',Auth::user()->id)->value('chief_name');
        $completeStatusFdEight = FormEight::where('fd_one_form_id', $getFormOneId)->value('complete_status');
        $completeStatusFdEightPdf = FormEight::where('fd_one_form_id', $getFormOneId)->value('verified_form_eight');
        $allRenewalData = RenewalFile::where('fd_one_form_id', $getFormOneId)->first();
        $mainNgoType = CommonController::changeView();

        if($mainNgoType== 'দেশিও'){

            return view('front.other.regSubmitList',compact('allRenewalData','completeStatusFdOnePdfOld','completeStatusFdEightPdf','completeStatusFdEight','completeStatusFdOnePdf','completeStatusFdOne','getValueFdOneOne','getDateLanOne','getDateFdEight','getDateFdOne','getDateFdNgoDocMem','getDateFdNgoDoc','getDateFdNgomember'));
        }else{
            return view('front.other.foreign.regSubmitList',compact('allRenewalData','completeStatusFdOnePdfOld','completeStatusFdEightPdf','completeStatusFdEight','completeStatusFdOnePdf','completeStatusFdOne','getValueFdOneOne','getDateLanOne','getDateFdEight','getDateFdOne','getDateFdNgoDocMem','getDateFdNgoDoc','getDateFdNgomember'));
        }
    }
}
