/**
The script displays the £ value in an input box next to the list of price bands

Useful for readability and user experience as without this the user would not be able to see the value of each price band
*/

$(document).ready(function(){
                        
    $('.band').change(function(){

        $('#band').attr('value', $('.band option:selected').attr('label'));

    });

});