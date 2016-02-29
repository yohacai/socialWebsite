<?php
header('content-type:charset=utf8');
require_once "VideoUrlParser.class.php";
$url = "http://v.youku.com/v_show/id_XNjM1MTI2Mzc2.html";
$info = VideoUrlParser::parse($url);
    var_dump($info);

?>
