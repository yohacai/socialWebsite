<?php
@session_start();
//require_once 'public/contFmt.php';
class shareDisplayPt
{
	private static function formatTime($times)
	{
		return contFmt::formatTime($times);
	}
   public static function game($content,$sender)
	{ 
	   //var_dump($content);
	   if($content->data['num']>8)
		   $lang = "more"+($content->data['num']-8);
	   else
		   $lang = "";
	   	   	   $time = self::formatTime($content->data['time']);
                        $res = "<div class='share'>
				        <div class='shareHead'>".
						$content->data['cont_name'].
						"</div>			
						<div class='musicShareBody'>
						<div class='gameImg'>
						<a href='http://www.4399.com/flash/49523_1.htm' target='_blank'>
						<img src='".$content->data['cont_main']."'/>
												</a>
						</div>
						<div class='shareContent' id='reSkip".$content->id."'>".$content->data['cont_reason']."</div>
						</div>
						<div class='shareFoot'>
						<span class='sharePart'>����:��Ϸ</span>
						</div>
						<div class='reply' >
						<span class='shareTime'>������ ".$time."</span>
						<span class='replyBu' id='r".$content->id."'>����(".$content->data['num'].")</span>
						<span class='colBu' id='s".$content->id."'>�ղ�</span>
						";
					    if(@$_SESSION['id']==$sender)
						$res .= "<span class='delBu' id='d".$content->id."'>ɾ��</span>";
						$res .= "
						</div>	
						<div class='replyDiv' id='".$content->id."r'>
						     <div class='reInput'>
							   <textarea class='reInputArea'></textarea>
							   <button class='reBu'>�� ��</button>
							 </div>
							 <div class='reMain' lang='".$lang."'></div>
						</div>
				  </div>";
				  return $res;
    }
	public static function music($content,$sender)
	{
			   if($content->data['num']>8)
		   $lang = "more"+($content->data['num']-8);
	   else
		   $lang = "";
	   	   	   $time = self::formatTime($content->data['time']);
	   $cont = $content->data['cont_main'];
	   $cont = explode(",",$cont);
	   $img = @$cont[0];
	   $swf = @$cont[1];
	  $res = "
					  <div class='share'>
				        <div class='shareHead'>����Share</div>
						<div class='musicShareBody'>
                        <div class='album'><img src='".$img."'></div>
						<div class='shareContent' >
						<div class='xiami-player' id='".$swf."'><img src='source/img/xiami_player.png' /></div>
						<div class='musicTitle'>".$content->data['cont_name']."</div>
						</div>
						<div class='MusicShareReason' id='reSkip".$content->id."'>".$content->data['cont_reason']."</div>
						</div>
						<div class='shareFoot'>
						<span class='sharePart'>����:����</span>
						</div>
						<div class='reply' >
						<span class='shareTime'>������ ".$time."</span>
						<span class='replyBu' id='r".$content->id."'>����(".$content->data['num'].")</span>
						<span class='colBu' id='s".$content->id."'>�ղ�</span>";
					    if(@$_SESSION['id']==$sender)
						$res .= "<span class='delBu' id='d".$content->id."'>ɾ��</span>";
						$res .= "</div>	
						<div class='replyDiv' id='".$content->id."r'>
						     <div class='reInput'>
							   <textarea class='reInputArea'></textarea>
							   <button class='reBu'>�� ��</button>
							 </div>
							 <div class='reMain' lang='".$lang."'></div>
						</div>
				  </div>";
               return $res;
	}
	public static function mood($content,$sender)
	{
	   $moodPic = rand(1,10);
	   $moodPic = 'mood'.$moodPic;
	   if($content->data['num']>8)
		   $lang = "more"+($content->data['num']-8);
	   else
		   $lang = "";
	   	   	   $time = self::formatTime($content->data['time']);
	  $res = "
					  <div class='share'>
				        <div class='shareHead'>����Share</div>
						<div class='musicShareBody'>
                        <div class='album'><img src='source/img/".$moodPic.".jpg'></div>
						<div class='shareContent' id='reSkip".$content->id."'>".
                       $content->data['cont_main'].
						"</div>
						<div class='MusicShareReason'>".$content->data['cont_reason']."</div>
						</div>
						<div class='shareFoot'>
						<span class='sharePart'>����:����</span>
						</div>
						<div class='reply' >
						<span class='shareTime'>������ ".$time."</span>
						<span class='replyBu' id='r".$content->id."'>����(".$content->data['num'].")</span>
						<span class='colBu' id='s".$content->id."'>�ղ�</span>";
					    if(@$_SESSION['id']==$sender)
						$res .= "<span class='delBu' id='d".$content->id."'>ɾ��</span>";
						$res .= "</div>	
						<div class='replyDiv' id='".$content->id."r'>
						     <div class='reInput'>
							   <textarea class='reInputArea'></textarea>
							   <button class='reBu'>�� ��</button>
							 </div>
							 <div class='reMain' lang='".$lang."'></div>
						</div>
				  </div>";
				  return $res;

	}
	public static function pic($content,$sender)
	{
			   if($content->data['num']>8)
		   $lang = "more"+($content->data['num']-8);
	   else
		   $lang = "";
	   	   $time = self::formatTime($content->data['time']);
	   $res = "";
	   $imgSrc = explode(',',$content->data['cont_main']);
		$res= "
	<div class='share'>
						<div class='imgShareBody' >
						";
						for($i=0;$i<count($imgSrc);$i++)
		                {
						$res.= "<div class='imgCt'><img src='".$imgSrc[$i]."' /></div>";
						}
						$res.= "</div>
						<div class='imgShareText' id='reSkip".$content->id."'>".$content->data['cont_reason']."</div>
						<div class='shareFoot'>
						<span class='sharePart'>����:ͼƬ</span>
						</div>
						<div class='reply' >
						<span class='shareTime'>������ ".$time."</span>
						<span class='replyBu' id='r".$content->id."'>����(".$content->data['num'].")</span>
						<span class='colBu' id='s".$content->id."'>�ղ�</span>";
                         if(@$_SESSION['id']==$sender)
						$res .= "<span class='delBu' id='d".$content->id."'>ɾ��</span>";
						$res .= "</div>	
						<div class='replyDiv' id='".$content->id."r'>
						     <div class='reInput'>
							   <textarea class='reInputArea'></textarea>
							   <button class='reBu'>�� ��</button>
							 </div>
							 <div class='reMain' lang='".$lang."'></div>
						</div>
				  </div>";
				  return $res;
	}
	public static function video($content,$sender)
	{
		$main = $content->data['cont_main'];
		$main = explode(",",$main);
		$main_content = $main[0];

		$swf = $main[1];

			   if($content->data['num']>8)
		   $lang = "more"+($content->data['num']-8);
	   else
		   $lang = "";
	   	   	   $time = self::formatTime($content->data['time']);
	$res = "<div class='share'>
				        <div class='shareHead'>��ƵShare</div>
						<div class='musicShareBody'>
                        <div class='video'>
                        <div class='videoIcon'><img src='source/img/videoIcon.png'></div>
						<div class='videoClose'>X</div>
						<div class='videoPlayer' lang='".$swf."'></div>
						<div class='videoImg'><img src='
 ".$main_content."' /></div></div>
						<div class='videoContent' id='reSkip".$content->id."'>".$content->data['cont_reason']."</div>
						</div>
						<div class='shareFoot'>
						<span class='sharePart'>����:��Ƶ</span>
						</div>
						<div class='reply' >
						<span class='shareTime'>������ ".$time."</span>
						<span class='replyBu' id='r".$content->id."'>����(".$content->data['num'].")</span>
						<span class='colBu' id='s".$content->id."'>�ղ�</span>";
					    if(@$_SESSION['id']==$sender)
						$res .= "<span class='delBu' id='d".$content->id."'>ɾ��</span>";
						$res .= "</div>	
						<div class='replyDiv' id='".$content->id."r'>
						     <div class='reInput'>
							   <textarea class='reInputArea'></textarea>
							   <button class='reBu'>�� ��</button>
							 </div>
							 <div class='reMain' lang='".$lang."'></div>
						</div>
				  </div>";
				  return $res;
	}
	public static function other()
	{
	
	}
}