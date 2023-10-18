<div class="card-header custom-color">
    B. PARTICULARS OF FOREIGN INCUMBENT
</div>
<div class="card-body">
    <div class="row">
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Name of the foreign national: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="Name of the foreign national" name="name_of_the_foreign_national" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Nationality:<span
                        class="text-danger">*</span></label>

                        <input type="text" class="form-control" id=""
                        placeholder="Nationality" name="nationality" required>


                        {{-- <select class="js-example-basic-single form-control" data-parsley-required name="nationality"
                       >
<option value="">--Please Select--</option>
                        @foreach($getCityzenshipData as $allGetCityzenshipData)
                        @if(session()->get('locale') == 'en')
                        <option value="{{ $allGetCityzenshipData->country_people_english }}" >{{ $allGetCityzenshipData->country_people_english }}</option>
                        @else
                    <option value="{{ $allGetCityzenshipData->country_people_english }}" >{{ $allGetCityzenshipData->country_people_english }}</option>
                    @endif
                    @endforeach

                </select> --}}
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Passport Number:<span
                        class="text-danger">*</span></label>
            <input type="text" class="form-control"
                   placeholder="Passport Number" required name="passport_no">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Date of Issue: <span class="text-danger">*</span></label>
            <input type="text" class="form-control datepicker" id=""
                   placeholder="Date of Issue" required name="passport_issue_date">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Place of Issue: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="Place of Issue" name="passport_issue_place" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Expiry Date:<span class="text-danger">*</span></label>
            <input type="text" class="form-control datepicker" id=""
                   placeholder="Expiry Date" required name="passport_expiry_date">
        </div>
        <div class="mb-3 col-sm-12 ">
            <label for="" class="col-form-label">Permanent Address</label>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Country: <span class="text-danger">*</span></label>
            {{-- <select name="home_country" class="js-example-basic-single form-control custom-form-control" data-parsley-required  >
                <option value="">--Please Select One--</option>
                @foreach($countryList as $allCountryList)
                @if(session()->get('locale') == 'en')
                <option value="{{ $allCountryList->country_name_english }}">{{ $allCountryList->country_name_english }}</option>
                @else
                <option value="{{ $allCountryList->country_name_english }}">{{ $allCountryList->country_name_english }}</option>
                @endif
@endforeach
            </select> --}}

            <input type="text" class="form-control" id=""
                        placeholder="Country" name="home_country" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">House/Plot/Holding Number: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="House/Plot/Holding Number" name="house_no" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Flat/Apartment/Floor Numbe: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="Flat/Apartment/Floor Numbe" name="flat_no" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Street Name/Street Number: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="Street Name/Street Number" name="road_no" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Post/Zip Code: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="Post/Zip Code" name="post_code" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">State/Province: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="State/Province" required name="state">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Telephone Number: <span class="text-danger">*</span></label>
            <input type="number" class="form-control" id=""
                   placeholder="Telephone Number" name="phone" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">City: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id=""
                   placeholder="City" name="city" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Fax Number: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="" name="fax_no"
                   placeholder="Fax Number" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Email: <span class="text-danger">*</span></label>
            <input type="email" class="form-control" id=""
                   placeholder="Email" required name="email">
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Date of Birth: <span class="text-danger">*</span></label>
            <input type="text" class="form-control datepicker" id=""
                   placeholder="Date of Birth" name="date_of_birth" required>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="" class="form-label">Marital Status: <span class="text-danger">*</span></label>
            <select name="martial_status" class="form-control" id="" required>
                <option value="">--Please Select--</option>
                <option value="Married">Married</option>
                <option value="Unmarried">Unmarried</option>
            </select>
        </div>
    </div>
</div>
