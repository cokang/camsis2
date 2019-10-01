<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dca_planner_sch_ctrl extends CI_Controller{

function __construct(){
	     	parent::__construct();
	//echo 'ade1';
			$this->load->model('loginModel','',TRUE);
	//echo 'ade2';
			$this->load->model('insert_model');
	                //$this->load->model('test_ler');
	//echo 'ade3';
			$this->load->library('session');
	//echo 'ade4';	
			$this->is_logged_in();
	//echo 'ade5';
		
		
	}
	
	function is_logged_in()
	{
		
		$is_logged_in = $this->session->userdata('v_UserName');
		
		if(!isset($is_logged_in) || $is_logged_in !=TRUE)
		redirect('loginController/index');
	}


function index(){
	$colorcode = $this->input->get('c');
	$shift = $this->input->get('cell');
	$dept = $this->input->get('dept');
	$loc = $this->input->get('loc');
	$job = $this->input->get('job');
	$monthyear = $this->input->get('my');
//exit();
	$this->load->model('insert_model');
	$this->insert_model->dca_exist('Job_Items',$job,'Shift',$shift,'Dept_Code',$dept,'Loc_Code',$loc,$colorcode,'Month_Year',$monthyear);
	//exit();
}
function update_hks(){
	$colorcode = $this->input->get('c');
	$shift = $this->input->get('cell');
	$dept = $this->input->get('dept');
	$loc = $this->input->get('loc');
	$job = $this->input->get('job');
	$monthyear = $this->input->get('my');
	$jobdate = $this->input->get('date');
//echo 'c: '.$colorcode.'<br>s: '.$shift.'<br>d: '.$dept.'<br>l: '.$loc.'<br>j: '.$job.'<br>m: '.$monthyear.'<br>jd: '.$jobdate;
//exit();
	$this->load->model('insert_model');
	$this->insert_model->udca_exist('Job_Items',$job,'Shift',$shift,'Dept_Code',$dept,'Loc_Code',$loc,$colorcode,'Month_Year',$monthyear,'hospital_code',$this->session->userdata('hosp_code'),'Job_Date',$jobdate);
}
function set_jic(){
	$numcode = $this->input->get('numcode');
	$column = $this->input->get('cell');
	$dept = $this->input->get('dept');
	$loc = $this->input->get('loc');
	$job = $this->input->get('job');
	$monthyear = $this->input->get('my');
	//$jobdate = $this->input->get('date');
	$week = $this->input->get('week');
	if ($week == 'W1'){
		$jobdate = date("Y-m-d",strtotime(substr($monthyear,2,4).'-'.substr($monthyear,0,2).'-10'));
	}
	else{
		$jobdate = date("Y-m-d",strtotime(substr($monthyear,2,4).'-'.substr($monthyear,0,2).'-20'));
	}
//echo 'NC: '.$numcode.'<br>'.'C: '.$column.'<br>'.'D: '.$dept.'<br>'.'L: '.$loc.'<br>'.'J: '.$job.'<br>'.'MY: '.$monthyear.'<br>jd: '.$jobdate.'<br>w: '.$week.'<br>';
	$jino = 'JI/'.$dept.'/'.$week.'/'.substr($monthyear,0,2).'/'.substr($monthyear,4,2);
	//echo $jino;
//exit();
	$this->load->model('insert_model');
	$this->insert_model->jic_exist('Job_Items',$job,'Dept_Code',$dept,'Loc_Code',$loc,$numcode,'Month_Year',$monthyear,'Job_Date',$jobdate,'ji_no',$jino); //'U'
}
}
?>