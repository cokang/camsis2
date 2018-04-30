<?php
class wo_booking_ctrl extends CI_Controller{
	
	public function index(){
	// load libraries for URL and form processing
    $this->load->helper(array('form', 'url'));
    // load library for form validation
    $this->load->library('form_validation');
	
	//validation rule
	$this->form_validation->set_rules('b_booking_name','Booking Name','trim|required');
	$this->form_validation->set_rules('b_booking_no','Booking No','trim|required');
	
	
	if($this->form_validation->run()==FALSE)
		{
		$data['tabber'] = ($this->input->get('work-a') <> 0) ? $this->input->get('work-a') : '0';
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");	
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_Booking_no",$data);
		}
		
		else
		{
		$this->load->model('insert_model');
		$booking_array = array('booking_name' => $this->input->post('b_booking_name'),
							   'booking_volume' => $this->input->post('b_booking_no'),
							   'owner' => $this->session->userdata('v_UserName'),
							   'service_code' => $this->session->userdata('usersess'),
							   'd_timestamp' => date("Y-m-d"));

		$this->insert_model->booking_main($booking_array);

		$this->load->model('display_model');
		do {
			//echo ++$i."<br>";
    		$data['bookrec'] = $this->display_model->bookingdet($this->input->post('b_booking_name'),$this->input->post('b_booking_no'),date("Y-m-d"));
		}while (!$data['bookrec']);
		//print_r($data['bookrec']);
		//exit();
		$this->load->model('get_seqno');
		for($i = 1; $i <= $data['bookrec'][0]->booking_volume; $i++){
			$data['bookingwo'][] = $this->get_seqno->funcNewRequestNoAPBESYS('A4', '', date("Y"));
		}

		foreach($data['bookingwo'] as $row){
			$insert_data[] = array('booking_id' => $data['bookrec'][0]->id,
								   'booking_wo' => $row,
								   'booking_status' => 'O');
		}
		//print_r($insert_data);
		//exit();
		$this->insert_model->booking_detail($insert_data);
		redirect("contentcontroller/Booking_no");
		}
	}
}
?>