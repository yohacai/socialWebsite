function addAnswerObj($contId,$sender,$name,$reTextCont)
{
	   $contId = "o"+$contId;
	     replyObj[$contId] = new Array();
		  replyObj[$contId]['toUser'] = $sender;      //回复给谁
		   replyObj[$contId]['name'] = $name;
		    replyObj[$contId]['cont'] = $reTextCont;
}
function returnAnswerObj($contId)
{
	//alert(replyObj.length);
   return replyObj['o'+$contId];
}

function appendAnswer(res,$id)
{
	$parent = "#"+$id + 'r';
	$avatar = $('#userAvatar').attr('src');
	$selectP = $parent + "> div[class='reMain']";
	$parentDiv = $($selectP);
  $firstDiv = $("<div></div>");
	  $firstDiv.attr("class","replyPerson");
	$secondDiv = $("<div></div>");
	  $secondDiv.attr("class","reImg");
	  $scA = $("<a></a>");
      $scA.attr("href","inf&"+user.id);
	  $scA.attr("target","_blank");
	  $scAimg = $("<img>");
	  $scAimg.attr('lang',res['sender']);
	  $scAimg.attr("src",$avatar);
	  $scAimg.appendTo($scA);
	  $scA.appendTo($secondDiv);


	  $thirdDiv = $("<div></div>");
	  $thirdDiv.attr("class","reCont");
	  $fthDiv = $("<div></div>");
	  $fthDiv.attr("class","reText");
	  //alert(res[i]['cont_info']);
	  $fthA = $("<a></a>");
	  $fthA.attr("href","inf&"+user.id);
	  $fthA.attr("target","_blank");
	  $fthSpan = $("<span></span>");
	  $fthA.text(user.name);
	  $fthP = $("<label></label>");
	  $fthP.text("："+res['cont_info']);
	  $fthSpan.attr("class","reTime");
	  $fthSpan.text("("+res['time']+")");
	  $fthA.appendTo($fthDiv);
	  $fthP.appendTo($fthDiv);
	  $fthSpan.appendTo($fthDiv);
	  
      
	  $fihDiv = $("<div></div>");
	  $fihDiv.attr("class","reFoot");
	 
	  $fthDiv.appendTo($thirdDiv);
	  $fihDiv.appendTo($thirdDiv);  
	  $secondDiv.appendTo($firstDiv);
	  	  $thirdDiv.appendTo($firstDiv); 
	  $firstDiv.prependTo($parentDiv);

}
function displayAnswer(res,$id)
{
	$parent = "#"+$id + 'r';
	$selectP = $parent + "> div[class='reMain']";
	$parentDiv = $($selectP);

   if(res.length>0)
	   {
    for(var i = 0;i<res.length;i++)
	{
		var avatar;
		//alert(res[i]['ava']);
	  if(res[i]['ava'] =="jpg"||res[i]['ava'] =="gif"||res[i]['ava'] =="png"||res[i]['ava'] =="jpeg")
		  avatar = "userInfo/user/"+res[i]['sender']+"/avatar_50."+res[i]['ava'];
	  else
		 avatar = "userInfo/default_50.jpg";
	  $firstDiv = $("<div></div>");
	  $firstDiv.attr("class","replyPerson");
	  $secondDiv = $("<div></div>");
	  $secondDiv.attr("class","reImg");
	  $scA = $("<a></a>");
      $scA.attr("href","inf&"+res[i]['sender']);
	  $scA.attr("target","_blank");
	  $scAimg = $("<img>");
	  $scAimg.attr('lang',res[i]['sender']);
	  $scAimg.attr("src",avatar);
	  $scAimg.appendTo($scA);
	  $scA.appendTo($secondDiv);


	  $thirdDiv = $("<div></div>");
	  $thirdDiv.attr("class","reCont");
	  $fthDiv = $("<div></div>");
	  $fthDiv.attr("class","reText");
	  //alert(res[i]['cont_info']);
	  $fthA = $("<a></a>");
	  $fthA.attr("href","inf&"+res[i]['sender']);
	  $fthA.attr("target","_blank");
	  $fthSpan = $("<span></span>");
	  $fthA.text(res[i]['name']);
	  $fthP = $("<label></label>");  
	  $fthP.text(": "+res[i]['cont_info']);
	  $fthSpan.attr("class","reTime");
	  $fthSpan.text("("+res[i]['time']+")");
	  $fthA.appendTo($fthDiv);
	  $fthP.appendTo($fthDiv);
	  $fthSpan.appendTo($fthDiv);
	  
      
	  $fihDiv = $("<div></div>");
	  $fihDiv.attr("class","reFoot");
	  $fihSpan = $fthSpan = $("<span></span>");
	  $fihSpan.attr("class","reToRe");
	  $fihA = $("<a></a>");
	  $fihaValue = "#reSkip"+res[i]["cont_id"];
	  $fihA.attr("href",$fihaValue);
	  $fihA.attr("class","reToReBu");
	  $fihA.text("回复");
	  $fihA.appendTo($fihSpan); 
	  $fihSpan.appendTo($fihDiv);
	  $fthDiv.appendTo($thirdDiv);
	  $fihDiv.appendTo($thirdDiv);  
	  $secondDiv.appendTo($firstDiv);
	  $thirdDiv.appendTo($firstDiv);  
	  $firstDiv.appendTo($parentDiv);
	  	
	}
		if($parentDiv.attr('lang')!="")       //如果评论大于10条，出现'更多评论'按钮
	{
		$num = $parentDiv.attr('lang')
			//alert($num);
	   $more = $("<a></a>");
	   $more.attr('href',"../page/share"+$id+"&1");
	   $more.attr('class','moreReplyA');
	   $more.attr('target',"_blank");
	   $moreDiv = $("<div></div>");
	   $moreDiv.attr('class','moreReply');
	   $moreDiv.text('后面还有'+$num+'条评论,');
	   $more.text('点击查看');
	   $more.appendTo($moreDiv);
	   $moreDiv.appendTo($parentDiv);
	}
 $('.reToRe').click(                    //给回复按钮添加事件监听
     function ()
	 {
		 $contId = $(this).children('a').attr('href');
		 $contId = $contId.split('#reSkip');
		 $contId = $contId[1];     //当前状态id
	 	  $reFoot = $(this).parent();
		  $reCont = $reFoot.parent();
		  $reImg = $reCont.prev();
		  $img = $reImg.children().children();        
		  $sender = $img.attr('lang');                //回复哪个人
		  $reText = $reFoot.prev();
		  $name = $reText.children('a').text();     //人名字
		  $reTextCont = $reText.children('label').text();    //回复的内容
		  $reTextCont = jm($reTextCont,40);    //取字符串前40个字符
		  $reMain = $reText.parent().parent().parent();     
		  $reInput = $reMain.prev('.reInput');
		  $reArea = $reInput.children('.reInputArea');
		  $reArea.val("回复@"+$name+"：");
          addAnswerObj($contId,$sender,$name,$reTextCont);

	 }
      );
	   }
	   else
	{ 
		   $nullDiv = $("<div></div>");
	       $nullDiv.attr("class","nullRe");
		   $nullDiv.text("还木有人评论啊，赶紧抢沙发吧骚年~");
		   $nullDiv.appendTo($parentDiv);
	}
	//alert($parentDiv.html());
}

function sendGetAnswerRequest($id){             //获得回复内容
$.post("module/ajax/ajaxGetsAnswer.php",{cont_id:$id},function(data)
	{
	     //alert(data);
         var res = eval(data);
		 //alert(res);
		// alert(res.length);
		 displayAnswer(res,$id);
		 nowRe = "#"+$id +"r" + "> .reMain";
		 $(nowRe).slideDown('normal');
     });

}

function sendAnswerRequest($obj,$cont,$contId)    //发送回复
{
	if($obj=="null")
	{
	    $obj['toUser'] = "";
		$obj['toCont'] = "";
	}
    $.post("module/ajax/ajaxSendAnswer.php",{toUser:$obj['toUser'],toCont:$obj['cont'],cont:$cont,contId:$contId},function(data)
	{
			if(data==1)
		{
				var cont = new Array();
				$id = "#"+$contId+"r";
                 $reInputArea = $($id).children('.reInput').children('.reInputArea');
				 $reInputArea.val("");
				cont['cont_id'] = $contId;
				cont['cont_info'] = $cont;
                cont['sender'] = 'yoha';
				cont['time'] = '0秒前';
                appendAnswer(cont,$contId)
				mesDis('回复成功');

		}
			else
		{
				alert(data);
				mesDis('系统繁忙，请稍后重试');
		}
	});
}