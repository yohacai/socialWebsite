<div id="background"><img src='source/img/bg.jpg' /></div>
<link rel="stylesheet" href="pub/source/css/uploadify.css" type="text/css" />
<div id="bodyMain">
       <?php require_once 'public/checkLogin.php';
	         if(@!$_SESSION['is_login'])
			 header("Location: ../page");
	   ?>
	<div id="contMain">
        <div class='pubHead'>
		  <div class='moodPub' id='moodPub'><div class='pubText'>心情</div></div>
          <div class='musicPub'><div class='pubText'>音乐</div></div>
		  <div class='videoPub' id='videoPub'><div class='pubText'>视频</div></div>
		  <div class='picPub'><div class='pubText'>图片</div></div>
		  <div class='gamePub'><div class='pubText'>游戏</div></div>
		</div>
		<div class='pubBody'>
		  <div id='pubVideo'class='pubDiv'>
		       <div id='videoMini'></div>
		       <div class='pubBodyHead'>视频：<span class='videoIntro'>请输入视频播放页地址</span></div>
			   <div class='videoUrlDiv'>地址：<input type='text' class='videoUrl'><button class='urlBu'>确定</button></div>
			   <div class='videoError'></div>
			   <span class='videoSay'>想说：</span>
		       <textarea class='videoArea'></textarea>
			   <div class='moodFoot'><button class='pubBu' id='videoBu'>发布</button><span class='restWord' id='videoRest'>100</span></div>
		  </div>

		    <div id='musicList'>
			      <div class='MLclose'>X</div>
			      <div class='musicChoose'></div>
				  <div class='musicPage'>
					 <span class='allMusic'></span>
					 <span class='MPspan' id='MPnext' page='2'>下一页</span>
				     <span class='MPspan' id='MPprev' page='0'>上一页</span>
				  </div>
			   </div>
          <div id='pubMusic' class='pubDiv'>
		       <div class='pubBodyHead'>音乐：<span class='videoIntro'>请输入你想分享的歌曲名或歌手名</span></div>
			   <div class='videoUrlDiv'>歌曲：<input type='text' class='musicName' autocomplete=''></div>
			   <span class='videoSay'>想说：</span>
		       <textarea class='musicArea'></textarea>
			   <div class='moodFoot'><button class='pubBu' id='musicBu'>发布</button><span class='restWord' id='musicRest'>100</span></div>
			   <div id='displayMusic'>
			      <div class='DMimg'></div>
				  <div class='DMswf'></div>
			   </div>
		  </div>

		  <div id='pubMood' class='pubDiv'>
		       <div class='pubBodyHead'>心情：</div>
			   <div style='margin-left:40px;margin-top:10px;'><textarea class='moodArea'></textarea></div>
			   <div class='moodFoot'><button class='pubBu' id='moodBu'>发布</button><span class='restWord' id='moodRest'>200</span></div>
		  </div>

          <div id='pubPic' class='pubDiv'>
               <div class='picBodyHead'><span class='picTag'>图片(一次最多4张)：</span><input type="button" id="picUpload" value=""/></div>
			   <div style='margin-left:40px;margin-top:10px;'><textarea class='picArea'></textarea></div>
			   <div class='moodFoot'><button class='pubBu' id='picBu'>发布</button><span class='restWord' id='picRest'>100</span></div>
		  </div>

		</div>
	</div>
</div>
<script src="pub/source/js/init.js"></script>