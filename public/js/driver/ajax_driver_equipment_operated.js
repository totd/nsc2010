
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
                deo_records=deo_records + "record:"+i+";deo_ID:"+deo_ID+";deo_Driver_ID:"+deo_Driver_ID+";deo_Equipment_Type_ID:"+deo_Equipment_Type_ID+";deo_is_operated:"+deo_is_operated+";deo_From_Date:"+deo_From_Date+";deo_To_Date:"+deo_To_Date+";deo_Total_Miles:"+deo_Total_Miles+"\n";
                /*
                if(document.getElementsByName("deo_ID")[i].value!=""){
                    deo_ID = deo_ID + document.getElementsByName("deo_ID")[i].value+"|";
                }
                else if(document.getElementsByName("deo_is_operated")[i].value=="Yes"){
                    deo_ID = deo_ID + "create|";
                }else{deo_ID = deo_ID + "skip|";}

                if(document.getElementsByName("deo_Driver_ID")[i].value!=""){
                    deo_Driver_ID = deo_Driver_ID + document.getElementsByName("deo_Driver_ID")[i].value+"|";
                }
                else if(document.getElementsByName("deo_is_operated")[i].value=="Yes"){
                    deo_Driver_ID = deo_Driver_ID + "create|";
                }else{deo_Driver_ID = deo_Driver_ID + "skip|";}

                if(document.getElementsByName("deo_is_operated")[i].value=="Yes"){
                    deo_is_operated = deo_is_operated + document.getElementsByName("deo_is_operated")[i].value+"|";
                }else{
                    deo_is_operated = deo_is_operated + "skip|";}

                if(document.getElementsByName("deo_From_Date")[i].value!=""){
                    deo_From_Date = deo_From_Date + document.getElementsByName("deo_From_Date")[i].value+"|";
                }else{deo_From_Date = deo_From_Date + "empty|";}

                if(document.getElementsByName("deo_To_Date")[i].value!=""){
                    deo_To_Date = deo_To_Date + document.getElementsByName("deo_To_Date")[i].value+"|";
                }else{deo_To_Date = deo_To_Date + "empty|";}

                if(document.getElementsByName("deo_To_Date")[i].value!=""){
                    deo_To_Date = deo_To_Date + document.getElementsByName("deo_To_Date")[i].value+"|";
                }else{deo_To_Date = deo_To_Date + "empty|";}
                */
            }
        }
    }
    alert(deo_records);

    /*
    deo_ID = document.getElementsByName("deo_ID").value;
    
    d_First_Name = document.getElementsByName("d_First_Name")[0].value;
    d_Middle_Name = document.getElementsByName("d_Middle_Name")[0].value;
    d_Last_Name = document.getElementsByName("d_Last_Name")[0].value;
    d_Medical_Card_Expiration_Date = document.getElementsByName("d_Medical_Card_Expiration_Date")[0].value;
    d_Doctor_Name = document.getElementsByName("d_Doctor_Name")[0].value;
    d_Telephone_Number1 = document.getElementsByName("d_Telephone_Number1")[0].value;
    d_Telephone_Number2 = document.getElementsByName("d_Telephone_Number2")[0].value;
    d_Telephone_Number3 = document.getElementsByName("d_Telephone_Number3")[0].value;
    d_TWIC = document.getElementsByName("d_TWIC")[0].value;
    d_TWIC_expiration = document.getElementsByName("d_TWIC_expiration")[0].value;
    d_R_A = document.getElementsByName("d_R_A")[0].value;
    d_R_A_expiration = document.getElementsByName("d_R_A_expiration")[0].value;
/*
    $.get("/driver/Ajax-Driver-Equipment-Operated/validate-Driver-Equipment-Operated/",
        {
            d_homebase_ID: d_homebase_ID,
            d_First_Name: ""+d_First_Name+"",
            d_Middle_Name: ""+d_Middle_Name+"",
            d_Last_Name: ""+d_Last_Name+"",
            d_Medical_Card_Expiration_Date: ""+d_Medical_Card_Expiration_Date+"",
            d_Doctor_Name: ""+d_Doctor_Name+"",
            d_Telephone_Number1: ""+d_Telephone_Number1+"",
            d_Telephone_Number2: ""+d_Telephone_Number2+"",
            d_Telephone_Number3: ""+d_Telephone_Number3+"",
            d_TWIC: ""+d_TWIC+"",
            d_TWIC_expiration: ""+d_TWIC_expiration+"",
            d_R_A: ""+d_R_A+"",
            d_R_A_expiration: ""+d_R_A_expiration+""
        }, function(data){
            if(data==1){
                document.getElementById('driver_DriverPersonalInformation_Form').submit();
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
           });
*/
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