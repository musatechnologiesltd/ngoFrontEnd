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
                                <p class="{{ Route::is('nVisa.index') || Route::is('nVisa.create') || Route::is('fdNineForm.create') || Route::is('fdNineOneForm.create') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.nvisa')}}</p>
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
                                <div class="col-lg-6 col-sm-12">
                                    <div class="others_inner_section">
                                        <h1>এন-ভিসা আবেদন</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-3 ">
                                <div class="card-header custom-color">
                                    নিরাপত্তা ছাড়পত্রের জন্য আবেদন
                                </div>
                                <div class="card-body">
                                    <div class="card card-custom-color">
                                        <div class="card-header custom-color">
                                            সাধারণ  তথ্য
                                        </div>
                                        <div class="card-body">
                                            <form action="">
                                                <div class="row">
                                                    <div class="col-lg-9 col-sm-12">
                                                        <div class="row">
                                                            <div class="mb-3 col-lg-6">
                                                                <label for="" class="form-label">প্রস্তাবিত অনুমোদনের সময়কাল <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" id=""
                                                                       placeholder="এক (0১) বছর" required>
                                                            </div>
                                                            <div class="mb-3 col-lg-6">
                                                                <label for="" class="form-label">কার্যকর এর  তারিখ<span
                                                                            class="text-danger">*</span></label>
                                                                <input type="text" class="form-control datepicker"
                                                                       placeholder="কার্যকর এর তারিখ" required>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="" class="col-sm-6 col-form-label">জারি করা ওয়ার্ক পারমিট এর রেফারেন্স নং <span
                                                                        class="text-danger">*</span></label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" id="" required>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="" class="col-sm-6 col-form-label">ভিসার সুপারিশ পত্র <span class="text-danger">*</span></label>
                                                            <div class="col-sm-6">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name=""
                                                                           id="" value="Online">
                                                                    <label class="form-check-label"
                                                                           for="">অনলাইন</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name=""
                                                                           id="" value="Manually">
                                                                    <label class="form-check-label"
                                                                           for="">ম্যানুয়াল</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="" class="col-sm-6 col-form-label">ভিসার সুপারিশ পত্রের রেফারেন্স নং  <span
                                                                        class="text-danger">*</span></label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" id="">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="" class="col-sm-6 col-form-label">ডিপার্টমেন্ট
                                                                <span
                                                                        class="text-danger">*</span></label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" id="">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="" class="col-sm-6 col-form-label">ওয়ার্ক পারমিটের ধরন<span class="text-danger">*</span></label>
                                                            <div class="col-sm-6">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name=""
                                                                           id="" value="New Commercial">
                                                                    <label class="form-check-label" for="">নিউ কমার্শিয়াল</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name=""
                                                                           id="" value="New Industrial">
                                                                    <label class="form-check-label" for="">নিউ ইন্ডাস্ট্রিয়াল</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="" class="col-sm-6 col-form-label">ফরওয়ার্ডিং লেটার<span
                                                                        class="text-danger">*</span></label>
                                                            <div class="col-sm-6">
                                                                <input type="file" class="form-control" id="">
                                                                <div id="emailHelp" class="form-text">We'll never share
                                                                    your email with anyone else.[File Format: *.pdf,
                                                                    File size (1-3) MB]
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-3 col-sm-12">
                                                        <div class="nvisa-avatar">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" id="output">
                                                        </div>
                                                        <input type="file" accept="image/*"
                                                        onchange="loadFile(event)" name="image" id="upload" hidden/>
                                                 <label class="login_upload_button" for="upload">Choose
                                                     Image</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-3 ">
                                <div class="card-header custom-color">
                                    ক . স্পনসর/নিয়োগকর্তার বিশেষ বিবরণ
                                </div>
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <label for="" class="col-sm-6 col-form-label">এন্টারপ্রাইজের নাম (সংস্থা/কোম্পানী) <span
                                                    class="text-danger">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="" class="col-sm-12 col-form-label">এন্টারপ্রাইজের ঠিকানা (শুধুমাত্র বাংলাদেশ)<span
                                                    class="text-danger">*</span></label>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">বাড়ি/প্লট/হোল্ডিং/গ্রাম:  <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="বাড়ি/প্লট/হোল্ডিং/গ্রাম">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">ফ্ল্যাট/অ্যাপার্টমেন্ট/ফ্লোর:
                                        <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control"
                                                   placeholder="ফ্ল্যাট/অ্যাপার্টমেন্ট/ফ্লোর">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">রাস্তার নম্বর:<span
                                                        class="text-danger">*</span></label>
                                            <input type="text" class="form-control"
                                                   placeholder="রাস্তার নম্বর">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">পোস্ট/জিপ কোড:</label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="পোস্ট/জিপ কোড">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">পোস্ট অফিস: </label>
                                            <input type="text" class="form-control"
                                                   placeholder="পোস্ট অফিস">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">টেলিফোন নম্বর:<span
                                                        class="text-danger">*</span></label>
                                            <input type="text" class="form-control"
                                                   placeholder="টেলিফোন নম্বর">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">শহর/জেলা: <span
                                                        class="text-danger">*</span></label>
                                                        <input type="text" class="form-control"
                                                        placeholder="শহর/জেলা">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">থানা/উপজেলা:                                                <span
                                                        class="text-danger">*</span></label>
                                                        <input type="text" class="form-control"
                                                        placeholder="থানা/উপজেলা">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">ফ্যাক্স নম্বর:</label>
                                            <input type="text" class="form-control"
                                                   placeholder="ফ্যাক্স নম্বর">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">ইমেল:<span
                                                        class="text-danger">*</span></label>
                                            <input type="email" class="form-control"
                                                   placeholder="ইমেল">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">সংগঠনের ধরন:<span
                                                        class="text-danger">*</span></label>
                                            <select name="" id="" class="form-control">
                                                <option value="NGO">এনজিও</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">ব্যবসার প্রকৃতি:</label>
                                            <input type="email" class="form-control"
                                                   placeholder="ব্যবসার প্রকৃতি">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">স্বীকৃত মূলধন:</label>
                                            <input type="email" class="form-control"
                                                   placeholder="স্বীকৃত মূলধন">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">পরিশোধিত মূলধন:</label>
                                            <input type="email" class="form-control"
                                                   placeholder="পরিশোধিত মূলধন">
                                        </div>
                                        <div class="mb-3 col-lg-8">
                                            <label for="" class="form-label">গত ১২ মাসে প্রাপ্ত রেমিট্যান্স: </label>
                                            <input type="email" class="form-control"
                                                   placeholder="গত ১২ মাসে প্রাপ্ত রেমিট্যান্স">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">শিল্পের ধরন:</label>
                                            <select name="" id="" class="form-control">
                                                <option value="NGO">এনজিও</option>

                                            </select>
                                        </div>
                                        <div class="mb-3 col-lg-8">
                                            <label for="" class="form-label">কোম্পানি বোর্ডের সুপারিশ:</label>
                                            <input type="email" class="form-control"
                                                   placeholder="কোম্পানি বোর্ডের সুপারিশ">
                                        </div>
                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">স্থানীয়, বিদেশী বা যৌথ উদ্যোগ কোম্পানি কিনা:</label>
                                            <input type="email" class="form-control"
                                                   placeholder="স্থানীয়, বিদেশী বা যৌথ উদ্যোগ কোম্পানি কিনা">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-3 ">
                                <div class="card-header custom-color">
                                    খ. বিদেশী দায়িত্বশীল এর বিশেষ বিবরণ
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">বিদেশী নাগরিকের নাম: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="বিদেশী নাগরিকের নাম">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">জাতীয়তা:<span
                                                        class="text-danger">*</span></label>
                                            <select name="" class="form-control" id="">
                                                <option value="">Select One</option>
                                                <option value="">Select Two</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">পাসপোর্ট নম্বর:<span
                                                        class="text-danger">*</span></label>
                                            <input type="text" class="form-control"
                                                   placeholder="পাসপোর্ট নম্বর">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">ইস্যু তারিখ : <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control datepicker" id=""
                                                   placeholder="ইস্যু তারিখ">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">ইস্যু স্থান: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="ইস্যু স্থান">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">মেয়াদ শেষ হওয়ার তারিখ: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control datepicker" id=""
                                                   placeholder="মেয়াদ শেষ হওয়ার তারিখ">
                                        </div>
                                        <div class="mb-3 col-sm-12 ">
                                            <label for="" class="col-form-label">স্থায়ী ঠিকানা</label>
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">দেশ: <span class="text-danger">*</span></label>
                                            <select name="" class="form-control" id="">
                                                <option value="">Select One</option>
                                                <option value="">Select Two</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">বাড়ি/প্লট/হোল্ডিং নম্বর: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="বাড়ি/প্লট/হোল্ডিং নম্বর">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">ফ্ল্যাট/অ্যাপার্টমেন্ট/ফ্লোর নম্বর: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="ফ্ল্যাট/অ্যাপার্টমেন্ট/ফ্লোর নম্বর">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">রাস্তার নাম/রাস্তার নম্বর: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="রাস্তার নাম/রাস্তার নম্বর">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">পোস্ট/জিপ কোড: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="পোস্ট/জিপ কোড">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">রাজ্য/প্রদেশ: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="রাজ্য/প্রদেশ">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">টেলিফোন নম্বর: <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id=""
                                                   placeholder="টেলিফোন নম্বর">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">শহর: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="শহর">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">ফ্যাক্স নম্বর: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="ফ্যাক্স নম্বর">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">ইমেল: <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" id=""
                                                   placeholder="ইমেল">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">জন্ম তারিখ: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control datepicker" id=""
                                                   placeholder="জন্ম তারিখ">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">বৈবাহিক অবস্থা: <span class="text-danger">*</span></label>
                                            <select name="" class="form-control" id="">
                                                <option value="">Select One</option>
                                                <option value="">Select Two</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-3 ">
                                <div class="card-header custom-color">
                                    গ.কর্মসংস্থান এর  তথ্য
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">নিয়োগকৃত পদের নাম (পদবী):<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="নিয়োগকৃত পদের নাম (পদবী)">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">বাংলাদেশে আগমনের তারিখ: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="বাংলাদেশে আগমনের তারিখ">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">ভিসার ধরন:  <span class="text-danger">*</span></label>
                                            <select name="" class="form-control" id="">
                                                <option value="">Select one</option>
                                                <option value="">Select two</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">: <span class="text-danger">*</span></label>
                                            <select name="" class="form-control" id="">
                                                <option value="">Select one</option>
                                                <option value="">Select two</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">প্রথম নিয়োগের তারিখ: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control datepicker" id=""
                                                   placeholder="প্রথম নিয়োগের তারিখ">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">কাঙ্খিত কার্যকরী তারিখ: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control datepicker" id=""
                                                   placeholder="কাঙ্খিত কার্যকরী তারিখ">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">পছন্দসই সময়কাল: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="" value="One (01) year" readonly
                                                   placeholder="পছন্দসই সময়কাল">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">সংক্ষিপ্ত কাজের বিবরণ: <span class="text-danger">*</span></label>
                                            <textarea name="" class="form-control" id="" cols="30" rows="4"></textarea>
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">কর্মচারী ন্যায্যতা: <span class="text-danger">*</span></label>
                                            <textarea name="" class="form-control" id="" cols="30" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-3 ">
                                <div class="card-header custom-color">
                                    ঘ. কর্মস্থলের ঠিকানা
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">House/Plot/Holding/Village: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">Flat/Appartment/Floor: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">Road Number: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="Organization Road Number">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">City/District: <span class="text-danger">*</span></label>
                                            <select name="" class="form-control" id="">
                                                <option value="">Select One</option>
                                                <option value="">Select Two</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">Thana/Upazilla: <span class="text-danger">*</span></label>
                                            <select name="" class="form-control" id="">
                                                <option value="">Select One</option>
                                                <option value="">Select Two</option>
                                            </select>
                                        </div>

                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">Email: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">Type of Organization: <span class="text-danger">*</span></label>
                                            <select name="" class="form-control" id="">
                                                <option value="">Select One</option>
                                                <option value="">Select Two</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">Contact Person Mobile Number: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-3 ">
                                <div class="card-header custom-color">
                                    ঙ. কম্পেন্সেশন এন্ড বেনিফিটস
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th>Salary Structure</th>
                                            <th>Payble Locally</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Payment</td>
                                            <td>Amount</td>
                                            <td>Currency</td>
                                        </tr>
                                        <tr>
                                            <td>a. Basic Salary</td>
                                            <td>
                                                <select class="form-control" name="" id="">
                                                    <option value="">Select One</option>
                                                    <option value="">Select Two</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="">
                                            </td>
                                            <td>
                                                <select class="form-control" name="" id="">
                                                    <option value="">Select One</option>
                                                    <option value="">Select Two</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>b. Overseas allowance</td>
                                            <td>
                                                <select class="form-control" name="" id="">
                                                    <option value="">Select One</option>
                                                    <option value="">Select Two</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="">
                                            </td>
                                            <td>
                                                <select class="form-control" name="" id="">
                                                    <option value="">Select One</option>
                                                    <option value="">Select Two</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>c. House rent/Accommodation</td>
                                            <td>
                                                <select class="form-control" name="" id="">
                                                    <option value="">Select One</option>
                                                    <option value="">Select Two</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="">
                                            </td>
                                            <td>
                                                <select class="form-control" name="" id="">
                                                    <option value="">Select One</option>
                                                    <option value="">Select Two</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>d. Conveyance</td>
                                            <td>
                                                <select class="form-control" name="" id="">
                                                    <option value="">Select One</option>
                                                    <option value="">Select Two</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="">
                                            </td>
                                            <td>
                                                <select class="form-control" name="" id="">
                                                    <option value="">Select One</option>
                                                    <option value="">Select Two</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>e. Entertainmemt allowance</td>
                                            <td>
                                                <select class="form-control" name="" id="">
                                                    <option value="">Select One</option>
                                                    <option value="">Select Two</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="">
                                            </td>
                                            <td>
                                                <select class="form-control" name="" id="">
                                                    <option value="">Select One</option>
                                                    <option value="">Select Two</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>f. Medical allowance</td>
                                            <td>
                                                <select class="form-control" name="" id="">
                                                    <option value="">Select One</option>
                                                    <option value="">Select Two</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="">
                                            </td>
                                            <td>
                                                <select class="form-control" name="" id="">
                                                    <option value="">Select One</option>
                                                    <option value="">Select Two</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>g. Annual Bonus </td>
                                            <td>
                                                <select class="form-control" name="" id="">
                                                    <option value="">Select One</option>
                                                    <option value="">Select Two</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="">
                                            </td>
                                            <td>
                                                <select class="form-control" name="" id="">
                                                    <option value="">Select One</option>
                                                    <option value="">Select Two</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>h. Other fringe benefits, if any</td>
                                            <td colspan="3">
                                                <input type="text" class="form-control" id="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>i. Any Particular Comments of remarks</td>
                                            <td colspan="3">
                                                <input type="text" class="form-control" id="">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="card mt-3 ">
                                <div class="card-header custom-color">
                                    চ. অফিসের জনবল
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th colspan="3">Local</th>
                                            <th colspan="3">Foreign (b)</th>
                                            <th rowspan="2">Grand Total <br> (a+b)</th>
                                            <th colspan="2"></th>
                                        </tr>
                                        <tr>
                                            <td>Executive</td>
                                            <td>Supporting Staff</td>
                                            <td>Total</td>
                                            <td>Executive</td>
                                            <td>Supporting Staff</td>
                                            <td>Total</td>
                                            <td>Local</td>
                                            <td>Foreign</td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" id=""></td>
                                            <td><input type="text" class="form-control" id=""></td>
                                            <td><input type="text" class="form-control" id=""></td>
                                            <td><input type="text" class="form-control" id=""></td>
                                            <td><input type="text" class="form-control" id=""></td>
                                            <td><input type="text" class="form-control" id=""></td>
                                            <td><input type="text" class="form-control" id=""></td>
                                            <td><input type="text" class="form-control" id=""></td>
                                            <td><input type="text" class="form-control" id=""></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="card mt-3 ">
                                <div class="card-header custom-color">
                                    ছ. ওয়ার্ক পারমিটের জন্য প্রয়োজনীয় নথি
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>#</th>
                                            <th>Required Attachment</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Copy of buyer's nomination letter in case of employment of buyer;s representative</td>
                                            <td><input type="file" class="form-control" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Copy of registration letter of board of investment, if not submitted earlier</td>
                                            <td><input type="file" class="form-control" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Copy of service contract/agreement/ appointment letter in case of employee</td>
                                            <td><input type="file" class="form-control" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Decision of the board of the directors of the company regarding employment of foreign nationals (In case of limited company) showing salary & other facility only signed by directors present in the meeting</td>
                                            <td><input type="file" class="form-control" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Memorandum & Articles of Association of the company duly signed by shareholders along with certificate of incorporation (In case of limited company), if not sumitted earlier</td>
                                            <td><input type="file" class="form-control" id=""></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Photocopy of passport with E-type visa for employees/PI-type visa for Investors</td>
                                            <td><input type="file" class="form-control" id=""></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="card mt-3 ">
                                <div class="card-header custom-color">
                                    জ. প্রতিষ্ঠানের অনুমোদিত ব্যক্তি
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">Organization Name: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">Organization House No: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">Organization Flat No: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">Organization Road No: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">Organization Thana: <span class="text-danger">*</span></label>
                                            <select name="" class="form-control" id="">
                                                <option value="">Select One</option>
                                                <option value="">Select Two</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">Organization Post Office: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">Organization District: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">Organization Mobile: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">Submission Date: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control datepicker" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">Expatriate Name: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <label for="" class="form-label">Expatriate Email: <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" id=""
                                                   placeholder="">
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

@section('script')
<script>
    var loadFile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function () {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
@endsection
