<?php
class getHoster            //��õ�ǰhoster��id
{
   public static function getHostId($db)
	{
		$sql = "select userId from hoster limit 0,1 order by desc";
		$res = $db->sql_dql($sql);
		if($res!="")
		   return $res;
		else
			return;
    }
}