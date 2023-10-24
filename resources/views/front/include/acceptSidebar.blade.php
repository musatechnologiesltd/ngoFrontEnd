<?php
use App\Http\Controllers\NGO\CommonController;
 //CommonController::checkNgotype();

$mainNgoType = CommonController::changeView();

?>

@if($mainNgoType== 'দেশিও')
<div class="card-body">
    <div class="profile_link_box">
        <a href="{{ route('dashboard') }}">
            <p class="{{ Route::is('dashboard')  ? 'active_link' : '' }}"><i class="fa fa-user pe-2"></i>{{ trans('fd9.m1')}}</p>
        </a>
    </div>
    <div class="profile_link_box">
        <a href="{{ route('nameChange') }}">
            <p class="{{ Route::is('nameChange')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.m2')}}</p>
        </a>
    </div>

    <div class="profile_link_box">
        <a href="{{ route('renew') }}">
            <p class="{{ Route::is('renew')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.m3')}}</p>
        </a>
    </div>

    <div class="profile_link_box">
        <a href="{{ route('fdNineForm.index') }}">
            <p class="{{ Route::is('fdNineForm.index') || Route::is('fdNineForm.create') || Route::is('fdNineForm.create')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.nvisa')}}</p>
        </a>
    </div>

    <div class="profile_link_box">
        <a href="{{ route('fdNineOneForm.index') }}">
            <p class="{{ Route::is('fdNineOneForm.index') ||  Route::is('fdNineOneForm.create') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd09formone')}}</p>
        </a>
    </div>


    <div class="profile_link_box">
        <a href="{{ route('fd6Form.index') }}">
            <p class="{{ Route::is('fd6Form.index') ||  Route::is('fd6Form.create') || Route::is('fd6Form.view') || Route::is('fd2Form.create') || Route::is('fd2Form.index') || Route::is('fd6Form.edit') || Route::is('fd2Form.view') || Route::is('fd2Form.edit')? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd6')}}</p>
        </a>
    </div>

    <div class="profile_link_box">
        <a href="{{ route('fd7Form.index') }}">
            <p class="{{ Route::is('fd7Form.index') ||  Route::is('fd7Form.create') || Route::is('fd7Form.view') || Route::is('addFd2DetailForFd7') || Route::is('editFd2DetailForFd7') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd7')}}</p>
        </a>
    </div>



    <div class="profile_link_box">
        <a href="{{ route('fc2Form.index') }}">
            <p class="{{ Route::is('fc2Form.index') ||  Route::is('fc2Form.create') || Route::is('fc2Form.view') || Route::is('addFd2DetailForFc2') || Route::is('editFd2DetailForFc2') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fc2')}}</p>
        </a>
    </div>



    <div class="profile_link_box">
        <a href="{{ route('logout') }}">
            <p class=""><i class="fa fa-cog pe-2"></i>{{ trans('fd9.l')}}</p>
        </a>
    </div>

</div>
@else
<div class="card-body">
    <div class="profile_link_box">
        <a href="{{ route('dashboard') }}">
            <p class="{{ Route::is('dashboard')  ? 'active_link' : '' }}"><i class="fa fa-user pe-2"></i>{{ trans('fd9.m1')}}</p>
        </a>
    </div>
    <div class="profile_link_box">
        <a href="{{ route('nameChange') }}">
            <p class="{{ Route::is('nameChange')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.m2')}}</p>
        </a>
    </div>

    <div class="profile_link_box">
        <a href="{{ route('renew') }}">
            <p class="{{ Route::is('renew')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.m3')}}</p>
        </a>
    </div>

    <div class="profile_link_box">
        <a href="{{ route('fdNineForm.index') }}">
            <p class="{{ Route::is('fdNineForm.index') || Route::is('fdNineForm.create') || Route::is('fdNineForm.create')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.nvisa')}}</p>
        </a>
    </div>

    <div class="profile_link_box">
        <a href="{{ route('fdNineOneForm.index') }}">
            <p class="{{ Route::is('fdNineOneForm.index') ||  Route::is('fdNineOneForm.create') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd09formone')}}</p>
        </a>
    </div>


    <div class="profile_link_box">
        <a href="{{ route('fd6Form.index') }}">
            <p class="{{ Route::is('fd6Form.index') ||  Route::is('fd6Form.create') || Route::is('fd6Form.view') || Route::is('fd2Form.create') || Route::is('fd2Form.index') || Route::is('fd6Form.edit') || Route::is('fd2Form.view') || Route::is('fd2Form.edit')? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd6')}}</p>
        </a>
    </div>


    <div class="profile_link_box">
        <a href="{{ route('fd7Form.index') }}">
            <p class="{{ Route::is('fd7Form.index') ||  Route::is('fd7Form.create') || Route::is('fd7Form.view') || Route::is('addFd2DetailForFd7') || Route::is('editFd2DetailForFd7') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd7')}}</p>
        </a>
    </div>




    <div class="profile_link_box">
        <a href="{{ route('logout') }}">
            <p class=""><i class="fa fa-cog pe-2"></i>{{ trans('fd9.l')}}</p>
        </a>
    </div>

</div>

@endif
