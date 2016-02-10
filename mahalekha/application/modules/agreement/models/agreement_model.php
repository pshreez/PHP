<?php

class Agreement_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getOrg() {
        $query = " SELECT * FROM C_ORGANIZATION";
        $run = $this->db->query($query);
        $datas = $run->result();
        foreach ($datas as $value) {
            $data[$value->ORG_CD] = $value->ORG_NNAME;
        }
        return $data;
    }

    function getDonor() {
        $query = " SELECT * FROM C_DONOR";
        $run = $this->db->query($query);
        $datas = $run->result();
        foreach ($datas as $value) {
            $data[$value->DONOR_CODE] = $value->DONOR_NDESC;
        }
        return $data;
    }

    function getSource() {
        $query = " SELECT * FROM C_SOURCE_TYPE";
        $run = $this->db->query($query);
        $datas = $run->result();
        foreach ($datas as $value) {
            $data[$value->SOURCE_TYPE_CODE] = $value->SOURCE_TYPE_NDESC;
        }

        return $data;
    }

    function getBudget() {

        $query = "SELECT * FROM C_ACCOUNT";
        $run = $this->db->query($query);
        $datas = $run->result();
        foreach ($datas as $value) {

            $data[$value->ACC_CODE] = $value->ACC_CODE;
        }
        return $data;
    }

    function insert($agreementID, $data, $rdata) {

        $request = $this->load->library('Sqlclass');
        $sql1 = $request->insert('I_AGREEMENT', $data);
        $sql2 = $request->insert('C_INTEREST_DETAIL', $rdata);
        if ($sql1 && $sql2) {
            $this->db->trans_start();
            $query1 = $this->db->query($sql1);
            $query2 = $this->db->query($sql2);
            $this->db->trans_complete();
            $msg['id'] = $agreementID;
            $msg['msg'] = "Agreementis created";
            echo json_encode($msg);
        } else {
            $msg['msg'] = "Agreement cannot be created";
            echo json_encode($msg);
        }
    }

    function get_list($id) {
        
        if ($id == null) {
            
            $this->db->SELECT('I_AGREEMENT.AGREEMENT_CD,I_AGREEMENT.PROJECT_NAME,I_AGREEMENT.AGREE_EDATE,
                    I_AGREEMENT.AMOUNT_NEPALI,C_INTEREST_DETAIL.ACTUAL_RATE,C_INTEREST_DETAIL.DETAIL_ID');
            $this->db->FROM('I_AGREEMENT');
            $this->db->join('C_INTEREST_DETAIL', 'C_INTEREST_DETAIL.AGREEMENT_ID = I_AGREEMENT.AGREEMENT_CD');
            $data = $this->db->get()->result();
            
        } else {
            
            $this->db->SELECT('*');
            $this->db->FROM('I_AGREEMENT');
            $this->db->join('C_INTEREST_DETAIL', 'C_INTEREST_DETAIL.AGREEMENT_ID = I_AGREEMENT.AGREEMENT_CD');
            $this->db->where('C_INTEREST_DETAIL.AGREEMENT_ID', $id);
             $data = $this->db->get()->result();
        }
        return $data;
    }

    function getAgreementId($getParameter) {
        if (isset($getParameter)) {
            $data = $this->db->get_where('I_AGREEMENT', array('AGREEMENT_CD' => $getParameter))->result();
            return $data;
        } else {
            return 0;
        }
    }

    //auto increment in database tables
    function autoincrement($num, $table, $column) {

        $counts = "SELECT COUNT($column) as count FROM $table";
        $case = $this->db->query($counts)->result();
        $count = $case[0]->COUNT;

        if ($count >= 1) {
            $ad = "SELECT MAX($column) as MAX FROM $table";
            $query = $this->db->query($ad)->result();
            $num = $query[0]->MAX;
            $num++;
        } else {
            $num = 1;
        }
        return $num;
    }

    function getInvestor() {
        $data = $this->db->get("C_DAYS")->RESULT();
        foreach ($data as $datas) {

            $investor[$datas->D_ID] = $datas->COUNTRY;
        }
        return $investor;
    }

    function amortData($id) {

        $this->db->SELECT("I_AGREEMENT.AGREE_EDATE,I_AGREEMENT.AMOUNT_NEPALI,I_AGREEMENT.GRACE_YEAR,I_AGREEMENT.INSTALLMENT_NUM,
                          I_AGREEMENT.INSTALLMENT_DURATION,I_AGREEMENT.PAYMENT_TYPE,C_INTEREST_DETAIL.ACTUAL_RATE");
        $this->db->FROM('I_AGREEMENT');
        $this->db->JOIN('C_INTEREST_DETAIL', 'C_INTEREST_DETAIL.AGREEMENT_ID = I_AGREEMENT.AGREEMENT_CD');
        $this->db->where('C_INTEREST_DETAIL.AGREEMENT_ID', $id);
        $data = $this->db->get()->result();
        return $data;
    }

}