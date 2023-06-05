<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ngo_type_and_language;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use App\Models\NgoMemberList;
use DateTime;
use DateTimezone;
class NgomemberController extends Controller
{
    public function index(){

        $all_data_list = NgoMemberList::where('user_id',Auth::user()->id)->latest()->get();

        if(count($all_data_list) == 0){

            return redirect('/ngoMember/create');

        }else{

        return view('front.ngomember.index',compact('all_data_list'));
        }
    }

    public function create(){
        return view('front.ngomember.create');

    }

    public function edit($id){
        $all_data_list = NgoMemberList::where('name_slug',$id)->first();

        return view('front.ngomember.edit',compact('all_data_list'));

    }

    public function store(Request $request){
        $time_dy = time().date("Ymd");

        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $main_time = $dt->format('H:i:s');

        $request->validate([
            'name' => 'required|string',
            'desi' => 'required|string',
            'dob' => 'required|string',
            'phone' => 'required|string',
            'nid_no' => 'required|string',
            'father_name' => 'required|string',
            'present_address' => 'required|string',
            'permanent_address' => 'required|string',
            'name_supouse' => 'required|string',
        ]);

        $ngoMemberData = new NgoMemberList();
        $ngoMemberData->name = $request->name;
        $ngoMemberData->name_slug = Str::slug($request->name,"_");
        $ngoMemberData->desi = $request->desi;
        $ngoMemberData->dob = $request->dob;
        $ngoMemberData->time_for_api = $main_time;
        $ngoMemberData->verified_file = 0;
        $ngoMemberData->phone = $request->phone;
        $ngoMemberData->nid_no = $request->nid_no;
        $ngoMemberData->father_name = $request->father_name;
        $ngoMemberData->present_address = $request->present_address;
        $ngoMemberData->permanent_address = $request->permanent_address;
        $ngoMemberData->name_supouse = $request->name_supouse;
        $ngoMemberData->user_id = Auth::user()->id;
        $ngoMemberData->save();


        return redirect('/ngoMember')->with('success','Created Successfully');
    }


    public function update(Request $request,$id){
        $time_dy = time().date("Ymd");

        $ngoMemberData = NgoMemberList::find($id);
        $ngoMemberData->name = $request->name;
        $ngoMemberData->name_slug = Str::slug($request->name,"_");
        $ngoMemberData->desi = $request->desi;
        $ngoMemberData->dob = $request->dob;
        $ngoMemberData->phone = $request->phone;
        $ngoMemberData->nid_no = $request->nid_no;
        $ngoMemberData->father_name = $request->father_name;
        $ngoMemberData->present_address = $request->present_address;
        $ngoMemberData->permanent_address = $request->permanent_address;
        $ngoMemberData->name_supouse = $request->name_supouse;
        $ngoMemberData->save();


        return redirect('/ngoMember')->with('success','Created Successfully');


    }


    public function destroy($id)
    {

        $admins = NgoMemberList::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }

    public function ngoMemberView(Request $request){

        //dd($request->id_for_pass);

        $all_data_list = NgoMemberList::where('id',$request->id_for_pass)->first();

        return view('front.ngomember.view',compact('all_data_list'));


    }
}
