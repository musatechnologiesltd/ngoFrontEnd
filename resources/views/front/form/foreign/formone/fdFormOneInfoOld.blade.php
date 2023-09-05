
<?php


$oldNgoRegNumber = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('registration');


$allformOneData = DB::table('fd_one_forms')
->where('user_id',Auth::user()->id)->first();
 $get_all_data_adviser_bank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',$allformOneData->id)->first();
 $get_all_data_other= DB::table('fd_one_other_pdf_lists')->where('fd_one_form_id',$allformOneData->id)->get();
 $get_all_data_adviser = DB::table('fd_one_adviser_lists')->where('fd_one_form_id',$allformOneData->id)->get();
 $formOneMemberList = DB::table('fd_one_member_lists')->where('fd_one_form_id',$allformOneData->id)->get();
 $get_all_source_of_fund_data = DB::table('fd_one_source_of_funds')->where('fd_one_form_id',$allformOneData->id)->get();





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
                     @if(session()->get('locale') == 'en' || empty(session()->get('locale')))

                     <p>                     @if($foreignNgoType == 'Old')
                        {{ trans('fd_one_step_one.fd8')}}
                                                @else
                                             {{ trans('fd_one_step_one.fd_one_form_title')}}
                                                @endif পিডিএফ ডাউনলোড করে, প্রধান নির্বাহির সিল, স্বাক্ষর সহ আপলোড করুন</p>
                     @else
                     <p>Download                      @if($foreignNgoType == 'Old')
                        {{ trans('fd_one_step_one.fd8')}}
                                                @else
                                             {{ trans('fd_one_step_one.fd_one_form_title')}}
                                                @endif PDF, upload with seal, signature of Chief Executive</p>
                     @endif
                     <table class="table table-bordered">
                         <tr>
                             @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                             <td>পিডিএফ ডাউনলোড</td>
                             <td>পিডিএফ আপলোড</td>
                             <td>তথ্য সংশোধন করুন</td>
                             @else
                             <td>PDF Download</td>
                             <td>PDF Upload</td>
                             <td>Update Information</td>
                             @endif
                         </tr>
                         <tr>
                             <td>
                                {{-- <a class="btn btn-sm btn-success" target="_blank" href = "{{ route('fdFormOneInfoPdf') }}">
                     {{ trans('form 8_bn.download_pdf')}}
                 </a> --}}

                 <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal234">
                     {{ trans('form 8_bn.download_pdf')}}
                 </button>

                 <div class="modal fade" id="exampleModal234" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                       <div class="modal-content">
                         <div class="modal-header">

                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                         </div>
                         <div class="modal-body">
                             <h5>{{ trans('mview.ttOne')}}</h5>
                                 <div class=" mt-3 mb-3">
                                     <label for="" class="form-label">{{ trans('mview.ttTwo')}}:</label>
                                     <input type="text" data-parsley-required  name="{{ trans('mview.ttTwo')}}" value="{{ $allformOneData->chief_name }}"  class="form-control" id="mainName" placeholder="{{ trans('mview.ttTwo')}}">
                                     <?php
$ngoTypeInfo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');



                                     ?>

@if($ngoTypeInfo == 'দেশিও')
<input type="hidden" data-parsley-required  name="স্থান" value="0"  class="form-control" id="mainPlace" placeholder="স্থান">
@else
<label for="" class="form-label mt-3">{{ trans('mview.place')}}:</label>
<input type="text" data-parsley-required  name="{{ trans('mview.place')}}" value="{{ Session::get('place')}}"  class="form-control" id="mainPlace" placeholder="{{ trans('mview.place')}}">
@endif
                                     <label for="" class="form-label mt-3">{{ trans('mview.ttThree')}}:</label>
                                     <input type="text" data-parsley-required  name="{{ trans('mview.ttThree')}}" value="{{ $allformOneData->chief_desi }}"  class="form-control" id="mainDesignation" placeholder="{{ trans('mview.ttThree')}}">
                                     <input type="hidden" data-parsley-required  name="id"  value="{{ $allformOneData->id }}" class="form-control" id="mainId">
                                 </div>

                                 @if($ngoTypeInfo == 'দেশিও')

                                 <button class="btn btn-sm btn-success" id="downloadButton">
                                     {{ trans('form 8_bn.download_pdf')}}
                                 </button>

                                 @else

                                 <button class="btn btn-sm btn-success" id="downloadButton345">
                                     {{ trans('form 8_bn.download_pdf')}}
                                 </button>
                                 @endif

                         </div>

                       </div>
                     </div>
                   </div>
                             </td>
                             <td>


                 @if($allformOneData->verified_fd_one_form == 0)
                 <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                     {{ trans('form 8_bn.upload_pdf')}}
                 </button>
                 @else

                 <?php

                 $file_path = url($allformOneData->verified_fd_one_form);
                 $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                 $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                 ?>
                 <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                     @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
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
     <form method="post" action="{{ route('uploadFromOnePdf') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

         @csrf

         <div class=" mb-3">
             <label for="" class="form-label">{{ trans('form 8_bn.pdf')}}:</label>
             <input type="file" data-parsley-required accept=".pdf" name="verified_fd_one_form"  class="form-control" id="">
             <input type="hidden" data-parsley-required  name="id"  value="{{ $allformOneData->id }}" class="form-control" id="">
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
                                <button class="btn btn-sm btn-success" onclick="location.href = '{{ route('fdOneFormEdit') }}';">
                     Update Form
                 </button>
                             </td>
                         </tr>
                     </table>
<?php

             $data = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)
                    ->first();




$count = 0;
foreach ($data   as $a) {
if (is_null($a)) {
 $count++;
}
}



             ?>

             @if($count == 0)
             {{-- <p class="badge bg-success rounded">{{ trans('form 8_bn.complete_status')}}</p> --}}

                     @else

                     {{-- <p class="badge bg-danger rounded">{{ trans('form 8_bn.un_complete_status')}}</p> --}}

                     @endif

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


                         <?php
                         $getngoForLanguage = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
                          ?>
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
                         {{-- <tr>
                             <td></td>
                             <td></td>
                             <td>{{ trans('form 8_bn.f')}}) {{ trans('fd_one_step_one.Profession')}}</td>
                             <td>: {{ $allformOneData->profession }}</td>
                         </tr> --}}
                         <tr>
                             <td>{{ trans('fd_one_step_one.two')}}.</td>
                             <td colspan="3">Details of foreign grant management activities in the last 10 (ten) years (project wise summary to be attached):
                             </td>
                             <td>
                                @if(empty($allformOneData ->foregin_pdf))

                                @else
                                <a target="_blank"  href="{{ route('sourceOfFundDocDownload',base64_encode($allformOneData->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
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
                           //dd($getCityzendata);
                           ?>

                             <td></td>
                             <td>({{ trans('form 8_bn.d')}})</td>
                             <td>{{ trans('fd_one_step_three.citizenship')}}</td>
                             <td>:
                                 @if($getngoForLanguage =='দেশিও')
                               @foreach($getCityzendata as $all_getCityzendata)
                               {{$all_getCityzendata->country_people_bangla}},
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
                             <td colspan="2">Registration renewal fee and VAT paid
                                Whether (to attach copy of invoice
                                will be)
                             </td>
                             <td>:
                                @if(empty($allformOneData->copy_of_chalan))

                                @else
                                <a target="_blank"  href=""
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
                                <a target="_blank"  href=""
                                    class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
                                @endif

                            </td>
                         </tr>

                         <tr>
                             <td>{{ trans('fd_one_step_one.seven')}}.</td>
                             <td colspan="3">{{ trans('fd_one_step_four.main_account_details')}}({{ trans('fd_one_step_four.tt3')}})
                             </td>
                         </tr>

                         @if(!$get_all_data_adviser_bank)


                         @else
                         <tr>
                             <td></td>
                             <td>({{ trans('form 8_bn.a')}})</td>
                             <td>{{ trans('fd_one_step_four.account_number')}}</td>
                             <td>:
                                 @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                 {{App\Http\Controllers\NGO\CommonController::englishToBangla($get_all_data_adviser_bank->account_number)}}
                                 @else
                                 {{ $get_all_data_adviser_bank->account_number }}
                                 @endif

                             </td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>({{ trans('form 8_bn.b')}})</td>
                             <td>{{ trans('fd_one_step_four.account_type')}}</td>
                             <td>: {{ $get_all_data_adviser_bank->account_type }}</td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>({{ trans('form 8_bn.c')}})</td>
                             <td>{{ trans('fd_one_step_four.name_of_bank')}}</td>
                             <td>: {{ $get_all_data_adviser_bank->name_of_bank }}</td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>({{ trans('form 8_bn.d')}})</td>
                             <td>{{ trans('fd_one_step_four.branch_name_of_bank')}}</td>
                             <td>: {{ $get_all_data_adviser_bank->branch_name_of_bank }}</td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>({{ trans('form 8_bn.e')}})</td>
                             <td>{{ trans('fd_one_step_four.branch_name_of_bank')}}</td>
                             <td>: {{ $get_all_data_adviser_bank->bank_address }}</td>
                         </tr>
                         @endif
                         <tr>
                             <td>{{ trans('fd_one_step_one.eight')}}.</td>
                             <td colspan="2">If the bank account number has changed, the copy of the approval letter from the bureau should be attached
                             </td>
                             <td>:

                                @if(empty($allformOneData->change_ac_number))

                                @else
                                <a target="_blank"  href=""
                                    class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
                                @endif





                             </td>
                         </tr>

                         </tbody>
                     </table>
                 </div>
             </div>





