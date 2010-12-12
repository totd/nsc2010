
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
                return false;
            }
           });

}
function updateEquipmentOperatedRecord(l_ID){/*
    l_ID = document.getElementsByName("edit_l_ID")[0].value;
    l_Driver_ID = document.getElementsByName("edit_l_Driver_ID")[0].value;
    l_Driver_License_Number = document.getElementsByName("edit_l_Driver_License_Number")[0].value;
    l_Driver_Issue_State_id = document.getElementsByName("edit_l_Driver_Issue_State_id")[0].value;
    l_Class = document.getElementsByName("edit_l_Class")[0].value;
    l_Expiration_Date = document.getElementsByName("edit_l_Expiration_Date")[0].value;
    l_DOT_Regulated = document.getElementsByName("edit_l_DOT_Regulated")[0].value;
    l_License_Restrictions = document.getElementsByName("edit_l_License_Restrictions")[0].value;
    l_License_Endorsements = "";
    for (i = 0; i < document.getElementsByName("edit_l_License_Endorsements").length; i++){
        if(document.getElementsByName("edit_l_License_Endorsements")[i].checked==true){
            l_License_Endorsements = l_License_Endorsements + document.getElementsByName("edit_l_License_Endorsements")[i].value+" ";
        }
    }
    l_Points_Score = document.getElementsByName("edit_l_Points_Score")[0].value;

    $.get("/driver/ajax-Driver-License/update-Record/",
        {
            l_ID: l_ID,
            l_Driver_ID: l_Driver_ID,
            l_Driver_License_Number: ""+l_Driver_License_Number+"",
            l_Driver_Issue_State_id: l_Driver_Issue_State_id,
            l_Class: ""+l_Class+"",
            l_Expiration_Date: ""+l_Expiration_Date+"",
            l_DOT_Regulated: ""+l_DOT_Regulated+"",
            l_License_Restrictions: ""+l_License_Restrictions+"",
            l_License_Endorsements: ""+l_License_Endorsements+"",
            l_Points_Score: ""+l_Points_Score+""
        }, function(data){
            if(data==1){
                refreshEquipmentOperatedRecords(l_Driver_ID);
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
                return false;
            }
           });*/

}