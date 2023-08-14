
<h1>Apply For NGO Application Submitted</h1>

Your Registration Number:{{ $token }}.

@if(session()->get('locale') == 'en' || empty(session()->get('locale')))

    <h2>----------</h2>
    <h1>এনজিও বিষয়ক ব্যুরো</h1>
    <p>প্রধানমন্ত্রীর কার্যালয়</p>
    <p>প্লট-ই-১৩/বি, আগারগাঁও। শেরেবাংলা নগর, ঢাকা-১২০৭</p>

@else

    <h2>----------</h2>
    <h1>NGO Affairs Bureau</h1>
    <p>Prime Minister's Office</p>
    <p>Plot-E-13/B, Agargaon. Sher-e-Bangla Nagar, Dhaka-1207</p>

@endif
