<?php
class wo_jobclose_update_ctrl extends CI_Controller{
	
	public function index(){
		$RN = $this->input->post('wrk_ord');
	//if (substr($RN,0,2) != 'PP'){
	if ((substr($RN,0,2) != 'PP') && (substr($RN,0,2) != 'RI')) {
		$this->load->model("get_model");
	$datas['record'] = $this->get_model->get_wodatelate($this->input->post('wrk_ord'));
	$startdate = date_format(date_create($datas['record'][0]->latedt),'Y-m-d');
	$vdate = date_format(date_create($this->input->post('n_Visit_Date')),'Y-m-d');
	//echo "dater : ".$startdate.' : '.$vdate;
	$paramsdt = "{$startdate},{$vdate}";
	}
		
	// load libraries for URL and form processing
    $this->load->helper(array('form', 'url'));
    // load library for form validation
    $this->load->library('form_validation');
	
	//validation rule
	//$RN = $this->input->post('wrk_ord');
	if ((substr($RN,0,2) == 'PP') || (substr($RN,0,2) == 'RI')) {
	$this->form_validation->set_rules('n_job_Date','Job Close Date');
	} else {
	$this->form_validation->set_rules('n_job_Date','Job Close Date','trim|required|callback_date_check['.$paramsdt.']');
	}
	$this->form_validation->set_rules('n_JChour','Job Close Hour','trim|required');
	$this->form_validation->set_rules('n_JCmin','Job Close Minutes','trim|required');
	$this->form_validation->set_rules('n_jobclose_summary','Job Close Summary','trim|required');

	$this->form_validation->set_rules('n_performance_test','Performance Test','trim|required');
	$this->form_validation->set_rules('n_safety_test','Safety Test','trim|required');
	$this->form_validation->set_rules('n_safety_result','Safety Result','trim');
	
	if ((substr($this->input->post('wrk_ord'),0,2) == 'PP') || (substr($this->input->post('wrk_ord'),0,2) == 'RI')) {	
	$this->form_validation->set_rules('n_job_type','Job Type Code','trim|required');
	}
	else{
	$this->form_validation->set_rules('n_job_type','Job Type Code','trim');
	}

	$this->form_validation->set_rules('n_facility_code','Facility Code','trim');
	$this->form_validation->set_rules('n_failure_code','Failure Code','trim');

	$this->form_validation->set_rules('n_Stoppage','Stoppage','trim');
	$this->form_validation->set_rules('n_PFStartDate','Partially Functioning Start','trim');
	$this->form_validation->set_rules('n_PFStartHH','Partially Functioning StartH','trim');
	$this->form_validation->set_rules('n_PFStartNN','Partially Functioning StartM','trim');
	$this->form_validation->set_rules('n_PFEndDate','Partially Functioning End','trim');
	$this->form_validation->set_rules('n_PFEndHH','Partially Functioning EndH','trim');
	$this->form_validation->set_rules('n_PFEndNN','Partially Functioning EndM','trim');

	$this->form_validation->set_rules('down_time','Down Time','trim');
	$this->form_validation->set_rules('serv_time','Service Time','trim');
	$this->form_validation->set_rules('comp_time','Completion Time','trim');
	
	if ((substr($this->input->post('wrk_ord'),0,2) == 'PP') || (substr($this->input->post('wrk_ord'),0,2) == 'RI')) {		
	$this->form_validation->set_rules('QC_PPM','QC PPM','trim|required');
	$this->form_validation->set_rules('n_QCUptime','QC Uptime','trim|required');
	}
	else{
	$this->form_validation->set_rules('QC_PPM','QC PPM','trim');
	$this->form_validation->set_rules('n_QCUptime','QC Uptime','trim');
	}

	if ((substr($this->input->post('wrk_ord'),0,2) == 'PP') || (substr($this->input->post('wrk_ord'),0,2) == 'RI')) {
	$this->form_validation->set_rules('n_Accepted_By','Accepted By','trimrequired');
	$this->form_validation->set_rules('n_Designation','Designation','trimrequired');
	$this->form_validation->set_rules('n_Acceptance_Date','Acceptance Date','trimrequired');
	$this->form_validation->set_rules('C_requestor1','Close By Code','trimrequired');
	$this->form_validation->set_rules('V_requestor1','Close By Name','trimrequired');
	}
	else{
	$this->form_validation->set_rules('n_Accepted_By','Accepted By','trim');
	$this->form_validation->set_rules('n_Designation','Designation','trim');
	$this->form_validation->set_rules('n_Acceptance_Date','Acceptance Date','trim');
	$this->form_validation->set_rules('C_requestor1','Close By Code','trim');
	$this->form_validation->set_rules('V_requestor1','Close By Name','trim');
	}


	$RN = $this->input->post('wrk_ord');
	//PPM
	//if (substr($RN,0,2) == 'PP'){
	if ((substr($RN,0,2) == 'PP') || (substr($RN,0,2) == 'RI')) {
		if($this->form_validation->run()==FALSE)
		{
		$data['wrk_ord'] = $this->input->post('wrk_ord');
		$this->load->model("display_model");
		$data['recordv1'] = $this->display_model->visit1ppm_tab($data['wrk_ord']);
		$data['Stimev1'] = explode(':',$data['recordv1'][0]->v_Time);
		$data['wrk_ord'] = $this->input->post('wrk_ord');
		$data['ppmrec'] = $this->display_model->woppm_disp($data['wrk_ord']);
		$data['ppmasset'] = $this->display_model->wo_ppm($data['wrk_ord']);
		$data['d_date'] = $data['ppmrec'][0]->d_StartDt;
		$data['duedate'] = date('Y-m-d',strtotime($data['ppmrec'][0]->d_DueDt));
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_job_update",$data);
		}
		
		else
		{
		$data['wrk_ord'] = $this->input->post('wrk_ord');
		$this->load->model("display_model");
		$data['ppmrec'] = $this->display_model->woppm_disp($data['wrk_ord']);
		$data['ppmasset'] = $this->display_model->wo_ppm($data['wrk_ord']);
		$data['d_date'] = $data['ppmrec'][0]->d_StartDt;
		$data['duedate'] = date('Y-m-d',strtotime($data['ppmrec'][0]->d_DueDt));
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_job_confirm",$data);
		}
	}
	//RCM
	else{
		if($this->form_validation->run()==FALSE)
		{
		$data['wrk_ord'] = $this->input->post('wrk_ord');
		$this->load->model("display_model");
		$data['recordv1'] = $this->display_model->visit1_tab($data['wrk_ord']);
		$data['Stimev1'] = explode(':',$data['recordv1'][0]->v_Time);
		$data['wrk_ord'] = $this->input->post('wrk_ord');
		$data['disp'] = $this->display_model->list_display($data['wrk_ord']);
		$data['dispasset'] = $this->display_model->request_tab($data['wrk_ord']);
		$data['d_date'] = $data['disp'][0]->D_date;
		$data['d_time'] = $data['disp'][0]->D_time;
		$data['duedate'] = date('Y-m-d',strtotime("+13 day", strtotime($data['disp'][0]->D_date)));
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_jobclose_update",$data);
		}
		else
		{
		$data['wrk_ord'] = $this->input->post('wrk_ord');
		$this->load->model("display_model");
		$data['disp'] = $this->display_model->list_display($data['wrk_ord']);
		$data['dispasset'] = $this->display_model->request_tab($data['wrk_ord']);
		$data['d_date'] = $data['disp'][0]->D_date;
		$data['d_time'] = $data['disp'][0]->D_time;
		$data['duedate'] = date('Y-m-d',strtotime("+13 day", strtotime($data['disp'][0]->D_date)));
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_jobclose_Confirm",$data);
		}
	}	
//		
}

public function date_check($str = '', $params = '')
	{
		list($startdate,$enddate) = explode(',', $params);

		if ($enddate < $startdate)
		{
			$this->form_validation->set_message('date_check', 'Visit date is lesser than WO Date/Last Visit Date');
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
	$wrk_ord_test = $this->insert_model->job_woexist('v_WrkOrdNo',$RN);
	//if (substr($RN,0,2) == 'PP'){
	if ((substr($RN,0,2) == 'PP') || (substr($RN,0,2) == 'RI')) {
	redirect('contentcontroller/jobclose?wrk_ord='.$RN. '&vppm=6');
	}
	else{
	redirect('contentcontroller/jobclose?wrk_ord='.$RN. '&wo=7');
	}	
	}

}
?>