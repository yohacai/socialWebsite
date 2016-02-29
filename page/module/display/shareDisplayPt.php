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
						<span class='sharePart'>分类:游戏</span>
						</div>
						<div class='reply' >
						<span class='shareTime'>分享于 ".$time."</span>
						<span class='replyBu' id='r".$content->id."'>评论(".$content->data['num'].")</span>
						<span class='colBu' id='s".$content->id."'>收藏</span>
						";
					    if(@$_SESSION['id']==$sender)
						$res .= "<span class='delBu' id='d".$content->id."'>删除</span>";
						$res .= "
						</div>	
						<div class='replyDiv' id='".$content->id."r'>
						     <div class='reInput'>
							   <textarea class='reInputArea'></textarea>
							   <button class='reBu'>回 复</button>
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
				        <div class='shareHead'>音乐Share</div>
						<div class='musicShareBody'>
                        <div class='album'><img src='".$img."'></div>
						<div class='shareContent' >
						<div class='xiami-player' id='".$swf."'><img src='source/img/xiami_player.png' /></div>
						<div class='musicTitle'>".$content->data['cont_name']."</div>
						</div>
						<div class='MusicShareReason' id='reSkip".$content->id."'>".$content->data['cont_reason']."</div>
						</div>
						<div class='shareFoot'>
						<span class='sharePart'>分类:音乐</span>
						</div>
						<div class='reply' >
						<span class='shareTime'>分享于 ".$time."</span>
						<span class='replyBu' id='r".$content->id."'>评论(".$content->data['num'].")</span>
						<span class='colBu' id='s".$content->id."'>收藏</span>";
					    if(@$_SESSION['id']==$sender)
						$res .= "<span class='delBu' id='d".$content->id."'>删除</span>";
						$res .= "</div>	
						<div class='replyDiv' id='".$content->id."r'>
						     <div class='reInput'>
							   <textarea class='reInputArea'></textarea>
							   <button class='reBu'>回 复</button>
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
				        <div class='shareHead'>心情Share</div>
						<div class='musicShareBody'>
                        <div class='album'><img src='source/img/".$moodPic.".jpg'></div>
						<div class='shareContent' id='reSkip".$content->id."'>".
                       $content->data['cont_main'].
						"</div>
						<div class='MusicShareReason'>".$content->data['cont_reason']."</div>
						</div>
						<div class='shareFoot'>
						<span class='sharePart'>分类:心情</span>
						</div>
						<div class='reply' >
						<span class='shareTime'>分享于 ".$time."</span>
						<span class='replyBu' id='r".$content->id."'>评论(".$content->data['num'].")</span>
						<span class='colBu' id='s".$content->id."'>收藏</span>";
					    if(@$_SESSION['id']==$sender)
						$res .= "<span class='delBu' id='d".$content->id."'>删除</span>";
						$res .= "</div>	
						<div class='replyDiv' id='".$content->id."r'>
						     <div class='reInput'>
							   <textarea class='reInputArea'></textarea>
							   <button class='reBu'>回 复</button>
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
						<span class='sharePart'>分类:图片</span>
						</div>
						<div class='reply' >
						<span class='shareTime'>分享于 ".$time."</span>
						<span class='replyBu' id='r".$content->id."'>评论(".$content->data['num'].")</span>
						<span class='colBu' id='s".$content->id."'>收藏</span>";
                         if(@$_SESSION['id']==$sender)
						$res .= "<span class='delBu' id='d".$content->id."'>删除</span>";
						$res .= "</div>	
						<div class='replyDiv' id='".$content->id."r'>
						     <div class='reInput'>
							   <textarea class='reInputArea'></textarea>
							   <button class='reBu'>回 复</button>
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
				        <div class='shareHead'>视频Share</div>
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
						<span class='sharePart'>分类:视频</span>
						</div>
						<div class='reply' >
						<span class='shareTime'>分享于 ".$time."</span>
						<span class='replyBu' id='r".$content->id."'>评论(".$content->data['num'].")</span>
						<span class='colBu' id='s".$content->id."'>收藏</span>";
					    if(@$_SESSION['id']==$sender)
						$res .= "<span class='delBu' id='d".$content->id."'>删除</span>";
						$res .= "</div>	
						<div class='replyDiv' id='".$content->id."r'>
						     <div class='reInput'>
							   <textarea class='reInputArea'></textarea>
							   <button class='reBu'>回 复</button>
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