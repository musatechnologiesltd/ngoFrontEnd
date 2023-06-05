@extends('front.master.master')

@section('title')
{{ trans('main.Frequently_Ask_Question')}} | {{ trans('header.ngo_ab')}}
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
                        @include('front.include.sidebar_dash')
                    </ul>

                </div>
                <div class="dashboard_right">
                    <div class="tofsil2_box mt-3">
                        <h1>Date Reset Page</h1>
                        <div class="tofsil2_list">
                            <h3>Do you want to completely delete NGO registration information?</h3>
                            <h3>আপনি কি এনজিও রেজিস্ট্রেশন তথ্যগুলো সম্পূর্ণ মুছে ফেলতে চাচ্ছেন?</h3>
                            <p class="small">Once you delete the data you can not get back any of data that you previously input.</p>
                            <p class="small">একবার আপনি ডেটা মুছে ফেললে আপনি পূর্বে ইনপুট করা কোনও ডেটা ফিরে পাবেন না।</p>
                            <form action="">
                                <div class="mb-4">
                                    <label for="" class="form-label">Select (নির্বাচন করুন)</label>
                                    <br>
                                    <div class="form-check ms-3">
                                        <input class="form-check-input" type="radio" name="" id="" value="" checked>
                                        <label class="form-check-label"  for="">হ্যা </label>
                                    </div>
                                    <div class="form-check ms-3">
                                        <input class="form-check-input " type="radio" name="" id="" value="">
                                        <label class="form-check-label" for="">না </label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="d-grid d-md-flex justify-content-start mt-4">
                        <button class="btn btn-registration" onclick="deleteTag(2)" >Delete Info
                        </button>

                        <form id="delete-form-2" action="{{ route('reset_all_data') }}" method="POST" style="display: none;">

                            @csrf

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@section('script')
@endsection
