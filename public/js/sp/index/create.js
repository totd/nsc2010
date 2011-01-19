$(function() {
   var $dialogExit = $('<div></div>')
		.html("Leaving without saving will discard all changes!")
		.dialog({
			autoOpen: false,
            modal: true,
            buttons: {
                "Yes": function() {
                    $(this).dialog("close");
                    window.location = "/serviceProvider/list" ;
                },
                "No": function() {
                    $(this).dialog("close");
                }
            },
            resizable: false,
			title: 'Attention!'
		}

    );

   $("#exitSubmit").click(function() {
        if ($("#sp_name").val() == "" &&  $(".sp_type_class:checked").val() == "Repair") {
            window.location = "/serviceProvider/list" ;
        } else {
            $dialogExit.dialog("open");
        }
    });

    $("#NextSubmit").click(function() {
       saveSp();
    });
});


function saveSp() {
    $.getJSON("/serviceProvider/index/save",
            {
                sp_name : $("#sp_name").val(),
                sp_type : $(".sp_type_class:checked").val()
            }, function(data) {
                if (data.result == 1) {
                    //window.location = "/serviceProvider/list" ;
                    window.location = "/serviceProvider/index/index/id/" + data.row.sp_id ;
                    return true;
                } else {
                    displaySpSaveError(data);
                    return false;
                }
            }
    );
}

function displaySpSaveError(data) {
    var $dialog = $('<div></div>')
        .html(data.errorMessage)
        .dialog({
            autoOpen: false,
            title: 'Service Provider save error!',
            minHeight: 13,
            modal: true
        });
        $dialog.dialog('open');
}

