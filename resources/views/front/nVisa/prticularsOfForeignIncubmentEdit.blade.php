<div class="card-header custom-color">
    খ. বিদেশী দায়িত্বশীল এর বিশেষ বিবরণ
</div>
<div class="card-body">
    <div class="row">
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">বিদেশী নাগরিকের নাম: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="বিদেশী নাগরিকের নাম" value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->name_of_the_foreign_national }}" name="name_of_the_foreign_national" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">জাতীয়তা:<span
                        class="text-danger">*</span></label>
                        <select class="js-example-basic-single form-control" data-parsley-required name="nationality"
                       >
<option value="">--একটা নির্বাচন করুন--</option>
                        @foreach($getCityzenshipData as $allGetCityzenshipData)
                        @if(session()->get('locale') == 'en')
                        <option value="{{ $allGetCityzenshipData->country_people_bangla }}" {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->nationality == $allGetCityzenshipData->country_people_bangla ? 'selected':''}}>{{ $allGetCityzenshipData->country_people_bangla }}</option>
                        @else
                    <option value="{{ $allGetCityzenshipData->country_people_bangla }}" {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->nationality == $allGetCityzenshipData->country_people_bangla ? 'selected':''}}>{{ $allGetCityzenshipData->country_people_bangla }}</option>
                    @endif
                    @endforeach

                </select>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">পাসপোর্ট নম্বর:<span
                        class="text-danger">*</span></label>
            <input type="text" class="form-control"
                   placeholder="পাসপোর্ট নম্বর" required name="passport_no" value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->passport_no }}">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">ইস্যু তারিখ : <span class="text-danger">*</span></label>
            <input type="text" class="form-control datepicker" id=""
                   placeholder="ইস্যু তারিখ" required name="passport_issue_date" value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->passport_issue_date }}">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">ইস্যু স্থান: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="ইস্যু স্থান" name="passport_issue_place" value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->passport_issue_place }}" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">মেয়াদ শেষ হওয়ার তারিখ: <span class="text-danger">*</span></label>
            <input type="text" class="form-control datepicker" id=""
                   placeholder="মেয়াদ শেষ হওয়ার তারিখ" required name="passport_expiry_date" value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->passport_expiry_date }}">
        </div>
        <div class="mb-3 col-sm-12 ">
            <label for="" class="col-form-label">স্থায়ী ঠিকানা</label>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">দেশ: <span class="text-danger">*</span></label>
            <select name="home_country" class="js-example-basic-single form-control custom-form-control" data-parsley-required  >
                <option value="">--একটা নির্বাচন করুন--</option>
                @foreach($countryList as $allCountryList)
                @if(session()->get('locale') == 'en')
                <option value="{{ $allCountryList->country_name_english }}" {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->home_country == $allCountryList->country_name_english ? 'selected':''}}>{{ $allCountryList->country_name_bangla }}</option>
                @else
                <option value="{{ $allCountryList->country_name_english }}"{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->home_country == $allCountryList->country_name_english ? 'selected':''}}>{{ $allCountryList->country_name_english }}</option>
                @endif
@endforeach
            </select>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">বাড়ি/প্লট/হোল্ডিং নম্বর: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="বাড়ি/প্লট/হোল্ডিং নম্বর" name="house_no" value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->house_no }}" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">ফ্ল্যাট/অ্যাপার্টমেন্ট/ফ্লোর নম্বর: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="ফ্ল্যাট/অ্যাপার্টমেন্ট/ফ্লোর নম্বর" name="flat_no" value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->flat_no }}" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">রাস্তার নাম/রাস্তার নম্বর: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="রাস্তার নাম/রাস্তার নম্বর" name="road_no"  value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->road_no }}" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">পোস্ট/জিপ কোড: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="পোস্ট/জিপ কোড" name="post_code" value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->post_code }}" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">রাজ্য/প্রদেশ: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="রাজ্য/প্রদেশ" value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->state }}" required name="state">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">টেলিফোন নম্বর: <span class="text-danger">*</span></label>
            <input type="number" class="form-control" id=""
                   placeholder="টেলিফোন নম্বর" value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->phone }}" name="phone" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">শহর: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="শহর" name="city" value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->city }}" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">ফ্যাক্স নম্বর: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="" name="fax_no" value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->fax_no }}"
                   placeholder="ফ্যাক্স নম্বর" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">ইমেল: <span class="text-danger">*</span></label>
            <input type="email" class="form-control" id=""
                   placeholder="ইমেল" required name="email" value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->email }}">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">জন্ম তারিখ: <span class="text-danger">*</span></label>
            <input type="text" class="form-control datepicker" id=""
                   placeholder="জন্ম তারিখ" name="date_of_birth" value="{{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->date_of_birth }}" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">বৈবাহিক অবস্থা: <span class="text-danger">*</span></label>
            <select name="martial_status" class="form-control" id="" required>
                <option value="">--একটা নির্বাচন করুন--</option>
                <option value="Married" {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->martial_status == 'Married' ? 'selected':''}}>বিবাহিত</option>
                <option value="UnMarried" {{ $nVisaEdit->nVisaParticularsOfForeignIncumbnet->martial_status == 'UnMarried' ? 'selected':''}}>অবিবাহিত</option>
            </select>
        </div>
    </div>
</div>
