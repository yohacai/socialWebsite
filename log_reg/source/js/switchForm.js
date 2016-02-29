var flag= "";
var cFlag = 0;
var clearError=0;
function clearErrors()
{
id("email_error").innerText = " ";
id("pwd_error").innerText = " ";
id("all_error").innerText = " ";
}
function switch1()
{
	if(cFlag!=0)
		 return ;
		if(clearError==0)
	{
	    clearErrors();
		clearError = 1;
	}
	cFlag = 1;
	document.getElementById("rForm").style.display="block";
        flag = window.setInterval("cah1()",8);
		
}
function switch2()
{
if(cFlag!=0)
		 return ;
	cFlag = 1;
	if(clearError==1)
	{
	    clearErrors();
		clearError = 0;
	}
	flag = window.setInterval("cah2()",8);
}
function cah1()
{
var a = document.getElementById('mBody').style.marginLeft;
var c = document.getElementById('tBack').style.left;
     if(c=="")
		   c = "100px";
      if(a=="-500px"||c=="250px")
	{
		  window.clearInterval(flag);
		  cFlag = 0;
            return;
	}
	var b = a.split("px");
	b = parseInt(b[0]);

	var e = c.split("px");
	e = parseInt(e[0]);
document.getElementById('mBody').style.marginLeft = (b-20)+"px";
document.getElementById('tBack').style.left = (e+6)+"px";
}
function cah2()
{
var a = document.getElementById('mBody').style.marginLeft;
var c = document.getElementById('tBack').style.left;
      if(a=="0px")
	{
		  window.clearInterval(flag);
		  cFlag = 0;
            return;
	}
	var b = a.split("px");
	b = parseInt(b[0]);

	var e = c.split("px");
	e = parseInt(e[0]);
document.getElementById('mBody').style.marginLeft = (b+20)+"px";
document.getElementById('tBack').style.left = (e-6)+"px";
}
