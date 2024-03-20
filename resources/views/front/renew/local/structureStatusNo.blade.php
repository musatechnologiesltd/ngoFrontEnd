<div class="card">
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label" for="">
                'অপরিবর্তিত' প্রশংসাপত্রের অনুলিপি (সংশ্লিষ্ট দেশের পিস অফ জাস্টিস ডিপার্টমেন্ট দ্বারা নোটারাইজড/প্রত্যয়িত) যদি সংস্থার গঠনতন্ত্র পরিবর্তিত না হয় : <span class="text-danger">*</span>
            <br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span></label>
            <input class="form-control" name="constitution_of_the_organization_if_unchanged" data-parsley-required accept=".pdf" type="file" id="constitution_of_the_organization_if_unchanged"/>
            <p class="text-danger mt-2" style="font-size:12px;" id="constitution_of_the_organization_if_unchanged_text"></p>
        </div>
    </div>
</div>

<script>
$('#constitution_of_the_organization_if_unchanged').on('change', function(e) {
        let size = this.files[0].size;



        if (size > 500000 ) {
            $('#constitution_of_the_organization_if_unchanged_text').text('Please Upload Maximum 500 KB File');
        }else{
            $('#constitution_of_the_organization_if_unchanged_text').text('');
        }
    });

</script>
