@extends('front.master.master')

@section('title')
{{ trans('fd9.nvisa')}}gg | {{ trans('header.ngo_ab')}}
@endsection

@section('css')
<style>

.nav-link.active{

    background-color: #075E24 !important;
color:white !important;
}
.nav-link {

    color:black;
}
    </style>
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
                                <p class="{{ Route::is('dashboard')  ? 'active_link' : '' }}"><i class="fa fa-user pe-2"></i>{{ trans('fd9.m1')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('nameChange') }}">
                                <p class="{{ Route::is('nameChange')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.m2')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('renew') }}">
                                <p class="{{ Route::is('renew')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.m3')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('nVisa.index') }}">
                                <p class="{{ Route::is('nVisa.index') || Route::is('nVisa.create') || Route::is('nVisa.show') || Route::is('fdNineForm.create')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.nvisa')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fdNineOneForm.index') }}">
                                <p class="{{ Route::is('fdNineOneForm.index') ||  Route::is('fdNineOneForm.create') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd09formone')}}</p>
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
            <div class="col-lg-9 col-md-6 col-sm-12">

                <!--download pdf -->
                <div class="card mt-3 mb-3">
                    <div class="card-body">

                        <table class="table table-bordered">
                            <tr>
                                <td>PDF Download (পিডিএফ ডাউনলোড )</td>
                                <td>PDF Upload (পিডিএফ আপলোড)</td>
                                <td>Update Information (তথ্য সংশোধন করুন)</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="btn btn-sm btn-success" target="_blank" href = "{{ route('mainFd9PdfDownload',$nVisaEdit->id) }}">
                                        {{ trans('form 8_bn.download_pdf')}}
                                    </a>
                                </td>
                                <td>

                                    @if(empty($nVisaEdit->fd9Form->verified_fd_nine_form))
                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        {{ trans('form 8_bn.upload_pdf')}}
                                    </button>
                                    @else

                                    <?php

                                    $file_path = url($nVisaEdit->fd9Form->verified_fd_nine_form);
                                    $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                    $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                    ?>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        @if(session()->get('locale') == 'en')
                                        পুনরায় আপলোড করুন
                                        @else
                                        Re-upload
                                        @endif
                                    </button><br>
                                    <p class="badge bg-success rounded">{{ $filename.'.'.$extension }}</p>
                                    @endif
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">

                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('mainFd9PdfUpload') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                            @csrf

                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.pdf')}}:</label>
                                <input type="file" data-parsley-required accept=".pdf" name="verified_fd_nine_form"  class="form-control" id="">
                                <input type="hidden" data-parsley-required  name="id"  value="{{ $nVisaEdit->fd9Form->id }}" class="form-control" id="">
                            </div>

                            <button class="btn btn-sm btn-success" type="submit">
                                {{ trans('form 8_bn.upload_pdf')}}
                            </button>
                        </form>
                    </div>

                  </div>
                </div>
              </div>

                                </td>
                            <td>
                                <button class="btn btn-sm btn-success" onclick="location.href = '{{ route('nVisa.edit',$nVisaEdit->id) }}';">
                                    আপডেট করুন
                 </button>
                             </td>
                         </tr>

                        </table>

                    </div>
                </div>
<!--end download pdf -->


                <div class="card">
                    <div class="card-body">


                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">নিরাপত্তা ছাড়পত্র</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">এফডি -৯ ফরম</button>
                            </li>

                          </ul>
                          <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">


                                    <div class="row mt-3">
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="others_inner_section">
                                                <h1>নিরাপত্তা ছাড়পত্রের জন্য আবেদন</h1>
                                                <div class="notice_underline"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-3 ">
                                        <div class="card-header custom-color">
                                            সাধারণ তথ্য
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-9 col-sm-12">
                                                    <table class="table table-borderless">
                                                        <tr>
                                                            <td>প্রস্তাবিত অনুমোদনের সময়কাল</td>
                                                            <td>:{{ $nVisaEdit->period_validity }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>কার্যকর এর তারিখ</td>
                                                            <td>:{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($nVisaEdit->permit_efct_date))) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>জারি করা ওয়ার্ক পারমিট এর রেফারেন্স নং</td>
                                                            <td>:{{ $nVisaEdit->visa_ref_no }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>ভিসার সুপারিশ পত্র</td>
                                                            <td>:{{ $nVisaEdit->visa_recomendation_letter_received_way	 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>ভিসার সুপারিশ পত্রের রেফারেন্স নং</td>
                                                            <td>:{{ $nVisaEdit->visa_recomendation_letter_ref_no	 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>ডিপার্টমেন্ট</td>
                                                            <td>:{{ $nVisaEdit->department_in	 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>ওয়ার্ক পারমিটের ধরন</td>
                                                            <td>:{{ $nVisaEdit->visa_category	 }}</td>
                                                        </tr>

                                                    </table>
                                                </div>
                                                <div class="col-lg-3 col-sm-12">
                                                    <div class="nvisa-avatar">
                                                        @if(!$nVisaEdit->applicant_photo)
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                                                        @else
                                                        <img src="{{ asset('/') }}{{ $nVisaEdit->applicant_photo }}"  alt="">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-3 ">
                                        <div class="card-header custom-color">
                                            ক . স্পনসর/নিয়োগকর্তার বিশেষ বিবরণ
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td colspan="2">এন্টারপ্রাইজের নাম (সংস্থা/কোম্পানী) : {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="background-color: #d4d4d4">এন্টারপ্রাইজের ঠিকানা (শুধুমাত্র বাংলাদেশ)</td>
                                                </tr>
                                                <tr>
                                                    <td>বাড়ি/প্লট/হোল্ডিং/গ্রাম: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_house_no }}  </td>
                                                    <td>ফ্ল্যাট/অ্যাপার্টমেন্ট/ফ্লোর: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_flat_no }}</td>
                                                </tr>
                                                <tr>
                                                    <td>রাস্তার নম্বর: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_road_no }}</td>
                                                    <td>পোস্ট/জিপ কোড: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_post_code }}</td>
                                                </tr>
                                                <tr>
                                                    <td>পোস্ট অফিস: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_post_office }}</td>
                                                    <td>টেলিফোন নম্বর: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_phone }}</td>
                                                </tr>
                                                <tr>
                                                    <td>শহর/জেলা: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_district }}</td>
                                                    <td>থানা/উপজেলা: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_thana }}</td>
                                                </tr>
                                                <tr>
                                                    <td>ফ্যাক্স নম্বর: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_fax_no }}</td>
                                                    <td>ইমেল: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_email }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">সংগঠনের ধরন: এনজিও</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">ব্যবসার প্রকৃতি: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->nature_of_business }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">স্বীকৃত মূলধন: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->authorized_capital }}</td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2">পরিশোধিত মূলধন: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->paid_up_capital }}</td>
                                                </tr>
                                                <tr>
                                                    <td>গত ১২ মাসে প্রাপ্ত রেমিট্যান্স: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->remittance_received }}</td>
                                                    <td>শিল্পের ধরন:এনজিও </td>
                                                </tr>
                                                <tr>
                                                    <td>কোম্পানি বোর্ডের সুপারিশ: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->recommendation_of_company_board }}</td>
                                                    <td>স্থানীয়, বিদেশী বা যৌথ উদ্যোগ কোম্পানি কিনা: {{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->company_share }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card mt-3 ">
                                        <div class="card-header custom-color">
                                            খ. বিদেশী দায়িত্বশীল এর বিশেষ বিবরণ
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td colspan="2">বিদেশী নাগরিকের নাম: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->name_of_the_foreign_national }}</td>
                                                </tr>
                                                <tr>
                                                    <td>জাতীয়তা: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->nationality  }}</td>
                                                    <td>পাসপোর্ট নম্বর: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->passport_no }}</td>
                                                </tr>
                                                <tr>
                                                    <td>ইস্যু তারিখ : {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->passport_issue_date }}</td>
                                                    <td>ইস্যু স্থান: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->passport_issue_place }} </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">মেয়াদ শেষ হওয়ার তারিখ: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->passport_expiry_date }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="background-color: #d4d4d4">স্থায়ী ঠিকানা</td>
                                                </tr>
                                                <tr>
                                                    <td>দেশ: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->home_country }}</td>
                                                    <td>বাড়ি/প্লট/হোল্ডিং নম্বর: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->house_no }}</td>
                                                </tr>
                                                <tr>
                                                    <td>ফ্ল্যাট/অ্যাপার্টমেন্ট/ফ্লোর নম্বর: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->flat_no }}</td>
                                                    <td>রাস্তার নাম/রাস্তার নম্বর: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->road_no }} </td>
                                                </tr>
                                                <tr>
                                                    <td><b></b> </td>
                                                    <td><b></b> </td>
                                                </tr>
                                                <tr>
                                                    <td>পোস্ট/জিপ কোড: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->post_code }}</td>
                                                    <td>রাজ্য/প্রদেশ: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->state }}</td>
                                                </tr>
                                                <tr>
                                                    <td>টেলিফোন নম্বর: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->phone }}</td>
                                                    <td>শহর: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->city }}</td>
                                                </tr>
                                                <tr>
                                                    <td>ফ্যাক্স নম্বর:  {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->fax_no }}</td>
                                                    <td>ইমেল: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->email }}</td>
                                                </tr>
                                                <tr>
                                                    <td>জন্ম তারিখ: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->date_of_birth }}</td>
                                                    <td>বৈবাহিক অবস্থা: {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->martial_status }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card mt-3 ">
                                        <div class="card-header custom-color">
                                            গ.কর্মসংস্থান এর তথ্য
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td>নিয়োগকৃত পদের নাম (পদবী): {{ $nVisaEdit->nVisaEmploymentInformation->employed_designation }}</td>
                                                    <td>বাংলাদেশে আগমনের তারিখ:  {{ $nVisaEdit->nVisaEmploymentInformation->date_of_arrival_in_bangladesh }}</td>
                                                </tr>
                                                <tr>
                                                    <td>ভিসার ধরন: N-Visa </td>
                                                    <td>প্রথম নিয়োগের তারিখ: {{ $nVisaEdit->nVisaEmploymentInformation->first_appoinment_date }}</td>
                                                </tr>
                                                <tr>
                                                    <td>কাঙ্খিত কার্যকরী তারিখ: {{ $nVisaEdit->nVisaEmploymentInformation->desired_effective_date }}</td>
                                                    <td>শেষ তারিখ: {{ $nVisaEdit->nVisaEmploymentInformation->desired_end_date }}</td>
                                                </tr>
                                                <tr>
                                                    <td>পছন্দসই সময়কাল: {{ $nVisaEdit->nVisaEmploymentInformation->visa_validity }}</td>
                                                    <td>সংক্ষিপ্ত কাজের বিবরণ: {{ $nVisaEdit->nVisaEmploymentInformation->brief_job_description }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">কর্মচারী ন্যায্যতা: {{ $nVisaEdit->nVisaEmploymentInformation->employee_justification }} </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card mt-3 ">
                                        <div class="card-header custom-color">
                                            ঘ. কর্মস্থলের ঠিকানা
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td>বাড়ি/প্লট/হোল্ডিং/গ্রাম:  {{ $nVisaEdit->nVisaWorkPlaceAddress->work_house_no }}</td>
                                                    <td>ফ্ল্যাট/অ্যাপার্টমেন্ট/ফ্লোর: {{ $nVisaEdit->nVisaWorkPlaceAddress->work_flat_no }}</td>
                                                </tr>
                                                <tr>
                                                    <td>রাস্তার নম্বর: {{ $nVisaEdit->nVisaWorkPlaceAddress->work_road_no }} </td>
                                                    <td>শহর/জেলা: {{ $nVisaEdit->nVisaWorkPlaceAddress->work_district }}</td>
                                                </tr>
                                                <tr>
                                                    <td>থানা/উপজেলা: {{ $nVisaEdit->nVisaWorkPlaceAddress->work_thana }} </td>
                                                    <td>ইমেইল: {{ $nVisaEdit->nVisaWorkPlaceAddress->work_email }}</td>
                                                </tr>
                                                <tr>
                                                    <td>প্রতিষ্ঠানের ধরন: এনজিও</td>
                                                    <td>যোগাযোগ ব্যক্তির মোবাইল নম্বর: {{ $nVisaEdit->nVisaWorkPlaceAddress->contact_person_mobile_number }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>


                                    <?php

$annual =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','Annual Bonus')->first();

$medical =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','Medical Allowance')->first();

$entertainment =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','Entertainment Allowance')->first();


$convoy =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','Conveyance')->first();

$house =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','House Rent')->first();

$overseas =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','Overseas Allowance')->first();


$basic =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','Basic Salary')->first();


$mainDatac =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->first();



?>

<!--compansation --->

@if(!$mainDatac)
<div class="card mt-3 ">
    <div class="card-header custom-color">
        ঙ. ক্ষতিপূরণ এবং বেনিফিট
    </div>
    <div class="card-body">
        কোন তথ্য নেই
    </div>
</div>
@else
<div class="card mt-3 ">
    <div class="card-header custom-color">
        ঙ. ক্ষতিপূরণ এবং বেনিফিট
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <td><b>বেতন কাঠামো</b></td>
                <td colspan="3"><b>স্থানীয়ভাবে প্রদেয়</b></td>
            </tr>
            <tr>
                <td></td>
                <td>পারিশ্রমিক</td>
                <td>পরিমাণ</td>
                <td>মুদ্রা</td>
            </tr>
            <tr>
                <td>ক. মূল বেতন</td>
                <td>{{ $basic->payment_type }}</td>
                <td>{{ $basic->amount }}</td>
                <td>{{ $basic->currency }}</td>
            </tr>
            <tr>
                <td>খ. বিদেশী ভাতা</td>
                <td>{{ $overseas->payment_type }}</td>
                <td>{{ $overseas->amount }}</td>
                <td>{{ $overseas->currency }}</td>
            </tr>
            <tr>
                <td>গ. বাড়ি ভাড়া/বাসস্থান</td>
                <td>{{ $house->payment_type }}</td>
                <td>{{ $house->amount }}</td>
                <td>{{ $house->currency }}</td>
            </tr>
            <tr>
                <td>ঘ. পরিবহন</td>
                <td>{{ $convoy->payment_type }}</td>
                <td>{{ $convoy->amount }}</td>
                <td>{{ $convoy->currency }}</td>
            </tr>
            <tr>
                <td>ঙ. বিনোদন ভাতা</td>
                <td>{{ $entertainment->payment_type }}</td>
                <td>{{ $entertainment->amount }}</td>
                <td>{{ $entertainment->currency }}</td>
            </tr>
            <tr>
                <td>চ. চিকিৎসা ভাতা</td>
                <td>{{ $medical->payment_type }}</td>
                <td>{{ $medical->amount }}</td>
                <td>{{ $medical->currency }}</td>
            </tr>
            <tr>
                <td>ছ. বার্ষিক বোনাস</td>
                <td>{{ $annual->payment_type }}</td>
                <td>{{ $annual->amount }}</td>
                <td>{{ $annual->currency }}</td>
            </tr>
            <tr>
                <td>জ. অন্যান্য প্রান্তিক সুবিধা, যদি থাকে</td>
                <td colspan="3">{{ $nVisaEdit->other_benefit }}</td>
            </tr>
            <tr>
                <td>ঝ. কোনো বিশেষ মন্তব্য</td>
                <td colspan="3">{{ $nVisaEdit->salary_remarks }}</td>
            </tr>
        </table>
    </div>
</div>

@endif


<!--end compansation -->



                                    <div class="card mt-3 ">
                                        <div class="card-header custom-color">
                                            চ. অফিসের জনবল
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td colspan="3"><b>স্থানীয় (ক)</b></td>
                                                    <td colspan="3"><b>বিদেশী (খ)</b></td>
                                                    <td rowspan="2"><b>সর্বমোট
                                                        (ক+খ)</b></td>
                                                    <td colspan="2"><b>অনুপাত</b></td>
                                                </tr>
                                                <tr>
                                                    <td>এক্সিকিউটিভ</td>
                                                    <td>সাপোর্টিং স্টাফ</td>
                                                    <td>মোট</td>
                                                    <td>এক্সিকিউটিভ</td>
                                                    <td>সাপোর্টিং স্টাফ</td>
                                                    <td>মোট</td>
                                                    <td>স্থানীয়</td>
                                                    <td>বিদেশী</td>
                                                </tr>
                                                @if(!$nVisaEdit->nVisaManpowerOfTheOffice)
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                @else
                                                <tr>
                                                    <td>{{ $nVisaEdit->nVisaManpowerOfTheOffice->local_executive }}</td>
                                                    <td>{{ $nVisaEdit->nVisaManpowerOfTheOffice->local_supporting_staff }}</td>
                                                    <td>{{ $nVisaEdit->nVisaManpowerOfTheOffice->local_total }}</td>
                                                    <td>{{ $nVisaEdit->nVisaManpowerOfTheOffice->foreign_executive }}</td>
                                                    <td>{{ $nVisaEdit->nVisaManpowerOfTheOffice->foreign_supporting_staff }}</td>
                                                    <td>{{ $nVisaEdit->nVisaManpowerOfTheOffice->foreign_total }}</td>
                                                    <td>{{ $nVisaEdit->nVisaManpowerOfTheOffice->gand_total }}</td>
                                                    <td>{{ $nVisaEdit->nVisaManpowerOfTheOffice->local_ratio }}</td>
                                                    <td>{{ $nVisaEdit->nVisaManpowerOfTheOffice->foreign_ratio }}</td>
                                                </tr>
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card mt-3 ">
                                        <div class="card-header custom-color">
                                            ছ. ওয়ার্ক পারমিটের জন্য প্রয়োজনীয় নথি (পিডিএফ)
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <tbody>
                                                <tr>
                                                    <th>#</th>
                                                    <th>প্রয়োজনীয় সংযুক্তি</th>
                                                    <th>সংযুক্ত ফাইল (পিডিএফ)</th>
                                                </tr>
                                                @if(!$nVisaEdit->nVisaNecessaryDocumentForWorkPermit)

                                                <tr>
                                                    <td>১</td>
                                                    <td>ক্রেতার প্রতিনিধি নিয়োগের ক্ষেত্রে ক্রেতার মনোনয়ন পত্রের অনুলিপি</td>
                                                    <td>




                                                        <button class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </button>


                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>২</td>
                                                    <td>বিনিয়োগ বোর্ডের নিবন্ধন পত্রের অনুলিপি, যদি আগে জমা না দেওয়া হয়</td>
                                                    <td><button class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </button></td>
                                                </tr>
                                                <tr>
                                                    <td>৩</td>
                                                    <td>কর্মচারীর ক্ষেত্রে পরিষেবা চুক্তি/চুক্তি/নিয়োগ পত্রের অনুলিপি</td>
                                                    <td><button class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </button></td>
                                                </tr>
                                                <tr>
                                                    <td>৪</td>
                                                    <td>বিদেশী নাগরিকদের নিয়োগ সংক্রান্ত কোম্পানির পরিচালক পর্ষদের সিদ্ধান্ত (সীমিত কোম্পানির ক্ষেত্রে) বেতন এবং অন্যান্য সুবিধা দেখায় শুধুমাত্র সভায় উপস্থিত পরিচালকদের দ্বারা স্বাক্ষরিত কোম্পানির</td>
                                                    <td><button class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </button></td>
                                                </tr>
                                                <tr>
                                                    <td>৫</td>
                                                    <td>মেমোরেন্ডাম এবং আর্টিকেল অফ অ্যাসোসিয়েশন শেয়ারহোল্ডারদের দ্বারা যথাযথভাবে স্বাক্ষরিত এবং অন্তর্ভুক্তির শংসাপত্র সহ (লিমিটেড কোম্পানির ক্ষেত্রে), যদি আগে জমা না দেওয়া হয়</td>
                                                    <td><button class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </button></td>
                                                </tr>
                                                <tr>
                                                    <td>৬</td>
                                                    <td>কর্মচারীদের জন্য ই-টাইপ ভিসা সহ পাসপোর্টের ফটোকপি/বিনিয়োগকারীদের জন্য পিআই-টাইপ ভিসা</td>
                                                    <td><button class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </button></td>
                                                </tr>

                                                @else


                                                <tr>
                                                    <td>১</td>
                                                    <td>ক্রেতার প্রতিনিধি নিয়োগের ক্ষেত্রে ক্রেতার মনোনয়ন পত্রের অনুলিপি</td>
                                                    <td>


                                                       @if(empty($nVisaEdit->nVisaNecessaryDocumentForWorkPermit->nomination_letter_of_buyer))


                                                       @else

                                                        <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'nomination','id'=>$nVisaEdit->nVisaNecessaryDocumentForWorkPermit->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                                        @endif


                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>২</td>
                                                    <td>বিনিয়োগ বোর্ডের নিবন্ধন পত্রের অনুলিপি, যদি আগে জমা না দেওয়া হয়</td>
                                                    <td>

                                                        @if(empty($nVisaEdit->nVisaNecessaryDocumentForWorkPermit->registration_letter_of_board_of_investment))


                                                        @else

                                                         <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'investment','id'=>$nVisaEdit->nVisaNecessaryDocumentForWorkPermit->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                                         @endif

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>৩</td>
                                                    <td>কর্মচারীর ক্ষেত্রে পরিষেবা চুক্তি/চুক্তি/নিয়োগ পত্রের অনুলিপি</td>
                                                    <td>

                                                        @if(empty($nVisaEdit->nVisaNecessaryDocumentForWorkPermit->employee_contract_copy))


                                                        @else

                                                         <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'contract','id'=>$nVisaEdit->nVisaNecessaryDocumentForWorkPermit->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                                         @endif

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>৪</td>
                                                    <td>বিদেশী নাগরিকদের নিয়োগ সংক্রান্ত কোম্পানির পরিচালক পর্ষদের সিদ্ধান্ত (সীমিত কোম্পানির ক্ষেত্রে) বেতন এবং অন্যান্য সুবিধা দেখায় শুধুমাত্র সভায় উপস্থিত পরিচালকদের দ্বারা স্বাক্ষরিত কোম্পানির</td>
                                                    <td>

                                                        @if(empty($nVisaEdit->nVisaNecessaryDocumentForWorkPermit->board_of_the_directors_sign_lette))


                                                        @else

                                                         <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'directors','id'=>$nVisaEdit->nVisaNecessaryDocumentForWorkPermit->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                                         @endif

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>৫</td>
                                                    <td>মেমোরেন্ডাম এবং আর্টিকেল অফ অ্যাসোসিয়েশন শেয়ারহোল্ডারদের দ্বারা যথাযথভাবে স্বাক্ষরিত এবং অন্তর্ভুক্তির শংসাপত্র সহ (লিমিটেড কোম্পানির ক্ষেত্রে), যদি আগে জমা না দেওয়া হয়</td>
                                                    <td>
                                                        @if(empty($nVisaEdit->nVisaNecessaryDocumentForWorkPermit->share_holder_copy))


                                                        @else

                                                         <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'shareHolder','id'=>$nVisaEdit->nVisaNecessaryDocumentForWorkPermit->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                                         @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>৬</td>
                                                    <td>কর্মচারীদের জন্য ই-টাইপ ভিসা সহ পাসপোর্টের ফটোকপি/বিনিয়োগকারীদের জন্য পিআই-টাইপ ভিসা</td>
                                                    <td>
                                                        @if(empty($nVisaEdit->nVisaNecessaryDocumentForWorkPermit->passport_photocopy))


                                                        @else

                                                         <a target="_blank" href="{{ route('nVisaDocumentDownload',['cat'=>'passportCopy','id'=>$nVisaEdit->nVisaNecessaryDocumentForWorkPermit->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                                         @endif
                                                    </td>
                                                </tr>


                                                @endif
                                                </tbody></table>
                                        </div>
                                    </div>
                                    <div class="card mt-3 ">
                                        <div class="card-header custom-color">
                                            জ. প্রতিষ্ঠানের অনুমোদিত ব্যক্তি
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td>প্রতিষ্ঠানের নাম: {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_name }}</td>
                                                    <td>প্রতিষ্ঠানের বাড়ি নম্বর: {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_house_no }}</td>
                                                </tr>
                                                <tr>
                                                    <td>প্রতিষ্ঠানের ফ্ল্যাট নং: {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_flat_no }}</td>
                                                    <td>প্রতিষ্ঠানের রোড নং: {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_road_no }}</td>
                                                </tr>
                                                <tr>
                                                    <td>প্রতিষ্ঠানের থানা: {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_thana }}</td>
                                                    <td>প্রতিষ্ঠানের ডাকঘর: {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_post_office }}</td>
                                                </tr>
                                                <tr>
                                                    <td>প্রতিষ্ঠানের জেলা: {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_district }}</td>
                                                    <td>প্রতিষ্ঠানের মোবাইল: {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_mobile }}</td>
                                                </tr>
                                                <tr>
                                                    <td>জমা দেওয়ার তারিখ:  {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->submission_date }}</td>
                                                    <td>প্রবাসীর নাম: {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->expatriate_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>প্রবাসী ইমেইল: {{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->expatriate_email }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>



                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <div class="form9_upper_box">
                                            <h3>এফডি-৯ ফরম</h3>
                                            <h4>বিদেশি নাগরিক নিয়োগপত্র সত্যায়ন ফরম</h4>
                                            <h5>(আবশ্যকাবে বাংলা নিকস ফন্টে পুরণ করে দাখিল করতে হবে)</h5>

                                            <div>
                                                <p>বরাবর <br>
                                                    মহাপরিচালক <br>
                                                    এনজিও বিষয় ব্যুরো, ঢাকা <br>
                                                    জনাব,</p>
                                                <p>নিম্নলখিত নিয়োগপ্রাপ্ত বিদেশি নাগরিক/নাগরিকগণকে এ সংস্থায় (নিবন্ধন নম্বরঃ {{App\Http\Controllers\NGO\CommonController::englishToBangla($ngo_list_all->registration_number)}}
                                                    তারিখঃ {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($ngoStatus->updated_at->format('d-m-Y')))) }}) বৈদেশিক
                                                    অনুদান (স্বেচ্ছাসেবামূলক কর্মকান্ড) রেগুলেশন আইন ২০১৬ অনুযায়ী নিয়োগপত্র সত্যায়ন ও
                                                    এনডিসা প্রাপ্তির সুপারিশপত্র
                                                    পাওয়ার জন্য আবেদন করছিঃ</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-borderless">
                                            <tbody>
                                            <tr>
                                                <td>১.</td>
                                                <td>বিদেশি নাগরিকের নাম (ইংরেজীতে Capital Letter এ)</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_foreigner_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>২.</td>
                                                <td>(ক) পিতার নাম</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_father_name }}</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>(খ) স্বামী/স্ত্রীর নাম</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_husband_or_wife_name }}</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>(গ) মাতার নাম</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_mother_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>৩.</td>
                                                <td>জন্ম স্থান ও তারিখ</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_birth_place }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($nVisaEdit->fd9Form->fd9_dob))) }}</td>
                                            </tr>
                                            <tr>
                                                <td>৪.</td>
                                                <td>পাসপোর্ট নম্বর, ইস্যু ও মেয়াদোর্ত্তীণ তারিখ</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_passport_number }},{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($nVisaEdit->fd9Form->fd9_passport_issue_date))) }},{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($nVisaEdit->fd9Form->fd9_passport_expiration_date))) }}</td>
                                            </tr>
                                            <tr>
                                                <td>৫.</td>
                                                <td>পাসপোর্টে প্রদত্ত সনাক্তকারী চিহ্ন</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_identification_mark_given_in_passport }}</td>
                                            </tr>
                                            <tr>
                                                <td>৬.</td>
                                                <td>পুরুষ/মহিলা</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_male_or_female }}</td>
                                            </tr>
                                            <tr>
                                                <td>৭.</td>
                                                <td>বৈবাহিক অবস্থা</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_marital_status }}</td>
                                            </tr>
                                            <tr>
                                                <td>৮.</td>
                                                <td>জাতীয়তা / নাগরিকত্ব</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_nationality_or_citizenship }}</td>
                                            </tr>
                                            <tr>
                                                <td>৯.</td>
                                                <td>একাধিক নাগরিকত্ব থাকলে বিবরণ</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_details_if_multiple_citizenships }}</td>
                                            </tr>
                                            <tr>
                                                <td>১০.</td>
                                                <td>পূর্বের নাগরিকত্ব থাকলে তা বহাল না থাকার কারণ</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_previous_citizenship_is_grounds_for_non_retention }}</td>
                                            </tr>
                                            <tr>
                                                <td>১১.</td>
                                                <td>বর্তমান ঠিকানা</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_current_address }}</td>
                                            </tr>
                                            <tr>
                                                <td>১২.</td>
                                                <td>পরিবারের সদস্য সংখ্যা</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_number_of_family_members }}</td>
                                            </tr>

                                            <?php
   $familyData = $nVisaEdit->fd9Form->fd9ForeignerEmployeeFamilyMemberList;

   //dd($familyData);
    ?>

                                            <tr>
                                                <td>১৩.</td>
                                                <td>পরিবারের সদসাদের নাম ও বয়স (যাহারা তার সাথে থাকবেন)</td>
                                                <td>: @foreach($familyData as $key=>$allFamilyData)
                                                    {{ $allFamilyData->family_member_name }},{{ $allFamilyData->family_member_age }}<br>
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>১৪.</td>
                                                <td>একাডেমিক যোগ্যতা (একাডেমিক যোগ্যতার সমর্থনে সনদপত্রের কপি সংযুক্ত করতে হবে</td>
                                                <td>:  @if(!$nVisaEdit->fd9Form->fd9_academic_qualification)

                                                    @else

                     <?php

                                                     $file_path = url($nVisaEdit->fd9Form->fd9_academic_qualification);
                                                     $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                     $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                                     ?>
সংযুক্ত
                                                     @endif
                                                    </td>
                                            </tr>
                                            <tr>
                                                <td>১৫.</td>
                                                <td>কারিগরি ও অন্যান্য যোগ্যতা যদি থাকে (প্রাসঙ্গিক সনদপত্রের কপি সংযুক্ত করতে
                                                    হবে)
                                                </td>
                                                <td>: @if(!$nVisaEdit->fd9Form->fd9_technical_and_other_qualifications_if_any)

                                                    @else

                     <?php

                                                     $file_path = url($nVisaEdit->fd9Form->fd9_technical_and_other_qualifications_if_any);
                                                     $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                     $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                                     ?>
সংযুক্ত
                                                     @endif</td>
                                            </tr>
                                            <tr>
                                                <td>১৬.</td>
                                                <td>অতীত অভিজ্ঞতা এবং যে কাজে তাঁকে নিয়োগ দেয়া হচ্ছে তাতে তার দক্ষতা (প্রমাণকসহ)
                                                </td>
                                                <td>: @if(!$nVisaEdit->fd9Form->fd9_past_experience)

                                                    @else

                     <?php

                                                     $file_path = url($nVisaEdit->fd9Form->fd9_past_experience);
                                                     $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                     $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                                     ?>
সংযুক্ত
                                                     @endif</td>
                                            </tr>
                                            <tr>
                                                <td>১৭.</td>
                                                <td>যে সব দেশ ভ্রমণ করেছেন (কর্মসংস্থানের জন্য)</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_countries_that_have_traveled }}</td>
                                            </tr>
                                            <tr>
                                                <td>১৮.</td>
                                                <td>যে পদের জন্য নিয়োগ প্রস্তাব দেয়া হয়েছে : (নিয়োগপত্র কপি ও চুক্তিপত্র সংযুক্ত
                                                    করতে হবে)
                                                </td>
                                                <td>:  @if(!$nVisaEdit->fd9Form->fd9_offered_post)

                                                    @else

                     <?php

                                                     $file_path = url($nVisaEdit->fd9Form->fd9_offered_post);
                                                     $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                     $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                                     ?>
সংযুক্ত
                                                     @endif</td>
                                            </tr>
                                            <tr>
                                                <td>১৯.</td>
                                                <td>যে প্রকল্পে তাকে নিয়োগের প্রস্থাব করা হয়েছে তার নাম ও মেয়াদ ব্যুরোর অনুমোদন
                                                    পত্র সংযুক্ত করতে হবে)
                                                </td>
                                                <td>: @if(!$nVisaEdit->fd9Form->fd9_name_of_proposed_project)

                                                    @else

                     <?php

                                                     $file_path = url($nVisaEdit->fd9Form->fd9_name_of_proposed_project);
                                                     $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                     $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                                     ?>
সংযুক্ত
                                                     @endif</td>
                                            </tr>
                                            <tr>
                                                <td>২০.</td>
                                                <td>নিয়োগের যে তারিখ নির্ধারণ করা হয়েছে</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_date_of_appointment }}</td>
                                            </tr>
                                            <tr>
                                                <td>২১.</td>
                                                <td>এক্সটেনশন হয়ে থাকলে তার সময়কাল</td>
                                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($nVisaEdit->fd9Form->fd9_extension_date))) }}</td>
                                            </tr>
                                            <tr>
                                                <td>২২.</td>
                                                <td>এ প্রকল্পে কতজন বিদেশির পদের সংস্থান রয়েছে এবং কর্মরত কতজন</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_post_available_for_foreigner_and_working }}</td>
                                            </tr>
                                            <tr>
                                                <td>২৩.</td>
                                                <td>বাংলাদেশের ইতঃপূর্বে অন্যকোন সংস্থায় কাজ করেছিলেন কিনা তার বিবরণ</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_previous_work_experience_in_bangladesh }}</td>
                                            </tr>
                                            <tr>
                                                <td>২৪.</td>
                                                <td>সংস্থায় বর্তমানে কতজন বিদেশি নাগরিক কর্মরত আছেন</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_total_foreigner_working }}</td>
                                            </tr>
                                            <tr>
                                                <td>২৫.</td>
                                                <td>অন্য কোন তথ্য (যদি থাকে)</td>
                                                <td>: {{ $nVisaEdit->fd9Form->fd9_other_information }}</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>বিদেশি নাগরিকের পাসপোর্ট সাইজের ছবি</td>
                                                <td>: @if(!$nVisaEdit->fd9Form->fd9_foreigner_passport_size_photo)

                                                    @else

                                                    <img src="{{ asset('/') }}{{ $nVisaEdit->fd9Form->fd9_foreigner_passport_size_photo }}" alt="" style="height:40px;" id="output">

@endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>পাসপোর্টের কপি সংযুক্ত</td>
                                                <td>:  @if(!$nVisaEdit->fd9Form->fd9_copy_of_passport)

                                                    @else

                     <?php

                                                     $file_path = url($nVisaEdit->fd9Form->fd9_copy_of_passport);
                                                     $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                     $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                                     ?>
সংযুক্ত
                                                     @endif</td>
                                            </tr>
                                            </tbody>
                                        </table>

                                        <h5 class="text-center mt-3 mb-3">ঘোষণা</h5>
                                        <p class="mt-3">আমি এই মর্মে ঘোষণা করছি যে, আমি সংশ্লিষ্ট সকল আইন-কানুন পড়েছি এবং উল্লেখিত
                                            সকল তথ্য সত্য ও সঠিক। </p>

                                        <div class="row">
                                            <div class="col-lg-6 col-sm-12"></div>
                                            <div class="col-lg-6 col-sm-12">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <td>প্রধান নির্বাহীর স্বাক্ষর ও সিল</td>
                                                    </tr>
                                                    <tr>
                                                        <td>নামঃ</td>
                                                    </tr>
                                                    <tr>
                                                        <td>পদবীঃ</td>
                                                    </tr>
                                                    <tr>
                                                        <td>তারিখঃ</td>
                                                    </tr>
                                                </table>
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
