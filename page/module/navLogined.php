	  <?php require_once 'module/serv/userLoginInit.php';?>
	  <div id="headNav">
	       <div class="welcom">��ӭ�㣡
		   <?php 
		   $user = new userLoginInit($_SESSION['email']);   //��¼�û����ݳ�ʼ��������
		   $user->init();                                
		   echo $_SESSION['name'];
		   ?>
		   ͯЬ</div>
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
		   <a href="../page" class="a1"><span class="navSpan">��ҳ</span></a>
		   <a  class="a1"><span class="navSpan" onclick="mesDis('��δ����')">����MyDay</span></a>
		   <a href="nt" class="a1"><span class="navSpan">֪ͨ<span id="noticeNum">5</span></span></a>
		   <span class="navSpan" id='settingBu'>����
		   <div class='settingMenu'>
		     <div class='menuBody'>
		       <div class='setUserInfo'>
			   <img src='<?php echo $avatar;?>' id='userAvatar'>
			   <div class='suiName'><?php echo $_SESSION['name'];?></div>
			   </div>
		       <a href='../page/inf&<?php echo $_SESSION['id']; ?>' class='infoChangeA'><div class="menuList">��������</div></a>
			   <a href='../page/pubs' target='_blank' class='infoChangeA'><div class="menuList">����share></div>
			  </div>
		   </div>
		   </span>
		   <a href="../page/public/logOut.php" class="a1"><span class="navSpan">�˳�</span></a>
		   </div>
	  </div>