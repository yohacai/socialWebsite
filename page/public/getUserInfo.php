<?php
   class getUser
   {
       public static function getInfo($id,$db)
	   {
	      $sql = "select * from user where id= '$id'";
		  $res = $db->sql_dql($sql);
		  if($res!="")
		  return $res[0];
		  else
			  return 0;
	   }	 
	   public static function getAvatar($id,$db)
	   {
	     $sql = "select avatar from user where id ='$id'";
		 $res = $db->sql_dql($sql);
		  if($res!="")
		  return $res[0];
		  else
			  return 0;
	   }
    }
?>