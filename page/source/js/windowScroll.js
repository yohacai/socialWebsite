var nowPage = 0;       //�����ҳ��
var sendPage = 0;     //�Ƿ����������ݱ�־λ
var lastPage = 0;
$(window).scroll(
function ()
{
    $heights = getScrollHeight();         //��������ײ��߶�
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
	   ajaxGetShareContent(nowPage,ctg);       //��÷�������
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
   async:false              //����ajax����Ϊͬ������
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
