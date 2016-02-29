<?php
   @session_start();
   if(@!$_SESSION['is_login'])
    //header("Location: ../page");
require_once 'public/dbInit.php';
require_once 'public/SqlHelper.php';
require_once 'pub/default/titleIndex.html';
require_once 'default/header.php';
require_once 'pub/module/body.php';
require_once 'default/footer.html';
?>