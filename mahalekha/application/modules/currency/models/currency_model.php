<?php

class Currency_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function data($currency_name, $currency_symbol, $currency_rate) {
        $data = array(
            'c_curr_name' => $currency_name,
            'c_symbol' => $currency_symbol,
            'c_rate' => $currency_rate
        );
        return $data;
    }

    function getCurrency() {
        
        //$query = "SELECT * FROM C_CURRENCY";

        $run = $this->db->query("SELECT * FROM C_CURRENCY");
        $curr_data = $run->result();
        // var_dump($curr_data);die;
        foreach ($curr_data as $value) {

            $data[$value->CURR_CD] = array($value->CURR_ENAME, $value->CREATED_BY);
            //$data[$value->CURR_CD] = $value->CREATED_BY;
        }
        //var_dump($data);die;
        return $data;
    }

    function insert($data) {

        $request = $this->load->library('Sqlclass');
        $datas = $request->insert('C_CURRENCY', $data);
        //$query = query()

        $sd = $this->db->query($datas);
    }

}