<?php
require_once '../serv/getShare.php';
require_once '../../public/SqlHelper.php';
require_once '../serv/getHosterId.php';
require_once '../model/shareModel.php';
require_once '../display/shareReturn.php';
require_once '../display/shareDisplayPt.php';
require_once '../../public/contFmt.php';
$page = @$_POST['page'];
$start = $page*10;        //���ĸ��ط���ʼ��ѯ
if(@$_POST['ctg'])
$ctg = $_POST['ctg'];    //��÷�������
else
$ctg = "";  
switch ($ctg)
{
case 'mood':$ctg=1;break;
case 'music':$ctg=2;break;
case 'video':$ctg=3;break;
case 'pic':$ctg=4;break;
case 'game':$ctg=5;break;
case 'other':$ctg=6;break;
default : $ctg="";break;
}
$db = new sqlHelper();
$db->db_link();
$hoster = getHoster::getHostId($db);
if($ctg=="")                    //��÷�������id
   $id = getShareId::getAllId($hoster,$start,$db);
  else if($ctg=="mood"||"pic"||"video"||"music"||"other"||"game")
   $id = getShareId::getCtyId($ctg,$hoster,$start,$db);
 if($id == "")
 {
	 echo 0;
	 return;
 }
else
{
$share = new shareModel();
$getShare = new getShareCont($id);
$contents = $getShare->getShareContent($share,$db);
$returnRes = shareReturn::shareRe($contents,$hoster,$db);
for($i = 0;$i<count($returnRes);$i++)
	{
	if($i==0)
       $res= '{"'.$i.'":"'.$returnRes[$i].'"';
	else 
		$res .= ',"'.$i.'":"'.$returnRes[$i].'"';
	}
	$res.= '}';
}
echo $res;
?>