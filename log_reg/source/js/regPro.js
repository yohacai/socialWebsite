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
	var getRes;        //在这里如何访问res这个变量？
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
		getRes = '请检查账号和密码格式';
	else 
		getRes = '系统繁忙,请重新提交';
	alert(regRes);
	    showRegError(getRes);
	  }
 }	  
 }