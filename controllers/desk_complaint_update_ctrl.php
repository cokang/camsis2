<?php
class Desk_complaint_update_ctrl extends CI_Controller{
	

	function index(){
	
	$starttime = strtotime($this->input->post('n_startdate').' '.$this->input->post('n_starttime'));
	$endtime = strtotime($this->input->post('n_enddate').' '.$this->input->post('n_endtime'));
	$params = "{$starttime},{$endtime}";

	// load libraries for URL and form processing
    $this->load->helper(array('form', 'url'));
    // load library for form validation
    $this->load->library('form_validation');
	
	//validation rule
	$this->form_validation->set_rules('complaint_no','Complaint No','trim');
	$this->form_validation->set_rules('n_requested_by','Request By','trim|required');
	$this->form_validation->set_rules('n_complaint_date','Complaint Date','trim|required');
	$this->form_validation->set_rules('n_complaint_time','Complaint Time','trim|required');
	$this->form_validation->set_rules('n_designation','Designation','trim|required');
	$this->form_validation->set_rules('n_priority','Priority','trim|required');
	$this->form_validation->set_rules('n_source','Source','trim|required');
	$this->form_validation->set_rules('n_ncr_no','NCR No','trim');
	$this->form_validation->set_rules('vcm_month','VCM Month','trim');
	$this->form_validation->set_rules('vcm_year','VCM Year','trim');
	$this->form_validation->set_rules('n_summary','Summary','trim|required');
	$this->form_validation->set_rules('n_description','Description','trim|required');
	
	$this->form_validation->set_rules('n_personnel_code','Personnel Code','trim|required');
	$this->form_validation->set_rules('n_personnel_name','Personnel Name','trim|required');
	$this->form_validation->set_rules('n_Desig','Designation','trim');
	$this->form_validation->set_rules('n_startdate','Start Date','trim|required');
	$this->form_validation->set_rules('n_starttime','Start Time','trim|required');
	$this->form_validation->set_rules('n_enddate','End Date','trim|required');
	$this->form_validation->set_rules('n_endtime','End Time','trim|required|callback_time_check['.$params.']');
	$this->form_validation->set_rules('n_actiontaken','Action Taken','trim');
	$this->form_validation->set_rules('n_rootcause','Root Cause','trim');
	$this->form_validation->set_rules('n_correctiveact','Corrective Action','trim');
	$this->form_validation->set_rules('n_preventiveact','Preventive Action','trim');
	
	$this->form_validation->set_rules('n_request_number','Request No','trim');
	$this->form_validation->set_rules('n_request_status','Request Status','trim');
	$this->form_validation->set_rules('n_requested_by2','Requested By2','trim');
	$this->form_validation->set_rules('n_requested_date','Requested Date','trim');
	$this->form_validation->set_rules('n_priority2','Priority2','trim');
	$this->form_validation->set_rules('n_summary2','Summary2','trim');
	$this->form_validation->set_rules('n_asset_tag_number','Asset Tag Number','trim');
	$this->form_validation->set_rules('n_asset_no','Asset Number','trim');
	$this->form_validation->set_rules('n_asset_serial_number','Asset Serial Number','trim');
	$this->form_validation->set_rules('n_phone_numberat','Request Phone Number','trim');
	$this->form_validation->set_rules('n_user_reg_department','User Department No','trim');
	$this->form_validation->set_rules('n_reg_location','Location','trim');
	$this->form_validation->set_rules('n_request_closed_on','Request Closed On','trim');

	$this->form_validation->set_rules('n_phone_number','Phone Number','trim');
	$this->form_validation->set_rules('n_user_department','Department Code','trim|required');
	$this->form_validation->set_rules('n_user_department1','Department Desc','trim');
	$this->form_validation->set_rules('n_location','Location Code','trim|required');
	$this->form_validation->set_rules('n_location2','Location Name','trim|required');

	if ($this->session->userdata('usersess') == 'BES' OR $this->session->userdata('usersess') == 'FES'){
	$this->form_validation->set_rules('n_asset_number','Asset No','trim|required');
	$this->form_validation->set_rules('n_tag_number','Tag No','trim|required');
	$this->form_validation->set_rules('n_serial_number','Asset Serial Number','trim|required');
	$this->form_validation->set_rules('n_name','Asset Name','trim|required');
	$this->form_validation->set_rules('n_wrn_end','Warranty Expiry Date','trim|required');
	}
	else{
	$this->form_validation->set_rules('n_asset_number','Asset No','trim');
	$this->form_validation->set_rules('n_tag_number','Tag No','trim');
	$this->form_validation->set_rules('n_serial_number','Asset Serial Number','trim');
	$this->form_validation->set_rules('n_name','Asset Name','trim');
	$this->form_validation->set_rules('n_wrn_end','Warranty Expiry Date','trim');
	}

	$this->form_validation->set_rules('n_close_date','Close Date','trim');
	
		if($this->form_validation->run()==FALSE)
		{
			//echo 'false';
			//exit();
		$data['cmplnt_no'] = $this->input->post('cmplnt_no');
		$this->load->model("get_model");
		//$data['record'] = $this->get_model->complaint_update($data['cmplnt_no']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_desk_complaint_update",$data);
		}
		
		else
		{
			//echo 'true';
			//exit();
		$data['cmplnt_no'] = $this->input->post('cmplnt_no');
		$this->load->model("get_model");
		$data['record'] = $this->get_model->complaint_update($data['cmplnt_no']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_desk_complaint_confirm",$data);
		}

	}
	public function time_check($str = '', $params = '')
	{
		list($starttime,$endtime) = explode(',', $params);

		if ($endtime < $starttime)
		{
			$this->form_validation->set_message('time_check', 'End Time is lesser than Start Time');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	function comfirmation(){
	
	$RN = $this->input->post('cmplnt_no');
	
	$this->load->model('update_model');
	
	
	
	$insert_data = array(
	
						 'v_requestor' => $this->input->post('n_requested_by'),
						 'd_ComplaintDt' => ($this->input->post('n_complaint_date')) ? date('Y-m-d ', strtotime($this->input->post('n_complaint_date'))).$this->input->post('n_complaint_time') : NULL,
						 'd_ComplaintTime'=> $this->input->post('n_complaint_time'),
						 'v_Designation' => $this->input->post('n_designation'),
						 'v_Priority' => $this->input->post('n_priority'),
						 'v_Source' => $this->input->post('n_source'),
						 'v_Reference' => ($this->input->post('n_ncr_no')) ? $this->input->post('n_ncr_no') : NULL,
						 'v_Complaint'=>$this->input->post('n_summary'),
						 'v_ComplaintDesc'=>$this->input->post('n_description'),
						 'v_RequestNo'=>$this->input->post('n_request_number'),
						 'v_Phone' => $this->input->post('n_phone_number'),
						 'v_UserDeptCode' => $this->input->post('n_user_department'),
						 'v_Location' => $this->input->post('n_location'),
						 'v_AssetNo' => $this->input->post('n_asset_number'),
						 'v_TagNo' => $this->input->post('n_tag_number'),
						 'd_CompleteDt' => ($this->input->post('n_close_date')) ? date('Y-m-d ', strtotime($this->input->post('n_close_date'))) : NULL,
						 'v_ActionFlag' => 'U',
						 'd_TimeStamp' => date('Y-m-d H:i:s'),
						);
	//print_r($insert_data);
	//exit();
	//echo '<br><br>';
	$this->update_model->pmis2_com_complaint($insert_data);
	
	$this->load->model('display_model');
	$data['closedDT'] = $this->display_model->complaint_form($RN);
	if ($data['closedDT'][0]->d_CompleteDt){
		$insert_data = array(
							'v_ComplaintStatus' => 'C',
							);
		$this->update_model->pmis2_com_complaint($insert_data);
	}
	else{
		$insert_data = array(
							'v_ComplaintStatus' => 'A',
							);
		$this->update_model->pmis2_com_complaint($insert_data);
	}
	$this->load->model('insert_model');
	//$RN = $this->input->post('wrk_ord');
	$wrk_ord_test = $this->insert_model->complaint_exist('v_ComplaintNo',$RN);

	redirect('contentcontroller/desk_complaint?cmplnt_no='.$RN);	
	}

}
?>