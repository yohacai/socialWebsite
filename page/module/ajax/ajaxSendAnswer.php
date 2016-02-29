<?php
session_start();
require_once '../../public/contFmt.php';
require_once '../serv/answerInsert.php';
require_once '../../public/SqlHelper.php';
$toUser = $_POST['toUser'];        // toUser:回复给谁   cont:reTore内容   name:回复人的名字
$toCont = $_POST['toCont'];
$cont = $_POST['cont'];
$contId = $_POST['contId'];
$user = $_SESSION['id'];
$name = $_SESSION['name'];

$format = new contFmt();       //格式化数据
$format->cont = $toCont;
$toCont = $format->cutCont(40);

//$formats = new contFmt();
$insert = new answerInsert();
$db = new sqlhelper();
$db->db_link();
$res = $insert->insertTo($user,$toUser,$toCont,$cont,$contId,$name,$db);

echo $res;
?>