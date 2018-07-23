<?php

class Service_contract_ctrl extends CI_Controller{

	function index(){

    // load libraries for URL and form processing
    $this->load->helper(array('form', 'url'));
    // load library for form validation
    $this->load->library('form_validation');

        //validation rule
	$this->form_validation->set_rules('n_Contract','Contract','trim|required');
	$this->form_validation->set_rules('n_Vendor','Vendor','trim|required');
	$this->form_validation->set_rules('n_Period','Period','trim|required');
	$this->form_validation->set_rules('n_Frequency','Frequency','trim|required');
	$this->form_validation->set_rules('n_Reference','Reference','trim|required');

if($this->form_validation->run()==FALSE)
		{
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_asset_Service_update");
		}
		
		else
		{
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_asset_Service_confirm");
		}
	}
	function confirmation(){
		$assetno = $this->input->post('asstno');
		$this->load->model('insert_model');
		$servicecontract_test = $this->insert_model->service_contractexist('asset_no',$assetno);
	
	redirect('contentcontroller/assetcontract?asstno='.$assetno.'&tab=2');

	
	}

}
?>