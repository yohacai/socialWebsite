$(function() {
	//首页轮播图1
	$("#avatarUpload").uploadify({
		'auto'				: true,
		'multi'				: false,
		'uploadLimit'		: 1,
		'formData'			: {'uid':'18'},
		'buttonText'		: '请选择图片',
		'height'            : 25,
		'width'             :200,
		'removeCompleted'	: true,
		'swf'				: 'userInfo/module/serv/avatar/uploadify.swf',
		'uploader'			: 'userInfo/module/serv/avatar/upload.php',
		'fileTypeExts'		: '*.gif; *.jpg; *.jpeg; *.png;',
		'fileSizeLimit'		: '3072KB',
		'onUploadSuccess' : function(file, data, response) {
			//alert(data);
			var msg = $.parseJSON(data);
			if( msg.result_code == 1 ){
				$("#img").val( msg.result_des );
				$("#target").attr("src",msg.result_des);
				$(".preview").attr("src",msg.result_des);
				$('#target').Jcrop({
					minSize: [50,38],
					setSelect: [0,0,200,150],
					onChange: updatePreview,
					onSelect: updatePreview,
					onSelect: updateCoords,
					aspectRatio: 1.33
				},
				function(){
					// Use the API to get the real image size
					var bounds = this.getBounds();
					boundx = bounds[0];
					boundy = bounds[1];
					// Store the API in the jcrop_api variable
					jcrop_api = this;
				});
				$('.uploadDiv').hide(1000);
				$('.saveAvatars').show(1000);
			} else {
				mesDis('上传失败，请稍后重试');
			}
		},
		'onClearQueue' : function(queueItemCount) {
            mesDis( $('#img1') );
        },
		'onCancel' : function(file) {
            mesDis('The file ' + file.name + ' was cancelled.');
        },
        'onSelectError': function(){mesDis('一次只能上传一张');
		}
    });
    
    //头像裁剪
	var jcrop_api, boundx, boundy;
	
	function updateCoords(c)
	{
		$('#x').val(c.x);
		$('#y').val(c.y);
		$('#w').val(c.w);
		$('#h').val(c.h);
	};
	function checkCoords()
	{
		if (parseInt($('#w').val())) 
			return true;
		alert('请选择图片上合适的区域');
		return false;
	};
	function updatePreview(c){
		if (parseInt(c.w) > 0){
			var rx = 200 / c.w;
			var ry = 150 / c.h;
			$('.preview').css({
				width: Math.round(rx * boundx) + 'px',
            	height: Math.round(ry * boundy) + 'px',
            	marginLeft: '-' + Math.round(rx * c.x) + 'px',
            	marginTop: '-' + Math.round(ry * c.y) + 'px'
			});
		}


	};
	
	$("#avatar_submit").click(function(){
		$img = $("#img").val();
		//alert(img);
		$x = $("#x").val();
		$y = $("#y").val();
		$w = $("#w").val();
		$h = $("#h").val();
		//alert($x+"--"+$y+"--"+$w+"--"+$h);
		if(checkCoords()){
          $.post('userInfo/module/serv/avatar/resize.php',{img:$img,x:$x,y:$y,w:$w,h:$h},function(data)
			{
		    if(data.result_code==1)
				mesDis('修改成功');
			else
				mesDis('修改失败，请稍后重试');
		    },'json')
		}
	});
});