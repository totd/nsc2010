$(document).ready(function() {
    $("#new-Equipment-Search").validate({
        rules: {
            AppType: "required",
            EIN: {
                required: true,
                maxlength: 40
            }
        },
        messages: {
            comment: "Please check information."
        }
    });
    
    $("#nextNewEquipmentStep1").click(function(){
        if ($("#new-Equipment-Search").valid()) {
            document.getElementById('new-Equipment-Search').submit();
        }
    });

});