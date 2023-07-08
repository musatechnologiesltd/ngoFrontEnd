<?php

$annual =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','Annual Bonus')->first();

$medical =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','Medical Allowance')->first();

$entertainment =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','Entertainment Allowance')->first();


$convoy =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','Conveyance')->first();

$house =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','House Rent')->first();

$overseas =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','Overseas Allowance')->first();


$basic =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisaEdit->id)->where('salary_category','Basic Salary')->first();

?>








<div class="card-header custom-color">
    ঙ. ক্ষতিপূরণ এবং বেনিফিট
</div>
<div class="card-body">
    <table class="table table-borderless">
        <tr>
            <th>বেতন কাঠামো </th>
            <th>স্থানীয়ভাবে প্রদেয় </th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <td></td>
            <td>পারিশ্রমিক</td>
            <td>পরিমাণ</td>
            <td>মুদ্রা</td>
        </tr>
        <tr>
            @if(!$basic)
            <td>ক. মূল বেতন</td>
            <td>
                <select class="form-control" name="payment_type_basic" id="">
                    <option value="">--একটা নির্বাচন করুন--</option>
                    <option value="Monthly"  >মাসিক</option>
                    <option value="Yearly"   >বার্ষিক</option>
                    <option value="Not Applicable">প্রযোজ্য নয়</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" name="amount_basic" id="">

            </td>
            <td>
                <input type="text" class="form-control" name="currency_basic" id="">
            </td>
            @else

            <td>ক. মূল বেতন</td>
            <td>
                <select class="form-control" name="payment_type_basic" id="">
                    <option value="">--একটা নির্বাচন করুন--</option>
                    <option value="Monthly"  {{ $basic->payment_type == "Monthly" ? 'selected':''}}>মাসিক</option>
                    <option value="Yearly"   {{ $basic->payment_type == "Yearly" ? 'selected':''}}>বার্ষিক</option>
                    <option value="Not Applicable" {{ $basic->payment_type == "Not Applicable" ? 'selected':''}}>প্রযোজ্য নয়</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" value="{{ $basic->amount}}" name="amount_basic" id="">

            </td>
            <td>
                <input type="text" class="form-control" value="{{ $basic->currency}}" name="currency_basic" id="">
            </td>

            @endif
        </tr>
        <tr>
            @if(!$overseas)
            <td>খ. বিদেশী ভাতা</td>
            <td>
                <select class="form-control" name="payment_type_overseas" id="">
                    <option value="">--একটা নির্বাচন করুন--</option>
                    <option value="Monthly">মাসিক</option>
                    <option value="Yearly">বার্ষিক</option>
                    <option value="Not Applicable">প্রযোজ্য নয়</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" name="amount_overseas" id="">

            </td>
            <td>
                <input type="text" class="form-control" name="currency_overseas" id="">
            </td>
            @else
            <td>খ. বিদেশী ভাতা</td>
            <td>
                <select class="form-control" name="payment_type_overseas" id="">
                    <option value="">--একটা নির্বাচন করুন--</option>
                    <option value="Monthly"  {{ $overseas->payment_type == "Monthly" ? 'selected':''}}>মাসিক</option>
                    <option value="Yearly"   {{ $overseas->payment_type == "Yearly" ? 'selected':''}}>বার্ষিক</option>
                    <option value="Not Applicable" {{ $overseas->payment_type == "Not Applicable" ? 'selected':''}}>>প্রযোজ্য নয়</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" value="{{ $overseas->amount}}" name="amount_overseas" id="">

            </td>
            <td>
                <input type="text" class="form-control" value="{{ $overseas->currency}}" name="currency_overseas" id="">
            </td>

            @endif
        </tr>
        <tr>
            @if(!$house)
            <td>গ. বাড়ি ভাড়া/বাসস্থান</td>
            <td>
                <select class="form-control" name="payment_type_home" id="">
                    <option value="">--একটা নির্বাচন করুন--</option>
                    <option value="Monthly">মাসিক</option>
                    <option value="Yearly">বার্ষিক</option>
                    <option value="Not Applicable">প্রযোজ্য নয়</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" name="amount_home" id="">

            </td>
            <td>
                <input type="text" class="form-control" name="currency_home" id="">
            </td>

            @else
            <td>গ. বাড়ি ভাড়া/বাসস্থান</td>
            <td>
                <select class="form-control" name="payment_type_home" id="">
                    <option value="">--একটা নির্বাচন করুন--</option>
                    <option value="Monthly"  {{ $house->payment_type == "Monthly" ? 'selected':''}}>মাসিক</option>
                    <option value="Yearly"   {{ $house->payment_type == "Yearly" ? 'selected':''}}>বার্ষিক</option>
                    <option value="Not Applicable" {{ $house->payment_type == "Not Applicable" ? 'selected':''}}>প্রযোজ্য নয়</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" value="{{ $house->amount}}" name="amount_home" id="">

            </td>
            <td>
                <input type="text" class="form-control" value="{{ $house->currency}}" name="currency_home" id="">
            </td>
            @endif
        </tr>
        <tr>
            @if(!$convoy)
            <td>ঘ. পরিবহন</td>
            <td>
                <select class="form-control" name="payment_type_conveyance" id="">
                    <option value="">--একটা নির্বাচন করুন--</option>
                    <option value="Monthly">মাসিক</option>
                    <option value="Yearly">বার্ষিক</option>
                    <option value="Not Applicable">প্রযোজ্য নয়</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" name="amount_conveyance" id="">

            </td>
            <td>
                <input type="text" class="form-control" name="currency_conveyance" id="">
            </td>
            @else
            <td>ঘ. পরিবহন</td>
            <td>
                <select class="form-control" name="payment_type_conveyance" id="">
                    <option value="">--একটা নির্বাচন করুন--</option>
                    <option value="Monthly"  {{ $convoy->payment_type == "Monthly" ? 'selected':''}}>মাসিক</option>
                    <option value="Yearly"   {{ $convoy->payment_type == "Yearly" ? 'selected':''}}>বার্ষিক</option>
                    <option value="Not Applicable" {{ $convoy->payment_type == "Not Applicable" ? 'selected':''}}>>প্রযোজ্য নয়</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" value="{{ $convoy->amount}}" name="amount_conveyance" id="">

            </td>
            <td>
                <input type="text" class="form-control" value="{{ $convoy->currency}}" name="currency_conveyance" id="">
            </td>
            @endif
        </tr>
        <tr>

            @if(!$entertainment)

            <td>ঙ. বিনোদন ভাতা </td>
            <td>
                <select class="form-control" name="payment_type_entertainment" id="">
                    <option value="">--একটা নির্বাচন করুন--</option>
                    <option value="Monthly">মাসিক</option>
                    <option value="Yearly">বার্ষিক</option>
                    <option value="Not Applicable">প্রযোজ্য নয়</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" name="amount_entertainment" id="">

            </td>
            <td>
                <input type="text" class="form-control" name="currency_entertainment" id="">
            </td>

            @else

            <td>ঙ. বিনোদন ভাতা </td>
            <td>
                <select class="form-control" name="payment_type_entertainment" id="">
                    <option value="">--একটা নির্বাচন করুন--</option>
                    <option value="Monthly"  {{ $entertainment->payment_type == "Monthly" ? 'selected':''}}>মাসিক</option>
                    <option value="Yearly"   {{ $entertainment->payment_type == "Yearly" ? 'selected':''}}>বার্ষিক</option>
                    <option value="Not Applicable" {{ $entertainment->payment_type == "Not Applicable" ? 'selected':''}}>প্রযোজ্য নয়</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" value="{{ $entertainment->amount}}" name="amount_entertainment" id="">

            </td>
            <td>
                <input type="text" class="form-control" value="{{ $entertainment->currency}}" name="currency_entertainment" id="">
            </td>

            @endif
        </tr>
        <tr>
            @if(!$medical)
            <td>চ. চিকিৎসা ভাতা</td>
            <td>
                <select class="form-control" name="payment_type_medical" id="">
                    <option value="">--একটা নির্বাচন করুন--</option>
                    <option value="Monthly">মাসিক</option>
                    <option value="Yearly">বার্ষিক</option>
                    <option value="Not Applicable">প্রযোজ্য নয়</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" name="amount_medical" id="">

            </td>
            <td>
                <input type="text" class="form-control" name="currency_medical" id="">
            </td>
            @else

            <td>চ. চিকিৎসা ভাতা</td>
            <td>
                <select class="form-control" name="payment_type_medical" id="">
                    <option value="">--একটা নির্বাচন করুন--</option>
                    <option value="Monthly"  {{ $medical->payment_type == "Monthly" ? 'selected':''}}>মাসিক</option>
                    <option value="Yearly"   {{ $medical->payment_type == "Yearly" ? 'selected':''}}>বার্ষিক</option>
                    <option value="Not Applicable" {{ $medical->payment_type == "Not Applicable" ? 'selected':''}}>প্রযোজ্য নয়</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" value="{{ $medical->amount}}" name="amount_medical" id="">

            </td>
            <td>
                <input type="text" class="form-control" value="{{ $medical->currency}}" name="currency_medical" id="">
            </td>

            @endif
        </tr>
        <tr>
            @if(!$annual)

            <td>ছ. বার্ষিক বোনাস</td>
            <td>
                <select class="form-control" name="payment_type_annual" id="">
                    <option value="">--একটা নির্বাচন করুন--</option>
                    <option value="Monthly">মাসিক</option>
                    <option value="Yearly">বার্ষিক</option>
                    <option value="Not Applicable">প্রযোজ্য নয়</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" name="amount_annual" id="">

            </td>
            <td>
                <input type="text" class="form-control" name="currency_annual" id="">
            </td>
            @else
            <td>চ. চিকিৎসা ভাতা</td>
            <td>
                <select class="form-control" name="payment_type_annual" id="">
                    <option value="">--একটা নির্বাচন করুন--</option>
                    <option value="Monthly"  {{ $annual->payment_type == "Monthly" ? 'selected':''}}>মাসিক</option>
                    <option value="Yearly"   {{ $annual->payment_type == "Yearly" ? 'selected':''}}>বার্ষিক</option>
                    <option value="Not Applicable" {{ $annual->payment_type == "Not Applicable" ? 'selected':''}}>প্রযোজ্য নয়</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" value="{{ $annual->amount}}" name="amount_annual" id="">

            </td>
            <td>
                <input type="text" class="form-control" value="{{ $annual->currency}}" name="currency_annual" id="">
            </td>
            @endif
        </tr>
        <tr>
            <td>জ. অন্যান্য প্রান্তিক সুবিধা, যদি থাকে</td>
            <td colspan="3">
                <input type="text" name="other_benefit" value="{{ $nVisaEdit->other_benefit }}" class="form-control" id="">
            </td>
        </tr>
        <tr>
            <td>ঝ. কোনো বিশেষ মন্তব্য                                            </td>
            <td colspan="3">
                <input type="text" class="form-control" value="{{ $nVisaEdit->salary_remarks }}" name="salary_remarks" id="">
            </td>
        </tr>
    </table>
</div>
