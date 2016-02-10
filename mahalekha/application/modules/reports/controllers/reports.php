<?php

class Reports extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('reports_model');
    }

    function index() {
        
    }

    function expenReports() {
        $this->load->view('expenReport_view');
        $source = $this->reports_model->getrevenuReports();
    }

    function requestDTC() {
        $this->load->view('requestDTC_view');
    }

    function releaseReports() {

        $this->load->view('releaseReport_view');
    }

}