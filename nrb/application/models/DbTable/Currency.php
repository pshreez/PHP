<?php

class Application_Model_DbTable_Currency extends Zend_Db_Table_Abstract
{


    protected $_name='currency';
	
    public function fetchCurrency()
	{   
	
	   $sql=$this->select(array('id','name'));
	            
		
				 
	    return $this->fetchAll($sql);
	 
	             
	}
	

}
?>