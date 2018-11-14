//Calculate the vat of a price
$(document).ready(function() {
    
    //save original value entered into input
    $('#additionalfee').focusout(function(){
        $('#additionalfee').data('val', $('#additionalfee').val());
    });
    
    //when the VAT checkbox is check, add VAT to the value and insert into the input
    $('#vat').click(function() {
        
        var additionalFee = parseInt($('#additionalfee').val());
        
        var addVat = additionalFee * 1.2;
        
        if($(this).is(':checked')){
            
            $('#additionalfee').val(addVat.toFixed(2));
            
           }
        if(!$(this).is(':checked')){
            
            $('#additionalfee').val($('#additionalfee').data('val'));
           
           }
        
    });
    
});