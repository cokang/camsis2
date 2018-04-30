<?php
class vo3_signatories_update_ctrl extends CI_Controller{
	
	public function index(){
		
	// load libraries for URL and form processing
    $this->load->helper(array('form', 'url'));
    // load library for form validation
    $this->load->library('form_validation');
	
	//validation rule
	$this->form_validation->set_rules('n_vo3_name1','Name 1','trim|required');
	$this->form_validation->set_rules('n_vo3_Designation1','Designation 1','trim|required');
	$this->form_validation->set_rules('n_vo3_Date1','Date 1','trim|required');
	$this->form_validation->set_rules('n_vo3_name2','Name 2','trim|required');
	$this->form_validation->set_rules('n_vo3_Designation2','Designation 2','trim|required');
	$this->form_validation->set_rules('n_vo3_Date2','Date 2','trim|required');
	$this->form_validation->set_rules('n_vo3_name3','Name 3','trim|required');
	$this->form_validation->set_rules('n_vo3_Designation3','Designation 3','trim|required');
	$this->form_validation->set_rules('n_vo3_Date3','Date 3','trim|required');
	
	$RN = $this->input->post('rpt_no');
	
	$this->load->model('update_model');
	
	$insert_data = array(
						 'vvfName1' => $this->input->post('n_vo3_name1'),
						 'vvfDesignation1' => $this->input->post('n_vo3_Designation1'),
						 'vvfDate1' => $this->input->post('n_vo3_Date1') ? date('Y-m-d ', strtotime($this->input->post('n_vo3_Date1'))) : NULL,
						 'vvfName2' => $this->input->post('n_vo3_name2'),
						 'vvfDesignation2' => $this->input->post('n_vo3_Designation2'),
						 'vvfDate2' => $this->input->post('n_vo3_Date2') ? date('Y-m-d ', strtotime($this->input->post('n_vo3_Date2'))) : NULL,
						 'vvfName3' => $this->input->post('n_vo3_name3'),
						 'vvfDesignation3' => $this->input->post('n_vo3_Designation3'),
						 'vvfDate3' => $this->input->post('n_vo3_Date3') ? date('Y-m-d ', strtotime($this->input->post('n_vo3_Date3'))) : NULL,
						 'vvfActionflag' => 'U',
						 'vvfTimestamp' => date('Y-m-d'),
						);
	$this->update_model->vo3general_form($insert_data);
	redirect('contentcontroller/vo3_Signatories?rpt_no='.$RN.'&vo=1');	
	}

}
?>