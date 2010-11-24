
function clearNewEmploymentHistoryForm(){
    pe_Employer_Name = document.getElementsByName("pe_Employer_Name")[0].value="";
    pe_Address1 = document.getElementsByName("pe_Address1")[0].value="";
    pe_City = document.getElementsByName("pe_City")[0].value="";
    pe_State = document.getElementsByName("pe_State")[0].value="";
    pe_Postal_Code = document.getElementsByName("pe_Postal_Code")[0].value="";
    pe_Phone = document.getElementsByName("pe_Phone")[0].value="";
    pe_Fax = document.getElementsByName("pe_Fax")[0].value="";
    pe_Position = document.getElementsByName("pe_Position")[0].value="";
    pe_Employment_Start_Date = document.getElementsByName("pe_Employment_Start_Date")[0].value="";
    pe_Employment_Stop_Date = document.getElementsByName("pe_Employment_Stop_Date")[0].value="";
    pe_Reason_for_Leaving = document.getElementsByName("pe_Reason_for_Leaving")[0].value="";
    pe_DOT_Safety_Sensitive_Function = document.getElementsByName("pe_DOT_Safety_Sensitive_Function")[0].value="";
    pe_FMCSR_Regulated = document.getElementsByName("pe_FMCSR_Regulated")[0].value="";
    pe_Interstate = document.getElementsByName("pe_Interstate")[0].value="";
    pe_Intrastate = document.getElementsByName("pe_Intrastate")[0].value="";
    pe_Intermodal = document.getElementsByName("pe_Intermodal")[0].value="";
}
function addEmploymentHistoryRecord(){
    $("#error_custom_add_Employment_Table").remove();
    $(".error_custom2").remove();
    pe_Driver_ID = document.getElementsByName("pe_Driver_ID")[0].value;
    pe_Employer_Name = document.getElementsByName("pe_Employer_Name")[0].value;
    pe_Address1 = document.getElementsByName("pe_Address1")[0].value;
    pe_City = document.getElementsByName("pe_City")[0].value;
    pe_State = document.getElementsByName("pe_State")[0].value;
    pe_Postal_Code = document.getElementsByName("pe_Postal_Code")[0].value;
    pe_Phone = document.getElementsByName("pe_Phone")[0].value;
    pe_Fax = document.getElementsByName("pe_Fax")[0].value;
    pe_Position = document.getElementsByName("pe_Position")[0].value;
    pe_Employment_Start_Date = document.getElementsByName("pe_Employment_Start_Date")[0].value;
    pe_Employment_Stop_Date = document.getElementsByName("pe_Employment_Stop_Date")[0].value;
    pe_Reason_for_Leaving = document.getElementsByName("pe_Reason_for_Leaving")[0].value;
    pe_DOT_Safety_Sensitive_Function = document.getElementsByName("pe_DOT_Safety_Sensitive_Function")[0].value;
    pe_FMCSR_Regulated = document.getElementsByName("pe_FMCSR_Regulated")[0].value;
    pe_Interstate = document.getElementsByName("pe_Interstate")[0].value;
    pe_Intrastate = document.getElementsByName("pe_Intrastate")[0].value;
    pe_Intermodal = document.getElementsByName("pe_Intermodal")[0].value;

    
    $.get("/ajax/Previous-Employment/add-Record/",
        {
            pe_Driver_ID: pe_Driver_ID,
            pe_Employer_Name: ""+pe_Employer_Name+"",
            pe_Address1: ""+pe_Address1+"",
            pe_City: ""+pe_City+"",
            pe_State: pe_State,
            pe_Postal_Code: ""+pe_Postal_Code+"",
            pe_Phone: ""+pe_Phone+"",
            pe_Fax: ""+pe_Fax+"",
            pe_Position: ""+pe_Position+"",
            pe_Employment_Start_Date: ""+pe_Employment_Start_Date+"",
            pe_Employment_Stop_Date: ""+pe_Employment_Stop_Date+"",
            pe_Reason_for_Leaving: ""+pe_Reason_for_Leaving+"",
            pe_DOT_Safety_Sensitive_Function: ""+pe_DOT_Safety_Sensitive_Function+"",
            pe_FMCSR_Regulated: ""+pe_FMCSR_Regulated+"",
            pe_Interstate: ""+pe_Interstate+"",
            pe_Intrastate: ""+pe_Intrastate+"",
            pe_Intermodal: ""+pe_Intermodal+""
        }, function(data){
            if(data==1){
                refreshEmploymentHistoryRecords(pe_Driver_ID);
                clearNewEmploymentHistoryForm();
                $("#add_Employment_Table").hide();
                document.getElementById("toggleEmploymentHistoryAdd").innerHTML="Show";
                return true;
            }else{
                alert(data);
            }
           });
}
function deleteEmploymentHistoryRecord(pe_ID,pe_Driver_ID) {
        $.get("/ajax/Previous-Employment/delete-Record/",
        {
            pe_ID: pe_ID
        }, function(data){
                document.getElementById("Employment_History_List").innerHTML=data;
                refreshEmploymentHistoryRecords(pe_Driver_ID);
                return true;
           });
}
function refreshEmploymentHistoryRecords(pe_Driver_ID) {
        $.get("/ajax/Previous-Employment/get-Previous-Employment-List/",
        {
            pe_Driver_ID: pe_Driver_ID
        }, function(data){
                $("#Employment_History_List").hide(250);
                document.getElementById("Employment_History_List").innerHTML=data;
                clearNewEmploymentHistoryForm();
                $("#Employment_History_List").show(250);
                return true;
           });
}
function editEmploymentHistoryRecord(record_id,dah_Driver_ID){

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
                refreshEmploymentHistoryRecords(dah_Driver_ID);
                return true;
            }if(data==false){
                alert("asd");
                document.getElementById("error_custom_add_Employment_Table").innerHTML=""+data+"";
            }
           });
}
function updateEmploymentHistoryRecord(dah_ID){

    document.getElementById("error_custom_add_Employment_Table").innerHTML="";
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
                document.getElementById("error_custom_add_Employment_Table").innerHTML="";
                refreshAddressHistoryRecords(dah_Driver_ID);
                clearNewEmploymentHistoryForm();
                return true;
            }else{
                document.getElementById("error_custom_add_Employment_Table").innerHTML=""+data+"";
            }
           });

}