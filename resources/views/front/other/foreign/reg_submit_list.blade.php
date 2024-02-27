@extends('front.master.master')

@section('title')
@if($foreignNgoType == 'Old')
Renew Submit | {{ trans('header.ngo_ab')}}
@else
{{ trans('reg_sub.reg_sub')}} | {{ trans('header.ngo_ab')}}
@endif
@endsection

@section('css')

@endsection

@section('body')


<?php

use App\Http\Controllers\NGO\CommonController;
$getFormOneId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');

$newOldNgo = CommonController::newOldNgo();

if($newOldNgo != 'Old'){
$get_reg_id = DB::table('ngo_statuses')->where('fd_one_form_id',$getFormOneId)->value('status');
}else{

    $get_reg_id = DB::table('ngo_renews')->where('fd_one_form_id',$getFormOneId)->value('status');

}


?>

@if(empty($get_reg_id))


<section>
    <div class="container">
        <div class="form-card">
            <div class="dashboard_box">
                <div class="dashboard_left">
                    <ul>
                        @include('front.include.sidebar_dash')
                    </ul>
                </div>
                <div class="dashboard_right">
                    <div class="user_dashboard_right">

                        @if($foreignNgoType == 'Old')
                        <h4>NGO Renew Final Submission</h4>
                        @else
                        <h4>{{ trans('reg_sub.ff')}}</h4>
                        @endif
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>{{ trans('reg_sub.ll')}}</th>
                                            <th>{{ trans('reg_sub.fe')}}</th>
                                            <th>{{ trans('reg_sub.status')}}</th>

                                        </tr>



                                        <tr>
                                            <td>

                                                @if(empty($get_date_lan_one))

                                                @else

                                                @if(session()->get('locale') == 'en')
                                                {{ App\Http\Controllers\NGO\CommonController::englishToBangla($get_date_lan_one->format('d-m-Y')) }}

                                                @else

                                                {{ $get_date_lan_one->format('d-m-Y') }}

                                                @endif
                                                @endif


                                                </td>
                                            <td>{{ trans('reg_sub.e_check')}}</td>
                                            <td style="position:relative">

                                                @if($get_value_fd_one_one == 1)
                                                <input id="chk" type="checkbox" onclick="return false;" checked class="custom_checkbox" />
                                                @else
                                                <input id="chk" type="checkbox" onclick="return false;"  class="custom_checkbox" />
                                                @endif
                                                <label for="chk"></label>
                                            </td>

                                        </tr>



                                        <tr>
                                            <td>
                                                @if(empty($get_date_lan_one))

                                                @else

                                                @if(session()->get('locale') == 'en')
                                                {{ App\Http\Controllers\NGO\CommonController::englishToBangla($get_date_lan_one->format('d-m-Y')) }}

                                                @else

                                                {{ $get_date_lan_one->format('d-m-Y') }}

                                                @endif
@endif

                                            </td>
                                            <td>{{ trans('reg_sub.t_check')}}</td>
                                            <td style="position:relative">
                                                @if($get_value_fd_one_one == 1)
                                                <input id="chk" type="checkbox" onclick="return false;" checked class="custom_checkbox" />
                                               @else

                                               <input id="chk" type="checkbox" onclick="return false;"  class="custom_checkbox" />
                                               @endif

                                                <label for="chk" readonly></label>
                                            </td>

                                        </tr>




                                        <tr>
                                            <td>
                                                @if(empty($get_date_fd_one))

                                                @else
                                                @if(session()->get('locale') == 'en')
                                                {{ App\Http\Controllers\NGO\CommonController::englishToBangla($get_date_fd_one->format('d-m-Y')) }}

                                                @else

                                                {{ $get_date_fd_one->format('d-m-Y') }}

                                                @endif
@endif
                                            </td>
                                            <td>


                                                @if($foreignNgoType == 'Old')
                                                FD-8  Form Fill up
                                                @else

                                                {{ trans('reg_sub.f_fd')}}
@endif

                                            </td>
                                            <td style="position:relative">

                                                @if($complete_status_fd_one == 'save_and_exit_from_three')

                                                <input id="chk" type="checkbox" onclick="return false;" checked  class="custom_checkbox" />
                                                @else
                                                <input id="chk" type="checkbox" onclick="return false;"  checked class="custom_checkbox" />
                                                @endif
                                                <label for="chk"></label>
                                            </td>

                                        </tr>



<!--new-->



                                        @if($foreignNgoType == 'Old')
                                        <tr>
                                            <td>


                                                @if(!$all_renewal_data)






                                                @else


                                                @if(session()->get('locale') == 'en')
                                                {{ App\Http\Controllers\NGO\CommonController::englishToBangla($all_renewal_data->created_at->format('d-m-Y')) }}

                                                @else

                                                {{ $all_renewal_data->created_at->format('d-m-Y') }}

                                                @endif
@endif

                                            </td>
                                            <td>{{ trans('reg_sub.doc')}}</td>
                                            <td style="position:relative">
                                                @if(!$all_renewal_data)
                                                <input id="chk" type="checkbox" onclick="return false;"   class="custom_checkbox" />
                                                @else
                                                <input id="chk" type="checkbox" onclick="return false;" checked  class="custom_checkbox" />
                                                @endif
                                                <label for="chk"></label>
                                            </td>

                                        </tr>

                                        @else
                                        <tr>
                                            <td>


                                                @if(!$get_date_fd_ngodoc)






                                                @else


                                                @if(session()->get('locale') == 'en')
                                                {{ App\Http\Controllers\NGO\CommonController::englishToBangla($get_date_fd_ngodoc->format('d-m-Y')) }}

                                                @else

                                                {{ $get_date_fd_ngodoc->format('d-m-Y') }}

                                                @endif
@endif

                                            </td>
                                            <td>{{ trans('reg_sub.doc')}}</td>
                                            <td style="position:relative">
                                                @if(!$get_date_fd_ngodoc)
                                                <input id="chk" type="checkbox" onclick="return false;"   class="custom_checkbox" />
                                                @else
                                                <input id="chk" type="checkbox" onclick="return false;" checked  class="custom_checkbox" />
                                                @endif
                                                <label for="chk"></label>
                                            </td>

                                        </tr>

                                        @endif

                                    </table>

                                    @if($foreignNgoType == 'Old')
                                    <p class="fst-italic text-danger">
                                        Once you complete all the steps. You will submit the ngo renew form
                                    </p>
                                    @else
                                    <p class="fst-italic text-danger">
                                        {{ trans('reg_sub.last')}}
                                    </p>
@endif

                                    @if($foreignNgoType == 'Old')


                                    <form id="form" action="{{ route('renewalSubmitForOld') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="NGO Renew" name="reg_type" />
                                    <div class="d-grid d-md-flex justify-content-md-end">
                                        <button type="submit"  id="bb3" class="btn btn-registration" disabled>NGO Renew Final Submit</button>
                                    </div>
                                    </form>


                                    @else
                                    <form id="form" action="{{ route('finalSubmitRegForm') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="NGO Registration" name="reg_type" />
                                    <div class="d-grid d-md-flex justify-content-md-end">
                                        <button type="submit"  id="bb3" class="btn btn-registration" disabled>{{ trans('reg_sub.submit')}}</button>
                                    </div>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@else
<section>
    <div class="container">
        <div class="form-card">
            <div class="dashboard_box">
                <div class="dashboard_left">
                    <ul>
                        @include('front.include.sidebar_dash')


                    </ul>
                </div>
                <div class="dashboard_right">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="d-flex justify-content-center">
                                <i class="fa fa-check-circle confirmation_icon" style="font-size:105px !important;"></i>
                            </div>
                            <div class="text-center">
                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                <h1>আবেদন জমা দেওয়া হয়েছে!</h1>
                                <p>আপনার এনজিও আবেদন এনজিও এবি-তে জমা দেওয়া হয়েছে</p>
                                <p>আপনার আবেদন গৃহীত হলে আপনি নিশ্চিতকরণ বার্তা পাবেন</p>
                                @else
                                <h1>Application Submitted!</h1>
                                <p>Your NGO Application Has Been Submitted Into NGOAB</p>
                                <p>When your application will be accepted you will get confirmation message </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endif

@endsection

@section('script')

<script>


$(document).ready(function(){

    var all = $('input[type="checkbox"]:checked').length;

    if(all < 4){
        $('#bb3').attr('disabled',true);

    }else{
        $('#bb3').attr('disabled',false);

    }


});

</script>

@endsection
