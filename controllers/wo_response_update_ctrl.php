<?php
class wo_response_update_ctrl extends CI_Controller{
	
	public function index(){

	$starttime = strtotime($this->input->post('n_Shour').':'.$this->input->post('n_Smin'));
	$endtime = strtotime($this->input->post('n_Ehour').':'.$this->input->post('n_Emin'));
	$params = "{$starttime},{$endtime}";

	// load libraries for URL and form processing
    $this->load->helper(array('form', 'url'));
    // load library for form validation
    $this->load->library('form_validation');
	
	//validation rule
	$this->form_validation->set_rules('n_Response_Date','Response Date','trim|required');
	$this->form_validation->set_rules('n_Shour','Start Hour','trim|required');
	$this->form_validation->set_rules('n_Smin','Start Minutes','trim|required');
	$this->form_validation->set_rules('n_Ehour','End Hour','trim|required');
	$this->form_validation->set_rules('n_Emin','End Minutes','trim|required|callback_time_check['.$params.']');
	$this->form_validation->set_rules('n_Action_Taken','Action Taken','trim|required');

	$this->form_validation->set_rules('C_requestor1','Responder 1','trim|required');
	$this->form_validation->set_rules('V_requestor1','Name Responder 1','trim|required');
	$this->form_validation->set_rules('n_End_Time_h1','Responder1 Hour','trim|required');
	$this->form_validation->set_rules('n_End_Time_m1','Responder1 Minutes','trim|required');
	$this->form_validation->set_rules('V_rate1','Rate1','trim|required');
	$this->form_validation->set_rules('T_rate1','Total Rate1','trim|required');

	$this->form_validation->set_rules('C_requestor2','Responder 2','trim');
	$this->form_validation->set_rules('V_requestor2','Name Responder 1','trim');
	$this->form_validation->set_rules('n_End_Time_h2','Responder2 Hour','trim');
	$this->form_validation->set_rules('n_End_Time_m2','Responder2 Minutes','trim');
	$this->form_validation->set_rules('V_rate2','Rate2','trim');
	$this->form_validation->set_rules('T_rate2','Total Rate2','trim');

	$this->form_validation->set_rules('C_requestor3','Labor Cost','trim');
	$this->form_validation->set_rules('V_requestor3','Name Responder 1','trim');
	$this->form_validation->set_rules('n_End_Time_h3','Responder3 Hour','trim');
	$this->form_validation->set_rules('n_End_Time_m3','Responder3 Minutes','trim');
	$this->form_validation->set_rules('V_rate3','Rate3','trim');
	$this->form_validation->set_rules('T_rate3','Total Rate3','trim');

	$this->form_validation->set_rules('C_Vendor','Vendor Code','trim');
	$this->form_validation->set_rules('V_Vendor','Vendor Parts','trim');
	$this->form_validation->set_rules('V_reqRM','Vendor RM','trim');
	$this->form_validation->set_rules('V_reqtotal','Vendor Total','trim');

	$this->form_validation->set_rules('name','User Verification','trim');
	//$this->form_validation->set_rules('username','User Verification','trim');
	if($this->form_validation->run()==FALSE)
		{
		$data['wrk_ord'] = $this->input->post('wrk_ord');
		$this->load->model("display_model");
		$data['disp'] = $this->display_model->list_display($data['wrk_ord']);
		$data['datetimereq'] = explode(' ',$data['disp'][0]->D_date);
		$data['timereq'] = explode(':',$data['datetimereq'][1]);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_response_update",$data);
		}
		
		else
		{
		$data['wrk_ord'] = $this->input->post('wrk_ord');
		$this->load->model("display_model");
		$data['disp'] = $this->display_model->list_display($data['wrk_ord']);
		$data['datetimereq'] = explode(' ',$data['disp'][0]->D_date);
		$data['timereq'] = explode(':',$data['datetimereq'][1]);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_response_Confirm",$data);
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
	$this->load->model('insert_model');
	$RN = $this->input->post('wrk_ord');
	$wrk_ord_test = $this->insert_model->response_woexist('v_WrkOrdNo',$RN);

	redirect('contentcontroller/response?wrk_ord='.$RN. '&wo=1');	
	}

}
?>