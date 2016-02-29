<div id="background"><img src='source/img/bg.jpg' /></div>
<div id="bodyMain">
       <?php require_once 'public/checkLogin.php';?>
	<div id="contMain">
	  <?php 
	  $id = $_GET['uid'];
	 if(!preg_match("#^\d*$#",$id))
	 {
		 echo "<span style='color:white;'>³ö´íÀ²£¡</span>";
		 return;
	 }
	  if($id==$_SESSION['id'])
	   require_once 'userInfo/module/bodyHoster.php';
	   else
       require_once 'userInfo/module/bodyGuest.php';
	   ?>
	</div>
</div>
<script src="userInfo/source/js/init.js"></script>