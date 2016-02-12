<?php

class Application_Model_DbTable_Rate extends Zend_Db_Table_Abstract
{
    protected $_name = 'rate';
	

    public function getContents()
    {
	    $sql =$this->select();
		$row=$this->fetchAll($sql);
		if(!$row){
		throw new Exception('couldnot find row $rate_id');
		}
		return $row->toArray();
       
    }
	 public function getContent()
	 {
	    $id=(int)$id;
		$row=$this->fetchRow('rate_id='.id);
		if(!$row){
		throw new Exception('couldnot find row $rate_id');
		}
		return $row->toArray();
	 }
	 
}

?>
