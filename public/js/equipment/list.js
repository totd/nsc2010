function submitSearchParameters() {
    document.getElementById("searchParameters").submit();
}

function setHiddenFieldFromUrlQuery(id, url) {
    $("#" + id).val(jQuery.url.setUrl(url).param(id));
}


$(document).ready(function() {
    $("#prevEquipments").click(function(){
        url = $("#prevEquipments").attr("href");
        $("#prevEquipments").attr("href", "");
        setHiddenFieldFromUrlQuery("from", url);
        setHiddenFieldFromUrlQuery("step", url);
        submitSearchParameters();
    });

    $("#nextEquipments").click(function(){
        url = $("#nextEquipments").attr("href");
        $("#nextEquipments").attr("href", "");
        setHiddenFieldFromUrlQuery("from", url);
        setHiddenFieldFromUrlQuery("step", url);
        submitSearchParameters();
    });

});


