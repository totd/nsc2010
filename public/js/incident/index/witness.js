$(function() {
    var incidentId = $("#i_ID");

    $(".WitnessAddLinkClass").each(function() {
       $(this).click(function() {
            $(".addWitnessTableClass").toggle("slow");
            return false;
        });
    });

    $("#addWitness").click(function() {
        $(this).addClass('button-updating');
        var label = $(this).html();
        $(this).html('Updating...');
        addWitness(incidentId.val());
        $(this).removeClass('button-updating');
        $(this).html(label);
    });

    getWitnesses(incidentId.val());
});


function __deleteWitness(personId, incidentId) {
    $.getJSON('/incident/witness/delete-witness',
        {
            per_id : personId
        }, function(data) {
            if (data.result == 1) {
                getWitnesses(incidentId);
                return true;
            } else {
                alert(data.errorMessage);
                return false;
            }
        }
    );
}

function deleteWitnessClickHandler(personId, incidentId) {
    var $dialogDeleteInvolvedWitness = $('<div></div>')
		.html('Do you really want to remove this witness from incident?')
		.dialog({
			autoOpen: false,
            modal: true,
            buttons: {
                "Yes": function() {
                    __deleteWitness(personId, incidentId);
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

    $dialogDeleteInvolvedWitness.dialog('open');
}

function saveWitness(personId) {
    $.getJSON("/incident/witness/save-witness",
            {
                per_id : personId,
                per_first_name : $("#per_first_name_witness_" + personId).val(),
                per_last_name : $("#per_last_name_witness_" + personId).val(),
                per_address1 : $("#per_address1_witness_" + personId).val(),
                per_address2 : $("#per_address2_witness_" + personId).val(),
                per_city : $("#per_city_witness_" + personId).val(),
                per_state_id : $("#per_state_id_witness_" + personId).val(),
                per_postal_code : $("#per_postal_code_witness_" + personId).val(),
                per_telephone_number : $("#per_telephone_number_witness_" + personId).val()
            }, function(data) {
                if (data.result == 1) {
                    refreshWitness(data.row);
                    $(".classWitnessRecordID_" + personId).toggle();
                    refreshLastModifiedDate($("#i_ID").val());
                    return true;
                } else {
                    displayWitnessSaveError(data);
                    return false;
                }
            }
    );
}

function refreshWitness(data) {
    var personId = data.per_id;

    $("#view_first_name_witness_" + personId).html(data.per_first_name);
    $("#view_last_name_witness_" + personId).html(data.per_last_name);
    $("#view_address1_witness_" + personId).html(data.per_address1);
    $("#view_address2_witness_" + personId).html(data.per_address2);
    $("#view_city_witness_" + personId).html(data.per_city);
    $("#view_s_name_witness_" + personId).html(data.s_name);
    $("#view_postal_code_witness_" + personId).html(data.per_postal_code);
    $("#view_telephone_number_witness_" + personId).html(data.per_telephone_number);


    $("#per_first_name_witness_" + personId).val(data.per_first_name);
    $("#per_last_name_witness_" + personId).val(data.per_last_name);
    $("#per_address1_witness_" + personId).val(data.per_address1);
    $("#per_address2_witness_" + personId).val(data.per_address2);
    $("#per_city_witness_" + personId).val(data.per_city);
    $("#per_state_id_witness_" + personId).val(data.per_state_id);
    $("#per_postal_code_witness_" + personId).val(data.per_postal_code);
    $("#per_telephone_number_witness_" + personId).val(data.per_telephone_number);
}

function isset(variable) {
    return typeof(variable) != "undefined" && variable !== null;
}


function addWitness(incidentId) {
    $.getJSON("/incident/witness/add-witness",
        {
            i_ID: incidentId,
            per_first_name : $("#per_first_name_witness").val(),
            per_last_name : $("#per_last_name_witness").val(),
            per_address1 : $("#per_address1_witness").val(),
            per_address2 : $("#per_address2_witness").val(),
            per_city : $("#per_city_witness").val(),
            per_state_id : $("#per_state_id_witness").val(),
            per_postal_code : $("#per_postal_code_witness").val(),
            per_telephone_number : $("#per_telephone_number_witness").val()
        }, function(data) {
                if (data.result == 1) {
                    $(".addWitnessTableClass").toggle("slow");
                    getWitnesses(incidentId);
                    clearAddWitnessForm();
                    refreshLastModifiedDate($("#i_ID").val());
                    return true;
                } else {
                    displayWitnessSaveError(data);
                    return false;
                }
       });
}

function displayWitnessSaveError(data) {
    var $dialog = $('<div></div>')
                .html(data.errorMessage)
                .dialog({
                    autoOpen: false,
                    title: 'Witness save error!',
                    minHeight: 13,
                    modal: true
                });
                $dialog.dialog('open');
}

function getWitnesses(incidentId) {
    $.ajax({
            type: "GET",
            url: "/incident/witness/get-witnesses",
            data: "incidentId=" + incidentId,
            success: function(data){
                $("#currentIncidentWitnessesList").html(data.result);
                turnOnCityPersonAutocomplete();
                turnOnZipPersonAutocomplete();
                turnOnLastNamePersonAutocomplete();
                turnOnFirstNamePersonAutocomplete();
                turnOnAddress1PersonAutocomplete();
                turnOnAddress2PersonAutocomplete();
                turnOnTelephonePersonAutocomplete();
            }, 
            dataType : "json"

    });
}

function clearAddWitnessForm() {
    $("#per_first_name_witness").val("");
    $("#per_last_name_witness").val("");
    $("#per_address1_witness").val("");
    $("#per_address2_witness").val("");
    $("#per_city_witness").val("");
    $("#per_state_id_witness").val("");
    $("#per_postal_code_witness").val("");
    $("#per_telephone_number_witness").val("");
}


