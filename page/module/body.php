<div id="background"><img src='source/img/bg.jpg' /></div>
<div id="bodyMain">
     <div id="headNavBack"></div>
     <?php require_once 'public/checkLogin.php'?>
      <div id="contMain">
           <div id="aboutHoster">
				 <?php require_once 'module/getHosterInfo.php';?>

				 </div>
		   </div>
		   <div id="contBody">
		          <?php require_once 'module/serv/shareHeadServ.php';?>
                <div id="shareB" style="width:700px;">
					  <?php require_once 'module/shareControl.php';?>
					  		
			  
				  </div>
		   </div>
	  </div> 
	       <div id='contLoading'>
		   <img src='source/img/loading.gif'>
		   </div>
</div>
<script src="source/js/init.js"></script>