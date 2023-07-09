@extends('front.master.master')

@section('title')
{{ trans('fd9.nvisa')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')

<?php
 $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
      'May','June','July','August','September','October','November','December','Saturday','Sunday',
      'Monday','Tuesday','Wednesday','Thursday','Friday');
      $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
      'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
      বুধবার','বৃহস্পতিবার','শুক্রবার'
      );



?>

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
                                    @if(session()->get('locale') == 'en')
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
                                <p class="{{ Route::is('dashboard')  ? 'active_link' : '' }}"><i class="fa fa-user pe-2"></i>ব্যবহারকারীর প্রোফাইল</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('nameChange') }}">
                                <p class="{{ Route::is('nameChange')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>এনজিওর নাম পরিবর্তন</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('renew') }}">
                                <p class="{{ Route::is('renew')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>আবেদন পুনর্নবীকরণ</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('nVisa.index') }}">
                                <p class="{{ Route::is('nVisa.index') || Route::is('nVisa.create') || Route::is('fdNineForm.create')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.nvisa')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fdNineOneForm.index') }}">
                                <p class="{{ Route::is('fdNineOneForm.show') || Route::is('fdNineOneForm.index') ||  Route::is('fdNineOneForm.create') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd09formone')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('logout') }}">
                                <p class=""><i class="fa fa-cog pe-2"></i>লগ আউট</p>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-6 col-sm-12">
<!--download pdf -->
                <div class="card mt-3 mb-3">
                    <div class="card-body">

                        <table class="table table-bordered">
                            <tr>
                                <td>PDF Download (পিডিএফ ডাউনলোড )</td>
                                <td>PDF Upload (পিডিএফ আপলোড)</td>
                                <td>Update Information (তথ্য সংশোধন করুন)</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="btn btn-sm btn-success" target="_blank" href = "{{ route('mainPdfDownload',$fd9OneList->id) }}">
                                        {{ trans('form 8_bn.download_pdf')}}
                                    </a>
                                </td>
                                <td>

                                    @if(empty($fd9OneList->verified_fd_nine_one_form))
                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        {{ trans('form 8_bn.upload_pdf')}}
                                    </button>
                                    @else

                                    <?php

                                    $file_path = url($fd9OneList->verified_fd_nine_one_form);
                                    $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                    $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                    ?>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        @if(session()->get('locale') == 'en')
                                        পুনরায় আপলোড করুন
                                        @else
                                        Re-upload
                                        @endif
                                    </button><br>
                                    <p class="badge bg-success rounded">{{ $filename.'.'.$extension }}</p>
                                    @endif
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">

                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('mainPdfUpload') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                            @csrf

                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.pdf')}}:</label>
                                <input type="file" data-parsley-required accept=".pdf" name="verified_fd_nine_one_form"  class="form-control" id="">
                                <input type="hidden" data-parsley-required  name="id"  value="{{ $fd9OneList->id }}" class="form-control" id="">
                            </div>

                            <button class="btn btn-sm btn-success" type="submit">
                                {{ trans('form 8_bn.upload_pdf')}}
                            </button>
                        </form>
                    </div>

                  </div>
                </div>
              </div>

                                </td>
                            <td>
                                <button class="btn btn-sm btn-success" onclick="location.href = '{{ route('fdNineOneForm.edit',$fd9OneList->id) }}';">
                                    আপডেট করুন
                 </button>
                             </td>
                         </tr>

                        </table>

                    </div>
                </div>
<!--end download pdf -->

                <div class="card">
                    <div class="card-body">
                        <div class="form9_upper_box">
                            <h3>এফডি-৯(১) ফরম</h3>
                            <h4>বিদেশি বিশেষজ্ঞ, উপদেষ্টা, কর্মকর্তা বা স্বেচ্ছাসেবী এর ওয়ার্ক পারমিটের (কার্যানুমতি)
                                আবেদন ফরম</h4>
                            <h5>(আবশ্যকাবে বাংলা নিকস ফন্টে পুরণ করে দাখিল করতে হবে)</h5>

                            <div>
                                <p>বরাবর <br>
                                    মহাপরিচালক <br>
                                    এনজিও বিষয় ব্যুরো, ঢাকা <br>
                                    জনাব,</p>

                            </div>
                        </div>
                    </div>
                    <div class="card-body fd0901_text_style">
                        <table class="table table-borderless">
                            <tr>
                                <td>বিষয়:</td>
                                <td>সংস্থার বিদেশি বিশেষজ্ঞউপদেষ্টা/কর্মকর্ত/সেচ্ছাসেবী "<span>{{ $fd9OneList->foreigner_name_for_subject }}</span>" এর
                                    ওয়ার্ক পারমিট প্রসঙ্গে।
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>সূত্র: এনজিও বিষয়ক ব্যুরোর স্মারক নম্বর <span>{{ $fd9OneList->sarok_number }}</span> তারিখ <span>{{ str_replace($engDATE,$bangDATE,date('d-m-Y', strtotime($fd9OneList->application_date))) }}</span>
                                </td>
                            </tr>
                        </table>

                        <p class="mt-3 mb-2">
                            উপর্যুক্ত বিষয় ও সূত্রের বরাতে "<span>{{ $fd9OneList->institute_name }}</span>" সংস্থার "<span>{{ $fd9OneList->prokolpo_name }}</span>" প্রকল্পের আওতায় "<span>{{ $fd9OneList->designation_name }}</span>" হিসেবে বিদেশী বিশেষজ্ঞ/
                            উপদেষ্টা/কর্মকর্তা/স্বেচ্ছাসেবী <span>{{ $fd9OneList->foreigner_name_for_body }}</span> কে <span>{{ str_replace($engDATE,$bangDATE,date('d-m-Y', strtotime($fd9OneList->expire_from_date))) }}</span> খ্রি: হতে <span>{{ str_replace($engDATE,$bangDATE,date('d-m-Y', strtotime($fd9OneList->expire_to_date))) }}</span> পর্যন্ত সময়ের জন্য নিয়োগ করা হয়েছে। সংস্থার অনুকূলে
                            উক্ত ব্যাক্তির অনুমোদিত সময়ের জন্য ওয়ার্ক পারমিট ইস্যু করার জন্য ওয়ার্ক পারমিট ইস্যু করার
                            জন্য একসাথে নিম্ন বর্ণিত কাগজপত্র সংযুক্ত করা হল:
                        </p>

                        <table class="table table-borderless">
                            <tr>
                                <td>০১</td>
                                <td>নিয়োগপত্র সত্যায়ন প্রমাণক</td>
                                <td>: @if(!$fd9OneList->attestation_of_appointment_letter)

                                    @else

     <?php

                                     $file_path = url($fd9OneList->attestation_of_appointment_letter);
                                     $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                     $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                     ?>

                                     @endif
                                     <a href="{{ route('niyogPotroDownload',$fd9OneList->id) }}" target="_blank">{{ $filename.'.'.$extension  }}</a>
    </td>
                            </tr>
                            <tr>
                                <td>০২</td>
                                <td>ফর্ম ৯ এর কপি</td>
                                <td>:  @if(!$fd9OneList->copy_of_form_nine)

                                    @else

     <?php

                                     $file_path = url($fd9OneList->copy_of_form_nine);
                                     $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                     $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                     ?>

                                     @endif
                                     <a href="{{ route('formNinePdfDownload',$fd9OneList->id) }}" target="_blank">{{ $filename.'.'.$extension  }}</a>
    </td>
                            </tr>
                            <tr>
                                <td>০৩</td>
                                <td>ছবি</td>
                                <td>:<img src="{{ asset('/') }}{{ $fd9OneList->foreigner_image }}" style="height:40px;"/></td>
                            </tr>
                            <tr>
                                <td>০৪</td>
                                <td>এন ভিসা নিয়ে আগমনের তারিখ (প্রমানসহ)</td>
                                <td>:

                                    @if(!$fd9OneList->copy_of_nvisa)

                               @else

<?php

                                $file_path = url($fd9OneList->copy_of_nvisa);
                                $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                ?>

                                @endif
<a href="{{ route('nVisaCopyDownload',$fd9OneList->id) }}" target="_blank">{{ $filename.'.'.$extension  }}</a>,
                                {{ str_replace($engDATE,$bangDATE,date('d-m-Y', strtotime($fd9OneList->arrival_date_in_nvisa))) }}</td>
                            </tr>
                        </table>

                        <p class="mb-3">এমতবস্থায়, অত্র সংস্থার উল্লেখিত পদে <span>{{ str_replace($engDATE,$bangDATE,date('d-m-Y', strtotime($fd9OneList->proposed_from_date))) }}</span> হতে <span>{{ str_replace($engDATE,$bangDATE,date('d-m-Y', strtotime($fd9OneList->proposed_from_date))) }}</span> মেয়াদে উক্ত বিদেশি কর্মকর্তাকে ওয়ার্ক পারমিট ইস্যু করার জন্য বিনীত অনুরধ করেছি।</p>

                        <div class="row">
                            <div class="col-lg-6 col-sm-12"></div>
                            <div class="col-lg-6 col-sm-12">
                                <table class="table table-borderless">
                                    <tr>
                                        <td>প্রধান নির্বাহীর স্বাক্ষর ও সিল</td>
                                    </tr>
                                    <tr>
                                        <td>নামঃ</td>
                                    </tr>
                                    <tr>
                                        <td>পদবীঃ</td>
                                    </tr>
                                    <tr>
                                        <td>তারিখঃ</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
