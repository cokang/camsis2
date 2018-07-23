<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Desk_complaint extends CI_Controller {
		 function __construct(){
	     	parent::__construct();
	//echo 'ade1';
			$this->load->model('loginModel','',TRUE);
	//echo 'ade2';
			$this->load->model('insert_model');
	                //$this->load->model('test_ler');
	//echo 'ade3';
			$this->load->library('session');
	//echo 'ade4';	
			$this->is_logged_in();
	//echo 'ade5';
		
		
	}
	
		function is_logged_in()
	{
		
		$is_logged_in = $this->session->userdata('v_UserName');
		
		if(!isset($is_logged_in) || $is_logged_in !=TRUE)
		redirect('LoginController/index');
	}
	public function index() 
	{
    $data['cmplnt_no'] = $this->input->get('cmplnt_no');
		$this->load->model("get_model");
		$this->load->model("display_model");
		$data['record'] = $this->get_model->complaint_update($data['cmplnt_no']);
		$data['recordreq'] = $this->get_model->complaint_relreq($data['cmplnt_no']);
		$data['records'] = $this->display_model->complaintdet_form($data['cmplnt_no']);
		//$data['regrecords'] = $this->display_model->request_tab();
		//print_r($data['record']);
		//echo '<br><br>';
		//print_r($data['recordreq']);
		//echo '<br><br>';
		//print_r($data['records']);
		//echo '<br><br>';
		//exit();
		if (isset($data['records'][0]->v_ComplaintNo)){
			$data['vcmdate'] = explode('/',$data['records'][0]->v_Monyr);
		}
			
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_desk_complaint_update",$data);
	}
}