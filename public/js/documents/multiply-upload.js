
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
					$('<li></li>').appendTo('#files').html('<img width="200px" src="/documents/_tmp/uploads/'+response+'" alt="" /><br />'+response).addClass('success');
				} else{
					$('<li></li>').appendTo('#files').text(file).addClass('error');
				}
			}
		});

	});