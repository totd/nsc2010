$(function() {
    $("#e_change_active_status_date").datepicker({
			changeMonth: true,
			changeYear: true,
            yearRange: '-10:+10'
		});

    $("#changeActiveStatusForm").validate({
        rules: {
            e_change_active_status_date : "required"
        }
    });

    $("#changeSubmit").click(function() {
        if ($("#changeActiveStatusForm").valid()) {
            document.getElementById("changeActiveStatusForm").submit();
        }
    });

    $("#cancelChangeSubmit").click(function() {
        window.location.href='/equipment/equipment-file/index/id/' + $("#e_id").val();
    });
});


