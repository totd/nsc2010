function addLicenseRecord(){
    l_Driver_ID = document.getElementsByName("l_Driver_ID")[0].value;
    l_Driver_License_Number = document.getElementsByName("l_Driver_License_Number")[0].value;
    l_Driver_Issue_State_id = document.getElementsByName("l_Driver_Issue_State_id")[0].value;
    l_Class = document.getElementsByName("l_Class")[0].value;
    l_Expiration_Date = document.getElementsByName("l_Expiration_Date")[0].value;
    l_DOT_Regulated = document.getElementsByName("l_DOT_Regulated")[0].value;
    l_License_Restrictions = document.getElementsByName("l_License_Restrictions")[0].value;
    l_License_Endorsements = "";
    for (i = 0; i < document.getElementsByName("l_License_Endorsements").length; i++){
        if(document.getElementsByName("l_License_Endorsements")[i].checked==true){
            l_License_Endorsements = l_License_Endorsements + document.getElementsByName("l_License_Endorsements")[i].value+" ";
        }
    }
    l_Points_Score = document.getElementsByName("l_Points_Score")[0].value;

    $.get("/ajax/Driver-License/add-Record/",
        {
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
                document.getElementById("error_custom_add_Address_Table").innerHTML="";
                refreshLicenseRecords(l_Driver_ID);
                clearNewLicenseForm();
                $('#add_driver_License_Table').hide();
                document.getElementById("toggleDriverLicenseAdd").innerHTML="Show";
                return true;
            }else{
                alert(""+data+"");
            }
           });
}
function deleteLicenseRecord(l_ID,l_Driver_ID) {
        $.get("/ajax/Driver-License/delete-Record/",
        {
            l_ID: l_ID
        }, function(data){
                //document.getElementById("currentDriverAddressHistoryList").innerHTML=data;
                refreshLicenseRecords(l_Driver_ID);
                return true;
           });
}
function refreshLicenseRecords(l_Driver_ID) {
        $.get("/ajax/Driver-License/get-Driver-Licenses-List/",
        {
            l_Driver_ID: l_Driver_ID
        }, function(data){
                $("#driverLicensesList").hide(250);
                document.getElementById("driverLicensesList").innerHTML=data;
                $("#driverLicensesList").show(250);
                clearNewDriverAddressForm();
                $('#add_driver_License_Table').hide();
                document.getElementById("toggleDriverLicenseAdd").innerHTML="Show";
                return true;
           });
}
function editLicenseRecord(l_ID,l_Driver_ID){

    clearNewDriverAddressForm();
    $('#add_Address_Table').hide(0);

    $.get("/ajax/Driver-License/get-record/",
        {
            l_ID: l_ID
        }, function(data){
            if(data!=false){
                document.getElementById("driver_license_"+l_ID).innerHTML="";
                document.getElementById("driver_license_"+l_ID).innerHTML=data;
                $('#edit_l_Expiration_Date').datepicker({
                   changeMonth: true,
                   changeYear: true,
                            yearRange: '1950:2020'
                  });
               // refreshLicenseRecords(l_Driver_ID);
                return true;
            }if(data==false){
                alert(data);
            }
           });
}
function updateHosAndLrfwRecord(){
    Driver_ID = document.getElementById("Driver_ID").value;
    edit_dhos_date = "";
    for (i = 0; i < document.getElementsByName("edit_dhos_date").length; i++){
        if(document.getElementsByName("edit_dhos_date")[i].value){
            edit_dhos_date = edit_dhos_date + document.getElementsByName("edit_dhos_date")[i].value+" ";
        }
    }
    edit_dhos_hours = "";
    for (i = 0; i < document.getElementsByName("edit_dhos_hours").length; i++){
            edit_dhos_hours = edit_dhos_hours + document.getElementsByName("edit_dhos_hours")[i].value+"|";
    }
    edit_dlrfw_date = document.getElementsByName("edit_dlrfw_date")[0].value;
    edit_dlrfw_from_time = document.getElementsByName("edit_dlrfw_from_time")[0].value;

    $.get("/ajax/Driver-Hos/proceed-Hos/",
        {
            Driver_ID: Driver_ID,
            dhos_date: ""+edit_dhos_date+"",
            dhos_hours: ""+edit_dhos_hours+"",
            dlrfw_date: ""+edit_dlrfw_date+"",
            dlrfw_from_time: ""+edit_dlrfw_from_time+""
        }, function(data){
            if(data==1){
                setTimeout("location.reload(true)",1000);
                return true;
            }else{
                alert(data);
            }
           });

}