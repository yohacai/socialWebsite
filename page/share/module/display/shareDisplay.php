<?php
class shareDisplay
{
    private function game($content)
	{ 
	   //var_dump($content);
	   if($content->data['num']>8)
		   $lang = "more"+($content->data['num']-8);
	   else
		   $lang = "";
                        return "<div class='share'>
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
						<span class='shareTime'>分享于".contFmt::formatTime($content->data['time'])."</span>
						<span class='replyBu' id='r".$content->id."'>评论(".$content->data['num'].")</span>
						<span class='colBu' id='s".$content->id."'>收藏</span>
						</div>	
						<div class='replyDiv' id='".$content->id."r'>
						     <div class='reInput'>
							   <textarea class='reInputArea'></textarea>
							   <button class='reBu'>回 复</button>
							 </div>
							 <div class='reMain' lang='".$lang."'>
					";
    }
	private function music($content)
	{
			   if($content->data['num']>8)
		   $lang = "more"+($content->data['num']-8);
	   else
		   $lang = "";
	  echo  "
					  <div class='share'>
				        <div class='shareHead'>音乐Share</div>
						<div class='musicShareBody'>
                        <div class='album'><img src='source/img/album.jpg'></div>
						<div class='shareContent' ><embed src='http://www.xiami.com/widget/0_1772141847/singlePlayer.swf' type='application/x-shockwave-flash' width='257' height='33' wmode='transparent'></embed>
						</div>
						<div class='MusicShareReason' id='reSkip".$content->id."'>".$content->data['cont_reason']."</div>
						</div>
						<div class='shareFoot'>
						<span class='sharePart'>分类:音乐</span>
						</div>
						<div class='reply' >
						<span class='shareTime'>分享于".contFmt::formatTime($content->data['time'])."</span>
						<span class='replyBu' id='r".$content->id."'>评论(".$content->data['num'].")</span>
						<span class='colBu' id='s".$content->id."'>收藏</span>
						</div>	
						<div class='replyDiv' id='".$content->id."r'>
						     <div class='reInput'>
							   <textarea class='reInputArea'></textarea>
							   <button class='reBu'>回 复</button>
							 </div>
							 <div class='reMain' lang='".$lang."'>
					";
	}
	private function mood($content)
	{
	   $moodPic = rand(1,5);
	   $moodPic = 'mood'.$moodPic;
	   if($content->data['num']>8)
		   $lang = "more"+($content->data['num']-8);
	   else
		   $lang = "";
	  return  "
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
						<span class='shareTime'>分享于".contFmt::formatTime($content->data['time'])."</span>
						<span class='replyBu' id='r".$content->id."'>评论(".$content->data['num'].")</span>
						<span class='colBu' id='s".$content->id."'>收藏</span>
						</div>	
						<div class='replyDiv' id='".$content->id."r'>
						     <div class='reInput'>
							   <textarea class='reInputArea'></textarea>
							   <button class='reBu'>回 复</button>
							 </div>
							 <div class='reMain' lang='".$lang."'>";

	}
	private function pic($content)
	{
			   if($content->data['num']>8)
		   $lang = "more"+($content->data['num']-8);
	   else
		   $lang = "";
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
						<span class='shareTime'>分享于".contFmt::formatTime($content->data['time'])."</span>
						<span class='replyBu' id='r".$content->id."'>评论(".$content->data['num'].")</span>
						<span class='colBu' id='s".$content->id."'>收藏</span>
						</div>	
						<div class='replyDiv' id='".$content->id."r'>
						     <div class='reInput'>
							   <textarea class='reInputArea'></textarea>
							   <button class='reBu'>回 复</button>
							 </div>
							 <div class='reMain' lang='".$lang."'>
					";
				  return $res;
	}
	private function video($content)
	{
		$main = $content->data['cont_main'];
		$main = explode(",",$main);
		$main_content = $main[0];

		$a1 = $main[0]." wmode='transparent' windowlessVideo=1 ";

			   if($content->data['num']>8)
		   $lang = "more"+($content->data['num']-8);
	   else
		   $lang = "";
	return "<div class='share'>
				        <div class='shareHead'>视频Share</div>
						<div class='musicShareBody'>
                        <div class='video'>
                        <div class='videoIcon'><img src='source/img/videoIcon.png'></div>
						<div class='videoClose'>X</div>
						<div class='videoPlayer'></div>
						<div class='videoImg'><img src='
 ".$main_content."' /></div></div>
						<div class='videoContent' id='reSkip".$content->id."'>".$content->data['cont_reason']."</div>
						</div>
						<div class='shareFoot'>
						<span class='sharePart'>分类:视频</span>
						</div>
						<div class='reply' >
						<span class='shareTime'>分享于".contFmt::formatTime($content->data['time'])."</span>
						<span class='replyBu' id='r".$content->id."'>评论(".$content->data['num'].")</span>
						<span class='colBu' id='s".$content->id."'>收藏</span>
						</div>	
						<div class='replyDiv' id='".$content->id."r'>
						     <div class='reInput'>
							   <textarea class='reInputArea'></textarea>
							   <button class='reBu'>回 复</button>
							 </div>
							 <div class='reMain' lang='".$lang."'>";
	}
	private function other()
	{
	
	}
	private function answers($answer)
	{
		if($answer==0)
			return "<div class='nullRe'>还没有人评论啊,骚年，赶紧抢沙发吧</div>";
		$res = "";
		//return count($answer);
        for($i=0;$i<count($answer);$i++)
		{
		  $res .="<div class='replyPerson'><div class='reImg'><a href='inf&".$answer[$i]['sender']."'><img lang='".$answer[$i]['sender']."' src='userInfo/user/1/avatar_50.jpg'></a></div><div class='reCont'><div class='reText'><a href='inf".$answer[$i]['sender']."'>".$answer[$i]['name']."</a><label>: ".$answer[$i]['cont_info']."</label><span class='reTime'>(".contFmt::formatTime($answer[$i]['time']).")</span></div><div class='reFoot'><span class='reToRe'><a href='#reSkip".$answer[$i]['cont_id']."' class='reToReBu'>回复</a></span></div></div></div>";
		}
		//$res .="</div></div></div>";
		return $res;
	}
	private function getPage($page,$info,$num)
	{
	   $allPage = ceil($info->data['num']/$num);
	   $nowPage = $page;
	   if($page%10!=0)
	   $page = $page+1 -($page%10);
	   else
       $page = $page-(($page-1)%10);
	if(($page-1)%10==0)
		{
				if($nowPage>10)
			{
					$prePage = $page-1;
					$res = "<div class='replyPageDiv'><a href='../page/share".$info->id."&$prePage"."#reSkip".$info->id."'><span class='replyPage'>$prePage</span></a>";
			}
				else
				$res ="<div class='replyPageDiv'>";
				$allPage>$page+9?$maxPage=$page+9:$maxPage=$allPage;
			   for($i = $page;$i<=$maxPage;$i++)
				{
				   if($i!=$nowPage)
			       $res.="<a href='../page/share".$info->id."&".$i."#reSkip".$info->id."' class='RPA'><span class='replyPage'>".$i."</span></a>";
				   else
					   $res.="<a href='../page/share".$info->id."&".$i."#reSkip".$info->id."' class='RPA'><span class='replyPageOn'>".$i."</span></a>";
			    }
				if($allPage>$page+9)
			{
				$nextPage = $page+10;
				$res.="<a href='../page/share".$info->id."&$nextPage"."#reSkip".$info->id."' class='RPA'><span class='replyPage'>>></span></a></div>";
			}
			else
				$res.="</div>";
			$res .="</div></div></div>";
			return $res;
	    }
	}
     public static function display($info,$answer,$page,$num)
	{
		 $res = "";
	    switch($info->category)
		{
		   case '1':$res = @self::mood($info);break;
		   case '2':$res = @self::music($info);break;
		   case '3':$res = @self::video($info);break;
		   case '4':$res = @self::pic($info);break;
		   case '5':$res = @self::game($info);break;
		   case '6':;break;
		   default:;break;
		}
		$res .= @self::answers($answer);
		$res .= @self::getPage($page,$info,$num);
		echo $res;
	}
}
?>