<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class asset extends CI_Controller {
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
	{ $this->load->model('get_model');	
	  $data['country_list'] = $this->get_model->get_dropdown_list_country();
		$data['manufacturer_list'] = $this->get_model->get_dropdown_list_manufacturer();
		$data['contract_list'] = $this->get_model->get_dropdown_list_contractcd();
    $this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_assetnew", $data);
	}
}