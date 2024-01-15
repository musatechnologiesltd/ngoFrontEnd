<div class="card">
    <div class="card-header">
        <b>গঠনতন্ত্র পরিবর্তন /অনুমোদনের জন্য প্রয়োজনীয় কাগজপত্র: </b>
    </div>
    <div class="card-body">
        <div class="mt-3 mb-3">
            <label class="form-label" for="">
                সংস্থার  গঠনতন্ত্র  পরিবর্তন হয়ে থাকলে নির্ধারিত ফিসহ ভ্যাট বাবদ অর্থ জমাদানের মূলকপিসহ  তার সত্যায়িত অনুলিপি
                <br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span>  <span class="text-danger">*</span> </label>
            <input class="form-control" name="the_constitution_of_the_company_along_with_fee_if_changed" data-parsley-required accept=".pdf" type="file" id="structurePartOne1">

            <p class="text-danger mt-2" style="font-size:12px;" id="structurePartOne1_text"></p>


        </div>

        <div class="mb-3">
            <label class="form-label" for="">
                প্রাথমিক নিবন্ধনকারী কতৃপক্ষের অনুমোদিত গঠনতন্ত্রের সত্যায়িত কপি
                <span class="text-danger">*</span>
                <br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span> </label>
            <input class="form-control" name="constitution_approved_by_primary_registering_authority" data-parsley-required accept=".pdf" type="file" id="structurePartOne2">

            <p class="text-danger mt-2" style="font-size:12px;" id="structurePartOne2_text"></p>
        </div>

        <div class="mb-3">
            <label class="form-label" for="">
                সংস্থার চেয়ারম্যান ও সেক্রেটারী কতৃক যৌথ স্বাক্ষরিত গঠনতন্ত্রের পরিচ্ছন্ন কপি<span class="text-danger">*</span>
            <br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span></label>
            <input class="form-control" name="clean_copy_of_the_constitution" data-parsley-required accept=".pdf" type="file" id="structurePartOne3">

            <p class="text-danger mt-2" style="font-size:12px;" id="structurePartOne3_text"></p>
        </div>

        <div class="mb-3">
            <label class="form-label" for="">
                গঠনতন্ত্রের কোন ধারা , উপধারা  পরিবর্তন  ফি  জমা প্রদানের চালানের মূলকপিসহ   <span class="text-danger">*</span>
                <br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span> </label>
            <input class="form-control" name="payment_of_change_fee" data-parsley-required accept=".pdf" type="file" id="structurePartOne4">
            <p class="text-danger mt-2" style="font-size:12px;" id="structurePartOne4_text"></p>
        </div>

        <div class="mb-3">
            <label class="form-label" for="">
                গঠনতন্ত্রের কোন ধারা , উপধারা  পরিবর্তন  ও সংযোজনের বিষয়ে সাধারণ সভার কার্যবিবরণীর সত্যায়িত কপি   <span class="text-danger">*</span>
                <br><span class="text-danger" style="font-size: 12px;">(Maximum 1 MB)</span>  </label>
            <input class="form-control" name="section_sub_section_of_the_constitution" data-parsley-required accept=".pdf" type="file" id="structurePartOne5">
            <p class="text-danger mt-2" style="font-size:12px;" id="structurePartOne5_text"></p>
        </div>

        <div class="mb-3">
            <label class="form-label" for="">
                পূর্ববর্তী সংবিধান এবং বর্তমান সংবিধানের তুলনামূলক বিবরণী (প্রতি পাতায় সভাপতি ও সম্পাদকের যৌথ স্বাক্ষর সহ)<span class="text-danger">*</span>
                <br><span class="text-danger" style="font-size: 12px;">(Maximum 1 MB)</span>
            </label>
            <input class="form-control" name="previous_constitution_and_current_constitution_compare" data-parsley-required accept=".pdf" type="file" id="structurePartOne6">

            <p class="text-danger mt-2" style="font-size:12px;" id="structurePartOne6_text"></p>
        </div>
    </div>
</div>


<script>
    $('[id^=structurePartOne]').on('change', function(e) {

            var mainId = $(this).attr('id');
            var getId = mainId.slice(16)
            //alert(getId);
            let size = this.files[0].size;


            if( getId == 5 || getId == 6){

                if (size > 1000000 ) {
                $('#structurePartOne'+getId+'_text').text('Please Upload Maximum 1 MB File');
            }else{
                $('#structurePartOne'+getId+'_text').text('');
            }


            }else{



            if (size > 500000 ) {
                $('#structurePartOne'+getId+'_text').text('Please Upload Maximum 500 KB File');
            }else{
                $('#structurePartOne'+getId+'_text').text('');
            }
        }
        });

    </script>





