<?php
session_start();
require_once '../../public/contFmt.php';
require_once '../serv/answerInsert.php';
require_once '../../public/SqlHelper.php';
$toUser = $_POST['toUser'];        // toUser:�ظ���˭   cont:reTore����   name:�ظ��˵�����
$toCont = $_POST['toCont'];
$cont = $_POST['cont'];
$contId = $_POST['contId'];
$user = $_SESSION['id'];
$name = $_SESSION['name'];

$format = new contFmt();       //��ʽ������
$format->cont = $toCont;
$toCont = $format->cutCont(40);

//$formats = new contFmt();
$insert = new answerInsert();
$db = new sqlhelper();
$db->db_link();
$res = $insert->insertTo($user,$toUser,$toCont,$cont,$contId,$name,$db);

echo $res;
?>