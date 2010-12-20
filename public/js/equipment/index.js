function storePrimaryViwValues() {
    Viw.e_id = $("#e_id").val();
    Viw.e_Picture = $("#e_Picture").val();
    Viw.e_Unit_Number = $("#e_Unit_Number").val();
    Viw.e_type_id = $("#e_type_id").val();
    Viw.e_Start_Mileage = $("#e_Start_Mileage").val();
    Viw.e_Registration_State = $("#e_Registration_State").val();
    Viw.e_Name = $("#e_Name").val();
    Viw.e_Description = $("#e_Description").val();
    Viw.e_Axles = $("#e_Axles").val();
    Viw.e_License_Number = $("#e_License_Number").val();
    Viw.e_License_Expiration_Date = $("#e_License_Expiration_Date").val();
    Viw.e_Owner_Number = $("#e_Owner_Number").val();
    Viw.e_Alternate_ID = $("#e_Alternate_ID").val();
    Viw.e_DOT_Regulated = $("#e_DOT_Regulated").val();
    Viw.e_Model = $("#e_Model").val();
    Viw.e_Year = $("#e_Year").val();
    Viw.e_Make = $("#e_Make").val();
    Viw.e_Color = $("#e_Color").val();
    Viw.e_Unladen_Weight = $("#e_Unladen_Weight").val();
    Viw.e_Gross_Equipment_Registered_Weight = $("#e_Gross_Equipment_Registered_Weight").val();
    Viw.e_Gross_Equipment_Weight_Rating = $("#e_Gross_Equipment_Weight_Rating").val();
    Viw.e_Title_Status = $("#e_Title_Status").val();
    Viw.e_Fee = $("#e_Fee").val();
    Viw.e_RFID_No = $("#e_RFID_No").val();
}

function storePrimaryAssignmentValues() {
    Assignment.ea_homebase_id = $("#ea_homebase_id").val();
    Assignment.ea_DOT_regulated = $("#ea_DOT_regulated").val();
    Assignment.ea_owner_id = $("#ea_owner_id").val();
    Assignment.ea_driver_id = $("#ea_driver_id").val();
    Assignment.ea_depot_id = $("#ea_depot_id").val();
    Assignment.ea_mileage = $("#ea_mileage").val();
    Assignment.ea_start_date = $("#ea_start_date").val();
    Assignment.ea_end_date = $("#ea_end_date").val();
    Assignment.ea_equipment_id = $("#ea_equipment_id").val();
    Assignment.ea_id = $("#ea_id").val();
    Assignment.driver_autocomplete = $("#driver_autocomplete").val();
}


function changeType() {
    var text = $('#e_type_id :selected').text();
    $(".second *").show();

    if (text == "Straight Truck") {
        $("#e_Owner_Number").parents("tr").hide();

        $("#e_Alternate_ID").parents("tr").hide();

    }

    if (text == "Tractor") {
        $("#e_Alternate_ID").parents("tr").hide();

        $("#e_Fee").parents("tr").hide();

        $("#e_Title_Status").parents("tr").hide();

        $("#e_RFID_No").parents("tr").hide();
    }
}

function hideViewAssignment() {
    $(".AssignmentDiv").toggle("slow");
}

function hideViewVIW() {
    $(".VIWDiv").toggle("slow");
}


$(function() {
    Viw = new Object();
    Assignment = new Object();

    refreshVIW($("#e_Number").val());

    refreshEquipmentAssigment($("#ea_equipment_id").val());
    
    // Show/hide VIW edit form
    $(".VIWActionLink").each(function() {
       $(this).click(function() {
            $(".VIWDiv").toggle("slow");
            return false;
        });
    });

    $(".EquipmentAssignmentActionLink").each(function() {
       $(this).click(function() {
            $(".AssignmentDiv").toggle("slow");
            return false;
        });
    });

    $("#e_License_Expiration_Date").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: '-20:+20'
    });

    $("#e_type_id").change(function() {
        changeType();
    })

    changeType();

    $("#EquipmentAssignmentSaveLink").click(function() {
         saveAssignment();
         $("#EquipmentAssignmentSaveLink").html('Updating...');
    });

    $("#VIWSaveLink").click(function() {
        saveViw();
        $("#VIWSaveLink").html('Updating...');
    });

    $("#commonSaveButton").click(function() {
        if ($("#updateVIWdiv").css('display') != 'none') {
            $("#commonSaveButton").html('Updating...');
            saveViw();
            
        }

        if ($("#addAssignmentDiv").css('display') != 'none') {
            $("#commonSaveButton").html('Updating...');
            saveAssignment();
            
        }
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
        if ($("#updateVIWdiv").css('display') == 'none' && $("#addAssignmentDiv").css('display') == 'none') {
            $dialogNoChanges.dialog('open');
        } else if (compareValues(Viw) && compareValues(Assignment)) {
            $dialogNoChanges.dialog('open');
        } else {
            $dialogDiscard.dialog('open');
        }
	});

    var $dialogExit = $('<div></div>')
		.html("Are you sure you want to leave without saving all changes?")
		.dialog({
			autoOpen: false,
            modal: true,
            buttons: {
                "Yes": function() {
                    $(this).dialog("close");
                    window.location = "/equipment/list" ;
                },
                "No": function() {
                    $(this).dialog("close");
                }
            },
            resizable: false,
			title: 'Attention!'
		}

    );

    $(".exitButton").click(function() {
        if (compareValues(Viw) && compareValues(Assignment)) {
            window.location = "/equipment/list" ;
        } else {
            $dialogExit.dialog("open");
        }

        $("#ea_depot_id").val(Assignment['ea_depot_id']);
    });

});

/**
 * Compare object values: current and previous (primary).
 * If the are identity - return true, else - false;
 */
function compareValues(comparedObject) {
    var result = true;
    var separator;
    for (var key in comparedObject) {
        separator = "#" + key;
        if (comparedObject[key] != $(separator).val()) {
            result = false;
            break;
        }
    }

    return result;
}

function restoreValues() {
    if ($("#updateVIWdiv").css('display') != 'none') {
        for(var key1 in Viw) {
            var selector1 = "#" + key1;
            $(selector1).val(Viw[key1]);
        }
    }

    if ($("#addAssignmentDiv").css('display') != 'none') {
        for(var key2 in Assignment) {
            var selector2 = "#" + key2;
            $(selector2).val(Assignment[key2]);
            if (key2 == "ea_homebase_id") {
                getDepotListNonAsync();
            }
        }
        $("#ea_depot_id").val(Assignment['ea_depot_id']);
    }

}

function saveAssignment() {
    if($.trim($("#driver_autocomplete").val()) == "") {
        $("#ea_driver_id").val("");
    }

    $.get("/equipment/information-worksheet/save-assignment",
                {
                    ea_homebase_id: $("#ea_homebase_id").val(),
                    ea_DOT_regulated : $("#ea_DOT_regulated").val(),
                    ea_owner_id : $("#ea_owner_id").val(),
                    ea_driver_id : $("#ea_driver_id").val(),
                    ea_depot_id : $("#ea_depot_id").val(),
                    ea_mileage : $("#ea_mileage").val(),
                    ea_start_date : $("#ea_start_date").val(),
                    ea_end_date : $("#ea_end_date").val(),
                    ea_equipment_id : $("#ea_equipment_id").val(),
                    ea_id : $("#ea_id").val()
                }, function(data) {
                        if (data == 1) {
                            $("#viewAssignmentDiv").html("");
                            refreshEquipmentAssigment($("#ea_equipment_id").val());
                            $(".AssignmentDiv").toggle("slow");
                            $(".saveButton").html("Save");
                            return true;
                        } else {
                            alert(data);
                            return false;
                        }
               });
}


function saveViw() {
    $.get("/equipment/information-worksheet/save-vim/",
            {
                e_id : $("#e_id").val(),
                e_Picture : $("#e_Picture").val(),
                e_Unit_Number : $("#e_Unit_Number").val(),
                e_type_id : $("#e_type_id").val(),
                e_Start_Mileage : $("#e_Start_Mileage").val(),
                e_Registration_State : $("#e_Registration_State").val(),
                e_Name : $("#e_Name").val(),
                e_Description : $("#e_Description").val(),
                e_Axles : $("#e_Axles").val(),
                e_License_Number : $("#e_License_Number").val(),
                e_License_Expiration_Date : $("#e_License_Expiration_Date").val(),
                e_Owner_Number : $("#e_Owner_Number").val(),
                e_Alternate_ID : $("#e_Alternate_ID").val(),
                e_DOT_Regulated : $("#e_DOT_Regulated").val(),
                e_Model : $("#e_Model").val(),
                e_Year: $("#e_Year").val(),
                e_Make : $("#e_Make").val(),
                e_Color : $("#e_Color").val(),
                e_Unladen_Weight : $("#e_Unladen_Weight").val(),
                e_Gross_Equipment_Registered_Weight : $("#e_Gross_Equipment_Registered_Weight").val(),
                e_Gross_Equipment_Weight_Rating : $("#e_Gross_Equipment_Weight_Rating").val(),
                e_Title_Status : $("#e_Title_Status").val(),
                e_Fee : $("#e_Fee").val(),
                e_RFID_No : $("#e_RFID_No").val()
            }, function(data) {
                if (data == 1) {
                    $("#viewVIWdiv").html("");
                    refreshVIW($("#e_Number").val());
                    $(".VIWDiv").toggle("slow");
                    $(".saveButton").html("Save");
                    return true;
                } else {
                    alert(data);
                    return false;
                }
            });
}


function ajaxFileUpload()
{
    $.ajaxFileUpload
    (
        {
            url:'/equipment/information-worksheet/upload-picture/',
            secureuri:false,
            fileElementId: "uploadPicture",
            dataType: 'json',
            async:false,
            success: function (data, status)
            {
                if(typeof(data.error) != 'undefined')
                {
                    if (data.error != '') {
                        //alert(data.error);
                    } else {
                        result = data.fileName;
                        $("#e_Picture").val(result);
                    }
                }
            },
            error: function (data, status, e)
            {
                //alert(e);
            }
        }
    )
    return false;

}


function refreshVIW(EIN) {
     $.ajax({
            type: "GET",
            url: "/equipment/information-worksheet/get-viw/",
            data: "EIN=" + EIN,
            success: function(data){
                $("#viewVIWdiv").html(data.layout);
                $("#e_last_modified_datetime").html(data.e_last_modified_datetime);
                atachPreview();
                storePrimaryViwValues();
            },
            dataType: "json"
    });
}

function refreshEquipmentAssigment(equipmentId) {
    $.ajax({
            type: "GET",
            url: "/equipment/information-worksheet/get-assignment/",
            data: "equipmentId=" + equipmentId,
            success: function(data){
                $("#viewAssignmentDiv").html(data);
        }
    });

     $.ajax({
            type: "GET",
            url: "/equipment/information-worksheet/get-assignment-driver/",
            data: "equipmentId=" + equipmentId,
            success: function(data){
                $("#viewAssignmentDriverDiv").html(data);
        }
    });

    storePrimaryAssignmentValues();
}


 function atachPreview() {
     $("#attachFile").imgPreview({
            containerID: 'imgPreviewWithStyles',
            imgCSS: {
                // Limit preview size:
                height: 200
            },
            // When container is shown:
            onShow: function(link){
                // Animate link:
                $(link).stop().animate({opacity:0.4});
                // Reset image:
                $('img', this).stop().css({opacity:0});
            },
            // When image has loaded:
            onLoad: function(){
                // Animate image
                $(this).animate({opacity:1}, 300);
            },
            // When container hides:
            onHide: function(link){
                // Animate link:
                $(link).stop().animate({opacity:1});
            }
        });
 }

