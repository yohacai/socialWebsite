<?php
  class getAnswer
  {
    private $id;
	private $db;
	private $num;
	private $start;
       function __construct($id,$db,$start,$num="")
	  {
	   $id!=""?$this->id=$id:"";
	   $this->db = $db;
	   $this->start = ($start-1)*$num;
	   if($num=="")
		   $this->num = 15;
	   else
		   $this->num = $num;
	   }
      private function getAnswers($id,$db)
	  {
	    $sql = "select * from cont_answer where cont_id='$id' order by time desc limit $this->start,$this->num";
		//var_dump($sql);
		$res = $db->sql_dql($sql);
		if($res!="")
			return $res;
		else 
			return 0;
	  }
	   public function gets()
	  {
		   //var_dump();
	      $res = $this->getAnswers($this->id,$this->db);
		  //var_dump($res);
		  return $res;
	   }
   }
?>