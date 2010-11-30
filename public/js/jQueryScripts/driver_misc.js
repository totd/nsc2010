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
        //if((document.getElementById("#toggleAddressAdd").innerHTML)=="Show"){
        if((document.getElementById("toggleAddressAdd").innerHTML)=="Show"){
            document.getElementById("toggleAddressAdd").innerHTML="Hide";
        }else{
            document.getElementById("toggleAddressAdd").innerHTML="Show";
        }
        return false;
    });
});
// Show/hide Driver Addresses adding form
$(document).ready(function() {
    $('#toggleEmploymentHistoryAdd').click(function() {
        $('#add_Employment_Table').toggle(400);
        if((document.getElementById("toggleEmploymentHistoryAdd").innerHTML)=="Show"){
            document.getElementById("toggleEmploymentHistoryAdd").innerHTML="Hide";
        }else{
            document.getElementById("toggleEmploymentHistoryAdd").innerHTML="Show";
        }
        return false;
    });
});
// Show/hide Driver License adding form
$(document).ready(function() {
    $('#toggleDriverLicenseAdd').click(function() {
        $('#add_driver_License_Table').toggle(400);
        if((document.getElementById("toggleDriverLicenseAdd").innerHTML)=="Show"){
            document.getElementById("toggleDriverLicenseAdd").innerHTML="Hide";
        }else{
            document.getElementById("toggleDriverLicenseAdd").innerHTML="Show";
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