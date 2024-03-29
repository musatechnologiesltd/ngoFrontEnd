
@extends('front.master.master')

@section('title')
{{ trans('fd_one_step_three.All_staff_details_information')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')
<section>
    <div class="container">
        <div class="form-card">
            <div class="form">
                <div class="left-side">
                    <div class="steps-content">
                        <h3>{{ trans('fd_one_step_one.Step_1')}}</h3>
                    </div>
                    <ul class="progress-bar">
                        @if($foreignNgoType == 'Old')
                        <li class="active">{{ trans('fd_one_step_one.fd8')}}</li>
                        @else
                        <li class="active">{{ trans('fd_one_step_one.fd_one_form_title')}}</li>
                        @endif
                        {{-- <li>{{ trans('fd_one_step_one.form_eight_title')}}</li>
                        <li>{{ trans('fd_one_step_one.member_title')}}</li>
                        <li>{{ trans('fd_one_step_one.image_nid_title')}}</li> --}}
                        <li>{{ trans('fd_one_step_one.other_doc_title')}}</li>
                    </ul>

                </div>
                <div class="right-side">


                    <?php

                    $allFormOneData = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->first();
                    $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)
                           ->value('ngo_type');

                                    ?>
                    @if(count($particularsOfOrganisationData) == 0)

            @else


<?php
$getCityzenshipData = DB::table('countries')->whereNotNull('country_people_english')
            ->whereNotNull('country_people_bangla')->orderBy('id','asc')->get();
?>


            <form action="{{ route('allStaffDetailsInformationUpdate') }}" method="post" enctype="multipart/form-data" id="form"  data-parsley-validate="">
                @csrf
                <input type="hidden" class="form-control" value="{{ $allFormOneData->id }}" name="id"  id="">
            <div class="main active">
                <div class="text">
                    <h2>{{ trans('fd_one_step_three.All_staff_details_information')}} </h2>
                    {{-- <p>Enter your information to get closer to Registration.</p> --}}
                </div>
                <div class="fd01_tablist">
                    <div class="fd01_tab"></div>
                    <div class="fd01_tab"></div>
                    <div class="fd01_tab fd01_checked"></div>
                    <div class="fd01_tab"></div>
                </div>
                <div class="mt-3">

                        <div class="mb-3">
                            <h5 class="form_middle_text">
                                {{ trans('fd_one_step_three.staff_position')}}
                            </h5>

                            <h5 class="form_middle_text">
                                <b style="color:red !important;">{{ trans('fd_one_step_three.staff_position1')}}</b>
                            </h5>
                        </div>
                        @if(count($formOneMemberList) == 0)

                        <div class="mb-3">
                            <h5 class="form_middle_text">
                               <b> {{ trans('fd_one_step_three.staff_one')}} </b>
                            </h5>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.name')}} <span class="text-danger">*</span> </label>
                                <input name="staff_name[]" required type="text" class="form-control" id="">
                            </div>
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.desi')}} <span class="text-danger">*</span> </label>
                                <input name="staff_position[]" required type="text" class="form-control" id="">
                            </div>
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.address')}} <span class="text-danger">*</span> </label>
                                <input name="staff_address[]" required type="text" class="form-control" id="">
                            </div>

                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_one.Mobile_Number')}} <span class="text-danger">*</span> </label>
                                <input name="staff_mobile[]"   required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                type = "number"
                                maxlength = "11" minlength="11" data-parsley-required class="form-control" id="">
                            </div>
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_one.Email')}} <span class="text-danger">*</span> </label>
                                <input name="staff_email[]"   required type="email" class="form-control" id="">
                            </div>

                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.date_of_joining')}} <span class="text-danger">*</span> </label>
                                <input name="date_of_join[]" required type="text" class="form-control" id="">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.citizenship')}} <span class="text-danger">*</span> </label>
                                <select name="citizenship1[]" required class="js-example-basic-multiple form-control" name="states[]"
                                        multiple="multiple">
                                        @foreach($getCityzenshipData as $allGetCityzenshipData)
                                        @if(session()->get('locale') == 'en')
                                        <option value="{{ $allGetCityzenshipData->country_people_english }}" >{{ $allGetCityzenshipData->country_people_bangla }}</option>
                                        @else
                                    <option value="{{ $allGetCityzenshipData->country_people_english }}" >{{ $allGetCityzenshipData->country_people_english }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            @if(session()->get('locale') == 'en')

                            @else

                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">{{ trans('news.nn')}} <span class="text-danger">*</span> </label>
                                <input type="text" required name="now_working_at[]" class="form-control" id="">
                            </div>
                            @endif
                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.s_statement')}} <span class="text-danger">*</span> </label>
                                <input type="text" required name="salary_statement[]" class="form-control" id="">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.detail')}} <span class="text-danger">*</span> </label>
                                <input type="text" name="other_occupation[]" required class="form-control" id=""
                                          placeholder="Detail Description (বিস্তারিত বিবরণ)">
                            </div>
                        </div>

                        <div class="mb-3">
                            <h5 class="form_middle_text">
                              <b>  {{ trans('fd_one_step_three.staff_two')}} </b>
                            </h5>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.name')}} <span class="text-danger">*</span> </label>
                                <input name="staff_name[]" required type="text" class="form-control" id="" required>
                            </div>
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.desi')}} <span class="text-danger">*</span> </label>
                                <input name="staff_position[]" required type="text" class="form-control" id="">
                            </div>
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.address')}} <span class="text-danger">*</span> </label>
                                <input name="staff_address[]" required type="text" class="form-control" id="">
                            </div>

                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_one.Mobile_Number')}} <span class="text-danger">*</span> </label>
                                <input name="staff_mobile[]"   required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                type = "number"
                                maxlength = "11" minlength="11" data-parsley-required class="form-control" id="">
                            </div>
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_one.Email')}} <span class="text-danger">*</span> </label>
                                <input name="staff_email[]"   required type="email" class="form-control" id="">
                            </div>


                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.date_of_joining')}} <span class="text-danger">*</span> </label>
                                <input name="date_of_join[]" required  type="text" class="form-control" id="">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.citizenship')}} <span class="text-danger">*</span> </label>
                                <select name="citizenship2[]" required class="js-example-basic-multiple form-control" name="states[]"
                                        multiple="multiple">
                                        @foreach($getCityzenshipData as $allGetCityzenshipData)
                                        @if(session()->get('locale') == 'en')
                                        <option value="{{ $allGetCityzenshipData->country_people_english }}" >{{ $allGetCityzenshipData->country_people_bangla }}</option>
                                        @else
                                    <option value="{{ $allGetCityzenshipData->country_people_english }}" >{{ $allGetCityzenshipData->country_people_english }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            @if(session()->get('locale') == 'en')

                            @else

                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">{{ trans('news.nn')}} <span class="text-danger">*</span> </label>
                                <input type="text" required name="now_working_at[]" class="form-control" id="">
                            </div>
                            @endif
                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.s_statement')}} <span class="text-danger">*</span> </label>
                                <input type="text" name="salary_statement[]" required class="form-control" id="">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.detail')}} <span class="text-danger">*</span> </label>
                                <input type="text" name="other_occupation[]" required class="form-control" id=""
                                placeholder="Detail Description (বিস্তারিত বিবরণ)">
                            </div>
                        </div>

                        <div class="mb-3">
                            <h5 class="form_middle_text">
                                <b>{{ trans('fd_one_step_three.staff_three')}}</b>
                            </h5>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.name')}} <span class="text-danger">*</span> </label>
                                <input name="staff_name[]"  type="text" class="form-control" id="">
                            </div>
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.desi')}} <span class="text-danger">*</span> </label>
                                <input name="staff_position[]"  type="text" class="form-control" id="">
                            </div>
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.address')}} <span class="text-danger">*</span> </label>
                                <input name="staff_address[]"  type="text" class="form-control" id="">
                            </div>

                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_one.Mobile_Number')}} <span class="text-danger">*</span> </label>
                                <input name="staff_mobile[]"    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                type = "number"
                                maxlength = "11" minlength="11"  class="form-control" id="">
                            </div>
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_one.Email')}} <span class="text-danger">*</span> </label>
                                <input name="staff_email[]"    type="email" class="form-control" id="">
                            </div>


                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.date_of_joining')}} <span class="text-danger">*</span> </label>
                                <input name="date_of_join[]"  type="text" class="form-control" id="">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.citizenship')}} <span class="text-danger">*</span> </label>
                                <select name="citizenship3[]"  class="js-example-basic-multiple form-control" name="states[]"
                                        multiple="multiple">
                                        @foreach($getCityzenshipData as $allGetCityzenshipData)
                                        @if(session()->get('locale') == 'en')
                                        <option value="{{ $allGetCityzenshipData->country_people_english }}" >{{ $allGetCityzenshipData->country_people_bangla }}</option>
                                        @else
                                    <option value="{{ $allGetCityzenshipData->country_people_english }}" >{{ $allGetCityzenshipData->country_people_english }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            @if(session()->get('locale') == 'en')

                            @else

                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">{{ trans('news.nn')}} <span class="text-danger">*</span> </label>
                                <input type="text"  name="now_working_at[]" class="form-control" id="">
                            </div>
                            @endif
                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.s_statement')}} <span class="text-danger">*</span> </label>
                                <input type="text" name="salary_statement[]"  class="form-control" id="">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.detail')}} <span class="text-danger">*</span> </label>
                                <input type="text" name="other_occupation[]"  class="form-control" id=""
                                placeholder="Detail Description (বিস্তারিত বিবরণ)">
                            </div>
                        </div>

                        <div class="mb-3">
                            <h5 class="form_middle_text">
                             <b>   {{ trans('fd_one_step_three.staff_four')}}</b>
                            </h5>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.name')}} <span class="text-danger">*</span> </label>
                                <input name="staff_name[]"  type="text" class="form-control" id="">
                            </div>
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.desi')}} <span class="text-danger">*</span> </label>
                                <input name="staff_position[]"  type="text" class="form-control" id="">
                            </div>
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.address')}} <span class="text-danger">*</span> </label>
                                <input name="staff_address[]"  type="text" class="form-control" id="">
                            </div>

                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_one.Mobile_Number')}} <span class="text-danger">*</span> </label>
                                <input name="staff_mobile[]"    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                type = "number"
                                maxlength = "11" minlength="11"  class="form-control" id="">
                            </div>
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_one.Email')}} <span class="text-danger">*</span> </label>
                                <input name="staff_email[]"    type="email" class="form-control" id="">
                            </div>


                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.date_of_joining')}} <span class="text-danger">*</span> </label>
                                <input name="date_of_join[]"  type="text" class="form-control" id="">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.citizenship')}} <span class="text-danger">*</span> </label>
                                <select name="citizenship4[]"  class="js-example-basic-multiple form-control" name="states[]"
                                        multiple="multiple">
                                        @foreach($getCityzenshipData as $allGetCityzenshipData)
                                        @if(session()->get('locale') == 'en')
                                        <option value="{{ $allGetCityzenshipData->country_people_english }}" >{{ $allGetCityzenshipData->country_people_bangla }}</option>
                                        @else
                                    <option value="{{ $allGetCityzenshipData->country_people_english }}" >{{ $allGetCityzenshipData->country_people_english }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            @if(session()->get('locale') == 'en')

                            @else

                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">{{ trans('news.nn')}} <span class="text-danger">*</span> </label>
                                <input type="text"  name="now_working_at[]" class="form-control" id="">
                            </div>
                            @endif
                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.s_statement')}} <span class="text-danger">*</span> </label>
                                <input type="text"  name="salary_statement[]" class="form-control" id="">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.detail')}} <span class="text-danger">*</span> </label>
                                <input type="text" name="other_occupation[]"  class="form-control" id=""
                                placeholder="Detail Description (বিস্তারিত বিবরণ)">
                            </div>
                        </div>

                        <div class="mb-3">
                            <h5 class="form_middle_text">
                               <b> {{ trans('fd_one_step_three.staff_five')}} </b>
                            </h5>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.name')}} <span class="text-danger">*</span> </label>
                                <input name="staff_name[]"  type="text" class="form-control" id="">
                            </div>
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.desi')}} <span class="text-danger">*</span> </label>
                                <input name="staff_position[]"   type="text" class="form-control" id="">
                            </div>
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.address')}} <span class="text-danger">*</span> </label>
                                <input name="staff_address[]"  type="text" class="form-control" id="">
                            </div>

                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_one.Mobile_Number')}} <span class="text-danger">*</span> </label>
                                <input name="staff_mobile[]"    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                type = "number"
                                maxlength = "11" minlength="11" class="form-control" id="">
                            </div>
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_one.Email')}} <span class="text-danger">*</span> </label>
                                <input name="staff_email[]"    type="email" class="form-control" id="">
                            </div>


                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.date_of_joining')}} <span class="text-danger">*</span> </label>
                                <input name="date_of_join[]"  type="text" class="form-control" id="">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.citizenship')}} <span class="text-danger">*</span> </label>
                                <select name="citizenship5[]"  class="js-example-basic-multiple form-control" name="states[]"
                                        multiple="multiple">
                                        @foreach($getCityzenshipData as $allGetCityzenshipData)
                                        @if(session()->get('locale') == 'en')
                                        <option value="{{ $allGetCityzenshipData->country_people_english }}" >{{ $allGetCityzenshipData->country_people_bangla }}</option>
                                        @else
                                    <option value="{{ $allGetCityzenshipData->country_people_english }}" >{{ $allGetCityzenshipData->country_people_english }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            @if(session()->get('locale') == 'en')

                            @else

                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">{{ trans('news.nn')}} <span class="text-danger">*</span> </label>
                                <input type="text"  name="now_working_at[]" class="form-control" id="">
                            </div>
                            @endif
                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.s_statement')}} <span class="text-danger">*</span> </label>
                                <input type="text" name="salary_statement[]"  class="form-control" id="">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.detail')}} <span class="text-danger">*</span> </label>
                                <input type="text" name="other_occupation[]"  class="form-control" id=""
                                placeholder="Detail Description (বিস্তারিত বিবরণ)">
                            </div>
                        </div>

                        @else
@foreach($formOneMemberList as $key=>$allFormOneMemberList)
                        <div class="mb-3">

                            <h5 class="form_middle_text">
                                @if(($key+1) == 1)
                            <b>    {{ trans('fd_one_step_three.staff_one')}}</b>
                                @elseif(($key+1) == 2)
                              <b>  {{ trans('fd_one_step_three.staff_two')}} </b>
                                @elseif(($key+1) == 3)
                              <b>  {{ trans('fd_one_step_three.staff_three')}} </b>
                                @elseif(($key+1) == 4)
                            <b>    {{ trans('fd_one_step_three.staff_four')}} </b>
                                @elseif(($key+1) == 5)
                               <b> {{ trans('fd_one_step_three.staff_five')}} </b>
                                @endif
                            </h5>
                        </div>



                        <div class="row">
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">  {{ trans('fd_one_step_three.name')}} <span class="text-danger">*</span> </label>
                                <input name="staff_name[]" value="{{ $allFormOneMemberList->name }}" required type="text" class="form-control" id="">
                            </div>
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.desi')}} <span class="text-danger">*</span> </label>
                                <input name="staff_position[]" value="{{ $allFormOneMemberList->position }}" required type="text" class="form-control" id="">
                            </div>
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.address')}} <span class="text-danger">*</span> </label>
                                <input name="staff_address[]" value="{{ $allFormOneMemberList->address }}" required type="text" class="form-control" id="">
                            </div>


                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_one.Mobile_Number')}} <span class="text-danger">*</span> </label>
                                <input name="staff_mobile[]" value="{{ $allFormOneMemberList->mobile }}"  required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                type = "number"
                                maxlength = "11" minlength="11" data-parsley-required class="form-control" id="">
                            </div>
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_one.Email')}} <span class="text-danger">*</span> </label>
                                <input name="staff_email[]" value="{{ $allFormOneMemberList->email }}"   required type="email" class="form-control" id="">
                            </div>



                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.date_of_joining')}} <span class="text-danger">*</span> </label>
                                <input name="date_of_join[]"  value="{{ date('d-m-Y', strtotime($allFormOneMemberList->date_of_join)) }}" required type="text" class="form-control datepicker" id="">
                            </div>

                            <?php
                            $convert_new_ass_cat  = explode(",",$allFormOneMemberList->citizenship);

                                               ?>

                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.citizenship')}} <span class="text-danger">*</span> </label>
                                <select name="citizenship{{ $key+1 }}[]" required class="js-example-basic-multiple form-control" name="states[]"
                                        multiple="multiple">


                                    @foreach($getCityzenshipData as $allGetCityzenshipData)
                                    @if($checkNgoTypeForForeginNgo == 'Foreign')
                                    <option value="{{ $allGetCityzenshipData->country_people_english }}" {{ (in_array($allGetCityzenshipData->country_people_english,$convert_new_ass_cat)) ? 'selected' : '' }}>{{ $allGetCityzenshipData->country_people_english }}</option>
                                    @else
                                <option value="{{ $allGetCityzenshipData->country_people_bangla }}" {{ (in_array($allGetCityzenshipData->country_people_bangla,$convert_new_ass_cat)) ? 'selected' : '' }}>{{ $allGetCityzenshipData->country_people_bangla }}</option>
                                @endif
                                @endforeach
                                </select>
                            </div>

                            @if($checkNgoTypeForForeginNgo == 'Foreign')
                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">{{ trans('news.nn')}}<span class="text-danger">*</span> </label>
                                <input type="text" required name="now_working_at[]" value="{{ $allFormOneMemberList->now_working_at }}" class="form-control" id="">
                            </div>
                            @else


                            @endif

                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.s_statement')}} <span class="text-danger">*</span> </label>
                                <input type="text" required value="{{ $allFormOneMemberList->salary_statement }}" name="salary_statement[]" class="form-control" id="">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.detail')}} <span class="text-danger">*</span> </label>

                                <input type="text" name="other_occupation[]" value="{{ $allFormOneMemberList->other_occupation }}" required class="form-control" id=""
                                placeholder="Detail Description (বিস্তারিত বিবরণ)">


                            </div>
                        </div>


                        @endforeach

                        <?php

                        $countNew = count($formOneMemberList);

//dd($countNew);

$finalData = 5 - $countNew ;
$cityzenValue = 0;
?>

@for ($i = 0; $i < $finalData; $i++)
        {{-- <p>The current value is {{ $i }}.</p> --}}
       <?php $cityzenValue = $cityzenValue+1 ?>

        <div class="mb-3">

            <h5 class="form_middle_text">
                @if(($countNew+$cityzenValue) == 1)
                {{ trans('fd_one_step_three.staff_one')}}
                @elseif(($countNew+$cityzenValue) == 2)
                {{ trans('fd_one_step_three.staff_two')}}
                @elseif(($countNew+$cityzenValue) == 3)
                {{ trans('fd_one_step_three.staff_three')}}
                @elseif(($countNew+$cityzenValue) == 4)
                {{ trans('fd_one_step_three.staff_four')}}
                @elseif(($countNew+$cityzenValue) == 5)
                {{ trans('fd_one_step_three.staff_five')}}
                @endif
            </h5>
        </div>



        <div class="row">
            <div class="col-lg-6 col-sm-12 mb-3">
                <label for="" class="form-label">  {{ trans('fd_one_step_three.name')}} <span class="text-danger">*</span> </label>
                <input name="staff_name[]"   type="text" class="form-control" id="">
            </div>
            <div class="col-lg-6 col-sm-12 mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_three.desi')}} <span class="text-danger">*</span> </label>
                <input name="staff_position[]"  type="text" class="form-control" id="">
            </div>
            <div class="col-lg-6 col-sm-12 mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_three.address')}} <span class="text-danger">*</span> </label>
                <input name="staff_address[]"   type="text" class="form-control" id="">



            </div>

            <div class="col-lg-6 col-sm-12 mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_one.Mobile_Number')}} <span class="text-danger">*</span> </label>
                <input name="staff_mobile[]"   oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                type = "number"
                maxlength = "11" minlength="11" class="form-control" id="">
            </div>
            <div class="col-lg-6 col-sm-12 mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_one.Email')}} <span class="text-danger">*</span> </label>
                <input name="staff_email[]"    type="email" class="form-control" id="">
            </div>

            <div class="col-lg-6 col-sm-12 mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_three.date_of_joining')}} <span class="text-danger">*</span> </label>
                <input name="date_of_join[]"   type="text" class="form-control datepicker" id="">
            </div>

            <?php
            $convert_new_ass_cat  = explode(",",$allFormOneMemberList->citizenship);

                               ?>

            <div class="col-lg-12 mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_three.citizenship')}} <span class="text-danger">*</span> </label>
                <select name="citizenship{{ $countNew+$cityzenValue }}[]"  class="js-example-basic-multiple form-control" name="states[]"
                        multiple="multiple">


                    @foreach($getCityzenshipData as $allGetCityzenshipData)
                    @if($checkNgoTypeForForeginNgo == 'Foreign')
                    <option value="{{ $allGetCityzenshipData->country_people_english }}" {{ (in_array($allGetCityzenshipData->country_people_english,$convert_new_ass_cat)) ? 'selected' : '' }} >{{ $allGetCityzenshipData->country_people_english }}</option>
                    @else
                <option value="{{ $allGetCityzenshipData->country_people_bangla }}" {{ (in_array($allGetCityzenshipData->country_people_bangla,$convert_new_ass_cat)) ? 'selected' : '' }} >{{ $allGetCityzenshipData->country_people_bangla }}</option>
                @endif
                @endforeach
                </select>
            </div>

            @if($checkNgoTypeForForeginNgo == 'Foreign')
            <div class="col-lg-12 mb-3">
                <label for="" class="form-label">{{ trans('news.nn')}}<span class="text-danger">*</span> </label>
                <input type="text"  name="now_working_at[]" value="" class="form-control" id="">
            </div>
            @else


            @endif

            <div class="col-lg-12 mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_three.s_statement')}} <span class="text-danger">*</span> </label>
                <input type="text"  value="" name="salary_statement[]" class="form-control" id="">
            </div>
            <div class="col-lg-12 mb-3">
                <label for="" class="form-label">{{ trans('fd_one_step_three.detail')}} <span class="text-danger">*</span> </label>

                <input type="text" name="other_occupation[]"  class="form-control" id=""
                placeholder="Detail Description (বিস্তারিত বিবরণ)">


            </div>
        </div>
    @endfor

                        @endif



                </div>
                @if(Session::get('fdOneFormEditThree') == 'go_to_step_three')

                <div class="buttons d-flex justify-content-end mt-4">
                    <a href="{{ route('fieldOfProposedActivities') }}" class="btn btn-dark back_button me-2">{{ trans('fd_one_step_one.back')}}</a>
                    <button class="btn btn-danger me-2" name="submit_value" value="exit_from_step_three_edit" type="submit">{{ trans('fd_one_step_one.Save_&_Exit')}}</button>
                    <button class="btn btn-custom next_button" name="submit_value" value="go_to_step_four" type="submit">{{ trans('fd_one_step_one.Next_Step')}}</button>

                </div>

                @else
                <div class="buttons d-flex justify-content-end mt-4">
                    <a href="{{ route('fieldOfProposedActivities') }}" class="btn btn-dark back_button me-2">{{ trans('fd_one_step_one.back')}}</a>
                    <button class="btn btn-danger me-2" name="submit_value" value="next_step_from_three" type="submit">{{ trans('fd_one_step_one.Save_&_Exit')}}</button>
                    <button class="btn btn-custom next_button" name="submit_value" value="next_step_from_three" type="submit">{{ trans('fd_one_step_one.Next_Step')}}</button>

                </div>
                @endif
            </div>


    </form>


            @endif

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')


<script>
    $(document).ready(function () {
    $('#form').validate({ // initialize the plugin
        rules: {

            staff_name: {
                required: true
            },
            staff_position: {
                required: true
            },
            staff_address: {
                required: true
            },
            date_of_join: {
                required: true
            },

            citizenship: {
                required: true
            },
            salary_statement: {
                required: true
            },
            other_occupation: {
                required: true
            },
            citizenship2: {
                required: true
            },
            citizenship1: {
                required: true
            },
            citizenship3: {
                required: true
            },
            citizenship4: {
                required: true
            },
            citizenship5: {
                required: true
            }

        },


               messages:
 {



    staff_name: {
                required: " staff_name Field is required"
            },
            staff_position: {
                required: " staff_position Field is required"
            },
            staff_address: {
                required: " staff_address Field is required"
            },
            date_of_join: {
                required: " date_of_join Field is required"
            },

            citizenship: {
                required: " citizenship Field is required"
            },
            salary_statement: {
                required: " salary_statement Field is required"
            },
            other_occupation: {
                required: " other_occupation Field is required"
            }





 }
    });
});
</script>


<script>
    $(document).ready(function () {
        $('.js-example-basic-multiple, .distinct-single, .sub-distinct-single').select2();
    });
    $(document).ready(function () {
        $('.js-example-basic-single').select2();
    });
</script>


<!--//add new row-->

<script>
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr>' +
            '<td>' +
            '<input type="text" name="" placeholder="দাতা সংস্থার নাম" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<input type="text" name="" placeholder="দাতা সংস্থার ঠিকানা" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<input class="form-control" type="file" id="">' +
            '</td>' +
            '<td>' +
            '<button type="button" class="btn btn-outline-danger remove-input-field"><i class="bi bi-file-earmark-x-fill"></i></button>' +
            '</td>' +
            '</tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });

</script>

<script>
    var i = 0;
    $("#dynamic-advisor").click(function () {
        ++i;
        $("#dynamicAddRemoveAdvisor").append('<tr>' +
            '<td>' +
            '<input type="text" name="" placeholder="পরামর্শকের নাম" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<input type="text" name="" placeholder="পরামর্শকের ঠিকানা" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<button type="button" class="btn btn-outline-danger remove-input-field-advisor"><i class="bi bi-file-earmark-x-fill"></i></button>' +
            '</td>' +
            '</tr>'
        );
    });
    $(document).on('click', '.remove-input-field-advisor', function () {
        $(this).parents('tr').remove();
    });

</script>

<script>
    var i = 0;
    $("#dynamic-information").click(function () {
        ++i;
        $("#dynamicAddRemoveInformation").append('<tr>' +
            '<td>' +
            '<input type="file" name="" placeholder="" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<button type="button" class="btn btn-outline-danger remove-input-field-information"><i class="bi bi-file-earmark-x-fill"></i></button>' +
            '</td>' +
            '</tr>'
        );
    });
    $(document).on('click', '.remove-input-field-information', function () {
        $(this).parents('tr').remove();
    });

</script>
@endsection
