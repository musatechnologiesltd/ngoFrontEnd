
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

                        <li class="active">এফডি -৮ ফরম </li>
                        {{-- <li class="active">{{ trans('fd_one_step_three.All_staff_details_information')}} </li> --}}
                        <li>{{ trans('fd_one_step_four.o_info')}}</li>
                    </ul>

                </div>
                <div class="right-side">
                    <?php

                    $get_all_data_1 = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->first();


                                    ?>



<?php
$get_cityzenship_data = DB::table('countries')->whereNotNull('country_people_english')
            ->whereNotNull('country_people_bangla')->orderBy('id','asc')->get();
?>
            <form action="{{ route('otherInformationForRenewNewPost') }}" method="post" enctype="multipart/form-data" id="form"  data-parsley-validate="">
@csrf
                <input type="hidden" class="form-control" value="{{ $get_all_data_1->id }}" name="fd_one_id"  id="">
            <div class="main active">
                <div class="text">
                    <h2>{{ trans('fd_one_step_three.All_staff_details_information')}} </h2>
                    {{-- <p>Enter your information to get closer to Registration.</p> --}}
                </div>

                <div class="mt-3">

                        <div class="mb-3">
                            <h5 class="form_middle_text">
                                {{ trans('fd_one_step_three.staff_position')}}
                            </h5>
                        </div>

@foreach($all_partiw as $key=>$all_all_parti)
<input type="hidden" class="form-control" value="{{ $all_all_parti->id }}" name="id[]"  id="">
                        <div class="mb-3">

                            <h5 class="form_middle_text">
                                @if(($key+1) == 1)
                                {{ trans('fd_one_step_three.staff_one')}}
                                @elseif(($key+1) == 2)
                                {{ trans('fd_one_step_three.staff_two')}}
                                @elseif(($key+1) == 3)
                                {{ trans('fd_one_step_three.staff_three')}}
                                @elseif(($key+1) == 4)
                                {{ trans('fd_one_step_three.staff_four')}}
                                @elseif(($key+1) == 5)
                                {{ trans('fd_one_step_three.staff_five')}}
                                @endif
                            </h5>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">  {{ trans('fd_one_step_three.name')}} <span class="text-danger">*</span> </label>
                                <input name="staff_name[]" readonly value="{{ $all_all_parti->name }}" required type="text" class="form-control" id="">
                            </div>
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.desi')}} <span class="text-danger">*</span> </label>
                                <input name="staff_position[]" readonly value="{{ $all_all_parti->position }}" required type="text" class="form-control" id="">
                            </div>
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.address')}} <span class="text-danger">*</span> </label>
                                <input name="staff_address[]" readonly value="{{ $all_all_parti->address }}" required type="text" class="form-control" id="">
                            </div>
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_one.Mobile_Number')}} <span class="text-danger">*</span> </label>
                                <input name="staff_mobile[]"  value="{{ $all_all_parti->mobile }}" required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                type = "number"
                                maxlength = "11" minlength="11" data-parsley-required class="form-control" id="">
                            </div>
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_one.Email')}} <span class="text-danger">*</span> </label>
                                <input name="staff_email[]"  value="{{ $all_all_parti->email }}" required type="email" class="form-control" id="">
                            </div>
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.date_of_joining')}} <span class="text-danger">*</span> </label>
                                <input name="date_of_join[]" readonly  value="{{ date('d-m-Y', strtotime($all_all_parti->date_of_join)) }}" required type="text" class="form-control datepicker" id="">
                            </div>

                            <?php
                            $convert_new_ass_cat  = explode(",",$all_all_parti->citizenship);
                            $get_country_type = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
                                               ?>

                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.citizenship')}} <span class="text-danger">*</span> </label>
                                <select name="citizenship{{ $key+1 }}[]"   class="js-example-basic-multiple form-control" name="states[]"
                                        multiple="multiple">
                                        @foreach($get_cityzenship_data as $all_get_cityzenship_data)
                                        @if($get_country_type == 'Foreign')
                                        <option value="{{ $all_get_cityzenship_data->country_people_english }}" {{ (in_array($all_get_cityzenship_data->country_people_english,$convert_new_ass_cat)) ? 'selected' : '' }}>{{ $all_get_cityzenship_data->country_people_english }}</option>

                                        @else
                                        <option value="{{ $all_get_cityzenship_data->country_people_bangla }}" {{ (in_array($all_get_cityzenship_data->country_people_bangla,$convert_new_ass_cat)) ? 'selected' : '' }}>{{ $all_get_cityzenship_data->country_people_bangla }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            @if($get_country_type == 'Foreign')
                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">Now Working At <span class="text-danger">*</span> </label>
                                <input type="text" readonly required name="now_working_at[]" value="{{ $all_all_parti->now_working_at }}" class="form-control" id="">
                            </div>
                            @else


                            @endif

                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.s_statement')}} <span class="text-danger">*</span> </label>
                                <input type="text" readonly required value="{{ $all_all_parti->salary_statement }}" name="salary_statement[]" class="form-control" id="">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">{{ trans('fd_one_step_three.detail')}} <span class="text-danger">*</span> </label>

                                <input type="text" readonly name="other_occupation[]" value="{{ $all_all_parti->other_occupation }}" required class="form-control" id=""
                                placeholder="Detail Description (বিস্তারিত বিবরণ)">


                            </div>
                        </div>
                        @endforeach







                </div>

                <div class="buttons d-flex justify-content-end mt-4">
                    <a href="{{ route('ngoRenewStepOne') }}" class="btn btn-dark back_button me-2">{{ trans('fd_one_step_one.back')}}</a>

                    <button type="submit" class="btn btn-custom next_button" name="submit_value" >{{ trans('fd_one_step_one.Next_Step')}}</button>

                </div>
            </div>


    </form>




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
