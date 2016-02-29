function sendInfoChange(array)
{
	var json = arrayToJson(array);
     $.post("userInfo/module/ajax/sendInfoChange.php",json,function(data){
		 //alert(data);
	  if(data==1||data==2)
		  mesDis('修改成功');
	  else
		  mesDis('系统繁忙，请稍后重试');
	 });
}