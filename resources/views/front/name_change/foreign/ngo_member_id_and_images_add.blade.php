@extends('front.master.master')

@section('title')
এনজিওর নাম পরিবর্তন | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')




<section>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="user_profile_dashboard_upper">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                @if(empty(Auth::user()->image))
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                     class="rounded-circle" width="100">
                                     @else
                                     <img src="{{ asset('/') }}{{ Auth::user()->image }}" alt="Admin"
                                     class="rounded-circle" width="100">
                                     @endif
                                <div class="mt-3">
                                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                    <h4>{{ $ngo_list_all->organization_name_ban }}</h4>
                                    @else
                                    <h4>{{ $ngo_list_all->organization_name }}</h4>
                                    @endif
                                    <p class="text-secondary mb-1">{{ $ngo_list_all->name_of_head_in_bd }}</p>
                                    <p class="text-muted font-size-sm">{{ $ngo_list_all->organization_address }}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="profile_link_box">
                            <a href="{{ route('dashboard') }}">
                                <p class="{{ Route::is('dashboard')  ? 'active_link' : '' }}"><i class="fa fa-user pe-2"></i>{{ trans('fd9.m1')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('nameChange') }}">
                                <p class="{{ Route::is('ngoMemberNidAndImageAdd') || Route::is('nameChange') || Route::is('sendNameChange')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.m2')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('renew') }}">
                                <p class="{{ Route::is('renew')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.m3')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('nVisa.index') }}">
                                <p class="{{ Route::is('nVisa.index') || Route::is('nVisa.create') || Route::is('fdNineForm.create')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.nvisa')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fdNineOneForm.index') }}">
                                <p class="{{ Route::is('fdNineOneForm.index') ||  Route::is('fdNineOneForm.create') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd09formone')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('logout') }}">
                                <p class=""><i class="fa fa-cog pe-2"></i>{{ trans('fd9.l')}}</p>
                            </a>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-lg-9 col-md-6 col-sm-12">
                @include('flash_message')

                <form method="post" action="{{ route('ngoMemberNidAndImageStore') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                    @csrf
                <div class="card">
                    <div class="card-header">
                        {{ trans('ngo_member_doc.m_b')}}
                    </div>
                    <div class="card-body">

                        <table class="table table-borderless" id="dynamicAddRemove">
                            <tr>
                                <th> {{ trans('ngo_member_doc.person_name')}}</th>
                                <th> {{ trans('ngo_member_doc.image')}}</th>
                                <th> {{ trans('ngo_member_doc.nid_copy')}}</th>
                                <th></th>
                            </tr>
                            <tr>
                                <td>
                                    <input class="form-control" data-parsley-required name="person_name[]" type="text" id="" required>
                                </td>
                                <td>
                                    <input class="form-control" data-parsley-required accept=".jpg,.jpeg,.png" name="person_image[]" type="file" id="" required>
                                </td>
                                <td>
                                    <input class="form-control" data-parsley-required accept=".pdf" name="person_nid_copy[]" type="file" id="" required>
                                </td>
                                <td></td>
                            </tr>
                        </table>
                        <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">
                            {{ trans('ngo_member_doc.add_new_nid')}}
                        </button>
                    </div>
                </div>
                <div class="d-grid d-md-flex justify-content-md-end mt-5">
                    <button type="submit" class="btn btn-registration">{{ trans('other_doc.add_new_document')}}
                    </button>
                </div>

            </form>
            </div>
        </div>
    </div>

</section>

@endsection

@section('script')

@endsection