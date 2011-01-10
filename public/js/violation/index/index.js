Violation = new Object();
Violation.id = new Object();
Violation.className = new Object();

$(function() {
   storePrimaryViolationValues();

   var $dialogExit = $('<div></div>')
		.html("Leaving without saving will discard all changes!")
		.dialog({
			autoOpen: false,
            modal: true,
            buttons: {
                "Yes": function() {
                    $(this).dialog("close");
                    window.location = "/violation/list" ;
                },
                "No": function() {
                    $(this).dialog("close");
                }
            },
            resizable: false,
			title: 'Attention!'
		}

    );

    $("#exitEditViolationButton").click(function() {
        if (compareValues(Violation)) {
            window.location = "/violation/list" ;
        } else {
            $dialogExit.dialog("open");
        }
    });

    $("#saveEditViolationButton").click(function() {
       saveViolation();
    });


});

function compareValues(comparedObject) {
    var result = true;
    var selector;
    var key;
    for (key in comparedObject.id) {
        selector = "#" + key;
        if (comparedObject.id[key] != $(selector).val()) {
            result = false;
            break;
        }
    }

    for (key in comparedObject.className) {
        selector = "." + key;
        $(selector).each(function(){
            if ($(this).val() != comparedObject.className[key] && ($(this).attr('checked') == 'checked' || $(this).attr('checked'))) {
                result = false;
            }
        });

    }

    return result;
}

function storePrimaryViolationValues() {
    Violation.id.v_code = $("#v_code").val();
    Violation.className.v_type_class = $(".v_type_class:checked").val();
    Violation.id.v_item = $("#v_item").val();
    Violation.id.v_item_specific = $("#v_item_specific").val();
}

function displayViolationSaveError(data) {
    var $dialog = $('<div></div>')
        .html(data.errorMessage)
        .dialog({
            autoOpen: false,
            title: 'Violation save error!',
            minHeight: 13,
            modal: true
        });
        $dialog.dialog('open');
}

function saveViolation() {
    $.getJSON("/violation/index/save",
            {
                v_id : $("#v_id").val(),
                v_code : $("#v_code").val(),
                v_type : $(".v_type_class:checked").val(),
                v_item : $("#v_item").val(),
                v_item_specific : $("#v_item_specific").val()
            }, function(data) {
                if (data.result == 1) {
                    window.location = "/violation/list" ;
                    return true;
                } else {
                    displayViolationSaveError(data);
                    return false;
                }
            }
    );
}

