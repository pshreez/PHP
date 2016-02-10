<?php

class Release extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('release_model');
        $this->load->model('agreement/agreement_model');
        $this->load->model('expenditure/expenditure_model');
    }

    function index() {
        
        $getParameter = $this->uri->segment(3);
        $dataTable=$this->db->get_where('I_AGREEMENT', array('AGREEMENT_CD =' => $getParameter))->result();      
        $form = $this->releaseForm();
        $view = array(
            'content' => 'release_view',
            'page' => $this->uri->segment(1),
            'list' => $form,
            'a_id' => $getParameter,
            'adata' => $dataTable
        );

        $this->load->view('/includes/content', $view);
    }

    function releaseForm() {

        $releaseForm = array();
        //$data= $this->release_model->data();
        $budget = $this->agreement_model->getBudget();
        $donor = $this->agreement_model->getDonor();
        $economic = $this->expenditure_model->exp_economic();
        $source = $this->expenditure_model->getsource_Ndese();
        $releaseForm['RELEASE_NUM'] = array(form_label('निकासा  नुम्बेर :', 'RELEASE_NUM'), form_input(array('name' => 'RELEASE_NUM', 'class' => 'number')));
        $releaseForm['BUD_YEAR'] = array(form_label('बुद्गेत बर्ष ', 'RELEASE_EDATE'), form_input(array('name' => 'BUD_YEAR', 'class' => 'number')));
        $releaseForm['REFERENCE_NUM'] = array(form_label('ररेफ़रेंस नुम्बेर :', 'REFERENCE_NUM'), form_input(array('name' => 'REFERENCE_NUM', 'class' => 'number')));
        $releaseForm['RELEASE_EDATE'] = array(form_label('मिति :', 'RELEASE_EDATE'), form_input(array('name' => 'RELEASE_EDATE', 'class' => 'number', 'id' => 'releaseEdate')));
        $releaseForm['RELEASE_NDATE'] = array(form_input(array('name' => 'RELEASE_NDATE', 'class' => 'number', 'id' => 'releaseNdate')));
        $releaseForm['ACC_CODE'] = array(form_label('बुद्गेत सिर्सक ', 'ACC_CODE'), form_input(array('name' => 'ACC_CODE', 'id' => 'typeauto', 'class' => 'number')), form_input(array('name' => 'ACC', 'id' => 'autocomplete', 'width' => '500px'))); //form_dropdown('ACC_CODE', $budget, '', 'class="dropdown"'));
        $releaseForm['REMARKS'] = array(form_label('कैफियत  ', 'REMARKS'), form_input(array('name' => 'REMARKS', 'class' => 'number')));
        $releaseForm['ECONOMIC_CODE5'] = array(form_label('बिवरण :', 'ECONOMIC_CODE5'), form_dropdown('ECONOMIC_CODE5[]', $economic, '', 'maxlength ="2"'));
        $releaseForm['SOURCE_TYPE_CODE'] = array(form_dropdown('SOURCE_TYPE_CODE[]', $source));
        $releaseForm['DONOR_CODE'] = array(form_dropdown('DONOR_CODE[]', $donor));
        $releaseForm['AMOUNT'] = array(form_input(array('name' => 'AMOUNT[]', '')));
        return $releaseForm;
    }

    function operate() {

        $getParameter = $this->uri->segment(3);
        $release_id = $this->agreement_model->autoincrement($i=null,$table="C_RELEASE_MASTER",$column="RELEASE_NUM");
        $data1 = array(
            'RELEASE_NUM' =>$release_id ,
            'BUD_YEAR' => $this->input->post('BUD_YEAR'),
            'REFERENCE_NUM' => $this->input->post('REFERENCE_NUM'),
            'RELEASE_EDATE' => $this->input->post('RELEASE_EDATE'),
            'RELEASE_NDATE' => $this->input->post('RELEASE_NDATE'),
            'ACC_CODE' => $this->input->post('ACC_CODE'),
            'CREATED_BY' => 'shreez',
            'CREATED_DATE' => '01-SEP-2011',
            'AGREEMENT_ID' => $getParameter,
            'REMARKS' => $this->input->post('REMARKS')
        );

        $this->release_model->insert($data1);
        $economic = $this->input->post('ECONOMIC_CODE5');
        $amount = $this->input->post('AMOUNT');
        $source = $this->input->post('SOURCE_TYPE_CODE');
        $donor = $this->input->post('DONOR_CODE');

        $release_detail = $data1['RELEASE_NUM'];
        $this->release_model->insertarray($economic, $amount, $source, $donor,$release_detail);
        

//       $release_id=$this->agreement_model->autoincrement($i=null,$table="C_RELEASE_MASTER",$column="RELEASE_NUM");
//  $getParameter = $this->uri->segment(3);
//            $data_m = array(
//                'RELEASE_NUM' => $this->input->post('RELEASE_NUM') ,
//                'BUD_YEAR' => $this->input->post('BUD_YEAR'),
//                'REFERENCE_NUM' => $this->input->post('REFERENCE_NUM'),
//                'RELEASE_EDATE' => $this->input->post('RELEASE_EDATE'),
//                'RELEASE_NDATE' => $this->input->post('RELEASE_NDATE'),
//                'ACC_CODE' => $this->input->post('ACC_CODE'),
//                'CREATED_BY' => 'shreez',
//                'CREATED_DATE' => '01-SEP-2011',
//                'AGREEMENT_ID' => $getParameter,
//                'REMARKS' => $this->input->post('REMARKS')
//            );
//            $this->release_model->insert($data_m);
//            
//            $economic = $this->input->post('ECONOMIC_CODE5');
//            $amount = $this->input->post('AMOUNT');
//            $source = $this->input->post('SOURCE_TYPE_CODE');
//            $donor = $this->input->post('DONOR_CODE');
//            $release_detail = $data1['RELEASE_NUM'];
//           //  var_dump($economic);var_dump($amount);var_dump($source);var_dump($donor);var_dump($donor);
//            $this->release_model->insertarray($economic, $amount, $source, $donor,$release_detail);
        }
    

    function gets($param) {
        $data = $this->release_model->data($param);
        echo json_encode($data);
    
    
    
    }  
    
    
    
    }
