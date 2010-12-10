
function clearNewDriverAddressForm(){
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
    dah_Driver_ID = document.getElementsByName("dah_Driver_ID")[0].value;
    dah_Address1 = document.getElementsByName("dah_Address1")[0].value;
    dah_City = document.getElementsByName("dah_City")[0].value;
    dah_State = document.getElementsByName("dah_State")[0].value;
    dah_Postal_Code = document.getElementsByName("dah_Postal_Code")[0].value;
    dah_Phone = document.getElementsByName("dah_Phone")[0].value;
    dah_Start_Date = document.getElementsByName("dah_Start_Date")[0].value;
    dah_End_Date = document.getElementsByName("dah_End_Date")[0].value;
    dah_Current_Address = document.getElementsByName("dah_Current_Address")[0].value;
    
    $.get("/driver/ajax-Driver-Address-History/add-Record/",
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
                refreshAddressHistoryRecords(dah_Driver_ID);
                clearNewDriverAddressForm();
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
    }
function deleteAddressHistoryRecord(dah_ID,dah_Driver_ID) {
        $.get("/driver/ajax-Driver-Address-History/delete-Record/",
        {
            dah_ID: dah_ID
        }, function(data){
                document.getElementById("currentDriverAddressHistoryList").innerHTML=data;
                refreshAddressHistoryRecords(dah_Driver_ID);
                return true;
           });
}
function refreshAddressHistoryRecords(dah_Driver_ID) {
        $.get("/driver/ajax-Driver-Address-History/get-Driver-Address-History-List/",
        {
            dah_Driver_ID: dah_Driver_ID
        }, function(data){
                $("#currentDriverAddressHistoryList").hide(250);
                document.getElementById("currentDriverAddressHistoryList").innerHTML=data;
                $("#currentDriverAddressHistoryList").show(250);
                clearNewDriverAddressForm();
                return true;
           });
}
function editAddressHistoryRecord(record_id,dah_Driver_ID){

    clearNewDriverAddressForm();
    $('#add_Address_Table').hide(0);
    document.getElementById("toggleAddressAdd").innerHTML="Show";

    $.get("/driver/ajax-driver-address-history/get-record/",
        {
            dah_ID: record_id
        }, function(data){
            if(data!=false){
                document.getElementById("addressRecordID_"+record_id).innerHTML="";
                document.getElementById("addressRecordID_"+record_id).innerHTML=data;
                $('#edit_dah_Start_Date').datepicker({
                   changeMonth: true,
                   changeYear: true,
                            yearRange: '1950:2020'
                  });
                $('#edit_dah_End_Date').datepicker({
                   changeMonth: true,
                   changeYear: true,
                            yearRange: '1950:2020'
                  });

                $("#edit_dah_City").focus().autocomplete("/driver/ajax-driver-address-history/autocomplete-Address-History/",{
                    extraParams:{"searchBy":'dah_City'}
                });
                $("#edit_dah_Postal_Code").focus().autocomplete("/driver/ajax-driver-address-history/autocomplete-Address-History/",{
                    extraParams:{"searchBy":'dah_Postal_Code'}
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
function updateAddressHistoryRecord(dah_ID){

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

    $.get("/driver/ajax-Driver-Address-History/update-Record/",
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
                refreshAddressHistoryRecords(dah_Driver_ID);
                clearNewDriverAddressForm();
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
    
}