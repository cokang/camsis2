<?php  
class Asset_ctrl extends CI_Controller {
	
	// Validates different money formats
// 
// Author: Antonio Max - 2012
// 
// params: $input > number or money str
//         $params > 3 params CSV string
//                   thousand_separator, decimal_separator, error_msg
//
// returns: BOOL
//
function is_money_multi($input, $params) {   

    @list($thousand, $decimal, $message) = explode(',', $params);
    $thousand = (empty($thousand) || $thousand === 'COMMA') ? ',' : '.';
    $decimal = (empty($decimal) || $decimal === 'DOT') ? '.' : ',';
    $message = (empty($message)) ? 'The money field is invalid' : $message;

    $regExp = "/^\s*[$]?\s*((\d+)|(\d{1,3}(\{thousand}\d{3})+)|(\d{1,3}(\{thousand}\d{3})(\{decimal}\d{3})+))(\{decimal}\d{2})?\s*$/";
    $regExp = str_replace("{thousand}", $thousand, $regExp);
    $regExp = str_replace("{decimal}", $decimal, $regExp);

    $ok = preg_match($regExp, $input);
    if(!$ok) {
        $CI =& get_instance();
        $CI->form_validation->set_message('is_money_multi', $message);
        return FALSE;
    }
    return TRUE;
}
	
  function index()
  {
	  echo "masuk cni";
		exit();
    // load libraries for URL and form processing
    $this->load->helper(array('form', 'url'));
    // load library for form validation
    $this->load->library('form_validation');
    // validation rule
		$this->form_validation->set_rules('n_equipment_code','*Equipment Code','trim|required');
		$this->form_validation->set_rules('n_equipment_code2','*Equipment Code2','trim');
		$this->form_validation->set_rules('n_make','*Make (Country of Origin) ','trim|required');
		$this->form_validation->set_rules('n_asset_workgroup','*Asset Workgroup','trim|required');
		$this->form_validation->set_rules('n_user_department','*User Department','trim|required');
		$this->form_validation->set_rules('n_user_department1','*User Department2','trim');
		$this->form_validation->set_rules('n_location','*Location','trim|required');
		$this->form_validation->set_rules('n_location2','*Location2','trim');
		$this->form_validation->set_rules('n_register_date','*Register Date','trim|required');
		$this->form_validation->set_rules('n_remarks','*Remarks ','trim|required');
		$this->form_validation->set_rules('n_op_hours','OP Hours Code','trim');
		$this->form_validation->set_rules('n_manufacturer','Manufacturer','trim');
		$this->form_validation->set_rules('n_model','Model','trim');
		$this->form_validation->set_rules('n_brand','Brand','trim');		
		$this->form_validation->set_rules('n_request_number','T&C Request Number','trim');
		$this->form_validation->set_rules('n_serial','n_serial','trim');
		$this->form_validation->set_rules('n_contract_code','Contract Code','trim');
		$this->form_validation->set_rules('n_agent','Agent','trim');
		$this->form_validation->set_rules('n_agent2','Agent2','trim');
		$this->form_validation->set_rules('n_supplier','Supplier','trim');
		$this->form_validation->set_rules('n_cost','Cost','numeric|xss_clean');
		$this->form_validation->set_rules('n_file_reference','File Reference','trim');
		$this->form_validation->set_rules('n_lpo','LPO','trim');
		$this->form_validation->set_rules('n_purchase_date','Purchase Date','trim');
		$this->form_validation->set_rules('n_commissioned_on','Commissionned On','trim');
		$this->form_validation->set_rules('n_warranty','n_warranty','trim');
		$this->form_validation->set_rules('n_technical_report','Technical Report Number','trim');
		$this->form_validation->set_rules('n_capacity','Capacity','trim');
		$this->form_validation->set_rules('n_depreciation','Depreciation','numeric|xss_clean');
		$this->form_validation->set_rules('n_life_span','Life Span','numeric|xss_clean');
		$this->form_validation->set_rules('n_job_type_code','Job Type Code','trim');
		$this->form_validation->set_rules('n_user_name','User Name','trim');
		$this->form_validation->set_rules('n_manual_drawing','Manual / Drawing<br />Reference Number','trim');
		$this->form_validation->set_rules('n_procedure','Procedure','trim');
		$this->form_validation->set_rules('n_tnc_request','Procedure','trim');
		$this->form_validation->set_rules('n_asset_status','Asset Status','trim');
		$this->form_validation->set_rules('n_asset_condition','Asset Condition','trim');
		$this->form_validation->set_rules('A','Ref No','trim');
		$this->form_validation->set_rules('n_variation_status','Asset Condition','trim');
		$this->form_validation->set_rules('n_snfvnf','SNF / VNF Ref No ','trim');
		$this->form_validation->set_rules('n_submission_date','Submission Date','trim');
		$this->form_validation->set_rules('n_asset_class','Asset Class','trim');
		$this->form_validation->set_rules('n_asset_type','Asset Type','trim');
		
		$this->form_validation->set_rules('V1Location','Asset Variation Location','trim');
		
/*		$this->form_validation->set_rules('n_asset_workgroup','*Asset Workgroup','trim|required');
		$this->form_validation->set_rules('n_user_department','*User Department','trim|required');
		$this->form_validation->set_rules('n_location','*Location','trim|required');
		$this->form_validation->set_rules('n_register_date','*Register Date','trim|required');
		/*
		
		$this->form_validation->set_rules('n_remarks','*Remarks ','trim|required');
		$this->form_validation->set_rules('n_chasis_no','*Chasis No','trim|required');
		$this->form_validation->set_rules('n_engine_no','*Engine No','trim|required');
		$this->form_validation->set_rules('n_registration_no','*Registration No','trim|required');
		
		
		
		$this->form_validation->set_rules('n_asset_status','Asset Status','trim|required');
		$this->form_validation->set_rules('n_asset_condition','Asset Condition','trim|required');
		$this->form_validation->set_rules('n_variation_status','Variation Status','trim|required');
		$this->form_validation->set_rules('n_fv1location','Location','trim|required');
		$this->form_validation->set_rules('n_date','Date','trim|required');
		$this->form_validation->set_rules('n_Remark','Remark','trim|required');
		$this->form_validation->set_rules('n_cat','CAT','trim|required');
		$this->form_validation->set_rules('n_fV5Location','Location','trim|required');
		$this->form_validation->set_rules('n_snf_no','SNF / VNF Ref No ','trim|required');
		$this->form_validation->set_rules('n_submission_date','Submission Date','trim|required');
		$this->form_validation->set_rules('n_asset_class','Asset Class','trim|required');
		*/	
		if($this->form_validation->run()==FALSE)
		{
		$this->load->model('get_model');	
	  $data['country_list'] = $this->get_model->get_dropdown_list_country();
		$data['manufacturer_list'] = $this->get_model->get_dropdown_list_manufacturer();
		$data['contract_list'] = $this->get_model->get_dropdown_list_contractcd();
    $this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_assetnew", $data);
		}
		
		else
		{
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_assetnew_confirm");
		}
  }
	
	function confirmation_asset(){
	
		$this->load->model('insert_model');	
		$this->load->model('get_model');	
		//$data['service_apa'] = $this->loginModel->validate3();	
		/*
		'===COMPUTE NEW ASSET NUMBER BASED ON LAST ASSET NUMBER REGISTERED FOR THIS CATEGORY IN THIS SITE======
		sSQL = "SELECT isnull (max( cast (right(rtrim(v_asset_no),4) as int)), 0) newno " & _
					"FROM pmis2_egm_assetregistration (nolock) " & _
						"WHERE v_hospitalcode='" & session("sitecode") & "' " & _ 
							"AND v_equip_code='" & sEquipCode & "'"
		'response.write ssql
	    	Set uConn= gsubDBCreateCon
		Set uRes = gsubDBQuery(uConn, sSQL)
		if ures.eof then
			sError = "System encountered a problem while generating a new asset number for this asset.<br>" & _
						"You may not register this asset using the Equipment Code you have selected for the time being.<br>" & _
						"Please contact your system administrator and notify this problem immediately."
		else
			sAssetNo = cint(ures("newno")) + 1
			sAssetNo = sEquipCode & "-" & right("0000" & cstr(sAssetNo),4)
		end if
		*/
		
		
		$RN="BEINF01-0001";	
		$RNTagclass="F"
		$nilaibaru = $this->get_model->get_assetnewnum($this->input->post('n_equipment_code'));
		//print_r($nilaibaru);
		//echo "<br> nilaibar : ".$nilaibaru[0]->thenum;
		$RN= $this->input->post('n_equipment_code')."-".str_pad($nilaibaru[0]->thenum, 5, 0, STR_PAD_LEFT);
		$RNTagclass=$this->get_model->get_assetnewtag($this->input->post('n_equipment_code'));
		$nilaibarutag = $this->get_model->get_assetnewtag($RNTagclass);
		
		$RNTag=$this->session->userdata('hosp_code')." ".$RNTagclass.str_pad($nilaibarutag[0]->thenum, 5, 0, STR_PAD_LEFT);
		echo "nilai tag : ".$RNTag;
		exit();
		$assetname="New Asset";
		
	
		
		
//for getting rates		
		//$rates = $this->get_model->get_vo_rates('10-046','5000');
		//echo "lalalalla : ". $this->input->post('n_equipment_code') .",".$this->input->post('n_cost');
		$rates = $this->get_model->get_vo_rates($this->input->post('n_asset_type'),$this->input->post('n_cost'));
		//print_r(array_values($rates));
		echo number_format($rates[0]->DWRate, 2, '.', '')."<br>";
		echo number_format($rates[0]->PWRate, 2, '.', '')."<br>";
		echo number_format($rates[0]->FeeDW, 2, '.', '')."<br>";
		echo number_format($rates[0]->FeePW, 2, '.', '')."<br>";
//for getting rates
//get asset name		
    $asset_name = $this->get_model->get_assetname($this->input->post('n_asset_type'));
		echo $asset_name[0]->asset_type."<br>";
		echo $asset_name[0]->asset_desc."<br>";
//get asset name		
//		$asset_name = $this->get_model->get_assetdetail('BECEN04');
		
		

/*
foreach ($rates->result() as $row)
{
    echo $row->DWRate;
}
*/
		//echo $rates
//		exit();	
		
		
		$insert_dataassetreg = array(
		'V_Asset_no'=>$RN,
		'V_Asset_name'=>$asset_name[0]->asset_desc,
		'V_Tag_no'=>$RNTag,
		'V_service_code'=>$this->session->userdata('usersess'),
		'V_Hospitalcode'=>$this->session->userdata('hosp_code'),
		'V_Actionflag'=>"I",
		'V_Timestamp'=>date('Y-m-d H:i:s'),
		'V_Equip_code'=>$this->input->post('n_equipment_code'),
		'V_Asset_WG_code'=>$this->input->post('n_asset_workgroup'),
		'V_User_Dept_code'=>$this->input->post('n_user_department'),
		'V_Location_code'=>$this->input->post('n_location'),
		'D_Register_date'=>$this->input->post('n_register_date'),
		'V_Brandname'=>$this->input->post('n_brand'),
		'V_Manufacturer'=>$this->input->post('n_manufacturer'),
		'V_Model_no'=>$this->input->post('n_model'),
		'v_tc_request_no'=>$this->input->post('n_tnc_request'),
		'V_Serial_no'=>$this->input->post('n_serial'),
		'v_make'=>$this->input->post('n_make'),
		'v_chasisno'=>$this->input->post('n_chasis_no'),
		'v_engineno'=>$this->input->post('n_engine_no'),
		'v_registrationno'=>$this->input->post('n_registration_no')
		
	
		);
		
		$this->insert_model->ins_assetreg($insert_dataassetreg,TRUE);
		
		//echo $this->db->last_query()."<br>";
		//exit();
		
		$insert_dataassetrege = array(
		'V_Asset_no'=>$RN,
		'V_Hospital_code'=>$this->session->userdata('hosp_code'),
		'V_ActionFlag'=>"I",
		'D_Timestamp'=>date('Y-m-d H:i:s'),
		'v_Misc_Details'=>$this->input->post('n_remarks'),
		'V_Agent'=>$this->input->post('n_agent'),
		'V_Vendor_code'=>$this->input->post('n_supplier'),
		'N_Cost'=>$this->input->post('n_cost'),
		'V_File_Ref_no'=>$this->input->post('n_file_reference'),
		'V_PO_no'=>$this->input->post('n_lpo'),
		'V_PO_date'=>$this->input->post('n_purchase_date'),
		'D_commission'=>$this->input->post('n_commissioned_on'),
		'V_Wrn_end_code'=>$this->input->post('n_warranty'),
		'V_TC_form_no'=>$this->input->post('n_technical_report'),
		'v_Capacity'=>$this->input->post('n_capacity'),
		'V_Depreciation'=>$this->input->post('n_depreciation'),
		'V_Lifespan'=>$this->input->post('n_life_span'),
		'V_Oper_Hr_code'=>$this->input->post('n_op_hours'),
		'V_Job_Type_code'=>$this->input->post('n_job_type_code'),
		'v_contractcode'=>$this->input->post('n_contract_code'),
		'V_username'=>$this->input->post('n_user_name'),
		'v_Procedure_code'=>$this->input->post('n_procedure'),
		'V_Mnl_Draw_no'=>$this->input->post('n_manual_drawing')
	
		);
		
		$this->insert_model->ins_assetreggen($insert_dataassetrege,TRUE);
		
		echo $this->db->last_query();
		//exit();
		
		if (date('m') < 7) {
  	$sVOClaimPeriod="P1".date('y'); // WARNING: assuming month is an external array assuming year is an external array
		}
		else {
  	$sVOClaimPeriod="P2".date('y'); // WARNING: assuming year is an external array
		}
		
		
		
		$sVLocation="";
    $sVDate="";
		
		
		
		//switch (str_replace(":","",substr($this->input->post('n_variation_status'),0,3))) 
		switch ($this->input->post('n_variation_status'))
{		
  	case "V1": // WARNING: assuming sVariation is an external function
    $bNewVariation=false;
    $sVOClaimPeriod="NULL";
    $sVLocation=$this->input->post('n_locationv1'); // WARNING: assuming sV1Location is an external function
    $sVDate=$this->input->post('n_datev1'); // WARNING: assuming sV1Date is an external function assuming year is an external array assuming sV1Date is an external function assuming month is an external array assuming sV1Date is an external function assuming day is an external array
    $sVOSNFVNFNo="";
    break;

  	case "V2":
    $bNewVariation=true;
    $sVLocation=$this->input->post('n_locationv2'); // WARNING: assuming sV2Location is an external function
    $sVDate=$this->input->post('n_datev2'); // WARNING: assuming sV2Date is an external function assuming year is an external array assuming sV2Date is an external function assuming month is an external array assuming sV2Date is an external function assuming day is an external array
    break;

  	case "V3":
    $bNewVariation=true;
    $sVLocation=$this->input->post('n_locationv3'); // WARNING: assuming fAssetContractV3 is an external function
    $sVDate=$this->input->post('n_datev3'); // WARNING: assuming sV3Date is an external function assuming year is an external array assuming sV3Date is an external function assuming month is an external array assuming sV3Date is an external function assuming day is an external array
    break;

  	case "V4L":
    $bNewVariation=true;
    break;

  	case "V4":
    $bNewVariation=true;
    $sVLocation=$this->input->post('n_locationv4'); // WARNING: assuming fAssetContractV4 is an external function
    $sVDate=$this->input->post('n_datev4'); // WARNING: assuming sV4Date is an external function assuming year is an external array assuming sV4Date is an external function assuming month is an external array assuming sV4Date is an external function assuming day is an external array
    break;

  	case "V9":
    $bNewVariation=true;
    break;

  	case "V5":
    $bNewVariation=true;
    $sVLocation=$this->input->post('n_locationv5'); // WARNING: assuming sV5Location is an external function
    $sVDate=$this->input->post('n_datev5'); // WARNING: assuming sV5Date is an external function assuming year is an external array assuming sV5Date is an external function assuming month is an external array assuming sV5Date is an external function assuming day is an external array
    break;

  	case "V6":
    $bNewVariation=true;
    $sVLocation=$this->input->post('n_locationv6'); // WARNING: assuming sV6Location is an external function
    $sVDate=$this->input->post('n_datev6'); // WARNING: assuming sV6Date is an external function assuming year is an external array assuming sV6Date is an external function assuming month is an external array assuming sV6Date is an external function assuming day is an external array
    break;

  	case "V7":
    $bNewVariation=true;
    $sVDate=$this->input->post('n_datev7'); // WARNING: assuming sV7Date is an external function assuming year is an external array assuming sV7Date is an external function assuming month is an external array assuming sV7Date is an external function assuming day is an external array
    break;

  	case "V8":
    $bNewVariation=true;
    $sVDate=$this->input->post('n_datev8'); // WARNING: assuming sV8Date is an external function assuming year is an external array assuming sV8Date is an external function assuming month is an external array assuming sV8Date is an external function assuming day is an external array
    break;

 		case "V10":
    $bNewVariation=true;
    $sVDate=$this->input->post('n_datev10'); // WARNING: assuming sV10Date is an external function assuming year is an external array assuming sV10Date is an external function assuming month is an external array assuming sV10Date is an external function assuming day is an external array
    break;

  	case "V11":
    $bNewVariation=true;
    $sVDate=$this->input->post('n_datev11'); // WARNING: assuming sV11Date is an external function assuming year is an external array assuming sV11Date is an external function assuming month is an external array assuming sV11Date is an external function assuming day is an external array
    break;

  	default:
    $bNewVariation=false;
    $sVOClaimPeriod="NULL";
    $sVOSNFVNFNo="";
    break;
}
		
		$insert_dataassetmaint = array(
		
		'V_Assetno'=>$RN,
		'V_ActionFlag'=>"I",
		'v_hospitalcode'=>$this->session->userdata('hosp_code'),
		'D_Timestamp'=>date('Y-m-d H:i:s'),
		'voclaim_period'=>$sVOClaimPeriod,
		'v_AssetStatus'=>$this->input->post('n_asset_status'),
		'v_assetcondition'=>$this->input->post('n_asset_condition'),
		'v_assetvstatus'=>$this->input->post('n_variation_status'),
		//'v_location'=>$this->input->post('n_fv1location'),
		'v_location'=>$sVLocation,
		'v_Criticality'=>'01',
		'd_refdate'=>$this->input->post('n_date'),
		//'d_locdate'=>$this->input->post('n_submission_date'),
		'd_locdate'=>$sVDate,
		'v_AssettypeCode'=>$this->input->post('n_asset_class')
		/*
		'V_servicecode'=>$this->session->userdata('n_snf_no'),
		'V_servicecode'=>$this->session->userdata('n_Remark'),
		
		*/
	
		);
		
		
		
		$this->insert_model->ins_assetmaintainance($insert_dataassetmaint,TRUE);
		
		echo "<br>".$this->db->last_query();
		//exit();
		
		if (date('m') < 7) {
  	$sVOClaimPeriod="P1".date('y'); // WARNING: assuming month is an external array assuming year is an external array
		}
		else {
  	$sVOClaimPeriod="P2".date('y'); // WARNING: assuming year is an external array
		}
		//echo "nilai sVOClaimPeriod : ".$sVOClaimPeriod;
		//exit();
		
		
		echo "nilai : ".$sVOClaimPeriod."<br>" ;  
		echo "nilai2 : VVFBEM/".$this->session->userdata('hosp_code')."/".$sVOClaimPeriod."/".date("Y");
		//"."VVFBEM/BPH/".$sVOClaimPeriod."/".date("Y");
		//echo "nilai3 : "."VVFBEM/BPH/".$sVOClaimPeriod."/".date("Y");BPH/SNF/VNF/JUN2009
		
		
//echo "<br> ok";
//exit();	
/*
 		if (strlen($sVOSNFVNFNo) > 0) {
  	$sVOSNFVNFNo=$this->input->post('n_snfvnf');
  	$sVOSubmissionDate=$this->input->post('n_submission_date'); // WARNING: assuming year is an external array assuming month is an external array assuming day is an external array
		}
		else {
  	$sVOSNFVNFNo="NULL";
  	$sVOSubmissionDate="NULL";
		}
*/
		
		$insert_vodata = array(
		
		'vvfReportNo'=>"VVFBEM/".$this->session->userdata('hosp_code')."/".$sVOClaimPeriod."/".date("Y"),		
		'vvfRefNo'=>$this->input->post('n_snfvnf'),		
		'vvfHospitalCode'=>$this->session->userdata('hosp_code'),
		'vvfDept'=>$this->input->post('n_user_department'),		
		'vvfAssetNo'=>$RN,		
		'vvfAssetTagNo'=>$RNTag,
		'vvfAssetType'=>$asset_name[0]->asset_type,		
		'vvfAssetDesc'=>$asset_name[0]->asset_desc,	
		'vvfMfg'=>$this->input->post('n_manufacture'),
		'vvfModel'=>$this->input->post('n_model'),		
		'vvfPurchaseCost'=>$this->input->post('n_cost'),	
		'vvfVStatus'=>$this->input->post('n_variation_status'),
		'vvfDateComm'=>$this->input->post('n_commissioned_on'),		
		'vvfDateStart'=>$this->input->post('n_commissioned_on'),		
//		'vvfDateStop'=>,
		'vvfDateWarrantyEnd'=>$this->input->post('n_warranty_expire'),	
//		'vvfAssetLockedDate'=>,	
//		'vvfAssetLockedStatus'=>,
//		'vvfAssetLockedBy'=>,	
//		'vvfAuthorizedDate'=>,	
//		'vvfAuthorizedStatus'=>,
//		'vvfAuthorizedBy'=>,	
		'vvfActionflag'=>"I",		
		'vvfTimestamp'=>date('Y-m-d H:i:s'),
		'vvfSubmissionDate'=>$this->input->post('n_submission_date'),	
		'vvfRateDW'=>number_format($rates[0]->DWRate, 2, '.', ''),		
		'vvfRatePW'=>number_format($rates[0]->PWRate, 2, '.', ''),
		'vvfFeeDW'=>number_format($rates[0]->FeeDW, 2, '.', ''),     		
		'vvfFeePW'=>number_format($rates[0]->FeePW, 2, '.', '')		
//		'vvfHQRemarksDate'=>,
//		'vvfHQRemarks'=>
		);
		
		$this->insert_model->ins_vo($insert_vodata,TRUE);
		
		echo "<br>".$this->db->last_query();
		//exit();	
		
		redirect('contentcontroller/assets');
			
		}
	
}
?>