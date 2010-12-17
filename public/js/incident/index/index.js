incidentId = new Object();
incidentCauseID = new Object();
incidentStatus = new Object();

$(function(){
    incidentId = $("#i_ID");
    incidentCauseID = $("#ic_ID");
    incidentStatus = $("#view_i_Status");

    refreshIncidentDescription(incidentId.val());
    refreshIncidentDriverInformation(incidentId.val());
    refreshIncidentAdditionalDriverInformation(incidentId.val());
    
    $(".DescriptionActionLink").each(function() {
       $(this).click(function() {
            $(".DescriptionDiv").toggle("slow");
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
                fillDescriptionView(data);
                fillDescriptionUpdate(data);
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
                fillAdditionalDriverInformationView(data);
                //fillAdditionalDriverInformationUpdate(data);
            },
            dataType: "json"
    });
}

function fillAdditionalDriverInformationView(data) {
    $("#view_i_Highway_Street_Travel_Direction").html(data.i_Highway_Street_Travel_Direction);
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
    $("input:radio[@name=i_Incident_Diagram_Taken]").each(function(){
        if ($(this).val() == data.i_Incident_Diagram_Taken) {
            $(this).attr('checked', 'checked');
        }
    });
    $("input:radio[@name=i_Reported]").each(function(){
        if ($(this).val() == data.i_Reported) {
            $(this).attr('checked', 'checked');
        }
    });
    $("#i_Police_Department").val(data.i_Police_Department);
    $("#i_Officer_Name").val(data.i_Officer_Name);
    $("#i_Police_Report_Number").val(data.i_Police_Report_Number);
    $("#i_Narrative").val(data.i_Narrative);
    $("#ic_ID").val(data.ic_ID);
    $("input:radio[@name=ic_Preventable]").each(function(){
        if ($(this).val() == data.ic_Preventable) {
            $(this).attr('checked', 'checked');
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
                i_Incident_Diagram_Taken : $("input:radio[@name=i_Incident_Diagram_Taken]:checked").val(),
                i_Reported : $("input:radio[@name=i_Reported]:checked").val(),
                i_Police_Department : $("#i_Police_Department").val(),
                i_Officer_Name : $("#i_Officer_Name").val(),
                i_Police_Report_Number : $("#i_Police_Report_Number").val(),
                i_Narrative : $("#i_Narrative").val(),
                ic_ID : incidentCauseID.val(),
                ic_Preventable : $("input:radio[@name=ic_Preventable]:checked").val()
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
    $("#view_ic_Preventable").html(data.ic_Preventable);
}

function storePrimaryDescriptionValues() {
    
}