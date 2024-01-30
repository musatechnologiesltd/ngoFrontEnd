
<?php

$oldNgoRegNumber = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('registration');
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
                 <h4>                     @if($foreignNgoType == 'Old')
                    {{ trans('fd_one_step_one.fd8')}}
                                            @else
                                         {{ trans('fd_one_step_one.fd_one_form_title')}}
                                            @endif</h4>
             </div>

           <div class="card-body mt-3 mb-3">
                 <div class="card-body">

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
                                    <input type="hidden" data-parsley-required  name="স্থান" value="0"  class="form-control" id="mainPlace" placeholder="স্থান">
                                    <input type="hidden" data-parsley-required  name="id"  value="{{ $allformOneData->id }}" class="form-control" id="mainId">
                                    <button class="btn btn-sm btn-success" id="downloadButtonNew">
                                        {{ trans('form 8_bn.download_pdf')}}
                                    </button>
                                    @endif
                                </td>

                             <td>
                                <button class="btn btn-sm btn-success" onclick="location.href = '{{ route('fdOneFormEdit') }}';">
                     Update Form
                 </button>
                             </td>
                         </tr>
                     </table>

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
                             <td>: {{ $allformOneData->organization_name }},{{ $allformOneData->organization_address }}</td>
                         </tr>

                         <tr>
                             <td></td>
                             <td>(ii)</td>
                             <td>{{ trans('fd_one_step_one.reg_num')}}</td>
                             <td>:



                                 @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

                                 {{ App\Http\Controllers\NGO\CommonController::englishToBangla($oldNgoRegNumber) }}
                                 @else

                                 {{ $oldNgoRegNumber}}
                                 @endif



                             </td>
                         </tr>

                          @if($getngoForLanguage =='দেশিও')
                         <tr>
                             <td></td>
                             <td>(iii)</td>
                             <td>{{ trans('fd_one_step_one.Address_of_the_Head_Office')}}</td>
                             <td>: {{ $allformOneData->address_of_head_office }}</td>
                         </tr>
                         @else
                         <tr>
                             <td></td>
                             <td>(iii)</td>
                             <td>{{ trans('fd_one_step_one.Address_of_the_Head_Office')}}</td>
                             <td>: {{ $allformOneData->address_of_head_office_eng }}</td>
                         </tr>

                         @endif

                         <tr>
                            <td></td>
                            <td></td>
                            <td>Telephone number, mobile number, email and web address</td>
                            <td>:
                       {{ $allformOneData->org_phone }}, {{ $allformOneData->org_mobile }},
                       {{ $allformOneData->org_email }} and {{ $allformOneData->web_site_name }}
                            </td>
                        </tr>

                         <tr>
                             <td></td>
                             <td>(iv)</td>
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
    <td>{{ trans('form 8_bn.b')}}) Nationality</td>
    <td>: {{ $allformOneData->nationality }}</td>
</tr>
                         <tr>
                             <td></td>
                             <td></td>
                             <td>{{ trans('form 8_bn.c')}}) {{ trans('fd_one_step_one.Whether_part_time_or_full_time')}}</td>
                             <td>: {{ $getJobType }}</td>
                         </tr>
                         <tr>
                             <td></td>
                             <td></td>
                             <td>{{ trans('form 8_bn.d')}}) {{ trans('fd_one_step_one.Address')}},TelephoneNumber, {{ trans('fd_one_step_one.Mobile_Number')}}, {{ trans('fd_one_step_one.Email')}}</td>
                             <td>: {{ $allformOneData->address }},{{ $allformOneData->tele_phone_number }},
                                 @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                 {{ App\Http\Controllers\NGO\CommonController::englishToBangla($allformOneData->phone) }},
                                 @else
                                 {{ $allformOneData->phone }},
                                 @endif
                                 {{ $allformOneData->email }}</td>
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
                             <td>{{ trans('form 8_bn.e')}}) {{ trans('fd_one_step_one.Citizenship')}}</td>
                             <td>: {{ $getCityzendata }}</td>
                         </tr>

                         <tr>
                             <td>{{ trans('fd_one_step_one.two')}}.</td>
                             <td colspan="3">Details of foreign grant management activities in the last 10 (ten) years (project wise summary to be attached):
                             </td>
                             <td>
                                @if(empty($allformOneData ->foregin_pdf))

                                @else
                                <a target="_blank"  href="{{ route('renewFileDownloadFromView', ['title' =>'foregin_pdf', 'id' =>$allformOneData->id] )}}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
                                @endif
                            </td>
                         </tr>

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
                            <td>Mobile Number</td>
                            <td>: {{ $allFormOneMemberList->mobile }}</td>
                        </tr>


                         <tr>
                             <td></td>
                             <td>({{ trans('form 8_bn.h')}})</td>
                             <td>Email</td>
                             <td>: {{ $allFormOneMemberList->email }}</td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>({{ trans('form 8_bn.i')}})</td>
                             <td>{{ trans('fd_one_step_three.detail')}}</td>
                             <td>: {{ $allFormOneMemberList->other_occupation }}</td>
                         </tr>
                         @endforeach

                         <tr>
                             <td>{{ trans('fd_one_step_one.five')}}.</td>
                             <td colspan="2">Registration renewal fee and VAT paid
                                Whether (to attach copy of invoice
                                will be)
                             </td>
                             <td>:
                                @if(empty($allformOneData->copy_of_chalan))

                                @else
                                <a target="_blank"  href="{{ route('renewFileDownloadFromView', ['title' =>'copy_of_chalan', 'id' =>$allformOneData->id] )}}"
                                    class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
                                @endif
                                </td>
                         </tr>
                         <tr>
                             <td>{{ trans('fd_one_step_one.six')}}.</td>
                             <td colspan="2">Whether VAT due, if any, on any fees mentioned in Schedule-1 has been paid (copy of invoice to be attached)
                             </td>
                             <td>:
                                @if(empty($allformOneData->due_vat_pdf))

                                @else
                                <a target="_blank"  href="{{ route('renewFileDownloadFromView', ['title' =>'due_vat_pdf', 'id' =>$allformOneData->id] )}}"
                                    class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
                                @endif

                            </td>
                         </tr>

                         <tr>
                             <td>{{ trans('fd_one_step_one.seven')}}.</td>
                             <td colspan="3">{{ trans('fd_one_step_four.main_account_details')}}({{ trans('fd_one_step_four.tt3')}})
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
                             <td>{{ trans('fd_one_step_four.branch_name_of_bank')}}</td>
                             <td>: {{ $getAllDataAdviserBank->bank_address }}</td>
                         </tr>
                         @endif
                         <tr>
                             <td>{{ trans('fd_one_step_one.eight')}}.</td>
                             <td colspan="2">If the bank account number has changed, the copy of the approval letter from the bureau should be attached
                             </td>
                             <td>:

                                @if(empty($allformOneData->change_ac_number))

                                @else
                                <a target="_blank"  href="{{ route('renewFileDownloadFromView', ['title' =>'change_ac_number', 'id' =>$allformOneData->id] )}}"
                                    class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
                                @endif

                             </td>
                         </tr>

                         </tbody>
                     </table>
                 </div>
             </div>





