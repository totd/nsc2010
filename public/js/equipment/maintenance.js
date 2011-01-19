$(function() {

    var equipmentId = $("#e_id");
   
    getMaintenances(equipmentId.val());
});

function maintenanceAddLinkClassClickHeandler() {
    $(".addMaintenanceTableClass").toggle("slow");
}

function addMaintenanceClick() {
    $(this).addClass('button-updating');
    var label = $(this).html();
    $(this).html('Updating...');
    addMaintenance($("#e_id").val());
    $(this).removeClass('button-updating');
    $(this).html(label);
}

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
    $.getJSON('/maintenance/maintenance/delete-maintenance',
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
		.html('Do you really want to remove this maintenance?')
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
			title: 'Confirm Maintenance Delete'
		}
    );

    $dialogDeleteInvolvedMaintenance.dialog('open');
}

function saveMaintenance(maintenanceId, equipmentId) {
    $.getJSON("/maintenance/maintenance/save-maintenance",
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
                    $(".classMaintenanceRecordID_" + maintenanceId).toggle('slow');
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
    var maintenanceId = data.em_id;

    $("#view_em_requested_date_" + maintenanceId).html(data.em_requested_date);
    $("#view_em_completed_date_" + maintenanceId).html(data.em_completed_date);
    $("#view_em_next_maintenance_date_" + maintenanceId).html(data.em_next_maintenance_date);
    $("#view_em_completed_date_" + maintenanceId).html(data.em_completed_date);
    $("#view_em_service_provider_id_" + maintenanceId).html(data.sp_name);
    $("#view_em_invoice_amount_" + maintenanceId).html(data.em_invoice_amount);
    $("#view_em_dot_regulated_" + maintenanceId).html(data.em_dot_regulated);
    $("#view_em_notes_" + maintenanceId).html(data.em_notes);


    $("#em_requested_date_" + maintenanceId).val(data.em_requested_date);
    $("#em_completed_date_" + maintenanceId).val(data.em_completed_date);
    $("#em_next_maintenance_date_" + maintenanceId).val(data.em_next_maintenance_date);
    $("#em_completed_date_" + maintenanceId).val(data.em_completed_date);
    $("#em_service_provider_id_" + maintenanceId).val(data.em_service_provider_id);
    $("#em_invoice_amount_" + maintenanceId).val(data.em_invoice_amount);
    $("#em_dot_regulated_" + maintenanceId).val(data.em_dot_regulated);
    $("#em_notes_" + maintenanceId).val(data.em_notes);
}

function isset(variable) {
    return typeof(variable) != "undefined" && variable !== null;
}


function addMaintenance(equipmentId) {
    $.getJSON("/maintenance/maintenance/add-equipment-maintenance",
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
            url: "/maintenance/maintenance/get-equipment-maintenances",
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
    $("#em_invoice_amount").val(""),
    $("#em_notes").val(""),
    $("#em_dot_regulated_no").attr('checked', 'checked');
}


