function clearNewLicenseForm(){
    document.getElementsByName("l_Driver_License_Number")[0].value="";
    document.getElementsByName("l_Driver_Issue_State_id")[0].value="-";
    document.getElementsByName("l_Class")[0].value="-";
    document.getElementsByName("l_Expiration_Date")[0].value="";
    document.getElementsByName("l_DOT_Regulated")[0].value="NO";
    document.getElementsByName("l_License_Restrictions")[0].value="";
    for (i = 0; i < document.getElementsByName("l_License_Endorsements").length; i++){
        document.getElementsByName("l_License_Endorsements")[i].checked=false;
    }
    document.getElementsByName("l_Points_Score")[0].value="";
    $("#add_driver_License_Table").hide();
}
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

    $.get("/driver/ajax-Driver-License/add-Record/",
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
                refreshLicenseRecords(l_Driver_ID);
                clearNewLicenseForm();
                document.getElementById("toggleDriverLicenseAdd").innerHTML='SHOW';
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
                document.getElementById("addLicenseRecord").setAttribute('class', '');
                document.getElementById("addLicenseRecord").innerHTML='Add new License';
                return false;
            }
           });
    driver_last_saved(l_Driver_ID);
}
function deleteLicenseRecord(l_ID,l_Driver_ID) {
        $.get("/driver/ajax-Driver-License/delete-Record/",
        {
            l_ID: l_ID
        }, function(data){
                refreshLicenseRecords(l_Driver_ID);
                return true;
           });
    driver_last_saved(l_Driver_ID);
}
function refreshLicenseRecords(l_Driver_ID) {
        $.get("/driver/ajax-Driver-License/get-Driver-Licenses-List/",
        {
            l_Driver_ID: l_Driver_ID
        }, function(data){
                $("#driverLicensesList").hide(250);
                document.getElementById("driverLicensesList").innerHTML=data;
                $("#driverLicensesList").show(250);
                clearNewLicenseForm();
                return true;
           });
}
function editLicenseRecord(l_ID,l_Driver_ID){

    clearNewDriverAddressForm();
    $('#add_Address_Table').hide(0);

    $.get("/driver/ajax-Driver-License/get-record/",
        {
            l_ID: l_ID
        }, function(data){
            if(data!=false){
                document.getElementById("driver_license_"+l_ID).innerHTML="";
                document.getElementById("driver_license_"+l_ID).innerHTML=data;
                $('#edit_l_Expiration_Date').datepicker({
            showOn: "button",
			buttonImage: "/images/select-data.gif",
			buttonImageOnly: true,
                   changeMonth: true,
                   changeYear: true,
                            yearRange: '1950:2020'
                  });
               // refreshLicenseRecords(l_Driver_ID);
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
function updateLicenseRecord(l_ID){
    document.getElementById("updateLicenseRecord").setAttribute('class', 'button-updating');
    document.getElementById("updateLicenseRecord").innerHTML='Updating...';
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
                refreshLicenseRecords(l_Driver_ID);
                clearNewLicenseForm();
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
                document.getElementById("updateLicenseRecord").setAttribute('class', '');
                document.getElementById("updateLicenseRecord").innerHTML="Save";
                return false;
            }
           });
    driver_last_saved(l_Driver_ID);

}