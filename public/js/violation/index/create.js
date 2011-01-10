$(function() {
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

    $("#exitCreateViolationButton").click(function() {
        if ($("#v_item").val() == "" &&  $("#v_item_specific").val() == "" &&  $("#v_code").val() == "") {
            window.location = "/violation/list" ;
        } else {
            $dialogExit.dialog("open");
        }
    });

    $("#saveCreateViolationButton").click(function() {
       saveViolation();
    });


});

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

