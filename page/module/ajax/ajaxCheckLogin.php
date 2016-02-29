<?php
session_start();
if(@$_SESSION['is_login']==1)
    echo 1;
	else
	echo 0;
?>