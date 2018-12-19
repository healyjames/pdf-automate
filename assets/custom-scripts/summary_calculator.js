/*

This script takes all of the £ values entered by the user and displays them in a summary table at the bottom of the page

*/

$(document).ready(function() {
                
    $('#embassy_fee').focusout(function(){
        $('.embassy_fee_summary').html($(this).val());
    });



    $('.band').change(function(){

        if($(this).val() != 'S'){

            $('.service_fee_summary').html($('.band option:selected').attr('label'));

        }else {

            $('.service_fee_summary').html('0.00');

            $('#service_fee').focusout(function() {

                $('.service_fee_summary').html($(this).val());

            });
        }
    });
    
    $('.band, #service_fee').focusout(function(){
        
        $('.vat_summary').html($('#service_fee_vat').val());
        
    });
    
    $('#additional_fee').focusout(function(){
        
        $('.additional_fee_summary').html($(this).val());
        
    })

    

});