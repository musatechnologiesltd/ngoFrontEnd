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
use App\Models\FormOneOtherPdfList;
use App\Models\FormOneBankAccount;
use App\Models\FormOneAdviserList;
use App\Models\FormOneSourceOfFund;
use App\Models\FormOneMemberList;
use Response;
use App\Models\NgoMemberList;
use App\Models\NgoOtherDoc;
use App\Models\NgoMemberNidPhoto;
class RegsubmitController extends Controller
{
    public function regSubmitList(){
        $get_date_fd_ngodoc_mem = NgoMemberNidPhoto::where('user_id',Auth::user()->id)->value('updated_at');
        $get_date_fd_ngodoc = NgoOtherDoc::where('user_id',Auth::user()->id)->value('updated_at');
        $get_date_fd_ngomember = NgoMemberList::where('user_id',Auth::user()->id)->value('updated_at');
        $get_date_fd_eight = FormEight::where('user_id',Auth::user()->id)->value('updated_at');
        $get_date_fd_one = FdOneForm::where('user_id',Auth::user()->id)->value('updated_at');
        $get_date_lan_one = NgoTypeAndLanguage::where('user_id',Auth::user()->id)->value('updated_at');
        $get_value_fd_one_one = NgoTypeAndLanguage::where('user_id',Auth::user()->id)->value('first_one_form_check_status');



        $complete_status_fd_one = FdOneForm::where('user_id',Auth::user()->id)->value('complete_status');
        $complete_status_fd_one_pdf = FdOneForm::where('user_id',Auth::user()->id)->value('verified_fd_one_form');

        $complete_status_fd_eight = FormEight::where('user_id',Auth::user()->id)->value('complete_status');
        $complete_status_fd_eight_pdf = FormEight::where('user_id',Auth::user()->id)->value('verified_form_eight');


        return view('front.other.reg_submit_list',compact('complete_status_fd_eight_pdf','complete_status_fd_eight','complete_status_fd_one_pdf','complete_status_fd_one','get_value_fd_one_one','get_date_lan_one','get_date_fd_eight','get_date_fd_one','get_date_fd_ngodoc_mem','get_date_fd_ngodoc','get_date_fd_ngomember'));
    }
}
