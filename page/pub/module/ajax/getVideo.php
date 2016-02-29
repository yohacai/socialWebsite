<?php
require_once '../../../public/VideoUrlParser.class.php';
$url = trim($_POST['url']);
$res = VideoUrlParser::parse($url);
echo json_encode($res);
?>