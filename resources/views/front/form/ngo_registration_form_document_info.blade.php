<section>
    <div class="container">
        <div class="form-card">
            <div class="form">
                <div class="left-side">
                    <div class="steps-content">
                        <h3>{{ trans('fd_one_step_four.step_5')}}</h3>
                    </div>
                    <ul class="progress-bar">
                        <li >{{ trans('fd_one_step_one.fd_one_form_title')}}</li>
                        <li>{{ trans('fd_one_step_one.form_eight_title')}}</li>
                        <li >{{ trans('fd_one_step_one.member_title')}}</li>
                        <li >{{ trans('fd_one_step_one.image_nid_title')}}</li>
                        <li class="active">{{ trans('fd_one_step_one.other_doc_title')}}</li>
                    </ul>
                </div>
                <div class="right-side">
                    <div class="committee_container active">
                        <div class="d-flex justify-content-between mb-4">
                            <div class="p-2">
                                <h5>{{ trans('other_doc.all_doc')}}</h5>
                            </div>
                            <div class="p-2">
                                <button class="btn btn-primary btn-custom" type="button" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        {{ trans('other_doc.add_new_document')}}
                                </button>
                            </div>
                        </div>

                        <?php
                        $fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');
                        $ngoOtherDocLists = DB::table('ngo_other_docs')->where('fd_one_form_id',$fdOneFormId)->latest()->get();

                                                $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
                                'May','June','July','August','September','October','November','December','Saturday','Sunday',
                                'Monday','Tuesday','Wednesday','Thursday','Friday');
                                $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
                                'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
                                বুধবার','বৃহস্পতিবার','শুক্রবার'
                                );
                                                ?>


                        <div class="file-content">
                            <div class="card">
                                <div class="card-body file-manager">
                                    <div class="files">
                                        @foreach($ngoOtherDocLists as $key=>$all_ngo_list_all)

                                        <?php

                                        $file_path = url($all_ngo_list_all->pdf_file_list);
                                        $filename  = pathinfo($file_path, PATHINFO_FILENAME);






                                        ?>


                                            <div class="file-box">

                                                @if($key+1 == 1)

                                                    @if(session()->get('locale') == 'en')
                                                    <h6>কমিটির তালিকা ও নিবন্ধন সনদপত্রের সত্যায়িত অনুলিপি</h6>
                                                    @else

                                                    <h6>Executive committee of primary registering authority and attested copy</h6>
                                                    @endif

                                                @elseif($key+1 == 2)

                                                @if(session()->get('locale') == 'en')
                                                <h6>গঠনতন্ত্রের সত্যায়িত অনুলিপি</h6>
                                                @else

                                                <h6>Attested copy of constitution</h6>
                                                @endif

                                                @elseif($key+1 == 3)

                                                @if(session()->get('locale') == 'en')
                                                <h6>সংস্থার কার্যক্রম প্রতিবেদন</h6>
                                                @else

                                                <h6>Activity report of the organization</h6>
                                                @endif

                                                @elseif($key+1 == 4)


                                                @if(session()->get('locale') == 'en')
                                                <h6>দাতা সংস্হার প্রতিশুতিপত্র</h6>
                                                @else

                                                <h6>Donors Receipt</h6>
                                                @endif



                                                @elseif($key+1 == 5)

                                                @if(session()->get('locale') == 'en')
                                                <h6>সাধারণ সভার কার্যবিবরণীর সত্যায়িত অনুলিপি</h6>
                                                @else

                                                <h6>Attested copy of the minutes of the general meeting regarding</h6>
                                                @endif
                                                @elseif($key+1 == 6)

                                                @if(session()->get('locale') == 'en')
                                                <h6>সংস্থার সাধারণ সদস্যদের নামের তালিকা</h6>
                                                @else

                                                <h6>LIST OF NAMES OF GENERAL MEMBERS OF THE ORGANIZATION</h6>
                                                @endif
                                                @endif



                                                <div class="file-top">
                                                    <i class="fa fa-file-image-o txt-primary"></i>
                                                </div>
                                                <div class="mt-2">
                                                    <h6>{{ $filename }}</h6>
                                                    <p class="mb-1">{{ $all_ngo_list_all->file_size }} {{ trans('other_doc.m_b')}}</p>
                                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal{{ $all_ngo_list_all->id  }}"><i class="fa fa-pencil"></i></button>

                                                            <!--modal -->
                                                            <div class="modal fade" id="exampleModal{{ $all_ngo_list_all->id  }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel"> @if($key+1 == 1)

                                                                                @if(session()->get('locale') == 'en')
                                                                                <h6>কমিটির তালিকা ও নিবন্ধন সনদপত্রের সত্যায়িত অনুলিপি</h6>
                                                                                @else

                                                                                <h6>Executive committee of primary registering authority and attested copy</h6>
                                                                                @endif

                                                                            @elseif($key+1 == 2)

                                                                            @if(session()->get('locale') == 'en')
                                                                            <h6>গঠনতন্ত্রের সত্যায়িত অনুলিপি</h6>
                                                                            @else

                                                                            <h6>Attested copy of constitution</h6>
                                                                            @endif

                                                                            @elseif($key+1 == 3)

                                                                            @if(session()->get('locale') == 'en')
                                                                            <h6>সংস্থার কার্যক্রম প্রতিবেদন</h6>
                                                                            @else

                                                                            <h6>Activity report of the organization</h6>
                                                                            @endif

                                                                            @elseif($key+1 == 4)


                                                                            @if(session()->get('locale') == 'en')
                                                                            <h6>দাতা সংস্হার প্রতিশুতিপত্র</h6>
                                                                            @else

                                                                            <h6>Donors Receipt</h6>
                                                                            @endif



                                                                            @elseif($key+1 == 5)

                                                                            @if(session()->get('locale') == 'en')
                                                                            <h6>সাধারণ সভার কার্যবিবরণীর সত্যায়িত অনুলিপি</h6>
                                                                            @else

                                                                            <h6>Attested copy of the minutes of the general meeting regarding</h6>
                                                                            @endif
                                                                            @elseif($key+1 == 6)

                                                                            @if(session()->get('locale') == 'en')
                                                                            <h6>সংস্থার সাধারণ সদস্যদের নামের তালিকা</h6>
                                                                            @else

                                                                            <h6>LIST OF NAMES OF GENERAL MEMBERS OF THE ORGANIZATION</h6>
                                                                            @endif
                                                                            @endif</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form method="post" action="{{ route('ngoDocument.update',$all_ngo_list_all->id ) }}" enctype="multipart/form-data">

                                                                                @csrf
                                                                                @method('PUT')

                                                                                <div class="mb-3">

                                                                                    <input type="file" name="pdf_file_list" class="form-control" id="">

                                                                                    <iframe src="{{ asset('/') }}{{'public/'. $all_ngo_list_all->pdf_file_list  }}"
                        style="width:300px; height:150px;" frameborder="0"></iframe>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="submit" class="btn btn-primary">{{ trans('form 8_bn.update')}}</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--model end -->

                                                    <a class="btn btn-sm btn-registration" target="_blank"  href = '{{ route('ngoDocumentDownload',$all_ngo_list_all->id) }}'><i class="fa fa-download"></i></a>
                                                    <button  onclick="deleteTag({{ $all_ngo_list_all->id}})" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </div>
                                            <form id="delete-form-{{ $all_ngo_list_all->id }}" action="{{ route('ngoDocument.destroy',$all_ngo_list_all->id) }}" method="POST" style="display: none;">

                                                @csrf
        @method('DELETE')
                                            </form>
                                            @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="buttons d-flex justify-content-end mt-4">
                            <button class="btn btn-dark me-2 back_button"  onclick="location.href = '{{ route('ngoMemberDocument.index') }}';">{{ trans('fd_one_step_one.back')}}</button>
@if(count($ngoOtherDocLists) == 0)
<button class="btn btn-custom next_button" type="button">{{ trans('fd_one_step_four.Submit')}}</button>
@else
                            <button class="btn btn-custom next_button" onclick="location.href = '{{ route('ngoDocumentFinal') }}';">{{ trans('fd_one_step_four.Submit')}}</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="modal modal-xl fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('other_doc.reg')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('ngoDocument.store') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                            @csrf
                            <div class="card mb-3">
                                <div class="card-header">
                                    {{ trans('other_doc.list_of_authorized_executive_committee')}} <span class="text-danger">*</span>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control" data-parsley-required accept=".pdf" name="pdf_file_list[]" type="file" id="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header">
                                    {{ trans('other_doc.attested_copy_of_constitution')}} <span class="text-danger">*</span>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control" data-parsley-required accept=".pdf"  name="pdf_file_list[]" type="file" id="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header">
                                    {{ trans('other_doc.activity_report_of_the_organization')}} <span class="text-danger">*</span>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control" data-parsley-required accept=".pdf" name="pdf_file_list[]" type="file" id="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header">
                                    {{ trans('other_doc.donors_receipt_attested_by_head_of_institution')}} <span class="text-danger">*</span>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control" data-parsley-required accept=".pdf" name="pdf_file_list[]" type="file" id="">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card mb-3">
                                <div class="card-header">
                                    {{ trans('other_doc.general_meeting_regarding')}} <span class="text-danger">*</span>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control" data-parsley-required accept=".pdf" name="pdf_file_list[]" type="file" id="">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card mb-3">
                                <div class="card-header">
                                    {{ trans('civil.adinfo1')}} <span class="text-danger">*</span>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control" data-parsley-required accept=".pdf" name="pdf_file_list[]" type="file" id="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-registration"> {{ trans('other_doc.add_new_document')}}
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
