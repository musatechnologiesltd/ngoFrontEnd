
<h1>Apply For NGO Application Submitted</h1>

Your Registration Number:{{ $token }}.

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
