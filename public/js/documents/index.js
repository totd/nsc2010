
function getDocumentScansList(Driver_ID,document_form_name_id){
    $.get("/documents/Ajax-Document-View/get-document-scans-list/",
        {
            cd_Driver_ID: Driver_ID,
            cd_Form_Name_ID: document_form_name_id
        }, function(data){
                $("#edit_document").hide();
                $("#edit_document").html("");
                $("#document_images_preview_edit").hide();
                $("#document_images").hide();
                document.getElementById("document_images").innerHTML=data;
                $("#document_images").show(400);
                return true;
           });
    }
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
    
}function editImageDocument(cd_ID,cd_Driver_ID){


    $.get("/documents/Ajax-Document-View/get-Edit-Document-Form/",
        {
            cd_ID: cd_ID,
            cd_Driver_ID: cd_Driver_ID
        }, function(data){
            if(data!=""){
                $("#edit_document").hide();
                $("#edit_document").append(data);
                $("#edit_document").show(400);
                $("#document_images").hide(400);
                $("#document_images_preview_edit").show(400);
                return true;
            }
           });
}