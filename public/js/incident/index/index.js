incidentId = new Object();
incidentStatus = new Object();

$(function(){
    incidentId = $("#i_ID");
    incidentStatus = $("#view_i_Status");

    refreshIncidentDescription(incidentId.val());
    refreshIncidentDriverInformation(incidentId.val());
    refreshIncidentAdditionalDriverInformation(incidentId.val());

    $(".DescriptionActionLink").each(function() {
       $(this).click(function() {
            $(".DescriptionDiv").toggle("slow");
        });
    });

    $(".DriverInformationActionLink").each(function() {
       $(this).click(function() {
            $(".DriverInformationDiv").toggle("slow");
        });
    });

    $("#i_Date").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: '-10:+10'
    });

    $("#saveIncidentDescription").click(function() {
       saveDescription(incidentId.val()) ;
    });

    $("#saveIncidentDriverInformation").click(function() {
       saveDriverInformation(incidentId.val()) ;
    });

    $("#changeDriverButton").click(function() {
        window.location.href='/driver/index/involved-in-incident-drivers/incident_id/' + incidentId.val();
    });

    var $dialogDeleteInvolvedEquipment = $('<div></div>')
		.html('Do you really want to remove this equipment from incident?')
		.dialog({
			autoOpen: false,
            modal: true,
            buttons: {
                "Yes": function() {
                    window.location.href = "/incident/index/delete-involved-equipment/incidentId/" + incidentId.val();
                    $(this).dialog("close");
                },
                "No": function() {
                    $(this).dialog("close");
                }
            },
            resizable: false,
			title: 'Confirm Equipment Delete'
		}
    );

    $("#deleteEquipmentButton").click(function() {
        $dialogDeleteInvolvedEquipment.dialog('open');
    });
    
});

/**
 * @author Andryi Ilnytskyi 13-12-2010
 *
 * Get data according to Incident ID to display Description Info
 *
 * @param id
 *
 */
function refreshIncidentDescription(id) {
    $.ajax({
            type: "GET",
            url: "/incident/index/get-description",
            data: "id=" + id,
            success: function(data) {
                incidentStatus.html(data.i_Status);
                fillDescriptionView(data.row);
                fillDescriptionUpdate(data.row);

                if (data.row.i_Equipment_ID != $("#i_Equipment_ID").val()) {
                    refreshIncidentEquipmentInformation(data.row.i_Equipment_ID);
                }
            },
            dataType: "json"
    });
}

function refreshIncidentDriverInformation(id) {
    $.ajax({
            type: "GET",
            url: "/incident/index/get-driver-information",
            data: "id=" + id,
            success: function(data) {
                fillDriverInformationView(data);
                fillDriverInformationUpdate(data);
            },
            dataType: "json"
    });
}

function refreshIncidentAdditionalDriverInformation(id) {
    $.ajax({
            type: "GET",
            url: "/incident/index/get-description",
            data: "id=" + id,
            success: function(data) {
                fillAdditionalDriverInformationView(data.row);
                fillAdditionalDriverInformationUpdate(data.row);
                // Hak for correct building multiselect
                $("#colMovements").html(data.collisionSelectOptions);
                $("#colMovements").multiselect();
                $("#updateDriverInformation").css("display", "none");
            },
            dataType: "json"
    });
}

function fillAdditionalDriverInformationView(data) {
    $("#view_i_Travel_Direction_ID").html(data.i_Travel_Direction_ID);
    $("#view_i_Collision_Highway_Street").html(data.i_Collision_Highway_Street);
    $("#view_i_Actual_Speed").html(data.i_Actual_Speed);
    $("#view_i_Speed_Limit").html(data.i_Speed_Limit);
    $("#view_i_Collision_Movement").html(data.i_Collision_Movement);
    $("#view_i_Collision_Movement_Other").html(data.i_Collision_Movement_Other);
    $("#view_i_Injured").html(data.i_Injured);
    $("#view_i_Deceased").html(data.i_Deceased);
    $("#view_i_Alcohol_Test").html(data.i_Alcohol_Test);
    $("#view_i_Drug_Test").html(data.i_Drug_Test);
}

function fillAdditionalDriverInformationUpdate(data) {
    $("#i_Travel_Direction_ID").val(data.i_Travel_Direction_ID);
    $("#i_Collision_Highway_Street").val(data.i_Collision_Highway_Street);
    $("#i_Actual_Speed").val(data.i_Actual_Speed);
    $("#i_Speed_Limit").val(data.i_Speed_Limit);
    $("#i_Collision_Movement_Other").val(data.i_Collision_Movement_Other);
    $(".i_Injured_Class").each(function(){
        if ($(this).val() == data.i_Injured) {
            $(this).attr('checked', 'checked');
        }
    });
    $(".i_Drug_Test_Class").each(function(){
        if ($(this).val() == data.i_Drug_Test) {
            $(this).attr('checked', 'checked');
        }
    });
    $(".i_Deceased_Class").each(function(){
        if ($(this).val() == data.i_Deceased) {
            $(this).attr('checked', 'checked');
        }
    });
    $(".i_Alcohol_Test_Class").each(function(){
        if ($(this).val() == data.i_Alcohol_Test) {
            $(this).attr('checked', 'checked');
        }
    });
}

function fillDriverInformationView(data) {
    var href;
    href = "/driver/driver/view-driver-Information/id/" + data.d_ID;
    $("#editDriverLink").attr("href", href);
    
    $("#view_d_First_Name").html(data.d_First_Name);
    $("#view_d_Last_Name").html(data.d_Last_Name);
    $("#view_d_Middle_Name").html(data.d_Middle_Name);
    $("#view_d_Date_Of_Birth").html(data.d_Date_Of_Birth);
    $("#view_d_Driver_SSN").html(data.d_Driver_SSN);
    $("#view_d_Medical_Card_Expiration_Date").html(data.d_Medical_Card_Expiration_Date);
    $("#view_d_Doctor_Name").html(data.d_Doctor_Name);
    $("#view_d_Telephone_Number1").html(data.d_Telephone_Number1);
}

function fillDriverInformationUpdate(data) {
    var href;
    href = "/driver/driver/view-driver-Information/id/" + data.d_ID;
    $("#update_editDriverLink").attr("href", href);

    $("#view_update_d_First_Name").html(data.d_First_Name);
    $("#view_update_d_Last_Name").html(data.d_Last_Name);
    $("#view_update_d_Middle_Name").html(data.d_Middle_Name);
    $("#view_update_d_Date_Of_Birth").html(data.d_Date_Of_Birth);
    $("#view_update_d_Driver_SSN").html(data.d_Driver_SSN);
    $("#view_update_d_Medical_Card_Expiration_Date").html(data.d_Medical_Card_Expiration_Date);
    $("#view_update_d_Doctor_Name").html(data.d_Doctor_Name);
    $("#view_update_d_Telephone_Number1").html(data.d_Telephone_Number1);
}

function fillDescriptionUpdate(data) {
    $("#i_Number").val(data.i_Number);
    $("#i_City").val(data.i_City);
    $("#i_State_ID").val(data.i_State_ID);
    $("#i_Postal_Code").val(data.i_Postal_Code);
    $("#i_Highway_Street").val(data.i_Highway_Street);
    $("#i_At_Intersection").val(data.i_At_Intersection);
    $("#i_Mile_Marker").val(data.i_Mile_Marker);
    $("#i_Date").val(data.i_Date);
    $("#i_Time").val(data.i_Time);
    $("#i_Photo_Taken_By").val(data.i_Photo_Taken_By);
    $(".i_Incident_Diagram_Taken_Class").each(function(){
        if ($(this).val() == data.i_Incident_Diagram_Taken) {
            $(this).attr('checked', 'checked');
        }
    });
    $(".i_Reported_Class").each(function(){
        if ($(this).val() == data.i_Reported) {
            $(this).attr('checked', 'checked');
        }
    });
    $("#i_Police_Department").val(data.i_Police_Department);
    $("#i_Officer_Name").val(data.i_Officer_Name);
    $("#i_Police_Report_Number").val(data.i_Police_Report_Number);
    $("#i_Narrative").val(data.i_Narrative);
    $(".i_Preventable_Class").each(function(){
        if ($(this).val() == data.i_Preventable) {
            $(this).attr('checked', 'checked');
        }
    });
}

function saveDriverInformation(id) {
    $.get("/incident/index/save-driver-information",
            {
                i_ID : id,
                i_Travel_Direction_ID : $("#i_Travel_Direction_ID").val(),
                i_Collision_Highway_Street : $("#i_Collision_Highway_Street").val(),
                i_Actual_Speed : $("#i_Actual_Speed").val(),
                i_Speed_Limit : $("#i_Speed_Limit").val(),
                colMovements : $("#colMovements").val(),
                i_Collision_Movement_Other : $("#i_Collision_Movement_Other").val(),
                i_Injured : $(".i_Injured_Class:checked").val(),
                i_Deceased : $(".i_Deceased_Class:checked").val(),
                i_Alcohol_Test : $(".i_Alcohol_Test_Class:checked").val(),
                i_Drug_Test : $(".i_Drug_Test_Class:checked").val()
            }, function(data) {
                if (data == 1) {
                    refreshIncidentDriverInformation(incidentId.val());
                    refreshIncidentAdditionalDriverInformation(incidentId.val());
                    $(".DriverInformationDiv").toggle("slow");
                    return true;
                } else {
                    alert(data);
                    return false;
                }
            });
}

function saveDescription(id) {
    $.get("/incident/index/save-description",
            {
                i_ID : id,
                i_Number : $("#i_Number").val(),
                i_City : $("#i_City").val(),
                i_State_ID : $("#i_State_ID").val(),
                i_Postal_Code : $("#i_Postal_Code").val(),
                i_Highway_Street : $("#i_Highway_Street").val(),
                i_At_Intersection : $("#i_At_Intersection").val(),
                i_Mile_Marker : $("#i_Mile_Marker").val(),
                i_Date: $("#i_Date").val(),
                i_Time : $("#i_Time").val(),
                i_Photo_Taken_By : $("#i_Photo_Taken_By").val(),
                i_Incident_Diagram_Taken : $(".i_Incident_Diagram_Taken_Class:checked").val(),
                i_Reported : $(".i_Reported_Class:checked").val(),
                i_Police_Department : $("#i_Police_Department").val(),
                i_Officer_Name : $("#i_Officer_Name").val(),
                i_Police_Report_Number : $("#i_Police_Report_Number").val(),
                i_Narrative : $("#i_Narrative").val(),
                i_Preventable : $(".i_Preventable_Class:checked").val()
            }, function(data) {
                if (data == 1) {
                    refreshIncidentDescription(incidentId.val());
                    $(".DescriptionDiv").toggle("slow");
                    return true;
                } else {
                    alert(data);
                    return false;
                }
            });
}

function fillDescriptionView(data) {
    $("#view_i_Number").html(data.i_Number);
    $("#view_i_City").html(data.i_City);
    $("#view_s_name").html(data.s_name);
    $("#view_i_Postal_Code").html(data.i_Postal_Code);
    $("#view_i_Highway_Street").html(data.i_Highway_Street);
    $("#view_i_At_Intersection").html(data.i_At_Intersection);
    $("#view_i_Mile_Marker").html(data.i_Mile_Marker);
    $("#view_i_Date").html(data.i_Date);
    $("#view_i_Time").html(data.i_Time);
    $("#view_i_Incident_Diagram_Taken").html(data.i_Incident_Diagram_Taken);
    $("#view_i_Photo_Taken_By").html(data.i_Photo_Taken_By);
    $("#view_i_Reported").html(data.i_Reported);
    $("#view_i_Police_Department").html(data.i_Police_Department);
    $("#view_i_Officer_Name").html(data.i_Officer_Name);
    $("#view_i_Police_Report_Number").html(data.i_Police_Report_Number);
    $("#view_i_Narrative").html(data.i_Narrative);
    $("#view_i_Preventable").html(data.i_Preventable);
}

function refreshIncidentEquipmentInformation(equipmentId) {
    $.ajax({
            type: "GET",
            url: "/equipment/index/get-equipment-information",
            data: "equipmentId=" + equipmentId,
            success: function(data) {
                fillEquipmentInformationView(data);
            },
            dataType: "json"
    });
}

function fillEquipmentInformationView(data) {
    if (data.empty == true) {
        $("#IncidentEquipmentDiv").css('display', 'none');
        $("#emptyIncidentEquipmentDiv").css('display', 'inline');
    } else {
        $("#e_Unit_Number").html(data.e_Unit_Number);
        $("#e_Number").html(data.e_Number);
        $("#s_name").html(data.s_name);
        $("#et_type").html(data.et_type);
        $("#e_Make").html(data.e_Make);
        $("#e_Model").html(data.e_Model);
        $("#s_Year").html(data.e_Year);

        $("#IncidentEquipmentDiv").css('display', 'inline');
        $("#emptyIncidentEquipmentDiv").css('display', 'none');
    }
}
