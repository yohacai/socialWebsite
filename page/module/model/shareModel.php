<?php
class shareModel
{
   //private $sid;
   private $id;          //��ǰ�������ݵ�id
   private $category;    //����
   private $data = array("cont_name"=>"","cont_reason"=>"","cont_main"=>"","time"=>"","replyNum"=>"");   /*array('cont_name',  //����  
                           'cont_reason', //��������
                           'cont_main',   //��������  varchar(512) not null,
                            'time'         //����ʱ��
	   						    )  */
              
   function  __construct($id="",$ctg="",$data="")
	{
      if($id!=""&&$ctg!=""&&$data!="")
		{
	     $this->id = $id;
		 $this->category = $ctg;
		 $this->data = $data;
	    }
    }

	function __get($name)
	{
	   return $this->$name;  
	}

	function __set($name,$val)
	{
	 if($val!="")
		$this->$name = $val;
	 return;
	 }
}