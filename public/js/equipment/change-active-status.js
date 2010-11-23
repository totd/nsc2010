$(function() {
    $("#e_change_active_status_date").datepicker();

    $("#changeActiveStatusForm").validate({
        rules: {
            e_change_active_status_date : "required"
        }
    });

    $("#changeStatusLink").click(function() {
        if ($("#changeActiveStatusForm").valid()) {
            document.getElementById("changeActiveStatusForm").submit();
        }
    });
});


