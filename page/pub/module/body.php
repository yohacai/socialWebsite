<div id="background"><img src='source/img/bg.jpg' /></div>
<link rel="stylesheet" href="pub/source/css/uploadify.css" type="text/css" />
<div id="bodyMain">
       <?php require_once 'public/checkLogin.php';
	         if(@!$_SESSION['is_login'])
			 header("Location: ../page");
	   ?>
	<div id="contMain">
        <div class='pubHead'>
		  <div class='moodPub' id='moodPub'><div class='pubText'>����</div></div>
          <div class='musicPub'><div class='pubText'>����</div></div>
		  <div class='videoPub' id='videoPub'><div class='pubText'>��Ƶ</div></div>
		  <div class='picPub'><div class='pubText'>ͼƬ</div></div>
		  <div class='gamePub'><div class='pubText'>��Ϸ</div></div>
		</div>
		<div class='pubBody'>
		  <div id='pubVideo'class='pubDiv'>
		       <div id='videoMini'></div>
		       <div class='pubBodyHead'>��Ƶ��<span class='videoIntro'>��������Ƶ����ҳ��ַ</span></div>
			   <div class='videoUrlDiv'>��ַ��<input type='text' class='videoUrl'><button class='urlBu'>ȷ��</button></div>
			   <div class='videoError'></div>
			   <span class='videoSay'>��˵��</span>
		       <textarea class='videoArea'></textarea>
			   <div class='moodFoot'><button class='pubBu' id='videoBu'>����</button><span class='restWord' id='videoRest'>100</span></div>
		  </div>

		    <div id='musicList'>
			      <div class='MLclose'>X</div>
			      <div class='musicChoose'></div>
				  <div class='musicPage'>
					 <span class='allMusic'></span>
					 <span class='MPspan' id='MPnext' page='2'>��һҳ</span>
				     <span class='MPspan' id='MPprev' page='0'>��һҳ</span>
				  </div>
			   </div>
          <div id='pubMusic' class='pubDiv'>
		       <div class='pubBodyHead'>���֣�<span class='videoIntro'>�������������ĸ������������</span></div>
			   <div class='videoUrlDiv'>������<input type='text' class='musicName' autocomplete=''></div>
			   <span class='videoSay'>��˵��</span>
		       <textarea class='musicArea'></textarea>
			   <div class='moodFoot'><button class='pubBu' id='musicBu'>����</button><span class='restWord' id='musicRest'>100</span></div>
			   <div id='displayMusic'>
			      <div class='DMimg'></div>
				  <div class='DMswf'></div>
			   </div>
		  </div>

		  <div id='pubMood' class='pubDiv'>
		       <div class='pubBodyHead'>���飺</div>
			   <div style='margin-left:40px;margin-top:10px;'><textarea class='moodArea'></textarea></div>
			   <div class='moodFoot'><button class='pubBu' id='moodBu'>����</button><span class='restWord' id='moodRest'>200</span></div>
		  </div>

          <div id='pubPic' class='pubDiv'>
               <div class='picBodyHead'><span class='picTag'>ͼƬ(һ�����4��)��</span><input type="button" id="picUpload" value=""/></div>
			   <div style='margin-left:40px;margin-top:10px;'><textarea class='picArea'></textarea></div>
			   <div class='moodFoot'><button class='pubBu' id='picBu'>����</button><span class='restWord' id='picRest'>100</span></div>
		  </div>

		</div>
	</div>
</div>
<script src="pub/source/js/init.js"></script>