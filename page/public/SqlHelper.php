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

	//ִ��dql���
	public function sql_dql($sql)   //��ѯ����
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
			
			$res->free();   //�ͷŽ����
			return $a;      //���ز�ѯ����
		}
		else
			{
		    return 1;
		    }

	}
	//ִ��dml���
	public function sql_dml($sql)   //�޸Ĳ���
	{
		$b=$this->db->query($sql);
		if(!$b){
			return 0;}
		if($this->db->affected_rows>0){
			return 1;}//��ʾ�ɹ�
		else{
			return 2;}
	}
	public function close(){
	$this->db->close();

	}

}
?>