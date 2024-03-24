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
        $get_date_fd_ngodoc_mem = NgoMemberNidPhoto::where('fd_one_form_id', $getFormOneId)->value('updated_at');
        $get_date_fd_ngodoc = NgoOtherDoc::where('fd_one_form_id', $getFormOneId)->value('updated_at');
        $get_date_fd_ngomember = NgoMemberList::where('fd_one_form_id', $getFormOneId)->value('updated_at');
        $get_date_fd_eight = FormEight::where('fd_one_form_id', $getFormOneId)->value('updated_at');
        $get_date_fd_one = FdOneForm::where('user_id',Auth::user()->id)->value('updated_at');
        $get_date_lan_one = NgoTypeAndLanguage::where('user_id',Auth::user()->id)->value('updated_at');
        $get_value_fd_one_one = NgoTypeAndLanguage::where('user_id',Auth::user()->id)->value('first_one_form_check_status');
        $complete_status_fd_one_pdf_old = FdOneForm::where('user_id',Auth::user()->id)->value('chief_name');
        $complete_status_fd_one = FdOneForm::where('user_id',Auth::user()->id)->value('complete_status');
        $complete_status_fd_one_pdf = FdOneForm::where('user_id',Auth::user()->id)->value('chief_name');
        $complete_status_fd_eight = FormEight::where('fd_one_form_id', $getFormOneId)->value('complete_status');
        $complete_status_fd_eight_pdf = FormEight::where('fd_one_form_id', $getFormOneId)->value('verified_form_eight');
        $all_renewal_data = RenewalFile::where('fd_one_form_id', $getFormOneId)->first();

        $mainNgoType = CommonController::changeView();

        if($mainNgoType== 'দেশিও'){

        return view('front.other.reg_submit_list',compact('all_renewal_data','complete_status_fd_one_pdf_old','complete_status_fd_eight_pdf','complete_status_fd_eight','complete_status_fd_one_pdf','complete_status_fd_one','get_value_fd_one_one','get_date_lan_one','get_date_fd_eight','get_date_fd_one','get_date_fd_ngodoc_mem','get_date_fd_ngodoc','get_date_fd_ngomember'));
        }else{
            return view('front.other.foreign.reg_submit_list',compact('all_renewal_data','complete_status_fd_one_pdf_old','complete_status_fd_eight_pdf','complete_status_fd_eight','complete_status_fd_one_pdf','complete_status_fd_one','get_value_fd_one_one','get_date_lan_one','get_date_fd_eight','get_date_fd_one','get_date_fd_ngodoc_mem','get_date_fd_ngodoc','get_date_fd_ngomember'));
        }
    }
}
