<?php
session_start();
//$id = $_SESSION['id'];
$id = 1;
include 'config.inc.php';
if (!empty($_FILES)) {
    $uid = intval( $_REQUEST['uid'] );
    $ext = pathinfo(iconv('UTF-8','gbk',$_FILES['Filedata']['name']));
    $ext = strtolower($ext['extension']);
    $tempFile = $_FILES['Filedata']['tmp_name'];
    $targetPath   = "../../../userInfo/user/".$id."/img/";
    if( !is_dir($targetPath) ){
        mkdir($targetPath,0777,true);
    }
	else
		chmod($targetPath,0777);
	$time = time();
    $new_file_name = time().rand(0,9).".".$ext;
    $targetFile = $targetPath .$new_file_name;
    move_uploaded_file($tempFile,$targetFile);
    if( !file_exists( $targetFile ) ){
        $ret['result_code'] = 0;
        $ret['result_des'] = 'upload failure';
    } else if( !$imginfo=getImageInfo($targetFile) ){
        $ret['result_code'] = 101;
        $ret['result_des'] = 'File is not exist';
    } else {
        $img = "userInfo/user/".$id."/img/".$new_file_name;
        $imgs = resize(ROOT_PA."/wddp/page/".$img);
        $ret['result_code'] = 1;
        $ret['result_des'] = $imgs;
    }
} else {
    $ret['result_code'] = 100;
    $ret['result_des'] = 'No File Given';
}
exit( json_encode( $ret ) );