$(function() {
	//首页轮播图1
	$("#picUpload").uploadify({
		'auto'				: true,
		'multi'				: true,
		'queueSizeLimit '   : 4,
		'fileExt'           :'*.jpg,*jpeg,*.gif,*png',
		'uploadLimit'		: 4,
		'formData'			: {'uid':'18'},
		'buttonText'		: '请选择图片',
		'height'            : 25,
		'width'             :200,
		'removeCompleted'	:false,
		'swf'				: 'userInfo/module/serv/avatar/uploadify.swf',
		'uploader'			: 'pub/module/ajax/picUpload.php',
		'fileTypeExts'		: '*.gif; *.jpg; *.jpeg; *.png;',
		'fileSizeLimit'		: '3072KB',
		'onUploadSuccess' : function(file, data, response) {
			//$.each(file,function(i,n){
			 // alert(i+"___"+n);
			//})
			//alert(data);
			var msg = $.parseJSON(data);
			if( msg.result_code == 1 ){
				//alert(msg.result_des);
				$imgDiv = $("<div></div>");
				$imgDiv.attr('class','miniImg');
				//alert(msg.result_des);
				$imgDiv.html("<img src='"+msg.result_des+"' />");
				$imgDiv.appendTo($("#"+file.id));
			}
		},
        'onSelectError': function(file, errorCode, errorMsg){
			if(errorMsg==0)
				return;
			else
			alert('你还能上传'+errorMsg+"张");return;},
		'onUploadError':function(file, errorCode, errorMsg){
             //if(errorCode==-240)
          }
    });
    });