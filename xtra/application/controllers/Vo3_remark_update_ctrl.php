<?php
class Vo3_remark_update_ctrl extends CI_Controller{
	
	function index(){
		
	// load libraries for URL and form processing
    $this->load->helper(array('form', 'url'));
    // load library for form validation
    $this->load->library('form_validation');
	
	//validation rule
	$this->form_validation->set_rules('n_Notes','Notes','trim');
	
	$rpt_no = $this->input->post('rpt_no');
	$asset = $this->input->post('asset');
	$this->load->model('update_model');
	$insert_data = array(
	
						 'vvfHQRemarks' => $this->input->post('n_Notes'),
						 'vvfHQRemarksDate' => date('Y-m-d H:i:s'),
						 'vvfActionflag' => 'U',
						 'vvfTimestamp' => date('Y-m-d H:i:s'),
						);
	$this->update_model->vo3_remark_update($insert_data);
	redirect('contentcontroller/vo3_Asset_Number?rpt_no='.$rpt_no.'&asset='.$asset);	
	}

}
?>