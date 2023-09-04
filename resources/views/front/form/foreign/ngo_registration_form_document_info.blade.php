
<?php
$ngoTypeInfo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');

?>






<section>
    <div class="container">
        <div class="form-card">
            <div class="form">
                <div class="left-side">
                    <div class="steps-content">
                        <h3>{{ trans('fd_one_step_two.Step_2')}}</h3>
                    </div>
                    <ul class="progress-bar">
                        @if($foreignNgoType == 'Old')
                        <li >{{ trans('fd_one_step_one.fd8')}}</li>
                        @else
                        <li >{{ trans('fd_one_step_one.fd_one_form_title')}}</li>
                        @endif
                        {{-- <li>{{ trans('fd_one_step_one.form_eight_title')}}</li>
                        <li>{{ trans('fd_one_step_one.member_title')}}</li>
                        <li>{{ trans('fd_one_step_one.image_nid_title')}}</li> --}}
                        {{-- <li>{{ trans('fd_one_step_one.other_doc_title')}}</li> --}}
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


                                                ?>


                        <div class="file-content">
                            <div class="card">
                                <div class="card-body file-manager">
                                    <div class="files">
                                       @if(count($ngoOtherDocLists) == 0)

                                      @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
                                      <h2>তথ্য পাওয়া যায়নি</h2>
                                      @else
                                      <h2>Data Not Found</h2>
                                      @endif

                                      @else

                                        @foreach($ngoOtherDocLists as $key=>$all_ngo_list_all)

                                        <?php

                                        $file_path = url($all_ngo_list_all->pdf_file_list);
                                        $filename  = pathinfo($file_path, PATHINFO_FILENAME);






                                        ?>


                                            <div class="file-box">

                                                @if($key+1 == 1)



                                                <h6> Certificate Of Incorporation in the Country Of Origin </h6>


                                            @elseif($key+1 == 2)



                                            <h6>Constitution</h6>


                                            @elseif($key+1 == 3)



                                            <h6>Activities Report</h6>


                                            @elseif($key+1 == 4)




                                            <h6>Decision Of the Committee/Board To Open Office In Bangladesh</h6>

                                            @elseif($key+1 == 5)

                                            <h6>Letter Of Appoinment Of The Country Representative</h6>
                                            @elseif($key+1 == 6)



                                            <h6>Deed Of Agreement Stamp Of TK.300/-with the landlord in Support Of Opening the Office In Bangladesh</h6>

                                            @elseif($key+1 == 7)


                                            <h6>Letter Of Intent</h6>

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



                                                                                <h6> Certificate Of Incorporation in the Country Of Origin </h6>


                                                                            @elseif($key+1 == 2)



                                                                            <h6>Constitution</h6>


                                                                            @elseif($key+1 == 3)



                                                                            <h6>Activities Report</h6>


                                                                            @elseif($key+1 == 4)




                                                                            <h6>Decision Of the Committee/Board To Open Office In Bangladesh</h6>




                                                                            @elseif($key+1 == 5)

                                                                            <h6>Letter Of Appoinment Of The Country Representative</h6>
                                                                            @elseif($key+1 == 6)



                                                                            <h6>Deed Of Agreement Stamp Of TK.300/-with the landlord in Support Of Opening the Office In Bangladesh</h6>

                                                                            @elseif($key+1 == 7)


                                                                            <h6>Letter Of Intent</h6>

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
                                      @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="buttons d-flex justify-content-end mt-4">
                            <button class="btn btn-dark me-2 back_button"  onclick="location.href = '{{ route('othersInformation') }}';">{{ trans('fd_one_step_one.back')}}</button>
@if(count($ngoOtherDocLists) == 0)
                          @if(count($ngoOtherDocLists) >= 2)
<button class="btn btn-custom next_button" type="button">{{ trans('fd_one_step_four.Submit')}}</button>
                          @else
                          <button class="btn btn-custom next_button" type="button" disabled>{{ trans('fd_one_step_four.Submit')}}</button>
                          @endif
@else
                          @if(count($ngoOtherDocLists) >= 2)
                            <button class="btn btn-custom next_button" onclick="location.href = '{{ route('ngoDocumentFinal') }}';">{{ trans('fd_one_step_four.Submit')}}</button>
                          @else
                          <button class="btn btn-custom next_button" type="button" disabled>{{ trans('fd_one_step_four.Submit')}}</button>
                          @endif
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
                <h5 class="modal-title" id="exampleModalLabel">
                    @if($foreignNgoType == 'Old')
                     Document For NGO Renew
                    @else
                    {{ trans('other_doc.reg')}}
                    @endif

                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('ngoDocument.store') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                            @csrf

                            @if($foreignNgoType == 'Old')

                            <div class="mt-3">

                                <div class="mb-3">
                                    <label for="" class="form-label">সংস্থার গঠনতন্ত্রের পরিবর্তন হয়েছে কি না ? <span class="text-danger">*</span> </label>
                                    <div class="mt-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input organizational_structure" data-parsley-checkmin="1" data-parsley-required type="radio" name="organizational_structure_type" id=""
                                               value="Yes" >
                                        <label class="form-check-label" for="inlineRadio1">হ্যাঁ</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input organizational_structure" data-parsley-checkmin="1" data-parsley-required type="radio" name="organizational_structure_type" id=""
                                               value="No" >
                                        <label class="form-check-label" for="inlineRadio2">না</label>
                                    </div>
                                    </div>
                                </div>

                            <div class="mb-3" id="mResult">
                            </div>
                            <b>অন্যান্য তথ্য: </b>
                                {{-- <div class="mb-3">




                                    <label class="form-label" for="">
                                      নিবন্ধন ফি ও ভ্যাট পরিশোধ করা হয়েছে কিনা (চালানের কপি সংযুক্ত করতে হবে) <span class="text-danger">*</span> </label>
                                    <input class="form-control" name="copy_of_chalan" data-parsley-required accept=".pdf" type="file" id="">
                                </div> --}}

                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        বোর্ড অব ডিরেক্টরস /বোর্ড অব ট্রাস্টিজ তালিকা (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কতৃক নোটারীকৃত /সত্যায়িত )<span class="text-danger">*</span> </label>
                                    <input class="form-control" name="due_vat_pdf"  accept=".pdf" type="file" id="">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        সংস্থার বাই লজ (By laws)/গঠনতন্ত্র  (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কতৃক নোটারীকৃত /সত্যায়িত )<span class="text-danger">*</span> </label>
                                    <input class="form-control" name="due_vat_pdf"  accept=".pdf" type="file" id="">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        সংস্থার বোর্ড অব ডিরেক্টরস /বোর্ড অব ট্রাস্টিজ সভার কার্যবিবরণী (কার্যবিবরনীতে বোর্ড গঠন সংক্রান্ত ,নিবন্ধন নবায়ন করার প্রস্তাব,গঠনতন্ত্র পরিবর্তন সংক্রান্ত বিষয়াদি উল্লেখপূর্বক ) (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কতৃক নোটারীকৃত /সত্যায়িত )<span class="text-danger">*</span> </label>
                                    <input class="form-control" name="due_vat_pdf"  accept=".pdf" type="file" id="">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        সংস্থার বিগত ১০(দশ ) বছরের অডিট রিপোর্ট  এবং বার্ষিক প্রতিবেদনের সত্যায়িত অনুলিপি <span class="text-danger">*</span> </label>
                                    <input class="form-control" name="due_vat_pdf"  accept=".pdf" type="file" id="">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        সংস্থার মূল কার্যালয়ের নিবন্ধনপত্রের (সংশ্লিষ্ট দেশের নোটারীকৃত /সত্যায়িত ) অনুলিপি <span class="text-danger">*</span> </label>
                                    <input class="form-control" name="due_vat_pdf"  accept=".pdf" type="file" id="">
                                </div>


                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        সর্বশেষ নিবন্ধন /নবায়ন সনদপত্রের সত্যায়িত অনুলিপি <span class="text-danger">*</span> </label>
                                    <input class="form-control" name="due_vat_pdf"  accept=".pdf" type="file" id="">
                                </div>


                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        Right To Information Act- ২০০৯ - এর আওতায় - Focal Point নিয়োগ করত:ব্যুরোকে অবহিতকরণ পত্রের অনুলিপি<span class="text-danger">*</span> </label>
                                    <input class="form-control" name="due_vat_pdf"  accept=".pdf" type="file" id="">
                                </div>



                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        তফসিল-১ এ বর্ণিত যেকোন ফি এর ভ্যাট বকেয়া থাকলে পরিশোধ করা হয়েছে কিনা (চালানের কপি সংযুক্ত করতে হবে) <span class="text-danger">*</span> </label>
                                    <input class="form-control" name="due_vat_pdf"  accept=".pdf" type="file" id="">
                                </div>

                            @else
                            <div class="card mb-3">
                                <div class="card-header">
                                    Certificate Of Incorporation in the Country Of Origin <span class="text-danger">*</span>
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
                                    Constitution <span class="text-danger">*</span>
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
                                    Activities Report <span class="text-danger">*</span>
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
                                    Decision Of the Committee/Board To Open Office In Bangladesh<span class="text-danger">*</span>
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
                                    Letter Of Appoinment Of The Country Representative<span class="text-danger">*</span>
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
                                    Deed Of Agreement Stamp Of TK.300/-with the landlord in Support Of Opening the Office In Bangladesh<span class="text-danger">*</span>
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
                                    Letter Of Intent <span class="text-danger">*</span>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control" data-parsley-required accept=".pdf" name="pdf_file_list[]" type="file" id="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

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
<!--end local ngo -->



