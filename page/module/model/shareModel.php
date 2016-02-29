<?php
class shareModel
{
   //private $sid;
   private $id;          //当前分享内容的id
   private $category;    //分类
   private $data = array("cont_name"=>"","cont_reason"=>"","cont_main"=>"","time"=>"","replyNum"=>"");   /*array('cont_name',  //标题  
                           'cont_reason', //分享理由
                           'cont_main',   //分享内容  varchar(512) not null,
                            'time'         //分享时间
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