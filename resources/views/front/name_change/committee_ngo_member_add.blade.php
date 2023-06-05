@extends('front.master.master')

@section('title')
এনজিওর নাম পরিবর্তন | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')

<?php
 $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
      'May','June','July','August','September','October','November','December','Saturday','Sunday',
      'Monday','Tuesday','Wednesday','Thursday','Friday');
      $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
      'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
      বুধবার','বৃহস্পতিবার','শুক্রবার'
      );

?>


<section>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="user_profile_dashboard_upper">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                @if(empty(Auth::user()->image))
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                     class="rounded-circle" width="100">
                                     @else
                                     <img src="{{ asset('/') }}{{ Auth::user()->image }}" alt="Admin"
                                     class="rounded-circle" width="100">
                                     @endif
                                <div class="mt-3">
                                    @if(session()->get('locale') == 'en')
                                    <h4>{{ $ngo_list_all->organization_name_ban }}</h4>
                                    @else



                                    <h4>{{ $ngo_list_all->organization_name }}</h4>
                                    @endif
                                    <p class="text-secondary mb-1">{{ $ngo_list_all->name_of_head_in_bd }}</p>
                                    <p class="text-muted font-size-sm">{{ $ngo_list_all->organization_address }}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="profile_link_box">
                            <a href="{{ route('dashboard') }}">
                                <p class="{{ Route::is('dashboard')  ? 'active_link' : '' }}"><i class="fa fa-user pe-2"></i>ব্যবহারকারীর প্রোফাইল</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('nameChange') }}">
                                <p class="{{ Route::is('ngoCommitteMemberAdd') || Route::is('nameChange') || Route::is('sendNameChange')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>এনজিওর নাম পরিবর্তন</p>
                            </a>
                        </div>

                         <div class="profile_link_box">
                            <a href="{{ route('renew') }}">
                                <p class="{{ Route::is('renew')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>আবেদন পুনর্নবীকরণ</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('logout') }}">
                                <p class=""><i class="fa fa-cog pe-2"></i>লগ আউট</p>
                            </a>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-lg-9 col-md-6 col-sm-12">
                @include('flash_message')
                <div class="card">
                    <div class="card-header">
                        {{ trans('ngo_member.ngo_member')}}
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('ngoCommitteMemberStore') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                            @csrf
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('ngo_member.name')}}</label>
                                <input type="text" data-parsley-required name="name"  class="form-control" id="">
                            </div>
                           <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('ngo_member.designation')}}</label>
                                <input type="text" data-parsley-required name="desi" class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('ngo_member.date_of_birth')}}</label>
                                <input type="date" data-parsley-required name="dob" class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('ngo_member.nid_no')}}</label>
                                <input type="text" data-parsley-required name="nid_no"  class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('ngo_member.mobile_no')}}</label>
                                <input type="text" data-parsley-required name="phone" class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('ngo_member.fathers_name')}}</label>
                                <input type="text" data-parsley-required name="father_name" class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('ngo_member.present_address')}}</label>
                                <input type="text"class="form-control"  data-parsley-required name="present_address" id="exampleFormControlTextarea1"
                                          rows="2"/>
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('ngo_member.permanent_address')}}</label>
                                <input type="text"class="form-control" data-parsley-required  name="permanent_address"  id="exampleFormControlTextarea1"
                                          rows="2"/>
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('ngo_member.name_of_spouse')}}</label>
                                <input type="text" data-parsley-required name="name_supouse" class="form-control" id="">
                            </div>

                            {{-- <div class=" mb-3">
                                <label for="" class="form-label">Signature</label>
                                <input type="file" data-parsley-required accept=".jpg,.jpeg,.png" name="image" class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">Date</label>
                                <input type="date" data-parsley-required name="main_date" class="form-control" id="">
                            </div> --}}
                            <div class="d-grid d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-registration"
                                       >{{ trans('form 8_bn.add')}}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection

@section('script')

@endsection
