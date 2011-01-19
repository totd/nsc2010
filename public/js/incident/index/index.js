incidentId = new Object();
incidentStatus = new Object();
Description = new Object();
Description.id = new Object();
Description.className = new Object();
DriverInformation = new Object();
DriverInformation.id = new Object();
DriverInformation.className = new Object();

$(function(){
    incidentId = $("#i_ID");
    incidentStatus = $("#view_i_Status");

    refreshIncidentDescription(incidentId.val());
    refreshIncidentDriverInformation(incidentId.val());
    refreshIncidentAdditionalDriverInformation(incidentId.val());
    refreshLastModifiedDate(incidentId.val());

    turnOnCityPersonAutocomplete();
    turnOnZipPersonAutocomplete();
    turnOnLastNamePersonAutocomplete();
    turnOnFirstNamePersonAutocomplete();
    turnOnAddress1PersonAutocomplete();
    turnOnAddress2PersonAutocomplete();
    turnOnTelephonePersonAutocomplete();

    $(".DescriptionActionLink").each(function() {
       $(this).click(function() {
            $(".DescriptionDiv").toggle("slow");
        });
    });

    $(".DriverInformationActionLink").each(function() {
       $(this).click(function() {
            $(".DriverInformationDiv").toggle("slow");
        });
    });

    $("#i_Date").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: '-10:+10',
        showOn: 'button',
        buttonImage: "/images/select-data.gif",
        buttonImageOnly: true
    });

    $("#saveIncidentDescription").click(function() {
       saveDescription(incidentId.val()) ;
    });

    $("#saveIncidentDriverInformation").click(function() {
       saveDriverInformation(incidentId.val()) ;
    });

    $("#changeDriverButton").click(function() {
        window.location.href='/driver/index/involved-in-incident-drivers/incident_id/' + incidentId.val();
    });

    var $dialogDeleteInvolvedEquipment = $('<div></div>')
		.html('Do you really want to remove this equipment from incident?')
		.dialog({
			autoOpen: false,
            modal: true,
            buttons: {
                "Yes": function() {
                    window.location.href = "/incident/index/delete-involved-equipment/incidentId/" + incidentId.val();
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

    $("#deleteEquipmentButton").click(function() {
        $dialogDeleteInvolvedEquipment.dialog('open');
    });

    var $dialogDiscard = $('<div></div>')
		.html('Are you sure you want to discard all changes?')
		.dialog({
			autoOpen: false,
            modal: true,
            buttons: {
                "Yes": function() {
                    restoreValues();
                    $(this).dialog("close");
                },
                "No": function() {
                    $(this).dialog("close");
                }
            },
            resizable: false,
			title: 'Confirm Discard'
		}

    );
    var $dialogNoChanges = $('<div></div>')
		.html("You didn't make any changes yet")
		.dialog({
			autoOpen: false,
            modal: true,
            resizable: false,
			title: 'Attention!'
		}

    );

	$('#discardButton').click(function() {
        var anyUpdateValuesDivsOpen = false;
        $(".updateValuesClass").each(function() {
           if($(this).css('display') != 'none') {
               anyUpdateValuesDivsOpen = true;
           }
        });

        if (!anyUpdateValuesDivsOpen) {
            $dialogNoChanges.dialog('open');
        } else if (compareValues(Description) 
                    && compareValues(DriverInformation)
                    && compareValues(DotCriteria)
            ) {
            $dialogNoChanges.dialog('open');
        } else {
            $dialogDiscard.dialog('open');
        }
	});

    $("#commonSaveButton").click(function() {
        $(".saveBlockButtonClass").each(function() {
            buttonDisplay = true;

            $(this).parents().each(function() {
                if($(this).css('display') == 'none') {
                    buttonDisplay = false;
                }
            });

            if (buttonDisplay) {
                $(this).click();
            }
            
        });
    });

    var $dialogExit = $('<div></div>')
		.html("Leaving without saving will discard all changes!")
		.dialog({
			autoOpen: false,
            modal: true,
            buttons: {
                "Yes": function() {
                    $(this).dialog("close");
                    window.location = "/incident/list" ;
                },
                "No": function() {
                    $(this).dialog("close");
                }
            },
            resizable: false,
			title: 'Attention!'
		}

    );

    $(".exitIncidentProfile").click(function() {
        var anyUpdateValuesDivsOpen = false;
        $(".updateValuesClass").each(function() {
           if($(this).css('display') != 'none') {
               anyUpdateValuesDivsOpen = true;
           }
        });

        if (!anyUpdateValuesDivsOpen) {
            window.location = "/incident/list" ;
        } else if (compareValues(Description)
                    && compareValues(DriverInformation)
                    && compareValues(DotCriteria)
            ) {
            window.location = "/incident/list" ;
        } else {
            $dialogExit.dialog("open");
        }
    });
    
});

function storePrimaryDescriptionValues(data) {
    Description.id.i_Number = data.i_Number;
    Description.id.i_City = data.i_City;
    Description.id.i_State_ID = data.i_State_ID;
    Description.id.i_Postal_Code = data.i_Postal_Code;
    Description.id.i_Highway_Street = data.i_Highway_Street;
    Description.id.i_At_Intersection = data.i_At_Intersection;
    Description.id.i_Mile_Marker = data.i_Mile_Marker;
    Description.id.i_Date = data.i_Date;
    Description.id.i_Time = data.i_Time;
    Description.id.i_Photo_Taken_By = data.i_Photo_Taken_By;
    Description.className.i_Incident_Diagram_Taken_Class = data.i_Incident_Diagram_Taken;
    Description.className.i_Reported_Class = data.i_Reported;
    Description.id.i_Police_Department = data.i_Police_Department;
    Description.id.i_Officer_Name = data.i_Officer_Name;
    Description.id.i_Police_Report_Number = data.i_Police_Report_Number;
    Description.id.i_Narrative = data.i_Narrative;
    Description.className.i_Preventable_Class = data.i_Preventable;
}

function storePrimaryDriverInvormationValues(data) {
    DriverInformation.id.i_Travel_Direction_ID = data.i_Travel_Direction_ID;
    DriverInformation.id.i_Collision_Highway_Street = data.i_Collision_Highway_Street;
    DriverInformation.id.i_Actual_Speed = data.i_Actual_Speed;
    DriverInformation.id.i_Speed_Limit = data.i_Speed_Limit;
    DriverInformation.id.i_Collision_Movement_Other = data.i_Collision_Movement_Other;
    DriverInformation.id.colMovements = data.collisionArray;
    DriverInformation.className.collisionSelectOptions = data.collisionSelectOptions;
    DriverInformation.className.i_Injured_Class = data.i_Injured;
    DriverInformation.className.i_Drug_Test_Class = data.i_Drug_Test;
    DriverInformation.className.i_Deceased_Class = data.i_Deceased;
    DriverInformation.className.i_Alcohol_Test_Class = data.i_Alcohol_Test;
}

function restoreValues() {
    var key;
    var selector;

    if ($("#updateDescriptionDiv").css('display') != 'none') {
        for(key in Description.id) {
            selector = "#" + key;
            $(selector).val(Description.id[key]);
        }

        for(key in Description.className) {
            selector = "." + key;
            $(selector).each(function(){
                if ($(this).val() == Description.className[key]) {
                    $(this).attr('checked', 'checked');
                }
            });
        }
    }

    if ($("#updateDriverInformation").css('display') != 'none') {
        for(key in DriverInformation.id) {
            selector = "#" + key;
            $(selector).val(DriverInformation.id[key]);
        }

        for(key in DriverInformation.className) {
            selector = "." + key;
            $(selector).each(function(){
                if ($(this).val() == DriverInformation.className[key]) {
                    $(this).attr('checked', 'checked');
                }
            });
        }

        $("#colMovements").html(DriverInformation.className['collisionSelectOptions']);
        $("#colMovements").multiselect('destroy');
        $("#colMovements").multiselect();
    }

    restoreDotCriteriaValues();
}

function compareArrays (arr1, arr2) {
    if (arr1.length != arr2.length) {return false;}
    var a = arr1.sort(),
        b = arr2.sort();
    for (var i = 0; arr1[i]; i++) {
        if (a[i] !== b[i]) {
            return false;
        }
    }
    return true;
}

function compareValues(comparedObject) {
    var result = true;
    var selector;
    var key;
    for (key in comparedObject.id) {
        selector = "#" + key;
        if (key == "colMovements") {
            if (!compareArrays(comparedObject.id[key], $(selector).val())) {
                result = false;
                break;
            }
        } else if (comparedObject.id[key] != $(selector).val()) {
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

/**
 * @author Andryi Ilnytskyi 13-12-2010
 *
 * Get data according to Incident ID to display Description Info
 *
 * @param id
 *
 */
function refreshIncidentDescription(id) {
    $.ajax({
            type: "GET",
            url: "/incident/index/get-description",
            data: "id=" + id,
            success: function(data) {
                $("#view_i_Status").html(data.row.i_Status);
                fillDescriptionView(data.row);
                fillDescriptionUpdate(data.row);
                disabledElements(data.row);
                storePrimaryDescriptionValues(data.row);

                if (data.row.i_Equipment_ID != $("#i_Equipment_ID").val()) {
                    refreshIncidentEquipmentInformation(data.row.i_Equipment_ID);
                }
            },
            dataType: "json"
    });
}

function refreshIncidentDriverInformation(id) {
    $.ajax({
            type: "GET",
            url: "/incident/index/get-driver-information",
            data: "id=" + id,
            success: function(data) {
                fillDriverInformationView(data);
                fillDriverInformationUpdate(data);
            },
            dataType: "json"
    });
}

function refreshIncidentAdditionalDriverInformation(id) {
    $.ajax({
            type: "GET",
            url: "/incident/index/get-description",
            data: "id=" + id,
            success: function(data) {
                fillAdditionalDriverInformationView(data.row);
                fillAdditionalDriverInformationUpdate(data.row);
                disabledElements(data.row);
                storePrimaryDriverInvormationValues(data.row);
                // Hak for correct building multiselect
                $("#updateDriverInformation").css("display", "inline");
                $("#colMovements").html(data.collisionSelectOptions);
                $("#colMovements").multiselect();
                $("#updateDriverInformation").css("display", "none");
            },
            dataType: "json"
    });
}

function fillAdditionalDriverInformationView(data) {
    $("#view_i_Travel_Direction_ID").html(data.td_type);
    $("#view_i_Collision_Highway_Street").html(data.i_Collision_Highway_Street);
    $("#view_i_Actual_Speed").html(data.i_Actual_Speed);
    $("#view_i_Speed_Limit").html(data.i_Speed_Limit);
    $("#view_i_Collision_Movement").html(data.i_Collision_Movement);
    $("#view_i_Collision_Movement_Other").html(data.i_Collision_Movement_Other);
    $("#view_i_Injured").html(data.i_Injured);
    $("#view_i_Deceased").html(data.i_Deceased);
    $("#view_i_Alcohol_Test").html(data.i_Alcohol_Test);
    $("#view_i_Drug_Test").html(data.i_Drug_Test);

    if (data.i_reason_not_conducted_alcohol_test == ''||
            data.i_reason_not_conducted_alcohol_test == null ||
            data.i_reason_not_conducted_alcohol_test == 'undefined') {

        $(".row_not_conducted_alcohol_test").css('display', 'none');
    } else {
        $(".row_not_conducted_alcohol_test").css('display', 'table-row');
        $("#view_i_reason_not_conducted_alcohol_test").html(data.i_reason_not_conducted_alcohol_test);
    }

    if (data.i_reason_not_conducted_drug_test == ''||
            data.i_reason_not_conducted_drug_test == null ||
            data.i_reason_not_conducted_drug_test == 'undefined') {

        $(".row_not_conducted_drug_test").css('display', 'none');
    } else {
        $(".row_not_conducted_drug_test").css('display', 'table-row');
        $("#view_i_reason_not_conducted_drug_test").html(data.i_reason_not_conducted_drug_test);
    }
}

function disabledElements(data) {
    if (data.alcohol_test_cease_all_attempts_2hours) {
        $("#i_Alcohol_Test_2").attr('disabled', 'disabled');
    }

    if (data.alcohol_test_cease_all_attempts_8hours) {
        $(".i_Alcohol_Test_Class").attr('disabled', 'disabled');
    }

    if (data.drug_test_cease_all_attempts) {
        $(".i_Drug_Test_Class").attr('disabled', 'disabled');
    }
}

function fillAdditionalDriverInformationUpdate(data) {
    $("#i_Travel_Direction_ID").val(data.i_Travel_Direction_ID);
    $("#i_Collision_Highway_Street").val(data.i_Collision_Highway_Street);
    $("#i_Actual_Speed").val(data.i_Actual_Speed);
    $("#i_Speed_Limit").val(data.i_Speed_Limit);
    $("#i_Collision_Movement_Other").val(data.i_Collision_Movement_Other);
    $("#i_reason_not_conducted_drug_test").val(data.i_reason_not_conducted_drug_test);
    $("#i_reason_not_conducted_alcohol_test").val(data.i_reason_not_conducted_alcohol_test);
    $(".i_Injured_Class").each(function(){
        if ($(this).val() == data.i_Injured) {
            $(this).attr('checked', 'checked');
        }
    });
    $(".i_Drug_Test_Class").each(function(){
        if ($(this).val() == data.i_Drug_Test) {
            $(this).attr('checked', 'checked');
        }
    });
    $(".i_Deceased_Class").each(function(){
        if ($(this).val() == data.i_Deceased) {
            $(this).attr('checked', 'checked');
        }
    });
    $(".i_Alcohol_Test_Class").each(function(){
        if ($(this).val() == data.i_Alcohol_Test) {
            $(this).attr('checked', 'checked');
        }
    });
}

function fillDriverInformationView(data) {
    var href;
    href = "/driver/driver/view-driver-Information/id/" + data.d_ID;
    $("#editDriverLink").attr("href", href);
    
    $("#view_d_First_Name").html(data.d_First_Name);
    $("#view_d_Last_Name").html(data.d_Last_Name);
    $("#view_d_Middle_Name").html(data.d_Middle_Name);
    $("#view_d_Date_Of_Birth").html(data.d_Date_Of_Birth);
    $("#view_d_Driver_SSN").html(data.d_Driver_SSN);
    $("#view_d_Medical_Card_Expiration_Date").html(data.d_Medical_Card_Expiration_Date);
    $("#view_d_Doctor_Name").html(data.d_Doctor_Name);
    $("#view_d_Telephone_Number1").html(data.d_Telephone_Number1);
}

function fillDriverInformationUpdate(data) {
    var href;
    href = "/driver/driver/view-driver-Information/id/" + data.d_ID;
    $("#update_editDriverLink").attr("href", href);

    $("#view_update_d_First_Name").html(data.d_First_Name);
    $("#view_update_d_Last_Name").html(data.d_Last_Name);
    $("#view_update_d_Middle_Name").html(data.d_Middle_Name);
    $("#view_update_d_Date_Of_Birth").html(data.d_Date_Of_Birth);
    $("#view_update_d_Driver_SSN").html(data.d_Driver_SSN);
    $("#view_update_d_Medical_Card_Expiration_Date").html(data.d_Medical_Card_Expiration_Date);
    $("#view_update_d_Doctor_Name").html(data.d_Doctor_Name);
    $("#view_update_d_Telephone_Number1").html(data.d_Telephone_Number1);
}

function fillDescriptionUpdate(data) {
    $("#i_Number").val(data.i_Number);
    $("#i_City").val(data.i_City);
    $("#i_State_ID").val(data.i_State_ID);
    $("#i_Postal_Code").val(data.i_Postal_Code);
    $("#i_Highway_Street").val(data.i_Highway_Street);
    $("#i_At_Intersection").val(data.i_At_Intersection);
    $("#i_Mile_Marker").val(data.i_Mile_Marker);
    $("#i_Date").val(data.i_Date);
    $("#i_Time").val(data.i_Time);
    $("#i_Photo_Taken_By").val(data.i_Photo_Taken_By);
    $(".i_Incident_Diagram_Taken_Class").each(function(){
        if ($(this).val() == data.i_Incident_Diagram_Taken) {
            $(this).attr('checked', 'checked');
        }
    });
    $(".i_Reported_Class").each(function(){
        if ($(this).val() == data.i_Reported) {
            $(this).attr('checked', 'checked');
        }
    });
    $("#i_Police_Department").val(data.i_Police_Department);
    $("#i_Officer_Name").val(data.i_Officer_Name);
    $("#i_Police_Report_Number").val(data.i_Police_Report_Number);
    $("#i_Narrative").val(data.i_Narrative);
    $(".i_Preventable_Class").each(function(){
        if ($(this).val() == data.i_Preventable) {
            $(this).attr('checked', 'checked');
        }
    });
}

function saveDriverInformation(id) {
    $.get("/incident/index/save-driver-information",
            {
                i_ID : id,
                i_Travel_Direction_ID : $("#i_Travel_Direction_ID").val(),
                i_Collision_Highway_Street : $("#i_Collision_Highway_Street").val(),
                i_Actual_Speed : $("#i_Actual_Speed").val(),
                i_Speed_Limit : $("#i_Speed_Limit").val(),
                colMovements : $("#colMovements").val(),
                i_Collision_Movement_Other : $("#i_Collision_Movement_Other").val(),
                i_Injured : $(".i_Injured_Class:checked").val(),
                i_Deceased : $(".i_Deceased_Class:checked").val(),
                i_Alcohol_Test : $(".i_Alcohol_Test_Class:checked").val(),
                i_Drug_Test : $(".i_Drug_Test_Class:checked").val(),
                i_reason_not_conducted_drug_test: $("#i_reason_not_conducted_drug_test").val(),
                i_reason_not_conducted_alcohol_test: $("#i_reason_not_conducted_alcohol_test").val()
            }, function(data) {
                if (data == 1) {
                    refreshIncidentDriverInformation(incidentId.val());
                    refreshIncidentAdditionalDriverInformation(incidentId.val());
                    refreshLastModifiedDate(incidentId.val());
                    $(".DriverInformationDiv").toggle("slow");
                    return true;
                } else {
                    alert(data);
                    return false;
                }
            });
}

function saveDescription(id) {
    $.get("/incident/index/save-description",
            {
                i_ID : id,
                i_Number : $("#i_Number").val(),
                i_City : $("#i_City").val(),
                i_State_ID : $("#i_State_ID").val(),
                i_Postal_Code : $("#i_Postal_Code").val(),
                i_Highway_Street : $("#i_Highway_Street").val(),
                i_At_Intersection : $("#i_At_Intersection").val(),
                i_Mile_Marker : $("#i_Mile_Marker").val(),
                i_Date: $("#i_Date").val(),
                i_Time : $("#i_Time").val(),
                i_Photo_Taken_By : $("#i_Photo_Taken_By").val(),
                i_Incident_Diagram_Taken : $(".i_Incident_Diagram_Taken_Class:checked").val(),
                i_Reported : $(".i_Reported_Class:checked").val(),
                i_Police_Department : $("#i_Police_Department").val(),
                i_Officer_Name : $("#i_Officer_Name").val(),
                i_Police_Report_Number : $("#i_Police_Report_Number").val(),
                i_Narrative : $("#i_Narrative").val(),
                i_Preventable : $(".i_Preventable_Class:checked").val()
            }, function(data) {
                if (data == 1) {
                    refreshIncidentDescription(incidentId.val());
                    refreshLastModifiedDate(incidentId.val());
                    $(".DescriptionDiv").toggle("slow");
                    return true;
                } else {
                    alert(data);
                    return false;
                }
            });
}

function refreshLastModifiedDate(incidentId) {
    $.ajax({
            type: "GET",
            url: "/incident/index/get-last-modified-date/",
            data: "incidentId=" + incidentId,
            success: function(data){
                $("#last_modified_datetime").html(data.last_modified_date);
            },
            dataType: "json"
    });
}

function fillDescriptionView(data) {
    $("#view_i_Number").html(data.i_Number);
    $("#view_i_City").html(data.i_City);
    $("#view_s_name").html(data.s_name);
    $("#view_i_Postal_Code").html(data.i_Postal_Code);
    $("#view_i_Highway_Street").html(data.i_Highway_Street);
    $("#view_i_At_Intersection").html(data.i_At_Intersection);
    $("#view_i_Mile_Marker").html(data.i_Mile_Marker);
    $("#view_i_Date").html(data.i_Date);
    $("#view_i_Time").html(data.i_Time);
    $("#view_i_Incident_Diagram_Taken").html(data.i_Incident_Diagram_Taken);
    $("#view_i_Photo_Taken_By").html(data.i_Photo_Taken_By);
    $("#view_i_Reported").html(data.i_Reported);
    $("#view_i_Police_Department").html(data.i_Police_Department);
    $("#view_i_Officer_Name").html(data.i_Officer_Name);
    $("#view_i_Police_Report_Number").html(data.i_Police_Report_Number);
    $("#view_i_Narrative").html(data.i_Narrative);
    $("#view_i_Preventable").html(data.i_Preventable);
}

function refreshIncidentEquipmentInformation(equipmentId) {
    $.ajax({
            type: "GET",
            url: "/equipment/index/get-equipment-information",
            data: "equipmentId=" + equipmentId,
            success: function(data) {
                fillEquipmentInformationView(data);
            },
            dataType: "json"
    });
}

function fillEquipmentInformationView(data) {
    if (data.empty == true) {
        $("#IncidentEquipmentDiv").css('display', 'none');
        $("#emptyIncidentEquipmentDiv").css('display', 'inline');
    } else {
        $("#editEquipmentLink").attr('href', '/equipment/information-worksheet/index/EIN/' + data.e_Number);
        $("#e_Unit_Number").html(data.e_Unit_Number);
        $("#e_Number").html(data.e_Number);
        $("#s_name").html(data.s_name);
        $("#et_type").html(data.et_type);
        $("#e_Make").html(data.e_Make);
        $("#e_Model").html(data.e_Model);
        $("#s_Year").html(data.e_Year);

        $("#IncidentEquipmentDiv").css('display', 'inline');
        $("#emptyIncidentEquipmentDiv").css('display', 'none');
    }
}
