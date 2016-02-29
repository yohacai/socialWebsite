<?php
  class pubInsert
  {
    private $data;
	private $ctg;
	private $db;
	function __construct($data,$ctg,$db)
	  {
		$this->db = $db;
	    $this->data = $data;
		$this->ctg = $ctg;
	  }
	  private function serv()
	  {
		$this->db->db->autocommit(false);
	    $sql = "insert into cont_id(category,sender) values('".$this->ctg."','".$this->data['id']."')";
		$res = $this->db->sql_dml($sql);
		$sql = "select LAST_INSERT_ID()";
		$idRes = $this->db->sql_dql($sql);
		$id = $idRes[0]["LAST_INSERT_ID()"];
		$sql = "insert into cont_info(id,cont_name,cont_reason,cont_main,category) values('$id','".$this->data['contName']."','".$this->data['contReason']."','".$this->data['contMain']."','".$this->ctg."')";
		$res2 = $this->db->sql_dml($sql);
		if($res==1&&$res2==1)
		  {
			$this->db->db->commit();
			return 1;
		  }
		else
		  {
			$this->db->db->rollback();
			return 0;
	      }
	  }
	function insertTo()
	  {
		$res="";
		switch($this->ctg)
		  {
		     case '1':$res = $this->serv();break;
			 case '2':$res = $this->serv();break;
			 case '3':$res = $this->serv();break;
			 case '4':$res = $this->serv();break;
			 case '5':$res = $this->serv();break;
             default: $res = 0;break;
		  }
		  return $res;
	   }
	}
?>