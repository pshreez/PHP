<?php

class reports_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getrevenuReports() {
        $query = " SELECT * FROM C_INVESTMENT_MASTER";
        $run = $this->db->query($query);
        $datas = $run->result();
        foreach ($datas as $value) {
            $data[$value->VOUCHER_NUM] = $value->CREATED_DATE;
        }
        
        return $data;
    }

}