@extends('front.master.master')

@section('title')
{{ trans('header.reg')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')
<section>
    <div class="container">
        <div class="registration_box">
            <div class="registration_inner_box">
                <h1>{{ trans('header.step')}}: {{ trans('header.tt_one')}}</h1>
                <form method="post" action="{{ route('register.post') }}" id="form" data-parsley-validate="">
                    @csrf





                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">{{ trans('header.person_name')}} <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control" required  data-parsley-length=“[3,60]” maxlength="60"   data-parsley-pattern=“[a-zA-Z]+$” data-parsley-trigger=“keyup” name="name" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">{{ trans('header.email')}} <span class="text-danger">*</span> </label>
                        <input type="email" class="form-control" name="email" data-parsley-length=“[10,32]” maxlength="32"  id="email" required data-parsley-type=“email” data-parsley-trigger=“keyup” aria-describedby="emailHelp">
                        <small id="show_order_by_price"></small>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">{{ trans('header.password')}} <span class="text-danger">*</span> </label>
                        <input type="password" autocomplete="off" class="form-control" required data-parsley-length=“[5,32]” maxlength="32" data-parsley-trigger=“keyup” name="password" id="password">
                    </div>


                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">{{ trans('header.passwordc')}} <span class="text-danger">*</span> </label>
                        <input type="password" autocomplete="off" class="form-control" required data-parsley-length=“[5,32]” maxlength="32" data-parsley-equalto="#password" data-parsley-trigger=“keyup” name="cpassword" id="cpassword">
                      <small id="p_result" style="color:red" ></small>
                    </div>


                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">{{ trans('header.phone_number')}} <span class="text-danger">*</span> </label>
                        <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        type = "number"
                        maxlength = "11" class="form-control" name="phone" id="phone" required data-parsley-minlength=“11” data-parsley-trigger=“keyup”>
                        {{-- <div id="" class="form-text">{{ trans('header.sm')}}</div> --}}
                    </div>
                    <div class="d-grid d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-registration" id="final_button">{{ trans('header.reg1')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')


<script>
    $("#email").keyup(function(){

           var pass = $(this).val();


           $.ajax({
    url: "{{ route('checkMailAlreadyRegisteredOrNot') }}",
    method: 'GET',
    data: {pass:pass},
    success: function(data) {
      $("#show_order_by_price").html('');
      $("#show_order_by_price").html(data);
    }
    });


  //alert(pass);
});
</script>


<script>
    $("#password").keyup(function(){

           var pass = $(this).val();
           var pass_C = $('#cpassword').val();

      if(pass == pass_C){
      $("#final_button").attr("disabled",false);
        $("#p_result").html("");
      }else{
       $("#final_button").attr("disabled",true);
         $("#p_result").html("password did not matched");
      }


  //alert(pass);
});
</script>


<script>
    $("#cpassword").keyup(function(){

           var pass = $(this).val();
           var pass_C = $('#password').val();

      if(pass == pass_C){
      $("#final_button").attr("disabled",false);
         $("#p_result").html("");
      }else{
       $("#final_button").attr("disabled",true);
        $("#p_result").html("password did not matched");
      }


  //alert(pass);
});
</script>


<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>

<script>
    $(document).ready(function () {
    $('#form').validate({ // initialize the plugin
        rules: {

            email: {
                required: true
            },
            password: {
                required: true
            },


            cpassword: {
                required: true
            },

            name: {
                required: true
            },

            phone: {
                required: true
            }


        },


               messages:
 {

            email: {
                required: " Email Field is required"
            },

            password: {
                required: "Password Field is required"
            },

            name: {
                required: " Name Field is required"
            },

            phone: {
                required: "Mobile Number Field is required"
            },




 }
    });
});
</script>
@endsection
