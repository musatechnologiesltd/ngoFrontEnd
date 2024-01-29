@extends('front.master.master')

@section('title')
{{ trans('main.home')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')
<!-- ======= Menu-box Section ======= -->
<section>


    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="rn-service">
                    <div class="d-flex justify-content-center">
                        <div class="box_icon">
                            <img src="{{ asset('/') }}public/front/assets/img/icon/box_icon/application.png" alt="">
                        </div>
                        <div class="box_text">
                            <h1>{{ trans('main.Apply_Online_For_New_NGO')}}</h1>
                            @if (Auth::check())
                            <p><a href="{{ route('dashboard') }}">{{ trans('main.sub_one')}}</a></p>
                            @else
                            <p><a href="{{ route('login') }}">{{ trans('main.sub_one')}}</a></p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="rn-service">
                    <div class="d-flex justify-content-center">
                        <div class="box_icon">
                            <img src="{{ asset('/') }}public/front/assets/img/icon/box_icon/user-guide.png" alt="">
                        </div>
                        <div class="box_text">
                            <h1>{{ trans('main.NGO_Application_Instruction')}}</h1>
                            <p><a href="{{ route('ngoInstructionPage') }}">{{ trans('main.sub_one')}}</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="rn-service">
                    <div class="d-flex justify-content-center">
                        <div class="box_icon">
                            <img src="{{ asset('/') }}public/front/assets/img/icon/box_icon/search.png" alt="">
                        </div>
                        <div class="box_text">
                            <h1>{{ trans('main.Application_Status_Update')}}</h1>
                            <p><a href="{{ route('statusPage') }}">{{ trans('main.sub_one')}}</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="rn-service">
                    <div class="d-flex justify-content-center">
                        <div class="box_icon">
                            <img src="{{ asset('/') }}public/front/assets/img/icon/box_icon/receipt.png" alt="">
                        </div>
                        <div class="box_text">
                            <h1>{{ trans('main.NGO_Registrations_Fees_Information')}}</h1>
                            <p><a href="{{ route('ngoRegistrationFeeList') }}">{{ trans('main.sub_one')}}</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="rn-service">
                    <div class="d-flex justify-content-center">
                        <div class="box_icon ">
                            <img src="{{ asset('/') }}public/front/assets/img/icon/box_icon/question.png" alt="">
                        </div>
                        <div class="box_text">
                            <h1>{{ trans('main.Frequently_Ask_Question')}}</h1>
                            <p><a href="{{ route('frequentlyAskQuestion') }}">{{ trans('main.sub_one')}}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- End Menu-box -->

<!-- ======= Others (Notice & Emergency Number) Section ======= -->

<section class="section_second">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-12 mb-4">
                <div class="notice_inner">
                    <h1>{{ trans('main.Notice_Board')}}</h1>
                    <div class="notice_underline"></div>
                    <ul class="notice_ul">
                        @foreach($noticeList as $allNoticeList)
                        <li> <a href="{{ route('viewNotice',$allNoticeList->id) }}" target="_blank">{{ $allNoticeList->headline }}</a>
                        </li>
                        @endforeach

                    </ul>
                    <div class="d-flex flex-row-reverse">
                        <button onclick="location.href='{{ route('allNoticeBoard') }}';"  h class="noselect notice_button">All Notice</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="emergency_inner">
                    <img src="{{ asset('/') }}public/front/assets/img/emergency_number/National_Emergency_images.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- End Others (Notice & Emergency Number) -->


@endsection

@section('script')

@endsection
