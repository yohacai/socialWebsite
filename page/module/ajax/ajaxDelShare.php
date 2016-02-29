<?php
  @session_start();
  require_once '../../public/SqlHelper.php';
  require_once '../serv/delShare.php';
  $id = $_POST['id'];
  $userId = @$_SESSION['id'];
  $db  = new sqlhelper();
  $db->db_link();
  if($id=="")
  {echo 3;return;}
  $del = new delShare($id,$userId,$db);
  $res = $del->deletes();
  echo $res;
?>