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
$('.reToRe').click(                    //���ظ���ť����¼�����
     function ()
	 {
		 $contId = $(this).children('a').attr('href');
		 $contId = $contId.split('#reSkip');
		 $contId = $contId[1];     //��ǰ״̬id
	 	  $reFoot = $(this).parent();
		  $reCont = $reFoot.parent();
		  $reImg = $reCont.prev();
		  $img = $reImg.children().children();        
		  $sender = $img.attr('lang');                //�ظ��ĸ���
		  $reText = $reFoot.prev();
		  $name = $reText.children('a').text();     //������
		  $reTextCont = $reText.children('label').text();    //�ظ�������
		  $reTextCont = jm($reTextCont,40);    //ȡ�ַ���ǰ40���ַ�
		  $reMain = $reText.parent().parent().parent();     
		  $reInput = $reMain.prev('.reInput');
		  $reArea = $reInput.children('.reInputArea');
		  $reArea.val("�ظ�@"+$name+"��");
          addAnswerObj($contId,$sender,$name,$reTextCont);

	 }
      );