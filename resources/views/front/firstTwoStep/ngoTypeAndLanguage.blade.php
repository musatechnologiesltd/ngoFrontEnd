@extends('front.master.master')

@section('title')
{{ trans('main.Ngo_Type_And_Language')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')
<section>
    <div class="container">
    <form method="post" action="{{ route('ngoTypeAndLanguagePost') }}" id="form">
        @csrf
        <div class="form-card">
            <div class="dashboard_box">
                <div class="dashboard_left">

                    <ul>
                        @include('front.include.sidebar_dash')
                    </ul>

                </div>

                <div class="dashboard_right">
                    <div class="tofsil2_box mt-3">
                        <h1>{{ trans('main.wellcome')}} </h1>
                        <div class="tofsil2_list">
                            <h3>{{ trans('main.sub2')}}</h3>


                            <div class="mb-4">
                                <label for="" class="form-label">{{ trans('main.origin')}} <span class="text-danger">*</span> </label>
                                <br>
                                <div class="form-check ms-3">
                                    <input class="form-check-input ngoType" data-parsley-checkmin="1" required type="radio" name="ngo_origin"  checked id="ngo_origin1" value="দেশিও" >
                                    <label class="form-check-label" for="ngo_origin1">{{ trans('main.ll')}} </label>
                                </div>
                                <div class="form-check ms-3">
                                    <input class="form-check-input ngoType" data-parsley-checkmin="1" required type="radio" name="ngo_origin" id="ngo_origin2" value="Foreign" >
                                    <label class="form-check-label" for="ngo_origin2">{{ trans('main.ff')}}</label>
                                </div>
                            </div>

                    <div class="mb-4">
                        <label for="" class="form-label">{{ trans('header.ngo_type')}} <span class="text-danger">*</span> </label>
                        <br>
                        <div class="form-check ms-3">
                            <input class="form-check-input ngoTypen" data-parsley-checkmin="1" required type="radio" name="ngo_type"  checked id="ngo_origin11" value="Old" >
                            <label class="form-check-label" for="ngo_origin11">{{ trans('header.old')}} </label>
                        </div>
                        <div class="form-check ms-3">
                            <input class="form-check-input ngoTypen" data-parsley-checkmin="1" required type="radio" name="ngo_type" id="ngo_origin22" value="New" >
                            <label class="form-check-label" for="ngo_origin22">{{ trans('header.new')}}</label>
                        </div>
                    </div>

<div id="showHideData">
                    <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">{{ trans('header.reg_number')}} <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control"   data-parsley-length=“[3,60]” maxlength="60"   data-parsley-pattern=“[a-zA-Z]+$” data-parsley-trigger=“keyup” name="reg_number" id="name">
                    </div>

                    <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">{{ trans('header.last_renew_date')}} <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control"   name="last_renew_date" id="datepicker">
                    </div>
</div>


                                {{-- <div class="mb-4">
                                    <label for="" class="form-label">{{ trans('main.lan')}} <span class="text-danger">*</span> </label>
                                    <br>
                                    <div class="form-check ms-3">
                                        <input class="form-check-input changeLang" type="radio" data-parsley-checkmin="1" required name="input_language" id="input_language1" value="en" checked >
                                        <label class="form-check-label" for="input_language1">{{ trans('main.bangla')}}</label>
                                    </div>
                                    <div class="form-check ms-3">
                                        <input class="form-check-input changeLang" data-parsley-checkmin="1" required type="radio" name="input_language" id="input_language2" value="sp" >
                                        <label class="form-check-label" for="input_language2">{{ trans('main.English')}} </label>
                                    </div>
                                </div> --}}

                        </div>
                    </div>
                    <div class="d-grid d-md-flex justify-content-md-end mt-4">
                        <button type="submit" class="btn btn-registration">{{ trans('main.next')}}
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </form>
    </div>
</section>
@endsection

@section('script')
<script>

$(document).on('click', '.ngoTypen', function(){

    var radioValue = $("input[name='ngo_type']:checked").val();

    if(radioValue == 'Old'){
        $("#showHideData").show();
    }else{
        $("#showHideData").hide();

    }

});
////////////

$(document).on('click', '.ngoType', function(){

    var radioValue = $("input[name='ngo_origin']:checked").val();

    //alert(radioValue);


    if(radioValue == 'Foreign'){
        $("#input_language1").prop('checked', false);
        $("#input_language2").prop('checked', true);
    }else{
        $("#input_language1").prop('checked', true);
        $("#input_language2").prop('checked', false);

    }
});

///end new code
    $(document).ready(function () {
    $('#form').validate({ // initialize the plugin
        rules: {

            ngo_origin: {
                required: true
            },
            input_language: {
                required: true
            }


        },


               messages:
 {

    ngo_origin: {
                required: " Ngo Origin Field is required"
            },

            password: {
                required: "Language Field is required"
            },




 }
    });
});
</script>
@endsection
