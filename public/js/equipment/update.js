function changeType() {
    var text = $('#e_type_id :selected').text();
    if (text == "Tractor") {
        $("#e_Axles").val("");
        $("#e_Axles").parents("tr").hide();

        $("#e_Gross_Vehicle_Registered_Weight").val("");
        $("#e_Gross_Vehicle_Registered_Weight").parents("tr").hide();

        $("#e_Color").val("");
        $("#e_Color").parents("tr").hide();

        $("#e_Make").val("");
        $("#e_Make").parents("tr").hide();
    }
}

$(function() {
		$("#e_License_Expiration_Date").datepicker();

        $("#equipmentSaveLink1").click(function() {
            document.getElementById("updateVIM").submit();
        });

        $("#equipmentSaveLink2").click(function() {
            document.getElementById("updateVIM").submit();
        });

        $("#e_type_id").change(function() {
            changeType();
        })

        changeType();

	});


