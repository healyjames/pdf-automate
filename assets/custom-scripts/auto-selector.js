$(document).ready(function() {
    $("select[value]").each(function(){
        $(this).val(this.getAttribute("value"));
        console.log(this.getAttribute("value"));
    });
});