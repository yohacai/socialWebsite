$('.reNoticeBu').click(
function ()
{
	$display = $(this).parent().next('.noticeReply').css('display');
  if($display=="none"||typeof($display)=='undefined')
  $(this).parent().next('.noticeReply').show('normal');
  else
  $(this).parent().next('.noticeReply').hide('normal');
}
);
$(".ntReInput").blur(
  function ()
  {
  $cont = $(this).val();
  $cont = $cont.trim();
  $cont = $cont.replace(/~(\s*)|(\s*)$/g,"");
  $cont= jm($cont,216);
	 $(this).val($cont);
	  }
);
$(".ntReBu").click(
function ()
{
	$reToRe = $(this).parent().prev('.noticeBody').children('.noticeMain').children('.noticeContent').text();
	$reToRe = $reToRe.replace(/(\s*)|(\s*)/g,"");;
	$reToRe = jm($reToRe,40);    //�ظ�����ĳ����
	//alert($reToRe);
    
	$contId = $(this).parent().prev('.noticeBody').children('.noticeMain').children('.noticeHead').children('.noticeA').children('.noticeToCont');
	$contId = $contId.attr('id').split("ntContId")[1];  //��õ�ǰ֪ͨ����״̬id
	
    $toUser = $(this).parent().prev('.noticeBody').children('.noticeMain').children('.noticeHead');
	$toUser = $toUser.attr('id').split('nu')[1];
	
	$toUserName = $(this).parent().prev('.noticeBody').children('.noticeMain').children('.noticeHead').children('.ntUser').text();;
	//���´���Ϊ��ȡ���ݳ��ȣ���󳤶�Ϊ216����108������
    $ntReInput = $(this).prev('.ntReInput').val();
	//$cont = $ntReInput.trim();
	$cont = $cont.replace(/~(\s*)|(\s*)$/g,"");
	$cont = formats($cont);
		//alert($cont);
	if($cont=="")
		return;
	$conts = "@"+$toUserName+": "+$cont;
	$conts= jm($conts,216);
    $(this).prev('.ntReInput').val($conts);
	$res = noticeReSend($contId,$toUser,$reToRe,$conts);
	$conts = "";
	$cont = ""
	if($res==1)
         $(this).prev('.ntReInput').val("");
}
);