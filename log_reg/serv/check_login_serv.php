<?php
require_once "SqlHelper.php";
class login_verify
{
	/*
      ��֤�û��������Ƿ�ƥ��
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
			   return 0;   //��֤�ɹ�
		   else
			   return 1;   //��ƥ��
		}
		else
			   return 3;     //�û��������ڻ�ϵͳ����
 	}

     public static function login_verify_serv($email,$pwd)
	 {
		 $check = new login_verify();
	   return $check->log_verify_handler($email,$pwd);
	 }
}
?>