<h1>{{ trans('main.Reset_Password_Mail')}}</h1>

{{ trans('main.v_e1')}}:
<a href="{{ route('passwordResetPage', $id) }}">{{ trans('main.click_here')}}</a>

@if(session()->get('locale') == 'en' || empty(session()->get('locale')))

    <h2>------------------</h2>
    <p> <b>এনজিও বিষয়ক ব্যুরো </b><br>
        প্রধানমন্ত্রীর কার্যালয় <br>
        প্লট-ই-১৩/বি, আগারগাঁও। শেরেবাংলা নগর, ঢাকা-১২০৭
    </p>

@else
<h2>------------------</h2>
<p><b>NGO Affairs Bureau</b> <br>
    Prime Minister's Office <br>
    Plot-E-13/B, Agargaon. Sher-e-Bangla Nagar, Dhaka-1207
</p>

@endif
