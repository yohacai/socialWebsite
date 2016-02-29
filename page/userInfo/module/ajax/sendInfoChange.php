<?php
session_start();
 require_once '../serv/userInfoChange.php';
  require_once '../../../public/SqlHelper.php';
  require_once '../../../public/contFmt.php';
 $id = $_SESSION['id'];
 file_put_contents('test.php',$id);
 $db = new sqlhelper();
 $db->db_link();
    $data['id'] = $id;
    $data['nicky'] =  trim($_POST['nicky']);
    $data['addr'] =  trim($_POST['addr']);
    $data['emotion'] =  trim($_POST['emotion']);
    $data['date'] =  trim($_POST['date']);
    $data['school'] =  trim($_POST['school']);
    $data['profession'] =  trim($_POST['profession']);
    $data['love'] =  trim($_POST['love']);
    $data['want'] =  trim($_POST['want']);
  $insert = new infoChange($data,$db);
  $res = $insert->insertInto();
  echo $res;
?>