$(function() {
    $("#e_activation_date").datepicker();

    $("#completeForm").validate({
        rules: {
            wantCopleteCheckBox : "required",
            e_activation_date : "required"
        }
    });

    $("#completeLink").click(function() {
        if ($("#completeForm").valid()) {
            document.getElementById("completeForm").submit();
        }
    });
});


