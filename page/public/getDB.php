<?php
require_once 'public/SqlHelper.php';
 class getDB
 {
   public $db;
   public static function  initDB($db="",$user="",$pwd="")
	 {
	   $dbGet = new getDB();
       $dbGet->db = new SqlHelper();
	   if($db!=""&&$pwd!="")
		 {
		   $dbGet->db->dbname = $db;
	       $dbGet->db->dbpass = $pwd;
         }
		if($user!="")
			$dbGet->db->dbadmin = $user;
		$dbGet->db->db_link();
		//if(!Registry::contains('db'))
			// return;
		//else
          //{
			$_SESSION['db'] = $dbGet->db;
			return;
		 // }
     }
 }