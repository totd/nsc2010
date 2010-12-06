$(function() {
    $("#e_activation_date").datepicker({
			changeMonth: true,
			changeYear: true,
            yearRange: '-10:+10'
		});

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


