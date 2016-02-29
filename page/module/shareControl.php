<?php
require_once 'module/serv/getShare.php';
require_once 'module/serv/getHosterId.php';
require_once 'module/model/shareModel.php';
require_once 'module/display/shareDisplay.php';
require_once 'module/display/nullShare.php';
require_once 'public/contFmt.php';
//var_dump($_GET['ctg']);
if(@$_GET['ctg'])
$category = $_GET['ctg'];    //获得分类名称
else
$category = "";
switch ($category)
{
case 'mood':$ctg=1;break;
case 'music':$ctg=2;break;
case 'video':$ctg=3;break;
case 'pic':$ctg=4;break;
case 'game':$ctg=5;break;
case 'other':$ctg=6;break;
default : $ctg="";break;
}
$id = "";            //
$db = new sqlhelper();
$db->db_link();
$hoster = getHoster::getHostId($db);
$start = 0;                //页面初始获得十条分享，从0开始
if($category=="")                    //获得分享内容id
   $id = getShareId::getAllId($hoster,$start,$db);
  else if($category=="mood"||"pic"||"video"||"music"||"other"||"game")
   $id = getShareId::getCtyId($ctg,$hoster,$start,$db);
   if($id == "")
   nullShare::display();
   else
   {
$share = new shareModel();
$getShare = new getShareCont($id);
$contents = $getShare->getShareContent($share,$db);         //获得分享详细内容
$display = new shareDisplay($contents,$hoster);         //显示内容
$display->display();
   }
?>