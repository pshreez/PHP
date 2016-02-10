<?php

class organization_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

//    function data($organization_name, $organization_symbol, $organization_rate) {
//        $data = array(
//            'c_curr_name' => $organization_name,
//            'c_symbol' => $organization_symbol,
//            'c_rate' => $organization_rate
//        );
//        return $data;
//    }

    function get_list() {
       //$query = "SELECT * FROM C_CURRENCY";

       $run = $this->db->query("SELECT * FROM C_ORGANIZATION");
    $org_data = $run->result();
    
    return $org_data;
   
                     
                     }

     function insert($data) {
   
       $request = $this->load->library('Sqlclass');
       $datas = $request ->insert('C_ORGANIZATION', $data) ;
    
     
                     $sd = $this->db->query($datas);
     
 
    }
}