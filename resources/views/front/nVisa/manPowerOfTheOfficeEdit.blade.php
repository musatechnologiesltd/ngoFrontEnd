<div class="card-header custom-color">
    চ. অফিসের জনবল
</div>
<div class="card-body">
    <table class="table table-bordered">
        <tr>
            <th colspan="3">স্থানীয় (ক)</th>                                            </th>
            <th colspan="3">বিদেশী (খ)</th>
            <th rowspan="2">সর্বমোট  <br>(ক+খ) </th>
            <th colspan="2">অনুপাত</th>
        </tr>
        <tr>
            <td>এক্সিকিউটিভ </td>
            <td>সাপোর্টিং স্টাফ </td>
            <td>মোট</td>
            <td>এক্সিকিউটিভ </td>
            <td>সাপোর্টিং স্টাফ </td>
            <td>মোট</td>
            <td>স্থানীয় </td>
            <td>বিদেশী</td>
        </tr>
        @if(!$nVisaEdit->nVisaManpowerOfTheOffice)
        <tr>
            <td><input type="text" class="form-control" name="local_executive" id=""></td>
            <td><input type="text" class="form-control" name="local_supporting_staff" id=""></td>
            <td><input type="text" class="form-control" name="local_total" id=""></td>
            <td><input type="text" class="form-control" name="foreign_executive" id=""></td>
            <td><input type="text" class="form-control" name="foreign_supporting_staff" id=""></td>
            <td><input type="text" class="form-control" name="foreign_total" id=""></td>
            <td><input type="text" class="form-control" name="gand_total" id=""></td>
            <td><input type="text" class="form-control" name="local_ratio" id=""></td>
            <td><input type="text" class="form-control" name="foreign_ratio" id=""></td>
        </tr>
        @else
        <tr>
            <td><input type="text" class="form-control" value="{{ $nVisaEdit->nVisaManpowerOfTheOffice->local_executive }}" name="local_executive" id=""></td>
            <td><input type="text" class="form-control" value="{{ $nVisaEdit->nVisaManpowerOfTheOffice->local_supporting_staff }}" name="local_supporting_staff" id=""></td>
            <td><input type="text" class="form-control" value="{{ $nVisaEdit->nVisaManpowerOfTheOffice->local_total }}" name="local_total" id=""></td>
            <td><input type="text" class="form-control" value="{{ $nVisaEdit->nVisaManpowerOfTheOffice->foreign_executive }}" name="foreign_executive" id=""></td>
            <td><input type="text" class="form-control" value="{{ $nVisaEdit->nVisaManpowerOfTheOffice->foreign_supporting_staff }}" name="foreign_supporting_staff" id=""></td>
            <td><input type="text" class="form-control" value="{{ $nVisaEdit->nVisaManpowerOfTheOffice->foreign_total }}" name="foreign_total" id=""></td>
            <td><input type="text" class="form-control" value="{{ $nVisaEdit->nVisaManpowerOfTheOffice->gand_total }}" name="gand_total" id=""></td>
            <td><input type="text" class="form-control" value="{{ $nVisaEdit->nVisaManpowerOfTheOffice->local_ratio }}" name="local_ratio" id=""></td>
            <td><input type="text" class="form-control" value="{{ $nVisaEdit->nVisaManpowerOfTheOffice->foreign_ratio }}" name="foreign_ratio" id=""></td>
        </tr>
        @endif
    </table>
</div>
