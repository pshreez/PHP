<?php

class Agreement extends MX_Controller {

    function __construct() {
        parent::__construct();

        // load model
        $this->load->model('agreement_model');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('table');
        $this->load->helper('date');
    }

    function index() {

        $form = $this->agreementForm();
        $this->validate();
        $view_list = array(
            'content' => 'agreement_view',
            'list' => $form,
            'page' => $this->uri->segment(1)
        );

        $this->load->view('/includes/content', $view_list);
    }

    function agreementForm() {

        $agreementForm = array();

        //master data to drop down menu;
        $org = $this->agreement_model->getOrg();
        $donor = $this->agreement_model->getDonor();
        $source = $this->agreement_model->getSource();
        $budget = $this->agreement_model->getBudget();
        //$investor = $this->agreement_model->getInvestor();

        $this->load->library('table');
        $agreementForm['FORM_ATTRIBUTES'] = array('class' => '', 'id' => 'agreementForm');

        $agreementForm['AGREEMENT_CD'] = array(form_label('अग्रीमेंट कडे:', 'AGREEMENT_CD'), form_input(array('name' => 'AGREEMENT_CD', 'id' => 'agreementForm', 'class' => 'number', 'maxlength' => 4)));

        $agreementForm['BUD_YEAR'] = array(form_label('आर्थिक बर्ष:', 'BUD_YEAR'), form_input(array('name' => 'BUD_YEAR', 'class' => 'datetime', 'id' => 'budYear')));

        $agreementForm['ORG_CD'] = array(form_label('संस्थाको संकेत:', 'ORG_CD'), form_dropdown('ORG_CD', $org));

        $agreementForm['PROJECT_NAME'] = array(form_label('योजनाको नाम:', 'PROJECT_NAME'), form_input(array('name' => 'PROJECT_NAME')));

        $agreementForm['START_EDATE'] = array(form_label('सुरुवात मिति:', 'START_EDATE'), form_input(array('name' => 'START_EDATE', 'class' => 'datetime', 'id' => 'pStartEDate')));

        $agreementForm['START_NDATE'] = array(form_input(array('name' => 'START_NDATE', 'class' => 'datetime', 'id' => 'pStartNDate')));

        $agreementForm['END_EDATE'] = array(form_label(' समाप्त मिति:', 'END_EDATE'), form_input(array('name' => 'END_EDATE', 'class' => 'datetime', 'id' => 'pEndEDate')));

        $agreementForm['END_NDATE'] = array(form_input(array('name' => 'END_NDATE', 'class' => 'datetime', 'id' => 'pEndNDate')));

        $agreementForm['AGREE_EDATE'] = array(form_label('अग्रीमेंट मिति:', 'AGREE_EDATE'), form_input(array('name' => 'AGREE_EDATE', 'class' => 'datetime', 'id' => 'aStartEDate')));

        $agreementForm['AGREE_NDATE'] = array(form_input(array('name' => 'AGREE_NDATE', 'class' => 'datetime', 'id' => 'aStartNDate')));

        $agreementForm['DISABLE_FLAG'] = array(form_label('Disable flag :', 'DISABLE_FLAG'), form_checkbox('DISABLE_FLAG', 0, false));

        $agreementForm['INVESTOR_TYPE'] = array(form_label('लगानी कर्ता:', 'INVESTOR_TYPE'), form_dropdown('INVESTOR_TYPE', array(1 => 'nepali', 2 => 'bideshi'), '', 'id = "investorType"'));

        $agreementForm['AMOUNT_NEPALI'] = array(form_label('रकम (ने रु ):', 'AMOUNT_NEPALI'), form_input(array('name' => 'AMOUNT_NEPALI')));

        $agreementForm['CURR_CD'] = array(form_label('मुद्रा :', 'CURR_CD'), form_dropdown('CURR_CD', array('yen', 'us')));

        $agreementForm['EXCHANGE_RATE'] = array(form_label('विनिमय दर:', 'EXCHANGE_RATE'), form_input(array('name' => 'EXCHANGE_RATE', 'value' => 98)));

        $agreementForm['AMOUNT_FOREIGN'] = array(form_label('रकम बिदेशी:', 'AMOUNT_FOREIGN'), form_input(array('name' => 'AMOUNT_FOREIGN')));

        $agreementForm['DONOR_CODE'] = array(form_label('दाता:', 'DONOR_CODE'), form_dropdown('DONOR_CODE', $donor));

        $agreementForm['ACC_CODE'] = array(form_label('बुद्गेत सिर्सक ', 'ACC_CODE'), form_input(array('name' => 'ACC_CODE', 'id' => 'typeauto', 'class' => 'number')), form_input(array('name' => 'ACC', 'id' => 'autocomplete', 'width' => '500px'))); //form_dropdown('ACC_CODE', $budget, '', 'class="dropdown"'));

        $agreementForm['SOURCE_TYPE_CODE'] = array(form_label('श्रोत:', 'SOURCE_TYPE_CODE'), form_dropdown('SOURCE_TYPE_CODE', $source));

        $agreementForm['GRACE_YEAR'] = array(form_label('ग्रेस अवधि:', 'GRACE_YEAR'), form_input(array('name' => 'GRACE_YEAR', 'class' => 'number')));

        $agreementForm['INSTALLMENT_NUM'] = array(form_label('किस्ता नम्बर:', 'INSTALLMENT_NUM'), form_input(array('name' => 'INSTALLMENT_NUM', 'class' => 'number')));

        $agreementForm['INSTALLMENT_DURATION'] = array(form_label('किस्ता आवाधी:', 'INSTALLMENT_DURATION'), form_input(array('name' => 'INSTALLMENT_DURATION', 'class' => 'number')));

        $agreementForm['REPAYMENT_FROM_EDATE'] = array(form_label('भुकतनीको सुरु:', 'REPAYMENT_FROM_EDATE'), form_input(array('name' => 'REPAYMENT_FROM_EDATE', 'class' => 'datetime', 'id' => 'repStartEDate')));

        $agreementForm['REPAYMENT_FROM_NDATE'] = array(form_input(array('name' => 'REPAYMENT_FROM_NDATE', 'class' => 'datetime', 'id' => 'repStartNDate')));

        $agreementForm['REPAYMENT_TO_EDATE'] = array(form_label('भुकतनी समाप्ति:', 'REPAYMENT_TO_EDATE'), form_input(array('name' => 'REPAYMENT_TO_EDATE', 'class' => 'datetime', 'id' => 'repEndEDate')));

        $agreementForm['REPAYMENT_TO_NDATE'] = array(form_input(array('name' => 'REPAYMENT_TO_NDATE', 'class' => 'datetime', 'id' => 'repEndNDate')));

        $agreementForm['PAYABLE_WITH_INTEREST'] = array(form_label('ब्याज लाग्ने :', 'PAYABLE_WITH_INTEREST'), form_checkbox('PAYABLE_WITH_INTEREST', 1, TRUE, 'id=" interestPayable "'));

        $agreementForm['LOAN_NUM'] = array(form_label('लोअदं नुमेब्र :', 'LOAN_NUM'), form_input('LOAN_NUM'));

        $agreementForm['PAYMENT_TYPE'] = array(form_label('पय्मेंट तरिका:', 'PAYMENT_TYPE'), form_dropdown('PAYMENT_TYPE', array('y' => 'बार्षिक ', 'm' => 'अर्ध बार्षिक ', 'a' => 'अग्रीमेंट अनुसार ')));

        $agreementForm['CAPITALIZATION'] = array(form_label('पुजिकरण  :', 'CAPITALIZATION'), form_checkbox('CAPITALIZATION', 1, TRUE, 'id=" interestPayable "'));

        $agreementForm['SUBMIT'] = array(form_button('SUBMIT', 'Submit', 'id="aSubmit"'));

        $agreementForm['table'] = array(array('name', 'place', 'address'), array(1, 2, 3));

        $agreementForm['ACTUAL_RATE'] = array(form_label('ब्याज दर :', 'ACTUAL_RATE'), form_input(array('name' => 'ACTUAL_RATE', 'class' => 'number')));

        return $agreementForm;
    }

    function validate() {
        $this->load->library('form_validation');
//        $this->form_validation->set_message('required', '%s हाल्नुहोस् ');
//        $this->form_validation->set_message('integer', '%s अंक हुनुपर्छ ');
//        $this->form_validation->set_error_delimiters("<span class='red mleft'>", "</span>");

        $this->form_validation->set_rules('AGREEMENT_CD', 'संस्था', 'trim|required');
        $this->form_validation->set_rules('BUD_YEAR', 'ऋण नाम', 'trim|required');
        $this->form_validation->set_rules('ORG_CD', 'ऋण नं', 'trim|required');
        $this->form_validation->set_rules('PROJECT_NAME', 'सम्झौता मिति', 'trim|required');
        $this->form_validation->set_rules('START_EDATE', 'सम्झौता रकम', 'trim|required');
        $this->form_validation->set_rules('START_NDATE', 'ब्याज दर', 'trim|required');
        $this->form_validation->set_rules('END_EDATE', 'ऋण भुक्तानी अवधि', 'trim|required');
        $this->form_validation->set_rules('END_NDATE', 'जम्मा किस्ता', 'trim|required|');
        $this->form_validation->set_rules('AGREE_EDATE', 'सम्झौता रकम', 'trim|required');
        $this->form_validation->set_rules('AGREE_NDATE', 'ब्याज दर', 'trim|required');
        $this->form_validation->set_rules('DISABLE_FLAG', 'साँवा / ब्याज भुक्तानी मिति', 'trim|required');
        $this->form_validation->set_rules('INVESTOR_TYPE', 'प्रथम किस्ता भुक्तानी मिति', 'trim|required');
        $this->form_validation->set_rules('AMOUNT_NEPALI', 'प्रतेक किस्ता रकम', 'trim|required');
        $this->form_validation->set_rules('CURR_CD', 'प्रतेक किस्ता रकम', 'trim|required');
        $this->form_validation->set_rules('EXCHANGE_RATE', 'प्रतेक किस्ता रकम', 'trim|required');
        $this->form_validation->set_rules('AMOUNT_FOREIGN', 'प्रतेक किस्ता रकम', 'trim|required');
        $this->form_validation->set_rules('DONOR_CODE', 'प्रतेक किस्ता रकम', 'trim|required');
        $this->form_validation->set_rules('ACC_CODE', 'प्रतेक किस्ता रकम', 'trim|required');
        $this->form_validation->set_rules('SOURCE_TYPE_CODE', 'प्रतेक किस्ता रकम', 'trim|required');
        $this->form_validation->set_rules('GRACE_YEAR', 'प्रतेक किस्ता रकम', 'trim|required');
        $this->form_validation->set_rules('INSTALLMENT_NUM', 'प्रतेक किस्ता रकम', 'trim|required');
        $this->form_validation->set_rules('INSTALLMENT_DURATION', 'प्रतेक किस्ता रकम', 'trim|required');
        $this->form_validation->set_rules('REPAYMENT_FROM_EDATE', 'प्रतेक किस्ता रकम', 'trim|required');
        $this->form_validation->set_rules('REPAYMENT_FROM_NDATE', 'प्रतेक किस्ता रकम', 'trim|required');
        $this->form_validation->set_rules('REPAYMENT_TO_EDATE', 'प्रतेक किस्ता रकम', 'trim|required');
        $this->form_validation->set_rules('REPAYMENT_TO_NDATE', 'प्रतेक किस्ता रकम', 'trim|required');
        $this->form_validation->set_rules('PAYABLE_WITH_INTEREST', 'प्रतेक किस्ता रकम', 'trim|required');
        $this->form_validation->set_rules('LOAN_NUM', 'प्रतेक किस्ता रकम', 'trim|required');
        $this->form_validation->set_rules('PAYMENT_TYPE', 'प्रतेक किस्ता रकम', 'trim|required');
        $this->form_validation->set_rules('ACTUAL_RATE', 'प्रतेक किस्ता रकम', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            
        } else {
            $this->operate();
        }
    }

    function operate() {

        $agreementID = $this->agreement_model->autoincrement($i = null, $table = "I_AGREEMENT", $column = "AGREEMENT_CD");
        $rateID = $this->agreement_model->autoincrement($i = null, $table = "C_INTEREST_DETAIL", $column = "DETAIL_ID");
        if ($agreementID != "" && $rateID != "") {
            $data = array(
                'AGREEMENT_CD' => $agreementID,
                'BUD_YEAR' => $this->input->post('BUD_YEAR'),
                'ORG_CD' => $this->input->post('ORG_CD'),
                'PROJECT_NAME' => $this->input->post('PROJECT_NAME'),
                'START_EDATE' => $this->input->post('START_EDATE'),
                'START_NDATE' => $this->input->post('START_NDATE'),
                'END_EDATE' => $this->input->post('END_EDATE'),
                'END_NDATE' => $this->input->post('END_NDATE'),
                'AGREE_EDATE' => $this->input->post('AGREE_EDATE'),
                'AGREE_NDATE' => $this->input->post('AGREE_NDATE'),
                'DISABLE_FLAG' => $this->input->post('DISABLE_FLAG'),
                'INVESTOR_TYPE' => $this->input->post('INVESTOR_TYPE'),
                'AMOUNT_NEPALI' => $this->input->post('AMOUNT_NEPALI'),
                'CURR_CD' => $this->input->post('CURR_CD'),
                'EXCHANGE_RATE' => $this->input->post('EXCHANGE_RATE'),
                'AMOUNT_FOREIGN' => $this->input->post('AMOUNT_FOREIGN'),
                'DONOR_CODE' => $this->input->post('DONOR_CODE'),
                'ACC_CODE' => $this->input->post('ACC_CODE'),
                'SOURCE_TYPE_CODE' => $this->input->post('SOURCE_TYPE_CODE'),
                'GRACE_YEAR' => $this->input->post('GRACE_YEAR'),
                'INSTALLMENT_NUM' => $this->input->post('INSTALLMENT_NUM'),
                'INSTALLMENT_DURATION' => $this->input->post('INSTALLMENT_DURATION'),
                'REPAYMENT_FROM_EDATE' => $this->input->post('REPAYMENT_FROM_EDATE'),
                'REPAYMENT_FROM_NDATE' => $this->input->post('REPAYMENT_FROM_NDATE'),
                'REPAYMENT_TO_EDATE' => $this->input->post('REPAYMENT_TO_EDATE'),
                'REPAYMENT_TO_NDATE' => $this->input->post('REPAYMENT_TO_NDATE'),
                'PAYABLE_WITH_INTEREST' => $this->input->post('PAYABLE_WITH_INTEREST'),
                'LOAN_NUM' => $this->input->post('LOAN_NUM'),
                'PAYMENT_TYPE' => $this->input->post('PAYMENT_TYPE'),
                'CREATED_BY' => 'SHREEZ',
                'DATETIME' => '01-SEP-2012',
                'DURATION' => 2
            );
            $rdata = array(
                'DETAIL_ID' => $rateID,
                'AGREEMENT_ID' => $data['AGREEMENT_CD'],
                'ACTUAL_RATE' => $this->input->post('ACTUAL_RATE'),
                'ALTERED_RATE' => NULL,
                'ALTERED_DATE' => '03-sep-13',
                'INTEREST_CHANGE' => NULL,
            );

            $this->agreement_model->insert($agreementID, $data, $rdata);
        } else {
            $msg['msg'] = "Agreement cannot be created";
            json_encode($msg);
        }
    }

    function viewlist() {

        $a_list['a_list'] = $this->agreement_model->get_list($id = null);
        $view_list = array(
            'content' => 'agreement_list',
            'page' => $this->uri->segment(1),
            'list' => $a_list
        );
        
        $this->load->view('includes/content', $view_list);
    }

    function engTonepDate($nepDate) {

        $sql = "SELECT Fn_Engtonep('$nepDate') as NEPDATE FROM DUAL";
        $date = $this->db->query($sql)->result();
        $jdate['date'] = $date[0]->NEPDATE;
        echo json_encode($jdate);
    }

    function amortization($id) {

        $data = $this->agreement_model->amortData($id);
        $a_date = $data[0]->AGREE_EDATE;
        $amount = $data[0]->AMOUNT_NEPALI;
        $grace_year = $data[0]->GRACE_YEAR;
        $installment_num = $data[0]->INSTALLMENT_NUM;
        $installment_duration = $data[0]->INSTALLMENT_NUM;
        $rate = $data[0]->ACTUAL_RATE;
        $payment_type = $data[0]->PAYMENT_TYPE;

        if ($grace_year == NULL) {
            $grace_year = 0;
        }

        $count = 0;

        if ($payment_type == 'm') {
            $installment_num *= 2;
            $installment_duration *= 2;
            $grace_year *= 2;
        }
        $installment_num = $installment_duration + $grace_year;
        
        for ($j = 1; $j <= $installment_num; $j++) {
            $installment_amount = $amount / $installment_duration;
            $interest = ($installment_amount * $rate) / 100;

            if ($count < $grace_year) {
                $installment_amount = 0;
                $interest = (($amount / $installment_duration) * $rate) / 100;
                $count++;
            }
            
            $total = $installment_amount + $interest;
            $due_date = $this->dateConversion($a_date, $payment_type, $i = $j);       
            $dataset[$j] = array(
                'date' => $due_date,
                'installment_amount' => $installment_amount,
                'interest' => $interest,
                'total' => $total,
                'id' => $j
            );
        }
        echo json_encode($dataset);
    }

    function amortSchedule() {

        $getParam = $this->uri->segment(3);
        $url = file_get_contents(base_url() . 'agreement/amortization/' . $getParam);
        $arr = json_decode($url, true);
        $a_data = $this->agreement_model->get_list($getParam);
        $data = "";
        foreach ($arr as $value) {
            $data +=$value["total"];
        }
        $view_list = array(
            'content' => 'amortization',
            'list' => $arr,
            'page' => $this->uri->segment(1),
            'total' => $data,
            'a_data' => $a_data 
        );
        $this->load->view('/includes/content', $view_list);
    }

    function dateConversion($a_date, $payment_type, $i) {

        if ($payment_type == 'y') {

            $i = 12 * $i;
        }
        if ($payment_type == 'm') {
            
            $i = 6 * $i;
        }

        $dt = date("d-M-Y", strtotime($a_date));
        $date = strtotime(date("Y-m-d", strtotime($dt)) . " $i  months ");
        $date = date("Y-m-d", $date);
        $date = date("d-M-Y", strtotime($date));

        return $date;
    }

}

