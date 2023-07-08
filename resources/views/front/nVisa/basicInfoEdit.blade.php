<div class="card card-custom-color">
    <div class="card-header custom-color">
        সাধারণ  তথ্য
    </div>
    <div class="card-body">

            <div class="row">
                <div class="col-lg-9 col-sm-12">
                    <div class="row">
                        <div class="mb-3 col-lg-6">
                            <label for="" class="form-label">প্রস্তাবিত অনুমোদনের সময়কাল <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id=""
                                   placeholder="এক (0১) বছর" value="{{ $nVisaEdit->period_validity }}" name="period_validity" required>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="" class="form-label">কার্যকর এর  তারিখ<span
                                        class="text-danger">*</span></label>
                            <input type="text" class="form-control datepicker"
                                   placeholder="কার্যকর এর তারিখ" value="{{ $nVisaEdit->permit_efct_date }}" name="permit_efct_date" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-6 col-form-label">জারি করা ওয়ার্ক পারমিট এর রেফারেন্স নং <span
                                    class="text-danger">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" name="visa_ref_no" value="{{ $nVisaEdit->visa_ref_no }}" class="form-control" id="" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-6 col-form-label">ভিসার সুপারিশ পত্র <span class="text-danger">*</span></label>
                        <div class="col-sm-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="visa_recomendation_letter_received_way"
                                data-parsley-checkmin="1" data-parsley-required id="" value="Online" {{ $nVisaEdit->visa_recomendation_letter_received_way == 'Online' ? 'checked':''  }}>
                                <label class="form-check-label"
                                       for="">অনলাইন</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="visa_recomendation_letter_received_way"
                                data-parsley-checkmin="1" data-parsley-required  id="" value="Manually" {{ $nVisaEdit->visa_recomendation_letter_received_way == 'Manually' ? 'checked':''  }}>
                                <label class="form-check-label"
                                       for="">ম্যানুয়াল</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-6 col-form-label">ভিসার সুপারিশ পত্রের রেফারেন্স নং  <span
                                    class="text-danger">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="" value="{{ $nVisaEdit->visa_recomendation_letter_ref_no }}" name="visa_recomendation_letter_ref_no" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-6 col-form-label">ডিপার্টমেন্ট
                            <span
                                    class="text-danger">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" value="{{ $nVisaEdit->department_in }}" name="department_in" id="" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-6 col-form-label">ওয়ার্ক পারমিটের ধরন<span class="text-danger">*</span></label>
                        <div class="col-sm-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="visa_category"
                                       id="" data-parsley-checkmin="1" data-parsley-required  value="New Commercial" {{ $nVisaEdit->visa_category == 'New Commercial' ? 'checked':''  }}>
                                <label class="form-check-label" for="">নিউ কমার্শিয়াল</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="visa_category"
                                       id="" data-parsley-checkmin="1" data-parsley-required  value="New Industrial" {{ $nVisaEdit->visa_category == 'New Industrial' ? 'checked':''  }}>
                                <label class="form-check-label" for="">নিউ ইন্ডাস্ট্রিয়াল</label>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="mb-3 row">
                        <label for="" class="col-sm-6 col-form-label">ফরওয়ার্ডিং লেটার<span
                                    class="text-danger">*</span></label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" id="">
                            <div id="emailHelp" class="form-text">We'll never share
                                your email with anyone else.[File Format: *.pdf,
                                File size (1-3) MB]
                            </div>
                        </div>
                    </div> --}}

                </div>
                <div class="col-lg-3 col-sm-12">
                    <div class="nvisa-avatar">
                        <img src="{{ asset('/') }}{{ $nVisaEdit->applicant_photo }}" alt="" id="output">
                    </div>
                    <input type="file" accept="image/*"
                    onchange="loadFile(event)" name="applicant_photo"  id="upload" hidden/>
             <label class="login_upload_button" for="upload">Choose
                 Image</label>
                </div>
            </div>

    </div>
</div>
