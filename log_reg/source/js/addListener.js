document.write("<script language='javascript' src='source/js/check.js'></script>"); 
var l_email;
var l_pwd;
var r_email;
var r_pwd;
window.onload=function(){
	 var login = id("login");
	 var login_title = id("login_title");
	 var reg = id("reg");
	 var reg_title = id("reg_title");
     l_email = id("l_email");
	 l_pwd = id("l_pwd");
	 r_email = id("r_email");
	 r_pwd = id("r_pwd");
	 login.onclick = checkError1;
	 reg.onclick =  checkError2;
     login.onsubmit = checkError1;
	 login_title.onclick = switch2;
     reg_title.onclick = switch1;
	 l_email.onclick = startInput1;
	 r_email.onclick = startInput2;
	 l_email.onblur = checkEmailError1;
     r_email.onblur = checkEmailError2;
	 l_pwd.onblur = checkPwd1;
     r_pwd.onblur = checkPwd2;
	 
                        }
