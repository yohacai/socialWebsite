<?php
@session_start();
   if(@!$_SESSION['is_login'])
    header("Location: ../page");
require_once 'public/dbInit.php';
require_once 'public/SqlHelper.php';
require_once 'notice/default/titleIndex.html';
require_once 'default/header.php';
require_once 'notice/module/serv/getNotice.php';
require_once 'notice/module/display/noticeDisplay.php';
require_once 'notice/module/body.php';
require_once 'default/footer.html';
?>