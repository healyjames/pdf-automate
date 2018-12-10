/**
This script hides the variable service fee <input> and only shows it when "Variable" has been selected
When the input is hidden, it takes the value of the selected price band option and populates the hidden input -> allowing the PHP to pickup the £ value and send that to the database
*/

$(document).ready(function() {
    
    $('div.servicefee').hide();
    
    $('#band_list').change(function(){
        
        var target = $(this).children('option:selected').text()
        
        if(target != 'S'){
            
            $('div.servicefee').hide();
        }else{
            $('div.servicefee').show();
        }
        
    });
});