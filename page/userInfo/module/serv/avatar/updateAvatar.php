<?php
@session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].""."/wddp/page/public/SqlHelper.php";
  function updateAvatar($type)
  {
  $id= $_SESSION['id'];
  $db = new sqlhelper();
  $db->db_link();
  $sql = "update user set avatar = '$type' where id = '$id'";
  $res = $db->sql_dml($sql);
  }
?>