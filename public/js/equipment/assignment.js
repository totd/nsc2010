$(function() {
    $("#ea_start_date").datepicker();
    $("#ea_end_date").datepicker();

    $("#updateAsignment").validate({
        rules: {
            ea_homebase_id: "required"
        },
        messages: {
            comment: "Please check information."
        }
    });

    $("#equipmentAssignmentSaveLink1").click(function() {
        if ($("#updateAsignment").valid()) {
            document.getElementById("updateAsignment").submit();
        }
    });

    $("#equipmentAssignmentSaveLink2").click(function() {
        if ($("#updateAsignment").valid()) {
            document.getElementById("updateAsignment").submit();
        }
    });
});

