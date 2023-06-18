@extends('front.master.master')

@section('title')
{{ trans('first_info.all_reg_form')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')

<?php
$fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');
$get_reg_id = DB::table('ngo_statuses')->where('fd_one_form_id',$fdOneFormId)->value('status');


?>

@if(empty($get_reg_id))
<?php
$checkCompleteStatusData = DB::table('form_complete_statuses')
->where('user_id',Auth::user()->id)
->first();

//dd($checkCompleteStatusData );

$checkCompleteStatus = DB::table('form_complete_statuses')
->where('user_id',Auth::user()->id)
->where('fd_one_form_step_one_status',1)
->where('fd_one_form_step_two_status',1)
->where('fd_one_form_step_three_status',1)
->where('fd_one_form_step_four_status',1)
->where('form_eight_status',1)
->where('ngo_member_status',1)
->where('ngo_member_nid_photo_status',1)
->where('ngo_other_document_status',1)
->value('id');

?>

@if(empty($checkCompleteStatus))

@if(!$checkCompleteStatusData)
@include('front.form.ngo_registration_form_fd01_step01')
@elseif($checkCompleteStatusData->fd_one_form_step_one_status == 0)
@include('front.form.ngo_registration_form_fd01_step01')
@elseif($checkCompleteStatusData->fd_one_form_step_two_status == 0)
@include('front.form.ngo_registration_form_fd01_step02')
@elseif($checkCompleteStatusData->fd_one_form_step_three_status == 0)
@include('front.form.ngo_registration_form_fd01_step03')
@elseif($checkCompleteStatusData->fd_one_form_step_four_status == 0)
@include('front.form.ngo_registration_form_fd01_step04')
@elseif($checkCompleteStatusData->form_eight_status == 0)
@include('front.form.ngo_registration_form_form08')
@elseif($checkCompleteStatusData->ngo_member_status == 0)
@include('front.form.ngo_registration_form_member_info')
@elseif($checkCompleteStatusData->ngo_member_nid_photo_status == 0)
@include('front.form.ngo_registration_form_nid_image_info')

@elseif($checkCompleteStatusData->ngo_other_document_status == 0)
@include('front.form.ngo_registration_form_document_info')
@endif
<!-- end ngo member other form -->


@else
<section>
    <div class="container">
        <div class="form-card">
            <div class="dashboard_box">
                <div class="dashboard_left">
                    <ul>
                        @include('front.include.sidebar_dash')
                    </ul>
                </div>
                <div class="dashboard_right">
                    <div class="card">
                        <div class="card-header">
                            {{ trans('first_info.ngo_Registration_All_Steps')}}


                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="card-body">
                                        <div class="box">
                                            <a href="{{ route('particularsOfOrganisation') }}">
                                                <div class="box_content">
                                                    <div class="box_icon">
                                                        <i class="fa fa-file-pdf-o"></i>
                                                    </div>
                                                    <h5>{{ trans('first_info.fd_one')}}</h5>

                                                    <p>{{ trans('first_info.Application_for_registration')}}</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="card-body">
                                        <div class="box">
                                            <a href="{{ route('formEightNgoCommitteMember.index') }}">
                                                <div class="box_content">
                                                    <div class="box_icon">
                                                        <i class="fa fa-user-plus"></i>
                                                    </div>
                                                    <h5>{{ trans('first_info.form_eight')}}</h5>
                                                    <p>{{ trans('first_info.Application_for_registration')}}</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="card-body">
                                        <div class="box">
                                            <a href="{{ route('ngoMember.index') }}">
                                                <div class="box_content">
                                                    <div class="box_icon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    @if(session()->get('locale') == 'en')
                                                    <h5>সদস্যের তথ্য</h5>
                                                    <p>এনজিও এর  সকল সদস্যদের তথ্য</p>
                                                    @else
                                                    <h5>Member's Info</h5>
                                                    <p>NGO ALl Member's Information</p>
                                                    @endif
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="card-body">
                                        <div class="box">
                                            <a href="{{ route('ngoDocument.index') }}">
                                                <div class="box_content">
                                                    <div class="box_icon">
                                                        <i class="fa fa-file-powerpoint-o"></i>
                                                    </div>
                                                    @if(session()->get('locale') == 'en')
                                                    <h5>অন্যান্য নথি</h5>
                                                    <p>এনজিও এর সকল  নথি</p>

                                                    @else
                                                    <h5>Other's Document</h5>
                                                    <p>NGO ALl Document</p>
                                                    @endif
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="card-body">
                                        <div class="box">
                                            <a href="{{ route('ngoMemberDocument.index') }}">
                                                <div class="box_content">
                                                    <div class="box_icon">
                                                        <i class="fa fa-image"></i>
                                                    </div>
                                                    @if(session()->get('locale') == 'en')
                                                    <h5>ছবি ও এনআইডি  জমা দিন</h5>
                                                    <p>পাসপোর্ট সাইজের ছবি ও জাতীয় পরিচয়পত্রের সত্যায়িত কপি
                                                        কার্যনির্বাহী কমিটির সদস্যদের কার্ড</p>
                                                    @else
                                                    <h5>Image & NID Submit</h5>
                                                    <p>Attested copy of Passport' size photograph and National Identity
                                                        Card of Executive Committee members</p>
                                                        @endif
                                                </div>
                                            </a>
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
@endif

@else
<section>
    <div class="container">
        <div class="form-card">
            <div class="dashboard_box">
                <div class="dashboard_left">
                    <ul>
                        @include('front.include.sidebar_dash')
                    </ul>
                </div>
                <div class="dashboard_right">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="d-flex justify-content-center">
                                <i class="fa fa-check-circle confirmation_icon"></i>
                            </div>
                            <div class="text-center">
                                <h1>Application Submitted!</h1>
                                <p>Your NGO Application Has Been Submitted Into NGOAB</p>
                                <p>When your application will be accepted you will get confirmation message </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endif
@endsection

@section('script')
<script>
    $(document).ready(function(){

         //form date

      $("#form_date").change(function(){

        var form_date = $(this).val();
        var to_date = $('#to_date').val();


         $.ajax({
        url: "{{ route('formEightNgoCommitteeMemberTotalYear') }}",
        method: 'GET',
        data: {form_date:form_date,to_date:to_date},
        success: function(data) {
          $("#total_year").val('');
          $("#total_year").val(data.data);
        }
        });


         });
      //end from date


      //to date
       $("#to_date").change(function(){

          var to_date = $(this).val();
        var form_date = $('#form_date').val();

          $.ajax({
        url: "{{ route('formEightNgoCommitteeMemberTotalYear') }}",
        method: 'GET',
        data: {form_date:form_date,to_date:to_date},
        success: function(data) {
          $("#total_year").val('');
          $("#total_year").val(data.data);
        }
        });

         });
      //end to date

        //new_cat_n


        $("[id^=member_id]").click(function(){

            //alert(3);

            var main_id = $(this).attr('id');
       var id_for_pass = main_id.slice(9);


       $.ajax({
        url: "{{ route('formEightNgoCommitteeMemberView') }}",
        method: 'GET',
        data: {id_for_pass:id_for_pass},
        success: function(data) {
          $("#main_content_table").html('');
          $("#main_content_table").html(data);
        }
        });

        });
        });



</script>
<script>
    $(document).ready(function () {
    $('#form1').validate({ // initialize the plugin
        rules: {


            district: {
                required: true
            },
            sub_district: {
                required: true
            },
            name: {
                required: true
            },

            address: {
                required: true
            },


            annual_budget: {
                required: true
            }


        },


               messages:
 {




            district: {
                required: " district Field is required"
            },
            sub_district: {
                required: " sub_district Field is required"
            },
            name: {
                required: " name Field is required"
            },
            address: {
                required: " address Field is required"
            },
            annual_budget: {
                required: " annual_budget Field is required"
            }





 }
    });
});
</script>

<script>
    $(document).ready(function () {
    $('#form').validate({ // initialize the plugin
        rules: {


            district: {
                required: true
            },
            sub_district: {
                required: true
            },
            name: {
                required: true
            },

            address: {
                required: true
            },
            letter_file: {
                required: true
            },
            annual_budget: {
                required: true
            }


        },


               messages:
 {




            district: {
                required: " district Field is required"
            },
            sub_district: {
                required: " sub_district Field is required"
            },
            name: {
                required: " name Field is required"
            },
            address: {
                required: " address Field is required"
            },
            letter_file: {
                required: " letter_file Field is required"
            },
            annual_budget: {
                required: " annual_budget Field is required"
            }





 }
    });
});
</script>
<script>




    $("[id^=final_b_get]").click(function () {

        var id = $(this).data("id");
        var name = $('#sname'+id).val();
        var information = $('#sinformation'+id).val();


        $.ajax({
                    url: "{{ route('adviserDataUpdate') }}",
                    type: 'get',
                    data: {
                        "name": name,
                        "information": information,
                        "id": id,

                    },
                    success: function (data) {
                        //alert('success');
                        location.reload(true);
                    }
                });

    });
        $("[id^=adeleteRecord]").click(function () {

            var x = confirm("Are you sure you want to delete?");
            if (x) {
                var id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");

                $.ajax({
                    url: "{{ route('adviserDataDelete') }}",
                    type: 'get',
                    data: {
                        "id": id,

                    },
                    success: function (data) {
                        alert('success');
                        location.reload(true);
                    }
                });
            } else {
                return false;
            }

        });
    </script>
    <script>
        $("[id^=sadeleteRecord]").click(function () {

            var x = confirm("Are you sure you want to delete?");
            if (x) {
                var id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");

                $.ajax({
                    url: "{{ route('otherInformationADelete') }}",
                    type: 'get',
                    data: {
                        "id": id,

                    },
                    success: function (data) {
                        alert('success');
                        location.reload(true);
                    }
                });
            } else {
                return false;
            }

        });
    </script>
<script>
    $("[id^=deleteRecord]").click(function () {

        var x = confirm("Are you sure you want to delete?");
        if (x) {
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");

            $.ajax({
                url: "{{ route('sourceOfFundDelete') }}",
                type: 'get',
                data: {
                    "id": id,

                },
                success: function (data) {
                    alert('success');
                    location.reload(true);
                }
            });
        } else {
            return false;
        }

    });
</script>





<!--//add new row-->

<script>
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr>' +
            '<td>' +
            '<input type="text" name="name[]" required placeholder="দাতা সংস্থার নাম" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<input type="text" name="address[]" required placeholder="দাতা সংস্থার ঠিকানা" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<input class="form-control" accept=".pdf" required name="letter_file[]" type="file" id="">' +
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
            '<input type="file" accept=".pdf" name="" placeholder="" class="form-control" />' +
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
