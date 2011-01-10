$(function() {

    var equipmentId = $("#e_id");
   

    $(".MaintenanceAddLinkClass").each(function() {
       $(this).click(function() {
            $(".addMaintenanceTableClass").toggle("slow");
            return false;
        });
    });

    $("#addMaintenance").click(function() {
        $(this).addClass('button-updating');
        var label = $(this).html();
        $(this).html('Updating...');
        addMaintenance(equipmentId.val());
        $(this).removeClass('button-updating');
        $(this).html(label);
    });

    getMaintenances(equipmentId.val());
});

function turnOnCalculator() {
     $('.Amount').calculator({
         showOn: 'button',
         buttonImageOnly: true,
         buttonImage: "/images/calculator.gif",
         precision: 3,
         layout:
            ['MC_7_8_9_/' + $.calculator.CLOSE, 'MR_4_5_6_*' + $.calculator.USE,
            'MS_1_2_3_-', 'M+_0_._=_+']
     });
}



function __deleteMaintenance(maintenanceId, equipmentId) {
    $.getJSON('/equipment/maintenance/delete-maintenance',
        {
            em_id : maintenanceId
        }, function(data) {
            if (data.result == 1) {
                getMaintenances(equipmentId);
                return true;
            } else {
                alert(data.errorMessage);
                return false;
            }
        }
    );
}

function turnOnDatepicker() {
    $(".maintenanceDate").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: '-10:+10',
        showOn: 'button',
        buttonImage: "/images/select-data.gif",
        buttonImageOnly: true
    });
}

function deleteMaintenanceClickHandler(maintenanceId, equipmentId) {
    var $dialogDeleteInvolvedMaintenance = $('<div></div>')
		.html('Do you really want to remove this maintenance from equipment?')
		.dialog({
			autoOpen: false,
            modal: true,
            buttons: {
                "Yes": function() {
                    __deleteMaintenance(maintenanceId, equipmentId);
                    $(this).dialog("close");
                },
                "No": function() {
                    $(this).dialog("close");
                }
            },
            resizable: false,
			title: 'Confirm Equipment Delete'
		}
    );

    $dialogDeleteInvolvedMaintenance.dialog('open');
}

function saveMaintenance(maintenanceId, equipmentId) {
    $.getJSON("/equipment/maintenance/save-maintenance",
            {
                em_id : maintenanceId,
                em_equipment_id: equipmentId,
                em_requested_date : $("#em_requested_date_" + maintenanceId).val(),
                em_completed_date : $("#em_completed_date_" + maintenanceId).val(),
                em_next_maintenance_date : $("#em_next_maintenance_date_" + maintenanceId).val(),
                em_service_date : $("#em_service_date_" + maintenanceId).val(),
                em_service_provider_id : $("#em_service_provider_id_" + maintenanceId).val(),
                per_state_id : $("#per_state_id_maintenance_" + maintenanceId).val(),
                em_invoice_amount : $("#em_invoice_amount_" + maintenanceId).val(),
                em_notes : $("#em_notes_" + maintenanceId).val(),
                em_dot_regulated : $(".DOTreported_" + maintenanceId + ":checked").val()
            }, function(data) {
                if (data.result == 1) {
                    refreshMaintenance(data.row);
                    getMaintenances(equipmentId);
                    $(".classMaintenanceRecordID_" + maintenanceId).toggle();
                    refreshLastModifiedDate($("#e_id").val());
                    return true;
                } else {
                    displayMaintenanceSaveError(data);
                    return false;
                }
            }
    );
}

function refreshMaintenance(data) {
    var personId = data.per_id;

    $("#view_first_name_maintenance_" + personId).html(data.per_first_name);
    $("#view_last_name_maintenance_" + personId).html(data.per_last_name);
    $("#view_address1_maintenance_" + personId).html(data.per_address1);
    $("#view_address2_maintenance_" + personId).html(data.per_address2);
    $("#view_city_maintenance_" + personId).html(data.per_city);
    $("#view_s_name_maintenance_" + personId).html(data.s_name);
    $("#view_postal_code_maintenance_" + personId).html(data.per_postal_code);
    $("#view_telephone_number_maintenance_" + personId).html(data.per_telephone_number);


    $("#per_first_name_maintenance_" + personId).val(data.per_first_name);
    $("#per_last_name_maintenance_" + personId).val(data.per_last_name);
    $("#per_address1_maintenance_" + personId).val(data.per_address1);
    $("#per_address2_maintenance_" + personId).val(data.per_address2);
    $("#per_city_maintenance_" + personId).val(data.per_city);
    $("#per_state_id_maintenance_" + personId).val(data.per_state_id);
    $("#per_postal_code_maintenance_" + personId).val(data.per_postal_code);
    $("#per_telephone_number_maintenance_" + personId).val(data.per_telephone_number);
}

function isset(variable) {
    return typeof(variable) != "undefined" && variable !== null;
}


function addMaintenance(equipmentId) {
    $.getJSON("/equipment/maintenance/add-maintenance",
        {
            em_equipment_id: equipmentId,
            em_requested_date : $("#em_requested_date").val(),
            em_completed_date : $("#em_completed_date").val(),
            em_next_maintenance_date : $("#em_next_maintenance_date").val(),
            em_service_date : $("#em_service_date").val(),
            em_service_provider_id : $("#em_service_provider_id").val(),
            per_state_id : $("#per_state_id_maintenance").val(),
            em_invoice_amount : $("#em_invoice_amount").val(),
            em_notes : $("#em_notes").val(),
            em_dot_regulated : $(".DOTreported:checked").val()
        }, function(data) {
                if (data.result == 1) {
                    $(".addMaintenanceTableClass").toggle("slow");
                    getMaintenances(equipmentId);
                    clearAddMaintenanceForm();
                    refreshLastModifiedDate($("#e_id").val());
                    return true;
                } else {
                    displayMaintenanceSaveError(data);
                    return false;
                }
       });
}

function displayMaintenanceSaveError(data) {
    var $dialog = $('<div></div>')
                .html(data.errorMessage)
                .dialog({
                    autoOpen: false,
                    title: 'Maintenance save error!',
                    minHeight: 13,
                    modal: true
                });
                $dialog.dialog('open');
}

function getMaintenances(equipmentId) {
    $.ajax({
            type: "GET",
            url: "/equipment/maintenance/get-maintenances",
            data: "equipmentId=" + equipmentId,
            success: function(data){
                $("#currentEquipmentMaintenancesList").html(data.result);
                turnOnDatepicker();
                turnOnCalculator();
            }, 
            dataType : "json"

    });
}

function clearAddMaintenanceForm() {
    $("#em_requested_date").val("")
    $("#em_completed_date").val(""),
    $("#em_next_maintenance_date").val(""),
    $("#em_service_date").val(""),
    $("#em_service_provider_id").val(""),
    $("#per_state_id_maintenance").val(""),
    $("#em_invoice_amount").val(""),
    $("#em_notes").val(""),
    $("#em_dot_regulated_no").attr('checked', 'checked');
}


