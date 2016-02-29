<?php
session_start();
require_once 'check_pro.php';
$email = trim($_POST['email']);
$pwd = trim($_POST['pwd']);
$name = trim($_POST['name']);
$name = iconv("utf-8","gbk",$name);
$chk_reg = new check_eml_pwd($email,$pwd,$name);
echo $chk_reg->check_reg();
?>