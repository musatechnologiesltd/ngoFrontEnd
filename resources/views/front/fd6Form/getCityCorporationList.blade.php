<option value="অনুগ্রহ করে নির্বাচন করুন">--- অনুগ্রহ করে নির্বাচন করুন ---</option>
@foreach($cityCorporationList as $districtListAll)
<option value="{{ $districtListAll->city_orporation }}">{{ $districtListAll->city_orporation }}</option>
@endforeach
