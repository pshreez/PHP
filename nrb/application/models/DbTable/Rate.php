<?php

class Application_Model_DbTable_Rate extends Zend_Db_Table_Abstract
{
    protected $_name = 'rate';
	
    
	public function idRate($id)
	{
	$id = (int)$id;
	$row = $this->fetchRow('currency_id='.$id);
	if(!$row) 
	{
	   throw new Exception("could not get the row $id");
	  }
	return $row->toArray();
	   
	}
	
	public function fetchDataRate($id=false)
	{
	    if ($id)
		  {
			$params = unserialize($id);
			list($currency_id,$from,$to) = $params;
			//var_dump($params);die;
		  }
	    $sql =$this->select()->setIntegrityCheck(false) 
				   ->from(array('r' => $this->_name))
		           ->joinLeft(array('c'=>'currency'),'c.id = r.currency_id',array('name'));
	    if (isset($currency_id) && $currency_id)
				$sql->where('r.currency_id = ?', $currency_id)
				     ->where("r.date >= ?",$from)
					 ->where("r.date <= ?",$to);
	    return $this->fetchAll($sql);
		print_r($sql->assemble());die;
		           
	}
    public function getcontentRate($currency,$fromDate,$toDate)
    {   
	   
	    $sql =$this->select()->setIntegrityCheck(false)
					->from(array('r' => $this->_name))
		           ->joinLeft(array('c'=>'currency'),'c.id = r.currency_id',array('name'))
		           ->where('r.currency_id=?',$currency)
				   ->where("r.date >= ?",  $fromDate)
                   ->where("r.date <= ?",  $toDate);
		return $this->fetchAll($sql	);	   
		           
       
    }
	
	public function contentRate()
	{
	 
	  $select=$this->select()
	               ->from($this->_name)
				   ->where('rate_id=?',$id);//strttotime('-1 days');
	    print_r($select->assemble());die();
	  return $select;
	
		   
	}

    public function getAverageRate($currencyId)
	{
	   $query=$this->select()->setIntegrityCheck(false)
	               ->from(array('r'=>$this->_name))
	               ->joinLeft(array('c'=>'currency'),'c.id = r.currency_id',array('c.name',new Zend_Db_Expr('AVG(r.buy_price) AS avgbuy'),new Zend_Db_Expr('AVG(r.sell_price) AS avgsell'),new Zend_Db_Expr('MONTHNAME(r.date) AS month'),new Zend_Db_Expr('YEAR(r.date) AS year')))
				   ->where('r.currency_id=?',$currencyId)
				   ->group('month')
				   ->order(array(new Zend_Db_Expr('MONTH(r.date)')));
				  //print_r($query->assemble());die;
	     return $this->fetchAll($query);
	}

    
	 public function getRecentRate()
	 { 
	  $currentDateTime=date('Y-m-d');
	  $query=$this->select()->setIntegrityCheck(false)
	               ->from(array('r'=>$this->_name))
	               ->joinLeft(array('c'=>'currency'),'c.id = r.currency_id',array('name'))
				   ->where('date=?', $currentDateTime);
				    
		return $this->fetchAll($query);
	 }

	

	

	
	public function getonePageOfCurrency($page=1)
	{
	$query=$this->select()->setIntegrityCheck(false)
				->from(array('r' => $this->_name))
		        ->joinLeft(array('c'=>'currency'),'c.id = r.currency_id',array('name'));
		        
	$paginator= new Zend_Paginator(new Zend_Paginator_Adapter_DbTableSelect($query));//DbTableSelect 	Use a Zend_Db_Table_Select instance, which will return an instance of Zend_Db_Table_Rowset_Abstract.
                                                                                   //	This provides additional information about the result set, such as column names. 
	$paginator->setItemCountPerPage(19);
	$paginator->setCurrentPageNumber($page);
	
	return $paginator;
	
	}
	

	
}

?>
