<?php
 class getNotice
	 {
		  private $start;
		  private $ctg;
		  private $user;
		  private $db;
		  private $nums;
		  private $page;
           function __construct($page,$ctg,$user,$db,$nums)
		   {     $this->page = $page;
                 $this->start = ($page-1)*$nums;    //从几条开始查询
				 $this->ctg = $ctg;
				 $this->user = $user;
				 $this->db = $db;
				 $this->nums = $nums;
				 //var_dump($ctg);
 		   }
		   private function getNotices()
		  {
		     $sql = "select * from notice where getter = '$this->user' order by time desc limit $this->start,$this->nums";
			 $res = $this->db->sql_dql($sql);
			 return $res;
 		   }
          private function getNoticeNum()
		  {
             $sql = "select count(*) from notice where getter = '$this->user'";
			 $res = $this->db->sql_dql($sql);
			 return $res[0]['count(*)'];
		  }
		  private function update($notices)
		 {
			  if($notices=="")
				  return;
			  $nums = count($notices) -1;
			  //$ids = $notices[$nums]['id'];
		     $sql = "update notice set isRead = 1 where id =";
			 	  for($i = 0;$i<count($notices);$i++)
			 {
				 if($i != count($notices)-1)
			      $sql.= $notices[$i]['id'].' or id=';
				 else
				 $sql.=$notices[$i]['id'];
			 }
			 //echo $sql;
			 $this->db->sql_dml($sql);
		  }
		   function select()
		   {
		     $res[0] = $this->getNotices();
			 $this->update($res[0]);
			 $res[1] = $this->getNoticeNum();
			 $res[2] = $this->nums;
			 $res[3] = $this->page;
			 $res[4] = $this->ctg;
			 return $res;
		   }
	 }
?>