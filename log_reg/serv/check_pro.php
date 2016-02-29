<?php
require_once 'check_login_serv.php';
require_once 'reg_insert.php';
require_once 'update_reg_log.php';
require_once 'getUserId.php';
class check_eml_pwd
{
    private $email;
	private $pwd;
	private $verify;
	private $name;
	function __construct($eml,$pwd,$name = null,$verify = null)
	{
	    $this->email = $eml;
		$this->pwd = $pwd;
		$this->verify = $verify;
		$this->name = $name;
	}

	private function check_email()
	{
	    $reg = "#^(\w+[-.]?\w+)*@\w+([-.]?\w+)*\.\w+([-.]?\w+)*$#";
		if(preg_match($reg,$this->email))
			return 0;
		else 
			return 1;
	}

	private function check_pwd()
	{
	    $reg = "#\w{6,18}$#";
		if(preg_match($reg,$this->pwd))
			return 0 ;
		else
			return 1;
	}

	public function check_login()
	{
	     $eml_check = $this->check_email();
		 $pwd_check = $this->check_pwd();
		 if($eml_check == 1 ||$pwd_check == 1)
		 {
		     return 2;
		 }
		 else
		 {
		   $log_res = login_verify::login_verify_serv($this->email,$this->pwd);
		   if($log_res == 0)
			 {
               $update = new update_control($this->email);
			   $update->update_handler();
			   $_SESSION['is_login'] = 1;
			   $_SESSION['email'] = $this->email;
			   $_SESSION['id'] = getUserId::getId($this->email);
			 }
			   return $log_res;
		 }
	}

	public function check_reg()
	{
	     $eml_check = $this->check_email();
		 $pwd_check = $this->check_pwd();
		 if($eml_check == 1 ||$pwd_check == 1)
		 {
		     return 1;
		 }
		 else
		 {
		   $reg_res = reg_insert::reg_inser_pro($this->email,$this->pwd,$this->name);
		   if($reg_res == 0)
			 {
			   $_SESSION['is_login'] = 1;
               $_SESSION['email'] = $this->email;
			   $_SESSION['id'] = getUserId::getId($this->email);
			 }
			   return $reg_res;
		 }
	}
}
?>