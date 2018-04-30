<?php

class acg_modulesf_ctrl extends CI_Controller{
	
	function index(){
		$service_code = $this->input->post('n_base');
		$req_no = $this->input->post('req_no');
		$comp_no = $this->input->post('complaint_no');
		//$month = $this->input->post('fromMonth');
		//$year = $this->input->post('fromYear');
		//$reqdate = $this->input->post('req_date');
		$indicator_no = $this->input->post('indicator_no');
		//echo $this->input->post('fromMonth').'<br>'.$this->input->post('fromYear').'<br>'.$this->input->post('R_detail').'<br>'.$this->input->post('No_Request').'<br>'.$this->input->post('Dept');
		//exit();
		$this->load->model('insert_model');
		$this->insert_model->acgm_exist('v_ComplaintNo',$comp_no,'v_ServiceCode',$service_code,'v_requestno',$req_no,$indicator_no); //,'v_Month',$month,'v_Year',$year,$reqdate
		redirect('contentcontroller/acg_modulesf?tabIndex=1&n_base='.$service_code.'&fromMonth='.$this->input->post('fromMonth').'&fromYear='.$this->input->post('fromYear').'&R_detail='.$this->input->post('R_detail').'&No_Request='.$this->input->post('No_Request').'&Dept='.$this->input->post('Dept'));
    }
}
?>