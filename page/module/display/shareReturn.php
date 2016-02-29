<?php
class shareReturn
{
  public static function shareRe($content,$sender)
	{
	   $res = "";
       for($i = 0;$i<count($content);$i++)
		{
	      $res[$i] = shareReturnServ::serv($content[$i],$sender);
		  $res[$i] = urlencode($res[$i]);
	    }
		return $res;
		//var_dump($content);
    }
}
class shareReturnServ
{
   public static function serv($content,$sender)
	{
      switch($content->category)
		   {
		    case '1' :return shareDisplayPt::mood($content,$sender);break;
			case '2' :return shareDisplayPt::music($content,$sender);break;
			case '3' :return shareDisplayPt::video($content,$sender);break;
			case '4' :return shareDisplayPt::pic($content,$sender);break;
			case '5' :return shareDisplayPt::game($content,$sender);break;
			case '6' :;break;
			default : return 1;break;
		   }
    }
}
?>