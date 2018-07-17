<?php
class wo_visitplus_update_ctrl extends CI_Controller{

	function __construct(){
     	parent::__construct();
		$this->is_logged_in();
	}

	function is_logged_in()
	{
		
		$is_logged_in = $this->session->userdata('v_UserName');
		
		if(!isset($is_logged_in) || $is_logged_in !=TRUE)
		redirect('logincontroller/index');
	}

	public function index(){
	//latest date compare function
	//echo "lalalalla : " . $this->input->post('wrk_ord');
	//exit();
	//if (substr($this->input->post('wrk_ord'),0,2) != 'PP'){	
	if ((substr($this->input->post('wrk_ord'),0,2) != 'PP') && (substr($this->input->post('wrk_ord'),0,2) != 'RI')) {	
	$this->load->model("get_model");
	$vis = $this->input->post('visit') == '' ? 0 : $this->input->post('visit');
	//echo "visssiiiiit".$this->input->post('visit');
	$datas['record'] = $this->get_model->get_wodatelate($this->input->post('wrk_ord'),$vis);
	$startdate = date_format(date_create($datas['record'][0]->latedt),'Y-m-d');
	$vdate = date_format(date_create($this->input->post('n_Visit_Date')),'Y-m-d');
	//echo "dater : ".$startdate.' : '.$vdate;
	$paramsdt = "{$startdate},{$vdate}";
	}
	
	$starttime = strtotime($this->input->post('n_Shour').':'.$this->input->post('n_Smin'));
	$endtime = strtotime($this->input->post('n_Ehour').':'.$this->input->post('n_Emin'));
	$params = "{$starttime},{$endtime}";
	// load libraries for URL and form processing
    $this->load->helper(array('form', 'url'));
    // load library for form validation
    $this->load->library('form_validation');
	
	//validation rule
	if ((substr($this->input->post('wrk_ord'),0,2) == 'PP') || (substr($this->input->post('wrk_ord'),0,2) == 'RI')) {	
	$this->form_validation->set_rules('n_Visit_Date','Visit Date','trim|required');
	} else {
	$this->form_validation->set_rules('n_Visit_Date','Visit Date','trim|required|callback_date_check['.$paramsdt.']');
	}
	$this->form_validation->set_rules('n_Shour','Start Hour','trim|required');
	$this->form_validation->set_rules('n_Smin','Start Minutes','trim|required');
	$this->form_validation->set_rules('n_Ehour','End Hour','trim|required');
	$this->form_validation->set_rules('n_Emin','End Minutes','trim|required|callback_time_check['.$params.']');
	$this->form_validation->set_rules('n_Type_of_Work','Type of Work','trim|required');
	$this->form_validation->set_rules('n_Action_Taken','Action Taken','trim|required');

	//$this->form_validation->set_rules('n_rschDate','Reschedule Date','trim');
	$this->form_validation->set_rules('n_rschDate','Reschedule Date','trim|callback_date_check2['.$this->input->post('n_rschDate').']');
	$this->form_validation->set_rules('n_rschReason','Reason','trim');
	$this->form_validation->set_rules('n_rschReason1','Reason1','trim');
	$this->form_validation->set_rules('n_rschAuth','Reschedule Authorised','trim');	

	$this->form_validation->set_rules('C_requestor1','Responder 1','trim|required');
	$this->form_validation->set_rules('V_requestor1','Responder 1','trim|required');
	$this->form_validation->set_rules('n_End_Time_h1','Responder1 Hour','trim|required');
	$this->form_validation->set_rules('n_End_Time_m1','Responder1 Minutes','trim|required');
	$this->form_validation->set_rules('V_rate1','Rate1','trim|required');
	$this->form_validation->set_rules('T_rate1','Total Rate1','trim|required');
/*
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
*/
	$this->form_validation->set_rules('chkbox','checkbox','trim');

	if ($this->input->post('chkbox') == 'ON') {
		$this->form_validation->set_rules('n_performance_test','Performance Test','trim|required');
		$this->form_validation->set_rules('n_safety_test','Safety Test','trim|required');
		$this->form_validation->set_rules('n_safety_result','Safety Result','trim');
		
		//if (substr($this->input->post('wrk_ord'),0,2) == 'PP'){	
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
		
		//if (substr($this->input->post('wrk_ord'),0,2) == 'PP'){		
		if ((substr($this->input->post('wrk_ord'),0,2) == 'PP') || (substr($this->input->post('wrk_ord'),0,2) == 'RI')) {
		$this->form_validation->set_rules('QC_PPM','QC PPM','trim|required');
		$this->form_validation->set_rules('n_QCUptime','QC Uptime','trim|required');
		}
		else{
		$this->form_validation->set_rules('QC_PPM','QC PPM','trim');
		$this->form_validation->set_rules('n_QCUptime','QC Uptime','trim');
		}

		//if (substr($this->input->post('wrk_ord'),0,2) == 'PP'){
		if ((substr($this->input->post('wrk_ord'),0,2) == 'PP') || (substr($this->input->post('wrk_ord'),0,2) == 'RI')) {
		$this->form_validation->set_rules('n_Accepted_By','Accepted By','trim|required');
		$this->form_validation->set_rules('n_Designation','Designation','trim|required');
		$this->form_validation->set_rules('n_Acceptance_Date','Acceptance Date','trim|required');
		$this->form_validation->set_rules('C_jrequestor1','Close By Code','trim|required');
		$this->form_validation->set_rules('V_jrequestor1','Close By Name','trim|required');
		}
		else{
		$this->form_validation->set_rules('n_Accepted_By','Accepted By','trim');
		$this->form_validation->set_rules('n_Designation','Designation','trim');
		$this->form_validation->set_rules('n_Acceptance_Date','Acceptance Date','trim');
		$this->form_validation->set_rules('C_jrequestor1','Close By Code','trim');
		$this->form_validation->set_rules('V_jrequestor1','Close By Name','trim');
		}
	}

	$RN = $this->input->post('wrk_ord');
		//if (substr($RN,0,2) == 'PP'){
		if ((substr($RN,0,2) == 'PP') || (substr($RN,0,2) == 'RI')) {	
			if($this->form_validation->run()==FALSE)
			{
			$data['wrk_ord'] = $this->input->get('wrk_ord');
			$data['visit'] = $this->input->get('visit');
			
			if ($this->input->post('chkbox') == 'ON') {
				$data['wrk_ord'] = $this->input->post('wrk_ord');
				$this->load->model("display_model");
				$data['recordv1'] = $this->display_model->visit1ppm_tab($data['wrk_ord']);
				//$data['Stimev1'] = explode(':',$data['recordv1'][0]->v_Time);
				$data['wrk_ord'] = $this->input->post('wrk_ord');
				$data['ppmrec'] = $this->display_model->woppm_disp($data['wrk_ord']);
				$data['ppmasset'] = $this->display_model->wo_ppm($data['wrk_ord']);
				$data['d_date'] = $data['ppmrec'][0]->d_StartDt;
				$data['duedate'] = date('Y-m-d',strtotime($data['ppmrec'][0]->d_DueDt));
			}

			$this ->load->view("head");
			$this ->load->view("left");
			$this ->load->view("Content_ppmvisitplusupdate",$data);
			}
			else
			{
			$data['wrk_ord'] = $this->input->post('wrk_ord');
			if ($this->input->post('chkbox') == 'ON') {
				
				$this->load->model("display_model");
				$data['ppmrec'] = $this->display_model->woppm_disp($data['wrk_ord']);
				$data['ppmasset'] = $this->display_model->wo_ppm($data['wrk_ord']);
				$data['d_date'] = $data['ppmrec'][0]->d_StartDt;
				$data['duedate'] = date('Y-m-d',strtotime($data['ppmrec'][0]->d_DueDt));	
			}

			$this ->load->view("head");
			$this ->load->view("left");
			$this ->load->view("Content_ppmvisitplusconfirm",$data);
			}
		}
		else{

			if($this->form_validation->run()==FALSE)
			{
			$data['wrk_ord'] = $this->input->post('wrk_ord');
			$data['visit'] = $this->input->post('visit');
			$this->load->model('display_model');
			//$data['recordresp'] = $this->display_model->response_tab($data['wrk_ord']);
			//$data['Stimeres'] = explode(':',$data['recordresp'][0]->v_Time);

			if ($this->input->post('chkbox') == 'ON') {
				$data['wrk_ord'] = $this->input->post('wrk_ord');
				$this->load->model("display_model");
				$data['recordv1'] = $this->display_model->visit1_tab($data['wrk_ord']);
				//$data['Stimev1'] = explode(':',$data['recordv1'][0]->v_Time);
				$data['wrk_ord'] = $this->input->post('wrk_ord');
				$data['disp'] = $this->display_model->list_display($data['wrk_ord']);
				$data['dispasset'] = $this->display_model->request_tab($data['wrk_ord']);
				$data['d_date'] = $data['disp'][0]->D_date;
				$data['d_time'] = $data['disp'][0]->D_time;
				$data['duedate'] = date('Y-m-d',strtotime("+13 day", strtotime($data['disp'][0]->D_date)));
			}

			$this ->load->view("head");
			$this ->load->view("left");
			$this ->load->view("Content_workorder_visitplusupdate",$data);
			}
			else
			{
			$data['wrk_ord'] = $this->input->post('wrk_ord');
			if ($this->input->post('chkbox') == 'ON') {
				
				$this->load->model("display_model");
				$data['disp'] = $this->display_model->list_display($data['wrk_ord']);
				$data['dispasset'] = $this->display_model->request_tab($data['wrk_ord']);
				$data['d_date'] = $data['disp'][0]->D_date;
				$data['d_time'] = $data['disp'][0]->D_time;
				$data['duedate'] = date('Y-m-d',strtotime("+13 day", strtotime($data['disp'][0]->D_date)));
			}

			$this ->load->view("head");
			$this ->load->view("left");
			$this ->load->view("Content_workorder_visitplusconfirm",$data);
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
	public function date_check($str = '', $params = '')
	{
		list($startdate,$enddate) = explode(',', $params);

		if ($enddate < $startdate)
		{
			$this->form_validation->set_message('date_check', 'Visit date cannot be lesser than WO Date/Last Visit Date');
			return FALSE;
		}
		else if ($enddate > date("Y-m-d"))
		{
			$this->form_validation->set_message('date_check', 'Visit date cannot exceed current date');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

public function date_check2($shedule = '')
{
if ($shedule) {
	     if ($shedule < date("d-m-Y"))
			 		{
					 $this->form_validation->set_message('date_check2','Reschedule date cannot be less than current date');
					 return FALSE;
					 }
					 else
					 {
					 return TRUE;
					 }
		}else
		{
			return TRUE;
		}
}
	
	function confirmation(){
	
	$RN = $this->input->post('wrk_ord');
	$visit = $this->input->post('visit');
	
	if ($visit == ''){
		$this->load->model('get_model');
		
		//if(substr($RN,0,2) == 'PP')	{
		if ((substr($RN,0,2) == 'PP') || (substr($RN,0,2) == 'RI'))	{
		$latestvisit = $this->get_model->latestppmvisit($RN);
		$visit = $latestvisit[0]->n_Visit + 1;
		}
		else{
		
		$latestvisit = $this->get_model->latestvisit($RN);
		
		$visit = $latestvisit[0]->n_Visit + 1;
		print_r($latestvisit);
		echo "masukxxcc ::::".$RN."::::::".$visit.$this->input->post('chkbox').$this->session->userdata('usersess').substr(substr($this->input->post('wrk_ord'),0,5),3,2);
	//exit();
		}
	}

	$this->load->model('insert_model');
	
	$wrk_ord_test = $this->insert_model->visitplus_woexist('v_WrkOrdNo',$RN,'n_Visit',$visit);
	if ($this->input->post('chkbox') == 'ON'){
					//$this->insert_model->job_woexist('v_WrkOrdNo',$variable);
					echo "nk closed";
					//exit();
					
		if (($this->session->userdata('usersess') == 'FES') && (substr(substr($this->input->post('wrk_ord'),0,5),3,2) == 'A4')) {
		echo "dpt nama : ".$RN.":".$this->input->post('n_Action_Taken');
		//exit();
		//$this->send_mail_frmout('nezam@advancepact.com',$RN,$this->input->post('n_Action_Taken'));
                }
		
		}
	
	if ((substr($RN,0,2) == 'PP') || (substr($RN,0,2) == 'RI')){
	redirect('contentcontroller/visitplus?wrk_ord='.$RN. '&vppm=4');
	}
	else{
	redirect('contentcontroller/visitplus?wrk_ord='.$RN. '&wo=5');
	}
}


		
		 public function send_mail_frmout($emailto, $wono="", $summary="") { 
         $from_email = "camsis@advancepact.com"; 
         //$to_email = $this->input->post('email'); 
         $to_email = $emailto; 
   
         //Load email library 
         $this->load->library('email'); 
   
         $this->email->from($from_email, 'CAMSIS System'); 
         $this->email->to($to_email);
         $this->email->subject('WO '.$wono.' was closed'); 
         $this->email->message('WO '.$wono.' have been closed. Summary '.$summary); 
   
         //Send mail 
         $this->email->send();
      } 

}
?>