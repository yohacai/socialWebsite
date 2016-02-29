<?php
require_once '../serv/collectServ.php';
    $contId = $_POST['contId'];
	$userId = $_SESSION['id'];
    $collect = new contCollect($userId,$contId);
	$res = $collect -> insertInto();
    echo $res;
?>