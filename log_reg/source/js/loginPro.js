function loginPro(email,pwd)
 { 
	 var xmlHttp=ajaxFunction();
     var url="serv/loginPro.php";
     var res="email="+email+"&pwd="+pwd;
xmlHttp.open("POST",url,true);
xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); 
xmlHttp.send(res);
xmlHttp.onreadystatechange= function()
  {
	var getRes;
  if(xmlHttp.readyState==4)
    {
	  
      var loginRes=xmlHttp.responseText;
	 if(loginRes==0)
		{
		 loginSub();
		 return;
         
		}
	 else if(loginRes==1)
	    getRes = '�û��������벻ƥ��';
	else if(loginRes==2)
		getRes = '�����˺ź������ʽ';
	else 
		{
		alert(getRes);
		getRes = 'ϵͳ��æ,�������ύ';}
	    showLoginError(getRes);
	  }
 }	  
 }