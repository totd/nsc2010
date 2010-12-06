
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
    /*
    pe_Interstate = document.getElementsByName("pe_Interstate")[0].value="";
    pe_Intrastate = document.getElementsByName("pe_Intrastate")[0].value="";
    pe_Intermodal = document.getElementsByName("pe_Intermodal")[0].value="";*/
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
    pe_FMCSR_Regulated = document.getElementsByName("pe_FMCSR_Regulated")[0].value;/*
    pe_Interstate = document.getElementsByName("pe_Interstate")[0].value;
    pe_Intrastate = document.getElementsByName("pe_Intrastate")[0].value;
    pe_Intermodal = document.getElementsByName("pe_Intermodal")[0].value;*/

    
    $.get("/driver/ajax-Driver-Previous-Employment/add-Record/",
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
            pe_FMCSR_Regulated: ""+pe_FMCSR_Regulated+""
            /*,
            pe_Interstate: ""+pe_Interstate+"",
            pe_Intrastate: ""+pe_Intrastate+"",
            pe_Intermodal: ""+pe_Intermodal+""*/
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
        $.get("/driver/ajax-Driver-Previous-Employment/delete-Record/",
        {
            pe_ID: pe_ID
        }, function(data){
                document.getElementById("Employment_History_List").innerHTML=data;
                refreshEmploymentHistoryRecords(pe_Driver_ID);
                return true;
           });
}
function refreshEmploymentHistoryRecords(pe_Driver_ID) {
        $.get("/driver/ajax-Driver-Previous-Employment/get-Previous-Employment-List/",
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
function editEmploymentHistoryRecord(record_id,pe_Driver_ID){

    //$("#driver_pe_id_"+record_id).remove();
    document.getElementById("driver_pe_id_"+record_id).innerHTML=""
    $.get("/driver/ajax-Driver-Previous-Employment/get-record/",
        {
            pe_ID: record_id
        }, function(data){
            if(data!=false){
                document.getElementById("driver_pe_id_"+record_id).innerHTML="";
                document.getElementById("driver_pe_id_"+record_id).innerHTML=data;

                $(function(){$('#edit_pe_Employment_Start_Date').datepicker();});
                $(function(){$('#edit_pe_Employment_Stop_Date').datepicker();});

                $("#edit_pe_Employer_Name").focus().autocomplete("/driver/ajax-driver-previous-employment/autocomplete-Employer/",{
                    extraParams:{"searchBy":'pe_Employer_Name'}
                });
                $("#edit_pe_Address1").focus().autocomplete("/driver/ajax-driver-previous-employment/autocomplete-Employer/",{
                    extraParams:{"searchBy":'pe_Address1'}
                });
                $("#edit_pe_City").focus().autocomplete("/driver/ajax-driver-previous-employment/autocomplete-Employer/",{
                    extraParams:{"searchBy":'pe_City'}
                });
                $("#edit_pe_Postal_Code").focus().autocomplete("/driver/ajax-driver-previous-employment/autocomplete-Employer/",{
                    extraParams:{"searchBy":'pe_Postal_Code'}
                });
                $("#edit_pe_Phone").focus().autocomplete("/driver/ajax-driver-previous-employment/autocomplete-Employer/",{
                    extraParams:{"searchBy":'pe_Phone'}
                });
                $("#edit_pe_Fax").focus().autocomplete("/driver/ajax-driver-previous-employment/autocomplete-Employer/",{
                    extraParams:{"searchBy":'pe_Fax'}
                });
                $("#edit_pe_Position").focus().autocomplete("/driver/ajax-driver-previous-employment/autocomplete-Employer/",{
                    extraParams:{"searchBy":'pe_Position'}
                });
                return true;
            }if(data==false){
                alert(data);
            }
           });
}
function updateEmploymentHistoryRecord(dah_ID){

    pe_ID = document.getElementsByName("edit_pe_ID")[0].value;
    pe_Driver_ID = document.getElementsByName("edit_pe_Driver_ID")[0].value;
    pe_Employer_Name = document.getElementsByName("edit_pe_Employer_Name")[0].value;
    pe_Address1 = document.getElementsByName("edit_pe_Address1")[0].value;
    pe_City = document.getElementsByName("edit_pe_City")[0].value;
    pe_State = document.getElementsByName("edit_pe_State")[0].value;
    pe_Postal_Code = document.getElementsByName("edit_pe_Postal_Code")[0].value;
    pe_Phone = document.getElementsByName("edit_pe_Phone")[0].value;
    pe_Fax = document.getElementsByName("edit_pe_Fax")[0].value;
    pe_Position = document.getElementsByName("edit_pe_Position")[0].value;
    pe_Employment_Start_Date = document.getElementsByName("edit_pe_Employment_Start_Date")[0].value;
    pe_Employment_Stop_Date = document.getElementsByName("edit_pe_Employment_Stop_Date")[0].value;
    pe_Reason_for_Leaving = document.getElementsByName("edit_pe_Reason_for_Leaving")[0].value;
    pe_DOT_Safety_Sensitive_Function = document.getElementsByName("edit_pe_DOT_Safety_Sensitive_Function")[0].value;
    pe_FMCSR_Regulated = document.getElementsByName("edit_pe_FMCSR_Regulated")[0].value;/*
    pe_Interstate = document.getElementsByName("edit_pe_Interstate")[0].value;
    pe_Intrastate = document.getElementsByName("edit_pe_Intrastate")[0].value;
    pe_Intermodal = document.getElementsByName("edit_pe_Intermodal")[0].value;*/

    $.get("/driver/ajax-Driver-Previous-Employment/update-Record/",
        {
            pe_ID: pe_ID,
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
            pe_FMCSR_Regulated: ""+pe_FMCSR_Regulated+""/*,
            pe_Interstate: ""+pe_Interstate+"",
            pe_Intrastate: ""+pe_Intrastate+"",
            pe_Intermodal: ""+pe_Intermodal+""*/
        }, function(data){
            if(data==1){
                refreshEmploymentHistoryRecords(pe_Driver_ID);
                clearNewEmploymentHistoryForm();
                return true;
            }else{
                alert(data);
            }
           });

}