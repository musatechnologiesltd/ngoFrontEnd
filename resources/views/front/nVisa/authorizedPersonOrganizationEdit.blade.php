<div class="card-header custom-color">
    জ. প্রতিষ্ঠানের অনুমোদিত ব্যক্তি
</div>
<div class="card-body">
    <div class="row">
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">প্রতিষ্ঠানের নাম:<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="প্রতিষ্ঠানের নাম" required value="{{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_name }}" name="auth_person_org_name">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">প্রতিষ্ঠানের বাড়ি নম্বর:<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="প্রতিষ্ঠানের বাড়ি নম্বর" required value="{{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_house_no }}" name="auth_person_org_house_no">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">প্রতিষ্ঠানের ফ্ল্যাট নং:  <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="প্রতিষ্ঠানের ফ্ল্যাট নং" required value="{{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_flat_no }}" name="auth_person_org_flat_no">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">প্রতিষ্ঠানের রোড নং: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="প্রতিষ্ঠানের রোড নং" required value="{{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_road_no }}" name="auth_person_org_road_no">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">প্রতিষ্ঠানের থানা: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
            placeholder="প্রতিষ্ঠানের থানা" required value="{{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_thana }}" name="auth_person_org_thana">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">প্রতিষ্ঠানের ডাকঘর:<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="প্রতিষ্ঠানের ডাকঘর" required value="{{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_post_office }}" name="auth_person_org_post_office">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">প্রতিষ্ঠানের জেলা:<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="প্রতিষ্ঠানের জেলা" required value="{{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_district }}" name="auth_person_org_district">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">প্রতিষ্ঠানের মোবাইল: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="প্রতিষ্ঠানের মোবাইল" data-parsley-required minlength="11" maxlength="11" data-parsley-trigger=“keyup” value="{{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->auth_person_org_mobile }}" name="auth_person_org_mobile">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">জমা দেওয়ার তারিখ: <span class="text-danger">*</span></label>
            <input type="text" class="form-control datepicker" id=""
                   placeholder="জমা দেওয়ার তারিখ" required value="{{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->submission_date }}" name="submission_date">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">প্রবাসীর নাম: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="প্রবাসীর নাম" required value="{{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->expatriate_name }}" name="expatriate_name">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">প্রবাসী ইমেইল: <span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="" required value="{{ $nVisaEdit->nVisaAuthorizedPersonalOfTheOrg->expatriate_email }}" name="expatriate_email"
                   placeholder="প্রবাসী ইমেইল:">
        </div>
    </div>
    <div class="d-grid d-md-flex justify-content-md-end">
        <button type="submit" class="btn btn-registration">পরবর্তী
        </button>
    </div>
</div>
