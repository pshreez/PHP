<?php



				class Application_Form_Content extends Zend_Form
				{
                 public function init()
				 { 
				 
				    $this->setName('curencyInfo')
					     ->setMethod('post')
						 ->setAction('currencyinfo/getcontent');
				   // $id = new Zend_Form_Element_Hidden('currency_id');
                    //$id->addFilter('Int');
				   
				    $currencyModel= new Application_Model_DbTable_Currency();
					$currencies = $currencyModel->fetchCurrency();
					
				    $select = new Zend_Form_Element_Select('currency_id');
					$select->setLabel('Currency');
					foreach ($currencies as $currecy)
					    $select->addMultiOption($currecy['id'], $currecy['name']);
				
						 
				    $fromDate = new Zend_Form_Element_Text('fromDate');
						 
					$fromDate->setLabel('From:')
								->setRequired(true)
								->addFilter('StripTags')
								->addFilter('StringTrim')
								->addValidator('NotEmpty');
					$fromDate->setAttrib('id', 'fromDate');
						
					$toDate = new Zend_Form_Element_Text('toDate');
					$toDate->setLabel('To:')
					       ->addValidator('NotEmpty')
					       ->setRequired ( true )
                           ->addFilter ( 'StripTags' )
                           ->addFilter ( 'StringTrim' );
           
					$toDate->setAttrib('id', 'toDate');
					
										   
					 //$date= new Zend_Form_Element_Date('date of transaction');
					// $date->setLabel('Choose date:');
					 $submit=new Zend_Form_Element_Submit('submit');
					 $submit->setLabel('GO')
					        ->setRequired(true);
				    $this->addElements(array($select,$fromDate,$toDate,$submit));
			      
				  }
                 }

			
				
?>
