//Add up all the values in the input boxes and then display in HTML
$(document).ready(function(){
                        
    $('.form-group').on('input', '.amount', function(){
                            
        var total = 0;
                            
            $('.amount').each(function(){
                                
                var inputVal = $(this).val();
                                
                    if(inputVal > 0){
                                   
                        total += parseFloat(inputVal);
                                    
                    }
                                
                });
                            
            $('.total').html(total);
                            
        });
                        
    });