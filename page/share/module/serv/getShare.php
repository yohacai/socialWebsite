<?php
class getShare
{
   private $id;
   private $db;
   private $share;
   public function __construct($id,$share,$db)
	{
       $this->id  = $id;
	   $this->db = $db;
	   $this->share = $share;
    }
   private function getShareInfo($id,$db)
	{
       $sql = "select * from cont_info where id='$id'";
	   $res = $db->sql_dql($sql);
	   //var_dump($id);
	   if($res!="")
		   return $res[0];
	   else
		   return 0;
	}
   private function getAnswerNum($id,$db)
	{
       $sql = "select count(*) from cont_answer where cont_id = '$id'";
	   $res = $db->sql_dql($sql);
	   if($res!="")
		   return $res[0]['count(*)'];
	   else
		   return 0;
    }

   public function gets()
	{
	             $res = $this->getShareInfo($this->id,$this->db);
				 $this->share->id = $this->id;
				 if($res==0)
					 $this->share = 0;
				 else
		{
                 $this->share->category = $res['category'];   //状态分类
				 $data['cont_name'] =  $res['cont_name'];   //状态数据
				 $data['cont_reason'] = $res['cont_reason'];                              $data['cont_main'] = $res['cont_main'];
				 $data['time']      = $res['time'];
				 $data['num']       = $this->getAnswerNum($this->id,$this->db); 
				 $this->share->data = $data;
		}
		return $this->share;
    }
}
?>