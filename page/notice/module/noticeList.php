<?php
@session_start();
require_once 'userInfo/module/serv/getUserInfo.php';
require_once 'public/contFmt.php';
 $db = new sqlhelper();
 $db->db_link();
    $nums = 15;   //每页显示多少条通知
	$page = @$_GET['p'];
	if($page=="")
	    $page = 1;
	$ctg = @$_GET['re'];
	if($ctg=="")
	$ctg = "ntre";
    $user = $_SESSION['id'];
  $notice = new getNotice($page,$ctg,$user,$db,$nums);
  $ntArray = $notice->select();
  $res = noticeDisplay::display($ntArray,$db);
?>