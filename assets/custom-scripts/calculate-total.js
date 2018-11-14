//Add up all the values in the input boxes and then display in HTML
$(document).ready(function(){
                        
    $('.element').on('input', '.amount', function(){
                            
        var total = 0;
                            
            $('.amount').each(function(){
                                
                var inputVal = $(this).val();
                                
                    if($.isNumeric(inputVal)){
                                   
                        total += parseFloat(inputVal);
                                    
                    }
                                
                });
                            
            $('.total').html(total);
                            
        });
                        
    });