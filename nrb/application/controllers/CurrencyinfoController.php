<?php

class CurrencyinfoController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
      $this->_forward('content');
    }
    
	
	
	 
	public function contentAction()
    
    {    if(!Zend_Auth::getInstance()->getIdentity())
	     {
		   $this->_redirect('index/login');
		 }
	    
	    $form = new Application_Form_Content();
        $this->view->form = $form;
		
    }
	
	 public function getcontentAction()
	  {		
	   $this->_request->getParam('id');     
	   $form = new Application_Form_Content();
	    if($this->getRequest()->isPost())
		{
		   $data=$this->getRequest()->getPost();
		   
					if($form->isValid($data))
					 {
					    	
					      $currency =$form->getValue('currency_id');
						  $fromDate=$form->getValue('fromDate');
						  $toDate=$form->getValue('toDate');
						  $currencyList= new Application_Model_DbTable_Rate();
						  $currencies=$currencyList->getcontentRate($currency,$fromDate,$toDate);
						 // var_dump($currencies);die;
						// var_dump($fromDate);die;
						  $this->view->currencies=$currencies;
						  $this->view->currency_id = $currency;
						 $this->view->fromDate = $fromDate;
						  $this->view->toDate = $toDate;
					
				     }
					else {
					     $this->_redirect('currencyinfo/content');
				}
		}
	}		
	
	public function selectAction()
	 {
	        $form = new Application_Form_Content();
			$form->setAction('getgraph');
			$form->currency_id->setLabel('Choose the currency');
			$form->removeElement('fromDate');
			$form->removeElement('toDate');
			$this->view->form = $form;
	 }
	


			
    public function getgraphAction()
       {    
	      
	   
	    if($result=$this->getRequest()->isPost())
		{
		   $form = new Application_Form_Content();
		   $data=$this->getRequest()->getPost();
					if($form->isValid($data))
					 {
					  echo"shreejana";
					 }
					 
					 else
					 {
							$currencyId =$form->getValue('currency_id');
							$graphs= new Application_Model_DbTable_Rate();
							$graph=$graphs->getAverageRate($currencyId);
							$dataArray=array();
							$dataArray[0]['name']="Buying price";
							$dataArray[1]['name']="Selling price";
							$i=0;
							foreach($graph as $graphArray)
							{
							  $dataArray[0]['data'][$i]=(float)$graphArray['avgbuy'];
							  $dataArray[1]['data'][$i]=(float)$graphArray['avgsell'];
							  $months[$i]=$graphArray['month'];
							  $year['yr']=$graphArray['year'];
							  $currencyName['nm']=$graphArray['name'];
							  $i++;
							}
							
							$this->view->dataArray=$dataArray;
							$this->view->months=$months;
							$this->view->year=$year;
							$this->view->currencyName=$currencyName;
					
					 }
					 
					
		}
	}	


    public function loadAction()
    {
    $data=new Customloader_Loadfile();
	$datas=$data->getdata();
	
	
    }	
	       
		    
	 
	
	  
}

