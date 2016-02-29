/*$(".shareBody").click(function()
{
  $(".musicBu").css('zIndex','1000');
  $src = $('html embed');
    $nowSrc = $(this).children('embed').attr('src');
  for(var i=0;i<$src.length;i++)
	{
	  var srcBack = $($src[i]).attr("src");
      $($src[i]).attr('src'," ");
      //$($src[i]).attr('src',srcBack);  
    }
  $(this).children('embed').attr('src',$nowSrc);
    $(this).children('.musicBu').css('zIndex','-1');
});*/
function mediaInit()
{
$('.album').click(
function()
{
	if( $(this).children('img').css('width')=='200px')
    {
	$(this).children('img').animate({width:'+300px'},200);//.css('width','300px');
    $(this).next(".shareContent").css('width',"240px");
	$(this).nextAll(".MusicShareReason").css('width',"240px");
	}
	else
	{
		$(this).children('img').animate({width:'+200px'},200);
		 $(this).next(".shareContent").animate({width:'+330px'},300);
		 $(this).nextAll(".MusicShareReason").animate({width:'+330px'},300);
	}
}
);

function showImg($img)
{
	$img = $img.split("_mini");
	$img = $img[0]+$img[1];
	$src = "<img src='"+$img+"' />";
   $('#imgPlace').html($src);
   $('#imgShowBack').fadeIn(200);
   $('#imgShow').fadeIn(200);
}
$('#imgShow').click(
	function ()
	{
         $('#imgShowBack').fadeOut(200);
         $('#imgShow').fadeOut(200);
	}
		 );
$('.imgCt').click(
function()
{
    $img = $(this).children('img').attr('src');
	showImg($img);
}
);
$('.videoImg').click(
function()
{
	var url = $(this).prev('.videoPlayer').attr('lang');
		$(this).css('height','430px');
	$(this).prevAll('.videoClose').show();
  $(this).prev('.videoPlayer').html("<embed wmode='transparent' windowlessVideo=1 src='"+url+"' quality='high' width='480' height='400' align='middle' allowNetworking='all' allowScriptAccess='always' type='application/x-shockwave-flash'></embed>");
}
);
$('.videoClose').click(
function ()
{
  $(this).nextAll('.videoImg').css('height','150px');
  $(this).next('.videoPlayer').html('');
  $(this).hide();
}
);
$('.videoIcon').click(
function()
{
	var url =  $(this).nextAll('.videoPlayer').attr('lang');
	$(this).nextAll('.videoImg').css('height','430px');
	$(this).nextAll('.videoClose').show();
    $(this).nextAll('.videoPlayer').html("<embed wmode='transparent' windowlessVideo=1 src='"+url+"' quality='high' width='480' height='400' align='middle' allowNetworking='all' allowScriptAccess='always' type='application/x-shockwave-flash'></embed>");
}
);
$('.imgCt').hover(
function()
{
	var width = $(this).children('img').css('width').split("px")[0];
    var height = $(this).children('img').css('height').split("px")[0];
		if(parseInt(width)<parseInt(height))
	{
  $(this).children('img').animate({width:'+285px'},100);//css('width','285px');
  $(this).children('img').fadeTo(100,0.8);
	}
	else
	{
		$(this).children('img').animate({height:'+290px'},100);
	    $(this).children('img').fadeTo(100,0.8);
	}
}
,
function()
{   
	var width = $(this).children('img').css('width').split("px")[0];
    var height = $(this).children('img').css('height').split("px")[0];
	if(parseInt(width)<parseInt(height))
	{
	$(this).children('img').fadeTo(100,1);
  $(this).children('img').animate({width:'+290px'},100);//css('width','290px');
	}
	else
	{
		$(this).children('img').fadeTo(100,1);
	$(this).children('img').animate({height:'+295px'},100);
	}
}
);
$('.xiami-player,.musicTitle').click(
  function()
  {
      var id = $(this).parent().children('.xiami-player').attr('id');
	  $('.musicPlayer').prevAll('.xiami-player,.musicTitle').show();
	  $('.musicPlayer').remove();
	  $(this).parent().children('.xiami-player,.musicTitle').hide();
	 $(this).parent().children('.xiami-player,.musicTitle').hide();
	  $div = $("<div class='musicPlayer'></div>");
	  $div.html("<object width='257' class='xiami-flash-player-object' height='33' type='application/x-shockwave-flash' data='http://img.xiami.com/widget/0_"+id+"_/singlePlayer.swf'><param value='http://img.xiami.com/widget/0_"+id+"_/singlePlayer.swf' name='movie'><param value='transparent' name='wmode'><param value='high' name='quality'><param name='allowScriptAccess' value='always'></object>");
      $div.appendTo($(this).parent());
  }
);
}
mediaInit();
function removeMedia()
{
   $('.imgCt').off();
   $('.videoIcon').off();
   $('.videoClose').off();
   $('.videoImg').off();
   $('#imgShow').off();
   $('.imgCt').off();
   $('.album').off();
   $('.xiami-player,.musicTitle').off();
}