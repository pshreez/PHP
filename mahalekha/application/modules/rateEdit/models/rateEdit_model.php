<?php

class rateEdit_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getAgreementId($getParameter) {
        if (isset($getParameter)) {
            $data = $this->db->get_where('I_AGREEMENT', array('AGREEMENT_CD' => $getParameter));
            return $data;
        } else {
            return false;
        }
    }

    function editRate($getParameter) {

        $data = $this->db->get_where('C_INTEREST_DETAIL', array('DETAIL_ID' => $getParameter))->result();
        return $data;
    }

    function update($data) {

        $rateId = $this->uri->segment(3);
   
        $this->db->where('DETAIL_ID', $rateId);
        $this->db->update('C_INTEREST_DETAIL', $data);
        redirect('agreement/viewlist');
    }

}