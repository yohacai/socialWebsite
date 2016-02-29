<div id="background"><img src='source/img/bg.jpg' /></div>
<div id="bodyMain">
       <?php require_once 'public/checkLogin.php';
	     $contId = @$_GET['id'];
		 $page = @$_GET['page'];
		 if($contId == "")
		 header("Location: ../page/");
		 $page=""?$page=1:$page;
	    ?>
	<div id="contMain">
        <div class='sharePageHead'><div class='SPHtext'>shareÏêÏ¸ÄÚÈİ</div></div>
		<div class='sharePageMain'>
               <?php require_once 'share/module/shareDetail.php';?>
		</div>
	</div>
</div>
<script src="share/source/js/init.js"></script>