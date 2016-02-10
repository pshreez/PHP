<?php

class Revenue extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('revenue_model');
        $this->load->library('sqlclass');
        $this->load->model('expenditure/expenditure_model');
        $this->load->model('agreement/agreement_model');
        
    }

    function index() {

        //    $this->revenue_model->getrevenue();
        //die;
        $this->load->library('table');
        $this->load->helper('form');
        $revenueForm = $this->revenueForm();

        $view = array(
            'content' => 'revenue_view',
            'page' => $this->uri->segment(1),
            'list' => $revenueForm
        );

        $this->load->view('/includes/content', $view);
    }

    function revenueForm() {
        $revenueForm = array();
        $this->load->model('revenue_model');
        $economic = $this->expenditure_model->exp_economic();
        $donor = $this->agreement_model->getDonor();
        $source = $this->expenditure_model->getsource_Ndese();
        $budget = $this->agreement_model->getBudget();
        //REVENUE MASTER-------------------------------------------------------------------------------------
        
        $revenueForm['VOUCHER_NUM'] = array(form_label('भौचर नम्बर :', 'VOUCHER_NUM'), form_input(array('name' => 'VOUCHER_NUM', 'class' => 'number')));
        $revenueForm['VOUCHER_EDATE'] = array(form_label('भौचर मिति :', 'VOUCHER_EDATE'), form_input(array('name' => 'VOUCHER_EDATE', 'class' => 'number','id' =>'rvoucherEdate')));
        $revenueForm['VOUCHER_NDATE'] = array(form_input(array('name' => 'VOUCHER_NDATE', 'class' => 'number','id' =>'rvoucherNdate')));
        $revenueForm['ACC_CODE'] = array(form_label('बुद्गेत सिर्सक ', 'ACC_CODE'), form_input(array('name' => 'ACC_CODE', 'id' => 'typeauto', 'class' => 'number')), form_input(array('name' => 'ACC_CODE', 'id' => 'autocomplete', 'width' => '500px'))); //form_dropdown('ACC_CODE', $budget, '', 'class="dropdown"'));
        $revenueForm['CREATED_BY'] = array(form_label(' प्रतिपादन BY:', 'CREATED_BY'), form_input(array('name' => 'CREATED_BY')));
        $revenueForm['CREATED_DATE'] = array(form_label('प्रतिपादन मिति :', 'CREATED_DATE'), form_input(array('name' => 'CREATED_DATE')));
        $revenueForm['AGREEMENET_ID'] = array(form_label(' agreement id :', 'AGREEMENET_ID'), form_input(array('name' => 'AGREEMENET_ID')));
        
        //  REVENUE DETAIL--------------------------------------------------------------------------------------
        
       // $revenueForm['INFO_ID'] = array(form_label('राजस्व कोड :', 'INFO_ID'), form_input(array('name' => 'INFO_ID[]', 'class' => 'number')));
        $revenueForm['AMOUNT_EDESC'] = array(form_label('मूल्य EDESC :', 'AMOUNT_EDESC'), form_input(array('name' => 'AMOUNT_EDESC[]', 'class' => 'number' )));
        $revenueForm['AMOUNT_NDESC'] = array(form_input(array('name' => 'AMOUNT_NDESC[]', 'class' => 'number')));
        $revenueForm['BANK_VOUCHER_NUM'] = array(form_label('बैंक भौचर नम्बर :', 'BANK_VOUCHER_NUM'), form_input(array('name' => 'BANK_VOUCHER_NUM[]', 'class' => 'number')));
        $revenueForm['BANK_VOUCHER_DATE'] = array(form_label('बैंक भौचर मिति :', 'BANK_VOUCHER_DATE'), form_input(array('name' => 'BANK_VOUCHER_DATE[]', 'class' => 'number')));
        $revenueForm['BANK_CODE'] = array(form_label('बैंक कोड :', 'BANK_CODE'), form_input(array('name' => 'BANK_CODE[]')));
        // $revenueForm['REVENUE_DETAIL'] = array(form_label('revenu detail :', 'REVENUE_DETAIL'), form_input(array('name' => 'REVENUE_DETAIL', 'class' => 'REVENUE_DETAIL')));
       
        // REVENUE DETAIL DROPDOWNS----------------------------------------------------------------------
       
        $revenueForm['AMOUNT'] = array(form_label('मुल्य :', 'AMOUNT'), form_input(array('name' => 'AMOUNT[]', 'class' => 'AMOUNT')));
        $revenueForm['ECONOMIC_CODE5'] = array(form_dropdown('ECONOMIC_CODE5[]', $economic, '',  ' class="dropdown"','id="reve_economic"'));
        $revenueForm['AMOUNT_TYPE'] = array(form_dropdown('AMOUNT_TYPE[]', array('d' => 'डेबिट ', 'c' => 'क्रेडिट ')));
        $revenueForm['SOURCE_TYPE_CODE'] = array(form_dropdown('SOURCE_TYPE_CODE[]', $source, '', 'class="source"'));
        $revenueForm['DONOR_CODE'] = array(form_dropdown('DONOR_CODE[]', $donor, '', 'class="donor"'));
        $revenueForm['TRANSIT'] = array(form_dropdown('TRANSIT', array('कोलेनिका ', 'बा . ख '), '', 'class="transit"'));
        
        $revenueForm['SUBMIT'] = array(form_submit('SUBMIT', 'Submit'));
        
        return $revenueForm;
    }

    function operate() {
      
        $data_m = array(
            'VOUCHER_NUM' => $this->input->post('VOUCHER_NUM'),
            'VOUCHER_EDATE' => $this->input->post('VOUCHER_EDATE'),
            'VOUCHER_NDATE' => $this->input->post('VOUCHER_NDATE'),
            'ACC_CODE' => $this->input->post('ACC_CODE'),
            'CREATED_BY' => $this->input->post('CREATED_BY'),
            'CREATED_DATE' => $this->input->post('CREATED_DATE'),
            'AGREEMENET_ID' => $this->input->post('AGREEMENET_ID')
                         );
                
        
        $this->revenue_model->insert($data_m);
     
        $vauchernum = $this -> input -> post ('VOUCHER_NUM');
        $economic = $this->input->post('ECONOMIC_CODE5');
        $amount  = $this->input->post('AMOUNT');
       // $amount_e  = $this->input->post('AMOUNT_EDESC');
        //$amount_n  = $this->input->post('AMOUNT_NDESC');
        $amount_t  = $this->input->post('AMOUNT_TYPE');
        $bankVnum  = $this->input->post('BANK_VOUCHER_NUM');
        $bankVdate  = $this->input->post('BANK_VOUCHER_DATE');
        $bankCode  = $this->input->post('BANK_CODE');
        $source = $this->input->post('SOURCE_TYPE_CODE');
        $donor = $this->input->post('DONOR_CODE');
        

       
       //$this->revenue_model->insertarray($economic,$amount,$amount_t,$source,$donor);
        $this->revenue_model->insertarray($vauchernum,$economic,$amount,$amount_t,$bankVnum,$bankVdate,$bankCode,$source,$donor);
    }

}