<?php
session_start();
require_once '../serv/getHosterId.php';
require_once '../../public/SqlHelper.php';
$db = new sqlhelper();
$db->db_link();
$res = getHoster::getHostId($db);
if($res!="")
  echo $res;
  else
  echo 0;
?>