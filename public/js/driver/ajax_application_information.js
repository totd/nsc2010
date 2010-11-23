
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