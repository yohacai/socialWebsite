<?php
require_once 'public/SqlHelper.php';
class userLoginModel      //���û����ݴ���session��
{
    public static function setSession(loginUser $user)
	{
	  $_SESSION['id'] = $user->id;
	  $_SESSION['name'] = $user->name;
	  $_SESSION['avatar'] = $user->avatar;
	}
}
class getUserLogin     //����û���ʼ������
{
   public static function getUser(loginUser $user)
	{
         $db = new sqlhelper();
		 $db->db_link();
		 $email = $_SESSION['email'];
		 $sql = "select id,name,avatar from user where email = '$email'";
		 $res = $db->sql_dql($sql);
		 if($res!="")
		{
         $user->id = $res[0]['id'];
		 $user->name = $res[0]['name'];
		 if($res[0]['avatar']!='jpg'||$res[0]['avatar']!='gif'||$res[0]['avatar']!='png')
			 		 $user->avatar = "userInfo/default_50.jpg";
		 else
			 		 $user->avatar = "userInfo/user/".$user->id."/avatar_50".$res[0]['avatar'];
		 return $user;
		}
		else
			die("ϵͳ����,��ˢ��ҳ��");
    }
}
?>