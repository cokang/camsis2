<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajaxloc extends CI_Controller {
	public function index(){
		$this->load->model("get_model");
		$data['loc'] = $this->get_model->get_poploclistax($this->input->get('dpt'));
		$data['privilege'] = $this->get_model->dailycleanpriv($this->session->userdata('v_UserName'));
		echo '<table class="ui-content-middle-menu-workorder3" width="100%" id="no-more-tables"> <tr class="ui-menu-color-header" style="color:white; font-weight:bold;"><th>No</th><th width="50px">Location Code</th><th width="200px">Location Name</th><th >Related Forms</th><th width="100px">Schduler</th></tr>';
		$i = 1;
		foreach ($data['loc'] as $row){
		 if ($this->input->get('dpt') == $row->v_UserDeptCode ){
			echo "<tr style='color:black; font-size:12px;' align='center'>";
			echo '<td data-title="No :">'.$i++.'</td>';
			echo '<td data-title="Location Code :">'.$row->V_location_code.'</td>';
			echo '<td data-title="Location Name :">'.$row->v_Location_Name.'</td>';
			echo '<td data-title="Related Forms :" align="left" style="padding-left:10px;">';
			echo '<a href="schedule_p_work?dept='.$row->v_UserDeptCode.'&loc='.$row->V_location_code.'">Schedule Periodic Work</a><br>';
				foreach ($data['privilege'] as $list) {
				if ( $list->user_priv == 'UPDATE'){
				echo '<a href="../hks_sch_planner?dept='.$row->v_UserDeptCode.'&loc='.$row->V_location_code.'">Daily Cleaning Activity</a><br>';
				}
				if ( $list->user_priv == 'SET'){
				echo '<a href="../dailyclean_planner?dept='.$row->v_UserDeptCode.'&loc='.$row->V_location_code.'">Daily Cleansing Activities Planner</a><br>';
				}
				}
			echo '<td data-title="Schduler :" align="left" style="padding-left:10px;">';
			echo '<a href="" onclick="Schduler(this)" id="test" value="'.$row->v_UserDeptCode.'-'.$row->V_location_code.'">Set Scheduler</a>';
			echo '</td></tr>';
			}
		}
		echo '</table>';
	}
}