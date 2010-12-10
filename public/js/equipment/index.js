function changeType() {
    var text = $('#e_type_id :selected').text();
    $(".second *").show();

    if (text == "Straight Truck") {
        $("#e_Owner_Number").parents("tr").hide();

        $("#e_Alternate_ID").parents("tr").hide();

    }

    if (text == "Tractor") {
        $("#e_Alternate_ID").parents("tr").hide();

        $("#e_Fee").parents("tr").hide();

        $("#e_Title_Status").parents("tr").hide();

        $("#e_RFID_No").parents("tr").hide();
    }
}

$(function() {
    refreshVIW($("#e_Number").val());

    refreshEquipmentAssigment($("#ea_equipment_id").val());
});

function hideViewAssignment() {
    $(".AssignmentDiv").toggle("slow");
}

function hideViewVIW() {
    $(".VIWDiv").toggle("slow");
}


$(function() {

    // Show/hide VIW edit form
    $(".VIWActionLink").each(function() {
       $(this).click(function() {
            $(".VIWDiv").toggle("slow");
            return false;
        });
    });

    $(".EquipmentAssignmentActionLink").each(function() {
       $(this).click(function() {
            $(".AssignmentDiv").toggle("slow");
            return false;
        });
    });

    $("#EquipmentAssignmentSaveLink").click(function() {

       $.get("/equipment/information-worksheet/save-assignment",
            {
                ea_homebase_id: $("#ea_homebase_id").val(),
                ea_DOT_regulated : $("#ea_DOT_regulated").val(),
                ea_owner_id : $("#ea_owner_id").val(),
                ea_driver_id : $("#ea_driver_id").val(),
                ea_depot_id : $("#ea_depot_id").val(),
                ea_mileage : $("#ea_mileage").val(),
                ea_start_date : $("#ea_start_date").val(),
                ea_end_date : $("#ea_end_date").val(),
                ea_equipment_id : $("#ea_equipment_id").val(),
                ea_id : $("#ea_id").val()
            }, function(data) {
                    if (data == 1) {
                        $("#viewAssignmentDiv").html("");
                        refreshEquipmentAssigment($("#ea_equipment_id").val());
                        $(".AssignmentDiv").toggle("slow");
                        return true;
                    } else {
                        alert(data);
                        return false;
                    }
           });
    });

    $("#VIWSaveLink").click(function() {
        $.get("/equipment/information-worksheet/save-vim/",
                {
                    e_id : $("#e_id").val(),
                    e_Picture : $("#e_Picture").val(),
                    e_Unit_Number : $("#e_Unit_Number").val(),
                    e_type_id : $("#e_type_id").val(),
                    e_Start_Mileage : $("#e_Start_Mileage").val(),
                    e_Registration_State : $("#e_Registration_State").val(),
                    e_Name : $("#e_Name").val(),
                    e_Description : $("#e_Description").val(),
                    e_Axles : $("#e_Axles").val(),
                    e_License_Number : $("#e_License_Number").val(),
                    e_License_Expiration_Date : $("#e_License_Expiration_Date").val(),
                    e_Owner_Number : $("#e_Owner_Number").val(),
                    e_Alternate_ID : $("#e_Alternate_ID").val(),
                    e_DOT_Regulated : $("#e_DOT_Regulated").val(),
                    e_Model : $("#e_Model").val(),
                    e_Year: $("#e_Year").val(),
                    e_Make : $("#e_Make").val(),
                    e_Color : $("#e_Color").val(),
                    e_Unladen_Weight : $("#e_Unladen_Weight").val(),
                    e_Gross_Vehicle_Registered_Weight : $("#e_Gross_Vehicle_Registered_Weight").val(),
                    e_Gross_Vehicle_Weight_Rating : $("#e_Gross_Vehicle_Weight_Rating").val(),
                    e_Title_Status : $("#e_Title_Status").val(),
                    e_Fee : $("#e_Fee").val(),
                    e_RFID_No : $("#e_RFID_No").val()
                }, function(data) {
                    if (data == 1) {
                        $("#viewVIWdiv").html("");
                        refreshVIW($("#e_Number").val());
                        $(".VIWDiv").toggle("slow");
                        return true;
                    } else {
                        alert(data);
                        return false;
                    }
                });
    });

    $("#e_License_Expiration_Date").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: '-20:+20'
    });

    $("#e_type_id").change(function() {
        changeType();
    })

    /*$("#uploadPicture").change(function() {
        ajaxFileUpload();
    });*/

    changeType();
});

function ajaxFileUpload()
{
    $.ajaxFileUpload
    (
        {
            url:'/equipment/information-worksheet/upload-picture/',
            secureuri:false,
            fileElementId: "uploadPicture",
            dataType: 'json',
            async:false,
            success: function (data, status)
            {
                if(typeof(data.error) != 'undefined')
                {
                    if (data.error != '') {
                        //alert(data.error);
                    } else {
                        result = data.fileName;
                        $("#e_Picture").val(result);
                    }
                }
            },
            error: function (data, status, e)
            {
                //alert(e);
            }
        }
    )
    return false;

}


function refreshVIW(VIN) {
   /* $.get("/equipment/information-worksheet/get-viw/",
        {
            VIN : VIN
        }, function(data){
            document.getElementById("viewVIWdiv").innerHTML=data;
            atachPreview();
    });*/

     $.ajax({
            type: "GET",
            url: "/equipment/information-worksheet/get-viw/",
            data: "VIN=" + VIN,
            success: function(data){
                $("#viewVIWdiv").html(data);
                atachPreview();
        }
    });
}

function refreshEquipmentAssigment(equipmentId) {
    $.get("/equipment/information-worksheet/get-assignment/",
        {
            equipmentId : equipmentId
        }, function(data){
            $("#viewAssignmentDiv").html(data);
    });

    $.get("/equipment/information-worksheet/get-assignment-driver/",
        {
            equipmentId : equipmentId
        }, function(data) {
            $("#viewAssignmentDriverDiv").html(data);
            return true;
    });
}


 function atachPreview() {
     $("#attachFile").imgPreview({
            containerID: 'imgPreviewWithStyles',
            imgCSS: {
                // Limit preview size:
                height: 200
            },
            // When container is shown:
            onShow: function(link){
                // Animate link:
                $(link).stop().animate({opacity:0.4});
                // Reset image:
                $('img', this).stop().css({opacity:0});
            },
            // When image has loaded:
            onLoad: function(){
                // Animate image
                $(this).animate({opacity:1}, 300);
            },
            // When container hides:
            onHide: function(link){
                // Animate link:
                $(link).stop().animate({opacity:1});
            }
        });
 }

