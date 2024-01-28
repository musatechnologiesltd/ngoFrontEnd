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

        $getAllData = User::find($request->id);
        $getAllData->password = Hash::make($request->password);
        $getAllData->save();

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

        $mainData = User::where('email',$request->pass)->value('email');

        if(empty($mainData)){

            $data = '<span style="color:green;">Email Available</span>';

        }else{

            $data = '<span style="color:red;">Email Already In Used</span>';

        }


        return $data;

    }


     public function sendMailGetFromList(Request $request){

        $useremail = $request->email;
        $mainData = User::where('email',$useremail)->first();
        $id = $mainData->id;
        $email = $mainData->email;

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

            return redirect()->intended('dashboard')->with('success','You have Successfully logged in');
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
        $getPreviousEmailAll = User::where('id',$request->id)->value('email');

        if($getPreviousEmailAll == $request->email){

            $getAllData = User::find($request->id);
            $getAllData->user_name = $request->name;
            $getAllData->user_phone = $request->phone;
            $getAllData->user_address = $request->address;
            $getAllData->email = $request->email;

            if ($request->hasfile('user_image')) {

                $file = $request->file('user_image');
                $getAllData->user_image =  CommonController::imageUpload($request,$file,$filePath);


            }

            if ($request->password) {
                $getAllData->password = Hash::make($request->password);
            }
            $getAllData->save();

            if ($request->password) {

            Auth::logout();

            return Redirect('login')->with('success','Password Changed Login Again');

            }else{

            return Redirect()->back()->with('success','updated Successfully');

            }

        }else{


            $getAllData = User::find($request->id);
            $getAllData->user_name = $request->name;
            $getAllData->user_phone = $request->phone;
            $getAllData->user_address = $request->address;
            $getAllData->email = $request->email;
            $getAllData->is_email_verified = 0;
            if ($request->hasfile('user_image')) {

                $file = $request->file('user_image');
                $getAllData->user_image =  CommonController::imageUpload($request,$file,$filePath);

            }
            if ($request->password) {
                $getAllData->password = Hash::make($request->password);
            }
            $getAllData->save();
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
        'password' => Hash::make($data['password'])
      ]);
    }


    public function dashboard()
    {
        if(Auth::check()){
            $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->value('id');

            $newOldNgo = CommonController::newOldNgo();

            if($newOldNgo != 'Old'){

                $ngoStatusList = DB::table('ngo_statuses')->where('fd_one_form_id',$ngoListAll)->value('status');

            }else{

                $ngoStatusList = DB::table('ngo_renews')->where('fd_one_form_id',$ngoListAll)->value('status');

            }


            if(empty($ngoStatusList) || $ngoStatusList == 'Ongoing' || $ngoStatusList == 'Old Ngo Renew'){

                $getRegId = DB::table('ngo_statuses')->where('fd_one_form_id',$ngoListAll)->value('status');
                $mainNgoType = CommonController::changeView();

                if($mainNgoType== 'দেশিও'){

                    return view('front.dashboard.dashboard',compact('getRegId'));

                }else{
                    return view('front.dashboard.foreign.dashboard',compact('getRegId'));

                }

            }else{

                $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();
                $nameChangeListR = NgoRenew::where('fd_one_form_id',$ngoListAll->id)->get();
                $nameChangeList = NgoNameChange::where('fd_one_form_id',$ngoListAll->id)->get();
                $ngoListAllFormEight = FormEight::where('fd_one_form_id',$ngoListAll->id)->first();
                $formMemberDataDoc = NgoMemberNidPhoto::where('fd_one_form_id',$ngoListAll->id)->get();
                $formNgoDataDoc = NgoOtherDoc::where('fd_one_form_id',$ngoListAll->id)->get();
                $allSourceOfFund = FdOneSourceOfFund::where('fd_one_form_id',$ngoListAll->id)->get();
                $getAllDataOther= FdOneOtherPdfList::where('fd_one_form_id',$ngoListAll->id)->get();
                $oldOrNewStatus = NgoTypeAndLanguage::where('user_id',Auth::user()->id)->first();

                CommonController::checkNgotype(1);
                $mainNgoType = CommonController::changeView();
                $ngoOtherDocLists = RenewalFile::where('fd_one_form_id',$ngoListAll->id)->latest()->get();

                if($mainNgoType== 'দেশিও'){

                    return view('front.dashboard.accept_dashboard',compact('ngoOtherDocLists','oldOrNewStatus','nameChangeListR','nameChangeList','getAllDataOther','allSourceOfFund','formNgoDataDoc','ngoListAllFormEight','ngoListAll','formMemberDataDoc'));

                }else{

                return view('front.dashboard.foreign.accept_dashboard',compact('ngoOtherDocLists','oldOrNewStatus','nameChangeListR','nameChangeList','getAllDataOther','allSourceOfFund','formNgoDataDoc','ngoListAllFormEight','ngoListAll','formMemberDataDoc'));

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
