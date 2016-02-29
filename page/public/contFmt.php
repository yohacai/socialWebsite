<?php
 class strDecode
 {
    public static function decode($str,$start, $len)
	 {
$tmpstr = ""; 
$strlen = $start + $len; 
for($i = 0; $i < $strlen; $i++) 
	{ 
if(ord(substr($str, $i, 1)) > 0xa0) 
	{ 
$tmpstr .= substr($str, $i, 2); 
$i++; 
   } 
   else 
$tmpstr .= substr($str, $i, 1); 
} 
return $tmpstr; 
	 
	 }
 }
 class contFmt     //格式化数据
 {
     private $cont;   //需要处理的内容
	// private $type;   //处理方式

     function __construct($cont="")
	 {
	        if($cont!="")
				$this->cont = $cont;
 	 }
	 function __set($name,$value)
	 {
	   $this->$name = $value;
	 }
	 public static function inputContFmt($cont)
	 {
	  if($cont != "")
		 {
		  $cont = @iconv('utf-8','gbk',$cont);	 
	  return htmlspecialchars($cont,ENT_QUOTES,'gb2312');
		 }
	  else
		  return "";
	 }
	 
	 function cutCont($length)
	 {
	    return strDecode::decode($this->cont,0,$length);
	 }
	 public static function charDecode($cont)
	 {
	     return htmlspecialchars_decode($cont,ENT_QUOTES);
	 }
	 public static function formatTime($times)
	 {
	    ini_set('date.timezone','Asia/Shanghai');
	  $time = $times;
         $day = explode(" ",$time);
		  $timess = $day[1];
         $day = $day[0];
		 $day = explode("-",$day);
		 $y = $day[0];
		 $m = $day[1];
		 $d = $day[2];
		 $timess = explode(':',$timess);
		 $h = $timess[0];
		 $i = $timess[1];
		 $s = $timess[2];
		 $nowY = @date("Y",time());
		 $nowD = @date("d",time());
		 $nowM = @date("m",time());
		 $nowH = @date("H",time());
		 $nowI = @date("i",time());
		 $nowS = @date("s",time());
		 //var_dump(date("Y:m:d H:i:s",time()));
		 //var_dump($y.$m.$d.$h.$i.$s);
		 //var_dump($nowY.$nowM.$nowD.$nowH.$nowI.$nowS);
         if($nowY>$y)
			return $m."-".$d." ".$h.":".$i;
		 else
		{
		   if($nowM>$m)
			   return $m."-".$d." ".$h.":".$i;
		   else
			{
		      if($nowD>$d)
				{
				  if($nowD-$d==1)
					{
					 return '昨天'.$h.":".$i;
				    }
				   else if($nowD-$d==2)
					{
					 return '前天'.$h.":".$i;
				    }
				  return $m."-".$d." ".$h.":".$i;
				}
			else
			{
			   if($nowH>$h)
				   return $nowH-$h."小时前";
			   else
				{
			      if($nowI>$i)
					  return $nowI-$i."分钟前";
				  else
					  return $nowS-$s."秒前";
			    }
			   }
		    }
		}
	 }
 }
 ?>