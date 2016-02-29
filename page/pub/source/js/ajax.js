function sendMoodPub($cont)
{
  $.post('pub/module/ajax/pubSend.php',{cont:$cont,ctg:'1'},function(data)
	{
	  //alert(data);
          if(data==1)
		{
			  mesDis('分享成功');
			  $('.moodArea').val("");
        }
		else
			 mesDis('系统繁忙，请稍后重试');
  });
}