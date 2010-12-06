$(function() {
    $("#ea_start_date").datepicker({
			changeMonth: true,
			changeYear: true,
            yearRange: '-10:+10'
		});
    $("#ea_end_date").datepicker({
			changeMonth: true,
			changeYear: true,
            yearRange: '-10:+10'
		});

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

    $("#ea_homebase_id").change(function() {
        $.get("/ajax/homebase/get-Depot-List/", {id: $("#ea_homebase_id").val()}, function(data){
            $('#ea_depot_id option').remove();
            /*var options = {
                "" : "-"
            }
            $("#ea_depot_id").addOption(options, false);*/
            $('#ea_depot_id').append(""+data+"");
        });
    });
});

