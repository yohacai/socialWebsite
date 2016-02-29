<?php
session_start();
require_once 'getUserId.php';
require_once 'SqlHelper.php';
$db = new sqlhelper();
$db->db_link();
$_SESSION['db'] = $db;
echo getUserId::getId('yoha@me.com');
?>