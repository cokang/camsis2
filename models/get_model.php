<?php
class get_model extends CI_Model{
function __construct() {
parent::__construct();
}
function dater($which=1, $mon, $yr)
				{
				//echo "func date".$yr.".".$mon.".11";
				//$time = strtotime($yr.".".$mon.".11");
				//return date("Y-m-d", strtotime("+1 month", $time));
				$time = strtotime("09-".$mon."-".$yr);
				if ($which==1) {
				return date("Y-m-d", strtotime("09-".$mon."-".$yr));
				}else{
				//return date("Y-m-d", strtotime("+1 month", $time));
				return date("Y-m-d", strtotime("-1 day",strtotime("+1 month", $time)));
				}
				}
function get_dropdown_list_wgcode()
{
$this->db->select("v_WorkGroup,trim(concat(v_WorkGroup , ' ' , v_WorkGroupname)) as workgroupname", FALSE);
$this->db->from('pmis2_egm_workgroupcode');
//$this->db->where('country_name LIKE ', 'Z%');
//$this->db->order_by('country_name');
$result = $this->db->get();
$return = array();
$return[''] = 'Please Select';
if($result->num_rows() > 0) {
foreach($result->result_array() as $row) {
$return[$row['v_WorkGroup']] = $row['workgroupname'];
}
}

        return $return;

}

function get_dropdown_list_country()
{
$this->db->select('trim(country_name) as country_name');
$this->db->from('ap_sa_country');
//$this->db->where('country_name LIKE ', 'Z%');
$this->db->order_by('country_name');
$result = $this->db->get();
$return = array();
$return[''] = 'Please Select';
if($result->num_rows() > 0) {
foreach($result->result_array() as $row) {
$return[$row['country_name']] = $row['country_name'];
}
}

        return $return;

}

function get_dropdown_list_manufacturer()
{
$this->db->select('trim(New_Manufacturer) as New_Manufacturer');
$this->db->from('all');
$this->db->order_by('new_manufacturer');
$result = $this->db->get();
//echo $this->db->last_query();
//exit();
$return = array();
$return[''] = 'Please Select';
if($result->num_rows() > 0) {
foreach($result->result_array() as $row) {
$return[$row['New_Manufacturer']] = $row['New_Manufacturer'];
}
}

        return $return;

}

function get_dropdown_list_contractcd()
{
$this->db->from('pmis2_sa_contractcode');
$this->db->where('v_Actionflag !=', 'D');
$this->db->order_by('v_contTypecode');
$result = $this->db->get();
//echo $this->db->last_query();
//exit();
$return = array();
$return[''] = 'Please Select';
if($result->num_rows() > 0) {
foreach($result->result_array() as $row) {
$return[$row['v_ContTypecode']] = $row['v_ContTypecode'] .' '.$row['v_Desc'];
}
}

        return $return;

}

function get_vo_rates($assetcd, $duit)
{

$this->db->select("(case when DWRate = 999 then (case when ".$duit." <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when ".$duit." <= 2000000 then (".$duit." * 0.0075) / 12 else (".$duit." * 0.0050) / 12 end) else (".$duit." * ( DWRate / 100)) / 12 end) as 'FeeDW', (".$duit." * ( PWRate / 100) / 12) as 'FeePW'",FALSE);
//SELECT (case when DWRate = 999 then (case when 500 <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when 500 <= 2000000 then (500 * 0.0075) / 12 else (500 * 0.0050) / 12 end) else (500 * ( DWRate / 100)) / 12 end) as 'FeeDW', (500 * ( PWRate / 100) / 12) as 'FeePW'
$this->db->from('ap_vo_assetrates');
//$this->db->join('ukuran','order.id_size=ukuran.id_size');WHERE assettypecode = '10-046'
$this->db->where('assettypecode',$assetcd);
$query = $this->db->get();
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_dept($hosp, $deptcd)
{

$this->db->select("v_moh_dept_desc",FALSE);
//SELECT (case when DWRate = 999 then (case when 500 <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when 500 <= 2000000 then (500 * 0.0075) / 12 else (500 * 0.0050) / 12 end) else (500 * ( DWRate / 100)) / 12 end) as 'FeeDW', (500 * ( PWRate / 100) / 12) as 'FeePW'
$this->db->from('pmis2_sa_moh_dept_mapping');
//$this->db->join('ukuran','order.id_size=ukuran.id_size');WHERE assettypecode = '10-046'
//$this->db->where('v_hospitalcode', 'AGH');
$this->db->where('v_hospitalcode', $this->session->userdata('usersess'));
//patut pakai session nie $this->session->userdata('hosp_code') for ref
$this->db->where('v_old_dept_code', 'TEMP');
$query = $this->db->get();
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_deptnm($deptcd)
{

$this->db->select("v_UserDeptDesc",FALSE);
//SELECT (case when DWRate = 999 then (case when 500 <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when 500 <= 2000000 then (500 * 0.0075) / 12 else (500 * 0.0050) / 12 end) else (500 * ( DWRate / 100)) / 12 end) as 'FeeDW', (500 * ( PWRate / 100) / 12) as 'FeePW'
$this->db->from('pmis2_sa_userdept');
//$this->db->join('ukuran','order.id_size=ukuran.id_size');WHERE assettypecode = '10-046'
//$this->db->where('v_hospitalcode', 'AGH');
$this->db->where('v_hospitalcode', $this->session->userdata('hosp_code'));
//patut pakai session nie $this->session->userdata('hosp_code') for ref
$this->db->where('v_UserDeptCode', $deptcd);
$query = $this->db->get();
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_assetnewnum($assetcd)
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select(" ifnull(max(MID(V_asset_no,9,5)),0) + 1 AS thenum ", FALSE);
$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_assetregistration');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_accesnewnum($assetcd)
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select(" ifnull(max(v_accesoriescode),0) + 1 AS thenum ", FALSE);
$this->db->where('v_assetno = ', $assetcd);
$this->db->where('v_actionflag <> ', 'D');
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_accesories');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_assetnewtag($equip_type)
{
//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
//$this->db->select(" ifnull(max(MID(V_Tag_no,5,8)),0) + 1 AS thenum ", FALSE);
$this->db->select(" ifnull(max(MID(V_Tag_no,7,8)),0) + 1 AS thenum ", FALSE);
$this->db->where("V_service_code = ", $this->session->userdata('usersess'));
$this->db->where('MID(V_Tag_no,1,6) =', 'IIUM '.$equip_type); 
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_assetregistration');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_assetnewtagclass($equiptype)
{

//asal $this->db->select(" ifnull(max(MID(V_Tag_no,6,1)),0) AS nm2 ", FALSE);
$this->db->select(" ifnull(left(v_workgroupdesc,1),0) AS nm2 ", FALSE);
$this->db->where("V_servicecode = ", $this->session->userdata('usersess'));
$this->db->where("V_Equip_code = ", $equiptype);
//echo $equiptype;
//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
//$this->db->select(" ifnull(max(MID(V_Tag_no,5,8)),0) + 1 AS thenum ", FALSE);
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$this->db->limit(1);
//asal $query = $this->db->get('pmis2_egm_assetregistration');
$query = $this->db->get('pmis2_sa_equip_code');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_assetname($typecd)
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select('pmis2_sa_asset_mapping.new_asset_type as asset_type, pmis2_sa_moh_asset_type.type_desc as asset_desc ');
//$this->db->where('pmis2_sa_asset_mapping.old_asset_type = ', $typecd);
$this->db->where('pmis2_sa_asset_mapping.new_asset_type = ', $typecd);
$this->db->join('pmis2_sa_moh_asset_type','pmis2_sa_asset_mapping.new_asset_type = pmis2_sa_moh_asset_type.asset_type');
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_sa_asset_mapping');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_assetlist()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select("pmis2_sa_equip_code.v_Equip_Code, pmis2_sa_equip_code.v_Equip_Desc, pmis2_sa_asset_mapping.new_asset_type, CONCAT(pmis2_sa_equip_code.v_WorkGroupno,' ',pmis2_egm_workgroupcode.v_WorkGroupname) AS v_workgroupno ", FALSE);
//$this->db->where('pmis2_sa_asset_mapping.old_asset_type = ', $typecd);
$this->db->where('pmis2_sa_equip_code.v_ServiceCode = ', $this->session->userdata('usersess'));
$this->db->where('pmis2_sa_equip_code.v_EffectiveDt_from <= ', date('Y-m-d H:i:s'));
$this->db->where('pmis2_sa_equip_code.v_EffectiveDt_to > ', date('Y-m-d H:i:s'));
$this->db->where('pmis2_sa_equip_code.v_ActiveStatus = ', 'Y');
$this->db->join('pmis2_sa_asset_mapping','pmis2_sa_asset_mapping.service_code = pmis2_sa_equip_code.v_ServiceCode AND pmis2_sa_asset_mapping.old_asset_type = pmis2_sa_equip_code.v_Equip_Code ');
$this->db->join('pmis2_egm_workgroupcode','pmis2_egm_workgroupcode.v_WorkGroup = pmis2_sa_equip_code.v_workgroupno ');
//return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_sa_equip_code');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_popassetlist($namaasset,$department,$tagno)
{
$this->db->limit(1000);
$this->db->distinct();
//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select("pmis2_egm_assetregistration.v_manufacturer, pmis2_egm_assetregistration.v_asset_name, pmis2_egm_assetregistration.v_asset_no, pmis2_egm_assetreg_general.v_wrn_end_code, pmis2_egm_assetregistration.v_tag_no, pmis2_egm_assetregistration.v_serial_no, pmis2_egm_assetregistration.v_user_dept_code, pmis2_egm_assetregistration.v_location_code, pmis2_egm_assetmaintenance.v_AssetCondition, pmis2_egm_assetmaintenance.v_AssetStatus ,pmis2_egm_assetmaintenance.v_AssetVStatus, pmis2_egm_assetmaintenance.v_ChecklistCode ,pmis2_egm_assetlocation.v_Location_Name ,pmis2_sa_userdept.v_UserDeptDesc", FALSE); //,pmis2_egm_assetlocation.v_Location_Name
//$this->db->where('pmis2_sa_asset_mapping.old_asset_type = ', $typecd);
$this->db->where('pmis2_egm_assetregistration.V_service_code = ', $this->session->userdata('usersess'));
$this->db->where('pmis2_egm_assetregistration.V_Hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('pmis2_egm_assetregistration.V_Actionflag <> ', 'D');
//$this->db->like('pmis2_egm_assetregistration.v_asset_name', $namaasset, 'both'); 
$this->db->where("(pmis2_egm_assetregistration.v_user_dept_code LIKE '%$department%' OR pmis2_egm_assetregistration.v_location_code LIKE '%$department%') AND (pmis2_egm_assetregistration.v_asset_name LIKE '%$namaasset%') AND (pmis2_egm_assetregistration.V_Tag_no LIKE '%$tagno%')");
//$like = '((pmis2_egm_assetregistration.v_user_dept_code LIKE'.$department.') OR (pmis2_egm_assetregistration.v_location_code LIKE'.$department.'))';
//$this->db->where($like);
//$this->db->like('pmis2_egm_assetregistration.v_user_dept_code', $department, 'both');
//$this->db->or_like('pmis2_egm_assetregistration.v_location_code', $department, 'both');
//$this->db->where('pmis2_sa_equip_code.v_EffectiveDt_to > ', date('Y-m-d H:i:s'));
//$this->db->where('pmis2_sa_equip_code.v_ActiveStatus = ', 'Y');
$this->db->join('pmis2_egm_assetlocation','pmis2_egm_assetlocation.v_hospitalcode = pmis2_egm_assetregistration.v_hospitalcode AND pmis2_egm_assetregistration.v_user_dept_code = pmis2_egm_assetlocation.v_UserDeptCode AND pmis2_egm_assetregistration.v_location_code = pmis2_egm_assetlocation.V_location_code','left');
$this->db->join('pmis2_sa_userdept','pmis2_sa_userdept.v_HospitalCode = pmis2_egm_assetregistration.v_hospitalcode AND pmis2_sa_userdept.v_UserDeptCode = pmis2_egm_assetregistration.v_user_dept_code','inner');
$this->db->join('pmis2_egm_assetreg_general','pmis2_egm_assetreg_general.v_hospital_code = pmis2_egm_assetregistration.v_hospitalcode AND pmis2_egm_assetreg_general.v_asset_no = pmis2_egm_assetregistration.v_asset_no ');
$this->db->join('pmis2_egm_assetmaintenance','pmis2_egm_assetmaintenance.v_hospitalcode = pmis2_egm_assetregistration.v_hospitalcode AND pmis2_egm_assetmaintenance.v_assetno = pmis2_egm_assetregistration.v_asset_no ');

$query = $this->db->get('pmis2_egm_assetregistration');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_vendortlist()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select("*");
//$this->db->where('pmis2_sa_asset_mapping.old_asset_type = ', $typecd);
$this->db->where('pmis2_sa_vendor.v_actionflag <> ', 'D');//    return $this->db->get('pmis2_sa_asset_mapping'); 
$this->db->order_by("v_vendorname","asc");
$query = $this->db->get('pmis2_sa_vendor');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_a12tlist()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select("pmis2_egm_service_request.v_request_no, pmis2_egm_service_request.v_request_status, pmis2_egm_service_request.d_date, pmis2_egm_service_request.v_summary ", FALSE);
//$this->db->where('pmis2_sa_asset_mapping.old_asset_type = ', $typecd);
$this->db->where('pmis2_egm_service_request.v_actionflag <> ', 'D');//    return $this->db->get('pmis2_sa_asset_mapping'); 
$this->db->where('pmis2_egm_service_request.v_request_type LIKE ', 'A8');
$this->db->where('pmis2_egm_service_request.v_Servicecode = ', $this->session->userdata('usersess'));
$this->db->where('pmis2_egm_service_request.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('DATE_FORMAT( pmis2_egm_service_request.d_date,  "%Y" ) = ', date("Y"));
//$this->db->order_by("v_vendorname","asc");
$query = $this->db->get('pmis2_egm_service_request');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_assetdetail($typecd)
{

//$this->db->select('pmis2_egm_assetregistration.v_user_dept_code,pmis2_egm_assetregistration.v_tag_no, V_Manufacturer, V_Model_no, ISNULL(pmis2_egm_assetreg_general.n_cost,0) as n_cost, (REPLACE(LEFT(v_assetvstatus,3), '':'', '''')) as vstatus, pmis2_egm_assetreg_general.d_commission,pmis2_egm_assetreg_general.V_Wrn_end_code, (LEFT(V_Asset_name,61)) as asset_name,pmis2_egm_assetreg_general.d_commission, (CASE WHEN REPLACE(LEFT(v_assetvstatus,3), ':', '') = 'V4' THEN pmis2_egm_assetmaintenance.d_refdate WHEN REPLACE(LEFT(v_assetvstatus,3), ':', '') = 'V4L' THEN pmis2_egm_assetmaintenance.d_refdate ELSE NULL END) as lastdate');
    $this->db->distinct();
    $this->db->where('pmis2_egm_assetregistration.v_actionflag != ', 'D');
    $this->db->where('pmis2_egm_assetregistration.v_asset_no', $typecd);
    $this->db->where('pmis2_egm_assetregistration.v_hospitalcode = ', $this->session->userdata('hosp_code'));
		$this->db->where('pmis2_egm_assetregistration.V_service_code = ', $this->session->userdata('usersess'));
    $this->db->join('pmis2_egm_assetmaintenance','concat(pmis2_egm_assetregistration.v_hospitalcode , pmis2_egm_assetregistration.v_asset_no) = concat(pmis2_egm_assetmaintenance.v_hospitalcode , pmis2_egm_assetmaintenance.v_assetno)');
    $this->db->join('pmis2_egm_assetreg_general','concat(pmis2_egm_assetregistration.v_hospitalcode , pmis2_egm_assetregistration.v_asset_no) = concat(pmis2_egm_assetreg_general.v_hospital_code , pmis2_egm_assetreg_general.v_asset_no)');
    
		//return $this->db->get('pmis2_egm_assetregistration'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_assetregistration');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_ppmgen($year, $hosp, $week)
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->distinct();
$this->db->select("jt.*, ar.v_tag_no, ar.v_asset_name, ar.v_user_dept_code, ar.v_location_code, am.v_assetstatus, am.v_assetcondition, am.v_assetvstatus, am.v_assetvstatus as ppm_no ");
//$this->db->where('pmis2_sa_asset_mapping.old_asset_type = ', $typecd);
//$this->db->where('jt.v_hospitalcode = ', $typecd);
$this->db->where('ar.v_actionflag != ', 'D');
$this->db->where('am.v_actionflag != ', 'D');
//$this->db->where('jt.v_actionflag != ', 'D');
$this->db->where('jt.v_year = ', $year);
$this->db->where('jt.v_hospitalcode = ', $hosp);
$this->db->where('ar.V_service_code', $this->session->userdata('usersess'));
//$this->db->where('jt.v_weeksch LIKE ', '%'.$week.',%');
$this->db->where('jt.v_weeksch LIKE ', $week.',%');
$this->db->or_where('jt.v_weeksch =', $week);
$this->db->or_where('jt.v_weeksch LIKE ', '%,'.$week.',%');
$this->db->or_where('jt.v_weeksch LIKE ', '%,'.$week);
//$this->db->or_where('jt.v_weeksch LIKE ', '%,'.$week);
$this->db->join('pmis2_egm_assetregistration ar',"jt.v_asset_no = ar.v_asset_no AND ar.V_service_code = '".$this->session->userdata('usersess')."' AND ar.v_actionflag != 'D' AND jt.v_actionflag != 'D' AND jt.v_year = '".$year."'");
$this->db->join('pmis2_egm_assetmaintenance am','ar.v_asset_no = am.v_assetno AND ar.v_hospitalcode = am.v_hospitalcode');
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_assetjobtype jt');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}


function validate_schmon($start_wk, $hosp_code, $year, $assetno,$jt)
	{
		
	  $this->db->select('v_WrkOrdNo');
		$this->db->where('n_startwk', $start_wk);
		$this->db->where('v_hospitalcode',$hosp_code);
		$this->db->where('v_year', $year);
		$this->db->where('v_Asset_no', $assetno);
		$this->db->where('v_jobtype', $jt);
		$this->db->where('v_actionflag <> ', 'D');
		$this->db->where('v_ServiceCode', $this->session->userdata('usersess'));
		$this->db->where('LEFT(v_WrkOrdNo,2)', 'PP');
		$query = $this->db->get('pmis2_egm_schconfirmmon');
		//echo '<br>'.$this->db->last_query().'<br>';
	  return $query->result();
		//echo $this->input->post('username') . $this->input->post('password');
		//exit;
		//echo '<br>'.$this->db->last_query();
		//exit();
		/*
		if( $query->num_rows == 0)
		{
		echo 'dier return tru aarrrr';
			return TRUE;
		} else
		{
		echo 'dier return false aarrrr';
			return FALSE;
		}
		*/
	}
function get_popdeptlist()
{
$this->db->distinct();
//$this->db->select('v_userdeptcode');
$this->db->select('pmis2_egm_assetlocation.v_userdeptcode, pmis2_sa_userdept.v_userdeptdesc');
$this->db->join('pmis2_sa_userdept','pmis2_sa_userdept.v_hospitalcode = pmis2_egm_assetlocation.v_hospitalcode AND pmis2_sa_userdept.v_userdeptcode = pmis2_egm_assetlocation.v_UserDeptCode');
$this->db->where('pmis2_egm_assetlocation.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('pmis2_egm_assetlocation.v_actionflag <> ', 'D');
$this->db->where('pmis2_sa_userdept.v_actionflag <> ', 'D');
$this->db->order_by('pmis2_sa_userdept.v_userdeptdesc');
$query = $this->db->get('pmis2_egm_assetlocation');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_poploclist($dept)
{
$this->db->distinct();
$this->db->select('pmis2_sa_userdept.v_userdeptdesc, pmis2_egm_assetlocation.*');
$this->db->join('pmis2_sa_userdept','pmis2_sa_userdept.v_hospitalcode = pmis2_egm_assetlocation.v_hospitalcode AND pmis2_sa_userdept.v_userdeptcode = pmis2_egm_assetlocation.v_UserDeptCode');
if (isset($dept)) {
    $this->db->where('pmis2_egm_assetlocation.v_userdeptcode = ', $dept);    
}
$this->db->where('pmis2_egm_assetlocation.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('pmis2_egm_assetlocation.v_actionflag <> ', 'D');
$this->db->where('pmis2_sa_userdept.v_actionflag <> ', 'D');
$query = $this->db->get('pmis2_egm_assetlocation');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_poploclista()
{
$this->db->distinct();
$this->db->select('pmis2_sa_userdept.v_userdeptdesc, pmis2_egm_assetlocation.*');
$this->db->join('pmis2_sa_userdept','pmis2_sa_userdept.v_hospitalcode = pmis2_egm_assetlocation.v_hospitalcode AND pmis2_sa_userdept.v_userdeptcode = pmis2_egm_assetlocation.v_UserDeptCode');
$this->db->where('pmis2_egm_assetlocation.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('pmis2_egm_assetlocation.v_actionflag <> ', 'D');
$this->db->where('pmis2_sa_userdept.v_actionflag <> ', 'D');
$query = $this->db->get('pmis2_egm_assetlocation');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_poploclistb()
{
$ignore = array('CP','CA','FES','LH','ME','SE','SRV','TCR','WS','BM','CH');
$this->db->distinct();
$this->db->select('pmis2_sa_userdept.v_userdeptdesc, pmis2_egm_assetlocation.v_UserDeptCode, count(pmis2_egm_assetlocation.v_UserDeptCode) as Totalloc');
$this->db->join('pmis2_sa_userdept','pmis2_sa_userdept.v_hospitalcode = pmis2_egm_assetlocation.v_hospitalcode AND pmis2_sa_userdept.v_userdeptcode = pmis2_egm_assetlocation.v_UserDeptCode');
$this->db->where('pmis2_egm_assetlocation.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('pmis2_egm_assetlocation.v_actionflag <> ', 'D');
$this->db->where('pmis2_sa_userdept.v_actionflag <> ', 'D');
$this->db->where_not_in('pmis2_egm_assetlocation.v_UserDeptCode', $ignore);
$this->db->group_by('pmis2_sa_userdept.v_userdeptdesc, pmis2_egm_assetlocation.v_UserDeptCode');
$query = $this->db->get('pmis2_egm_assetlocation');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_phonelist()
{
$this->db->distinct();
$this->db->select('a.v_telephone_no, l.v_location_name, a.v_location_code, a.v_user_dept_code, u.v_userdeptdesc');
$this->db->join('pmis2_sa_userdept u', 'u.v_userdeptcode = a.v_user_dept_code');
$this->db->join('pmis2_egm_assetlocation l','a.v_location_code=l.v_location_code');
$this->db->where('a.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('l.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('u.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('l.v_actionflag <> ', 'D');
$this->db->where('u.v_actionflag <> ', 'D');
$this->db->where('a.v_actionflag <> ', 'D');
$query = $this->db->get('pmis2_egm_user_phone a');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_assetcat()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select(" pmis2_egm_assetregistration.V_Equip_code, pmis2_sa_equip_code.v_Equip_Desc AS V_Asset_name, COUNT(pmis2_egm_assetregistration.V_Equip_code) AS aTotal ", FALSE);
$this->db->join('pmis2_sa_equip_code','pmis2_egm_assetregistration.V_Equip_code = pmis2_sa_equip_code.v_Equip_Code AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_sa_equip_code.v_hospitalcode');
$this->db->where('pmis2_egm_assetregistration.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('pmis2_egm_assetregistration.v_actionflag <> ', 'D');
$this->db->where('pmis2_egm_assetregistration.v_service_code = ', $this->session->userdata('usersess'));
$this->db->group_by('pmis2_egm_assetregistration.V_Equip_code, pmis2_sa_equip_code.v_Equip_Desc');
$this->db->order_by("pmis2_sa_equip_code.v_Equip_Desc","asc");
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_assetregistration');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_assetdet()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select(" pmis2_egm_assetregistration.V_Equip_code, pmis2_egm_assetregistration.V_Asset_no, pmis2_egm_assetregistration.V_Asset_name, pmis2_egm_assetregistration.V_Tag_no, pmis2_egm_assetregistration.V_User_Dept_code, pmis2_egm_assetregistration.V_Location_code, pmis2_egm_assetregistration.V_Manufacturer , pmis2_egm_assetmaintenance.V_Criticality, pmis2_egm_assetmaintenance.V_AssetCondition, pmis2_egm_assetmaintenance.v_AssetStatus, pmis2_egm_assetregistration.V_Model_no, pmis2_egm_assetregistration.V_Serial_no, pmis2_egm_assetregistration.V_hospitalcode, pmis2_egm_assetreg_general.N_Cost, asset_images.file_name ", FALSE);
$this->db->join('pmis2_egm_assetmaintenance','pmis2_egm_assetregistration.v_asset_no = pmis2_egm_assetmaintenance.v_assetno AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_egm_assetmaintenance.v_hospitalcode');
$this->db->join('pmis2_egm_assetreg_general','pmis2_egm_assetregistration.v_asset_no = pmis2_egm_assetreg_general.v_asset_no AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_egm_assetreg_general.v_hospital_code');
$this->db->join('asset_images','pmis2_egm_assetreg_general.v_asset_no = asset_images.asset_no AND pmis2_egm_assetreg_general.v_hospital_code = asset_images.hospital','left'); //
$this->db->where('pmis2_egm_assetregistration.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('pmis2_egm_assetregistration.v_actionflag <> ', 'D');
$this->db->where('pmis2_egm_assetregistration.v_service_code = ', $this->session->userdata('usersess'));
$this->db->group_by('pmis2_egm_assetregistration.V_Asset_no'); //
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_assetregistration');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_assetnonppm()
{
/*
$this->db->select(" pmis2_egm_assetregistration.v_hospitalcode, pmis2_egm_assetregistration.V_Asset_no, pmis2_egm_assetregistration.V_Asset_name, pmis2_egm_assetregistration.V_Tag_no, pmis2_egm_assetregistration.D_Register_date, pmis2_egm_assetregistration.V_User_Dept_code, pmis2_egm_assetmaintenance.v_Criticality, pmis2_egm_assetmaintenance.v_AssetCondition, pmis2_egm_assetmaintenance.v_AssetVStatus, pmis2_egm_assetmaintenance.v_AssetStatus, pmis2_egm_assetreg_general.v_wrn_end_code ", FALSE);
$this->db->join('pmis2_egm_assetmaintenance','pmis2_egm_assetregistration.v_asset_no = pmis2_egm_assetmaintenance.v_assetno AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_egm_assetmaintenance.v_hospitalcode');
$this->db->join('pmis2_egm_assetreg_general','pmis2_egm_assetregistration.v_asset_no = pmis2_egm_assetreg_general.v_asset_no AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_egm_assetreg_general.v_hospital_code');
$val = array('C4', 'C5', 'C7');
$this->db->where_in('left(pmis2_egm_assetmaintenance.v_assetcondition,2)', $val,FALSE);
$val = array('S2','S4','S5');
$this->db->where_in('left(pmis2_egm_assetmaintenance.v_assetstatus,2)', $val,FALSE);
$val = array('V4L','V4','V5');
$this->db->where_in('left(pmis2_egm_assetmaintenance.v_AssetVStatus,2)', $val,FALSE);
$val = array('BESTH01');
$this->db->where_not_in('pmis2_egm_assetregistration.v_asset_no', $val);
$this->db->where('pmis2_egm_assetregistration.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('pmis2_egm_assetregistration.v_actionflag <> ', 'D');
$this->db->where('pmis2_egm_assetregistration.v_service_code = ', $this->session->userdata('usersess'));
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_assetregistration');
//echo "laalla".$query->DWRate;
echo $this->db->last_query();
//exit();
return $query->result();
*/

$this->db->select(" a.v_hospitalcode, a.V_Asset_no, a.V_Asset_name, a.V_Tag_no, a.D_Register_date, a.V_User_Dept_code, b.v_Criticality, b.v_AssetCondition, b.v_AssetVStatus, b.v_AssetStatus, c.v_wrn_end_code ", FALSE);
$this->db->join('pmis2_egm_assetmaintenance b','a.v_asset_no = b.v_assetno AND a.v_hospitalcode = b.v_hospitalcode');
$this->db->join('pmis2_egm_assetreg_general c','a.v_asset_no = c.v_asset_no AND a.v_hospitalcode = c.v_hospital_code');
$this->db->join('pmis2_egm_assetjobtype j','j.v_asset_no = c.v_asset_no AND j.v_hospitalcode = c.v_hospital_code AND j.v_year=year(now())', 'left');
$val = array('C1', 'C4', 'C5', 'C7');
$this->db->where_in('left(b.v_assetcondition,2)', $val,FALSE);
$val = array('S1', 'S2','S4','S5');
$this->db->where_in('left(b.v_assetstatus,2)', $val,FALSE);
$val = array('V3', 'V4L','V4','V5');
$this->db->where_in('left(b.v_AssetVStatus,2)', $val,FALSE);
$val = array('BESTH01');
//$this->db->where_not_in("a.v_asset_no", "SELECT v_asset_no FROM fmis.pmis2_egm_assetjobtype where v_hospitalcode = 'IIUM'");
$this->db->where('a.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('a.v_actionflag <> ', 'D');
$this->db->where('a.v_service_code = ', $this->session->userdata('usersess'));
$this->db->where('j.v_asset_no is null', null, false);
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_assetregistration a');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_assetdet2($assetno)
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select(" * ", FALSE);
$this->db->join('pmis2_egm_assetmaintenance','pmis2_egm_assetregistration.v_asset_no = pmis2_egm_assetmaintenance.v_assetno AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_egm_assetmaintenance.v_hospitalcode');
$this->db->join('pmis2_egm_assetreg_general','pmis2_egm_assetregistration.v_asset_no = pmis2_egm_assetreg_general.v_asset_no AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_egm_assetreg_general.v_hospital_code');
$this->db->join('pmis2_sa_userdept','pmis2_egm_assetregistration.v_user_dept_code = pmis2_sa_userdept.v_userdeptcode AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_sa_userdept.v_hospitalcode', 'LEFT OUTER');
$this->db->join('pmis2_sa_vendor','pmis2_sa_vendor.v_vendorcode = pmis2_egm_assetreg_general.V_Vendor_code', 'LEFT OUTER');
$this->db->where('pmis2_egm_assetregistration.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('pmis2_egm_assetregistration.v_actionflag <> ', 'D');
$this->db->where('pmis2_egm_assetregistration.v_service_code = ', $this->session->userdata('usersess'));
$this->db->where('pmis2_egm_assetregistration.v_asset_no = ', $assetno);
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_assetregistration');
//echo "laalla".$query->DWRate;
//V_Tag_noecho 
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_UMDNSAsset($assetno)
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select(" * ", FALSE);
$this->db->join('pmis2_sa_moh_asset_type','pmis2_sa_asset_mapping.new_asset_type = pmis2_sa_moh_asset_type.asset_type');
$this->db->where('pmis2_sa_asset_mapping.old_asset_type = ', $assetno);
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_sa_asset_mapping');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_VOStatus($assetno)
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select(" ap_vo_vvfheader.vvfPeriod, ap_vo_vvfheader.vvfreportstatus, ap_vo_vvfdetails.*  ", FALSE);
$this->db->join('ap_vo_vvfheader','ap_vo_vvfdetails.vvfhospitalcode = ap_vo_vvfheader.vvfhospitalcode AND ap_vo_vvfdetails.vvfReportNo = ap_vo_vvfheader.vvfReportNo');
$this->db->where('ap_vo_vvfdetails.vvfactionflag <> ', 'D');
$this->db->where('ap_vo_vvfdetails.vvfassetno = ', $assetno);
$this->db->where('ap_vo_vvfheader.vvfactionflag <> ', 'D');
$this->db->where('ap_vo_vvfheader.vvfreportstatus <> ', 'C');
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('ap_vo_vvfdetails');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_assetmap($equipcd)
{

$this->db->select("*",FALSE);
//SELECT (case when DWRate = 999 then (case when 500 <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when 500 <= 2000000 then (500 * 0.0075) / 12 else (500 * 0.0050) / 12 end) else (500 * ( DWRate / 100)) / 12 end) as 'FeeDW', (500 * ( PWRate / 100) / 12) as 'FeePW'
$this->db->from('pmis2_sa_asset_mapping');
$this->db->join('pmis2_sa_moh_asset_type','pmis2_sa_asset_mapping.new_asset_type=pmis2_sa_moh_asset_type.asset_type');
$this->db->where('pmis2_sa_asset_mapping.old_asset_type', $equipcd);
$query = $this->db->get();
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_deptloclist($dept, $loc)
{
$this->db->distinct();
$this->db->select('pmis2_sa_userdept.v_userdeptdesc, pmis2_egm_assetlocation.*');
$this->db->join('pmis2_sa_userdept','pmis2_sa_userdept.v_hospitalcode = pmis2_egm_assetlocation.v_hospitalcode AND pmis2_sa_userdept.v_userdeptcode = pmis2_egm_assetlocation.v_UserDeptCode');
if (isset($dept)) {
    $this->db->where('pmis2_egm_assetlocation.v_userdeptcode = ', $dept);    
}
if (isset($loc)) {
    $this->db->where('pmis2_egm_assetlocation.V_location_code = ', $loc);    
}
$this->db->where('pmis2_egm_assetlocation.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('pmis2_egm_assetlocation.v_actionflag <> ', 'D');
$this->db->where('pmis2_sa_userdept.v_actionflag <> ', 'D');
$query = $this->db->get('pmis2_egm_assetlocation');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_wobyasset($equipcd)
{

$this->db->select("*",FALSE);
//SELECT (case when DWRate = 999 then (case when 500 <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when 500 <= 2000000 then (500 * 0.0075) / 12 else (500 * 0.0050) / 12 end) else (500 * ( DWRate / 100)) / 12 end) as 'FeeDW', (500 * ( PWRate / 100) / 12) as 'FeePW'
$this->db->from('pmis2_egm_service_request');
//$this->db->join('pmis2_sa_moh_asset_type','pmis2_sa_asset_mapping.new_asset_type=pmis2_sa_moh_asset_type.asset_type');
$this->db->where('V_Asset_no =', $equipcd);
$this->db->where('V_servicecode = ', $this->session->userdata('usersess'));
$this->db->where('V_hospitalcode =', $this->session->userdata('hosp_code'));
$this->db->where('V_actionflag <> ', 'D');
$query = $this->db->get();
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function assetaccessories($equipcd)
{

$this->db->select("*",FALSE);
//SELECT (case when DWRate = 999 then (case when 500 <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when 500 <= 2000000 then (500 * 0.0075) / 12 else (500 * 0.0050) / 12 end) else (500 * ( DWRate / 100)) / 12 end) as 'FeeDW', (500 * ( PWRate / 100) / 12) as 'FeePW'
$this->db->from('pmis2_egm_accesories');
//$this->db->join('pmis2_sa_moh_asset_type','pmis2_sa_asset_mapping.new_asset_type=pmis2_sa_moh_asset_type.asset_type');
$this->db->where('v_assetno =', $equipcd);
$this->db->where('v_hospitalcode =', $this->session->userdata('hosp_code'));
$this->db->where('v_actionflag <> ', 'D');
$query = $this->db->get();
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function assetstatutory($equipcd)
{

$this->db->select("*",FALSE);
//SELECT (case when DWRate = 999 then (case when 500 <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when 500 <= 2000000 then (500 * 0.0075) / 12 else (500 * 0.0050) / 12 end) else (500 * ( DWRate / 100)) / 12 end) as 'FeeDW', (500 * ( PWRate / 100) / 12) as 'FeePW'
$this->db->from('pmis2_egm_statutory');
//$this->db->join('pmis2_sa_moh_asset_type','pmis2_sa_asset_mapping.new_asset_type=pmis2_sa_moh_asset_type.asset_type');
$this->db->where('v_asset_no =', $equipcd);
$this->db->where('v_hospitalcode =', $this->session->userdata('hosp_code'));
$this->db->where('v_actionflag <> ', 'D');
$query = $this->db->get();
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function licensesandcert()
{

//$this->db->select("A.v_CertificateNo, A.v_ServiceCode, A.v_AgencyCode, A.v_LicenseCategoryCode, B.v_LicenceCategoryDesc, A.v_IdentificationType, A.v_Identification, A.v_RegistrationNo, A.v_StartDate, A.v_ExpiryDate, A.v_GradeID, A.v_Remarks, A.v_hospitalcode, A.v_key, A.CMIS_Action_Flag, A.d_timestamp,A.id",FALSE);
$this->db->select("A.v_CertificateNo, A.v_ServiceCode, A.v_AgencyCode, A.v_LicenseCategoryCode, B.v_LicenceCategoryDesc, A.v_IdentificationType, A.v_Identification, A.v_RegistrationNo, A.v_StartDate, A.v_ExpiryDate, A.v_GradeID, A.v_Remarks, A.v_hospitalcode, A.v_key, A.CMIS_Action_Flag, A.d_timestamp, MAX(A.d_timestamp),A.id",FALSE);
//SELECT (case when DWRate = 999 then (case when 500 <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when 500 <= 2000000 then (500 * 0.0075) / 12 else (500 * 0.0050) / 12 end) else (500 * ( DWRate / 100)) / 12 end) as 'FeeDW', (500 * ( PWRate / 100) / 12) as 'FeePW'
$this->db->from('pmis2_egm_lnc_lincense_details A');
$this->db->join('pmis2_egm_lnc_license_category_code B','A.v_LicenseCategoryCode=B.v_LicenceCategoryCode');
$this->db->where('A.v_ServiceCode =', $this->session->userdata('usersess'));
$this->db->where('v_HospitalCode =', $this->session->userdata('hosp_code'));
$this->db->where('A.v_ActionFlag <> ', 'D');
$this->db->where('B.v_ActionFlag <> ', 'D');
//$this->db->where('v_ExpiryDate IN (SELECT MAX(`v_ExpiryDate`) FROM pmis2_egm_lnc_lincense_details GROUP BY v_CertificateNo)');
$this->db->group_by('A.v_CertificateNo'); 
$query = $this->db->get();
//echo "laalla".$query->DWRate;
/* echo $this->db->last_query();
exit(); */
return $query->result();

}

function licensesandcertbycode($liccode)
{

$this->db->select("v_CertificateNo, A.v_ServiceCode, A.v_AgencyCode, A.v_LicenseCategoryCode, A.v_actionflag,B.v_LicenceCategoryDesc, C.v_Description as CatAgencyName, v_IdentificationType, v_Identification, v_RegistrationNo, v_StartDate, v_ExpiryDate, v_GradeID, v_Remarks, v_hospitalcode, v_key, CMIS_Action_Flag, A.d_timestamp, A.v_TesterName,A.id",FALSE);
//SELECT (case when DWRate = 999 then (case when 500 <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when 500 <= 2000000 then (500 * 0.0075) / 12 else (500 * 0.0050) / 12 end) else (500 * ( DWRate / 100)) / 12 end) as 'FeeDW', (500 * ( PWRate / 100) / 12) as 'FeePW'
$this->db->from('pmis2_egm_lnc_lincense_details A');
$this->db->join('pmis2_egm_lnc_license_category_code B','A.v_LicenseCategoryCode=B.v_LicenceCategoryCode');
$this->db->join('pmis2_egm_lnc_statutory_agency_code C','B.v_AgencyCode=C.v_AgencyCode');
$this->db->where('A.v_ServiceCode =', $this->session->userdata('usersess'));
$this->db->where('v_HospitalCode =', $this->session->userdata('hosp_code'));
$this->db->where('A.v_ActionFlag <> ', 'D');
$this->db->where('B.v_ActionFlag <> ', 'D');
$this->db->where('A.id =', $liccode);
$query = $this->db->get();
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function request_update($wrk_ord){
	
$this->db->select('*',FALSE);
$this->db->from('pmis2_egm_service_request s');
//if ($this->session->userdata('usersess') <> "HKS") {
$this->db->join('pmis2_egm_assetregistration r',"s.V_Asset_no = r.V_Asset_no AND s.V_hospitalcode = r.V_Hospitalcode AND r.V_Actionflag != 'D'", 'left outer');
//}
$this->db->join('pmis2_egm_assetlocation l','s.V_Location_code = l.V_location_code AND s.V_hospitalcode = l.v_hospitalcode','left');
$this->db->join('pmis2_sa_userdept d', 'd.v_UserDeptCode = l.v_UserDeptCode AND d.v_hospitalcode = l.v_hospitalcode','left');
$this->db->join('pmis2_egm_sharedowntime lw','s.V_Request_no = lw.ori_wo','left');
//$this->db->join('pmis2_sa_user e', 's.takenby = e.v_UserID ','left');
$this->db->where('V_Request_no',$wrk_ord);
$this->db->where('s.v_ActionFlag <> ', 'D');

$query = $this->db->get();
//echo $this->db->last_query();
//exit();
    
$query_result = $query->result();
return $query_result;
}

function response_update($wrk_ord){
			$this->db->select('s.D_date,j.*');
			$this->db->from('pmis2_emg_jobresponse j');
			$this->db->join('pmis2_egm_service_request s','s.V_Request_no = j.v_WrkOrdNo');
			$this->db->where('v_WrkOrdNo',$wrk_ord);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit();
			$query_result = $query->result();
			return $query_result;
		}
		
function assetjobtype()
{

$this->db->select("v_Jobtype,n_Frequency",FALSE);
//SELECT (case when DWRate = 999 then (case when 500 <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when 500 <= 2000000 then (500 * 0.0075) / 12 else (500 * 0.0050) / 12 end) else (500 * ( DWRate / 100)) / 12 end) as 'FeeDW', (500 * ( PWRate / 100) / 12) as 'FeePW'
$this->db->from('pmis2_egm_jobtype');
$this->db->where('v_ActionFlag <> ', 'D');
$this->db->order_by('n_Frequency');
$query = $this->db->get();
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}		
	
	
function assetchklistcd()
{

$this->db->select("checklistCode, assetTypeDescription, freq, mfg, model, freqname",FALSE);
//SELECT (case when DWRate = 999 then (case when 500 <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when 500 <= 2000000 then (500 * 0.0075) / 12 else (500 * 0.0050) / 12 end) else (500 * ( DWRate / 100)) / 12 end) as 'FeeDW', (500 * ( PWRate / 100) / 12) as 'FeePW'
$this->db->from('ap_asset_heppm');
$this->db->where('actionflag <> ', 'D');
$this->db->order_by('checklistCode');
$query = $this->db->get();
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}	

function assetjobtypereg($assetno)
{

$this->db->select("a.id, a.v_jobtype, n_frequency,  d_startdate, d_todate, v_checklistcode, v_procedurecode, v_sparelist, v_details, v_weeksch, d_reschdt, v_year",FALSE);
//SELECT (case when DWRate = 999 then (case when 500 <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when 500 <= 2000000 then (500 * 0.0075) / 12 else (500 * 0.0050) / 12 end) else (500 * ( DWRate / 100)) / 12 end) as 'FeeDW', (500 * ( PWRate / 100) / 12) as 'FeePW'
$this->db->from('pmis2_egm_assetjobtype a');
$this->db->join('pmis2_egm_jobtype b','a.v_jobtype=b.v_jobtype');
$this->db->where('a.v_ActionFlag <> ', 'D');
$this->db->where('a.v_asset_no = ', $assetno);
$this->db->where('a.v_hospitalcode = ', $this->session->userdata('hosp_code'));
//$this->db->order_by('n_Frequency');
$this->db->order_by('a.v_Year', 'DESC');
$query = $this->db->get();
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}		

function assetagecost($assetno)
{

$this->db->select("B.N_Cost, TIMESTAMPDIFF(year, B.D_commission, now()) AS year, mod(TIMESTAMPDIFF(month, B.D_commission, now()),12) AS month, (1-(TIMESTAMPDIFF(year, B.D_commission, now())/C.Estimated_Life_Yrs))*B.N_Cost as depre",FALSE);
//SELECT (case when DWRate = 999 then (case when 500 <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when 500 <= 2000000 then (500 * 0.0075) / 12 else (500 * 0.0050) / 12 end) else (500 * ( DWRate / 100)) / 12 end) as 'FeeDW', (500 * ( PWRate / 100) / 12) as 'FeePW'
$this->db->from('pmis2_egm_assetregistration A');
$this->db->join('pmis2_egm_assetreg_general B' , 'A.V_Hospitalcode = B.V_Hospital_code AND A.V_Asset_no = B.V_Asset_no' );
$this->db->join('asset_depreciate_value C', 'A.V_Equip_code = C.code', 'left outer');
$this->db->where('A.v_ActionFlag <> ', 'D');
$this->db->where('A.V_Asset_no = ', $assetno);
$this->db->where('A.V_Hospitalcode = ', $this->session->userdata('hosp_code'));
$query = $this->db->get();
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}		

function assetlaborpartwo($assetno)
{
$laborcost = 0;
$partcost = 0;

$this->db->select("IFNULL(SUM(IFNULL(A.n_Total1,0)) + SUM(IFNULL(A.n_Total2,0)) + SUM(IFNULL(A.n_Total3,0)),0) AS totallabor, IFNULL(SUM(IFNULL(n_vTotal,0)),0) AS totalpart",FALSE);
//SELECT (case when DWRate = 999 then (case when 500 <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when 500 <= 2000000 then (500 * 0.0075) / 12 else (500 * 0.0050) / 12 end) else (500 * ( DWRate / 100)) / 12 end) as 'FeeDW', (500 * ( PWRate / 100) / 12) as 'FeePW'
$this->db->from('pmis2_emg_jobresponse A');
$this->db->join('pmis2_egm_service_request B' , 'A.v_Wrkordno = B.V_Request_no AND B.V_hospitalcode = A.v_HospitalCode' );
$this->db->where('B.v_ActionFlag <> ', 'D');
$this->db->where('B.V_Asset_no = ', $assetno);
$this->db->where('B.V_Hospitalcode = ', $this->session->userdata('hosp_code'));
$query = $this->db->get();
//echo $this->db->last_query();
//print_r($query->result());
$raray = $query->result();
//echo $raray[0]->totallabor;
//echo $raray[0]->totalpart.'<br>';
$laborcost = $raray[0]->totallabor + $laborcost;
$partcost = $raray[0]->totalpart + $partcost;

for ($x = 1; $x <4; $x++) {
    

$this->db->select("IFNULL(SUM(IFNULL(A.n_Total1,0)) + SUM(IFNULL(A.n_Total2,0)) + SUM(IFNULL(A.n_Total3,0)),0) AS totallabor, IFNULL(SUM(IFNULL(n_PartTotal, IFNULL(n_vTotal,0))),0) AS totalpart",FALSE);
//SELECT (case when DWRate = 999 then (case when 500 <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when 500 <= 2000000 then (500 * 0.0075) / 12 else (500 * 0.0050) / 12 end) else (500 * ( DWRate / 100)) / 12 end) as 'FeeDW', (500 * ( PWRate / 100) / 12) as 'FeePW'
$this->db->from('pmis2_emg_jobvisit'.$x.' A');
$this->db->join('pmis2_egm_service_request B' , 'A.v_Wrkordno = B.V_Request_no AND B.V_hospitalcode = A.v_HospitalCode' );
$this->db->where('B.v_ActionFlag <> ', 'D');
$this->db->where('B.V_Asset_no = ', $assetno);
$this->db->where('B.V_Hospitalcode = ', $this->session->userdata('hosp_code'));
$query = $this->db->get();
//echo $this->db->last_query();
//print_r($query->result());
$raray = $query->result();
//echo $raray[0]->totallabor;
//echo $raray[0]->totalpart.'<br>';
$laborcost = $raray[0]->totallabor + $laborcost;
$partcost = $raray[0]->totalpart + $partcost;

$this->db->select("IFNULL(SUM(IFNULL(A.n_Total1,0)) + SUM(IFNULL(A.n_Total2,0)) + SUM(IFNULL(A.n_Total3,0)),0) AS totallabor, IFNULL(SUM(IFNULL(n_PartTotal, IFNULL(n_vTotal,0))),0) AS totalpart",FALSE);
//SELECT (case when DWRate = 999 then (case when 500 <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when 500 <= 2000000 then (500 * 0.0075) / 12 else (500 * 0.0050) / 12 end) else (500 * ( DWRate / 100)) / 12 end) as 'FeeDW', (500 * ( PWRate / 100) / 12) as 'FeePW'
$this->db->from('pmis2_emg_jobvisit'.$x.' A');
$this->db->join('pmis2_egm_schconfirmmon B' , 'A.v_Wrkordno = B.v_wrkordno AND B.V_hospitalcode = A.v_HospitalCode' );
$this->db->where('B.v_ActionFlag <> ', 'D');
$this->db->where('B.v_Asset_no = ', $assetno);
$this->db->where('B.V_Hospitalcode = ', $this->session->userdata('hosp_code'));
$query = $this->db->get();
//echo $this->db->last_query();
//print_r($query->result());
$raray = $query->result();
//echo $raray[0]->totallabor;
//echo $raray[0]->totalpart.'<br>';
$laborcost = $raray[0]->totallabor + $laborcost;
$partcost = $raray[0]->totalpart + $partcost;

}
$hasil = array("totallabor" => $laborcost, "totalpart" => $partcost );
//print_r($hasil);
//echo 'nilai akhir'.$laborcost.','.$partcost;
//exit();
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
//return $query->result();
return $hasil;

}	

function assetlaborpartbyppm($assetno)
{
$this->db->select("B.v_WrkOrdNo AS v_wrkordno,IFNULL(SUM(IFNULL(A.n_Total1,0)) + SUM(IFNULL(A.n_Total2,0)) + SUM(IFNULL(A.n_Total3,0)),0) AS totallabor, IFNULL(SUM(IFNULL(n_PartTotal, IFNULL(n_vTotal,0))),0) AS totalpartl",FALSE);
$this->db->from('pmis2_emg_jobvisit1 A');
$this->db->join('pmis2_egm_schconfirmmon B' , 'A.v_WrkOrdNo = B.v_WrkOrdNo AND B.v_HospitalCode = A.v_HospitalCode' );
$this->db->where('B.v_ActionFlag <> ', 'D');
$this->db->where('B.v_Asset_no = ', $assetno);
$this->db->where('B.V_Hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->group_by("B.v_WrkOrdNo");
$query = $this->db->get();
//echo $this->db->last_query();
//exit();
return $query->result();

/*$laborcost = 0;
$partcost = 0;


$wototal = array();
for ($x = 1; $x <4; $x++) {

$this->db->select("B.v_wrkordno AS v_wrkordno, IFNULL(SUM(IFNULL(A.n_Total1,0)) + SUM(IFNULL(A.n_Total2,0)) + SUM(IFNULL(A.n_Total3,0)),0) AS totallabor, IFNULL(SUM(IFNULL(n_PartTotal, IFNULL(n_vTotal,0))),0) AS totalpart",FALSE);
//SELECT (case when DWRate = 999 then (case when 500 <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when 500 <= 2000000 then (500 * 0.0075) / 12 else (500 * 0.0050) / 12 end) else (500 * ( DWRate / 100)) / 12 end) as 'FeeDW', (500 * ( PWRate / 100) / 12) as 'FeePW'
$this->db->from('pmis2_emg_jobvisit'.$x.' A');
$this->db->join('pmis2_egm_schconfirmmon B' , 'A.v_Wrkordno = B.v_wrkordno AND B.V_hospitalcode = A.v_HospitalCode' );
$this->db->where('B.v_ActionFlag <> ', 'D');
$this->db->where('B.v_Asset_no = ', $assetno);
$this->db->where('B.V_Hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->group_by("B.v_wrkordno"); 
$query = $this->db->get();
//echo $this->db->last_query();
//print_r($query->result());
$raray = $query->result();
foreach ($raray as $key => $value) {
    if (array_key_exists($value[v_wrkordno], $wototal)) {
        $wototal[$value[v_wrkordno]] +=  $value[totallabor] + $value[totalpart];
    } else {
        $wototal[$value[v_wrkordno]] = $value[totallabor] + $value[totalpart];
    }
}
//echo $raray[0]->totallabor;
//echo $raray[0]->totalpart.'<br>';
//$laborcost = $raray[0]->totallabor + $laborcost;
//$partcost = $raray[0]->totalpart + $partcost;

}*/

//$hasil = array("totallabor" => $laborcost, "totalpart" => $partcost );
//print_r($hasil);
//echo 'nilai akhir'.$laborcost.','.$partcost;
//exit();
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
//return $query->result();
//return $wototal;

}

function assetppmlog($assetno)
{

$this->db->select("j.d_DateDone, j.v_Wrkordno, j.v_summary, j.v_jobTypecode, j.v_FailureCode, j.n_Downtime, j.n_Servicetime, j.v_HospitalCode, ppm.v_closeddate, ppm.d_StartDt",FALSE);
//SELECT (case when DWRate = 999 then (case when 500 <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when 500 <= 2000000 then (500 * 0.0075) / 12 else (500 * 0.0050) / 12 end) else (500 * ( DWRate / 100)) / 12 end) as 'FeeDW', (500 * ( PWRate / 100) / 12) as 'FeePW'
$this->db->from('pmis2_egm_jobdonedet j');
$this->db->join('pmis2_egm_assetregistration ar' , 'j.v_HospitalCode=ar.V_Hospitalcode' );
$this->db->join('pmis2_egm_schconfirmmon ppm' , 'j.v_HospitalCode=ar.V_Hospitalcode AND ar.V_Asset_no=ppm.v_Asset_no AND j.v_Wrkordno=ppm.v_WrkOrdNo' );
//$this->db->join('asset_depreciate_value C', 'ppm.v_HospitalCode=ar.V_Hospitalcode AND ar.V_Asset_no=ppm.v_Asset_no AND j.v_Wrkordno=ppm.v_WrkOrdNo');
$this->db->where('ppm.v_Actionflag <> ', 'D');
$this->db->where('ar.V_Asset_no = ', $assetno);
$this->db->where('ar.V_Hospitalcode = ', $this->session->userdata('hosp_code'));
$query = $this->db->get();
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}			

function ppminfo($wrkordno)
{

$this->db->select("ppm.*, l.v_Location_Name, job.v_jobtype, job.v_weeksch, IFNULL(ar.V_Equip_code,job.v_checklistcode) AS v_checklistcode, dpt.v_userdeptdesc, ar.v_tag_no, ar.v_user_dept_code, ar.v_location_code, ar.v_model_no, ar.v_serial_no, ar.v_asset_no, am.v_checklistcode, ar.v_asset_name, m.new_asset_type,ag.V_Wrn_end_code",FALSE);
//SELECT (case when DWRate = 999 then (case when 500 <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when 500 <= 2000000 then (500 * 0.0075) / 12 else (500 * 0.0050) / 12 end) else (500 * ( DWRate / 100)) / 12 end) as 'FeeDW', (500 * ( PWRate / 100) / 12) as 'FeePW'
$this->db->from('pmis2_egm_schconfirmmon ppm');
$this->db->join('pmis2_egm_assetregistration ar' , "ppm.v_HospitalCode=ar.V_Hospitalcode AND ppm.v_HospitalCode=ar.V_Hospitalcode AND ar.V_Asset_no=ppm.v_Asset_no AND ppm.v_Actionflag <> 'D' " );
$this->db->join('pmis2_egm_assetreg_general ag','ag.v_hospital_code = ar.v_hospitalcode AND ag.v_asset_no = ar.v_asset_no ');
$this->db->join('pmis2_egm_assetmaintenance am','am.v_hospitalcode = ar.v_hospitalcode AND am.v_assetno = ag.v_asset_no ');
$this->db->join('pmis2_egm_assetlocation l','ar.V_Location_code = l.V_location_code AND ar.V_hospitalcode = l.v_hospitalcode');
$this->db->join('pmis2_sa_asset_mapping m','m.old_asset_type = ar.v_equip_code');
$this->db->join('pmis2_sa_userdept dpt','ag.v_hospital_code = dpt.v_hospitalcode AND ar.v_user_dept_code = dpt.v_userdeptcode ');
$this->db->join('pmis2_egm_assetjobtype job','ag.v_hospital_code = job.v_hospitalcode AND ar.v_asset_no = job.v_asset_no AND ppm.v_jobtype = job.v_JobType');
$this->db->where('ppm.v_Actionflag <> ', 'D');
$this->db->where('ppm.v_wrkordno = ', $wrkordno);
$this->db->where('ar.V_Hospitalcode = ', $this->session->userdata('hosp_code'));
$query = $this->db->get();
//echo "laalla".$query->DWRate;
echo $this->db->last_query();
exit();
return $query->result();

}

function assetlaborpartbywo($assetno)
{
$this->db->select("A.v_WrkOrdNo AS v_wrkordno, IFNULL(SUM(IFNULL(A.n_Total1,0)) + SUM(IFNULL(A.n_Total2,0)) + SUM(IFNULL(A.n_Total3,0)),0) AS totallabor, IFNULL(SUM(IFNULL(n_PartTotal, IFNULL(n_vTotal,0))),0) AS totalpart",FALSE);
$this->db->from('pmis2_emg_jobvisit1 A');
$this->db->join('pmis2_egm_service_request B' , 'A.v_Wrkordno = B.V_Request_no AND B.V_hospitalcode = A.v_HospitalCode' );
$this->db->where('B.V_actionflag <> ', 'D');
$this->db->where('B.V_Asset_no = ', $assetno);
$this->db->where('B.V_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->group_by("A.v_WrkOrdNo"); 
$query = $this->db->get();
//echo $this->db->last_query();
//exit();
return $query->result();

/*$laborcost = 0;
$partcost = 0;


$wototal = array();
for ($x = 1; $x <4; $x++) {

$this->db->select("A.v_wrkordno AS v_wrkordno, IFNULL(SUM(IFNULL(A.n_Total1,0)) + SUM(IFNULL(A.n_Total2,0)) + SUM(IFNULL(A.n_Total3,0)),0) AS totallabor, IFNULL(SUM(IFNULL(n_PartTotal, IFNULL(n_vTotal,0))),0) AS totalpart",FALSE);
//SELECT (case when DWRate = 999 then (case when 500 <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when 500 <= 2000000 then (500 * 0.0075) / 12 else (500 * 0.0050) / 12 end) else (500 * ( DWRate / 100)) / 12 end) as 'FeeDW', (500 * ( PWRate / 100) / 12) as 'FeePW'
$this->db->from('pmis2_emg_jobvisit'.$x.' A');
$this->db->join('pmis2_egm_service_request B' , 'A.v_Wrkordno = B.V_Request_no AND B.V_hospitalcode = A.v_HospitalCode' );
$this->db->where('B.v_ActionFlag <> ', 'D');
$this->db->where('B.v_Asset_no = ', $assetno);
$this->db->where('B.V_Hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->group_by("A.v_wrkordno"); 
$query = $this->db->get();
//echo $this->db->last_query();
//print_r($query->result());
$raray = $query->result();
foreach ($raray as $key => $value) {
    if (array_key_exists($value[v_wrkordno], $wototal)) {
        $wototal[$value[v_wrkordno]] +=  $value[totallabor] + $value[totalpart];
    } else {
        $wototal[$value[v_wrkordno]] = $value[totallabor] + $value[totalpart];
    }
}
//echo $raray[0]->totallabor;
//echo $raray[0]->totalpart.'<br>';
//$laborcost = $raray[0]->totallabor + $laborcost;
//$partcost = $raray[0]->totalpart + $partcost;

}
//$hasil = array("totallabor" => $laborcost, "totalpart" => $partcost );
//print_r($hasil);
//echo 'nilai akhir'.$laborcost.','.$partcost;
//exit();
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
//return $query->result();
return $wototal;*/

}

function assetwolog($assetno)
{

$this->db->select("sr.d_date, j.d_DateDone,j.v_Wrkordno, j.v_summary, j.v_jobTypecode, j.v_FailureCode, j.n_Downtime,	j.n_Servicetime, j.v_HospitalCode, sr.v_closeddate",FALSE);
//SELECT (case when DWRate = 999 then (case when 500 <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when 500 <= 2000000 then (500 * 0.0075) / 12 else (500 * 0.0050) / 12 end) else (500 * ( DWRate / 100)) / 12 end) as 'FeeDW', (500 * ( PWRate / 100) / 12) as 'FeePW'
$this->db->from('pmis2_egm_jobdonedet j');
$this->db->join('pmis2_egm_assetregistration ar' , 'j.v_HospitalCode=ar.V_Hospitalcode' );
$this->db->join('pmis2_egm_service_request sr' , 'j.v_HospitalCode=sr.V_hospitalcode AND ar.V_Asset_no=sr.v_Asset_no AND j.v_Wrkordno=sr.V_Request_no' );
//$this->db->join('asset_depreciate_value C', 'sr.v_HospitalCode=ar.V_Hospitalcode AND ar.V_Asset_no=sr.v_Asset_no AND j.v_Wrkordno=sr.V_Request_no');
$this->db->where('sr.v_Actionflag <> ', 'D');
$this->db->where('ar.V_Asset_no = ', $assetno);
$this->db->where('ar.V_Hospitalcode = ', $this->session->userdata('hosp_code'));
$query = $this->db->get();
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}		

function assetcomplaintlog($assetno)
{

$this->db->select("*",FALSE);
//SELECT (case when DWRate = 999 then (case when 500 <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when 500 <= 2000000 then (500 * 0.0075) / 12 else (500 * 0.0050) / 12 end) else (500 * ( DWRate / 100)) / 12 end) as 'FeeDW', (500 * ( PWRate / 100) / 12) as 'FeePW'
$this->db->from('pmis2_com_complaint');
$this->db->where('v_servicecode =', $this->session->userdata('usersess'));
$this->db->where('v_assetno = ', $assetno);
$this->db->where('V_Hospitalcode = ', $this->session->userdata('hosp_code'));
$query = $this->db->get();
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function assetcomplaint($comp_no)
{

$this->db->select("a.*, b.v_Location_Name, d.*",FALSE);
//SELECT (case when DWRate = 999 then (case when 500 <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when 500 <= 2000000 then (500 * 0.0075) / 12 else (500 * 0.0050) / 12 end) else (500 * ( DWRate / 100)) / 12 end) as 'FeeDW', (500 * ( PWRate / 100) / 12) as 'FeePW'
$this->db->from('pmis2_com_complaint a');
$this->db->join('pmis2_egm_assetlocation b' , 'a.v_HospitalCode=b.v_hospitalcode AND a.v_Location  = b.v_location_code','left outer' );
$this->db->join('pmis2_sa_userdept d', 'd.v_UserDeptCode = b.v_UserDeptCode AND d.v_hospitalcode = b.v_hospitalcode','left outer');
$this->db->where('a.v_servicecode =', $this->session->userdata('usersess'));
$this->db->where('a.v_complaintno = ', $comp_no);
$this->db->where('a.V_Hospitalcode = ', $this->session->userdata('hosp_code'));
$query = $this->db->get();
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}	

function volist()
{

$this->db->select("R.vvfhospitalcode, R.vvfSubmissionDate, SUM(CASE WHEN DET.vvfhospitalcode = R.vvfhospitalcode THEN 1 ELSE 0 END) nTotalItem, SUM(CASE WHEN DET.vvfhospitalcode = R.vvfhospitalcode THEN DET.vvffeedw ELSE 0 END) nTotalFeeDW, SUM(CASE WHEN DET.vvfhospitalcode = R.vvfhospitalcode THEN DET.vvffeepw ELSE 0 END) nTotalFeePW, R.vvfPeriod, R.vvfDateStart, R.vvfDateEnd, R.vvfTimestamp, R.vvfReportStatus, R.vvfReportno",FALSE);
//SELECT (case when DWRate = 999 then (case when 500 <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when 500 <= 2000000 then (500 * 0.0075) / 12 else (500 * 0.0050) / 12 end) else (500 * ( DWRate / 100)) / 12 end) as 'FeeDW', (500 * ( PWRate / 100) / 12) as 'FeePW'
$this->db->from('ap_vo_vvfdetails DET',FALSE); 
$this->db->join('pmis2_sa_userhospital UH' , "DET.vvfhospitalcode = UH.v_hospitalcode" ,FALSE);
$this->db->join('ap_vo_vvfheader R' , "R.vvfhospitalcode = UH.v_hospitalcode" ,FALSE);
$this->db->where('UH.v_actionflag <> ', 'D');
$this->db->where('DET.vvfactionflag <> ', 'D');
$this->db->where('R.vvfactionflag <> ', 'D');
$this->db->where('UH.v_userid =', $this->session->userdata('v_UserName'));
$this->db->where('R.vvfHospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->group_by('R.vvfPeriod, R.vvfreportno, R.vvfhospitalcode, R.vvfdatestart, R.vvfdateend, R.vvftimestamp, vvfReportstatus, R.vvfSubmissionDate');
$query = $this->db->get();
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}		
function volist2($Period) {
$this->db->select("R.vvfhospitalcode, R.vvfSubmissionDate, SUM(CASE WHEN DET.vvfhospitalcode = R.vvfhospitalcode THEN 1 ELSE 0 END) nTotalItem, SUM(CASE WHEN DET.vvfhospitalcode = R.vvfhospitalcode THEN DET.vvfFeeDW ELSE 0 END) nTotalFeeDW, SUM(CASE WHEN DET.vvfhospitalcode = R.vvfhospitalcode THEN DET.vvfFeePW ELSE 0 END) nTotalFeePW, R.vvfPeriod, R.vvfDateStart, R.vvfDateEnd, R.vvfTimestamp, R.vvfReportStatus, R.vvfReportno",FALSE);
//SELECT (case when DWRate = 999 then (case when 500 <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when 500 <= 2000000 then (500 * 0.0075) / 12 else (500 * 0.0050) / 12 end) else (500 * ( DWRate / 100)) / 12 end) as 'FeeDW', (500 * ( PWRate / 100) / 12) as 'FeePW'
$this->db->from('ap_vo_vvfdetails DET',FALSE); 
$this->db->join('pmis2_sa_userhospital UH' , "DET.vvfhospitalcode = UH.v_hospitalcode" ,FALSE);
$this->db->join('ap_vo_vvfheader R' , "R.vvfhospitalcode = UH.v_hospitalcode" ,FALSE);
$this->db->where('UH.v_actionflag  <>', 'D');
$this->db->where('DET.vvfactionflag <> ', 'D');
$this->db->where('R.vvfactionflag <> ', 'D');
$this->db->where('UH.v_userid =', $this->session->userdata('v_UserName'));
$this->db->where('R.vvfPeriod = ', $Period);
$this->db->group_by('R.vvfPeriod, R.vvfreportno, R.vvfhospitalcode, R.vvfdatestart, R.vvfdateend, R.vvftimestamp, vvfReportstatus, R.vvfSubmissionDate');
$this->db->order_by('R.vvfhospitalcode');
$query = $this->db->get();
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}	
function assetrates($o)
{
//$this->db->select('COUNT(*)');
$this->db->select("*, case when dwrate=999.00 then '*' else convert(dwrate, CHAR) end dwrate1",FALSE);
$this->db->from('ap_vo_assetrates'); 
$this->db->where('actionflag <> ', 'D');
$this->db->group_by('assetcategorycode, assettypecode');
if ($o == '' OR $o == 0){
$this->db->order_by('assetcategorycode, assettypecode');
}
elseif ($o == 1){
$this->db->order_by('assettypecode');
}
elseif ($o == 2){
$this->db->order_by('status');
}
elseif ($o == 3){
$this->db->order_by('dwrate');
}
elseif ($o == 4){
$this->db->order_by('pwrate');
}
$query = $this->db->get();
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}	
		
function complaint_update($cmplnt_no){
	
$this->db->select('*',FALSE);
$this->db->from('pmis2_com_complaint s');
//$this->db->join('pmis2_egm_service_request sr','s.v_RequestNo = sr.V_Request_no');
$this->db->join('pmis2_egm_assetregistration r','s.v_AssetNo = r.V_Asset_no AND s.v_HospitalCode = r.V_Hospitalcode','left');
$this->db->join('pmis2_egm_assetreg_general g','r.V_Asset_no = g.V_Asset_no AND r.v_Hospitalcode = g.V_Hospital_code','left');
$this->db->join('pmis2_egm_assetlocation l','s.v_Location = l.V_location_code AND s.v_HospitalCode = l.v_hospitalcode','left');
$this->db->join('pmis2_sa_userdept d', 'd.v_UserDeptCode = l.v_UserDeptCode AND d.v_hospitalcode = l.v_hospitalcode','left');
$this->db->where('v_ComplaintNo',$cmplnt_no);

$query = $this->db->get();
//echo $this->db->last_query();
//exit();
    
$query_result = $query->result();
return $query_result;
}

function complaint_relreq($cmplnt_no){
	
$this->db->select('sr.*,r.V_Tag_no,r.V_Serial_no,',FALSE);
$this->db->from('pmis2_com_complaint s');
$this->db->join('pmis2_egm_service_request sr','s.v_RequestNo = sr.V_Request_no');
$this->db->join('pmis2_egm_assetregistration r','sr.V_Asset_no = r.V_Asset_no AND sr.V_hospitalcode = r.V_Hospitalcode');
$this->db->join('pmis2_egm_assetreg_general g','r.V_Asset_no = g.V_Asset_no AND r.v_Hospitalcode = g.V_Hospital_code');
$this->db->join('pmis2_egm_assetlocation l','sr.V_Location_code = l.V_location_code AND sr.V_hospitalcode = l.v_hospitalcode');
$this->db->join('pmis2_sa_userdept d', 'd.v_UserDeptCode = l.v_UserDeptCode AND d.v_hospitalcode = l.v_hospitalcode');
$this->db->where('s.v_ComplaintNo',$cmplnt_no);

$query = $this->db->get();
//echo $this->db->last_query();
//exit();
    
$query_result = $query->result();
return $query_result;
}

function get_assetmainte($assetno)
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
//$this->db->select("a.v_manufacturer, a.v_asset_name, a.v_asset_no, b.v_wrn_end_code, a.v_tag_no, a.v_serial_no, a.v_user_dept_code, a.v_location_code, LEFT(c.v_AssetCondition, 2) AS v_AssetCondition , LEFT(c.v_AssetStatus, 2) AS v_AssetStatus ,c.v_AssetVStatus, c.v_checklistcode, IFNULL(a.v_criticality, c.v_criticality) AS v_criticality, b.v_spareslistcode, c.v_assettypecode, c.v_assetrefno, c.d_refdate, c.v_safetytest ", FALSE);
$this->db->select("a.v_manufacturer, a.v_asset_name, a.v_asset_no, b.v_wrn_end_code, a.v_tag_no, a.v_serial_no, a.v_user_dept_code, a.v_location_code, LEFT(c.v_AssetCondition, 2) AS v_AssetCondition , LEFT(c.v_AssetStatus, 2) AS v_AssetStatus ,c.v_AssetVStatus, c.v_checklistcode,  c.v_criticality, b.v_spareslistcode, c.v_assettypecode, c.v_assetrefno, c.d_refdate, c.v_safetytest ", FALSE);
//$this->db->where('pmis2_sa_asset_mapping.old_asset_type = ', $typecd);
$this->db->where('a.V_service_code = ', $this->session->userdata('usersess'));
$this->db->where('a.V_Hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('a.V_Asset_no',$assetno);
//$this->db->where('pmis2_sa_equip_code.v_EffectiveDt_to > ', date('Y-m-d H:i:s'));
//$this->db->where('pmis2_sa_equip_code.v_ActiveStatus = ', 'Y');
$this->db->join('pmis2_egm_assetreg_general b','b.v_hospital_code = a.v_hospitalcode AND b.v_asset_no = a.v_asset_no ');
$this->db->join('pmis2_egm_assetmaintenance c','c.v_hospitalcode = a.v_hospitalcode AND c.v_assetno = a.v_asset_no ');
//$this->db->join('pmis2_sa_asset_mapping d','c.v_hospitalcode = a.v_hospitalcode AND c.v_assetno = a.v_asset_no ');
//$this->db->join('pmis2_egm_assetaaintenance e','c.v_hospitalcode = a.v_hospitalcode AND c.v_assetno = a.v_asset_no ');
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_assetregistration a');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_chklist($chklistcd)
{
if (isset($chklistcd)) {} else {$chklistcd='xxxx';}
$this->db->select("*",FALSE);
//SELECT (case when DWRate = 999 then (case when 500 <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when 500 <= 2000000 then (500 * 0.0075) / 12 else (500 * 0.0050) / 12 end) else (500 * ( DWRate / 100)) / 12 end) as 'FeeDW', (500 * ( PWRate / 100) / 12) as 'FeePW'
$this->db->from('ap_asset_heppm');
$this->db->where('actionflag <> ', 'D');
//$this->db->where('checklistCode = ', $chklistcd);
$this->db->where('assettype = ', $chklistcd);
//$this->db->where('assettype = ', $chklistcd);
$query = $this->db->get();
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function assetchklist($assetn)
{
$this->db->distinct();
$this->db->select("a.*",FALSE);
//SELECT (case when DWRate = 999 then (case when 500 <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when 500 <= 2000000 then (500 * 0.0075) / 12 else (500 * 0.0050) / 12 end) else (500 * ( DWRate / 100)) / 12 end) as 'FeeDW', (500 * ( PWRate / 100) / 12) as 'FeePW'
$this->db->from('ap_asset_heppm a');
$this->db->join('pmis2_sa_asset_mapping c','c.new_asset_type = a.assettype', FALSE);
$this->db->join('pmis2_egm_assetmaintenance b', 'c.old_asset_type = LEFT(b.V_assetno,char_length(b.V_assetno)-6)', FALSE);
$this->db->where('a.actionflag <> ', 'D');
$this->db->where('c.service_code = ', $this->session->userdata('usersess'));
$this->db->where('b.V_assetno = ', $assetn);
$this->db->order_by('a.checklistCode');
$query = $this->db->get();
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}	
function reportselection($period,$site){
$this->db->select('*');
$this->db->from('ap_vo_vvfdetails');
$this->db->where('substr(vvfReportNo,13,4)',$period);
$this->db->where('vvfActionflag <>','D');
$this->db->where('vvfHospitalCode',$site);
$query = $this->db->get();
//echo $this->db->last_query();
//exit();
return $query->result();
}
function vvf_analysis1($period){
$this->db->select("COUNT(*) AS total");
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V20' then 1 else 0 end) AS V20",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V21' then 1 else 0 end) AS V21",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V22' then 1 else 0 end) AS V22",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V30' then 1 else 0 end) AS V30",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V31' then 1 else 0 end) AS V31",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V32' then 1 else 0 end) AS V32",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V4:0' then 1 else 0 end) AS V40",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V4:1' then 1 else 0 end) AS V41",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V4:2' then 1 else 0 end) AS V42",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V4L0' then 1 else 0 end) AS V4L0",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V4L1' then 1 else 0 end) AS V4L1",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V4L2' then 1 else 0 end) AS V4L2",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V50' then 1 else 0 end) AS V50",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V51' then 1 else 0 end) AS V51",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V52' then 1 else 0 end) AS V52",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V60' then 1 else 0 end) AS V60",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V61' then 1 else 0 end) AS V61",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V62' then 1 else 0 end) AS V62",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V70' then 1 else 0 end) AS V70",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V71' then 1 else 0 end) AS V71",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V72' then 1 else 0 end) AS V72",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V80' then 1 else 0 end) AS V80",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V81' then 1 else 0 end) AS V81",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V82' then 1 else 0 end) AS V82",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V90' then 1 else 0 end) AS V90",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V91' then 1 else 0 end) AS V91",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V92' then 1 else 0 end) AS V92",FALSE);
$this->db->select("SUM(CASE vvfVStatus when 'V2' then 0 when 'V3' then 0 when 'V4' then 0 when 'V4L' then 0 when 'V5' then 0 when 'V6' then 0 when 'V7' then 0 when 'V8' then 0 when 'V9' then 0 else 1 end) AS OTHER",FALSE);
$this->db->from('ap_vo_vvfdetails');
$this->db->where('vvfActionflag <>','D');
$this->db->where('SUBSTR(vvfReportNo,13,4)',$period);
$query = $this->db->get();
//echo $this->db->last_query();
//exit();
return $query->result();
}
function vvf_analysis1month($period,$monloop){
$this->db->select("COUNT(*) AS total");
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V20' then 1 else 0 end) AS V20",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V21' then 1 else 0 end) AS V21",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V22' then 1 else 0 end) AS V22",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V30' then 1 else 0 end) AS V30",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V31' then 1 else 0 end) AS V31",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V32' then 1 else 0 end) AS V32",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V4:0' then 1 else 0 end) AS V40",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V4:1' then 1 else 0 end) AS V41",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V4:2' then 1 else 0 end) AS V42",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V4L0' then 1 else 0 end) AS V4L0",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V4L1' then 1 else 0 end) AS V4L1",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V4L2' then 1 else 0 end) AS V4L2",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V50' then 1 else 0 end) AS V50",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V51' then 1 else 0 end) AS V51",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V52' then 1 else 0 end) AS V52",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V60' then 1 else 0 end) AS V60",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V61' then 1 else 0 end) AS V61",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V62' then 1 else 0 end) AS V62",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V70' then 1 else 0 end) AS V70",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V71' then 1 else 0 end) AS V71",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V72' then 1 else 0 end) AS V72",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V80' then 1 else 0 end) AS V80",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V81' then 1 else 0 end) AS V81",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V82' then 1 else 0 end) AS V82",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V90' then 1 else 0 end) AS V90",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V91' then 1 else 0 end) AS V91",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAuthorizedStatus) when 'V92' then 1 else 0 end) AS V92",FALSE);
$this->db->select("SUM(CASE vvfVStatus when 'V2' then 0 when 'V3' then 0 when 'V4' then 0 when 'V4L' then 0 when 'V5' then 0 when 'V6' then 0 when 'V7' then 0 when 'V8' then 0 when 'V9' then 0 else 1 end) AS OTHER",FALSE);
$this->db->from('ap_vo_vvfdetails');
$this->db->where('vvfActionflag <>','D');
$this->db->where('SUBSTR(vvfReportNo,13,4)',$period);
$this->db->where('MONTH(vvfSubmissionDate)',$monloop);
$query = $this->db->get();
//echo $this->db->last_query();
//echo '<br>';
return $query->result();
}
function vvf_analysis2($period){
$this->db->select("COUNT(*) AS total");
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V20' then 1 else 0 end) AS V20",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V21' then 1 else 0 end) AS V21",FALSE);

$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V30' then 1 else 0 end) AS V30",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V31' then 1 else 0 end) AS V31",FALSE);

$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V4:0' then 1 else 0 end) AS V40",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V4:1' then 1 else 0 end) AS V41",FALSE);

$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V4L0' then 1 else 0 end) AS V4L0",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V4L1' then 1 else 0 end) AS V4L1",FALSE);

$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V50' then 1 else 0 end) AS V50",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V51' then 1 else 0 end) AS V51",FALSE);

$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V60' then 1 else 0 end) AS V60",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V61' then 1 else 0 end) AS V61",FALSE);

$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V70' then 1 else 0 end) AS V70",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V71' then 1 else 0 end) AS V71",FALSE);

$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V80' then 1 else 0 end) AS V80",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V81' then 1 else 0 end) AS V81",FALSE);

$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V90' then 1 else 0 end) AS V90",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V91' then 1 else 0 end) AS V91",FALSE);

$this->db->select("SUM(CASE vvfVStatus when 'V2' then 0 when 'V3' then 0 when 'V4' then 0 when 'V4L' then 0 when 'V5' then 0 when 'V6' then 0 when 'V7' then 0 when 'V8' then 0 when 'V9' then 0 else 1 end) AS OTHER",FALSE);
$this->db->from('ap_vo_vvfdetails');
$this->db->where('vvfActionflag <>','D');
$this->db->where('SUBSTR(vvfReportNo,13,4)',$period);
$query = $this->db->get();
//echo $this->db->last_query();
//exit();
return $query->result();
}
function vvf_analysis2month($period,$monloop){
$this->db->select("COUNT(*) AS total");
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V20' then 1 else 0 end) AS V20",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V21' then 1 else 0 end) AS V21",FALSE);

$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V30' then 1 else 0 end) AS V30",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V31' then 1 else 0 end) AS V31",FALSE);

$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V4:0' then 1 else 0 end) AS V40",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V4:1' then 1 else 0 end) AS V41",FALSE);

$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V4L0' then 1 else 0 end) AS V4L0",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V4L1' then 1 else 0 end) AS V4L1",FALSE);

$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V50' then 1 else 0 end) AS V50",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V51' then 1 else 0 end) AS V51",FALSE);

$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V60' then 1 else 0 end) AS V60",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V61' then 1 else 0 end) AS V61",FALSE);

$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V70' then 1 else 0 end) AS V70",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V71' then 1 else 0 end) AS V71",FALSE);

$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V80' then 1 else 0 end) AS V80",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V81' then 1 else 0 end) AS V81",FALSE);

$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V90' then 1 else 0 end) AS V90",FALSE);
$this->db->select("SUM(CASE CONCAT(vvfVStatus,vvfAssetLockedStatus) when 'V91' then 1 else 0 end) AS V91",FALSE);

$this->db->select("SUM(CASE vvfVStatus when 'V2' then 0 when 'V3' then 0 when 'V4' then 0 when 'V4L' then 0 when 'V5' then 0 when 'V6' then 0 when 'V7' then 0 when 'V8' then 0 when 'V9' then 0 else 1 end) AS OTHER",FALSE);
$this->db->from('ap_vo_vvfdetails');
$this->db->where('vvfActionflag <>','D');
$this->db->where('SUBSTR(vvfReportNo,13,4)',$period);
$this->db->where('MONTH(vvfSubmissionDate)',$monloop);
$query = $this->db->get();
//echo $this->db->last_query();
//echo '<br>';
return $query->result();
}
function validPeriod($month,$year){
$this->db->select('*');
$this->db->from('mis_qap_siq_detail');
$this->db->where('hosp_code',$this->session->userdata('hosp_code'));
//	$this->db->where('hosp_code','MKA'); //for test
$this->db->where('siq_month',substr($month,0,3));
//	$this->db->where('siq_month','Jan'); //for test
$this->db->where('siq_year',$year);
//	$this->db->where('siq_year','2015'); //for test
//$this->db->where('service','BES');
$this->db->where('service',$this->session->userdata('usersess'));
$this->db->limit(1);
$query = $this->db->get();
//echo $this->db->last_query();
//exit();
return $query->result();
}
function SIQsummary_siq($month,$year) {
$this->db->select("SUM(CASE ind_code WHEN 'BES05' THEN 1 ELSE 0 END) AS ppm_siq, SUM(CASE ind_code WHEN 'BES06' THEN 1 ELSE 0 end) AS uptime_siq",FALSE);
$this->db->from('mis_qap_siq_detail');
$this->db->where('hosp_code',$this->session->userdata('hosp_code'));
//	$this->db->where('hosp_code','MKA'); //for test
$this->db->where('siq_month',substr($month,0,3));
//	$this->db->where('siq_month','Jan'); //for test
$this->db->where('siq_year',$year);
//	$this->db->where('siq_year','2015'); //for test
//$this->db->where('service','BES');
$this->db->where('service',$this->session->userdata('usersess'));
$query = $this->db->get();
//echo $this->db->last_query();
//exit();
return $query->result();
}
function SIQsummary_car($siqno) {
$this->db->select("SUM(CASE ind_code WHEN 'BES05' THEN 1 ELSE 0 END) AS ppm_car, SUM(CASE ind_code WHEN 'BES06' THEN 1 ELSE 0 end) AS uptime_car",FALSE);
$this->db->from('mis_qap_car_header');
//$this->db->where('SUBSTR(siq_no,1,15)',$siqno);
	$this->db->where('SUBSTR(siq_no,1,14)',$siqno); //for test
$this->db->where('service','BES');
$where = '(action_flag <> "D" or action_flag IS NULL)';
$this->db->where($where);
$query = $this->db->get();
//echo $this->db->last_query();
//exit();
return $query->result();
}
function SIQDetails($month,$year){
$this->db->select('S.siq_no AS ssiq,S.*,C.*,Wo.equip_code');
$this->db->from('mis_qap_siq_detail S');
$this->db->join('mis_qap_car_header C','C.siq_no = S.siq_no','left outer');
$this->db->where('S.siq_month',substr($month,0,3));
//	$this->db->where('S.siq_month','Jan'); //for test
$this->db->where('S.siq_year',$year);
//	$this->db->where('S.siq_year','2015'); //for test
$this->db->where('S.hosp_code',$this->session->userdata('hosp_code'));
//	$this->db->where('S.hosp_code','MKA'); //for test
//$this->db->where('S.service','BES');$this->session->userdata('usersess')
$this->db->where('S.service',$this->session->userdata('usersess'));
if ($this->input->get('siq') == 1) {
$this->db->join('mis_qap_work_orders$candidate Wo','Wo.siqppm_no = S.siq_no');	
$this->db->where('S.ind_code',$this->session->userdata('usersess').'05');	
}
elseif ($this->input->get('siq') == 2) {
$this->db->join('mis_qap_work_orders$candidate Wo','Wo.siquptime_no = S.siq_no');
$this->db->where('S.ind_code',$this->session->userdata('usersess').'06');	
}
$this->db->order_by('S.siq_no,C.car_no');
$this->db->group_by('S.siq_no');
$query = $this->db->get();
//echo $this->db->last_query();
//exit();
return $query->result();
}
function qap3_asset($year,$month){
	$this->db->select('COUNT(*) AS jumlah');
	$this->db->from('mis_qap_inc_assets$candidate');
	$this->db->where('qap_period',$year.$month);
	//	$this->db->where('qap_period','201502');//for test
	$not_siq_status = array('Er','Ex');
	$this->db->where_not_in('SUBSTR(IFNULL(siquptime_status,""),1,2)',$not_siq_status);
	$this->db->where('siquptime_no IS NOT NULL',NULL);
	$this->db->where('hospital_code',$this->session->userdata('hosp_code'));
	//	$this->db->where('hospital_code','MKA');//for test
	$this->db->order_by('uptime_pct,asset_no');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function qap3_assetlim($year,$month,$limit,$start){
	$this->db->select('*');
	$this->db->from('mis_qap_inc_assets$candidate');
	$this->db->where('qap_period',$year.$month);
	//	$this->db->where('qap_period','201502');//for test
	$not_siq_status = array('Er','Ex');
	$this->db->where_not_in('SUBSTR(IFNULL(siquptime_status,""),1,2)',$not_siq_status);
	$this->db->where('siquptime_no IS NOT NULL',NULL);
	$this->db->where('hospital_code',$this->session->userdata('hosp_code'));
	//	$this->db->where('hospital_code','MKA');//for test
	$this->db->order_by('uptime_pct,asset_no');
	$this->db->limit($limit,$start);
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function qap3_asset_noSIQ($year,$month){
	$this->db->select('COUNT(*) AS jumlah');
	$this->db->from('mis_qap_inc_assets$candidate');
	$this->db->where('qap_period',$year.$month);
	//	$this->db->where('qap_period','201502');//for test
	$not_siq_status = array('Er','Ex');
	$this->db->where_not_in('SUBSTR(IFNULL(siquptime_status,""),1,2)',$not_siq_status);
	$this->db->where('siquptime_no',NULL);
	$where = '(siquptime_status IS NULL OR SUBSTR(siquptime_status,1,3) = "SIQ")';
	$this->db->where($where);
	$this->db->where('hospital_code',$this->session->userdata('hosp_code'));
	//	$this->db->where('hospital_code','MKA');//for test
	$this->db->order_by('uptime_pct,asset_no');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function qap3_asset_noSIQlim($year,$month,$limit,$start){
	$this->db->select('*');
	$this->db->from('mis_qap_inc_assets$candidate');
	$this->db->where('qap_period',$year.$month);
	//	$this->db->where('qap_period','201502');//for test
	$not_siq_status = array('Er','Ex');
	$this->db->where_not_in('SUBSTR(IFNULL(siquptime_status,""),1,2)',$not_siq_status);
	$this->db->where('siquptime_no',NULL);
	$where = '(siquptime_status IS NULL OR SUBSTR(siquptime_status,1,3) = "SIQ")';
	$this->db->where($where);
	$this->db->where('hospital_code',$this->session->userdata('hosp_code'));
	//	$this->db->where('hospital_code','MKA');//for test
	$this->db->order_by('uptime_pct,asset_no');
	$this->db->limit($limit,$start);
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function qap3_asset_Ex($year,$month){
	$this->db->select('COUNT(*) AS jumlah');
	$this->db->from('mis_qap_inc_assets$candidate');
	$this->db->where('qap_period',$year.$month);
	//	$this->db->where('qap_period','201502');//for test
	$not_siq_status = array('Ex');
	$this->db->where_in('SUBSTR(siquptime_status,1,2)',$not_siq_status);
	$this->db->where('hospital_code',$this->session->userdata('hosp_code'));
	//	$this->db->where('hospital_code','MKA');//for test
	$this->db->order_by('asset_no');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function qap3_asset_Exlim($year,$month,$limit,$start){
	$this->db->select('*');
	$this->db->from('mis_qap_inc_assets$candidate');
	$this->db->where('qap_period',$year.$month);
	//	$this->db->where('qap_period','201502');//for test
	$not_siq_status = array('Ex');
	$this->db->where_in('SUBSTR(siquptime_status,1,2)',$not_siq_status);
	$this->db->where('hospital_code',$this->session->userdata('hosp_code'));
	//	$this->db->where('hospital_code','MKA');//for test
	$this->db->order_by('asset_no');
	$this->db->limit($limit,$start);
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function qap3_wo($year,$month){
	//$this->db->select('wo.*,a.trpi,a.uptime_pct');
	$this->db->select('COUNT(*) AS jumlah');
	$this->db->from('mis_qap_work_orders$candidate wo');
	$this->db->join('mis_qap_inc_assets$candidate a','wo.asset_no = a.asset_no AND wo.qap_period = a.qap_period','left outer');
	$this->db->where('wo.qap_period',$year.$month);
	//	$this->db->where('wo.qap_period','201502');//for test
	$this->db->where('wo.hospital_code',$this->session->userdata('hosp_code'));
	//	$this->db->where('wo.hospital_code','MKA');//for test
	$where = '(LENGTH(wo.siquptime_no) > 0 OR LENGTH(wo.siqppm_no) > 0)';
	$this->db->where($where);
	if ('wo.type_code' == ''){
		$this->db->order_by('wo.siquptime_no DESC,wo.work_order_no');
	}
	else{
		$this->db->order_by('wo.siquptime_no DESC,wo.type_code,wo.work_order_no');
	}
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function qap3_wolim($year,$month,$limit,$start){
	$this->db->select('wo.*,a.trpi,a.uptime_pct');
	$this->db->from('mis_qap_work_orders$candidate wo');
	$this->db->join('mis_qap_inc_assets$candidate a','wo.asset_no = a.asset_no AND wo.qap_period = a.qap_period','left outer');
	$this->db->where('wo.qap_period',$year.$month);
	//	$this->db->where('wo.qap_period','201502');//for test
	$this->db->where('wo.hospital_code',$this->session->userdata('hosp_code'));
	//	$this->db->where('wo.hospital_code','MKA');//for test
	$where = '(LENGTH(wo.siquptime_no) > 0 OR LENGTH(wo.siqppm_no) > 0)';
	$this->db->where($where);
	if ('wo.type_code' == ''){
		$this->db->order_by('wo.siquptime_no DESC,wo.work_order_no');
	}
	else{
		$this->db->order_by('wo.siquptime_no DESC,wo.type_code,wo.work_order_no');
	}
	$this->db->limit($limit,$start);
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function qap3_wo_noSIQ($year,$month){
	//$this->db->select('wo.*,a.trpi,a.uptime_pct');
	$this->db->select('COUNT(*) AS jumlah');
	$this->db->from('mis_qap_work_orders$candidate wo');
	$this->db->join('mis_qap_inc_assets$candidate a','wo.asset_no = a.asset_no AND wo.qap_period = a.qap_period','left outer');
	$this->db->where('wo.qap_period',$year.$month);
	//	$this->db->where('wo.qap_period','201502');//for test
	$this->db->where('wo.hospital_code',$this->session->userdata('hosp_code'));
	//	$this->db->where('wo.hospital_code','MKA');//for test
	$this->db->where('wo.siqppm_no',NULL);
	$this->db->where('wo.siquptime_no',NULL);
	$where = '(substr(wo.siqppm_status,1,3) NOT IN ("Err","Exc") OR wo.siqppm_status IS NULL)';
	$where1 = '(substr(wo.siquptime_status,1,3) NOT IN ("Err","Exc") OR wo.siquptime_status IS NULL)';
	$this->db->where($where);
	$this->db->where($where1);
	if ('wo.type_code' == ''){
		$this->db->order_by('wo.work_order_no');
	}
	else{
		$this->db->order_by('wo.type_code,wo.work_order_no');
	}
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function qap3_wo_noSIQlim($year,$month,$limit,$start){
	$this->db->select('wo.*,a.trpi,a.uptime_pct');
	$this->db->from('mis_qap_work_orders$candidate wo');
	$this->db->join('mis_qap_inc_assets$candidate a','wo.asset_no = a.asset_no AND wo.qap_period = a.qap_period','left outer');
	$this->db->where('wo.qap_period',$year.$month);
	//	$this->db->where('wo.qap_period','201502');//for test
	$this->db->where('wo.hospital_code',$this->session->userdata('hosp_code'));
	//	$this->db->where('wo.hospital_code','MKA');//for test
	$this->db->where('wo.siqppm_no',NULL);
	$this->db->where('wo.siquptime_no',NULL);
	$where = '(substr(wo.siqppm_status,1,3) NOT IN ("Err","Exc") OR wo.siqppm_status IS NULL)';
	$where1 = '(substr(wo.siquptime_status,1,3) NOT IN ("Err","Exc") OR wo.siquptime_status IS NULL)';
	$this->db->where($where);
	$this->db->where($where1);
	if ('wo.type_code' == ''){
		$this->db->order_by('wo.work_order_no');
	}
	else{
		$this->db->order_by('wo.type_code,wo.work_order_no');
	}
	$this->db->limit($limit,$start);
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function qap3_wo_Exc($year,$month){
	$this->db->select('COUNT(*) AS jumlah');
	$this->db->from('mis_qap_work_orders$candidate');
	$this->db->where('qap_period',$year.$month);
	//	$this->db->where('qap_period','201502');//for test
	$this->db->where('hospital_code',$this->session->userdata('hosp_code'));
	//	$this->db->where('hospital_code','MKA');//for test
	$where = '(substr(siqppm_status,1,8)="Excluded" OR substr(siquptime_status,1,8)="Excluded")';
	$this->db->where($where);
	if ('type_code' == ''){
		$this->db->order_by('work_order_no');
	}
	else{
		$this->db->order_by('type_code,work_order_no');
	}
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function qap3_wo_Exclim($year,$month,$limit,$start){
	$this->db->select('*');
	$this->db->from('mis_qap_work_orders$candidate');
	$this->db->where('qap_period',$year.$month);
	//	$this->db->where('qap_period','201502');//for test
	$this->db->where('hospital_code',$this->session->userdata('hosp_code'));
	//	$this->db->where('hospital_code','MKA');//for test
	$where = '(substr(siqppm_status,1,8)="Excluded" OR substr(siquptime_status,1,8)="Excluded")';
	$this->db->where($where);
	if ('type_code' == ''){
		$this->db->order_by('work_order_no');
	}
	else{
		$this->db->order_by('type_code,work_order_no');
	}
	$this->db->limit($limit,$start);
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function qap3_actionnew($carid){
	$this->db->select('sl_no +1 AS sl_no');
	$this->db->from('mis_qap_car_detail');
	$this->db->where('car_no',$carid);
	$this->db->where('action_flag <>','D');
	$this->db->order_by('sl_no','desc');
	$this->db->limit(1);
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function qap3_newcarno($ssiq,$m,$y){
	$this->db->select('CAR.car_no');
	$this->db->from('mis_qap_car_header CAR');
	$this->db->join('mis_qap_siq_detail SIQ','CAR.siq_no = SIQ.siq_no');
	$this->db->where('CAR.siq_no',$ssiq);
	//$this->db->where('CAR.hosp_code',$this->session->userdata('hosp_code'));
		$this->db->where('CAR.hosp_code','MKA');//for test
	//$this->db->where('MONTH(SIQ.siq_date)',$m);
		$this->db->where('MONTH(SIQ.siq_date)',1);
	$this->db->where('YEAR(SIQ.siq_date)',$y);
	$this->db->order_by('CAR.car_no','desc');
	$this->db->limit(1);
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

function PWMP_period(){
	$this->db->select('*');
	$this->db->from('set_scheduler');
	$this->db->like('Scheduler_Name','PWMP','before');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function checkdcap($dept,$loc,$monthyear,$jobdate,$hosp){
	$this->db->select('Loc_Code,Dept_Code,Month_Year,Month,Year,Job_Date,hospital_code');
	$this->db->from('set_planner_scheduler');
	$where = '((Year <= '.substr($monthyear,2,4).' AND Month < '.substr($monthyear,0,2).') OR (Year < '.substr($monthyear,2,4).'))';
	$this->db->where($where);
	//$this->db->where('Job_Date < ',$jobdate);
	$this->db->where('Dept_Code',$dept);
	//$this->db->where('Loc_Code',$loc);
	$this->db->group_by('Loc_Code,Dept_Code,Job_Date');
	$this->db->where('hospital_code',$hosp);
	$this->db->order_by('Year DESC,Month DESC,Job_Date DESC');
	$this->db->limit(1);
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

function copydcap($dept,$loc,$monthyear,$jobdate,$hosp){
	$this->db->select('Job_Items,Time,Color_Code,Loc_Code,Dept_Code,hospital_code,Job_Date');
	$this->db->from('set_planner_scheduler');
	$this->db->where('Dept_Code',$dept);
	//$this->db->where('Loc_Code',$loc);
	$this->db->where('Month_Year',$monthyear);
	$this->db->where('hospital_code',$hosp);
	//$this->db->where('Job_Date',$jobdate);
	$this->db->where('Action_flag <>','D');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

function dcap_planner($dept,$loc,$monthyear,$jobdate,$hosp){
	$this->db->select('*');
	$this->db->from('set_planner_scheduler');
	$this->db->where('Dept_Code',$dept);
	//$this->db->where('Loc_Code',$loc);
	//$this->db->where('Job_Date <=',$jobdate);
	$this->db->where('Month_Year',$monthyear);
	$this->db->where('hospital_code',$hosp);
	$this->db->where('Action_flag <>','D');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

function dca_planner($dept,$loc,$monthyear,$jobdate,$hosp){
	$this->db->select('*');
	$this->db->from('set_hks_scheduler');
	$this->db->where('Dept_Code',$dept);
	//$this->db->where('Loc_Code',$loc);
	$this->db->where('Job_Date =',$jobdate);
	$this->db->where('Month_Year',$monthyear);
	//$this->db->where('Color_Code <>','');
	$this->db->where('Action_flag <>','D');
	//$this->db->where('hospital_code',$hosp);
	$query = $this->db->get();
	//echo $this->db->last_query();
	//echo '<br>';
	//exit();
	return $query->result();
}
function udca_planner($dept,$loc,$monthyear){
	$this->db->select('*');
	$this->db->from('update_hks_scheduler');
	$this->db->where('Dept_Code',$dept);
	$this->db->where('Loc_Code',$loc);
	$this->db->where('Month_Year',$monthyear);
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function checkdca($dept,$loc,$monthyear,$jobdate,$hosp){
	$this->db->select('Loc_Code,Dept_Code,Month_Year,Month,Year,Job_Date,hospital_code');
	//$this->db->select('substr(Month_Year,3,4)',false);
	$this->db->from('set_hks_scheduler');
	//$where = '((Year <= '.substr($monthyear,2,4).' AND Month < '.substr($monthyear,0,2).') OR (Year < '.substr($monthyear,2,4).'))';
	//$this->db->where($where);
	$this->db->where('Job_Date < ',$jobdate);
	$this->db->where('Dept_Code',$dept);
	//$this->db->where('Loc_Code',$loc);
	$this->db->group_by('Loc_Code,Dept_Code,Job_Date');
	$this->db->where('hospital_code',$hosp);
	//$this->db->order_by('Month_Year DESC');
	$this->db->order_by('Year DESC,Month DESC,Job_Date DESC');
	$this->db->limit(1);
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function ucheckdca($dept,$loc,$monthyear){
	$this->db->select('Loc_Code,Dept_Code,Month_Year,Month,Year');
	//$this->db->select('substr(Month_Year,3,4)',false);
	$this->db->from('update_hks_scheduler');
	$where = '((Year <= '.substr($monthyear,2,4).' AND Month < '.substr($monthyear,0,2).') OR (Year < '.substr($monthyear,2,4).'))';
	$this->db->where($where);
	$this->db->where('Dept_Code',$dept);
	$this->db->where('Loc_Code',$loc);
	$this->db->group_by('Loc_Code,Dept_Code,Month_Year');
	//$this->db->order_by('Month_Year DESC');
	$this->db->order_by('Year DESC,Month DESC');
	$this->db->limit(1);
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function copydca($dept,$loc,$monthyear,$jobdate){
	$this->db->select('Job_Items,Shift,Color_Code,Loc_Code,Dept_Code');
	$this->db->from('set_hks_scheduler');
	$this->db->where('Dept_Code',$dept);
	//$this->db->where('Loc_Code',$loc);
	$this->db->where('Month_Year',$monthyear);
	$this->db->where('Job_Date <= ',$jobdate);
        $this->db->where('hospital_code = ',$this->session->userdata('hosp_code'));
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function ucopydca($dept,$loc,$monthyear){
	$this->db->select('Job_Items,Shift,Color_Code,Loc_Code,Dept_Code');
	$this->db->from('update_hks_scheduler');
	$this->db->where('Dept_Code',$dept);
	$this->db->where('Loc_Code',$loc);
	$this->db->where('Month_Year',$monthyear);
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function latestvisit($wrk_ord){
	$this->db->select('v1.v_WrkOrdNo,v1.n_Visit');
	$this->db->from('pmis2_emg_jobvisit1 v1');
	$this->db->join('pmis2_egm_service_request s','s.V_Request_no = v1.v_WrkOrdNo');
	$this->db->join('pmis2_emg_jobvisit1tow vt','v1.v_WrkOrdNo = vt.v_WrkOrdNo');
	$this->db->where('v1.v_WrkOrdNo',$wrk_ord);
	$this->db->where('s.V_servicecode = ',$this->session->userdata('usersess'));
	$this->db->order_by('n_Visit DESC');
	$this->db->limit(1);
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	$query_result = $query->result();
	return $query_result;
}
function latestppmvisit($wrk_ord){
	$this->db->select('v1.v_WrkOrdNo,v1.n_Visit');
	$this->db->from('pmis2_emg_jobvisit1 v1');
	$this->db->join('pmis2_egm_schconfirmmon s','s.v_WrkOrdNo = v1.v_WrkOrdNo');
	$this->db->join('pmis2_emg_jobvisit1tow vt','v1.v_WrkOrdNo = vt.v_WrkOrdNo');
	$this->db->where('v1.v_WrkOrdNo',$wrk_ord);
	$this->db->where('s.v_ServiceCode = ',$this->session->userdata('usersess'));
	$this->db->order_by('n_Visit DESC');
	$this->db->limit(1);
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	$query_result = $query->result();
	return $query_result;
}
function assetimages($assetno,$service,$hosp){
	$this->db->select('imageid,file_name');
	$this->db->from('asset_images');
	$this->db->where('asset_no',$assetno);
	$this->db->where('service_code',$service);
	$this->db->where('hospital',$hosp);
	$this->db->where('action_flag <>','D');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	$query_result = $query->result();
	return $query_result;
}
function assetimage(){
	$this->db->select('asset_no,file_name');
	$this->db->from('asset_images');
	//$this->db->where('asset_no',$assetno);
	$this->db->where('service_code',$this->session->userdata('usersess'));
	$this->db->where('hospital',$this->session->userdata('hosp_code'));
	$this->db->group_by('asset_no');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	$query_result = $query->result();
	return $query_result;
}

function monthplan($year,$month){
	$this->db->select('*');
	$this->db->from('set_monthly_planner');
	$this->db->where('Year',$year);
	$this->db->where('Month',$month);
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	$query_result = $query->result();
	return $query_result;
}
function weekplan($year,$month){
	$this->db->select('*');
	$this->db->from('set_weekly_planner');
	$this->db->where('Year',$year);
	$this->db->where('Month',$month);
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	$query_result = $query->result();
	return $query_result;
}

function get_assetcatnos()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select(" pmis2_egm_assetregistration.V_Equip_code, pmis2_sa_equip_code.v_Equip_Desc AS V_Asset_name, COUNT(pmis2_egm_assetregistration.V_Equip_code) AS aTotal ", FALSE);
$this->db->join('pmis2_sa_equip_code','pmis2_egm_assetregistration.V_Equip_code = pmis2_sa_equip_code.v_Equip_Code');
$this->db->where('pmis2_egm_assetregistration.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('pmis2_egm_assetregistration.v_actionflag <> ', 'D');
$this->db->group_by('pmis2_egm_assetregistration.V_Equip_code, pmis2_sa_equip_code.v_Equip_Desc');
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_assetregistration');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_assetdetx($nilaiasset)
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select(" pmis2_egm_assetregistration.V_Equip_code, pmis2_egm_assetregistration.V_Asset_no, pmis2_egm_assetregistration.V_Asset_name, pmis2_egm_assetregistration.V_Tag_no, pmis2_egm_assetregistration.V_User_Dept_code, pmis2_sa_userdept.v_UserDeptDesc, pmis2_egm_assetregistration.V_Location_code, pmis2_egm_assetregistration.V_Manufacturer , pmis2_egm_assetmaintenance.V_Criticality, pmis2_egm_assetmaintenance.V_AssetCondition, pmis2_egm_assetmaintenance.v_AssetStatus, pmis2_egm_assetregistration.V_Model_no, pmis2_egm_assetregistration.V_Serial_no, pmis2_egm_assetregistration.V_hospitalcode, pmis2_egm_assetreg_general.N_Cost, asset_images.file_name ", FALSE);
$this->db->join('pmis2_egm_assetmaintenance','pmis2_egm_assetregistration.v_asset_no = pmis2_egm_assetmaintenance.v_assetno AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_egm_assetmaintenance.v_hospitalcode');
$this->db->join('pmis2_egm_assetreg_general','pmis2_egm_assetregistration.v_asset_no = pmis2_egm_assetreg_general.v_asset_no AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_egm_assetreg_general.v_hospital_code');
$this->db->join('asset_images','pmis2_egm_assetreg_general.v_asset_no = asset_images.asset_no AND pmis2_egm_assetreg_general.v_hospital_code = asset_images.hospital AND asset_images.action_flag <> "D"','left outer'); //
$this->db->join('pmis2_sa_userdept','pmis2_sa_userdept.v_userdeptcode = pmis2_egm_assetregistration.V_User_Dept_code AND pmis2_egm_assetreg_general.v_hospital_code = pmis2_sa_userdept.v_HospitalCode AND pmis2_sa_userdept.v_actionflag <> "D"','left outer');
$this->db->where('pmis2_egm_assetregistration.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('pmis2_egm_assetregistration.v_actionflag <> ', 'D');
$this->db->where('pmis2_egm_assetregistration.v_service_code = ', $this->session->userdata('usersess'));
$this->db->where('pmis2_egm_assetregistration.V_Equip_code ', $nilaiasset);
//$this->db->where('asset_images.action_flag <>', 'D');
$this->db->group_by('pmis2_egm_assetregistration.V_Asset_no'); //

//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_assetregistration');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_poploclistax($nilaidpt)
{
$this->db->distinct();
$this->db->select('pmis2_sa_userdept.v_userdeptdesc, pmis2_egm_assetlocation.*');
$this->db->join('pmis2_sa_userdept','pmis2_sa_userdept.v_hospitalcode = pmis2_egm_assetlocation.v_hospitalcode AND pmis2_sa_userdept.v_userdeptcode = pmis2_egm_assetlocation.v_UserDeptCode');
$this->db->where('pmis2_egm_assetlocation.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('pmis2_egm_assetlocation.v_actionflag <> ', 'D');
$this->db->where('pmis2_egm_assetlocation.v_UserDeptCode ', $nilaidpt);
$this->db->where('pmis2_sa_userdept.v_actionflag <> ', 'D');
$query = $this->db->get('pmis2_egm_assetlocation');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_assetmod()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select(" pmis2_egm_assetregistration.V_Model_no, pmis2_sa_equip_code.v_Equip_Desc AS V_Asset_name, COUNT(pmis2_egm_assetregistration.V_Equip_code) AS aTotal ", FALSE);
$this->db->join('pmis2_sa_equip_code','pmis2_egm_assetregistration.V_Equip_code = pmis2_sa_equip_code.v_Equip_Code');
$this->db->where('pmis2_egm_assetregistration.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('pmis2_egm_assetregistration.v_actionflag <> ', 'D');
$this->db->where('pmis2_egm_assetregistration.v_service_code = ', $this->session->userdata('usersess'));
$this->db->group_by('pmis2_egm_assetregistration.V_Model_no, pmis2_sa_equip_code.v_Equip_Desc');
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_assetregistration');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_assetmanu()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select(" pmis2_egm_assetregistration.V_Manufacturer, pmis2_sa_equip_code.v_Equip_Desc AS V_Asset_name, COUNT(pmis2_egm_assetregistration.V_Equip_code) AS aTotal ", FALSE);
$this->db->join('pmis2_sa_equip_code','pmis2_egm_assetregistration.V_Equip_code = pmis2_sa_equip_code.v_Equip_Code');
$this->db->where('pmis2_egm_assetregistration.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('pmis2_egm_assetregistration.v_actionflag <> ', 'D');
$this->db->where('pmis2_egm_assetregistration.v_service_code = ', $this->session->userdata('usersess'));
$this->db->group_by('pmis2_egm_assetregistration.V_Manufacturer, pmis2_sa_equip_code.v_Equip_Desc');
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_assetregistration');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_assetcost()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select(" pmis2_egm_assetregistration.V_Manufacturer, pmis2_egm_assetregistration.V_Asset_name AS V_Asset_name, COUNT(pmis2_egm_assetregistration.V_Equip_code) AS aTotal, SUM(pmis2_egm_assetreg_general.N_Cost) AS Totalcost  ", FALSE);
$this->db->join('pmis2_egm_assetmaintenance','pmis2_egm_assetregistration.v_asset_no = pmis2_egm_assetmaintenance.v_assetno AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_egm_assetmaintenance.v_hospitalcode');
$this->db->join('pmis2_egm_assetreg_general','pmis2_egm_assetregistration.v_asset_no = pmis2_egm_assetreg_general.v_asset_no AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_egm_assetreg_general.v_hospital_code');
$this->db->join('asset_images','pmis2_egm_assetreg_general.v_asset_no = asset_images.asset_no AND pmis2_egm_assetreg_general.v_hospital_code = asset_images.hospital','left'); //
$this->db->where('pmis2_egm_assetregistration.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('pmis2_egm_assetregistration.v_actionflag <> ', 'D');
$this->db->where('pmis2_egm_assetregistration.v_service_code = ', $this->session->userdata('usersess'));
$this->db->group_by('pmis2_egm_assetregistration.V_Manufacturer, pmis2_egm_assetregistration.V_Asset_name');
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_assetregistration');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_assetcostm()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select(" pmis2_egm_assetregistration.V_Model_no, pmis2_egm_assetregistration.V_Asset_name AS V_Asset_name, COUNT(pmis2_egm_assetregistration.V_Equip_code) AS aTotal, SUM(pmis2_egm_assetreg_general.N_Cost) AS Totalcost  ", FALSE);
$this->db->join('pmis2_egm_assetmaintenance','pmis2_egm_assetregistration.v_asset_no = pmis2_egm_assetmaintenance.v_assetno AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_egm_assetmaintenance.v_hospitalcode');
$this->db->join('pmis2_egm_assetreg_general','pmis2_egm_assetregistration.v_asset_no = pmis2_egm_assetreg_general.v_asset_no AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_egm_assetreg_general.v_hospital_code');
$this->db->join('asset_images','pmis2_egm_assetreg_general.v_asset_no = asset_images.asset_no AND pmis2_egm_assetreg_general.v_hospital_code = asset_images.hospital','left'); //
$this->db->where('pmis2_egm_assetregistration.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('pmis2_egm_assetregistration.v_actionflag <> ', 'D');
$this->db->where('pmis2_egm_assetregistration.v_service_code = ', $this->session->userdata('usersess'));
$this->db->group_by('pmis2_egm_assetregistration.V_Model_no, pmis2_egm_assetregistration.V_Asset_name');
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_assetregistration');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_assetcostmanu()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select(" pmis2_egm_assetregistration.V_Manufacturer, pmis2_egm_assetregistration.V_Asset_name AS V_Asset_name, COUNT(pmis2_egm_assetregistration.V_Equip_code) AS aTotal, SUM(pmis2_egm_assetreg_general.N_Cost) AS Totalcost  ", FALSE);
$this->db->join('pmis2_egm_assetmaintenance','pmis2_egm_assetregistration.v_asset_no = pmis2_egm_assetmaintenance.v_assetno AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_egm_assetmaintenance.v_hospitalcode');
$this->db->join('pmis2_egm_assetreg_general','pmis2_egm_assetregistration.v_asset_no = pmis2_egm_assetreg_general.v_asset_no AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_egm_assetreg_general.v_hospital_code');
$this->db->join('asset_images','pmis2_egm_assetreg_general.v_asset_no = asset_images.asset_no AND pmis2_egm_assetreg_general.v_hospital_code = asset_images.hospital','left'); //
$this->db->where('pmis2_egm_assetregistration.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('pmis2_egm_assetregistration.v_actionflag <> ', 'D');
$this->db->where('pmis2_egm_assetregistration.v_service_code = ', $this->session->userdata('usersess'));
$this->db->group_by('pmis2_egm_assetregistration.V_Manufacturer, pmis2_egm_assetregistration.V_Asset_name');
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_assetregistration');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_assetbdept()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select(" pmis2_sa_userdept.v_UserDeptDesc, pmis2_egm_assetregistration.V_Asset_name, COUNT(pmis2_egm_assetregistration.V_Equip_code) AS aTotal, SUM(pmis2_egm_assetreg_general.N_Cost) AS Totalcost  ", FALSE);
$this->db->join('pmis2_egm_assetmaintenance','pmis2_egm_assetregistration.v_asset_no = pmis2_egm_assetmaintenance.v_assetno AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_egm_assetmaintenance.v_hospitalcode');
$this->db->join('pmis2_egm_assetreg_general','pmis2_egm_assetregistration.v_asset_no = pmis2_egm_assetreg_general.v_asset_no AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_egm_assetreg_general.v_hospital_code');
$this->db->join('asset_images','pmis2_egm_assetreg_general.v_asset_no = asset_images.asset_no AND pmis2_egm_assetreg_general.v_hospital_code = asset_images.hospital','left'); //
$this->db->join('pmis2_sa_userdept','pmis2_egm_assetregistration.V_User_Dept_code = pmis2_sa_userdept.v_UserDeptCode AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_sa_userdept.v_HospitalCode');
$this->db->where('pmis2_egm_assetregistration.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('pmis2_egm_assetregistration.v_actionflag <> ', 'D');
$this->db->where('pmis2_egm_assetregistration.v_service_code = ', $this->session->userdata('usersess'));
$this->db->group_by('pmis2_sa_userdept.v_UserDeptDesc, pmis2_egm_assetregistration.V_Asset_name');
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_assetregistration');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}


function get_assetbyear()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select(" year(D_commission) AS Yearb, pmis2_sa_userdept.v_UserDeptDesc, pmis2_egm_assetregistration.V_Asset_name, COUNT(pmis2_egm_assetregistration.V_Equip_code) AS aTotal, SUM(pmis2_egm_assetreg_general.N_Cost) AS Totalcost  ", FALSE);
$this->db->join('pmis2_egm_assetmaintenance','pmis2_egm_assetregistration.v_asset_no = pmis2_egm_assetmaintenance.v_assetno AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_egm_assetmaintenance.v_hospitalcode');
$this->db->join('pmis2_egm_assetreg_general','pmis2_egm_assetregistration.v_asset_no = pmis2_egm_assetreg_general.v_asset_no AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_egm_assetreg_general.v_hospital_code');
$this->db->join('asset_images','pmis2_egm_assetreg_general.v_asset_no = asset_images.asset_no AND pmis2_egm_assetreg_general.v_hospital_code = asset_images.hospital','left'); //
$this->db->join('pmis2_sa_userdept','pmis2_egm_assetregistration.V_User_Dept_code = pmis2_sa_userdept.v_UserDeptCode AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_sa_userdept.v_HospitalCode');
$this->db->where('pmis2_egm_assetregistration.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('pmis2_egm_assetregistration.v_actionflag <> ', 'D');
$this->db->where('pmis2_egm_assetregistration.v_service_code = ', $this->session->userdata('usersess'));
$this->db->group_by('year(D_commission), pmis2_egm_assetregistration.V_Asset_name');
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_assetregistration');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}



function get_assetbloc()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select(" pmis2_egm_assetlocation.v_Location_Name, pmis2_egm_assetregistration.V_Asset_name, COUNT(pmis2_egm_assetregistration.V_Equip_code) AS aTotal, SUM(pmis2_egm_assetreg_general.N_Cost) AS Totalcost  ", FALSE);
$this->db->join('pmis2_egm_assetmaintenance','pmis2_egm_assetregistration.v_asset_no = pmis2_egm_assetmaintenance.v_assetno AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_egm_assetmaintenance.v_hospitalcode');
$this->db->join('pmis2_egm_assetreg_general','pmis2_egm_assetregistration.v_asset_no = pmis2_egm_assetreg_general.v_asset_no AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_egm_assetreg_general.v_hospital_code');
$this->db->join('asset_images','pmis2_egm_assetreg_general.v_asset_no = asset_images.asset_no AND pmis2_egm_assetreg_general.v_hospital_code = asset_images.hospital','left'); //
$this->db->join('pmis2_egm_assetlocation','pmis2_egm_assetregistration.V_location_code = pmis2_egm_assetlocation.V_location_code AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_egm_assetlocation.v_HospitalCode');
$this->db->where('pmis2_egm_assetregistration.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('pmis2_egm_assetregistration.v_actionflag <> ', 'D');
$this->db->where('pmis2_egm_assetregistration.v_service_code = ', $this->session->userdata('usersess'));
$this->db->group_by('pmis2_egm_assetlocation.v_Location_Name, pmis2_egm_assetregistration.V_Asset_name');
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_assetregistration');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_assetbstatus()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select(" pmis2_egm_assetmaintenance.v_AssetStatus, pmis2_egm_assetregistration.V_Asset_name, COUNT(pmis2_egm_assetregistration.V_Equip_code) AS aTotal, SUM(pmis2_egm_assetreg_general.N_Cost) AS Totalcost  ", FALSE);
$this->db->join('pmis2_egm_assetmaintenance','pmis2_egm_assetregistration.v_asset_no = pmis2_egm_assetmaintenance.v_assetno AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_egm_assetmaintenance.v_hospitalcode');
$this->db->join('pmis2_egm_assetreg_general','pmis2_egm_assetregistration.v_asset_no = pmis2_egm_assetreg_general.v_asset_no AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_egm_assetreg_general.v_hospital_code');
$this->db->join('asset_images','pmis2_egm_assetreg_general.v_asset_no = asset_images.asset_no AND pmis2_egm_assetreg_general.v_hospital_code = asset_images.hospital','left'); //
$this->db->where('pmis2_egm_assetregistration.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('pmis2_egm_assetregistration.v_actionflag <> ', 'D');
$this->db->where('pmis2_egm_assetregistration.v_service_code = ', $this->session->userdata('usersess'));
$this->db->group_by('pmis2_egm_assetmaintenance.v_AssetStatus, pmis2_egm_assetregistration.V_Asset_name');
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_assetregistration');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_assetbcond()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select(" pmis2_egm_assetmaintenance.v_AssetCondition, pmis2_egm_assetregistration.V_Asset_name, COUNT(pmis2_egm_assetregistration.V_Equip_code) AS aTotal, SUM(pmis2_egm_assetreg_general.N_Cost) AS Totalcost  ", FALSE);
$this->db->join('pmis2_egm_assetmaintenance','pmis2_egm_assetregistration.v_asset_no = pmis2_egm_assetmaintenance.v_assetno AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_egm_assetmaintenance.v_hospitalcode');
$this->db->join('pmis2_egm_assetreg_general','pmis2_egm_assetregistration.v_asset_no = pmis2_egm_assetreg_general.v_asset_no AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_egm_assetreg_general.v_hospital_code');
$this->db->join('asset_images','pmis2_egm_assetreg_general.v_asset_no = asset_images.asset_no AND pmis2_egm_assetreg_general.v_hospital_code = asset_images.hospital','left'); //
$this->db->where('pmis2_egm_assetregistration.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('pmis2_egm_assetregistration.v_actionflag <> ', 'D');
$this->db->where('pmis2_egm_assetregistration.v_service_code = ', $this->session->userdata('usersess'));
$this->db->group_by('pmis2_egm_assetmaintenance.v_AssetCondition, pmis2_egm_assetregistration.V_Asset_name');
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_assetregistration');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_assetbvar()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select(" pmis2_egm_assetmaintenance.v_AssetVStatus, pmis2_egm_assetregistration.V_Asset_name, COUNT(pmis2_egm_assetregistration.V_Equip_code) AS aTotal, SUM(pmis2_egm_assetreg_general.N_Cost) AS Totalcost ", FALSE);
$this->db->join('pmis2_egm_assetmaintenance','pmis2_egm_assetregistration.v_asset_no = pmis2_egm_assetmaintenance.v_assetno AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_egm_assetmaintenance.v_hospitalcode');
$this->db->join('pmis2_egm_assetreg_general','pmis2_egm_assetregistration.v_asset_no = pmis2_egm_assetreg_general.v_asset_no AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_egm_assetreg_general.v_hospital_code');
$this->db->join('asset_images','pmis2_egm_assetreg_general.v_asset_no = asset_images.asset_no AND pmis2_egm_assetreg_general.v_hospital_code = asset_images.hospital','left'); //
$this->db->where('pmis2_egm_assetregistration.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('pmis2_egm_assetregistration.v_actionflag <> ', 'D');
$this->db->where('pmis2_egm_assetregistration.v_service_code = ', $this->session->userdata('usersess'));
$this->db->group_by('pmis2_egm_assetmaintenance.v_AssetVStatus, pmis2_egm_assetregistration.V_Asset_name');
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_assetregistration');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_assetwarranty()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select(" pmis2_egm_assetmaintenance.v_AssetVStatus, pmis2_egm_assetregistration.V_Asset_name, COUNT(pmis2_egm_assetregistration.V_Equip_code) AS aTotal, SUM(pmis2_egm_assetreg_general.N_Cost) AS Totalcost, CASE pmis2_egm_assetreg_general.V_Wrn_end_code > now() WHEN TRUE THEN 'Under Warranty' WHEN FALSE THEN 'Past Warranty' ELSE NULL END as expose  ", FALSE);
$this->db->join('pmis2_egm_assetmaintenance','pmis2_egm_assetregistration.v_asset_no = pmis2_egm_assetmaintenance.v_assetno AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_egm_assetmaintenance.v_hospitalcode');
$this->db->join('pmis2_egm_assetreg_general','pmis2_egm_assetregistration.v_asset_no = pmis2_egm_assetreg_general.v_asset_no AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_egm_assetreg_general.v_hospital_code');
$this->db->join('asset_images','pmis2_egm_assetreg_general.v_asset_no = asset_images.asset_no AND pmis2_egm_assetreg_general.v_hospital_code = asset_images.hospital','left'); //
$this->db->where('pmis2_egm_assetregistration.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('pmis2_egm_assetregistration.v_actionflag <> ', 'D');
$this->db->where('pmis2_egm_assetregistration.v_service_code = ', $this->session->userdata('usersess'));
$this->db->group_by('pmis2_egm_assetmaintenance.v_AssetVStatus, pmis2_egm_assetregistration.V_Asset_name');
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_assetregistration');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_woresponselate()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select("TIMESTAMPDIFF(MINUTE,a.D_date,b.d_Date) AS mintaken, a.V_Request_no, a.V_priority_code  ", FALSE);
$this->db->join('pmis2_emg_jobresponse b','a.V_Request_no = b.v_WrkOrdNo');
$this->db->where('a.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('a.v_actionflag <> ', 'D');
$this->db->where('a.V_servicecode = ', $this->session->userdata('usersess'));
$this->db->where("TIMESTAMPDIFF(MINUTE,a.D_date,b.d_Date) > 5 AND a.V_priority_code = 'Emergency'");
$this->db->or_where("(TIMESTAMPDIFF(MINUTE,a.D_date,b.d_Date) > 15 AND a.V_priority_code = 'Normal')");
$this->db->where('a.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('a.v_actionflag <> ', 'D');
$this->db->where('a.V_servicecode = ', $this->session->userdata('usersess'));
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_service_request a ');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_woresponseontime()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select("TIMESTAMPDIFF(MINUTE,a.D_date,b.d_Date) AS mintaken, a.V_Request_no, a.V_priority_code  ", FALSE);
$this->db->join('pmis2_emg_jobresponse b','a.V_Request_no = b.v_WrkOrdNo');
$this->db->where('a.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('a.v_actionflag <> ', 'D');
$this->db->where('a.V_servicecode = ', $this->session->userdata('usersess'));
$this->db->where("TIMESTAMPDIFF(MINUTE,a.D_date,b.d_Date) < 5 AND a.V_priority_code = 'Emergency'");
$this->db->or_where("(TIMESTAMPDIFF(MINUTE,a.D_date,b.d_Date) < 15 AND a.V_priority_code = 'Normal')");
$this->db->where('a.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('a.v_actionflag <> ', 'D');
$this->db->where('a.V_servicecode = ', $this->session->userdata('usersess'));
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_service_request a ');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_wobydept()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select("count(a.V_Request_no) as nowo, b.v_userdeptdesc as deptname  ", FALSE);
$this->db->join('pmis2_sa_userdept b',"a.V_User_dept_code = b.v_UserDeptCode AND b.V_actionflag <> 'D'");
$this->db->where('a.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('a.v_actionflag <> ', 'D');
$this->db->where('a.V_servicecode = ', $this->session->userdata('usersess'));
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_service_request a ');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_wobyage()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select("count(TIMESTAMPDIFF(MONTH,D_date,now())) as nowo, TIMESTAMPDIFF(MONTH,D_date,now()) as monthe  ", FALSE);
$this->db->where('v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('v_actionflag <> ', 'D');
$this->db->where('V_servicecode = ', $this->session->userdata('usersess'));
$this->db->where('V_request_status <> ', 'C');
$this->db->group_by('TIMESTAMPDIFF(MONTH,D_date,now())');
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_service_request');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_wobypersonnel()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select("b.v_Personal1, count(b.v_Personal1) AS bil  ", FALSE);
$this->db->join('pmis2_emg_jobresponse b','a.V_Request_no = b.v_WrkOrdNo');
$this->db->where('a.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('a.v_actionflag <> ', 'D');
$this->db->where('a.V_servicecode = ', $this->session->userdata('usersess'));
$this->db->group_by('b.v_Personal1');
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_service_request a ');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_wobymodelman()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select("b.v_asset_name, b.v_manufacturer, b.v_model_no, count(b.v_model_no) AS bil  ", FALSE);
$this->db->join('pmis2_egm_assetregistration b','a.V_Asset_no = b.V_Asset_no AND a.V_servicecode = b.V_service_code AND a.v_hospitalcode = b.v_hospitalcode ');
$this->db->where('a.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('a.v_actionflag <> ', 'D');
$this->db->where('a.V_servicecode = ', $this->session->userdata('usersess'));
$this->db->group_by('b.v_asset_name, b.v_manufacturer, b.v_model_no');
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_service_request a ');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_wobyassetscv()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select("c.v_assetcondition, c.v_assetvstatus, c.v_assetstatus, count(*) AS bil  ", FALSE);
$this->db->join('pmis2_egm_assetregistration b','a.V_Asset_no = b.V_Asset_no AND a.V_servicecode = b.V_service_code AND a.v_hospitalcode = b.v_hospitalcode ');
$this->db->join('pmis2_egm_assetmaintenance c','a.v_asset_no = c.v_assetno AND a.v_hospitalcode = c.v_hospitalcode');
$this->db->where('a.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('a.v_actionflag <> ', 'D');
$this->db->where('a.V_servicecode = ', $this->session->userdata('usersess'));
$this->db->group_by('c.v_assetcondition, c.v_assetvstatus, c.v_assetstatus');
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_service_request a ');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_cresponselate()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select("TIMESTAMPDIFF(MINUTE,a.d_ComplaintDt,ifnull(b.d_follow_startdate, now())) AS mint ,a.v_Priority,a.v_Complaintno  ", FALSE);
$this->db->join('pmis2_com_complaintdet b', 'a.v_ServiceCode = b.v_ServiceCode AND a.v_ComplaintNo = b.v_ComplaintNo', 'left outer');
$this->db->where('a.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('a.v_actionflag <> ', 'D');
$this->db->where('a.V_servicecode = ', $this->session->userdata('usersess'));
$this->db->where("TIMESTAMPDIFF(MINUTE,a.d_ComplaintDt,ifnull(b.d_follow_startdate, now())) > 5 AND a.v_Priority = 'E'");
$this->db->or_where("(TIMESTAMPDIFF(MINUTE,a.d_ComplaintDt,ifnull(b.d_follow_startdate, now())) > 15 AND a.v_Priority = 'N')");
$this->db->where('a.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('a.v_actionflag <> ', 'D');
$this->db->where('a.V_servicecode = ', $this->session->userdata('usersess'));
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_com_complaint a ');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_cresponseontime()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select("TIMESTAMPDIFF(MINUTE,a.d_ComplaintDt,ifnull(b.d_follow_startdate, now())) AS mint ,a.v_Priority,a.v_Complaintno  ", FALSE);
$this->db->join('pmis2_com_complaintdet b', 'a.v_ServiceCode = b.v_ServiceCode AND a.v_ComplaintNo = b.v_ComplaintNo', 'left outer');
$this->db->where('a.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('a.v_actionflag <> ', 'D');
$this->db->where('a.V_servicecode = ', $this->session->userdata('usersess'));
$this->db->where("TIMESTAMPDIFF(MINUTE,a.d_ComplaintDt,ifnull(b.d_follow_startdate, now())) < 5 AND a.v_Priority = 'E'");
$this->db->or_where("(TIMESTAMPDIFF(MINUTE,a.d_ComplaintDt,ifnull(b.d_follow_startdate, now())) < 15 AND a.v_Priority = 'N')");
$this->db->where('a.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('a.v_actionflag <> ', 'D');
$this->db->where('a.V_servicecode = ', $this->session->userdata('usersess'));
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_com_complaint a ');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_cbydept()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select("count(b.v_userdeptdesc) as nowo, b.v_userdeptdesc as deptname  ", FALSE);
$this->db->join('pmis2_sa_userdept b',"a.V_Userdeptcode = b.v_UserDeptCode AND b.V_actionflag <> 'D'");
$this->db->where('a.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('a.v_actionflag <> ', 'D');
$this->db->where('a.V_servicecode = ', $this->session->userdata('usersess'));
$this->db->group_by('b.v_userdeptdesc');
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_com_complaint a ');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_cbyage()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select("count(TIMESTAMPDIFF(MONTH,d_Complaintdt,now())) as nowo, TIMESTAMPDIFF(MONTH,d_Complaintdt,now()) as monthe  ", FALSE);
$this->db->where('v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('v_actionflag <> ', 'D');
$this->db->where('V_servicecode = ', $this->session->userdata('usersess'));
$this->db->where('V_Complaintstatus <> ', 'C');
$this->db->group_by('TIMESTAMPDIFF(MONTH,d_Complaintdt,now())');
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_com_complaint');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_cbypersonnel()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select("b.v_PersonalName, count(b.v_PersonalName) AS bil  ", FALSE);
$this->db->join('pmis2_sa_personal b','a.v_personnelcode = b.v_personalcode');
$this->db->where('a.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('a.v_actionflag <> ', 'D');
$this->db->where('a.V_servicecode = ', $this->session->userdata('usersess'));
$this->db->group_by('b.v_PersonalName');
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_com_complaintdet a ');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_ppmtarget()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select("count(v_Wrkordstatus) AS bil, v_Wrkordstatus   ", FALSE);
$this->db->where('v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('v_actionflag <> ', 'D');
$this->db->where('V_servicecode = ', $this->session->userdata('usersess'));
$this->db->where('v_Wrkordstatus ', 'C');
$this->db->where('TIMESTAMPDIFF(DAY,d_DueDt,IFNULL(v_closeddate,now())) < 15');
$this->db->group_by('v_Wrkordstatus');
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_schconfirmmon');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_ppmofftarget()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select("count(TIMESTAMPDIFF(DAY,d_DueDt,IFNULL(v_closeddate,now()))) AS bil, TIMESTAMPDIFF(DAY,d_DueDt,IFNULL(v_closeddate,now())) AS DAYSS   ", FALSE);
$this->db->where('v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('v_actionflag <> ', 'D');
$this->db->where('V_servicecode = ', $this->session->userdata('usersess'));
$this->db->where('v_Wrkordstatus <>', 'C');
$this->db->where('TIMESTAMPDIFF(DAY,d_DueDt,IFNULL(v_closeddate,now())) > 15');
$this->db->group_by('TIMESTAMPDIFF(DAY,d_DueDt,IFNULL(v_closeddate,now()))');
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_schconfirmmon');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_ppmmm()
{
//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select("count(b.v_equip_code) AS bil, b.v_equip_code, b.V_manufacturer, b.V_Model_no  ", FALSE);
$this->db->join('pmis2_egm_assetregistration b','a.v_Asset_no = b.V_Asset_no');
$this->db->where('a.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('a.v_actionflag <> ', 'D');
$this->db->where('a.V_servicecode = ', $this->session->userdata('usersess'));
$this->db->group_by('b.v_equip_code, b.V_manufacturer, b.V_Model_no');
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_schconfirmmon a ');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_ppmld()
{
//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select("count(c.v_location_name) AS bil, d.v_userdeptdesc, c.v_location_name ", FALSE);
$this->db->join('pmis2_egm_assetregistration b','a.v_Asset_no = b.V_Asset_no');
$this->db->join('pmis2_egm_assetlocation c',"c.v_userdeptcode = b.v_user_dept_code AND c.V_location_code = b.V_location_code AND c.V_Actionflag <> 'D'");
$this->db->join('pmis2_sa_userdept d',"d.v_userdeptcode = b.v_user_dept_code AND d.v_hospitalcode = b.v_hospitalcode AND d.V_Actionflag <> 'D'");
$this->db->where('a.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('a.v_actionflag <> ', 'D');
$this->db->where('a.V_servicecode = ', $this->session->userdata('usersess'));
$this->db->group_by('d.v_userdeptdesc, c.v_location_name');
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_schconfirmmon a ');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_ppmscv()
{
//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select("c.v_assetcondition, c.v_assetvstatus, c.v_assetstatus, count(*) AS bil  ", FALSE);
$this->db->join('pmis2_egm_assetregistration b','a.v_Asset_no = b.V_Asset_no');
$this->db->join('pmis2_egm_assetmaintenance c','a.v_asset_no = c.v_assetno AND a.v_hospitalcode = c.v_hospitalcode');
$this->db->where('a.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('a.v_actionflag <> ', 'D');
$this->db->where('a.V_servicecode = ', $this->session->userdata('usersess'));
$this->db->group_by('c.v_assetcondition, c.v_assetvstatus, c.v_assetstatus');
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_schconfirmmon a ');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function get_ppmbypersonnel()
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->select("b.v_Personal1, count(b.v_Personal1) AS bil  ", FALSE);
$this->db->join('pmis2_emg_jobresponse b','a.v_WrkOrdNo = b.v_WrkOrdNo');
$this->db->where('a.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('a.v_actionflag <> ', 'D');
$this->db->where('a.V_servicecode = ', $this->session->userdata('usersess'));
$this->db->group_by('b.v_Personal1');
//$this->db->like('V_asset_no', $assetcd, 'after'); 
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_schconfirmmon a ');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

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
function vendorcodegen($venname){
	$this->db->select('right(v_vendorcode,length(v_vendorcode) - 3) + 1 as N_vencode, length(v_vendorcode) - 3 as T_vencode',FALSE);
	$this->db->from('pmis2_sa_vendor');
	$this->db->like('v_vendorname',$venname,'after');
	$this->db->order_by('v_vendorcode','DESC');
	$this->db->limit(1);
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function userfullname($username){
	$this->db->select('v_UserID,v_UserName');
	$this->db->from('pmis2_sa_user');
	$this->db->where('v_UserID',$username);
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function jic_planner($dept,$monthyear,$jobdate,$hosp){
	$this->db->select('*');
	$this->db->from('set_jic_scheduler');
	$this->db->where('Dept_Code',$dept);
	$this->db->where('Month_Year',$monthyear);
	//$this->db->where('Job_Date',$jobdate);
	$this->db->where('hospital_code',$hosp);
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

function assetregrep($assetno,$hosp,$servcode){
$query = $this->db->query("SELECT `x`.`V_Tag_no`,`x`.`V_Asset_no`, `x`.`V_Hospitalcode`, `x`.`V_Asset_name`, `x`.`V_Equip_code`, `x`.`V_Make`, `x`.`V_Model_no`, `x`.`V_Serial_no`, `x`.`v_chasisno`, `x`.`v_engineno`, `x`.`v_registrationno`, `x`.`N_Cost`, `x`.`V_PO_date`, `x`.`D_commission`, `x`.`V_Wrn_end_code`, `x`.`V_Vendor_code`, `x`.`V_Criticality`, `x`.`v_AssetStatus`, `x`.`v_AssetCondition`, `x`.`v_AssetVStatus`, `x`.`v_Location_Name`, `x`.`v_UserDeptDesc`, `x`.`V_User_Dept_code`, `x`.`V_Location_code`, `x`.`V_PO_no`, FORMAT(SUM(`x`.`parttotal`),2) as parttotal, FORMAT(SUM(`x`.`labourtotal`),2) as labourtotal FROM (
	SELECT `r`.`V_Tag_no`,`r`.`V_Asset_no`, `r`.`V_Hospitalcode`, `r`.`V_Asset_name`, `r`.`V_Equip_code`, `r`.`V_Make`, `r`.`V_Model_no`, `r`.`V_Serial_no`, `r`.`v_chasisno`, `r`.`v_engineno`, `r`.`v_registrationno`, `g`.`N_Cost`, `g`.`V_PO_date`, `g`.`D_commission`, `g`.`V_Wrn_end_code`, `g`.`V_Vendor_code`, `r`.`V_Criticality`, `m`.`v_AssetStatus`, `m`.`v_AssetCondition`, `m`.`v_AssetVStatus`, `l`.`v_Location_Name`, `d`.`v_UserDeptDesc`, `r`.`V_User_Dept_code`, `r`.`V_Location_code`, `g`.`V_PO_no`, `sr`.`V_Request_no` as no,SUM(`jv`.`n_PartTotal`) as parttotal, SUM(`jv`.`n_Total1` + `jv`.`n_Total2` + `jv`.`n_Total3`) as labourtotal 
	FROM (`pmis2_egm_assetregistration` r) 
	INNER JOIN `pmis2_egm_assetmaintenance` m ON `r`.`v_asset_no` = `m`.`v_assetno` AND `r`.`v_hospitalcode` = `m`.`v_hospitalcode` 
	INNER JOIN `pmis2_egm_assetreg_general` g ON `r`.`v_asset_no` = `g`.`v_asset_no` AND `r`.`v_hospitalcode` = `g`.`v_hospital_code` 
	LEFT JOIN `pmis2_egm_assetlocation` l ON `r`.`V_Location_code` = `l`.`V_location_code` AND `r`.`v_hospitalcode` = `l`.`V_Hospitalcode` 
	LEFT JOIN `pmis2_sa_userdept` d ON `r`.`V_User_Dept_code` = `d`.`v_UserDeptCode` AND `r`.`v_hospitalcode` = `d`.`v_HospitalCode` 
	LEFT JOIN `pmis2_egm_service_request` sr ON `r`.`v_asset_no` = `sr`.`V_Asset_no` AND `r`.`v_service_code` = `sr`.`V_servicecode` AND `r`.`v_hospitalcode` = `sr`.`V_hospitalcode` 
	LEFT JOIN `pmis2_emg_jobvisit1` jv ON `jv`.`v_WrkOrdNo` = `sr`.`V_Request_no` 
	WHERE `r`.`V_Asset_no` = ".$this->db->escape($assetno)." AND `r`.`v_hospitalcode` = ".$this->db->escape($hosp)." AND `r`.`v_actionflag` <> 'D' AND `d`.`v_ActionFlag` <> 'D' AND `r`.`v_service_code` = ".$this->db->escape($servcode)."
	UNION ALL
	SELECT `r`.`V_Tag_no`,`r`.`V_Asset_no`, `r`.`V_Hospitalcode`, `r`.`V_Asset_name`, `r`.`V_Equip_code`, `r`.`V_Make`, `r`.`V_Model_no`, `r`.`V_Serial_no`, `r`.`v_chasisno`, `r`.`v_engineno`, `r`.`v_registrationno`, `g`.`N_Cost`, `g`.`V_PO_date`, `g`.`D_commission`, `g`.`V_Wrn_end_code`, `g`.`V_Vendor_code`, `r`.`V_Criticality`, `m`.`v_AssetStatus`, `m`.`v_AssetCondition`, `m`.`v_AssetVStatus`, `l`.`v_Location_Name`, `d`.`v_UserDeptDesc`, `r`.`V_User_Dept_code`, `r`.`V_Location_code`, `g`.`V_PO_no`, `sc`.`v_WrkOrdNo` as no,SUM(`jv`.`n_PartTotal`) as parttotal, SUM(`jv`.`n_Total1` + `jv`.`n_Total2` + `jv`.`n_Total3`) as labourtotal 
	FROM (`pmis2_egm_assetregistration` r) 
	INNER JOIN `pmis2_egm_assetmaintenance` m ON `r`.`v_asset_no` = `m`.`v_assetno` AND `r`.`v_hospitalcode` = `m`.`v_hospitalcode` 
	INNER JOIN `pmis2_egm_assetreg_general` g ON `r`.`v_asset_no` = `g`.`v_asset_no` AND `r`.`v_hospitalcode` = `g`.`v_hospital_code` 
	LEFT JOIN `pmis2_egm_assetlocation` l ON `r`.`V_Location_code` = `l`.`V_location_code` AND `r`.`v_hospitalcode` = `l`.`V_Hospitalcode` 
	LEFT JOIN `pmis2_sa_userdept` d ON `r`.`V_User_Dept_code` = `d`.`v_UserDeptCode` AND `r`.`v_hospitalcode` = `d`.`v_HospitalCode` 
	LEFT JOIN `pmis2_egm_schconfirmmon` sc ON `r`.`v_asset_no` = `sc`.`v_Asset_no` AND `r`.`v_service_code` = `sc`.`v_ServiceCode` AND `r`.`v_hospitalcode` = `sc`.`v_HospitalCode` 
	LEFT JOIN `pmis2_emg_jobvisit1` jv ON `jv`.`v_WrkOrdNo` = `sc`.`v_WrkOrdNo` 
	WHERE `r`.`V_Asset_no` = ".$this->db->escape($assetno)." AND `r`.`v_hospitalcode` = ".$this->db->escape($hosp)." AND `r`.`v_actionflag` <> 'D' AND `d`.`v_ActionFlag` <> 'D' AND `r`.`v_service_code` = ".$this->db->escape($servcode).") AS x
	");
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function accessories($assetno){
	$this->db->select('v_description');
	$this->db->from('pmis2_egm_accesories');
	$this->db->where('v_assetno',$assetno);
	$this->db->where('v_hospitalcode',$this->session->userdata('hosp_code'));
	$this->db->where('v_actionflag <> ', 'D');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function wolist($assetno,$hosp,$servcode){
$query = $this->db->query("SELECT `sr`.`V_Request_no`, `sr`.`D_date`, `sr`.`V_request_type`, `sr`.`v_closeddate`, `sr`.`V_request_status`, `sr`.`V_summary`, `jv`.`v_WrkOrdNo`, SUM(`jv`.`n_PartTotal`) as parttotal, SUM(`jv`.`n_Total1` + `jv`.`n_Total2` + `jv`.`n_Total3`) as labourtotal, IFNULL(TIMEDIFF(`sr`.`v_closeddate`, `sr`.`D_date`), 0) as downtime, `jv`.`v_ActionTaken` 
	FROM (`pmis2_egm_service_request` sr) 
	LEFT JOIN `pmis2_emg_jobvisit1` jv ON `sr`.`V_Request_no`=`jv`.`v_WrkOrdNo` 
	WHERE `sr`.`V_Asset_no` = ".$this->db->escape($assetno)." AND `sr`.`V_hospitalcode` = ".$this->db->escape($hosp)." AND `sr`.`V_servicecode` = ".$this->db->escape($servcode)." GROUP BY `sr`.`V_Request_no`
	UNION ALL
	SELECT `sc`.`v_WrkOrdNo`, `sc`.`d_StartDt`, `sc`.`v_jobtype`, `sc`.`v_closeddate`, `sc`.`v_Wrkordstatus`, `sc`.`v_Remarks`, jv.v_WrkOrdNo, SUM(jv.n_PartTotal) as parttotal, SUM(jv.n_Total1 + jv.n_Total2 + jv.n_Total3) as labourtotal, IFNULL(TIMEDIFF(sc.v_closeddate, sc.d_StartDt), 0) as downtime, jv.v_ActionTaken 
	FROM (`pmis2_egm_schconfirmmon` sc) 
	LEFT JOIN `pmis2_emg_jobvisit1` jv ON `sc`.`v_WrkOrdNo`=`jv`.`v_WrkOrdNo` 
	WHERE `sc`.`v_Asset_no` = ".$this->db->escape($assetno)." AND `sc`.`v_HospitalCode` = ".$this->db->escape($hosp)." AND `sc`.`v_ServiceCode` = ".$this->db->escape($servcode)." GROUP BY `sc`.`v_WrkOrdNo` 
	");

	/*$this->db->select('*,jv.v_WrkOrdNo,SUM(jv.n_PartTotal) as parttotal, SUM(jv.n_Total1 + jv.n_Total2 + jv.n_Total3) as labourtotal,IFNULL(TIMEDIFF(sc.v_closeddate,sc.d_StartDt),0) as downtime,jv.v_ActionTaken',FALSE);//,jv.v_WrkOrdNo
	$this->db->from('pmis2_egm_schconfirmmon sc');
	//$this->db->from('pmis2_egm_service_request sr');
	$this->db->join('pmis2_emg_jobvisit1 jv','sc.v_WrkOrdNo=jv.v_WrkOrdNo','left');
	$this->db->where('sc.v_Asset_no',$assetno);
	$this->db->where('sc.v_HospitalCode',$this->session->userdata('hosp_code'));
	$this->db->where('sc.v_ServiceCode',$this->session->userdata('usersess'));
	$this->db->group_by('sc.v_WrkOrdNo');
	$query = $this->db->get();*/
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function wodet($wrk_ord,$assetno){
	$this->db->select('sr.*,d.v_UserDeptDesc,l.v_Location_Name,r.V_Asset_name,jd.v_AcceptedBy,jd.V_ACCEPTED_Designation,jd.v_ptest,jd.v_stest,IFNULL(TIMEDIFF(sr.v_closeddate,sr.D_date),0) as downtime,jd.v_QCPPM,jd.v_QCuptime,SUM(jv.n_PartTotal) as parttotal, SUM(jv.n_Total1 + jv.n_Total2 + jv.n_Total3) as labourtotal,jv.v_ActionTaken,jv.d_Reschdt, r.v_tag_no',FALSE); 
	$this->db->from('pmis2_egm_service_request sr');
	$this->db->join('pmis2_sa_userdept d','sr.V_User_dept_code = d.v_UserDeptCode AND sr.V_hospitalcode = d.v_HospitalCode','left');
	$this->db->join('pmis2_egm_assetlocation l','sr.V_Location_code = l.V_location_code AND sr.V_hospitalcode = l.V_Hospitalcode','left');
	$this->db->join('pmis2_egm_assetregistration r','sr.V_Asset_no = r.V_Asset_no AND sr.V_hospitalcode = r.V_Hospitalcode','left');
	$this->db->join('pmis2_emg_jobvisit1 jv','sr.V_Request_no = jv.v_WrkOrdNo','left');
	$this->db->join('pmis2_egm_jobdonedet jd','sr.V_Request_no = jd.v_Wrkordno','left');
	$this->db->where('sr.V_Request_no', $wrk_ord);
	$this->db->where('sr.V_Asset_no', $assetno);
	$this->db->where('sr.V_hospitalcode',$this->session->userdata('hosp_code'));
	$this->db->where('sr.V_servicecode',$this->session->userdata('usersess'));
	$this->db->where('d.v_ActionFlag <> ', 'D');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function ppmdet($wrk_ord,$assetno){
	$this->db->select('sc.*, sc.v_Remarks AS V_summary,d.v_UserDeptDesc,l.v_Location_Name,r.V_Asset_name,jd.v_AcceptedBy,jd.V_ACCEPTED_Designation,jd.v_ptest,jd.v_stest,IFNULL(TIMEDIFF(sc.v_closeddate,sc.d_DueDt),0) as downtime,jd.v_QCPPM,jd.v_QCuptime,SUM(jv.n_PartTotal) as parttotal, SUM(jv.n_Total1 + jv.n_Total2 + jv.n_Total3) as labourtotal,jv.v_ActionTaken,jv.d_Reschdt, r.v_tag_no',FALSE); 
	$this->db->from('pmis2_egm_schconfirmmon sc'); //,d.v_UserDeptDesc,l.v_Location_Name
	//$this->db->join('pmis2_sa_userdept d','sc.V_User_dept_code = d.v_UserDeptCode AND sc.V_hospitalcode = d.v_HospitalCode','left');
	//$this->db->join('pmis2_egm_assetlocation l','sc.V_Location_code = l.V_location_code AND sc.V_hospitalcode = l.V_Hospitalcode','left');
	$this->db->join('pmis2_egm_assetregistration r','sc.V_Asset_no = r.V_Asset_no AND sc.V_hospitalcode = r.V_Hospitalcode','left');
	$this->db->join('pmis2_sa_userdept d','r.V_User_Dept_code = d.v_UserDeptCode AND r.V_Hospitalcode = d.v_HospitalCode','left');
	$this->db->join('pmis2_egm_assetlocation l','r.V_Location_code = l.V_location_code AND r.V_Hospitalcode = l.V_Hospitalcode','left');
	$this->db->join('pmis2_emg_jobvisit1 jv','sc.v_WrkOrdNo = jv.v_WrkOrdNo','left');
	$this->db->join('pmis2_egm_jobdonedet jd','sc.v_WrkOrdNo = jd.v_Wrkordno','left');
	$this->db->where('sc.v_WrkOrdNo', $wrk_ord);
	$this->db->where('sc.v_Asset_no', $assetno);
	$this->db->where('sc.v_HospitalCode',$this->session->userdata('hosp_code'));
	$this->db->where('sc.v_ServiceCode',$this->session->userdata('usersess'));
	//$this->db->where('d.v_ActionFlag <> ', 'D');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function partrep($wrk_ord){
	$this->db->select('v_PartName');
	$this->db->from('pmis2_emg_jobvisit1');
	$this->db->where('v_WrkOrdNo',$wrk_ord);
	//$this->db->where('v_Actionflag <>','D');
	//$this->db->where('v_HospitalCode',$this->session->userdata('hosp_code'));
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function hosplist($month,$year){
	$this->db->select('hospital_code,SUM(CASE when Color_Code = "icon-yellow" AND Job_Items != "Waste Collection" then 1 else 0 end) AS Cleansing_yellow,SUM(CASE when Color_Code = "icon-red" AND Job_Items != "Waste Collection" then 1 else 0 end) AS Cleansing_red,SUM(CASE when Color_Code = "icon-yellow" AND Job_Items = "Waste Collection" then 1 else 0 end) AS Waste_yellow,SUM(CASE when Color_Code = "icon-red" AND Job_Items = "Waste Collection" then 1 else 0 end) AS Waste_red');
	$this->db->from('set_hks_scheduler');
	$this->db->where('Month',$month);
	$this->db->where('Year',$year);
	$this->db->where('hospital_code',$this->session->userdata('hosp_code'));
	$this->db->group_by('hospital_code');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function deptlist($month,$year,$hosp){
	$this->db->select('h.hospital_code,h.Dept_Code,d.v_UserDeptDesc,SUM(CASE when h.Color_Code = "icon-yellow" AND h.Job_Items != "Waste Collection" then 1 else 0 end) AS Cleansing_yellow,SUM(CASE when h.Color_Code = "icon-red" AND h.Job_Items != "Waste Collection" then 1 else 0 end) AS Cleansing_red,SUM(CASE when h.Color_Code = "icon-yellow" AND h.Job_Items = "Waste Collection" then 1 else 0 end) AS Waste_yellow,SUM(CASE when h.Color_Code = "icon-red" AND h.Job_Items = "Waste Collection" then 1 else 0 end) AS Waste_red'); //,COUNT(DISTINCT l.V_location_code) as totallocation,SUM(CASE when h.Color_Code = "icon-yellow" AND h.Job_Items != "Waste Collection" then 1 else 0 end) AS Cleansing_yellow,SUM(CASE when h.Color_Code = "icon-red" AND h.Job_Items != "Waste Collection" then 1 else 0 end) AS Cleansing_red,SUM(CASE when h.Color_Code = "icon-yellow" AND h.Job_Items = "Waste Collection" then 1 else 0 end) AS Waste_yellow,SUM(CASE when h.Color_Code = "icon-red" AND h.Job_Items = "Waste Collection" then 1 else 0 end) AS Waste_red
	$this->db->from('set_hks_scheduler h');
	$this->db->join('pmis2_sa_userdept d','d.v_UserDeptCode = h.Dept_Code AND d.v_HospitalCode = h.hospital_code');
	$this->db->where('h.Month',$month);
	$this->db->where('h.Year',$year);
	$this->db->where('h.hospital_code',$hosp);
	$this->db->where('d.V_Actionflag <>','D');
	$this->db->group_by('h.Dept_Code');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function locdet($dept,$hosp){
	$this->db->select('v_UserDeptCode,COUNT(v_UserDeptCode) as totalloc');
	$this->db->from('pmis2_egm_assetlocation');
	$this->db->where_in('v_UserDeptCode',$dept);
	$this->db->where('V_Hospitalcode',$hosp);
	$this->db->where('V_Actionflag <> ', 'D');
	$this->db->group_by('v_UserDeptCode');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function datelist($monthyear,$dept,$hosp){
	$this->db->select('Job_Date,SUM(CASE when Color_Code = "icon-yellow" AND Job_Items != "Waste Collection" then 1 else 0 end) AS Cleansing_yellow,SUM(CASE when Color_Code = "icon-red" AND Job_Items != "Waste Collection" then 1 else 0 end) AS Cleansing_red,SUM(CASE when Color_Code = "icon-yellow" AND Job_Items = "Waste Collection" then 1 else 0 end) AS Waste_yellow,SUM(CASE when Color_Code = "icon-red" AND Job_Items = "Waste Collection" then 1 else 0 end) AS Waste_red');
	$this->db->from('set_hks_scheduler');
	$this->db->where('Dept_Code',$dept);
	$this->db->where('hospital_code',$hosp);
	$this->db->where('Month_Year', $monthyear);
	$this->db->group_by('Job_Date');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function hospjic($month,$year){
	$this->db->select('hospital_code,Dept_Code,SUM(CASE when SUBSTRING(ji_no,-8,2) = "W1" AND Num_Code = "1" then 1 else 0 end) AS W1Unstatisfactory,SUM(CASE when SUBSTRING(ji_no,-8,2) = "W1" AND (Num_Code = "2" OR Num_Code = "3" OR Num_Code = "4") then 1 else 0 end) AS W1Satisfactory,SUM(CASE when SUBSTRING(ji_no,-8,2) = "W1" AND Num_Code = "5" then 1 else 0 end) AS W1Not_Applicable,SUM(CASE when SUBSTRING(ji_no,-8,2) = "W1" AND Num_Code IS NULL then 1 else 0 end) AS W1nullcode,SUM(CASE when SUBSTRING(ji_no,-8,2) = "W3" AND Num_Code = "1" then 1 else 0 end) AS W3Unstatisfactory,SUM(CASE when SUBSTRING(ji_no,-8,2) = "W3" AND (Num_Code = "2" OR Num_Code = "3" OR Num_Code = "4") then 1 else 0 end) AS W3Satisfactory,SUM(CASE when SUBSTRING(ji_no,-8,2) = "W3" AND Num_Code = "5" then 1 else 0 end) AS W3Not_Applicable,SUM(CASE when SUBSTRING(ji_no,-8,2) = "W3" AND Num_Code IS NULL then 1 else 0 end) AS W3nullcode',FALSE);
	$this->db->from('set_jic_scheduler ');
	//$this->db->where('Month',$month);
	//$this->db->where('Year',$year);
	$this->db->where('Job_date >=', $this->dater(1,$month,$year));
	$this->db->where('Job_date <=', $this->dater(2,$month,$year));
	$this->db->where('hospital_code',$this->session->userdata('hosp_code'));
	$this->db->group_by('Dept_Code');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function deptjic($month,$year,$hosp){
	$this->db->select('J.hospital_code,J.Dept_Code,d.v_UserDeptDesc,SUM(CASE when SUBSTRING(ji_no,-8,2) = "W1" AND Num_Code = "1" then 1 else 0 end) AS W1Unstatisfactory,SUM(CASE when SUBSTRING(ji_no,-8,2) = "W1" AND (Num_Code = "2" OR Num_Code = "3" OR Num_Code = "4") then 1 else 0 end) AS W1Satisfactory,SUM(CASE when SUBSTRING(ji_no,-8,2) = "W1" AND Num_Code = "5" then 1 else 0 end) AS W1Not_Applicable,SUM(CASE when SUBSTRING(ji_no,-8,2) = "W1" AND Num_Code IS NULL then 1 else 0 end) AS W1nullcode,SUM(CASE when SUBSTRING(ji_no,-8,2) = "W3" AND Num_Code = "1" then 1 else 0 end) AS W3Unstatisfactory,SUM(CASE when SUBSTRING(ji_no,-8,2) = "W3" AND (Num_Code = "2" OR Num_Code = "3" OR Num_Code = "4") then 1 else 0 end) AS W3Satisfactory,SUM(CASE when SUBSTRING(ji_no,-8,2) = "W3" AND Num_Code = "5" then 1 else 0 end) AS W3Not_Applicable,SUM(CASE when SUBSTRING(ji_no,-8,2) = "W3" AND Num_Code IS NULL then 1 else 0 end) AS W3nullcode',FALSE);
	$this->db->from('set_jic_scheduler J');
	$this->db->join('pmis2_sa_userdept d','J.Dept_Code = d.v_UserDeptCode AND J.hospital_code = d.v_HospitalCode');
	//$this->db->where('J.Month',$month);
	//$this->db->where('J.Year',$year);
	$this->db->where('J.Job_date >=', $this->dater(1,$month,$year));
	$this->db->where('J.Job_date <=', $this->dater(2,$month,$year));
	$this->db->where('J.hospital_code',$hosp);
	$this->db->where('d.v_ActionFlag <>','D');
	$this->db->group_by('J.Dept_Code');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

function locjic($month,$year,$hosp,$dept){
	/*$this->db->select('J.hospital_code,J.Dept_Code,J.Loc_Code,l.v_Location_Name,SUM(CASE when J.Num_Code = "1" then 1 else 0 end) AS Unstatisfactory,SUM(CASE when J.Num_Code != "1" AND J.Num_Code != "5" then 1 else 0 end) AS Satisfactory,SUM(CASE when J.Num_Code = "5" then 1 else 0 end) AS Not_Applicable');
	$this->db->from('set_jic_scheduler J');
	$this->db->join('pmis2_egm_assetlocation l','J.Loc_Code = l.V_location_code AND J.hospital_code = l.V_Hospitalcode');
	//$this->db->where('J.Month',$month);
	//$this->db->where('J.Year',$year);
	$this->db->where('J.Job_date >=', $this->dater(1,$month,$year));
	$this->db->where('J.Job_date <=', $this->dater(2,$month,$year));
	$this->db->where('J.Dept_Code',$dept);
	$this->db->where('J.hospital_code',$hosp);
	$this->db->where('l.V_Actionflag <>','D');
	$this->db->group_by('J.Loc_Code');*/
	
	$this->db->select('J.hospital_code,J.Dept_Code,J.Loc_Code,l.V_Hospitalcode,l.v_UserDeptCode,l.V_location_code,l.v_Location_Name,SUM(CASE when SUBSTRING(ji_no,-8,2) = "W1" AND Num_Code = "1" then 1 else 0 end) AS W1Unstatisfactory,SUM(CASE when SUBSTRING(ji_no,-8,2) = "W1" AND (Num_Code = "2" OR Num_Code = "3" OR Num_Code = "4") then 1 else 0 end) AS W1Satisfactory,SUM(CASE when SUBSTRING(ji_no,-8,2) = "W1" AND Num_Code = "5" then 1 else 0 end) AS W1Not_Applicable,SUM(CASE when SUBSTRING(ji_no,-8,2) = "W1" AND Num_Code IS NULL then 1 else 0 end) AS W1nullcode,SUM(CASE when SUBSTRING(ji_no,-8,2) = "W3" AND Num_Code = "1" then 1 else 0 end) AS W3Unstatisfactory,SUM(CASE when SUBSTRING(ji_no,-8,2) = "W3" AND (Num_Code = "2" OR Num_Code = "3" OR Num_Code = "4") then 1 else 0 end) AS W3Satisfactory,SUM(CASE when SUBSTRING(ji_no,-8,2) = "W3" AND Num_Code = "5" then 1 else 0 end) AS W3Not_Applicable,SUM(CASE when SUBSTRING(ji_no,-8,2) = "W3" AND Num_Code IS NULL then 1 else 0 end) AS W3nullcode',FALSE);
	$this->db->from('pmis2_egm_assetlocation l');
	$this->db->join('set_jic_scheduler J','J.Loc_Code = l.V_location_code AND J.Job_date >= '.$this->db->escape($this->dater(1,$month,$year)).' AND J.Job_date <= '.$this->db->escape($this->dater(2,$month,$year)),'left outer');
	//$this->db->where('J.Job_date >=', $this->dater(1,$month,$year));
	//$this->db->where('J.Job_date <=', $this->dater(2,$month,$year));
	$this->db->where('l.v_UserDeptCode',$dept);
	$this->db->where('l.V_Hospitalcode',$hosp);
	$this->db->where('l.V_Actionflag <>','D');
	$this->db->group_by('l.V_location_code');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

function locdjic($month,$year,$hosp,$loc){
	$this->db->select('hospital_code,ji_no,Dept_Code,Loc_Code,Job_Date,SUM(CASE when (Num_Code = "1" OR Num_Code = "5" OR Num_Code IS NULL) AND Job_Items = "Floor" then 1 else 0 end) AS Floor,SUM(CASE when (Num_Code = "1" OR Num_Code = "5" OR Num_Code IS NULL) AND Job_Items = "Wall Door" then 1 else 0 end) AS WallDoor,SUM(CASE when (Num_Code = "1" OR Num_Code = "5" OR Num_Code IS NULL) AND Job_Items = "Ceiling" then 1 else 0 end) AS Ceiling,
					  SUM(CASE when (Num_Code = "1" OR Num_Code = "5" OR Num_Code IS NULL) AND Job_Items = "Windows" then 1 else 0 end) AS Windows,SUM(CASE when (Num_Code = "1" OR Num_Code = "5" OR Num_Code IS NULL) AND Job_Items = "Fixtures" then 1 else 0 end) AS Fixtures,SUM(CASE when (Num_Code = "1" OR Num_Code = "5" OR Num_Code IS NULL) AND Job_Items = "Furniture Fitting" then 1 else 0 end) AS FurnitureFitting');
	$this->db->from('set_jic_scheduler');
	//$this->db->where('Month',$month);
	//$this->db->where('Year',$year);
	$this->db->where('Job_date >=', $this->dater(1,$month,$year));
	$this->db->where('Job_date <=', $this->dater(2,$month,$year));
	$this->db->where('Loc_Code',$loc);
	$this->db->where('hospital_code',$hosp);
	$this->db->group_by('ji_no');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function jijic($month,$year,$hosp,$dept,$jino){
	$this->db->select('J.hospital_code,J.ji_no,J.Dept_Code,J.Loc_Code,l.V_Hospitalcode,l.v_UserDeptCode,l.V_location_code,l.v_Location_Name,J.Job_Date,SUM(CASE when (J.Num_Code = "1" OR J.Num_Code = "5" OR Num_Code IS NULL) AND J.Job_Items = "Floor" then 1 else 0 end) AS Floor,SUM(CASE when (J.Num_Code = "1" OR J.Num_Code = "5" OR Num_Code IS NULL) AND J.Job_Items = "Wall Door" then 1 else 0 end) AS WallDoor,SUM(CASE when (J.Num_Code = "1" OR J.Num_Code = "5" OR Num_Code IS NULL) AND J.Job_Items = "Ceiling" then 1 else 0 end) AS Ceiling,SUM(CASE when (J.Num_Code = "1" OR J.Num_Code = "5" OR Num_Code IS NULL) AND J.Job_Items = "Windows" then 1 else 0 end) AS Windows,SUM(CASE when (J.Num_Code = "1" OR J.Num_Code = "5" OR Num_Code IS NULL) AND J.Job_Items = "Fixtures" then 1 else 0 end) AS Fixtures,SUM(CASE when (J.Num_Code = "1" OR J.Num_Code = "5" OR Num_Code IS NULL) AND J.Job_Items = "Furniture Fitting" then 1 else 0 end) AS FurnitureFitting');
	$this->db->from('pmis2_egm_assetlocation l');
	$this->db->join('set_jic_scheduler J','J.Loc_Code = l.V_location_code AND J.hospital_code = l.V_Hospitalcode AND l.V_Actionflag <> "D" AND J.Job_date >= '.$this->db->escape($this->dater(1,$month,$year)).' AND J.Job_date <= '.$this->db->escape($this->dater(2,$month,$year)).' AND J.ji_no = '.$this->db->escape($jino),'left outer');
	//$this->db->where('J.Month',$month);
	//$this->db->where('J.Year',$year);
	//$this->db->where('J.Job_date >=', $this->dater(1,$month,$year));
	//$this->db->where('J.Job_date <=', $this->dater(2,$month,$year));
	//$this->db->where('J.ji_no',$jino);
	//$this->db->where('J.Job_Date',$jobdate);
	$this->db->where('l.v_UserDeptCode',$dept);
	$this->db->where('l.V_Hospitalcode',$hosp);
	$this->db->where('l.V_Actionflag <>','D');
	$this->db->group_by('l.V_location_code');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

function jijic2l($month,$year,$dept){
	$this->db->select('J.hospital_code,J.ji_no,J.Dept_Code,J.Loc_Code,l.V_Hospitalcode,l.v_UserDeptCode,l.V_location_code,l.v_Location_Name,J.Job_Date,SUM(CASE when (J.Num_Code = "1" OR J.Num_Code = "5") AND J.Job_Items = "Floor" then 1 else 0 end) AS Floor,SUM(CASE when (J.Num_Code = "1" OR J.Num_Code = "5") AND J.Job_Items = "Wall Door" then 1 else 0 end) AS WallDoor,SUM(CASE when (J.Num_Code = "1" OR J.Num_Code = "5") AND J.Job_Items = "Ceiling" then 1 else 0 end) AS Ceiling,SUM(CASE when (J.Num_Code = "1" OR J.Num_Code = "5") AND J.Job_Items = "Windows" then 1 else 0 end) AS Windows,SUM(CASE when (J.Num_Code = "1" OR J.Num_Code = "5") AND J.Job_Items = "Fixtures" then 1 else 0 end) AS Fixtures,SUM(CASE when (J.Num_Code = "1" OR J.Num_Code = "5") AND J.Job_Items = "Furniture Fitting" then 1 else 0 end) AS FurnitureFitting');
	//$this->db->from('set_jic_scheduler J');
	//$this->db->join('pmis2_egm_assetlocation l','J.Loc_Code = l.V_location_code AND J.hospital_code = l.V_Hospitalcode');
	$this->db->from('pmis2_egm_assetlocation l');
	$this->db->join('set_jic_scheduler J','J.Loc_Code = l.V_location_code AND J.hospital_code = l.V_Hospitalcode AND J.Month = '.$this->db->escape($month).' AND J.Year = '.$this->db->escape($year),'left outer');

	//$this->db->where('J.Month',$month);
	//$this->db->where('J.Year',$year);
	
	//$this->db->where('J.Job_Date',$jobdate);
	$this->db->where_in('l.v_UserDeptCode',$dept);
	$this->db->where('l.V_Hospitalcode',$this->session->userdata('hosp_code'));
	$this->db->where('l.V_Actionflag <>','D');
	$this->db->group_by('l.V_location_code');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

function jijic2($month,$year,$dept,$limit,$start){
	$this->db->select('J.hospital_code,J.ji_no,J.Dept_Code,J.Loc_Code,l.V_Hospitalcode,l.v_UserDeptCode,l.V_location_code,l.v_Location_Name,J.Job_Date,SUM(CASE when (J.Num_Code = "1" OR J.Num_Code = "5") AND J.Job_Items = "Floor" then 1 else 0 end) AS Floor,SUM(CASE when (J.Num_Code = "1" OR J.Num_Code = "5") AND J.Job_Items = "Wall Door" then 1 else 0 end) AS WallDoor,SUM(CASE when (J.Num_Code = "1" OR J.Num_Code = "5") AND J.Job_Items = "Ceiling" then 1 else 0 end) AS Ceiling,SUM(CASE when (J.Num_Code = "1" OR J.Num_Code = "5") AND J.Job_Items = "Windows" then 1 else 0 end) AS Windows,SUM(CASE when (J.Num_Code = "1" OR J.Num_Code = "5") AND J.Job_Items = "Fixtures" then 1 else 0 end) AS Fixtures,SUM(CASE when (J.Num_Code = "1" OR J.Num_Code = "5") AND J.Job_Items = "Furniture Fitting" then 1 else 0 end) AS FurnitureFitting');
	//$this->db->from('set_jic_scheduler J');
	//$this->db->join('pmis2_egm_assetlocation l','J.Loc_Code = l.V_location_code AND J.hospital_code = l.V_Hospitalcode');
	$this->db->from('pmis2_egm_assetlocation l');
	$this->db->join('set_jic_scheduler J','J.Loc_Code = l.V_location_code AND J.hospital_code = l.V_Hospitalcode AND J.Month = '.$this->db->escape($month).' AND J.Year = '.$this->db->escape($year),'left outer');

	//$this->db->where('J.Month',$month);
	//$this->db->where('J.Year',$year);
	
	//$this->db->where('J.Job_Date',$jobdate);
	$this->db->where_in('l.v_UserDeptCode',$dept);
	$this->db->where('l.V_Hospitalcode',$this->session->userdata('hosp_code'));
	$this->db->where('l.V_Actionflag <>','D');
	$this->db->group_by('l.V_location_code');

	$this->db->limit($limit,$start);
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function lpcost($assetno,$hosp){
	$query = $this->db->query("SELECT `x`.`V_Asset_no`, FORMAT(SUM(`x`.`labourtotal`),2) as labourtotal, FORMAT(SUM(`x`.`parttotal`),2) as parttotal FROM (
					  SELECT `sr`.`V_Request_no`, `sr`.`V_Asset_no`, SUM(`jr`.`n_Total1` + `jr`.`n_Total2` + `jr`.`n_Total3`) as labourtotal, SUM(`jr`.`n_vTotal`) as parttotal 
		              FROM (`pmis2_egm_service_request` sr) 
		              INNER JOIN `pmis2_emg_jobresponse` jr ON `sr`.`V_Request_no` = `jr`.`v_WrkOrdNo` AND `sr`.`V_hospitalcode`=`jr`.`v_HospitalCode` 
		              WHERE `sr`.`V_Asset_no` = ".$this->db->escape($assetno)." AND `sr`.`V_hospitalcode`= ".$this->db->escape($hosp)."
		              UNION ALL
		              SELECT `sr`.`V_Request_no`, `sr`.`V_Asset_no`, SUM(`jv`.`n_Total1` + `jv`.`n_Total2` + `jv`.`n_Total3`) as labourtotal, SUM(`jv`.`n_PartTotal`) as parttotal 
		              FROM (`pmis2_egm_service_request` sr) 
		              INNER JOIN `pmis2_emg_jobvisit1` jv ON `sr`.`V_Request_no` = `jv`.`v_WrkOrdNo` AND `sr`.`V_hospitalcode`=`jv`.`v_HospitalCode` 
		              WHERE `sr`.`V_Asset_no` = ".$this->db->escape($assetno)." AND `sr`.`V_hospitalcode`= ".$this->db->escape($hosp)."
		              UNION ALL
					  SELECT `sc`.`v_WrkOrdNo`,`sc`.`v_Asset_no`, SUM(`v1`.`n_Total1` + `v1`.`n_Total2` + `v1`.`n_Total3`) as labourtotal, SUM(`v1`.`n_PartTotal`) as parttotal
					  FROM (`pmis2_egm_schconfirmmon` sc)
					  INNER JOIN `pmis2_emg_jobvisit1` v1 ON `sc`.`v_WrkOrdNo` = `v1`.`v_WrkOrdNo` AND `sc`.`v_HospitalCode`=`v1`.`v_HospitalCode`
					  WHERE `sc`.`v_Asset_no` = ".$this->db->escape($assetno)." AND `sc`.`v_HospitalCode`= ".$this->db->escape($hosp).") AS x
					  
		");
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

function assetauth(){
	$this->db->select('*');
	$this->db->from('pmis2_egm_lnc_statutory_agency_code');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

function statutorydet($id,$assetno)
{

$this->db->select("s.*,ac.v_Description");
$this->db->from('pmis2_egm_statutory s');
$this->db->join('pmis2_egm_lnc_statutory_agency_code ac','s.v_authority = ac.v_AgencyCode');
$this->db->where('s.v_asset_no =', $assetno);
$this->db->where('s.ID =', $id);
$this->db->where('s.v_hospitalcode =', $this->session->userdata('hosp_code'));
$this->db->where('s.v_actionflag <> ', 'D');
$this->db->where('ac.v_actionflag <> ', 'D');
$query = $this->db->get();
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}


function datelist2l($monthyear){
	$this->db->select('Job_Date,SUM(CASE when Color_Code = "icon-yellow" AND Job_Items != "Waste Collection" then 1 else 0 end) AS Cleansing_yellow,SUM(CASE when Color_Code = "icon-red" AND Job_Items != "Waste Collection" then 1 else 0 end) AS Cleansing_red,SUM(CASE when Color_Code = "icon-yellow" AND Job_Items = "Waste Collection" then 1 else 0 end) AS Waste_yellow,SUM(CASE when Color_Code = "icon-red" AND Job_Items = "Waste Collection" then 1 else 0 end) AS Waste_red');
	$this->db->from('set_hks_scheduler');
	$this->db->where('Month_Year', $monthyear);
	//$this->db->where('Dept_Code',$dept);
	$this->db->where('hospital_code',$this->session->userdata('hosp_code'));
	$this->db->group_by('Job_Date');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function datelist2($monthyear,$limit,$start){
	$this->db->select('Job_Date,SUM(CASE when Color_Code = "icon-yellow" AND Job_Items != "Waste Collection" then 1 else 0 end) AS Cleansing_yellow,SUM(CASE when Color_Code = "icon-red" AND Job_Items != "Waste Collection" then 1 else 0 end) AS Cleansing_red,SUM(CASE when Color_Code = "icon-yellow" AND Job_Items = "Waste Collection" then 1 else 0 end) AS Waste_yellow,SUM(CASE when Color_Code = "icon-red" AND Job_Items = "Waste Collection" then 1 else 0 end) AS Waste_red');
	$this->db->from('set_hks_scheduler');
	$this->db->where('Month_Year', $monthyear);
	//$this->db->where('Dept_Code',$dept);
	$this->db->where('hospital_code',$this->session->userdata('hosp_code'));
	$this->db->group_by('Job_Date');
	$this->db->limit($limit,$start);
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

function dailycleanpriv($userid){
	$this->db->select('*');
	$this->db->from('daily_clean_priv');
	$this->db->where('userid',$userid);
	$this->db->group_by('userid,user_priv');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function monthplanpriv($userid){
	$this->db->select('*');
	$this->db->from('monthly_planner_priv');
	$this->db->where('userid',$userid);
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

//******* PWMP_period 
function SWRJI_period(){
	$this->db->select('*');
	$this->db->from('set_scheduler');
	$this->db->like('Scheduler_Name','SWRJI','before');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

function namo(){
	$this->db->select('*');
	$this->db->from('pmis2_sa_user a');
	$this->db->where('v_userid',$this->session->userdata('v_UserName'));
	$this->db->join('pmis2_sa_personal b','a.v_UserName = b.v_PersonalName', 'LEFT OUTER');
	//$this->db->like('Scheduler_Name','SWRJI','before');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

function assetstatutorylic()
{

$this->db->select("*",FALSE);
//SELECT (case when DWRate = 999 then (case when 500 <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when 500 <= 2000000 then (500 * 0.0075) / 12 else (500 * 0.0050) / 12 end) else (500 * ( DWRate / 100)) / 12 end) as 'FeeDW', (500 * ( PWRate / 100) / 12) as 'FeePW'
$this->db->from('pmis2_egm_statutory S');
$this->db->join('pmis2_egm_assetregistration R','S.v_asset_no = R.V_Asset_no');
//$this->db->join('pmis2_sa_moh_asset_type','pmis2_sa_asset_mapping.new_asset_type=pmis2_sa_moh_asset_type.asset_type');
//$this->db->where('v_asset_no =', $equipcd);
$this->db->where('S.v_hospitalcode =', $this->session->userdata('hosp_code'));
$this->db->where('S.v_actionflag <> ', 'D');
$this->db->where('R.V_service_code', $this->session->userdata('usersess'));
$query = $this->db->get();
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();
}

function licensesstat($assetno)
{

$this->db->select("R.V_Asset_no,A.v_CertificateNo, A.v_ServiceCode, A.v_AgencyCode, A.v_LicenseCategoryCode, B.v_LicenceCategoryDesc, A.v_IdentificationType, A.v_Identification, A.v_RegistrationNo, A.v_StartDate, A.v_ExpiryDate, A.v_GradeID, A.v_Remarks, A.v_hospitalcode, A.v_key, A.CMIS_Action_Flag, A.d_timestamp,A.id",FALSE);
//SELECT (case when DWRate = 999 then (case when 500 <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when 500 <= 2000000 then (500 * 0.0075) / 12 else (500 * 0.0050) / 12 end) else (500 * ( DWRate / 100)) / 12 end) as 'FeeDW', (500 * ( PWRate / 100) / 12) as 'FeePW'
$this->db->from('pmis2_egm_assetregistration R');
$this->db->join('pmis2_egm_lnc_lincense_details A','R.V_Tag_no = A.v_key');
$this->db->join('pmis2_egm_lnc_license_category_code B','A.v_LicenseCategoryCode=B.v_LicenceCategoryCode');
$this->db->where('R.V_Asset_no',$assetno);
$this->db->where('A.v_ServiceCode =', $this->session->userdata('usersess'));
$this->db->where('A.v_HospitalCode =', $this->session->userdata('hosp_code'));
$this->db->where('A.v_ActionFlag <> ', 'D');
$this->db->where('B.v_ActionFlag <> ', 'D');
$query = $this->db->get();
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();
}
function assetppmlist($assetno){
	$this->db->select('v_WrkOrdNo,d_StartDt,v_Asset_no');
	$this->db->from('pmis2_egm_schconfirmmon');
	$this->db->where('v_Asset_no ',$assetno);
	$this->db->order_by('d_StartDt','DESC');
	$this->db->limit(1);
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function ppmwo($assetno,$weeklist){
	$this->db->select('v_WrkOrdNo,v_Asset_no,n_StartWk,v_Wrkordstatus');
	$this->db->from('pmis2_egm_schconfirmmon');
	$this->db->where('v_Asset_no',$assetno);
	$this->db->where_in('n_StartWk',$weeklist);
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function filebankseqno($type)
{
	$this->db->select('seq_RequestType,seq_NextSequenceNo');
	$this->db->from('ap_nextsequenceno');
	$this->db->where('seq_RequestType',$type);
	$this->db->where('seq_HospitalCode',$this->session->userdata('hosp_code'));
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

function assetplanner($year){
	$this->db->select('j.v_Asset_no, r.V_Tag_no, j.v_JobType, j.v_Weeksch, j.v_Year, r.V_Asset_name, r.V_User_Dept_code,d.v_UserDeptDesc');
	$this->db->from('pmis2_egm_assetjobtype j');
	$this->db->join('pmis2_egm_assetregistration r','j.v_Asset_no = r.V_Asset_no AND j.v_HospitalCode = r.V_Hospitalcode');
	$this->db->join('pmis2_sa_userdept d','r.V_User_Dept_code = d.v_UserDeptCode AND r.V_Hospitalcode = d.v_HospitalCode','left');
	$this->db->where('j.v_Year',$year);
	$this->db->where('j.v_ActionFlag <>','D');
	$this->db->where('r.V_Actionflag <>','D');
	$this->db->where('d.v_ActionFlag <>','D');
	$this->db->where('r.V_service_code',$this->session->userdata('usersess'));
	$this->db->order_by("r.V_Tag_no", "asc");
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

function generatedppm($year){
	$this->db->select('n_StartWk,v_year');
	$this->db->from('pmis2_egm_schconfirmmon');
	$this->db->where('v_year',$year);
	$this->db->where('v_Actionflag <>','D');
	$this->db->where('v_ServiceCode',$this->session->userdata('usersess'));
	$this->db->group_by('n_StartWk');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

function get_wodatelate($wono,$nvisit)
{
  if ($nvisit > 0) {
  $nkx = 'AND b.n_Visit < '.$nvisit;
	} else {
	$nkx = '';
	}
  $this->db->select(" ifnull(b.d_date, a.d_date) as latedt ", FALSE);
	$this->db->join('pmis2_emg_jobvisit1 b','a.v_request_no = b.v_wrkordno '.$nkx , 'LEFT OUTER');
  $this->db->where('a.v_request_no = ', $wono);
	$this->db->_protect_identifiers = FALSE;
	$this->db->order_by('ifnull(b.d_date, a.d_date)','DESC', false);
	$this->db->_protect_identifiers = TRUE;
  $query = $this->db->get('pmis2_egm_service_request a');
  //echo "laalla".$query->DWRate;
  //echo $this->db->last_query();
  //exit();
  return $query->result();

}

function get_assetcatxx($limit,$start)
{
$this->db->select(" pmis2_egm_assetregistration.V_Equip_code, pmis2_sa_equip_code.v_Equip_Desc AS V_Asset_name, COUNT(pmis2_egm_assetregistration.V_Equip_code) AS aTotal ", FALSE);
$this->db->join('pmis2_sa_equip_code','pmis2_egm_assetregistration.V_Equip_code = pmis2_sa_equip_code.v_Equip_Code AND pmis2_egm_assetregistration.v_hospitalcode = pmis2_sa_equip_code.v_hospitalcode');
$this->db->where('pmis2_egm_assetregistration.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('pmis2_egm_assetregistration.v_actionflag <> ', 'D');
$this->db->where('pmis2_egm_assetregistration.v_service_code = ', $this->session->userdata('usersess'));
$this->db->group_by('pmis2_egm_assetregistration.V_Equip_code, pmis2_sa_equip_code.v_Equip_Desc');
$this->db->order_by("pmis2_sa_equip_code.v_Equip_Desc","asc");
$this->db->limit($limit,$start); 
$query = $this->db->get('pmis2_egm_assetregistration');
//echo $this->db->last_query();
//pexit();
return $query->result();

}
function get_poploclistbxx($limit,$start)
{
$this->db->distinct();
$this->db->select('pmis2_sa_userdept.v_userdeptdesc, pmis2_egm_assetlocation.v_UserDeptCode, count(pmis2_egm_assetlocation.v_UserDeptCode) as Totalloc');
$this->db->join('pmis2_sa_userdept','pmis2_sa_userdept.v_hospitalcode = pmis2_egm_assetlocation.v_hospitalcode AND pmis2_sa_userdept.v_userdeptcode = pmis2_egm_assetlocation.v_UserDeptCode');
$this->db->where('pmis2_egm_assetlocation.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->where('pmis2_egm_assetlocation.v_actionflag <> ', 'D');
$this->db->where('pmis2_sa_userdept.v_actionflag <> ', 'D');
$this->db->group_by('pmis2_sa_userdept.v_userdeptdesc, pmis2_egm_assetlocation.v_UserDeptCode');
$this->db->limit($limit,$start); 
$query = $this->db->get('pmis2_egm_assetlocation');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function assetjobtyperegyid($assetno,$year,$id)
{

$this->db->select("a.id, a.v_jobtype, n_frequency,  d_startdate, d_todate, v_checklistcode, v_procedurecode, v_sparelist, v_details, v_weeksch, d_reschdt, v_year",FALSE);
$this->db->from('pmis2_egm_assetjobtype a');
$this->db->join('pmis2_egm_jobtype b','a.v_jobtype=b.v_jobtype');
$this->db->where('a.v_ActionFlag <> ', 'D');
$this->db->where('a.v_asset_no = ', $assetno);
$this->db->where('a.v_year = ', $year);
$this->db->where('a.id = ', $id);
$this->db->where('a.v_hospitalcode = ', $this->session->userdata('hosp_code'));
$this->db->order_by('n_Frequency');
$query = $this->db->get();
return $query->result();

}


function jic_plannerweek($dept,$monthyear,$week,$hosp){
	$this->db->select('*');
	$this->db->from('set_jic_scheduler');
	$this->db->where('Dept_Code',$dept);
	$this->db->where('Month_Year',$monthyear);
	$this->db->where('SUBSTRING(ji_no,-8,2)',$week);
	$this->db->where('hospital_code',$hosp);
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

function hosplocjic($month,$year){
  // asal
	$this->db->select('j.hospital_code,j.Dept_Code,COUNT(DISTINCT l.V_location_code) AS totalloc');
	$this->db->from('set_jic_scheduler j');
	$this->db->join('pmis2_egm_assetlocation l',"j.Dept_Code = l.v_UserDeptCode AND l.V_Actionflag <> 'D' AND j.hospital_code = l.V_Hospitalcode");
	//$this->db->where('Month',$month);
	//$this->db->where('Year',$year);
	$this->db->where('j.Job_date >=', $this->dater(1,$month,$year));
	$this->db->where('j.Job_date <=', $this->dater(2,$month,$year));
	$this->db->where('j.hospital_code',$this->session->userdata('hosp_code'));
	$this->db->group_by('j.Dept_Code');
	//asal
	/* 
	$this->db->select('J.hospital_code,J.Dept_Code,COUNT(DISTINCT l.V_location_code) AS totalloc',FALSE);
	$this->db->from('pmis2_egm_assetlocation l');
	$this->db->join('set_jic_scheduler J','J.Loc_Code = l.V_location_code AND J.Job_date >= '.$this->db->escape($this->dater(1,$month,$year)).' AND J.Job_date <= '.$this->db->escape($this->dater(2,$month,$year)). ' AND J.hospital_code = l.V_Hospitalcode');
	$this->db->where('l.V_Hospitalcode',$this->session->userdata('hosp_code'));
	$this->db->where('l.V_Actionflag <>','D');
	$this->db->group_by('J.Dept_Code');
	*/
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

function jicweek($month,$year,$hosp,$dept){ //new
	$this->db->select('ji_no');
	$this->db->from('set_jic_scheduler');
	$this->db->where('Month',$month);
	$this->db->where('Year',$year);
	$this->db->where('Dept_Code',$dept);
	$this->db->where('hospital_code',$hosp);
	$this->db->group_by('ji_no');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

function jijic2dept($month,$year){
	$this->db->select('Dept_Code');
	$this->db->from('set_jic_scheduler');
	$this->db->where('Month',$month);
	$this->db->where('Year',$year);
	$this->db->group_by('Dept_Code');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

public function check_assetri($asset_no) {
     $this->db->select('id');
     $this->db->where('asset_no',$asset_no);
     $query = $this->db->get('pmis2_ri_list');
     $data = $query->row();
     if($query->num_rows() == 1) {
         return true;
     } else {
         return false;
     }
}

public function nexppmwk() {
     $this->db->select('v_ServiceCode, max(n_startwk) AS maxwk');
     $this->db->where('year(d_startdt)',date("Y"));
     $this->db->where('v_ServiceCode',$this->session->userdata('usersess'));
     $this->db->where('v_Actionflag <> ','D');
     $query = $this->db->get('pmis2_egm_schconfirmmon');
     
		 //echo $this->db->last_query();
		 //exit();
		 return $query->result();
}

function get_ppmgenloc($year, $hosp, $week)
{

//$this->db->select('pmis2_sa_asset_mapping.new_asset_type, left(pmis2_sa_moh_asset_type.type_desc, 50)');
$this->db->distinct();
$this->db->select("jt.*, ar.v_tag_no, ar.v_asset_name, ar.v_user_dept_code, ar.v_location_code, am.v_assetstatus, am.v_assetcondition, am.v_assetvstatus, am.v_assetvstatus as ppm_no, lc.v_location_name ");
//$this->db->where('pmis2_sa_asset_mapping.old_asset_type = ', $typecd);
//$this->db->where('jt.v_hospitalcode = ', $typecd);
$this->db->where('ar.v_actionflag != ', 'D');
$this->db->where('am.v_actionflag != ', 'D');
//$this->db->where('jt.v_actionflag != ', 'D');
$this->db->where('jt.v_year = ', $year);
$this->db->where('jt.v_hospitalcode = ', $hosp);
$this->db->where('ar.V_service_code', $this->session->userdata('usersess'));
//$this->db->where('jt.v_weeksch LIKE ', '%'.$week.',%');
$this->db->where('jt.v_weeksch LIKE ', $week.',%');
$this->db->or_where('jt.v_weeksch =', $week);
$this->db->or_where('jt.v_weeksch LIKE ', '%,'.$week.',%');
//$this->db->or_where('jt.v_weeksch LIKE ', '%,'.$week);
$this->db->join('pmis2_egm_assetregistration ar',"jt.v_asset_no = ar.v_asset_no AND ar.V_service_code = '".$this->session->userdata('usersess')."' AND jt.v_actionflag != 'D' AND jt.v_year = '".$year."'");
$this->db->join('pmis2_egm_assetmaintenance am','ar.v_asset_no = am.v_assetno AND ar.v_hospitalcode = am.v_hospitalcode');
$this->db->join('pmis2_egm_assetlocation lc','lc.v_location_code = ar.v_location_code AND ar.v_hospitalcode = lc.v_hospitalcode');
//    return $this->db->get('pmis2_sa_asset_mapping'); 
$query = $this->db->get('pmis2_egm_assetjobtype jt');
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function licenseimage($liccd){
	$this->db->select('*');
	$this->db->from('license_images');
	$this->db->where('licenses_no',$liccd);
	$this->db->where('service_code',$this->session->userdata('usersess'));
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

function nextmrinnumber(){
	//$this->db->select("CONCAT('MRIN/',c.ZoneCode,'/',b.HospitalCode,'/',RIGHT(CONCAT('0000',CAST(a.Counter AS char)), 5),'/',DATE_FORMAT(now(),'%y')) AS mrinno,b.ZoneID,b.HospitalID,a.DocTypeID",FALSE);
	$this->db->select("CONCAT('MRIN/',c.ZoneCode,'/".$this->session->userdata('usersess')."/',CONCAT(DATE_FORMAT(now(),'%m'),DATE_FORMAT(now(),'%y')),'/',RIGHT(CONCAT('0000',CAST(a.Counter AS char)), 5)) AS mrinno,b.ZoneID,b.HospitalID,a.DocTypeID",FALSE);
	$this->db->from('tbl_autono a');
	$this->db->join('tbl_hospital b','a.ZoneID = b.ZoneID');
	$this->db->join('tbl_zone c','b.ZoneID = c.ZoneID');
	$this->db->where('b.HospitalCode',$this->session->userdata('hosp_code'));
	$this->db->where('a.Year',date('Y'));
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

function tbl_user(){
	$this->db->select('*');
	$this->db->from('tbl_user');
	$this->db->where('Login',$this->session->userdata('v_UserName'));
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}
function run_no(){
	$this->db->select('*');
	$this->db->from('tbl_run_no');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

function comprunno(){
	$this->db->select('*');
	$this->db->from('component_run_no');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

function attcrunno(){
	$this->db->select('*');
	$this->db->from('attachment_run_no');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

function get_components($tempno){
	$this->db->select('*');
	$this->db->from('component_details');
	$this->db->where('asset_no',$tempno);
	$this->db->where('flag <>','D');
	$this->db->order_by('com_id','DESC');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//echo '<br><br>';
	//exit();
	return $query->result();
}
function get_attachments($tempno){
	$this->db->select('*');
	$this->db->from('attachments_details');
	$this->db->where('asset_no',$tempno);
	$this->db->where('flag <>','D');
	$this->db->order_by('doc_id','DESC');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//echo '<br><br>';
	//exit();
	return $query->result();
}
function get_pocom($tempno){
	$this->db->select('*');
	$this->db->from('po_compodetails');
	$this->db->where('PO_No',$tempno);
	$this->db->where('flag <>','D');
	$this->db->order_by('com_id','DESC');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//echo '<br><br>';
	//exit();
	return $query->result();
}
function get_poattached($tempno){
	$this->db->select('*');
	$this->db->from('poattach_details');
	$this->db->where('PO_No',$tempno);
	$this->db->where('flag <>','D');
	$this->db->order_by('doc_id','DESC');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//echo '<br><br>';
	//exit();
	return $query->result();
}
function component_det($mrinno,$id){
	$this->db->select('*');
	$this->db->from('component_details');
	$this->db->where('asset_no',$mrinno);
	$this->db->where('Id',$id);
	$this->db->where('flag <>','D');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//echo '<br><br>';
	//exit();
	return $query->result();
}
function attachment_det($mrinno,$id){
	$this->db->select('*');
	$this->db->from('attachments_details');
	$this->db->where('asset_no',$mrinno);
	$this->db->where('Id',$id);
	$this->db->where('flag <>','D');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//echo '<br><br>';
	//exit();
	return $query->result();
}
function po_com_det($pono,$id){
	$this->db->select('*');
	$this->db->from('po_compodetails');
	$this->db->where('PO_No',$pono);
	$this->db->where('Id',$id);
	$this->db->where('flag <>','D');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//echo '<br><br>';
	//exit();
	return $query->result();
}
function poattachment_det($pono,$id){
	$this->db->select('*');
	$this->db->from('poattach_details');
	$this->db->where('PO_No',$pono);
	$this->db->where('Id',$id);
	$this->db->where('flag <>','D');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//echo '<br><br>';
	//exit();
	return $query->result();
}
function get_codecat(){
	$this->db->select('CodeCat');
	$this->db->from('tbl_invitem');
	$this->db->order_by('CodeCat');
	$this->db->group_by('CodeCat');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//echo '<br><br>';
	//exit();
	return $query->result();
}
function get_itemdet($codecat){
	$this->db->select('*');
	$this->db->from('tbl_invitem');
	if ($codecat <> ''){
		$this->db->where('CodeCat',$codecat);
	}
	$query = $this->db->get();
	//echo $this->db->last_query();
	//echo '<br><br>';
	//exit();
	return $query->result();
}

function get_priceven($itemcode){
	$this->db->select('a.Id,a.Vendor,a.List_Price,b.VENDOR_NAME');
	$this->db->from('tbl_vendor a');
	$this->db->join('tbl_vendor_info b','a.Vendor = b.VENDOR_CODE');
	$this->db->where('Item_Code',$itemcode);
	$this->db->where('flag <> ','D');
	$query = $this->db->get();
	//echo $this->db->last_query();
	//echo '<br><br>';
	//exit();
	return $query->result();
}

function get_items($mrinno){
	$this->db->select('m.*,i.ItemName');
	$this->db->from('tbl_mirn_comp m');
	$this->db->join('tbl_invitem i','m.ItemCode = i.ItemCode');
	$this->db->where('m.MIRNcode',$mrinno);
	$query = $this->db->get();
	//echo $this->db->last_query();
	//echo '<br><br>';
	//exit();
	return $query->result();
}

function licensesandcertasset($assetno)
{

$this->db->select("A.v_CertificateNo, A.v_ServiceCode, A.v_AgencyCode, A.v_LicenseCategoryCode, B.v_LicenceCategoryDesc, A.v_IdentificationType, A.v_Identification, A.v_RegistrationNo, A.v_StartDate, A.v_ExpiryDate, A.v_GradeID, A.v_Remarks, A.v_hospitalcode, A.v_key, A.CMIS_Action_Flag, A.d_timestamp,A.id",FALSE);
//SELECT (case when DWRate = 999 then (case when 500 <= 2000000 then 0.0075 * 100 else 0.0050 * 100 end) else DWRate end) as DWRate, PWRate, (case when DWRate = 999 then (case when 500 <= 2000000 then (500 * 0.0075) / 12 else (500 * 0.0050) / 12 end) else (500 * ( DWRate / 100)) / 12 end) as 'FeeDW', (500 * ( PWRate / 100) / 12) as 'FeePW'
$this->db->from('pmis2_egm_lnc_lincense_details A');
$this->db->join('pmis2_egm_lnc_license_category_code B','A.v_LicenseCategoryCode=B.v_LicenceCategoryCode');
$this->db->join('pmis2_egm_assetregistration C','A.v_key = C.V_Tag_no OR A.v_RegistrationNo = C.V_Tag_no','left outer');
$this->db->where('A.v_ServiceCode =', $this->session->userdata('usersess'));
$this->db->where('A.v_HospitalCode =', $this->session->userdata('hosp_code'));
$this->db->where('C.V_Asset_no ',$assetno);
$this->db->where('A.v_ActionFlag <> ', 'D');
$this->db->where('B.v_ActionFlag <> ', 'D');
$query = $this->db->get();
//echo "laalla".$query->DWRate;
//echo $this->db->last_query();
//exit();
return $query->result();

}

function unsatisfactory_g($month,$year)
{
	$this->db->select('SUM(CASE when Num_Code = "1" AND Job_Items = "Floor" then 1 else 0 end) AS Floor,SUM(CASE when Num_Code = "1" AND Job_Items = "Wall Door" then 1 else 0 end) AS WallDoor,SUM(CASE when Num_Code = "1" AND Job_Items = "Ceiling" then 1 else 0 end) AS Ceiling,
					  SUM(CASE when Num_Code = "1" AND Job_Items = "Windows" then 1 else 0 end) AS Windows,SUM(CASE when Num_Code = "1" AND Job_Items = "Fixtures" then 1 else 0 end) AS Fixtures,SUM(CASE when Num_Code = "1" AND Job_Items = "Furniture Fitting" then 1 else 0 end) AS FurnitureFitting');
	$this->db->from('set_jic_scheduler');
	//$this->db->where('Month',$month);
	//$this->db->where('Year',$year);
	$this->db->where('Job_date >=', $this->dater(1,$month,$year));
	$this->db->where('Job_date <=', $this->dater(2,$month,$year));
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

function nextprnumber(){
	//$this->db->select("CONCAT('PR/',RIGHT(CONCAT('0000',CAST(pr_next_no AS char)), 5),'/',DATE_FORMAT(now(),'%y')) AS prno,pr_next_no",FALSE);
	$this->db->select("CONCAT('PR/','".$this->session->userdata('hosp_code')."','/','".$this->session->userdata('usersess')."','/',DATE_FORMAT(now(),'%m'),DATE_FORMAT(now(),'%y'),'/',RIGHT(CONCAT('0000',CAST(pr_next_no AS char)), 5)) AS prno,pr_next_no",FALSE);
	$this->db->from('tbl_pr_autono');
	$this->db->where('yearno',date('Y'));
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

function nextponumber(){
	//$this->db->select("CONCAT('PO/',".$this->db->escape(date('m').date('y')).",'/',RIGHT(CONCAT('0000',CAST(po_next_no AS char)), 5)) AS pono,po_next_no",FALSE);
	$this->db->select("CONCAT('PO/','".$this->session->userdata('hosp_code')."','/','".$this->session->userdata('usersess')."','/',DATE_FORMAT(now(),'%m'),DATE_FORMAT(now(),'%y'),'/',RIGHT(CONCAT('0000',CAST(po_next_no AS char)), 5)) AS pono,po_next_no",FALSE);
	$this->db->from('tbl_po_autono');
	$this->db->where('yearno',date('Y'));
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

function chkpo($pono,$visit){
	//$this->db->select("CONCAT('PO/',".$this->db->escape(date('m').date('y')).",'/',RIGHT(CONCAT('0000',CAST(po_next_no AS char)), 5)) AS pono,po_next_no",FALSE);
	$this->db->select("PO_Date");
	$this->db->from('tbl_po');
	$this->db->where('PO_No',$pono);
	if ($visit == 3) {
	$this->db->where('Date_Completed is NOT NULL', NULL, FALSE);
	} else {
	$this->db->where('visit',$visit);}
	$query = $this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();
}

function qap3_newcarno2($ssiq,$m,$y){

	$this->db->select('convert(right(CAR.car_no,5), UNSIGNED INTEGER) AS B',FALSE);
	$this->db->from('mis_qap_car_header CAR');
	$this->db->join('mis_qap_siq_detail SIQ', 'SIQ.siq_no = CAR.siq_no');
	$this->db->where('CAR.hosp_code',$this->session->userdata('hosp_code'));
	$this->db->where('CAR.siq_no',$ssiq);
	
    //$this->db->where('CAR.hosp_code','MKA');//for test
    
	$this->db->where('MONTH(SIQ.siq_date)',$m);
	 $this->db->where('YEAR(SIQ.siq_date)',$y);
	//$this->db->where('MONTH(SIQ.siq_date)',01);
	//$this->db->where('YEAR(SIQ.siq_date)',2015);
	
	$this->db->order_by('CAR.car_no','desc');
	$this->db->limit(1);
	$query = $this->db->get();
 /* 	echo $this->db->last_query();
	exit();  */
	return $query->result();
	
}

}
?>
 	