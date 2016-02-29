var shineFlag = 0;
function shine($id)
{
function shineIn($id)
{
	if(shineFlag==0)
	{
$($id).fadeIn(800,function()
	{
	shineOut($id);
	}	
	);
	}
}
function shineOut($id)
{
	{
$($id).fadeOut(800,function()
	{

	shineIn($id);
	}	
	);
	}
}
shineIn($id);
}
function getNotice()
{

   $.post("module/ajax/ajaxGetNotice.php",{},function(data)
	{
		  if(data>0)
		{
			  shineFlag = 0;
			data>99?data='99+':"";
			  $('#noticeNum').text(data);
            shine('#noticeNum');
		}
		else
		{
			shineFlag = 1;
          $('#noticeNum').hide();
		}
    });
}
if(isLogin==1)
{
window.setInterval('getNotice()',2000);
}
