<?php
session_start();
$id = $_SESSION['id'];
include 'config.inc.php';
if (!empty($_FILES)) {
    $uid = intval( $_REQUEST['uid'] );
    $ext = pathinfo($_FILES['Filedata']['name']);
    $ext = strtolower($ext['extension']);
    $tempFile = $_FILES['Filedata']['tmp_name'];
    $targetPath   = "../../../user/".$id."/";
    if( !is_dir($targetPath) ){
        mkdir($targetPath,0777,true);
    }
	else
		chmod($targetPath,0777);
    $new_file_name = 'avatar_ori.'.$ext;
    $targetFile = $targetPath .$new_file_name;
    move_uploaded_file($tempFile,$targetFile);
    if( !file_exists( $targetFile ) ){
        $ret['result_code'] = 0;
        $ret['result_des'] = 'upload failure';
    } elseif( !$imginfo=getImageInfo($targetFile) ) {
        $ret['result_code'] = 101;
        $ret['result_des'] = 'File is not exist';
    } else {
        $img = "userInfo/user/".$id."/".$new_file_name;
        resize(ROOT_PA."/wddp/page/".$img);
        $ret['result_code'] = 1;
        $ret['result_des'] = $img;
    }
} else {
    $ret['result_code'] = 100;
    $ret['result_des'] = 'No File Given';
}
exit( json_encode( $ret ) );