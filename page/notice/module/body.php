<div id="background"><img src='source/img/bg.jpg' /></div>
<div id="bodyMain">
     <?php require_once 'public/checkLogin.php';
	 			       $re = @$_GET['re'];
				   if($re=="")
				     $re = 'ntre';
					 ?>
	      <div id="contMain">
		      <div id="noticeLeft">
				   <div class='noticeNav' id='ntre'>���ۼ��ظ�</div>
				   <div class='noticeNav' id='ntsys'>ϵͳ֪ͨ</div>
				   <div class='noticeNav' id='ntfri'>��������(��δ����)</div>
				   <div class='noticeNav' id='ntpri'>˽��(��δ����)</div>
				   			  <?php 
				   echo "<script>$('#$re').css('background','#333333');</script>";
			       ?>
		      </div>
			  <div id="contBody"> 
			       <?php require_once 'notice/module/noticeList.php';?>
			  
		  </div>
</div>
<script src="notice/source/js/init.js"></script>