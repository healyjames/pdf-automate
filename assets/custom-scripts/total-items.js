//Calculate the amount of results in the table
$(document).ready(function(){
                        
    var count = $("tr").length - 1;
    
    $("#total-items").html(count);
                        
});