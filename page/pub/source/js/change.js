$('.moodArea').bind('input propertychange', function()
{  
   var maxLength = 200;
   var val = formats($(this).val());
   var length = getLength(val);
   if(length%2!=0)
	   length-=1;
   var restLength = maxLength-length/2;
   $('#moodRest').text(restLength);
});
$('.videoArea').bind('input propertychange', function()
{  
   var maxLength = 100;
   var val = formats($(this).val());
   var length = getLength(val);
   if(length%2!=0)
	   length-=1;
   var restLength = maxLength-length/2;
   $('#videoRest').text(restLength);
});
$('.musicName').keydown(function(e){
					if(e.keyCode==13){
						getMusicList(1);
					}
				});

$('.musicArea').bind('input propertychange', function()
{  
   var maxLength = 100;
   var val = formats($(this).val());
   var length = getLength(val);
   if(length%2!=0)
	   length-=1;
   var restLength = maxLength-length/2;
   $('#musicRest').text(restLength);
});
	var musicFlag = 0;
  function getMusicList(nowPage)
	{
		var now = nowPage;
		var musicName = formats($('.musicName').val());
		   //alert(musicName);
		if(musicName==""||typeof(musicName)=='undefined')
			{
					musicFlag = 0;
			return;
			}
	$.ajaxSetup({
   async:true               //设置ajax请求为异步请求
       });
       $.post("pub/module/ajax/getMusicList.php",{name:musicName,page:now},function(data)
		{
		   //alert(data['results'][0]['song_name']);
		      $('.musicChoose').html("");
		   var num = data['total'];
		   var pages = num/8;
		       pages = Math.ceil(pages);
			   $('.allMusic').text('共'+num+"首相关音乐");
		   $('#musicList').slideDown('normal');
	        for(var i=0;i<data['results'].length;i++)
			{
			  $div = $("<div></div>");
			  $div.attr('class','musicItem');
			  $div.attr('title',data['results'][i]['song_name']+'-'+data['results'][i]['artist_name']);
			  $div.attr('album',data['results'][i]['album_logo']);
              $div.attr('songId',data['results'][i]['song_id']);
			  //alert(data['results'][i]['song_name']+'-'+data['results'][i]['artist_name']);
			  $div.text(data['results'][i]['song_name']+'-'+data['results'][i]['artist_name']);
			  $div.appendTo($('.musicChoose'));
			}
			if(pages>1)
			{
				var next = $('#MPnext').attr('page');
				var prev = $('#MPprev').attr('page');
				//alert(next+"--"+prev);
					prev==0?$('#MPprev').hide():$('#MPprev').show();
					next>pages?$('#MPnext').hide():$('#MPnext').show();                
			}    
			$(".musicItem").hover(
function(){$(this).css('background',"#666666");},
function(){$(this).css('background',"none");}
);
$(".musicItem").click(
function()
{
	var img = $(this).attr('album');
	   imgObj = "<img src='"+img+"' />";
	var song = $(this).attr('songId');
	  songObj = "<embed src='http://www.xiami.com/widget/0_"+song+"/singlePlayer.swf' type='application/x-shockwave-flash' width='257' height='33' wmode='transparent'></embed>";
    var title = $(this).attr('title');
	$(".DMimg").html(imgObj);
	$(".DMimg").attr('title',title);
	$(".DMimg").attr('id',song);
	$(".DMswf").html(songObj);
	$('#musicList').hide();
	$("#displayMusic").show();
}
);
	   },'json');
	   
		musicFlag = 0;
    }

$('.musicName').bind('input propertychange', function()
{  
 if(musicFlag==0)
	{
	musicFlag = 1;
  window.setTimeout("getMusicList(1)",500);
	}
 else
 return ;
});

$('.picArea').bind('input propertychange', function()
{  
   var maxLength = 100;
   var val = formats($(this).val());
   var length = getLength(val);
   if(length%2!=0)
	   length-=1;
   var restLength = maxLength-length/2;
   $('#picRest').text(restLength);
});