<?php
class getAnswer
{
   private $contId;
   private $data;     //存放返回数据，包括回复内容和数目
   function __construct($contId)
	{
        if($contId!="")
			$this->contId = $contId;
    }
	private function getAnswerServ($id)      //从数据取出回复数据 ,*para 分享状态的id
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