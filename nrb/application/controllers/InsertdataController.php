<?php

class InsertdataController extends Zend_Controller_Action
{

    public function init()
    {
       
    }

    public function indexAction()
    {
	
	   $currency = new Application_Model_DbTable_Currency();
       $information= $currency->fetchIdCurrency();
               
	   foreach($information as $value){
				$id_of_currency[$value['id']]=$value['id'];
			   }
			    $this->view->id_of_currency=$id_of_currency;
				var_dump($id_of_currency);die;
	 
    
	//$rate= new Application_Model_DbTable_Rate()
	//$rate->currencyInfoRate($date,$sell,$buy,$currency_id);
	//var_dump($rates);
    }


}

