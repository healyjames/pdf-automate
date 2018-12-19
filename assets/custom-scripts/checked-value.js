/**
This script sets the value of the checkbox depending on whether or not it has been checked

This is important as the PHP will take this value and send it to the server.
*/

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