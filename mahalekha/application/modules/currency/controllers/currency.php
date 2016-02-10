<?php

class Currency extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('currency_model');
        $this->load->library('sqlclass');
    }

    function index() {
        
        $this->currency_model->getCurrency();
         //die;
        $this->load->library('table');
        $this->load->helper('form');
        $currencydata = $this->currencyForm();

        $view = array(
            'content' => 'currency_view',
            'page' => $this->uri->segment(1),
            'list' => $currencydata
        );

        $this->load->view('/includes/content', $view);
    }

    function currencyForm() {
        $currencydata = array();
        $this->load->model('currency_model');
        //  $org[] = $this->agreement_model->getOrg();
        $currencydata['CURR_CD'] = array(form_label('मुद्रा कोड :', 'CURR_CD'), form_input(array('name' => 'CURR_CD', 'class' => 'CURR_CD')));

        $currencydata['CURR_ENAME'] = array(form_label('मुद्रा अंग्रेजीमा :', 'CURR_ENAME'), form_input(array('name' => 'CURR_ENAME', 'class' => 'CURR_ENAME')));

        $currencydata['CURR_NNAME'] = array(form_label('मुद्रा नेपालीमा :', 'CURR_NNAME'), form_input(array('name' => 'CURR_NNAME', 'class' => 'CURR_NNAME')));

        $currencydata['SYMBOL'] = array(form_label('मुद्रा संकेत : :', 'SYMBOL'), form_dropdown('SYMBOL', array('$', '/Rs', '£')));

        $currencydata['CREATED_BY'] = array(form_label('क्रिएट मुद्रा(created by):', 'CREATED_BY'), form_input(array('name' => 'CREATED_BY', 'class' => 'CREATED_BY')));

        $currencydata['DATETIME'] = array(form_label('मिति :', 'DATETIME'), form_input(array('name' => 'DATETIME', 'class' => 'DATETIME')));
        
        $currencydata['SUBMIT'] = array(form_submit('SUBMIT', 'Submit'));

        return $currencydata;
    }

    function c_validate() {
       $this->load->library('form_validation');
        
        $view = array(
            'content' => 'currency_view',
            'page' => $this->uri->segment(1),
            'list' =>''
            );
$data['error'] = $this->uri->segment(3, 1);
$this->load->library('form_validation');

        // set validation rule
        $this->form_validation->set_message('required', '%s हाल्नुहोस् ');
        $this->form_validation->set_message('numeric', '%s अंक हुनुपर्छ');
        $this->form_validation->set_error_delimiters("<span class='red mleft'>", "</span>");

   $this->form_validation->set_rules('CURR_CD', 'रकम कडे', 'trim|required');

     $this->form_validation->set_rules('CURR_ENAME', 'मुद्रा अंग्रेजीमा ', 'trim|required');

     $this->form_validation->set_rules('CURR_NNAME', 'मुद्रा नेपालीमा ', 'trim|required');

      $this->form_validation->set_rules('SYMBOL', 'मुद्रा संकेत', 'trim|required');

       $this->form_validation->set_rules('CREATED_BY', 'क्रिएट मुद्रा(created by)', 'trim|required');

      $this->form_validation->set_rules('DATETIME', 'मिति', 'trim|required|numeric');
      

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/content', $view);
        
                    } 
        else {
 
            $this->c_operate();
            redirect('currency');
        }
    
 
    }

    function c_operate() {
        // set operation
      $data = array(
            'CURR_CD' => $this->input->post('CURR_CD'),
            'CURR_ENAME' => $this->input->post('CURR_ENAME'),
            'CURR_NNAME' => $this->input->post('CURR_NNAME'),
            'SYMBOL' => $this->input->post('SYMBOL'),
            'CREATED_BY' => $this->input->post('CREATED_BY'),
            'DATETIME' => $this->input->post('DATETIME'),
            
        );
            $this->currency_model->insert($data);
            //redirect('currency');
    }
    
    


}