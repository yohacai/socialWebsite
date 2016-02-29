<?php 
  require_once 'userInfo/module/serv/getUserInfo.php';
  require_once 'public/SqlHelper.php';
     $id = $_GET['uid'];
	 $db = new sqlhelper();
	 $db->db_link();
	 $user = getUserInfo::getInfo($id,$db);
	 if($user==0)
	 return;
	 $addr = explode("&amp;",$user['address']);
	 $year = explode("-",$user['birth']);
?>
	   <div class='photoWall'>
	        <img src='<?php 
			if($user['avatar']=="jpg"||$user['avatar']=="gif"||$user['avatar']=="png"||$user['avatar']=="jpeg")
                  echo "userInfo/user/".$_SESSION['id']."/avatar_200.".$user['avatar'];
				   else
				   echo  "userInfo/default_200.jpg";?>' />
	         <a href='../page/ava' class='avatarA'><div class='photoWallFoot'>修改头像</div></a>
	         <div class='briefInfo'>
	              <div class='briefInfoItem'>昵称:<?php echo $user['name'];?></div>
		          <div class='briefInfoItem'>所在地:<?php echo $addr[0].@$addr[1];?></div>
                  <div class='briefInfoItem'>感情:<?php echo $user['emotion']; ?></div>
	        </div>
	   </div>
	   <div class='infoDiv'>
	    <div class="infoMain">
	    <div class='detailedInfo'>
	    <div class='detailedHead'>资料Infomation</div>
	         <div class='detInfoItem'>生日:<?php echo $user['birth'];?></div>
			 <div class='detInfoItem'>大学:<?php echo $user['school'];?></div>
			 <div class='detInfoItem'>职业:<?php echo $user['job'];?></div>
			 <div class='detInfoItem'>爱好:<?php echo $user['love'];?></div>
			 <div class='detInfoItem'>want:<?php echo $user['want'];?></div>
			 <div class='detInfoShare'>Ta曾分享过的~(暂未开放)</div>
	   </div>
</div>
</div>