<?php  
class ppm_gen_ctrl extends CI_Controller {
	
  function index()
  { //echo "ini first";
	  $nilaiwk = $_GET["wk"];
		$nilaiy = $_GET["y"];
		$nilaiact = $_GET["act"];
		$nilaim = $_GET["m"];
		$nilaid = $_GET["d"];
		$ndue = 6;
		$data['year'] = $this ->get_year();
		$data['y']= ($this->input->get('y') <> 0) ? $this->input->get('y') : 'NA';	
		$data['wk']= ($this->input->get('wk') <> 0) ?  $this->input->get('wk') : 'NA';
		//$data['tajuk1'] = $nilaiy.' PPM WEEK '.$nilaiwk.' <br />(30 DEC 2013 - 05 JAN 2014)';
		$data['tajuk1'] = $nilaiy.' PPM WEEK '.$nilaiwk;
		//echo('nilai week : '.$nilaiwk.'</br>');
		//echo('nilai year : '.$nilaiy.$this->session->userdata('hosp_code').'</br>');
	  $this->load->model('get_model');	
		
		if ($nilaiact <> '') {
		//echo 'masuk act';
		$this->load->model('get_seqno');	
		//$data['service_apa'] = $this->loginModel->validate3();	
		$RN=$this->get_seqno->funcGetAPBESYSNextSeqNo('P', $nilaiy);
		$sFormat = $this->get_seqno->funcGetAPBESYSSeqNoFormat('P');
		$sFormatP = $this->get_seqno->funcFormatAPBESYSSeqNo($sFormat, 'P', $RN, $nilaiy);
		$data['ppm_wo']=$this->get_model->get_ppmgen($nilaiy,$this->session->userdata('hosp_code'),$nilaiwk);
		//print_r($data['ppm_wo']);
		//echo('<br>');
		foreach ($data['ppm_wo'] as $value) {
		$this->load->model('get_model');
		$truker = $this->get_model->validate_schmon($nilaiwk, $this->session->userdata('hosp_code'), $nilaiy, $value->v_Asset_no,$value->v_JobType);
		//echo "nilai trunker : <br>";
		//print_r($truker);
		//echo 'trukefalse : '.$truker;
		//if ($this->get_model->validate_schmon($nilaiwk, $this->session->userdata('hosp_code'), $nilaiy)) {
		if (count($truker) == 0) {
		$insert_data = array(
		'v_WrkOrdNo'=>$this->get_seqno->funcFormatAPBESYSSeqNo($sFormat, 'P', $RN, $nilaiy),
	  'v_Asset_no'=>$value->v_Asset_no,
		'v_Month'=>$nilaim,
		'n_StartWk'=>$nilaiwk,
		'v_Confirmation'=>'T',
		'v_HospitalCode'=>$this->session->userdata('hosp_code'),
		'd_Timestamp'=>date('Y-m-d H:i:s'),
		'v_Actionflag'=>'I',
		'd_StartDt'=>$nilaiy.'-'.$nilaim.'-'.$nilaid,
		//'d_DueDt'=>strftime('Y-m-d',$this->DateAdd('d', $ndue, DateTime::createFromFormat('Y-m-d',$nilaiy.'-'.$nilaim.'-'.$nilaid))),date(format,timestamp);
		'd_DueDt'=>date('Y-m-d', strtotime($nilaiy.'-'.$nilaim.'-'.$nilaid. ' +'.$ndue.' days')),
		'v_Wrkordstatus'=>'A',
		'v_jobtype'=>$value->v_JobType,
		'v_year'=>$nilaiy,
		'v_ServiceCode'=>$this->session->userdata('usersess'));
		//echo '<br> lalalalalallalalal';
		//print_r($insert_data);
		$this->load->model('insert_model');
		$this->insert_model->ins_schcon($insert_data,TRUE);
		$RN++;
		
		//print_r($value);
		//exit();
    //$value['ppm_no']=$sFormatP;
		$kumpulline[] = array("v_Asset_noe"=>$value->v_Asset_no, "v_asset_name"=>$value->v_asset_name, "v_JobType"=>$value->v_JobType, "v_user_dept_code"=>$value->v_user_dept_code, "v_location_code"=>$value->v_location_code, "wo"=>$insert_data['v_WrkOrdNo']);
		}
		else {
		//echo "<br>masuk klcc aaarrrr<br>";
		$kumpulline[] = array("v_Asset_noe"=>$value->v_Asset_no, "v_asset_name"=>$value->v_asset_name, "v_JobType"=>$value->v_JobType, "v_user_dept_code"=>$value->v_user_dept_code, "v_location_code"=>$value->v_location_code, "wo"=>$truker[0]->v_WrkOrdNo);
		//$data['ppm_wo']=$this->get_model->get_ppmgen($nilaiy,$this->session->userdata('hosp_code'),$nilaiwk);
		}
		//echo "<br>ini last";
		
		
		}
		$this->load->model('get_seqno');	
		$this->get_seqno->funcSaveAPBESYSNextSeqNo('P',$RN,$nilaiy);
		
		//$data['ppm_wo'][0]['ppm_no']=$sFormatP;
		//print_r($data['ppm_wo']);
		//echo '</br>nilai rn :'.$RN. 'format : '. $sFormat . 'sFormatP : '.$sFormatP;
		} 
		else{
		//echo "x masuk act";
		$data['y']= ($this->input->get('y') <> 0) ? $this->input->get('y') : 'NA';	
		$data['wk']= ($this->input->get('wk') <> 0) ?  $this->input->get('wk') : 'NA';
		$data['ppm_wo']=$this->get_model->get_ppmgen($nilaiy,$this->session->userdata('hosp_code'),$nilaiwk);
		foreach ($data['ppm_wo'] as $value) {
		//$this->load->model('get_model');
		$truker = $this->get_model->validate_schmon($nilaiwk, $this->session->userdata('hosp_code'), $nilaiy, $value->v_Asset_no,$value->v_JobType);
		if (count($truker) == 0) {
		//$kumpulline[] = array("v_Asset_noe"=>$value->v_Asset_no, "v_asset_name"=>$value->v_asset_name, "v_JobType"=>$value->v_JobType, "v_user_dept_code"=>$value->v_user_dept_code, "v_location_code"=>$value->v_location_code, "wo"=>"Not Generated");
		$kumpulline[] = array("v_Asset_noe"=>$value->v_tag_no, "v_asset_name"=>$value->v_asset_name, "v_JobType"=>$value->v_JobType, "v_user_dept_code"=>$value->v_user_dept_code, "v_location_code"=>$value->v_location_code, "wo"=>"Not Generated", "assetno"=>$value->v_Asset_no);
		}
		else {
		//echo "<br>masuk klcc aaarrrr<br>";
		//$kumpulline[] = array("v_Asset_noe"=>$value->v_Asset_no, "v_asset_name"=>$value->v_asset_name, "v_JobType"=>$value->v_JobType, "v_user_dept_code"=>$value->v_user_dept_code, "v_location_code"=>$value->v_location_code, "wo"=>$truker[0]->v_WrkOrdNo);
		$kumpulline[] = array("v_Asset_noe"=>$value->v_tag_no, "v_asset_name"=>$value->v_asset_name, "v_JobType"=>$value->v_JobType, "v_user_dept_code"=>$value->v_user_dept_code, "v_location_code"=>$value->v_location_code, "wo"=>$truker[0]->v_WrkOrdNo, "assetno"=>$value->v_Asset_no);
		//$data['ppm_wo']=$this->get_model->get_ppmgen($nilaiy,$this->session->userdata('hosp_code'),$nilaiwk);
		}
		}
		
		
		}
		 isset($kumpulline) ?  $data['ppm_list'] =$kumpulline : '';
		 
		//echo "<br>";
		//print_r($data['ppm_list']);
		//exit();
    $this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_wo_ppmgen_week", $data);
  }
	
	function get_year()
	{
	 	if (isset($_REQUEST['y'])) {
			 $theyear =  $_REQUEST["y"];
		} else {
			 $theyear = date("Y");
		}
			$fyear = $theyear + 1;
			$byear = $theyear - 1;
			
			if (isset($_REQUEST['wk'])) {
			 $thewk =  $_REQUEST["wk"];
		} else {
			 $thewk = date("Y");
		}
			$fwk = $thewk + 1;
			$bwk = $thewk - 1;
			
	  $year_data = array( 
		
		'theyear'=>$theyear,
		'fyear'=>$theyear + 1,
		'byear'=>$theyear - 1,
		'thewk'=>$thewk,
		'fwk'=>$thewk + 1,
		'bwk'=>$thewk - 1
		);
	return $year_data;
	}
	
	function DateAdd($interval, $number, $date) { 

    $date_time_array = getdate($date); 
    $hours = $date_time_array['hours']; 
    $minutes = $date_time_array['minutes']; 
    $seconds = $date_time_array['seconds']; 
    $month = $date_time_array['mon']; 
    $day = $date_time_array['mday']; 
    $year = $date_time_array['year']; 

    switch ($interval) { 
     
        case 'yyyy': 
            $year+=$number; 
            break; 
        case 'q': 
            $year+=($number*3); 
            break; 
        case 'm': 
            $month+=$number; 
            break; 
        case 'y': 
        case 'd': 
        case 'w': 
            $day+=$number; 
            break; 
        case 'ww': 
            $day+=($number*7); 
            break; 
        case 'h': 
            $hours+=$number; 
            break; 
        case 'n': 
            $minutes+=$number; 
            break; 
        case 's': 
            $seconds+=$number;  
            break;             
    } 
       $timestamp= mktime($hours,$minutes,$seconds,$month,$day,$year); 
    return $timestamp; 
}
		
}
?>