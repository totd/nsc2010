/**
 * Created by IntelliJ IDEA.
 * User: vlad
 * Date: 22.11.2010
 * Time: 12:42:51
 * To change this template use File | Settings | File Templates.
 */


// Show/hide Driver Addresses adding form
$(document).ready(function() {
    $('#toggleAddressAdd').click(function() {
        $('#add_Address_Table').toggle(400);
        if((document.getElementById("toggleAddressAdd").innerHTML)=="SHOW"){
            document.getElementById("toggleAddressAdd").innerHTML="HIDE";
        }else{
            document.getElementById("toggleAddressAdd").innerHTML="SHOW";
        }
        return false;
    });
});
// Show/hide Driver Addresses adding form
$(document).ready(function() {
    $('#toggleEmploymentHistoryAdd').click(function() {
        $('#add_Employment_Table').toggle(400);
        if((document.getElementById("toggleEmploymentHistoryAdd").innerHTML)=="SHOW"){
            document.getElementById("toggleEmploymentHistoryAdd").innerHTML="HIDE";
        }else{
            document.getElementById("toggleEmploymentHistoryAdd").innerHTML="SHOW";
        }
        return false;
    });
});
// Show/hide Driver License adding form
$(document).ready(function() {
    $('#toggleDriverLicenseAdd').click(function() {
        $('#add_driver_License_Table').toggle(400);
        if((document.getElementById("toggleDriverLicenseAdd").innerHTML)=="SHOW"){
            document.getElementById("toggleDriverLicenseAdd").innerHTML="HIDE";
        }else{
            document.getElementById("toggleDriverLicenseAdd").innerHTML="SHOW";
        }
        return false;
    });
});
// Show/hide Driver Equipment Operated adding form
$(document).ready(function() {
    $('#toggleDriverEquipmentOperatedAdd').click(function() {
        $('#add_driver_Equipment_Operated_Table').toggle(400);
        if((document.getElementById("toggleDriverEquipmentOperatedAdd").innerHTML)=="SHOW"){
            document.getElementById("toggleDriverEquipmentOperatedAdd").innerHTML="HIDE";
        }else{
            document.getElementById("toggleDriverEquipmentOperatedAdd").innerHTML="SHOW";
        }
        return false;
    });
});
// Show/hide Driver information edit form
$(document).ready(function() {
    $('#toggleDriverInfoEdit').click(function() {
        $('#idDriverInfoView').toggle(400);
        if((document.getElementById("toggleDriverInfoEdit").innerHTML)=="EDIT"){
            document.getElementById("toggleDriverInfoEdit").innerHTML="CANCEL";
            $('#idDriverInfoEdit').show(400);
        }else{
            $('#idDriverInfoEdit').hide(400);
            document.getElementById("toggleDriverInfoEdit").innerHTML="EDIT";
        }
        return false;
    });
});
// Show/hide Driver Hours of Service edit form
$(document).ready(function() {
    $('#toggleHoS').click(function() {
        if(document.getElementById("toggleHoS").innerHTML=="EDIT"){
            document.getElementById("toggleHoS").innerHTML="CANCEL";
            $('#hos_list').hide();
            $('#lrfw_list').hide();
            $('#edit_hos_list').show(300);
            $('#edit_lrfw_list').show(300);
        }else{
            document.getElementById("toggleHoS").innerHTML="EDIT";
            $('#edit_hos_list').hide();
            $('#edit_lrfw_list').hide();
            $('#hos_list').show(300);
            $('#lrfw_list').show(300);
        }
        return false;
    });
});
// Show/hide Driver Equipment Operated edit form
$(document).ready(function() {
    $('#toggleDriverEquipmentOperated').click(function() {
        if((document.getElementById("toggleDriverEquipmentOperated").innerHTML)=="EDIT"){
            document.getElementById("toggleDriverEquipmentOperated").innerHTML="CANCEL";
            $('#driverEquipmentOperatedList').hide();
            $('#driverEquipmentOperatedListEdit').show(300);
        }else{
            document.getElementById("toggleDriverEquipmentOperated").innerHTML="EDIT";
            $('#driverEquipmentOperatedListEdit').hide();
            $('#driverEquipmentOperatedList').show(300);
        }
        return false;
    });
});
