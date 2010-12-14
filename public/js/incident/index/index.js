$(function(){
   
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
            url: "/incident/index/get-description/",
            data: "id=" + id,
            success: function(data){
                $("#viewDescriptionDiv").html(data);
                storePrimaryDescriptionValues();
        }
    });
}

function storePrimaryDescriptionValues() {
    
}