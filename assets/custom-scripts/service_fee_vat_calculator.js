/**
This script calculates the vat of the service fee and displays the amount of VAT in an input
*/
$(document).ready(function(){
            
    $('.band').change(function(){
        
        if($(this).val() != 'S'){
            
            var selected_val = parseFloat($('.band option:selected').attr('label'));

            var calculate_vat = selected_val * 0.2;

            $('#service_fee_vat').attr('value', calculate_vat.toFixed(2));
            
        }else {
            
            $('#service_fee_vat').attr('value', "0.00");
            
            $('#service_fee').keyup(function() {
                
                var service_fee_val = $('#service_fee').val() * 0.2;
                
                $('#service_fee_vat').attr('value', service_fee_val.toFixed(2));
                
            });
            
        }
        
    });

});