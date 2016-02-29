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
	    getRes = '用户名与密码不匹配';
	else if(loginRes==2)
		getRes = '请检查账号和密码格式';
	else 
		{
		alert(getRes);
		getRes = '系统繁忙,请重新提交';}
	    showLoginError(getRes);
	  }
 }	  
 }