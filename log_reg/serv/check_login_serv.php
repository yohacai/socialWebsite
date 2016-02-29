<?php
require_once "SqlHelper.php";
class login_verify
{
	/*
      验证用户名密码是否匹配
	*/
	private function log_verify_handler($email,$pwd) 
	{
        $db = new sqlhelper();
		$db -> db_link();
		$sql = "select pwd from user where email = '$email'";
		$res = $db->sql_dql($sql);
		$s_pwd = $res[0]['pwd'];
		if($res!=1&&$res!="")
		{
		   if($s_pwd == md5($pwd))
			   return 0;   //验证成功
		   else
			   return 1;   //不匹配
		}
		else
			   return 3;     //用户名不存在或系统错误
 	}

     public static function login_verify_serv($email,$pwd)
	 {
		 $check = new login_verify();
	   return $check->log_verify_handler($email,$pwd);
	 }
}
?>