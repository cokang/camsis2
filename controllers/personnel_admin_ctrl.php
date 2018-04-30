<?php
class personnel_admin_ctrl extends CI_Controller{
	
	public function index(){
	// load libraries for URL and form processing
    $this->load->helper(array('form', 'url'));
    // load library for form validation
    $this->load->library('form_validation');
	
	//validation rule
	$this->form_validation->set_rules('n_p_code','Personnel Code','trim|required');
	$this->form_validation->set_rules('n_p_Name','Personal Name','trim|required');
	$this->form_validation->set_rules('n_l_Grade','Labour Grade','trim|required');
	$this->form_validation->set_rules('n_h_rate','Hourly Rate','trim|required');
	$this->form_validation->set_rules('n_b_location','Base Location','trim|required');
	$this->form_validation->set_rules('n_s_Code','Service Code','trim|required');
	$this->form_validation->set_rules('n_s_Description','Service Description','trim|required');
	$this->form_validation->set_rules('n_c_Calender','Calender No','trim|required');
	$this->form_validation->set_rules('n_d_Start','Date Start','trim|required');
	$this->form_validation->set_rules('n_d_End','Date End','trim|required');
	$this->form_validation->set_rules('n_a_status','Access Status','trim|required');
	$this->form_validation->set_rules('n_h_Code','Hospital Code','trim|required');
	$this->form_validation->set_rules('n_Designation','Designation','trim|required');
	$this->form_validation->set_rules('n_p_Location','Previous Location','trim|required');
	$this->form_validation->set_rules('n_ac_status','Active Status','trim|required');
	if($this->form_validation->run()==FALSE)
		{
			$this ->load->view("head");
			$this ->load->view("left");
			$this ->load->view("Content_sys_Update");
		}
		
		else
		{
			$this ->load->view("head");
			$this ->load->view("left");
			$this ->load->view("Content_sys_Confirm");			
		}
	}
	
	function comfirmation(){
	$ud_insert = 1;
	if ($this->input->post('sys_id') == '')	
	{
		$this->load->model('insert_model');
		$ud_insert = $this->insert_model->personnel_admin('v_PersonalCode',$this->input->post('n_p_code'));
	}
	else{
		$this->load->model('update_model');
		$insert_data = array(
				//'v_PersonalCode'=> $this->input->post('n_p_code'),
				'v_PersonalName' => $this->input->post('n_p_Name'),
				'v_PersonalLabGrd' => $this->input->post('n_l_Grade'),
				'v_hourlyrate' => $this->input->post('n_h_rate'),
				'v_PersonalbasLoc' => $this->input->post('n_b_location'),
				'v_PersonalSerCode' => $this->input->post('n_s_Code'),
				'v_PersonalDesc' => $this->input->post('n_s_Description'),
				'v_PersonalCalno'=> $this->input->post('n_c_Calender'),
				'd_PersonalDStart' => date("Y-m-d H:i:s",strtotime($this->input->post('n_d_Start'))),
				'd_PersonalDEnd' => date("Y-m-d H:i:s",strtotime($this->input->post('n_d_End'))),
				'v_AccessStatus' => $this->input->post('n_a_status'),
				'v_HospitalCode' => $this->input->post('n_h_Code'),
				'v_designation' => $this->input->post('n_Designation'),
				'v_PersonalprevLoc' => $this->input->post('n_p_Location'),
				'v_ActiveStatus' => $this->input->post('n_ac_status'),
				'd_timestamp' => date("Y-m-d H:i:s"),
				'v_Actionflag' => 'U',
				);
		//print_r($insert_data);
		//exit();
		
		$this->update_model->personnel_admin_u($insert_data,$this->input->post('sys_id'));
	}
	
	if ($ud_insert != 0){
		redirect('contentcontroller/sys_admin?gbl=1');	
	}
	else{
		redirect('contentcontroller/sys_admin?gbl=2&ud_insert=0');
	}


	}

}
?>