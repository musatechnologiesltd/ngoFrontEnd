<p class="member_profile_text">{{ trans('form 8_bn.member_profile')}}</p>
<hr>
<table class="table table-borderless">
    <tr>
        <td>{{ trans('form 8_bn.name')}}</td>
        <td>: {{ $allDataList->member_name }}</td>
    </tr>
    <tr>
        <td>{{ trans('form 8_bn.designation')}}</td>
        <td>:{{ $allDataList->member_designation }}</td>
    </tr>
    <tr>
        <td>{{ trans('form 8_bn.date_of_birth')}}</td>
        <td>:{{ $allDataList->member_dob }}</td>
    </tr>
    <tr>
        <td>{{ trans('form 8_bn.present_address')}}</td>
        <td>:{{ $allDataList->member_present_address }}</td>
    </tr>
    <tr>
        <td>{{ trans('form 8_bn.permanent_address')}}</td>
        <td>:{{ $allDataList->member_permanent_address }}</td>
    </tr>

    <tr>
        <td>{{ trans('form 8_bn.nid_no')}}</td>
        <td>:{{ $allDataList->member_nid_no }}</td>
    </tr>
    <tr>
        <td>{{ trans('form 8_bn.mobile_no')}}</td>
        <td>:{{ $allDataList->member_mobile }}</td>
    </tr>
    <tr>
        <td>{{ trans('form 8_bn.fathers_name')}}</td>
        <td>:{{ $allDataList->member_father_name }}</td>
    </tr>
    <tr>
        <td>{{ trans('form 8_bn.name_of_spouse')}}</td>
        <td>: {{ $allDataList->member_name_supouse }}</td>
    </tr>



</table>
