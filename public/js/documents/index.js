
function attacheImageDocument(Driver_ID, Document_ID,file_name,current_page){

    $.get("/documents/Ajax-Document-Upload/attache-image-document/",
        {
            cd_Driver_ID: Driver_ID,
            cd_Form_Name_ID: Document_ID,
            cd_Scan: ""+file_name+"",
            cd_Current_Page: current_page
        }, function(data){
            if(data==1){
                return true;
            }else{
                var $dialog = $('<div></div>')
                .html(data)
                .dialog();
                $dialog.dialog('open');
                return false;
            }
           });
    }

function deleteImageDocument(Driver_ID, Document_ID,file_name){

    $.get("/documents/Ajax-Document-Upload/delete-image-document/",
        {
            cd_Driver_ID: Driver_ID,
            cd_Form_Name_ID: Document_ID,
            cd_Scan: ""+file_name+"",
            cd_Current_Page: current_page
        }, function(data){
            if(data==1){
                var img = $(".dqf-uploaded-image");
                for( var x = 0; x < img.length; x++ ) {
                  if( img[x].getAttribute("alt") == file_name ) {
                    $(img[x]).parent().remove();
                  }
                }
                return true;
            }else{
                var $dialog = $('<div></div>')
                .html(data)
                .dialog({
                    autoOpen: false,
                    title: 'Form validation error!'
                });
                $dialog.dialog('open');
                return false;
            }
           });
}