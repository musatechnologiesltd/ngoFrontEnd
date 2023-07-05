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
            <td>ক. মূল বেতন</td>
            <td>
                <select class="form-control" name="payment_type_basic" id="">
                    <option value="">--একটা নির্বাচন করুন--</option>
                    <option value="Monthly">মাসিক</option>
                    <option value="Yearly">বার্ষিক</option>
                    <option value="Not Applicable">প্রযোজ্য নয়</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" name="amount_basic" id="">

            </td>
            <td>
                <input type="text" class="form-control" name="currency_basic" id="">
            </td>
        </tr>
        <tr>
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
        </tr>
        <tr>
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
        </tr>
        <tr>
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
        </tr>
        <tr>
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
        </tr>
        <tr>
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
        </tr>
        <tr>
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
        </tr>
        <tr>
            <td>জ. অন্যান্য প্রান্তিক সুবিধা, যদি থাকে</td>
            <td colspan="3">
                <input type="text" name="other_benefit" class="form-control" id="">
            </td>
        </tr>
        <tr>
            <td>ঝ. কোনো বিশেষ মন্তব্য                                            </td>
            <td colspan="3">
                <input type="text" class="form-control" name="salary_remarks" id="">
            </td>
        </tr>
    </table>
</div>
