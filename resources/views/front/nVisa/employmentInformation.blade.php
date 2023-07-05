<div class="card-header custom-color">
    গ.কর্মসংস্থান এর  তথ্য
</div>
<div class="card-body">
    <div class="row">
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">নিয়োগকৃত পদের নাম (পদবী):<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="নিয়োগকৃত পদের নাম (পদবী)" required name="employed_designation">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">বাংলাদেশে আগমনের তারিখ: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="বাংলাদেশে আগমনের তারিখ" required name="date_of_arrival_in_bangladesh">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">ভিসার ধরন:  <span class="text-danger">*</span></label>
            <select name="visa_type" class="form-control" id="" required>
                <option value="N-Visa">N-Visa</option>
            </select>
            <input type="hidden" class="form-control" name="travel_visa_cate" value="2">
        </div>
        {{-- <div class="mb-3 col-lg-4">
            <label for="" class="form-label">: <span class="text-danger">*</span></label>
            <select name="" class="form-control" id="">
                <option value="">Select one</option>
                <option value="">Select two</option>
            </select>
        </div> --}}
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">প্রথম নিয়োগের তারিখ: <span class="text-danger">*</span></label>
            <input type="text" class="form-control datepicker" id=""
                   placeholder="প্রথম নিয়োগের তারিখ" required name="first_appoinment_date">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">কাঙ্খিত কার্যকরী তারিখ: <span class="text-danger">*</span></label>
            <input type="text" class="form-control datepicker" id=""
                   placeholder="কাঙ্খিত কার্যকরী তারিখ" required name="desired_effective_date">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">শেষ তারিখ: <span class="text-danger">*</span></label>
            <input type="text" class="form-control datepicker" id=""
                   placeholder="শেষ তারিখ" required name="desired_end_date">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">পছন্দসই সময়কাল: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="পছন্দসই সময়কাল" name="visa_validity" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">সংক্ষিপ্ত কাজের বিবরণ: <span class="text-danger">*</span></label>
            <textarea name="brief_job_description" class="form-control" id="" cols="30" rows="4" required></textarea>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">কর্মচারী ন্যায্যতা: <span class="text-danger">*</span></label>
            <textarea name="employee_justification" class="form-control" id="" cols="30" rows="4" required></textarea>
        </div>
    </div>
</div>
