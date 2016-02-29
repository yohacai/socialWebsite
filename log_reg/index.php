<?php
session_start();
@session_destroy();
$_SESSION['is_login']="";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>MyDay登录注册页面</title>
<meta http-equiv="content-type" content="text/html;charset=gbk">
<link rel="stylesheet" href="source/css/indexFrame.css">
<link rel="stylesheet" href="source/css/indexLayout.css">
<link rel="icon" href="/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
</head>
<body>
<div id="headTop">
              <div class="logo"><img src="source/img/logo.png" /></div>
			  <div class="welcome">Welcome you!骚年~</div>
</div>
<div id="main">
              <div class="mainBack"></div>
              <div class="title">
			       <div class="login" id="login_title">登 录</div>
			        <div class="reg"  id="reg_title">注 册</div>
					<div class="tBack" id="tBack"></div>
			  </div>
			  <div id="email_error"></div>
			  <div id="pwd_error"></div>
			  <div id="all_error"></div>
			  <div class="mBody" id="mBody" style="margin-left:0px;">
			            <div class="lForm">
						   <form action = "../index.php" method="post" id="lFormSub">
						    <div class="formBody">
							  <div class="fLine">
							       <div class="iText" >账号</div><input class="input" type="text" name="l_email" value="请输入你的邮箱"  id="l_email">
								   <input type="text" style="display:none">
							  </div>
							  <div class="fLine">
							       <div class="iText" >密码</div><input class="input" type="password" name="l_pwd" id="l_pwd" >
							  </div>
							  <input type="button" id="login" onsubmit="javascript:void(0)" value="登录">
							</div>
							</form>
						</div>
			            <div class="rForm" style="display:none" id="rForm">
						   <form action = "../index.php" method="post" id="rFormSub">
						     <div class="formBody">
							  <div class="fLine">
							       <div class="iText" >账号</div><input autocomplete="off" class="input" type="text" name="r_email" value="请输入你的邮箱" id="r_email">
							  </div>
							  <div class="fLine">
							       <div class="iText" >密码</div><input autocomplete="off" class="input" type="password" name="r_pwd" value="" id="r_pwd"> 
							  </div>
							  <div class="fLine">
							       <div class="iText" >昵称</div><input autocomplete="off" class="input" type="text" name="r_name" value="" id="r_name"> 
							  </div>
							  <input type="button" id="reg" onsubmit="javascript:void(0)" value="注册">
							</div>
							</form>
						</div>
			  </div>
</div>
<script src="source/js/init.js"></script>
</body>
</html>