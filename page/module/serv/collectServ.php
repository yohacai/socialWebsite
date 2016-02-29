<?php
session_start();
require_once '../../public/SqlHelper.php';
class contCollect
{
	private $userId;
	private $contId;
   function __construct($userId,$contId)
	{
        if($userId!=""&&$contId!="")
		{
		  $this->userId = $userId;
		  $this->contId = $contId;
		 }
	
	}

	function insertInto()
	{
	   $db = new sqlhelper();
	   $db->db_link();
	   $sql = "select * from collect where cont_id = '$this->contId' and user_id = '$this->userId'";
	   $res1 = $db->sql_dql($sql);
	   if($res1!="")
		{
		   $sql = "delete from collect where cont_id = '$this->contId' and user_id = '$this->userId' ";
		   $res2 = $db->sql_dml($sql);
		   if($res2==1)
			   return 5;     //取消收藏成功
		   else
			   return 0;
	    }                             //取消收藏
	   else
		{
	   $sql = "insert into collect(cont_id,user_id) values('$this->contId','$this->userId')";
	   $res = $db->sql_dml($sql);
	   return $res;
		}
	}
}
?>