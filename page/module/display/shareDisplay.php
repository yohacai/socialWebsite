<?php
require_once 'module/display/shareDisplayPt.php';
   class shareDisplay
   {
	 private  $contents;
	 private  $sender;
	 function __construct($contents,$sender)
	   {
	       if($contents!="")
		   {
			   $this->contents = $contents;
			   $this->sender = $sender;
			   //var_dump($this->contents);
		   }
		   else 
			   return;
	   }

     public function display()	   
	   {
		 //var_dump($this->contents);
	     for($i = 0;$i<count($this->contents);$i++)
		   {
		     disServ::display($this->contents[$i],$this->sender);
		   }
 	   }
   
   }
   class disServ
   {
       public static function display($content,$sender)
	   {
	      switch($content->category)
		   {
		    case '1' :echo shareDisplayPt::mood($content,$sender);break;
			case '2' :echo shareDisplayPt::music($content,$sender);break;
			case '3' :echo shareDisplayPt::video($content,$sender);break;
			case '4' :echo shareDisplayPt::pic($content,$sender);break;
			case '5' :echo shareDisplayPt::game($content,$sender);break;
			case '6' :;break;
		   }
	   }
   }