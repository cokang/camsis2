<?php
class Monthlyplanner_sch_ctrl extends CI_Controller{

function index(){
	$task = $this->input->get('task');
	$dept = $this->input->get('dept');
	$date = $this->input->get('date');
	$user = $this->input->get('user');
	$monthyear = $this->input->get('my');
	$color = $this->input->get('color');
	$time = $this->input->get('cell');
//echo $task.'<br>'.$time.'<br>'.$dept.'<br>'.$date.'<br>'.$user.'<br>'.$monthyear.'<br>'.$color;
//exit();
	$this->load->model('insert_model');
	$this->insert_model->monp_exist('Dept_Code',$dept,'Date',$date,$task,'Month_Year',$monthyear,$user,$time,$color);
	//exit();
}

}
?>