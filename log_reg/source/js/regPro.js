function regPro(email,pwd,name)
 {   
	 var xmlHttp=ajaxFunction();
     var url="serv/regPro.php";
     var res="email="+email+"&pwd="+pwd+"&name="+name;
xmlHttp.open("POST",url,true);
xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); 
xmlHttp.send(res);
xmlHttp.onreadystatechange= function()
  {
	var getRes;        //��������η���res���������
  if(xmlHttp.readyState==4)
    {
      var regRes=xmlHttp.responseText;
	 // alert(regRes);
	 if(regRes=="0")
		{
		 regSub();
		 return;
		}
	else if(regRes=='1')
		getRes = '�����˺ź������ʽ';
	else 
		getRes = 'ϵͳ��æ,�������ύ';
	alert(regRes);
	    showRegError(getRes);
	  }
 }	  
 }