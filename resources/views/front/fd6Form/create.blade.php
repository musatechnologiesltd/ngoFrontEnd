@extends('front.master.master')

@section('title')
{{ trans('fd9.fd6')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

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
                                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
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
                            <a href="{{ route('fdNineForm.index') }}">
                                <p class="{{ Route::is('fdNineForm.index') || Route::is('fdNineForm.create') || Route::is('fdNineForm.create')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.nvisa')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fdNineOneForm.index') }}">
                                <p class="{{ Route::is('fdNineOneForm.index') ||  Route::is('fdNineOneForm.create') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd09formone')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fd6Form.index') }}">
                                <p class="{{ Route::is('fd6Form.index') ||  Route::is('fd6Form.create') || Route::is('fd6Form.view') || Route::is('fd2Form.create') || Route::is('fd2Form.index') || Route::is('fd6Form.edit') || Route::is('fd2Form.view') || Route::is('fd2Form.edit')? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd6')}}</p>
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
                <div class="card">
                    <div class="card-body">
                        <div class="name_change_box">
                            <div class="step_box">
                                <ul class="process-model more-icon-preocess">
                                    <li class="active visited">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <p>FD-06</p>
                                    </li>
                                    <li>
                                        <i class="fa fa-file-text" aria-hidden="true"></i>
                                        <p>FD-02</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="others_inner_section">
                                        <h1>প্রকল্প প্রস্তাব ফরম</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-3 card-custom-color">
                                <div class="card-body">
                                    <div class="form9_upper_box">
                                        <h3>এফডি - ৬ ফরম </h3>
                                        <h4>প্রকল্প প্রস্তাব ফরম</h4>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">এনজিও'র নাম</label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">ব্যুরোর নিবন্ধন তারিখ </label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">সর্বশেষ নবায়ন</label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">মেয়াদ উত্তীর্ণের তারিখ</label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">ঠিকানা</label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">টেলিফোন </label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">মোবাইল নম্বর</label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">ইমেইল ঠিকানা</label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">ওয়েবসাইট</label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">প্রকল্প নাম</label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">প্রকল্প মেয়াদ </label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">আরম্ভের তারিখ </label>
                                            <input type="date" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">সমাপ্তির তারিখ </label>
                                            <input type="date" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">প্রকল্প এলাকা</label>
                                        </div>
                                        <div class="mb-3 col-lg-12">
                                            <table class="table table-bordered" id="dynamicAddRemove">
                                                <tr>
                                                    <th>বিভাগ</th>
                                                    <th>জেলা/সিটি কর্পোরেশন</th>
                                                    <th>উপজেলা/থানা/পৌরসভা/ওয়ার্ড</th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20%">
                                                        <label for="" class="form-label">বিভাগ</label>
                                                        <input type="text" name="division_name[]" class="form-control" id=""
                                                        placeholder="">
                                                    </td>
                                                    <td style="width: 35%">
                                                        <div class="row">
                                                            <div class="col-lg-6 mb-3">
                                                                <label for="" class="form-label">জেলা</label>
                                                                <input type="text" name="district_name[]" class="form-control" id=""
                                                                placeholder="">
                                                            </div>
                                                            <div class="col-lg-6 mb-3">
                                                                <label for="" class="form-label">সিটি কর্পোরেশন</label>
                                                                <input type="text" name="city_corparation_name[]" class="form-control" id=""
                                                                placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-lg-6 mb-3">
                                                                <label for="" class="form-label">উপজেলা</label>
                                                                <input type="text" name="upozila_name[]" class="form-control" id=""
                                                                placeholder="">
                                                            </div>
                                                            <div class="col-lg-6 mb-3">
                                                                <label for="" class="form-label">থানা</label>
                                                                <input type="text" name="thana_name[]" class="form-control" id=""
                                                                placeholder="">
                                                            </div>
                                                            <div class="col-lg-6 mb-3">
                                                                <label for="" class="form-label">পৌরসভা</label>
                                                                <input type="text" name="municipality_name[]" class="form-control" id=""
                                                                placeholder="">
                                                            </div>
                                                            <div class="col-lg-6 mb-3">
                                                                <label for="" class="form-label">ওয়ার্ড</label>
                                                                <input type="text" name="ward_name[]" class="form-control" id=""
                                                                placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-primary btn-sm" id="dynamic-ar"><i class="fa fa-plus"></i></button>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">প্রাক্কলিক ব্যয় ও দাতা সংস্থার নাম :
                                            </label>
                                        </div>
                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">প্রাক্কলিক ব্যয় (টাকায়)
                                            </label>
                                        </div>
                                        <div class="col-12">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>অর্থের উৎসের বিবরণ:</th>
                                                    <th>১ম বছর</th>
                                                    <th>২য় বছর</th>
                                                    <th>৩য় বছর</th>
                                                    <th>৪র্থ বছর</th>
                                                    <th>৫ম বছর</th>
                                                    <th>মোট</th>
                                                    <th>মন্তব্য</th>
                                                </tr>
                                                <tr>
                                                    <td>১.বিদেশ থেকে প্রাপ্ত অনুদান (বাংলাদেশি তাকে পরিবর্তিত)</td>
                                                    <td><input type="text" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" class="form-control" id=""
                                                               placeholder=""></td>
                                                </tr>
                                                <tr>
                                                    <td>২.দেশে অবস্থানরত বিদেশি দাতার প্রদত্ত অনুদান </td>
                                                    <td><input type="text" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" class="form-control" id=""
                                                               placeholder=""></td>
                                                </tr>
                                                <tr>
                                                    <td>৩.স্থানীয় অনুদান  (উৎসের বিস্তারিত বিবরণ ও প্রমাণকসহ)</td>
                                                    <td><input type="text" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" class="form-control" id=""
                                                               placeholder=""></td>
                                                </tr>
                                                <tr>
                                                    <td>মোট </td>
                                                    <td><input type="text" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" class="form-control" id=""
                                                               placeholder=""></td>
                                                    <td><input type="text" class="form-control" id=""
                                                               placeholder=""></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">দাতা সংস্থার নাম</label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">দাতা সংস্থার ঠিকানা </label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">ফোন/মোবাইল/ইমেইল নম্বর  </label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">ওয়েবসাইট  </label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label"> মানিলন্ডারিং এবং সন্ত্রাসে অর্থায়ন প্রতিরোধের নিমিত্ত</label>
                                            <input type="text" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">প্রশাসনিক ব্যয় ও প্রকল্প ব্যায়ের অনুপাত:</label>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>#</th>
                                                    <th>টাকার পরিমাণ</th>
                                                    <th>অনুপাত</th>
                                                </tr>
                                                <tr>
                                                    <td>প্রকল্প ব্যয়</td>
                                                    <td>
                                                        <input type="text" class="form-control" id=""
                                                               placeholder="">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" id=""
                                                               placeholder="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>প্রশাসনিক ব্যয়</td>
                                                    <td>
                                                        <input type="text" class="form-control" id=""
                                                               placeholder="">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" id=""
                                                               placeholder="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>মোট</td>
                                                    <td>
                                                        <input type="text" class="form-control" id=""
                                                               placeholder="">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" id=""
                                                               placeholder="">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">প্রকল্প এলাকাসমূহে প্রকল্পের বিস্তারিত সাইনবোর্ড প্রদর্শন বিষয়ক তথ্যাদি :</label>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>প্রকল্পের নাম  </td>
                                                    <td>
                                                        <input type="text" class="form-control" id=""
                                                               placeholder="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>প্রকল্পের মেয়াদকাল </td>
                                                    <td>
                                                        <input type="text" class="form-control" id=""
                                                               placeholder="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>প্রকল্পের মোট বরাদ্দ </td>
                                                    <td>
                                                        <input type="text" class="form-control" id=""
                                                               placeholder="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>প্রকল্প এলাকায় মোট বরাদ্দ </td>
                                                    <td>
                                                        <input type="text" class="form-control" id=""
                                                               placeholder="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> মোট উপকারভোগীর সংখ্যা </td>
                                                    <td>
                                                        <input type="text" class="form-control" id=""
                                                               placeholder="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>প্রকল্প এলাকায় মোট জনসংখ্যা </td>
                                                    <td>
                                                        <input type="text" class="form-control" id=""
                                                               placeholder="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>দাতা সংস্থার নাম</td>
                                                    <td>
                                                        <input type="text" class="form-control" id=""
                                                               placeholder="">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            প্রকল্প প্রস্তাব ফরম পিডিফ
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3 col-lg-12">
                                                <label for="" class="form-label">প্রকল্প প্রস্তাব ফরম পিডিফ আপলোড করুন</label>
                                                <input type="file" class="form-control" id=""
                                                       placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-grid d-md-flex justify-content-md-end">
                                        <button type="button" class="btn btn-registration"
                                                onclick="location.href = 'fd_02_finance_release_form.php';">Next Page
                                        </button>
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

@section('script')
<script>
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td style="width: 20%"><label for="" class="form-label">বিভাগ</label><input type="text" name="division_name[]" class="form-control" id="" placeholder=""></td><td style="width: 35%"><div class="row"><div class="col-lg-6 mb-3"><label for="" class="form-label">জেলা</label><input type="text" name="district_name[]" class="form-control" id="" placeholder=""></div><div class="col-lg-6 mb-3"><label for="" class="form-label">সিটি কর্পোরেশন</label><input type="text" name="city_corparation_name[]" class="form-control" id="" placeholder=""></div></div></td><td><div class="row"><div class="col-lg-6 mb-3"><label for="" class="form-label">উপজেলা</label><input type="text" name="upozila_name[]" class="form-control" id="" placeholder=""></div><div class="col-lg-6 mb-3"><label for="" class="form-label">থানা</label><input type="text" name="thana_name[]" class="form-control" id=""placeholder=""></div><div class="col-lg-6 mb-3"><label for="" class="form-label">পৌরসভা</label><input type="text" name="municipality_name[]" class="form-control" id=""placeholder=""></div><div class="col-lg-6 mb-3"><label for="" class="form-label">ওয়ার্ড</label><input type="text" name="ward_name[]" class="form-control" id=""placeholder=""></div></div></td><td><button type="button" class="btn btn-outline-danger remove-input-field"><i class="bi bi-file-earmark-x-fill"></i></button></td></tr>');
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });

</script>

@endsection
