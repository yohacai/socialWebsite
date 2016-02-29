var isLogin = "";
var replyObj = new Array();    //回复对象
checkLogins();
var hoster = new Array();

function getHosterInfo()   //获得hoster信息
{
	  $.ajaxSetup({
   async:false               //设置ajax请求为同步请求
       });
    $.post('module/ajax/ajaxGetHosterInfo.php',{},function(data)
	{
	   hoster['id'] = data;
	});
}
getHosterInfo();


function jm(str,end){
var len = 0;  
var realLen = 0;
var lens = new Array();
    for (var i=0; i<str.length; i++) {   
     var c = str.charCodeAt(i);   
    //单字节加1   
     if ((c >= 0x0001 && c <= 0x007e) || (0xff60<=c && c<=0xff9f)) {   
       len++;   
     }   
     else {   
      len+=2;   
     }  
	 if(len==end)
		 realLen = i;
    }   
	     lens[0] = len;
	     lens[1] = realLen;
		 if(lens[1]=="")
			 realLen = 100000;
		 realLen +=1;
    return str.substring(0,realLen); 
      };    //汉字解码函数，获取带汉字的真实字符串长度
function reTurnCheckLogin(x)
{
isLogin = x;
}
function checkLogins()   //检查用户是否登录
{
	var ress= '';
   $.post('module/ajax/ajaxCheckLogin.php',function (data){
                  var res = data;
				  if(res==0)
	  reTurnCheckLogin(0);
				  else
					  reTurnCheckLogin(1);
   });
}
checkLogins();
function checkLogin()
{
	if(isLogin==0)
	{
	$("#notLoginAll").show();
	$('#notLogin').show();
	return 0;
	}
	else
  return 1;
}

function mesDis(mes)
{
   if(mes!="")
	{   
	   $('#mesDisText').text(mes);
	   //$('#mesDis').show();
	   $('#mesDis').slideDown('fast');
	   window.setTimeout("$('#mesDis').slideUp();",800);
	}
	else
		return;
}
$('embed').attr('windowlessVideo',1);
function offset()
{
	var heights;
	if(document.documentElement.scrollTop==0)
     heights = document.body.scrollTop;
	else
	heights = document.documentElement.scrollTop;
  alert(heights);//document.documentElement.scrollTop);
}
function getScrollHeight()
{
	if(document.documentElement.scrollTop==0)
     $heights = document.body.scrollTop;
	else
	$heights = document.documentElement.scrollTop;
$footToTop = $('#foot').position().top;
 return ($footToTop-$heights);
}
function getAllHeight()
{
  $height= document.body.scrollHeight;
  return $height;
}

$('#settingBu').hover(
function()
{ 
	if($('.settingMenu').css('display')=='none')
$('.settingMenu').show();},
function(){
$('.settingMenu').hide();
}
);
$('.settingMenu').hover(
function(){$('.settingMenu').show();},
function(){$('.settingMenu').show();});
$('.menuList').hover(
function()
{
  $(this).css('background','#666666');
}
,
function ()
{
$(this).css('background','none');
}
);
$('.navSpan').hover(
  function()
  {
    $(this).css('color','#339966');
   }
   ,
  function()
  {
    $(this).css('color','white');
   }
);
function arrayToJson(array)
{
	var json = "{";
  //$.isArray(array)?return 1:return 0;
     $.each(array,function(i, n)
	  {
	  n = n.split("&yoha.me");
	  name = n[n.length-1];
	  json = json+"\""+name+"\""+":"+"\""+n[0]+"\",";
     });
  json = json.replace(/,$/,"");
  json += "}";
  json = json.replace(/^\"\"$/,"");
  return eval("("+json+")");
 // alert(JSON.parse(json));
}
function formats(str)
{
   str = str.replace(/(^\s*)|(\s*$)/g, "");
   str = str.replace(/(\s+)|(\s+)/g," ");
   return str;
}
function getLength(str)
{
var len = 0;  
    for (var i=0; i<str.length; i++) 
		{   
     var c = str.charCodeAt(i);   
    //单字节加1   
     if ((c >= 0x0001 && c <= 0x007e) || (0xff60<=c && c<=0xff9f))
       len++;    
     else 
      len+=2;   
        }   
		return len;
}
