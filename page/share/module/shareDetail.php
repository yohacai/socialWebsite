<?php
   @session_start();
   require_once 'share/module/serv/getShare.php';
   require_once 'share/module/serv/getAnswer.php';
   require_once 'share/module/display/shareDisplay.php';
   require_once 'module/model/shareModel.php';
   require_once 'public/SqlHelper.php';
   require_once 'public/contFmt.php';
   $id = $_GET['id'];
   $page = @$_GET['page'];
   $page=""?$page=1:$page;
   $num = 15; //ÿҳ��ʾ�ظ���Ŀ
   $db = new sqlhelper();
   $db->db_link();
   $share = new shareModel();
   $getShare = new getShare($id,$share,$db);
   $shareInfo = $getShare->gets();    //����2Ԫ�����飬0:share��Ϣ��1:�ظ�����
      //var_dump($shareInfo);
   if($shareInfo=="")
   {
	   require_once 'module/display/nullShare.php';
	   return;
   }
   $shareAnswer = new getAnswer($id,$db,$page,$num);
   $answer = $shareAnswer->gets();
   shareDisplay::display($shareInfo,$answer,$page,$num);
?>