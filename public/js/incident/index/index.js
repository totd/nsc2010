$(function(){
    refreshIncidentDescription($("#i_ID").val());
    refreshIncidentDescriptionUpdate($("#i_ID").val());
    
    $(".DescriptionActionLink").each(function() {
       $(this).click(function() {
            $(".DescriptionDiv").toggle("slow");
        });
    });
});


function hideDescription() {
    $(".DescriptionDiv").toggle("slow");
}

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
            },
            dataType: "json"
    });
}

function refreshIncidentDescriptionUpdate(id) {
    $.ajax({
       type: "GET",
       url: "/incident/index/get-description-update",
       data: "id=" + id,
       success: function(data) {
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
    $("#i_Reported").val(data.row.i_Reported);
    $("#i_Police_Department").val(data.row.i_Police_Department);
    $("#i_Officer_Name").val(data.row.i_Officer_Name);
    $("#i_Police_Report_Number").val(data.row.i_Police_Report_Number);
    $("#i_Narrative").val(data.row.i_Narrative);
    $("#ic_Preventable").val(data.row.ic_Preventable);
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