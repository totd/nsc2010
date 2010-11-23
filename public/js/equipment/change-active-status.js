$(function() {
    $("#e_change_active_status_date").datepicker();

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
        window.location.href='/equipment/vehicle-file/index/id/' + $("#e_id").val();
    });
});


