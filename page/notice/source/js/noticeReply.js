function noticeReSend($toUser,$contId,$reToRe,$cont)
{
	
 $.post("module/ajax/ajaxSendAnswer.php",{toUser:$toUser,toCont:$reToRe,cont:$cont,contId:$contId},function(data)
	{
	    $res ="";
	 	  $.ajaxSetup({
   async:false               //����ajax����Ϊͬ������
          });
			if(data==1)
		{       
				$res = 1;
				mesDis('�ظ��ɹ�');

		}
			else
		{
				$res = 0;
				mesDis('ϵͳ��æ�����Ժ�����');
		}
	});
	return $res;
}
