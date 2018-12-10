$(document).ready(function(){
    
  $("#searchBar").on("keyup", function() {
      
    var value = $(this).val().toLowerCase();
      
    $("#visaPrices tbody tr").filter(function() {
        
      $(this).toggle($(this).children(":nth-child(2)").text().toLowerCase().indexOf(value) > -1)
        
    });
  });
});
