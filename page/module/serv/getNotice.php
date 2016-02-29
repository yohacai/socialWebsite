<?php
class getNotice
{
  private $id;
  private $db;
  function __construct($id,$db)
	{
     $this->id = $id;
	 $this->db = $db;
	 $this->db->db_link();
    }
  function getNum()
	{
    $sql = "select count(*) from notice where getter='$this->id' and isRead = 0";
	$res = $this->db->sql_dql($sql);
	if($res!="")
		return $res[0]['count(*)'];
	else
		return 0;
    }
}