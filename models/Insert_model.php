<?php
class Insert_model extends CI_Model{
function __construct() {
parent::__construct();
}

function create_form($insert_data){

$this->db->insert('pmis2_egm_service_request', $insert_data);

//echo $this->db->last_query();

		//exit();
}


function ins_complaint($insert_data){

$this->db->insert('pmis2_com_complaint', $insert_data);

echo $this->db->last_query();

		exit();
}


function ins_assetreg($insert_data){

$this->db->insert('pmis2_egm_assetregistration', $insert_data);

//echo $this->db->last_query();

		//exit();
}

function ins_assetreggen($insert_data){

$this->db->insert('pmis2_egm_assetreg_general', $insert_data);

//echo $this->db->last_query();

		//exit();
}

function ins_assetmaintainance($insert_data){

$this->db->insert('pmis2_egm_assetmaintenance', $insert_data);

//echo $this->db->last_query();

		//exit();
}

function ins_vo($insert_data){

$this->db->insert('ap_vo_vvfdetails', $insert_data);

//echo $this->db->last_query();

		//exit();
}

function ins_schcon($insert_data){

$this->db->insert('pmis2_egm_schconfirmmon', $insert_data);

//echo $this->db->last_query();

		//exit();
}

function ins_assetaccesories($insert_data){

$this->db->insert('pmis2_egm_accesories', $insert_data);

//echo $this->db->last_query();

		//exit();
}

function pmis2_egm_lnc_lincense_details($insert_data){

$this->db->insert('pmis2_egm_lnc_lincense_details', $insert_data);
$id = $this->db->insert_id();
return $id;
//echo $this->db->last_query();

		//exit();
}

function pmis2_egm_statutory($insert_data){
$this->db->insert('pmis2_egm_statutory', $insert_data);
}
//function view_confirm(){
//$query = $this->db->get('pmis2_egm_service_request');
//$query_result = $query->result();
//return $query_result;
//}
function pmis2_egm_assetjobtype($insert_data){

$this->db->insert('pmis2_egm_assetjobtype', $insert_data);

//echo $this->db->last_query();

		//exit();
}
function response_form($insert_data){

$this->db->insert('pmis2_emg_jobresponse', $insert_data);

//echo $this->db->last_query();

		//exit();
}

function response_woexist($value,$variable){
			$this->db->select($value);
			$this->db->where($value,$variable);

			$query = $this->db->get('pmis2_emg_jobresponse');

			if($query->num_rows()>0){
				$this->load->model('update_model');

				$insert_data = array(
						 'd_Date' => ($this->input->post('n_Response_Date')) ? date('Y-m-d ', strtotime($this->input->post('n_Response_Date'))).$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT) : NULL,
						 'v_Time'=>$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT),
						 'v_Etime'=>$this->input->post('n_Ehour').':'.str_pad($this->input->post('n_Emin'), 2, 0, STR_PAD_LEFT),
						 'v_ActionTaken' => $this->input->post('n_Action_Taken'),
						 'v_Personal1' => $this->input->post('C_requestor1').'-'.$this->input->post('V_requestor1'),
						 'n_Hours1'=>$this->input->post('n_End_Time_h1').':'.str_pad($this->input->post('n_End_Time_m1'), 2, 0, STR_PAD_LEFT),
						 'n_Rate1' => $this->input->post('V_rate1'),
						 'n_Total1' => $this->input->post('T_rate1'),
						 'v_Personal2' => $this->input->post('C_requestor2').'-'.$this->input->post('V_requestor2'),
						 'n_Hours2'=>$this->input->post('n_End_Time_h2').':'.str_pad($this->input->post('n_End_Time_m2'), 2, 0, STR_PAD_LEFT),
						 'n_Rate2' => $this->input->post('V_rate2'),
						 'n_Total2' => $this->input->post('T_rate2'),
						 'v_Personal3' => $this->input->post('C_requestor3').'-'.$this->input->post('V_requestor3'),
						 'n_Hours3'=>$this->input->post('n_End_Time_h3').':'.str_pad($this->input->post('n_End_Time_m3'), 2, 0, STR_PAD_LEFT),
						 'n_Rate3' => $this->input->post('V_rate3'),
						 'n_Total3' => $this->input->post('T_rate3'),
						 'v_Vendor1' => $this->input->post('C_Vendor').'-'.$this->input->post('V_Vendor'),
						 'n_vHours' => $this->input->post('V_reqRM'),
						 'n_vRate' => $this->input->post('V_reqRate'),
						 'n_vTotal' => $this->input->post('V_reqtotal'),
						 //'v_ReschAuthBy' => ($this->input->post('username')) ? $this->input->post('username') : NULL
						 'v_ReschAuthBy' => ($this->input->post('name')) ? $this->input->post('name') : NULL
						);
				$this->update_model->response_form($insert_data);

				$this->load->model('update_model');
				$RN = $this->input->post('wrk_ord');
				$insert_data = array(
						'V_request_status' => "BO",
						'v_respondate' => date('Y-m-d ', strtotime($this->input->post('n_Response_Date'))).$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT),
						'v_respontime'=>$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT),
					);
				$this->update_model->create_form($insert_data);
			}
			else{
				//$this->load->model('insert_model');
				$RN = $this->input->post('wrk_ord');
				$insert_data = array(
						 'v_WrkOrdNo'=> $RN,
						 'd_Date' => ($this->input->post('n_Response_Date')) ? date('Y-m-d ', strtotime($this->input->post('n_Response_Date'))).$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT) : NULL,
						 'v_Time'=>$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT),
						 'v_Etime'=>$this->input->post('n_Ehour').':'.str_pad($this->input->post('n_Emin'), 2, 0, STR_PAD_LEFT),
						 'v_ActionTaken' => $this->input->post('n_Action_Taken'),
						 'v_Personal1' => $this->input->post('C_requestor1').'-'.$this->input->post('V_requestor1'),
						 'n_Hours1'=>$this->input->post('n_End_Time_h1').':'.str_pad($this->input->post('n_End_Time_m1'), 2, 0, STR_PAD_LEFT),
						 'n_Rate1' => $this->input->post('V_rate1'),
						 'n_Total1' => $this->input->post('T_rate1'),
						 'v_Personal2' => $this->input->post('C_requestor2').'-'.$this->input->post('V_requestor2'),
						 'n_Hours2'=>$this->input->post('n_End_Time_h2').':'.str_pad($this->input->post('n_End_Time_m2'), 2, 0, STR_PAD_LEFT),
						 'n_Rate2' => $this->input->post('V_rate2'),
						 'n_Total2' => $this->input->post('T_rate2'),
						 'v_Personal3' => $this->input->post('C_requestor3').'-'.$this->input->post('V_requestor3'),
						 'n_Hours3'=>$this->input->post('n_End_Time_h3').':'.str_pad($this->input->post('n_End_Time_m3'), 2, 0, STR_PAD_LEFT),
						 'n_Rate3' => $this->input->post('V_rate3'),
						 'n_Total3' => $this->input->post('T_rate3'),
						 'v_Vendor1' => $this->input->post('C_Vendor').'-'.$this->input->post('V_Vendor'),
						 'n_vHours' => $this->input->post('V_reqRM'),
						 'n_vRate' => $this->input->post('V_reqRate'),
						 'n_vTotal' => $this->input->post('V_reqtotal'),
						 //'v_ReschAuthBy' => ($this->input->post('username')) ? $this->input->post('username') : NULL
						 'v_ReschAuthBy' => ($this->input->post('name')) ? $this->input->post('name') : NULL
						);
				$this->insert_model->response_form($insert_data);

				$this->load->model('update_model');
				$RN = $this->input->post('wrk_ord');
				$insert_data = array(
						'V_request_status' => "BO",
						'v_respondate' => date('Y-m-d ', strtotime($this->input->post('n_Response_Date'))).$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT),
						'v_respontime'=>$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT),
					);
				$this->update_model->create_form($insert_data);
			}
		}
function visit1_form($insert_data){

$this->db->insert('pmis2_emg_jobvisit1', $insert_data);

//echo $this->db->last_query();
//exit();
}
function visitTOW_form($insert_data){

$this->db->insert('pmis2_emg_jobvisit1tow', $insert_data);

//echo $this->db->last_query();
//exit();
}

function visit1_woexist($value,$variable){
			$this->db->select($value);
			$this->db->where($value,$variable);
			$this->db->where('v_HospitalCode',$this->session->userdata('hosp_code'));

			$query1 = $this->db->get('pmis2_emg_jobvisit1');
			$query2 = $this->db->get('pmis2_emg_jobvisit1tow');


			if($query1->num_rows()>0 && $query2->num_rows()>0){

				$this->load->model('update_model');

				$insert_data = array(
						 'd_Date' => ($this->input->post('n_Visit_Date')) ? date('Y-m-d ', strtotime($this->input->post('n_Visit_Date'))).$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT) : NULL,
						 'v_Time'=>$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT),
						 'v_Etime'=>$this->input->post('n_Ehour').':'.str_pad($this->input->post('n_Emin'), 2, 0, STR_PAD_LEFT),
						 'v_ActionTaken' => $this->input->post('n_Action_Taken'),
						 'v_Personal1' => $this->input->post('C_requestor1').'-'.$this->input->post('V_requestor1'),
						 'n_Hours1'=>$this->input->post('n_End_Time_h1').':'.str_pad($this->input->post('n_End_Time_m1'), 2, 0, STR_PAD_LEFT),
						 'n_Rate1' => $this->input->post('V_rate1'),
						 'n_Total1' => $this->input->post('T_rate1'),
						 'v_Personal2' => $this->input->post('C_requestor2').'-'.$this->input->post('V_requestor2'),
						 'n_Hours2'=>$this->input->post('n_End_Time_h2').':'.str_pad($this->input->post('n_End_Time_m2'), 2, 0, STR_PAD_LEFT),
						 'n_Rate2' => $this->input->post('V_rate2'),
						 'n_Total2' => $this->input->post('T_rate2'),
						 'v_Personal3' => $this->input->post('C_requestor3').'-'.$this->input->post('V_requestor3'),
						 'n_Hours3'=>$this->input->post('n_End_Time_h3').':'.str_pad($this->input->post('n_End_Time_m3'), 2, 0, STR_PAD_LEFT),
						 'n_Rate3' => $this->input->post('V_rate3'),
						 'n_Total3' => $this->input->post('T_rate3'),
						 'v_Vendor1' => $this->input->post('C_Vendor').'-'.$this->input->post('V_Vendor'),
						 'n_vHours' => $this->input->post('V_reqRM'),
						 'v_PartName' => $this->input->post('V_part'),
						 'n_PartRM' => $this->input->post('V_partRM'),
						 'n_PartAmount' => 1,
						 'n_PartTotal' => $this->input->post('V_parttotal'),
						 'd_Reschdt' => ($this->input->post('n_rschDate')) ? date('Y-m-d', strtotime($this->input->post('n_rschDate'))) : NULL,
						 'v_ReschReason' => $this->input->post('n_rschReason').':'.$this->input->post('n_rschReason1'),
						 'v_ReschAuthBy' => $this->input->post('n_rschAuth'),
						);
				$this->update_model->visit1_form($insert_data);

				$TOWdata = array(
						'type_of_work' => $this->input->post('n_Type_of_Work')
				);
				$this->update_model->visitTOW_form($TOWdata);

				$RN = $this->input->post('wrk_ord');
				if (substr($RN,0,2) == 'PP'){
				$this->load->model('display_model');
				$data['v1rsch'] = $this->display_model->visit1ppm_tab($RN);
				$this->load->model('update_model');
				//if (isset($data['v1rsch'][0]->d_Date)) {
				//$insert_data = array(
				//		'd_StartDt' => date('Y-m-d ', strtotime($this->input->post('n_Visit_Date'))).$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT),
				//	);
				//$this->update_model->pmis2_egm_schconfirmmon($insert_data);
				//}
				if (isset($data['v1rsch'][0]->d_Reschdt)) {
				$insert_data = array(
						'v_Wrkordstatus' => "AR",
						'd_Reschdt' => date('Y-m-d', strtotime($this->input->post('n_rschDate'))),
					);
				$this->update_model->pmis2_egm_schconfirmmon($insert_data);
				}
				else{
				$insert_data = array(
						'v_Wrkordstatus' => "A",
						'd_Reschdt' => NULL,
					);
				$this->update_model->pmis2_egm_schconfirmmon($insert_data);
				}
			}
			}
			else{

				//$this->load->model('insert_model');
				$RN = $this->input->post('wrk_ord');
				$insert_data = array(
						 'v_WrkOrdNo'=> $RN,
						 'd_Date' => ($this->input->post('n_Visit_Date')) ? date('Y-m-d ', strtotime($this->input->post('n_Visit_Date'))).$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT) : NULL,
						 'v_Time'=>$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT),
						 'v_Etime'=>$this->input->post('n_Ehour').':'.str_pad($this->input->post('n_Emin'), 2, 0, STR_PAD_LEFT),
						 'v_ActionTaken' => $this->input->post('n_Action_Taken'),
						 'v_Personal1' => $this->input->post('C_requestor1').'-'.$this->input->post('V_requestor1'),
						 'n_Hours1'=>$this->input->post('n_End_Time_h1').':'.str_pad($this->input->post('n_End_Time_m1'), 2, 0, STR_PAD_LEFT),
						 'n_Rate1' => $this->input->post('V_rate1'),
						 'n_Total1' => $this->input->post('T_rate1'),
						 'v_Personal2' => $this->input->post('C_requestor2').'-'.$this->input->post('V_requestor2'),
						 'n_Hours2'=>$this->input->post('n_End_Time_h2').':'.str_pad($this->input->post('n_End_Time_m2'), 2, 0, STR_PAD_LEFT),
						 'n_Rate2' => $this->input->post('V_rate2'),
						 'n_Total2' => $this->input->post('T_rate2'),
						 'v_Personal3' => $this->input->post('C_requestor3').'-'.$this->input->post('V_requestor3'),
						 'n_Hours3'=>$this->input->post('n_End_Time_h3').':'.str_pad($this->input->post('n_End_Time_m3'), 2, 0, STR_PAD_LEFT),
						 'n_Rate3' => $this->input->post('V_rate3'),
						 'n_Total3' => $this->input->post('T_rate3'),
						 'v_Vendor1' => $this->input->post('C_Vendor').'-'.$this->input->post('V_Vendor'),
						 'n_vHours' => $this->input->post('V_reqRM'),
						 'v_PartName' => $this->input->post('V_part'),
						 'n_PartRM' => $this->input->post('V_partRM'),
						 'n_PartAmount' => 1,
						 'n_PartTotal' => $this->input->post('V_parttotal'),
						 'd_Reschdt' => ($this->input->post('n_rschDate')) ? date('Y-m-d', strtotime($this->input->post('n_rschDate'))) : NULL, //date('Y-m-d', strtotime($this->input->post('n_rschDate'))),
						 'v_ReschReason' => $this->input->post('n_rschReason').' : '.$this->input->post('n_rschReason1'),
						 'v_ReschAuthBy' => $this->input->post('n_rschAuth'),
						);
				$this->insert_model->visit1_form($insert_data);
				$TOWdata = array(
						'v_WrkOrdNo'=> $RN,
						'type_of_work' => $this->input->post('n_Type_of_Work'),
						'v_HospitalCode' => $this->session->userdata('hosp_code')
				);
				$this->insert_model->visitTOW_form($TOWdata);

				$RN = $this->input->post('wrk_ord');
				$this->load->model('display_model');
				$data['v1rsch'] = $this->display_model->visit1ppm_tab($RN);

				$this->load->model('update_model');
				if (isset($data['v1rsch'][0]->d_Reschdt)) {
				$insert_data = array(
						'v_Wrkordstatus' => "AR",
						'd_Reschdt' => date('Y-m-d', strtotime($this->input->post('n_rschDate'))),
					);
				$this->update_model->pmis2_egm_schconfirmmon($insert_data);
				}
				else{
				$insert_data = array(
						'v_Wrkordstatus' => "A",
						'd_Reschdt' => NULL,
					);
				$this->update_model->pmis2_egm_schconfirmmon($insert_data);
				}
			}


}

function visit2_form($insert_data){

$this->db->insert('pmis2_emg_jobvisit2', $insert_data);

//echo $this->db->last_query();
//exit();
}

function visit2_woexist($value,$variable){
			$this->db->select($value);
			$this->db->where($value,$variable);
			$this->db->where('v_HospitalCode',$this->session->userdata('hosp_code'));

			$query = $this->db->get('pmis2_emg_jobvisit2');

			if($query->num_rows()>0){
				$this->load->model('update_model');

				$insert_data = array(
						 'd_Date' => ($this->input->post('n_Visit_Date')) ? date('Y-m-d ', strtotime($this->input->post('n_Visit_Date'))).$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT) : NULL,
						 'v_Time'=>$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT),
						 'v_Etime'=>$this->input->post('n_Ehour').':'.str_pad($this->input->post('n_Emin'), 2, 0, STR_PAD_LEFT),
						 'v_ActionTaken' => $this->input->post('n_Action_Taken'),
						 'v_Personal1' => $this->input->post('C_requestor1').'-'.$this->input->post('V_requestor1'),
						 'n_Hours1'=>$this->input->post('n_End_Time_h1').':'.str_pad($this->input->post('n_End_Time_m1'), 2, 0, STR_PAD_LEFT),
						 'n_Rate1' => $this->input->post('V_rate1'),
						 'n_Total1' => $this->input->post('T_rate1'),
						 'v_Personal2' => $this->input->post('C_requestor2').'-'.$this->input->post('V_requestor2'),
						 'n_Hours2'=>$this->input->post('n_End_Time_h2').':'.str_pad($this->input->post('n_End_Time_m2'), 2, 0, STR_PAD_LEFT),
						 'n_Rate2' => $this->input->post('V_rate2'),
						 'n_Total2' => $this->input->post('T_rate2'),
						 'v_Personal3' => $this->input->post('C_requestor3').'-'.$this->input->post('V_requestor3'),
						 'n_Hours3'=>$this->input->post('n_End_Time_h3').':'.str_pad($this->input->post('n_End_Time_m3'), 2, 0, STR_PAD_LEFT),
						 'n_Rate3' => $this->input->post('V_rate3'),
						 'n_Total3' => $this->input->post('T_rate3'),
						 'v_Vendor1' => $this->input->post('C_Vendor').'-'.$this->input->post('V_Vendor'),
						 'n_vHours' => $this->input->post('V_reqRM'),
						 'v_PartName' => $this->input->post('V_part'),
						 'n_PartRM' => $this->input->post('V_partRM'),
						 'n_PartAmount' => 1,
						 'n_PartTotal' => $this->input->post('V_parttotal'),
						 'd_Reschdt' => ($this->input->post('n_rschDate')) ? date('Y-m-d', strtotime($this->input->post('n_rschDate'))) : NULL,
						 'v_Reschreason' => $this->input->post('n_rschReason').':'.$this->input->post('n_rschReason1'),
						 'v_ReschAuthBy' => $this->input->post('n_rschAuth'),
						);
				$this->update_model->visit2_form($insert_data);

				$RN = $this->input->post('wrk_ord');
				$this->load->model('display_model');
				$data['v1rsch'] = $this->display_model->visit1ppm_tab($RN);
				$data['v2rsch'] = $this->display_model->visit2ppm_tab($RN);

				$this->load->model('update_model');
				if (isset($data['v2rsch'][0]->d_Reschdt)) {
				$insert_data = array(
						'v_Wrkordstatus' => "AR",
						'd_Reschdt' => date('Y-m-d', strtotime($this->input->post('n_rschDate'))),
					);
				$this->update_model->pmis2_egm_schconfirmmon($insert_data);
				}
				if (!isset($data['v2rsch'][0]->d_Reschdt) && isset($data['v1rsch'][0]->d_Reschdt)) {
				$insert_data = array(
						'v_Wrkordstatus' => "AR",
						'd_Reschdt' => $data['v1rsch'][0]->d_Reschdt,
					);
				$this->update_model->pmis2_egm_schconfirmmon($insert_data);
				}
				if (!isset($data['v2rsch'][0]->d_Reschdt) && !isset($data['v1rsch'][0]->d_Reschdt)) {
				$insert_data = array(
						'v_Wrkordstatus' => "A",
						'd_Reschdt' => NULL,
					);
				$this->update_model->pmis2_egm_schconfirmmon($insert_data);
				}
			}
			else{

				//$this->load->model('insert_model');
				$RN = $this->input->post('wrk_ord');
				$insert_data = array(
						 'v_WrkOrdNo'=> $RN,
						 'd_Date' => ($this->input->post('n_Visit_Date')) ? date('Y-m-d ', strtotime($this->input->post('n_Visit_Date'))).$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT) : NULL,
						 'v_Time'=>$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT),
						 'v_Etime'=>$this->input->post('n_Ehour').':'.str_pad($this->input->post('n_Emin'), 2, 0, STR_PAD_LEFT),
						 'v_ActionTaken' => $this->input->post('n_Action_Taken'),
						 'v_Personal1' => $this->input->post('C_requestor1').'-'.$this->input->post('V_requestor1'),
						 'n_Hours1'=>$this->input->post('n_End_Time_h1').':'.str_pad($this->input->post('n_End_Time_m1'), 2, 0, STR_PAD_LEFT),
						 'n_Rate1' => $this->input->post('V_rate1'),
						 'n_Total1' => $this->input->post('T_rate1'),
						 'v_Personal2' => $this->input->post('C_requestor2').'-'.$this->input->post('V_requestor2'),
						 'n_Hours2'=>$this->input->post('n_End_Time_h2').':'.str_pad($this->input->post('n_End_Time_m2'), 2, 0, STR_PAD_LEFT),
						 'n_Rate2' => $this->input->post('V_rate2'),
						 'n_Total2' => $this->input->post('T_rate2'),
						 'v_Personal3' => $this->input->post('C_requestor3').'-'.$this->input->post('V_requestor3'),
						 'n_Hours3'=>$this->input->post('n_End_Time_h3').':'.str_pad($this->input->post('n_End_Time_m3'), 2, 0, STR_PAD_LEFT),
						 'n_Rate3' => $this->input->post('V_rate3'),
						 'n_Total3' => $this->input->post('T_rate3'),
						 'v_Vendor1' => $this->input->post('C_Vendor').'-'.$this->input->post('V_Vendor'),
						 'n_vHours' => $this->input->post('V_reqRM'),
						 'v_PartName' => $this->input->post('V_part'),
						 'n_PartRM' => $this->input->post('V_partRM'),
						 'n_PartAmount' => 1,
						 'n_PartTotal' => $this->input->post('V_parttotal'),
						 'd_Reschdt' => ($this->input->post('n_rschDate')) ? date('Y-m-d', strtotime($this->input->post('n_rschDate'))) : NULL,
						 'v_Reschreason' => $this->input->post('n_rschReason').':'.$this->input->post('n_rschReason1'),
						 'v_ReschAuthBy' => $this->input->post('n_rschAuth'),
						);
				$this->insert_model->visit2_form($insert_data);

				$RN = $this->input->post('wrk_ord');
				$this->load->model('display_model');
				$data['v2rsch'] = $this->display_model->visit2ppm_tab($RN);

				$this->load->model('update_model');
				if (isset($data['v2rsch'][0]->d_Reschdt)) {
				$insert_data = array(
						'v_Wrkordstatus' => "AR",
						'd_Reschdt' => date('Y-m-d', strtotime($this->input->post('n_rschDate'))),
					);
				$this->update_model->pmis2_egm_schconfirmmon($insert_data);
				}
			}


}

function visit3_form($insert_data){

$this->db->insert('pmis2_emg_jobvisit3', $insert_data);

//echo $this->db->last_query();
//exit();
}

function visit3_woexist($value,$variable){
			$this->db->select($value);
			$this->db->where($value,$variable);
			$this->db->where('v_HospitalCode',$this->session->userdata('hosp_code'));

			$query = $this->db->get('pmis2_emg_jobvisit3');

			if($query->num_rows()>0){
				$this->load->model('update_model');

				$insert_data = array(
						 'd_Date' => ($this->input->post('n_Visit_Date')) ? date('Y-m-d ', strtotime($this->input->post('n_Visit_Date'))).$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT) : NULL,
						 'v_Time'=>$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT),
						 'v_Etime'=>$this->input->post('n_Ehour').':'.str_pad($this->input->post('n_Emin'), 2, 0, STR_PAD_LEFT),
						 'v_ActionTaken' => $this->input->post('n_Action_Taken'),
						 'v_Personal1' => $this->input->post('C_requestor1').'-'.$this->input->post('V_requestor1'),
						 'n_Hours1'=>$this->input->post('n_End_Time_h1').':'.str_pad($this->input->post('n_End_Time_m1'), 2, 0, STR_PAD_LEFT),
						 'n_Rate1' => $this->input->post('V_rate1'),
						 'n_Total1' => $this->input->post('T_rate1'),
						 'v_Personal2' => $this->input->post('C_requestor2').'-'.$this->input->post('V_requestor2'),
						 'n_Hours2'=>$this->input->post('n_End_Time_h2').':'.str_pad($this->input->post('n_End_Time_m2'), 2, 0, STR_PAD_LEFT),
						 'n_Rate2' => $this->input->post('V_rate2'),
						 'n_Total2' => $this->input->post('T_rate2'),
						 'v_Personal3' => $this->input->post('C_requestor3').'-'.$this->input->post('V_requestor3'),
						 'n_Hours3'=>$this->input->post('n_End_Time_h3').':'.str_pad($this->input->post('n_End_Time_m3'), 2, 0, STR_PAD_LEFT),
						 'n_Rate3' => $this->input->post('V_rate3'),
						 'n_Total3' => $this->input->post('T_rate3'),
						 'v_Vendor1' => $this->input->post('C_Vendor').'-'.$this->input->post('V_Vendor'),
						 'n_vHours' => $this->input->post('V_reqRM'),
						 'v_PartName' => $this->input->post('V_part'),
						 'n_PartRM' => $this->input->post('V_partRM'),
						 'n_PartAmount' => 1,
						 'n_PartTotal' => $this->input->post('V_parttotal'),
						 'd_Reschdt' => ($this->input->post('n_rschDate')) ? date('Y-m-d', strtotime($this->input->post('n_rschDate'))) : NULL,
						 'v_ReschReason' => $this->input->post('n_rschReason').':'.$this->input->post('n_rschReason1'),
						 'v_ReschAuthBy' => $this->input->post('n_rschAuth'),
						);
				$this->update_model->visit3_form($insert_data);

				$RN = $this->input->post('wrk_ord');
				$this->load->model('display_model');
				$data['v1rsch'] = $this->display_model->visit1ppm_tab($RN);
				$data['v2rsch'] = $this->display_model->visit2ppm_tab($RN);
				$data['v3rsch'] = $this->display_model->visit3ppm_tab($RN);

				$this->load->model('update_model');
				if (isset($data['v3rsch'][0]->d_Reschdt)) {
				$insert_data = array(
						'v_Wrkordstatus' => "AR",
						'd_Reschdt' => date('Y-m-d', strtotime($this->input->post('n_rschDate'))),
					);
				$this->update_model->pmis2_egm_schconfirmmon($insert_data);
				}
				if (!isset($data['v3rsch'][0]->d_Reschdt) && isset($data['v2rsch'][0]->d_Reschdt)) {
				$insert_data = array(
						'v_Wrkordstatus' => "AR",
						'd_Reschdt' => $data['v2rsch'][0]->d_Reschdt,
					);
				$this->update_model->pmis2_egm_schconfirmmon($insert_data);
				}
				if (!isset($data['v3rsch'][0]->d_Reschdt) && !isset($data['v2rsch'][0]->d_Reschdt) && !isset($data['v1rsch'][0]->d_Reschdt)) {
				$insert_data = array(
						'v_Wrkordstatus' => "A",
						'd_Reschdt' => NULL,
					);
				$this->update_model->pmis2_egm_schconfirmmon($insert_data);
				}
			}
			else{

				//$this->load->model('insert_model');
				$RN = $this->input->post('wrk_ord');
				$insert_data = array(
						 'v_WrkOrdNo'=> $RN,
						 'd_Date' => ($this->input->post('n_Visit_Date')) ? date('Y-m-d ', strtotime($this->input->post('n_Visit_Date'))).$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT) : NULL,
						 'v_Time'=>$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT),
						 'v_Etime'=>$this->input->post('n_Ehour').':'.str_pad($this->input->post('n_Emin'), 2, 0, STR_PAD_LEFT),
						 'v_ActionTaken' => $this->input->post('n_Action_Taken'),
						 'v_Personal1' => $this->input->post('C_requestor1').'-'.$this->input->post('V_requestor1'),
						 'n_Hours1'=>$this->input->post('n_End_Time_h1').':'.str_pad($this->input->post('n_End_Time_m1'), 2, 0, STR_PAD_LEFT),
						 'n_Rate1' => $this->input->post('V_rate1'),
						 'n_Total1' => $this->input->post('T_rate1'),
						 'v_Personal2' => $this->input->post('C_requestor2').'-'.$this->input->post('V_requestor2'),
						 'n_Hours2'=>$this->input->post('n_End_Time_h2').':'.str_pad($this->input->post('n_End_Time_m2'), 2, 0, STR_PAD_LEFT),
						 'n_Rate2' => $this->input->post('V_rate2'),
						 'n_Total2' => $this->input->post('T_rate2'),
						 'v_Personal3' => $this->input->post('C_requestor3').'-'.$this->input->post('V_requestor3'),
						 'n_Hours3'=>$this->input->post('n_End_Time_h3').':'.str_pad($this->input->post('n_End_Time_m3'), 2, 0, STR_PAD_LEFT),
						 'n_Rate3' => $this->input->post('V_rate3'),
						 'n_Total3' => $this->input->post('T_rate3'),
						 'v_Vendor1' => $this->input->post('C_Vendor').'-'.$this->input->post('V_Vendor'),
						 'n_vHours' => $this->input->post('V_reqRM'),
						 'v_PartName' => $this->input->post('V_part'),
						 'n_PartRM' => $this->input->post('V_partRM'),
						 'n_PartAmount' => 1,
						 'n_PartTotal' => $this->input->post('V_parttotal'),
						 'd_Reschdt' => ($this->input->post('n_rschDate')) ? date('Y-m-d', strtotime($this->input->post('n_rschDate'))) : NULL,
						 'v_ReschReason' => $this->input->post('n_rschReason').':'.$this->input->post('n_rschReason1'),
						 'v_ReschAuthBy' => $this->input->post('n_rschAuth'),
						);
				$this->insert_model->visit3_form($insert_data);

				$RN = $this->input->post('wrk_ord');
				$this->load->model('display_model');
				$data['v3rsch'] = $this->display_model->visit3ppm_tab($RN);

				$this->load->model('update_model');
				if (isset($data['v3rsch'][0]->d_Reschdt)) {
				$insert_data = array(
						'v_Wrkordstatus' => "AR",
						'd_Reschdt' => date('Y-m-d', strtotime($this->input->post('n_rschDate'))),
					);
				$this->update_model->pmis2_egm_schconfirmmon($insert_data);
				}
			}


}
function job_form($insert_data){

$this->db->insert('pmis2_egm_jobdonedet', $insert_data);

//echo $this->db->last_query();
//exit();
}

function job_woexist($value,$variable){
			$this->db->select($value);
			$this->db->where($value,$variable);
			$this->db->where('v_HospitalCode',$this->session->userdata('hosp_code'));

			$query = $this->db->get('pmis2_egm_jobdonedet');

			if($query->num_rows()>0){
				$this->load->model('update_model');

				$insert_data = array(
						'd_rDate' => $this->input->post('d_date'),
						'v_jtime' => $this->input->post('d_time'),
						'd_DateDue' => $this->input->post('duedate'),
						'd_DateDone' => date('Y-m-d ', strtotime($this->input->post('n_job_Date'))).$this->input->post('n_JChour').':'.str_pad($this->input->post('n_JCmin'), 2, 0, STR_PAD_LEFT),
						'v_time' => $this->input->post('n_JChour').':'.str_pad($this->input->post('n_JCmin'), 2, 0, STR_PAD_LEFT),
						'v_summary' => $this->input->post('n_jobclose_summary'),
						'v_ptest' => $this->input->post('n_performance_test'),
						'v_stest' => $this->input->post('n_safety_test'),
						'v_sstatus' => $this->input->post('n_safety_result'),
						'v_jobTypecode' => $this->input->post('n_job_type'),
						'v_FacilityCode' => $this->input->post('n_facility_code'),
						'v_FailureCode' => $this->input->post('n_failure_code'),
						'v_stoppage' => $this->input->post('n_Stoppage'),
						'd_pfsdate' => ($this->input->post('n_PFStartDate')) ? date('Y-m-d ', strtotime($this->input->post('n_PFStartDate'))).$this->input->post('n_PFStartHH').':'.str_pad($this->input->post('n_PFStartNN'), 2, 0, STR_PAD_LEFT) : NULL,
						'd_pfedate' => ($this->input->post('n_PFStartDate')) ? date('Y-m-d ', strtotime($this->input->post('n_PFEndDate'))).$this->input->post('n_PFEndHH').':'.str_pad($this->input->post('n_PFEndNN'), 2, 0, STR_PAD_LEFT) : NULL,
						'n_Downtime' => $this->input->post('down_time'),
						'n_Servicetime' => $this->input->post('serv_time'),
						'n_Completiontime' => $this->input->post('comp_time'),
						'v_QCPPM' => $this->input->post('QC_PPM'),
						'v_QCuptime' => $this->input->post('n_QCUptime'),

						'v_AcceptedBy' => $this->input->post('n_Accepted_By'),
						'd_AcceptedDt' => ($this->input->post('n_Acceptance_Date')) ? date('Y-m-d', strtotime($this->input->post('n_Acceptance_Date'))) : NULL,
						'V_ACCEPTED_Designation' => $this->input->post('n_Designation'),
						'v_Actionflag' => 'U',
						'd_Timestamp' => date("Y-m-d H:i:s"),

						);
				$this->update_model->job_form($insert_data);

				$this->load->model('update_model');
				$RN = $this->input->post('wrk_ord');
				//if (substr($RN,0,2) == 'PP'){
				if ((substr($RN,0,2) == 'PP') || (substr($RN,0,2) == 'RI')) {
				//echo "masukpp";
				//exit();
				$this->load->model('display_model');
				$data['rsch'] = $this->display_model->jobclose_ppm($RN);
				$this->load->model('update_model');
				if (isset($data['rsch'][0]->d_Reschdt)) {
				$insert_data = array(
						'v_Wrkordstatus' => "CR",
						'v_closeddate' => date('Y-m-d ', strtotime($this->input->post('n_job_Date'))).$this->input->post('n_JChour').':'.str_pad($this->input->post('n_JCmin'), 2, 0, STR_PAD_LEFT),
						'v_closedtime' => $this->input->post('n_JChour').':'.str_pad($this->input->post('n_JCmin'), 2, 0, STR_PAD_LEFT),
						//'closedby' => $this->session->userdata('v_UserName'),
						'closedby' => $this->input->post('C_jrequestor1'),
					);
				$this->update_model->pmis2_egm_schconfirmmon($insert_data);
				}
				else{
					$insert_data = array(
						'v_Wrkordstatus' => "C",
						'v_closeddate' => date('Y-m-d ', strtotime($this->input->post('n_job_Date'))).$this->input->post('n_JChour').':'.str_pad($this->input->post('n_JCmin'), 2, 0, STR_PAD_LEFT),
						'v_closedtime' => $this->input->post('n_JChour').':'.str_pad($this->input->post('n_JCmin'), 2, 0, STR_PAD_LEFT),
						'closedby' => $this->input->post('C_jrequestor1'),
					);
				$this->update_model->pmis2_egm_schconfirmmon($insert_data);
				}
				}
				else{
				$insert_data = array(
						'V_request_status' => "C",
						'v_closeddate' => date('Y-m-d ', strtotime($this->input->post('n_job_Date'))).$this->input->post('n_JChour').':'.str_pad($this->input->post('n_JCmin'), 2, 0, STR_PAD_LEFT),
						'v_closedtime' => $this->input->post('n_JChour').':'.str_pad($this->input->post('n_JCmin'), 2, 0, STR_PAD_LEFT),
						'closedby' => $this->input->post('C_jrequestor1'),
					);
				$this->update_model->create_form($insert_data);
				}
			}

			else{

				//$this->load->model('insert_model');
				$RN = $this->input->post('wrk_ord');
				$insert_data = array(
						'v_WrkOrdNo'=> $RN,
						'd_rDate' => $this->input->post('d_date'),
						'v_jtime' => $this->input->post('d_time'),
						'd_DateDue' => $this->input->post('duedate'),
						'd_DateDone' => date('Y-m-d ', strtotime($this->input->post('n_job_Date'))).$this->input->post('n_JChour').':'.str_pad($this->input->post('n_JCmin'), 2, 0, STR_PAD_LEFT),
						'v_time' => $this->input->post('n_JChour').':'.str_pad($this->input->post('n_JCmin'), 2, 0, STR_PAD_LEFT),
						'v_summary' => $this->input->post('n_jobclose_summary'),
						'v_ptest' => $this->input->post('n_performance_test'),
						'v_stest' => $this->input->post('n_safety_test'),
						'v_sstatus' => $this->input->post('n_safety_result'),
						'v_jobTypecode' => $this->input->post('n_job_type'),
						'v_FacilityCode' => $this->input->post('n_facility_code'),
						'v_FailureCode' => $this->input->post('n_failure_code'),
						'v_stoppage' => $this->input->post('n_Stoppage'),
						'd_pfsdate' => ($this->input->post('n_PFStartDate')) ? date('Y-m-d ', strtotime($this->input->post('n_PFStartDate'))).$this->input->post('n_PFStartHH').':'.str_pad($this->input->post('n_PFStartNN'), 2, 0, STR_PAD_LEFT) : NULL,
						'd_pfedate' => ($this->input->post('n_PFEndDate')) ? date('Y-m-d ', strtotime($this->input->post('n_PFEndDate'))).$this->input->post('n_PFEndHH').':'.str_pad($this->input->post('n_PFEndNN'), 2, 0, STR_PAD_LEFT) : NULL,
						'n_Downtime' => $this->input->post('down_time'),
						'n_Servicetime' => $this->input->post('serv_time'),
						'n_Completiontime' => $this->input->post('comp_time'),
						'v_QCPPM' => $this->input->post('QC_PPM'),
						'v_QCuptime' => $this->input->post('n_QCUptime'),
						'v_Actionflag' => 'I',
						'v_HospitalCode' => $this->session->userdata('hosp_code'),
						'd_Timestamp' => date("Y-m-d H:i:s"),
						'v_servicecode' => $this->session->userdata('usersess'),

						'v_AcceptedBy' => $this->input->post('n_Accepted_By'),
						'd_AcceptedDt' => ($this->input->post('n_Acceptance_Date')) ? date('Y-m-d', strtotime($this->input->post('n_Acceptance_Date'))) : NULL,
						'V_ACCEPTED_Designation' => $this->input->post('n_Designation'),

						);
				$this->insert_model->job_form($insert_data);

				$this->load->model('update_model');
				$RN = $this->input->post('wrk_ord');
				//if (substr($RN,0,2) == 'PP'){
				if ((substr($RN,0,2) == 'PP') || (substr($RN,0,2) == 'RI')) {
				$this->load->model('display_model');
				$data['rsch'] = $this->display_model->jobclose_ppm($RN);
				$this->load->model('update_model');
				if (isset($data['rsch'][0]->d_Reschdt)) {
				$insert_data = array(
						'v_Wrkordstatus' => "CR",
						'v_closeddate' => date('Y-m-d ', strtotime($this->input->post('n_job_Date'))).$this->input->post('n_JChour').':'.str_pad($this->input->post('n_JCmin'), 2, 0, STR_PAD_LEFT),
						'v_closedtime' => $this->input->post('n_JChour').':'.str_pad($this->input->post('n_JCmin'), 2, 0, STR_PAD_LEFT),
						//'closedby' => $this->session->userdata('v_UserName'),
						'closedby' => $this->input->post('C_jrequestor1'),
					);
				$this->update_model->pmis2_egm_schconfirmmon($insert_data); //pmis2_egm_service_request
				//$this->update_model->pmis2_egm_service_request($insert_data);
				}
				else{
					$insert_data = array(
						'v_Wrkordstatus' => "C",
						'v_closeddate' => date('Y-m-d ', strtotime($this->input->post('n_job_Date'))).$this->input->post('n_JChour').':'.str_pad($this->input->post('n_JCmin'), 2, 0, STR_PAD_LEFT),
						'v_closedtime' => $this->input->post('n_JChour').':'.str_pad($this->input->post('n_JCmin'), 2, 0, STR_PAD_LEFT),
						//'closedby' => $this->session->userdata('v_UserName'),
						'closedby' => $this->input->post('C_jrequestor1'),
					);
				$this->update_model->pmis2_egm_schconfirmmon($insert_data);
				//$this->update_model->pmis2_egm_service_request($insert_data);
				}
				}
				else{
				$insert_data = array(
						'V_request_status' => "C",
						'v_closeddate' => date('Y-m-d ', strtotime($this->input->post('n_job_Date'))).$this->input->post('n_JChour').':'.str_pad($this->input->post('n_JCmin'), 2, 0, STR_PAD_LEFT),
						'v_closedtime' => $this->input->post('n_JChour').':'.str_pad($this->input->post('n_JCmin'), 2, 0, STR_PAD_LEFT),
						'closedby' => $this->input->post('C_jrequestor1'),
					);
				$this->update_model->create_form($insert_data);
				}
			}

}
function woppm_form($insert_data){

$this->db->insert('pmis2_egm_jobdonedet', $insert_data);

//echo $this->db->last_query();
//exit();
}

function woppm_exist($value,$variable){
			$this->db->select($value);
			$this->db->where($value,$variable);
			$this->db->where('v_HospitalCode',$this->session->userdata('hosp_code'));

			$query = $this->db->get('pmis2_egm_jobdonedet');

			if($query->num_rows()>0){
				$this->load->model('update_model');

				$insert_data = array(
						'v_QCPPM' => $this->input->post('QC_PPM'),
						'v_QCuptime' => $this->input->post('QC_Uptime'),
						);
				$this->update_model->woppm_form($insert_data);
				//echo $this->db->last_query();
				//exit();
			}
			else{

				//$this->load->model('insert_model');
				$RN = $this->input->post('wrk_ord');
				$insert_data = array(
						'v_WrkOrdNo'=> $RN,
						'v_QCPPM' => $this->input->post('QC_PPM'),
						'v_QCuptime' => $this->input->post('QC_Uptime'),
						);
				$this->insert_model->woppm_form($insert_data);
				//echo $this->db->last_query();
				//exit();
			}

}
function complaintdet_form($insert_data){

$this->db->insert('pmis2_com_complaintdet', $insert_data);

//echo $this->db->last_query();
//exit();
}

function complaint_exist($value,$variable){
			$this->db->select($value);
			$this->db->where($value,$variable);

			$query = $this->db->get('pmis2_com_complaintdet');

			if($query->num_rows()>0){
				$this->load->model('update_model');

				$insert_data = array(
						'v_Monyr' => (($this->input->post('vcm_month')) OR ($this->input->post('vcm_year'))) ?  sprintf("%02d", $this->input->post('vcm_month')).'/'.$this->input->post('vcm_year') : NULL,
						'd_follow_startdate' => ($this->input->post('n_startdate')) ? date('Y-m-d ', strtotime($this->input->post('n_startdate'))).$this->input->post('n_starttime') : NULL,
						'd_follow_enddate' => ($this->input->post('n_enddate')) ? date('Y-m-d ', strtotime($this->input->post('n_enddate'))).$this->input->post('n_endtime') : NULL,
						'v_follow_starttime' => $this->input->post('n_starttime'),
						'v_follow_endtime' => $this->input->post('n_endtime'),
						'v_Remark' => $this->input->post('n_actiontaken'),
						'v_rootcause' => $this->input->post('n_rootcause'),
						'v_correctiveact' => $this->input->post('n_correctiveact'),
						'v_preventiveact' => $this->input->post('n_preventiveact'),
						'v_PersonnelCode' => $this->input->post('n_personnel_code'),
						'd_Timestamp' => date('Y-m-d H:i:s'),
						'v_ActionFlag' => 'U',
						);
				//echo 'update complaintdet<br>';
				//print_r($insert_data);
				//exit();
				$this->update_model->complaintdet_form($insert_data);
				//echo $this->db->last_query();
				//exit();
			}
			else{

				//$this->load->model('insert_model');
				$RN = $this->input->post('wrk_ord');
				$insert_data = array(
						'v_ServiceCode'=> 'BES',
						'v_ComplaintNo' => $this->input->post('cmplnt_no'),
						'v_Monyr' => (($this->input->post('vcm_month')) OR ($this->input->post('vcm_year'))) ?  sprintf("%02d", $this->input->post('vcm_month')).'/'.$this->input->post('vcm_year') : NULL,
						'd_follow_startdate' => ($this->input->post('n_startdate')) ? date('Y-m-d ', strtotime($this->input->post('n_startdate'))).$this->input->post('n_starttime') : NULL,//$this->input->post('n_startdate'),
						'd_follow_enddate' => ($this->input->post('n_enddate')) ? date('Y-m-d ', strtotime($this->input->post('n_enddate'))).$this->input->post('n_endtime') : NULL,//$this->input->post('n_enddate'),
						'v_follow_starttime' => $this->input->post('n_starttime'),
						'v_follow_endtime' => $this->input->post('n_endtime'),
						'v_Remark' => $this->input->post('n_actiontaken'),
						'v_rootcause' => $this->input->post('n_rootcause'),
						'v_correctiveact' => $this->input->post('n_correctiveact'),
						'v_preventiveact' => $this->input->post('n_preventiveact'),
						'v_PersonnelCode' => $this->input->post('n_personnel_code'),
						'd_Timestamp' => date('Y-m-d H:i:s'),
						'v_ActionFlag' => 'I',
						'v_HospitalCode' => 'IIUM',
						);
				//echo 'insert complaintdet<br>';
				//print_r($insert_data);
				//exit();
				$this->insert_model->complaintdet_form($insert_data);
				//echo $this->db->last_query();
				//exit();
			}

}
function insert_image($image){
	$this->db->insert('pmis2_sa_user_image', $image);
}
function upload($image,$value,$variable){
			$this->db->select($value);
			$this->db->where($value,$variable);

			$query = $this->db->get('pmis2_sa_user_image');

			if($query->num_rows()>0){

				$this->load->model('update_model');
				$this->update_model->update_image($image);
				//echo $this->db->last_query();
				//exit();
			}
			else{

				//$this->load->model('insert_model');
				$image['v_UserID'] = $this->session->userdata('v_UserName');
				$this->insert_model->insert_image($image);
				//echo $this->db->last_query();
				//exit();
			}

}
function assetmaintenance_form($insert_data){

$this->db->insert('pmis2_egm_assetmaintenance', $insert_data);

//echo $this->db->last_query();
//exit();
}

function assetmaintenance_exist($value,$variable,$VOClaimPeriod,$CRefNo,$CRefDate,$VLoc,$VRefDate,$SNFVNFRefNo,$SubmissionDate){

			$this->db->select($value);
			$this->db->where($value,$variable);

			$query = $this->db->get('pmis2_egm_assetmaintenance');

			if($query->num_rows()>0){

				$this->load->model('update_model');

				$insert_data = array(
						'v_Criticality' => $this->input->post('n_criticality'),
						'v_SparelistCode' => $this->input->post('n_sparelist'),
						'v_SafetyTest' => $this->input->post('n_safety_test'),
						'v_AssettypeCode' => $this->input->post('n_asset_class'),
						'v_AssetStatus' => $this->input->post('n_asset_status'),
						'v_AssetCondition' => $this->input->post('n_asset_condition'),
						'v_AssetRefNo' => $CRefNo,
						'd_RefDate' => $CRefDate,
						'v_ChecklistCode' => $this->input->post('n_ChecklistCode'),
						'v_CategoryCode' => $this->input->post('n_AssetType'),
						'd_timestamp' => date('Y-m-d H:i:s'),
						'v_Actionflag' => 'U'
						);
				if ($this->input->post('VOLockedStatus') <> 1){
						$insert_data["v_AssetVStatus"] = $this->input->post('n_Variation_Status');
						$insert_data["v_Location"] = $VLoc;
						$insert_data["d_LocDate"] = $VRefDate;
						$insert_data["voclaim_period"] = $VOClaimPeriod;
						}

				$this->update_model->assetmaintenance_form($insert_data);
				//echo $this->db->last_query();
				//exit();
				if (strlen($this->input->post('n_ChecklistCode')) > 0){
				$insert_data = array(
						'v_Checklistcode' => $this->input->post('n_ChecklistCode')
						);
				$this->update_model->checklistcode_update($insert_data);
				}
				if (!is_null($SNFVNFRefNo)) {
				$insert_data = array(
						'vvfSubmissionDate' => ($SubmissionDate) ? date('Y-m-d', strtotime($SubmissionDate)) : NULL
						);
				$this->update_model->vo3_asset_update($insert_data);
				}
			}
			else{

				//$this->load->model('insert_model');
				$RN = $this->input->post('wrk_ord');
				$insert_data = array(
						'v_AssetNo' =>$this->input->post('asset'),
						'v_Criticality' => $this->input->post('n_criticality'),
						'v_SparelistCode' => $this->input->post('n_sparelist'),
						'v_SafetyTest' => $this->input->post('n_safety_test'),
						'v_AssettypeCode' => $this->input->post('n_asset_class'),
						'v_AssetStatus' => $this->input->post('n_asset_status'),
						'v_AssetCondition' => $this->input->post('n_asset_condition'),
						'v_AssetRefNo' => $CRefNo,
						'd_RefDate' => $CRefDate,
						'v_ChecklistCode' => $this->input->post('n_ChecklistCode'),
						'v_CategoryCode' => $this->input->post('n_AssetType'),
						'd_timestamp' => date('Y-m-d H:i:s'),
						'v_Actionflag' => 'I',
						'v_Hospitalcode' => $this->session->userdata('hosp_code')
						);
				if ($this->input->post('VOLockedStatus') <> 1){
						$insert_data["v_AssetVStatus"] = $this->input->post('n_Variation_Status');
						$insert_data["v_Location"] = $VLoc;
						$insert_data["d_LocDate"] = $VRefDate;
						$insert_data["voclaim_period"] = $VOClaimPeriod;
						}
				$this->insert_model->assetmaintenance_form($insert_data);
				if (strlen($this->input->post('n_ChecklistCode')) > 0){
				$insert_data = array(
						'v_Checklistcode' => $this->input->post('n_ChecklistCode')
						);
				$this->update_model->checklistcode_update($insert_data);
				}
				//echo $this->db->last_query();
				//exit();
			}

}
function qap3_action_new($insert_data){
	$this->db->insert('mis_qap_car_detail', $insert_data);
}
function qap3_car_new($carheader_data){
	$this->db->insert('mis_qap_car_header', $carheader_data);
}
function store_takeadd($insert_data){
	$this->db->insert('tbl_item_movement', $insert_data);
}
function store_addprice($addprice_data){
	$this->db->insert('tbl_item_price_history', $addprice_data);
}
function stock_itemnew($insert_data){
$this->db->insert('tbl_item_store_qty', $insert_data);
}
function stock_pricenew($price_data){
$this->db->insert('tbl_item_price_history', $price_data);
}

function stock_itemexist($value1,$variable1,$value2,$variable2){

			$this->db->select('*');
			$this->db->where($value1,$variable1);
			$this->db->where($value2,$variable2);

			$query = $this->db->get('tbl_item_store_qty');

			if($query->num_rows()==0){

				$insert_data = array(
						'ItemCode' => $this->input->post('n_itemcode'),
						'Action_Flag' => 'I',
						'Last_User_Update' => $this->session->userdata('v_UserName'),
						'Hosp_code' => $variable2,
						'Time_Stamp' => date('Y-m-d H:i:s'),
						'Qty' => $this->input->post('n_qty'),
						);

				$this->insert_model->stock_itemnew($insert_data);

				$price_data = array(
									'ItemCode' => $this->input->post('n_itemcode'),
									'User_Update' => $this->session->userdata('v_UserName'),
									'Hosp_code' => $variable2,
									'Time_Stamp' => date('Y-m-d H:i:s'),
									'Price' => $this->input->post('n_itemprice'),
									'Vendor_Code' => $this->input->post('vendor'),
						);

				$this->insert_model->stock_pricenew($price_data);
			}
}
function job_scheduler($insert_data){
$this->db->insert('set_scheduler', $insert_data);
}
function jc_exist($value,$variable,$monthly_sel,$monthly_num,$monthly_months,$monthly_day,$dailyfreqtime,$dailytime){
			$this->db->select($value);
			$this->db->where($value,$variable);

			$query = $this->db->get('set_scheduler');

			if($query->num_rows()>0){
				$this->load->model('update_model');

				$insert_data = array(
						  'Occurs' => $this->input->post('n_occur'),
						  'Monthly_sel' => $monthly_sel,
						  'Monthly_num' => $monthly_num,
						  'Monthly_months' => $monthly_months,
						  'Monthly_days' => $monthly_day,
						  'Daily_FreqOccurs' => $this->input->post('n_daily_occur'),
						  'Daily_Freq' => $this->input->post('daily_freq'),
						  'Daily_freq_time_1' => $dailyfreqtime,
						  'Daily_freq_time_2' => $this->input->post('n_freq_time2'),
						  'Daily_freq_time' => $dailytime,
						  'Duration_Status' => $this->input->post('duration_stat'),
						  'Duration_start_date' => $this->input->post('duration_Sdate') ? $this->input->post('duration_Sdate') : NULL,
						  'Duration_end_date' => $this->input->post('duration_Edate') ? $this->input->post('duration_Edate') : NULL,
						);
				$this->update_model->job_secheduler_u($insert_data,$variable);
				//echo $this->db->last_query();
				//exit();
			}
			else{

				$insert_data = array(
						  'Occurs' => $this->input->post('n_occur'),
						  'Scheduler_Name' => $variable,
						  'Monthly_sel' => $monthly_sel,
						  'Monthly_num' => $monthly_num,
						  'Monthly_months' => $monthly_months,
						  'Monthly_days' => $monthly_day,
						  'Daily_FreqOccurs' => $this->input->post('n_daily_occur'),
						  'Daily_Freq' => $this->input->post('daily_freq'),
						  'Daily_freq_time_1' => $dailyfreqtime,
						  'Daily_freq_time_2' => $this->input->post('n_freq_time2'),
						  'Daily_freq_time' => $dailytime,
						  'Duration_Status' => $this->input->post('duration_stat'),
						  'Duration_start_date' => $this->input->post('duration_Sdate') ? $this->input->post('duration_Sdate') : NULL,
						  'Duration_end_date' => $this->input->post('duration_Edate') ? $this->input->post('duration_Edate') : NULL,
						);
				//print_r($insert_data);
				//exit();
				$this->insert_model->job_scheduler($insert_data);
				//echo $this->db->last_query();
				//exit();
			}

}

function test($insert_data){
$this->db->insert('test_ajax', $insert_data);
}

function planner_scheduler($insert_data){
$this->db->insert_batch('set_planner_scheduler', $insert_data);
}
function dcap_exist($value1,$job,$value2,$time,$value3,$dept,$value4,$loc,$colorcode,$value5,$monthyear,$value6,$hosp,$value7,$jobdate){
			$this->db->select($value1,$value2,$value3,$value4,$value5);
			$this->db->where($value1,$job); //jobitem
			$this->db->where($value2,$time); //time
			$this->db->where($value3,$dept); //deptcode
			//$this->db->where($value4,$loc); //location
			$this->db->where($value5,$monthyear); //monthyear
			$this->db->where($value6,$hosp); //hospital code
			//$this->db->where($value7,$jobdate); //jobdate
			//$this->db->where('Action_flag <>','D');
			$query = $this->db->get('set_planner_scheduler');

			if($query->num_rows()>0){
				$this->load->model('update_model');

				if ($colorcode <> ''){
					$insert_data = array(
							  'Color_Code' => $colorcode,
							  //'Month_Year' => $monthyear,
							  'Timestamp' => date('Y-m-d H:i:s'),
							  'Action_flag' => 'U',
							  'Job_Date' => $jobdate,
							  'User_ID' => $this->session->userdata('v_UserName')
							);
					$this->update_model->planner_scheduler_u($insert_data,$job,$time,$dept,$loc,$monthyear,$hosp,$jobdate);
				}
				else{
					$insert_data = array(
							  //'Color_Code' => $colorcode,
							  //'Month_Year' => $monthyear,
							  'Timestamp' => date('Y-m-d H:i:s'),
							  'Action_flag' => 'D',
							  'Job_Date' => $jobdate,
							  'User_ID' => $this->session->userdata('v_UserName')
							);
					$this->update_model->planner_scheduler_u($insert_data,$job,$time,$dept,$loc,$monthyear,$hosp,$jobdate);
				}

			}
			else{
				$this->db->select($value5);
				$this->db->where($value3,$dept); //deptcode
				//$this->db->where($value4,$loc); //loccode
				$this->db->where($value5,$monthyear); //monthyear
				$this->db->where($value6,$hosp); //hospcode
				//$this->db->where($value7,$jobdate); //jobdate
				$query = $this->db->get('set_planner_scheduler');

				if ($query->num_rows()<=0){ //if no data in set_planner_scheduler so copy data from last month
				$this->load->model('get_model');
				$data['cherec'] = $this->get_model->checkdcap($dept,$loc,$monthyear,$jobdate,$hosp);
				foreach ($data['cherec'] as $row){
					$copydata = $this->get_model->copydcap($row->Dept_Code,$row->Loc_Code,$row->Month_Year,$row->Job_Date,$row->hospital_code);
				}
				foreach ($copydata as $cd){
					if (!($cd->Job_Items == $job AND $cd->Time == $time)){
						//if ($cd->Color_Code != ''){
						$insert_data[] = array(
								  'Job_Items' => $cd->Job_Items,
								  'Job_Date' => $jobdate,
								  'Time' => $cd->Time,
								  'Color_Code' => $cd->Color_Code,
								  'Loc_Code' => $loc,  //$cd->Loc_Code,
								  'Dept_Code' => $cd->Dept_Code,
								  'Month_Year' => $monthyear,
								  'Month' => substr($monthyear,0,2),
								  'Year' => substr($monthyear,2,4),
								  'Timestamp' => date('Y-m-d H:i:s'),
								  'Action_flag' => 'I',
								  'User_ID' => $this->session->userdata('v_UserName'),
								  'hospital_code' => $cd->hospital_code
								);
						//}
					}
				}
				//print_r($insert_data);
				//exit();
				}
				if ($colorcode <> ''){
					$insert_data[] = array(
									  'Job_Items' => $job,
									  'Job_Date' => $jobdate,
									  'Time' => $time,
									  'Color_Code' => $colorcode,
									  'Loc_Code' => $loc,
									  'Dept_Code' => $dept,
									  'Month_Year' => $monthyear,
									  'Month' => substr($monthyear,0,2),
									  'Year' => substr($monthyear,2,4),
									  'Timestamp' => date('Y-m-d H:i:s'),
									  'Action_flag' => 'I',
									  'User_ID' => $this->session->userdata('v_UserName'),
									  'hospital_code' => $this->session->userdata('hosp_code')
									);
				}
				else{
					$insert_data[] = array(
									  'Job_Items' => $job,
									  'Job_Date' => $jobdate,
									  'Time' => $time,
									  'Color_Code' => 'icon-green',
									  'Loc_Code' => $loc,
									  'Dept_Code' => $dept,
									  'Month_Year' => $monthyear,
									  'Month' => substr($monthyear,0,2),
									  'Year' => substr($monthyear,2,4),
									  'Timestamp' => date('Y-m-d H:i:s'),
									  'Action_flag' => 'D',
									  'User_ID' => $this->session->userdata('v_UserName'),
									  'hospital_code' => $this->session->userdata('hosp_code')
									);
				}
				$this->insert_model->planner_scheduler($insert_data);

			}
}

function hks_scheduler2($dca_data){
$this->db->insert('set_hks_scheduler', $dca_data);
}
function hks_scheduler($insert_data){
//$this->db->insert_batch('set_hks_scheduler', $insert_data);
$this->db->insert('set_hks_scheduler', $insert_data);
}
function udca_exist($value1,$job,$value2,$shift,$value3,$dept,$value4,$loc,$colorcode,$value5,$monthyear,$value6,$hosp,$value7,$jobdate){
			$this->db->select($value1,$value2,$value3,$value4,$value5);
			$this->db->where($value1,$job);
			$this->db->where($value2,$shift);
			$this->db->where($value3,$dept);
			//$this->db->where($value4,$loc);
			$this->db->where($value5,$monthyear);
			$this->db->where($value6,$hosp);
			$this->db->where($value7,$jobdate);

			$query = $this->db->get('set_hks_scheduler');
			//echo $this->db->last_query();
			//echo '<br><br>';
			//exit();
			if($query->num_rows()>0){
				$this->load->model('update_model');

				$insert_data = array(
						  'Color_Code' => $colorcode,
						  //'Month_Year' => $monthyear,
						  'Timestamp' => date('Y-m-d H:i:s'),
						  'Action_flag' => 'U',
						  'User_ID' => $this->session->userdata('v_UserName')
						);
				$this->update_model->hks_scheduler_u($insert_data,$job,$shift,$dept,$loc,$monthyear,$hosp,$jobdate);
				//echo $this->db->last_query();
				//exit();
			}
			else{

				$insert_data = array(
								  'Job_Items' => $job,
								  'Job_Date' => $jobdate,
								  'Shift' => $shift,
								  'Color_Code' => $colorcode,
								  'Loc_Code' => $loc,
								  'Dept_Code' => $dept,
								  'Month_Year' => $monthyear,
								  'Month' => substr($monthyear,0,2),
								  'Year' => substr($monthyear,2,4),
								  'Timestamp' => date('Y-m-d H:i:s'),
								  'Action_flag' => 'I',
								  'User_ID' => $this->session->userdata('v_UserName'),
								  'hospital_code' => $this->session->userdata('hosp_code')
								);
				$this->insert_model->hks_scheduler($insert_data);
				//echo $this->db->last_query();
				//exit();
			}

}
/*function dca_exist($value1,$job,$value2,$shift,$value3,$dept,$value4,$loc,$colorcode,$value5,$monthyear){
			$this->db->select($value1,$value2,$value3,$value4,$value5);
			$this->db->where($value1,$job);
			$this->db->where($value2,$shift);
			$this->db->where($value3,$dept);
			$this->db->where($value4,$loc);
			$this->db->where($value5,$monthyear);

			$query = $this->db->get('set_hks_scheduler');
			if($query->num_rows()>0){
				$this->load->model('update_model');

				$insert_data = array(
						  'Color_Code' => $colorcode,
						  //'Month_Year' => $monthyear,
						  'Timestamp' => date('Y-m-d H:i:s'),
						  'Action_flag' => 'U',
						  'User_ID' => $this->session->userdata('v_UserName')
						);
				$this->update_model->hks_scheduler_u($insert_data,$job,$shift,$dept,$loc,$monthyear);
				$this->update_model->uhks_scheduler_u($insert_data,$job,$shift,$dept,$loc,$monthyear);
				//echo $this->db->last_query();
				//exit();
			}
			else{
				$this->db->select($value5);
				$this->db->where($value5,$monthyear);
				$query = $this->db->get('set_hks_scheduler');
				if ($query->num_rows()<=0){
				$this->load->model('get_model');
				$data['dcarec'] = $this->get_model->checkdca($dept,$loc,$monthyear);
				foreach ($data['dcarec'] as $row){
					$copydata = $this->get_model->copydca($row->Dept_Code,$row->Loc_Code,$row->Month_Year);
				}
				foreach ($copydata as $cd){
					//if (($cd->Job_Items != $job AND $cd->Shift != $shift) OR ($cd->Job_Items == $job AND $cd->Shift != $shift) OR ($cd->Job_Items != $job AND $cd->Shift == $shift)){
					if (!($cd->Job_Items == $job AND $cd->Shift == $shift)){
						if ($cd->Color_Code != ''){
						$insert_data[] = array(
								  'Job_Items' => $cd->Job_Items,
								  'Shift' => $cd->Shift,
								  'Color_Code' => $cd->Color_Code,
								  'Loc_Code' => $cd->Loc_Code,
								  'Dept_Code' => $cd->Dept_Code,
								  'Month_Year' => $monthyear,
								  'Month' => substr($monthyear,0,2),
								  'Year' => substr($monthyear,2,4),
								  'Timestamp' => date('Y-m-d H:i:s'),
								  'Action_flag' => 'I',
								  'User_ID' => $this->session->userdata('v_UserName')
								);
						}
					}
				}
				//print_r($insert_data);
				//exit();
				}
				$insert_data[] = array(
								  'Job_Items' => $job,
								  'Shift' => $shift,
								  'Color_Code' => $colorcode,
								  'Loc_Code' => $loc,
								  'Dept_Code' => $dept,
								  'Month_Year' => $monthyear,
								  'Month' => substr($monthyear,0,2),
								  'Year' => substr($monthyear,2,4),
								  'Timestamp' => date('Y-m-d H:i:s'),
								  'Action_flag' => 'I',
								  'User_ID' => $this->session->userdata('v_UserName')
								);
				$this->insert_model->hks_scheduler($insert_data);
				$this->insert_model->uhks_scheduler($insert_data);
				//echo $this->db->last_query();
				//exit();
			}

}*/
/*function uhks_scheduler($insert_data){
$this->db->insert_batch('update_hks_scheduler', $insert_data);
}*/
/*function udca_exist($value1,$job,$value2,$shift,$value3,$dept,$value4,$loc,$colorcode,$value5,$monthyear){
			$this->db->select($value1,$value2,$value3,$value4,$value5);
			$this->db->where($value1,$job);
			$this->db->where($value2,$shift);
			$this->db->where($value3,$dept);
			$this->db->where($value4,$loc);
			$this->db->where($value5,$monthyear);

			$query = $this->db->get('update_hks_scheduler');
			if($query->num_rows()>0){
				$this->load->model('update_model');

				$insert_data = array(
						  'Color_Code' => $colorcode,
						  //'Month_Year' => $monthyear,
						  'Timestamp' => date('Y-m-d H:i:s'),
						  'Action_flag' => 'U',
						  'User_ID' => $this->session->userdata('v_UserName')
						);
				$this->update_model->uhks_scheduler_u($insert_data,$job,$shift,$dept,$loc,$monthyear);
				//echo $this->db->last_query();
				//exit();
			}
			else{
				$this->db->select($value5);
				$this->db->where($value5,$monthyear);
				$query = $this->db->get('update_hks_scheduler');
				if ($query->num_rows()<=0){
				$this->load->model('get_model');
				$data['dcarec'] = $this->get_model->checkdca($dept,$loc,$monthyear);
				foreach ($data['dcarec'] as $row){
					$copydata = $this->get_model->copydca($row->Dept_Code,$row->Loc_Code,$row->Month_Year);
				}
				foreach ($copydata as $cd){
					//if (($cd->Job_Items != $job AND $cd->Shift != $shift) OR ($cd->Job_Items == $job AND $cd->Shift != $shift) OR ($cd->Job_Items != $job AND $cd->Shift == $shift)){
					if (!($cd->Job_Items == $job AND $cd->Shift == $shift)){
						if ($cd->Color_Code != ''){
						$insert_data[] = array(
								  'Job_Items' => $cd->Job_Items,
								  'Shift' => $cd->Shift,
								  'Color_Code' => $cd->Color_Code,
								  'Loc_Code' => $cd->Loc_Code,
								  'Dept_Code' => $cd->Dept_Code,
								  'Month_Year' => $monthyear,
								  'Month' => substr($monthyear,0,2),
								  'Year' => substr($monthyear,2,4),
								  'Timestamp' => date('Y-m-d H:i:s'),
								  'Action_flag' => 'I',
								  'User_ID' => $this->session->userdata('v_UserName')
								);
						}
					}
				}
				//print_r($insert_data);
				//exit();
				}
				$insert_data[] = array(
								  'Job_Items' => $job,
								  'Shift' => $shift,
								  'Color_Code' => $colorcode,
								  'Loc_Code' => $loc,
								  'Dept_Code' => $dept,
								  'Month_Year' => $monthyear,
								  'Month' => substr($monthyear,0,2),
								  'Year' => substr($monthyear,2,4),
								  'Timestamp' => date('Y-m-d H:i:s'),
								  'Action_flag' => 'I',
								  'User_ID' => $this->session->userdata('v_UserName')
								);
				$this->insert_model->uhks_scheduler($insert_data);
				//echo $this->db->last_query();
				//exit();
			}

}*/
function visitplus_form($insert_data){

$this->db->insert('pmis2_emg_jobvisit1', $insert_data);

//echo $this->db->last_query();
//exit();
}
/*function visitTOW_form($insert_data){

$this->db->insert('pmis2_emg_jobvisit1tow', $insert_data);

//echo $this->db->last_query();
//exit();
}*/

function visitplus_woexist($value,$variable,$value1,$variable1){
			$this->db->select($value);
			$this->db->where($value,$variable);
			$this->db->where($value1,$variable1);
            $this->db->where("v_HospitalCode = ", $this->session->userdata('hosp_code'));

			$query1 = $this->db->get('pmis2_emg_jobvisit1');
			//$query2 = $this->db->get('pmis2_emg_jobvisit1tow');


			if($query1->num_rows()>0){

				$this->load->model('update_model');

				$insert_data = array(
						 'd_Date' => ($this->input->post('n_Visit_Date')) ? date('Y-m-d ', strtotime($this->input->post('n_Visit_Date'))).$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT) : NULL,
						 'v_Time'=>$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT),
						 'v_Etime'=>$this->input->post('n_Ehour').':'.str_pad($this->input->post('n_Emin'), 2, 0, STR_PAD_LEFT),
						 'v_ActionTaken' => $this->input->post('n_Action_Taken'),
						 'v_Personal1' => $this->input->post('C_requestor1').'-'.$this->input->post('V_requestor1'),
						 'n_Hours1'=>$this->input->post('n_End_Time_h1').':'.str_pad($this->input->post('n_End_Time_m1'), 2, 0, STR_PAD_LEFT),
						 'n_Rate1' => $this->input->post('V_rate1'),
						 'n_Total1' => $this->input->post('T_rate1'),
						 'v_Personal2' => $this->input->post('C_requestor2').'-'.$this->input->post('V_requestor2'),
						 'n_Hours2'=>$this->input->post('n_End_Time_h2').':'.str_pad($this->input->post('n_End_Time_m2'), 2, 0, STR_PAD_LEFT),
						 'n_Rate2' => $this->input->post('V_rate2'),
						 'n_Total2' => $this->input->post('T_rate2'),
						 'v_Personal3' => $this->input->post('C_requestor3').'-'.$this->input->post('V_requestor3'),
						 'n_Hours3'=>$this->input->post('n_End_Time_h3').':'.str_pad($this->input->post('n_End_Time_m3'), 2, 0, STR_PAD_LEFT),
						 'n_Rate3' => $this->input->post('V_rate3'),
						 'n_Total3' => $this->input->post('T_rate3'),

						 'v_Vendor1' => $this->input->post('C_Vendor').'-'.$this->input->post('V_Vendor'),
						 'n_vHours' => $this->input->post('V_reqRM'),
						 'v_PartName' => $this->input->post('V_part'),
						 'n_PartRM' => $this->input->post('V_partRM'),
						 'n_PartAmount' => 1,
						 'n_PartTotal' => $this->input->post('V_parttotal'),
						 'd_Reschdt' => ($this->input->post('n_rschDate')) ? date('Y-m-d', strtotime($this->input->post('n_rschDate'))) : NULL,
						 'v_ReschReason' => $this->input->post('n_rschReason').':'.$this->input->post('n_rschReason1'),
						 'v_ReschAuthBy' => $this->input->post('n_rschAuth'),
						 'v_Actionflag' => 'U',
						 'd_Timestamp' => date("Y-m-d H:i:s"),
						);
				//print_r($insert_data);
				//echo '<br><br>';
				//add if to prevent data coruption
				if (($variable != "") && ($variable1 != "")) {
				$this->update_model->visitplus_form($insert_data,$variable,$variable1);}

				$TOWdata = array(
						'type_of_work' => $this->input->post('n_Type_of_Work')
				);
				$this->update_model->visitTOW_form($TOWdata);

				$RN = $this->input->post('wrk_ord');
				//if (substr($RN,0,2) == 'PP'){
				if ((substr($RN,0,2) == 'PP') || (substr($RN,0,2) == 'RI')) {
					$this->load->model('update_model');
					$this->db->select($value);
					$this->db->where($value,$variable);
					$this->db->where('d_Reschdt <>','NULL');
					$queryresch = $this->db->get('pmis2_emg_jobvisit1');
					if($queryresch->num_rows()>0){
					if ($this->input->post('n_rschDate')){
						$insert_data = array(
							'v_Wrkordstatus' => "AR",
								'd_Reschdt' => date('Y-m-d', strtotime($this->input->post('n_rschDate'))),
						);
					}
					else{
						$insert_data = array(
							'v_Wrkordstatus' => "AR",
						);
					}
					$this->update_model->pmis2_egm_schconfirmmon($insert_data);
					}
					else{
					$insert_data = array(
							'v_Wrkordstatus' => "A",
							'd_Reschdt' => $d_Reschdt,
						);
					$this->update_model->pmis2_egm_schconfirmmon($insert_data);
					}
					/*$this->load->model('display_model');
					$data['v1rsch'] = $this->display_model->visit1ppm_tab($RN);
					$this->load->model('update_model');
						//if (isset($data['v1rsch'][0]->d_Date)) {
						//$insert_data = array(
						//		'd_StartDt' => date('Y-m-d ', strtotime($this->input->post('n_Visit_Date'))).$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT),
						//	);
						//$this->update_model->pmis2_egm_schconfirmmon($insert_data);
						//}
					if (isset($data['v1rsch'][0]->d_Reschdt)) {
					$insert_data = array(
							'v_Wrkordstatus' => "AR",
							'd_Reschdt' => date('Y-m-d', strtotime($this->input->post('n_rschDate'))),
						);
					$this->update_model->pmis2_egm_schconfirmmon($insert_data);
					}
					else{
					$insert_data = array(
							'v_Wrkordstatus' => "A",
							'd_Reschdt' => NULL,
						);
					$this->update_model->pmis2_egm_schconfirmmon($insert_data);
					}*/
				}
				else{
					if ($variable1 == 1){
						$insert_data = array(
						 'd_Date' => ($this->input->post('n_Visit_Date')) ? date('Y-m-d ', strtotime($this->input->post('n_Visit_Date'))).$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT) : NULL,
						 'v_Time'=>$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT),
						 'v_Etime'=>$this->input->post('n_Ehour').':'.str_pad($this->input->post('n_Emin'), 2, 0, STR_PAD_LEFT),
						 'v_ActionTaken' => $this->input->post('n_Action_Taken'),
						 'v_Personal1' => $this->input->post('C_requestor1').'-'.$this->input->post('V_requestor1'),
						 'n_Hours1'=>$this->input->post('n_End_Time_h1').':'.str_pad($this->input->post('n_End_Time_m1'), 2, 0, STR_PAD_LEFT),
						 'n_Rate1' => $this->input->post('V_rate1'),
						 'n_Total1' => $this->input->post('T_rate1'),
						 'v_Personal2' => $this->input->post('C_requestor2').'-'.$this->input->post('V_requestor2'),
						 'n_Hours2'=>$this->input->post('n_End_Time_h2').':'.str_pad($this->input->post('n_End_Time_m2'), 2, 0, STR_PAD_LEFT),
						 'n_Rate2' => $this->input->post('V_rate2'),
						 'n_Total2' => $this->input->post('T_rate2'),
						 'v_Personal3' => $this->input->post('C_requestor3').'-'.$this->input->post('V_requestor3'),
						 'n_Hours3'=>$this->input->post('n_End_Time_h3').':'.str_pad($this->input->post('n_End_Time_m3'), 2, 0, STR_PAD_LEFT),
						 'n_Rate3' => $this->input->post('V_rate3'),
						 'n_Total3' => $this->input->post('T_rate3'),

						 'v_Vendor1' => $this->input->post('C_Vendor').'-'.$this->input->post('V_Vendor'),
						 //'n_vHours' => $this->input->post('V_reqRM'),
						 //'n_vRate' => $this->input->post('V_reqRate'),
						 //'n_vTotal' => $this->input->post('V_reqtotal'),
						 //'v_ReschAuthBy' => ($this->input->post('username')) ? $this->input->post('username') : NULL
						 'v_ReschAuthBy' => ($this->input->post('name')) ? $this->input->post('name') : NULL
						);
						//print_r($insert_data);
						//echo '<br><br>';
						$this->update_model->response_form($insert_data);

						$this->load->model('update_model');
						$RN = $this->input->post('wrk_ord');
						$insert_data = array(
							//	'V_request_status' => "BO",
								'v_respondate' => ($this->input->post('n_Visit_Date')) ? date('Y-m-d ', strtotime($this->input->post('n_Visit_Date'))).$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT) : NULL,
								'v_respontime'=>$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT),
							);
						//print_r($insert_data);
						//exit();
						$this->update_model->create_form($insert_data);
					}
				}

				if ($this->input->post('chkbox') == 'ON'){
					$this->insert_model->job_woexist('v_WrkOrdNo',$variable);
				}

			}
			else{
				$this->load->model('insert_model');
				$RN = $this->input->post('wrk_ord');
				$insert_data = array(
						 'v_WrkOrdNo'=> $RN,
						 'd_Date' => ($this->input->post('n_Visit_Date')) ? date('Y-m-d ', strtotime($this->input->post('n_Visit_Date'))).$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT) : NULL,
						 'v_Time'=>$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT),
						 'v_Etime'=>$this->input->post('n_Ehour').':'.str_pad($this->input->post('n_Emin'), 2, 0, STR_PAD_LEFT),
						 'v_ActionTaken' => $this->input->post('n_Action_Taken'),
						 'v_Personal1' => $this->input->post('C_requestor1').'-'.$this->input->post('V_requestor1'),
						 'n_Hours1'=>$this->input->post('n_End_Time_h1').':'.str_pad($this->input->post('n_End_Time_m1'), 2, 0, STR_PAD_LEFT),
						 'n_Rate1' => $this->input->post('V_rate1'),
						 'n_Total1' => $this->input->post('T_rate1'),
						 'v_Personal2' => $this->input->post('C_requestor2').'-'.$this->input->post('V_requestor2'),
						 'n_Hours2'=>$this->input->post('n_End_Time_h2').':'.str_pad($this->input->post('n_End_Time_m2'), 2, 0, STR_PAD_LEFT),
						 'n_Rate2' => $this->input->post('V_rate2'),
						 'n_Total2' => $this->input->post('T_rate2'),
						 'v_Personal3' => $this->input->post('C_requestor3').'-'.$this->input->post('V_requestor3'),
						 'n_Hours3'=>$this->input->post('n_End_Time_h3').':'.str_pad($this->input->post('n_End_Time_m3'), 2, 0, STR_PAD_LEFT),
						 'n_Rate3' => $this->input->post('V_rate3'),
						 'n_Total3' => $this->input->post('T_rate3'),
						 'v_Vendor1' => $this->input->post('C_Vendor').'-'.$this->input->post('V_Vendor'),
						 'n_vHours' => $this->input->post('V_reqRM'),
						 'v_PartName' => $this->input->post('V_part'),
						 'n_PartRM' => $this->input->post('V_partRM'),
						 'n_PartAmount' => 1,
						 'n_PartTotal' => $this->input->post('V_parttotal'),
						 'd_Reschdt' => ($this->input->post('n_rschDate')) ? date('Y-m-d', strtotime($this->input->post('n_rschDate'))) : NULL, //date('Y-m-d', strtotime($this->input->post('n_rschDate'))),
						 'v_ReschReason' => $this->input->post('n_rschReason').' : '.$this->input->post('n_rschReason1'),
						 'v_ReschAuthBy' => $this->input->post('n_rschAuth'),
						 'n_Visit' => $variable1,
						 'v_HospitalCode' => $this->session->userdata('hosp_code'),
						 'v_Actionflag' => 'I',
						 'd_Timestamp' => date("Y-m-d H:i:s"),
						);
						//print_r($insert_data);
						//echo '<br><br>';
				$this->insert_model->visitplus_form($insert_data);

				$this->db->select($value);
				$this->db->where($value,$variable);
				$queryTOW = $this->db->get('pmis2_emg_jobvisit1tow');
				if ($queryTOW->num_rows()>0){
					$TOWdata = array(
						'type_of_work' => $this->input->post('n_Type_of_Work')
					);
				$this->load->model('update_model');
				$this->update_model->visitTOW_form($TOWdata);
				}
				else{
				$TOWdata = array(
						'v_WrkOrdNo'=> $RN,
						'type_of_work' => $this->input->post('n_Type_of_Work'),
						'v_HospitalCode' => $this->session->userdata('hosp_code')
				);
				$this->insert_model->visitTOW_form($TOWdata);
				}
				//$RN = $this->input->post('wrk_ord');
				//if (substr($RN,0,2) == 'PP'){
				if ((substr($RN,0,2) == 'PP') || (substr($RN,0,2) == 'RI')) {
					$this->load->model('update_model');
					$this->db->select($value);
					$this->db->where($value,$variable);
					$this->db->where('v_HospitalCode',$this->session->userdata('hosp_code'));
					$this->db->where('d_Reschdt <>','NULL');
					$queryresch = $this->db->get('pmis2_emg_jobvisit1');
					if($queryresch->num_rows()>0){
					if ($this->input->post('n_rschDate')){
						$insert_data = array(
							'v_Wrkordstatus' => "AR",
								'd_Reschdt' => date('Y-m-d', strtotime($this->input->post('n_rschDate'))),
						);
					}
					else{
						$insert_data = array(
							'v_Wrkordstatus' => "AR",
						);
					}
					$this->update_model->pmis2_egm_schconfirmmon($insert_data);
					}
					else{
					$insert_data = array(
							'v_Wrkordstatus' => "A",
							'd_Reschdt' => $d_Reschdt,
						);
					$this->update_model->pmis2_egm_schconfirmmon($insert_data);
					}

					/*$this->load->model('display_model');
					$data['v1rsch'] = $this->display_model->visit1ppm_tab($RN);

					$this->load->model('update_model');
					if (isset($data['v1rsch'][0]->d_Reschdt)) {
					$insert_data = array(
							'v_Wrkordstatus' => "AR",
							'd_Reschdt' => date('Y-m-d', strtotime($this->input->post('n_rschDate'))),
						);
					$this->update_model->pmis2_egm_schconfirmmon($insert_data);
					}
					else{
					$insert_data = array(
							'v_Wrkordstatus' => "A",
							'd_Reschdt' => NULL,
						);
					$this->update_model->pmis2_egm_schconfirmmon($insert_data);
					}*/
				}
				else{
					if ($variable1 == 1){
						$insert_data = array(
						 'v_WrkOrdNo'=> $RN,
						 'd_Date' => ($this->input->post('n_Visit_Date')) ? date('Y-m-d ', strtotime($this->input->post('n_Visit_Date'))).$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT) : NULL,
						 'v_Time'=>$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT),
						 'v_Etime'=>$this->input->post('n_Ehour').':'.str_pad($this->input->post('n_Emin'), 2, 0, STR_PAD_LEFT),
						 'v_ActionTaken' => $this->input->post('n_Action_Taken'),
						 'v_Personal1' => $this->input->post('C_requestor1').'-'.$this->input->post('V_requestor1'),
						 'n_Hours1'=>$this->input->post('n_End_Time_h1').':'.str_pad($this->input->post('n_End_Time_m1'), 2, 0, STR_PAD_LEFT),
						 'n_Rate1' => $this->input->post('V_rate1'),
						 'n_Total1' => $this->input->post('T_rate1'),
						 'v_Personal2' => $this->input->post('C_requestor2').'-'.$this->input->post('V_requestor2'),
						 'n_Hours2'=>$this->input->post('n_End_Time_h2').':'.str_pad($this->input->post('n_End_Time_m2'), 2, 0, STR_PAD_LEFT),
						 'n_Rate2' => $this->input->post('V_rate2'),
						 'n_Total2' => $this->input->post('T_rate2'),
						 'v_Personal3' => $this->input->post('C_requestor3').'-'.$this->input->post('V_requestor3'),
						 'n_Hours3'=>$this->input->post('n_End_Time_h3').':'.str_pad($this->input->post('n_End_Time_m3'), 2, 0, STR_PAD_LEFT),
						 'n_Rate3' => $this->input->post('V_rate3'),
						 'n_Total3' => $this->input->post('T_rate3'),
						 'v_Vendor1' => $this->input->post('C_Vendor').'-'.$this->input->post('V_Vendor'),
						 //'n_vHours' => $this->input->post('V_reqRM'),
						 //'n_vRate' => $this->input->post('V_reqRate'),
						 //'n_vTotal' => $this->input->post('V_reqtotal'),
						 //'v_ReschAuthBy' => ($this->input->post('username')) ? $this->input->post('username') : NULL
						 'v_ReschAuthBy' => ($this->input->post('name')) ? $this->input->post('name') : NULL
						);
						//print_r($insert_data);
						//echo '<br><br>';
						$this->insert_model->response_form($insert_data);

						$this->load->model('update_model');
						$RN = $this->input->post('wrk_ord');
						$insert_data = array(
								'V_request_status' => "BO",
								'v_respondate' => ($this->input->post('n_Visit_Date')) ? date('Y-m-d ', strtotime($this->input->post('n_Visit_Date'))).$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT) : NULL,
								'v_respontime'=>$this->input->post('n_Shour').':'.str_pad($this->input->post('n_Smin'), 2, 0, STR_PAD_LEFT),
							);
						//print_r($insert_data);
						//exit();
						$this->update_model->create_form($insert_data);
					}
				}

				if ($this->input->post('chkbox') == 'ON'){
					$this->insert_model->job_woexist('v_WrkOrdNo',$variable);
				}

			}


}
function customize_search($insert_data){
$this->db->insert_batch('pmis2_com_indicatorparam', $insert_data);
}
function cs_exist($value1,$variable1,$value2,$variable2,$value3,$variable3,$v_IndicatorNo,$n_indicatorval,$n_parameter,$n_demerit){
			$this->db->select($value1,$value2,$value3);
			$this->db->where($value1,$variable1);
			$this->db->where($value2,$variable2);
			$this->db->where($value3,$variable3);

			$query = $this->db->get('pmis2_com_indicatorparam');

			//echo "masuk Update : ".$query->num_rows();
			//exit();
			if($query->num_rows()>0){

				$this->load->model('update_model');
				//for($i=0;$i<=(count($v_IndicatorNo)-1);$i++){
				for($i=0;$i<=(count($n_indicatorval)-1);$i++){
				$insert_data[] = array(
						  //'v_ServiceCode' => $variable3,
						  //'v_IndicatorNo' => $v_IndicatorNo[$i],
							'v_IndicatorNo' => ($i+1),
						  'n_Parameters' => $n_indicatorval[$i],
						  'v_Paramval' => $n_parameter[$i],
						  'Demerit_Point' => $n_demerit[$i],
						  //'v_Month' => $variable1,
						  //'v_Year' => $variable2,
						  'n_Revenue' => $this->input->post('n_monthly'),
						  //'v_HospitalCode' => $this->session->userdata('hosp_code'),
						  'd_Timestamp' => date('Y-m-d H:i:s'),
						  'v_ActionFlag' => 'U',
						);
				}
				//print_r($insert_data);
				//exit();
				$this->update_model->customize_search_u($insert_data,'v_IndicatorNo',$variable1,$variable2,$variable3);
				//print_r($insert_data);
				//exit();
				//echo $this->db->last_query();
				//exit();
			}
			else{
				//for($i=0;$i<=(count($v_IndicatorNo)-1);$i++){
				for($i=0;$i<=(count($n_indicatorval)-1);$i++){
				$insert_data[] = array(
						  'v_ServiceCode' => $variable3,
							//'v_IndicatorNo' => $v_IndicatorNo[$i],
						  'v_IndicatorNo' => ($i+1),
						  'n_Parameters' => $n_indicatorval[$i],
						  'v_Paramval' => $n_parameter[$i],
						  'Demerit_Point' => $n_demerit[$i],
						  'v_Month' => $variable1,
						  'v_Year' => $variable2,
						  'n_Revenue' => $this->input->post('n_monthly'),
						  'v_HospitalCode' => $this->session->userdata('hosp_code'),
						  'd_Timestamp' => date('Y-m-d H:i:s'),
						  'v_ActionFlag' => 'I',
						);
				}
				//print_r($insert_data);
				//exit();
				$this->insert_model->customize_search($insert_data);
				//echo $this->db->last_query();
				//exit();
			}

}
function financial_input($insert_data){
$this->db->insert('financial_report', $insert_data);
}
function fi_exist($value1,$variable1,$value2,$variable2,$value3,$variable3){
			$this->db->select($value1,$value2,$value3);
			$this->db->where($value1,$variable1);
			$this->db->where($value2,$variable2);
			$this->db->where($value3,$variable3);

			$query = $this->db->get('financial_report');

			if($query->num_rows()>0){

				$this->load->model('update_model');
				$insert_data = array(
						  //'Month' => $variable1,
						  //'Year' => $variable2,
						  //'Service_Code' => $variable3,
						  'Invoice_No' => $this->input->post('n_invoiceno'),
						  'Invoice_Date' => $this->input->post('n_invoicedate'),
						  'Service_Fee' => $this->input->post('n_servicefee'),
						  'Service_Tax' => $this->input->post('n_servicetax'),
						  'Invoice_Amount' => $this->input->post('n_invoiceamount'),
						  'Date_Paid' => $this->input->post('n_datepaid'),
						  'Amount_Paid' => $this->input->post('n_amountpaid')
						);
				$this->update_model->financial_input_u($insert_data,$variable1,$variable2,$variable3);
				//print_r($insert_data);
				//exit();
				//echo $this->db->last_query();
				//exit();
			}
			else{
				$insert_data = array(
						  'Month' => $variable1,
						  'Year' => $variable2,
						  'Service_Code' => $variable3,
						  'Invoice_No' => $this->input->post('n_invoiceno'),
						  'Invoice_Date' => $this->input->post('n_invoicedate'),
						  'Service_Fee' => $this->input->post('n_servicefee'),
						  'Service_Tax' => $this->input->post('n_servicetax'),
						  'Invoice_Amount' => $this->input->post('n_invoiceamount'),
						  'Date_Paid' => $this->input->post('n_datepaid'),
						  'Amount_Paid' => $this->input->post('n_amountpaid')
						);
				$this->insert_model->financial_input($insert_data);
				//echo $this->db->last_query();
				//exit();
			}

}
function uploadassetimages($image){
	$this->db->insert('asset_images', $image);
}

function monp_scheduler($insert_data){
$this->db->insert('set_monthly_planner', $insert_data);
}
function monp_exist($value1,$dept,$value2,$date,$task,$value3,$monthyear,$user,$time,$color){
			$this->db->select($value1,$value2,$value3);
			$this->db->where($value1,$dept);
			$this->db->where($value2,$date);
			$this->db->where($value3,$monthyear);

			$query = $this->db->get('set_monthly_planner');
			if($query->num_rows()>0){
				$this->load->model('update_model');

				$insert_data = array(
						  'Work_Code' => $task,
						  'Color_Code' => $color,
						  'Timestamp' => date('Y-m-d H:i:s'),
						  'Action_flag' => 'U',
						  'User_ID' => $this->session->userdata('v_UserName')
						);
				$this->update_model->monp_scheduler_u($insert_data,$dept,$date,$monthyear);
				//echo $this->db->last_query();
				//exit();
			}
			else{
				$insert_data = array(
								  'Dept_Code' => $dept,
								  'Date' => $date,
								  'Work_Code' => $task,
								  'Month_Year' => $monthyear,
								  'Month' => substr($monthyear,0,2),
								  'Year' => substr($monthyear,2,4),
								  'Timestamp' => date('Y-m-d H:i:s'),
								  'Action_flag' => 'I',
								  'User_ID' => $user
								);
				$this->insert_model->monp_scheduler($insert_data);
				//echo $this->db->last_query();
				//exit();
			}

}
function weekp_scheduler($insert_data){
$this->db->insert('set_weekly_planner', $insert_data);
}
function weekp_exist($value1,$dept,$value2,$date,$task,$value3,$monthyear,$user,$time,$color){
			$this->db->select($value1,$value2,$value3);
			$this->db->where($value1,$dept);
			$this->db->where($value2,$date);
			$this->db->where($value3,$monthyear);

			$query = $this->db->get('set_weekly_planner');
			if($query->num_rows()>0){
				$this->load->model('update_model');

				$insert_data = array(
						  'Work_Code' => $task,
						  'Color_Code' => $color,
						  'Timestamp' => date('Y-m-d H:i:s'),
						  'Action_flag' => 'U',
						  'User_ID' => $this->session->userdata('v_UserName')
						);
				$this->update_model->weekp_scheduler_u($insert_data,$dept,$date,$monthyear);
				//echo $this->db->last_query();
				//exit();
			}
			else{
				$insert_data = array(
								  'Dept_Code' => $dept,
								  'Day' => $date,
								  'Work_Code' => $task,
								  'Month_Year' => $monthyear,
								  'Month' => substr($monthyear,0,2),
								  'Year' => substr($monthyear,2,4),
								  'Timestamp' => date('Y-m-d H:i:s'),
								  'Action_flag' => 'I',
								  'User_ID' => $user
								);
				$this->insert_model->weekp_scheduler($insert_data);
				//echo $this->db->last_query();
				//exit();
			}

}
function service_contract($insert_data){
$this->db->insert('asset_service_contract', $insert_data);
}
function service_contractexist($value1,$assetno){
			$this->db->select($value1);
			$this->db->where($value1,$assetno);

			$query = $this->db->get('asset_service_contract');
			if($query->num_rows()>0){
				$this->load->model('update_model');

				$insert_data = array(
						  'contract' => $this->input->post('n_Contract'),
						  'vendor' => $this->input->post('n_Vendor'),
						  'period' => $this->input->post('n_Period'),
						  'frequency' => $this->input->post('n_Frequency'),
						  'reference' => $this->input->post('n_Reference'),
						  'timestamp' => date('Y-m-d H:i:s'),
						  'action_flag' => 'U',
						);
				$this->update_model->service_contract_u($insert_data,$assetno);
				//echo $this->db->last_query();
				//exit();
			}
			else{
				$insert_data = array(
								  'asset_no' => $assetno,
								  'contract' => $this->input->post('n_Contract'),
								  'vendor' => $this->input->post('n_Vendor'),
								  'period' => $this->input->post('n_Period'),
								  'frequency' => $this->input->post('n_Frequency'),
								  'reference' => $this->input->post('n_Reference'),
								  'timestamp' => date('Y-m-d H:i:s'),
								  'action_flag' => 'I',
								);
				$this->insert_model->service_contract($insert_data);
				//echo $this->db->last_query();
				//exit();
			}

}
/*function assetimages_exist($image,$value1,$variable1,$value2,$variable2,$value3,$variable3){

			$this->db->select($value1,$value2,$value3);
			$this->db->where($value1,$variable1);
			$this->db->where($value2,$variable2);
			$this->db->where($value3,$variable3);

			$query = $this->db->get('asset_images');

			if($query->num_rows()<=6){

				$this->insert_model->uploadassetimages($image);
				//echo $this->db->last_query();
				//exit();
			}
}*/
function vendor_reg($insert_data){
$this->db->insert('pmis2_sa_vendor', $insert_data);
}
function jic_scheduler($insert_data){
$this->db->insert('set_jic_scheduler', $insert_data);
}
function jic_exist($value1,$job,$value2,$dept,$value3,$loc,$numcode,$value4,$monthyear,$value5,$jobdate,$value6,$jino){ //$stat
			$this->db->select($value1,$value2,$value3,$value4);
			$this->db->where($value1,$job);
			$this->db->where($value2,$dept);
			$this->db->where($value3,$loc);
			$this->db->where($value4,$monthyear);
			//$this->db->where($value5,$jobdate);
			$this->db->where($value6,$jino);

			$query = $this->db->get('set_jic_scheduler');
			if($query->num_rows()>0){
				$this->load->model('update_model');
				//if ($stat == 'U'){
				$insert_data = array(
						  'Num_Code' => ($numcode) ? $numcode : NULL,
						  'Job_Date' => $jobdate,
						  //'Month_Year' => $monthyear,
						  'Timestamp' => date('Y-m-d H:i:s'),
						  'Action_flag' => 'U',
						  'User_ID' => $this->session->userdata('v_UserName')
						);
				$this->update_model->jic_scheduler_u($insert_data,$job,$dept,$loc,$monthyear,$jino); //,$jobdate
				//}
				//echo $this->db->last_query();
				//exit();
			}
			else{
				$insert_data = array(
								  'ji_no' => $jino,
								  'Job_Items' => $job,
								  'Job_Date' => $jobdate,
								  'Num_Code' => ($numcode) ? $numcode : NULL,
								  'Loc_Code' => $loc,
								  'Dept_Code' => $dept,
								  'Month_Year' => $monthyear,
								  'Month' => substr($monthyear,0,2),
								  'Year' => substr($monthyear,2,4),
								  'Timestamp' => date('Y-m-d H:i:s'),
								  'Action_flag' => 'I',
								  'User_ID' => $this->session->userdata('v_UserName'),
								  'hospital_code' => $this->session->userdata('hosp_code')
								);
				$this->insert_model->jic_scheduler($insert_data);
				//echo $this->db->last_query();
				//exit();
			}

}
function statutory_exist($value1,$assetno,$value2,$id,$delete_chk){
	$this->db->select($value1,$value2);
	$this->db->where($value1,$assetno);
	$this->db->where($value2,$id);

	$query = $this->db->get('pmis2_egm_statutory');
	//echo $this->db->last_query();
	//exit();
	if($query->num_rows()>0){
		if ($delete_chk != 1){
			$insert_data = array(
				 		'v_authority'=>$this->input->post('n_Authorit'),
				 		'v_regno'=>$this->input->post('n_Registration_Number'),
				 		'v_cert_no'=>$this->input->post('n_Certificate_Number'),
				 		'd_certissdt'=>$this->input->post('n_Issued_On'),
				 		'd_inspdt'=>$this->input->post('n_Inspected_On'),
				 		'D_start'=>$this->input->post('n_Start_On'),
				 		'D_end'=>$this->input->post('n_End_On'),
				 		'v_actionflag'=>'U',
				 		'd_timestamp'=>date('Y-m-d H:i:s'),
				 		'v_GradeID'=>$this->input->post('n_Class_Grade'),
				 		'v_Remarks'=>$this->input->post('n_Remarks'),
				 		'user_add'=>$this->session->userdata('v_UserName')
			);
		}
		else{
			$insert_data = array(
				 		'v_actionflag'=>'D',
				 		'd_timestamp'=>date('Y-m-d H:i:s'),
				 		'user_add'=>$this->session->userdata('v_UserName')
			);
		}
		$this->load->model('update_model');
		$this->update_model->u_pmis2_egm_statutory($insert_data,$assetno,$id);

	}
	else{
		$insert_data = array(

					'v_asset_no'=>$this->input->post('assetno'),
			 		'v_authority'=>$this->input->post('n_Authorit'),
			 		'v_regno'=>$this->input->post('n_Registration_Number'),
			 		'v_cert_no'=>$this->input->post('n_Certificate_Number'),
			 		'd_certissdt'=>$this->input->post('n_Issued_On'),
			 		'd_inspdt'=>$this->input->post('n_Inspected_On'),
			 		'D_start'=>$this->input->post('n_Start_On'),
			 		'D_end'=>$this->input->post('n_End_On'),
			 		'V_hospitalcode'=>$this->session->userdata('hosp_code'),
			 		'v_actionflag'=>'I',
			 		'd_timestamp'=>date('Y-m-d H:i:s'),
			 		'v_GradeID'=>$this->input->post('n_Class_Grade'),
			 		'v_Remarks'=>$this->input->post('n_Remarks'),
			 		'user_add'=>$this->session->userdata('v_UserName')

		);
		$this->insert_model->pmis2_egm_statutory($insert_data);
	}
}

function clause_form($insert_data){

$this->db->insert('clause_tbl', $insert_data);
}

function clause_woexist($value,$variable){
			$this->db->select($value);
			$this->db->where($value,$variable);

			$query = $this->db->get('clause_tbl');

			if($query->num_rows()>0){
				$this->load->model('update_model');

				$insert_data = array(
						 'date_issued' => $this->input->post('n_clause_date'),
						 'clause_no' => $this->input->post('n_clause_no'),
						 'ref_no_notice' => $this->input->post('n_no_Letter'),
						 'close_main_status' => $this->input->post('n_closestat'),
						 'close_ref_no' => $this->input->post('n_Clause_Cancel'),
						 'close_date' => $this->input->post('n_feedback_d'),
						 'remrk_sho_mo' => $this->input->post('n_rmks_mo'),
						 'clause_chrono' => $this->input->post('n_clau_chrono'),
						 'date_medivest' => $this->input->post('n_medivest_dt'),
						 'discussion' => $this->input->post('n_staffnamedt'),
						 'expect_deli_dt' => $this->input->post('n_part_delivery'),
						 'amount' => $this->input->post('n_amount'),
						 'lpo_no_desc' => $this->input->post('n_lpono_desc'),
						 'vendor_name' => $this->input->post('n_vendor').' - '.$this->input->post('n_vendor_v'),
						 'mon_debit_mne' => $this->input->post('n_debitnote_dt'),
						 'root_cause' => $this->input->post('n_clauroot_cause'),
						 'dispute' => $this->input->post('n_dispute'),
						 'reason_dispute' => $this->input->post('n_disput_reason'),
						 'clause_implemen' => $this->input->post('n_clau_imp'),
						 'john_nm' => $this->input->post('n_johnname'),
						 'director_nm' => $this->input->post('n_directorname'),
						 'clause_rmk' => $this->input->post('n_clau_rmks'),
						 //'wo_no' => $RN,
						 'v_hospitalcode' => $this->session->userdata('hosp_code'),
						 'user_create' => $this->session->userdata('v_UserName'),
						 'actionflag' => 'U',
						 'timestamp' => date('Y-m-d H:i:s')
						);
				$this->update_model->clause_form_u($insert_data,$variable);
			}
			else{
				//$this->load->model('insert_model');
				$RN = $this->input->post('wrk_ord');
				$insert_data = array(
						 'date_issued' => $this->input->post('n_clause_date'),
						 'clause_no' => $this->input->post('n_clause_no'),
						 'ref_no_notice' => $this->input->post('n_no_Letter'),
						 'close_main_status' => $this->input->post('n_closestat'),
						 'close_ref_no' => $this->input->post('n_Clause_Cancel'),
						 'close_date' => $this->input->post('n_feedback_d'),
						 'remrk_sho_mo' => $this->input->post('n_rmks_mo'),
						 'clause_chrono' => $this->input->post('n_clau_chrono'),
						 'date_medivest' => $this->input->post('n_medivest_dt'),
						 'discussion' => $this->input->post('n_staffnamedt'),
						 'expect_deli_dt' => $this->input->post('n_part_delivery'),
						 'amount' => $this->input->post('n_amount'),
						 'lpo_no_desc' => $this->input->post('n_lpono_desc'),
						 'vendor_name' => $this->input->post('n_vendor').' - '.$this->input->post('n_vendor_v'),
						 'mon_debit_mne' => $this->input->post('n_debitnote_dt'),
						 'root_cause' => $this->input->post('n_clauroot_cause'),
						 'dispute' => $this->input->post('n_dispute'),
						 'reason_dispute' => $this->input->post('n_disput_reason'),
						 'clause_implemen' => $this->input->post('n_clau_imp'),
						 'john_nm' => $this->input->post('n_johnname'),
						 'director_nm' => $this->input->post('n_directorname'),
						 'clause_rmk' => $this->input->post('n_clau_rmks'),
						 'wo_no' => $RN,
						 'v_hospitalcode' => $this->session->userdata('hosp_code'),
						 'user_create' => $this->session->userdata('v_UserName'),
						 'actionflag' => 'I',
						 'timestamp' => date('Y-m-d H:i:s')
						);
//print_r($insert_data);
//exit();
				$this->insert_model->clause_form($insert_data);
			}
}

function acg_modulesf($insert_data){
$this->db->insert('acg_apb_prevcmv2', $insert_data);
}
function acgm_exist($value1,$variable1,$value2,$variable2,$value3,$variable3,$indicator_no){ //,$value4,$variable4,$value5,$variable5,$reqdate
		for ($i = 0;$i <= (count($variable3) - 1);$i++){

			$this->db->select($value1,$value2);
			$this->db->where($value1,$variable1[$i]);
			$this->db->where($value2,$variable2);
			$this->db->where($value3,$variable3[$i]);

			$query = $this->db->get('acg_apb_prevcmv2');

			if($query->num_rows()>0){
				//echo 'masuk update';
				$this->load->model('update_model');
				if ($variable2 == 'HKS'){
					$insert_data = array(
						  	//'v_ComplaintNo' => $variable1[$i],
						  	//'v_ServiceCode' => $variable2,
						  'v_Status' => $this->input->post('deduction')[$i],
						  'v_IndicatorNo1' => ($indicator_no[$i][0]) ? $indicator_no[$i][0] : NULL,
						  'v_IndicatorNo2' => ($indicator_no[$i][1]) ? $indicator_no[$i][1] : NULL,
						  'v_IndicatorNo3' => ($indicator_no[$i][2]) ? $indicator_no[$i][2] : NULL,
						  'v_IndicatorNo4' => ($indicator_no[$i][3]) ? $indicator_no[$i][3] : NULL,
						  'v_IndicatorNo5' => ($indicator_no[$i][4]) ? $indicator_no[$i][4] : NULL,
						  'v_IndicatorNo6' => ($indicator_no[$i][5]) ? $indicator_no[$i][5] : NULL,
						  'v_IndicatorNo7' => ($indicator_no[$i][6]) ? $indicator_no[$i][6] : NULL,
						  'v_IndicatorNo8' => ($indicator_no[$i][7]) ? $indicator_no[$i][7] : NULL,
						  'v_IndicatorNo9' => ($indicator_no[$i][8]) ? $indicator_no[$i][8] : NULL,
						  'v_IndicatorNo10' => ($indicator_no[$i][9]) ? $indicator_no[$i][9] : NULL,
						  'v_IndicatorNo11' => NULL,
						  //'n_DemirtPoint' =>
						  //'n_Deduction' =>
						  //'v_Remarks' =>
						  'v_VCM_Remarks' => $this->input->post('vcm_remarks')[$i],
						  //'v_VCM_Status' =>
						  	//'v_Month' => $this->input->post('fromMonth'),
						  	//'v_Year' => $this->input->post('fromYear'),
						  	//'d_VCMDate' => $this->input->post('req_date')[$i],
						  //'v_ThirdParty_Code' =>
						  	//'v_hospitalcode' => $this->session->userdata('hosp_code'),
						  'v_actionflag' => 'U',
						  'd_timestamp' => date("Y-m-d H:i:s"),
						  //'v_week' =>
						  //'v_source' =>
						  //'v_postVcm' =>
						  	//'v_requestno' => $variable3[$i]
						);
				}
				else{
					$insert_data = array(
						  	//'v_ComplaintNo' => $variable1[$i],
						  	//'v_ServiceCode' => $variable2,
						  'v_Status' => $this->input->post('deduction')[$i],
						  'v_IndicatorNo1' => ($indicator_no[$i][0]) ? $indicator_no[$i][0] : NULL,
						  'v_IndicatorNo2' => ($indicator_no[$i][1]) ? $indicator_no[$i][1] : NULL,
						  'v_IndicatorNo3' => ($indicator_no[$i][2]) ? $indicator_no[$i][2] : NULL,
						  'v_IndicatorNo4' => ($indicator_no[$i][3]) ? $indicator_no[$i][3] : NULL,
						  'v_IndicatorNo5' => ($indicator_no[$i][4]) ? $indicator_no[$i][4] : NULL,
						  'v_IndicatorNo6' => ($indicator_no[$i][5]) ? $indicator_no[$i][5] : NULL,
						  'v_IndicatorNo7' => ($indicator_no[$i][6]) ? $indicator_no[$i][6] : NULL,
						  'v_IndicatorNo8' => ($indicator_no[$i][7]) ? $indicator_no[$i][7] : NULL,
						  'v_IndicatorNo9' => ($indicator_no[$i][8]) ? $indicator_no[$i][8] : NULL,
						  'v_IndicatorNo10' => ($indicator_no[$i][9]) ? $indicator_no[$i][9] : NULL,
						  'v_IndicatorNo11' => ($indicator_no[$i][10]) ? $indicator_no[$i][10] : NULL,
						  //'n_DemirtPoint' =>
						  //'n_Deduction' =>
						  //'v_Remarks' =>
						  'v_VCM_Remarks' => $this->input->post('vcm_remarks')[$i],
						  //'v_VCM_Status' =>
						  	//'v_Month' => $this->input->post('fromMonth'),
						  	//'v_Year' => $this->input->post('fromYear'),
						  	//'d_VCMDate' => $this->input->post('req_date')[$i],
						  //'v_ThirdParty_Code' =>
						  	//'v_hospitalcode' => $this->session->userdata('hosp_code'),
						  'v_actionflag' => 'U',
						  'd_timestamp' => date("Y-m-d H:i:s"),
						  //'v_week' =>
						  //'v_source' =>
						  //'v_postVcm' =>
						  	//'v_requestno' => $variable3[$i]
						);
				}
				//print_r($insert_data);
				//exit();
				$this->update_model->acg_modulesf_u($insert_data,$variable3[$i],$variable2);
				//print_r($insert_data);
				//exit();
				//echo $this->db->last_query();
				//exit();
			}
			else{
				//echo 'masuk insert';
				if ($variable2 == 'HKS'){
					$insert_data = array(
						  'v_ComplaintNo' => $variable1[$i],
						  'v_ServiceCode' => $variable2,
						  'v_Status' => $this->input->post('deduction')[$i],
						  'v_IndicatorNo1' => ($indicator_no[$i][0]) ? $indicator_no[$i][0] : NULL,
						  'v_IndicatorNo2' => ($indicator_no[$i][1]) ? $indicator_no[$i][1] : NULL,
						  'v_IndicatorNo3' => ($indicator_no[$i][2]) ? $indicator_no[$i][2] : NULL,
						  'v_IndicatorNo4' => ($indicator_no[$i][3]) ? $indicator_no[$i][3] : NULL,
						  'v_IndicatorNo5' => ($indicator_no[$i][4]) ? $indicator_no[$i][4] : NULL,
						  'v_IndicatorNo6' => ($indicator_no[$i][5]) ? $indicator_no[$i][5] : NULL,
						  'v_IndicatorNo7' => ($indicator_no[$i][6]) ? $indicator_no[$i][6] : NULL,
						  'v_IndicatorNo8' => ($indicator_no[$i][7]) ? $indicator_no[$i][7] : NULL,
						  'v_IndicatorNo9' => ($indicator_no[$i][8]) ? $indicator_no[$i][8] : NULL,
						  'v_IndicatorNo10' => ($indicator_no[$i][9]) ? $indicator_no[$i][9] : NULL,
						  'v_IndicatorNo11' => NULL,
						  //'n_DemirtPoint' =>
						  //'n_Deduction' =>
						  //'v_Remarks' =>
						  'v_VCM_Remarks' => $this->input->post('vcm_remarks')[$i],
						  //'v_VCM_Status' =>
						  'v_Month' => $this->input->post('fromMonth'),
						  'v_Year' => $this->input->post('fromYear'),
						  'd_VCMDate' => $this->input->post('req_date')[$i],
						  //'v_ThirdParty_Code' =>
						  'v_hospitalcode' => $this->session->userdata('hosp_code'),
						  'v_actionflag' => 'I',
						  'd_timestamp' => date("Y-m-d H:i:s"),
						  //'v_week' =>
						  //'v_source' =>
						  //'v_postVcm' =>
						  'v_requestno' => $variable3[$i]
						);
				}
				else{
					$insert_data = array(
						  'v_ComplaintNo' => $variable1[$i],
						  'v_ServiceCode' => $variable2,
						  'v_Status' => $this->input->post('deduction')[$i],
						  'v_IndicatorNo1' => ($indicator_no[$i][0]) ? $indicator_no[$i][0] : NULL,
						  'v_IndicatorNo2' => ($indicator_no[$i][1]) ? $indicator_no[$i][1] : NULL,
						  'v_IndicatorNo3' => ($indicator_no[$i][2]) ? $indicator_no[$i][2] : NULL,
						  'v_IndicatorNo4' => ($indicator_no[$i][3]) ? $indicator_no[$i][3] : NULL,
						  'v_IndicatorNo5' => ($indicator_no[$i][4]) ? $indicator_no[$i][4] : NULL,
						  'v_IndicatorNo6' => ($indicator_no[$i][5]) ? $indicator_no[$i][5] : NULL,
						  'v_IndicatorNo7' => ($indicator_no[$i][6]) ? $indicator_no[$i][6] : NULL,
						  'v_IndicatorNo8' => ($indicator_no[$i][7]) ? $indicator_no[$i][7] : NULL,
						  'v_IndicatorNo9' => ($indicator_no[$i][8]) ? $indicator_no[$i][8] : NULL,
						  'v_IndicatorNo10' => ($indicator_no[$i][9]) ? $indicator_no[$i][9] : NULL,
						  'v_IndicatorNo11' => ($indicator_no[$i][10]) ? $indicator_no[$i][10] : NULL,
						  //'n_DemirtPoint' =>
						  //'n_Deduction' =>
						  //'v_Remarks' =>
						  'v_VCM_Remarks' => $this->input->post('vcm_remarks')[$i],
						  //'v_VCM_Status' =>
						  'v_Month' => $this->input->post('fromMonth'),
						  'v_Year' => $this->input->post('fromYear'),
						  'd_VCMDate' => $this->input->post('req_date')[$i],
						  //'v_ThirdParty_Code' =>
						  'v_hospitalcode' => $this->session->userdata('hosp_code'),
						  'v_actionflag' => 'I',
						  'd_timestamp' => date("Y-m-d H:i:s"),
						  //'v_week' =>
						  //'v_source' =>
						  //'v_postVcm' =>
						  'v_requestno' => $variable3[$i]
						);
				}
				//exit();
				$this->insert_model->acg_modulesf($insert_data);
				//echo $this->db->last_query();
				//exit();
			}

		}
		//exit();
}

function audit_log($buat){
$insert_data = array(
						 'dtstamp' => date("Y-m-d H:i:s"),
						 'workdone'=> $buat,
						 'userid'=> $this->session->userdata('v_UserName'),
						 'hosp' => $this->session->userdata('hosp_code'),
						 'radd' => $this->input->ip_address(),
						 'rhost'=> $this->input->ip_address()
						);
$this->db->insert('whatrudoin', $insert_data);

//echo $this->db->last_query();

		//exit();
}

function fileatt_bank($insert_data){
	$this->db->insert('battachments_details',$insert_data);
}

function booking_main($booking_array){
	$this->db->insert('booking_main',$booking_array);
}
function booking_detail($insert_data){
	$this->db->insert_batch('booking_details',$insert_data);
}

function linkwo_form($insert_data){
$this->db->insert('pmis2_egm_sharedowntime', $insert_data);
}

function link_woexist($value,$variable){
			$this->db->select($value);
			$this->db->where($value,$variable);

			$query = $this->db->get('pmis2_egm_sharedowntime');

			if($query->num_rows()>0){
				$this->load->model('update_model');

				$insert_data = array(
						'd_timestamp'=> date("Y-m-d H:i:s"),
						'link_wo' => $this->input->post('n_link'),
						'v_userid' => $this->session->userdata('v_UserName')
						);
				$this->update_model->linkwo_form_u($insert_data,$this->input->post('wrk_ord'));
				//echo $this->db->last_query();
				//exit();
			}
			else{
				$insert_data = array(
						'd_timestamp'=> date("Y-m-d H:i:s"),
						'ori_wo' => $this->input->post('wrk_ord'),
						'link_wo' => $this->input->post('n_link'),
						'v_userid' => $this->session->userdata('v_UserName')
						);
				$this->insert_model->linkwo_form($insert_data);
				//echo $this->db->last_query();
				//exit();
			}

}

function license_image_i($insert_data){
	$this->db->insert('license_images', $insert_data);
}

function license_image($insert_data){
	$this->db->select('licenses_no');
	$this->db->where('licenses_no',$insert_data['licenses_no']);

	$query = $this->db->get('license_images');

	if($query->num_rows()>0){
		$this->load->model('update_model');
		$this->update_model->license_image_u($insert_data);
	}
	else{
		$this->insert_model->license_image_i($insert_data);
	}
}

function fdr_insert($insert_data){
	$this->db->insert('fes_dailyreport',$insert_data);
}
function fdr_exist($value1,$variable1,$value2,$variable2,$mi_description,$mi_rootcause,$mi_actiontaken,$othermatter,$action_by){
	$this->db->select($value1,$value2);
	$this->db->where($value1,$variable1);
	$this->db->where($value2,$variable2);

	$query = $this->db->get('fes_dailyreport');

	if($query->num_rows()>0){
		$this->load->model('update_model');

		$insert_data = array(
				'mi_description' => $mi_description,
				'mi_rootcause' => $mi_rootcause,
				'mi_actiontaken' => $mi_actiontaken,
				'othermatter' => $othermatter,
				'action_by' => $action_by,
				'timestamp' => date('Y-m-d H:i:s')
				);
		$this->update_model->fdr_update($insert_data,$variable1,$variable2);
		//echo $this->db->last_query();
		//exit();
	}
	else{
		$insert_data = array(
				'month'=> $variable1,
				'year' => $variable2,
				'mi_description' => $mi_description,
				'mi_rootcause' => $mi_rootcause,
				'mi_actiontaken' => $mi_actiontaken,
				'othermatter' => $othermatter,
				'action_by' => $action_by,
				'timestamp' => date('Y-m-d H:i:s')
				);
		$this->insert_model->fdr_insert($insert_data);
		//echo $this->db->last_query();
		//exit();
	}

}

function ud_setup($value1,$variable1,$value2,$variable2){
	$this->db->select($value1,$value2);
	$this->db->where($value1,$variable1);
	$this->db->or_where($value2,$variable2);
	//$this->db->where($where);
	$this->db->where('v_HospitalCode',$this->session->userdata('hosp_code'));

	$query = $this->db->get('pmis2_sa_userdept');

	if($query->num_rows()<=0){
		$insert_data = array(
				'v_UserDeptCode'=> $this->input->post('n_ud_code'),
				'v_UserDeptDesc' => $this->input->post('n_Description'),
				'v_mohcode' => $this->input->post('n_moh'),
				'v_mohdesc' => $this->input->post('n_mohdesc'),
				'v_HospitalCode' => $this->session->userdata('hosp_code'),
				'd_Timestamp' => date("Y-m-d H:i:s"),
				'v_ActionFlag' => 'I',
				);
		//print_r($insert_data);
		//exit();
		$this->db->insert('pmis2_sa_userdept',$insert_data);
		$id = $this->db->insert_id();
		return $id;
		//echo $this->db->last_query();
		//exit();
	}
	else{
		return 0;
	}

}
function personnel_admin($value1,$variable1){
	$this->db->select($value1);
	$this->db->where($value1,$variable1);

	$query = $this->db->get('pmis2_sa_personal');

	if($query->num_rows()<=0){
		$insert_data = array(
				'v_PersonalCode'=> $this->input->post('n_p_code'),
				'v_PersonalName' => $this->input->post('n_p_Name'),
				'v_PersonalLabGrd' => $this->input->post('n_l_Grade'),
				'v_hourlyrate' => $this->input->post('n_h_rate'),
				'v_PersonalbasLoc' => $this->input->post('n_b_location'),
				'v_PersonalSerCode' => $this->input->post('n_s_Code'),
				'v_PersonalDesc' => $this->input->post('n_s_Description'),
				'v_PersonalCalno'=> $this->input->post('n_c_Calender'),
				'd_PersonalDStart' => date("Y-m-d H:i:s",strtotime($this->input->post('n_d_Start'))),
				'd_PersonalDEnd' => date("Y-m-d H:i:s",strtotime($this->input->post('n_d_End'))),
				'v_AccessStatus' => $this->input->post('n_a_status'),
				'v_HospitalCode' => $this->input->post('n_h_Code'),
				'v_designation' => $this->input->post('n_Designation'),
				'v_PersonalprevLoc' => $this->input->post('n_p_Location'),
				'v_ActiveStatus' => $this->input->post('n_ac_status'),
				'd_timestamp' => date("Y-m-d H:i:s"),
				'v_Actionflag' => 'I',
				);
		//print_r($insert_data);
		//exit();
		$this->db->insert('pmis2_sa_personal',$insert_data);
		$id = $this->db->insert_id();
		return $id;
		//echo $this->db->last_query();
		//exit();
	}
	else{
		return 0;
	}

}

function tbl_vendor($insert_data){
	$this->db->insert('tbl_vendor',$insert_data);
}
function tbl_vendor_info($insert_data){
	$this->db->insert('tbl_vendor_info',$insert_data);
}

function newmrin($insert_data){
	$this->db->insert('tbl_materialreq',$insert_data);
}
function component_details($insert_data){
	$this->db->insert('component_details',$insert_data);
	$id = $this->db->insert_id();
	return $id;
}
function attachment_details($insert_data){
	$this->db->insert('attachments_details',$insert_data);
	$id = $this->db->insert_id();
	return $id;
}
function pocom_details($insert_data){
	$this->db->insert('po_compodetails',$insert_data);
	$id = $this->db->insert_id();
	return $id;
}
function poattachment_details($insert_data){
	$this->db->insert('poattach_details',$insert_data);
	$id = $this->db->insert_id();
	return $id;
}
function insertmrincomp_b($insert_data){
	$this->db->insert_batch('tbl_mirn_comp',$insert_data);
}

function insertmrincomp($insert_data){
	$this->db->insert('tbl_mirn_comp',$insert_data);
}

function mrin_payment($insert_data){
	$this->db->insert('tbl_mirn_payment',$insert_data);
}

function in_pr($insert_data){
	$this->db->insert('tbl_pr_mirn',$insert_data);
}

function tbl_pr($insert_data){
	$this->db->insert('tbl_pr',$insert_data);
}

function tbl_pr_apprv($insert_data){
	$this->db->insert('tbl_pr_apprv',$insert_data);
}

function tbl_po_mirn($insert_data){
	$this->db->insert('tbl_po_mirn',$insert_data);
}

function tbl_po($insert_data){
	$this->db->insert('tbl_po',$insert_data);
}
function ins_itembaru($insert_data){
	$this->db->select('*');
	$this->db->from('tbl_invitem');
	$this->db->where('ItemCode', $insert_data['ItemCode']);
	$query = $this->db->get();

	if($query->num_rows()>0){
		return 0;
	}else{
		$this->db->insert('tbl_invitem', $insert_data);
		return 1;
	}
	// echo $this->db->last_query();
	// exit();
}


		function tbl_rn_item($insert_data){

		$this->db->insert('tbl_rn_item', $insert_data);


		}

		function tbl_rn_release($insert_data){
		$this->db->set("Date_Stamp", "NOW()", FALSE);
		$this->db->insert('tbl_rn_release', $insert_data);


		}

		public function save_release_note(){
			//echo $this->input->post("area");
			//exit();


			$this->load->model("get_model");
			$this->load->model('update_model');
			$rn_no = $this->get_model->get_RNNO($this->input->post("area"));
			$val_tbl_rn_release = array(
						"RN_No" => $rn_no,
						"User_Release" => $this->session->userdata("v_UserName"),
						"rn_status" => $this->input->post("rn_status"),
						"shipment_type" => $this->input->post("shipment_type"),
						"courier" => $this->input->post("courier"),
						"consignment_note" => $this->input->post("consignment_note"),
						"consignment_date" => date('Y-m-d H:s:i', strtotime($this->input->post("consignment_date"))),
						"accessories" => $this->input->post("accessories")
			);
			$this->db->set("Date_Stamp", "NOW()", FALSE);

			$this->db->trans_begin();

			$this->db->insert("tbl_rn_release", $val_tbl_rn_release);

			if(isset($_POST["itemCode"])){
				$itemCodeVal = count($_POST["itemCode"]);
				for( $i=0; $i<$itemCodeVal;$i++ ){
					if($this->input->post("qty_rls")[$i] <> ''){
					$val_tbl_rn_item[$i] = array(
							"RN_No" => $rn_no,
							"MRIN_No" => $this->input->post("MIRNcode")[$i],
							"Item_Code" => $this->input->post("itemCode")[$i],
							"Qty" => $this->input->post("qty_rls")[$i],
							//"Price" => $this->input->post("Price_Taken")[$i]
					);

			$this->db->where('ItemCode', $this->input->post("itemCode")[$i]);
			//$this->db->where('Hosp_code', $this->input->post("area"));
			$this->db->where('Hosp_code', $this->input->get("id"));
			$this->db->limit(1);
			$this->db->where('Action_Flag <>', 'D');
				$query = $this->db->get('tbl_item_store_qty')->result();
				//echo $this->db->last_query();
				//echo "nilai : ".$quantiti."lalala".$query[0]->Qty."hjhjh".$this->input->post("qty_rls")[$i];
				//print_r($this->input->post("qty_rls"));
				//exit();
			$quantiti = ($query[0]->Qty) - ($this->input->post("qty_rls")[$i]);
			//$tblmovement = array('ItemCode'=>$this->input->post("itemCode")[$i],'Store_Id'=>$this->input->post("area"),'Time_Stamp'=>date('Y-m-d H:i:s'),'Qty_Before'=>$query[0]->Qty,'Qty_Taken'=>$this->input->post("qty_rls")[$i],'Action_Flag'=>'I','Last_User_Update'=>$this->session->userdata('v_UserName'),'Related_WO'=>$this->input->post("MIRNcode")[$i],'Remark'=>'Take from RN');
			$tblmovement = array('ItemCode'=>$this->input->post("itemCode")[$i],'Store_Id'=>$this->input->get("id"),'Time_Stamp'=>date('Y-m-d H:i:s'),'Qty_Before'=>$query[0]->Qty,'Qty_Taken'=>$this->input->post("qty_rls")[$i],'Action_Flag'=>'I','Last_User_Update'=>$this->session->userdata('v_UserName'),'Related_WO'=>$this->input->post("MIRNcode")[$i],'Remark'=>'Take from RN');
			$data=array('Last_User_Update'=>$this->session->userdata('v_UserName'),'Action_Flag'=>'U','Time_Stamp'=>date('Y-m-d H:i:s'),'Qty'=>$quantiti);
						//$this->update_model->store_take_update($this->input->post("itemCode")[$i],$this->input->post("area"),$data);
						$this->update_model->store_take_update($this->input->post("itemCode")[$i],$this->input->get("id"),$data);
				$this->db->insert('tbl_item_movement', $tblmovement);
				}}
			$this->db->insert_batch("tbl_rn_item", $val_tbl_rn_item);



			}


			$this->db->trans_complete();
//echo $this->db->last_query();
//exit();
			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				return FALSE;
			}
			else {
				$this->db->trans_commit();
				return TRUE;
			}
		}

		function insert_data($table, $primary_col, $data){
		ini_set('max_execution_time', 0);
		ini_set('memory_limit', '1024M');
		//memory_limit=512M (set this size on php.ini)

		$old_data = $this->db->query("select `".$primary_col."` from ".$table);
		$old_data_arr = array_column($old_data->result_array(), $primary_col);

		if( !empty($data) ){
			for($i=0; $i < count($data); $i++ ){
				$operation = "insert";
				$primary = "";
				foreach ($data[$i] as $k => $v) {
					if($k==$primary_col){
						if( in_array($v, $old_data_arr) ){
							$operation = "update";
							$primary= $v;
						}
					}
					if( preg_match('/\s/',$k) ){
						$this->db->set("`".stripcslashes(stripcslashes($k))."`", "'".stripcslashes(stripcslashes($v))."'", false);
						unset($data[$i][$k]);
					}
				}

				if( $operation=="update" ){
					$col = explode(" ", $primary_col);

					$this->db->where_in("`".$primary_col."`", "select `".$primary_col."` from `".$table."` `b` where `b`.`id`=`a`.`id` and `b`.`".$primary_col."`='".$primary."'");
					if( !$this->db->update($table." a", $data[$i]) ){
						return array("status"=>false, "msg"=>"update failed", "row"=>$i, "query"=>$this->db->last_query());
					}else{
						if( $i==(count($data)-1) ){
							return array("status"=>true, "msg"=>"Update success. ".$i." row updated", "row"=>$i);
						}else{
							continue;
						}
					}
				}else{
					if( !$this->db->insert($table, $data[$i]) ){
						return array("status"=>false, "msg"=>"insert failed", "row"=>$i, "query"=>$this->db->last_query());
					}else{
						if( $i==(count($data)-1) ){
							return array("status"=>true, "msg"=>"insert success. ".$i." row inserted", "row"=>$i);
						}
					}
				}
			}
		}

		}

		function chronology_woexist($value,$variable,$value1,$variable1){
					$this->db->select($value);
					$this->db->where($value,$variable);
					$this->db->where($value1,$variable1);
					$this->db->where('v_HospitalCode',$this->session->userdata('hosp_code'));

					$query1 = $this->db->get('pmis2_emg_chronology');
					//$query2 = $this->db->get('pmis2_emg_jobvisit1tow');
					$RN = $this->input->post('wrk_ord');

					if($query1->num_rows()>0){

						$this->load->model('update_model');

						$insert_data = array(
								 'v_ActionTaken' => $this->input->post('n_Action_Taken'),
								 'v_ReschAuthBy' => $this->input->post('n_Type_of_Work'),
								 'n_Spares' => $this->input->post('movement'),
								 'v_Actionflag' => 'U',
								 'd_Timestamp' => date("Y-m-d H:i:s")
								);
								$this->update_model->chronology_update($variable1,$RN,$insert_data);
						//print_r($insert_data);
						//echo '<br><br>';
						//add if to prevent data coruption
					} else {
					$insert_data = array(
							 'v_WrkOrdNo'=> $RN,
							 'v_ActionTaken' => $this->input->post('n_Action_Taken'),
							 'v_ReschAuthBy' => $this->input->post('n_Type_of_Work'),
							 'n_Spares' => $this->input->post('movement'),
							 'v_Actionflag' => 'I',
							 'd_Timestamp' => date("Y-m-d H:i:s"),
							 'v_HospitalCode' => $this->session->userdata('hosp_code'),
						 	 'n_Visit' => $variable1);
					$this->db->insert('pmis2_emg_chronology', $insert_data);
					}


		}

		function personnelinvolved_exist($wrkOrd){
			$this->db->select('*');
			$this->db->from('pmis2_emg_jobresponse');
			$this->db->where('v_WrkOrdNo', $wrkOrd);
			$this->db->where('v_HospitalCode',$this->session->userdata('hosp_code'));
			$query = $this->db->get();
			// echo $this->db->last_query();
			// echo $this->input->post('v_personal1');
			// exit();
			$query_result = $query->result();

			if($query->num_rows()>0){
					$this->load->model('update_model');
					$insert_data = array(
						'v_Personal1' => $this->input->post('v_personal1'), 
						'v_Personal2' => $this->input->post('v_personal2'), 
						'v_Personal3' => $this->input->post('v_personal3'), 
						'n_Hours1' => $this->input->post('v_hour1'), 
						'n_Hours2' => $this->input->post('v_hour2'), 
						'n_Hours3' => $this->input->post('v_hour3'), 
						'n_Rate1' => $this->input->post('v_rate1'), 
						'n_Rate2' => $this->input->post('v_rate2'), 
						'n_Rate3' => $this->input->post('v_rate3'), 
						'n_Total1' => $this->input->post('v_total1'), 
						'n_Total2' => $this->input->post('v_total2'), 
						'n_Total3' => $this->input->post('v_total3'), 
						'v_Actionflag' => 'U',
					);
					$this->update_model->personnelinvolved_update($wrkOrd,$insert_data);
			}else{

				$insert_data = array(
					'v_WrkOrdNo'=> $wrkOrd,
					'v_Personal1' => $this->input->post('v_personal1'), 
					'v_Personal2' => $this->input->post('v_personal2'), 
					'v_Personal3' => $this->input->post('v_personal3'), 
					'n_Hours1' => $this->input->post('v_hour1'), 
					'n_Hours2' => $this->input->post('v_hour2'), 
					'n_Hours3' => $this->input->post('v_hour3'), 
					'n_Rate1' => $this->input->post('v_rate1'), 
					'n_Rate2' => $this->input->post('v_rate2'), 
					'n_Rate3' => $this->input->post('v_rate3'), 
					'n_Total1' => $this->input->post('v_total1'), 
					'n_Total2' => $this->input->post('v_total2'), 
					'n_Total3' => $this->input->post('v_total3'), 
					'v_Actionflag' => 'I',
					'd_Timestamp' => date("Y-m-d H:i:s"),
					'v_HospitalCode' => $this->session->userdata('hosp_code'),
			 );
			 $this->db->insert('pmis2_emg_jobresponse', $insert_data);
			 
			}
			
			

		}

		function insert_PO_del_item($insert_data){
			// print_r($insert_data);
			// exit();
			$this->db->insert('tbl_po_del_item', $insert_data);
			
		}

}
?>
