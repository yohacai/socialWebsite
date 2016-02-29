<?php
require_once 'SqlHelper.php';
class reg_insert
{
	private function reg_inser_handler($email,$pwd,$name)
	{
	   $db = new sqlhelper();
		$db -> db_link();
		$pwd = md5($pwd);
		$sql = "insert into user(email,pwd,name,loginDate) values('$email','$pwd','$name',now())";
		$res = $db->sql_dml($sql);
		if($res==1)
			return 0;
		else
			return 2;
	}
  public static function reg_inser_pro($email,$pwd,$name)
	{
        $reg_inser = new reg_insert();
        return $reg_inser->reg_inser_handler($email,$pwd,$name);
    }
}
?>