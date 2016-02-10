<?php

class organization extends MX_Controller {

    function __construct() {
        parent::__construct();

        // load model
        $this->load->model('organization_model');
        $this->load->library('table');
        $this->load->library('sqlclass');
        // load module
        // $this->load->module('common');
    }

    function index() {

        $this->load->helper('form');
        $this->load->library('table');
        $organizationdata = $this->organizationForm();
        
        $view_list = array(
            'content' => 'organization_view',
            'list' => $organizationdata,
            'page' => $this->uri->segment(1)
        );
        $this->load->view('/includes/content', $view_list);
    }

    function organizationForm() {

        $organizationForm = array();
        //master data to drop down menu;
       // $org = $this->organization_model->getOrg();
        //$donor = $this->organization_model->getDonor();
       // $source = $this->organization_model->getSource();
        $this->load->library('table');

        $organizationForm['ORG_CD'] = array(form_label('संस्थाको कडे:', 'ORG_CD'), form_input(array('name' => 'ORG_CD', 'class' => 'number')));

        $organizationForm['ORG_ENAME'] = array(form_label('संस्थाको नाम अंग्रेजीमा:', 'ORG_ENAME'), form_input(array('name' => 'ORG_ENAME')));

        $organizationForm['ORG_NNAME'] = array(form_label('संस्थाको नाम नेपालीमा:', 'ORG_NNAME'), form_input(array('name' => 'ORG_NNAME')));

        $organizationForm['ORG_ADD'] = array(form_label('संस्थाको स्थान:', 'ORG_ADD'), form_input(array('name' => 'ORG_ADD')));

        $organizationForm['POST_BOX_NO'] = array(form_label('पी. वो. बक्स:', 'POST_BOX_NO'), form_input(array('name' => 'POST_BOX_NO', 'class' => 'number')));
        
        $organizationForm['PHONE_NO'] = array(form_label('फोन नम्वर:', 'PHONE_NO'), form_input(array('name' => 'PHONE_NO', 'class' => 'number')));

        $organizationForm['EMAIL_ADD'] = array(form_label(' इमेल आइडी :', 'EMAIL_ADD'), form_input(array('name' => 'EMAIL_ADD')));
        
        $organizationForm['FAX_NO'] = array(form_label(' फाक्स नम्बर:', 'FAX_NO'), form_input(array('name' => 'FAX_NO')));

        $organizationForm['DATETIME'] = array(form_label('मिति:', 'DATETIME'), form_input(array('name' => 'DATETIME', 'class' => 'datetime')));
        
        $organizationForm['CREATED_BY'] = array(form_label('created by:', 'CREATED_BY'), form_input(array('name' => 'CREATED_BY')));

        $organizationForm['DISABLE_FLAG'] = array(form_label('Disable flag :', 'DISABLE_FLAG'), form_checkbox('DISABLE_FLAG',1, TRUE));
        
        $organizationForm['SUBMIT'] = array(form_submit('SUBMIT', 'Submit'));
        
        return $organizationForm;
    }

    function validate() {
        $data = $this->organizationForm();
        $view_list = array(
            'content' => 'organization_view',
            'page' => $this->uri->segment(1),
            'list' => $data
        );
        
        
       $this->form_validation->set_message('required', '%s हाल्नुहोस् ');       
       $this->form_validation->set_message('integer', '%s अंक हुनुपर्छ ');
    $this->form_validation->set_error_delimiters("<span class='red mleft'>", "</span>");

        $this->form_validation->set_rules('ORG_CD', 'संस्था', 'trim|required');
        $this->form_validation->set_rules('ORG_ENAME', 'ऋण नाम', 'trim|required');
        $this->form_validation->set_rules('ORG_NNAME', 'ऋण नं', 'trim|required');
        $this->form_validation->set_rules('ORG_ADD', 'सम्झौता मिति', 'trim|required');
        $this->form_validation->set_rules('POST_BOX_NO', 'सम्झौता रकम', 'trim|required');
        $this->form_validation->set_rules('PHONE_NO', 'ब्याज दर', 'trim|required');
        $this->form_validation->set_rules('EMAIL_ADD', 'ऋण भुक्तानी अवधि', 'trim|required');
        $this->form_validation->set_rules('FAX_NO', 'जम्मा किस्ता', 'trim|required|');
        $this->form_validation->set_rules('DISABLE_FLAG', 'सम्झौता रकम', 'trim|required');
        $this->form_validation->set_rules('CREATED_BY', 'ब्याज दर', 'trim|required');
        $this->form_validation->set_rules('DATETIME', 'साँवा / ब्याज भुक्तानी मिति', 'trim|required');
       
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/content', $view_list);
        } else {
            $this->org_operate();
            redirect('organization/viewlist');
        }
    }

    function org_operate() {
        // set operations
        $data = array(
            'ORG_CD' => $this->input->post('ORG_CD'),
            'ORG_ENAME' => $this->input->post('ORG_ENAME'),
            'ORG_NNAME' => $this->input->post('ORG_NNAME'),
            'ORG_ADD' => $this->input->post('ORG_ADD'),
            'POST_BOX_NO' => $this->input->post('POST_BOX_NO'),
            'PHONE_NO' => $this->input->post('PHONE_NO'),
            'EMAIL_ADD' => $this->input->post('EMAIL_ADD'),
            'FAX_NO' => $this->input->post('FAX_NO'),
            'DISABLE_FLAG' => $this->input->post('DISABLE_FLAG'),
            'CREATED_BY' => $this->input->post('CREATED_BY'),
            'DATETIME' => $this->input->post('DATETIME'),
                  );
            $this->organization_model->insert($data);
        redirect('organization/viewlist');
    }

    function viewlist() {
        $view_list = array(
            'content' => 'organization_list',
            'page' => $this->uri->segment(1),
            'list' => $this->organization_model->get_list()
        );

        $this->load->view('includes/content', $view_list);
    }

}