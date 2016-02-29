<?php
require_once 'module/model/userLogin.php';
require_once 'module/model/userLoginModel.php';
class userLoginInit
{
    private $email;
	function __construct($email)
	{
	 $this->email = $email;
	}
	function init()
	{
	   $user = new loginUser();
	   $user = getUserLogin::getUser($user);
	   userLoginModel::setSession($user);
	}
}
?>