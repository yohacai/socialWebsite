<?php
session_start();
header("content-type: gbk");
if($_SESSION['is_login']==1)
   header("Location: page");
     else
		header("Location: page");
?>