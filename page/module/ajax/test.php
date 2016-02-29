<script src="http://yoha.me/wddp/page/source/js/jquery.js"></script>
<script>

$.post("ajaxGetShare.php",{},function(data)
{
  document.write(UrlDecode(data[0]));
},'json');
</script>