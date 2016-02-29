<?php
@session_start();
if(@!$_SESSION['is_login'])
   header('Location: http://yoha.me/wddp');
?>