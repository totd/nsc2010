function empty (param) {
    if (param === "" || param === 0 ||  param === "0" ||  param === null ||  param === false 
        || typeof mixed_var === 'undefined') {
        return true;
    }

    return false;
}

function submitSearchParameters() {
    $("#violationListParameters").submit();
}

function setHiddenFieldFromUrlQuery(id, url) {
    $("#" + id).val($.url.setUrl(url).param(id));
}


$(function() {
    $("#prevViolations").click(function() {
        url = $("#prevViolations").attr("href");
        $("#prevViolations").attr("href", "");
        setHiddenFieldFromUrlQuery("from", url);
        setHiddenFieldFromUrlQuery("step", url);
        submitSearchParameters();
    });

    $("#nextViolations").click(function() {
        url = $("#nextViolations").attr("href");
        $("#nextViolations").attr("href", "");
        setHiddenFieldFromUrlQuery("from", url);
        setHiddenFieldFromUrlQuery("step", url);
        submitSearchParameters();
    });

    if (!empty($("#from").val())) {
        $.url.param("from", $("#from").val());
    }

    if (!empty($("#step").val())) {
        $.url.param("step", $("#step").val());
    }

    $("#Status").change(function() {
        submitSearchParameters();
    });

    /**
     * Set for each column's header click heandler to implemnt order list by column.
     */
    $("tr.table-title td").each(function(column){
        $(this).click(function() {
            var columnName = this.id;
            if (columnName != "action") {
                if ($("#orderBy").val() == columnName) {
                    if ($("#orderWay").val() == "ASC") {
                        $("#orderWay").val("DESC");
                    } else if ($("#orderWay").val() == "DESC") {
                        $("#orderWay").val("ASC");
                    }
                } else {
                    $("#orderWay").val("ASC");
                }

                $("#orderBy").val(columnName);
                
                submitSearchParameters();
            }
        });
        
    });

});


