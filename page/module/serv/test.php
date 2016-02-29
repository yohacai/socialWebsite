<?php
session_start();
  require_once 'getAnswer.php';
  require_once '../../public/SqlHelper.php';
  $db = new sqlhelper();
  $db->db_link();
  $_SESSION['db'] = $db;
  $get = new getAnswer(1);
  $res = $get->getAnswer();
  echo json_encode($res);
?>