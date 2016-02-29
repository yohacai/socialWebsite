var unique = 0;
function startInput1()
{
	var val = id("l_email").value;
	if(val == "请输入你的邮箱")
   id("l_email").value="";
}

function startInput2()
{
	var val = id("r_email").value;
	if(val == "请输入你的邮箱")
   id("r_email").value="";
}

function checkEmailError1()
{
    var email = id("l_email").value;
	var reg = /^(\w+[-.]?\w+)*@\w+([-.]?\w+)*\.\w+([-.]?\w+)*$/;
	if(!email.match(reg))
        id("email_error").innerText = "请填写正确的邮箱";
	else
         id("email_error").innerText = " ";
}
function checkEmailError2()
{
    var email = id("r_email").value;
	var reg = /^(\w+[-.]?\w+)*@\w+([-.]?\w+)*\.\w+([-.]?\w+)*$/;
	if(!email.match(reg))
        id("email_error").innerText = "请填写正确的邮箱";
	else
	{
		id("email_error").innerText = " "
	    checkEmailUnique(email);    
	}
}
function checkPwd1()
{
var pwd = id('l_pwd').value;
var reg = /\w{6,18}$/;
   	if(!pwd.match(reg))
        id("pwd_error").innerText = "格式:长度6-18的字母和数字";
	else
         id("pwd_error").innerText = " ";
}
function checkPwd2()
{
var pwd = id('r_pwd').value;
var reg = /\w{6,18}$/;
   	if(!pwd.match(reg))
        id("pwd_error").innerText = "格式:长度6-18的字母和数字";
	else
         id("pwd_error").innerText = " ";
}

function checkError1()
{
var pwd = id('l_pwd').value;
var reg = /\w{6,18}$/;
var error1 = pwd.match(reg);
var email = id("l_email").value;
var reg = /^(\w+[-.]?\w+)*@\w+([-.]?\w+)*\.\w+([-.]?\w+)*$/;
var error2 = email.match(reg);
if(!error1||!error2)
   id("all_error").innerText = "请检查账号和密码格式";
   else
	  
	{
		id("all_error").innerText = "";
        id('login').value = "正在登录...";
		loginPro(email,pwd); 
	}
}
function checkError2()
{
var pwd = id('r_pwd').value;
var reg = /\w{6,18}$/;
var error1 = pwd.match(reg);
var email = id("r_email").value;
var reg = /^(\w+[-.]?\w+)*@\w+([-.]?\w+)*\.\w+([-.]?\w+)*$/;
var error2 = email.match(reg);
var name = id('r_name').value;
var error3;
if(name=="")
	error3 = 1;
if(!error1||!error2||error3)
        id("all_error").innerText = "请检查账号、密码或昵称格式";
   else if(unique!=0)
        id("all_error").innerText = "账号已存在";
   else
	{
	   unique = 0;
	   id("all_error").innerText = "";
       id('reg').value = "正在注册...";
	   regPro(email,pwd,name); 
	}
}
function loginSub()
{
    id("lFormSub").submit();
}
function showLoginError(res)
{
   id("all_error").innerText = res;
      id('login').value = "登录";
}
function regSub()
{
    id("rFormSub").submit();
}
function showRegError(res)
{
   id("all_error").innerText = res;
   id('reg').value = "注册";
}
function showRegEmailError(res)
{
     id("email_error").innerText = res;
	 unique = 1;
}
function uniqueOk()
{
   unique = 0;
}