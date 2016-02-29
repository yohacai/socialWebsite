<?php
   if(@$_SESSION['is_login'])
         require_once 'module/navLogined.php';
   else
        require_once 'module/navNotlogin.php';
?>