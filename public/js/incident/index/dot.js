DotCriteria = new Object();
DotCriteria.id = new Object();
DotCriteria.className = new Object();

$(function() {
   refreshDotCriteria($("#i_ID").val());
});

function saveDotCriteria(incidentId) {
    $.getJSON('/incident/dot/save-dot-criteria',
        {
            i_ID : incidentId,
            i_fatality : $(".fatalityRadioButtonClass:checked").val(),
            i_injuries : $(".injuriesRadioButtonClass:checked").val(),
            i_towed : $(".towedRadioButtonClass:checked").val(),
            i_citation : $(".citationRadioButtonClass:checked").val()
        },
        function(data) {
            if (data.result == 1) {
                refreshDotCriteria($("#i_ID").val());
                $('.dotIncidentClass').toggle('slow');
                refreshLastModifiedDate($("#i_ID").val());
                return true;
            } else {
                displayDotSaveError(data);
                return false;
            }
        }
    );
}

function refreshDotCriteria(incidentId) {
    $.getJSON('/incident/dot/get-dot-criteria',
        {
            incidentId : incidentId
        }, function(data) {
           if (data.result == 1) {
               $("#dotIncidentDiv").html(data.markup);
               storePrimaryDotCriteriaValues();
               return true;
           } else {
               displayDotSaveError(data);
               return false;
           }
        });
}

function storePrimaryDotCriteriaValues() {
    DotCriteria.className.fatalityRadioButtonClass = $(".fatalityRadioButtonClass:checked").val();
    DotCriteria.className.injuriesRadioButtonClass = $(".injuriesRadioButtonClass:checked").val();
    DotCriteria.className.towedRadioButtonClass = $(".towedRadioButtonClass:checked").val();
    DotCriteria.className.citationRadioButtonClass = $(".citationRadioButtonClass:checked").val();
}

function restoreDotCriteriaValues() {
    if ($("#updateDotIncident").css('display') != 'none') {
        for(key in DotCriteria.className) {
            selector = "." + key;
            $(selector).each(function(){
                if ($(this).val() == DotCriteria.className[key]) {
                    $(this).attr('checked', 'checked');
                }
            });
        }
    }
}

function displayDotSaveError(data) {
    var $dialog = $('<div></div>')
        .html(data.errorMessage)
        .dialog({
            autoOpen: false,
            title: 'Dot save error!',
            minHeight: 13,
            modal: true
        });
        $dialog.dialog('open');
}
