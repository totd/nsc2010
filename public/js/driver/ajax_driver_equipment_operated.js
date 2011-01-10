
function clearNewEquipmentOperatedForm(){
    $("#add_driver_Equipment_Operated_Table").hide();
    $("#toggleDriverEquipmentOperatedAdd").innerHTML="SHOW";
    document.getElementsByName("deo_Equipment_Type_ID")[0].value="";
    document.getElementsByName("deo_From_Date")[0].value="";
    document.getElementsByName("deo_To_Date")[0].value="";
    document.getElementsByName("deo_Total_Miles")[0].value="";
}
function addEquipmentOperatedRecord(){
    deo_Driver_ID = document.getElementsByName("deo_Driver_ID")[0].value;
    deo_Equipment_Type_ID = document.getElementsByName("deo_Equipment_Type_ID")[0].value;
    deo_From_Date = document.getElementsByName("deo_From_Date")[0].value;
    deo_To_Date = document.getElementsByName("deo_To_Date")[0].value;
    deo_Total_Miles = document.getElementsByName("deo_Total_Miles")[0].value;

    $.get("/driver/ajax-Driver-Equipment-Operated/add-Record/",
        {
            deo_Driver_ID: deo_Driver_ID,
            deo_Equipment_Type_ID: deo_Equipment_Type_ID,
            deo_From_Date: ""+deo_From_Date+"",
            deo_To_Date: ""+deo_To_Date+"",
            deo_Total_Miles: ""+deo_Total_Miles+""
        }, function(data){
            if(data==1){
                clearNewEquipmentOperatedForm();
                refreshEquipmentOperatedRecords(deo_Driver_ID);
                return true;
            }else{
                var $dialog = $('<div></div>')
                .html(data)
                .dialog({
                    autoOpen: false,
                    title: 'Form validation error!',
                    minHeight: 13
                });
                $dialog.dialog('open');
                document.getElementById("addDriverEquipmentOperated").setAttribute('class', '');
                document.getElementById("addDriverEquipmentOperated").innerHTML="Add";
                return false;
            }
           });
    driver_last_saved(deo_Driver_ID);
    validate_equipment_operated(deo_Driver_ID);
    }
function deleteEquipmentOperatedRecord(deo_ID,deo_Driver_ID) {
        $.get("/driver/ajax-Driver-Equipment-Operated/delete-Record/",
        {
            deo_ID: deo_ID
        }, function(data){
                document.getElementById("currentDriverAddressHistoryList").innerHTML=data;
                refreshEquipmentOperatedRecords(deo_Driver_ID);
                return true;
           });
    driver_last_saved(deo_Driver_ID);
    validate_equipment_operated(deo_Driver_ID);
}
function refreshEquipmentOperatedRecords(deo_Driver_ID) {
        $.get("/driver/ajax-Driver-Equipment-Operated/get-Driver-Equipment-Operated-List/",
        {
            deo_Driver_ID: deo_Driver_ID
        }, function(data){
                $("#driverEquipmentOperatedList").hide(250);
                document.getElementById("driverEquipmentOperatedList").innerHTML=data;
                $("#driverEquipmentOperatedList").show(250);
                clearNewEquipmentOperatedForm();
                return true;
           });
}
function editEquipmentOperatedRecord(record_id,dah_Driver_ID){

    clearNewEquipmentOperatedForm();
    $('#add_driver_Equipment_Operated_Table').hide(0);
    document.getElementById("toggleDriverEquipmentOperatedAdd").innerHTML="SHOW";

    $.get("/driver/ajax-Driver-Equipment-Operated/get-record/",
        {
            deo_ID: record_id
        }, function(data){
            if(data!=false){
                document.getElementById("equipmentOperatedID_"+record_id).innerHTML="";
                document.getElementById("equipmentOperatedID_"+record_id).innerHTML=data;
                    $(function() {
                $('#edit_deo_From_Date').datepicker({
                    showOn: "button",
                    buttonImage: "/images/select-data.gif",
                    buttonImageOnly: true,
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '1950:2020'
                  });
                $('#edit_deo_To_Date').datepicker({
                    showOn: "button",
                    buttonImage: "/images/select-data.gif",
                    buttonImageOnly: true,
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '1950:2020'
                  });
                    })
                return true;
            }if(data==false){
                var $dialog = $('<div></div>')
                .html(data)
                .dialog({
                    autoOpen: false,
                    title: 'Form validation error!',
                    minHeight: 13
                });
                $dialog.dialog('open');
                return false;
            }
           });
}
function updateEquipmentOperatedRecord(deo_ID){
    $("#edit_equipment_operated_indicator").css('display', 'inline');
    deo_Driver_ID = document.getElementsByName("edit_deo_Driver_ID")[0].value;
    deo_Equipment_Type_ID = document.getElementsByName("edit_deo_Equipment_Type_ID")[0].value;
    deo_From_Date = document.getElementsByName("edit_deo_From_Date")[0].value;
    deo_To_Date = document.getElementsByName("edit_deo_To_Date")[0].value;
    deo_Total_Miles = document.getElementsByName("edit_deo_Total_Miles")[0].value;

    $.get("/driver/ajax-Driver-Equipment-Operated/update-Record/",
        {
            deo_ID: deo_ID,
            deo_Driver_ID: deo_Driver_ID,
            deo_Equipment_Type_ID: deo_Equipment_Type_ID,
            deo_From_Date: ""+deo_From_Date+"",
            deo_To_Date: ""+deo_To_Date+"",
            deo_Total_Miles: ""+deo_Total_Miles+""
        }, function(data){
            if(data==1){
                clearNewEquipmentOperatedForm();
                refreshEquipmentOperatedRecords(deo_Driver_ID);
                $("#edit_equipment_operated_indicator").css('display', 'none');
                return true;
            }else{
                var $dialog = $('<div></div>')
                .html(data)
                .dialog({
                    autoOpen: false,
                    title: 'Form validation error!',
                    minHeight: 13
                });
                $dialog.dialog('open');
                $("#edit_equipment_operated_indicator").css('display', 'none');
                return false;
            }
           });
    driver_last_saved(deo_Driver_ID);
    validate_equipment_operated(deo_Driver_ID);

}