<?php
    require_once '../serv/getAnswer.php';
	require_once '../../userInfo/module/serv/getUserInfo.php';
	require_once '../../public/SqlHelper.php';
	require_once '../../public/contFmt.php';
	$db = new sqlhelper();
	$db->db_link();
	$_SESSION['db'] = $db;
	$id = $_POST['cont_id'];
	$getAns = new getAnswer($id);
	$res = $getAns->getAnswer();
	if($res!="")
	{
	for($i=0;$i<count($res);$i++)
   {
    $res[$i]['cont_info'] =iconv('gbk','utf-8',$res[$i]['cont_info']);
	$res[$i]['name'] = iconv('gbk','utf-8',$res[$i]['name']);
	$res[$i]['ava'] = getUserInfo::getAvatar($res[$i]['sender'],$db);
	$res[$i]['ava'] = $res[$i]['ava']['avatar'];
	$res[$i]['time'] = iconv('gbk','utf-8',contFmt::formatTime($res[$i]['time']));

   }
	$ress = json_encode($res);
	if($res!=0)
		echo contFmt::charDecode($ress);
	}
	 else
	 echo 0;
?>