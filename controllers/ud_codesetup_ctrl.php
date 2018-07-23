<?php
class Ud_codesetup_ctrl extends CI_Controller{
	
	public function index(){
	// load libraries for URL and form processing
    $this->load->helper(array('form', 'url'));
    // load library for form validation
    $this->load->library('form_validation');
	
	//validation rule
	$this->form_validation->set_rules('n_ud_code','Department Code','trim|required');
	$this->form_validation->set_rules('n_Description','Department Description','trim|required');
	$this->form_validation->set_rules('n_moh','MOH Code','trim|required');
	$this->form_validation->set_rules('n_mohdesc','MOH Description','trim');
	
	if($this->form_validation->run()==FALSE)
		{
			$this ->load->view("head");
			$this ->load->view("left");
			$this ->load->view("Content_sys_User_Department_update");
		}
		
		else
		{
			$this ->load->view("head");
			$this ->load->view("left");
			$this ->load->view("Content_sys_User_Department_confirm");			
		}
	}
	
	function comfirmation(){
	$ud_insert = 1;
	if ($this->input->post('sys_id') == '')	
	{
		$this->load->model('insert_model');
		$ud_insert = $this->insert_model->ud_setup('v_UserDeptCode',$this->input->post('n_ud_code'),'v_UserDeptDesc',$this->input->post('n_Description'));
	}
	else{
		$this->load->model('update_model');
		$insert_data = array(
				'v_UserDeptCode'=> $this->input->post('n_ud_code'),
				'v_UserDeptDesc' => $this->input->post('n_Description'),
				'v_mohcode' => $this->input->post('n_moh'),
				'v_mohdesc' => $this->input->post('n_mohdesc'),
				'd_Timestamp' => date("Y-m-d H:i:s"),
				'v_ActionFlag' => 'U',
				);
		
		$this->update_model->ud_setup_u($insert_data,$this->input->post('sys_id'));
	}
	
	if ($ud_insert != 0){
		redirect('contentcontroller/sys_admin?ud=1');	
	}
	else{
		redirect('contentcontroller/sys_admin?ud=2&ud_insert=0');
	}


	}

}
?>