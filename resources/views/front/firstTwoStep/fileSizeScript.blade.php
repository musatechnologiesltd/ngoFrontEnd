<script>

$(function(){


    $('#digital_signature').on('change', function(e) {
        let size = this.files[0].size;



        if (size > 60000) {
            $('#digital_signature_text').text('Please Upload Maximum 60 KB File');
        }else{
            $('#digital_signature_text').text('');
        }
    });


    $('#digital_seal').on('change', function(e) {
        let size = this.files[0].size;



        if (size > 80000) {
            $('#digital_seal_text').text('Please Upload Maximum 80 KB File');
        }else{
            $('#digital_seal_text').text('');
        }
    });


    $('#foregin_pdf').on('change', function(e) {
        let size = this.files[0].size;



        if (size > 5000000 ) {
            $('#foregin_pdf_text').text('Please Upload Maximum 5 MB File');
        }else{
            $('#foregin_pdf_text').text('');
        }
    });


    $('#annual_budget_file').on('change', function(e) {
        let size = this.files[0].size;



        if (size > 2000000 ) {
            $('#annual_budget_file_text').text('Please Upload Maximum 2 MB File');
        }else{
            $('#annual_budget_file_text').text('');
        }
    });


    $('#copy_of_chalan').on('change', function(e) {
        let size = this.files[0].size;



        if (size > 500000 ) {
            $('#copy_of_chalan_text').text('Please Upload Maximum 500 KB File');
        }else{
            $('#copy_of_chalan_text').text('');
        }
    });


    $('#due_vat_pdf').on('change', function(e) {
        let size = this.files[0].size;



        if (size > 500000 ) {
            $('#due_vat_pdf_text').text('Please Upload Maximum 500 KB File');
        }else{
            $('#due_vat_pdf_text').text('');
        }
    });


    $('#change_ac_number').on('change', function(e) {
        let size = this.files[0].size;



        if (size > 500000 ) {
            $('#change_ac_number_text').text('Please Upload Maximum 500 KB File');
        }else{
            $('#change_ac_number_text').text('');
        }
    });



    $('[id^=structurePartTwo]').on('change', function(e) {

var mainId = $(this).attr('id');
var getId = mainId.slice(16)
//alert(getId);
let size = this.files[0].size;


if(getId == 1){

    if (size > 2000000 ) {
    $('#structurePartTwo'+getId+'_text').text('Please Upload Maximum 2 MB File');
}else{
    $('#structurePartTwo'+getId+'_text').text('');
}

}else if(getId == 2 || getId == 4 ){

    if (size > 1000000 ) {
    $('#structurePartTwo'+getId+'_text').text('Please Upload Maximum 1 MB File');
}else{
    $('#structurePartTwo'+getId+'_text').text('');
}

}else if( getId == 5){

    if (size > 5000000 ) {
    $('#structurePartTwo'+getId+'_text').text('Please Upload Maximum 5 MB File');
}else{
    $('#structurePartTwo'+getId+'_text').text('');
}


}else{



if (size > 500000 ) {
    $('#structurePartTwo'+getId+'_text').text('Please Upload Maximum 500 KB File');
}else{
    $('#structurePartTwo'+getId+'_text').text('');
}
}
});




$('[id^=structurePartThree]').on('change', function(e) {

    var mainId = $(this).attr('id');
var getId = mainId.slice(18)
//alert(getId);
let size = this.files[0].size;


if(getId == 3 ){

if (size > 1000000 ) {
$('#structurePartThree'+getId+'_text').text('Please Upload Maximum 1 MB File');
}else{
$('#structurePartThree'+getId+'_text').text('');
}

}else if( getId == 4){

if (size > 5000000 ) {
$('#structurePartThree'+getId+'_text').text('Please Upload Maximum 5 MB File');
}else{
$('#structurePartThree'+getId+'_text').text('');
}


}else{



if (size > 500000 ) {
$('#structurePartThree'+getId+'_text').text('Please Upload Maximum 500 KB File');
}else{
$('#structurePartThree'+getId+'_text').text('');
}
}


});


})

</script>
