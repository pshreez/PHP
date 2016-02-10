<?php
	$this->load->view('/includes/header');
	$this->load->view('/includes/navigation');
	$this->load->view($content, $list);
	$this->load->view('/includes/footer');
        ?>