<?php
@session_start();
   if(@!$_SESSION['is_login'])
    header("Location: ../page");
require_once 'public/dbInit.php';
require_once 'public/SqlHelper.php';
require_once 'userInfo/default/titleIndex.html';
require_once 'default/header.php';
require_once 'userInfo/module/body.php';
require_once 'default/footer.html';
?>