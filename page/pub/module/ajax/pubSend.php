<?php
session_start();
require_once '../../../public/contFmt.php';
require_once '../../../public/SqlHelper.php';
require_once '../serv/pubInsert.php';
$id = @$_SESSION['id'];
$db = new sqlhelper();
$db->db_link();
if($id=="")
{
	echo 0;
	return;
}
$data['id'] = $id;
$data['contMain'] = contFmt::inputContFmt(@$_POST['cont']);
$data['contName'] = contFmt::inputContFmt(@$_POST['contName']);
$data['contReason'] = contFmt::inputContFmt(@$_POST['contReason']);
$ctg = $_POST['ctg'];
$insert = new pubInsert($data,$ctg,$db);
$res = $insert->insertTo();
$db->close();
echo $res;
?>