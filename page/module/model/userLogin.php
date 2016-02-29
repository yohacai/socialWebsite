<?php
class loginUser
{
  private $email;
  private $id;
  private $name;
  private $avatar;
     function __get($name)
	{
	    return $this->$name;
	 }

	 function __set($name,$value)
	{
	  $this->$name = $value;
	 }
}
?>