<?php
require_once 'module/display/shareHeadDisplay.php';
if(@$_GET['ctg'])
$category = $_GET['ctg'];    //获得分类名称
else
$category = "";
echo "<script>";
    if($category!="")
	{   echo "$('#all').attr('ctg','$category');";
		echo "$('#$category').css('background','#333333');";
	}
	else
	    echo "$('#all').css('background','#333333')"; 
echo "</script>";
?>