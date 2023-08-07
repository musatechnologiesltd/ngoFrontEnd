<div class="card-header custom-color">
    ঘ. কর্মস্থলের ঠিকানা
</div>
<div class="card-body">
    <div class="row">
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">বাড়ি/প্লট/হোল্ডিং/গ্রাম: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="বাড়ি/প্লট/হোল্ডিং/গ্রাম" name="work_house_no" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">ফ্ল্যাট/অ্যাপার্টমেন্ট/ফ্লোর: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="ফ্ল্যাট/অ্যাপার্টমেন্ট/ফ্লোর" name="work_flat_no" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">রাস্তার নম্বর: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="রাস্তার নম্বর" name="work_road_no" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">শহর/জেলা: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="শহর/জেলা" name="work_district" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">থানা/উপজেলা: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
            placeholder="থানা/উপজেলা" name="work_thana" required>
        </div>

        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">ইমেইল: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="ইমেইল" required name="work_email">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">প্রতিষ্ঠানের ধরন:<span class="text-danger">*</span></label>
            <select name="work_org_type" class="form-control" id="" required>
                <option value="NGO">এনজিও</option>
            </select>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">যোগাযোগ ব্যক্তির মোবাইল নম্বর: <span class="text-danger">*</span></label>
            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
            type = "number"
            maxlength = "11" class="form-control" id="" placeholder="যোগাযোগ ব্যক্তির মোবাইল নম্বর"
                   name="contact_person_mobile_number" data-parsley-required minlength="11"  data-parsley-trigger=“keyup”>
        </div>
    </div>
</div>
