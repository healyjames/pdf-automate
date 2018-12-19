/**
This script reads all of the £ amounts in the table on the homepage, and adds them together to display a total figure.
*/

$(document).ready(function() {
        
        $('.row').each(function(){
            
            var total = 0;
            
            $(this).find('.amount').each(function(){
                
                var amount = $(this).text().substring(1, this.length);
                
                total += parseFloat(amount);
                
            });        

            $(this).find('.total').html(total.toFixed(2));
            
        });
        
    });