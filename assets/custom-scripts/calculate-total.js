//Add up all the values in the input boxes and then display in HTML

/**


I know this is a bit of a bodge job BUT there doesn't seem to be an easy/straightforward way of getting JQuery detect changes that have been made by other JQuery scripts.

Ideally, all this code would do is look at the values in the summary section at the bottom of the page, add these together and display the total. The issue is that I have a JQuery function that calculates the totals and displays them in the summary section. I can't get any JQuery code that will find these new values and add them together.

So instead, I have found the value of each input and added them together as the user clicks into the input.

If I spent some more time on this I think I could get it working in the ideal scenario i mentioned above.


*/



$(document).ready(function(){
    
    var embassy_fee = 0;
    var service_fee = 0;
    var vat = 0;
    var additional_fee = 0;
    
    var total = 0;
    
    $('#embassy_fee').focusout(function(){
        
        embassy_fee = parseFloat($(this).val());
        
    });



    $('.band').change(function(){

        if($(this).val() != 'S'){
            
            service_fee = parseFloat($('.band option:selected').attr('label'));

        }else {
            
            service_fee = 0.00;

            $('#service_fee').focusout(function() {
                
                service_fee = parseFloat($(this).val());

            });
        }
    });
    
    $('.band, #service_fee').focusout(function(){
        
        vat = parseFloat($('#service_fee_vat').val());
        
    });
    
    $('#additional_fee').focusout(function(){
        
        additional_fee = parseFloat($(this).val());
        
    })
    
    $('#additional_fee, .band, #service_fee, #embassy_fee').focusout(function(){
        
        if($('#purpose option:selected').val() === 'Business'){
            total = embassy_fee + service_fee + vat + additional_fee;
        }else {
            //vat included in price
            total = embassy_fee + service_fee + additional_fee;
        }
        
        
        
        $('.total').html(total.toFixed(2));
        
    })

    

});