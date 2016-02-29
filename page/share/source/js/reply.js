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