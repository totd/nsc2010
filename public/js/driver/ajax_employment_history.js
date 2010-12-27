
function clearNewEmploymentHistoryForm(){
    emp_ID = document.getElementsByName("emp_ID")[0].value="";
    emp_Employer_Name = document.getElementsByName("emp_Employer_Name")[0].value="";
    emp_Address1 = document.getElementsByName("emp_Address1")[0].value="";
    emp_City = document.getElementsByName("emp_City")[0].value="";
    emp_State_ID = document.getElementsByName("emp_State_ID")[0].value="";
    emp_Postal_Code = document.getElementsByName("emp_Postal_Code")[0].value="";
    emp_Phone = document.getElementsByName("emp_Phone")[0].value="";
    emp_Fax = document.getElementsByName("emp_Fax")[0].value="";
    dpe_Position = document.getElementsByName("dpe_Position")[0].value="";
    dpe_Employment_Start_Date = document.getElementsByName("dpe_Employment_Start_Date")[0].value="";
    dpe_Employment_Stop_Date = document.getElementsByName("dpe_Employment_Stop_Date")[0].value="";
    dpe_Reason_for_Leaving = document.getElementsByName("dpe_Reason_for_Leaving")[0].value="";
    dpe_Salary = document.getElementsByName("dpe_Salary")[0].value="";
    emp_DOT_Safety_Sensitive_Function = document.getElementsByName("emp_DOT_Safety_Sensitive_Function")[0].value="";
    emp_FMCSR_Regulated = document.getElementsByName("emp_FMCSR_Regulated")[0].value="";
    
}
function addEmploymentHistoryRecord(){
    dpe_Driver_ID = document.getElementsByName("dpe_Driver_ID")[0].value;
    emp_ID = document.getElementsByName("emp_ID")[0].value;
    emp_Employer_Name = document.getElementsByName("emp_Employer_Name")[0].value;
    emp_Address1 = document.getElementsByName("emp_Address1")[0].value;
    emp_City = document.getElementsByName("emp_City")[0].value;
    emp_State_ID = document.getElementsByName("emp_State_ID")[0].value;
    emp_Postal_Code = document.getElementsByName("emp_Postal_Code")[0].value;
    emp_Phone = document.getElementsByName("emp_Phone")[0].value;
    emp_Fax = document.getElementsByName("emp_Fax")[0].value;
    dpe_Position = document.getElementsByName("dpe_Position")[0].value;
    dpe_Employment_Start_Date = document.getElementsByName("dpe_Employment_Start_Date")[0].value;
    dpe_Employment_Stop_Date = document.getElementsByName("dpe_Employment_Stop_Date")[0].value;
    dpe_Reason_for_Leaving = document.getElementsByName("dpe_Reason_for_Leaving")[0].value;
    dpe_Salary = document.getElementsByName("dpe_Salary")[0].value;
    emp_DOT_Safety_Sensitive_Function = document.getElementsByName("emp_DOT_Safety_Sensitive_Function")[0].value;
    emp_FMCSR_Regulated = document.getElementsByName("emp_FMCSR_Regulated")[0].value;

    if(emp_ID==""){
        $.get("/employer/ajax-Employer/add-Record/",{
                emp_Employer_Name: emp_Employer_Name,
                emp_Address1: emp_Address1,
                emp_City: ""+emp_City+"",
                emp_State_ID: emp_State_ID,
                emp_Postal_Code: ""+emp_Postal_Code+"",
                emp_Phone: ""+emp_Phone+"",
                emp_Fax: ""+emp_Fax+"",
                emp_DOT_Safety_Sensitive_Function: ""+emp_DOT_Safety_Sensitive_Function+"",
                emp_FMCSR_Regulated: ""+emp_FMCSR_Regulated+""

            }, function(data){
                reg=/^\d+$/;
                if(reg.test(data)==true){
                    $.get("/driver/ajax-Driver-Previous-Employment/add-Record/",
                    {
                        dpe_Driver_ID: dpe_Driver_ID,
                        dpe_Employer_ID: data,
                        dpe_Employment_Start_Date: ""+dpe_Employment_Start_Date+"",
                        dpe_Employment_Stop_Date: ""+dpe_Employment_Stop_Date+"",
                        dpe_Position: ""+dpe_Position+"",
                        dpe_Salary: dpe_Salary,
                        dpe_Reason_for_Leaving: ""+dpe_Reason_for_Leaving+""

                    }, function(data2){
                        if(data2==1){
                            refreshEmploymentHistoryRecords(dpe_Driver_ID);
                            clearNewEmploymentHistoryForm();
                            $("#add_Employment_Table").hide();
                            document.getElementById("toggleEmploymentHistoryAdd").innerHTML="SHOW";
                            return true;
                        }else{
                            var $dialog = $('<div></div>')
                            .html(data2)
                            .dialog({
                                autoOpen: false,
                                title: 'Form validation error!',
                                minHeight: 13
                            });
                            $dialog.dialog('open');
                            document.getElementById("addEmploymentHistoryRecord").setAttribute('class', '');
                            document.getElementById("addEmploymentHistoryRecord").innerHTML='Add new Employer';
                            return false;
                        }
                       });
                    //refreshEmploymentHistoryRecords(dpe_Driver_ID);
                    //clearNewEmploymentHistoryForm();
                    //$("#add_Employment_Table").hide();
                    //document.getElementById("toggleEmploymentHistoryAdd").innerHTML="SHOW";
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
                    document.getElementById("addEmploymentHistoryRecord").setAttribute('class', '');
                    document.getElementById("addEmploymentHistoryRecord").innerHTML='Add new Employer';
                    return false;
                }
        });
       /**/
    }else{
        $.get("/driver/ajax-Driver-Previous-Employment/add-Record/",
            {
                dpe_Driver_ID: dpe_Driver_ID,
                dpe_Employer_ID: emp_ID,
                dpe_Employment_Start_Date: ""+dpe_Employment_Start_Date+"",
                dpe_Employment_Stop_Date: ""+dpe_Employment_Stop_Date+"",
                dpe_Position: ""+dpe_Position+"",
                dpe_Salary: dpe_Salary,
                dpe_Reason_for_Leaving: ""+dpe_Reason_for_Leaving+""

            }, function(data){
                if(data==1){
                    refreshEmploymentHistoryRecords(dpe_Driver_ID);
                    clearNewEmploymentHistoryForm();
                    $("#add_Employment_Table").hide();
                    document.getElementById("toggleEmploymentHistoryAdd").innerHTML="Show";
                            document.getElementById("addEmploymentHistoryRecord").setAttribute('class', '');
                            document.getElementById("addEmploymentHistoryRecord").innerHTML='Add new Employer';
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
                    document.getElementById("addEmploymentHistoryRecord").setAttribute('class', '');
                    document.getElementById("addEmploymentHistoryRecord").innerHTML='Add new Employer';
                    return false;
                }
               });
    }
    driver_last_saved(dpe_Driver_ID);
    validate_employment_history(dpe_Driver_ID);
}
function deleteEmploymentHistoryRecord(dpe_ID,dpe_Driver_ID) {
        $.get("/driver/ajax-Driver-Previous-Employment/delete-Record/",
        {
            dpe_ID: dpe_ID
        }, function(data){
                document.getElementById("Employment_History_List").innerHTML=data;
                refreshEmploymentHistoryRecords(dpe_Driver_ID);
                return true;
           });
    driver_last_saved(dpe_Driver_ID);
    validate_employment_history(dpe_Driver_ID);
}
function refreshEmploymentHistoryRecords(dpe_Driver_ID) {
        $.get("/driver/ajax-Driver-Previous-Employment/get-Previous-Employment-List/",
        {
            dpe_Driver_ID: dpe_Driver_ID
        }, function(data){
                $("#Employment_History_List").hide(250);
                document.getElementById("Employment_History_List").innerHTML=data;
                clearNewEmploymentHistoryForm();
                $("#Employment_History_List").show(250);
                return true;
           });
}
function editEmploymentHistoryRecord(record_id,dpe_Driver_ID){

    //$("#driver_pe_id_"+record_id).remove();
    document.getElementById("driver_pe_id_"+record_id).innerHTML=""
    $.get("/driver/ajax-Driver-Previous-Employment/get-record/",
        {
            dpe_ID: record_id
        }, function(data){
            if(data!=false){
                document.getElementById("driver_pe_id_"+record_id).innerHTML="";
                document.getElementById("driver_pe_id_"+record_id).innerHTML=data;

                $('#edit_pe_Employment_Start_Date').datepicker({
                    showOn: "button",
                    buttonImage: "/images/select-data.gif",
                    buttonImageOnly: true,
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '1950:2020'
                  });
                $('#edit_pe_Employment_Stop_Date').datepicker({
                    showOn: "button",
                    buttonImage: "/images/select-data.gif",
                    buttonImageOnly: true,
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '1950:2020'
                  });

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
function updateEmploymentHistoryRecord(dah_ID){
    dpe_ID = document.getElementById("edit_dpe_ID").value;
    dpe_Driver_ID = document.getElementsByName("edit_dpe_Driver_ID")[0].value;
    emp_ID = document.getElementsByName("edit_emp_ID")[0].value;
    emp_Employer_Name = document.getElementsByName("edit_emp_Employer_Name")[0].value;
    emp_Address1 = document.getElementsByName("edit_emp_Address1")[0].value;
    emp_City = document.getElementsByName("edit_emp_City")[0].value;
    emp_State_ID = document.getElementsByName("edit_emp_State_ID")[0].value;
    emp_Postal_Code = document.getElementsByName("edit_emp_Postal_Code")[0].value;
    emp_Phone = document.getElementsByName("edit_emp_Phone")[0].value;
    emp_Fax = document.getElementsByName("edit_emp_Fax")[0].value;
    dpe_Position = document.getElementsByName("edit_dpe_Position")[0].value;
    dpe_Employment_Start_Date = document.getElementsByName("edit_dpe_Employment_Start_Date")[0].value;
    dpe_Employment_Stop_Date = document.getElementsByName("edit_dpe_Employment_Stop_Date")[0].value;
    dpe_Reason_for_Leaving = document.getElementsByName("edit_dpe_Reason_for_Leaving")[0].value;
    dpe_Salary = document.getElementsByName("edit_dpe_Salary")[0].value;
    emp_DOT_Safety_Sensitive_Function = document.getElementsByName("edit_emp_DOT_Safety_Sensitive_Function")[0].value;
    emp_FMCSR_Regulated = document.getElementsByName("edit_emp_FMCSR")[0].value;
    if(emp_ID==""){
        $.get("/employer/ajax-Employer/add-Record/",{
                emp_Employer_Name: emp_Employer_Name,
                emp_Address1: emp_Address1,
                emp_City: ""+emp_City+"",
                emp_State_ID: emp_State_ID,
                emp_Postal_Code: ""+emp_Postal_Code+"",
                emp_Phone: ""+emp_Phone+"",
                emp_Fax: ""+emp_Fax+"",
                emp_DOT_Safety_Sensitive_Function: ""+emp_DOT_Safety_Sensitive_Function+"",
                emp_FMCSR_Regulated: ""+emp_FMCSR_Regulated+""

            }, function(data){
                reg=/^\d+$/;
                if(reg.test(data)==true){
                    $.get("/driver/ajax-Driver-Previous-Employment/update-Record/",
                    {
                        dpe_ID: dpe_ID,
                        dpe_Driver_ID: dpe_Driver_ID,
                        dpe_Employer_ID: data,
                        dpe_Employment_Start_Date: ""+dpe_Employment_Start_Date+"",
                        dpe_Employment_Stop_Date: ""+dpe_Employment_Stop_Date+"",
                        dpe_Position: ""+dpe_Position+"",
                        dpe_Salary: dpe_Salary,
                        dpe_Reason_for_Leaving: ""+dpe_Reason_for_Leaving+""

                    }, function(data2){
                        if(data2==1){
                            refreshEmploymentHistoryRecords(dpe_Driver_ID);
                            clearNewEmploymentHistoryForm();
                            return true;
                        }else{
                            var $dialog = $('<div></div>')
                            .html(data2)
                            .dialog({
                                autoOpen: false,
                                title: 'Form validation error!',
                                minHeight: 13
                            });
                            $dialog.dialog('open');
                            document.getElementById("addEmploymentHistoryRecord").setAttribute('class', '');
                            document.getElementById("addEmploymentHistoryRecord").innerHTML='Add new Employer';
                            return false;
                        }
                       });
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
                    document.getElementById("updateEmploymentHistoryRecord").setAttribute('class', '');
                    document.getElementById("updateEmploymentHistoryRecord").innerHTML='Save';
                    return false;
                }
        });
       /**/
    }else{
        $.get("/driver/ajax-Driver-Previous-Employment/update-Record/",
            {
                dpe_ID: dpe_ID,
                dpe_Driver_ID: dpe_Driver_ID,
                dpe_Employer_ID: emp_ID,
                dpe_Employment_Start_Date: ""+dpe_Employment_Start_Date+"",
                dpe_Employment_Stop_Date: ""+dpe_Employment_Stop_Date+"",
                dpe_Position: ""+dpe_Position+"",
                dpe_Salary: dpe_Salary,
                dpe_Reason_for_Leaving: ""+dpe_Reason_for_Leaving+""

            }, function(data){
                if(data==1){
                    refreshEmploymentHistoryRecords(dpe_Driver_ID);
                    clearNewEmploymentHistoryForm();
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
                    document.getElementById("updateEmploymentHistoryRecord").setAttribute('class', '');
                    document.getElementById("updateEmploymentHistoryRecord").innerHTML='Save';
                    return false;
                }
               });
    }
    driver_last_saved(dpe_Driver_ID);
    validate_employment_history(dpe_Driver_ID);

}