<?php
class Wo_ppm_update_ctrl extends CI_Controller{
	
	public function index(){
		// load libraries for URL and form processing
	    $this->load->helper(array('form', 'url'));
	    // load library for form validation
	    $this->load->library('form_validation');
		
		//validation rule
		$this->form_validation->set_rules('QC_PPM','QC PPM','trim|required');
		$this->form_validation->set_rules('QC_Uptime','QC Uptime','trim|required');

		if($this->form_validation->run()==FALSE) {
			$this ->load->view("head");
			$this ->load->view("left");
			$this ->load->view("Content_wo_update");
		}
		else{
			$this ->load->view("head");
			$this ->load->view("left");
			$this ->load->view("Content_wo_confirm");
		}
	}

	function confirmation(){
	$this->load->model('insert_model');
	$RN = $this->input->post('wrk_ord');
	$wrk_ord_test = $this->insert_model->woppm_exist('v_WrkOrdNo',$RN);

	redirect('contentcontroller/wo?wrk_ord='.$RN. '&vppm=0');	
	}

}
?>