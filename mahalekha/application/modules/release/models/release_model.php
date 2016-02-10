<?php

class Release_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('agreement/agreement_model');
    }

   function insert($data1) {
      //  var_dump($data1);
        $request = $this->load->library('Sqlclass');
        $datas = $request->insert('C_RELEASE_MASTER', $data1);
        $data = $this->db->query($datas);
        return $data;
    }

    
    
    function insertarray($economic, $amount, $source, $donor,$release) {
        
        $data = array();
        for ($i = 0; $i < count($economic); $i++){   
            $id = $this->agreement_model->autoincrement($j=null,$table="C_RELEASE_DETAIL",$column="RELEASE_ID");
            $data[] = array(
                'ECONOMIC_CODE5' => $economic[$i],
                'AMOUNT' => $amount[$i],
                'SOURCE_TYPE_CODE' => $source[$i],
                'DONOR_CODE' => $donor[$i],
                'RELEASE_DETAIL' => $release
            );           
            $value = "'" . implode("','", $data[$i]) . "'";
            $insert[] = "INSERT INTO C_RELEASE_DETAIL (RELEASE_ID, ECONOMIC_CODE5, AMOUNT,
                           SOURCE_TYPE_CODE,DONOR_CODE,RELEASE_DETAIL) VALUES 
                         ($id,$value)";   
            $id++;
        }
            foreach ($insert as $ins) {
                $this->db->query($ins);
            }
            
            
        }
    

    function data($param) {
//    {select a.acc_code,p.project_Edesc from c_account a left outer join 
//                                   c_project p on a.project_code =p.project_code where ROWNUM <= 10 and a.acc_code like '%2120124%';
        $query = " select DISTINCT a.acc_code,p.project_edesc from c_account a left join 
                                   c_project p on a.project_code =p.project_code where  a.acc_Code like '%$param%' ";
        $data = $this->db->query($query);

        return $data->result();
    }

}