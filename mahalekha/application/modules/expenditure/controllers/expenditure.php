<?php

class Expenditure extends MX_Controller {

    function __construct() {
        parent::__construct();

        //load model
        $this->load->model('expenditure_model');
        $this->load->model('agreement/agreement_model');
    }

    function index() {
        $form = $this->expenditureForm();
        $view = array(
            'content' => 'expenditure_view',
            'page' => $this->uri->segment(1),
            'list' => $form
        );

        $this->load->view('/includes/content', $view);
    }

    function expenditureForm() {
        $expenditureForm = array();
        $org = array('name', 'place');
        $budget = $this->agreement_model->getBudget();
        $donor = $this->agreement_model->getDonor();
        $economic = $this->expenditure_model->exp_economic();
        $source = $this->expenditure_model->getsource_Ndese();
        $expenditureForm['VOUCHER_NUM'] = array(form_label('वौचेर नुम्बेर :', 'VOUCHER_NUM'), form_input(array('name' => 'VOUCHER_NUM', 'class' => 'number')));
        $expenditureForm['VOUCHER_EDATE'] = array(form_label('मिति :', 'VOUCHER_EDATE'), form_input(array('name' => 'VOUCHER_EDATE', 'class' => 'number','id' =>'voucherEdate')));
        $expenditureForm['VOUCHER_NDATE'] = array(form_input(array('name' => 'VOUCHER_NDATE', 'class' => 'number','id' =>'voucherNdate')));
        $expenditureForm['ACC_CODE'] = array(form_label('बुद्गेत सिर्सक ', 'ACC_CODE'), form_input(array('name' => 'ACC_CODE', 'id' => 'typeauto', 'class' => 'number')), form_input(array('name' => 'ACC_CODE', 'id' => 'autocomplete', 'width' => '500px'))); //form_dropdown('ACC_CODE', $budget, '', 'class="dropdown"'));
        $expenditureForm['REMARKS'] = array(form_label('कैफियत  ', 'REMARKS'), form_input(array('name' => 'REMARKS')));
        
        
        $expenditureForm['ECONOMIC_CODE5'] = array(form_label('बिवरण :', 'ECONOMIC_CODE5'), form_dropdown('ECONOMIC_CODE5', $economic, '', ' class="economic"'));
        $expenditureForm['SOURCE_TYPE_CODE'] = array(form_dropdown('SOURCE_TYPE_CODE', $source, '', 'class="source"'));
        $expenditureForm['DONOR_CODE'] = array(form_dropdown('DONOR_CODE', $donor, '', 'class="donor"'));
        $expenditureForm['TRANSIT'] = array(form_dropdown('TRANSIT', array('कोलेनिका ', 'बा . ख '), '', 'class="transit"'));
        $expenditureForm['AMOUNT'] = array(form_input(array('name' => 'AMOUNT', 'class'=>'amounts')));
        $expenditureForm['AMOUNT_TYPE'] = array(form_dropdown('AMOUNT_TYPE', array('d' => 'डेबिट ', 'c' => 'क्रेडिट '),'','class="amountType"'));
        return $expenditureForm;
    }
    
    

    function operate() {

        $data1 = array(
            'VOUCHER_NUM' => $this->input->post('VOUCHER_NUM'),
            'VOUCHER_EDATE' => $this->input->post('VOUCHER_EDATE'),
            'VOUCHER_NDATE' => '9-sep-2013',
            'ACC_CODE' => $this->input->post('ACC_CODE'),
            'CREATED_BY' => 'us',
            'CREATED_DATE' => '9-sep-2013',
            'AGREEMENT_ID' => 23,
            'REMARKS' => $this->input->post('REMARKS')
        );
        $this->expenditure_model->insert($data1);

        $data2 = array(
            'INFO_ID' => array(1, 2),
            'ECONOMIC_CODE5' => $this->input->post('ECONOMIC_CODE5'),
            'AMOUNT' => $this->input->post('AMOUNT'),
            'AMOUNT_TYPE' => $this->input->post('AMOUNT_TYPE'),
            'SOURCE_TYPE_CODE' => $this->input->post('SOURCE_TYPE_CODE'),
            'DONOR_CODE' => $this->input->post('DONOR_CODE')
        );

    }

     function viewlist() {
      $vaucharNum = $this->uri->segment(3);
        $a_list['a_list'] = $this->expenditure_model->get_list($id);
        
 
        $view_list = array(
            
            'content' => 'expenditure_list',
            'page' => $this->uri->segment(1),
            'list' =>  $a_list,
            'vaucharNumber' => $vaucharNum 
        );

         $this->load->view('includes/content', $view_list);
         
         }
}