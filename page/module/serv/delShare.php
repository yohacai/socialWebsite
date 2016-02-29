<?php
class delShare
{
  private $contId;
  private $userId;
  private $db;
    function __construct($id,$user,$db)
	{
	   $this->contId = $id;
	   $this->userId = $user;
	   $this->db = $db;
	 }
	private function getSenderByShare()
	{
	  $sql = "select sender from cont_id where cont_id = ".$this->contId;
	  $res = $this->db->sql_dql($sql);
	  if($res=="")
		  return 0;
	  else
		  return $res[0]['sender'];
	}
	private function deleteShare()
	{
	  $sql = "delete from cont_id where cont_id = ".$this->contId;
      $res = $this->db->sql_dml($sql);
	  if($res==1)
         return $res;
	  elseif($res==2)
		  return 3;
	  else
		  return 0;
	}
	 function deletes()
	{
	      $sender = $this->getSenderByShare();
		  if($sender==0)
			  return 0;
		  if($sender!=$this->userId)
			  return 2;
		  $res = $this->deleteShare();
		  return $res;
     
	}
}
?>