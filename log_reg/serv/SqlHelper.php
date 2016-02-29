<?php
class sqlhelper
{   public $db;
	private $dbhost='localhost';
	private $dbadmin='root';
	private $dbpass='950124';
	private $dbname='myday';
	public function db_link()
	{
		$this->db=new mysqli($this->dbhost,$this->dbadmin,$this->dbpass,$this->dbname);
		$this->db->query("set names 'gbk'");
	}

	//执行dql语句
	public function sql_dql($sql)   //查询操作
	{ 
		$res=$this->db->query($sql);
		if(!empty($res))
		{
			$a="";
			$i = 0;
			while($b = $res->fetch_assoc())
			{
			    $a[$i] = $b;
				$i++;
			}
			
			$res->free();   //释放结果集
			return $a;      //返回查询数组
		}
		else
			{
		    return 1;
		    }

	}
	//执行dml语句
	public function sql_dml($sql)   //修改操作
	{
		$b=$this->db->query($sql);
		if(!$b){
			return 0;}
		if($this->db->affected_rows>0){
			return 1;}//表示成功
		else{
			return 2;}
	}
	public function close(){
	$this->db->close();

	}

}
?>