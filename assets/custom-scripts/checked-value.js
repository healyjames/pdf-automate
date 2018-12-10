$(document).ready(function(){

    $('#vat').change(function(){

        var isChecked= $(this).is(':checked');

        if(!isChecked){
            $(this).val('0');
        }else{
            $(this).val('1');
        }
    })
});