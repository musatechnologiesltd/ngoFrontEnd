@extends('front.master.master')

@section('title')
{{ trans('fd_one_step_one.Particulars_of_Organisation')}} | {{ trans('header.ngo_ab')}}
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
                        <li class="active">{{ trans('fd_one_step_one.fd_one_form_title')}}</li>
                        <li>{{ trans('fd_one_step_one.form_eight_title')}}</li>
                        <li>{{ trans('fd_one_step_one.member_title')}}</li>
                        <li>{{ trans('fd_one_step_one.image_nid_title')}}</li>
                        <li>{{ trans('fd_one_step_one.other_doc_title')}}</li>
                    </ul>
                </div>
                <div class="right-side">
                    <div class="committee_container active">

                        <div class="text">
                            <h2>{{ trans('fd_one_step_one.Particulars_of_Organisation')}}</h2>
                            {{-- <p>Enter your personal information to get closer to copanies.</p> --}}
                        </div>

                        <div class="fd01_tablist">
                            <div class="fd01_tab fd01_checked"></div>
                            <div class="fd01_tab"></div>
                            <div class="fd01_tab"></div>
                            <div class="fd01_tab"></div>
                        </div>

                        <div class="mt-3">

                            <?php

    $allParticularsOfOrganisation = DB::table('fd_one_forms')->
    where('user_id',Auth::user()->id)->first();

?>

@if(!$allParticularsOfOrganisation)



                            <form action="{{ route('particularsOfOrganisationPost') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                @csrf
                                <div class="mb-3">
                                    @if(session()->get('locale') == 'en')
                                    <label for="" class="form-label">সংস্থার নাম (বাংলা) <span class="text-danger">*</span> </label>
                                    @else
                                    <label for="" class="form-label">Organization Name (Bangla) <span class="text-danger">*</span> </label>
                                    @endif
                                    <input type="text" class="form-control" value="" name="organization_name_ban" data-parsley-required  id="">
                                </div>

                                    <div class="mb-3">
                                        @if(session()->get('locale') == 'en')
                                        <label for="" class="form-label">সংস্থার নাম (English) <span class="text-danger">*</span> </label>
                                        @else
                                        <label for="" class="form-label">Organization Name (English) <span class="text-danger">*</span> </label>
                                        @endif
                                        <input type="text" class="form-control" value="" name="organization_name" data-parsley-required  id="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ trans('fd_one_step_one.Organization_address')}} <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" value="{{ Session::get('organization_address') }}" name="organization_address" data-parsley-required  id="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ trans('fd_one_step_one.Address_of_the_Head_Office')}} (বাংলা)<span class="text-danger">*</span>
                                            </label>
                                        <input type="text" class="form-control" value="" name="address_of_head_office" data-parsley-required  id="">
                                    </div>


                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ trans('fd_one_step_one.Address_of_the_Head_Office')}} (English)<span class="text-danger">*</span>
                                            </label>
                                        <input type="text" class="form-control" value="" name="address_of_head_office_eng" data-parsley-required  id="">
                                    </div>
                                    <?php

                                    $countryList = DB::table('countries')->where('id','!=',209)->orderBy('id','asc')->get();

                                    $ngoTypeInfo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');


                                    $getCityzenshipData = DB::table('countries')->whereNotNull('country_people_english')
                                                ->whereNotNull('country_people_bangla')->orderBy('id','asc')->get();
                                                                    ?>

                                                                    @if($ngoTypeInfo == 'দেশিও')
                                                                    <div class="mb-3">
                                                                        <label for="" class="form-label">{{ trans('fd_one_step_one.Country_of_Origin')}} <span class="text-danger">*</span> </label>
                                                                    <select name="country_of_origin" class="js-example-basic-single form-control custom-form-control" data-parsley-required  name="">
                                                                        @if(session()->get('locale') == 'en')
                                                                        <option value="বাংলাদেশ" >বাংলাদেশ</option>
                                                                        @else
                                                                        <option value="Bangladesh">Bangladesh</option>
                                                                        @endif
                                                                    </select>


                                                                    @else
                                                                    <div class="mb-3">
                                                                        <label for="" class="form-label">{{ trans('fd_one_step_one.Country_of_Origin')}} <span class="text-danger">*</span> </label>
                                                                        <select name="country_of_origin" class="js-example-basic-single form-control custom-form-control" data-parsley-required  name="">

                                                                            @foreach($countryList as $allCountryList)
                                                                            @if(session()->get('locale') == 'en')u
                                                                            <option value="{{ $allCountryList->country_name_english }}">{{ $allCountryList->country_name_bangla }}</option>
                                                                            @else
                                                                            <option value="{{ $allCountryList->country_name_english }}">{{ $allCountryList->country_name_english }}</option>
                                                                            @endif
                                    @endforeach
                                                                        </select>
                                                                    </div>
                                                                    @endif
                                <div class="mb-3">
                                    <h5 class="form_middle_text">
                                        {{ trans('fd_one_step_one.Particulars_of_Head_of_the_Organization_in_Bangladesh')}}
                                    </h5>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">{{ trans('fd_one_step_one.name')}} <span class="text-danger">*</span> </label>
                                    <input type="text" required name="name_of_head_in_bd" value="{{ Session::get('name_of_head_in_bd') }}" class="form-control" id="">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">{{ trans('fd_one_step_one.Whether_part_time_or_full_time')}} <span class="text-danger">*</span> </label>
                                    <div class="mt-2 mb-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" data-parsley-checkmin="1" data-parsley-required type="radio" name="job_type" id=""
                                                   value="Part-Time" {{ 'Part-Time' == Session::get('job_type') ? 'checked':'' }}>
                                            <label class="form-check-label" for="inlineRadio1">{{  trans('fd_one_step_one.Part_Time') }}</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" data-parsley-checkmin="1" data-parsley-required type="radio" name="job_type" id=""
                                                   value="Full-Time" {{ 'Full-Time' == Session::get('job_type') ? 'checked':'' }}>
                                            <label class="form-check-label" for="inlineRadio2">{{ trans('fd_one_step_one.Full_Time')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">{{ trans('fd_one_step_one.Address')}} <span class="text-danger">*</span> </label>
                                    <input type="text" required name="address" value="{{ Session::get('address') }}" class="form-control" id="">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">{{ trans('fd_one_step_one.Mobile_Number')}} <span class="text-danger">*</span> </label>
                                    <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    type = "number"
                                    maxlength = "11" data-parsley-required minlength="11"  data-parsley-trigger=“keyup” name="phone" value="{{ Session::get('phone') }}"  class="form-control" id="">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">{{ trans('fd_one_step_one.Email')}} <span class="text-danger">*</span> </label>
                                    <input type="email" data-parsley-required name="email" value="{{ Session::get('email') }}" class="form-control" id="">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">{{ trans('fd_one_step_one.Citizenship')}} <span class="text-danger">*</span> </label>



                                    <select class="js-example-basic-multiple form-control" data-parsley-required name="citizenship[]"
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
                                <div class="mb-3">
                                    <label for="" class="form-label">{{ trans('fd_one_step_one.Profession')}} <span class="text-danger">*</span> </label>
                                    <input type="text" data-parsley-required value="{{ Session::get('profession') }}" name="profession" class="form-control" id="">
                                </div>

                        </div>
                        <div class="buttons d-flex justify-content-end mt-4">
                            <button class="btn btn-danger me-2" name="submit_value" value="save_and_exit_from_one" type="submit">{{ trans('fd_one_step_one.Save_&_Exit')}}</button>
                            <button class="btn btn-custom next_button" name="submit_value" value="next_step_from_one" type="submit">{{ trans('fd_one_step_one.Next_Step')}}</button>
                        </div>
                            </form>

        @else

        <form action="{{ route('particularsOfOrganisationUpdate') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
            @csrf
            <input required="" name="id" value="{{ $allParticularsOfOrganisation->id }}" type="hidden" class="form-control" id="">


            <div class="mb-3">
                @if(session()->get('locale') == 'en')
                <label for="" class="form-label">সংস্থার নাম (বাংলা) <span class="text-danger">*</span> </label>
                @else
                <label for="" class="form-label">Organization Name (Bangla) <span class="text-danger">*</span> </label>
                @endif
                <input type="text" class="form-control" value="{{ $allParticularsOfOrganisation->organization_name_ban }}" name="organization_name_ban" data-parsley-required  id="">
            </div>

                <div class="mb-3">
                    @if(session()->get('locale') == 'en')
                    <label for="" class="form-label">সংস্থার নাম (English) <span class="text-danger">*</span> </label>
                    @else
                    <label for="" class="form-label">Organization Name (English) <span class="text-danger">*</span> </label>
                    @endif
                    <input type="text" class="form-control" value="{{ $allParticularsOfOrganisation->organization_name }}" name="organization_name" data-parsley-required  id="">
                </div>


                <div class="mb-3">
                    <label for="" class="form-label">{{ trans('fd_one_step_one.Organization_address')}} <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" value="{{ $allParticularsOfOrganisation->organization_address }}" name="organization_address" data-parsley-required  id="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">{{ trans('fd_one_step_one.Address_of_the_Head_Office')}} (বাংলা)<span class="text-danger">*</span>
                        </label>
                    <input type="text" class="form-control" value="{{ $allParticularsOfOrganisation->address_of_head_office }}" name="address_of_head_office" data-parsley-required  id="">
                </div>


                <div class="mb-3">
                    <label for="" class="form-label">{{ trans('fd_one_step_one.Address_of_the_Head_Office')}} (English)<span class="text-danger">*</span>
                        </label>
                    <input type="text" class="form-control" value="{{ $allParticularsOfOrganisation->address_of_head_office_eng }}" name="address_of_head_office_eng" data-parsley-required  id="">
                </div>



                <?php

                $countryList = DB::table('countries')->where('id','!=',209)->orderBy('id','asc')->get();


                $getCityzenshipData = DB::table('countries')->whereNotNull('country_people_english')
                ->whereNotNull('country_people_bangla')->orderBy('id','asc')->get();

                $ngoTypeInfo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
                                                ?>

                                                @if($ngoTypeInfo == 'দেশিও')
                                                <label for="" class="form-label">{{ trans('fd_one_step_one.Country_of_Origin')}} <span class="text-danger">*</span> </label>
                                                <select name="country_of_origin" class="js-example-basic-single form-control custom-form-control" data-parsley-required  name="">
                                                    @if(session()->get('locale') == 'en')
                                                    <option value="বাংলাদেশ" {{ 'বাংলাদেশ' == $allParticularsOfOrganisation->country_of_origin ? 'selected':'' }}>বাংলাদেশ</option>
                                                    @else
                                                    <option value="Bangladesh" {{ 'Bangladesh' == $allParticularsOfOrganisation->country_of_origin ? 'selected':'' }}>Bangladesh</option>
                                                    @endif
                                                </select>


                                                @else
                                                <div class="mb-3">
                                                    <label for="" class="form-label">{{ trans('fd_one_step_one.Country_of_Origin')}} <span class="text-danger">*</span> </label>
                                                    <select name="country_of_origin" class="js-example-basic-single form-control custom-form-control" data-parsley-required  name="">

                                                        @foreach($countryList as $allCountryList)
                                                        @if(session()->get('locale') == 'en')
                                                        <option value="{{ $allCountryList->country_name_english }}" {{ $allCountryList->country_name_english  == $allParticularsOfOrganisation->country_of_origin ? 'selected':'' }}>{{ $allCountryList->country_name_bangla }}</option>
                                                        @else
                                                        <option value="{{ $allCountryList->country_name_english }}" {{ $allCountryList->country_name_english  == $allParticularsOfOrganisation->country_of_origin ? 'selected':'' }}>{{ $allCountryList->country_name_english }}</option>
                                                        @endif
                @endforeach
                                                    </select>
                                                </div>
                                                @endif






                <div class="mb-3">
                    <h5 class="form_middle_text">
                        {{ trans('fd_one_step_one.Particulars_of_Head_of_the_Organization_in_Bangladesh')}}
                    </h5>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">{{ trans('fd_one_step_one.name')}} <span class="text-danger">*</span> </label>
                    <input type="text" data-parsley-required name="name_of_head_in_bd" value="{{ $allParticularsOfOrganisation->name_of_head_in_bd }}" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">{{ trans('fd_one_step_one.Whether_part_time_or_full_time')}} <span class="text-danger">*</span> </label>
                    <div class="mt-2 mb-2">
                        @if($ngoTypeInfo == 'দেশিও')

                        <div class="mt-2 mb-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" data-parsley-checkmin="1" data-parsley-required type="radio" name="job_type" id=""
                                       value="খণ্ডকালীন" {{ 'খণ্ডকালীন' == $allParticularsOfOrganisation->job_type ? 'checked':'' }}>
                                <label class="form-check-label" for="inlineRadio1">{{ trans('fd_one_step_one.Part_Time')}}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" data-parsley-checkmin="1" data-parsley-required type="radio" name="job_type" id=""
                                       value="পূর্ণকালীন" {{  'পূর্ণকালীন' == $allParticularsOfOrganisation->job_type ? 'checked':'' }}>
                                <label class="form-check-label" for="inlineRadio2">{{ trans('fd_one_step_one.Full_Time')}}</label>
                            </div>
                        </div>
                        @else
                        <div class="mt-2 mb-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" data-parsley-checkmin="1" data-parsley-required type="radio" name="job_type" id=""
                                       value="Part Time" {{ 'Part Time' == $allParticularsOfOrganisation->job_type ? 'checked':'' }}>
                                <label class="form-check-label" for="inlineRadio1">{{ trans('fd_one_step_one.Part_Time')}}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" data-parsley-checkmin="1" data-parsley-required type="radio" name="job_type" id=""
                                       value="Full Time" {{  'Full Time' == $allParticularsOfOrganisation->job_type ? 'checked':'' }}>
                                <label class="form-check-label" for="inlineRadio2">{{ trans('fd_one_step_one.Full_Time')}}</label>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">{{ trans('fd_one_step_one.Address')}} <span class="text-danger">*</span> </label>
                    <input type="text" data-parsley-required name="address" value="{{ $allParticularsOfOrganisation->address }}" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">{{ trans('fd_one_step_one.Mobile_Number')}} <span class="text-danger">*</span> </label>
                    <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    type = "number"
                    maxlength = "11" data-parsley-required   minlength="11"   name="phone" value="{{ $allParticularsOfOrganisation->phone }}"  class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">{{ trans('fd_one_step_one.Email')}} <span class="text-danger">*</span> </label>
                    <input type="text" data-parsley-required name="email" value="{{ $allParticularsOfOrganisation->email }}" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">{{ trans('fd_one_step_one.Citizenship')}} <span class="text-danger">*</span> </label>

                        <?php
     $convert_new_ass_cat  = explode(",",$allParticularsOfOrganisation->citizenship);

                        ?>






                    <select class="js-example-basic-multiple form-control" data-parsley-required name="citizenship[]"
                    multiple="multiple">

                    @if($ngoTypeInfo == 'দেশিও')
                    @foreach($getCityzenshipData as $allGetCityzenshipData)
                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                    <option value="{{ $allGetCityzenshipData->country_people_bangla }}" {{ (in_array($allGetCityzenshipData->country_people_bangla,$convert_new_ass_cat)) ? 'selected' : '' }}>{{ $allGetCityzenshipData->country_people_bangla }}</option>
                    @else
                <option value="{{ $allGetCityzenshipData->country_people_english }}" {{ (in_array($allGetCityzenshipData->country_people_english,$convert_new_ass_cat)) ? 'selected' : '' }}>{{ $allGetCityzenshipData->country_people_english }}</option>
                @endif
                @endforeach
                    @else
                    @foreach($getCityzenshipData as $allGetCityzenshipData)
                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                        <option value="{{ $allGetCityzenshipData->country_people_bangla }}" {{ (in_array($allGetCityzenshipData->country_people_bangla,$convert_new_ass_cat)) ? 'selected' : '' }}>{{ $allGetCityzenshipData->country_people_bangla }}</option>
                                        @else
                                    <option value="{{ $allGetCityzenshipData->country_people_english }}" {{ (in_array($allGetCityzenshipData->country_people_english,$convert_new_ass_cat)) ? 'selected' : '' }}>{{ $allGetCityzenshipData->country_people_english }}</option>
                                    @endif
                                    @endforeach
                                    @endif

            </select>

                </div>
                <div class="mb-3">
                    <label for="" class="form-label">{{ trans('fd_one_step_one.Profession')}} <span class="text-danger">*</span> </label>
                    <input type="text" data-parsley-required value="{{ $allParticularsOfOrganisation->profession }}" name="profession" class="form-control" id="">
                </div>


                @if(Route::is('fdOneFormEdit') )

                <div class="buttons d-flex justify-content-end mt-4">
                    <button class="btn btn-danger me-2" name="submit_value" value="exit_from_step_one_edit" type="submit">{{ trans('fd_one_step_one.Save_&_Exit')}}</button>
                    <button class="btn btn-custom next_button" name="submit_value" value="go_to_step_two" type="submit">{{ trans('fd_one_step_one.Next_Step')}}</button>
                </div>
                @else

            <div class="buttons d-flex justify-content-end mt-4">
                <button class="btn btn-danger me-2" name="submit_value" value="next_step_from_three" type="submit">{{ trans('fd_one_step_one.Save_&_Exit')}}</button>
                <button class="btn btn-custom next_button" name="submit_value" value="next_step_from_three" type="submit">{{ trans('fd_one_step_one.Next_Step')}}</button>
            </div>
            @endif

        </form>

        @endif
                    </div>
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


            phone: {
                required: true
            }


        },


               messages:
 {




            phone: {
                required: "Phone Field is required"
            }




 }
    });
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
