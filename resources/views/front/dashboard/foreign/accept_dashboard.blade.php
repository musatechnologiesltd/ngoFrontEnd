@extends('front.master.master')

@section('title')
{{ trans('first_info.dash')}} | {{ trans('header.ngo_ab')}}
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
                  @include('front.include.acceptSidebar')
                </div>
            </div>
            <div class="col-lg-9 col-md-6 col-sm-12">
                @include('flash_message')
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home"
                                        type="button" role="tab" aria-controls="home" aria-selected="true">হোম
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="messages-tab" data-bs-toggle="tab"
                                        data-bs-target="#messages"
                                        type="button" role="tab" aria-controls="messages" aria-selected="false">
                                    নথিপত্র
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="settings-tab" data-bs-toggle="tab"
                                        data-bs-target="#settings"
                                        type="button" role="tab" aria-controls="settings" aria-selected="false">সেটিংস
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <!--end col-->
                                    <div class="col-xxl-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-3">এনজিও প্রোফাইল</h5>
                                                <div class="profile_about">
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td>নিবন্ধন নম্বর</td>
                                                            <td>{{ $ngo_list_all->registration_number }}</td>
                                                        </tr>

                                                      <?php

                                                      $allEnglishCountry = DB::table('countries')->where('country_name_bangla',$ngo_list_all->country_of_origin)->value('country_name_english');

                                                      ?>
                                                        <tr>
                                                            <td>দেশ</td>
                                                            <td>{{ $ngo_list_all->country_of_origin}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>সংস্থা প্রধান এর  তথ্য</td>
                                                            <td>Name: {{ $ngo_list_all->name_of_head_in_bd }} <br> Address: {{ $ngo_list_all->address_of_head_office }} <br> Phone Number: {{ $ngo_list_all->phone }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>প্রস্তাবিত এলাকা</td>
                                                            <td>{{ $ngo_list_all->district }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <?php



$fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');


$renew_list_all = DB::table('ngo_renews')->where('fd_one_form_id',$fdOneFormId)->get();

//dd($renew_list_all);

                                        ?>

                                        <div class="row mt-3">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header align-items-center d-flex">
                                                        <h4 class="card-title mb-0  me-2">সাম্প্রতিক কার্যকলাপ</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="profile-timeline">
                                                            <div class="d-flex">

                                                                @if(count($name_change_list) == 0   && count($name_change_list_r) == 0)

                                                                <div class="flex-grow-1 ms-3">
                                                                    <h6 class="fs-14 mb-1">
                                                                  কোন কার্যকলাপ নেই
                                                                    </h6>

                                                                </div>
                                                                @else
                                                                @foreach($name_change_list as $all_name_change_list)
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h6 class="fs-14 mb-1">
                                                             নাম পরিবর্তনের অনুরোধ
                                                                    </h6>
                                                                    <small class="text-muted">তারিখ: {{ $all_name_change_list->created_at->format('d-M-Y')}} &
                                                                        সময়: {{ $all_name_change_list->time_for_api }}</small>
                                                                </div>
                                                                @endforeach

                                                                @foreach($name_change_list_r as $all_name_change_list)
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h6 class="fs-14 mb-1">
রিনিউ রিকুয়েস্ট
                                                                    </h6>
                                                                    <small class="text-muted">তারিখ:{{ $all_name_change_list->created_at->format('d-M-Y')}} &
                                                                        সময়:{{ $all_name_change_list->time_for_api }}</small>
                                                                </div>
                                                                @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <!--end col-->
                                </div>
                            </div>
                            <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-4">
                                            <h5 class="card-title flex-grow-1 mb-0">নথিপত্র</h5>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                    <table class="table table-borderless align-middle mb-0">
                                                        <thead class="table-light">
                                                        <tr>
                                                            <th scope="col">ফাইলের নাম</th>
                                                            <th scope="col">টাইপ</th>

                                                            <th scope="col">আপলোড এর তারিখ </th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-soft-primary text-primary rounded fs-20">
                                                                            <i class="ri-file-zip-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h6 class="fs-15 mb-0">
                                                                            <a target="_blank" href="{{ route('formOnePdf',['main_id'=>$ngo_list_all->user_id,'id'=>'plan']) }}" >পরিচালন পরিকল্পনা</a>
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>Pdf File</td>

                                                            <td>{{ $ngo_list_all->created_at->format('d-M-Y')}}</td>

                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-soft-primary text-primary rounded fs-20">
                                                                            <i class="ri-file-zip-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h6 class="fs-15 mb-0"><a
                                                                            target="_blank" href="{{ route('formOnePdf',['main_id'=>$ngo_list_all->user_id,'id'=>'treasury_bill']) }}">চালানের কপি</a>
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>Pdf File</td>

                                                            <td>{{ $ngo_list_all->created_at->format('d-M-Y')}}</td>

                                                        </tr>


                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-soft-primary text-primary rounded fs-20">
                                                                            <i class="ri-file-zip-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h6 class="fs-15 mb-0"><a
                                                                            target="_blank" href="{{ route('formOnePdf',['main_id'=>$ngo_list_all->user_id,'id'=>'treasury_bill']) }}">ট্রেজারি চালানের মূলকপি</a>
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>Pdf File</td>

                                                            <td>{{ $ngo_list_all->created_at->format('d-M-Y')}}</td>

                                                        </tr>


                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-soft-primary text-primary rounded fs-20">
                                                                            <i class="ri-file-zip-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h6 class="fs-15 mb-0"><a
                                                                            target="_blank" href="{{ route('formOnePdf',['main_id'=>$ngo_list_all->user_id,'id'=>'final_pdf']) }}">কর্মকর্তার স্বাক্ষর ও তারিখ সহ ফরম - ০১ এর ফাইনাল কপি</a>
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>Pdf File</td>

                                                            <td>{{ $ngo_list_all->updated_at->format('d-M-Y')}}</td>

                                                        </tr>


                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-soft-primary text-primary rounded fs-20">
                                                                            <i class="ri-file-zip-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h6 class="fs-15 mb-0"><a target="_blank"
                                                                                    href="{{ route('formEightPdf',['main_id'=>$ngo_list_all->user_id]) }}">কর্মকর্তার স্বাক্ষর ও তারিখ সহ ফরম - ০৮ এর ফাইনাল কপি</a>
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>Pdf File</td>

                                                            <td>{{ $ngo_list_all_form_eight->updated_at->format('d-M-Y')}}</td>

                                                        </tr>

                                                        @foreach($all_source_of_fund as $all_get_all_source_of_fund_data)
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-soft-primary text-primary rounded fs-20">
                                                                            <i class="ri-file-zip-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h6 class="fs-15 mb-0"><a target="_blank"
                                                                                    href="{{ route('sourceOfFund',$all_get_all_source_of_fund_data->id ) }}">সম্ভাব্য দাতার কাছ থেকে প্রতিশ্রুতির চিঠি(দাতা সংস্থার নাম)</a>
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>Pdf File</td>

                                                            <td>{{ $all_get_all_source_of_fund_data->created_at->format('d-M-Y')}}</td>

                                                        </tr>
                                                        @endforeach



                                                        @foreach($form_ngo_data_doc as $key=>$all_get_all_source_of_fund_data)

                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-soft-primary text-primary rounded fs-20">
                                                                            <i class="ri-file-zip-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        @if($key+1 == 1)
                                                                        <h6 class="fs-15 mb-0"><a target="_blank"
                                                                                    href="{{ route('ngoOtherDocument',$all_get_all_source_of_fund_data->id ) }}">
                                                                                     @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                                    <h6>কমিটির তালিকা ও নিবন্ধন সনদপত্রের সত্যায়িত অনুলিপি</h6>
                                                                                    @else

                                                                                    <h6>Executive committee of primary registering authority and attested copy</h6>
                                                                                    @endif
                                                                                </a>
                                                                        </h6>
                                                                        @elseif($key+1 == 2)
                                                                        <h6 class="fs-15 mb-0"><a target="_blank"
                                                                            href="{{ route('ngoOtherDocument',$all_get_all_source_of_fund_data->id ) }}">
                                                                            @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                    <h6>গঠনতন্ত্রের সত্যায়িত অনুলিপি</h6>
                    @else

                    <h6>Attested copy of constitution</h6>
                    @endif
                                                                        </a>
                                                                </h6>
                                                                        @elseif($key+1 == 3)
                                                                        <h6 class="fs-15 mb-0"><a target="_blank"
                                                                            href="{{ route('ngoOtherDocument',$all_get_all_source_of_fund_data->id ) }}">
                                                                            @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                            <h6>সংস্থার কার্যক্রম প্রতিবেদন</h6>
                                                                            @else

                                                                            <h6>Activity report of the organization</h6>
                                                                            @endif
                                                                        </a>
                                                                </h6>
                                                                        @elseif($key+1 == 4)
                                                                        <h6 class="fs-15 mb-0"><a target="_blank"
                                                                            href="{{ route('ngoOtherDocument',$all_get_all_source_of_fund_data->id ) }}">
                                                                            @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                            <h6>দাতা সংস্হার প্রতিশুতিপত্র</h6>
                                                                            @else

                                                                            <h6>Donors Receipt</h6>
                                                                            @endif
                                                                        </a>
                                                                </h6>
                                                                        @elseif($key+1 == 5)
                                                                        <h6 class="fs-15 mb-0"><a target="_blank"
                                                                            href="{{ route('ngoOtherDocument',$all_get_all_source_of_fund_data->id ) }}">
                                                                            @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                            <h6>সাধারণ সভার কার্যবিবরণীর সত্যায়িত অনুলিপি</h6>
                                                                            @else

                                                                            <h6>Attested copy of the minutes of the general meeting regarding</h6>
                                                                            @endif
                                                                        </a>
                                                                </h6>

                                                                        @elseif($key+1 == 6)
                                                                        <h6 class="fs-15 mb-0"><a target="_blank"
                                                                            href="{{ route('ngoOtherDocument',$all_get_all_source_of_fund_data->id ) }}">

                                                                            @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                                            <h6>সংস্থার সাধারণ সদস্যদের নামের তালিকা</h6>
                                                                            @else

                                                                            <h6>LIST OF NAMES OF GENERAL MEMBERS OF THE ORGANIZATION</h6>
                                                                            @endif

                                                                        </a>
                                                                </h6>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>Pdf File</td>

                                                            <td>{{ $all_get_all_source_of_fund_data->created_at->format('d-M-Y')}}</td>

                                                        </tr>
                                                        @endforeach


                                                        @foreach($form_member_data_doc as $key=>$all_get_all_source_of_fund_data)

                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-soft-primary text-primary rounded fs-20">
                                                                            <i class="ri-file-zip-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h6 class="fs-15 mb-0"><a target="_blank"
                                                                                    href="{{ route('ngoMemberDocument',$all_get_all_source_of_fund_data->id ) }}">সাধারণ সদস্যদের নথি  {{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</a>
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>Pdf File</td>

                                                            <td>{{ $all_get_all_source_of_fund_data->created_at->format('d-M-Y')}}</td>

                                                        </tr>
                                                        @endforeach


                                                        @foreach($get_all_data_other as $key=>$all_get_all_source_of_fund_data)
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-soft-primary text-primary rounded fs-20">
                                                                            <i class="ri-file-zip-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 flex-grow-1">
                                                                        <h6 class="fs-15 mb-0"><a target="_blank"
                                                                                    href="{{ route('otherPdfFromFDOneForm',$all_get_all_source_of_fund_data->id ) }}">অন্যান্য পিডিএফ কপি {{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</a>
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>Pdf File</td>

                                                            <td>{{ $all_get_all_source_of_fund_data->created_at->format('d-M-Y')}}</td>

                                                        </tr>
                                                        @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="post" action="{{ route('register.update') }}"  enctype="multipart/form-data" id="form" data-parsley-validate="">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">{{ trans('header.person_name')}}</label>
                                                <input type="text" value="{{ Auth::user()->user_name }}" class="form-control" name="name" id="">

                                                <input type="hidden" value="{{ Auth::user()->id }}" class="form-control" name="id" id="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">{{ trans('header.email')}}</label>
                                                <input type="email" value="{{ Auth::user()->user_email }}" class="form-control" name="email" id="" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">{{ trans('header.password')}}</label>
                                                <input type="password" class="form-control" name="password" id="">
                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">প্রোফাইল ছবি</label>
                                                <input type="file" class="form-control" name="user_image"  id="">
                                            </div>


                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">{{ trans('header.phone_number')}}</label>
                                                <input type="text" value="{{ Auth::user()->user_phone }}" class="form-control" name="phone" id="">
                                                {{-- <div id="" class="form-text">Must be use valid phone number for varification</div> --}}
                                            </div>
                                            <div class="d-grid d-md-flex justify-content-md-end">
                                                <button type="submit" class="btn btn-registration">{{ trans('first_info.update1')}}</button>
                                            </div>
                                        </form>
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
