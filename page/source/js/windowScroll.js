var nowPage = 0;       //请求的页码
var sendPage = 0;     //是否发送请求内容标志位
var lastPage = 0;
$(window).scroll(
function ()
{
    $heights = getScrollHeight();         //滚动条距底部高度
	$allHeight = getAllHeight();
	//alert($allHeight);
	//alert($heights);
	if($heights<1000&&$allHeight>3000)
	{
		//alert(sendPage);
		if(sendPage==0)
		{
		nowPage++;
		//alert(nowPage);
		   $('#contLoading').show();
	sendPage=1;
	var ctg = $('#all').attr('ctg');
	  if(typeof(ctg)=='undefined')
		  ctg = "";
	//alert(ctg);
	   ajaxGetShareContent(nowPage,ctg);       //获得分享内容
		}
		else
		{     
			$('#contLoading').hide();
              return;
		}
	}
}
);

function ajaxGetShareContent($nowPage,$ctg)
{
	 //alert($nowPage);
	 	$.ajaxSetup({
   async:false              //设置ajax请求为同步请求
           });
     $.post("module/ajax/ajaxGetShare.php",{page:$nowPage,ctg:$ctg},function(data){
	 $res = data;
	 //alert(data);
	 if(data==0)
		 {
		 sendPage = 1;
		 return;
		 }
	 for(var i=0;i>-1;i++)
		 {
		    if(typeof($res[i])=='undefined')
				break;
           $div = $("<p></p>");
		   $div.html(UrlDecode($res[i]));
		   //alert($div.html());
		  $div.appendTo($('#shareB'));
	     }
        	 sendPage = 0;
	 },"json");
	 reRemove();
	 removeMedia();
	 mediaInit();
	 replyInit();
}
