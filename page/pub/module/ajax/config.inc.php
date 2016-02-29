<?php

//路径可以修改为自动获取
define( 'ROOT_PATH', realpath(dirname(__FILE__)).'../../' );
define('ROOT_PA',$_SERVER['DOCUMENT_ROOT'].""); 
function resize( $ori ){
	if( preg_match('/^http:\/\/[a-zA-Z0-9]+/', $ori ) ){
		return $ori;
	}
	$info = getImageInfo($ori);
	if( $info ){
        //上传图片后切割的最大宽度和高度
		$width = 290;
		$height = 295;
		$scrimg = $ori;
        if( $info['type']=='jpg' || $info['type']=='jpeg' ){
            $im = imagecreatefromjpeg( $scrimg );
        }
		if( $info['type']=='gif' ){
			$im = imagecreatefromgif( $scrimg );
		}
		if( $info['type']=='png' ){
			$im = imagecreatefrompng( $scrimg );
		}
		if( $info['width'] > $info['height'] ){
		//$width = intval( $info['width']/($info['height']/$height) );
		$newimg = imagecreatetruecolor( $width, $height );
		$cutWidth = $width*($info['height']/$height);
		if(($info['width']-$info['height'])/$info['width']>=0.2)
		$x = $info['width']*0.2;
		else
		$x = 0;
		imagecopyresampled( $newimg, $im, 0, 0, $x, 0, $width, $height,$cutWidth,$info['height']);
			} 
			else {
		//$height = intval( $info['height']/($info['width']/$width) );
		$newimg = imagecreatetruecolor( $width, $height );
		$cutHeight = 295*($info['width']/$width);
		imagecopyresampled( $newimg, $im, 0, 0, 0, 0, $width, $height, $info['width'], $cutHeight );
			}
		$newori = explode(".",$ori);
		$newori = $newori[0].'_mini'.".".$newori[1];
	   imagejpeg( $newimg,$newori);
		imagedestroy( $im );
		$newori = explode('userInfo/',$newori);
		$newori = "userInfo/".$newori[1];
	}
	return $newori;
}

function getImageInfo( $img ){
	$imageInfo = GetImagesize($img);
	$allowed_types = array('jpg','gif','png','jpeg');
	if( $imageInfo!== false) {
		$imageType = strtolower(substr(image_type_to_extension($imageInfo[2]),1));
		$info = array(
				"width"		=>$imageInfo[0],
				"height"	=>$imageInfo[1],
				"type"		=>$imageType,
				"mime"		=>$imageInfo['mime'],
		);
		return $info;
	}else {
		return false;
	}
}