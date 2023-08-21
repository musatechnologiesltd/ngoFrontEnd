<!DOCTYPE html>
<html>
<head>
    <title>এফডি-৮ ফরম</title>

    <style>




        body {
            font-family: 'bangla', sans-serif;
            font-size: 14px;
            height: 11in;
            width: 8.5in;
        }
        table
        {
            width: 100%;
        }

      table td
      {
        vertical-align: top;
      }
        .first_table
        {
            text-align: center;
            margin-bottom: 30px;
        }
        .bt
      	{
			font-family: 'banglabold', sans-serif;
		}

        .number_section
        {
            width: 15px !important;
        }

      .padding-left
      {
        padding-left: 18px;
      }
    </style>
</head>
<body>
<table class="first_table">
    <tr>
        <td style="font-size:26px; font-weight: bold;">এফডি-৮ ফরম</td>
    </tr>
  <!-- bangla dekhabe na and English dekhabe -->
  <tr>
    <td>
        <?php

$getNgoTypeForPdf =  DB::table('ngo_type_and_languages')->where('user_id',$all_partiw1->user_id)->value('ngo_type');
            ?>
        @if($getNgoTypeForPdf == 'দেশিও')

        @else
        [Under act 4(1) of the Foreign Donations (Voluntary Activities) Regulation Act, 2016]
@endif
    </td>
  </tr>
    <tr>
        <td>{{ trans('fd_one_step_one.n_r')}}</td>
    </tr>
</table>
<table class="table table-bordered">
    <tbody>
    <tr>
        <td>১.</td>
        <td colspan="3">সংস্থার বিবরণ:</td>
    </tr>
      <?php
$getngoForLanguage = DB::table('ngo_type_and_languages')->where('user_id',$all_partiw1->user_id)->value('ngo_type');
// dd($getngoForLanguage);


$reg_name = DB::table('fd_one_forms')->where('user_id',$all_partiw1->user_id)->value('organization_name_ban');


      ?>
    <tr>
        <td></td>
        <td>(i)</td>
        <td>সংস্থার নাম</td>
        <td>: {{ $reg_name }}</td>
    </tr>
    <tr>
        <td></td>
        <td>(ii)</td>
        <td>সংস্থার ঠিকানা</td>
        <td>: {{ $all_partiw1->organization_address}}</td>
    </tr>
    <tr>
        <td></td>
        <td>(iii)</td>
        <td>নিবন্ধন নম্বর</td>
        <td>:

          @if($all_partiw1->registration_number == 0)


          @else

          {{ App\Http\Controllers\NGO\CommonController::englishToBangla($all_partiw1->registration_number)}}

          @endif


      </td>
    </tr>
    <tr>
        <td></td>
        <td>(iv)</td>
        <td>কোন দেশীয় সংস্থা</td>
        <td>: {{ $all_partiw1->country_of_origin }}</td>
    </tr>
    <tr>
        <td></td>
        <td>(v)</td>
        <td>প্রধান কার্যালয়ের ঠিকানা</td>
        <td>: {{ $all_partiw1->address_of_head_office }}</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>টেলিফোন নম্বর ,মোবাইল নম্বর ,ইমেইল  ও ওয়েব এড্রেস</td>
        <td>:
            @if(!$get_all_data_new )

            @else
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($get_all_data_new ->phone_new) }},{{ App\Http\Controllers\NGO\CommonController::englishToBangla($get_all_data_new ->mobile_new) }},{{ $get_all_data_new ->email_new }},{{ $get_all_data_new ->web_site_name }}
            @endif
        </td>
    </tr>
    <tr>
        <td></td>
        <td>(vi)</td>
        <td>বাংলাদেশস্থ সংস্থা প্রধানের তথ্যাদি</td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>ক) নাম</td>
        <td>: {{ $all_partiw1->name_of_head_in_bd }}</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>খ) জাতীয়তা</td>
        <td>:          @if(!$get_all_data_new )

            @else
            {{ App\Http\Controllers\NGO\CommonController::englishToBangla($get_all_data_new ->nationality) }}
            @endif
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>গ) পূর্ণকালীন/ খণ্ডকালীন</td>
        <td>: {{ $all_partiw1->job_type }}</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>ঘ) ঠিকানা,টেলিফোন নম্বর ,মোবাইল নম্বর, ইমেইল</td>
        <td>:{{ $all_partiw1->address }},{{ App\Http\Controllers\NGO\CommonController::englishToBangla($get_all_data_new ->mobile) }} {{ App\Http\Controllers\NGO\CommonController::englishToBangla($all_partiw1->phone) }}, {{ $all_partiw1->email }}</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>ঙ) নাগরিকত্ব (পূর্বতন নাগরিকত্ব যদি থাকে তাও উল্লেখ
            করতে হবে)
        </td>
        <td>: {{ $all_partiw1->citizenship }}</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>চ) পেশা (বর্তমান পেশা উল্লেখ করতে হবে)</td>
        <td>: {{ $all_partiw1->profession }}</td>
    </tr>

    <tr>
        <td>২.</td>
        <td colspan="2">বিগত ১০(দশ) বছরে বৈদেশিক অনুদানে পরিচালত কার্যক্রমের বিবরণ (প্রকল্প ওয়ারী তথাদির সংক্ষিপ্তসার সংযুক্ত করতে হবে)
        </td>
        <td>:

            @if(!$get_all_data_new )


            @else
            @if(empty($get_all_data_new ->foregin_pdf))

            @else
            সংযুক্ত
            @endif
@endif

        </td>
    </tr>

    <tr>
        <td>৩.</td>
        <td colspan="2">সংস্থার সম্ভাব্য/প্রত্যাশিত বার্ষিক বাজেট (উৎসসহ)
        </td>
        <td>:          @if(!$get_all_data_new )


            @else
            @if(empty($get_all_data_new ->yearly_budget))

            @else
            সংযুক্ত
            @endif
@endif</td>
    </tr>


    <tr>
        <td>৪.</td>
        <td colspan="3">কর্মকর্তাদের তথ্যাদি পৃথক কাগজে
            [ঊর্ধ্বতন ৫(পাঁচ) জন কর্মকর্তার]
            উপস্থাপন করতে হবে
        </td>
    </tr>
    @foreach($all_partiw as $key=>$all_all_parti)
    <tr>
        <td></td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1 )}}.</td>
        <td>কর্মকর্তা {{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1 )}}</td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td>(ক)</td>
        <td>নাম</td>
        <td>: {{ $all_all_parti->name }}</td>
    </tr>
    <tr>
        <td></td>
        <td>(খ)</td>
        <td>পদবি</td>
        <td>: {{ $all_all_parti->position }}</td>
    </tr>
    <tr>
        <td></td>
        <td>(গ)</td>
        <td>ঠিকানা</td>
        <td>: {{ $all_all_parti->address }}</td>
    </tr>
    <tr>
        <td></td>
        <td>(ঘ)</td>
        <td>নাগরিকত্ব (দ্বৈত নাগরিকত্ব থাকলে উল্লেখ করতে হবে)
        </td>
        <td>: {{ $all_all_parti->citizenship }}</td>
    </tr>
    <tr>
        <td></td>
        <td>(ঙ)</td>
        <td>যোগদানের তারিখ</td>
        <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($all_all_parti->date_of_join))) }}</td>
    </tr>
    <tr>
        <td></td>
        <td>(চ)</td>
        <td>বেতন ভাতাদি</td>
        <td>: {{ $all_all_parti->salary_statement }}</td>
    </tr>
    <tr>
        <td></td>
        <td>(ছ)</td>
        <td>মোবাইল নম্বর </td>
        <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($all_all_parti->mobile) }}</td>
    </tr>

    <tr>
        <td></td>
        <td>(জ)</td>
        <td>ইমেইল এড্রেস</td>
        <td>: {{ $all_all_parti->email }}</td>
    </tr>


    <tr>
        <td></td>
        <td>(ঝ)</td>
        <td>সম্পৃক্ত অন্য পেশার বিবরণ</td>
        <td>: {{ $all_all_parti->other_occupation }}</td>
    </tr>
    @endforeach

    <tr>
        <td>৫.</td>
        <td colspan="2">নিবন্ধন ফি ও ভ্যাট পরিশোধ করা হয়েছে
            কিনা (চালানের কপি সংযুক্ত করতে
            হবে)
        </td>
        <td>: @if(!$get_all_data_new )


            @else
            @if(empty($get_all_data_new ->copy_of_chalan))

            @else
            সংযুক্ত
            @endif
@endif</td>
    </tr>

    <tr>
        <td>৬.</td>
        <td colspan="2">তফসিল -১ এ বর্ণিত যেকোন ফি এর ভ্যাট বকেয়া থাকলে পরিশোধ হয়েছে কিনা (চালানের কপি সংযুক্ত করতে হবে)
        </td>
        <td>: @if(!$get_all_data_new )


            @else
            @if(empty($get_all_data_new ->due_vat_pdf))

            @else
            সংযুক্ত
            @endif
@endif</td>
    </tr>

    <tr>
        <td>৭.</td>
        <td colspan="3">মাদার একাউন্ট এর বিস্তারিত বিবরণ (হিসাব
            নম্বর, ধরণ, ব্যাংকের
            নাম,শাখা ও বিস্তারিত ঠিকানা)
        </td>
    </tr>
    @if(!$get_all_data_adviser_bank)

    @else
    <tr>
        <td></td>
        <td>(ক)</td>
        <td>হিসাব নম্বর</td>
        <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($get_all_data_adviser_bank->account_number) }}</td>
    </tr>
    <tr>
        <td></td>
        <td>(খ)</td>
        <td>ধরণ</td>
        <td>: {{ $get_all_data_adviser_bank->account_type }}</td>
    </tr>
    <tr>
        <td></td>
        <td>(গ)</td>
        <td>ব্যাংকের নাম</td>
        <td>: {{ $get_all_data_adviser_bank->name_of_bank }}</td>
    </tr>
    <tr>
        <td></td>
        <td>(ঘ)</td>
        <td>শাখা</td>
        <td>: {{ $get_all_data_adviser_bank->branch_name_of_bank }}</td>
    </tr>
    <tr>
        <td></td>
        <td>(ঙ)</td>
        <td>বিস্তারিত ঠিকানা</td>
        <td>: {{ $get_all_data_adviser_bank->bank_address }}</td>
    </tr>
    @endif
    <tr>
        <td>৮.</td>
        <td colspan="2">ব্যাংক হিসাব নম্বর পরিবর্তন হয়ে থাকলে ব্যুরোর অনুমোদনপত্রের কপি সংযুক্ত করতে হবে
        </td>
        <td>: @if(!$get_all_data_new )


            @else
            @if(empty($get_all_data_new->change_ac_number))

            @else
            সংযুক্ত
            @endif
@endif</td>
    </tr>

    </tbody>
</table>
<h4 style="text-align:center; font-weight:bold; font-size:20px;">{{ trans('fd_one_step_one.tt_1')}}</h4>
<p>{{ trans('fd_one_step_one.tt_2')}},{{ trans('fd_one_step_one.tt_3')}}</p>

        <table style="text-align: right; margin-top: 100px;  width:100%">
            <tr>
                <td colspan="2">{{ trans('fd_one_step_one.tt_4')}}</td>
            </tr>

            <tr>
                <td style="text-align: right; width: 80%"> {{ trans('fd_one_step_one.tt_5')}}</td>
                <td style="width:35%; text-align: left; width: 20%">: {{ $get_all_data_new->chief_name }}</td>
            </tr>
            <tr>
                <td style="text-align: right; width: 80%"> {{ trans('fd_one_step_one.tt_6')}}</td>
                <td style="width:35%; text-align: left; width: 20%">: {{ $get_all_data_new->chief_desi }}</td>
            </tr>
            @if(session()->get('locale') == 'en' || empty(session()->get('locale')) )

            @else

            <tr>
                <td style="text-align: right; width: 80%">Place</td>
                <td style="width:35%; text-align: left; width: 20%">: ...................................................</td>
            </tr>
            @endif
            <tr>
                <td style="text-align: right; width: 80%">{{ trans('fd_one_step_one.tt_7')}}</td>
                <td style="width:35%; text-align: left; width: 20%">: {{  App\Http\Controllers\NGO\CommonController::englishToBangla($get_all_data_new->created_at->format('d/m/Y')) }}</td>
            </tr>
        </table>


<ul style="margin-top:25px">

    <li>{{ trans('fd_one_step_one.tt_11')}}</li>

</ul>
</body>
</html>
