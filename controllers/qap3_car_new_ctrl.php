<?php
class Qap3_car_new_ctrl extends CI_Controller{
	
	function index(){
	
	// load libraries for URL and form processing
    $this->load->helper(array('form', 'url'));
    // load library for form validation
    $this->load->library('form_validation');
	
	//validation rule
	$this->form_validation->set_rules('CARDate','CAR Date','trim|required');
	$this->form_validation->set_rules('CARDateFrom','From Date','trim|required');
	$this->form_validation->set_rules('CARDateTo','To Date','trim|required');
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
		//$data['record'] = $this->display_model->qap3_cardisp($data['ssiq'],$data['carid']);
		$data['recordsiq'] = $this->display_model->qap3_carsiqdisp($data['ssiq']);
		$data['recordind'] = $this->display_model->qap3_carinddisp();
		$data['recordqc'] = $this->display_model->qap3_carqcdisp();
		if(strlen($data['recordsiq'][0]->type_code) > 0){
		$data['recordasset'] = $this->display_model->qap3_assetcodedisp($data['recordsiq'][0]->type_code);	
		}
		$data['recordasset'] ? $data['assetcode'] = $data['recordasset'][0]->v_Equip_Code.' - '.$data['recordasset'][0]->v_Equip_Desc : $data['assetcode'] = '';
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_qap3_SIQ_number_Create",$data);
		}
		
		else
		{
		$this->load->model('display_model');
		$data['recordind'] = $this->display_model->qap3_carinddisp();
		$data['recordqc'] = $this->display_model->qap3_carqcdisp();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_qap3_SIQ_number_confirm",$data);
		}

	}
	function confirmation(){
error_reporting(E_ALL);
ini_set('display_errors', 1);
$ssiq = $this->input->post('ssiq');
	$m = $this->input->post('m');
	$y = $this->input->post('y');
	$siq = $this->input->post('siq');
	//create new CAR no
	$this->load->model('get_model');
	$data['newno'] = $this->get_model->qap3_newcarno2($ssiq,$m,$y);
    
	//print_r ($data['newno']);
	//exit();
if (!is_null($data['newno'])) {
		//$nextno = substr($data['newno'][0]->car_no,14,5) + 1;
		$nextno = ($data['newno'][0]->B) + 1;
	}
	else{
		$nextno = 1;
	}
	
	if ($m == 12){
		$carmonth = 01;
		$caryear = substr(($y + 1),2,2);
	}
	else{
		$carmonth = sprintf('%02d',($m));
		//$carmonth = sprintf('%02d',($m + 1));
		$caryear = substr($y,2,2);
	}
	


     $NewCARno = 'CAR/'.$this->session->userdata('hosp_code').'/'.$caryear.$carmonth.'/'.sprintf('%05d',($nextno));
	//$NewCARno = 'CAR/IIUM/'.$caryear.$carmonth.'/'.sprintf('%05d',($nextno));//for test


	$carheader_data = array(
						'company_code' => 'Pantai',
						'hosp_code' => $this->session->userdata('hosp_code'),
						//'hosp_code' => 'MKA',//for test
						'car_no' => $NewCARno,
						'car_level' => 'H',
						'car_date' => strlen($this->input->post('CARDate')) > 0 ? date('Y-m-d',strtotime($this->input->post('CARDate'))) : NULL,
						'car_from' => strlen($this->input->post('CARDateFrom')) > 0 ? date('Y-m-d',strtotime($this->input->post('CARDateFrom'))) : NULL,
						'car_to' => strlen($this->input->post('CARDateTo')) > 0 ? date('Y-m-d',strtotime($this->input->post('CARDateTo'))) : NULL,
						'siq_no' => $ssiq,
						'car_desc' => strlen($this->input->post('CARDesc')) > 0 ? $this->input->post('CARDesc') : NULL,
						'ind_code' => strlen($this->input->post('n_IndCode')) > 0 ? $this->input->post('n_IndCode') : NULL,
						'service' => 'BES',
						'qc_code' => strlen($this->input->post('n_QCcode')) > 0 ? $this->input->post('n_QCcode') : NULL,
						'root_cause' => strlen($this->input->post('n_RootCause')) > 0 ? $this->input->post('n_RootCause') : NULL,
						'priority' => strlen($this->input->post('n_priority')) > 0 ? $this->input->post('n_priority') : NULL,
						'status' => strlen($this->input->post('n_status')) > 0 ? $this->input->post('n_status') : NULL,
						'issuer' => strlen($this->input->post('n_issuer')) > 0 ? $this->input->post('n_issuer') : NULL,
						'resp_name' => strlen($this->input->post('n_respname')) > 0 ? $this->input->post('n_respname') : NULL,
						'veri_date' => strlen($this->input->post('n_veridate')) > 0 ? date('Y-m-d',strtotime($this->input->post('n_veridate'))) : NULL,
						'veri_name' => strlen($this->input->post('n_veriname')) > 0 ? $this->input->post('n_veriname') : NULL,
						'follow_car_no' => NULL,
						'remarks' => strlen($this->input->post('n_remarks')) > 0 ? $this->input->post('n_remarks') : NULL,
						'mis_user_id' => 'misuserid',
						'date_time_stamp' => date('Y-m-d'),
						'action_flag' => 'I'
						);

$insert_data = array(
					 'company_code' => 'Pantai',
					 'car_no' => $NewCARno,
					 'sl_no' => 1,
					 'action' => 'No action taken yet',
					 'start_date' => strlen($this->input->post('CARDateFrom')) > 0 ? date('Y-m-d',strtotime($this->input->post('CARDateFrom'))) : NULL,
					 'end_date' => strlen($this->input->post('CARDateTo')) > 0 ? date('Y-m-d',strtotime($this->input->post('CARDateTo'))) : NULL,
					 'done_date' => NULL,
					 'mis_user_id' => 'system',
					 'date_time_stamp' => date('Y-m-d'),
					 'action_flag' => 'I'
					 );
$this->load->model('insert_model');
	$this->insert_model->qap3_action_new($insert_data);
$this->insert_model->qap3_car_new($carheader_data);
	redirect('contentcontroller/qap3_SIQ_Number_update?ssiq='.$ssiq.'&m='.$m.'&y='.$y.'&siq='.$siq);
	
	
	
	}
	}
?>