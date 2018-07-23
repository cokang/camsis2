<?php
class Wo_clause_update_ctrl extends CI_Controller{
	
	public function index(){
	// load libraries for URL and form processing
    $this->load->helper(array('form', 'url'));
    // load library for form validation
    $this->load->library('form_validation');
	
	//validation rule
	$this->form_validation->set_rules('n_clause_date','Clause Date','trim|required');
	$this->form_validation->set_rules('n_clause_no','Clause No. / Indicator','trim|required');
	$this->form_validation->set_rules('n_closestat','Closing Main Status','trim');
	$this->form_validation->set_rules('n_no_Letter','Notice Letter No','trim');
	$this->form_validation->set_rules('n_Clause_Cancel','Clause Cancel / Feedback No.','trim');
	$this->form_validation->set_rules('n_feedback_d','Clause Cancel / Feedback Date','trim');

	$this->form_validation->set_rules('n_medivest_dt','Medivest Received Date','trim');
	$this->form_validation->set_rules('n_part_delivery','Third Party Service / Part Delivery Date','trim');
	$this->form_validation->set_rules('n_debitnote_dt','MNE Debit Note Date','trim');
	$this->form_validation->set_rules('n_rmks_mo','Remarks MO','trim');
	$this->form_validation->set_rules('n_clau_chrono','Clause Choronology','trim');
	$this->form_validation->set_rules('n_staffnamedt','>User / Pengarah / Engineer / LO Name & Discussion Date','trim');
	$this->form_validation->set_rules('n_lpono_desc','LPO No. & Part Description','trim');
	$this->form_validation->set_rules('n_clauroot_cause','Clause Root Cause','trim');
	$this->form_validation->set_rules('n_clau_rmks','Clause Remark','trim');
	$this->form_validation->set_rules('n_disput_reason','Dispute Reason','trim');
	$this->form_validation->set_rules('n_amount','Amount','trim');
	$this->form_validation->set_rules('n_vendor','Vendor Code','trim');
	$this->form_validation->set_rules('n_vendor_v','Vendor Name','trim');

	$this->form_validation->set_rules('n_dispute','Dispute','trim');
	$this->form_validation->set_rules('n_clau_imp','Clause Implemented','trim');
	$this->form_validation->set_rules('n_johnname','John Name','trim');
	$this->form_validation->set_rules('n_directorname','Director Name','trim');
	
	if($this->form_validation->run()==FALSE)
		{
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_clause_update");
		}
		
		else
		{
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_clause_confirm");
		}
	}

	function confirmation(){
	$this->load->model('insert_model');
	$RN = $this->input->post('wrk_ord');
	$wrk_ord_test = $this->insert_model->clause_woexist('wo_no',$RN);

	redirect('contentcontroller/clau?wrk_ord='.$RN.'&vppm=8');	
	}

}
?>