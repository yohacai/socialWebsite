<div id="background"><img src='source/img/bg.jpg' /></div>
<div id="bodyMain">
     <?php require_once 'public/checkLogin.php';
	 			       $re = @$_GET['re'];
				   if($re=="")
				     $re = 'ntre';
					 ?>
	      <div id="contMain">
		      <div id="noticeLeft">
				   <div class='noticeNav' id='ntre'>评论及回复</div>
				   <div class='noticeNav' id='ntsys'>系统通知</div>
				   <div class='noticeNav' id='ntfri'>好友申请(暂未开放)</div>
				   <div class='noticeNav' id='ntpri'>私信(暂未开放)</div>
				   			  <?php 
				   echo "<script>$('#$re').css('background','#333333');</script>";
			       ?>
		      </div>
			  <div id="contBody"> 
			       <?php require_once 'notice/module/noticeList.php';?>
			  
		  </div>
</div>
<script src="notice/source/js/init.js"></script>