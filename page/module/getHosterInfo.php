<?php
require_once 'public/SqlHelper.php';
require_once 'module/serv/getHosterId.php';
require_once 'public/getUserInfo.php';
$db = new sqlhelper();
$db->db_link();
$hosterId = getHoster::getHostId($db);
$info = getUser::getInfo($hosterId,$db);
echo "<div class = 'hAvatar'><a href='inf&".$hosterId."' target='_blank'><img src='userInfo/user/".$hosterId."/avatar_200.".$info['avatar']."'></a><br/><br/>".$info['name']."</div>
<div class = 'hInfo'>
<p>
<div class='HIdiv'><span class='HItag'>地址:</span><div class='HIcont'>".$info['address']."</div></div>
<div class='HIdiv'><span class='HItag'>爱好:</span><div class='HIcont'>".$info['love']."</div></div>
<div class='HIdiv'><span class='HItag'>职业:</span><div class='HIcont'>".$info['job']."</div></div>
<div class='HIdiv'><span class='HItag'>感情:</span><div class='HIcont'>".$info['emotion']."</div></div>
<div class='HIdiv'><span class='HItag'>want:</span><div class='HIcont'>".$info['want']."</div></div>
</p>";
?>