<?php
   class Update_model extends CI_Model{
function __construct() {
parent::__construct();
}

function create_form($insert_data){
	$RN = $this->input->post('wrk_ord');
	if (($RN != NULL) || ($RN != '')) {
	$this->db->where('V_Request_no',$RN);
	$this->db->where('V_hospitalcode',$this->session->userdata('hosp_code'));
	$this->db->update('pmis2_egm_service_request', $insert_data);
	}
	}

function update_pmis2_egm_assetregistration($insert_data){
	$this->db->where('V_Hospitalcode',$this->session->userdata('hosp_code'));
	$this->db->where('V_Asset_no',$insert_data['V_Asset_no']);
	$this->db->where('V_service_code',$this->session->userdata('usersess'));
	$this->db->update('pmis2_egm_assetregistration', $insert_data);
	}

function update_pmis2_egm_assetreg_general($insert_data){
	$this->db->where('V_Hospital_code',$this->session->userdata('hosp_code'));
	$this->db->where('V_Asset_no',$insert_data['V_Asset_no']);
	$this->db->update('pmis2_egm_assetreg_general', $insert_data);
	}

function update_ap_VO_VVFDetails($insert_data){
	$this->db->where('vvfActionflag <> ','D');
	$this->db->where('vvfassetno',$insert_data['V_Asset_no']);
	$this->db->where('vvfHospitalcode',$this->session->userdata('hosp_code'));
	$this->db->update('ap_vo_vvfdetails', $insert_data);
	}

function pmis2_egm_accesories($insert_data){
  $this->db->where('v_hospitalcode',$this->session->userdata('hosp_code'));
	$this->db->where('v_accesoriescode',$insert_data['v_accesoriescode']);
	$this->db->where('v_assetno',$insert_data['v_assetno']);
	$this->db->update('pmis2_egm_accesories', $insert_data);
	//echo $this->db->last_query();
	//exit();

	}

function pmis2_egm_lnc_lincense_details($insert_data,$liccd){
  $this->db->where('id',$liccd);
	$this->db->where('v_ServiceCode',$this->session->userdata('usersess'));
	$this->db->where('v_HospitalCode',$this->session->userdata('hosp_code'));
	$this->db->update('pmis2_egm_lnc_lincense_details', $insert_data);


	}

function response_form($insert_data){
	$RN = $this->input->post('wrk_ord');
	$this->db->where('v_WrkOrdNo',$RN);
	$this->db->update('pmis2_emg_jobresponse', $insert_data);
	}

function pmis2_egm_assetjobtype($insert_data){
  $this->db->where('v_Asset_no',$insert_data['v_Asset_no']);
	$this->db->where('v_Year',$insert_data['v_Year']);
	$this->db->where('v_HospitalCode',$this->session->userdata('hosp_code'));
	$this->db->update('pmis2_egm_assetjobtype', $insert_data);
	//echo $this->db->last_query();
	//exit();

}
function visit1_form($insert_data){
	$RN = $this->input->post('wrk_ord');
	$this->db->where('v_WrkOrdNo',$RN);
	$this->db->update('pmis2_emg_jobvisit1', $insert_data);
}
function visit2_form($insert_data){
	$RN = $this->input->post('wrk_ord');
	$this->db->where('v_WrkOrdNo',$RN);
	$this->db->update('pmis2_emg_jobvisit2', $insert_data);
}
function visit3_form($insert_data){
	$RN = $this->input->post('wrk_ord');
	$this->db->where('v_WrkOrdNo',$RN);
	$this->db->update('pmis2_emg_jobvisit3', $insert_data);
}
function visitTOW_form($TOWdata){
	$RN = $this->input->post('wrk_ord');
	$this->db->where('v_WrkOrdNo',$RN);
	$this->db->where('v_HospitalCode',$this->session->userdata('hosp_code'));
	$this->db->update('pmis2_emg_jobvisit1tow', $TOWdata);
}
function job_form($insert_data){
	$RN = $this->input->post('wrk_ord');
	$this->db->where('v_WrkOrdNo',$RN);
	$this->db->where("v_HospitalCode = ", $this->session->userdata('hosp_code'));
	$this->db->update('pmis2_egm_jobdonedet', $insert_data);
}
function woppm_form($insert_data){
	$RN = $this->input->post('wrk_ord');
	$this->db->where('v_WrkOrdNo',$RN);
	$this->db->update('pmis2_egm_jobdonedet', $insert_data);
}
function pmis2_egm_schconfirmmon($status){
	$RN = $this->input->post('wrk_ord');
	$this->db->where('v_WrkOrdNo',$RN);
	$this->db->where('v_HospitalCode',$this->session->userdata('hosp_code'));
	$this->db->update('pmis2_egm_schconfirmmon', $status);
	//echo $this->db->last_query();
	//exit();
}
function pmis2_egm_service_request($status){
	$RN = $this->input->post('wrk_ord');
	$this->db->where('V_Request_no',$RN);
	$this->db->where("V_hospitalcode = ", $this->session->userdata('hosp_code'));
	$this->db->update('pmis2_egm_service_request', $status);
	//echo $this->db->last_query();
	//exit();
}
function vo3general_form($insert_data){
	$RN = $this->input->post('rpt_no');
	$this->db->where('vvfReportNo',$RN);
	$this->db->where('vvfActionflag <>','D');
	$this->db->update('ap_vo_vvfheader', $insert_data);
}
function pmis2_com_complaint($insert_data){
	$RN = $this->input->post('cmplnt_no');
	$this->db->where('v_ComplaintNo',$RN);
	$this->db->update('pmis2_com_complaint', $insert_data);
}
function complaintdet_form($insert_data){
	$RN = $this->input->post('cmplnt_no');
	$this->db->where('v_ComplaintNo',$RN);
	$this->db->update('pmis2_com_complaintdet', $insert_data);
}
function update_image($image){
	$Uid = $this->session->userdata('v_UserName');
	$this->db->where('v_UserID',$Uid);
	$this->db->update('pmis2_sa_user_image', $image);
}
function vo3_rate_item_update($insert_data){
	$Rid = $this->input->post('ratesid');
	$this->db->where('ratesID',$Rid);
	$this->db->update('ap_vo_assetrates', $insert_data);
}
function vo3_remark_update($insert_data){
	$rpt_no = $this->input->post('rpt_no');
	$asset = $this->input->post('asset');
	$this->db->where('vvfReportNo',$rpt_no);
	$this->db->where('vvfAssetNo',$asset);
	$this->db->update('ap_vo_vvfdetails', $insert_data);
}
function assetmaintenance_form($insert_data){
	$assetNo = $this->input->post('n_asset_number');
	$this->db->where('v_AssetNo',$assetNo);
	$this->db->where('v_Hospitalcode',$this->session->userdata('hosp_code'));
	$this->db->update('pmis2_egm_assetmaintenance', $insert_data);
	//echo $this->db->last_query();
	//exit();
}
function checklistcode_update($insert_data){
	$assetNo = 'BEDEN16-00001'; //only for test
	//$assetNo = $this->input->post('asset'); //change for this
	$this->db->where('v_Asset_no',$assetNo);
	$this->db->where('v_HospitalCode',$this->session->userdata('hosp_code'));
	$this->db->where('v_ActionFlag <>','D');
	$this->db->where('v_Year',date('Y'));
	$this->db->or_where('v_Year',date('Y')+1);
	$this->db->update('pmis2_egm_assetjobtype', $insert_data);
	//echo $this->db->last_query();
	//exit();
}
function vo3_lock_authorize_asset($insert_data){
	$rpt_no = $this->input->get('rpt_no');
	$asset = $this->input->get('asset');
	$this->db->where('vvfReportNo',$rpt_no);
	$this->db->where('vvfAssetNo',$asset);
	$this->db->update('ap_vo_vvfdetails', $insert_data);
	//echo $this->db->last_query();
	//exit();
}
function vo3_asset_update($insert_data){
	$rpt_no = $this->input->post('rpt_no');
	$asset = $this->input->post('asset');
	$this->db->where('vvfReportNo',$rpt_no);
	$this->db->where('vvfAssetNo',$asset);
	$this->db->where('vvfActionflag <>','D');
	$this->db->update('ap_vo_vvfdetails', $insert_data);
	//echo $this->db->last_query();
	//exit();
}
function vo3_ratefee_update($vvfID,$insert_data){
	$this->db->where ('vvfID',$vvfID);
	$this->db->update('ap_vo_vvfdetails',$insert_data);

	//echo $this->db->last_query();
	//exit();
}
function qap3_car_update($ssiq,$carid,$insert_data){
	$this->db->where('siq_no',$ssiq);
	$this->db->where('car_no',$carid);
	//$this->db->where('hosp_code',$this->session->userdata('hosp_code'));
	$this->db->where('hosp_code','MKA');//for test
	$this->db->update('mis_qap_car_header',$insert_data);
}
function qap3_caraction_update($id,$insert_data){
	$this->db->where('id',$id);
	$this->db->update('mis_qap_car_detail',$insert_data);
}
function store_take_update($id,$hosp,$takeadd_data){
	$this->db->where('ItemCode',$id);
	$this->db->where('Hosp_code',$hosp);
	$this->db->where('Action_Flag <>','D');
	$this->db->update('tbl_item_store_qty',$takeadd_data);
}
function store_takevisit_update($docdetails,$hosp,$update_job){
	$this->db->where('v_WrkOrdNo',$docdetails);
	$this->db->where('v_HospitalCode',$hosp);
	$where = '((v_PartName = "N/A") OR (v_PartName = "NA") OR (v_PartName = "") OR (v_PartName IS NULL))';
	$this->db->where($where);
	$this->db->update('pmis2_emg_jobvisit1', $update_job);
}
function store_takeppm_update($docdetails,$hosp,$update_ppm){
	$this->db->where('v_WrkOrdNo',$docdetails);
	$this->db->where('Hosp_code',$hosp);
	$this->db->update('pmis2_egm_schconfirmmon', $update_ppm);
}
function store_takercm_update($docdetails,$hosp,$update_rcm){
	$this->db->where('V_Request_no',$docdetails);
	$this->db->where('V_hospitalcode',$hosp);
	$this->db->update('pmis2_egm_service_request', $update_rcm);
}
function job_secheduler_u($insert_data,$variable){
	$this->db->where('Scheduler_Name',$variable);
	$this->db->update('set_scheduler', $insert_data);
}

function planner_scheduler_u($insert_data,$job,$time,$dept,$loc,$monthyear,$hosp,$jobdate){
	$this->db->where('Job_Items',$job);
	$this->db->where('Time',$time);
	//$this->db->where('Loc_Code',$loc);
	$this->db->where('Dept_Code',$dept);
	$this->db->where('Month_Year',$monthyear);
	//$this->db->where('Job_Date',$jobdate);
	$this->db->where('hospital_code',$hosp);
	//$this->db->where('Action_flag <>','D');
	$this->db->update('set_planner_scheduler', $insert_data);
}

function hks_scheduler_u($insert_data,$job,$shift,$dept,$loc,$monthyear,$hosp,$jobdate){
	$this->db->where('Job_Items',$job);
	$this->db->where('Shift',$shift);
	//$this->db->where('Loc_Code',$loc);
	$this->db->where('Dept_Code',$dept);
	$this->db->where('Month_Year',$monthyear);
	$this->db->where('hospital_code',$hosp);
	$this->db->where('Job_Date',$jobdate);
	$this->db->update('set_hks_scheduler', $insert_data);
}

function uhks_scheduler_u($insert_data,$job,$shift,$dept,$loc,$monthyear){
	$this->db->where('Job_Items',$job);
	$this->db->where('Shift',$shift);
	$this->db->where('Loc_Code',$loc);
	$this->db->where('Dept_Code',$dept);
	$this->db->where('Month_Year',$monthyear);
	$this->db->update('update_hks_scheduler', $insert_data);
}
function visitplus_form($insert_data,$wrk_ord,$visit){
	//$RN = $this->input->post('wrk_ord');
	$this->db->where('v_WrkOrdNo',$wrk_ord);
	$this->db->where('n_Visit',$visit);
	$this->db->where("v_HospitalCode = ", $this->session->userdata('hosp_code'));
	$this->db->update('pmis2_emg_jobvisit1', $insert_data);
	//echo $this->db->last_query();
	//exit();
}
function customize_search_u($insert_data,$indicator,$month,$year,$service){
	//$RN = $this->input->post('wrk_ord');
	$this->db->where('v_Month',$month);
	$this->db->where('v_Year',$year);
	$this->db->where('v_ServiceCode',$service);
	$this->db->update_batch('pmis2_com_indicatorparam', $insert_data, $indicator);
	//echo $this->db->last_query();
	//exit();
}
function financial_input_u($insert_data,$month,$year,$service){
	//$RN = $this->input->post('wrk_ord');
	$this->db->where('Month',$month);
	$this->db->where('Year',$year);
	$this->db->where('Service_Code',$service);
	$this->db->update('financial_report', $insert_data);
	//echo $this->db->last_query();
	//exit();
}
function deleteimg($insert_data,$imgid,$assetno,$service,$hosp){
	//$RN = $this->input->post('wrk_ord');
	$this->db->where('asset_no',$assetno);
	$this->db->where('hospital',$hosp);
	$this->db->where('service_code',$service);
	$this->db->where('imageid',$imgid);
	$this->db->update('asset_images', $insert_data);
	//echo $this->db->last_query();
	//exit();
}

function monp_scheduler_u($insert_data,$dept,$date,$monthyear){
	$this->db->where('Dept_Code',$dept);
	$this->db->where('Date',$date);
	$this->db->where('Month_Year',$monthyear);
	$this->db->update('set_monthly_planner', $insert_data);
}
function weekp_scheduler_u($insert_data,$dept,$date,$monthyear){
	$this->db->where('Dept_Code',$dept);
	$this->db->where('Day',$date);
	$this->db->where('Month_Year',$monthyear);
	$this->db->update('set_weekly_planner', $insert_data);
}
function delete_wo($insert_data,$wrk_ord){
	$this->db->where('V_Request_no',$wrk_ord);
	$this->db->where("V_hospitalcode = ", $this->session->userdata('hosp_code'));
	$this->db->update('pmis2_egm_service_request', $insert_data);
}

function assetjobtyperegy($assetno,$year)
{

$this->db->select("a.id, a.v_jobtype, n_frequency,  d_startdate, d_todate, v_checklistcode, v_procedurecode, v_sparelist, v_details, v_weeksch, d_reschdt, v_year",FALSE);
$this->db->from('pmis2_egm_assetjobtype a');
$this->db->join('pmis2_egm_jobtype b','a.v_jobtype=b.v_jobtype');
$this->db->where('a.v_ActionFlag <> ', 'D');
$this->db->where('a.v_asset_no = ', $assetno);
$this->db->where('a.v_year = ', $year);
$this->db->where('a.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->order_by('n_Frequency');
$query = $this->db->get();
return $query->result();

}
function service_contract_u($insert_data,$assetno){
	$this->db->where('asset_no',$assetno);
	$this->db->update('asset_service_contract', $insert_data);
}
function vendor_ureg($insert_data,$vendorcode){
	$this->db->where('v_vendorcode',$vendorcode);
	$this->db->update('pmis2_sa_vendor', $insert_data);
}
function jic_scheduler_u($insert_data,$job,$dept,$loc,$monthyear,$jino){ //,$jobdate
	$this->db->where('Job_Items',$job);
	$this->db->where('Loc_Code',$loc);
	$this->db->where('Dept_Code',$dept);
	$this->db->where('Month_Year',$monthyear);
	//$this->db->where('Job_Date',$jobdate);
	$this->db->where('ji_no',$jino);
	$this->db->update('set_jic_scheduler', $insert_data);
}
function u_pmis2_egm_statutory($insert_data,$assetno,$id){
	$this->db->where('v_asset_no',$assetno);
	$this->db->where('ID',$id);
	$this->db->update('pmis2_egm_statutory', $insert_data);
}

function clause_form_u($insert_data,$wrk_ord){
	$this->db->where('wo_no',$wrk_ord);
	$this->db->update('clause_tbl', $insert_data);
}

function acg_modulesf_u($insert_data,$reqno,$servcode){
	$this->db->where('v_requestno',$reqno);
	$this->db->where('v_ServiceCode',$servcode);
	$this->db->update('acg_apb_prevcmv2', $insert_data);
}

function ap_vo_vvfdetails($insert_data,$assetno,$voperiod){
	$this->db->where('vvfAssetTagNo',$assetno);
	$this->db->where('vvfRefNo',$voperiod);
  $query = $this->db->get('ap_vo_vvfdetails');
    if ($query->num_rows() > 0){
        $this->db->where('vvfAssetTagNo',$assetno);
				$this->db->where('vvfRefNo',$voperiod);
				$this->db->update('ap_vo_vvfdetails', $insert_data);
    }
    else{
        $this->db->where('vvfAssetTagNo',$assetno);
				$this->db->where('vvfRefNo',$voperiod);
				$this->db->insert('ap_vo_vvfdetails', $insert_data);
    }
}

function dellic($insert_data,$licid){
	$this->db->where('id',$licid);
	$this->db->update('pmis2_egm_lnc_lincense_details', $insert_data);
	//echo $this->db->last_query();
	//exit();
}

function filebankseqno_u($type,$insert_data){
	$this->db->where('seq_RequestType',$type);
	$this->db->where('seq_HospitalCode',$this->session->userdata('hosp_code'));
	$this->db->update('ap_nextsequenceno', $insert_data);
	//echo $this->db->last_query();
	//exit();
}

function fileatt_bank_u($insert_data,$docid,$assetno){
	$this->db->where('asset_no',$assetno);
	$this->db->where('doc_id',$docid);
	$this->db->update('battachments_details', $insert_data);
}

function delfile($insert_data,$assetno,$docid){
	$this->db->where('asset_no',$assetno);
	$this->db->where('doc_id',$docid);
	$this->db->update('battachments_details', $insert_data);
	//echo $this->db->last_query();
	//exit();
}

function bookingwoused($insert_data,$RN){
	$this->db->where('booking_wo',$RN);
	$this->db->update('booking_details', $insert_data);
}

function pmis2_egm_assetjobtypeid($insert_data,$id){
  $this->db->where('v_Asset_no',$insert_data['v_Asset_no']);
	$this->db->where('v_Year',$insert_data['v_Year']);
	$this->db->where('id',$id);
	$this->db->where('v_HospitalCode',$this->session->userdata('hosp_code'));
	$this->db->update('pmis2_egm_assetjobtype', $insert_data);
	//echo $this->db->last_query();
	//exit();

}

function del_assetppmjobreg($insert_data,$assetno,$year,$id){
  	$this->db->where('v_Asset_no',$assetno);
	$this->db->where('v_Year',$year);
	$this->db->where('id',$id);
	$this->db->where('v_HospitalCode',$this->session->userdata('hosp_code'));
	$this->db->update('pmis2_egm_assetjobtype', $insert_data);
	//echo $this->db->last_query();
	//exit();

}

function linkwo_form_u($insert_data,$wo){
	$this->db->where('ori_wo',$wo);
	$this->db->update('pmis2_egm_sharedowntime',$insert_data);
}

function license_image_u($insert_data){
	$this->db->where('licenses_no',$insert_data['licenses_no']);
	$this->db->update('license_images',$insert_data);
}

function fdr_update($insert_data,$month,$year){
	$this->db->where('month',$month);
	$this->db->where('year',$year);
	$this->db->update('fes_dailyreport',$insert_data);
}

function ud_setup_u($insert_data,$id){
	$this->db->where('Id',$id);
	$this->db->where('v_ActionFlag <>','D');
	$this->db->update('pmis2_sa_userdept',$insert_data);
}
function personnel_admin_u($insert_data,$id){
	$this->db->where('Id',$id);
	$this->db->where('v_Actionflag <>','D');
	$this->db->update('pmis2_sa_personal',$insert_data);
}

function tbl_vendor_u($insert_data,$code,$id){
	$this->db->where('Id',$id);
	$this->db->where('Item_Code',$code);
	$this->db->update('tbl_vendor',$insert_data);
	//echo $this->db->last_query();
	//echo '<br>';
	//exit();
}
function tbl_vendor_info_u($insert_data,$id){
	$this->db->where('Id',$id);
	$this->db->update('tbl_vendor_info',$insert_data);
	//echo $this->db->last_query();
	//exit();
}

function uprun_no($insert_data){
	$this->db->where('Id','1');
	$this->db->update('tbl_run_no',$insert_data);
	//echo $this->db->last_query();
	//exit();
}
function up_comrunno($insert_data){
	$this->db->update('component_run_no',$insert_data);
	//echo $this->db->last_query();
	//exit();
}
function up_attrunno($insert_data){
	$this->db->update('attachment_run_no',$insert_data);
	//echo $this->db->last_query();
	//exit();
}
function update_delete_comm($insert_data,$assetno,$id){
	$this->db->where('asset_no',$assetno);
	$this->db->where('Id',$id);
	$this->db->update('component_details',$insert_data);
	//echo $this->db->last_query();
	//exit();
}
function update_delete_attc($insert_data,$assetno,$id){
	$this->db->where('asset_no',$assetno);
	$this->db->where('Id',$id);
	$this->db->update('attachments_details',$insert_data);
	//echo $this->db->last_query();
	//exit();
}
function update_delpo_comm($insert_data,$pono,$id){
	$this->db->where('PO_No',$pono);
	$this->db->where('Id',$id);
	$this->db->update('po_compodetails',$insert_data);
	//echo $this->db->last_query();
	//exit();
}
function update_delpo_attc($insert_data,$pono,$id){
	$this->db->where('PO_No',$pono);
	$this->db->where('Id',$id);
	$this->db->update('poattach_details',$insert_data);
	//echo $this->db->last_query();
	//exit();
}
function u_commassno($insert_data,$assetno){
	$this->db->where('asset_no',$assetno);
	$this->db->update('component_details',$insert_data);
	//echo $this->db->last_query();
	//exit();
}
function u_attcassno($insert_data,$assetno){
	$this->db->where('asset_no',$assetno);
	$this->db->update('attachments_details',$insert_data);
	//echo $this->db->last_query();
	//exit();
}
function u_pocommassno($insert_data,$pono){
	$this->db->where('PO_No',$pono);
	$this->db->update('po_compodetails',$insert_data);
	//echo $this->db->last_query();
	//exit();
}
function u_poattcassno($insert_data,$pono){
	$this->db->where('PO_No',$pono);
	$this->db->update('poattach_details',$insert_data);
	//echo $this->db->last_query();
	//exit();
}
function u_autono($zoneid,$year){
	$this->db->set('Counter', 'Counter+1', FALSE);
	$this->db->where('ZoneID',$zoneid);
	$this->db->where('Year',$year);
	$this->db->update('tbl_autono');
	//echo $this->db->last_query();
	//exit();
}
function mrinapp_u($insert_data,$mrinno){
	$this->db->where('DocReferenceNo',$mrinno);
	$this->db->update('tbl_materialreq',$insert_data);
}
function mrincomp_u($insert_data,$mrinno,$id){
	$this->db->where('Id',$id);
	$this->db->where('MIRNcode',$mrinno);
	$this->db->update('tbl_mirn_comp',$insert_data);
  //echo $this->db->last_query();
	//exit();
}

function newmrin_u($insert_data,$mrinno){
	$this->db->where('DocReferenceNo',$mrinno);
	$this->db->update('tbl_materialreq',$insert_data);
}

function tbl_pr_mirn($insert_data,$mrinno){
	$this->db->where('MIRN_No',$mrinno);
	$this->db->update('tbl_pr_mirn',$insert_data);
}

function updatepr($insert_data,$year){
	$this->db->where('yearno',$year);
	$this->db->update('tbl_pr_autono',$insert_data);
}

function tbl_pr_u($insert_data,$prno){
	$this->db->where('PRNo',$prno);
	$this->db->update('tbl_pr',$insert_data);
}

function updatepo($insert_data,$year){
	$this->db->where('yearno',$year);
	$this->db->update('tbl_po_autono',$insert_data);
}

function updatepomain($insert_data,$pono,$vis){
	$this->db->where('PO_No',$pono);
	$this->db->where('visit',$vis);
	$this->db->update('tbl_po',$insert_data);
	//echo $this->db->last_query();
	//exit();
}
function updateitems($insert_data,$item){
	$this->db->where('InvItemID',$item);

	$this->db->update('tbl_invitem',$insert_data);
	//echo $this->db->last_query();
	//exit();
}
function store_take_updatemirncomp($id,$mirncd,$takeadd_data){
	$this->db->where('ItemCode',$id);
	$this->db->where('mirncode',$mirncd);
	$this->db->update('tbl_mirn_comp',$takeadd_data);
}
function store_take_updatematerialreq($mirncd,$takeadd_data){
	$this->db->where('DocReferenceNo',$mirncd);
	$this->db->update('tbl_MaterialReq',$takeadd_data);
	//echo $this->db->last_query();
	//exit();
}
function updateOnDuplicate($table, $data ) {
if (empty($table) || empty($data)) return false;
$duplicate_data = array();
foreach($data AS $key => $value) {
$duplicate_data[] = sprintf("%s='%s'", $key, $value);
}
//echo sprintf("%s='%s'", $key, $value);
$sql = sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string($table, $data), implode(',', $duplicate_data));
$this->db->query($sql);
//echo $this->db->last_query()."<br>";
return $this->db->insert_id();
}

function updateOnDuplicatex($table, $data ) {
if (empty($table) || empty($data)) return false;
//echo("masuk cni");
//$duplicate_data = array();
//foreach($data AS $key => $value) {
//$duplicate_data[] = sprintf("%s='%s'", $key, $value);
//}
//echo sprintf("%s='%s'", $key, $value);
//$sql = sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string($table, $data), implode(',', $duplicate_data));
$sql = $data;
$this->db->query($sql);
//echo $this->db->last_query();
//return $this->db->insert_id();
}

function chronology_update($visit,$wo,$insert_data){
	$this->db->where('n_Visit',$visit);
  $this->db->where('v_WrkOrdNo',$wo);
  $this->db->where('v_HospitalCode',$this->session->userdata('hosp_code'));
	$this->db->update('pmis2_emg_chronology',$insert_data);
}


function resetmirn($mirn, $status){
		$this->db->set('ApprStatusIDxx',$status);
		$this->db->set('ApprStatusIDx', $status);
		$this->db->where('DocReferenceNo', $mirn);
		$this->db->update('tbl_materialreq');
		//echo $this->db->last_query();
		//exit();
	  	return $this->db->affected_rows() > 0;
	  	}

      function personnelinvolved_update($wo,$insert_data){
        $this->db->where('v_WrkOrdNo',$wo);
        $this->db->where('v_HospitalCode',$this->session->userdata('hosp_code'));
      	$this->db->update('pmis2_emg_jobresponse',$insert_data);
      }

function delete_PO_MIRN($mirn,$vendor){
		$this->db->set('MIRN_No',$mirn.'D');
		$this->db->set('Vendor_No',$vendor.'-'.$this->session->userdata('v_UserName'));
		$this->db->where('MIRN_No', $mirn);
		$this->db->update('tbl_po_mirn');
		//echo $this->db->last_query();
		//exit();
	  	return $this->db->affected_rows() > 0;
}

function u_mrinwo($insert_data,$wono){
	$this->db->where('WorkOfOrder',$wono);
  $this->db->where('DocReferenceNo = ""', NULL, FALSE);
	$this->db->update('tbl_materialreq',$insert_data);
	//echo $this->db->last_query();
	//exit();
}
function updaterootcause($insert_data,$wo){
	$this->db->where('WorkOfOrder',$wo);
	// $this->db->where('v_ActionFlag <>','D');
	$this->db->update('tbl_materialreq',$insert_data);
}


}
?>
