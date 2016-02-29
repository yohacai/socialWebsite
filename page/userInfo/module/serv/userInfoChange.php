<?php
  class infoChange
  {
    private $data;
	private $db;
	function __construct($data,$db)
	  {
	      $this->data['nicky'] =contFmt::inputContFmt($data['nicky']);
		  $this->data['want'] = contFmt::inputContFmt($data['want']); 
		  $this->data['love'] = contFmt::inputContFmt($data['love']); 
		  $this->data['pro'] = contFmt::inputContFmt($data['profession']); 
		  $this->data['emotion'] = contFmt::inputContFmt($data['emotion']); 
		  $this->data['date'] = contFmt::inputContFmt($data['date']); 
		  $this->data['school'] = contFmt::inputContFmt($data['school']); 
		  $this->data['addr'] = contFmt::inputContFmt($data['addr']); 
		  $this->data['id'] = $data['id']; 
		  $this->db = $db;
	  }
    function insertInto()
	  {
	    $sql = "update user set name='".$this->data['nicky']."',birth='".$this->data['date']."',job='".$this->data['pro']."',love='".$this->data['love']."',address='".$this->data['addr']."',emotion='".$this->data['emotion']."',school='".$this->data['school']."',want='".$this->data['want']."' where id=".$this->data['id']; 
		$res = $this->db->sql_dml($sql);
		return $res;
	  }
  }
?>