<?php
class noticeDisplay
  {
	//private function
    public static function display($res,$db)
	  {
	      $allNum = $res[1];    //��������֪ͨ
		  $pageNum = $res[2];   //ÿҳ��ʾ������
		  $notices = $res[0];  //֪ͨ����
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
		                     <div class='reNoticeBu'>�ظ�+</div>
		                     <div class='noticeImg'><a href='../page/inf&".$notices[$i]['sender']."'><img src='".$avatar."'></a></div>
		                     <div class='noticeMain'>
			                      <div class='noticeHead' id='nu".$notices[$i]['cont_id']."'><a href='../page/inf&".$notices[$i]['sender']."' class='ntUser'>".$notices[$i]['name']."</a>
			 �� <a  class='noticeA' href='../page/share".$notices[$i]['cont_id']."&1' target='_blank'><span class='noticeToCont' id='ntContId".$notices[$i]['sender']."'>\"".$notices[$i]['toCont']."\"</a></span>�ظ���<span class='noticeTime' > (".contFmt::formatTime($notices[$i]['time']).")</span></div>
			<div class='noticeContent' >".$notices[$i]['cont']."</div>
			</div>
                 </div>
	<div class='noticeReply'>
		<textarea class='ntReInput'></textarea>
		<button class='ntReBu'>�ظ�</button>
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
<div id='noticePages'><a class='ntPrePage' ".$preHref."'>��һҳ</a><a class='ntNextPage' ".$nextHref."'>��һҳ</a><span class='ntPageNum'>".$nowPage."/".$pages." ҳ</span></div>";
      echo $pagess;
	  }
  }
?>