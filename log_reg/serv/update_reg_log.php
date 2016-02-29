<?php
require_once 'SqlHelper.php';
class update_control
{
  private $email;
    function __construct($email)
	{
	   $this->email = $email;
	}
   function update_handler()
	{
       return update_model::update_log($this->email);
	}
}
class update_model
{
   public static function update_log($email)
	{
       $db = new sqlhelper();
	   $db->db_link();
	   $sql = "update user set loginDate = now() where email = '$email'";
	   $res = $db->sql_dml($sql);
	   if($res == 1)
		   return 0;
	   else
		   return 1;
    }
}
?>