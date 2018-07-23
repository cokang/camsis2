<?php
class Dcap_planner_sch_ctrl extends CI_Controller{

function index(){
	$colorcode = $this->input->get('c');
	$time = $this->input->get('cell');
	$dept = $this->input->get('dept');
	$loc = $this->input->get('loc');
	$job = $this->input->get('job');
	$monthyear = $this->input->get('my');
	$jobdate = $this->input->get('date');
//echo 'c: '.$colorcode.'<br>t: '.$time.'<br>d: '.$dept.'<br>l: '.$loc.'<br>j: '.$job.'<br>m: '.$monthyear.'<br>jd: '.$jobdate;
//exit();

	$this->load->model('insert_model');
	$this->insert_model->dcap_exist('Job_Items',$job,'Time',$time,'Dept_Code',$dept,'Loc_Code',$loc,$colorcode,'Month_Year',$monthyear,'hospital_code',$this->session->userdata('hosp_code'),'Job_Date',$jobdate);
	//exit();
}

}
?>