
function getDocumentScansList(Driver_ID,document_form_name_id){
    $("#ProgressBar").show();
    $.get("/documents/Ajax-Document-View/get-document-scans-list/",
        {
            cd_Driver_ID: Driver_ID,
            cd_Form_Name_ID: document_form_name_id
        }, function(data){
                $("#edit_document").hide();
                $("#edit_document").html("");
                $("#document_images").hide();
                document.getElementById("document_images").innerHTML="";
                document.getElementById("document_images").innerHTML=data;
                $("#ProgressBar").hide();
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
    //var patt1=/\?[0-9]+/;
    $("#document_images").hide(400);
    $("#document_images_preview_edit").css("display","block");
    $("#ProgressBar").show();
    $.get("/documents/Ajax-Document-Edit/get-Edit-Document-Form/",
        {
            cd_ID: cd_ID,
            cd_Driver_ID: cd_Driver_ID
        }, function(data){
            if(data!=""){
                $("#edit_document").hide();
                $("#edit_document").append(data);
                $("#ProgressBar").hide();
                $("#edit_document").show(400);

                var imgWidth = $("#dqf-uploaded-image-large").attr("width");
                var imgHeight = $("#dqf-uploaded-image-large").attr("height");
                $("#dqf-uploaded-image-large-width").val(imgWidth);
                $("#dqf-uploaded-image-large-height").val(imgHeight);

               //alert(patt1.test($("#dqf-uploaded-image-large").attr("src")));

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
            $("#ProgressBar").hide();
           });
}

function viewImageDocument(cd_ID,cd_Driver_ID){
    document.getElementById("edit_document").innerHTML="";
    $("#document_images_preview_view").css("display","block");
    //var patt1=/\?[0-9]+/;

    $.get("/documents/Ajax-Document-View/get-View-Document-Form/",
        {
            cd_ID: cd_ID,
            cd_Driver_ID: cd_Driver_ID
        }, function(data){
            if(data!=""){
                $("#edit_document").hide();
                $("#edit_document").append(data);
                $("#edit_document").show(400);
                $("#document_images").hide(400);

                var imgWidth = $("#dqf-uploaded-image-large").attr("width");
                var imgHeight = $("#dqf-uploaded-image-large").attr("height");
                $("#dqf-uploaded-image-large-width").val(imgWidth);
                $("#dqf-uploaded-image-large-height").val(imgHeight);

               //alert(patt1.test($("#dqf-uploaded-image-large").attr("src")));

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
    $("#ProgressBar2").css("visibility","visible");
    var cd_ID;
    var cd_Driver_ID;
    var cd_Form_Name_ID;
    var cd_Description;
    var cd_Homebase_ID;
    var cd_Company_ID;
    var cd_Fax_Status_id;
    var cd_Document_Form_Status;
    var cd_Archived;
    var cd_DOT_Regulated;
    var cd_Scan_Origin;
    var cd_Scan_Rotated;

    var cd_Current_Page;

    cd_ID = document.getElementById("cd_ID").value;
    cd_Driver_ID = document.getElementById("cd_Driver_ID").value;
    cd_Form_Name_ID = document.getElementById("cd_Form_Name_ID").value;
    cd_Company_ID = document.getElementById("cd_Company_ID").value;
    cd_Homebase_ID = document.getElementById("cd_Homebase_ID").value;
    cd_Description = document.getElementById("cd_Description").value;
    cd_Fax_Status_id = document.getElementById("cd_Fax_Status_id").value;
    cd_Document_Form_Status = document.getElementById("cd_Document_Form_Status").value;
    cd_Archived = document.getElementById("cd_Archived").value;
    cd_DOT_Regulated = document.getElementById("cd_DOT_Regulated").value;
    cd_Current_Page = document.getElementById("cd_Current_Page").value;

    cd_Scan_Origin = document.getElementById("dqf-uploaded-image-large-origin").value;
    cd_Scan_Rotated = document.getElementById("dqf-uploaded-image-large-rotated").value;
    $.get("/documents/Ajax-Document-Edit/save-Document/",
        {
            cd_ID: cd_ID,
            cd_Driver_ID: cd_Driver_ID,
            cd_Form_Name_ID: cd_Form_Name_ID,
            cd_Company_ID: cd_Company_ID,
            cd_Homebase_ID: cd_Homebase_ID,
            cd_Description: cd_Description,
            cd_Fax_Status_id: cd_Fax_Status_id,
            cd_Document_Form_Status: cd_Document_Form_Status,
            cd_Archived: cd_Archived,
            cd_DOT_Regulated: cd_DOT_Regulated,
            cd_Current_Page: cd_Current_Page,
            cd_Scan_Origin: cd_Scan_Origin,
            cd_Scan_Rotated: cd_Scan_Rotated
        }, function(data){
            if(data==1){
                document.getElementById("edit_document").innerHTML="";
                $("#edit_document").hide();
                $("#ProgressBar2").css("visibility","hidden");
                getDocumentScansList(cd_Driver_ID,cd_Form_Name_ID);
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
                $("#ProgressBar2").css("visibility","hidden");
                return false;
                
            }
           });

}

/************ IMAGE EDIT SECTION ************/
function changeLogo(company_id) {
        $.get("/company/ajax-Company/get-logo/",{ct_ID:company_id}, function(data){
            if(data!=0){
                $("#watermark").attr("src",data);
                $("#company_logo").attr("src",data);
            }else{
                
            }/*
            $('#cd_Homebase_ID option').remove();
            $('#cd_Homebase_ID').append(""+data+"");*/
        })
 }
function getHomebaseList(company_id) {
        $.get("/homebase/ajax-Homebase/get-Homebase-List/",{h_Company_Account_Number:company_id}, function(data){
            $('#cd_Homebase_ID option').remove();
            $('#cd_Homebase_ID').append(""+data+"");
        });
    changeLogo(company_id);
 }

function imageReverse(){
    var cd_Scan = $("#dqf-uploaded-image-large").attr("src");
    $("#ProgressBar2").css("visibility","visible");
    $.get("/php/imageRotate.php",
        {
            img: cd_Scan,
            angle: 180
        }, function(data){
            if(data){
                document.getElementById("dqf-uploaded-image-large").setAttribute('src', data);
                document.getElementById("dqf-uploaded-image-large-rotated").value=data;
                $("#ProgressBar2").css("visibility","hidden");
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
function imageRotateClockwise(){
    var cd_Scan = $("#dqf-uploaded-image-large").attr("src");
    $("#ProgressBar2").css("visibility","visible");

    $.get("/php/imageRotate.php",
        {
            img: cd_Scan,
            angle: 270
        }, function(data){
            if(data){
                document.getElementById("dqf-uploaded-image-large").setAttribute('src', data);
                document.getElementById("dqf-uploaded-image-large-rotated").value=data;
                $("#ProgressBar2").css("visibility","hidden");
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
function imageRotateContraclockwise(){
    var cd_Scan = $("#dqf-uploaded-image-large").attr("src");
    $("#ProgressBar2").css("visibility","visible");
    $.get("/php/imageRotate.php",
        {
            img: cd_Scan,
            angle: 90
        }, function(data){
            if(data){
                document.getElementById("dqf-uploaded-image-large").setAttribute('src', data);
                document.getElementById("dqf-uploaded-image-large-rotated").value=data;
                $("#ProgressBar2").css("visibility","hidden");
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

    if(imgWidth<=501){
        $("#watermark_box").css("overflow","hidden");
    }else{
        $("#watermark_box").css("overflow","auto");
    }


    // 0,72 - A4 side proportion
}
function imagePrint(){}
function imageDelete(){}
function imageEmailCommentForm(){
    var html;
    html = "To Email:<br/><input type='text' id='document_scan_comment_receiver' /><br/>";
    html = html + "Message:<br/><textarea cols='30' rows='4' id='document_scan_comment_body' ></textarea><br/>";
    html = html + "<input type='button' onclick='imageEmailCommentSend();' value='Send' />";
    var $dialog = $('<div id="email_scan_form"></div>')
            .html(html)
            .dialog({
        autoOpen: false,
        title: 'Email notification',
        minHeight: 13
    });
    $dialog.dialog('open');
    return false;



}

function imageEmailCommentSend(){
    document_scan_comment_receiver = $("#document_scan_comment_receiver").val();
    document_scan_comment_body = $("#document_scan_comment_body").val();
    document_scan_comment_body = $("#document_scan_comment_body").val();
     $.get("/mailing/Email-Notification/send-Document-Scan-Comment/",
        {
            to: document_scan_comment_receiver,
            text: document_scan_comment_body
        }, function(data){
            if(data==1){
                alert("Email sent!");
                $("#email_scan_form").remove();
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
}