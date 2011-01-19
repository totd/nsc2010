$(function() {
    spId = $("#sp_id");
    Sp = new Object();

    refreshSpInformation(spId.val());

    $(".informationActionLink").each(function() {
       $(this).click(function() {
            $(".informationDiv").toggle("slow");
            return false;
        });
    });

    $("#saveInformationLink").click(function() {
        saveSpInformationClick();
    });
});

function storePrimarySpInformationValues(data) {
    Sp = data;
}

function toogleRepairDiv(type) {
    if (type == 'Repair') {
        $("#repairType").css('display', 'inline');
    } else {
        $("#repairType").css('display', 'none');
    }
}

function restoreType() {
    $(".sp_type_class").each(function(){
        if ($(this).val() == Sp.sp_type) {
            $(this).attr('checked', 'checked');
        }
    });
}

function deleteLinksEquipmentMaintenances() {
    $.ajax({
            url : '/maintenance/maintenance/delete-sp-from-maintenances/',
            data : "spId=" + $("#sp_id").val(),
            type : 'GET',
            dataType : 'json',
            success : function(data) {
                if (data.result == 1) {
                    getMaintenances($("#sp_id").val());
                    saveSpInformation();
                    return true;
                } else {
                    displayError(data, 'Error during deleting links with maintenances');
                    return false;
                }
            }
        });
}

function saveSpInformationClick() {
   if (Sp.sp_type == 'Repair' && Sp.sp_type != $(".sp_type_class:checked").val() && 
            Sp.assignment_maintenances_count != 0) {
            var $dialogConfirmChangeType = $('<div></div>')
                .html('Changing the type of Service Provider will result to deleting all links with associated equipment maintenance. Do you want to proceed?')
                .dialog({
                    autoOpen: false,
                    modal: true,
                    buttons: {
                        "Yes": function() {
                            $(this).dialog("close");
                            deleteLinksEquipmentMaintenances();
                        },
                        "No": function() {
                            $(this).dialog("close");
                            restoreType();
                        }
                    },
                    resizable: false,
                    title: 'Confirm Change Type'
                }
            );

            $dialogConfirmChangeType.dialog('open');
   } else {
       saveSpInformation();
   }
}

function saveSpInformation() {
   $.getJSON('/serviceProvider/index/save',
        {
            sp_id : $("#sp_id").val()  ,
            sp_type : $(".sp_type_class:checked").val(),
            sp_contact : $("#sp_contact").val(),
            sp_telephone_number : $("#sp_telephone_number").val(),
            sp_fax : $("#sp_fax").val(),
            sp_dot_regulated : $(".sp_dot_regulated_class:checked").val(),
            sp_description : $("#sp_description").val(),
            sp_state_id : $("#sp_state_id").val(),
            sp_city : $("#sp_city").val(),
            sp_address1 : $("#sp_address1").val(),
            sp_address2 : $("#sp_address2").val(),
            sp_postal_code : $("#sp_postal_code").val()
        },
        function(data) {
            if (data.result == 1) {
                storePrimarySpInformationValues(data.row);
                fillInformation(data.row);
                fillLastModifiedDate(data.row.sp_last_modified_datetime);
                toogleRepairDiv(data.row.sp_type);
                
                $(".informationDiv").toggle("slow");
            } else {
                displayError(data, 'Save information error!');
            }
        }
   );
}

function refreshSpInformation(id) {
    $.getJSON('/serviceProvider/index/get-information',
        {
            sp_id : id
        },
        function(data) {
            if (data.result == 1) {
                storePrimarySpInformationValues(data.row);
                fillInformation(data.row);
                fillLastModifiedDate(data.row.sp_last_modified_datetime);
            } else {
                displayError(data, 'Get information error!');
            }
        }
    );
}

function displayError(data, title) {
    var $dialog = $('<div></div>')
        .html(data.errorMessage)
        .dialog({
            autoOpen: false,
            title: title,
            minHeight: 13,
            modal: true
        });
        $dialog.dialog('open');
}

function fillInformation(data) {
    $("#sp_name").html(data.sp_name);
    $("#sp_status").html(data.sp_status);
    $("#sp_entry_date").html(data.sp_entry_date);

    $("#sp_type_view").html(data.sp_type);
    $("#sp_contact_view").html(data.sp_contact);
    $("#sp_telephone_number_view").html(data.sp_telephone_number);
    $("#sp_fax_view").html(data.sp_fax);
    $("#sp_dot_regulated_view").html(data.sp_dot_regulated);
    $("#sp_description_view").html(data.sp_description);
    $("#sp_state_view").html(data.s_name);
    $("#sp_city_view").html(data.sp_city);
    $("#sp_address1_view").html(data.sp_address1);
    $("#sp_address2_view").html(data.sp_address2);
    $("#sp_postal_code_view").html(data.sp_postal_code);

    if (data.all_required_fields_filled === true) {
        $(".informationSecondTable").attr('class', 'inform informationSecondTable status-ok');
    } else {
        $(".informationSecondTable").attr('class', 'inform informationSecondTable status-warning');
    }


    $(".sp_type_class").each(function() {
        if ($(this).val() == data.sp_type) {
            $(this).attr('checked', 'checked');
        }
    });
    $("#sp_contact").val(data.sp_contact);
    $("#sp_telephone_number").val(data.sp_telephone_number);
    $("#sp_fax").val(data.sp_fax);
    $(".sp_dot_regulated_class").each(function() {
        if($(this).val() == data.sp_dot_regulated) {
            $(this).attr('checked', 'checked');
        }
    });
    $("#sp_description").val(data.sp_description);
    $("#sp_state_id").val(data.sp_state_id);
    $("#sp_city").val(data.sp_city);
    $("#sp_address1").val(data.sp_address1);
    $("#sp_address2").val(data.sp_address2);
    $("#sp_postal_code").val(data.sp_postal_code);
    
}

function refreshLastModifiedDate(spId) {
    $.getJSON("/serviceProvider/index/get-last-modified-date/",
        {
            sp_id : spId
        },
        function(data){
            fillLastModifiedDate(data.last_modified_date);
        }
    );
}

function fillLastModifiedDate(dateString) {
    $("#last_modified_datetime").html(dateString);
}
