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
		mesDis('�ղسɹ�');
	 else if(data==5)
	 mesDis('��ȡ���ղ�');
	 else
		mesDis('ϵͳ��æ�����Ժ�����');
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
	var del = confirm('ȷ��ɾ��?');
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
		   mesDis('ɾ���ɹ�');
		  $("#d"+$id).parent('.reply').parent().hide(500);
          setTimeout("$('#d'+$id).parent('.reply').parent().remove()",550);
		}
		else if(data==2)
		{
		  mesDis('ɧ��,��û��Ȩ��');
		}
		else if(data==3)
			mesDis('��share�����ڻ���ɾ��');
		else
			mesDis('ϵͳ��æ�����Ժ�����');
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

$('.reBu').click(            //���ͻظ��¼�����
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
	$contId = $contId.split('r');     //��õ�ǰ�ظ�״̬��Id
	$contId = $contId[0];
    
	$skip = '#reSkip'+$contId;
	$sendCont = $reCont.split("��");
	//alert($sendCont.length);
	$sendPerson = $sendCont[0];
	$sendPerson = $sendPerson.split("�ظ�@");
	$sendPerson = $sendPerson[1];     //����û���
	if(!$sendPerson)//ֱ�ӻظ�����ǰ״̬
	{
		$shareHead = $($skip);
		$contTitle = $shareHead.text();
		//alert($contTitle);
		addAnswerObj($contId,hoster['id'],"",$contTitle);
	}

if($reCont!="")
	{

	  	$obj = returnAnswerObj($contId);       //���ظ�ʽ����Ļظ�����

	sendAnswerRequest($obj,$reCont,$contId);    //���ͻظ����������
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

$('.videoReBu').click(            //���ͻظ��¼�����
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
	$contId = $contId.split('r');     //��õ�ǰ�ظ�״̬��Id
	$contId = $contId[0];

	$sendCont = $reCont.split("��");
	//alert($sendCont.length);
	$sendPerson = $sendCont[0];
	$sendPerson = $sendPerson.split("�ظ�@");
	$sendPerson = $sendPerson[1];     //����û���
	if(!$sendPerson)//ֱ�ӻظ�����ǰ״̬
	{
		$shareHead = $reDiv.prevAll('.musicShareBody').children('.videoContent');
		$contTitle = $shareHead.text();
		//alert($contTitle);
		addAnswerObj($contId,hoster['id'],"",$contTitle);
	}

if($reCont!="")
	{

	  	$obj = returnAnswerObj($contId);

	sendAnswerRequest($obj,$reCont,$contId);    //���ͻظ����������
}
}

);
}
replyInit();

function reRemove()     //�Ƴ��¼�����
{
	 $(".replyBu").off();
	 $(".reBu").off();
	 $(".delBu").off();
	 $(".reInputArea").off();
	 $('.NLhead span').off();
	 $('.videoReBu').off();
	 $('.colBu').off();
}