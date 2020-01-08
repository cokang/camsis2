<?php
class Wo_chronology_update_ctrl extends CI_Controller{

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

		// load libraries for URL and form processing
	    $this->load->helper(array('form', 'url'));
	    // load library for form validation
	    $this->load->library('form_validation');
	//latest date compare function
	//echo "lalalalla : " . $this->input->post('wrk_ord');
	//exit();
	//if (substr($this->input->post('wrk_ord'),0,2) != 'PP'){

  $this->load->model('get_model');
  //if (substr($data['wrk_ord'],0,2) == 'PP'){
  $data['rc'] = $this->get_model->getrootcause();
	$data['wrk_ord'] = $this->input->post('wrk_ord');
	$data['movement'] = array('Workshop' => 'Workshop', 
                  			'Vendor' => 'Vendor',
                   			'Remain at user location'=> 'Remain at user location');

	$this->form_validation->set_rules('n_Type_of_Work','Root Cause','trim|required');
	$this->form_validation->set_rules('n_Action_Taken','Details Of Work Progress','trim|required');

	//$this->form_validation->set_rules('n_rschDate','Reschedule Date','trim');
	/*
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
	*/

			$this->load->view("head");
			$this->load->view("left");
			$this->load->view("Content_workorder_chronologyconfirm", $data);

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

		$latestvisit = $this->get_model->latestchronologyvisit($RN);

		$visit = $latestvisit[0]->n_Visit + 1;
		//print_r($latestvisit);
		//echo "masukxxcc ::::".$RN."::::::".$visit.$this->input->post('chkbox').$this->session->userdata('usersess').substr(substr($this->input->post('wrk_ord'),0,5),3,2);
	//exit();

	}

	$this->load->model('insert_model');

	//$wrk_ord_test = $this->insert_model->visitplus_woexist('v_WrkOrdNo',$RN,'n_Visit',$visit);
	$wrk_ord_test = $this->insert_model->chronology_woexist('v_WrkOrdNo',$RN,'n_Visit',$visit);

	redirect('contentcontroller/chronologyplus?wrk_ord='.$RN. '&wo=5');

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
