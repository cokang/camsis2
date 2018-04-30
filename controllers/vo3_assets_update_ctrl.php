<?php
class vo3_assets_update_ctrl extends CI_Controller{
	
	public function index(){
	error_reporting(E_ALL);
ini_set('display_errors', 1);
	// load libraries for URL and form processing
    $this->load->helper(array('form', 'url'));
    // load library for form validation
    $this->load->library('form_validation');
	
	//validation rule
	$this->form_validation->set_rules('n_criticality','Criticality','trim|required');
	$this->form_validation->set_rules('n_sparelist','Sparelist','trim|required');
	$this->form_validation->set_rules('n_safety_test','Safety Test','trim|required');
	$this->form_validation->set_rules('n_asset_class','Asset Class','trim|required');
	$this->form_validation->set_rules('n_asset_status','Asset Status','trim|required');
	
	if ($this->input->post('n_asset_condition') == 'C2:Request for Exemption'){
		$this->form_validation->set_rules('n_asset_condition','Asset Condition','trim|required');
		$this->form_validation->set_rules('RefNoC2','Ref No C2','trim|required');
	}
	elseif ($this->input->post('n_asset_condition') == 'C3:Exemption approved'){
		$this->form_validation->set_rules('n_asset_condition','Asset Condition','trim|required');
		$this->form_validation->set_rules('RefNoC3','Ref No C3','trim|required');
	}
	elseif ($this->input->post('n_asset_condition') == 'C4:Request for BER Certification'){
		$this->form_validation->set_rules('n_asset_condition','Asset Condition','trim|required');
		$this->form_validation->set_rules('RefNoC4','Ref No C4','trim|required');
	}
	elseif ($this->input->post('n_asset_condition') == 'C5:BER'){
		$this->form_validation->set_rules('n_asset_condition','Asset Condition','trim|required');
		$this->form_validation->set_rules('RefNoC5','Ref No C5','trim|required');
		$this->form_validation->set_rules('D_C5','Date C5','trim|required');
	}
	elseif ($this->input->post('n_asset_condition') == 'C6:Request for Condemn'){
		$this->form_validation->set_rules('n_asset_condition','Asset Condition','trim|required');
		$this->form_validation->set_rules('RefNoC6','Ref No C6','trim|required');
	}
	elseif ($this->input->post('n_asset_condition') == 'C7:Condemn approved'){
		$this->form_validation->set_rules('n_asset_condition','Asset Condition','trim|required');
		$this->form_validation->set_rules('RefNoC7','Ref No C7','trim|required');
		$this->form_validation->set_rules('D_C7','Date C7','trim|required');
	}
	else{
		$this->form_validation->set_rules('n_asset_condition','Asset Condition','trim|required');
	}
	
	if ($this->input->post('n_Variation_Status') == 'V1:Existing Equipment/Asset'){
		$this->form_validation->set_rules('n_Variation_Status','Variation Status','trim|required');
		$this->form_validation->set_rules('Loc_V1','Location V1','trim|required');
		$this->form_validation->set_rules('D_V1','Date V1','trim|required');
	}
	elseif ($this->input->post('n_Variation_Status') == 'V3:Added'){
		$this->form_validation->set_rules('n_Variation_Status','Variation Status','trim|required');
		$this->form_validation->set_rules('D_V3','Date V3','trim|required');
	}
	elseif ($this->input->post('n_Variation_Status') == 'V3F:Start Service - Asset Found'){
		$this->form_validation->set_rules('n_Variation_Status','Variation Status','trim|required');
		$this->form_validation->set_rules('D_V3F','Date V3F','trim|required');
	}
	elseif ($this->input->post('n_Variation_Status') == 'V4:Removed'){
		$this->form_validation->set_rules('n_Variation_Status','Variation Status','trim|required');
		$this->form_validation->set_rules('D_V4','Date V4','trim|required');
	}
	elseif ($this->input->post('n_Variation_Status') == 'V4L:Stop Service - Asset Not Found'){
		$this->form_validation->set_rules('n_Variation_Status','Variation Status','trim|required');
		$this->form_validation->set_rules('D_V4L','Date V4L','trim|required');
	}
	elseif ($this->input->post('n_Variation_Status') == 'V5:Transferred To'){
		$this->form_validation->set_rules('n_Variation_Status','Variation Status','trim|required');
		$this->form_validation->set_rules('Loc_V5','Location V5','trim|required');
		$this->form_validation->set_rules('D_V5','Date V5','trim|required');
	}
	elseif ($this->input->post('n_Variation_Status') == 'V6:Transferred From'){
		$this->form_validation->set_rules('n_Variation_Status','Variation Status','trim|required');
		$this->form_validation->set_rules('Loc_V6','Location V6','trim|required');
		$this->form_validation->set_rules('D_V6','Date V6','trim|required');
	}
	elseif ($this->input->post('n_Variation_Status') == 'V7:Donated'){
		$this->form_validation->set_rules('n_Variation_Status','Variation Status','trim|required');
		$this->form_validation->set_rules('D_V7','Date V7','trim|required');
	}
	elseif ($this->input->post('n_Variation_Status') == 'V8:Upgraded Installed Facility'){
		$this->form_validation->set_rules('n_Variation_Status','Variation Status','trim|required');
		$this->form_validation->set_rules('D_V8','Date V8','trim|required');
	}
	else{
		$this->form_validation->set_rules('n_Variation_Status','Variation Status','trim|required');
	}
	
	if ($this->input->post('n_Variation_Status') != 'V1:Existing Equipment/Asset'){
		$this->form_validation->set_rules('n_SNFVNFRefNo','SNF / VNF Ref No','trim|required');
		$this->form_validation->set_rules('n_SubDate','Submission Date','trim|required');
	}
	else{
		$this->form_validation->set_rules('n_SNFVNFRefNo','SNF / VNF Ref No','trim');
		$this->form_validation->set_rules('n_SubDate','Submission Date','trim');	
	}
	$this->form_validation->set_rules('n_AssetType','Asset Type','trim');
	$this->form_validation->set_rules('n_ChecklistCode','Checklist Code','trim');
	$this->form_validation->set_rules('n_Chklistdesk','Checklist Desk','trim');
	$this->form_validation->set_rules('n_Frequency','Frequency','trim');
	$this->form_validation->set_rules('n_KKMRefNo','KKM Ref Number','trim');
	$this->form_validation->set_rules('n_version','Version','trim');
	$this->form_validation->set_rules('n_volume','Volume','trim');
	$this->form_validation->set_rules('n_Checklistname','Checklist Filename','trim');
	$this->form_validation->set_rules('n_assettype','Asset Type','trim');
	$this->form_validation->set_rules('n_assetdesc','Asset Description','trim');
	$this->form_validation->set_rules('n_mfg','Manufacturer','trim');
	$this->form_validation->set_rules('n_model','Model','trim');
	
	if($this->form_validation->run()==FALSE)
		{
		$data['rpt_no'] = $this->input->post('rpt_no');
		$data['assetno'] = $this->input->post('asset');
		$this->load->model('display_model');
		$data['records'] = $this->display_model->vo3_item_general($data['assetno']);
		$data['record'] = $this->display_model->assets_vvf_disp($data['rpt_no'],$data['assetno']);
		$data['checklist'] = $this->display_model->vo3_checklist_disp('checklistCode',$data['records'][0]->v_ChecklistCode);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vo3_item_general",$data);		
		}
		
		else
		{
		$data['assetno'] = $this->input->post('asset');
		$this->load->model('display_model');
		$data['records'] = $this->display_model->vo3_item_general($data['assetno']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vo3_item_general_confirm",$data);		
		}

	}
	
	function confirmation(){

	//VO period claim
	$t = $this->input->post('n_SubDate') ? $this->input->post('n_SubDate') : NULL;

	if (!is_null($t)) {
		if (date("m",strtotime($t)) < 7){
			$VOClaimPeriod = 'P1'.date("y",strtotime($t));
		}
		else{
			$VOClaimPeriod = 'P2'.date("y",strtotime($t));
			echo $VOClaimPeriod;
			exit();
		}
	}
	else{
		if (date("m") < 7){
			$VOClaimPeriod = 'P1'.date("y");
		}
		else{
			$VOClaimPeriod = 'P2'.date("y");
		}
	}

	//asset condition 
	if (substr($this->input->post('n_asset_condition'),0,2) == 'C2'){
		$CRefNo = $this->input->post('RefNoC2');
		$CRefDate = NULL;
	}
	elseif (substr($this->input->post('n_asset_condition'),0,2) == 'C3'){
		$CRefNo = $this->input->post('RefNoC3');
		$CRefDate = NULL;
	}
	elseif (substr($this->input->post('n_asset_condition'),0,2) == 'C4'){
		$CRefNo = $this->input->post('RefNoC4');
		$CRefDate = NULL;
	}
	elseif (substr($this->input->post('n_asset_condition'),0,2) == 'C5'){
		$CRefNo = $this->input->post('RefNoC5');
		$CRefDate = $this->input->post('D_C5');
	}
	elseif (substr($this->input->post('n_asset_condition'),0,2) == 'C6'){
		$CRefNo = $this->input->post('RefNoC6');
		$CRefDate = NULL;
	}
	elseif (substr($this->input->post('n_asset_condition'),0,2) == 'C7'){
		$CRefNo = $this->input->post('RefNoC7');
		$CRefDate = $tis->input->post('D_C7');
	}
	else{
		$CRefNo = NULL;
		$CRefDate = NULL;
	}

	//variation status
	$Variation = explode(':',$this->input->post('n_Variation_Status'));
	$VarCode = substr($Variation[0],0,3);
	if ($VarCode == 'V1'){
		$VOClaimPeriod = NULL;
		$VLoc = $this->input->post('Loc_V1');
		$VRefDate = $this->input->post('D_V1');
	}
	elseif ($VarCode == 'V3'){
		$VLoc = NULL;
		$VRefDate = $this->input->post('D_V3');
	}
	elseif ($VarCode == 'V3F'){
		$VLoc = NULL;
		$VRefDate = $this->input->post('D_V3F');
	}
	elseif ($VarCode == 'V4'){
		$VLoc = NULL;
		$VRefDate = $this->input->post('D_V4');
	}
	elseif ($VarCode == 'V4L'){
		$VLoc = NULL;
		$VRefDate = $this->input->post('D_V4L');
	}
	elseif ($VarCode == 'V5'){
		$VLoc = $this->input->post('Loc_V5');;
		$VRefDate = $this->input->post('D_V5');
	}
	elseif ($VarCode == 'V6'){
		$VLoc = $this->input->post('Loc_V6');;
		$VRefDate = $this->input->post('D_V6');
	}
	elseif ($VarCode == 'V7'){
		$VLoc = NULL;
		$VRefDate = $this->input->post('D_V7');
	}
	elseif ($VarCode == 'V8'){
		$VLoc = NULL;
		$VRefDate = $this->input->post('D_V8');
	}
	else{
		$VLoc = NULL;
		$VRefDate = NULL;
	}

	//SNFVNFRefNo
	if (strlen($this->input->post('n_SNFVNFRefNo')) > 0){
		$SNFVNFRefNo = $this->input->post('n_SNFVNFRefNo');
		$SubmissionDate = $this->input->post('n_SubDate');
	}
	else{
		$SNFVNFRefNo = NULL;
		$SubmissionDate = NULL;
	}

	$this->load->model('insert_model');
	$assetNo = $this->input->post('asset');
	
	$testcheck = $this->insert_model->assetmaintenance_exist('v_AssetNo',$assetNo,$VOClaimPeriod,$CRefNo,$CRefDate,$VLoc,$VRefDate,$SNFVNFRefNo,$SubmissionDate);


	$RN = $this->input->post('rpt_no');
	
	
	redirect('contentcontroller/vo3_Assets?rpt_no='.$RN.'&vo=2');
	}

}
?>