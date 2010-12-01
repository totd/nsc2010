$(function() {
    $( "#i_Date" ).datepicker({
			changeMonth: true,
			changeYear: true,
            yearRange: '-10:+10'
		});

    $("#step1Form").validate({
        rules: {
            i_Date : "required"
        }
    });

    /*$("#nextSubmit").click(function() {
        if ($("#step1Form").valid()) {
            document.getElementById("step1Form").submit();
        }
    });*/
});