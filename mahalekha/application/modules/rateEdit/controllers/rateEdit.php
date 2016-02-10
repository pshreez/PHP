<?php

class rateEdit extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('rateEdit_model');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('table');
        // $this->load ->model('agreement_model');
    }

    function index() {
        
    }

    function rateEditForm() {
        $rateEditForm = array();
        $this->load->library('table');

        $rateEditForm['ACTUAL_RATE'] = array(form_label('ब्याज दर:', 'ACTUAL_RATE'), form_input(array('name' => 'ACTUAL_RATE', 'class' => 'number', 'maxlength' => 9)));

        $rateEditForm['NEW_RATE'] = array(form_label('new ब्याज दर:', 'NEW_RATE'), form_input(array('name' => 'NEW_RATE', 'class' => 'number')));

        $rateEditForm['ALTERED_RATE'] = array(form_label('ब्याज दर difference:', 'ALTERED_RATE'), form_input(array('name' => 'ALTERED_RATE', 'class' => 'number')));

        $rateEditForm['INTEREST_CHANGE'] = array(form_label('किस्ता रकम change:', 'INTEREST_CHANGE'), form_input(array('name' => 'INTEREST_CHANGE', 'class' => 'number')));

        return $rateEditForm;
    }

    function edit() {


        $agreeID = $this->uri->segment(3);
        $actualRate = $this->uri->segment(4);
        $rate = $this->uri->segment(5);
        $model = $this->load->model('rateEdit_model');
        $data = $model->editRate($agreeID);
        $form = $this->rateEditForm();
        $view_list = array(
            'content' => 'rateEdit_view',
            'list' => $form,
            'page' => $this->uri->segment(1),
            'a_id' => $agreeID,
            'a_rate' => $rate,
            'rate' => $actualRate
        );
        $this->load->view('/includes/content', $view_list);
    }

    function operate() {

        $data = array(
            'ACTUAL_RATE' => $this->input->post('NEW_RATE'),
            'ALTERED_RATE' => $this->input->post('ALTERED_RATE'),
            'INTEREST_CHANGE' => $this->input->post('INTEREST_CHANGE')
        );
        $this->rateEdit_model->update($data);
    }

}