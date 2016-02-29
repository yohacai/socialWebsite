<div id="background"><img src='source/img/bg.jpg' /></div>
<?php header("content-type:charset=ut8");?>
<link rel="stylesheet" href="userInfo/source/css/jquery.Jcrop.css" type="text/css" />
<link href="userInfo/source/css/uploadify.css" type="text/css" rel="stylesheet" />
<div id="bodyMain">
    <?php require_once 'public/checkLogin.php';?>
	<div id="contMain">
    <?php 
  require_once 'userInfo/module/serv/getUserInfo.php';
  require_once 'public/contFmt.php';
  require_once 'public/SqlHelper.php';
     $id = $_SESSION['id'];
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
		          <div class='briefInfoItem'>所在地:<?php echo $addr[0].$addr[1];?></div>
                  <div class='briefInfoItem'>感情:<?php echo $user['emotion']; ?></div>
	        </div>
	   </div>
	   	<div class='saveAvatars'>
			   <div class='oriImg'><img src="" id="target" /></div>
			   <div class='cutImg'><img class="preview" id="preview3" src="" /></div>
			   <div class='saveBuDiv'><button class='saveBu' id='avatar_submit'>保存</button></div>
		</div>
	    <div class='uploadDiv'>
		     <div class='uploadMain'>
			<input type="text" id="avatarUpload" value="" />
			<input type="hidden" id="img" name="img" />
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="w" name="w" />
			<input type="hidden" id="h" name="h" />
			</div>
	    </div>
	</div>
</div>
<script src="userInfo/source/js/avatarInit.js"></script>
