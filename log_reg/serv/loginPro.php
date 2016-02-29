<?php
session_start();
require_once 'check_pro.php';
$email = trim($_POST['email']);
$pwd = trim($_POST['pwd']);
$check_login = new check_eml_pwd($email,$pwd);
echo $check_login->check_login();
?>