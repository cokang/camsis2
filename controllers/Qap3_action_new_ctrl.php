<?php
class Qap3_action_new_ctrl extends CI_Controller{
	
	function index(){
	
	// load libraries for URL and form processing
    $this->load->helper(array('form', 'url'));
    // load library for form validation
    $this->load->library('form_validation');
	
	//validation rule
	$this->form_validation->set_rules('slno','slno','trim');
	$this->form_validation->set_rules('n_actdesc','Asset Desc','trim|required');
	$this->form_validation->set_rules('n_startdate','Start Date','trim');
	$this->form_validation->set_rules('n_enddate','End Date','trim');
	$this->form_validation->set_rules('n_donedate','Done Date','trim');
	$this->form_validation->set_rules('n_misuserid','Mis User Id','trim');
	

	if($this->form_validation->run()==FALSE)
		{
		$data['carid'] = $this->input->get('carid');
		$this->load->model('get_model');
		$data['record'] = $this->get_model->qap3_actionnew($data['carid']);	
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_qap3_action_new",$data);
		}
		
		else
		{
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_qap3_action_confirm");
		}

	}
	function confirmation(){
	$ssiq = $this->input->post('ssiq');
	$carid = $this->input->post('carid');
	$m = $this->input->post('m');
	$y = $this->input->post('y');
	$car = $this->input->post('car');
	$id = $this->input->post('id');
	$this->load->model('insert_model');
	$insert_data = array(
						'company_code' => 'Pantai',
						'car_no' => $carid,
						'sl_no' => $this->input->post('slno'),
						'action' => $this->input->post('n_actdesc'),
						'start_date' => $this->input->post('n_startdate') ? date('Y-m-d',strtotime($this->input->post('n_startdate'))) : NULL,
						'end_date' => $this->input->post('n_enddate') ? date('Y-m-d',strtotime($this->input->post('n_enddate'))) : NULL,
						'done_date' => $this->input->post('n_donedate') || strlen($this->input->post('n_donedate')) != 0 ? date('Y-m-d',strtotime($this->input->post('n_donedate'))) : NULL,
						'mis_user_id' => $this->input->post('n_misuserid'),
						'date_time_stamp' => date('Y-m-d'),
						'action_flag' => 'I',
						);
	
	$this->insert_model->qap3_action_new($insert_data);
	redirect('contentcontroller/qap3_action?ssiq='.$ssiq.'&carid='.$carid.'&m='.$m.'&y='.$y.'&car='.$car);	
	}

}
?>