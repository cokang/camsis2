<?php
class wo_visit_update_ctrl extends CI_Controller{

	public function index(){
	$starttime = strtotime($this->input->post('n_Shour').':'.$this->input->post('n_Smin'));
	$endtime = strtotime($this->input->post('n_Ehour').':'.$this->input->post('n_Emin'));
	$params = "{$starttime},{$endtime}";
	// load libraries for URL and form processing
    $this->load->helper(array('form', 'url'));
    // load library for form validation
    $this->load->library('form_validation');
	
	//validation rule
	$this->form_validation->set_rules('n_Visit_Date','Visit Date','trim|required');
	$this->form_validation->set_rules('n_Shour','Start Hour','trim|required');
	$this->form_validation->set_rules('n_Smin','Start Minutes','trim|required');
	$this->form_validation->set_rules('n_Ehour','End Hour','trim|required');
	$this->form_validation->set_rules('n_Emin','End Minutes','trim|required|callback_time_check['.$params.']');
	$this->form_validation->set_rules('n_Type_of_Work','Type of Work','trim|required');
	$this->form_validation->set_rules('n_Action_Taken','Action Taken','trim|required');

	$this->form_validation->set_rules('n_rschDate','Reschedule Date','trim');
	$this->form_validation->set_rules('n_rschReason','Reason','trim');
	$this->form_validation->set_rules('n_rschReason1','Reason1','trim');
	$this->form_validation->set_rules('n_rschAuth','Reschedule Authorised','trim');	

	$this->form_validation->set_rules('C_requestor1','Responder 1','trim|required');
	$this->form_validation->set_rules('V_requestor1','Responder 1','trim|required');
	$this->form_validation->set_rules('n_End_Time_h1','Responder1 Hour','trim|required');
	$this->form_validation->set_rules('n_End_Time_m1','Responder1 Minutes','trim|required');
	$this->form_validation->set_rules('V_rate1','Rate1','trim|required');
	$this->form_validation->set_rules('T_rate1','Total Rate1','trim|required');

	if (substr($this->input->post('wrk_ord'),0,2) == 'PP'){
	$this->form_validation->set_rules('C_requestor2','Responder 2','trim|required');
	$this->form_validation->set_rules('V_requestor2','Responder 2','trim|required');
	$this->form_validation->set_rules('n_End_Time_h2','Responder2 Hour','trim|required');
	$this->form_validation->set_rules('n_End_Time_m2','Responder2 Minutes','trim|required');
	$this->form_validation->set_rules('V_rate2','Rate2','trim|required');
	$this->form_validation->set_rules('T_rate2','Total Rate2','trim|required');
	}
	else{
	$this->form_validation->set_rules('C_requestor2','Responder 2','trim');
	$this->form_validation->set_rules('V_requestor2','Responder 2','trim');
	$this->form_validation->set_rules('n_End_Time_h2','Responder2 Hour','trim');
	$this->form_validation->set_rules('n_End_Time_m2','Responder2 Minutes','trim');
	$this->form_validation->set_rules('V_rate2','Rate2','trim');
	$this->form_validation->set_rules('T_rate2','Total Rate2','trim');
	}

	if (substr($this->input->post('wrk_ord'),0,2) == 'PP'){
	$this->form_validation->set_rules('C_requestor3','Responder 3','trim|required');
	$this->form_validation->set_rules('V_requestor3','Responder 3','trim|required');
	$this->form_validation->set_rules('n_End_Time_h3','Responder3 Hour','trim|required');
	$this->form_validation->set_rules('n_End_Time_m3','Responder3 Minutes','trim|required');
	$this->form_validation->set_rules('V_rate3','Rate3','trim|required');
	$this->form_validation->set_rules('T_rate3','Total Rate3','trim|required');
	}
	else{
	$this->form_validation->set_rules('C_requestor3','Responder 3','trim');
	$this->form_validation->set_rules('V_requestor3','Responder 3','trim');
	$this->form_validation->set_rules('n_End_Time_h3','Responder3 Hour','trim');
	$this->form_validation->set_rules('n_End_Time_m3','Responder3 Minutes','trim');
	$this->form_validation->set_rules('V_rate3','Rate3','trim');
	$this->form_validation->set_rules('T_rate3','Total Rate3','trim');
	}

	if (substr($this->input->post('wrk_ord'),0,2) == 'PP'){
	$this->form_validation->set_rules('V_part','Part Name','trim|required');
	$this->form_validation->set_rules('V_partRM','Part RM','trim|required');
	$this->form_validation->set_rules('V_partRate','Part Rate','trim|required');
	$this->form_validation->set_rules('V_parttotal','Part Total','trim|required');
	$this->form_validation->set_rules('C_Vendor','Vendor Parts','trim|required');
	$this->form_validation->set_rules('V_Vendor','Vendor Name','trim|required');
	}
	else{
	$this->form_validation->set_rules('V_part','Part Name','trim');
	$this->form_validation->set_rules('V_partRM','Part RM','trim');
	$this->form_validation->set_rules('V_partRate','Part Rate','trim');
	$this->form_validation->set_rules('V_parttotal','Part Total','trim');
	$this->form_validation->set_rules('C_Vendor','Vendor Parts','trim');
	$this->form_validation->set_rules('V_Vendor','Vendor Name','trim');
	}

	$RN = $this->input->post('wrk_ord');
	//PPM
	if (substr($RN,0,2) == 'PP'){
		if($this->form_validation->run()==FALSE)
		{
		if ($this->input->post('vppm') == 1 ){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_v1_update");
		}
		else if ($this->input->post('vppm') == 2){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_v2_update");
		}
		else if ($this->input->post('vppm') == 3){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_v3_update");
		}		
	}
		else
		{
		if ($this->input->post('vppm') == 1 ){
		$this ->load->view("head");
		$this ->load->view("left_workorder");
		$this ->load->view("Content_v1_confirm");
		}
		else if ($this->input->post('vppm') == 2){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_v2_confirm");
		}
		else if ($this->input->post('vppm') == 3){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_v3_confirm");
		}		
		}
	}
	//RCM
	else{
		if($this->form_validation->run()==FALSE)
		{
		$data['wrk_ord'] = $this->input->post('wrk_ord');
		if ($this->input->post('wo') == 2 ){
		$this->load->model('display_model');
		$data['recordresp'] = $this->display_model->response_tab($data['wrk_ord']);
		$data['Stimeres'] = explode(':',$data['recordresp'][0]->v_Time);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_VisitOne_update",$data);
		}
		else if ($this->input->post('wo') == 3){
		$this->load->model('display_model');
		$data['recordresp'] = $this->display_model->response_tab($data['wrk_ord']);
		$data['Stimeres'] = explode(':',$data['recordresp'][0]->v_Time);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_Visittwo_update",$data);
		}
		else if ($this->input->post('wo') == 4){
		$this->load->model('display_model');
		$data['recordresp'] = $this->display_model->response_tab($data['wrk_ord']);
		$data['Stimeres'] = explode(':',$data['recordresp'][0]->v_Time);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_Visitthree_update",$data);
		}		
	}
		else
		{
		if ($this->input->post('wo') == 2 ){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_VisitOne_Confirm");
		}
		else if ($this->input->post('wo') == 3){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_Visittwo_Confirm");
		}
		else if ($this->input->post('wo') == 4){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_Visitthree_Confirm");
		}		
		}
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
	$RN = $this->input->post('wrk_ord');
	if (substr($RN,0,2) == 'PP'){
		if ($this->input->post('vppm') == 1 ){
			$this->load->model('insert_model');
			$RN = $this->input->post('wrk_ord');
			$wrk_ord_test = $this->insert_model->visit1_woexist('v_WrkOrdNo',$RN);

			redirect('contentcontroller/visitone?wrk_ord='.$RN. '&vppm=1');
		}
		else if ($this->input->post('vppm') == 2){
			$this->load->model('insert_model');
			$RN = $this->input->post('wrk_ord');
			$wrk_ord_test = $this->insert_model->visit2_woexist('v_WrkOrdNo',$RN);

			redirect('contentcontroller/visittwo?wrk_ord='.$RN. '&vppm=2');
		}
		else if ($this->input->post('vppm') == 3){
			$this->load->model('insert_model');
			$RN = $this->input->post('wrk_ord');
			$wrk_ord_test = $this->insert_model->visit3_woexist('v_WrkOrdNo',$RN);

			redirect('contentcontroller/visitthree?wrk_ord='.$RN. '&vppm=3');
		}
	}
	else{
		if ($this->input->post('wo') == 2 ){
			$this->load->model('insert_model');
			$RN = $this->input->post('wrk_ord');
			$wrk_ord_test = $this->insert_model->visit1_woexist('v_WrkOrdNo',$RN);

			redirect('contentcontroller/visitone?wrk_ord='.$RN. '&wo=2');
		}
		else if ($this->input->post('wo') == 3){
			$this->load->model('insert_model');
			$RN = $this->input->post('wrk_ord');
			$wrk_ord_test = $this->insert_model->visit2_woexist('v_WrkOrdNo',$RN);

			redirect('contentcontroller/visittwo?wrk_ord='.$RN. '&wo=3');
		}
		else if ($this->input->post('wo') == 4){
			$this->load->model('insert_model');
			$RN = $this->input->post('wrk_ord');
			$wrk_ord_test = $this->insert_model->visit3_woexist('v_WrkOrdNo',$RN);

			redirect('contentcontroller/visitthree?wrk_ord='.$RN. '&wo=4');
		}		
	}
}

}
?>