<?php
class getAnswer
{
   private $contId;
   private $data;     //��ŷ������ݣ������ظ����ݺ���Ŀ
   function __construct($contId)
	{
        if($contId!="")
			$this->contId = $contId;
    }
	private function getAnswerServ($id)      //������ȡ���ظ����� ,*para ����״̬��id
	{
	   $db = $_SESSION['db'];
	   $sql = "select * from cont_answer where cont_id = '$id'  order by time desc limit 0,8";
	   $res = $db->sql_dql($sql);
	   if($res!=1)
		{
		   $this->data = $res;
		   return 1;
		}
		else
		return 0;
	}
   function getAnswer()
	{
        $res = $this->getAnswerServ($this->contId);
        if($res==1)
			return $this->data;
		else
			return $res;
    } 
}