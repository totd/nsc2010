
function driver_last_saved(d_ID) {
        $.get("/driver/Driver/ajax-Driver-Last-Saved/",
        {
            d_ID: d_ID
        }, function(data){
                document.getElementById("last_saved").innerHTML="Last saved: "+data;
                return true;
           });
}

function exit(url){
    var $dialog = $('<div></div>')
            .html("Leaving without saving will discard all changes!")
            .dialog({
                autoOpen: false,
                title: 'Exit',
                minHeight: 13,
                draggable:false,
                resizable:false,
                buttons: [
                    {
                        text: "Cancel",
                        click: function() { $(this).dialog("close"); }
                    },
                    {
                        text: "Exit",
                        click: function() { setTimeout('window.location = "'+url+'"', 0); }
                    }
                ]
            });
    $dialog.dialog('open');
    
}

/**  Driver profile blocks validation
 * (Application Information, Driver Information, Driver Addresses, Commercial Driver's Licenses, Equipment Operated,
 * Employment History, Hours Of Service In Previous 7 Days)
**/

function validate_application_information(Driver_ID){
    var message;
    $.get("/driver/Driver/ajax-driver-information-validation/",
        {
            Driver_ID: Driver_ID
        }, function(data){
            if(data!=1){
                message = data;
                $("#status_application_information").attr("class","status-warning");
                $("#status_application_information").attr("title",message);

                $('#status_application_information').simpletip({
                    content:message,
                    showEffect:"fade",
                    hideEffect:"fade",
                    position:$('#status_application_information')
                });
            }else{
                message = "Everything is Ok.!"
                $("#status_application_information").attr("class","status-ok");
                $("#status_application_information").attr("title",message);

                $('#status_application_information').simpletip({
                    content:message,
                    showEffect:"fade",
                    hideEffect:"fade",
                    position:$('#status_application_information')
                });
            }
        });
}

function validate_employment_history(Driver_ID){
    var message;
    $.get("/driver/Driver/ajax-Driver-Employment-History-Validation/",
        {
            Driver_ID: Driver_ID
        }, function(data){
            if(data!=1){
                $("#status_employment_history").attr("class","status-warning");
                $("#status_employment_history").attr("title","Please, fill driver employment history for at least 3 years!");

                $('#status_employment_history').simpletip({
                    content:"Please, fill driver employment history for at least 3 years!",
                    showEffect:"fade",
                    hideEffect:"fade",
                    position:$('#status_employment_history')
                });
            }else{
                message = "Everything is Ok.!"
                $("#status_employment_history").attr("class","status-ok");
                $("#status_employment_history").attr("title",message);

                $('#status_employment_history').simpletip({
                    content:message,
                    showEffect:"fade",
                    hideEffect:"fade",
                    position:$('#status_employment_history')
                });
            }
        });
}
function validate_address_history(Driver_ID){
    var message;
    $.get("/driver/Driver/ajax-Driver-Address-History-Validation/",
        {
            Driver_ID: Driver_ID
        }, function(data){
            if(data!=1){
                $("#status_address_history").attr("class","status-warning");
                $("#status_address_history").attr("title","Please, fill driver address history for at least 3 years!");

                $('#status_address_history').simpletip({
                    content:"Please, fill driver address history for at least 3 years!",
                    showEffect:"fade",
                    hideEffect:"fade",
                    position:$('#status_address_history')
                });
            }else{
                message = "Everything is Ok.!"
                $("#status_address_history").attr("class","status-ok");
                $("#status_address_history").attr("title",message);

                $('#status_address_history').simpletip({
                    content:message,
                    showEffect:"fade",
                    hideEffect:"fade",
                    position:$('#status_address_history')
                });
            }
        });
}
function validate_cdl(Driver_ID){
    var message;
    $.get("/driver/Driver/ajax-Driver-Cdl-Validation/",
        {
            Driver_ID: Driver_ID
        }, function(data){
            if(data!=1){
                $("#status_cdl_history").attr("class","status-warning");
                $("#status_cdl_history").attr("title","Please, fill driver's commercial licenses history for at least 3 years!");

                $('#status_address_history').simpletip({
                    content:"Please, fill driver's commercial licenses history for at least 3 years!",
                    showEffect:"fade",
                    hideEffect:"fade",
                    position:$('#status_address_history')
                });
            }else{
                message = "Everything is Ok.!"
                $("#status_cdl_history").attr("class","status-ok");
                $("#status_cdl_history").attr("title",message);

                $('#status_cdl_history').simpletip({
                    content:message,
                    showEffect:"fade",
                    hideEffect:"fade",
                    position:$('#status_cdl_history')
                });
            }
        });
}
function validate_equipment_operated(Driver_ID){
    var message;
    $.get("/driver/Driver/ajax-Driver-Equipment-Operated-Validation/",
        {
            Driver_ID: Driver_ID
        }, function(data){
            if(data==1){
                message = "Everything is Ok.!"
                $("#status_equipment_operated_history").attr("class","status-ok");
                $("#status_equipment_operated_history").attr("title",message);

                $('#status_equipment_operated_history').simpletip({
                    content:message,
                    showEffect:"fade",
                    hideEffect:"fade",
                    position:$('#status_address_history')
                });

            }else{// TODO: do nothing;
            }
        });
}
function validate_HoS(Driver_ID){
    var message;
    $.get("/driver/Driver/ajax-Driver-Hos-Validation/",
        {
            Driver_ID: Driver_ID
        }, function(data){
            if(data==1){
                message = "Everything is Ok.!"
                $("#status_hos").attr("class","status-ok");
                $("#status_hos").attr("title",message);

                $('#status_hos').simpletip({
                    content:message,
                    showEffect:"fade",
                    hideEffect:"fade",
                    position:$('#status_hos')
                });

            }else{// TODO: do nothing;
            }
        });
}



function validate_driver_profile(d_ID){
    validate_application_information(d_ID);
    validate_employment_history(d_ID);
    validate_address_history(d_ID);
    validate_cdl(d_ID);
    validate_equipment_operated(d_ID);
    validate_HoS(d_ID);
}