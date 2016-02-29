	  <?php require_once 'module/serv/userLoginInit.php';?>
	  <div id="headNav">
	       <div class="welcom">欢迎你！
		   <?php 
		   $user = new userLoginInit($_SESSION['email']);   //登录用户数据初始化控制类
		   $user->init();                                
		   echo $_SESSION['name'];
		   ?>
		   童鞋</div>
		   <?php require_once 'userInfo/module/serv/getUserInfo.php';
	        require_once 'public/SqlHelper.php';
		   $db = new sqlhelper();
		   $db->db_link();
		   $avatar = getUserInfo::getAvatar($_SESSION['id'],$db);
		   $db->close();
		   if($avatar['avatar']=="jpg"||$avatar['avatar']=="gif"||$avatar['avatar']=="png"||$avatar['avatar']=="jpeg")
		     $avatar = "userInfo/user/".$_SESSION['id']."/avatar_50.".$avatar['avatar'];
			 else
			 $avatar = "userInfo/default_50.jpg";
	        ?>
		   <?php echo "<script>var user={
		            id:".$_SESSION['id'].",".
                    "name:'".$_SESSION['name'].
		     "'}</script>";?>
		   <div class="rgNav">
		   <a href="../page" class="a1"><span class="navSpan">首页</span></a>
		   <a  class="a1"><span class="navSpan" onclick="mesDis('暂未开放')">申请MyDay</span></a>
		   <a href="nt" class="a1"><span class="navSpan">通知<span id="noticeNum">5</span></span></a>
		   <span class="navSpan" id='settingBu'>设置
		   <div class='settingMenu'>
		     <div class='menuBody'>
		       <div class='setUserInfo'>
			   <img src='<?php echo $avatar;?>' id='userAvatar'>
			   <div class='suiName'><?php echo $_SESSION['name'];?></div>
			   </div>
		       <a href='../page/inf&<?php echo $_SESSION['id']; ?>' class='infoChangeA'><div class="menuList">个人资料</div></a>
			   <a href='../page/pubs' target='_blank' class='infoChangeA'><div class="menuList">发布share></div>
			  </div>
		   </div>
		   </span>
		   <a href="../page/public/logOut.php" class="a1"><span class="navSpan">退出</span></a>
		   </div>
	  </div>