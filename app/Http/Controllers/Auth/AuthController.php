<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Models\UserVerify;
use Hash;
use Illuminate\Support\Str;
use Mail;
use DB;
use App\Models\NgoTypeAndLanguage;
use App\Models\NgoNameChange;
use App\Models\NgoRenew;
use App\Models\RenewalFile;
use App\Models\FormEight;
use App\Models\FdOneForm;
use App\Models\FdOneOtherPdfList;
use App\Models\FormOneOtherPdfList;
use App\Models\FormOneBankAccount;
use App\Models\Fdoneformadviser;
use App\Models\FdOneSourceOfFund;
use App\Models\FdOneMemberList;
use App\Models\NgoMemberNidPhoto;
use App\Models\NgoOtherDoc;
use App\Http\Controllers\NGO\CommonController;
class AuthController extends Controller
{

    public function passwordChangeConfirmed(Request $request){

        $get_all_data = User::find($request->id);
        $get_all_data->password = Hash::make($request->password);
        $get_all_data->save();

        return redirect('/login')->with('success','Password Successfully Changed!');

    }

    public function passwordResetPage($id){

        $id = $id;

        return view('front.auth_page.password_reset_page',compact('id'));

    }

    public function checkMailFromList(Request $request){

        $type_email = $request->type_email;
        $data = User::where('email',$type_email)->value('email');

        return response()->json($data);

     }


     public function checkMailAlreadyRegisteredOrNot(Request $request){

        $main_data = User::where('email',$request->pass)->value('email');

        if(empty($main_data)){

            $data = '<span style="color:green;">Email Available</span>';

        }else{

            $data = '<span style="color:red;">Email Already In Used</span>';

        }


        return $data;

     }


     public function sendMailGetFromList(Request $request){

        $useremail = $request->email;
        $main_data = User::where('email',$useremail)->first();
        $id = $main_data->id;
        $email = $main_data->email;

        Mail::send('emails.passwordResetEmail', ['id' => $id], function($message) use($request){
            $message->to($request->email);
            $message->subject('NGOAB Registration Service || Password Reset ');
        });

       return redirect('/login')->with('success','Email Sent Successfully!');

}

    public function showLinkRequestForm(){

        return view('front.auth_page.showLinkRequestForm');
    }

    public function index(){

        return view('front.auth_page.login');
    }

    public function registration(){

        return view('front.auth_page.register');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required | string',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            //CommonController::checkNgotype(1);

            return redirect()->intended('dashboard')
                        ->with('success','You have Successfully logged in');
        }

        return redirect("login")->with('error','Opps! You have entered invalid credentials');
    }

    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:5',
        ]);

        $data = $request->all();

        //dd($data);
        //$createUser = $this->create($data);

        $createUser = new User;
        $createUser->user_name = $request->name;
        $createUser->non_verified_email = $request->email;
        $createUser->password = Hash::make($request->password);
        $createUser->user_phone = $request->phone;
        $createUser->save();


        $token = Str::random(10);

        UserVerify::create([
              'user_id' => $createUser->id,
              'token' => $token
            ]);

        Mail::send('emails.emailVerificationEmail', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('NGOAB Registration Service || User Sign Up & Email Verification');
          });


          return redirect("emailVerifyPage");

    }


    public function updateRegistration(Request $request){
        $filePath="userImage";
        $time_dy = time().date("Ymd");
        $get_previous_email_all = User::where('id',$request->id)->value('email');

        if($get_previous_email_all == $request->email){

            $get_all_data = User::find($request->id);
            $get_all_data->user_name = $request->name;
            $get_all_data->user_phone = $request->phone;
            $get_all_data->user_address = $request->address;
            $get_all_data->email = $request->email;

            if ($request->hasfile('user_image')) {

                $file = $request->file('user_image');
                $get_all_data->user_image =  CommonController::imageUpload($request,$file,$filePath);


            }

            if ($request->password) {
                $get_all_data->password = Hash::make($request->password);
            }
          $get_all_data->save();

          if ($request->password) {

          Auth::logout();

          return Redirect('login')->with('success','Password Changed Login Again');
          }else{
            return Redirect()->back()->with('success','updated Successfully');
          }

        }else{


        $get_all_data = User::find($request->id);
        $get_all_data->user_name = $request->name;
        $get_all_data->user_phone = $request->phone;
        $get_all_data->user_address = $request->address;
        $get_all_data->email = $request->email;
        $get_all_data->is_email_verified = 0;
        if ($request->hasfile('user_image')) {

            $file = $request->file('user_image');
            $get_all_data->user_image =  CommonController::imageUpload($request,$file,$filePath);

        }
        if ($request->password) {
            $get_all_data->password = Hash::make($request->password);
        }
      $get_all_data->save();

      $token = Str::random(10);

      UserVerify::where('user_id',$request->id)->delete();

      UserVerify::create([
        'user_id' => $request->id,
        'token' => $token
      ]);

  Mail::send('emails.emailVerificationEmail', ['token' => $token], function($message) use($request){
        $message->to($request->email);
        $message->subject('NGOAB Registration Service || User Sign Up & Email Verification');
    });

    Session::flush();
    Auth::logout();

    return Redirect('login')->with('success','Please Check Mail For Varification');;


        }
     }


    public function create(array $data)
    {
      return User::create([
        'user_name' => $data['name'],
        'email' => $data['email'],
        'user_phone' => $data['phone'],
       // 'user_address' => $data['address'],
        'password' => Hash::make($data['password'])
      ]);
    }


    public function dashboard()
    {
        if(Auth::check()){
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->value('id');
            $ngo_status_list = DB::table('ngo_statuses')->where('fd_one_form_id',$ngo_list_all)->value('status');

            if(empty($ngo_status_list) || $ngo_status_list == 'Ongoing' || $ngo_status_list == 'Old Ngo Renew'){

                $get_reg_id = DB::table('ngo_statuses')->where('fd_one_form_id',$ngo_list_all)->value('status');


                //CommonController::checkNgotype(1);

                $mainNgoType = CommonController::changeView();

                if($mainNgoType== 'দেশিও'){



                return view('front.dashboard.dashboard',compact('get_reg_id'));

                }else{
                    return view('front.dashboard.foreign.dashboard',compact('get_reg_id'));

                }

            }else{


                $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();



$name_change_list_r = NgoRenew::where('fd_one_form_id',$ngo_list_all->id)->get();

//dd(count($name_change_list_r));
$name_change_list = NgoNameChange::where('fd_one_form_id',$ngo_list_all->id)->get();
//dd(count($name_change_list));
$ngo_list_all_form_eight = FormEight::where('fd_one_form_id',$ngo_list_all->id)->first();
$form_member_data_doc = NgoMemberNidPhoto::where('fd_one_form_id',$ngo_list_all->id)->get();
$form_ngo_data_doc = NgoOtherDoc::where('fd_one_form_id',$ngo_list_all->id)->get();
$all_source_of_fund = FdOneSourceOfFund::where('fd_one_form_id',$ngo_list_all->id)->get();
$get_all_data_other= FdOneOtherPdfList::where('fd_one_form_id',$ngo_list_all->id)
            ->get();


            $oldOrNewStatus = NgoTypeAndLanguage::where('user_id',Auth::user()->id)->first();
//dd(1);
            CommonController::checkNgotype(1);



            $mainNgoType = CommonController::changeView();


$ngoOtherDocLists = RenewalFile::where('fd_one_form_id',$ngo_list_all->id)->latest()->get();


//dd($mainNgoType);



            if($mainNgoType== 'দেশিও'){

                return view('front.dashboard.accept_dashboard',compact('ngoOtherDocLists','oldOrNewStatus','name_change_list_r','name_change_list','get_all_data_other','all_source_of_fund','form_ngo_data_doc','ngo_list_all_form_eight','ngo_list_all','form_member_data_doc'));
            }else{

                return view('front.dashboard.foreign.accept_dashboard',compact('ngoOtherDocLists','oldOrNewStatus','name_change_list_r','name_change_list','get_all_data_other','all_source_of_fund','form_ngo_data_doc','ngo_list_all_form_eight','ngo_list_all','form_member_data_doc'));
            }
            }
        }

        return redirect("login")->with('error','Opps! You do not have access');
    }

    public function logout() {

        Auth::logout();

        return Redirect('login');
    }


    public function verifyAccount($token)
    {

        //dd(11);
        $verifyUser = UserVerify::where('token', $token)->first();

        $message = 'Sorry your email cannot be identified.';

        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;

            if(!$user->is_email_verified) {
                $verifyUser->user->email = $verifyUser->user->non_verified_email;
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }

        return redirect("emailVerifiedPage");
    }
}
