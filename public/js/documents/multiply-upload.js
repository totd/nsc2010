
	$(function(){
		var btnUpload=$('#upload');
		var status=$('#status');
		new AjaxUpload(btnUpload, {
			action: '/documents/ajax-document-upload/pre-upload/',
			name: 'uploadfile',
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg|jpeg|tiff|tif)$/.test(ext))){
					status.text('Only JPG or TIFF files are allowed');
					return false;
				}
				status.text('Uploading...');
			},
			onComplete: function(file, response){
				status.text('');
				if(response!="error"){
					driver_id = document.getElementById("driver_id").value;
                    document_form_name_id = document.getElementById("document_form_name_id").value;
                    current_page = document.getElementById("current_page").value;
                    $('<li></li>').appendTo('#files').html('<div class="dqf-uploaded-images"><img width="180" class="dqf-uploaded-image" height="" alt="'+response+'" src="/documents/_tmp/uploads/'+response+'" alt="" /><br /><a onclick="deleteImageDocument('+driver_id+', '+document_form_name_id+", '"+response+"'"+')">[delete]</a></div>').addClass('success');
                    if(current_page==0){
                        current_page++;
                        attacheImageDocument(driver_id,document_form_name_id,response,current_page);
                    }else{
                        current_page++;
                        attacheImageDocument(driver_id,document_form_name_id,response,current_page);
                    }
                    document.getElementById("current_page").value=current_page;
				} else{
					$('<li></li>').appendTo('#files').text(file).addClass('error');
				}
			}
		});

	});