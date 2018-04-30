<?php  
class bems_desk_ctrl extends CI_Controller {
	
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
  function index()
  {
  	$starttime = strtotime($this->input->post('n_startdate').' '.$this->input->post('n_starttime'));
	$endtime = strtotime($this->input->post('n_enddate').' '.$this->input->post('n_endtime'));
	$params = "{$starttime},{$endtime}";
	  
    // load libraries for URL and form processing
    $this->load->helper(array('form', 'url'));
    // load library for form validation
    $this->load->library('form_validation');
    // validation rule
		//$this->form_validation->set_rules($V_servicecode=$this->session->userdata('usersess'));
		$this->form_validation->set_rules('n_requested_by','Requested By','trim|required');
		$this->form_validation->set_rules('n_complaint_date','*Complaint Date','trim|required');
		$this->form_validation->set_rules('n_complaint_time','*Complaint Time','trim|required');
		$this->form_validation->set_rules('n_designation','*Designation','trim|required');
		$this->form_validation->set_rules('n_priority','*Priority','trim|required');
		$this->form_validation->set_rules('n_source','*Source','trim|required');
		$this->form_validation->set_rules('n_ncr_no','NCR No','trim');
		$this->form_validation->set_rules('vcm_month','VCM Month','trim');
		$this->form_validation->set_rules('vcm_year','VCM Year','trim');
		$this->form_validation->set_rules('n_summary','*Summary','trim|required');
		$this->form_validation->set_rules('n_description','*Description','trim|required');
		/*
		$this->form_validation->set_rules('n_personnel_code','*Personnel Code','trim|required');
		$this->form_validation->set_rules('n_personnel_name','*Personnel Name','trim|required');
		$this->form_validation->set_rules('n_Desig','*Personal Designation','trim');
		$this->form_validation->set_rules('n_startdate','*Start Date','trim|required');
		$this->form_validation->set_rules('n_starttime','*Start Time','trim|required');
		$this->form_validation->set_rules('n_enddate','*End Date','trim|required');
		$this->form_validation->set_rules('n_endtime','*End Time','trim|required|callback_time_check['.$params.']');
		$this->form_validation->set_rules('n_actiontaken','*Description','trim');
		*/
		
		$this->form_validation->set_rules('n_personnel_code','*Personnel Code','trim');
		$this->form_validation->set_rules('n_personnel_name','*Personnel Name','trim');
		$this->form_validation->set_rules('n_Desig','*Personal Designation','trim');
		$this->form_validation->set_rules('n_startdate','*Start Date','trim');
		$this->form_validation->set_rules('n_starttime','*Start Time','trim');
		$this->form_validation->set_rules('n_enddate','*End Date','trim');
		$this->form_validation->set_rules('n_endtime','*End Time','trim|callback_time_check['.$params.']');
		$this->form_validation->set_rules('n_actiontaken','*Description','trim');
		
		
		$this->form_validation->set_rules('n_request_number','Request Number','trim');
		$this->form_validation->set_rules('n_request_status','Request Status','trim');
		$this->form_validation->set_rules('n_requested_by2','Requested By','trim');
		$this->form_validation->set_rules('n_requested_date','Requested Date','trim');
		$this->form_validation->set_rules('n_priority2','Priority','trim');
		$this->form_validation->set_rules('n_summary2','Summary','trim');
		$this->form_validation->set_rules('n_asset_tag_number','Asset Tag Number','trim');
		$this->form_validation->set_rules('n_asset_no','Asset no.','trim');
		$this->form_validation->set_rules('n_asset_serial_number','Asset Serial Number','trim');
		$this->form_validation->set_rules('n_phone_numberat','*Description','trim');
		$this->form_validation->set_rules('n_user_department2','*Description','trim');
		$this->form_validation->set_rules('n_location2','*Description','trim');
		$this->form_validation->set_rules('n_request_closed_on','*Description','trim');

		$this->form_validation->set_rules('n_phone_number','*Description','trim');
		$this->form_validation->set_rules('n_user_department','*Description','trim');
		$this->form_validation->set_rules('n_user_department1','*Description','trim');
		$this->form_validation->set_rules('n_location','*Description','trim');
		$this->form_validation->set_rules('n_request_closed_on','*Description','trim');
		$this->form_validation->set_rules('n_location1','*Description','trim');

		if ($this->session->userdata('usersess') == 'BES' OR $this->session->userdata('usersess') == 'FES'){
		$this->form_validation->set_rules('n_serial_number','Serial Number','trim');
		/* requested by hj 29092016
		$this->form_validation->set_rules('n_asset_number','Asset Number','trim|required');
		$this->form_validation->set_rules('n_tag_number','Tag Number','trim|required');
		$this->form_validation->set_rules('n_name','Asset Name','trim|required');
		*/
		}
		else{
		$this->form_validation->set_rules('n_serial_number','Serial Number','trim');
		$this->form_validation->set_rules('n_asset_number','Asset Number','trim');
		$this->form_validation->set_rules('n_tag_number','Tag Number','trim');
		$this->form_validation->set_rules('n_name','Asset Name','trim');
		}
	
		$this->form_validation->set_rules('n_close_date','*Description','trim');
		/*
		$this->form_validation->set_rules('n_phone_number2','*Description','trim');
		$this->form_validation->set_rules('n_location3','*Description','trim');
		$this->form_validation->set_rules('n_location4','*Description','trim');
		$this->form_validation->set_rules('n_asset_tag_number2','*Description','trim');
		$this->form_validation->set_rules('n_asset_number2','*Description','trim');
		$this->form_validation->set_rules('n_asset_serial_number2','*Description','trim');
		$this->form_validation->set_rules('n_warranty_expire_date2','*Description','trim');
		$this->form_validation->set_rules('n_rootcause','*Root Cause','trim');
		$this->form_validation->set_rules('n_correctiveact','*Corrective Action','trim');
		$this->form_validation->set_rules('n_preventiveact','*Preventive Action','trim');
		$this->form_validation->set_rules('n_warranty_expire_date2','*Description','trim');
		$this->form_validation->set_rules('n_warranty_expire_date2','*Description','trim');
		$this->form_validation->set_rules('V_request_type','V_request_type','trim|required');
		$this->form_validation->set_rules('D_date','Complaint Date','trim|required');
		$this->form_validation->set_rules('D_time','D_time','trim|required');
		$this->form_validation->set_rules('V_MohDesg','Designation','trim|required');
		$this->form_validation->set_rules('V_priority_code','V_priority_code','trim|required');
		$this->form_validation->set_rules('V_summary','V_summary','trim|required');
		$this->form_validation->set_rules('V_details','V_details','trim|required');
		$this->form_validation->set_rules('V_User_dept_code','Personnel Code','trim|required');
		$this->form_validation->set_rules('asset_no','Asset Number','trim|required');
		$this->form_validation->set_rules('V_respon','Personnel Name','trim|required');
		$this->form_validation->set_rules('startdate','Start Date','trim|required');
		$this->form_validation->set_rules('enddate','End Date','trim|required');
		$this->form_validation->set_rules('endtime','End Time','trim|required');
		$this->form_validation->set_rules($v_respontime='sfHour','sfMinute','trim|required');
		$this->form_validation->set_rules($v_closedtime='efHour','efMinute','trim|required');
		$this->form_validation->set_rules('V_phone_no','Phone Number','required|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('user_dept','User Department','trim|required');
		$this->form_validation->set_rules($V_Location_code='adress','adress2','adress3','trim|required');
		$this->form_validation->set_rules($D_time);
		$this->form_validation->set_rules('V_requestor','Requested By','trim|required');
		*/
		
		if($this->form_validation->run()==FALSE)
		{
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_desknew");
		}
		
		else
		{
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("form_confirm");
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

	function confirmation_desk(){
			
		$this->load->model('get_seqno');	
		
		//$this->get_seqno->funcGetAPBESYSNextSeqNo('C', '2014');
		$RN=$this->get_seqno->funcNewRequestNoAPBESYS('C', '', date("Y"));
		
		$this->load->model('get_model');
		$username = $this->get_model->userfullname($this->session->userdata('v_UserName'));
		$fullname = $username[0]->v_UserName;

		$this->load->model('insert_model');
		//$data['service_apa'] = $this->loginModel->validate3();	
		//$RN="RQ/A4/B01714/14";	
		//echo  "lalalallala".$this->input->post('n_requested_by').",".$this->input->post('n_summary');
		//exit();
		$insert_data = array(
		
		/*
		'V_servicecode'=>$this->session->userdata('usersess'),
		'V_requestor'=>$this->input->post('V_requestor'),
		'V_request_type'=>$this->input->post('V_request_type'),
		'D_date'=>$this->input->post('D_date'),
		'D_time'=>$this->input->post('D_time'),
		'V_MohDesg'=>$this->input->post('V_MohDesg'),
		'V_priority_code'=>$this->input->post('V_priority_code'),
		'V_summary'=>$this->input->post('V_summary'),
		'V_details'=>$this->input->post('V_details'),
		'V_Request_no'=>$RN,
		'V_User_dept_code'=>$this->input->post('V_User_dept_code'),
		'V_respon'=>$this->input->post('V_respon'),
		'V_Asset_no'=>$this->input->post('asset_no'),
		'v_respondate'=>$this->input->post('startdate'),
		'v_closeddate'=>$this->input->post('enddate'),
		'v_closedtime'=>$this->input->post('endtime'),
		'D_timestamp'=>$this->input->post('D_timestamp'),
		'V_Location_code'=>$this->input->post('adress')." ".$this->input->post('adress1')." ".$this->input->post('adress2'),
		'V_phone_no'=>$this->input->post('V_phone_no')
		*/
		
		'v_requestor'=>$this->input->post('n_requested_by'),
		'v_ServiceCode'=>$this->session->userdata('usersess'),
		'v_ComplaintNo'=>$RN,
		'd_ComplaintDt'=>($this->input->post('n_complaint_date')) ? date('Y-m-d ', strtotime($this->input->post('n_complaint_date'))).$this->input->post('n_complaint_time') : NULL,
		'd_ComplaintTime'=>$this->input->post('n_complaint_time'),
		'v_Complaint'=>$this->input->post('n_summary'),
		'v_Designation'=>$this->input->post('n_designation'),
		'v_Priority'=>$this->input->post('n_priority'),
		'v_AssetNo'=>$this->input->post('n_asset_number'),
		'v_UserDeptCode'=>$this->input->post('n_user_department'),
		'v_Location'=>$this->input->post('n_location'),
		'v_ComplaintDesc'=>$this->input->post('n_description'),
		'v_TagNo'=>$this->input->post('n_tag_number'),
		'v_Phone'=>$this->input->post('n_phone_number'),
		'v_Source'=>$this->input->post('n_source'),
		'v_Reference' => ($this->input->post('n_ncr_no')) ? $this->input->post('n_ncr_no') : NULL,
		'v_ComplaintStatus'=>"A",
		'v_RequestNo'=>$this->input->post('n_request_number'),
		'v_HospitalCode'=>"IIUM",
		'd_TimeStamp'=> date('Y-m-d H:i:s'),
		'd_CompleteDt'=>($this->input->post('n_close_date')) ? date('Y-m-d ', strtotime($this->input->post('n_close_date'))) : NULL,
		'v_ActionFlag'=>"I",
		'takenby' => $fullname
		//'V_requestor'=>$this->input->post('V_requestor')
		);
//print_r($insert_data);
//echo '<br><br>';
//exit();
		/*
		while ($row = mysql_fetch_array($insert_data)) {
    echo '<pre>';
    print_r ($row);
    echo '</pre>';
		}
		exit();
		*/
		$this->insert_model->ins_complaint($insert_data,TRUE);
		
		$insert_datadet = array(
		'v_ServiceCode'=>$this->session->userdata('usersess'),
		'v_ComplaintNo'=>$RN,
		'v_Monyr' => (($this->input->post('vcm_month')) OR ($this->input->post('vcm_year'))) ?  sprintf("%02d", $this->input->post('vcm_month')).'/'.$this->input->post('vcm_year') : NULL,
		'd_follow_startdate' => ($this->input->post('n_startdate')) ? date('Y-m-d ', strtotime($this->input->post('n_startdate'))).$this->input->post('n_starttime') : NULL,//$this->input->post('n_startdate'),
		'd_follow_enddate' => ($this->input->post('n_enddate')) ? date('Y-m-d ', strtotime($this->input->post('n_enddate'))).$this->input->post('n_endtime') : NULL,//$this->input->post('n_enddate'),
		'v_follow_starttime' => $this->input->post('n_starttime'),
		'v_follow_endtime' => $this->input->post('n_endtime'),
		'v_PersonnelCode'=>$this->input->post('n_personnel_code'),
		'v_Remark'=>$this->input->post('n_actiontaken'),
		'v_rootcause'=>$this->input->post('n_rootcause') ? $this->input->post('n_rootcause') : NULL,
		'v_correctiveact'=>$this->input->post('n_correctiveact') ? $this->input->post('n_correctiveact') : NULL,
		'v_preventiveact'=>$this->input->post('n_preventiveact') ? $this->input->post('n_preventiveact') : NULL,
		'd_Timestamp'=> date('Y-m-d H:i:s'),
		'v_ActionFlag'=>"I",
		'v_HospitalCode'=>"IIUM",
		);
//print_r($insert_datadet);
//exit();
		$this->insert_model->complaintdet_form($insert_datadet,TRUE);
		 //echo $this->db->last_query();
		//exit();
		
		redirect('contentcontroller/desk?parent='.$this->input->post('parent'));
			
		}
	
}
?>