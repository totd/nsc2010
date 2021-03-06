$(function() {
    $("#e_change_active_status_date").datepicker({
			changeMonth: true,
			changeYear: true,
            yearRange: '-10:+10',
            showOn: 'button',
            buttonImage: "/images/select-data.gif",
            buttonImageOnly: true
		});

    $("#terminateForm").validate({
        rules: {
            e_change_active_status_date : "required"
        }
    });

    $("#terminateSubmit").click(function() {
        if ($("#terminateForm").valid()) {
            document.getElementById("terminateForm").submit();
        }
    });

    $("#cancelTerminateSubmit").click(function() {
        window.location.href='/equipment/equipment-file/index/id/' + $("#e_id").val();
    });
});


