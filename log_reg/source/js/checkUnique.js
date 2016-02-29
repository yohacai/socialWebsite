function checkEmailUnique(email)
{
   var xmlHttp=ajaxFunction();
     var url="serv/check_unique.php";
     var res="email="+email;
xmlHttp.open("POST",url,true);
xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); 
xmlHttp.send(res);
xmlHttp.onreadystatechange= function()
  {
	var theRes;
  if(xmlHttp.readyState==4)
    {
      var checkRes=xmlHttp.responseText;
	 // alert(checkRes);
	 if(checkRes==0)
		 uniqueOk();
	else 
		{
		theRes = '’À∫≈“—¥Ê‘⁄';
        showRegEmailError(theRes);
		}
	  }
 }	  
}