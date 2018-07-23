<?php
class Qap3_car_action_update_ctrl extends CI_Controller{
	
	function index(){
		
	// load libraries for URL and form processing
    $this->load->helper(array('form', 'url'));
    // load library for form validation
    $this->load->library('form_validation');
	
	//validation rule
	$this->form_validation->set_rules('sl_no','slno','trim');
	$this->form_validation->set_rules('n_actdesc','Asset Desc','trim|required');
	$this->form_validation->set_rules('n_startdate','Start Date','trim');
	$this->form_validation->set_rules('n_enddate','End Date','trim');
	$this->form_validation->set_rules('n_donedate','Done Date','trim');
	$this->form_validation->set_rules('n_misuserid','Mis User Id','trim');
	

	if($this->form_validation->run()==FALSE)
		{
		$data['ssiq'] = $this->input->get('ssiq');
		$data['carid'] = $this->input->get('carid');
		$data['sl_no'] = $this->input->get('sl_no');
		$this->load->model('display_model');
		$data['record'] = $this->display_model->qap3_actiondisp($data['carid'],$data['sl_no']);	
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_qap3_action_edit",$data);
		}
		
		else
		{
		
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_qap3_action_confirmedit");
		}

	}
	function confirmation(){
	$ssiq = $this->input->post('ssiq');
	$carid = $this->input->post('carid');
	$m = $this->input->post('m');
	$y = $this->input->post('y');
	$car = $this->input->post('car');
	$id = $this->input->post('id');
	$this->load->model('update_model');
	$insert_data = array(
						'action' => $this->input->post('n_actdesc'),
						'start_date' => $this->input->post('n_startdate') ? date('Y-m-d',strtotime($this->input->post('n_startdate'))) : NULL,
						'end_date' => $this->input->post('n_enddate') ? date('Y-m-d',strtotime($this->input->post('n_enddate'))) : NULL,
						'done_date' => $this->input->post('n_donedate') || strlen($this->input->post('n_donedate')) != 0 ? date('Y-m-d',strtotime($this->input->post('n_donedate'))) : NULL,
						'mis_user_id' => $this->input->post('n_misuserid'),
						'date_time_stamp' => date('Y-m-d'),
						'action_flag' => 'U',
						);
	
	$this->update_model->qap3_caraction_update($id,$insert_data);
	redirect('contentcontroller/qap3_action?ssiq='.$ssiq.'&carid='.$carid.'&m='.$m.'&y='.$y.'&car='.$car);	
	}

}
?>