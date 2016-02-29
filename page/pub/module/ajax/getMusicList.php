<?php
$name = $_POST['name'];
$page = $_POST['page'];
$url="http://kuang.xiami.com/app/nineteen/search/key/".$name."/diandian/1/page/".$page;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$output = curl_exec($ch);
curl_close($ch);
echo urldecode($output);
?>