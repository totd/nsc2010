function empty (param) {
    if (param === "" || param === 0 ||  param === "0" ||  param === null ||  param === false 
            || typeof mixed_var === 'undefined') {
        return true;
    }

    return false;
}

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

    if (!empty($("#from").val())) {
        jQuery.url.param("from", $("#from").val());
    }

    if (!empty($("#step").val())) {
        jQuery.url.param("step", $("#step").val());
    }

});


