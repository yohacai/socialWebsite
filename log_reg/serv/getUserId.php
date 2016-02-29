<?php
require_once 'SqlHelper.php';
class getUserId
{
   public static function getId($email)
	{
         $db = new sqlhelper();
		 $db->db_link();
		 $sql = "select id from user where email = '$email'";
		 $res= $db->sql_dql($sql);
		 if($res!=0)
		 {
		     return $res[0]['id'];
		 }
		 else
			 return 0;
    }
}
?>