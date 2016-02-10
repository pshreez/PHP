<?php
class Revenue_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}

        
        
   
    
function insert($data_m) {
 
        $request = $this->load->library('Sqlclass');
        $datas = $request->insert('C_REVENUE_MASTER', $data_m);
        $reve_data1 = $this->db->query($datas);
        return $reve_data1;
    }
    
   function insertarray($vauchernum,$economic,$amount,$amount_t, $bankVnum,$bankVdate,$bankCode,$source,$donor) 
    //function insertarray($economic,$amount,$amount_t,$source,$donor)
    {
         //var_dump($economic); var_dump($amount); var_dump($amount_t); var_dump($source); var_dump($donor);
        $data = array();
       
        for ($i = 0; $i < count($economic); $i++){

            $data[] = array(
                
                
                'ECONOMIC_CODE5' => $economic[$i],
                'AMOUNT' => $amount[$i],
                //'AMOUNT_EDESC' => $amount_e[$i],
              //  'AMOUNT_NDESC' => $amount_n[$i],
                'AMOUNT_TYPE' => $amount_t[$i],
                'BANK_VOUCHER_NUM' => $bankVnum[$i],
                'BANK_VOUCHER_DATE' => $bankVdate[$i],
                'BANK_CODE' => $bankCode[$i],
                'REVENUE_DETAIL' => $vauchernum[$i],
                'SOURCE_TYPE_CODE' => $source[$i],
                'DONOR_CODE' => $donor[$i]
            );
            //var_dump($data);die;
            //var_dump($data);
           
            $value = "'" . implode("','", $data[$i]) . "'";

            $insert[] = "INSERT INTO C_REVENUE_DETAIL (INFO_ID,ECONOMIC_CODE5, AMOUNT,
                           AMOUNT_TYPE,BANK_VOUCHER_NUM,BANK_VOUCHER_DATE,BANK_CODE,REVENUE_DETAIL,SOURCE_TYPE_CODE,DONOR_CODE) VALUES 
                         ($i,$value)";  
             
        }
            foreach ($insert as $ins) {
                $this->db->query($ins);
            
                
            }
          
            
    }
    
}