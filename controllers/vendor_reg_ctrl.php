<?php
class Vendor_reg_ctrl extends CI_Controller{
	
	public function index(){
	// load libraries for URL and form processing
    $this->load->helper(array('form', 'url'));
    // load library for form validation
    $this->load->library('form_validation');
	
	//validation rule
	$this->form_validation->set_rules('n_service_code','Service Code','trim|required');
	$this->form_validation->set_rules('n_vendor_code','Vendor Code','trim');
	$this->form_validation->set_rules('n_vendor_name','Vendor Name','trim|required');
	$this->form_validation->set_rules('n_grading_date','Grading Date','trim|required');
	$this->form_validation->set_rules('n_region','Region','trim|required');
	$this->form_validation->set_rules('n_group_register','Group Register','trim|required');
	$this->form_validation->set_rules('n_Grade','Grade','trim|required');
	$this->form_validation->set_rules('n_vendor_email','Vendor Email','trim');
	$this->form_validation->set_rules('n_pageno','Pager No','trim');
	$this->form_validation->set_rules('n_url','Vendor Url','trim|required');

	$this->form_validation->set_rules('n_currency','Currency','trim|required');
	$this->form_validation->set_rules('n_payment','Payment','trim|required');
	$this->form_validation->set_rules('n_terms','Terms','trim');
	$this->form_validation->set_rules('n_terms_mode','Term Mode','trim');

	$this->form_validation->set_rules('n_contact','Contact Name','trim');
	$this->form_validation->set_rules('n_company_type','Company Type','trim');
	$this->form_validation->set_rules('n_vendor_type','Vendor Type','trim');
	$this->form_validation->set_rules('n_register_type','Register Type','trim');
	$this->form_validation->set_rules('n_remark','Remark','trim');

	$this->form_validation->set_rules('n_hand_phone_nombor','Handphone Number','trim');
	$this->form_validation->set_rules('n_phone_nombor','Phone Number','trim');
	$this->form_validation->set_rules('n_fax_nombor','Fax Number','trim');
	$this->form_validation->set_rules('n_Address','Address','trim');
	$this->form_validation->set_rules('n_Address_2','Address 2','trim');
	$this->form_validation->set_rules('n_Address_3','Address 3','trim');
	
	if($this->form_validation->run()==FALSE)
		{
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vendor_reg");
		}
		
		else
		{
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vendor_reg_confirm");
		}
	}
	
	function confirmation(){
	if ($this->input->post('n_vendor_code') == ''){
		$venname = substr($this->input->post('n_vendor_name'),0,3);
		$this->load->model('get_model');
		$nextvencode = $this->get_model->vendorcodegen($venname);
		$vendor_code = strtoupper($venname).str_pad($nextvencode[0]->N_vencode,$nextvencode[0]->T_vencode,0,STR_PAD_LEFT);

		$this->load->model('insert_model');
		$insert_data = array ( 'v_vendorcode' => $vendor_code,
							   'v_vendorname' => $this->input->post('n_vendor_name'),
							   'v_phone' => $this->input->post('n_phone_nombor'),
							   'v_grade' => $this->input->post('n_Grade'),
							   'v_fax' => $this->input->post('n_fax_nombor'),
							   'v_payment' => $this->input->post('n_payment'),
							   'v_address1' => $this->input->post('n_Address'),
							   'v_address2' => $this->input->post('n_Address_2'),
							   'v_address3' => $this->input->post('n_Address_3'),
							   'v_hphone' => $this->input->post('n_hand_phone_nombor'),
							   'v_currency' => $this->input->post('n_currency'),
							   'v_pagerno' => $this->input->post('n_pageno'),
							   'v_terms' => $this->input->post('n_terms'),
							   'v_termmode' => $this->input->post('n_terms_mode'),
							   'v_email' => $this->input->post('n_vendor_email'),
							   'v_url' => $this->input->post('n_url'),
							   'v_region' => $this->input->post('n_region'),
							   'v_contact' => $this->input->post('n_contact'),
							   'v_remark' => $this->input->post('n_remark'),
							   'v_CompanyType' => $this->input->post('n_company_type'),
							   'v_RegType' => $this->input->post('n_register_type'),
							   'v_GovtReg' => $this->input->post('n_group_register'),
							   'v_actionflag' => 'I',
							   'D_timestamp' => date("Y-m-d H:i:s"),
							   'v_vendorType' => $this->input->post('n_vendor_type'),
							   'd_gradingdate' => $this->input->post('n_grading_date'),
							   'v_servicecode' => $this->input->post('n_service_code')

			);
		$this->insert_model->vendor_reg($insert_data);
	}
	else{
		$vendorcode = $this->input->post('n_vendor_code');

		$this->load->model('update_model');
		$insert_data = array ( //'v_vendorcode' => $vendor_code,
							   'v_vendorname' => $this->input->post('n_vendor_name'),
							   'v_phone' => $this->input->post('n_phone_nombor'),
							   'v_grade' => $this->input->post('n_Grade'),
							   'v_fax' => $this->input->post('n_fax_nombor'),
							   'v_payment' => $this->input->post('n_payment'),
							   'v_address1' => $this->input->post('n_Address'),
							   'v_address2' => $this->input->post('n_Address_2'),
							   'v_address3' => $this->input->post('n_Address_3'),
							   'v_hphone' => $this->input->post('n_hand_phone_nombor'),
							   'v_currency' => $this->input->post('n_currency'),
							   'v_pagerno' => $this->input->post('n_pageno'),
							   'v_terms' => $this->input->post('n_terms'),
							   'v_termmode' => $this->input->post('n_terms_mode'),
							   'v_email' => $this->input->post('n_vendor_email'),
							   'v_url' => $this->input->post('n_url'),
							   'v_region' => $this->input->post('n_region'),
							   'v_contact' => $this->input->post('n_contact'),
							   'v_remark' => $this->input->post('n_remark'),
							   'v_CompanyType' => $this->input->post('n_company_type'),
							   'v_RegType' => $this->input->post('n_register_type'),
							   'v_GovtReg' => $this->input->post('n_group_register'),
							   'v_actionflag' => 'U',
							   'D_timestamp' => date("Y-m-d H:i:s"),
							   'v_vendorType' => $this->input->post('n_vendor_type'),
							   'd_gradingdate' => $this->input->post('n_grading_date'),
							   'v_servicecode' => $this->input->post('n_service_code')

			);
		$this->update_model->vendor_ureg($insert_data,$vendorcode);
	}

	redirect('contentcontroller/report_vl?m='.$this->input->post('m').'&y='.$this->input->post('y'));	
	}

}
?>