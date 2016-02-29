<div id="head" name="top">
          <div id="headTop">
          <div class="logo" ><img src='source/img/logo.png' width='200px' ></div>
		  <div class="host_text">Hoster:</div>
		  <div class="hoster"><?php 
		  require_once 'public/SqlHelper.php';
          require_once 'module/serv/getHosterId.php';
          require_once 'public/getUserInfo.php';
         $db = new sqlhelper();
         $db->db_link();
         $hosterId = getHoster::getHostId($db);
		 $ava = getUser::getAvatar($hosterId,$db);
		 echo "<a href='inf&".$hosterId."' target='_blank'><img src='userInfo/user/".$hosterId."/avatar_200.".$ava['avatar']."'/></a>";
		   ?></div>
	      </div>    
</div>
<div id="headBack"></div>