function replyInit()
{
	$('.colBu').click(
function ()
{
  var NLres = isLogin;
  if(NLres==1)
	{
  var contIdStr = $(this).attr('id');
  contIdStr = contIdStr.split('s');
  $contId = contIdStr[1];
  $.post("module/ajax/ajaxCollect.php",{contId:$contId},function(data){
	 if(data==1)
		mesDis('收藏成功');
	 else if(data==5)
	 mesDis('已取消收藏');
	 else
		mesDis('系统繁忙，请稍后再试');
  });
    }
    else
	  checkLogin();
} 
);
$('.replyBu,.colBu,.delBu').hover(
function()
{
   $(this).css('color','#336699');
},
function()
{
  $(this).css('color','#dddddd');
}
);
$('.delBu').click(
	function()
	{
	var del = confirm('确认删除?');
	if(del)
		{
   $id = $(this).attr('id');
       $id = $id.split('d');
       $id = $id[1];
	$.post("module/ajax/ajaxDelShare.php",{id:$id},function(data)
	{
		//alert(data);
	   if(data==1)
		{
		   mesDis('删除成功');
		  $("#d"+$id).parent('.reply').parent().hide(500);
          setTimeout("$('#d'+$id).parent('.reply').parent().remove()",550);
		}
		else if(data==2)
		{
		  mesDis('骚年,你没有权限');
		}
		else if(data==3)
			mesDis('该share不存在或已删除');
		else
			mesDis('系统繁忙，请稍后重试');
	});
		}
		else
			return;
	}
);
$('.replyBu').click(
function ()
{
  var $id = $(this).attr('id');
  $id = $id.split('r');
  $id = $id[1];
 // alert($id);
 	$parent = "#"+$id + 'r';
	$selectP = $parent + "> div[class='reMain']";
	$parentDiv = $($selectP);
	//alert($parentDiv.html());
	if($parentDiv.html()=="")
     sendGetAnswerRequest($id);
  var nowId = $id+"r";
  nowId = "#"+nowId;
    $nowRe = nowId + "> .reMain";
	//alert($(nowId).css("display"));
  if($(nowId).css("display") == "none")
	  {
    $(nowId).show('fast');//slideDown('normal');
	if($($nowRe).html()!="")
	$($nowRe).show('fast');
  }
  else
   {
	  $(nowId).hide('normal');
      $($nowRe).hide('fast');
   }
}
);

$('.reBu').click(            //发送回复事件监听
function()
{
  var NLres = checkLogin();
  if(NLres==0)
	  return;

  $reCont = $(this).prev(".reInputArea").val();
  $reCont = $reCont.replace(/~(\s*)|(\s*)$/g,"");
  $reCont = jm($reCont,216);
 
 //alert($reCont);
	$reDiv = $(this).parent().parent();
    $contId = $reDiv.attr('id');
	$contId = $contId.split('r');     //获得当前回复状态的Id
	$contId = $contId[0];
    
	$skip = '#reSkip'+$contId;
	$sendCont = $reCont.split("：");
	//alert($sendCont.length);
	$sendPerson = $sendCont[0];
	$sendPerson = $sendPerson.split("回复@");
	$sendPerson = $sendPerson[1];     //获得用户名
	if(!$sendPerson)//直接回复给当前状态
	{
		$shareHead = $($skip);
		$contTitle = $shareHead.text();
		//alert($contTitle);
		addAnswerObj($contId,hoster['id'],"",$contTitle);
	}

if($reCont!="")
	{

	  	$obj = returnAnswerObj($contId);       //返回格式化后的回复数据

	sendAnswerRequest($obj,$reCont,$contId);    //发送回复请求和数据
}
}

);
$('.reInputArea').blur(
  function ()
  {
  $reCont = $(this).val();
  $reCont = $reCont.trim();
  $reCont = $reCont.replace(/~(\s*)|(\s*)$/g,"");
  $reCont = jm($reCont,216);
	  $(this).val($reCont);
	  }
);
$('.NLhead span').click(
   function ()
   {
     $('#notLoginAll').hide();
	 $('#notLogin').hide();
    }
);

$('.videoReBu').click(            //发送回复事件监听
function()
{
  var NLres = checkLogin();
  if(NLres==0)
	  return;

  $reCont = $(this).prev(".reInputArea").val();
  $reCont = $reCont.replace(/(\s*)|(\s*)/g,"");
  $reCont = jm($reCont,216);
 
 //alert($reCont);
	$reDiv = $(this).parent().parent();
    $contId = $reDiv.attr('id');
	$contId = $contId.split('r');     //获得当前回复状态的Id
	$contId = $contId[0];

	$sendCont = $reCont.split("：");
	//alert($sendCont.length);
	$sendPerson = $sendCont[0];
	$sendPerson = $sendPerson.split("回复@");
	$sendPerson = $sendPerson[1];     //获得用户名
	if(!$sendPerson)//直接回复给当前状态
	{
		$shareHead = $reDiv.prevAll('.musicShareBody').children('.videoContent');
		$contTitle = $shareHead.text();
		//alert($contTitle);
		addAnswerObj($contId,hoster['id'],"",$contTitle);
	}

if($reCont!="")
	{

	  	$obj = returnAnswerObj($contId);

	sendAnswerRequest($obj,$reCont,$contId);    //发送回复请求和数据
}
}

);
}
replyInit();

function reRemove()     //移除事件监听
{
	 $(".replyBu").off();
	 $(".reBu").off();
	 $(".delBu").off();
	 $(".reInputArea").off();
	 $('.NLhead span').off();
	 $('.videoReBu').off();
	 $('.colBu').off();
}