$('.moodArea').blur(
function ()
{
   var val = formats($(this).val());
       val = jm(val,400);
	   $(this).val(val);
}
);
$("#moodBu").click(
function()
{
     var val = formats($('.moodArea').val());
       val = jm(val,400);
	   $('.moodArea').val(val);
	   if(val!="")
	   sendMoodPub(val);
}
);
$(".moodPub").click(
function ()
{
  	$('.pubDiv').hide();
    $('#pubMood').show(200);
}
);
$(".picPub").click(
function ()
{
  	$('.pubDiv').hide();
    $('#pubPic').show(200);
}
);
$(".videoPub").click(
function ()
{
  	$('.pubDiv').hide();
    $('#pubVideo').show(200);
}
);
$(".musicPub").click(
function ()
{
  	$('.pubDiv').hide();
    $('#pubMusic').show(200);
}
);

var videoImg = "";
var videoSwf = "";
var videoError = 1;
$(".urlBu").click(
function()
{
  var url = $('.videoUrl').val();
  if(url==""||typeof(url)=='undefined')
	  return;
  	$.ajaxSetup({
   async:true               //����ajax����Ϊ�첽����
       });
  $.post("pub/module/ajax/getVideo.php",{url:url},function(data)
	{
	    if(!data)
		{$('.videoError').text('�ݲ�֧�ָõ�ַ');
		  return;
		}
        $('#videoMini').html("<img src='"+data.img+"' />"); 
		videoImg = data.img;
		videoSwf = data.swf;
		$('.videoError').text('');
		videoError = 0;
    },"json");
}
);
$('.videoArea').blur(
function ()
{
   var val = formats($(this).val());
       val = jm(val,200);
	   $(this).val(val);
}
);
$("#videoBu").click(
function()
{
	if(videoError!=0)
	{
	  $('.videoError').text('������Ƶ��ַ��ʽ');
	  return;
	}
   var say = formats($('.videoArea').val());
   say = jm(say,200);
   var contMain = videoImg+","+videoSwf;
   //alert(contMain);
   $('.videoArea').val(say);
   if(videoSwf!="")
	   $.post("pub/module/ajax/pubSend.php",{cont:contMain,contReason:say,ctg:'3'},function(data)
	{
       if(data==1)
		{   
	   mesDis('����ɹ�');
	   videoImg = "";
       videoSwf = "";
       videoError = 1;
	   $('#videoMini').html("");
       $('.videoArea').val("");
       $('.videoUrl').val("");
	   $('.videoError').text('');
		}
		else
		{
		  mesDis("ϵͳ��æ�����Ժ�����");
		}
   });
}
);
$('.MLclose').click(
 function()
 {
	 $(".musicChoose").html("");
   $('#musicList').hide();
 }
);
$('#MPnext').click(
function()
{
	var pageNum = $('#MPnext').attr('page');
   $(this).attr('page',parseInt(pageNum)+1);
   $('#MPprev').attr('page',parseInt(pageNum)-1);
   getMusicList(pageNum);
}
);
$('#MPprev').click(
function()
{
	var pageNum = $('#MPprev').attr('page');
   $(this).attr('page',parseInt(pageNum)-1);
   $('#MPnext').attr('page',parseInt(pageNum)+1);
   getMusicList(pageNum);
}
);
$('.musicArea').blur(
function ()
{
   var val = formats($(this).val());
       val = jm(val,200);
	   $(this).val(val);
	   if($('#musicRest').text()<0)
   $('#musicRest').text(0);
}
);
$('#musicBu').click(
function()
{
      var val = formats($('.musicArea').val());
       val = jm(val,200);
	   $('.musicArea').val(val);
	   var img = $('.DMimg').children('img').attr('src');
	   var songId = $('.DMimg').attr('id');
	   var swf = $('.DMswf').children('embed').attr('src');
	   var contMain = img+","+songId;
	   var title = $('.DMimg').attr('title');
	   title = jm(title,26);
	   if(typeof(img)=='undefined'||typeof(swf)=='undefined')
	{
		   mesDis('�㻹δ�����κ�����');
		   return;
	}
	  $.post("pub/module/ajax/pubSend.php",{cont:contMain,contName:title,contReason:val,ctg:'2'},function(data)
	{
	  if(data==1)
		{
		  mesDis('����ɹ�');
		  $('.musicArea').val("");     //�������
		  $('.DMimg').html("");
		  $('.DMswf').html("");
		  $('.musicChoose').html("");
		  $('.musicName').val("");
		  $('#displayMusic').hide();
		}
		else
			{
			alert(data);
			mesDis('ϵͳ��æ�����Ժ�����');
			}
	  });
	   
}
);

$('.moodArea').blur(
function ()
{
   var val = formats($(this).val());
       val = jm(val,200);
	   $(this).val(val);
}
);
$("#picBu").click(
function()
{
     var val = formats($('.picArea').val());
       val = jm(val,200);
	   $('.picArea').val(val);
	   var pics = "";
	   $picObj = $(".miniImg");
	   if($picObj.length==0)
	{
		   mesDis('�����ϴ�ͼƬ');
		   return;
	}
	   for(var i = 0;i<$picObj.length;i++)
	    {
		   if(i==$picObj.length-1)
			   pics += $($picObj[i]).children('img').attr("src");
		   else
	       pics += $($picObj[i]).children('img').attr("src")+',';
	    }
	   $.ajax({
					type    : 'POST',
					async   : false,
					url     : "pub/module/ajax/pubSend.php",
					data    : {cont:pics,contReason:val,ctg:'4'},
					success : function(data) {
						mesDis('����ɹ�');
						window.setTimeout("location.reload();",1000);
					}
	   });
}
);