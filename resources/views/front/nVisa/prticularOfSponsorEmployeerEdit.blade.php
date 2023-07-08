<div class="card-header custom-color">
    ক . স্পনসর/নিয়োগকর্তার বিশেষ বিবরণ
</div>
<div class="card-body">
    <div class="mb-3 row">
        <label for="" class="col-sm-6 col-form-label">এন্টারপ্রাইজের নাম (সংস্থা/কোম্পানী) <span
                    class="text-danger">*</span></label>
        <div class="col-sm-6">
            <input type="text" name="org_name" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_name }}" class="form-control" id="" required>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="" class="col-sm-12 col-form-label">এন্টারপ্রাইজের ঠিকানা (শুধুমাত্র বাংলাদেশ)<span
                    class="text-danger">*</span></label>
    </div>
    <div class="row">
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">বাড়ি/প্লট/হোল্ডিং/গ্রাম:  <span class="text-danger">*</span></label>
            <input type="text" name="org_house_no" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_house_no }}" class="form-control" id=""
                   placeholder="বাড়ি/প্লট/হোল্ডিং/গ্রাম" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">ফ্ল্যাট/অ্যাপার্টমেন্ট/ফ্লোর:
        <span class="text-danger">*</span></label>
            <input type="text" name="org_flat_no" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_flat_no }}" class="form-control"
                   placeholder="ফ্ল্যাট/অ্যাপার্টমেন্ট/ফ্লোর" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">রাস্তার নম্বর:<span
                        class="text-danger">*</span></label>
            <input type="text" name="org_road_no" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_road_no }}" class="form-control"
                   placeholder="রাস্তার নম্বর" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">পোস্ট/জিপ কোড:</label>
            <input type="text" name="org_post_code" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_post_code }}" class="form-control" id=""
                   placeholder="পোস্ট/জিপ কোড" >
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">পোস্ট অফিস: </label>
            <input type="text" name="org_post_office" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_post_office }}" class="form-control"
                   placeholder="পোস্ট অফিস" >
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">টেলিফোন নম্বর:<span
                        class="text-danger">*</span></label>
            <input type="text" name="org_phone" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_phone }}" class="form-control"
                   placeholder="টেলিফোন নম্বর" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">শহর/জেলা: <span
                        class="text-danger">*</span></label>
                        <input type="text" name="org_district" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_district }}" class="form-control"
                        placeholder="শহর/জেলা" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">থানা/উপজেলা:                                                <span
                        class="text-danger">*</span></label>
                        <input type="text" name="org_thana" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_thana }}" class="form-control"
                        placeholder="থানা/উপজেলা" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">ফ্যাক্স নম্বর:</label>
            <input type="text" name="org_fax_no" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_fax_no }}" class="form-control"
                   placeholder="ফ্যাক্স নম্বর" >
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">ইমেল:<span
                        class="text-danger">*</span></label>
            <input type="email" name="org_email" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->org_email }}" class="form-control"
                   placeholder="ইমেল" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">সংগঠনের ধরন:<span
                        class="text-danger">*</span></label>
            <select name="org_type" id="" class="form-control" required>
                <option value="NGO">এনজিও</option>
            </select>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">ব্যবসার প্রকৃতি:</label>
            <input type="text" name="nature_of_business" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->nature_of_business }}" class="form-control"
                   placeholder="ব্যবসার প্রকৃতি">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">স্বীকৃত মূলধন:</label>
            <input type="text" name="authorized_capital" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->authorized_capital }}" class="form-control"
                   placeholder="স্বীকৃত মূলধন">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">পরিশোধিত মূলধন:</label>
            <input type="text" name="paid_up_capital" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->paid_up_capital }}" class="form-control"
                   placeholder="পরিশোধিত মূলধন">
        </div>
        <div class="mb-3 col-lg-8">
            <label for="" class="form-label">গত ১২ মাসে প্রাপ্ত রেমিট্যান্স: </label>
            <input type="text" name="remittance_received" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->remittance_received }}" class="form-control"
                   placeholder="গত ১২ মাসে প্রাপ্ত রেমিট্যান্স">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">শিল্পের ধরন:</label>
            <select name="industry_type" id="" class="form-control">
                <option value="NGO">এনজিও</option>

            </select>
        </div>
        <div class="mb-3 col-lg-8">
            <label for="" class="form-label">কোম্পানি বোর্ডের সুপারিশ:</label>
            <input type="text" name="recommendation_of_company_board" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->recommendation_of_company_board }}"" class="form-control"
                   placeholder="কোম্পানি বোর্ডের সুপারিশ">
        </div>
        <div class="mb-3 col-lg-12">
            <label for="" class="form-label">স্থানীয়, বিদেশী বা যৌথ উদ্যোগ কোম্পানি কিনা:</label>
            <input type="text" name="company_share" class="form-control" value="{{ $nVisaEdit->nVisaParticularOfSponsorOrEmployer->company_share }}"
                   placeholder="স্থানীয়, বিদেশী বা যৌথ উদ্যোগ কোম্পানি কিনা">
        </div>
    </div>
</div>
