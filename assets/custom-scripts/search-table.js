/*
This script sets up the search bar.
It hides any records that do not match what the user is typing into the search bar.
*/
$(document).ready(function(){
    
  $("#searchBar").on("keyup", function() {
      
    var value = $(this).val().toLowerCase();
      
    $("#visaPrices tbody tr").filter(function() {
        
      $(this).toggle($(this).children(":nth-child(2)").text().toLowerCase().indexOf(value) > -1)
        
    });
  });
});
