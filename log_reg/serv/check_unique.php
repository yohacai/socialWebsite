<?php
require_once 'SqlHelper.php';
$email = $_POST['email'];
$db = new sqlhelper();
$db->db_link();
$sql = "select * from user where email = '$email'";
$res = $db->sql_dql($sql);
 if($res == "")
    echo 0;     //�˺ſ���
	else 
	echo 1;
?>