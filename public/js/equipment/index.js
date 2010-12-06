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
    refreshEquipmentAssigment($("#ea_equipment_id").val());
});

function hideViewAssignment() {
    $(".AssignmentDiv").toggle("slow");
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
                if(data==1){
                    $("#viewAssignmentDiv").innerHTML="";
                    refreshEquipmentAssigment($("#ea_equipment_id").val());
                     $(".AssignmentDiv").toggle("slow");
                    return true;
                }else{
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

    changeType();
    

    $("#VIWSaveLink").click(function() {
        document.getElementById("updateVIM").submit();
    });
});

function refreshEquipmentAssigment(equipmentId) {
    $.get("/equipment/information-worksheet/get-assignment/",
        {
            equipmentId : equipmentId
        }, function(data){
            document.getElementById("viewAssignmentDiv").innerHTML=data;
            return true;
    });
}



 $(function() {
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
 });

