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