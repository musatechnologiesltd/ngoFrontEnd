<div class="card-body">
    <div class="profile_link_box">
        <a href="{{ route('dashboard') }}">
            <p class="{{ Route::is('dashboard')  ? 'active_link' : '' }}"><i class="fa fa-user pe-2"></i>ব্যবহারকারীর প্রোফাইল</p>
        </a>
    </div>
    <div class="profile_link_box">
        <a href="{{ route('nameChange') }}">
            <p class="{{ Route::is('nameChange')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>এনজিওর নাম পরিবর্তন</p>
        </a>
    </div>

    <div class="profile_link_box">
        <a href="{{ route('renew') }}">
            <p class="{{ Route::is('renew')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>আবেদন পুনর্নবীকরণ</p>
        </a>
    </div>

    <div class="profile_link_box">
        <a href="{{ route('nVisa.index') }}">
            <p class="{{ Route::is('nVisa.index') || Route::is('nVisa.create') || Route::is('fdNineForm.create') || Route::is('fdNineOneForm.create') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.nvisa')}}</p>
        </a>
    </div>




    <div class="profile_link_box">
        <a href="{{ route('logout') }}">
            <p class=""><i class="fa fa-cog pe-2"></i>লগ আউট</p>
        </a>
    </div>

</div>
