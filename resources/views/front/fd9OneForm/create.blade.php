@extends('front.master.master')

@section('title')
{{ trans('fd9.nvisa')}} | {{ trans('header.ngo_ab')}}
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
                                <p class="{{ Route::is('nameChange')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>এনজিওর নাম পরিবর্তন</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('renew') }}">
                                <p class="{{ Route::is('renew')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>আবেদন পুনর্নবীকরণ</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('nVisa.index') }}">
                                <p class="{{ Route::is('nVisa.index') || Route::is('nVisa.create') || Route::is('fdNineForm.create')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.nvisa')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fdNineOneForm.index') }}">
                                <p class="{{ Route::is('fdNineOneForm.index') ||  Route::is('fdNineOneForm.create') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd09formone')}}</p>
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
                <div class="card">
                    <div class="card-body">
                        <div class="name_change_box">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="others_inner_section">
                                        <h1>Application Form for Work Permit (Permit) of Foreign Expert, Advisor,
                                            Officer or Volunteer</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-3 card-custom-color">
                                <div class="card-body">

                                    <div class="form9_upper_box">
                                        <h3>এফডি-৯(১) ফরম</h3>
                                        <h4>বিদেশি বিশেষজ্ঞ, উপদেষ্টা, কর্মকর্তা বা স্বেচ্ছাসেবী এর ওয়ার্ক পারমিটের
                                            (কার্যানুমতি) আবেদন ফরম</h4>

                                        <div>
                                            <p>বরাবর <br>
                                                মহাপরিচালক <br>
                                                এনজিও বিষয় ব্যুরো <br>
                                                প্রধানমন্ত্রীর কার্যালয়</p>
                                            <p>নিষয়ঃ সংস্থার বিদেশি বিশেষজ্ঞউপদেষ্টা/কর্মকর্ত/সেচ্ছাসেবী “<input
                                                        type="text" class="form-control custom-form"> ”' এর ওয়ার্ক পারমিট প্রসঙ্গে।
                                            </p>
                                            <p>
                                                সূত্র: এনজিও বিষয়ক ব্যুরোর স্মারক নম্বর
                                                <input type="text" class="form-control custom-form" id="" placeholder=""> তারিখ
                                            </p>

                                            <p class="mt-3">
                                                উপর্যুক্ত বিষয় ও সূত্রের বরাতে <input type="text" class="form-control custom-form"
                                                                                      id="" placeholder=""> সংস্থার
                                                <input type="text" class="form-control custom-form" id="" placeholder=""> প্রকল্পের
                                                আওতায় <input type="text" class="form-control custom-form" id="" placeholder="">
                                                হিসেবে বিদেশী বিশেষজ্ঞ/ উপদেষ্টা/কর্মকর্তা/স্বেচ্ছাসেবী <input
                                                        type="text" class="form-control custom-form" id="" placeholder=""> কে <input
                                                        type="text" class="form-control custom-form" id="" placeholder=""> খ্রি:
                                                পর্যন্ত সময়ের জন্য নিয়োগ করা হয়েছে। সংস্থার অনুকূলে উক্ত ব্যাক্তির
                                                অনুমোদিত সময়ের জন্য ওয়ার্ক পারমিট ইস্যু করার জন্য ওয়ার্ক পারমিট ইস্যু
                                                করার জন্য একসাথে নিম্ন বর্ণিত কাগজপত্র সংযুক্ত করা হল:
                                            </p>
                                            <ul>
                                                <li>নিয়োগপত্র সত্যায়ন প্রমাণক :  <input type="text" class="form-control custom-form"
                                                                                        id="" placeholder=""></li>
                                                <li>ফর্ম ৯ এর কপি: <input type="text" class="form-control custom-form"
                                                                         id="" placeholder=""></li>
                                                <li>ছবি: <input type="text" class="form-control custom-form"
                                                               id="" placeholder=""></li>
                                                <li>এন ভিসা নিয়ে আগমনের তারিখ (প্রমানসহ): <input type="text" class="form-control custom-form"
                                                                                                id="" placeholder=""></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="d-grid d-md-flex justify-content-md-end">
                                        <button type="button" class="btn btn-registration"
                                                onclick="location.href = '#';">Submit Information
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
