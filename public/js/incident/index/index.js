incidentID = new Object();
incidentCauseID = new Object();
$(function(){
    incidentID = $("#i_ID");
    incidentCauseID = $("#ic_ID");

    refreshIncidentDescription(incidentID.val());
    
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
       saveDescription(incidentID.val()) ;
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
            url: "/incident/index/get-description-update",
            data: "id=" + id,
            success: function(data) {
                fillDescriptionView(data);
                fillDescriptionUpdate(data);
            },
            dataType: "json"
    });
}

function fillDescriptionUpdate(data) {
    $("#i_Number").val(data.row.i_Number);
    $("#i_City").val(data.row.i_City);
    $("#i_State_ID").val(data.row.i_State_ID);
    $("#i_Postal_Code").val(data.row.i_Postal_Code);
    $("#i_Highway_Street").val(data.row.i_Highway_Street);
    $("#i_At_Intersection").val(data.row.i_At_Intersection);
    $("#i_Mile_Marker").val(data.row.i_Mile_Marker);
    $("#i_Date").val(data.row.i_Date);
    $("#i_Time").val(data.row.i_Time);
    $("#i_Photo_Taken_By").val(data.row.i_Photo_Taken_By);
    $("input:radio[@name=i_Reported]").each(function(){
        if ($(this).val() == data.row.i_Reported) {
            $(this).attr('checked', 'checked');
        }
    });
    $("#i_Police_Department").val(data.row.i_Police_Department);
    $("#i_Officer_Name").val(data.row.i_Officer_Name);
    $("#i_Police_Report_Number").val(data.row.i_Police_Report_Number);
    $("#i_Narrative").val(data.row.i_Narrative);
    $("#ic_ID").val(data.row.ic_ID);
    $("input:radio[@name=ic_Preventable]").each(function(){
        if ($(this).val() == data.row.ic_Preventable) {
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
                i_Reported : $("input:radio[@name=i_Reported]:checked").val(),
                i_Police_Department : $("#i_Police_Department").val(),
                i_Officer_Name : $("#i_Officer_Name").val(),
                i_Police_Report_Number : $("#i_Police_Report_Number").val(),
                i_Narrative : $("#i_Narrative").val(),
                ic_ID : incidentCauseID.val(),
                ic_Preventable : $("input:radio[@name=ic_Preventable]:checked").val()
            }, function(data) {
                if (data == 1) {
                    refreshIncidentDescription(incidentID.val());
                    $(".DescriptionDiv").toggle("slow");
                    return true;
                } else {
                    alert(data);
                    return false;
                }
            });
}

function fillDescriptionView(data) {
    $("#view_i_Number").html(data.row.i_Number);
    $("#view_i_City").html(data.row.i_City);
    $("#view_s_name").html(data.row.s_name);
    $("#view_i_Postal_Code").html(data.row.i_Postal_Code);
    $("#view_i_Highway_Street").html(data.row.i_Highway_Street);
    $("#view_i_At_Intersection").html(data.row.i_At_Intersection);
    $("#view_i_Mile_Marker").html(data.row.i_Mile_Marker);
    $("#view_i_Date").html(data.row.i_Date);
    $("#view_i_Time").html(data.row.i_Time);
    $("#view_i_Photo_Taken_By").html(data.row.i_Photo_Taken_By);
    $("#view_i_Reported").html(data.row.i_Reported);
    $("#view_i_Police_Department").html(data.row.i_Police_Department);
    $("#view_i_Officer_Name").html(data.row.i_Officer_Name);
    $("#view_i_Police_Report_Number").html(data.row.i_Police_Report_Number);
    $("#view_i_Narrative").html(data.row.i_Narrative);
    $("#view_ic_Preventable").html(data.row.ic_Preventable);
}

function storePrimaryDescriptionValues() {
    
}