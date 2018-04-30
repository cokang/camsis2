<?php  
//echo 'panggil ctrl';
class workorder_ctrl extends CI_Controller {
	
  function index()
  {
	  //echo "nilaitag".$this->input->post('n_tag_number');
    // load libraries for URL and form processing
    $this->load->helper(array('form', 'url'));
    // load library for form validation
    $this->load->library('form_validation');
    // validation rule
		$this->form_validation->set_rules('n_request_type','Request Type','trim|required');
		$this->form_validation->set_rules('n_request_date','Request Date','trim|required');
		$this->form_validation->set_rules('n_hour','Hour Requested','trim|required');
		$this->form_validation->set_rules('n_min','Minute Requested','trim|required');
		$this->form_validation->set_rules('n_priority','Priority','trim|required');
		$this->form_validation->set_rules('n_summary','*Summary','trim|required');

		if ($this->session->userdata('usersess') == 'BESA'){
		$this->form_validation->set_rules('n_asset_number','Asset Number','trim|required');
		$this->form_validation->set_rules('n_tag_number','Tag Number ','trim|required');
		$this->form_validation->set_rules('n_serial_number','Serial Number','trim');
		$this->form_validation->set_rules('n_name','Asset Name','trim');
		}
		else{
		$this->form_validation->set_rules('n_asset_number','Asset Number','trim');
		$this->form_validation->set_rules('n_tag_number','Tag Number ','trim');
		$this->form_validation->set_rules('n_serial_number','Serial Number','trim');
		$this->form_validation->set_rules('n_name','Asset Name','trim');
		}

		$this->form_validation->set_rules('n_requested','Requested By','trim|required');
		$this->form_validation->set_rules('n_designation','Designation','trim|required');
		$this->form_validation->set_rules('n_phone_number','Phone Number','regex_match[/^[0-9]{10}$/]');

		if ($this->session->userdata('usersess') == 'BES' OR $this->session->userdata('usersess') == 'FES'){
		$this->form_validation->set_rules('n_user_department','Department Code','trim|required');
		$this->form_validation->set_rules('n_user_department1','Department Desc','trim|required');
		$this->form_validation->set_rules('n_location','Location Code','trim|required');
		$this->form_validation->set_rules('n_location1','Location Desc','trim|required');
		}
		else{
		$this->form_validation->set_rules('n_user_department','Department Code','trim');
		$this->form_validation->set_rules('n_user_department1','Department Desc','trim');
		$this->form_validation->set_rules('n_location','Location Code','trim');
		$this->form_validation->set_rules('n_location1','Location Desc','trim');
		}
		$this->form_validation->set_rules('chkbox','checkbox','trim');
		//$this->form_validation->set_rules('n_user_department','User Department ','trim|required');
		//$this->form_validation->set_rules('n_location','Location1','trim|required');
		//$this->form_validation->set_rules('n_location1','Location','trim|required');
		//$this->form_validation->set_rules('n_location2','Location2','trim|required');
		//$this->form_validation->set_rules('n_phone_number','Location2','trim');
		//$this->form_validation->set_rules('n_tag_number','Location2','trim');
		//$this->form_validation->set_rules('n_asset_number','Location2','trim');
		//$this->form_validation->set_rules('n_location2','Location2','trim');
		//$this->form_validation->set_rules('n_serial_number','Serial Number','trim|required');	
		//$this->form_validation->set_rules('n_name','Name','trim|required');
			
		if($this->form_validation->run()==FALSE)
		{
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_deskrequest");
		}
		
		else
		{
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("form_confirmrequest");
		}
  }
	
	function confirmation_workorder(){
	
	  $is_logged_in = $this->session->userdata('usersess');
		
		if(!isset($is_logged_in) || $is_logged_in !=TRUE)
		redirect('logincontroller/index');
	
		$this->load->model('get_seqno');	
		//$data['service_apa'] = $this->loginModel->validate3();	
		$RN=$this->get_seqno->funcNewRequestNoAPBESYS($this->input->post('n_request_type'), '', date("Y"));
		//echo "nilai wo : " . $RN;
		//exit();
		//$RN="RQ/A4/B01714/14";	
		$this->load->model('get_model');
		$username = $this->get_model->userfullname($this->session->userdata('v_UserName'));
		$fullname = $username[0]->v_UserName;

		$this->load->model('insert_model');
		
		
		$insert_data = array(
		
		'V_servicecode'=>$this->session->userdata('usersess'),
		'V_requestor'=>$this->input->post('n_requested'),
		'V_request_type'=>$this->input->post('n_request_type'),
		'D_date'=> $this->input->post('n_request_date') ? date('Y-m-d ', strtotime($this->input->post('n_request_date'))).$this->input->post('n_hour').':'.str_pad($this->input->post('n_min'), 2, 0, STR_PAD_LEFT) : NULL,
		'D_time'=>$this->input->post('n_hour').':'.str_pad($this->input->post('n_min'), 2, 0, STR_PAD_LEFT),
		'V_MohDesg'=>$this->input->post('n_designation'),
		'V_priority_code'=>$this->input->post('n_priority'),
		'V_summary'=>$this->input->post('n_summary'),
		//'V_details'=>$this->input->post('V_details'),
		'V_hospitalcode'=>$this->session->userdata('hosp_code'),
		'V_actionflag'=>'I',
		'V_request_status'=>'A',
		'V_Request_no'=>$RN,
		'V_User_dept_code'=>$this->input->post('n_user_department'),
		'V_respon'=>$this->input->post('n_designation'),
		'V_Asset_no'=>$this->input->post('n_asset_number'),
		//'v_respondate'=>$this->input->post('startdate'),
		//'v_closeddate'=>$this->input->post('enddate'),
		//'v_closedtime'=>$this->input->post('endtime'),
		'D_timestamp'=>date('Y-m-d H:i:s'),
		'V_Location_code'=>$this->input->post('n_location'),
		'V_phone_no'=>$this->input->post('n_phone_number'),
		'takenby' => $fullname
		//'V_requestor'=>$this->input->post('V_requestor')
		);
		$this->insert_model->create_form($insert_data,TRUE);
		
		// echo $this->db->last_query();
		//exit();	
		if($this->input->post('chkbox') == 'ON' ){
		echo 'text';
		redirect('contentcontroller/print_workorder?wrk_ord='.$RN);
		}else{
		redirect('contentcontroller/workorder?parent='.$this->input->post('parent').'&wonos='.$RN);
		}
		
		
			
		}
	
}
?>