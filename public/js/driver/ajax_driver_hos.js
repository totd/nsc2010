function updateHosAndLrfwRecord(){
    Driver_ID = document.getElementById("edit_dhos_Driver_ID").value;
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

    $.get("/driver/ajax-Driver-Hours-Of-Service/proceed-Hos/",
        {
            Driver_ID: Driver_ID,
            dhos_date: ""+edit_dhos_date+"",
            dhos_hours: ""+edit_dhos_hours+"",
            dlrfw_date: ""+edit_dlrfw_date+"",
            dlrfw_from_time: ""+edit_dlrfw_from_time+""
        }, function(data){
            if(data!=""){
                document.getElementById("Hos_and_lrfw_table").innerHTML="";
                document.getElementById("Hos_and_lrfw_table").innerHTML=data;
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
                //setTimeout("location.reload(true)",1000);
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
    driver_last_saved(Driver_ID);

}

function reloadHosAndLrfwList(){
    
}