<?php 
require_once 'public/VideoUrlParser.class.php';
//截取中文字符串 
function mysubstr($str, $start, $len) { 
$tmpstr = ""; 
$strlen = $start + $len; 
for($i = 0; $i < $strlen; $i++) { 
if(ord(substr($str, $i, 1)) > 0xa0) { 
$tmpstr .= substr($str, $i, 2); 
$i++; 
} else 
$tmpstr .= substr($str, $i, 1); 
} 
return $tmpstr; 
} 

function curlGetMusicAlbum()
{
    $url = "http://www.xiami.com/song/2072395";
	$header = array('Cotent-length:');
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
	//curl_setopt($ch,CURLOPT_GET,0);
	$output = curl_exec($ch);
	curl_close($ch);
	$pattern = "#<img class=\"cdCDcover185\" src=\"(.*)\" /></a>#isU";
	preg_match_all($pattern,$output,$match);
	echo "<img src='".$match[1][0]."' />";
}
function leshi()
{

    $url = "http://www.letv.com/ptv/vplay/2202440.html";
	$header = array('Cotent-length:');
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
	//curl_setopt($ch,CURLOPT_GET,0);
	$output = curl_exec($ch);
	curl_close($ch);
	$pattern = "#pPic:(.*)\"#";
    preg_match_all($pattern,$output,$m);
	var_dump($m);

}
function music()
{
  $url="http://www.xiami.com/search/song/page/1?key=".iconv('gbk','utf-8','知足');
  //echo $url;
$ch = curl_init();
//$header = array('Cotent-length:');
curl_setopt($ch,CURLOPT_URL,$url);
//curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
//curl_setopt($ch,CURLOPT_GET,1);
$output = curl_exec($ch);
curl_close($ch);
$pattern = "#<table class=\"track_list\" cellspacing=\"0\" cellpadding=\"0\">
.*</table>#isU";
preg_match($pattern,$output,$match);
$pattern1 = "#<td class=\"song_name\">.*<td class=\"song_album\">#isU";
preg_match_all($pattern1,$match[0],$match1);
for($i=0;$i<count($match1[0]);$i++)
	{
$pattern2 = "#song/(\d*)\" title#";
preg_match($pattern2,$match1[0][$i],$match2);
$res[$i] = $match2[1];

	}
$pattern3 = "#href=\"http://www.xiami.com/song/(\d*)\" title=\"(.*)\"><b.*<td class=\"song_artist\"><a target=\"_blank\" href=\"http://www.xiami.com/artist/\d*\" title=\"(.*)\">#isU";
preg_match($pattern3,$match1[0][9],$match3);
var_dump($match3);
}
function musics()
{
$url="http://kuang.xiami.com/app/nineteen/search/key/%E5%AD%99%E6%82%9F%E7%A9%BA/diandian/1/page/2";
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
//curl_setopt($ch,CURLOPT_POST,1);
//curl_setopt($ch,CURLOPT_REFERER,"http://www.diandian.com/dianlog/yohacai/new/audio");
//curl_setopt($ch,CURLOPT_ORIGIN,"http://www.xiami.com");
$output = curl_exec($ch);
curl_close($ch);
echo urldecode($output);
}

function sohu()
{
	$url = "http://v.yinyuetai.com/video/837728";
   $res = VideoUrlParser::parse($url);
   var_dump($res);
}
sohu();
?> 
