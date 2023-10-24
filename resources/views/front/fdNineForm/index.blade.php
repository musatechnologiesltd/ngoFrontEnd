@extends('front.master.master')

@section('title')
এফডি -৯ ফরম  | {{ trans('header.ngo_ab')}}
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
                                <p class="{{ Route::is('fdNineForm.edit') || Route::is('fdNineForm.index') || Route::is('fdNineForm.create') || Route::is('fdNineForm.create')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.nvisa')}}</p>
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
                </div>
            </div>
            <div class="col-lg-9 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="name_change_box">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="others_inner_section">
                                        <h1>এফডি -৯ ফরম </h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="d-grid d-md-flex justify-content-end">
                                        <button type="button" class="btn btn-registration"
                                                onclick="location.href = '{{ route('fdNineForm.create') }}';">নতুন অ্যাপ্লিকেশন যোগ করুন
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @if(count($fd9List) == 0)
                            <div class="no_name_change">
                                <div class="d-flex justify-content-center pt-5">
                                    <img src="{{ asset('/') }}public/noresult.png" alt="" width="120" height="120">
                                </div>
                                <div class="text-center">
                                    <h5>কোনো সত্যায়ন ফরম এর তালিকা নেই</h5>
                                </div>
                            </div>
                            @else
                            <div class="no_name_change pt-4">
                                <h5 class="pb-3">বিদেশি নাগরিক নিয়োগপত্র সত্যায়ন ফরম এর তালিকা</h5>



                                <table class="table table-bordered">
                                    <tr>
                                        <th>ক্রমিক নং </th>
                                        <th>বিদেশি নাগরিকের নাম</th>
                                        <th>পাসপোর্ট নম্বর</th>
                                        <th>জাতীয়তা / নাগরিকত্ব</th>
                                        <th>স্ট্যাটাস</th>
                                        <th>অপারেশন</th>
                                    </tr>
                                    @foreach($fd9List as $key=>$allFd9List)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $allFd9List->fd9_foreigner_name }}</td>
                                        <td>{{ $allFd9List->fd9_passport_number }}</td>
                                        <td>{{ $allFd9List->fd9_nationality_or_citizenship }}</td>
                                        <td>                                    @if(empty($allFd9List->status))
                                            <span class="text-success">চলমান</span>
@elseif($allFd9List->status == 'Accepted')
<span class="text-success">গৃহীত</span>

@elseif($allFd9List->status == 'Ongoing')
<span class="text-success">চলমান</span>

@else
<span class="text-success">খারিজ</span>

@endif</td>
                                        <td>

                                            <a  href="{{ route('fdNineForm.edit',base64_encode($allFd9List->id)) }}" class="btn btn-sm btn-outline-primary"> <i class="fa fa-pencil"></i> </a>
                                            <a  href="{{ route('fdNineForm.show',base64_encode($allFd9List->id)) }}" class="btn btn-sm btn-outline-success"> <i class="fa fa-eye"></i> </a>
                                            <button type="button" onclick="deleteTag({{ $allFd9List->id}})" class="btn btn-sm btn-outline-danger"><i
                                                class="bi bi-trash"></i></button>

                                                <form id="delete-form-{{ $allFd9List->id }}" action="{{ route('fdNineForm.destroy',$allFd9List->id) }}" method="POST" style="display: none;">

                                                    @csrf
                                                    @method('DELETE')

                                                </form>



                                        </td>
                                    </tr>
                                    @endforeach
                                </table>

                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
