$(function() {
    var incidentId = $("#i_ID");

    $(".PassengerAddLinkClass").each(function() {
       $(this).click(function() {
            $(".addPassengerTableClass").toggle("slow");
            return false;
        });
    });

    $("#addPassenger").click(function() {
        $(this).addClass('button-updating');
        var label = $(this).html();
        $(this).html('Updating...');
        addPassenger(incidentId.val());
        $(this).removeClass('button-updating');
        $(this).html(label);
    });

    getPassengers(incidentId.val());
});


function __deletePassenger(personId, incidentId) {
    $.getJSON('/incident/passenger/delete-passenger',
        {
            per_id : personId
        }, function(data) {
            if (data.result == 1) {
                getPassengers(incidentId);
                return true;
            } else {
                alert(data.error);
                return false;
            }
        }
    );
}

function deletePassengerClickHandler(personId, incidentId) {
    var $dialogDeleteInvolvedPassenger = $('<div></div>')
		.html('Do you really want to remove this passenger from incident?')
		.dialog({
			autoOpen: false,
            modal: true,
            buttons: {
                "Yes": function() {
                    __deletePassenger(personId, incidentId);
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

    $dialogDeleteInvolvedPassenger.dialog('open');
}

function clearAddPassengerForm() {
    $("#per_first_name_passenger").val("");
    $("#per_last_name_passenger").val("");
    $("#per_address1_passenger").val("");
    $("#per_address2_passenger").val("");
    $("#per_city_passenger").val("");
    $("#per_state_id_passenger").val("");
    $("#per_postal_code_passenger").val("");
    $("#per_telephone_number_passenger").val("");
}

function savePassenger(personId) {
    $.getJSON("/incident/passenger/save-passenger",
            {
                per_id : personId,
                per_first_name : $("#per_first_name_passenger_" + personId).val(),
                per_last_name : $("#per_last_name_passenger_" + personId).val(),
                per_address1 : $("#per_address1_passenger_" + personId).val(),
                per_address2 : $("#per_address2_passenger_" + personId).val(),
                per_city : $("#per_city_passenger_" + personId).val(),
                per_state_id : $("#per_state_id_passenger_" + personId).val(),
                per_postal_code : $("#per_postal_code_passenger_" + personId).val(),
                per_telephone_number : $("#per_telephone_number_passenger_" + personId).val()
            }, function(data) {
                if (data.result == 1) {
                    refreshPassenger(data.row);
                    $(".classPassengerRecordID_" + personId).toggle();
                    refreshLastModifiedDate($("#i_ID").val());
                    return true;
                } else {
                    displayPassengerSaveError(data);
                    return false;
                }
            }
    );
}

function refreshPassenger(data) {
    var personId = data.per_id;

    $("#view_first_name_passenger_" + personId).html(data.per_first_name);
    $("#view_last_name_passenger_" + personId).html(data.per_last_name);
    $("#view_address1_passenger_" + personId).html(data.per_address1);
    $("#view_address2_passenger_" + personId).html(data.per_address2);
    $("#view_city_passenger_" + personId).html(data.per_city);
    $("#view_s_name_passenger_" + personId).html(data.s_name);
    $("#view_postal_code_passenger_" + personId).html(data.per_postal_code);
    $("#view_telephone_number_passenger_" + personId).html(data.per_telephone_number);


    $("#per_first_name_passenger_" + personId).val(data.per_first_name);
    $("#per_last_name_passenger_" + personId).val(data.per_last_name);
    $("#per_address1_passenger_" + personId).val(data.per_address1);
    $("#per_address2_passenger_" + personId).val(data.per_address2);
    $("#per_city_passenger_" + personId).val(data.per_city);
    $("#per_state_id_passenger_" + personId).val(data.per_state_id);
    $("#per_postal_code_passenger_" + personId).val(data.per_postal_code);
    $("#per_telephone_number_passenger_" + personId).val(data.per_telephone_number);
}

function isset(variable) {
    return typeof(variable) != "undefined" && variable !== null;
}


function addPassenger(incidentId) {
    $.getJSON("/incident/passenger/add-passenger",
        {
            i_ID: incidentId,
            per_first_name : $("#per_first_name_passenger").val(),
            per_last_name : $("#per_last_name_passenger").val(),
            per_address1 : $("#per_address1_passenger").val(),
            per_address2 : $("#per_address2_passenger").val(),
            per_city : $("#per_city_passenger").val(),
            per_state_id : $("#per_state_id_passenger").val(),
            per_postal_code : $("#per_postal_code_passenger").val(),
            per_telephone_number : $("#per_telephone_number_passenger").val()
        }, function(data) {
            if (data.result == 1) {
                $(".addPassengerTableClass").toggle("slow");
                getPassengers(incidentId);
                clearAddPassengerForm();
                refreshLastModifiedDate($("#i_ID").val());
                return true;
            } else {
                displayPassengerSaveError(data);
                return false;
            }
       });
}

function displayPassengerSaveError(data) {
    var $dialog = $('<div></div>')
        .html(data.errorMessage)
        .dialog({
            autoOpen: false,
            title: 'Passenger save error!',
            minHeight: 13,
            modal: true
        });
        $dialog.dialog('open');
}

function getPassengers(incidentId) {
    $.ajax({
            type: "GET",
            url: "/incident/passenger/get-passengers",
            data: "incidentId=" + incidentId,
            success: function(data){
                $("#currentIncidentPassengersList").html(data.result);
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



