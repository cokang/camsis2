<?php

class Workorderlist_update_ctrl extends CI_Controller{
	
	function index(){
	
    // load libraries for URL and form processing
    $this->load->helper(array('form', 'url'));
    // load library for form validation
    $this->load->library('form_validation');

        //validation rule
    $this->form_validation->set_rules('request_type','Request Type','trim');
	$this->form_validation->set_rules('n_request_date','Request Date','trim|required');
	$this->form_validation->set_rules('n_hour','Start Hour','trim|required');
	$this->form_validation->set_rules('n_min','Start Minutes','trim|required');
	$this->form_validation->set_rules('n_priority','Priority','trim|required');
	$this->form_validation->set_rules('n_summary','Summary','trim|required');

	if ($this->session->userdata('usersess')=='BES' OR $this->session->userdata('usersess')=='FES') {
	$this->form_validation->set_rules('n_asset_number','Asset Number','trim|required');
	$this->form_validation->set_rules('n_tag_number','Asset Tag Number','trim|required');
	$this->form_validation->set_rules('n_serial_number','Asset Serial Number','trim|required');
	$this->form_validation->set_rules('n_name','Asset Name','trim|required');
	} else{
	$this->form_validation->set_rules('n_asset_number','Asset Number','trim');
	$this->form_validation->set_rules('n_tag_number','Asset Tag Number','trim');
	$this->form_validation->set_rules('n_serial_number','Asset Serial Number','trim');
	$this->form_validation->set_rules('n_name','Asset Name','trim');
	}

	$this->form_validation->set_rules('n_requested','Requested By','trim|required');
	$this->form_validation->set_rules('n_designation','Designation','trim|required');
	//$this->form_validation->set_rules('n_phone_number','Phone Number','regex_match[/^[0-9]{10}$/]');
	if ($this->session->userdata('usersess')=='BES' OR $this->session->userdata('usersess')=='FES') {
	$this->form_validation->set_rules('n_phone_number','Phone Number','trim');
	$this->form_validation->set_rules('n_user_department','Department Code','trim|required');
	$this->form_validation->set_rules('n_user_department1','Department Desc','trim|required');
	$this->form_validation->set_rules('n_location','Location Code','trim|required');
	$this->form_validation->set_rules('n_location2','Location Code','trim|required');
	} else{
	$this->form_validation->set_rules('n_phone_number','Phone Number','trim');
	$this->form_validation->set_rules('n_user_department','Department Code','trim');
	$this->form_validation->set_rules('n_user_department1','Department Desc','trim');
	$this->form_validation->set_rules('n_location','Location Code','trim');
	$this->form_validation->set_rules('n_location2','Location Code','trim');
	}
	$this->form_validation->set_rules('n_link','Link Workorder','trim');

if($this->form_validation->run()==FALSE)
		{
			
		$data['wrk_ord'] = $this->input->post('wrk_ord');
		$this->load->model("get_model");
		$data['record'] = $this->get_model->request_update($data['wrk_ord']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorderlist_update",$data);
		}
		
		else
		{
		$data['wrk_ord'] = $this->input->post('wrk_ord');
		$this->load->model("get_model");
		$data['record'] = $this->get_model->request_update($data['wrk_ord']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorderlist_Comfirm",$data);
		}
	}
	function comfirmation(){
	$RN =  $this->input->post('wrk_ord');
	if ($this->input->post('bookwo') == ''){
		$this->load->model('update_model');
		$insert_data = array(
	                         'V_priority_code' => $this->input->post('n_priority'),
							 'D_time'=>$this->input->post('n_hour').':'.str_pad($this->input->post('n_min'), 2, 0, STR_PAD_LEFT),
	                         'V_summary' => str_replace('"','', str_replace("'","",$this->input->post('n_summary'))),
	                         'V_Asset_no' => $this->input->post('n_asset_number'),
							 'V_requestor' => $this->input->post('n_requested'),
							 'V_MohDesg' => $this->input->post('n_designation'),
							 'V_User_dept_code'=>$this->input->post('n_user_department'),
							 'V_Location_code'=>$this->input->post('n_location'),
							 'V_phone_no' => $this->input->post('n_phone_number'),
	                     	 'D_date' => ($this->input->post('n_request_date')) ? date('Y-m-d ', strtotime($this->input->post('n_request_date'))).$this->input->post('n_hour').':'.str_pad($this->input->post('n_min'), 2, 0, STR_PAD_LEFT) : NULL,
		);

		$this->update_model->create_form($insert_data);

		if ($this->input->post('n_link') <> ''){
			$this->load->model('insert_model');
			$wrk_ord_test = $this->insert_model->link_woexist('ori_wo',$RN);
		}

		redirect('contentcontroller/workorderlist?wrk_ord='.$RN);
	}
	else{
		$this->load->model('get_model');
		$username = $this->get_model->userfullname($this->session->userdata('v_UserName'));
		$fullname = $username[0]->v_UserName;

		$this->load->model('insert_model');
		
		
		$insert_data = array(
		
		'V_servicecode'=>$this->session->userdata('usersess'),
		'V_requestor'=>$this->input->post('n_requested'),
		'V_request_type'=>'A4',
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

		/*if ($this->input->post('n_link') <> ''){
			$this->load->model('insert_model');
			$wrk_ord_test = $this->insert_model->link_woexist('ori_wo',$RN);
		}*/

		$this->load->model('update_model');
		$insert_data = array(
	                         'booking_status' => 'U'
							 );

		$this->update_model->bookingwoused($insert_data,$RN);
		redirect('contentcontroller/booking_list?whatid='.$this->input->post('whatid'));
	}
	

	
	}

}
?>