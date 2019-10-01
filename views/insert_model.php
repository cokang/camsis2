<?php
class insert_model extends CI_Model{
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

//echo $this->db->last_query();
		
		//exit();
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

//echo $this->db->last_query();
		
		//exit();
}

function pmis2_egm_statutory($insert_data){

$this->db->insert('pmis2_egm_statutory', $insert_data);

//echo $this->db->last_query();
		
		//exit();
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
						'type_of_work' => $this->input->post('n_Type_of_Work')
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
						'd_pfsdate' => date('Y-m-d ', strtotime($this->input->post('n_PFStartDate'))).$this->input->post('n_PFStartHH').':'.str_pad($this->input->post('n_PFStartNN'), 2, 0, STR_PAD_LEFT),
						'd_pfedate' => date('Y-m-d ', strtotime($this->input->post('n_PFEndDate'))).$this->input->post('n_PFEndHH').':'.str_pad($this->input->post('n_PFEndNN'), 2, 0, STR_PAD_LEFT),
						'n_Downtime' => $this->input->post('down_time'),
						'n_Servicetime' => $this->input->post('serv_time'),
						'n_Completiontime' => $this->input->post('comp_time'),
						'v_QCPPM' => $this->input->post('QC_PPM'),
						'v_QCuptime' => $this->input->post('n_QCUptime'),

						'v_AcceptedBy' => $this->input->post('n_Accepted_By'),
						'd_AcceptedDt' => date('Y-m-d', strtotime($this->input->post('n_job_Date'))),
						'V_ACCEPTED_Designation' => $this->input->post('n_Designation'),
						);
				$this->update_model->job_form($insert_data);
				
				$this->load->model('update_model');
				$RN = $this->input->post('wrk_ord');
				if (substr($RN,0,2) == 'PP'){
				$this->load->model('display_model');
				$data['rsch'] = $this->display_model->jobclose_ppm($RN);
				$this->load->model('update_model');
				if (isset($data['rsch'][0]->d_Reschdt)) {
				$insert_data = array(
						'v_Wrkordstatus' => "CR",
						'v_closeddate' => date('Y-m-d ', strtotime($this->input->post('n_job_Date'))).$this->input->post('n_JChour').':'.str_pad($this->input->post('n_JCmin'), 2, 0, STR_PAD_LEFT),
						'v_closedtime' => $this->input->post('n_JChour').':'.str_pad($this->input->post('n_JCmin'), 2, 0, STR_PAD_LEFT),
						'closedby' => $this->session->userdata('v_UserName'),
					);
				$this->update_model->pmis2_egm_schconfirmmon($insert_data);
				}
				else{
					$insert_data = array(
						'v_Wrkordstatus' => "C",
						'v_closeddate' => date('Y-m-d ', strtotime($this->input->post('n_job_Date'))).$this->input->post('n_JChour').':'.str_pad($this->input->post('n_JCmin'), 2, 0, STR_PAD_LEFT),
						'v_closedtime' => $this->input->post('n_JChour').':'.str_pad($this->input->post('n_JCmin'), 2, 0, STR_PAD_LEFT),
						'closedby' => $this->session->userdata('v_UserName'),
					);
				$this->update_model->pmis2_egm_schconfirmmon($insert_data);
				}
				}
				else{
				$insert_data = array(
						'V_request_status' => "C",
						'v_closeddate' => date('Y-m-d ', strtotime($this->input->post('n_job_Date'))).$this->input->post('n_JChour').':'.str_pad($this->input->post('n_JCmin'), 2, 0, STR_PAD_LEFT),
						'v_closedtime' => $this->input->post('n_JChour').':'.str_pad($this->input->post('n_JCmin'), 2, 0, STR_PAD_LEFT),
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
						'd_pfsdate' => date('Y-m-d ', strtotime($this->input->post('n_PFStartDate'))).$this->input->post('n_PFStartHH').':'.str_pad($this->input->post('n_PFStartNN'), 2, 0, STR_PAD_LEFT),
						'd_pfedate' => date('Y-m-d ', strtotime($this->input->post('n_PFEndDate'))).$this->input->post('n_PFEndHH').':'.str_pad($this->input->post('n_PFEndNN'), 2, 0, STR_PAD_LEFT),
						'n_Downtime' => $this->input->post('down_time'),
						'n_Servicetime' => $this->input->post('serv_time'),
						'n_Completiontime' => $this->input->post('comp_time'),
						'v_QCPPM' => $this->input->post('QC_PPM'),
						'v_QCuptime' => $this->input->post('n_QCUptime'),

						'v_AcceptedBy' => $this->input->post('n_Accepted_By'),
						'd_AcceptedDt' => date('Y-m-d', strtotime($this->input->post('n_job_Date'))),
						'V_ACCEPTED_Designation' => $this->input->post('n_Designation'),
						);
				$this->insert_model->job_form($insert_data);
				
				$this->load->model('update_model');
				$RN = $this->input->post('wrk_ord');
				if (substr($RN,0,2) == 'PP'){
				$this->load->model('display_model');
				$data['rsch'] = $this->display_model->jobclose_ppm($RN);
				$this->load->model('update_model');
				if (isset($data['rsch'][0]->d_Reschdt)) {
				$insert_data = array(
						'v_Wrkordstatus' => "CR",
						'v_closeddate' => date('Y-m-d ', strtotime($this->input->post('n_job_Date'))).$this->input->post('n_JChour').':'.str_pad($this->input->post('n_JCmin'), 2, 0, STR_PAD_LEFT),
						'v_closedtime' => $this->input->post('n_JChour').':'.str_pad($this->input->post('n_JCmin'), 2, 0, STR_PAD_LEFT),
						'closedby' => $this->session->userdata('v_UserName'),
					);
				$this->update_model->pmis2_egm_schconfirmmon($insert_data);
				}
				else{
					$insert_data = array(
						'v_Wrkordstatus' => "C",
						'v_closeddate' => date('Y-m-d ', strtotime($this->input->post('n_job_Date'))).$this->input->post('n_JChour').':'.str_pad($this->input->post('n_JCmin'), 2, 0, STR_PAD_LEFT),
						'v_closedtime' => $this->input->post('n_JChour').':'.str_pad($this->input->post('n_JCmin'), 2, 0, STR_PAD_LEFT),
						'closedby' => $this->session->userdata('v_UserName'),
					);
				$this->update_model->pmis2_egm_schconfirmmon($insert_data);
				}
				}
				else{
				$insert_data = array(
						'V_request_status' => "C",
						'v_closeddate' => date('Y-m-d ', strtotime($this->input->post('n_job_Date'))).$this->input->post('n_JChour').':'.str_pad($this->input->post('n_JCmin'), 2, 0, STR_PAD_LEFT),
						'v_closedtime' => $this->input->post('n_JChour').':'.str_pad($this->input->post('n_JCmin'), 2, 0, STR_PAD_LEFT),
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
						'v_Monyr' => $this->input->post('vcm_month').'/'.$this->input->post('vcm_year'),
						'd_follow_startdate' => ($this->input->post('n_startdate')) ? date('Y-m-d ', strtotime($this->input->post('n_startdate'))).$this->input->post('n_starttime') : NULL,
						'd_follow_enddate' => ($this->input->post('n_enddate')) ? date('Y-m-d ', strtotime($this->input->post('n_enddate'))).$this->input->post('n_endtime') : NULL,
						'v_follow_starttime' => $this->input->post('n_starttime'),
						'v_follow_endtime' => $this->input->post('n_endtime'),
						'v_Remark' => $this->input->post('n_actiontaken'),
						'v_PersonnelCode' => $this->input->post('n_personnel_code'),
						'd_Timestamp' => date('Y-m-d H:i:s'),
						'v_ActionFlag' => 'U',
						);
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
						'v_Monyr' => $this->input->post('vcm_month').'/'.$this->input->post('vcm_year'),
						'd_follow_startdate' => ($this->input->post('n_startdate')) ? date('Y-m-d ', strtotime($this->input->post('n_startdate'))).$this->input->post('n_starttime') : NULL,//$this->input->post('n_startdate'),
						'd_follow_enddate' => ($this->input->post('n_enddate')) ? date('Y-m-d ', strtotime($this->input->post('n_enddate'))).$this->input->post('n_endtime') : NULL,//$this->input->post('n_enddate'),
						'v_follow_starttime' => $this->input->post('n_starttime'),
						'v_follow_endtime' => $this->input->post('n_endtime'),
						'v_Remark' => $this->input->post('n_actiontaken'),
						'v_PersonnelCode' => $this->input->post('n_personnel_code'),
						'd_Timestamp' => date('Y-m-d H:i:s'),
						'v_ActionFlag' => 'I',
						'v_HospitalCode' => 'IIUM',
						);
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
				$this->update_model->assetmaintenance_form($insert_data);
				//echo $this->db->last_query();
				//exit();
			}
			else{
				
				//$this->load->model('insert_model');
				$RN = $this->input->post('wrk_ord');
				$insert_data = array(
						'v_ServiceCode'=> 'BES',
						'v_ComplaintNo' => $this->input->post('cmplnt_no'),
						'v_Monyr' => $this->input->post('vcm_month').'/'.$this->input->post('vcm_year'),
						'd_follow_startdate' => ($this->input->post('n_startdate')) ? date('Y-m-d ', strtotime($this->input->post('n_startdate'))).$this->input->post('n_starttime') : NULL,//$this->input->post('n_startdate'),
						'd_follow_enddate' => ($this->input->post('n_enddate')) ? date('Y-m-d ', strtotime($this->input->post('n_enddate'))).$this->input->post('n_endtime') : NULL,//$this->input->post('n_enddate'),
						'v_follow_starttime' => $this->input->post('n_starttime'),
						'v_follow_endtime' => $this->input->post('n_endtime'),
						'v_Remark' => $this->input->post('n_actiontaken'),
						'v_PersonnelCode' => $this->input->post('n_personnel_code'),
						'd_Timestamp' => date('Y-m-d H:i:s'),
						'v_ActionFlag' => 'I',
						'v_HospitalCode' => 'IIUM',
						);
				$this->insert_model->assetmaintenance_form($insert_data);
				//echo $this->db->last_query();
				//exit();
			}

}

}
?>
 	