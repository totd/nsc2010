$(function() {
    $("#e_change_active_status_date").datepicker();

    $("#terminateForm").validate({
        rules: {
            e_change_active_status_date : "required"
        }
    });

    $("#changeStatusLink").click(function() {
        if ($("#terminateForm").valid()) {
            document.getElementById("terminateForm").submit();
        }
    });
});


