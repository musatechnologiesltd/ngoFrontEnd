<div class="upper_header">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="header_left_side">
                      @if(Session::get('locale') == 'en' ||  empty(session()->get('locale')))
                    <a href="{{ route('index') }}"><img src="{{ asset('/') }}public/front/assets/img/logo/logo.png" class="logo_img" alt="">
                        <h1>গণপ্রজাতন্ত্রী <br>বাংলাদেশ
                            সরকার </h1>
                    </a>

                    @else
                    <a href="{{ route('index') }}"><img src="{{ asset('/') }}public/front/assets/img/logo/logo.png" class="logo_img" alt="">
                        <h1>Government of the
                            People’s Republic of Bangladesh</h1>
                    </a>
                    @endif
                </div>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="header_right_text">
                   @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
                    <h1>এনজিও বিষয়ক ব্যুরো<br>
                        প্রধানমন্ত্রীর কার্যালয়
                    </h1>
                    @else
                    <h1>NGO Affairs Bureau <br>
                        Prime Minister's Office
                    </h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="second_header">
    <div class="container">
        <div class="second_header_box">
          @if(empty(session()->get('locale')))
            <div class="p-2">
                <button onclick="location.href = '{{ route('changeLanguage','en') }}';" class="btn button-sign lang_active_button">{{ trans('header.bangla')}}</button>
            </div>
            <div class="p-2">
                <button onclick="location.href = '{{ route('changeLanguage','sp') }}';" class="btn button-sign">English</button>
            </div>
          @else
          <div class="p-2">
                <button onclick="location.href = '{{ route('changeLanguage','en') }}';" class="btn button-sign  {{ session()->get('locale') == 'en' ? 'lang_active_button' : '' }}">{{ trans('header.bangla')}}</button>
            </div>
            <div class="p-2">
                <button onclick="location.href = '{{ route('changeLanguage','sp') }}';" class="btn button-sign {{ session()->get('locale') == 'sp' ? 'lang_active_button' : '' }}" >English</button>
            </div>

          @endif
           @if (Auth::check())
            <div class="p-2">
                <a class="btn button-sign" href="{{ route('dashboard') }}">{{ Auth::user()->user_name }}</a>
            </div>
          @else
          <div class="p-2">
                <a class="btn button-sign" href="{{ route('login') }}">{{ trans('header.sign_in')}}</a>
            </div>
          @endif

            <div class="p-2">
                <!--== Sidebar-Toggler ==-->
                <div class="sidebar_toggler">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

                <!--====== Sidebar ======-->
                <aside id="sidebar">
                    <div class="sidebar_content sidebar_head">
                        <h1>NGOAB Menu</h1>
                    </div>

                    <div class="sidebar_content sidebar_body">
                        <nav class="side_navlinks">
                            <ul>
                                <li>
                                     <a href="{{ route('index') }}">
                        <img src="{{ asset('/') }}public/front/assets/img/icon/home.png" alt="">
                        <h3>{{ trans('header.home')}} </h3>
                    </a>
                                </li>
                                <li>
                                      @if (Auth::check())
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('/') }}public/front/assets/img/icon/apply_online.png" alt="">
                        <h3>{{ trans('header.apply_online')}} </h3>
                    </a>
                    @else
                    <a href="{{ route('login') }}">
                        <img src="{{ asset('/') }}public/front/assets/img/icon/apply_online.png" alt="">
                        <h3>{{ trans('header.apply_online')}}</h3>
                    </a>


                    @endif
                                </li>
                                     @if (Auth::check())

             <?php
             $fdoneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)
                                           ->value('id');
             $ngo_status_list = DB::table('ngo_statuses')->where('fd_one_form_id',$fdoneFormId)->value('status');
              ?>

                @if(empty($ngo_status_list) || $ngo_status_list == 'Ongoing')

                <li>
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('/') }}public/front/assets/img/icon/renew.png" alt="">
                        <h3>{{ trans('header.renew_application')}}</h3>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('/') }}public/front/assets/img/icon/name_change.png" alt="">
                        <h3>{{ trans('header.name_change')}}</h3>
                    </a>
                </li>
                @else

                <li>
                    <a href="{{ route('renew') }}">
                        <img src="{{ asset('/') }}public/front/assets/img/icon/renew.png" alt="">
                        <h3>{{ trans('header.renew_application')}}</h3>
                    </a>
                </li>
                <li>
                    <a href="{{ route('nameChange') }}">
                        <img src="{{ asset('/') }}public/front/assets/img/icon/name_change.png" alt="">
                        <h3>{{ trans('header.name_change')}}</h3>
                    </a>
                </li>
                @endif

                @else
                <li>
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('/') }}public/front/assets/img/icon/renew.png" alt="">
                        <h3>{{ trans('header.renew_application')}}</h3>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('/') }}public/front/assets/img/icon/name_change.png" alt="">
                        <h3>{{ trans('header.name_change')}}</h3>
                    </a>
                </li>
                @endif
                                <li>
                                    <a href="{{ route('ngoInstructionPage') }}">
                        <img src="{{ asset('/') }}public/front/assets/img/icon/instruction.png" alt="">
                        <h3>{{ trans('header.instruction')}}</h3>
                    </a>
                                </li>
                                <li>
                                   <a href="{{ route('ngoRegistrationFeeList') }}">
                        <img src="{{ asset('/') }}public/front/assets/img/icon/fees.png" alt="">
                        <h3>{{ trans('header.registration_fee')}}</h3>
                    </a>
                                </li>
                                <li>
                                   <a href="{{ route('statusPage') }}">
                        <img src="{{ asset('/') }}public/front/assets/img/icon/status.png" alt="">
                        <h3>{{ trans('header.check_status')}}</h3>
                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="sidebar_content sidebar_foot">
                        <p>
                              @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
            &copy; <strong><span>এনজিও অনলাইন নিবন্ধন পোর্টাল, v১.0.0</span></strong>. সর্বস্বত্ব সংরক্ষিত.
            @else
            &copy; <strong><span>NGO Online Registration Portal, v1.0.0</span></strong>. All Rights Reserved.
            @endif
                        </p>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
