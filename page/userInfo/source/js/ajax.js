function sendInfoChange(array)
{
	var json = arrayToJson(array);
     $.post("userInfo/module/ajax/sendInfoChange.php",json,function(data){
		 //alert(data);
	  if(data==1||data==2)
		  mesDis('�޸ĳɹ�');
	  else
		  mesDis('ϵͳ��æ�����Ժ�����');
	 });
}