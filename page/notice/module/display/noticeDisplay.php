<?php
class noticeDisplay
  {
	//private function
    public static function display($res,$db)
	  {
	      $allNum = $res[1];    //共多少条通知
		  $pageNum = $res[2];   //每页显示多少条
		  $notices = $res[0];  //通知内容
		  $nowPage = $res[3];
		  $ctg = $res[4];
		 if($notices=="")
			 return;
		 $pages = (int)($allNum/$pageNum)+1;
         for($i = 0 ;$i < count($notices) ;$i++)
		  {
		$avatar = getUserInfo::getAvatar($notices[$i]['sender'],$db);
		$avatar = $avatar['avatar'];
		if($avatar=="jpg"||$avatar=="gif"||$avatar=="png"||$avatar=="jpeg")
			$avatar = "userInfo/user/".$notices[$i]['sender']."/avatar_50.".$avatar;
		else
			$avatar = "userInfo/default_50.jpg";
			 if($notices[$i]['isRead']==0)
				 $class = 'noticeInfoBack';
			 else
				 $class = 'noticeInfo';
		       echo "<div class='".$class."'>
	                    <div class='noticeBody'>
		                     <div class='reNoticeBu'>回复+</div>
		                     <div class='noticeImg'><a href='../page/inf&".$notices[$i]['sender']."'><img src='".$avatar."'></a></div>
		                     <div class='noticeMain'>
			                      <div class='noticeHead' id='nu".$notices[$i]['cont_id']."'><a href='../page/inf&".$notices[$i]['sender']."' class='ntUser'>".$notices[$i]['name']."</a>
			 在 <a  class='noticeA' href='../page/share".$notices[$i]['cont_id']."&1' target='_blank'><span class='noticeToCont' id='ntContId".$notices[$i]['sender']."'>\"".$notices[$i]['toCont']."\"</a></span>回复你<span class='noticeTime' > (".contFmt::formatTime($notices[$i]['time']).")</span></div>
			<div class='noticeContent' >".$notices[$i]['cont']."</div>
			</div>
                 </div>
	<div class='noticeReply'>
		<textarea class='ntReInput'></textarea>
		<button class='ntReBu'>回复</button>
	</div>
</div>";
		  }
		  if($nowPage==1)
			  $preHref = "";
		  else
			  $preHref = "href='".$ctg."&".($nowPage-1);
		  if($nowPage==$pages)
			  $nextHref = "";
		  else
			  $nextHref = "href='".$ctg."&".($nowPage+1);
		 $pagess = "</div>
<div id='noticePages'><a class='ntPrePage' ".$preHref."'>上一页</a><a class='ntNextPage' ".$nextHref."'>下一页</a><span class='ntPageNum'>".$nowPage."/".$pages." 页</span></div>";
      echo $pagess;
	  }
  }
?>