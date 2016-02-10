<?php

class Expenditure_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getsource_Ndese() {

        $query = "SELECT * FROM C_SOURCE_TYPE";
        $run = $this->db->query($query);
        $datas = $run->result();
        foreach ($datas as $value) {

            $data[$value->SOURCE_TYPE_CODE] = $value->SOURCE_TYPE_NDESC;
        }
        return $data;
    }

    function exp_economic() {

        $query = "SELECT * FROM C_ECONOMIC5 ORDER BY ECONOMIC_CODE5";
        $run = $this->db->query($query);
        $datas = $run->result();
        foreach ($datas as $value) {

            $data[$value->ECONOMIC_CODE5] = $value->ECONOMIC_CODE5 . '--------  ' . $value->ECONOMIC_NDESC5;
        }
        return $data;
    }

    function insert($data1) {
        $request = $this->load->library('Sqlclass');
        $datas_m = $request->insert('C_INVESTMENT_MASTER', $data1);
        $exp_data = $this->db->query($datas_m);
        return $exp_data;
    }

    function insert_drop($data2) {

        $request = $this->load->library('Sqlclass');
        //$value = "'".implode("','",$data2)."'";
        $val1 = '';
        $val2 = '';
        foreach ($data2 as $key) {
            $val1 .=$key[0] . ",";
            $val2 .=$key[1] . ",";
            $place[] = array($val1, $val2);
        }
        var_dump($place);
        die;
        /* $exp = explode(" ",$val); echo $exp; */
        $subs = substr($val, 0, -1);
        //
        $insert = "INSERT INTO $tbl ($subs) VALUES ($value)";
        $datas_d = $request->insert('C_INVESTMENT_DETAIL', $value);
        $expd_data = $this->db->query($datas_d);
        return $expd_data;
    }


    function get_list($id) {

//           $data =$this->db->get('C_INVESTMENT_MASTER')->result();
//          // var_dump($data);
        if ($id == null) {

            $this->db->SELECT('C_INVESTMENT_MASTER.VOUCHER_NUM,C_INVESTMENT_MASTER.ACC_CODE,C_INVESTMENT_MASTER.CREATED_DATE,
                   C_INVESTMENT_DETAIL.ECONOMIC_CODE5,C_INVESTMENT_DETAIL.SOURCE_TYPE_CODE,C_INVESTMENT_DETAIL.AMOUNT');
            $this->db->FROM('C_INVESTMENT_MASTER');
            $this->db->join('C_INVESTMENT_DETAIL', 'C_INVESTMENT_DETAIL.INVESTMENT_DETAIL =C_INVESTMENT_MASTER.VOUCHER_NUM ');
            $data = $this->db->get()->result();
            
        } else {

            $this->db->SELECT('*');
            $this->db->FROM('C_INVESTMENT_MASTER');
            $this->db->join('C_INVESTMENT_DETAIL', 'C_INVESTMENT_DETAIL.INVESTMENT_DETAIL = C_INVESTMENT_MASTER.VOUCHER_NUM');
            //$this->db->where('C_INVESTMENT_MASTER.VOUCHER_NUM', $id);
            $data = $this->db->get()->result();
        }
        return $data;
    }
    


}