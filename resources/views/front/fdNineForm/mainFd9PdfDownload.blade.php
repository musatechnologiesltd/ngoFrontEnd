<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('/') }}public/front/assets/css/style.css" rel="stylesheet">
    <style>
         body,h5,h4,h3 {
            font-family: 'bangla', sans-serif;
            font-size: 14px;

        }
    </style>
</head>
<body>

        <div class="card-body">
            <div class="form9_upper_box">
                <h3>এফডি-৯ ফরম</h3>
                <h4>বিদেশি নাগরিক নিয়োগপত্র সত্যায়ন ফরম</h4>
                <h5>(আবশ্যকাবে বাংলা নিকস ফন্টে পুরণ করে দাখিল করতে হবে)</h5>

                <div>
                    <p>বরাবর <br>
                        মহাপরিচালক <br>
                        এনজিও বিষয় ব্যুরো, ঢাকা <br>
                        জনাব,</p>
                    <p>নিম্নলখিত নিয়োগপ্রাপ্ত বিদেশি নাগরিক/নাগরিকগণকে এ সংস্থায় (নিবন্ধন নম্বরঃ {{str_replace($engDATE,$bangDATE,$ngo_list_all->registration_number)}}
                        তারিখঃ {{ str_replace($engDATE,$bangDATE,date('d-m-Y', strtotime($ngoStatus->updated_at->format('d-m-Y')))) }}) বৈদেশিক
                        অনুদান (স্বেচ্ছাসেবামূলক কর্মকান্ড) রেগুলেশন আইন ২০১৬ অনুযায়ী নিয়োগপত্র সত্যায়ন ও
                        এনডিসা প্রাপ্তির সুপারিশপত্র
                        পাওয়ার জন্য আবেদন করছিঃ</p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-borderless">
                <tbody>
                <tr>
                    <td>১.</td>
                    <td>বিদেশি নাগরিকের নাম (ইংরেজীতে Capital Letter এ)</td>
                    <td>: {{ $nVisaEdit->fd9Form->fd9_foreigner_name }}</td>
                </tr>
                <tr>
                    <td>২.</td>
                    <td>(ক) পিতার নাম</td>
                    <td>: {{ $nVisaEdit->fd9Form->fd9_father_name }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>(খ) স্বামী/স্ত্রীর নাম</td>
                    <td>: {{ $nVisaEdit->fd9Form->fd9_husband_or_wife_name }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>(গ) মাতার নাম</td>
                    <td>: {{ $nVisaEdit->fd9Form->fd9_mother_name }}</td>
                </tr>
                <tr>
                    <td>৩.</td>
                    <td>জন্ম স্থান ও তারিখ</td>
                    <td>: {{ $nVisaEdit->fd9Form->fd9_birth_place }} ও {{ str_replace($engDATE,$bangDATE,date('d-m-Y', strtotime($nVisaEdit->fd9Form->fd9_dob))) }}</td>
                </tr>
                <tr>
                    <td>৪.</td>
                    <td>পাসপোর্ট নম্বর, ইস্যু ও মেয়াদোর্ত্তীণ তারিখ</td>
                    <td>: {{ $nVisaEdit->fd9Form->fd9_passport_number }},{{ str_replace($engDATE,$bangDATE,date('d-m-Y', strtotime($nVisaEdit->fd9Form->fd9_passport_issue_date))) }},{{ str_replace($engDATE,$bangDATE,date('d-m-Y', strtotime($nVisaEdit->fd9Form->fd9_passport_expiration_date))) }}</td>
                </tr>
                <tr>
                    <td>৫.</td>
                    <td>পাসপোর্টে প্রদত্ত সনাক্তকারী চিহ্ন</td>
                    <td>: {{ $nVisaEdit->fd9Form->fd9_identification_mark_given_in_passport }}</td>
                </tr>
                <tr>
                    <td>৬.</td>
                    <td>পুরুষ/মহিলা</td>
                    <td>: {{ $nVisaEdit->fd9Form->fd9_male_or_female }}</td>
                </tr>
                <tr>
                    <td>৭.</td>
                    <td>বৈবাহিক অবস্থা</td>
                    <td>: {{ $nVisaEdit->fd9Form->fd9_marital_status }}</td>
                </tr>
                <tr>
                    <td>৮.</td>
                    <td>জাতীয়তা / নাগরিকত্ব</td>
                    <td>: {{ $nVisaEdit->fd9Form->fd9_nationality_or_citizenship }}</td>
                </tr>
                <tr>
                    <td>৯.</td>
                    <td>একাধিক নাগরিকত্ব থাকলে বিবরণ</td>
                    <td>: {{ $nVisaEdit->fd9Form->fd9_details_if_multiple_citizenships }}</td>
                </tr>
                <tr>
                    <td>১০.</td>
                    <td>পূর্বের নাগরিকত্ব থাকলে তা বহাল না থাকার কারণ</td>
                    <td>: {{ $nVisaEdit->fd9Form->fd9_previous_citizenship_is_grounds_for_non_retention }}</td>
                </tr>
                <tr>
                    <td>১১.</td>
                    <td>বর্তমান ঠিকানা</td>
                    <td>: {{ $nVisaEdit->fd9Form->fd9_current_address }}</td>
                </tr>
                <tr>
                    <td>১২.</td>
                    <td>পরিবারের সদস্য সংখ্যা</td>
                    <td>: {{ $nVisaEdit->fd9Form->fd9_number_of_family_members }}</td>
                </tr>

                <?php
$familyData = $nVisaEdit->fd9Form->fd9ForeignerEmployeeFamilyMemberList;

//dd($familyData);
?>

                <tr>
                    <td>১৩.</td>
                    <td>পরিবারের সদসাদের নাম ও বয়স (যাহারা তার সাথে থাকবেন)</td>
                    <td>: @foreach($familyData as $key=>$allFamilyData)
                        {{ $allFamilyData->family_member_name }},{{ $allFamilyData->family_member_age }}<br>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td>১৪.</td>
                    <td>একাডেমিক যোগ্যতা (একাডেমিক যোগ্যতার সমর্থনে সনদপত্রের কপি সংযুক্ত করতে হবে</td>
                    <td>:  @if(!$nVisaEdit->fd9Form->fd9_academic_qualification)

                        @else

<?php

                         $file_path = url($nVisaEdit->fd9Form->fd9_academic_qualification);
                         $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                         $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                         ?>
সংযুক্ত
                         @endif
                        </td>
                </tr>
                <tr>
                    <td>১৫.</td>
                    <td>কারিগরি ও অন্যান্য যোগ্যতা যদি থাকে (প্রাসঙ্গিক সনদপত্রের কপি সংযুক্ত করতে
                        হবে)
                    </td>
                    <td>: @if(!$nVisaEdit->fd9Form->fd9_technical_and_other_qualifications_if_any)

                        @else

<?php

                         $file_path = url($nVisaEdit->fd9Form->fd9_technical_and_other_qualifications_if_any);
                         $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                         $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                         ?>
সংযুক্ত
                         @endif</td>
                </tr>
                <tr>
                    <td>১৬.</td>
                    <td>অতীত অভিজ্ঞতা এবং যে কাজে তাঁকে নিয়োগ দেয়া হচ্ছে তাতে তার দক্ষতা (প্রমাণকসহ)
                    </td>
                    <td>: @if(!$nVisaEdit->fd9Form->fd9_past_experience)

                        @else

<?php

                         $file_path = url($nVisaEdit->fd9Form->fd9_past_experience);
                         $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                         $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                         ?>
সংযুক্ত
                         @endif</td>
                </tr>
                <tr>
                    <td>১৭.</td>
                    <td>যে সব দেশ ভ্রমণ করেছেন (কর্মসংস্থানের জন্য)</td>
                    <td>: {{ $nVisaEdit->fd9Form->fd9_countries_that_have_traveled }}</td>
                </tr>
                <tr>
                    <td>১৮.</td>
                    <td>যে পদের জন্য নিয়োগ প্রস্তাব দেয়া হয়েছে : (নিয়োগপত্র কপি ও চুক্তিপত্র সংযুক্ত
                        করতে হবে)
                    </td>
                    <td>:  @if(!$nVisaEdit->fd9Form->fd9_offered_post)

                        @else

<?php

                         $file_path = url($nVisaEdit->fd9Form->fd9_offered_post);
                         $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                         $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                         ?>
সংযুক্ত
                         @endif</td>
                </tr>
                <tr>
                    <td>১৯.</td>
                    <td>যে প্রকল্পে তাকে নিয়োগের প্রস্থাব করা হয়েছে তার নাম ও মেয়াদ ব্যুরোর অনুমোদন
                        পত্র সংযুক্ত করতে হবে)
                    </td>
                    <td>: @if(!$nVisaEdit->fd9Form->fd9_name_of_proposed_project)

                        @else

<?php

                         $file_path = url($nVisaEdit->fd9Form->fd9_name_of_proposed_project);
                         $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                         $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                         ?>
সংযুক্ত
                         @endif</td>
                </tr>
                <tr>
                    <td>২০.</td>
                    <td>নিয়োগের যে তারিখ নির্ধারণ করা হয়েছে</td>
                    <td>: {{ $nVisaEdit->fd9Form->fd9_date_of_appointment }}</td>
                </tr>
                <tr>
                    <td>২১.</td>
                    <td>এক্সটেনশন হয়ে থাকলে তার সময়কাল</td>
                    <td>: {{ str_replace($engDATE,$bangDATE,date('d-m-Y', strtotime($nVisaEdit->fd9Form->fd9_extension_date))) }}</td>
                </tr>
                <tr>
                    <td>২২.</td>
                    <td>এ প্রকল্পে কতজন বিদেশির পদের সংস্থান রয়েছে এবং কর্মরত কতজন</td>
                    <td>: {{ $nVisaEdit->fd9Form->fd9_post_available_for_foreigner_and_working }}</td>
                </tr>
                <tr>
                    <td>২৩.</td>
                    <td>বাংলাদেশের ইতঃপূর্বে অন্যকোন সংস্থায় কাজ করেছিলেন কিনা তার বিবরণ</td>
                    <td>: {{ $nVisaEdit->fd9Form->fd9_previous_work_experience_in_bangladesh }}</td>
                </tr>
                <tr>
                    <td>২৪.</td>
                    <td>সংস্থায় বর্তমানে কতজন বিদেশি নাগরিক কর্মরত আছেন</td>
                    <td>: {{ $nVisaEdit->fd9Form->fd9_total_foreigner_working }}</td>
                </tr>
                <tr>
                    <td>২৫.</td>
                    <td>অন্য কোন তথ্য (যদি থাকে)</td>
                    <td>: {{ $nVisaEdit->fd9Form->fd9_other_information }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>বিদেশি নাগরিকের পাসপোর্ট সাইজের ছবি</td>
                    <td>: @if(!$nVisaEdit->fd9Form->fd9_foreigner_passport_size_photo)

                        @else

                        <img src="{{ asset('/') }}{{ $nVisaEdit->fd9Form->fd9_foreigner_passport_size_photo }}" alt="" style="height:40px;" id="output">

@endif
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>পাসপোর্টের কপি সংযুক্ত</td>
                    <td>:  @if(!$nVisaEdit->fd9Form->fd9_copy_of_passport)

                        @else

<?php

                         $file_path = url($nVisaEdit->fd9Form->fd9_copy_of_passport);
                         $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                         $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                         ?>
সংযুক্ত
                         @endif</td>
                </tr>
                </tbody>
            </table>

            <h5 class="text-center mt-3 mb-3">ঘোষণা</h5>
            <p class="mt-3">আমি এই মর্মে ঘোষণা করছি যে, আমি সংশ্লিষ্ট সকল আইন-কানুন পড়েছি এবং উল্লেখিত
                সকল তথ্য সত্য ও সঠিক। </p>

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

</body>
</html>
