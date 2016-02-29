<?php
session_start();
require_once '../serv/getNotice.php';
require_once '../../public/SqlHelper.php';
$db = new sqlhelper();
$id = $_SESSION['id'];
$notice = new getNotice($id,$db);
$noticeNum = $notice->getNum();
echo $noticeNum;
?>