<?php

class PaginatorController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {  
	  if(!Zend_Auth::getInstance()->getIdentity())
	  {
	   $this->_redirect('index');
	  }
      $this->view->title="currency";
	  $this->view->headTitle($this->view->title,'PREPEND');
	  $currency= new Application_Model_DbTable_Rate();
	$currencies=$currency->fetchDataRate();
	  $page=$this->_request->getParam('page');//Note: getParam() Retrieves More than User Parameters
                                               //In order to do some of its work, getParam() actually retrieves from several sources.
											  //use the setParam() and getParam() methods to set or retrieve user parameters.
	  if(empty($page)){$page=1;}
	  $paginator=$currency->getOnePageOfCurrency($page);
	  $this->view->paginator =$paginator;
	  
	 } 
	 
    
	
	public function exportCsvAction()
	{  
	  $this->_helper->layout->disableLayout();
      $this->_helper->viewRenderer->setNeverRender();   
      $name="";
      header('Content-type: application/xls');
      header('Content-Disposition: attachment; filename="'.$name.'"');
      echo $this->getCsv();
     }
	 
	 
	 public function getCsv()
    {   
    $currency= new Application_Model_DbTable_Rate();
	$exportData=$currency->fetchDataRate();
    $csv_terminated = "\n";
    $csv_separator = ",";
    $csv_enclosed = '"';
    $csv_escaped = "\\";        

    $schema_insert = "";

    $l = $csv_enclosed . str_replace($csv_enclosed, $csv_escaped . $csv_enclosed,
    stripslashes("Currency Name")) . $csv_enclosed;
    $schema_insert .= $l;
    $schema_insert .= $csv_separator;

    $l = $csv_enclosed . str_replace($csv_enclosed, $csv_escaped . $csv_enclosed,
    stripslashes("Date")) . $csv_enclosed;
    $schema_insert .= $l;
    $schema_insert .= $csv_separator;
	$l = $csv_enclosed . str_replace($csv_enclosed, $csv_escaped . $csv_enclosed,
    stripslashes("Buy Price")) . $csv_enclosed;
    $schema_insert .= $l;
    $schema_insert .= $csv_separator;
	$l = $csv_enclosed . str_replace($csv_enclosed, $csv_escaped . $csv_enclosed,
    stripslashes("Sell Price")) . $csv_enclosed;
    $schema_insert .= $l;
    $schema_insert .= $csv_separator;

    $out = trim(substr($schema_insert, 0, -1));
    $out .= $csv_terminated;

    if(count($exportData) > 0)
    {              
        foreach($exportData as $content)
        {   
             $schema_insert = '';

                  

                   $schema_insert .= $csv_enclosed . 
                   str_replace($csv_enclosed, $csv_escaped . $csv_enclosed, $content->name) . $csv_enclosed;
                   $schema_insert .= $csv_separator;
					
                   $schema_insert .= $csv_enclosed . 
                   str_replace($csv_enclosed, $csv_escaped . $csv_enclosed, $content->date) . $csv_enclosed;
                   $schema_insert .= $csv_separator;
					
                    $schema_insert .= $csv_enclosed . 
                    str_replace($csv_enclosed, $csv_escaped . $csv_enclosed, $content->buy_price) . $csv_enclosed;

                    $schema_insert .= $csv_separator;

                    $schema_insert .= $csv_enclosed . 
                    str_replace($csv_enclosed, $csv_escaped . $csv_enclosed, $content->sell_price) . $csv_enclosed;
                   

                 

         
            $out .= $schema_insert;
            $out .= $csv_terminated;

        }
    }
    return $out;
}

  public function csvAction()
  {   
     $id=$this->_request->getParam('id','');
     $tableDatas= new Application_Model_DbTable_Rate();
	 $tableData=$tableDatas->fetchDataRate($id);
	 //var_dump($tableData);die;
	 $dataArray=array();
	 $dataArray[0] = array('Name','Date','Buy','Sell');
	 foreach($tableData as $data)
     {
	  
	    $dataArray[]=array($data['name'],$data['date'],$data['buy_price'],$data['sell_price']);
		
	 }
	 //var_dump($dataArray);die;
	 $this->downloadCsv($dataArray);
  }

  public function downloadCsv($newData)
	 {  
	 	
	    $name = "ForeignExchangeReport-".date('Y-m-d_H:i:s'). ".csv";
        $tmpfile =tempnam(sys_get_temp_dir(),$name);
        $fp=fopen($tmpfile,"w");
		foreach($newData as $fields)
		 {  
		   fputcsv($fp,$fields);
		   
		 }
		// var_dump($fields);die;
		 fclose($fp);
		 
		 $data=file_get_contents($tmpfile);
		 //print_r($data);die();
		 header('Content-Type: application/csv');
		 header('Content-Type: application/force-download');
        header('Content-Disposition: attachment; filename='.$name);
	
         print  $data;
        unlink($tmpfile);
		exit();
	 }
    
	
	public function recentAction()
	{
	  $presentData=new Application_Model_DbTable_Rate();
	  $data=$presentData->getRecentRate();
	   $this->view->data=$data;
	   //var_dump($data);die;
	}
	 
}