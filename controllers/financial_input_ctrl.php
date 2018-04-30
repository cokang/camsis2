<?php

class financial_input_ctrl extends CI_Controller{
	
	function index(){
    // load libraries for URL and form processing
    $this->load->helper(array('form', 'url'));
    // load library for form validation
    $this->load->library('form_validation');

        //validation rule
    $this->form_validation->set_rules('n_base','Service Code','trim');
	$this->form_validation->set_rules('fromMonth','Period Month','trim');
	$this->form_validation->set_rules('fromYear','Period Year','trim');
	$this->form_validation->set_rules('n_invoiceno','Invoice No','trim|required');
	$this->form_validation->set_rules('n_invoicedate','Invoice Date','trim|required');
	$this->form_validation->set_rules('n_servicefee','Service Fee','trim|required');
	$this->form_validation->set_rules('n_servicetax','Service Tax','trim|required');
	$this->form_validation->set_rules('n_invoiceamount','Invoice Amount','trim|required');
	$this->form_validation->set_rules('n_datepaid','Date Paid','trim|required');
	$this->form_validation->set_rules('n_amountpaid','Amount Paid','trim|required');

if($this->form_validation->run()==FALSE)
		{
		$data['month'] = ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['year'] = ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");

		isset($_POST['n_base']) ? $data['s_code'] = $_POST['n_base'] : $data['s_code'] = 'BES';
		isset($_POST['fromMonth']) ? $data['fmonth'] = $_POST['fromMonth'] : $data['fmonth'] = $data['month'];
		isset($_POST['fromYear']) ? $data['fyear'] = $_POST['fromYear'] : $data['fyear'] = $data['year'];
		
		$this->load->model('display_model');
		$data['record'] = $this->display_model->financial_list($data['s_code'],$data['fmonth'],$data['fyear']);
		$this ->load->view("headprinter");
		$this ->load->view("Content_fsfrinput",$data);
		}
		
		else
		{
		$data['month'] = ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['year'] = ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");

		isset($_POST['n_base']) ? $data['s_code'] = $_POST['n_base'] : $data['s_code'] = 'BES';
		isset($_POST['fromMonth']) ? $data['fmonth'] = $_POST['fromMonth'] : $data['fmonth'] = $data['month'];
		isset($_POST['fromYear']) ? $data['fyear'] = $_POST['fromYear'] : $data['fyear'] = $data['year'];
		
		$this ->load->view("headprinter");
		$this ->load->view("Content_fsfrinputcfirm",$data);
		}
	}
	function confirmation(){
	$service_code = $this->input->post('n_base');
	$month = $this->input->post('fromMonth');
	$year = $this->input->post('fromYear');
	
	$this->load->model('insert_model');
	$this->insert_model->fi_exist('Month',$month,'Year',$year,'Service_Code',$service_code);
	redirect('contentcontroller/Schedule');
	}
}
?>