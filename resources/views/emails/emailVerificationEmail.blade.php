<h1>{{ trans('main.v_e')}}</h1>

{{ trans('main.v_e3')}}:
<a href="{{ route('user.verify', $token) }}">{{ trans('main.v_e2')}}</a>

@if(session()->get('locale') == 'en' || empty(session()->get('locale')))
<center>
    <h2>----------</h2>
    <h1>এনজিও বিষয়ক ব্যুরো</h1>
    <h2>প্রধানমন্ত্রীর কার্যালয়</h2>
    <h3>প্লট-ই-১৩/বি, আগারগাঁও। শেরেবাংলা নগর, ঢাকা-১২০৭</h3>
</center>
@else
<center>
    <h2>----------</h2>
    <h1>NGO Affairs Bureau</h1>
    <h2>Prime Minister's Office</h2>
    <h3>Plot-E-13/B, Agargaon. Sher-e-Bangla Nagar, Dhaka-1207</h3>
</center>
@endif
