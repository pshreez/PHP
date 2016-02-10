<?php
class Login extends MX_Controller {
	
	function __construct() {
		parent::__construct();
		
		$this->load->model('login_model');
	}
	
	function index() {
		$data['error'] = $this->uri->segment(3, 1);
		
		$this->load->view('login_view', $data);
	}
	
	function validate() {
		// set validation rules
		$this->form_validation->set_message('required', '%s हाल्नुहोस् ');
		$this->form_validation->set_error_delimiters("<div class='red fright'>","</div><div class='clear'></div>");
		$this->form_validation->set_rules('uname', 'प्रयोगकर्ता नाम', 'trim|required');
		$this->form_validation->set_rules('pword', 'गोप्य शब्द', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login_view');
		}
		else {
			$this->operate();
		}
	}
	
	function operate() {
		// get values from form
		$uname = $this->input->post('uname');
		$pword = $this->input->post('pword');
		
		$check = $this->login_model->checkLogin($uname, $pword);
		
		if ($check) {
			// set session
			$sess_data = array(
							'id'		=> $this->login_model->getUserId($uname, $pword),
							'uname'		=> $uname,
							'logged' 	=> true
						);
			
			$this->session->set_userdata($sess_data);
						
			redirect('home');
		}
		else {
			redirect('login/index/0');
		}
	}
	
}