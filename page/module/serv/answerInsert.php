<?php
class answerInsert
{
   private $data;
   private $db;
   function __contruct($data,$db)
	{
	   $this->db = $db;
      $this->data = $data;
    }

  private function notice($user,$toUser,$toCont,$cont,$contId,$name)
	{

         $sql = "insert into notice(sender,getter,cont,toCont,cont_id,name) values('$user','$toUser','$cont','$toCont','$contId','$name')";
		 $res = $this->db->sql_dml($sql);
		 return $res;
    }
  private function contAnswer($user,$cont,$contId,$name)
	{
          $sql = "insert into cont_answer(sender,cont_id,cont_info,name) values('$user','$contId','$cont','$name')";
		  $res = $this->db->sql_dml($sql);
		  return $res;
	}
	function insertTo($user,$toUser,$toCont,$cont,$contId,$name,$db)
	{
		$format = new contFmt();       //格式化数据
		$toCont = contFmt::inputContFmt($toCont);
        $cont = contFmt::inputContFmt($cont);
        $format->cont = $toCont;
        $toCont = $format->cutCont(40);
        $this->db = $db;
		$this->db->db->autocommit(false);                  //事务处理开始
	    $res = $this->notice($user,$toUser,$toCont,$cont,$contId,$name);
		$res2 = $this->contAnswer($user,$cont,$contId,$name);
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
}