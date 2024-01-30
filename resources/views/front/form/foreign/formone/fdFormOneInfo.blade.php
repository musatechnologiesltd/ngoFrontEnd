<?php

        $allformOneData = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->first();
        $getAllDataAdviserBank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',$allformOneData->id)->first();
        $getAllDataOther= DB::table('fd_one_other_pdf_lists')->where('fd_one_form_id',$allformOneData->id)->get();
        $getAllDataAdviser = DB::table('fd_one_adviser_lists')->where('fd_one_form_id',$allformOneData->id)->get();
        $formOneMemberList = DB::table('fd_one_member_lists')->where('fd_one_form_id',$allformOneData->id)->get();
        $getAllSourceOfFundData = DB::table('fd_one_source_of_funds')->where('fd_one_form_id',$allformOneData->id)->get();
        $ngoTypeInfo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
        $getngoForLanguage = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');

?>

                    @include('flash_message')
                    <div class="user_dashboard_right">
                        <h4>{{ trans('fd_one_step_one.f_form')}} </h4>
                    </div>

                  <div class="card-body mt-3 mb-3">
                        <div class="card-body">
                            @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

                            <p>এনজিও'র বিবরণ </p>
                            @else
                            <p>Details of the NGO</p>
                            @endif

                            <table class="table table-bordered">
                                <tr>
                                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                    <td>পিডিএফ ডাউনলোড</td>
                                    <td>তথ্য সংশোধন করুন</td>
                                    @else
                                    <td>PDF Download</td>
                                    <td>Update Information</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>
                                        @if($ngoTypeInfo == 'দেশিও')

                                        <button class="btn btn-sm btn-success" id="downloadButton">
                                            {{ trans('form 8_bn.download_pdf')}}
                                        </button>

                                        @else
                                        <input type="hidden" data-parsley-required  name="{{ trans('mview.place')}}" value="{{ $allformOneData->place }}"  class="form-control" id="mainPlace" placeholder="{{ trans('mview.place')}}">
                                        <input type="hidden" data-parsley-required  name="id"  value="{{ $allformOneData->id }}" class="form-control" id="mainId">
                                        <button class="btn btn-sm btn-success" id="downloadButton345">
                                            {{ trans('form 8_bn.download_pdf')}}
                                        </button>
                                        @endif
                                    </td>

                                    <td>
                                       <button class="btn btn-sm btn-success" onclick="location.href = '{{ route('fdOneFormEdit') }}';">
                            {{ trans('fd_one_step_four.fd_update')}}
                        </button>
                                    </td>
                                </tr>
                            </table>
<?php

    $data = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->first();

    $count = 0;
    foreach ($data   as $a) {
        if (is_null($a)) {
            $count++;
    }
    }

?>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tbody>
                                <tr>
                                    <td>{{ trans('fd_one_step_one.one')}}.</td>
                                    <td colspan="3">{{ trans('fd_one_step_one.Particulars_of_Organisation')}} :</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>(i)</td>
                                    <td>{{ trans('fd_one_step_one.Organization_Name_Organization_address')}}</td>
                                    <td>: {{ $allformOneData->organization_name }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>(ii)</td>
                                    <td>{{ trans('fd_one_step_one.Organization_address')}}</td>
                                    <td>: {{ $allformOneData->organization_address }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>(iii)</td>
                                    <td>{{ trans('fd_one_step_one.reg_num')}}</td>
                                    <td>:

                                        @if($allformOneData->registration_number == 0)

                                        @else

                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

                                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($allformOneData->registration_number) }}
                                        @else

                                        {{ $allformOneData->registration_number }}
                                        @endif
                                        @endif


                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>(iv)</td>
                                    <td>{{ trans('fd_one_step_one.Country_of_Origin')}}</td>
                                    <td>: {{ $allformOneData->country_of_origin }}</td>
                                </tr>



                                <tr>
                                    <td></td>
                                    <td>(v)</td>
                                    <td>{{ trans('fd_one_step_one.Address_of_the_Head_Office')}}</td>
                                    <td>: {{ $allformOneData->address_of_head_office_eng }}</td>
                                </tr>



                                <tr>
                                    <td></td>
                                    <td>(vi)</td>
                                    <td>{{ trans('fd_one_step_one.hh')}}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>{{ trans('form 8_bn.a')}}) {{ trans('fd_one_step_one.name')}}</td>
                                    <td>: {{ $allformOneData->name_of_head_in_bd }}</td>
                                </tr>

                                   <?php
                                  $getngoForLanguage = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
                                  if($getngoForLanguage =='দেশিও'){

                                    if($allformOneData->job_type == 'Full-Time'){

                                      $getJobType = 'পূর্ণকালীন';
                                    }else{
                                    $getJobType = 'খণ্ডকালীন';
                                    }

                                  }else{
                                   $getJobType =$allformOneData->job_type;
                                  }

                                  ?>


                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>{{ trans('form 8_bn.b')}}) {{ trans('fd_one_step_one.Whether_part_time_or_full_time')}}</td>
                                    <td>: {{ $getJobType }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>{{ trans('form 8_bn.c')}}) {{ trans('fd_one_step_one.Address_Mobile_Number_Email')}}</td>
                                    <td>: {{ $allformOneData->address }}, {{ $allformOneData->tele_phone_number }}, {{ $allformOneData->phone }}, {{ $allformOneData->email }}</td>
                                </tr>
                                 <?php
                                    if($getngoForLanguage =='দেশিও'){
                                    $getCityzendata = $allformOneData->citizenship;
                                    }else{

                                    $getCityzendata = $allformOneData->citizenship;
                                    }
                                  ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>{{ trans('form 8_bn.d')}}) {{ trans('fd_one_step_one.Citizenship')}}</td>
                                    <td>: {{ $getCityzendata }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>{{ trans('form 8_bn.e')}}) {{ trans('fd_one_step_one.Profession')}}</td>
                                    <td>: {{ $allformOneData->profession }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('fd_one_step_one.two')}}.</td>
                                    <td colspan="3">{{ trans('fd_one_step_two.Field_of_proposed_activities')}} ({{ trans('fd_one_step_two.des')}}):
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>{{ trans('form 8_bn.a')}}</td>
                                    <td>(i) {{ trans('fd_one_step_two.Plan_of_Operation')}} </td>
                                    <td>: @if(empty($allformOneData->plan_of_operation))

                                        @else


                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

                                        <a target="_blank"  href="{{ route('planOfOperation',base64_encode($allformOneData->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>

                                        @else

                                        <a target="_blank"  href="{{ route('planOfOperation',base64_encode($allformOneData->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                        @endif
                                        @endif</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>(ii) {{ trans('fd_one_step_two.pp')}}</td>
                                    <td>: {{ $allformOneData->district }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>{{ trans('form 8_bn.b')}}</td>
                                    <td>{{ trans('fd_one_step_two.Source_of_Fund')}}</td>
                                    <td></td>
                                </tr>
                                @foreach($getAllSourceOfFundData as $allGetAllSourceOfFundData)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>(i) {{ trans('fd_one_step_two.dd')}}</td>
                                    <td>: {{ $allGetAllSourceOfFundData->name }}, {{ $allGetAllSourceOfFundData->address }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>(ii) {{ trans('fd_one_step_two.copy')}}</td>
                                    <td>: @if(empty($allGetAllSourceOfFundData->letter_file))

                                        @else

                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

                                        <a target="_blank"  href="{{ route('sourceOfFundDocDownload',base64_encode($allGetAllSourceOfFundData->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>

                                        @else

                                        <a target="_blank"  href="{{ route('sourceOfFundDocDownload',base64_encode($allGetAllSourceOfFundData->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                        @endif
                                        @endif</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td>{{ trans('fd_one_step_one.three')}}.</td>
                                    <td colspan="2">{{ trans('fd_one_step_two.money')}}</td>
                                    <td>:

                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))


                                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla($allformOneData->annual_budget) }}


                                        @else

                                        {{ $allformOneData->annual_budget }}

                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ trans('fd_one_step_one.four')}}.</td>
                                    <td colspan="3">{{ trans('fd_one_step_three.staff_position')}}
                                    </td>
                                </tr>
                                @foreach($formOneMemberList as $key=>$allFormOneMemberList)
                                <tr>

                                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                    <td></td>
                                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1 )}}.</td>
                                    <td>কর্মকর্তা {{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1 )}}</td>
                                    <td></td>
                                    @else
                                    <td></td>
                                    <td>{{ $key+1}}.</td>
                                    <td>Staff {{$key+1 }}</td>
                                    <td></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.a')}})</td>
                                    <td>{{ trans('fd_one_step_three.name')}}</td>
                                    <td>: {{ $allFormOneMemberList->name }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.b')}})</td>
                                    <td>{{ trans('fd_one_step_three.desi')}}</td>
                                    <td>: {{ $allFormOneMemberList->position }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.c')}})</td>
                                    <td>{{ trans('fd_one_step_three.address')}}</td>
                                    <td>: {{ $allFormOneMemberList->address }}</td>
                                </tr>
                                <tr>
                                  <?php

                                  $convetArray = explode(",",$allFormOneMemberList->citizenship);


                                    if($getngoForLanguage =='দেশিও'){
                                    $getCityzendata = DB::table('countries')->whereIn('country_people_bangla',$convetArray)->get();
                                    }else{

                                    $getCityzendata = $allFormOneMemberList->citizenship;
                                    }
                              
                                  ?>

                                    <td></td>
                                    <td>({{ trans('form 8_bn.d')}})</td>
                                    <td>{{ trans('fd_one_step_three.citizenship')}}</td>
                                    <td>:
                                        @if($getngoForLanguage =='দেশিও')
                                      @foreach($getCityzendata as $allGetCityzendata)
                                      {{$allGetCityzendata->country_people_bangla}},
                                      @endforeach
                                      @else
                                      {{ $allFormOneMemberList->citizenship }}
                                      @endif

                                  </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.e')}})</td>
                                    <td>{{ trans('fd_one_step_three.date_of_joining')}}</td>
                                    <td>:

                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

                                        {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($allFormOneMemberList->date_of_join))) }}


                                        @else
                                        {{ date('d-m-Y', strtotime($allFormOneMemberList->date_of_join)) }}

                                        @endif


                                    </td>
                                </tr>


                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.f')}})</td>
                                    <td>{{ trans('fd_one_step_three.s_statement')}}</td>
                                    <td>: {{ $allFormOneMemberList->salary_statement }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.g')}})</td>
                                    <td>{{ trans('fd_one_step_three.detail')}}</td>
                                    <td>: {{ $allFormOneMemberList->other_occupation }}</td>
                                </tr>
                                @endforeach

                                <tr>
                                    <td>{{ trans('fd_one_step_one.five')}}.</td>
                                    <td colspan="2">{{ trans('fd_one_step_four.tt1')}}
                                    </td>
                                    <td>:
                                        @if(empty($allformOneData->attach_the__supporting_paper))

                                        @else

                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

                                        <a target="_blank"  href="{{ route('attachTheSupportingPaper',base64_encode($allformOneData->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>

                                        @else

                                        <a target="_blank"  href="{{ route('attachTheSupportingPaper',base64_encode($allformOneData->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                        @endif
                                        @endif</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('fd_one_step_one.six')}}.</td>
                                    <td colspan="3">{{ trans('fd_one_step_four.tt')}}
                                    </td>
                                </tr>
                                @foreach($getAllDataAdviser as $key=>$allGetAllDataAdviser)
                                <tr>
                                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                    <td></td>
                                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1 )}}.</td>
                                    <td>পরামর্শক {{ App\Http\Controllers\NGO\CommonController::englishToBangla( $key+1 )}}</td>
                                    <td></td>
                                    @else
                                    <td></td>
                                    <td>{{ $key+1 }}.</td>
                                    <td>Adviser {{ $key+1 }}</td>
                                    <td></td>

                                    @endif
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.a')}})</td>
                                    <td>{{ trans('fd_one_step_four.advisor_name')}}</td>
                                    <td>:{{ $allGetAllDataAdviser->name }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.b')}})</td>
                                    <td>{{ trans('fd_one_step_four.tt2')}}</td>
                                    <td>: {{ $allGetAllDataAdviser->information	 }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td>{{ trans('fd_one_step_one.seven')}}.</td>
                                    <td colspan="3">{{ trans('fd_one_step_four.tt3')}}
                                    </td>
                                </tr>

                                @if(!$getAllDataAdviserBank)


                                @else
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.a')}})</td>
                                    <td>{{ trans('fd_one_step_four.account_number')}}</td>
                                    <td>:
                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                        {{App\Http\Controllers\NGO\CommonController::englishToBangla($getAllDataAdviserBank->account_number)}}
                                        @else
                                        {{ $getAllDataAdviserBank->account_number }}
                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.b')}})</td>
                                    <td>{{ trans('fd_one_step_four.account_type')}}</td>
                                    <td>: {{ $getAllDataAdviserBank->account_type }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.c')}})</td>
                                    <td>{{ trans('fd_one_step_four.name_of_bank')}}</td>
                                    <td>: {{ $getAllDataAdviserBank->name_of_bank }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.d')}})</td>
                                    <td>{{ trans('fd_one_step_four.branch_name_of_bank')}}</td>
                                    <td>: {{ $getAllDataAdviserBank->branch_name_of_bank }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>({{ trans('form 8_bn.e')}})</td>
                                    <td>{{ trans('fd_one_step_four.bank_address')}}</td>
                                    <td>: {{ $getAllDataAdviserBank->bank_address }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td>{{ trans('fd_one_step_one.eight')}}.</td>
                                    <td colspan="2">{{ trans('fd_one_step_four.tt4')}}
                                    </td>
                                    <td>:
@foreach($getAllDataOther as $allGetAllDataOther)

@if(empty($allGetAllDataOther->information_pdf))

@else

@if(session()->get('locale') == 'en' || empty(session()->get('locale')))

<a target="_blank"  href="{{ route('otherInfoFromOneDownload',base64_encode($allGetAllDataOther->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>

@else

<a target="_blank"  href="{{ route('otherInfoFromOneDownload',base64_encode($allGetAllDataOther->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>



@endif
@endif

                                        @endforeach


                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>





