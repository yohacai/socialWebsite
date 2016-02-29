<?php
class answerModel
{
   private $id;
   private $content;
   private $sender;
   private $contId;
  
  function __construct($id,$content,$sender,$contId)
	{
      if($id!=""&&$content!=""&&$sender!=""&&$contId!="")
		  $this->id = $id;
	      $this->content = $content;
		  $this->sender = $sender;
		  $this->contId = $contId;
     }
  function __set($name,$val)
	{
         if($val!="")
			 $this->$name = $val;
    }
  function __get($name)
	{
     return $this->$name;
    }
}
?>