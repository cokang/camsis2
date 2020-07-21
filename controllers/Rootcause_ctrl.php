<?php
class Rootcause_ctrl extends CI_Controller{

	public function index(){
		$is_logged_in = $this->session->userdata('v_UserName');

		if(!isset($is_logged_in) || $is_logged_in !=TRUE)
		redirect('logincontroller/index');
		// load libraries for URL and form processing
	    $this->load->helper(array('form', 'url'));
	    // load library for form validation
			// load library for form validation
			$this->load->library('form_validation');
		 $this->load->model('get_model');
		 $workorderOrMrin = $this->input->get('mrin')==''?$this->input->get('wrk_ord'):$this->input->get('mrin');
		 $data['recordcmis'] = $this->get_model->get_cmis($workorderOrMrin);
		 $data['recordphoto'] = $this->get_model->get_photo($workorderOrMrin);
		 $data['photopath']=$data['recordphoto']!=null?$data['recordphoto'][0]->com_path:'';
		 $this->load->helper(array('form', 'url'));
		 // load library for form validation
			$this->load->library('form_validation');
		 $this->form_validation->set_rules('rc_error','Complaint / Error / Problem statement','trim|required');
		 $this->form_validation->set_rules('rc_partfault','Root cause to part faulty','trim|required');
		 $this->form_validation->set_rules('rc_why','Action taken','trim|required');
		 $this->form_validation->set_rules('rc_remarkST','Remark by Specialist Team','trim|required');
		 if($data['photopath']==null)$this->form_validation->set_rules('uploadphoto','Image Reference','trim|required');
		 $this->form_validation->set_rules('n_Case','Tick where appropriate','trim|required');

	 if($this->form_validation->run()==FALSE )
		 {
			 // $this->load->model('get_model');
			 // $data['runningno'] = $this->input->post('tempno');
			 // $data['recordcom'] = $this->get_model->get_components($data['runningno']);
			 // $data['recordatt'] = $this->get_model->get_attachments($data['runningno']);
			 $this ->load->view("head");
			 $this ->load->view("left");
			 $this ->load->view("Content_workorder_technicalsummary_Update",$data);
		 }
		 else
		 {
			 $this ->load->view("head");
			 $this ->load->view("left");
			 $this ->load->view("Content_workorder_technicalsummary_Confirm",$data);
		 }
	}

	function comfirmation(){
		//if(!isset($is_logged_in) || $is_logged_in !=TRUE)
		//redirect('logincontroller/index');
		$is_logged_in = $this->session->userdata('usersess');

  	if(!isset($is_logged_in) || $is_logged_in !=TRUE)
  	redirect('logincontroller/index');

	  	$this->load->model('display_model');
		$this->load->model('insert_model');
		$this->load->model('update_model');

		$data['record'] = $this->display_model->rootcause($this->input->post('workord'));
		$insert_data = array(
			'rone' => $this->input->post('rc_error'),
			'rthree' => $this->input->post('rc_partfault'),
			'CriticalFlag' => $this->input->post('n_Case'),
			//'ReqCase' => $this->input->post('n_Case'),
			'rtwo' => $this->input->post('rc_why'),
			'WorkOfOrder' => $this->input->post('workord')

			);

			if($data['record']){
				$this->update_model->updaterootcause($insert_data,$this->input->post('workord'));
			}else{
				$this->insert_model->rootcause($insert_data);
			}


		redirect('contentcontroller/technicalsummary?wrk_ord='.$this->input->post('workord').'&wo=3');


	}



}
?>
