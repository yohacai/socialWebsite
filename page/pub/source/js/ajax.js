function sendMoodPub($cont)
{
  $.post('pub/module/ajax/pubSend.php',{cont:$cont,ctg:'1'},function(data)
	{
	  //alert(data);
          if(data==1)
		{
			  mesDis('����ɹ�');
			  $('.moodArea').val("");
        }
		else
			 mesDis('ϵͳ��æ�����Ժ�����');
  });
}