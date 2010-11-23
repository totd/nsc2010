function changeType() {
    var text = $('#e_type_id :selected').text();
    $(".second *").show();

    if (text == "Straight Truck") {
        $("#e_Axles").parents("tr").hide();

        $("#e_Gross_Vehicle_Registered_Weight").parents("tr").hide();

    }

    if (text == "Tractor") {
        $("#e_Axles").parents("tr").hide();

        $("#e_Gross_Vehicle_Registered_Weight").parents("tr").hide();

        $("#e_Color").parents("tr").hide();

        $("#e_Make").parents("tr").hide();
    }
}

$(function() {
		$("#e_License_Expiration_Date").datepicker();

        /*$("#updateVIM").validate({
            rules: {
                e_Unit_Number : "required",
                e_License_Expiration_Date : "required",
                e_License_Number : "required",
                e_Start_Mileage : "required",
                e_Registration_State : "required",
                e_Gross_Vehicle_Weight_Rating : "required",
                e_Gross_Vehicle_Registered_Weight : "required",
                e_Unladen_Weight : "required",
                e_Axles : "required",
                e_Name : "required",
                e_Make : "required",
                e_Color : "required",
                e_Model : "required",
                e_Year : "required",
                e_Description : "required",
                e_DOT_Regulated : "required",
                e_type_id : "required",
                e_RFID_No : "required"
            }
        });*/

        $("#equipmentSaveLink1").click(function() {
            //if ($("#updateVIM").valid()) {
                document.getElementById("updateVIM").submit();
            //}
        });

        $("#equipmentSaveLink2").click(function() {
            //if ($("#updateVIM").valid()) {
                document.getElementById("updateVIM").submit();
            //}
        });

        $("#e_type_id").change(function() {
            changeType();
        })

        changeType();

	});


