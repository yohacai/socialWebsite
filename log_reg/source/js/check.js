var unique = 0;
function startInput1()
{
	var val = id("l_email").value;
	if(val == "�������������")
   id("l_email").value="";
}

function startInput2()
{
	var val = id("r_email").value;
	if(val == "�������������")
   id("r_email").value="";
}

function checkEmailError1()
{
    var email = id("l_email").value;
	var reg = /^(\w+[-.]?\w+)*@\w+([-.]?\w+)*\.\w+([-.]?\w+)*$/;
	if(!email.match(reg))
        id("email_error").innerText = "����д��ȷ������";
	else
         id("email_error").innerText = " ";
}
function checkEmailError2()
{
    var email = id("r_email").value;
	var reg = /^(\w+[-.]?\w+)*@\w+([-.]?\w+)*\.\w+([-.]?\w+)*$/;
	if(!email.match(reg))
        id("email_error").innerText = "����д��ȷ������";
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
        id("pwd_error").innerText = "��ʽ:����6-18����ĸ������";
	else
         id("pwd_error").innerText = " ";
}
function checkPwd2()
{
var pwd = id('r_pwd').value;
var reg = /\w{6,18}$/;
   	if(!pwd.match(reg))
        id("pwd_error").innerText = "��ʽ:����6-18����ĸ������";
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
   id("all_error").innerText = "�����˺ź������ʽ";
   else
	  
	{
		id("all_error").innerText = "";
        id('login').value = "���ڵ�¼...";
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
        id("all_error").innerText = "�����˺š�������ǳƸ�ʽ";
   else if(unique!=0)
        id("all_error").innerText = "�˺��Ѵ���";
   else
	{
	   unique = 0;
	   id("all_error").innerText = "";
       id('reg').value = "����ע��...";
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
      id('login').value = "��¼";
}
function regSub()
{
    id("rFormSub").submit();
}
function showRegError(res)
{
   id("all_error").innerText = res;
   id('reg').value = "ע��";
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