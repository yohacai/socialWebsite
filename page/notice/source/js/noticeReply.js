function noticeReSend($toUser,$contId,$reToRe,$cont)
{
	
 $.post("module/ajax/ajaxSendAnswer.php",{toUser:$toUser,toCont:$reToRe,cont:$cont,contId:$contId},function(data)
	{
	    $res ="";
	 	  $.ajaxSetup({
   async:false               //设置ajax请求为同步请求
          });
			if(data==1)
		{       
				$res = 1;
				mesDis('回复成功');

		}
			else
		{
				$res = 0;
				mesDis('系统繁忙，请稍后重试');
		}
	});
	return $res;
}
