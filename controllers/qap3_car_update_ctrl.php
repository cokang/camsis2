<?php
class Qap3_car_update_ctrl extends CI_Controller{
	
	function index(){

	// load libraries for URL and form processing
    $this->load->helper(array('form', 'url'));
    // load library for form validation
    $this->load->library('form_validation');
	
	//validation rule
	$this->form_validation->set_rules('n_CARDate','CAR Date','trim|required');
	$this->form_validation->set_rules('n_CARFromDate','From Date','trim|required');
	$this->form_validation->set_rules('n_CARToDate','To Date','trim|required');
	$this->form_validation->set_rules('CARDesc','CAR Desc','trim');
	$this->form_validation->set_rules('n_IndCode','Indicator Code','trim');
	$this->form_validation->set_rules('n_QCcode','QC Code','trim');
	$this->form_validation->set_rules('n_RootCause','Root Cause','trim');
	$this->form_validation->set_rules('n_priority','Priority','trim');
	$this->form_validation->set_rules('n_status','Status','trim');
	$this->form_validation->set_rules('n_issuer','Issuer','trim');
	$this->form_validation->set_rules('n_respname','Responsible Name','trim');
	$this->form_validation->set_rules('n_veridate','Verify Date','trim');
	$this->form_validation->set_rules('n_veriname','Varify Name','trim');
	$this->form_validation->set_rules('n_remarks','Remarks','trim');

	if($this->form_validation->run()==FALSE)
		{
		$data['ssiq'] = $this->input->get('ssiq');
		$data['carid'] = $this->input->get('carid');
		$this->load->model('display_model');
		$data['record'] = $this->display_model->qap3_cardisp($data['ssiq'],$data['carid']);
		$data['recordsiq'] = $this->display_model->qap3_carsiqdisp($data['ssiq']);
		$data['recordind'] = $this->display_model->qap3_carinddisp();
		$data['recordqc'] = $this->display_model->qap3_carqcdisp();
		if(strlen($data['recordsiq'][0]->type_code) > 0){
		$data['recordasset'] = $this->display_model->qap3_assetcodedisp($data['recordsiq'][0]->type_code);	
		}
		!empty($data['recordasset']) ? $data['assetcode'] = $data['recordasset'][0]->v_Equip_Code.' - '.$data['recordasset'][0]->v_Equip_Desc : $data['assetcode'] = '';
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_qap3_car_edit",$data);
		}
		
		else
		{
		$this->load->model('display_model');
		$data['recordind'] = $this->display_model->qap3_carinddisp();
		$data['recordqc'] = $this->display_model->qap3_carqcdisp();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_qap3_car_confirm",$data);
		}

	}
	function confirmation(){
	$ssiq = $this->input->post('ssiq');
	$carid = $this->input->post('carid');
	$m = $this->input->post('m');
	$y = $this->input->post('y');
	$car = $this->input->post('car');
	$this->load->model('update_model');
	$insert_data = array(
						'car_date' => strlen($this->input->post('n_CARDate')) > 0 ? date('Y-m-d',strtotime($this->input->post('n_CARDate'))) : NULL,
						'car_from' => strlen($this->input->post('n_CARFromDate')) > 0 ? date('Y-m-d',strtotime($this->input->post('n_CARFromDate'))) : NULL,
						'car_to' => strlen($this->input->post('n_CARToDate')) > 0 ? date('Y-m-d',strtotime($this->input->post('n_CARToDate'))) : NULL,
						'car_desc' => strlen($this->input->post('CARDesc')) > 0 ? $this->input->post('CARDesc') : NULL,
						'ind_code' => strlen($this->input->post('n_IndCode')) > 0 ? $this->input->post('n_IndCode') : NULL,
						'qc_code' => strlen($this->input->post('n_QCcode')) > 0 ? $this->input->post('n_QCcode') : NULL,
						'root_cause' => strlen($this->input->post('n_RootCause')) > 0 ? $this->input->post('n_RootCause') : NULL,
						'priority' => strlen($this->input->post('n_priority')) > 0 ? $this->input->post('n_priority') : NULL,
						'status' => strlen($this->input->post('n_status')) > 0 ? $this->input->post('n_status') : NULL,
						'issuer' => strlen($this->input->post('n_issuer')) > 0 ? $this->input->post('n_issuer') : NULL,
						'resp_name' => strlen($this->input->post('n_respname')) > 0 ? $this->input->post('n_respname') : NULL,
						'veri_date' => strlen($this->input->post('n_veridate')) > 0 ? date('Y-m-d',strtotime($this->input->post('n_veridate'))) : NULL,
						'veri_name' => strlen($this->input->post('n_veriname')) > 0 ? $this->input->post('n_veriname') : NULL,
						'remarks' => strlen($this->input->post('n_remarks')) > 0 ? $this->input->post('n_remarks') : NULL,
						'date_time_stamp' => date('Y-m-d'),
						);

	$this->update_model->qap3_car_update($ssiq,$carid,$insert_data);
	redirect('contentcontroller/qap3_car?ssiq='.$ssiq.'&carid='.$carid.'&m='.$m.'&y='.$y.'&car='.$car);	
	}

}
?>