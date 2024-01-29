@extends('front.master.master')

@section('title')
{{ trans('ngo_member.ngo_member')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')


<section>
    <div class="container">
        <div class="form-card">
            <div class="dashboard_box">
                <div class="dashboard_left">

                    <ul>
                        @include('front.include.sidebarDash')
                         </ul>

                </div>
                <div class="dashboard_right">

                    <div class="card">
                        <div class="card-header">
                            {{ trans('ngo_member.ngo_member')}}
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('ngoMember.update',$allDataList->id ) }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                                @csrf
                                @method('PUT')

                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.name')}} <span class="text-danger">*</span> </label>
                                    <input type="text" name="name" value="{{ $allDataList->name }}"  class="form-control" id="">



                                </div>
                               <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.designation')}} <span class="text-danger">*</span> </label>
                                    <input type="text" name="desi" value="{{ $allDataList->desi }}" class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.date_of_birth')}} <span class="text-danger">*</span> </label>
                                    <input type="text" name="dob" value="{{ $allDataList->dob }}" class="form-control" id="datepicker">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.nid_no')}} <span class="text-danger">*</span> </label>
                                    <input type="text" name="nid_no" value="{{ $allDataList->nid_no }}"  class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.mobile_no')}} <span class="text-danger">*</span> </label>
                                    <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    type = "number"
                                    maxlength = "11" minlength="11" name="phone" value="{{ $allDataList->phone }}" class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.fathers_name')}} <span class="text-danger">*</span> </label>
                                    <input type="text" name="father_name" value="{{ $allDataList->father_name }}" class="form-control" id="">
                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.present_address')}} <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control"  name="present_address" id="exampleFormControlTextarea1"
                                              rows="2" value="{{ $allDataList->present_address }}"/>



                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.permanent_address')}} <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" name="permanent_address"   id="exampleFormControlTextarea1"
                                              rows="2" value="{{ $allDataList->permanent_address }}" />


                                </div>
                                <div class=" mb-3">
                                    <label for="" class="form-label">{{ trans('form 8_bn.name_of_spouse')}} <span class="text-danger">*</span> </label>
                                    <input type="text" name="name_supouse" value="{{ $allDataList->name_supouse }}" class="form-control" id="">
                                </div>
                               
                                <div class="d-grid d-md-flex justify-content-md-end">
                                    <button type="submit" class="btn btn-registration">{{ trans('form 8_bn.update')}}
                                    </button>
                                </div>
                            </form>
                        </div>
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

    });
});
</script>
@endsection
