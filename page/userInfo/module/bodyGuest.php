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
	         <a href='../page/ava' class='avatarA'><div class='photoWallFoot'>�޸�ͷ��</div></a>
	         <div class='briefInfo'>
	              <div class='briefInfoItem'>�ǳ�:<?php echo $user['name'];?></div>
		          <div class='briefInfoItem'>���ڵ�:<?php echo $addr[0].@$addr[1];?></div>
                  <div class='briefInfoItem'>����:<?php echo $user['emotion']; ?></div>
	        </div>
	   </div>
	   <div class='infoDiv'>
	    <div class="infoMain">
	    <div class='detailedInfo'>
	    <div class='detailedHead'>����Infomation</div>
	         <div class='detInfoItem'>����:<?php echo $user['birth'];?></div>
			 <div class='detInfoItem'>��ѧ:<?php echo $user['school'];?></div>
			 <div class='detInfoItem'>ְҵ:<?php echo $user['job'];?></div>
			 <div class='detInfoItem'>����:<?php echo $user['love'];?></div>
			 <div class='detInfoItem'>want:<?php echo $user['want'];?></div>
			 <div class='detInfoShare'>Ta���������~(��δ����)</div>
	   </div>
</div>
</div>