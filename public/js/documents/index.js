
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
    document.getElementById("edit_document").innerHTML="";
    $.get("/documents/Ajax-Document-Edit/get-Edit-Document-Form/",
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

                var imgWidth = $("#dqf-uploaded-image-large").attr("width");
                var imgHeight = $("#dqf-uploaded-image-large").attr("height");
                $("#dqf-uploaded-image-large-width").val(imgWidth);
                $("#dqf-uploaded-image-large-height").val(imgHeight);

                if(imgWidth<=501){
                    //album oriented scan
                    $("#watermark_box").css("overflow","hidden");
                }else{
                    // book oriented scan
                    $("#dqf-uploaded-image-large").attr("width","500");
                    $("#watermark_box").css("overflow","auto");
                }
                return true;
            }
           });
}

function saveImageDocument(){
    var cd_ID;
    var cd_Driver_ID;
    var cd_Form_Name_ID;
    var cd_Description;
    var cd_Fax_Status_id;
    var cd_Document_Form_Status;
    var cd_Archived;
    var cd_DOT_Regulated;
    var cd_Current_Page;

    cd_ID = document.getElementById("cd_ID").value;
    cd_Driver_ID = document.getElementById("cd_Driver_ID").value;
    cd_Form_Name_ID = document.getElementById("cd_Form_Name_ID").value;
    cd_Description = document.getElementById("cd_Description").value;
    cd_Fax_Status_id = document.getElementById("cd_Fax_Status_id").value;
    cd_Document_Form_Status = document.getElementById("cd_Document_Form_Status").value;
    cd_Archived = document.getElementById("cd_Archived").value;
    cd_DOT_Regulated = document.getElementById("cd_DOT_Regulated").value;
    cd_Current_Page = document.getElementById("cd_Current_Page").value;
    
    $.get("/documents/Ajax-Document-Edit/save-Document/",
        {
            cd_ID: cd_ID,
            cd_Driver_ID: cd_Driver_ID,
            cd_Form_Name_ID: cd_Form_Name_ID,
            cd_Description: cd_Description,
            cd_Fax_Status_id: cd_Fax_Status_id,
            cd_Document_Form_Status: cd_Document_Form_Status,
            cd_Archived: cd_Archived,
            cd_DOT_Regulated: cd_DOT_Regulated,
            cd_Current_Page: cd_Current_Page
        }, function(data){
            if(data==1){
                document.getElementById("edit_document").innerHTML="";
                $("#edit_document").hide();
                getDocumentScansList(cd_Driver_ID,cd_Form_Name_ID);
                $("#document_images_preview_edit").hide(400);
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

/************ IMAGE EDIT SECTION ************/
function imageReverse(){
    var cd_Scan = $("#dqf-uploaded-image-large").attr("src");
    var img;

    $.get("/php/imageRotate.php",
        {
            img: cd_Scan,
            angle: 180
        }, function(data){
            if(data){
                document.getElementById("dqf-uploaded-image-large").setAttribute('src', data);
                document.getElementById("dqf-uploaded-image-large-rotated").value=data;
                return true;
            }else{/*
                var $dialog = $('<div></div>')
                .html(data)
                .dialog({
                    autoOpen: false,
                    title: 'Form validation error!',
                    minHeight: 13
                });
                $dialog.dialog('open');
                return false;*/

            }
           });};
function imageRotateClockwise(){
    var cd_Scan = $("#dqf-uploaded-image-large").attr("src");
    var img;

    $.get("/php/imageRotate.php",
        {
            img: cd_Scan,
            angle: 270
        }, function(data){
            if(data){
                document.getElementById("dqf-uploaded-image-large").setAttribute('src', data);
                document.getElementById("dqf-uploaded-image-large-rotated").value=data;
                return true;
            }else{/*
                var $dialog = $('<div></div>')
                .html(data)
                .dialog({
                    autoOpen: false,
                    title: 'Form validation error!',
                    minHeight: 13
                });
                $dialog.dialog('open');
                return false;*/

            }
           });
    
};
function imageRotateContraclockwise(){
    var cd_Scan = $("#dqf-uploaded-image-large").attr("src");
    var img;

    $.get("/php/imageRotate.php",
        {
            img: cd_Scan,
            angle: 90
        }, function(data){
            if(data){
                document.getElementById("dqf-uploaded-image-large").setAttribute('src', data);
                document.getElementById("dqf-uploaded-image-large-rotated").value=data;
                return true;
            }else{/*
                var $dialog = $('<div></div>')
                .html(data)
                .dialog({
                    autoOpen: false,
                    title: 'Form validation error!',
                    minHeight: 13
                });
                $dialog.dialog('open');
                return false;*/

            }
           });
    }
function imageEnlargeYourPicture(mode){
    var width = $("#dqf-uploaded-image-large").attr("width");
    if(mode=="+"){
        document.getElementById("dqf-uploaded-image-large").setAttribute('width', width+50);
    }
    if(mode=="-"){
        document.getElementById("dqf-uploaded-image-large").setAttribute('width', width-50);
    }else{

    }

    var imgWidth = $("#dqf-uploaded-image-large").attr("width");
    var imgHeight = $("#dqf-uploaded-image-large").attr("height");

    if(imgWidth<=501){
        $("#watermark_box").css("overflow","hidden");
    }else{
        $("#watermark_box").css("overflow","auto");
    }


    // 0,72 - A4 side proportion
};
function imagePrint(){};
function imageDelete(){};
function imageEmailComment(){};

function clearTempImageFolder(cd_Driver_ID,cd_Form_Name_ID){

    $.get("/documents/ajax-Document-Edit/clear-Temp-Rotated-Images-Folder/",
        {
            cd_Driver_ID: cd_Driver_ID,
            cd_Form_Name_ID: cd_Form_Name_ID
        }, function(data){
            if(data==1){
                return true;
            }else{
                //TODO: сделать логирование ошибок и отправку на мыло одмину

            }
        });
};