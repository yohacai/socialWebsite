<?php
class getShareId         //��÷������ݵ�id
{
   public static function getAllId($sender,$start,$db)   //���ȫ������id
	{
	  $sql = "select * from cont_id where sender = '$sender' order by cont_id desc limit $start,10";
	  $res = $db->sql_dql($sql);
	  //var_dump($res);
	  if(count($res)!=0)
		{

	      return $res;
	    }
		else
			return;
    }

	public static function getCtyId($cty,$sender,$start,$db)    //��ȡ��������id
	{
	  $sql = "select * from cont_id where category = '$cty' and sender = '$sender' order by cont_id desc limit $start,10";
      $res = $db->sql_dql($sql);
	  if(count($res)!=0)
		{
	      return $res;
	    }
		else
			return;
	}

}

class getShareCont    //ͨ��id��÷������ϸ����
{
     private $id;
	 private $allShare = array();
	 function __construct($id)
	{
	   if($id!="")
		   $this->id = $id;
	 }

   function getShareContent(shareModel $shares,$db)
	{
	   $res1 = array();
	for($i = 0;$i<count($this->id);$i++)                       
		{
		    $sql = "select * from cont_info where id = '".$this->id[$i]['cont_id']."'";
			$sql1 = "select count(*) from cont_answer where cont_id = '".$this->id[$i]['cont_id']."'";
		    $res1 = $db->sql_dql($sql);
			$res2 = $db->sql_dql($sql1);
			//var_dump($res1);
			if($res2 != 1)
			{
				$num = $res2[0]['count(*)'];
				//$num = 1000;
				$num>999?$res1[0]['num']="999+":$res1[0]['num']=$num;
			}
			else
            $res1[0]['num'] = 0;
			$res[$i]=$res1[0];

		}
	//var_dump($res);
    if($res!="")
		{  
		    $i = 0;
	        while($i < count($res))
			{
				//var_dump($res[0]);
				$share = new $shares;
			     $share->id = $res[$i]['id'];      //״̬id
                 $share->category = $res[$i]['category'];   //״̬����
				 $data['cont_name'] =  $res[$i]['cont_name'];   //״̬����
				 $data['cont_reason'] = $res[$i]['cont_reason'];                              $data['cont_main'] = $res[$i]['cont_main'];
				 $data['time']      = $res[$i]['time'];
				 $data['num']       = $res[$i]['num'];
				 $share->data = $data;
					 $this->allShare[$i] = $share;
				$i++;
			}
			
			return $this->allShare;
	    }
	else
		return;
	}

}
?>