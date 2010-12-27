
function refreshEquipmentOperatedRecords(deo_Driver_ID) {
        $.get("/driver/ajax-Driver-Equipment-Operated/get-Driver-Equipment-Operated-List/",
        {
            deo_Driver_ID: deo_Driver_ID
        }, function(data){
                $("#driverEquipmentOperatedList").hide(250);
                document.getElementById("driverEquipmentOperatedList").innerHTML=data;
                $("#driverEquipmentOperatedList").show(250);
                return true;
           });
}
function validateDriverEquipmentOperated(){

    document.getElementById("validateDriverEquipmentOperated").innerHTML="Updating...";
    deo_ID = "";
    deo_Driver_ID = "";
    deo_Equipment_Type_ID = "";
    deo_is_operated = "";
    deo_From_Date = "";
    deo_To_Date = "";
    deo_Total_Miles = "";
    deo_records="";
    for (i = 0; i < document.getElementsByName("deo_Equipment_Type_ID").length; i++){
        if(document.getElementsByName("deo_Equipment_Type_ID")[i].value!=""){
            if(document.getElementsByName("deo_is_operated")[i].value=="Yes"){
                deo_Equipment_Type_ID = deo_Equipment_Type_ID + document.getElementsByName("deo_Equipment_Type_ID")[i].value+"|";
                deo_ID = document.getElementsByName("deo_ID")[i].value;
                deo_Driver_ID = document.getElementsByName("deo_Driver_ID")[i].value;
                deo_Equipment_Type_ID = document.getElementsByName("deo_Equipment_Type_ID")[i].value;
                deo_is_operated = document.getElementsByName("deo_is_operated")[i].value;
                deo_From_Date = document.getElementsByName("deo_From_Date")[i].value;
                deo_To_Date = document.getElementsByName("deo_To_Date")[i].value;
                deo_Total_Miles = document.getElementsByName("deo_Total_Miles")[i].value;
                deo_records=deo_records + "record:"+(i+1)+";deo_ID:"+deo_ID+";deo_Driver_ID:"+deo_Driver_ID+";deo_Equipment_Type_ID:"+deo_Equipment_Type_ID+";deo_is_operated:"+deo_is_operated+";deo_From_Date:"+deo_From_Date+";deo_To_Date:"+deo_To_Date+";deo_Total_Miles:"+deo_Total_Miles+"\n";
            }
        }
    }
    $.get("/driver/Ajax-Driver-Equipment-Operated/validate-Driver-Equipment-Operated/",
        {
            deo_records: deo_records
        }, function(data){
            if(data==1){
                refreshEquipmentOperatedRecords(document.getElementsByName("deo_Driver_ID")[0].value);
                $('#driverEquipmentOperatedListEdit').hide();
                document.getElementById("toggleDriverEquipmentOperated").innerHTML="EDIT";
                document.getElementById("validateDriverEquipmentOperated").innerHTML="Save";
                return true;
            }else{
                var $dialog = $('<div></div>')
                .html(data)
                .dialog({
                    autoOpen: false,
                    title: 'Form validation error!',
                    minHeight: 13,
                    minWidth:600
                });
                $dialog.dialog('open');
                document.getElementById("validateDriverEquipmentOperated").innerHTML="Save";
                return false;
            }
           });
    driver_last_saved(deo_Driver_ID);
    validate_equipment_operated(deo_Driver_ID);

}
function updateEquipmentOperatedRecord(l_ID){

}