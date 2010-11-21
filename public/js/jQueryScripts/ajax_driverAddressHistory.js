
function clearNewDriverAddressForm(){
    document.getElementById("error_custom").innerHTML="";
    document.getElementsByName("dah_Address1")[0].value="";
    document.getElementsByName("dah_City")[0].value="";
    document.getElementsByName("dah_State")[0].value="";
    document.getElementsByName("dah_Postal_Code")[0].value="";
    document.getElementsByName("dah_Phone")[0].value="";
    document.getElementsByName("dah_Start_Date")[0].value="";
    document.getElementsByName("dah_End_Date")[0].value="";
    document.getElementsByName("dah_Current_Address")[0].value="";
}
function addAddressHistoryRecord(){
    document.getElementById("error_custom").innerHTML="";
    dah_Driver_ID = document.getElementsByName("dah_Driver_ID")[0].value;
    dah_Address1 = document.getElementsByName("dah_Address1")[0].value;
    dah_City = document.getElementsByName("dah_City")[0].value;
    dah_State = document.getElementsByName("dah_State")[0].value;
    dah_Postal_Code = document.getElementsByName("dah_Postal_Code")[0].value;
    dah_Phone = document.getElementsByName("dah_Phone")[0].value;
    dah_Start_Date = document.getElementsByName("dah_Start_Date")[0].value;
    dah_End_Date = document.getElementsByName("dah_End_Date")[0].value;
    dah_Current_Address = document.getElementsByName("dah_Current_Address")[0].value;
    
    $.get("/ajax/Driver-Address-History/add-Record/",
        {
            dah_Driver_ID: dah_Driver_ID,
            dah_Address1: ""+dah_Address1+"",
            dah_City: ""+dah_City+"",
            dah_State: dah_State,
            dah_Postal_Code: ""+dah_Postal_Code+"",
            dah_Phone: ""+dah_Phone+"",
            dah_Start_Date: ""+dah_Start_Date+"",
            dah_End_Date: ""+dah_End_Date+"",
            dah_Current_Address: ""+dah_Current_Address+""
        }, function(data){
            if(data==1){
                document.getElementById("error_custom").innerHTML="";
                refreshAddressHistoryRecords(dah_Driver_ID);
                clearNewDriverAddressForm();
                return true;
            }else{
                document.getElementById("error_custom").innerHTML=""+data+"";
            }
           });
}
function deleteAddressHistoryRecord(dah_ID,dah_Driver_ID) {
        $.get("/ajax/Driver-Address-History/delete-Record/",
        {
            dah_ID: dah_ID
        }, function(data){
                document.getElementById("currentDriverAddressHistoryList").innerHTML=data;
                refreshAddressHistoryRecords(dah_Driver_ID);
                return true;
           });
}
function refreshAddressHistoryRecords(dah_Driver_ID) {
        $.get("/ajax/Driver-Address-History/get-Driver-Address-History-List/",
        {
            dah_Driver_ID: dah_Driver_ID
        }, function(data){
                document.getElementById("currentDriverAddressHistoryList").innerHTML=data;
                clearNewDriverAddressForm();
                return true;
           });
}
function editAddressHistoryRecord(record_id,dah_Driver_ID){

    document.getElementById("addressRecordID_"+record_id).innerHTML="";

    $.get("/ajax/driver-address-history/get-record/",
        {
            dah_ID: record_id
        }, function(data){
            if(data!=false){
                document.getElementById("addressRecordID_"+record_id).innerHTML="";
                document.getElementById("addressRecordID_"+record_id).innerHTML=data;
                $('#edit_dah_Start_Date').datepicker();
                $('#edit_dah_End_Date').datepicker();
                //refreshAddressHistoryRecords(dah_Driver_ID);
                return true;
            }if(data==false){
                alert("asd");
                document.getElementById("error_custom").innerHTML=""+data+"";
            }
           });
}
function updateAddressHistoryRecord(dah_ID){

    document.getElementById("error_custom").innerHTML="";
    dah_ID = document.getElementsByName("edit_dah_ID")[0].value;
    dah_Driver_ID = document.getElementsByName("edit_dah_Driver_ID")[0].value;
    dah_Address1 = document.getElementsByName("edit_dah_Address1")[0].value;
    dah_City = document.getElementsByName("edit_dah_City")[0].value;
    dah_State = document.getElementsByName("edit_dah_State")[0].value;
    dah_Postal_Code = document.getElementsByName("edit_dah_Postal_Code")[0].value;
    dah_Phone = document.getElementsByName("edit_dah_Phone")[0].value;
    dah_Start_Date = document.getElementsByName("edit_dah_Start_Date")[0].value;
    dah_End_Date = document.getElementsByName("edit_dah_End_Date")[0].value;
    dah_Current_Address = document.getElementsByName("edit_dah_Current_Address")[0].value;

    $.get("/ajax/Driver-Address-History/update-Record/",
        {
            dah_ID: dah_ID,
            dah_Driver_ID: dah_Driver_ID,
            dah_Address1: ""+dah_Address1+"",
            dah_City: ""+dah_City+"",
            dah_State: dah_State,
            dah_Postal_Code: ""+dah_Postal_Code+"",
            dah_Phone: ""+dah_Phone+"",
            dah_Start_Date: ""+dah_Start_Date+"",
            dah_End_Date: ""+dah_End_Date+"",
            dah_Current_Address: ""+dah_Current_Address+""
        }, function(data){
            if(data==1){
                document.getElementById("error_custom").innerHTML="";
                refreshAddressHistoryRecords(dah_Driver_ID);
                clearNewDriverAddressForm();
                return true;
            }else{
                document.getElementById("error_custom").innerHTML=""+data+"";
            }
           });
    
}
