$('.noticeNav').hover(
function ()
{
  $back = $(this).css('background');
  $(this).css('background','#666666');
}
,
function ()
{
	if(typeof($back) == 'undefined')
		$back = "none";
     $(this).css('background',$back);
}
);
$('.noticeInfo').hover(
function()
{
 $(this).children('.noticeBody').children('.reNoticeBu').show();
}
,
function()
{
  $(this).children('.noticeBody').children('.reNoticeBu').hide();
}
);
$('.noticeInfoBack').hover(
function()
{
 $(this).children('.noticeBody').children('.reNoticeBu').show();
}
,
function()
{
  $(this).children('.noticeBody').children('.reNoticeBu').hide();
}
);