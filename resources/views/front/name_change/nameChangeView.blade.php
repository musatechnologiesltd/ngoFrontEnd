@extends('front.master.master')

@section('title')
এনজিওর নাম পরিবর্তন | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')




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
                                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                    <h4>{{ $fdOneFormInfo->organization_name_ban }}</h4>
                                    @else
                                    <h4>{{ $fdOneFormInfo->organization_name }}</h4>
                                    @endif
                                    <p class="text-secondary mb-1">{{ $fdOneFormInfo->name_of_head_in_bd }}</p>
                                    <p class="text-muted font-size-sm">{{ $fdOneFormInfo->organization_address }}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                       <div class="profile_link_box">
                            <a href="{{ route('dashboard') }}">
                                <p class="{{ Route::is('dashboard')  ? 'active_link' : '' }}"><i class="fa fa-user pe-2"></i>{{ trans('fd9.m1')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('nameChange') }}">
                                <p class="{{ Route::is('nameChange.view') || Route::is('nameChange')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.m2')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('renew') }}">
                                <p class="{{ Route::is('renew')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.m3')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fdNineForm.index') }}">
                                <p class="{{ Route::is('fdNineForm.index') || Route::is('fdNineForm.create') || Route::is('fdNineForm.create')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.nvisa')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fdNineOneForm.index') }}">
                                <p class="{{ Route::is('fdNineOneForm.index') ||  Route::is('fdNineOneForm.create') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd09formone')}}</p>
                            </a>
                        </div>


                        <div class="profile_link_box">
                            <a href="{{ route('fd6Form.index') }}">
                                <p class="{{ Route::is('fd6Form.index') ||  Route::is('fd6Form.create') || Route::is('fd6Form.view') || Route::is('fd2Form.create') || Route::is('fd2Form.index') || Route::is('fd6Form.edit') || Route::is('fd2Form.view') || Route::is('fd2Form.edit')? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd6')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fd7Form.index') }}">
                                <p class="{{ Route::is('fd7Form.index') ||  Route::is('fd7Form.create') || Route::is('fd7Form.view') || Route::is('addFd2DetailForFd7') || Route::is('editFd2DetailForFd7') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd7')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fc2Form.index') }}">
                                <p class="{{ Route::is('fc2Form.index') ||  Route::is('fc2Form.create') || Route::is('fc2Form.view') || Route::is('addFd2DetailForFc2') || Route::is('editFd2DetailForFc2') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fc2')}}</p>
                            </a>
                        </div>


                        <div class="profile_link_box">
                            <a href="{{ route('logout') }}">
                                <p class=""><i class="fa fa-cog pe-2"></i>{{ trans('fd9.l')}}</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <?php
$fdOneFormid = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->first();
            $name_change_list = DB::table('ngo_name_changes')->where('fd_one_form_id',$fdOneFormid->id)->latest()->value('status');




            ?>
            <div class="col-lg-9 col-md-6 col-sm-12">

                @include('flash_message')

                <div class="card">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="name_change_box">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="others_inner_section">
                                                <h1>এনজিও নাম পরিবর্তন তথ্য</h1>
                                                <div class="notice_underline"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="no_name_change pt-4">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>পূর্ববর্তী বাংলা নাম </td>
                                                <td>{{ $nameChangeInfo->previous_name_ban }}</td>
                                            </tr>
                                            <tr>
                                                <td>পূর্ববর্তী ইংরেজি নাম</td>
                                                <td>{{ $nameChangeInfo->previous_name_eng }}</td>
                                            </tr>
                                            <tr>
                                                <td>নতুন বাংলা নাম</td>
                                                <td>{{ $nameChangeInfo->present_name_ban }}</td>
                                            </tr>
                                            <tr>
                                                <td>নতুন ইংরেজি নাম</td>
                                                <td>{{ $nameChangeInfo->present_name_eng }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="no_name_change pt-4">
                                        <div class="others_inner_section mb-4">
                                            <h1>নাম পরিবর্তন সংক্রান্ত  সব নথি</h1>
                                            <div class="notice_underline"></div>
                                        </div>
                                        <div class="row">

                                            @foreach($nameChangeInfoDoc as $key=>$AllNameChangeInfoDoc)
                                            <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                                                <a href="">
                                                    <div class="card h-100">
                                                        <div class="card-body">
                                                            <div class="d-flex justify-content-center">
                                                                <img style="height:120px" src="{{ asset('/') }}public/front/assets/img/icon/pdf.png" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="card-footer text-center text-dark">



                                                            @if(($key+1) ==1)


                                                            <a target="_blank"  href="{{ route('nameChangeDocDownload',$AllNameChangeInfoDoc->id) }}" >
                                                                ০২টি জাতীয় পত্রিকায় ( বাংলা ও ইংরেজী পত্রিকায় "নাম পরিবর্তন বিষয়ে বিজ্ঞাপনের মূলকপি
                                                           </a>


                                                            @elseif(($key+1) ==2)
                                                            <a target="_blank"  href="{{ route('nameChangeDocDownload',$AllNameChangeInfoDoc->id) }}" >
                                                                নাম পরিবর্তন ফি বাবদ-২৬,০০০/- (ছাব্বিশ হাজার) টাকার (কোড নং-১-০৩২৩-০০০০- ১৮৩৬) চালানের মূলকপি এবং ১৫% ভ্যাট (কোড নং - ১-১১৩৩ -০০৩৫ - ০৩১১) প্রদানপূর্বক চালানের মূলকপিসহ
                                                           </a>
                                                           @elseif(($key+1) ==3)



                                                           <a target="_blank"  href="{{ route('nameChangeDocDownload',$AllNameChangeInfoDoc->id) }}" >
                                                            ফরম -৮ মোতাবেক নির্বাহী কমিটির তালিকা
                                                       </a>


                                                           @elseif(($key+1) ==4)

                                                           <a target="_blank"  href="{{ route('nameChangeDocDownload',$AllNameChangeInfoDoc->id) }}" >
                                                            নির্বাহী কমিটির সদস্যদের ভোটার আইডি কার্ডের ফটোকপিসহ সত্যায়িত পাসপোর্ট সাইজের ছবি
                                                           </a>


                                                           @elseif(($key+1) ==5)


                                                           <a target="_blank"  href="{{ route('nameChangeDocDownload',$AllNameChangeInfoDoc->id) }}" >
                                                            ৩০০/তিনশত) টাকার স্টাম্পে নাম পরিবর্তনের বিষয়ে এফিডেবিট এর কপি
                                                            </a>




                                                           @elseif(($key+1) ==6)

                                                           <a target="_blank"  href="{{ route('nameChangeDocDownload',$AllNameChangeInfoDoc->id) }}" >
                                                            এনজিও বিষয়ক ব্যুরোর মুল সনদপত্র
                                                            </a>

                                                           @elseif(($key+1) ==7)

                                                           <a target="_blank"  href="{{ route('nameChangeDocDownload',$AllNameChangeInfoDoc->id) }}" >
                                                            পরিবর্তিত নামে প্রাথমিক নিবন্ধন প্রদানকারী কর্তৃপক্ষের সত্যায়িত সনদপত্রের কপি
                                                            </a>

                                                           @elseif(($key+1) ==8)

                                                           <a target="_blank"  href="{{ route('nameChangeDocDownload',$AllNameChangeInfoDoc->id) }}" >
                                                            প্রাথমিক নিবন্ধন প্রদানকারী কর্তৃপক্ষের অনুমোদিত নির্বাহী কমিটির তালিকার সত্যায়িত কপি
                                                            </a>



                                                           @elseif(($key+1) ==9)

                                                           <a target="_blank"  href="{{ route('nameChangeDocDownload',$AllNameChangeInfoDoc->id) }}" >
                                                            সর্বশেষ সাধারণ সদস্যদের তালিকা
                                                            </a>

                                                            @elseif(($key+1) == 10)

                                                            <a target="_blank"  href="{{ route('nameChangeDocDownload',$AllNameChangeInfoDoc->id) }}" >
                                                                নাম পরিবর্তন সংক্রান্ত বিষয়ে সাধারণ সভার কা্যবিবরণীর (উপস্থিত সদস্যদের তালিকাসহ) সত্যায়িত কপি
                                                                </a>


                                                                @elseif(($key+1) == 11)

                                                                <a target="_blank"  href="{{ route('nameChangeDocDownload',$AllNameChangeInfoDoc->id) }}" >
                                                                    পূর্ববর্তী নামের সকল দায়-দায়িত্ব বর্তমানে পরিবর্তিত নামের সংস্থার উপর বর্তাইবে মর্মে অংগীকার নামা (সভাপতি ও সাধারণ সম্পাদক কর্তৃক স্বাক্ষরিত)।
                                                                    </a>

                                                                    @elseif(($key+1) == 12)

                                                                    <a target="_blank"  href="{{ route('nameChangeDocDownload',$AllNameChangeInfoDoc->id) }}" >
                                                                        দাখিলকৃত চালানের ডপর ১৫% ভ্যাট নির্ধারিত কোডে জমাপূর্বক চালানের মূলকলিসহ (কোড নং-১-১১৩৩-০০৩৫-০৩১১)
                                                                        </a>



                                                           @elseif(($key+1) ==13)

                                                           <a target="_blank"  href="{{ route('nameChangeDocDownload',$AllNameChangeInfoDoc->id) }}" >
                                                            ২০১০-২০১১ অর্থবছর হতে হালনাগাদ পর্যন্ত সংস্থার নিবন্ধন/নিবন্ধন নবায়ন /নাম পরিবর্তন /গঠনতন্ত্রের যে কোনো ধারা পরিবর্তনের বিষয়ের দাখিলকৃত ফি এর ১৫% বকেয়া ভ্যাট (যদি ইতিমধ্যে প্রদান করা হয়ে না থাকে ) সংশ্লিষ্ট কোডে
                                                            জমাপূর্বক চালানের মুলকপিসহ
                                                            </a>

                                                           @elseif(($key+1) ==14)

                                                           <a target="_blank"  href="{{ route('nameChangeDocDownload',$AllNameChangeInfoDoc->id) }}" >
                                                            গঠনতন্ত্র পরিবর্তন ফি বাবদ-১৩,০০০/ (তের হাজার) টাকার (কোড নং-১-০৩২৩-০০০০- ১৮৩৬) চালানের মূলকপি এবং ১৫% ভ্যাট (কোড নং - ১-১১৩৩ -০০৩৫ - ০৩১১) প্রদানপূর্বক চালানের মূলকপিসহ
                                                            </a>


                                                           @elseif(($key+1) ==15)

                                                           <a target="_blank"  href="{{ route('nameChangeDocDownload',$AllNameChangeInfoDoc->id) }}" >
                                                            প্রাথমিক নিবন্ধনকারী কতৃপক্ষের অনুমোদিতো গঠনতন্ত্রের সত্যায়িত কপি
                                                            </a>


                                                           @elseif(($key+1) ==16)


                                                           <a target="_blank"  href="{{ route('nameChangeDocDownload',$AllNameChangeInfoDoc->id) }}" >
                                                            সংস্থার চেয়ারম্যান ও সেক্রেটারি কর্তৃক যৌথ স্বাক্ষরিত গঠনতন্ত্র পরিচ্ছন্ন কপি
                                                            </a>


                                                           @elseif(($key+1) ==17)

                                                           <a target="_blank"  href="{{ route('nameChangeDocDownload',$AllNameChangeInfoDoc->id) }}" >
                                                            গঠনতন্ত্রের কোন ধারা, উপধারা পরিবর্তন ফি জমা প্রদানের চালানের মূলকপি
                                                            </a>

                                                           @elseif(($key+1) ==18)

                                                           <a target="_blank"  href="{{ route('nameChangeDocDownload',$AllNameChangeInfoDoc->id) }}" >
                                                            গঠনতন্ত্রের কোন ধারা, উপধারা পরিবর্তন ও সংযোজনের বিষয়ে সাধারণ সভার কার্যবিবরণীর সত্যায়িত কপি
                                                            </a>
                                                           @elseif(($key+1) ==19)

                                                           <a target="_blank"  href="{{ route('nameChangeDocDownload',$AllNameChangeInfoDoc->id) }}" >
                                                            পূর্ব গঠনতন্ত্র ও বর্তমান গঠনতন্ত্রের তুলনামূলক বিবরণী (প্রতি পাতায় সভাপতি ও সম্পাদকের যৌথ স্বাক্ষরসহ)
                                                            </a>
                                                           @endif









                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                            @endforeach

                                        </div>
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

@endsection
