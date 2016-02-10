<?php
class Home extends MX_Controller {
	
	function __construct() {
		parent::__construct();
		
		$this->load->model('home_model');
	}
	
	function index() {
		$view = array(
					'content'	=> 'home_view',
					'page'		=> $this->uri->segment(1),
					'list'		=> ''
				);
				
		$this->load->view('/includes/content', $view);
	}
	
}