<?php
class Contentcontroller extends CI_Controller {


 		 function __construct(){
     	parent::__construct();
//echo 'ade1';
		$this->load->model('loginModel','',TRUE);
//echo 'ade2';
		$this->load->model('insert_model');
                //$this->load->model('test_ler');
//echo 'ade3';
		$this->load->library('session');
//echo 'ade4';
                $this->load->helper('pdf_helper');
		$this->is_logged_in();
//echo 'ade5';


	}




		function is_logged_in()
	{

		$is_logged_in = $this->session->userdata('v_UserName');

		if(!isset($is_logged_in) || $is_logged_in !=TRUE)
		redirect('logincontroller/index');
	}
/*
			function select()

	{

	  $this->load->model('insert_model');
 		$this->insert_model->audit_log('login');

		$url = $this->input->post('continue') ? $this->input->post('continue') : site_url('contentcontroller/select');
		$data['service_apa'] = $this->loginModel->validate3();
		$data['service_apa2'] = $this->loginModel->validateAP();
		$this->load->model('display_model');
		$Uid = $this->session->userdata('v_UserName');
		$data['records_desk'] = $this->display_model->img($Uid);

		//$file = $data['records_desk'][0]->file_name;
		//$this->session->set_userdata('p_picture',$file);
		$this->load->view('head');
		$this->load->view('content_choose', $data);

		if(!empty($_GET["hc"])){
     $this->session->set_userdata('hosp_code', $_GET["hc"]);
    if (count($data['service_apa']) > 1){
	  $url =site_url('contentcontroller/select');

			 }else {
        $url =site_url('contentcontroller/content/'.$data['service_apa'][0]->v_servicecode);

				}
	      redirect($url, 'refresh');

		 }

	}
*/



	function select()
	{

		$this->load->model('insert_model');
		$this->insert_model->audit_log('login');
		$url = $this->input->post('continue') ? $this->input->post('continue') : site_url('contentcontroller/select');
		$data['service_apa'] = $this->loginModel->validate3();//service
		$data['service_apa2'] = $this->loginModel->validateAP();//hospital
		$this->session->set_userdata("total_hosp", count($data["service_apa2"]));
		$this->session->set_userdata("total_service", count($data["service_apa"]));
		$total_hosp = count($data['service_apa2']);
		$total_service = count($data['service_apa']);
		$this->load->model('display_model');
		$Uid = $this->session->userdata('v_UserName');
		$data['records_desk'] = $this->display_model->img($Uid);
		//$file = $data['records_desk'][0]->file_name;
		//$this->session->set_userdata('p_picture',$file);
		// if ( !empty($_GET['continue']) && count($data['service_apa']) > 1 ){echo 123;die;
		// 	$url = site_url('contentcontroller/content/'.$data['service_apa'][0]->v_servicecode);
		// }
		$this->load->view('head');
		$this->load->view('left');
		$this->load->view('content_choose3', $data);
		//$this->load->view('content_choose2', $data);
		if(!empty($_GET["hc"])){
			$this->session->set_userdata('hosp_code', $_GET["hc"]);
			for($i=0;$i<count($data['service_apa2']);$i++){
				if( $data['service_apa2'][$i]->v_hospitalcode == $_GET['hc'] ){
					$this->session->set_userdata('hosp_name',$data['service_apa2'][$i]->v_HospitalName);
				}
			}

			if( $_GET["hc"]=="pilih" ){
				if ( $total_hosp > 1 ){
					$url = site_url('contentcontroller/select');
				}elseif ( $total_service > 1 ) {
					$url = site_url('contentcontroller/select');
				}else{
					$url = site_url('contentcontroller/content/'.$data['service_apa'][0]->v_servicecode);
				}
			}else{
				if( $total_service == 1 ){
					$url = site_url('contentcontroller/content/'.$data['service_apa'][0]->v_servicecode);
				}else{
					$url = site_url('contentcontroller/select');
				}
			}
			redirect($url, 'refresh');
		}

	}


	function do_upload(){
		$url = $this->input->post('continue') ? $this->input->post('continue') : site_url('contentcontroller/select');
		$config['upload_path'] = 'C:\inetpub\wwwroot\FEMSHospital_v3\uploadfile';
		//$config['upload_path'] = '/var/www/vhosts/camsis2.advancepact.com/httpdocs/uploadfile';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '5000';
		$config['max_width']  = 'auto';
		$config['max_height']  = 'auto';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())

		{
//echo 'masuk error';
//exit();
			$data['error'] = array($this->upload->display_errors());
			$data['service_apa'] = $this->loginModel->validate3();
			$this->load->view('head');
			$this->load->view('content_choose',$data);
		}
		else
		{
//echo 'masuk x error';
//exit();
			$data = array('upload_data' => $this->upload->data());
			$image = $data['upload_data'];
			$Uid = $this->session->userdata('v_UserName');
			$this->load->model('insert_model');
			$image_test = $this->insert_model->upload($image,'v_UserID',$Uid);
			//$file = $image['file_name'];
		    //$this->session->set_userdata('p_picture',$file);
			$this->load->model('display_model');
			$this->display_model->img($Uid);
			$data['records_desk'] = $this->display_model->img($Uid);
			$data['service_apa'] = $this->loginModel->validate3();
			//print_r($data);exit();
			$this->load->view('head');
			$this->load->view('content_choose',$data);
		}


	}

		function select_two()
	{

		$this->load->view('content_choose_user');
		$this->load->view('content_head');

	}

	function toArray($obj)
{
    $obj = (array) $obj;//cast to array, optional
    return $obj['path'];
}

		public function content ($servicecode){

      $this->load->model('get_model');
    $this->insert_model->audit_log('login service '.$servicecode);
       $access['autho'] = array();
   foreach ($this->get_model->mrin_authority() as $row)
   {
    $access['autho'][]=$row->Access;
   }
 //echo $servicecode;
 //exit();

		//$this->session->set_userdata('usersess',$servicecode);
    //$data['access_apa'] = $this->loginModel->accessr($servicecode);
		//$data['servnm'] = $this->loginModel->servicename($servicecode);
		$this->session->set_userdata('usersess',$servicecode);
		$data['access_apa'] = $this->loginModel->accessr($servicecode);
		$data['servnm'] = $this->loginModel->servicename($servicecode);
		$data['personaldet'] = $this->loginModel->personaldet();

		//print_r($data['personaldet']);
		//exit();
		$this->session->set_userdata('fullname',empty($data['personaldet'][0]->v_UserName) ? "" :  $data['personaldet'][0]->v_UserName);
		$this->session->set_userdata('Per_Code',empty($data['personaldet'][0]->v_PersonalCode) ? "" :  $data['personaldet'][0]->v_PersonalCode);
		//$this->session->set_userdata('Ser_Code',empty($data['personaldet'][0]->v_GroupID) ? "" :  $data['personaldet'][0]->v_GroupID );
		$this->session->set_userdata('designation',empty($data['personaldet'][0]->v_designation) ? "" :  $data['personaldet'][0]->v_designation );
		//$this->session->set_userdata('usersessn',empty($data['servnm'][0]->service_name) ? "" : $data['servnm'][0]->service_name);

		//echo 'alohabeb' . $data['servnm'][0]->service_name;
		$this->session->set_userdata('usersessn',$data['servnm'][0]->service_name);
		$this->load->model('display_model');
		//echo 'jdt:'.$data['access_apa'];
		$this->session->set_userdata('accessr',$data['access_apa']);
		function toArray($obj)
{
    $obj = (array) $obj;//cast to array, optional
    return $obj['path'];
}
    $idArray = array_map('toArray', $this->session->userdata('accessr'));


		//echo "nilai id : ".print_r($idArray);
		$access['chkers'] = $idArray;
		//echo "sblm".$msg."<br>lalalala : ".print_r($this->session->userdata('accessr')).$this->session->userdata('accessr')[0]->path;
		$Uid = $this->session->userdata('v_UserName');
		$data['records_desk'] = $this->display_model->img($Uid);
		$file = isset($data['records_desk'][0]->file_name) ? $data['records_desk'][0]->file_name : 'uploadfile/icon-user.png';
		$this->session->set_userdata('p_picture',$file);


	 if (in_array("contentcontroller/Schedule(main)", $idArray)) {
	 //echo "ade";
	 $url =site_url('contentcontroller/Schedule');

		//echo $url;
		//exit ();
			redirect($url, 'refresh');
	 }elseif (in_array("contentcontroller/PO(main)", $idArray)) {

	 //echo "ade";
	 $url =site_url('Procurement/e_request');

		//echo $url;
		//exit ();
			redirect($url, 'refresh');

	 }

		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_Modulas", $access);


	}
		public function Central(){
		function toArray($obj)
{
    $obj = (array) $obj;//cast to array, optional
    return $obj['path'];
}
    $idArray = array_map('toArray', $this->session->userdata('accessr'));

		//echo "nilai id : ".print_r($idArray);
		$data['chkers'] = $idArray;
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_Central", $data);

	}

		public function desk(){
		//$this ->load->view("head");
		//$this ->load->view("left");
		//$this ->load->view("Content_desk");
		//redirect('contentcontroller/workorder');
		//redirect('contentcontroller/desklist');
		$data['desk'] = ($this->input->get('desk') <> 0) ? $this->input->get('desk') : '0';
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$this->load->model("display_model");
		$data['records_desk'] = $this->display_model->list_complaint($data);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_desk",$data);
	}
		public function catalogppm(){
		$data['ppm'] = ($this->input->get('ppm') <> 0) ? $this->input->get('ppm') : '0';
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$this->load->model("display_model");
		$data['records_desk'] = $this->display_model->list_deskppm($data);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_catalog_ppm",$data);
	}
		public function report_workorder(){
		//$this->load->model("display_model");
		//$data['records_desk'] = $this->display_model->list_desk();
		$this ->load->view("head");
		$this ->load->view("left");
		//$this ->load->view("content_report_workorder",$data);
		$this ->load->view("content_report_workorder");
	}

		public function desklist (){
		$this->load->model("display_model");
		$this ->load->view("head");
		$data['records'] = $this->display_model->list_workorder();
		$this ->load->view("left");
		$this ->load->view("Content_desklist",$data);
	}
		public function deskresult(){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_deskresult");
	}
		public function deskupdate(){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_deskupdate");
	}





		function confirmation(){


		//$data['service_apa'] = $this->loginModel->validate3();
		$RN="RQ/A4/B01714/14";


		$insert_data = array(

		'V_servicecode'=>$this->session->userdata('usersess'),
		'V_requestor'=>$this->input->post('V_requestor'),
		'V_request_type'=>$this->input->post('V_request_type'),
		'D_date'=>$this->input->post('D_date'),
		'D_time'=>$this->input->post('D_time'),
		'V_MohDesg'=>$this->input->post('V_MohDesg'),
		'V_priority_code'=>$this->input->post('V_priority_code'),
		'V_summary'=>$this->input->post('V_summary'),
		'V_details'=>$this->input->post('V_details'),
		'V_Request_no'=>$RN,
		'V_User_dept_code'=>$this->input->post('V_User_dept_code'),
		'V_respon'=>$this->input->post('V_respon'),
		'V_Asset_no'=>$this->input->post('asset_no'),
		'v_respondate'=>$this->input->post('startdate'),
		'v_closeddate'=>$this->input->post('enddate'),
		'v_closedtime'=>$this->input->post('endtime'),
		'D_timestamp'=>$this->input->post('D_timestamp')
		//'V_requestor'=>$this->input->post('V_requestor')
		);
		$this->insert_model->create_form($insert_data,TRUE);

		// echo $this->db->last_query();
		//exit();

		redirect('contentcontroller/workorder');
		redirect('contentcontroller/desklist');

		}

		public function workorder(){
		$this->load->model("loginModel");
		//echo "nilai ghghghgh : " . $this->session->userdata('usersess') . "<br>";
		 if (($this->input->get('parent') == "desk") && ($this->input->get('utk') == "csr")) {
		 		if ($this->session->userdata('usersess') == "BES"){
				$this->session->set_userdata('usersess','FES');
				//echo "masuk cni : " . $this->session->userdata('usersess') . "<br>";
				$data['servnm'] = $this->loginModel->servicename('FES');
				$this->session->set_userdata('usersessn',$data['servnm'][0]->service_name);}
		 		elseif ($this->session->userdata('usersess') == "FES"){
				$this->session->set_userdata('usersess','HKS');
				$data['servnm'] = $this->loginModel->servicename('HKS');
				$this->session->set_userdata('usersessn',$data['servnm'][0]->service_name);}
		 		elseif ($this->session->userdata('usersess') == "HKS"){
				$this->session->set_userdata('usersess','BES');
				$data['servnm'] = $this->loginModel->servicename('BES');
				$this->session->set_userdata('usersessn',$data['servnm'][0]->service_name);}
		 }
		//$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		//$data['month']= ($this->input->get('m') <> 0) ? $this->input->get('m') : date("mm");
		$data['tabber'] = ($this->input->get('work-a') <> 0) ? $this->input->get('work-a') : '0';
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		//echo $data['year'].",".$data['month'];
		$this->load->model("display_model");
		//$data['r'] = $this->display_model->listworkorder();
		$data['records'] = $this->display_model->list_workorderx($data);
		//print_r($data['records']);
		//exit();
		$data['totalrec'] = count($data['records']);

		$s_open = 0;
		$s_close = 0;
		foreach($data['records'] as $row){
			if ($row->V_request_status == 'C'){
				$s_close += 1;
			}
			else{
				$s_open += 1;
			}
		}
		if($s_close > 0 && $s_open <= 0){
			$data['status'] = ': WO Close '.$s_close;
		}
		else if($s_open > 0 && $s_close <= 0){
			$data['status'] = ': WO Open '.$s_open;
		}
		else if($s_open > 0 && $s_close > 0){
			$data['status'] = ': WO Open '.$s_open.' : WO Close '.$s_close;
		}
		else{
			$data['status'] = '';
		}
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder",$data);
	  }

		public function workorderlist(){
		$data['wrk_ord'] = $this->input->get('wrk_ord');
		$this->load->model("display_model");
		$data['record'] = $this->display_model->request_tab($data['wrk_ord']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorderlist",$data);
	}
  public function workorderlist_update(){
  $data['wrk_ord'] = $this->input->get('wrk_ord');
  $this->load->model("get_model");
  $this ->load->view("head");
  $this ->load->view("left");
  $data['record'] = $this->get_model->request_update($data['wrk_ord']);
  $data['time'] = !empty($data['record']) ? explode(':',$data['record'][0]->D_time) : NULL;
  if($data['record'][0]->V_request_type == 'AP19'){
  $data['record'] = $this->get_model->request_updateAP19($data['wrk_ord']);
  $this ->load->view("Content_requestAP19",$data);
  }else{
  $this ->load->view("Content_workorderlist_update",$data);
      }
}
		public function workorderlist_confirm(){
		$data['wrk_ord'] = $this->input->post('wrk_ord');
		$this->load->model("get_model");
		$data['record'] = $this->get_model->request_update($data['wrk_ord']);
		$data['time'] = explode(':',$data['record'][0]->D_time);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorderlist_Comfirm",$data);
	}
		public function ppm_gen(){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_ppm_gen");
	}
		public function ppm_generator(){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_ppm_generator");
	}
		public function response(){
		$data['wrk_ord'] = $this->input->get('wrk_ord');
		$this->load->model("display_model");
		$this->load->model('get_model');
		$data['time'] = $this->get_model->response_update($data['wrk_ord']);
		$data['disp'] = $this->display_model->list_display($data['wrk_ord']);
		$data['record'] = $this->display_model->response_tab($data['wrk_ord']);
		if (isset($data['record'][0]->v_WrkOrdNo)){
		//total time response
			$time1 = strtotime($data['time'][0]->D_date);
    		$time2 = strtotime($data['time'][0]->d_Date);
    		$diff = $time2-$time1;
    		$min = $diff / 60;
    		if ($min < 60 ){
    		if ($min == 1){
    		$t_time = $min. ' minute';
    		$data['res_time'] = $t_time;
    		}
    		else{
    		$t_time = $min. ' minutes';
    		$data['res_time'] = $t_time;
    		}
    		}
    		else{
    		$bal_min = ($min%60);
    		$h_min = $min - $bal_min;
    		$hour = $h_min/60;
    		if ($hour == 1 && $bal_min == 1){
    		$t_time = $hour. ' hour ' .$bal_min. ' minute';
    		$data['res_time'] = $t_time;
    		}
    		else if ($hour == 1 && $bal_min > 1){
    		$t_time = $hour. ' hour ' .$bal_min. ' minutes';
    		$data['res_time'] = $t_time;
    		}
    		else{
    		$t_time = $hour. ' hours ' .$bal_min. ' minutes';
    		$data['res_time'] = $t_time;
    		}
    		}
		//time action completed
			$time1 = strtotime($data['time'][0]->v_Time);
    		$time2 = strtotime($data['time'][0]->v_Etime);
			$diff = $time2-$time1;
    		$tc_min = $diff / 60;
			if ($tc_min < 60 ){
    		if ($tc_min == 1){
    		$tc_time = $tc_min. ' minute';
    		$data['time_comp'] = $tc_time;
    		}
    		else{
    		$tc_time = $tc_min. ' minutes';
    		$data['time_comp'] = $tc_time;
    		}
    		}
    		else{
    		$bal_min = ($tc_min%60);
    		$h_min = $tc_min - $bal_min;
    		$hour = $h_min/60;
    		if ($hour == 1 && $bal_min == 1){
    		$tc_time = $hour. ' hour ' .$bal_min. ' minute';
    		$data['time_comp'] = $tc_time;
    		}
    		else if ($hour == 1 && $bal_min > 1){
    		$tc_time = $hour. ' hour ' .$bal_min. ' minutes';
    		$data['time_comp'] = $tc_time;
    		}
    		else{
    		$tc_time = $hour. ' hours ' .$bal_min. ' minutes';
    		$data['time_comp'] = $tc_time;
    		}
    		}
        	$data['P1time'] = explode(':',$data['record'][0]->n_Hours1);
		$data['P2time'] = explode(':',$data['record'][0]->n_Hours2);
		$data['P3time'] = explode(':',$data['record'][0]->n_Hours3);
		$data['P1personal'] = explode('-',$data['record'][0]->v_Personal1);
		$data['P2personal'] = explode('-',$data['record'][0]->v_Personal2);
		$data['P3personal'] = explode('-',$data['record'][0]->v_Personal3);
		$data['P1Rate'] = number_format($data['record'][0]->n_Rate1,2);
		$data['P2Rate'] = number_format($data['record'][0]->n_Rate2,2);
		$data['P3Rate'] = number_format($data['record'][0]->n_Rate3,2);
		$data['P1Trate'] = number_format($data['record'][0]->n_Total1,2);
		$data['P2Trate'] = number_format($data['record'][0]->n_Total2,2);
		$data['P3Trate'] = number_format($data['record'][0]->n_Total3,2);
		$data['Vendor'] = explode('-',$data['record'][0]->v_Vendor1);
		$data['VRM'] = number_format($data['record'][0]->n_vHours,2);
		$data['VTrate'] = number_format($data['record'][0]->n_vTotal,2);
		}
    		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_response",$data);
	}
		public function response_update(){
		$data['wrk_ord'] = $this->input->post('wrk_ord');
		$this->load->model("display_model");
		$data['disp'] = $this->display_model->list_display($data['wrk_ord']);
		$data['datetimereq'] = explode(' ',$data['disp'][0]->D_date);
		$data['timereq'] = explode(':',$data['datetimereq'][1]);
		$data['record'] = $this->display_model->response_tab($data['wrk_ord']);
		if (isset($data['record'][0]->v_WrkOrdNo)){
		$data['Stime'] = explode(':',$data['record'][0]->v_Time);
		$data['Etime'] = explode(':',$data['record'][0]->v_Etime);
		$data['P1time'] = explode(':',$data['record'][0]->n_Hours1);
		$data['P2time'] = explode(':',$data['record'][0]->n_Hours2);
		$data['P3time'] = explode(':',$data['record'][0]->n_Hours3);
		$data['P1personal'] = explode('-',$data['record'][0]->v_Personal1);
		$data['P2personal'] = explode('-',$data['record'][0]->v_Personal2);
		$data['P3personal'] = explode('-',$data['record'][0]->v_Personal3);
		$data['P1Rate'] = number_format($data['record'][0]->n_Rate1,2);
		$data['P2Rate'] = number_format($data['record'][0]->n_Rate2,2);
		$data['P3Rate'] = number_format($data['record'][0]->n_Rate3,2);
		$data['P1Trate'] = number_format($data['record'][0]->n_Total1,2);
		$data['P2Trate'] = number_format($data['record'][0]->n_Total2,2);
		$data['P3Trate'] = number_format($data['record'][0]->n_Total3,2);
		$data['Vendor'] = explode('-',$data['record'][0]->v_Vendor1);
		$data['VRM'] = number_format($data['record'][0]->n_vHours,2);
		$data['VTrate'] = number_format($data['record'][0]->n_vTotal,2);
		}
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_response_update",$data);
	}

		public function response_confirm(){
		$data['wrk_ord'] = $this->input->post('wrk_ord');
		$this->load->model("display_model");
		$data['disp'] = $this->display_model->list_display($data['wrk_ord']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_response_Confirm",$data);
	}
		public function visitone(){
		$data['wrk_ord'] = $this->input->get('wrk_ord');
		$this->load->model("display_model");
		if (substr($data['wrk_ord'],0,2) == 'PP'){
		$data['record'] = $this->display_model->visit1ppm_tab($data['wrk_ord']);
		}
		else{
		$data['recordcheck'] = $this->display_model->response_tab($data['wrk_ord']);
		$data['record'] = $this->display_model->visit1_tab($data['wrk_ord']);
		}
		if (isset($data['record'][0]->v_WrkOrdNo)){
			$time1 = strtotime($data['record'][0]->v_Time);
    		$time2 = strtotime($data['record'][0]->v_Etime);
			$diff = $time2-$time1;
    		$tc_min = $diff / 60;
			if ($tc_min < 60 ){
    		if ($tc_min == 1){
    		$tc_time = $tc_min. ' minute';
    		$data['time_comp'] = $tc_time;
    		}
    		else{
    		$tc_time = $tc_min. ' minutes';
    		$data['time_comp'] = $tc_time;
    		}
    		}
    		else{
    		$bal_min = ($tc_min%60);
    		$h_min = $tc_min - $bal_min;
    		$hour = $h_min/60;
    		if ($hour == 1 && $bal_min == 1){
    		$tc_time = $hour. ' hour ' .$bal_min. ' minute';
    		$data['time_comp'] = $tc_time;
    		}
    		else if ($hour == 1 && $bal_min > 1){
    		$tc_time = $hour. ' hour ' .$bal_min. ' minutes';
    		$data['time_comp'] = $tc_time;
    		}
    		else{
    		$tc_time = $hour. ' hours ' .$bal_min. ' minutes';
    		$data['time_comp'] = $tc_time;
    		}
    		}
		$data['Stime'] = explode(':',$data['record'][0]->v_Time);
		$data['Etime'] = explode(':',$data['record'][0]->v_Etime);
		$data['P1time'] = explode(':',$data['record'][0]->n_Hours1);
		$data['P2time'] = explode(':',$data['record'][0]->n_Hours2);
		$data['P3time'] = explode(':',$data['record'][0]->n_Hours3);
		$data['P1personal'] = explode('-',$data['record'][0]->v_Personal1);
		$data['P2personal'] = explode('-',$data['record'][0]->v_Personal2);
		$data['P3personal'] = explode('-',$data['record'][0]->v_Personal3);
		$data['P1Rate'] = number_format($data['record'][0]->n_Rate1,2);
		$data['P2Rate'] = number_format($data['record'][0]->n_Rate2,2);
		$data['P3Rate'] = number_format($data['record'][0]->n_Rate3,2);
		$data['P1Trate'] = number_format($data['record'][0]->n_Total1,2);
		$data['P2Trate'] = number_format($data['record'][0]->n_Total2,2);
		$data['P3Trate'] = number_format($data['record'][0]->n_Total3,2);
		$data['Vendor'] = explode('-',$data['record'][0]->v_Vendor1);
		$data['PartRM'] = number_format($data['record'][0]->n_PartRM,2);
		$data['PartTrate'] = number_format($data['record'][0]->n_PartTotal,2);
		}
		if (substr($data['wrk_ord'],0,2) == 'PP'){

		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_v1",$data);
		}
		else{

		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_VisitOne",$data);
		}
	}
		public function visitone_update(){
		$data['wrk_ord'] = $this->input->post('wrk_ord');
		$this->load->model("display_model");
		if (substr($data['wrk_ord'],0,2) == 'PP'){
		$data['record'] = $this->display_model->visit1ppm_tab($data['wrk_ord']);
		}
		else{
		$data['recordresp'] = $this->display_model->response_tab($data['wrk_ord']);
		$data['Stimeres'] = explode(':',$data['recordresp'][0]->v_Time);
		$data['record'] = $this->display_model->visit1_tab($data['wrk_ord']);
		}
		if (isset($data['record'][0]->v_WrkOrdNo)){
		$data['Stime'] = explode(':',$data['record'][0]->v_Time);
		$data['Etime'] = explode(':',$data['record'][0]->v_Etime);
		$data['P1time'] = explode(':',$data['record'][0]->n_Hours1);
		$data['P2time'] = explode(':',$data['record'][0]->n_Hours2);
		$data['P3time'] = explode(':',$data['record'][0]->n_Hours3);
		$data['P1personal'] = explode('-',$data['record'][0]->v_Personal1);
		$data['P2personal'] = explode('-',$data['record'][0]->v_Personal2);
		$data['P3personal'] = explode('-',$data['record'][0]->v_Personal3);
		$data['P1Rate'] = number_format($data['record'][0]->n_Rate1,2);
		$data['P2Rate'] = number_format($data['record'][0]->n_Rate2,2);
		$data['P3Rate'] = number_format($data['record'][0]->n_Rate3,2);
		$data['P1Trate'] = number_format($data['record'][0]->n_Total1,2);
		$data['P2Trate'] = number_format($data['record'][0]->n_Total2,2);
		$data['P3Trate'] = number_format($data['record'][0]->n_Total3,2);
		$data['Vendor'] = explode('-',$data['record'][0]->v_Vendor1);
		$data['PartRM'] = number_format($data['record'][0]->n_PartRM,2);
		$data['PartTrate'] = number_format($data['record'][0]->n_PartTotal,2);
		$data['rschReason'] = explode(':',$data['record'][0]->v_ReschReason);
		}
		if (substr($data['wrk_ord'],0,2) == 'PP'){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_v1_update",$data);
		}
		else{
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_VisitOne_update",$data);
		}
	}
		public function visitone_confirm(){
		$data['wrk_ord'] = $this->input->post('wrk_ord');
		if (substr($data['wrk_ord'],0,2) == 'PP'){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_v1_confirm");
		}
		else{
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_VisitOne_Confirm");
		}

	}
		public function visittwo(){
		$data['wrk_ord'] = $this->input->get('wrk_ord');
		$this->load->model("display_model");
		if (substr($data['wrk_ord'],0,2) == 'PP'){
		$data['recordcheck'] = $this->display_model->visit1ppm_tab($data['wrk_ord']);
		$data['record'] = $this->display_model->visit2ppm_tab($data['wrk_ord']);
		}
		else{
		$data['recordcheck'] = $this->display_model->visit1_tab($data['wrk_ord']);
		$data['record'] = $this->display_model->visit2_tab($data['wrk_ord']);
		}
		if (isset($data['record'][0]->v_WrkOrdNo)){
		$time1 = strtotime($data['record'][0]->v_Time);
    		$time2 = strtotime($data['record'][0]->v_Etime);
		$diff = $time2-$time1;
    		$tc_min = $diff / 60;
		if ($tc_min < 60 ){
    		if ($tc_min == 1){
    		$tc_time = $tc_min. ' minute';
    		$data['time_comp'] = $tc_time;
    		}
    		else{
    		$tc_time = $tc_min. ' minutes';
    		$data['time_comp'] = $tc_time;
    		}
    		}
    		else{
    		$bal_min = ($tc_min%60);
    		$h_min = $tc_min - $bal_min;
    		$hour = $h_min/60;
    		if ($hour == 1 && $bal_min == 1){
    		$tc_time = $hour. ' hour ' .$bal_min. ' minute';
    		$data['time_comp'] = $tc_time;
    		}
    		else if ($hour == 1 && $bal_min > 1){
    		$tc_time = $hour. ' hour ' .$bal_min. ' minutes';
    		$data['time_comp'] = $tc_time;
    		}
    		else{
    		$tc_time = $hour. ' hours ' .$bal_min. ' minutes';
    		$data['time_comp'] = $tc_time;
    		}
    		}
		$data['Stime'] = explode(':',$data['record'][0]->v_Time);
		$data['Etime'] = explode(':',$data['record'][0]->v_Etime);
		$data['P1time'] = explode(':',$data['record'][0]->n_Hours1);
		$data['P2time'] = explode(':',$data['record'][0]->n_Hours2);
		$data['P3time'] = explode(':',$data['record'][0]->n_Hours3);
		$data['P1personal'] = explode('-',$data['record'][0]->v_Personal1);
		$data['P2personal'] = explode('-',$data['record'][0]->v_Personal2);
		$data['P3personal'] = explode('-',$data['record'][0]->v_Personal3);
		$data['P1Rate'] = number_format($data['record'][0]->n_Rate1,2);
		$data['P2Rate'] = number_format($data['record'][0]->n_Rate2,2);
		$data['P3Rate'] = number_format($data['record'][0]->n_Rate3,2);
		$data['P1Trate'] = number_format($data['record'][0]->n_Total1,2);
		$data['P2Trate'] = number_format($data['record'][0]->n_Total2,2);
		$data['P3Trate'] = number_format($data['record'][0]->n_Total3,2);
		$data['Vendor'] = explode('-',$data['record'][0]->v_Vendor1);
		$data['PartRM'] = number_format($data['record'][0]->n_PartRM,2);
		$data['PartTrate'] = number_format($data['record'][0]->n_PartTotal,2);
		}
		if (substr($data['wrk_ord'],0,2) == 'PP'){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_v2",$data);
		}
		else{
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_Visittwo",$data);
		}
	}

	public function confirmReg (){
	  // load libraries for URL and form processing
		$data['assetno'] = $this->input->get('assetno');
    $this->load->helper(array('form', 'url'));
    // load library for form validation
    $this->load->library('form_validation');
    $this->form_validation->set_rules('a_group','Asset Group','trim|required');
    if($this->form_validation->run()==FALSE)
		{
			$this->load->model("get_model");
			$data['asset_det'] = $this->get_model->get_assetdet2($data['assetno']);
			$data['asset_map'] = $this->get_model->get_assetmap($data['asset_det'][0]->V_Equip_code);
			$data['loc'] = $this->get_model->get_deptloclist($data['asset_det'][0]->V_User_Dept_code, $data['asset_det'][0]->V_Location_code);
			$this ->load->view("head");
			$this ->load->view("left");
			$this ->load->view("Update_Reg", $data);
		}
		else{
			$this ->load->view("head");
			$this ->load->view("left");
			$this ->load->view("Update_Reg_Confirm", $data);
		}
	  //echo "nilai post : ".$this->input->post('password');
		//$this->form_validation->set_rules('n_username','*Equipment Code','trim|required');
		//if($this->form_validation->run()==FALSE)
		//{echo 'no';}else {echo 'yes';}
		//exit();

	}

	public function confirmRegsv (){

	  $insert_data = array(
					//'D_Register_date'=>$this->input->post('n_registered_date'),
					'D_Register_date'=>date('y-m-d',strtotime($this->input->post('n_registered_date'))),
					'V_User_Dept_code'=>$this->input->post('n_user_department'),
					'V_Location_code'=>$this->input->post('n_location'),
					'v_asset_grp'=>$this->input->post('a_group'),
					//'V_Asset_no'=>$this->input->post('n_asset_number'),
					'V_Asset_no'=>$this->input->get('assetno'),
					'V_Timestamp'=>date('Y-m-d H:i:s'),
					'V_Actionflag'=>'U'
		);
		$this->load->model('update_model');
		$this->update_model->update_pmis2_egm_assetregistration($insert_data);

		$insert_data = array(
					'v_username'=>$this->input->post('n_username'),
					'd_Timestamp'=>date('Y-m-d H:i:s'),
					//'V_Asset_no'=>$this->input->post('n_asset_number'),
					'V_Asset_no'=>$this->input->get('assetno'),
					'V_Actionflag'=>'U'
		);
		$this->update_model->update_pmis2_egm_assetreg_general($insert_data);
		//exit();
		//redirect('contentcontroller/assetupdate?asstno='.$this->input->post('n_asset_number'));
		redirect('contentcontroller/assetupdate?asstno='.$this->input->get('assetno').'&tab=0&parent=assets');

	}

	public function confirmcom (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Update_commet_Confirm");
	}

	public function confirmcomsv (){

		$insert_data = array(
					'V_Misc_details'=>$this->input->post('n_comments'),
					'd_Timestamp'=>date('Y-m-d H:i:s'),
					'V_Asset_no'=>$this->input->post('n_asset_number'),
					'V_Actionflag'=>'U'
		);
		$this->load->model('update_model');
		$this->update_model->update_pmis2_egm_assetreg_general($insert_data);
		//exit();
		//redirect('contentcontroller/assetupdate?asstno='.$this->input->post('n_asset_number'));
		redirect('contentcontroller/assetupdate?asstno='.$this->input->post('n_asset_number').'&tab=0&parent=assets');
	}

	public function confirmspec (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Update_specification_Confirm");
	}

	public function confirmspecsv (){
		 $insert_data = array(
					'v_make'=>$this->input->post('n_make'),
					'V_Manufacturer'=>$this->input->post('n_manufacturer'),
					'V_Brandname'=>$this->input->post('n_brand'),
					'V_Model_no'=>$this->input->post('n_model'),
					'V_Serial_no'=>$this->input->post('n_serial_no'),
					'V_Asset_no'=>$this->input->post('n_asset_number'),
					'V_Timestamp'=>date('Y-m-d H:i:s'),
					'V_Actionflag'=>'U'
		);
		$this->load->model('update_model');
		$this->update_model->update_pmis2_egm_assetregistration($insert_data);

		$insert_data = array(
					'V_capacityunit'=>$this->input->post('fCapacityUnit'),
					'v_Capacity'=>$this->input->post('n_capacity'),
					'V_Depreciation'=>$this->input->post('n_depreciation'),
					'V_Lifespan'=>$this->input->post('n_life_span'),
					'V_Oper_Hr_code'=>$this->input->post('n_op_hours'),
					'V_Mnl_Draw_no'=>$this->input->post('n_manual'),
					'V_Procedure_code'=>$this->input->post('n_procedure_code'),
					'd_Timestamp'=>date('Y-m-d H:i:s'),
					'V_Asset_no'=>$this->input->post('n_asset_number'),
					'V_Actionflag'=>'U'
		);
		$this->update_model->update_pmis2_egm_assetreg_general($insert_data);
		//exit();
		//redirect('contentcontroller/assetupdate?asstno='.$this->input->post('n_asset_number'));
		redirect('contentcontroller/assetupdate?asstno='.$this->input->post('n_asset_number').'&tab=0&parent=assets');
	}

	public function confirmacqu (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Update_Acquisition_Confirm");
	}

	public function confirmacqusv (){

		$this->load->model('update_model');

		$insert_data = array(
					'V_Vendor_code'=>$this->input->post('n_supplier'),
					'V_Agent'=>$this->input->post('n_agent'),
					'V_File_Ref_no'=>$this->input->post('n_file_ref'),
					'N_Cost'=>$this->input->post('n_cost'),
					'V_PO_no'=>$this->input->post('n_lpo_no'),
					'V_PO_date'=>date('Y-m-d',strtotime($this->input->post('n_supply_dt'))),
					'd_Timestamp'=>date('Y-m-d H:i:s'),
					'V_Asset_no'=>$this->input->post('n_asset_number'),
					'V_Actionflag'=>'U'
		);
		$this->update_model->update_pmis2_egm_assetreg_general($insert_data);

		$insert_data = array(
					'vvfpurchasecost'=>$this->input->post('n_cost'),
					'vvfTimestamp'=>date('Y-m-d H:i:s'),
					'vvfassetno'=>$this->input->post('n_asset_number'),
					'vvfActionflag'=>'U'
		);
		$this->update_model->update_ap_VO_VVFDetails($insert_data);
		//exit();
		//redirect('contentcontroller/assetupdate?asstno='.$this->input->post('n_asset_number'));
		redirect('contentcontroller/assetupdate?asstno='.$this->input->post('n_asset_number').'&tab=0&parent=assets');
	}

	public function confirmcommissioning (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Update_Commissioning_Confirm");
	}

	public function confirmcommissioningsv (){
		$insert_data = array(
					'v_tc_request_no'=>$this->input->post('n_tnc_num'),
					'V_Asset_WG_code'=>$this->input->post('n_assetwgcode'),
					'V_Asset_no'=>$this->input->post('n_asset_number'),
					'V_Timestamp'=>date('Y-m-d H:i:s'),
					'V_Actionflag'=>'U'
		);
		$this->load->model('update_model');
		$this->update_model->update_pmis2_egm_assetregistration($insert_data);

		$insert_data = array(
					//'V_capacityunit'=>$this->input->post('n_capacity'),
					//'D_commission'=>$this->input->post('n_commdt'),
					//'V_Wrn_end_code'=>$this->input->post('n_warrenddt'),
					'D_commission'=>date('y-m-d',strtotime($this->input->post('n_commdt'))),
					'V_Wrn_end_code'=>date('y-m-d',strtotime($this->input->post('n_warrenddt'))),
					'V_TC_form_no'=>$this->input->post('n_technical_rpt'),
					'V_Job_Type_code'=>$this->input->post('n_job_type_code'),
					'v_ContractCode'=>$this->input->post('n_contract_code'),
					'd_Timestamp'=>date('Y-m-d H:i:s'),
					'V_Asset_no'=>$this->input->post('n_asset_number'),
					'V_Actionflag'=>'U'
		);
		$this->update_model->update_pmis2_egm_assetreg_general($insert_data);
		//exit();
		//redirect('contentcontroller/assetupdate?asstno='.$this->input->post('n_asset_number'));
		redirect('contentcontroller/assetupdate?asstno='.$this->input->post('n_asset_number').'&tab=0&parent=assets');

	}

	public function confirmmaintenance (){
		$data['assetno'] = $this->input->get('assetno');
		$this->load->model("get_model");

		$data['asset_det'] = $this->get_model->get_assetdet2($data['assetno']);
		$data['asset_UMDNS'] = $this->get_model->get_UMDNSAsset($data['asset_det'][0]->V_Equip_code);

		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Update_Maintenance_Confirm",$data);
	}

	public function confirmmaintenancesv (){
		//echo 'masuk saver';
	//exit();
		$insert_data = array(
					'v_AssetCondition'=>$this->input->post('n_asset_condition'),
					'v_AssetVStatus'=>$this->input->post('n_variation_status'),
					'v_AssetStatus'=>$this->input->post('n_asset_status'),
					'V_Assetno'=>$this->input->post('n_asset_number'),
					'v_assettypecode'=>$this->input->post('n_asset_class'),
					'v_safetytest'=>$this->input->post('n_safety_test'),
					'v_criticality'=>$this->input->post('n_criticality'),
					'v_checklistcode'=>$this->input->post('n_chklistcd'),
					'v_sparelistcode'=>$this->input->post('n_sparelist'),
					'd_Timestamp'=>date('Y-m-d H:i:s'),
					'V_Actionflag'=>'U'
		);
		//print_r($insert_data);
		//exit();
		$this->load->model('update_model');
		$this->update_model->assetmaintenance_form($insert_data);

		$insert_data = array(
					//'V_capacityunit'=>$this->input->post('n_capacity'),
					'v_spareslistcode'=>$this->input->post('n_sparelist'),
					'd_Timestamp'=>date('Y-m-d H:i:s'),
					'V_Asset_no'=>$this->input->post('n_asset_number'),
					'V_Actionflag'=>'U'
		);
		$this->update_model->update_pmis2_egm_assetreg_general($insert_data);
		//print_r($insert_data);
		//exit();

		$insert_data = array(
					//'V_capacityunit'=>$this->input->post('n_capacity'),
					'vvfReportNo'=>$this->input->post('n_sparelist'),
					'vvfRefNo'=>date('Y-m-d H:i:s'),
					'vvfHospitalCode'=>date('Y-m-d H:i:s'),
					'vvfDept'=>date('Y-m-d H:i:s'),
					'vvfAssetNo'=>date('Y-m-d H:i:s'),
					'vvfAssetTagNo'=>date('Y-m-d H:i:s'),
					'vvfAssetType'=>date('Y-m-d H:i:s'),
					'vvfAssetDesc'=>date('Y-m-d H:i:s'),
					'vvfMfg'=>date('Y-m-d H:i:s'),
					'vvfModel'=>date('Y-m-d H:i:s'),
					'vvfPurchaseCost'=>date('Y-m-d H:i:s'),
					'vvfVStatus'=>date('Y-m-d H:i:s'),
					'vvfDateComm'=>date('Y-m-d H:i:s'),
					'vvfDateStart'=>date('Y-m-d H:i:s'),
					'vvfDateStart'=>date('Y-m-d H:i:s'),
					'vvfDateStart'=>date('Y-m-d H:i:s'),
					'vvfDateStart'=>date('Y-m-d H:i:s'),
					'vvfDateStart'=>date('Y-m-d H:i:s'),
					'd_Timestamp'=>date('Y-m-d H:i:s'),
					'V_Asset_no'=>$this->input->post('n_asset_number'),
					'V_Actionflag'=>'U'
		);
		/*
		INSERT apbesysex..ap_vo_vvfdetails
			(vvfReportNo,		vvfRefNo,		vvfHospitalCode,
			vvfDept,		vvfAssetNo,		vvfAssetTagNo,
			vvfAssetType,		vvfAssetDesc,		vvfMfg,
			vvfModel,		vvfPurchaseCost,	vvfVStatus,
			vvfDateComm,		vvfDateStart,		vvfDateStop,
			vvfDateWarrantyEnd,	vvfAssetLockedDate,	vvfAssetLockedStatus,
			vvfAssetLockedBy,	vvfAuthorizedDate,	vvfAuthorizedStatus,
			vvfAuthorizedBy,	vvfActionflag,		vvfTimestamp,
			vvfSubmissionDate,	vvfRateDW,		vvfRatePW,
			vvfFeeDW,     		vvfFeePW,		vvfHQRemarksDate,
			vvfHQRemarks)
		VALUES
			(@ReportNo,		@RefNo,					@HospitalCode,
			@Dept,			UPPER(@HospitalCode + '-' + @AssetNo),	@AssetTagNo,
			@AssetType,		@AssetDesc,					@Mfg,
			@Model,		@PurchaseCost,				@VStatus,
			@DateComm,		@DateStart,					@DateStop,
			@DateWarrantyEnd,	@AssetLockedDate,				@AssetLockedStatus,
			@AssetLockedBy,	@AuthorizedDate,				@AuthorizedStatus,
			@AuthorizedBy,		@Actionflag,					@Timestamp,
			@SubmissionDate,	@RateDW,					@RatePW,
			@FeeDW,     		@FeePW,					@HQRemarksDate,
			@HQRemarks)
		*/



		//redirect('contentcontroller/assetupdate?asstno='.$this->input->post('n_asset_number'));
		redirect('contentcontroller/assetupdate?asstno='.$this->input->post('n_asset_number').'&tab=0&parent=assets');
	}

		public function visittwo_update(){
		$data['wrk_ord'] = $this->input->post('wrk_ord');
		$this->load->model("display_model");
		if (substr($data['wrk_ord'],0,2) == 'PP'){
		$data['record'] = $this->display_model->visit2ppm_tab($data['wrk_ord']);
		}
		else{
		$data['record'] = $this->display_model->visit2_tab($data['wrk_ord']);
		}
		if (isset($data['record'][0]->v_WrkOrdNo)){
		$data['Stime'] = explode(':',$data['record'][0]->v_Time);
		$data['Etime'] = explode(':',$data['record'][0]->v_Etime);
		$data['P1time'] = explode(':',$data['record'][0]->n_Hours1);
		$data['P2time'] = explode(':',$data['record'][0]->n_Hours2);
		$data['P3time'] = explode(':',$data['record'][0]->n_Hours3);
		$data['P1personal'] = explode('-',$data['record'][0]->v_Personal1);
		$data['P2personal'] = explode('-',$data['record'][0]->v_Personal2);
		$data['P3personal'] = explode('-',$data['record'][0]->v_Personal3);
		$data['P1Rate'] = number_format($data['record'][0]->n_Rate1,2);
		$data['P2Rate'] = number_format($data['record'][0]->n_Rate2,2);
		$data['P3Rate'] = number_format($data['record'][0]->n_Rate3,2);
		$data['P1Trate'] = number_format($data['record'][0]->n_Total1,2);
		$data['P2Trate'] = number_format($data['record'][0]->n_Total2,2);
		$data['P3Trate'] = number_format($data['record'][0]->n_Total3,2);
		$data['Vendor'] = explode('-',$data['record'][0]->v_Vendor1);
		$data['PartRM'] = number_format($data['record'][0]->n_PartRM,2);
		$data['PartTrate'] = number_format($data['record'][0]->n_PartTotal,2);
		$data['rschReason'] = explode(':',$data['record'][0]->v_Reschreason);
		}
		if (substr($data['wrk_ord'],0,2) == 'PP'){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_v2_update",$data);
		}
		else{
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_Visittwo_update",$data);
		}
	}
		public function visittwo_confirm(){
		$data['wrk_ord'] = $this->input->post('wrk_ord');
		if (substr($data['wrk_ord'],0,2) == 'PP'){
		$this->load->model("display_model");
		$data['record'] = $this->display_model->visit2ppm_tab($data['wrk_ord']);
		$this ->load->view("head");
		$this ->load->view("left_workorder");
		$this ->load->view("Content_v2_confirm",$data);
		}
		else{
		$this->load->model("display_model");
		$data['record'] = $this->display_model->visit2_tab($data['wrk_ord']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_Visittwo_Confirm",$data);
		}
	}
		public function visitthree(){
		$data['wrk_ord'] = $this->input->get('wrk_ord');
		$this->load->model("display_model");
		if (substr($data['wrk_ord'],0,2) == 'PP'){
		$data['recordcheck'] = $this->display_model->visit2ppm_tab($data['wrk_ord']);
		$data['record'] = $this->display_model->visit3ppm_tab($data['wrk_ord']);
		}
		else{
		$data['recordcheck'] = $this->display_model->visit2_tab($data['wrk_ord']);
		$data['record'] = $this->display_model->visit3_tab($data['wrk_ord']);
		}
		if (isset($data['record'][0]->v_WrkOrdNo)){
			$time1 = strtotime($data['record'][0]->v_Time);
    		$time2 = strtotime($data['record'][0]->v_Etime);
			$diff = $time2-$time1;
    		$tc_min = $diff / 60;
			if ($tc_min < 60 ){
    		if ($tc_min == 1){
    		$tc_time = $tc_min. ' minute';
    		$data['time_comp'] = $tc_time;
    		}
    		else{
    		$tc_time = $tc_min. ' minutes';
    		$data['time_comp'] = $tc_time;
    		}
    		}
    		else{
    		$bal_min = ($tc_min%60);
    		$h_min = $tc_min - $bal_min;
    		$hour = $h_min/60;
    		if ($hour == 1 && $bal_min == 1){
    		$tc_time = $hour. ' hour ' .$bal_min. ' minute';
    		$data['time_comp'] = $tc_time;
    		}
    		else if ($hour == 1 && $bal_min > 1){
    		$tc_time = $hour. ' hour ' .$bal_min. ' minutes';
    		$data['time_comp'] = $tc_time;
    		}
    		else{
    		$tc_time = $hour. ' hours ' .$bal_min. ' minutes';
    		$data['time_comp'] = $tc_time;
    		}
    		}
		$data['Stime'] = explode(':',$data['record'][0]->v_Time);
		$data['Etime'] = explode(':',$data['record'][0]->v_Etime);
		$data['P1time'] = explode(':',$data['record'][0]->n_Hours1);
		$data['P2time'] = explode(':',$data['record'][0]->n_Hours2);
		$data['P3time'] = explode(':',$data['record'][0]->n_Hours3);
		$data['P1personal'] = explode('-',$data['record'][0]->v_Personal1);
		$data['P2personal'] = explode('-',$data['record'][0]->v_Personal2);
		$data['P3personal'] = explode('-',$data['record'][0]->v_Personal3);
		$data['P1Rate'] = number_format($data['record'][0]->n_Rate1,2);
		$data['P2Rate'] = number_format($data['record'][0]->n_Rate2,2);
		$data['P3Rate'] = number_format($data['record'][0]->n_Rate3,2);
		$data['P1Trate'] = number_format($data['record'][0]->n_Total1,2);
		$data['P2Trate'] = number_format($data['record'][0]->n_Total2,2);
		$data['P3Trate'] = number_format($data['record'][0]->n_Total3,2);
		$data['Vendor'] = explode('-',$data['record'][0]->v_Vendor1);
		$data['PartRM'] = number_format($data['record'][0]->n_PartRM,2);
		$data['PartTrate'] = number_format($data['record'][0]->n_PartTotal,2);
		}
		if (substr($data['wrk_ord'],0,2) == 'PP'){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_v3",$data);
		}
		else{
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_Visitthree",$data);
		}

	}
		public function visitthree_update(){
		$data['wrk_ord'] = $this->input->post('wrk_ord');
		$this->load->model("display_model");
		if (substr($data['wrk_ord'],0,2) == 'PP'){
		$data['record'] = $this->display_model->visit3ppm_tab($data['wrk_ord']);
		}
		else{
		$data['record'] = $this->display_model->visit3_tab($data['wrk_ord']);
		}
		if (isset($data['record'][0]->v_WrkOrdNo)){
		$data['Stime'] = explode(':',$data['record'][0]->v_Time);
		$data['Etime'] = explode(':',$data['record'][0]->v_Etime);
		$data['P1time'] = explode(':',$data['record'][0]->n_Hours1);
		$data['P2time'] = explode(':',$data['record'][0]->n_Hours2);
		$data['P3time'] = explode(':',$data['record'][0]->n_Hours3);
		$data['P1personal'] = explode('-',$data['record'][0]->v_Personal1);
		$data['P2personal'] = explode('-',$data['record'][0]->v_Personal2);
		$data['P3personal'] = explode('-',$data['record'][0]->v_Personal3);
		$data['P1Rate'] = number_format($data['record'][0]->n_Rate1,2);
		$data['P2Rate'] = number_format($data['record'][0]->n_Rate2,2);
		$data['P3Rate'] = number_format($data['record'][0]->n_Rate3,2);
		$data['P1Trate'] = number_format($data['record'][0]->n_Total1,2);
		$data['P2Trate'] = number_format($data['record'][0]->n_Total2,2);
		$data['P3Trate'] = number_format($data['record'][0]->n_Total3,2);
		$data['Vendor'] = explode('-',$data['record'][0]->v_Vendor1);
		$data['PartRM'] = number_format($data['record'][0]->n_PartRM,2);
		$data['PartTrate'] = number_format($data['record'][0]->n_PartTotal,2);
		$data['rschReason'] = explode(':',$data['record'][0]->v_Reschreason);
		}
		if (substr($data['wrk_ord'],0,2) == 'PP'){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_v3_update",$data);
		}
		else{
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_Visitthree_update",$data);
		}

	}
		public function visitthree_confirm(){
		$data['wrk_ord'] = $this->input->post('wrk_ord');
		if (substr($data['wrk_ord'],0,2) == 'PP'){
		$this->load->model("display_model");
		$data['record'] = $this->display_model->visit3ppm_tab($data['wrk_ord']);
		$this ->load->view("head");
		$this ->load->view("left_workorder");
		$this ->load->view("Content_v3_confirm",$data);
		}
		else{
		$this->load->model("display_model");
		$data['record'] = $this->display_model->visit3_tab($data['wrk_ord']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_Visitthree_Confirm",$data);
		}

	}
		public function personnelinvolved(){
		$data['wrk_ord'] = $this->input->get('wrk_ord');
		$this->load->model('display_model');
		if (substr($data['wrk_ord'],0,2) == 'PP'){
		$data['rvisit1'] = $this->display_model->visit1ppm_tab($data['wrk_ord']);
		//$data['rvisit2'] = $this->display_model->visit2ppm_tab($data['wrk_ord']);
		//$data['rvisit3'] = $this->display_model->visit3ppm_tab($data['wrk_ord']);
		}
		else{
		$data['rpersonnel'] = $this->display_model->response_tab($data['wrk_ord']);
		$data['rvisit1'] = $this->display_model->visit1_tab($data['wrk_ord']);
		//$data['rvisit2'] = $this->display_model->visit2_tab($data['wrk_ord']);
		//$data['rvisit3'] = $this->display_model->visit3_tab($data['wrk_ord']);
		}

		if (isset($data['rpersonnel'][0]->v_WrkOrdNo)){
		$data['P1personnel'] = explode('-',$data['rpersonnel'][0]->v_Personal1);
		$data['P2personnel'] = explode('-',$data['rpersonnel'][0]->v_Personal2);
		$data['P3personnel'] = explode('-',$data['rpersonnel'][0]->v_Personal3);
		$data['P1ptime'] = explode(':',$data['rpersonnel'][0]->n_Hours1);
		$data['P2ptime'] = explode(':',$data['rpersonnel'][0]->n_Hours2);
		$data['P3ptime'] = explode(':',$data['rpersonnel'][0]->n_Hours3);
		$data['P1pRate'] = number_format($data['rpersonnel'][0]->n_Rate1,2);
		$data['P2pRate'] = number_format($data['rpersonnel'][0]->n_Rate2,2);
		$data['P3pRate'] = number_format($data['rpersonnel'][0]->n_Rate3,2);
		$data['P1pTrate'] = number_format($data['rpersonnel'][0]->n_Total1,2);
		$data['P2pTrate'] = number_format($data['rpersonnel'][0]->n_Total2,2);
		$data['P3pTrate'] = number_format($data['rpersonnel'][0]->n_Total3,2);
		}
			$Trate1 = 0;
			$Trate2 = 0;
			$Trate3 = 0;
		if (substr($data['wrk_ord'],0,2) == 'PP'){
		foreach ($data['rvisit1'] as $row){
			$data['P1TrateV'.$row->n_Visit] = number_format($row->n_Total1,2);
			$data['P2TrateV'.$row->n_Visit] = number_format($row->n_Total2,2);
			$data['P3TrateV'.$row->n_Visit] = number_format($row->n_Total3,2);

			$Trate1 += $data['P1TrateV'.$row->n_Visit];
			$Trate2 += $data['P2TrateV'.$row->n_Visit];
			$Trate3 += $data['P3TrateV'.$row->n_Visit];

			$data['TRate'] = $Trate1 + $Trate2 + $Trate3;
		}
		$data['TotalRate'] = number_format(isset($data['TRate']) ? $data['TRate'] : 0 ,2);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_PI",$data);
		}
		else{
		foreach($data['rvisit1'] as $row){
			$data['P1TrateV'.$row->n_Visit] = number_format($row->n_Total1,2);
			$data['P2TrateV'.$row->n_Visit] = number_format($row->n_Total2,2);
			$data['P3TrateV'.$row->n_Visit] = number_format($row->n_Total3,2);

			$Trate1 += $data['P1TrateV'.$row->n_Visit];
			$Trate2 += $data['P2TrateV'.$row->n_Visit];
			$Trate3 += $data['P3TrateV'.$row->n_Visit];
		}
		$data['TRate'] = (isset($data['P1pTrate']) ? $data['P1pTrate'] : 0) + (isset($data['P2pTrate']) ? $data['P2pTrate'] : 0) + (isset($data['P3pTrate']) ? $data['P3pTrate'] : 0) +
						 $Trate1 + $Trate2 + $Trate3;
		$data['TotalRate'] = number_format(isset($data['TRate']) ? $data['TRate'] : 0 ,2);
		//echo $data['TotalRate'];
		//exit();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_personnelinvolved",$data);
		}
	}
		public function jobclose(){
		$data['wrk_ord'] = $this->input->get('wrk_ord');
		$this->load->model("display_model");
		$data['recordcheck'] = $this->display_model->response_tab($data['wrk_ord']);
		$data['record'] = $this->display_model->jobclose_tab($data['wrk_ord']);
		//print_r($data['record']);
		//exit();
		$data['recordppm'] = $this->display_model->jobclose_ppm($data['wrk_ord']);
		$data['disp'] = $this->display_model->list_display($data['wrk_ord']);
		$data['ppmrec'] = $this->display_model->woppm_disp($data['wrk_ord']);
		$data['Visit1'] = $this->display_model->visit1_tab($data['wrk_ord']);
		$data['Visit2'] = $this->display_model->visit2_tab($data['wrk_ord']);
		$data['Visit3'] = $this->display_model->visit3_tab($data['wrk_ord']);
		$data['Visit1ppm'] = $this->display_model->visit1ppm_tab($data['wrk_ord']);
		$data['Visit2ppm'] = $this->display_model->visit2ppm_tab($data['wrk_ord']);
		$data['Visit3ppm'] = $this->display_model->visit3ppm_tab($data['wrk_ord']);
		//print_r($data['record']);
		//$data['P1personal'][0] = $data['record'][0]->v_PersonalCode;
		//$data['P1personal'][1] = $data['record'][0]->v_PersonalName;
		$data['P1personal'] = isset($data['record'][0]->userr) ? explode('-',$data['record'][0]->userr) : "";
		$data['PPPMpersonal'] = isset($data['recordppm'][0]->userr) ? explode('-',$data['recordppm'][0]->userr) : "";
		//PPM
		if (substr($data['wrk_ord'],0,2) == 'PP'){
		$data['d_date'] = (isset($data['ppmrec'][0]->d_StartDt) ? $data['ppmrec'][0]->d_StartDt : NULL);
		$data['duedate'] = (isset($data['ppmrec'][0]->d_DueDt) ? $data['ppmrec'][0]->d_DueDt : NULL);

		if (isset($data['recordppm'][0]->v_Wrkordno)){
		//visit1
			if (isset($data['Visit1ppm'][0]->v_WrkOrdNo)){
			$V1time1 = strtotime($data['Visit1ppm'][0]->v_Time);
    		$V1time2 = strtotime($data['Visit1ppm'][0]->v_Etime);
			$V1diff = $V1time2-$V1time1;
    		$V1tc_min = $V1diff / 60;
			if ($V1tc_min < 60 ){
    		$V1tc_time = $V1tc_min. ' min';
    		$data['time_comp1'] = $V1tc_time;
    		}
    		else{
    		$bal_min = ($V1tc_min%60);
    		$h_min = $V1tc_min - $bal_min;
    		$hour = $h_min/60;
    		$V1tc_time = $hour. ' hr ' .$bal_min. ' min';
    		$data['time_comp1'] = $V1tc_time;
    		}
    		}
    		else{
    		$V1tc_min = 0;
    		}
    	//visit2
    		if (isset($data['Visit2ppm'][0]->v_WrkOrdNo)){
			$V2time1 = strtotime($data['Visit2ppm'][0]->v_Time);
    		$V2time2 = strtotime($data['Visit2ppm'][0]->v_Etime);
			$V2diff = $V2time2-$V2time1;
    		$V2tc_min = $V2diff / 60;
			if ($V2tc_min < 60 ){
    		$V2tc_time = $V2tc_min. ' min';
    		$data['time_comp2'] = $V2tc_time;
    		}
    		else{
    		$bal_min = ($V2tc_min%60);
    		$h_min = $V2tc_min - $bal_min;
    		$hour = $h_min/60;
    		$V2tc_time = $hour. ' hr ' .$bal_min. ' min';
    		$data['time_comp2'] = $V2tc_time;
    		}
    		}
    		else{
    		$V2tc_min = 0;
    		}
    	//visit3
    		if (isset($data['Visit3ppm'][0]->v_WrkOrdNo)){
			$V3time1 = strtotime($data['Visit3ppm'][0]->v_Time);
    		$V3time2 = strtotime($data['Visit3ppm'][0]->v_Etime);
			$V3diff = $V3time2-$V3time1;
    		$V3tc_min = $V3diff / 60;
			if ($V3tc_min < 60 ){
    		$V3tc_time = $V3tc_min. ' min';
    		$data['time_comp3'] = $V3tc_time;
    		}
    		else{
    		$bal_min = ($V3tc_min%60);
    		$h_min = $V3tc_min - $bal_min;
    		$hour = $h_min/60;
    		$V3tc_time = $hour. ' hr ' .$bal_min. ' min';
    		$data['time_comp3'] = $V3tc_time;
    		}
    		}
    		else{
    		$V3tc_min = 0;
    		}
    	//service time
    		$serv_t = $V1tc_min + $V2tc_min + $V3tc_min;
    		if ($serv_t < 60){
    		$serv_time = $serv_t. ' min';
    		$data['serv_time'] = $serv_time;
    		}
    		else{
    		$bal_smin = ($serv_t%60);
    		$h_smin = $serv_t - $bal_smin;
    		$Shour = $h_smin/60;
    		$serv_time = $Shour. ' hr ' .$bal_smin. ' min';
    		$data['serv_time'] = $serv_time;
    		}
    	//down time
    		$time1 = strtotime($data['ppmrec'][0]->d_StartDt);
    		$time2 = strtotime($data['recordppm'][0]->d_DateDone);
    		$diff = $time2-$time1;
    		$down_min = $diff / 60;
    		if ($down_min < 60 ){
    		$down_time = $down_min. ' min';
    		$data['down_time'] = $down_time;
    		}
    		else{
    		$Dbal_min = ($down_min%60);
    		$Dh_min = $down_min - $Dbal_min;
    		$Dhour = $Dh_min/60;
    		$down_time = $Dhour. ' hr ' .$Dbal_min. ' min';
    		$data['down_time'] = $down_time;

    		}
    	//stopage
    		$stoppage1 = strtotime($data['recordppm'][0]->d_pfsdate);
    		$stoppage2 = strtotime($data['recordppm'][0]->d_pfedate);
    		$diffS = $stoppage2-$stoppage1;
    		$Stop_min = $diffS / 60;
    		if ($Stop_min < 60 ){
    		$Stop_time = $Stop_min. ' min';
    		$data['Stop_time'] = $Stop_time;
    		}
    		else{
    		$Sbal_min = ($Stop_min%60);
    		$Sh_min = $Stop_min - $Sbal_min;
    		$Shour = $Sh_min/60;
    		$Stop_time = $Shour. ' hr ' .$Sbal_min. ' min';
    		$data['Stop_time'] = $Stop_time;
    		}
		}
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_job",$data);
		}

		//RCM
		else{
		$data['d_date'] = isset($data['disp'][0]->D_date) ? $data['disp'][0]->D_date : NULL ;
		$data['d_time'] = isset($data['disp'][0]->D_time) ? $data['disp'][0]->D_time : NULL ;
		$data['duedate'] = !is_null($data['d_date']) ? date('Y-m-d',strtotime("+13 day", strtotime($data['d_date']))) : NULL ;

		if (isset($data['record'][0]->v_Wrkordno)){
		//visit1
			if (isset($data['Visit1'][0]->v_WrkOrdNo)){
			$V1time1 = strtotime($data['Visit1'][0]->v_Time);
    		$V1time2 = strtotime($data['Visit1'][0]->v_Etime);
			$V1diff = $V1time2-$V1time1;
    		$V1tc_min = $V1diff / 60;
			if ($V1tc_min < 60 ){
    		$V1tc_time = $V1tc_min. ' min';
    		$data['time_comp1'] = $V1tc_time;
    		}
    		else{
    		$bal_min = ($V1tc_min%60);
    		$h_min = $V1tc_min - $bal_min;
    		$hour = $h_min/60;
    		$V1tc_time = $hour. ' hr ' .$bal_min. ' min';
    		$data['time_comp1'] = $V1tc_time;
    		}
    		}
    		else{
    		$V1tc_min = 0;
    		}
    	//visit2
    		if (isset($data['Visit2'][0]->v_WrkOrdNo)){
			$V2time1 = strtotime($data['Visit2'][0]->v_Time);
    		$V2time2 = strtotime($data['Visit2'][0]->v_Etime);
			$V2diff = $V2time2-$V2time1;
    		$V2tc_min = $V2diff / 60;
			if ($V2tc_min < 60 ){
    		$V2tc_time = $V2tc_min. ' min';
    		$data['time_comp2'] = $V2tc_time;
    		}
    		else{
    		$bal_min = ($V2tc_min%60);
    		$h_min = $V2tc_min - $bal_min;
    		$hour = $h_min/60;
    		$V2tc_time = $hour. ' hr ' .$bal_min. ' min';
    		$data['time_comp2'] = $V2tc_time;
    		}
    		}
    		else{
    		$V2tc_min = 0;
    		}
    	//visit3
    		if (isset($data['Visit3'][0]->v_WrkOrdNo)){
			$V3time1 = strtotime($data['Visit3'][0]->v_Time);
    		$V3time2 = strtotime($data['Visit3'][0]->v_Etime);
			$V3diff = $V3time2-$V3time1;
    		$V3tc_min = $V3diff / 60;
			if ($V3tc_min < 60 ){
    		$V3tc_time = $V3tc_min. ' min';
    		$data['time_comp3'] = $V3tc_time;
    		}
    		else{
    		$bal_min = ($V3tc_min%60);
    		$h_min = $V3tc_min - $bal_min;
    		$hour = $h_min/60;
    		$V3tc_time = $hour. ' hr ' .$bal_min. ' min';
    		$data['time_comp3'] = $V3tc_time;
    		}
    		}
    		else{
    		$V3tc_min = 0;
    		}
    	//service time
    		$serv_t = $V1tc_min + $V2tc_min + $V3tc_min;
    		if ($serv_t < 60){
    		$serv_time = $serv_t. ' min';
    		$data['serv_time'] = $serv_time;
    		}
    		else{
    		$bal_smin = ($serv_t%60);
    		$h_smin = $serv_t - $bal_smin;
    		$Shour = $h_smin/60;
    		$serv_time = $Shour. ' hr ' .$bal_smin. ' min';
    		$data['serv_time'] = $serv_time;
    		}
    	//down time
    		$time1 = strtotime($data['disp'][0]->D_date);
    		$time2 = strtotime($data['record'][0]->d_DateDone);
    		$diff = $time2-$time1;
    		$down_min = $diff / 60;
    		if ($down_min < 60 ){
    		$down_time = $down_min. ' min';
    		$data['down_time'] = $down_time;
    		}
    		else{
    		$Dbal_min = ($down_min%60);
    		$Dh_min = $down_min - $Dbal_min;
    		$Dhour = $Dh_min/60;
    		$down_time = $Dhour. ' hr ' .$Dbal_min. ' min';
    		$data['down_time'] = $down_time;
    		}
    	//stopage
    		$stoppage1 = strtotime($data['record'][0]->d_pfsdate);
    		$stoppage2 = strtotime($data['record'][0]->d_pfedate);
    		$diffS = $stoppage2-$stoppage1;
    		$Stop_min = $diffS / 60;
    		if ($Stop_min < 60 ){
    		$Stop_time = $Stop_min. ' min';
    		$data['Stop_time'] = $Stop_time;
    		}
    		else{
    		$Sbal_min = ($Stop_min%60);
    		$Sh_min = $Stop_min - $Sbal_min;
    		$Shour = $Sh_min/60;
    		$Stop_time = $Shour. ' hr ' .$Sbal_min. ' min';
    		$data['Stop_time'] = $Stop_time;
    		}
    	//completion time
    		if ($Stop_min > 0){
    		$comp_diff = $down_min - $Stop_min;
    		if ($comp_diff < 60 ){
    		$comp_time = $comp_diff. ' min';
    		$data['comp_time'] = $comp_time;
    		}
    		else{
    		$Cbal_min = ($comp_diff%60);
    		$Ch_min = $comp_diff - $Cbal_min;
    		$Chour = $Ch_min/60;
    		$comp_time = $Chour. ' hr ' .$Cbal_min. ' min';
    		$data['comp_time'] = $comp_time;
    		}
    		}
    		else {
    		$data['comp_time'] = $data['down_time'];
    		}
    	}
    		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_jobclose",$data);
		}
	}
		public function jobclose_update(){
		$data['wrk_ord'] = $this->input->post('wrk_ord');
		$this->load->model("display_model");
		$data['disp'] = $this->display_model->list_display($data['wrk_ord']);
		$data['ppmrec'] = $this->display_model->woppm_disp($data['wrk_ord']);
		$data['record'] = $this->display_model->jobclose_tab($data['wrk_ord']);
		$data['recordppm'] = $this->display_model->jobclose_ppm($data['wrk_ord']);
		$data['dispasset'] = $this->display_model->request_tab($data['wrk_ord']);
		$data['ppmasset'] = $this->display_model->wo_ppm($data['wrk_ord']);
		//$data['P1personal'] = explode('-',$data['record'][0]->userr);
		$data['P1personal'] = isset($data['record'][0]->userr) ? explode('-',$data['record'][0]->userr) : "";
		$data['PPPMpersonal'] = isset($data['recordppm'][0]->userr) ? explode('-',$data['recordppm'][0]->userr) : "";

		if (substr($data['wrk_ord'],0,2) == 'PP'){
			$data['recordv1'] = $this->display_model->visit1ppm_tab($data['wrk_ord']);
			$data['Stimev1'] = explode(':',$data['recordv1'][0]->v_Time);
			$data['d_date'] = $data['ppmrec'][0]->d_StartDt;
			$data['duedate'] = date('Y-m-d',strtotime($data['ppmrec'][0]->d_DueDt));
			if (isset($data['recordppm'][0]->v_Wrkordno)){
				$data['jctime'] = explode(':',$data['recordppm'][0]->v_time);
				if (isset($data['recordppm'][0]->d_pfsdate)){
					$data['pfsdate'] = explode(' ',$data['recordppm'][0]->d_pfsdate);
					$data['pfstime'] = explode(':',$data['pfsdate'][1]);
				}
				if (isset($data['recordppm'][0]->d_pfedate)){
					$data['pfedate'] = explode(' ',$data['recordppm'][0]->d_pfedate);
					$data['pfetime'] = explode(':',$data['pfedate'][1]);
				}
			}
			$this ->load->view("head");
			$this ->load->view("left");
			$this ->load->view("content_job_update",$data);
		}
		else{
			$data['recordv1'] = $this->display_model->visit1_tab($data['wrk_ord']);
			$data['Stimev1'] = explode(':',$data['recordv1'][0]->v_Time);
			$data['d_date'] = $data['disp'][0]->D_date;
			$data['d_time'] = $data['disp'][0]->D_time;
			$data['duedate'] = date('Y-m-d',strtotime("+13 day", strtotime($data['disp'][0]->D_date)));

			if (isset($data['record'][0]->v_Wrkordno)){
				$data['jctime'] = explode(':',$data['record'][0]->v_time);
				$data['pfsdate'] = $data['record'][0]->d_pfsdate ? explode(' ',$data['record'][0]->d_pfsdate) : '';
				$data['pfstime'] = $data['record'][0]->d_pfsdate ? explode(':',$data['pfsdate'][1]) : '';
				$data['pfedate'] = $data['record'][0]->d_pfsdate ? explode(' ',$data['record'][0]->d_pfedate) : '';
				$data['pfetime'] = $data['record'][0]->d_pfsdate ? explode(':',$data['pfedate'][1]) : '';
			}
			$this ->load->view("head");
			$this ->load->view("left");
			$this ->load->view("Content_workorder_jobclose_update",$data);
		}
	}
		public function jobclose_confirm(){
		$data['wrk_ord'] = $this->input->post('wrk_ord');
		$this->load->model("display_model");
		$data['disp'] = $this->display_model->list_display($data['wrk_ord']);
		$data['ppmrec'] = $this->display_model->woppm_disp($data['wrk_ord']);
		$data['dispasset'] = $this->display_model->request_tab($data['wrk_ord']);
		$data['ppmasset'] = $this->display_model->wo_ppm($data['wrk_ord']);
		if (substr($data['wrk_ord'],0,2) == 'PP'){
		$data['d_date'] = $data['ppmrec'][0]->d_StartDt;
		$data['duedate'] = date('Y-m-d',strtotime($data['ppmrec'][0]->d_DueDt));
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_job_confirm",$data);
		}
		else{
		$data['d_date'] = $data['disp'][0]->D_date;
		$data['d_time'] = $data['disp'][0]->D_time;
		$data['duedate'] = date('Y-m-d',strtotime("+13 day", strtotime($data['disp'][0]->D_date)));
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_jobclose_Confirm",$data);
		}
	}
		public function technicalsummary(){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_technicalsummary");
	}
		public function technicalsummary_update(){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_technicalsummary_Update");
	}
		public function clause(){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_clause");
	}
		public function clause_update(){
		$this->load->model('display_model');
		$data['record'] = $this->display_model->clause_rec($this->input->get('wrk_ord'));
		if ($data['record']){
		$data['vendor'] = explode(' - ',$data['record'][0]->vendor_name);
		}
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_clause_update",$data);
	}
		public function Register(){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_Resgister");
	}
		public function desknewrequest(){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_deskrequest");
	}

		public function Procurement(){
	    $this->load->model('get_model');
        $data['access'] = array();
		foreach ($this->get_model->mrin_authority() as $row)
		{
		 $data['access'][]=$row->Access;
		}

				function toArray($obj)
{
    $obj = (array) $obj;//cast to array, optional
    return $obj['path'];
}
    $idArray = array_map('toArray', $this->session->userdata('accessr'));

		//echo "nilai id : ".print_r($idArray);
		$data['chkers'] = $idArray;
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_Procurement", $data);

	}

		public function Business(){
		function toArray($obj)
{
    $obj = (array) $obj;//cast to array, optional
    return $obj['path'];
}
    $idArray = array_map('toArray', $this->session->userdata('accessr'));

		//echo "nilai id : ".print_r($idArray);
		$data['chkers'] = $idArray;
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_Business", $data);
	}

		public function report (){
		$data['service_apa'] = $this->loginModel->validate3();
		$data['Title'] = $this->Title;
  		$data['Title_left'] = $this->Title_left;
		$data['Title_left_child'] = $this->Title_left_child;

		$this ->load->view("content_head");
		$this ->load->view("content_header",$data);
		$this ->load->view("content_left",$data);
		$this ->load->view("content_report");
		$this ->load->view("content_footer");
	}
	/*	public function assets (){
		$this->load->model("get_model");
		$data['asset_images'] = $this->get_model->assetimage();
		//print_r($data['asset_images']);
		//exit();
		$data['asset_cat'] = $this->get_model->get_assetcat();//get_assetdetx
		//$data['asset_det'] = $this->get_model->get_assetdetx('16-597');
		//print_r($data['asset_det']);
		//exit();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_assets", $data);
	}*/

	public function assets (){
		$this->load->model("get_model");
		$data['asset_images'] = $this->get_model->assetimage();

		$data['limit'] = 20;
		isset($_GET['numrow']) ? $data['numrow'] = $_GET['numrow'] : $data['numrow'] = 1;
		isset($_GET['p']) ? $data['page'] = $_GET['p'] : $data['page'] = 1;

		$data['start'] = ($data['page'] * $data['limit']) - $data['limit'];

		$data['rec'] = $this->get_model->get_assetcat();//get_assetdetx
		$data['result'] = count($data['rec']);
		if($data['result'] > ($data['page'] * $data['limit']) ){
			$data['next'] = ++$data['page'];
		}
		$data['asset_cat'] = $this->get_model->get_assetcatxx($data['limit'],$data['start']);
		//$data['asset_det'] = $this->get_model->get_assetdetx('16-597');

		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_assets", $data);
	}

	 /* public function locationlist (){
		$this->load->model("get_model");
		$data['dept'] = $this->get_model->get_poploclistb();
		//$data['loc'] = $this->get_model->get_poploclista();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_locations", $data);
	}*/

	public function locationlist (){
		$this->load->model("get_model");
		$data['limit'] = 23;
		isset($_GET['numrow']) ? $data['numrow'] = $_GET['numrow'] : $data['numrow'] = 1;
		isset($_GET['p']) ? $data['page'] = $_GET['p'] : $data['page'] = 1;

		$data['start'] = ($data['page'] * $data['limit']) - $data['limit'];

		$data['rec'] = $this->get_model->get_poploclistb();//get_assetdetx
		$data['result'] = count($data['rec']);
		if($data['result'] > ($data['page'] * $data['limit']) ){
			$data['next'] = ++$data['page'];
		}
		$data['dept'] = $this->get_model->get_poploclistbxx($data['limit'],$data['start']);
		//$data['dept'] = $this->get_model->get_poploclistb();
		//$data['loc'] = $this->get_model->get_poploclista();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_locations", $data);
	}

	  public function assets_ajax (){
		//$this->load->model("get_model");
		//$data['asset_cat'] = $this->get_model->get_assetcat();
		//$this ->load->view("head");
		///$this ->load->view("left");
		$this ->load->view("test");
	}

	public function get_all_users(){

		$query = $this->db->get('pmis2_egm_assetregistration');
		if($query->num_rows() > 0){
			$header = false;
			$output_string = '';
			$output_string .=  "<table border='1'>\n";
			foreach ($query->result() as $row){
				$output_string .= '<tr>\n';
				$output_string .= "<th>{$row->V_Asset_no}</th>\n";
				$output_string .= '</tr>\n';
			}
			$output_string .= '</table>\n';
		}
		else{
			$output_string = 'There are no results';
		}
		//echo $output_string;
		echo json_encode($output_string);
	}

	public function get_all_usersx(){

		$query = $this->db->get('pmis2_egm_assetregistration');
		if($query->num_rows() > 0){
			$header = false;
			$output_string = '';
			//$output_string .=  "<table border='1'>\n";
			foreach ($query->result() as $row){
				/*$output_string .= '<tr>\n';
				$output_string .= "<th>{$row->V_Asset_no}</th>\n";
				$output_string .= '</tr>\n';
				*/
				$output_string = '<div style="padding-left:50px;">';
				$output_string .= 		'<table id="BEANL03" style="display:none; margin:10px;" border="0" class="ui-content-middEmenu-workorder" width="98%">';
				$output_string .= 		'<tr class="">';
				$output_string .= 		'<td class=""colspan="" style="" valign="top" height="25px">';
				$output_string .= 		'<table class="ui-content-middle-menu-workorder2" width="100%" height="25px">';
				$output_string .= 		'<tr class="ui-menu-color-header" style="color:white;">';
				$output_string .= 		'<td width="5%" style="border-top-left-radius:5px; ">No</td>';
				$output_string .= 		'<td width="5%">Asset Number</td>';
				$output_string .= 		'<td width="5%">Tag No</td>';
				$output_string .= 		'<td width="10%">Asset Name</td>';
				$output_string .= 		'<td width="5%">User<br />Dept</td>';
				$output_string .= 		'<td width="5%">Location</td>';
				$output_string .= 		'<td width="5%">Criticality</td>';
				$output_string .= 		'<td width="5%">Condition</td>';
				$output_string .= 		'<td width="5%">Status</td>';
				$output_string .= 		'<td width="5%">Model</td>';
				$output_string .= 		'<td width="5%">Manufacturer</td>';
				$output_string .= 		'<td width="5%">Serial no</td>';
				$output_string .= 		'<td width="5%" style="border-top-right-radius:5px;">Purchase <br />Cost</td>';
				$output_string .= 		'</tr>';
				$output_string .= 		'</table>';
				$output_string .= 		'</td>';
				$output_string .= 		'</tr>';
				$output_string .= 		'</table>';
				$output_string .= 		'</td>';
				$output_string .= 		'</tr>';
				$output_string .= 		'</table>';
				$output_string .= 		'</div>';

			}
			//$output_string .= '</table>\n';
		}
		else{
			$output_string = 'There are no results';
		}
		//echo $output_string;
		echo json_encode($output_string);
	}

		public function assetsC (){
		$this->load->model("get_model");
		$data['non_ppm'] = $this->get_model->get_assetnonppm();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_assets_C",$data);
	}
		public function assetnew (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_assetnew");
	}
	public function assetupdatepic (){
		//$url = $this->input->post('continue') ? $this->input->post('continue') : site_url('contentcontroller/select');
		$config['upload_path'] = 'C:\inetpub\wwwroot\FEMSHospital_v3\uploadassetimages';
		//$config['upload_path'] = 'C:\xampp\htdocs\fms\uploadassetimages';
		//$config['upload_path'] = '/var/www/vhosts/camsis2.advancepact.com/httpdocs/uploadassetimages';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '5000';
		$config['max_width']  = 'auto';
		$config['max_height']  = 'auto';

		$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload())
			{
	//echo 'masuk error';
	//exit();
				$data['error'] = array($this->upload->display_errors());
				$data['assetn'] = $this->input->get('asstno');
				//echo 'nilai'.$assetn;
				$this->load->model("get_model");
				$data['asset_det'] = $this->get_model->get_assetdet2($data['assetn']);
				$data['asset_UMDNS'] = $this->get_model->get_UMDNSAsset($data['asset_det'][0]->V_Equip_code);
				$data['asset_vo'] = $this->get_model->get_VOStatus($data['assetn']);
				$data['asset_chklist'] = $this->get_model->get_chklist($data['asset_det'][0]->v_ChecklistCode);
				$data['assetppm'] = $this->get_model->assetppmlist($data['assetn']);
				$this ->load->view("head");
				$this ->load->view("left");
				$this ->load->view("content_assetupdate",$data);
			}
			else
			{
				$data['assetn'] = $this->input->get('asstno');

				$data['upload_data'] = $this->upload->data();
				$data['upload_data']['asset_no'] = $data['assetn'];
				$data['upload_data']['service_code'] = $this->session->userdata('usersess');
				$data['upload_data']['hospital'] = $this->session->userdata('hosp_code');
				$data['upload_data']['action_flag'] = 'I';

				$this->load->model('insert_model');
				$this->insert_model->uploadassetimages($data['upload_data']);

				$this->load->model("get_model");
				$data['asset_det'] = $this->get_model->get_assetdet2($data['assetn']);
				$data['asset_UMDNS'] = $this->get_model->get_UMDNSAsset($data['asset_det'][0]->V_Equip_code);
				$data['asset_vo'] = $this->get_model->get_VOStatus($data['assetn']);
				$data['asset_chklist'] = $this->get_model->get_chklist($data['asset_det'][0]->v_ChecklistCode);
				$data['asset_images'] = $this->get_model->assetimages($data['assetn'],$this->session->userdata('usersess'),$this->session->userdata('hosp_code'));
				$data['datacount'] = count($data['asset_images']);
				$data['assetppm'] = $this->get_model->assetppmlist($data['assetn']);
				$this ->load->view("head");
				$this ->load->view("left",$data);
				$this ->load->view("content_assetupdate",$data);
			}
	}
		public function assetupdate (){
		$data['assetn'] = $this->input->get('asstno');
		//echo 'nilai'.$assetn;
    //echo "session skrg : ".$this->session->userdata('hosp_code');
    if (!empty($this->input->get('mrinhosp')) && ($this->session->userdata('hosp_code')!=$this->input->get('mrinhosp')))
    {
    $this->session->set_userdata('hosp_code', $this->input->get('mrinhosp'));
    }
		$this->load->model("get_model");
		$data['asset_det'] = $this->get_model->get_assetdet2($data['assetn']);
		//print_r($data['asset_det']);
		$data['asset_UMDNS'] = $this->get_model->get_UMDNSAsset($data['asset_det'][0]->V_Equip_code);
		$data['asset_vo'] = $this->get_model->get_VOStatus($data['assetn']);
		$data['asset_chklist'] = $this->get_model->get_chklist($data['asset_det'][0]->v_ChecklistCode);
		//$data['asset_chklist'] = $this->get_model->get_chklist($data['asset_det'][0]->V_Equip_code);
		//print_r($data['asset_chklist']);
		$data['asset_images'] = $this->get_model->assetimages($data['assetn'],$this->session->userdata('usersess'),$this->session->userdata('hosp_code'));
		//print_r($data['asset_images']);
		//exit();
		$data['datacount'] = count($data['asset_images']);
		//echo '<br> nilai asset vo';
		$data['assetppm'] = $this->get_model->assetppmlist($data['assetn']);

        function toArray($obj)
    {
        $obj = (array) $obj;//cast to array, optional
        return $obj['path'];
    }

        $idArray = array_map('toArray', $this->session->userdata('accessr'));

    		//echo "nilai id : ".print_r($idArray);
    		$data['chkers'] = $idArray;

		$this ->load->view("head");
		$this ->load->view("left",$data);
		$this ->load->view("content_assetupdate",$data);
	}
		public function updateReg (){
		$data['assetno'] = $this->input->get('assetno');
		$this->load->model("get_model");
		$data['asset_det'] = $this->get_model->get_assetdet2($data['assetno']);
		$data['asset_map'] = $this->get_model->get_assetmap($data['asset_det'][0]->V_Equip_code);
		$data['loc'] = $this->get_model->get_deptloclist($data['asset_det'][0]->V_User_Dept_code, $data['asset_det'][0]->V_Location_code);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Update_Reg", $data);
	}
		public function updatecom (){
		$data['assetno'] = $this->input->get('assetno');
		$this->load->model("get_model");
		$data['asset_det'] = $this->get_model->get_assetdet2($data['assetno']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Update_commet", $data);
	}
		public function updatespec (){
		$data['assetno'] = $this->input->get('assetno');
		$this->load->model("get_model");
		$data['asset_det'] = $this->get_model->get_assetdet2($data['assetno']);
		$data['country_list'] = $this->get_model->get_dropdown_list_country();
		$data['manufacturer_list'] = $this->get_model->get_dropdown_list_manufacturer();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Update_specification", $data);
	}
		public function updateacqu (){
		$data['assetno'] = $this->input->get('assetno');
		$this->load->model("get_model");
		$data['asset_det'] = $this->get_model->get_assetdet2($data['assetno']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Update_Acquisition", $data);
	}
		public function updatecommissioning (){
		$data['assetno'] = $this->input->get('assetno');
		$this->load->model("get_model");
		$data['asset_det'] = $this->get_model->get_assetdet2($data['assetno']);
		$data['contract_list'] = $this->get_model->get_dropdown_list_contractcd();
		$data['wgcode_list'] = $this->get_model->get_dropdown_list_wgcode();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Update_Commissioning", $data);
	}
		public function updatemaintenance (){
		$data['assetno'] = $this->input->get('assetno');
		$this->load->model("get_model");
		$data['asset_main'] = $this->get_model->get_assetmainte($data['assetno']);
		//$data['asset_chklist'] = $this->get_model->get_chklist($data['asset_main'][0]->v_checklistcode);
		$data['asset_chklist'] = $this->get_model->assetchklist($data['assetno']);
		$data['asset_vo'] = $this->get_model->get_VOStatus($data['assetno']);
		$data['asset_det'] = $this->get_model->get_assetdet2($data['assetno']);
		$data['asset_UMDNS'] = $this->get_model->get_UMDNSAsset($data['asset_det'][0]->V_Equip_code);
		//print_r($data['asset_chklist']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Update_Maintenance", $data);
	}
		public function assetstatutory (){
		$data['assetno'] = $this->input->get('asstno');
		$this->load->model("get_model");
		$data['asset_sta'] = $this->get_model->assetstatutory($data['assetno']);
		$data['lic'] = $this->get_model->licensesstat($data['assetno']);
		$this->load->model("display_model");
		$data['result'] = $this->display_model->searchassettag($data['assetno']);
		$this ->load->view("head");
		$this ->load->view("left" , $data);

		$this ->load->view("content_asset_statutory", $data);
	}
		public function assetstatutory_update (){
		$data['certno'] = $this->input->get('certno');
		$data['assetno'] = $this->input->get('assetno');
		$data['id'] = $this->input->get('id');
		$this->load->model("get_model");
		$data['record'] = $this->get_model->statutorydet($data['id'],$data['assetno']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_statutory_update",$data);

	}
		public function assetstatutory_update_confrim (){
		$this->load->helper(array('form', 'url'));
	    // load library for form validation
	    $this->load->library('form_validation');
	    // validation rule
		$this->form_validation->set_rules('n_Authorit','Authority','trim|required');
		$this->form_validation->set_rules('n_Authorit2','Authority2','trim');
		$this->form_validation->set_rules('n_Registration_Number','Registration Number' ,'trim|required');
		$this->form_validation->set_rules('n_Certificate_Number','Certificate Number','trim');
		$this->form_validation->set_rules('n_Issued_On','Issued On','trim');
		$this->form_validation->set_rules('n_Inspected_On','Inspected On','trim');
		$this->form_validation->set_rules('n_Start_On','Start On','trim');
		$this->form_validation->set_rules('n_End_On','End On','trim');
		$this->form_validation->set_rules('n_Class_Grade','Class Grade','trim');
		$this->form_validation->set_rules('n_Remarks','Remarks','trim');
		$this->form_validation->set_rules('delete_chk','Delete','trim');
		if($this->form_validation->run()==FALSE)
		{
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_statutory_update");
		}
		else
		{
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_statutory_confirm");
		}


	}

	public function assetstatutory_update_confrimsv (){
		$this->load->model('insert_model');
		$data['certno'] = $this->input->post('certno');
		$data['assetno'] = $this->input->post('assetno');
		$data['id'] = $this->input->post('id');
		$data['delete_chk'] = $this->input->post('delete_chk');
		$wrk_ord_test = $this->insert_model->statutory_exist('v_asset_no',$data['assetno'],'ID',$data['id'],$data['delete_chk']);

		redirect("contentcontroller/assetstatutory?asstno=".$data['assetno']."&tab=1");
	}

		public function assetcontract (){
		$data['asstno'] = $this->input->get('asstno');
		$this->load->model('display_model');
		$data['record'] = $this->display_model->servicecontract($data['asstno']);
		$data['result'] = $this->display_model->searchassettag($data['asstno']);
		$this ->load->view("head");
		$this ->load->view("left" , $data);
		$this ->load->view("content_asset_contract",$data);
	}
		public function assetworkorder (){
		$data['assetno'] = $this->input->get('asstno');
		$this->load->model("get_model");
		$data['wo_list'] = $this->get_model->get_wobyasset($data['assetno']);
		$this->load->model("display_model");
		$data['result'] = $this->display_model->searchassettag($data['assetno']);
		$this ->load->view("head");
		$this ->load->view("left" , $data);
		$this ->load->view("content_asset_workorder",$data);
	}
		public function assetaccessories (){
		$data['assetno'] = $this->input->get('asstno');
		$this->load->model("get_model");
		$data['acces_list'] = $this->get_model->assetaccessories($data['assetno']);
		$this->load->model("display_model");
		$data['result'] = $this->display_model->searchassettag($data['assetno']);
		$this ->load->view("head");
		$this ->load->view("left" , $data);

		$this ->load->view("content_asset_accessories", $data);
	}
		public function Accessories_update (){

		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_Accessories_update");
	}
		public function Accessories_confirm (){

		$this ->load->view("head");
		$this ->load->view("left");

		$this ->load->view("content_Accessories_confirm");
	}

	public function Accessories_confirmsv (){

	if ($this->input->post('n_acces') <> ''){

	$insert_data = array(

					'v_accesoriescode'=>$this->input->post('n_acces'),
					'v_description'=>$this->input->post('n_description'),
					'v_assetno'=>$this->input->post('n_asset_no'),
					'v_hospitalcode'=>$this->session->userdata('hosp_code'),
					'v_actionflag'=>'I',
					'd_timestamp'=>date('Y-m-d H:i:s')
		);

		$this->load->model('update_model');
		$this->update_model->pmis2_egm_accesories($insert_data);

	} else {
		$this->load->model('get_model');
		$nilaibaru = $this->get_model->get_accesnewnum($this->input->post('n_asset_no'));
		$insert_data = array(

					'v_accesoriescode'=>str_pad($nilaibaru[0]->thenum, 3, 0, STR_PAD_LEFT),
					'v_description'=>$this->input->post('n_description'),
					'v_assetno'=>$this->input->post('n_asset_no'),
					'v_hospitalcode'=>$this->session->userdata('hosp_code'),
					'v_actionflag'=>'I',
					'd_timestamp'=>date('Y-m-d H:i:s')
		);
		$this->load->model('insert_model');
		$this->insert_model->ins_assetaccesories($insert_data);
		}
		redirect("contentcontroller/assetaccessories?asstno=".$this->input->post('n_asset_no')."&tab=4");
	}

		public function assetPPMplanner (){
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");

		$data['assetno'] = $this->input->get('asstno');
		$this->load->model("get_model");
		$data['records'] = $this->get_model->assetjobtyperegy($data['assetno'],$data['year']);

		if ($data['records']){
		$data['weeksch'] = explode(',',$data['records'][0]->v_weeksch);
		}
		$this ->load->view("head");
		$this ->load->view("left");

		$this ->load->view("content_asset_PPMplanner",$data);
	}
		public function assetlogcards (){
		$data['assetno'] = $this->input->get('asstno');
		$this->load->model("display_model");
		$data['result'] = $this->display_model->searchassettag($data['assetno']);
		$this ->load->view("head");
		$this ->load->view("left" , $data);
		//$this->load->model("get_model");
		$this ->load->view("content_asset_logcards");
		$this ->load->view("content_asset_logcards_Relocation");
	}
		public function assetlogcards_M (){
		$data['assetno'] = $this->input->get('asstno');
		$this->load->model("get_model");
		$data['ppm_list'] = $this->get_model->assetppmlog($data['assetno']);
		$data['ppm_list_cost'] = $this->get_model->assetlaborpartbyppm($data['assetno']);
		$this->load->model("display_model");
    $data['result'] = $this->display_model->searchassettag($data['assetno']);
		$this ->load->view("head");
		$this ->load->view("left" , $data);
		$this ->load->view("content_asset_logcards");
		$this ->load->view("content_asset_logcards_Maintenance", $data);
	}
		public function assetlogcards_U (){
		$data['assetno'] = $this->input->get('asstno');
		$this->load->model("get_model");
		$data['wo_list'] = $this->get_model->assetwolog($data['assetno']);
		$data['wo_list_cost'] = $this->get_model->assetlaborpartbywo($data['assetno']);
		$this->load->model("display_model");
    $data['result'] = $this->display_model->searchassettag($data['assetno']);
		$this ->load->view("head");
		$this ->load->view("left" , $data);

		$this ->load->view("content_asset_logcards");
		$this ->load->view("content_asset_logcards_Unschedule", $data);
	}
		public function assetlogcards_C (){
		$data['assetno'] = $this->input->get('asstno');
		$this->load->model("get_model");
		$data['c_list'] = $this->get_model->assetcomplaintlog($data['assetno']);
		$this->load->model("display_model");
    $data['result'] = $this->display_model->searchassettag($data['assetno']);
		$this ->load->view("head");
		$this ->load->view("left" , $data);

		$this ->load->view("content_asset_logcards");
		$this ->load->view("content_asset_logcards_Complaints", $data);
	}
		public function assetlogcards_Re (){
		$data['assetno'] = $this->input->get('asstno');
		$this->load->model("display_model");
		$data['result'] = $this->display_model->searchassettag($data['assetno']);
		$this ->load->view("head");
		$this ->load->view("left" , $data);
		$this ->load->view("content_asset_logcards");
		$this ->load->view("content_asset_logcards_Reclassification");
	}


	public function assetlicenses (){
		$data['asstno'] = $this->input->get('asstno');
		$this->load->model("get_model");
		$this->load->model("display_model");
		$data['lic'] = $this->get_model->licensesandcertasset($data['asstno']);
		$data['result'] = $this->display_model->searchassettag($data['asstno']);
		$this ->load->view("head");
		$this ->load->view("left",$data);
		$this ->load->view("content_asset_licenses", $data);
	}


		public function assetlicenses_update (){
		$this ->load->view("head");
		$this ->load->view("left");

		$this ->load->view("content_asset_licenses_update");
	}
		public function pop_Agency_Code(){

		$this->load->model("display_model");
		$data['records'] = $this->display_model->list_agency();
		$this ->load->view("head");
		$this ->load->view("content_pop_Agency_Code",$data);
	}
		public function Identification_Type(){

		$this->load->model("get_model");
		$this->load->model("display_model");
		$data['records'] = $this->display_model->list_personel();
		$data['record'] = $this->get_model->get_vendortlist();
		$data['assetrecord'] = $this->get_model->get_assetdet();
		$data['hosprecord'] = $this->display_model->list_hospital();
		$data['consrecord'] = $this->display_model->list_consumables();
		$this ->load->view("head");
		$this ->load->view("content_pop_Identification_Type",$data);
	}
		public function assetlicenses_confrim (){
		$this ->load->view("head");
		$this ->load->view("left");

		$this ->load->view("content_asset_licenses_confirm");
	}
		public function assetvariationhistory (){
		$data['assetno'] = $this->input->get('asstno');
		$this->load->model("display_model");
		$data['result'] = $this->display_model->searchassettag($data['assetno']);
		$data['record'] = $this->display_model->wrnenddate($data['assetno']);
		$this ->load->view("head");
    	$this ->load->view("left" , $data);
		$this ->load->view("content_asset_variationhistory",$data);
	}
		public function assetmaintenancespecification (){
		$this ->load->view("head");
		$this ->load->view("left");

		$this ->load->view("content_asset_maintenancespecification");
	}
		public function assetcostcummulative (){
		$data['assetno'] = $this->input->get('asstno');
		$this->load->model("get_model");
		$this->load->model("display_model");
		$data['result'] = $this->display_model->searchassettag($data['assetno']);
		$data['agecost'] = $this->get_model->assetagecost($data['assetno']);
		//$data['laborpart'] = $this->get_model->assetlaborpartwo($data['assetno']);
		$data['lpcost'] = $this->get_model->lpcost($data['assetno'],$this->session->userdata('hosp_code'));
		$this ->load->view("head");
		$this ->load->view("left",$data);
		$this ->load->view("content_asset_costcummulative", $data);
	}

		public function assetPPMjob (){
		$data['assetno'] = $this->input->get('asstno');
		$this->load->model("get_model");
		$data['records'] = $this->get_model->assetjobtypereg($data['assetno']);
		$this->load->model("display_model");
		$data['result'] = $this->display_model->searchassettag($data['assetno']);
		$this ->load->view("head");
		$this ->load->view("left",$data);

		$this ->load->view("content_asset_PPMjob", $data);
	}
		public function assetPPMjob_update (){
		//$data['asstno'] = $this->input->post('asstno');
		$data['asstno'] = $this->input->get('asstno');
		$data['year'] = $this->input->get('jobyear');
		$data['id'] = $this->input->get('id');
		//echo $data['asstno1'];
		//exit();
		if ($data['year'] <> ''){
			$this->load->model("get_model");
			$data['records'] =  $this->get_model->assetjobtyperegyid($data['asstno'],$data['year'],$data['id']);
			//print_r($data['records'])  ;
			//exit();
		}
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_PPMjob_update",$data);
	}
		public function pop_Job_Type(){

		$this->load->model("get_model");
		$data['records'] = $this->get_model->assetjobtype();
		$this ->load->view("head");
		$this ->load->view("content_pop_Job_Type",$data);
	}
		public function pop_Checklist_Code(){

		$this->load->model("get_model");
		$data['records'] = $this->get_model->assetchklistcd();
		$this ->load->view("head");
		$this ->load->view("content_pop_Checklist_Code",$data);
	}
		public function assetPPMjob_confirm (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_PPMjob_Confirm");
	}

	public function assetPPMjob_confirmsv (){
		$data['year'] = $this->input->post('year');
		if ($data['year'] <> ''){
			$insert_data = array(

					'v_Asset_no'=>$this->input->post('n_asset_no'),
					'v_JobType'=>$this->input->post('n_Job_Type'),
					'd_StartDate'=>date('Y-m-d H:i:s', strtotime($this->input->post('n_Registered_Date').'-01-01')),
					'd_ToDate'=>date('Y-m-d H:i:s', strtotime($this->input->post('n_Registered_Date').'-12-31')),
					'v_Checklistcode'=>$this->input->post('n_Checklist_Code'),
					'v_ProcedureCode'=>$this->input->post('n_Procedure'),
					'v_SpareList'=>$this->input->post('n_Spare_List'),
					'v_Details'=>$this->input->post('n_Details'),
					'd_Timestamp'=>date('Y-m-d H:i:s'),
					'v_ActionFlag'=>'U',
					'v_HospitalCode'=>$this->session->userdata('hosp_code'),
					'v_Year'=>$this->input->post('n_Registered_Date'),
					'n_ind'=>'1',

		);
		//print_r($insert_data) ;
		//exit();
		$this->load->model('update_model');
		$this->update_model->pmis2_egm_assetjobtypeid($insert_data,$this->input->post('id'));
		}else{
			//echo "test222";
			//exit();
			$insert_data = array(
					'v_Asset_no'=>$this->input->post('n_asset_no'),
					'v_JobType'=>$this->input->post('n_Job_Type'),
					'd_StartDate'=>date('Y-m-d H:i:s', strtotime($this->input->post('n_Registered_Date').'-01-01')),
					'd_ToDate'=>date('Y-m-d H:i:s', strtotime($this->input->post('n_Registered_Date').'-12-31')),
					'v_Checklistcode'=>$this->input->post('n_Checklist_Code'),
					'v_ProcedureCode'=>$this->input->post('n_Procedure'),
					'v_SpareList'=>$this->input->post('n_Spare_List'),
					'v_Details'=>$this->input->post('n_Details'),
					'd_Timestamp'=>date('Y-m-d H:i:s'),
					'v_ActionFlag'=>'I',
					'v_HospitalCode'=>$this->session->userdata('hosp_code'),
					'v_Year'=>$this->input->post('n_Registered_Date'),
					'n_ind'=>'1',
		);

		$this->insert_model->pmis2_egm_assetjobtype($insert_data);
		}

		//exit();
		redirect('contentcontroller/assetPPMjob?asstno='.$this->input->post('n_asset_no').'&tab=6');
	}

		/*function insert_form()Update_specification
	{

		$this->load->library('form_validation');
		$this->form_validation->set_rules('V_request_type','Name','trim|required');
		//$this->form_validation->set_rules('D_time','D_time','trim|required');
		$this->form_validation->set_rules('V_priority_code','V_priority_code','trim|required');
		$this->form_validation->set_rules('V_summary','V_summary','trim|required');
		if($this->form_validation->run()==FALSE)
		{
			$this->form();
		}

		else
		{
		$insert_data = array(

		'V_request_type'=>$this->input->post('V_request_type'),
		//'D_time'=>$this->input->post('D_time'),
		'V_priority_code'=>$this->input->post('V_priority_code'),
		'V_summary'=>$this->input->post('V_summary')

		);
		$this->insert_model->create_form($insert_data);
		$this->form();



	}

	}*/
/* Pop-Screen */
	public function assetnumber(){

		$this->load->model("get_model");
		$data['records'] = $this->get_model->get_popassetlist($this->input->get('n_asset_number'),$this->input->get('s_department'),$this->input->get('n_tag_number'));
		$this ->load->view("head");
		$this ->load->view("content_pop_assetsnumber",$data);
	}
	public function location(){

	  if(isset($_GET['dept'])) {
    $dept = $_GET['dept'];
		} else {
    $dept = '';
		}
		//echo "nilai postman : " . $_GET["dept"]."<br>";

		$this->load->model("get_model");
		$data['dept'] = $this->get_model->get_popdeptlist();
		$data['loc'] = $this->get_model->get_poploclist($dept);
		$this ->load->view("head");
		$this ->load->view("content_location",$data);
	}

	public function asset_tag(){

		$this->load->model("display_model");
		$data['records'] = $this->display_model->list_workorder();
		$this ->load->view("head");
		$this ->load->view("content_asset_tag",$data);
	}
	public function R_number(){
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$this->load->model("display_model");
		$data['records'] = $this->display_model->request_tab_comp($data['month'],$data['year']);
		$this ->load->view("head");
		$this ->load->view("content_asset_number",$data);
	}
	public function assetdetailname(){

		$this->load->model("display_model");
		$data['records'] = $this->display_model->list_personel();
		$this ->load->view("head");
		$this ->load->view("content_detail_name",$data);
	}
	public function tc_r_number(){
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$this->load->model("get_model");
		$data['records'] = $this->get_model->get_a12tlist();
		$this ->load->view("head");
		$this ->load->view("content_tc_request_number",$data);
	}
	public function E_Code(){

		$this->load->model("get_model");
		//$data['records'] = $this->display_model->list_workorder();
		$data['records'] = $this->get_model->get_assetlist();
		$this ->load->view("head");
		$this ->load->view("content_pop_EquipmentCode",$data);
	}
	public function pop_vendor(){

		$this->load->model("get_model");
		$data['records'] = $this->get_model->get_vendortlist();
		$this ->load->view("head");
		$this ->load->view("content_pop_vendor",$data);
	}
	public function pop_chklist(){

		$this->load->model("get_model");
		$data['records'] = $this->get_model->get_vendortlist();
		$this ->load->view("head");
		$this ->load->view("content_pop_chklist",$data);
	}

	public function vo3(){
		if (is_null($this->input->get('p'))) {
			if (date('m') > 6){
				$data['Period'] = "P2".date('y');
			}
			else{
				$data['Period'] = "P1".date('y');
			}
		}
		$data['rpt_no'] = $this->input->get('rpt_no');
		$this->load->model("get_model");
		$data['records'] = $this->get_model->volist($data['rpt_no']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vo3",$data);
	}
	public function Licenses(){

		$this->load->model("get_model");
		$data['lic'] = $this->get_model->licensesandcert();
		$data['asset_stat'] = $this->get_model->assetstatutorylic();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_Licenses_A_Certificates",$data);
	}

	public function vo3_vvf(){

		$data['rpt_no'] = $this->input->get('rpt_no');
		$this->load->model("display_model");
		$data['records'] = $this->display_model->vo3general($data['rpt_no']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vo3_vvf",$data);
	}
	public function vo3_vvf_update(){
		$data['rpt_no'] = $this->input->get('rpt_no');
		$this->load->model("display_model");
		$data['records'] = $this->display_model->vo3general($data['rpt_no']);

		if (isset($data['records'][0]->vvfReportNo)){
			$data['DateStart'] = date_format(new DateTime($data['records'][0]->vvfDateStart), 'd-m-Y');
			$data['DateEnd'] = date_format(new DateTime($data['records'][0]->vvfDateEnd), 'd-m-Y');
			$data['DatemStart'] = date('m',strtotime($data['DateStart']));
			$data['DateyStart'] = date('y',strtotime($data['DateStart']));
			$data['DatemEnd'] = date('m',strtotime($data['DateEnd']));

			if(($data['DatemStart'] > 6) && ($data['DatemEnd'] > 6)){
				$data['Date2Start'] = '01-01-'.date('Y',strtotime($data['DateStart']));
				$data['Date2End'] = '30-06-'.date('Y',strtotime($data['DateEnd']));
				$data['Period'] = 'P1'.$data['DateyStart'];
				$data['Date2year'] =  date('Y',strtotime($data['DateStart']));
			}
			else{
				$data['Date2Start'] = '01-07-'.((date('Y',strtotime($data['DateStart'])))-1);
				$data['Date2End'] = '31-12-'.((date('Y',strtotime($data['DateEnd'])))-1);
				$data['Period'] = 'P2'.sprintf('%02d',($data['DateyStart']-1));
				$data['Date2year'] =  ((date('Y',strtotime($data['DateStart'])))-1);
			}
		}
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vo3_vvf_update",$data);
	}
	public function vo3_vvf_confirm(){
		$data['rpt_no'] = $this->input->get('rpt_no');
		$this->load->model("display_model");
		$data['records'] = $this->display_model->vo3general($data['rpt_no']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vo3_vvf_confirm",$data);
	}
	public function vo3_Signatories(){
		$data['rpt_no'] = $this->input->get('rpt_no');
		$this->load->model("display_model");
		$data['records'] = $this->display_model->vo3general($data['rpt_no']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vo3_Signatories",$data);
	}
	public function vo3_Signatories_update(){
		$data['rpt_no'] = $this->input->get('rpt_no');
		$this->load->model("display_model");
		$data['records'] = $this->display_model->vo3general($data['rpt_no']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vo3_Signatories_update",$data);
	}
	public function vo3_Signatories_confirm(){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vo3_Signatories_confirm");
	}
	public function vo3_Assets(){

		$data['m'] = ($this->input->get('m') <> 0) ? $this->input->get('m') : NULL;
		$data['rpt_no'] = $this->input->get('rpt_no');
		$data['period'] = explode('/',$data['rpt_no']);
		$this->load->model("display_model");
		$data['records'] = $this->display_model->assets_vvf_list($data['rpt_no'],$data['m']);
		//$data['record'] = $this->display_model->asset_vvf_dcomm($data['rpt_no']);

		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vo3_Assets",$data);
	}
	public function vo3_Asset_Number(){
		$data['rpt_no'] = $this->input->get('rpt_no');
		$data['assetno'] = $this->input->get('asset');
		$this->load->model("display_model");
		$data['records'] = $this->display_model->assets_vvf_disp($data['rpt_no'],$data['assetno']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vo3_Asset_Number",$data);
	}
	public function vo3_remark_update(){
		$data['rpt_no'] = $this->input->get('rpt_no');
		$data['assetno'] = $this->input->get('asset');
		$this->load->model("display_model");
		$data['records'] = $this->display_model->assets_vvf_disp($data['rpt_no'],$data['assetno']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vo3_remark_update",$data);
	}
	public function vo3_remark_confirm(){
		$data['rpt_no'] = $this->input->get('rpt_no');
		$data['assetno'] = $this->input->get('asset');
		$this->load->model("display_model");
		$data['records'] = $this->display_model->assets_vvf_disp($data['rpt_no'],$data['assetno']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vo3_remark_confirm",$data);
	}
	public function vo3_Rates(){
		$data['m'] = ($this->input->get('m') <> 0) ? $this->input->get('m') : NULL;
		$data['rpt_no'] = $this->input->get('rpt_no');
		$data['period'] = explode('/',$data['rpt_no']);
		$this->load->model("display_model");
		$data['records'] = $this->display_model->assets_vvf_list($data['rpt_no'],$data['m']);

		$ntotal = 0;
		foreach ($data['records'] as $row){
			if (strlen($row->vvfFeeDW) == 0){
				echo '0.00%';
			}
			else{
				//echo $row->vvfFeeDW.'<br>';

				$ntotal+= $row->vvfFeeDW;
				$data['nTotalDW'] = $ntotal.'<br>';
				//print_r($data['t']);
			}
		}

		foreach ($data['records'] as $row){
			if (strlen($row->vvfFeePW) == 0){
				echo '0.00%';
			}
			else{
				//echo $row->vvfFeeDW.'<br>';

				$ntotal+= $row->vvfFeePW;
				$data['nTotalPW'] = $ntotal.'<br>';
				//print_r($data['t']);
			}
		}

		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vo3_Rates", $data);
	}
	public function vo3_Rates_update(){
		$data['m'] = ($this->input->get('m') <> 0) ? $this->input->get('m') : NULL;
		$data['rpt_no'] = $this->input->get('rpt_no');
		$data['period'] = explode('/',$data['rpt_no']);
		$this->load->model("display_model");
		$data['records'] = $this->display_model->assets_vvf_list($data['rpt_no'],$data['m']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vo3_Rates_update", $data);
	}
	public function vo3_assets_main(){
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		if (($this->input->get('p')) == FALSE) {
			//echo "kerbau";
			if (date('m') > 6){
				$data['Period'] = "P2".date('y');
			}
			else{
				$data['Period'] = "P1".date('y');
			}
		}
		$this->load->model("display_model");
		$data['records'] = $this->display_model->list_vo3_asset($data['month'],$data['year']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vo3_assets_main", $data);
	}
	public function vo3_C_main(){
		$data['Period'] = $this->input->get('p');
		if (is_null($data['Period'])) {
			if (date('m') > 6){
				$data['Period'] = "P2".date('y');
			}
			else{
				$data['Period'] = "P1".date('y');
			}
		}
		else{
			$data['Period'] = $this->input->get('p');
			if (substr($data['Period'],0,3) == 'pP1'){
				$data['Period'] = substr_replace($data['Period'],'P2',0,3);
			}
			else if (substr($data['Period'],0,3) == 'pP2'){
				$data['Period'] = 'P1'.sprintf('%02d',(substr($data['Period'],3,2) + 1));
			}
			else if (substr($data['Period'],0,3) == 'mP1'){
				$data['Period'] = 'P2'.sprintf('%02d',(substr($data['Period'],3,2) - 1));
			}
			else if (substr($data['Period'],0,3) == 'mP2'){
				$data['Period'] = substr_replace($data['Period'],'P1',0,3);
			}
		}
		$this->load->model("get_model");
		$data['records'] = $this->get_model->volist2($data['Period']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vo3_C_main", $data);
	}
	public function vo3_rates_main(){
		if (is_null($this->input->get('p')) == FALSE) {
			if (date('m') > 6){
				$data['Period'] = "P2".date('y');
			}
			else{
				$data['Period'] = "P1".date('y');
			}
		}
		$data['o'] = $this->input->get('o');
		$this->load->model("get_model");
		$data['records'] = $this->get_model->assetrates($data['o']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vo3_rates_main", $data);
	}
	public function vo3_type_code(){
		$data['ratesid'] = $this->input->get('ratesid');
		$this->load->model('display_model');
		$data['record'] = $this->display_model->assetrates($data['ratesid']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vo3_type_code",$data);
	}
	public function vo3_rate_item_update(){
		$data['ratesid'] = $this->input->get('ratesid');
		$this->load->model('display_model');
		$data['record'] = $this->display_model->assetrates($data['ratesid']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vo3_rate_item_update",$data);
	}
	public function vo3_rate_item_confirm(){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vo3_rate_item_confirm");
	}
	public function qap3(){
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$this->load->model("get_model");
		$data['validPeriod'] = $this->get_model->validPeriod(date('F',mktime(0, 0, 0, $data['month'], 10)),$data['year']);
		$data['recordsiq'] = $this->get_model->SIQsummary_siq(date('F',mktime(0, 0, 0, $data['month'], 10)),$data['year']);
		$data['siq_no'] = 'SBE/'.$this->session->userdata('hosp_code').'/'.$data['year'].$data['month'];
		//$data['siq_no'] = 'SBE/MKA/201501'; //for test
		$data['recordcar'] = $this->get_model->SIQsummary_car($data['siq_no']);
		!empty($data['validPeriod']) ? $data['validPeriod'] = 'true' : $data['validPeriod'] = 'false';
		!is_null($data['recordsiq'][0]->ppm_siq) ? $data['PPMSIQ'] = $data['recordsiq'][0]->ppm_siq : $data['PPMSIQ'] = 0;
		!is_null($data['recordsiq'][0]->uptime_siq) ? $data['UptimeSIQ'] = $data['recordsiq'][0]->uptime_siq : $data['UptimeSIQ'] = 0;
		$data['TotalSIQ'] = $data['PPMSIQ'] + $data['UptimeSIQ'];

		!is_null($data['recordcar'][0]->ppm_car) ? $data['PPMCAR'] = $data['recordcar'][0]->ppm_car : $data['PPMCAR'] = 0;
		!is_null($data['recordcar'][0]->uptime_car) ? $data['UptimeCAR'] = $data['recordcar'][0]->uptime_car : $data['UptimeCAR'] = 0;
		$data['TotalCAR'] = $data['PPMCAR'] + $data['UptimeCAR'];

		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_qap3", $data);
	}
	public function qap3_PPM(){
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$this->load->model("get_model");
		$data['validPeriod'] = $this->get_model->validPeriod(date('F',mktime(0, 0, 0, $data['month'], 10)),$data['year']);
		!empty($data['validPeriod']) ? $data['validPeriod'] = 'true' : $data['validPeriod'] = 'false';
		$data['records'] = $this->get_model->SIQDetails(date('F',mktime(0, 0, 0, $data['month'], 10)),$data['year']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_qap3_PPM", $data);
	}
	public function qap3_SIQ(){
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$this->load->model("get_model");
		$data['validPeriod'] = $this->get_model->validPeriod(date('F',mktime(0, 0, 0, $data['month'], 10)),$data['year']);
		!empty($data['validPeriod']) ? $data['validPeriod'] = 'true' : $data['validPeriod'] = 'false';
		$data['records'] = $this->get_model->SIQDetails(date('F',mktime(0, 0, 0, $data['month'], 10)),$data['year']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_qap3_SIQ", $data);
	}
	public function qap3_SIQ_Number_update(){
		$data['ssiq'] = $this->input->get('ssiq');
		$this->load->model("display_model");
		$data['records'] = $this->display_model->SIQdetail_disp($data['ssiq']);
		if (strlen($data['records'][0]->siq_asset) > 0){
			$data['assetgroup'] = $this->display_model->SIQAssetGroup($data['records'][0]->siq_asset);
		}
		$data['SIQWOlist'] = $this->display_model->SIQWOlist($data['records'][0]->ind_code,$data['ssiq']);
		$data['SIQ_CARdisp'] = $this->display_model->SIQ_CARdisp($data['ssiq']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_qap3_SIQ_Number_update", $data);
	}
	public function qap3_SIQ_number_Create(){
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
		!empty($data['recordasset']) ? $data['assetcode'] = $data['recordasset'][0]->v_Equip_Code.' - '.$data['recordasset'][0]->v_Equip_Desc : $data['assetcode'] = '';
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_qap3_SIQ_number_Create",$data);
	}
	public function qap3_SIQ_number_confirm(){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_qap3_SIQ_number_confirm");
	}
	public function qap3_asset(){
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$this->load->model("get_model");
		$data['validPeriod'] = $this->get_model->validPeriod(date('F',mktime(0, 0, 0, $data['month'], 10)),$data['year']);
		!empty($data['validPeriod']) ? $data['validPeriod'] = 'true' : $data['validPeriod'] = 'false';

		$data['limit'] = 15;
		isset($_GET['numrow']) ? $data['numrow'] = $_GET['numrow'] : $data['numrow'] = 1;
		isset($_GET['p']) ? $data['page'] = $_GET['p'] : $data['page'] = 1;
		$data['start'] = ($data['page'] * $data['limit']) - $data['limit'];
		$data['rec'] = $this->get_model->qap3_asset($data['year'],$data['month']);

		if($data['rec'][0]->jumlah > ($data['page'] * $data['limit']) ){
			$data['next'] = ++$data['page'];
		}

		$data['records'] = $this->get_model->qap3_assetlim($data['year'],$data['month'],$data['limit'],$data['start']);

		//$data['records'] = $this->get_model->qap3_asset($data['year'],$data['month']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_qap3_asset", $data);
	}
	public function qap3_asset_n_SIQ(){
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$this->load->model("get_model");
		$data['validPeriod'] = $this->get_model->validPeriod(date('F',mktime(0, 0, 0, $data['month'], 10)),$data['year']);
		!empty($data['validPeriod']) ? $data['validPeriod'] = 'true' : $data['validPeriod'] = 'false';

		$data['limit'] = 15;
		isset($_GET['numrow']) ? $data['numrow'] = $_GET['numrow'] : $data['numrow'] = 1;
		isset($_GET['p']) ? $data['page'] = $_GET['p'] : $data['page'] = 1;
		$data['start'] = ($data['page'] * $data['limit']) - $data['limit'];
		$data['rec'] = $this->get_model->qap3_asset_noSIQ($data['year'],$data['month']);

		if($data['rec'][0]->jumlah > ($data['page'] * $data['limit']) ){
			$data['next'] = ++$data['page'];
		}

		$data['records'] = $this->get_model->qap3_asset_noSIQlim($data['year'],$data['month'],$data['limit'],$data['start']);

		//$data['records'] = $this->get_model->qap3_asset_noSIQ($data['year'],$data['month']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_qap3_asset_n_SIQ", $data);
	}
	public function qap3_asset_E(){
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$this->load->model("get_model");
		$data['validPeriod'] = $this->get_model->validPeriod(date('F',mktime(0, 0, 0, $data['month'], 10)),$data['year']);
		!empty($data['validPeriod']) ? $data['validPeriod'] = 'true' : $data['validPeriod'] = 'false';

		$data['limit'] = 15;
		isset($_GET['numrow']) ? $data['numrow'] = $_GET['numrow'] : $data['numrow'] = 1;
		isset($_GET['p']) ? $data['page'] = $_GET['p'] : $data['page'] = 1;
		$data['start'] = ($data['page'] * $data['limit']) - $data['limit'];
		$data['rec'] = $this->get_model->qap3_asset_Ex($data['year'],$data['month']);

		if($data['rec'][0]->jumlah > ($data['page'] * $data['limit']) ){
			$data['next'] = ++$data['page'];
		}

		$data['records'] = $this->get_model->qap3_asset_Exlim($data['year'],$data['month'],$data['limit'],$data['start']);

		//$data['records'] = $this->get_model->qap3_asset_Ex($data['year'],$data['month']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_qap3_asset_E", $data);
	}
	public function qap3_wo(){
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$this->load->model("get_model");
		$data['validPeriod'] = $this->get_model->validPeriod(date('F',mktime(0, 0, 0, $data['month'], 10)),$data['year']);
		!empty($data['validPeriod']) ? $data['validPeriod'] = 'true' : $data['validPeriod'] = 'false';

		$data['limit'] = 10;
		isset($_GET['numrow']) ? $data['numrow'] = $_GET['numrow'] : $data['numrow'] = 1;
		isset($_GET['p']) ? $data['page'] = $_GET['p'] : $data['page'] = 1;
		$data['start'] = ($data['page'] * $data['limit']) - $data['limit'];
		$data['rec'] = $this->get_model->qap3_wo($data['year'],$data['month']);

		if($data['rec'][0]->jumlah > ($data['page'] * $data['limit']) ){
			$data['next'] = ++$data['page'];
		}

		$data['records'] = $this->get_model->qap3_wolim($data['year'],$data['month'],$data['limit'],$data['start']);

		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_qap3_wo", $data);
	}
	public function qap3_wo_n_SIQ(){
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$this->load->model("get_model");
		$data['validPeriod'] = $this->get_model->validPeriod(date('F',mktime(0, 0, 0, $data['month'], 10)),$data['year']);
		!empty($data['validPeriod']) ? $data['validPeriod'] = 'true' : $data['validPeriod'] = 'false';
//$data['records'] = $this->get_model->qap3_wo_noSIQ($data['year'],$data['month']);

		$data['limit'] = 15;
		isset($_GET['numrow']) ? $data['numrow'] = $_GET['numrow'] : $data['numrow'] = 1;
		isset($_GET['p']) ? $data['page'] = $_GET['p'] : $data['page'] = 1;
		$data['start'] = ($data['page'] * $data['limit']) - $data['limit'];
		$data['rec'] = $this->get_model->qap3_wo_noSIQ($data['year'],$data['month']);

		if($data['rec'][0]->jumlah > ($data['page'] * $data['limit']) ){
			$data['next'] = ++$data['page'];
		}

		$data['records'] = $this->get_model->qap3_wo_noSIQlim($data['year'],$data['month'],$data['limit'],$data['start']);
		//print_r ($data['records']);
//exit();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_qap3_wo_n_SIQ", $data);
	}
	public function qap3_wo_order(){
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$this->load->model("get_model");
		$data['validPeriod'] = $this->get_model->validPeriod(date('F',mktime(0, 0, 0, $data['month'], 10)),$data['year']);
		!empty($data['validPeriod']) ? $data['validPeriod'] = 'true' : $data['validPeriod'] = 'false';

		$data['limit'] = 15;
		isset($_GET['numrow']) ? $data['numrow'] = $_GET['numrow'] : $data['numrow'] = 1;
		isset($_GET['p']) ? $data['page'] = $_GET['p'] : $data['page'] = 1;
		$data['start'] = ($data['page'] * $data['limit']) - $data['limit'];
		$data['rec'] = $this->get_model->qap3_wo_Exc($data['year'],$data['month']);
		if($data['rec'][0]->jumlah > ($data['page'] * $data['limit']) ){
			$data['next'] = ++$data['page'];
		}

		$data['records'] = $this->get_model->qap3_wo_Exclim($data['year'],$data['month'],$data['limit'],$data['start']);

		//$data['records'] = $this->get_model->qap3_wo_Exc($data['year'],$data['month']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_qap3_wo_order", $data);
	}
	public function qap3_analysisv4(){
		$data['fyear']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['fmonth']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['tyear']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['tmonth']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");

		isset($_POST['fromMonth']) && isset($_POST['fromYear']) ? $data['fromDate'] = $_POST['fromYear'].'-'.$_POST['fromMonth'].'-01' : $data['fromDate'] = $data['fyear'].'-'.$data['fmonth'].'-01' ;
		isset($_POST['toMonth']) && isset($_POST['toYear']) ? $data['toDate'] = $_POST['toYear'].'-'.$_POST['toMonth'].'-01' : $data['toDate'] = $data['tyear'].'-'.$data['tmonth'].'-01' ;

		$this->load->model('display_model');
		$data['recordqcppm'] = $this->display_model->qap3_QCPPM_analysis($data['fromDate'], $data['toDate']);
		$data['recordqcuptime'] = $this->display_model->qap3_QCUptime_analysis($data['fromDate'], $data['toDate']);
		if(!empty($data['recordqcppm'])){
		foreach ($data['recordqcppm'] as $row){
			$data['Occurance'][] = $row->Occurance;
			$data['totalOcc'] = array_sum($data['Occurance']);

		}
		}
		if(!empty($data['recordqcuptime'])){
		foreach ($data['recordqcuptime'] as $val){
			$data['downtime'][] = $val->total_down_time;
			$data['totalDT'] = array_sum($data['downtime']);
		}
		}
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_qap3_analysisv4", $data);
	}
	public function qap3_analysisv4x(){
		$data['fyear']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['fmonth']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['tyear']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['tmonth']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");

		isset($_POST['fromMonth']) && isset($_POST['fromYear']) ? $data['fromDate'] = $_POST['fromYear'].'-'.$_POST['fromMonth'].'-01' : $data['fromDate'] = $data['fyear'].'-'.$data['fmonth'].'-01' ;
		isset($_POST['toMonth']) && isset($_POST['toYear']) ? $data['toDate'] = $_POST['toYear'].'-'.$_POST['toMonth'].'-01' : $data['toDate'] = $data['tyear'].'-'.$data['tmonth'].'-01' ;

		$this->load->model('display_model');
		$data['qap3_report'] = $this->display_model->qap3_report($data['fromDate'], $data['toDate']);
		$data['qap3_reportsiq'] = $this->display_model->qap3_reportsiq($data['fromDate'], $data['toDate']);
		$data['qap3reportcaro'] = $this->display_model->qap3reportcaro($data['fromDate'], $data['toDate']);
		$data['qap3reportcarc'] = $this->display_model->qap3reportcarc($data['fromDate'], $data['toDate']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_qap3_analysisv4x", $data);
	}

	public function assetPPMplannerupdate (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_PPMplanner_update");
	}

	public function assetPPMplannerupdatesv (){

	//echo 'dpat masuk ppm set aarrr<br>';
	$checkBox = implode(',', $_POST['weeks']);
	//print_r($checkBox);
	//exit();
	//echo 'pilihan weeks : '.$checkBox.'<br>';
	//echo 'asset : '.$this->input->post('n_asset_no').'<br>';
	//echo 'year : '.$this->input->post('n_year').'<br>';
	//exit();
	$insert_data = array(

					'v_Asset_no'=>$this->input->post('n_asset_no'),
					'v_Year'=>$this->input->post('n_year'),
					'v_Weeksch'=>$checkBox,


		);

		$this->load->model('update_model');
		$this->update_model->pmis2_egm_assetjobtypeid($insert_data,$this->input->post('assetjt'));

		redirect("contentcontroller/assetPPMjob?asstno=".$this->input->post('n_asset_no')."&tab=6");

		//$this ->load->view("head");
		//$this ->load->view("left");
		//$this ->load->view("content_asset_PPMplanner_update");
	}


	public function assetlicenses_detail (){

		$data['error'] = 2;
	  $data['liccode'] = $this->input->get('liccd');
		$this->load->model("get_model");
		$data['lic'] = $this->get_model->licensesandcertbycode($data['liccode']);
		$data['licimg'] = $this->get_model->licenseimage($data['liccode']);
		$this ->load->view("head");
		$this ->load->view("left",$data);
		$this ->load->view("content_assetlicenses_detail", $data);
	}
	public function assetlicenses_edit (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_licenses_Edit");
	}
	public function assetlicenses_confirm_update (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_licenses_confirm_update");
	}

	public function assetlicenses_confirm_updatesv (){

		$config['upload_path'] = 'C:\inetpub\wwwroot\FEMSHospital_v3\uploadlicenseimages';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '5000';
		$config['max_width']  = 'auto';
		$config['max_height']  = 'auto';
	//if ($this->input->post('upload_data') == ''){
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload())
		{
			$data['error'] = array($this->upload->display_errors());
			if ($this->input->post('upload_data') == ''){
				$data['upload_data'] = NULL;
			}
			else{
				$data['upload_data'] = $this->input->post('upload_data');
			}
	//print_r($data['error']) ;
	//exit();
			$data['liccode'] = $this->input->post('liccd');
			if ($data['liccode'] <> ''){
				$this->load->model("get_model");
				$data['licimg'] = $this->get_model->licenseimage($data['liccode']);
			}
			else{
				$data['licimg'] = NULL;
			}
		}
		else
		{
				//echo 'masuk error1';
	//exit();
			$data['upload_data'] = $this->upload->data();
			//$data['upload_data']['asset_no'] = $data['assetn'];
			$data['upload_data']['service_code'] = $this->session->userdata('usersess');
			$data['upload_data']['hospital'] = $this->session->userdata('hosp_code');
			$data['upload_data']['action_flag'] = 'I';

			$data['licimg'] = NULL;
		}
	//}
	//else{
	//	$data['upload_data'] = $this->input->post('upload_data');
	//	$data['licimg'] = NULL;
	//}
//print_r($data['upload_data']) ;
//exit();

	// load libraries for URL and form processing
    $this->load->helper(array('form', 'url'));
    // load library for form validation
    $this->load->library('form_validation');
			//echo 'masuk0';
			//exit();

	//validation rule
	$this->form_validation->set_rules('n_Certificate_Number','Certificate Number','trim|required|callback_check[Certificate Number]');
	$this->form_validation->set_rules('n_Registration_Number','Registration Number','trim|required|callback_check[Registration Number]');
	$this->form_validation->set_rules('n_Start_On','Start On','trim|required|callback_check[Start On]');
	$this->form_validation->set_rules('n_Expire_On','Expire On','trim|required|callback_check[Expire On]');
	$this->form_validation->set_rules('n_Grade','Grade','trim|required|callback_check[Grade]');
	$this->form_validation->set_rules('n_Agency_Code','Agency Code','trim|required|callback_check[Agency Code]');
	$this->form_validation->set_rules('n_Agency_Name','Agency Name','trim|required|callback_check[Agency Name]');
	$this->form_validation->set_rules('n_Category_Code','Category Code','trim|required|callback_check[Category Code]');
	$this->form_validation->set_rules('n_Category_Description','Category Description','trim|required|callback_check[Category Description]');
	$this->form_validation->set_rules('n_tester','Tester Name','trim');
	$this->form_validation->set_rules('n_Identification_Type','Identification Type','trim');
	$this->form_validation->set_rules('n_Identification_Code','Identification Code','trim');
	$this->form_validation->set_rules('n_Description','Description','trim');
	$this->form_validation->set_rules('n_Remarks','Remarks','trim');

	if($this->form_validation->run()==FALSE)
		{
		$data['error'] = 0;
		$data['add'] = 1;
		$this ->load->view("head");
		//$this ->load->view("left",$data);
		$this ->load->view("content_asset_licenses_update",$data);
		}

		else
		{
		$data['error'] = 1;
		$data['add'] = 0;
		$this ->load->view("head");
		// $this ->load->view("left",$data);
		$this ->load->view("content_asset_licenses_confirm",$data);
		}
	}
	function confirmation_assetlicenses_updatesv(){
	//echo $this->input->post('liccd');
	//exit();
	if ($this->input->post('liccd') <> ''){
	$insert_data = array(

					'v_IdentificationType'=>$this->input->post('n_Identification_Type'),
					'v_Identification'=>$this->input->post('n_Description'),
					'v_RegistrationNo'=>$this->input->post('n_Registration_Number'),
					'v_StartDate'=>$this->input->post('n_Start_On'),
					'v_ExpiryDate'=>$this->input->post('n_Expire_On'),
					'v_GradeID'=>$this->input->post('n_Grade'),
					'v_AgencyCode'=>$this->input->post('n_Agency_Code'),
					'v_LicenseCategoryCode'=>$this->input->post('n_Category_Code'),
					'v_Remarks'=>$this->input->post('n_Remarks'),
					'v_actionflag'=>'U',
					'd_timestamp'=>date('Y-m-d H:i:s'),
					'v_Key'=>$this->input->post('n_Identification_Code'),
					'v_CertificateNo'=>$this->input->post('n_Certificate_Number'),
					'v_TesterName' => $this->input->post('n_tester')

		);

		$this->load->model('update_model');
		$this->update_model->pmis2_egm_lnc_lincense_details($insert_data,$this->input->post('liccd'));

		$data['upload_data'] = $this->input->post('upload_data');
		if ($data['upload_data']){
			$data['upload_data']['licenses_no'] = $this->input->post('liccd');
			//print_r($data['upload_data']);
			//exit();
			$this->insert_model->license_image($data['upload_data']);
		}
	}
	else {

		//echo 'jjjj';
		//exit();
		$insert_data = array(


					'v_CertificateNo'=>$this->input->post('n_Certificate_Number'),
					'v_ServiceCode'=>$this->session->userdata('usersess'),
					'v_AgencyCode'=>$this->input->post('n_Agency_Code'),
					'v_LicenseCategoryCode'=>$this->input->post('n_Category_Code'),
					'v_IdentificationType'=>$this->input->post('n_Identification_Type'),
					'v_Identification'=>$this->input->post('n_Description'),
					'v_RegistrationNo'=>$this->input->post('n_Registration_Number'),
					'v_StartDate'=>$this->input->post('n_Start_On'),
					'v_ExpiryDate'=>$this->input->post('n_Expire_On'),
					'v_GradeID'=>$this->input->post('n_Grade'),
					'v_Remarks'=>$this->input->post('n_Remarks'),
					'v_hospitalcode'=>$this->session->userdata('hosp_code'),
					'v_actionflag'=>'I',
					'd_timestamp'=>date('Y-m-d H:i:s'),
					'v_Key'=>$this->input->post('n_Identification_Code'),
					'v_TesterName' => $this->input->post('n_tester')

		);
			$this->load->model('insert_model');
			$id = $this->insert_model->pmis2_egm_lnc_lincense_details($insert_data);

			$data['upload_data'] = $this->input->post('upload_data');
			if ($data['upload_data']){
				$data['upload_data']['licenses_no'] = $id;
				$this->insert_model->license_image($data['upload_data']);
			}
		}
			redirect("contentcontroller/Licenses");
	}

	public function print_workorder(){
	  	$this->load->model("get_model");
	  	$data['wrk_ord'] = $this->input->get('wrk_ord');
	  	$this->load->model("display_model");

		$data['hosp'] = $this->display_model->list_hospinfo();
		$data['woinfo'] = $this->get_model->request_update($data['wrk_ord']);
    //echo "tunggu..";
    //exit();
		$data['woinfo2'] = $this->display_model->request_tab($data['wrk_ord']);
    $data['woAP19'] = $this->get_model->request_updateAP19($data['wrk_ord']);
		$data['resprec'] = $this->display_model->response_tab($data['wrk_ord']);
		$data['rvisit1'] = $this->display_model->visit1_tab($data['wrk_ord']);
		$data['recordjob'] = $this->display_model->jobclose_tab($data['wrk_ord']);
		//print_r($data['recordjob']);
		//exit();
		$count = 1;
		$countpart = 1;
		$countact = 1;
		$data['personallist'] = array();
		$data['partlist'] = array();
		$data['actiontaken'] = array();
		foreach ($data['rvisit1'] as $row){
				for($i = 1; $i <= 3; $i++){
					$personal = 'v_Personal'.$i;
					if (($row->$personal) AND ($row->$personal <> 'N/A-') AND $count <= 5){
					$data['personallist'][] = array($row->$personal,
											date("d-m-Y",strtotime($row->d_Date)),
											$row->v_Time,
											$row->v_Etime);
					$count++;
					}
				}

				if (($row->v_PartName) AND ($row->v_PartName <> 'N/A') AND $countpart <= 5){
				$data['partlist'][] = array($row->v_PartName,
											$row->n_PartAmount,
											$row->n_PartTotal);

				$countpart++;
				}

				if (($row->v_ActionTaken) AND ($row->v_ActionTaken <> 'N/A') AND $countact <= 4){
				$data['actiontaken'][] = array($row->v_ActionTaken);
				$countact++;
				}

		}
		if (count($data['personallist']) < 5){
			$rowbal = 5 - count($data['personallist']);
			for($k=1; $k <= $rowbal; $k++){
			$data['personallist'][] = array(NULL,NULL,NULL,NULL);
			}
		}
		if (count($data['partlist']) < 5){
			$rowbal = 5 - count($data['partlist']);
			for($k=1;$k <= $rowbal; $k++){
			$data['partlist'][] = array(NULL,NULL,NULL);
			}
		}
		if (count($data['actiontaken']) < 4){
			$rowbal = 4 - count($data['actiontaken']);
			for($k=1;$k <= $rowbal; $k++){
			$data['actiontaken'][] = array(NULL);
			}
		}
		//echo count($data['array']);
		//print_r($data);
		//exit();
		//$this ->load->view("headprinter");
		//$this ->load->view("Content_workorder_print", $data);
		$this ->load->view("headprinter");
		if($data['woinfo2'][0]->V_request_type=='AP19'){
		$this->load->view("Content_workorder_print_AP19", $data);
		}else{
		$this->load->view("Content_workorder_print", $data);
        }
	}
	public function testlaa(){
		//$this ->load->view("headprinter");
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("test2");
	}
		public function print_wos(){
		$this->load->model("display_model");
		$data['hosp'] = $this->display_model->list_hospinfo();
		 $data['wrk_ord'] = $this->input->get('wrk_ord');
	  $this->load->model("get_model");
		$data['woinfo'] = $this->get_model->request_update($data['wrk_ord']);
		$this ->load->view("headprinter");
		$this ->load->view("Content_print_wos", $data);
	}
	/***  PPM   **/
	public function wo(){
		$data['wrk_ord'] = $this->input->get('wrk_ord');
		$this->load->model("display_model");
		//echo "lepas yg nie";
		//exit();
		$data['record'] = $this->display_model->wo_ppm($data['wrk_ord']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_wo",$data);
	}
	public function wo_update(){
		$data['wrk_ord'] = $this->input->get('wrk_ord');
		$this->load->model("display_model");
		$data['record'] = $this->display_model->wo_ppmupdate($data['wrk_ord']);
		//print_r($data['record']);
		//exit();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_wo_update",$data);
	}
	public function wo_confirm(){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_wo_confirm");
	}
	public function v1(){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_v1");
	}
	public function v2(){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_v2");
	}
	public function v3(){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_v3");
	}
	public function PI(){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_PI");
	}
	public function job(){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_job");
	}
	public function tech(){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_tech");
	}
	public function clau(){
		$data['wrk_ord'] = $this->input->get('wrk_ord');
		$this->load->model('display_model');
		$data['record'] = $this->display_model->clause_rec($data['wrk_ord']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_clau",$data);
	}
	public function print_ppm(){
	  	$this->load->model("display_model");
	  	$this->load->model("get_model");
	  	if ($this->input->get('wrk_ord') <> '') {
	  	//echo 'masuk wo<br>';
		//$data['hosp'] = $this->display_model->list_hospinfo();
		$data['wrk_ord'] = $this->input->get('wrk_ord');

		$data['woinfo'] = $this->get_model->ppminfo($data['wrk_ord']);
		//$data['woinfo2'] = $this->display_model->ppm_tab($data['wrk_ord']);
		$data['rvisit1'] = $this->display_model->visit1ppm_tab($data['wrk_ord']);
		$data['recordjob'] = $this->display_model->jobclose_ppm($data['wrk_ord']);

			$count = 1;
			$countpart = 1;
			$countact = 1;
			$countresch = 1;
			$data['personallist'] = array();
			$data['partlist'] = array();
			$data['actiontaken'] = array();
			$data['reschreason'] = array();
			$data['completed_by'] = array();
			foreach ($data['rvisit1'] as $row){
					for($i = 1; $i <= 3; $i++){
						$personal = 'v_Personal'.$i;
						if (($row->$personal) AND ($row->$personal <> 'N/A-') AND $count <= 6){
						$data['personallist'][] = array($row->$personal,
												date("d-m-Y",strtotime($row->d_Date)),
												$row->v_Time,
												$row->v_Etime);
						$count++;
						}
					}

					if (($row->v_PartName) AND ($row->v_PartName <> 'N/A') AND $countpart <= 6){
					$data['partlist'][] = array($row->v_PartName,
												$row->n_PartAmount,
												$row->n_PartTotal);

					$countpart++;
					}

					if (($row->v_ActionTaken) AND ($row->v_ActionTaken <> 'N/A') AND $countact <= 5){
					$data['actiontaken'][] = array($row->v_ActionTaken);
					$countact++;
					}

					if (($row->v_ReschReason) AND ($row->v_ReschReason <> ' : N/A') AND $countresch <= 3){
					$data['reschreason'][] = array($row->v_ReschReason);
					$countresch++;
					}

					if ($data['recordjob']){
						if (($row->$personal) AND ($row->$personal <> 'N/A-')){
							$data['completed_by'] = $row->$personal;
						}
					}

			}
			if (count($data['personallist']) < 6){
				$rowbal = 6 - count($data['personallist']);
				for($k=1; $k <= $rowbal; $k++){
				$data['personallist'][] = array(NULL,NULL,NULL,NULL);
				}
			}
			if (count($data['partlist']) < 6){
				$rowbal = 6 - count($data['partlist']);
				for($k=1;$k <= $rowbal; $k++){
				$data['partlist'][] = array(NULL,NULL,NULL);
				}
			}
			if (count($data['actiontaken']) < 5){
				$rowbal = 5 - count($data['actiontaken']);
				for($k=1;$k <= $rowbal; $k++){
				$data['actiontaken'][] = array(NULL);
				}
			}
			if (count($data['reschreason']) < 3){
				$rowbal = 3 - count($data['reschreason']);
				for($k=1;$k <= $rowbal; $k++){
				$data['reschreason'][] = array(NULL);
				}
			}
			if ($data['recordjob']){
				$data['dateclosed'] = explode(" ",$data['recordjob'][0]->d_DateDone);
			}
			else{
				$data['dateclosed'] = NULL;
			}
			if(!($data['completed_by'])){
				$data['completed_by'] = NULL;
			}
			$data['record'][$data['wrk_ord']] = array($data['woinfo'],$data['personallist'],$data['partlist'],$data['actiontaken'],$data['reschreason'],$data['completed_by'],$data['dateclosed'],$data['wrk_ord']);
			//print_r($data['record']);
			//exit();
		}
		else{
			//echo 'masuk bulk<br>';
			if ($this->input->post('chk_bxppm')){
			//echo 'masuk DATA1<br>';
			foreach($this->input->post('chk_bxppm') as $wrkno){
				//echo 'masuk DATA1-1<br>';
				$data['woinfo'] = $this->get_model->ppminfo($wrkno);
				//$data['woinfo2'] = $this->display_model->ppm_tab($wrkno);
				$data['rvisit1'] = $this->display_model->visit1ppm_tab($wrkno);
				$data['recordjob'] = $this->display_model->jobclose_ppm($wrkno);

					$count = 1;
					$countpart = 1;
					$countact = 1;
					$countresch = 1;
					$data['personallist'] = array();
					$data['partlist'] = array();
					$data['actiontaken'] = array();
					$data['reschreason'] = array();
					$data['completed_by'] = array();
					foreach ($data['rvisit1'] as $row){
						//echo 'masuk DATA1-2<br>';
							for($i = 1; $i <= 3; $i++){
								$personal = 'v_Personal'.$i;
								if (($row->$personal) AND ($row->$personal <> 'N/A-') AND $count <= 6){
								$data['personallist'][] = array($row->$personal,
														date("d-m-Y",strtotime($row->d_Date)),
														$row->v_Time,
														$row->v_Etime);
								$count++;
								}
							}

							if (($row->v_PartName) AND ($row->v_PartName <> 'N/A') AND $countpart <= 6){
							$data['partlist'][] = array($row->v_PartName,
														$row->n_PartAmount,
														$row->n_PartTotal);

							$countpart++;
							}

							if (($row->v_ActionTaken) AND ($row->v_ActionTaken <> 'N/A') AND $countact <= 5){
							$data['actiontaken'][] = array($row->v_ActionTaken);
							$countact++;
							}

							if (($row->v_ReschReason) AND ($row->v_ReschReason <> ' : N/A') AND $countresch <= 3){
							$data['reschreason'][] = array($row->v_ReschReason);
							$countresch++;
							}

							if ($data['recordjob']){
								if (($row->$personal) AND ($row->$personal <> 'N/A-')){
									$data['completed_by'] = $row->$personal;
								}
							}

					}
					if (count($data['personallist']) < 6){
						$rowbal = 6 - count($data['personallist']);
						for($k=1; $k <= $rowbal; $k++){
						$data['personallist'][] = array(NULL,NULL,NULL,NULL);
						}
					}
					if (count($data['partlist']) < 6){
						$rowbal = 6 - count($data['partlist']);
						for($k=1;$k <= $rowbal; $k++){
						$data['partlist'][] = array(NULL,NULL,NULL);
						}
					}
					if (count($data['actiontaken']) < 5){
						$rowbal = 5 - count($data['actiontaken']);
						for($k=1;$k <= $rowbal; $k++){
						$data['actiontaken'][] = array(NULL);
						}
					}
						if (count($data['reschreason']) < 3){
							$rowbal = 3 - count($data['reschreason']);
							for($k=1;$k <= $rowbal; $k++){
							$data['reschreason'][] = array(NULL);
							}
						}
					if ($data['recordjob']){
						$data['dateclosed'] = explode(" ",$data['recordjob'][0]->d_DateDone);
					}
					else{
						$data['dateclosed'] = NULL;
					}
					if(!($data['completed_by'])){
						$data['completed_by'] = NULL;
					}
					//echo 'masuk DATA1-3<br>';
					$data['record'][$wrkno] = array($data['woinfo'],$data['personallist'],$data['partlist'],$data['actiontaken'],$data['reschreason'],$data['completed_by'],$data['dateclosed'],$wrkno);
					//print_r($data['record']);
					//exit();
			}
			}
			else{
				//echo 'no DATA<br>';
				//redirect('contentcontroller/report_ppmbulk');
				echo '<script>window.history.back();</script>';
			}

		}
		$this ->load->view("headprinter");
		$this ->load->view("Content_ppm_print", $data);
	}
	public function print_chklist1(){
	   	$asst = "BES/16885/012";
	  	$this->load->model("display_model");
	  	if ($this->input->get('wrk_ord')){
		$data['typecd'] = $this->display_model->typecd_chklistbes($this->input->get('wrk_ord'));
		 //echo "nilaiii".$data['typecd'][0]->typee;
		//$data['asst'] = $this->display_model->typecd_chklistbess('0');
		}
		if ($this->input->get('asstno')){
			$data['typecd'] = $this->display_model->typecd_chklistbesasset(substr($this->input->get('asstno'),0,6));
		}
		$data['asst'] = $this->display_model->typecd_chklistbess($data['typecd'][0]->typee);
		//echo "nilaiiixx".$data['asst'][0]->checklist_no;
		if ($data['asst']){
			for ($x = 1; $x <= 8; $x++) {
	    		$data['_'.$x] = $this->display_model->list_chklistbes($data['asst'][0]->checklist_no, $x);
			}
		}
		//print_r($data);
		//$data['A'] = $this->display_model->list_chklist_A($asst);
		//$data['B'] = $this->display_model->list_chklist_B($asst);
		//$data['C'] = $this->display_model->list_chklist_C($asst);
		//$data['D'] = $this->display_model->list_chklist_D($asst);
		$this ->load->view("headprinter");//print_ppmcheck//print_heppm//print_dca
		$this ->load->view("Content_print_ppmcheck", $data);
	}

	/***  Report   **/
	public function report_dmc(){
	  $this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['record'] = $this->display_model->dmc_form($data['month'],$data['year']);
		$this ->load->view("headprinter");
		$this ->load->view("Content_report_dmc", $data);
	}
	public function report_rmc(){
	  $this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['record'] = $this->display_model->rmc_form($data['month'],$data['year']);
		$data['keyindlist'] = $this->display_model->keyindlist($this->session->userdata('usersess'));
		$this ->load->view("headprinter");
		$this ->load->view("Content_report_rmc", $data);
	}
	public function report_volu(){
	  //echo 'nilai : '.$this->input->post('wrty-status');
                $pilape = "";
		if ($this->input->get('serv') == "ele"){
		$pilape = "IIUM E";
		} elseif ($this->input->get('serv') == "mec"){
		$pilape = "IIUM M";
		} elseif ($this->input->get('serv') == "civ"){
		$pilape = "IIUM C";
		}
	  	$this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['fon']= ($this->input->get('fon')) ? $this->input->get('fon') : "";
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['reqtype']= $this->input->get('req') ? $this->input->get('req') : '';
		$data['grpsel']= $this->input->get('grp') ? $this->input->get('grp') : '';
		$data['tag']= $this->input->get('tag') ? $this->input->get('tag') : '';
		$data['cm']= $this->input->get('cm') ? $this->input->get('cm') : '';
		$data['limab']= $this->input->get('limab') ? $this->input->get('limab') : '0';
		$data['bfwd'] = array();
		if (($data['tag'] == 'total') || ($data['tag'] == 'totala10'))
		{
			$data['records'] = $this->display_model->broughtfwd($data['month'],$data['year']);
			//$data['bfwd'] = array();
			foreach ($data['records'] as $row){
				if (($row->notcomp != 0) && ($row->comp != 0)){
					$data['bfwd'][] = $row->month;
				}
			}
		}
		$data['record'] = $this->display_model->rpt_volu($data['month'],$data['year'],$this->input->get('stat'),$data['reqtype'],$this->input->get('broughtfwd'),$data['grpsel'],$pilape,$data['tag'],$data['cm'],$data['limab'],$data['bfwd'],"",$data['fon']);

		//print_r($data['record']);
		//exit();
		//$this ->load->view("headprinter");
		//$this ->load->view("Content_report_volu", $data);
		if ($this->input->get('pdf') == 1){
		$this ->load->view("Content_report_volu_pdf", $data);
		}else{
		$this ->load->view("headprinter");
      if ($data['reqtype']=="AP19") {
		      $this ->load->view("Content_report_voluap19", $data);
      }else {
		      $this ->load->view("Content_report_volu", $data);
      }
		}
	}
	public function report_volc(){
	  //echo 'nilai : '.$this->input->post('wrty-status');
	  $this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['grpsel']= $this->input->get('grp') ? $this->input->get('grp') : '';
		$data['record'] = $this->display_model->rpt_volc($data['month'],$data['year'],$this->input->get('stat'),$data['grpsel']);
		//$this ->load->view("headprinter");
		//$this ->load->view("Content_report_volc", $data);
		if ($this->input->get('pdf') == 1){
		$this ->load->view("Content_report_volc_pdf", $data);
		}else{
		$this ->load->view("headprinter");
		$this ->load->view("Content_report_volc", $data);
		}
	}
	public function report_vols(){
	  $this->load->model("display_model");
		$data['fon']= ($this->input->get('fon')) ? $this->input->get('fon') : "";
		$data['records'] = $this->display_model->list_hospinfo();
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['grpsel']= $this->input->get('grp') ? $this->input->get('grp') : '';
                $pilape = "";
		if ($this->input->get('serv') == "ele"){
		$pilape = "IIUM E";
		} elseif ($this->input->get('serv') == "mec"){
		$pilape = "IIUM M";
		} elseif ($this->input->get('serv') == "civ"){
		$pilape = "IIUM C";
		}
		//echo "lalalalalla : " . $this->session->userdata('v_UserName');
//		if ($this->session->userdata('v_UserName') == "mariana") {
//		$data['record'] = $this->display_model->rpt_volsmar($data['month'],$data['year'], $this->input->get('stat'), $this->input->get('resch'),$data['grpsel'],$pilape);
//		} else {
		$data['record'] = $this->display_model->rpt_vols($data['month'],$data['year'], $this->input->get('stat'), $this->input->get('resch'),$data['grpsel'],$pilape,$data['fon']);
//		}
		$data['reqtype'] = 'A2';
		$data['tag'] = '';
		$data['cm']= '';
		$data['limab']= '0';
		//$data['recordrq'] = $this->display_model->rpt_volu($data['month'],$data['year'],$this->input->get('stat'),$data['reqtype'],$this->input->get('broughtfwd'),$data['grpsel'],$pilape,$data['tag'],$data['cm'],$data['limab']);
		//$this ->load->view("headprinter");
		//$this ->load->view("Content_report_vols", $data);
                if($this->input->get('pdf') == 1){
		$this ->load->view("Content_report_vols_pdf", $data);
		}else{
		$this ->load->view("headprinter");
		$this ->load->view("Content_report_vols", $data);
		}

	}
	public function report_rtlu(){
	  $this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['grpsel']= $this->input->get('grp') ? $this->input->get('grp') : '';
		$data['record'] = $this->display_model->rpt_rtlu($data['month'],$data['year'], $this->input->get('stat'),$data['grpsel']);
		//$this ->load->view("headprinter");
		//$this ->load->view("Content_report_rtlu", $data);
		if ($this->input->get('pdf') == 1){
		$this ->load->view("Content_report_rtlu_pdf", $data);
		}else{
		$this ->load->view("headprinter");
		$this ->load->view("Content_report_rtlu", $data);
		}
	}
	public function report_rsls(){
	  $this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['record'] = $this->display_model->rpt_rsls($data['month'],$data['year'], $this->input->get('stat'),$this->input->get('expiring'));
		$data['record2'] = $this->display_model->rpt_rsls2($data['month'],$data['year'], $this->input->get('stat'),$this->input->get('expiring'),$this->input->get('grp'));

		if ($this->input->get('pdf') == 1){
		$this ->load->view("Content_report_rsls_pdf", $data);
		}else{
		$this ->load->view("headprinter");
		$this ->load->view("Content_report_rsls", $data);
		}
		//$this ->load->view("headprinter");
		//$this ->load->view("Content_report_rsls", $data);
	}
	public function report_agl(){
	  $this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['record'] = $this->display_model->rpt_agl($data['month'],$data['year'],$this->input->get('grp'));
		$this ->load->view("headprinter");
		$this ->load->view("Content_report_agl", $data);
	}
	public function report_vossu(){
	$n1900Cases = 0;
	$nCErrorCases = 0;
	$nUnrespondedCases = 0;
	$nNCases = 0;
	$nECases = 0;
	$m_total = 0;
	$nOnTime = 0;
	$nLate = 0;
	$time_minN = 0;
  $time_minE = 0;
	$nNResponseTime = 0;
	$nEResponseTime = 0;
	$nCErrorNo = '';

	  $this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['record'] = $this->display_model->rpt_vossu($data['month'],$data['year']);
		if (!empty($data['record'])) {
			foreach($data['record'] as $row):
			//$respndt = ($row->v_respondate) ? strtotime($row->v_respondate) : NULL;
			if (date('Y', strtotime($row->v_respondate)) == 1900) {
				$n1900Cases = $n1900Cases  + 1;
				//s1900No = s1900No & "<a href=""wo-item4.asp?id=" & ures("v_request_no") & """ target=""_blank"">" & ures("v_request_no") & " (" & ures("v_request_status") & ")</a><br>"
			} elseif (($row->v_respondate === NULL) && ($row->v_request_status = "C")) {
				$nCErrorCases = $nCErrorCases + 1;
				$nCErrorNo = $nCErrorNo . ' ' . $row->v_request_no;//"<a href=""wo-item4.asp?id=" & ures("v_request_no") & """ target=""_blank"">" & ures("v_request_no") & " (" & ures("v_request_status") & ")</a><br>"
			} elseif ($row->v_respondate === NULL) {
				$nUnrespondedCases = $nUnrespondedCases + 1;
				//$sUnrespondedRQNo = sUnrespondedRQNo & "<a href=""wo-item4.asp?id=" & ures("v_request_no") & """ target=""_blank"">" & ures("v_request_no") & " (" & ures("v_request_status") & ")</a><br>"
			} elseif ($row->v_respondate) {

				switch ($row->v_priority_code)
				{
    		case "Normal":
				$nNCases = $nNCases + 1;
				$today = strtotime("TODAY");
				$nNResponseTime = $nNResponseTime + (strtotime('0:'.$row->d_time) - $today);
				if (strtotime('0:'.$row->d_time) <= strtotime('2:00:00')) {
							$nOnTime = $nOnTime + 1; }
						else {
							$nLate = $nLate + 1; }

				break;
    		case "Emergency":
        $nECases = $nECases + 1;
				$today = strtotime("TODAY");
				$nEResponseTime = $nEResponseTime + (strtotime($row->d_time) - $today);
				if (strtotime('0:'.$row->d_time) <= strtotime('2:00:00')) {
							$nOnTime = $nOnTime + 1; }
						else {
							$nLate = $nLate + 1; }

    		break;
				}

				$nNResponseTime = $nNResponseTime + $today;
				$nEResponseTime = $nEResponseTime + $today;

				$str_time = date('h:i:s', $nNResponseTime);
				$str_time = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $str_time);
				sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);
				$time_minN = $hours * 60 + $minutes;

				$str_time = date('h:i:s', $nEResponseTime);
				$str_time = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $str_time);
				sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);
				$time_minE = $hours * 60 + $minutes;

				/*sStart = cdate(sStart)
				sEnd = cdate(sEnd)
				sMinute = clng(datediff("N", sStart, sEnd))
				select case sPriority
					case "N"
						nNCases = nNCases + 1
						nNResponseTime = nNResponseTime + sMinute
						if sMinute <= gnMaxResponseTimeForNormalCase then
							nOnTime = nOnTime + 1
						else
							nLate = nLate + 1
						end if

					case "E"
						nECases = nECases + 1
						nEResponseTime = nEResponseTime + sMinute
						if sMinute <= gnMaxResponseTimeForEmergencyCase then
							nOnTime = nOnTime + 1
						else
							nLate = nLate + 1
						end if
					case else
						nAlienCases = nAlienCases + 1
				end select*/
			}
			endforeach;
		}
		//echo $n1900Cases.','.$nCErrorCases.','.$nUnrespondedCases;
		$data['kira'] = array(
    'n1900Cases' => $n1900Cases,
    'nCErrorCases' => $nCErrorCases,
    'nUnrespondedCases' => $nUnrespondedCases,
    'nNCases' => $nNCases,
    'nECases' => $nECases,
    'nNResponseTime' => $nNResponseTime,
    'nEResponseTime' => $nEResponseTime,
    'nOnTime' => $nOnTime,
    'nLate' => $nLate,
    'time_minN' => $time_minN,
    'time_minE' => $time_minE,
		'nCErrorNo'=> $nCErrorNo);
		//$data['kira'] = array_keys($data['record'], "Normal");
		$this ->load->view("headprinter");
		$this ->load->view("Content_report_vossu", $data);
	}

	public function report_ppmwos(){
    $this->load->model("update_model");
    //$apola = "INSERT INTO asisbah (`A`,`B`) VALUES('c','b')";
    //$apola = "SELECT * FROM asisbah";
//$this->update_model->updateOnDuplicatex('asisbah',$apola);
	  $this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['fon']= ($this->input->get('fon')) ? $this->input->get('fon') : "";
    $data['from']= ($this->input->get('from') <> 0) ? $this->input->get('from') : $this->display_model->dater(1,$this->input->get('m'),$this->input->get('y'));
 	  $data['to']= ($this->input->get('to') <> 0) ? $this->input->get('to') : $this->display_model->dater(2,$this->input->get('m'),$this->input->get('y'));
		//echo "nilai fon : ".$data['fon'].":".$this->input->get('fon');
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['ppmsum'] = $this->display_model->sumppm($data['month'],$data['year'],$this->input->get('grp'),"",$data['fon']);
		$data['reschout'] = $this->display_model->reschout($data['month'],$data['year'],$this->input->get('grp'));
		$data['reqtype'] = 'A2';
		$data['total'] = $this->display_model->sumpp_m($data['month'],$data['year'],'total');
		$data['totale'] = $this->display_model->sumpp_m($data['month'],$data['year'],'totale');
		$data['totalm'] = $this->display_model->sumpp_m($data['month'],$data['year'],'totalm');
		$data['totalc'] = $this->display_model->sumpp_m($data['month'],$data['year'],'totalc');
		//$data['rqsum'] = $this->display_model->sumrq($data['month'],$data['year'],$data['reqtype'],$this->input->get('grp'));
                if ($this->session->userdata('usersess') == 'FES') {
		$data['ppmcivil'] = $this->display_model->sumppm($data['month'],$data['year'],$this->input->get('grp'),"IIUM C",$data['fon']);
		$data['ppmmech'] = $this->display_model->sumppm($data['month'],$data['year'],$this->input->get('grp'),"IIUM M",$data['fon']);
		$data['ppmelec'] = $this->display_model->sumppm($data['month'],$data['year'],$this->input->get('grp'),"IIUM E",$data['fon']);
		$data['reschoutcivil'] = $this->display_model->reschout($data['month'],$data['year'],$this->input->get('grp'),"IIUM C");
		$data['reschoutmech'] = $this->display_model->reschout($data['month'],$data['year'],$this->input->get('grp'),"IIUM M");
		$data['reschoutlec'] = $this->display_model->reschout($data['month'],$data['year'],$this->input->get('grp'),"IIUM E");
		//$data['rqcivil'] = $this->display_model->sumrq($data['month'],$data['year'],$data['reqtype'],$this->input->get('grp'),"IIUM C");
		//$data['rqmech'] = $this->display_model->sumrq($data['month'],$data['year'],$data['reqtype'],$this->input->get('grp'),"IIUM M");
		//$data['rqelec'] = $this->display_model->sumrq($data['month'],$data['year'],$data['reqtype'],$this->input->get('grp'),"IIUM E");
		}
		//$data['rqsum'] = $this->display_model->sumrq($data['month'],$data['year']);
		//$data['complntsum'] = $this->display_model->sumcomplnt($data['month'],$data['year']);
    if($this->input->get('m')){
      $data['a'] = 'm='.$data['month'];
      $data['b'] = 'y='.$data['year'];
      }else{
      $data['a'] = 'from='.$data['from'];
      $data['b'] = 'to='.$data['to'];
      }

	  $this ->load->view("headprinter");
		//$this ->load->view("Content_report_ppmsum", $data);
		$this ->load->view("Content_report_ppmwos", $data);
	}

	public function report_reqwos(){

	  $this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['fon']= ($this->input->get('fon')) ? $this->input->get('fon') : "";
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['reqtype']= $this->input->get('req') ? $this->input->get('req') : '';
		//$data['ppmsum'] = $this->display_model->sumppm($data['month'],$data['year']);
		$data['rqsum'] = $this->display_model->sumrq($data['month'],$data['year'],$data['reqtype'],$this->input->get('grp'),"",$data['fon']);
		//$data['complntsum'] = $this->display_model->sumcomplnt($data['month'],$data['year']);


                if ($this->session->userdata('usersess') == 'FES') {
		$data['rqcivil'] = $this->display_model->sumrq($data['month'],$data['year'],$data['reqtype'],$this->input->get('grp'),"IIUM C",$data['fon']);
		$data['rqmech'] = $this->display_model->sumrq($data['month'],$data['year'],$data['reqtype'],$this->input->get('grp'),"IIUM M",$data['fon']);
		$data['rqelec'] = $this->display_model->sumrq($data['month'],$data['year'],$data['reqtype'],$this->input->get('grp'),"IIUM E",$data['fon']);
		}



	  $this ->load->view("headprinter");
		$this ->load->view("Content_report_reqwos", $data);
	}

	public function report_cwos(){

	  $this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		//$data['ppmsum'] = $this->display_model->sumppm($data['month'],$data['year']);
		//$data['rqsum'] = $this->display_model->sumrq($data['month'],$data['year']);
		$data['complntsum'] = $this->display_model->sumcomplnt($data['month'],$data['year'],$this->input->get('grp'));

	  $this ->load->view("headprinter");
		$this ->load->view("Content_report_cwos", $data);
	}

	public function report_reswos(){

	  $this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['reqtype']= '';
		//$data['ppmsum'] = $this->display_model->sumppm($data['month'],$data['year']);
		$data['rqsum'] = $this->display_model->sumrq($data['month'],$data['year'],$data['reqtype'],$this->input->get('grp'));
		//$data['complntsum'] = $this->display_model->sumcomplnt($data['month'],$data['year']);

	  $this ->load->view("headprinter");
		$this ->load->view("Content_report_reswos", $data);
	}

	public function report_sls(){

	  $this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		//$data['ppmsum'] = $this->display_model->sumppm($data['month'],$data['year']);
		//$data['rqsum'] = $this->display_model->sumrq($data['month'],$data['year']);
		//$data['complntsum'] = $this->display_model->sumcomplnt($data['month'],$data['year']);
		$data['licsatsum'] = $this->display_model->sumlicsat($data['month'],$data['year']);
		$data['satsum'] = $this->display_model->sumsat($data['month'],$data['year'],$this->input->get('grp'));
	  $this ->load->view("headprinter");
		$this ->load->view("Content_report_sls", $data);
	}

	public function report_alr(){
	  $this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['grpsel']= $this->input->get('grp') ? $this->input->get('grp') : '';
		$data['dept'] = $this->display_model->deptdp();
		$data['deptdp']= $this->input->get('dept') ? $this->input->get('dept') : '';
		if ($this->session->userdata('usersess') != 'BEMS'){
			$data['record'] = $this->display_model->rpt_alr($data['month'],$data['year'],$data['grpsel'],$data['deptdp']);
		}
		else{
			$data['record'] = $this->display_model->rpt_alr_bes($data['month'],$data['year'],$data['grpsel'],$data['deptdp']);
		}
		$this ->load->view("headprinter");
		if ($this->session->userdata('usersess') != 'BEMS'){
			$this ->load->view("Content_report_alr", $data);
		}
		else{
			$this ->load->view("Content_report_alr_bes", $data);
		}
	}
	public function report_ppmp(){
	  $this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['record'] = $this->display_model->rpt_ppmp($data['month'],$data['year']);
		$this ->load->view("headprinter");
		$this ->load->view("Content_report_ppmp", $data);
	}
	public function report_rcmp(){
	  $this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['record'] = $this->display_model->rpt_rcmp($data['month'],$data['year']);
		$this ->load->view("headprinter");
		$this ->load->view("Content_report_rcmp", $data);
	}
	public function report_qc(){
	  $this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['record'] = $this->display_model->rpt_qc($data['month'],$data['year']);
		$this ->load->view("headprinter");
		$this ->load->view("Content_report_qc", $data);
	}
	public function report_qapc(){
	  $this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['record'] = $this->display_model->rpt_qapc($data['month'],$data['year']);
		$this ->load->view("headprinter");
		$this ->load->view("Content_report_qapc", $data);
	}
	public function report_qapac(){
	  $this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['record'] = $this->display_model->rpt_qapac($data['month'],$data['year'],$this->input->get('grp'));
		$this ->load->view("headprinter");
		$this ->load->view("Content_report_qapac", $data);
	}
	public function report_wc(){
	  $this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['record'] = $this->display_model->rpt_wc($data['month'],$data['year']);
		$this ->load->view("headprinter");
		$this ->load->view("Content_report_wc",$data);
	}
	public function report_tcc(){
	  $this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$this ->load->view("headprinter");
		$this ->load->view("Content_report_tcc", $data);
	}
	public function report_tcw(){
	  $this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$this ->load->view("headprinter");
		$this ->load->view("Content_report_tcw", $data);
	}
	public function report_tcac(){
	  $this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$this ->load->view("headprinter");
		$this ->load->view("Content_report_tcac", $data);
	}
	public function report_ppmw(){
	  	$this->load->model("display_model");
	  	$data['records'] = $this->display_model->list_hospinfo();
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['records'] = $this->display_model->list_hospinfo();
		$this ->load->view("headprinter");
		$this ->load->view("Content_report_ppmw", $data);
	}
	public function report_vl(){
	  	$data['search_box'] = $this->input->get_post('search_box');
	  	$this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['record'] = $this->display_model->rpt_vl($data['month'],$data['year'],$data['search_box']);
		$this ->load->view("headprinter");
		$this ->load->view("Content_report_vl", $data);
	}
	public function report_rp(){
	  $this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['record1'] = $this->display_model->rpt_rp1($data['month'],$data['year'],'');
		$data['record2'] = $this->display_model->rpt_rp2($data['month'],$data['year'],'');
		$data['record3'] = $this->display_model->rpt_rp3($data['month'],$data['year'],'');
		$data['record4'] = $this->display_model->rpt_rp4($data['month'],$data['year'],'');
		$this ->load->view("headprinter");
		$this ->load->view("Content_report_rp", $data);
	}
	public function report_cr(){
	  $this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$this ->load->view("headprinter");
		$this ->load->view("Content_report_cr", $data);
	}
	public function report_ppmuw(){
	  $this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['record'] = $this->display_model->rpt_ppmuw($data['month'],$data['year'],$this->input->get('grp'));
		$this ->load->view("headprinter");
		$this ->load->view("Content_report_ppmuw", $data);
	}
	public function report_rcmuw(){
	  $this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['record'] = $this->display_model->rpt_rcmuw($data['month'],$data['year'],$this->input->get('grp'));
		$this ->load->view("headprinter");
		$this ->load->view("Content_report_rcmuw", $data);
	}
	public function assetlicenses_new (){
		$data['error'] = '';
		$data['add'] = 1;
		$data['liccode'] = $this->input->post('liccd');
		if ($data['liccode'] <> ''){
			$this->load->model("get_model");
			$data['lic'] = $this->get_model->licensesandcertbycode($data['liccode']);
			$data['licimg'] = $this->get_model->licenseimage($data['liccode']);
			$data['upload_data'] = NULL;
		}
		else{
			$data['upload_data'] = NULL;
			$data['licimg'] = NULL;
		}
		$this ->load->view("head");
		//$this ->load->view("left",$data);
		$this ->load->view("content_asset_licenses_update",$data);
	}
	public function deskopen(){
		$this->load->model("display_model");
		$data['records_desk'] = $this->display_model->list_desk();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_desk_open",$data);
	}
	public function deskclosed(){
		$this->load->model("display_model");
		$data['records_desk'] = $this->display_model->list_desk();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_desk_closed",$data);
	}
		public function desk_complaint(){
		$data['cmplnt_no'] = $this->input->get('cmplnt_no');
		$this->load->model("display_model");
		$data['record'] = $this->display_model->complaint_form($data['cmplnt_no']);
		$data['records'] = $this->display_model->complaintdet_form($data['cmplnt_no']);
		if (isset($data['records'][0]->v_ComplaintNo) AND isset($data['records'][0]->v_Monyr)){
			$data['vcmdate'] = explode('/',$data['records'][0]->v_Monyr);
		}
		//print_r($data['record'][0]->v_Reference);
		//exit();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_desk_complaint",$data);
	}
	public function desk_complaint_update(){
		$data['cmplnt_no'] = $this->input->get('cmplnt_no');
		$this->load->model("get_model");
		$this->load->model("display_model");
		$data['record'] = $this->get_model->complaint_update($data['cmplnt_no']);
		$data['records'] = $this->display_model->complaintdet_form($data['cmplnt_no']);
		if (isset($data['records'][0]->v_ComplaintNo)){
			$data['vcmdate'] = explode('/',$data['records'][0]->v_Monyr);
	}
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_desk_complaint_update",$data);
	}
	public function desk_complaint_confirm(){
		$data['cmplnt_no'] = $this->input->get('cmplnt_no');
		$this->load->model("get_model");
		$data['record'] = $this->get_model->complaint_update($data['cmplnt_no']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_desk_complaint_confirm",$data);
	}
	public function workorder_a3(){

		$this->load->model("display_model");
		//$data['r'] = $this->display_model->listworkorder();
		$data['records'] = $this->display_model->list_workorder();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_a3",$data);
	}
	public function workorder_a4(){

		$this->load->model("display_model");
		//$data['r'] = $this->display_model->listworkorder();
		$data['records'] = $this->display_model->list_workorder();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_a4",$data);
	}
	public function workorder_a5(){

		$this->load->model("display_model");
		//$data['r'] = $this->display_model->listworkorder();
		$data['records'] = $this->display_model->list_workorder();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_a5",$data);
	}
	public function workorder_a6(){

		$this->load->model("display_model");
		//$data['r'] = $this->display_model->listworkorder();
		$data['records'] = $this->display_model->list_workorder();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_a6",$data);
	}
	public function workorder_a7(){

		$this->load->model("display_model");
		//$data['r'] = $this->display_model->listworkorder();
		$data['records'] = $this->display_model->list_workorder();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_a7",$data);
	}
	public function workorder_a8(){

		$this->load->model("display_model");
		//$data['r'] = $this->display_model->listworkorder();
		$data['records'] = $this->display_model->list_workorder();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_a8",$data);
	}
	public function workorder_a9(){

		$this->load->model("display_model");
		//$data['r'] = $this->display_model->listworkorder();
		$data['records'] = $this->display_model->list_workorder();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_a9",$data);
	}
	public function workorder_a10(){

		$this->load->model("display_model");
		//$data['r'] = $this->display_model->listworkorder();
		$data['records'] = $this->display_model->list_workorder();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_a10",$data);
	}
	public function workorder_a11(){

		$this->load->model("display_model");
		//$data['r'] = $this->display_model->listworkorder();
		$data['records'] = $this->display_model->list_workorder();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_a11",$data);
	}
	public function workorder_ob(){

		$this->load->model("display_model");
		//$data['r'] = $this->display_model->listworkorder();
		$data['records'] = $this->display_model->list_workorder();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_ob",$data);
	}
	public function workorder_cla(){

		$this->load->model("display_model");
		//$data['r'] = $this->display_model->listworkorder();
		$data['records'] = $this->display_model->list_workorder();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_cla",$data);
	}

	public function assetwn (){
	  $data['assetno'] = $this->input->get('asstno');
	  $this->load->model("get_model");
	  $this->load->model("display_model");
      $data['result'] = $this->display_model->searchassettag($data['assetno']);
		//echo 'nilai amik : '.$this->input->get('asstno').'<br>';
		if ($this->session->userdata('usersess') == "BES") {
		$data['cbes']="checked";
		} elseif ($this->session->userdata('usersess') == "FES") {
		$data['cfes']="checked";
		}
	  $data['asset_no'] = ($this->input->get('asstno')) ? $this->input->get('asstno') : '0';
	  $data['records'] = $this->get_model->get_assetdetail($data['asset_no']);
		//print_r($data);
		$this ->load->view("head");
		$this ->load->view("left" , $data);
		$this ->load->view("content_asset_wn", $data);
	}
	public function assetet (){
	   $data['assetno'] = $this->input->get('asstno');
	  $this->load->model("get_model");
	  $this->load->model("display_model");
      $data['result'] = $this->display_model->searchassettag($data['assetno']);
		//echo 'nilai amik : '.$this->input->get('asstno').'<br>';
		if ($this->session->userdata('usersess') == "BES") {
		$data['cbes']="checked";
		} elseif ($this->session->userdata('usersess') == "FES") {
		$data['cfes']="checked";
		}
	  $data['asset_no'] = ($this->input->get('asstno')) ? $this->input->get('asstno') : '0';
	  $data['records'] = $this->get_model->get_assetdetail($data['asset_no']);
		$this ->load->view("head");
		$this ->load->view("left",$data);
		$this ->load->view("content_asset_et", $data);
	}
	public function assetwe (){
	  $data['assetno'] = $this->input->get('asstno');
	  $this->load->model("get_model");
	  $this->load->model("display_model");
      $data['result'] = $this->display_model->searchassettag($data['assetno']);
		//echo 'nilai amik : '.$this->input->get('asstno').'<br>';
		if ($this->session->userdata('usersess') == "BES") {
		$data['cbes']="checked";
		} elseif ($this->session->userdata('usersess') == "FES") {
		$data['cfes']="checked";
		}
	  $data['asset_no'] = ($this->input->get('asstno')) ? $this->input->get('asstno') : '0';
	  $data['records'] = $this->get_model->get_assetdetail($data['asset_no']);
		$this ->load->view("head");
		$this ->load->view("left",$data);
		$this ->load->view("content_asset_we", $data);
	}
	public function assetwf (){
	  $data['assetno'] = $this->input->get('asstno');
	  $this->load->model("get_model");
	  $this->load->model("display_model");
      $data['result'] = $this->display_model->searchassettag($data['assetno']);
		//echo 'nilai amik : '.$this->input->get('asstno').'<br>';
		if ($this->session->userdata('usersess') == "BES") {
		$data['cbes']="checked";
		} elseif ($this->session->userdata('usersess') == "FES") {
		$data['cfes']="checked";
		}
	  $data['asset_no'] = ($this->input->get('asstno')) ? $this->input->get('asstno') : '0';
	  $data['records'] = $this->get_model->get_assetdetail($data['asset_no']);
		$this ->load->view("head");
		$this ->load->view("left",$data);
		$this ->load->view("content_asset_wf", $data);
	}
	//NeW update//
	public function assetwned_update (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_wned_update");
	}
	public function assetwned_confirm (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_wned_confirm");
	}
	public function assetwnmt_update (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_wnmt_update");
	}
	public function assetwnmt_confirm (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_wnmt_confirm");
	}
	public function assetwnwpa_update (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_wnwpa_update");
	}
	public function assetwnwpa_confirm (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_wnwpa_confirm");
	}
	public function assetwnwc_update (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_wnwc_update");
	}
	public function assetwnwc_confirm (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_wnwc_confirm");
	}
	public function assetet_update (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_et_update");
	}
	public function assetet_confirm (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_et_confirm");
	}
	public function assetetrttp_update (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_etrttp_update");
	}
	public function assetetrttp_confirm (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_etrttp_confirm");
	}
	public function assetetrttpnos_update (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_etrttpnos_update");
	}
	public function assetetrttpnos_confirm (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_etrttpnos_confirm");
	}
	public function assetetcawafearbtp_update (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_etcawafearbtp_update");
	}
	public function assetetcawafearbtp_confirm (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_etcawafearbtp_confirm");
	}
	public function assetetuafear_update (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_etuafear_update");
	}
	public function assetetuafear_confirm (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_etuafear_confirm");
	}
	public function assetwedote_update (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_wedote_update");
	}
	public function assetwedote_confirm (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_wedote_confirm");
	}
	public function assetwemr_update (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_wemr_update");
	}
	public function assetwemr_confirm (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_wemr_confirm");
	}
	public function assetwfes_update (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_wfes_update");
	}
	public function assetwfes_confirm (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_wfes_confirm");
	}
	public function assetwfwp_update (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_wfwp_update");
	}
	public function assetwfwp_confirm (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_wfwp_confirm");
	}
	public function assetwflod_update (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_wflod_update");
	}
	public function assetwflod_confirm (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_wflod_confirm");
	}
	//NeW Printer//
	public function print_wn(){
	  $this->load->model("get_model");
		//echo 'nilai amik : '.$this->input->get('asstno').'<br>';
		if ($this->session->userdata('usersess') == "BES") {
		$data['cbes']="checked";
		} elseif ($this->session->userdata('usersess') == "FES") {
		$data['cfes']="checked";
		}
	  $data['asset_no'] = ($this->input->get('asstno')) ? $this->input->get('asstno') : '0';
	  $data['records'] = $this->get_model->get_assetdetail($data['asset_no']);
		$this->load->view("headprinter");
		$this->load->view("Content_Asset_print_wn", $data);
	}
	public function print_et(){
	   $this->load->model("get_model");
		//echo 'nilai amik : '.$this->input->get('asstno').'<br>';
		if ($this->session->userdata('usersess') == "BES") {
		$data['cbes']="checked";
		} elseif ($this->session->userdata('usersess') == "FES") {
		$data['cfes']="checked";
		}
	  $data['asset_no'] = ($this->input->get('asstno')) ? $this->input->get('asstno') : '0';
	  $data['records'] = $this->get_model->get_assetdetail($data['asset_no']);
		$this ->load->view("headprinter");
		$this ->load->view("Content_Asset_print_et", $data);
	}
	public function print_we(){
	  $this->load->model("get_model");
		//echo 'nilai amik : '.$this->input->get('asstno').'<br>';
		if ($this->session->userdata('usersess') == "BES") {
		$data['cbes']="checked";
		} elseif ($this->session->userdata('usersess') == "FES") {
		$data['cfes']="checked";
		}
	  $data['asset_no'] = ($this->input->get('asstno')) ? $this->input->get('asstno') : '0';
	  $data['records'] = $this->get_model->get_assetdetail($data['asset_no']);
		$this ->load->view("headprinter");
		$this ->load->view("Content_Asset_print_we", $data);
	}
	public function print_wf(){
	  $this->load->model("get_model");
		//echo 'nilai amik : '.$this->input->get('asstno').'<br>';
		if ($this->session->userdata('usersess') == "BES") {
		$data['cbes']="checked";
		} elseif ($this->session->userdata('usersess') == "FES") {
		$data['cfes']="checked";
		}
	  $data['asset_no'] = ($this->input->get('asstno')) ? $this->input->get('asstno') : '0';
	  $data['records'] = $this->get_model->get_assetdetail($data['asset_no']);
		$this ->load->view("headprinter");
		$this ->load->view("Content_Asset_print_wf", $data);
	}
//New//
	public function assetsearch(){
	//echo strpos(strtoupper($this->input->post('searchquestion')), "IIUM")."nilai". $this->input->post('searchquestion');
	//$string = "This is a strpos() test";
    //$pos = strpos($this->input->post('searchquestion'), "iumm");
		//echo "nilai :".strlen($this->input->post('searchquestion')).":";
	//echo '<br>'.$pos;
	//$npass = $this->input->post('searchquestion');
	$this->load->model("display_model");
	if (strlen($this->input->post('searchquestion')) > 0) {
	//echo 'masuk 1';
	$data['serch_result'] = $this->display_model->searchassettag($this->input->post('searchquestion'));
	} else {
	//echo 'masuk 2';
	$data['serch_result'] = $this->display_model->searchassettag('taknkjmp');
	}
	/*
	if (strpos(strtoupper($this->input->post('searchquestion')), 'IIUM') > -1)
	{
	//echo "<br> masuk if";
	$data['serch_result'] = $this->display_model->searchassettag($this->input->post('searchquestion'));
	} elseif (strpos(strtoupper($this->input->post('searchquestion')), 'TAG:') > -1) {
	$data['serch_result'] = $this->display_model->searchassettag($this->input->post('searchquestion'));
	} else {
	$data['serch_result'] = $this->display_model->searchassettag($this->input->post('searchquestion'));
	}
	*/

		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_asset_search",$data);
	}
	public function desksearch(){
	  //echo "nilai pas ".$this->input->post('searchquestion');
		//print_r($this->session->userdata);
		$data['cari_apa'] = $this->input->post('searchquestion');
		$this->load->model("display_model");
		if (strlen($this->input->post('searchquestion')) > 0) {
		//echo 'masuk 1';
		$data['serch_result'] = $this->display_model->searchcomp($this->input->post('searchquestion'));
		} else {
		//echo 'masuk 2';
		$data['serch_result'] = $this->display_model->searchcomp('taknkjmp');
		}
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_desk_search", $data);
	}
	public function worksearch(){
	  $data['cari_apa'] = $this->input->post('searchquestion');
		$this->load->model("display_model");
		if (strlen($this->input->post('searchquestion')) > 0) {
		//echo 'masuk 1';
		$data['serch_result'] = $this->display_model->searchwo($this->input->post('searchquestion'));
		} else {
		//echo 'masuk 2';
		$data['serch_result'] = $this->display_model->searchwo('taknkjmp');
		}
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_work_search", $data);
	}

	public function ppmsearch(){
	  $data['cari_apa'] = $this->input->post('searchquestion');
		$this->load->model("display_model");
		if (strlen($this->input->post('searchquestion')) > 0) {
		//echo 'masuk 1';
		$data['serch_result'] = $this->display_model->searchppm($this->input->post('searchquestion'));
		} else {
		//echo 'masuk 2';
		$data['serch_result'] = $this->display_model->searchppm('taknkjmp');
		}
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_ppm_search", $data);
	}

	public function print_lac(){
	  $this->load->model("get_model");
		$data['lic'] = $this->get_model->licensesandcert();
		$this ->load->view("headprinter");
		$this ->load->view("Content_print_lac", $data);
	}
	public function catalogppm_open(){
		$this->load->model("display_model");
		$data['records_desk'] = $this->display_model->list_desk();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_catalog_ppm_open",$data);
	}
	public function catalogppm_completed(){
		$this->load->model("display_model");
		$data['records_desk'] = $this->display_model->list_desk();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_catalog_ppm_completed",$data);
	}
	public function print_complaint(){
	  $this->load->model("get_model");
	  $data['wrk_ord'] = $this->input->get('cmplnt_no');
	  $this->load->model("display_model");
		$data['hosp'] = $this->display_model->list_hospinfo();
		$data['woinfo'] = $this->get_model->assetcomplaint($data['wrk_ord']);
		$this ->load->view("headprinter");
		$this ->load->view("Content_print_complaint", $data);
	}
	public function desk_report(){
		//$this ->load->view("head");
		//$this ->load->view("left");
		//$this ->load->view("Content_desk");
		//redirect('contentcontroller/workorder');
		//redirect('contentcontroller/desklist');
		$this->load->model("display_model");
		$data['records_desk'] = $this->display_model->list_desk();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_deskdesk_report",$data);
	}
	public function clause_confirm(){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_clause_confirm");
	}
	public function print_ppmcheck(){
		$this ->load->view("headprinter");
		$this ->load->view("Content_print_ppmcheck");
	}
	public function print_heppm(){
	  //$asst = "E24014";
		//$asst = "240100";
	  	$this->load->model("display_model");
	  	if ($this->input->get('wrk_ord')){
		$data['typecd'] = $this->display_model->typecd_chklistbes($this->input->get('wrk_ord'));
		 //echo "nilaiii".$data['typecd'][0]->typee;
		$asst = $data['typecd'][0]->typee;
		 //echo $asst;
		}
		if ($this->input->get('asstno')){
		$data['typecd'] = $this->display_model->typecd_chklistbesasset(substr($this->input->get('asstno'),0,6));
		$asst = $data['typecd'][0]->typee;
		}
		//$data['asst'] = $this->display_model->typecd_chklistbess($data['typecd'][0]->typee);
		$data['records_head'] = $this->display_model->list_chklist_head($asst);
		$data['A'] = $this->display_model->list_chklist_A($asst);
		foreach ($data['A'] as $rowA){
			$data['taskA'][] = $rowA->task_no;
		}
		$data['B'] = $this->display_model->list_chklist_B($asst);
		foreach ($data['B'] as $rowB){
			$data['taskB'][] = $rowB->task_no;
		}
		$data['C'] = $this->display_model->list_chklist_C($asst);
		foreach ($data['C'] as $rowC){
			$data['taskC'][] = $rowC->task_no;
		}
		$data['D'] = $this->display_model->list_chklist_D($asst);
		foreach ($data['D'] as $rowD){
			$data['taskD'][] = $rowD->task_no;
		}
		$data['E'] = $this->display_model->list_chklist_E($asst);
		foreach ($data['E'] as $rowE){
			$data['taskE'][] = $rowE->task_no;
		}
		$data['F'] = $this->display_model->list_chklist_F($asst);
		foreach ($data['F'] as $rowF){
			$data['taskF'][] = $rowF->task_no;
		}
		$data['G'] = $this->display_model->list_chklist_G($asst);
		foreach ($data['G'] as $rowG){
			$data['taskG'][] = $rowG->task_no;
		}
		$data['H'] = $this->display_model->list_chklist_H($asst);
		foreach ($data['H'] as $rowH){
			$data['taskH'][] = $rowH->task_no;
		}
		$data['I'] = $this->display_model->list_chklist_I($asst);
		foreach ($data['I'] as $rowI){
			$data['taskI'][] = $rowI->task_no;
		}
		$data['J'] = $this->display_model->list_chklist_J($asst);
		foreach ($data['J'] as $rowJ){
			$data['taskJ'][] = $rowJ->task_no;
		}
		$data['K'] = $this->display_model->list_chklist_K($asst);
		foreach ($data['K'] as $rowK){
			$data['taskK'][] = $rowK->task_no;
		}
		//$this ->load->view("headprinter");
		//$this ->load->view("Content_print_heppm", $data);
		//$this ->load->view("headprinter");
		//$this ->load->view("Content_print_heppm", $data);
		if ((null !==$this->input->get('pr')) and ($this->input->get('none') == 'closed')){
		$data['print'] = $this->input->get('pr');
		$this ->load->view("headprinter");
		$this ->load->view("Content_print_heppm", $data);
		//}elseif($this->input->get('pr') == 2 and $this->input->get('none') == 'closed'){
		//$data['print'] = 2;
		//$this ->load->view("headprinter");
		//$this ->load->view("Content_print_heppm", $data);
		}else{

		if ($data['records_head']) {
			foreach($data['records_head'] as $row):
			 //echo $row->row_number;
			$data['print'] = $row->row_number;
			$this ->load->view("headprinter");
			$this ->load->view("Content_print_heppm", $data);
			endforeach;
		}
		else{
			$data['print'] = 0;
			$this ->load->view("headprinter");
			$this ->load->view("Content_print_heppm", $data);
		}
		//$data['print'] = 2;
		//$this ->load->view("headprinter");
		//$this ->load->view("Content_print_heppm", $data);
		}
	}
	public function print_dca(){
		$this ->load->view("headprinter");
		$this ->load->view("Content_print_dca");
	}
	public function report_ppmbulk(){
		isset($_REQUEST['n_startdate']) ? $data['startdate'] = $_REQUEST['n_startdate'] : $data['startdate'] = "";
		isset($_REQUEST['n_enddate']) ? $data['enddate'] = $_REQUEST['n_enddate'] : $data['enddate'] = "";
		isset($_REQUEST['data_file']) ? $data['datafile'] = $_REQUEST['data_file'] : $data['datafile'] = "";
		isset($_REQUEST['myclear']) ? $data['clearbutton'] = $_REQUEST['myclear'] : $data['clearbutton'] = "";
		$data['error'] = "";
		$this->load->model('display_model');
		if ($data['startdate'] <> '' AND $data['enddate'] <> ''){
			if (strtotime($data['startdate']) > strtotime($data['enddate'])){
				$data['startdate'] = "";
				$data['enddate'] = "";
				$data['error'] = "Start date cannot be later than the end date.";
			}
			else if ($data['clearbutton'] == "CLEAR"){
				$data['startdate'] = "";
				$data['enddate'] = "";
			}
			else{
			$data['record'] = $this->display_model->ppmbulkprint(date("Y-m-d",strtotime($data['startdate'])),date("Y-m-d",strtotime($data['enddate'])));
			}
		}
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_report_ppmbulk",$data);
	}
	public function report_RSReport(){
		isset($_REQUEST['n_startdate']) ? $data['startdate'] = $_REQUEST['n_startdate'] : $data['startdate'] = "";
		isset($_REQUEST['n_enddate']) ? $data['enddate'] = $_REQUEST['n_enddate'] : $data['enddate'] = "";
		isset($_REQUEST['data_file']) ? $data['datafile'] = $_REQUEST['data_file'] : $data['datafile'] = "";
		isset($_REQUEST['n_wotype']) ? $data['wotype'] = $_REQUEST['n_wotype'] : $data['wotype'] = "A";
		isset($_REQUEST['myclear']) ? $data['clearbutton'] = $_REQUEST['myclear'] : $data['clearbutton'] = "";
		$data['error'] = "";
		$this->load->model('display_model');
		if ($data['startdate'] <> '' AND $data['enddate'] <> ''){
			if (strtotime($data['startdate']) > strtotime($data['enddate'])){
				$data['startdate'] = "";
				$data['enddate'] = "";
				$data['error'] = "Start date cannot be later than the end date.";
			}
			else if ($data['clearbutton'] == "CLEAR"){
				$data['startdate'] = "";
				$data['enddate'] = "";
			}
			else{
			$data['record'] = $this->display_model->wostatus(date("Y-m-d",strtotime($data['startdate'])),date("Y-m-d",strtotime($data['enddate'])),$data['wotype']);
			}
		}

		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_report_RSReport",$data);
	}
	public function report_PPMWOrders(){
		isset($_REQUEST['n_startdate']) ? $data['startdate'] = $_REQUEST['n_startdate'] : $data['startdate'] = "";
		isset($_REQUEST['n_enddate']) ? $data['enddate'] = $_REQUEST['n_enddate'] : $data['enddate'] = "";
		isset($_REQUEST['data_file']) ? $data['datafile'] = $_REQUEST['data_file'] : $data['datafile'] = "";
		isset($_REQUEST['n_wotype']) ? $data['wotype'] = $_REQUEST['n_wotype'] : $data['wotype'] = "A";
		isset($_REQUEST['myclear']) ? $data['clearbutton'] = $_REQUEST['myclear'] : $data['clearbutton'] = "";
		$data['error'] = "";
		$this->load->model('display_model');
		if ($data['startdate'] <> '' AND $data['enddate'] <> ''){
			if (strtotime($data['startdate']) > strtotime($data['enddate'])){
				$data['startdate'] = "";
				$data['enddate'] = "";
				$data['error'] = "Start date cannot be later than the end date.";
			}
			else if ($data['clearbutton'] == "CLEAR"){
				$data['startdate'] = "";
				$data['enddate'] = "";
			}
			else{
			$data['record'] = $this->display_model->ppmstatus(date("Y-m-d",strtotime($data['startdate'])),date("Y-m-d",strtotime($data['enddate'])),$data['wotype']);
			}
		}
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_report_PPMWOrders",$data);
	}
	public function report_csr(){
		isset($_REQUEST['n_startdate']) ? $data['startdate'] = $_REQUEST['n_startdate'] : $data['startdate'] = "";
		isset($_REQUEST['n_enddate']) ? $data['enddate'] = $_REQUEST['n_enddate'] : $data['enddate'] = "";
		isset($_REQUEST['data_file']) ? $data['datafile'] = $_REQUEST['data_file'] : $data['datafile'] = "";
		isset($_REQUEST['n_wotype']) ? $data['wotype'] = $_REQUEST['n_wotype'] : $data['wotype'] = "A";
		isset($_REQUEST['myclear']) ? $data['clearbutton'] = $_REQUEST['myclear'] : $data['clearbutton'] = "";
		$data['error'] = "";
		$this->load->model('display_model');
		if ($data['startdate'] <> '' AND $data['enddate'] <> ''){
			if (strtotime($data['startdate']) > strtotime($data['enddate'])){
				$data['startdate'] = "";
				$data['enddate'] = "";
				$data['error'] = "Start date cannot be later than the end date.";
			}
			else if ($data['clearbutton'] == "CLEAR"){
				$data['startdate'] = "";
				$data['enddate'] = "";
			}
			else{
			$data['record'] = $this->display_model->Cstatus(date("Y-m-d",strtotime($data['startdate'])),date("Y-m-d",strtotime($data['enddate'])),$data['wotype']);
			}
		}
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_report_csr",$data);
	}
	public function print_r_csr(){
		$data['daterange'] = $this->input->post('daterange');
		$data['wostat'] = $this->input->post('wostat');

		if($data['wostat'] == 'A' OR $this->input->get('stat') == 'A'){
			$data['status'] = 'ALL REQUESTS';
		}
		else if($data['wostat'] == 'C' OR $this->input->get('stat') == 'C'){
			$data['status'] = 'COMPLETED REQUESTS';
		}
		else{
			$data['status'] = 'INCOMPLETE REQUESTS';
		}

		if ($data['daterange'][0]){
			$data['startdate'] = date('d F Y',strtotime($data['daterange'][0]));
		}
		else if($this->input->get('sdate')){
			$data['startdate'] = date('d F Y',strtotime($this->input->get('sdate')));
		}
		else{
			$data['startdate'] = '';
		}

		if ($data['daterange'][1]){
			$data['enddate'] = date('d F Y',strtotime($data['daterange'][1]));
		}
		else if($this->input->get('edate')){
			$data['enddate'] = date('d F Y',strtotime($this->input->get('edate')));
		}
		else{
			$data['enddate'] = '';
		}

		$this->load->model("display_model");
		if ($this->input->get('none') == 'closed'){
		$data['record'] = $this->display_model->Cstatus($this->input->get('sdate'),$this->input->get('edate'),$this->input->get('stat'));
		}
		else{
		//$data['record'] = $this->display_model->Cstatusrep($this->input->post('wrk_odrno'));
		$data['record'] = $this->display_model->Cstatus(date("Y-m-d",strtotime($data['daterange'][0])),date("Y-m-d",strtotime($data['daterange'][1])),$data['wostat']);
		}
		$this ->load->view("headprinter");
		$this ->load->view("content_print_r_csr",$data);
	}
	public function report_ppmms(){
		isset($_REQUEST['m']) ? $data['month'] = $_REQUEST['m'] : $data['month'] = date('m');
		isset($_REQUEST['y']) ? $data['year'] = $_REQUEST['y'] : $data['year'] = date('Y');
		isset($_REQUEST['data_file']) ? $data['datafile'] = $_REQUEST['data_file'] : $data['datafile'] = "";
		isset($_REQUEST['myclear']) ? $data['clearbutton'] = $_REQUEST['myclear'] : $data['clearbutton'] = "";
		$this->load->model('display_model');
		$data['record'] = $this->display_model->mppmsummary($data['month'],$data['year']);

		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_report_ppmms",$data);
	}
	public function report_ppmun(){
		isset($_REQUEST['m']) ? $data['month'] = $_REQUEST['m'] : $data['month'] = date('m');
		isset($_REQUEST['y']) ? $data['year'] = $_REQUEST['y'] : $data['year'] = date('Y');
		$this->load->model('display_model');
		$data['record'] = $this->display_model->ppmudept();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_report_ppmun",$data);
	}
	public function print_report_ppmun(){
		if ($this->input->post('p_name') <> '' AND $this->input->post('p_ext') <> '' AND ($this->input->post('chkbx'))){
			$data['month'] = $this->input->post('m');
			$data['year'] = $this->input->post('y');
			$data['p_name'] = $this->input->post('p_name');
			$data['p_ext'] = $this->input->post('p_ext');
			$data['dept'] = $this->input->post('chkbx');
		}
		else{
			redirect('contentcontroller/report_ppmun');
		}
		$this ->load->view("headprinter");
		$this ->load->view("content_print_report_ppmun",$data);
	}
	public function report_RPPMW(){
		isset($_REQUEST['n_startdate']) ? $data['startdate'] = $_REQUEST['n_startdate'] : $data['startdate'] = "";
		isset($_REQUEST['n_enddate']) ? $data['enddate'] = $_REQUEST['n_enddate'] : $data['enddate'] = "";
		isset($_REQUEST['data_file']) ? $data['datafile'] = $_REQUEST['data_file'] : $data['datafile'] = "";
		isset($_REQUEST['myclear']) ? $data['clearbutton'] = $_REQUEST['myclear'] : $data['clearbutton'] = "";
		$data['error'] = "";
		$this->load->model('display_model');
		if ($data['startdate'] <> '' AND $data['enddate'] <> ''){
			if (strtotime($data['startdate']) > strtotime($data['enddate'])){
				$data['startdate'] = "";
				$data['enddate'] = "";
				$data['error'] = "Start date cannot be later than the end date.";
			}
			else if ($data['clearbutton'] == "CLEAR"){
				$data['startdate'] = "";
				$data['enddate'] = "";
			}
			else{
			$data['record'] = $this->display_model->reschPPM(date("Y-m-d",strtotime($data['startdate'])),date("Y-m-d",strtotime($data['enddate'])));
			foreach($data['record'] as $row){
				$data['records'][$row->v_WrkOrdNo] = array($row);
			}
			}
		}
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_report_RPPMW",$data);
	}
	/// new //
	public function pop_location_user(){
		$this->load->model("get_model");
		$data['records'] = $this->get_model->get_phonelist();
		$this ->load->view("head");
		$this ->load->view("content_pop_location_user",$data);
	}
	//print_ppmcheck//print_heppm//print_dca
	public function reportbi_rcmage_listing(){
		$this->load->model("get_model");
		$data['records'] = $this->get_model->assetchklistcd();
		$this ->load->view("head");
		$this ->load->view("content_reportbi_rcmage_listing",$data);
	}
	public function reportbi_rcm15_listing(){
		$this->load->model("get_model");
		$data['records'] = $this->get_model->assetchklistcd();
		$this ->load->view("head");
		$this ->load->view("content_reportbi_rcm15_listing",$data);
	}
	public function reportbi_rcm7_listing(){
		$this->load->model("get_model");
		$data['records'] = $this->get_model->assetchklistcd();
		$this ->load->view("head");
		$this ->load->view("content_reportbi_rcm7_listing",$data);
	}
	public function reportbi_ppmage_listing(){
		$this->load->model("get_model");
		$data['records'] = $this->get_model->assetchklistcd();
		$this ->load->view("head");
		$this ->load->view("content_reportbi_ppmage_listing",$data);
	}
	public function reportbi_ppm15_listing(){
		$this->load->model("get_model");
		$data['records'] = $this->get_model->assetchklistcd();
		$this ->load->view("head");
		$this ->load->view("content_reportbi_ppm15_listing",$data);
	}
	public function reportbi_ind_listing(){
		$this->load->model("get_model");
		$data['records'] = $this->get_model->assetchklistcd();
		$this ->load->view("head");
		$this ->load->view("content_reportbi_ind_listing",$data);
	}
	public function vo3_report(){
		$data['rpt_no_array'] = explode('/',$this->input->get('rpt_no'));
		$data['period'] = $data['rpt_no_array'][2];
		$data['site'] = $data['rpt_no_array'][1];

		$this->load->model("get_model");
		$data['records'] = $this->get_model->reportselection($data['period'],$data['site']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vo3_report",$data);
	}
	public function print_vo3_report(){
		$data['rpt_no'] = $this->input->get('rpt_no');
		//echo $this->input->post('n_lineNo');
		//exit();
		$data['rpt_no_array'] = explode('/',$this->input->get('rpt_no'));
		$data['period'] = $data['rpt_no_array'][2];
		$data['site'] = $data['rpt_no_array'][1];

		$this->load->model("display_model");
		$data['hospname'] = $this->display_model->reporthospname($data['site']);
		//print_r($data['hospname']);
		//exit();
		$data['vvfHeader'] = $this->display_model->vo3general($data['rpt_no']);
		$data['loadvvfreport'] = $this->display_model->loadvvfreport($data['rpt_no'],$data['site']);
		//print_r($data['loadvvfreport']);
		$data['count_array'] = count($data['loadvvfreport']);
		$data['loadvvfsitereview'] = $this->display_model->loadvvfsitereview($data['rpt_no'],$data['site']);
		$data['arr_count'] = count($data['loadvvfsitereview']);
		//print_r($data['loadvvfsitereview']);
		//echo "hlashdahsldljkad".$data['count_array']."haskjdhakjsdhajksd".$data['arr_count'];
		//exit();
		//echo "pilihan report ".$this->input->post('n_report_type');
		if ($this->input->post('n_report_type') == 1) {
		$this ->load->view("headprinter");
		$this ->load->view("content_print_vo3_report_site",$data);
		}
		elseif ($this->input->post('n_report_type') == 2) {
		$this ->load->view("headprinter");
		$this ->load->view("content_print_vo3_report",$data);
		}
		else{
		$this ->load->view("headprinter");
		$this ->load->view("content_print_vo3_report",$data);
		}
	}
	public function vo3_item_general(){
		$data['rpt_no'] = $this->input->get('rpt_no');
		$data['assetno'] = $this->input->get('asset');
		$this->load->model('display_model');
		$data['records'] = $this->display_model->vo3_item_general($data['assetno']);
		$data['record'] = $this->display_model->assets_vvf_disp($data['rpt_no'],$data['assetno']);
		$data['checklist'] = $this->display_model->vo3_checklist_disp('checklistCode',$data['records'][0]->v_ChecklistCode);

		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vo3_item_general",$data);
	}
	public function vo3_item_general_confirm(){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vo3_item_general_confirm");
	}

	public function pop_Checklist(){

		$this->load->model("get_model");
		//$data['records'] = $this->get_model->assetchklist($this->input->get('assetno'));
		$data['records'] = $this->get_model->assetchklist($this->input->get('id'));
		$this ->load->view("head");
		$this ->load->view("content_pop_chklist",$data);
	}
	public function lock_vo3_asset(){
		$data['rpt_no'] = $this->input->get('rpt_no');
		$data['assetno'] = $this->input->get('asset');
		$this->load->model('display_model');
		$data['records'] = $this->display_model->assets_vvf_disp($data['rpt_no'],$data['assetno']);

		$this->load->model('update_model');
		if(!isset($data['records'][0]->vvfAssetLockedStatus) OR $data['records'][0]->vvfAssetLockedStatus == 0){

		$insert_data = array(
			'vvfAssetLockedStatus' => 1,
			'vvfAssetLockedDate' => date('Y-m-d H:i:s'),
			'vvfAssetLockedBy' => $this->session->userdata('v_UserName')
			);
		}
		elseif($data['records'][0]->vvfAssetLockedStatus == 1){

		$insert_data = array(
			'vvfAssetLockedStatus' => 0,
			'vvfAssetLockedDate' => date('Y-m-d H:i:s'),
			'vvfAssetLockedBy' => $this->session->userdata('v_UserName')
			);
		}
		else{
		$insert_data = array(
			'vvfAssetLockedStatus' => NULL,
			'vvfAssetLockedDate' => NULL,
			'vvfAssetLockedBy' => NULL
			);
		}
		$this->update_model->vo3_lock_authorize_asset($insert_data);
		redirect('contentcontroller/vo3_Asset_Number?rpt_no='.$this->input->get('rpt_no').'&asset='.$this->input->get('asset'));
	}
	public function authorize_vo3_asset(){
		$data['rpt_no'] = $this->input->get('rpt_no');
		$data['assetno'] = $this->input->get('asset');
		$this->load->model('display_model');
		$data['records'] = $this->display_model->assets_vvf_disp($data['rpt_no'],$data['assetno']);

		$this->load->model('update_model');
		if(!isset($data['records'][0]->vvfAuthorizedStatus) OR $data['records'][0]->vvfAuthorizedStatus == 0){

		$insert_data = array(
			'vvfAuthorizedStatus' => 1,
			'vvfAuthorizedDate' => date('Y-m-d H:i:s'),
			'vvfAuthorizedBy' => $this->session->userdata('v_UserName')
			);
		}
		elseif($data['records'][0]->vvfAuthorizedStatus == 1){

		$insert_data = array(
			'vvfAuthorizedStatus' => 2,
			'vvfAuthorizedDate' => date('Y-m-d H:i:s'),
			'vvfAuthorizedBy' => $this->session->userdata('v_UserName')
			);
		}
		elseif($data['records'][0]->vvfAuthorizedStatus == 2){

		$insert_data = array(
			'vvfAuthorizedStatus' => 1,
			'vvfAuthorizedDate' => date('Y-m-d H:i:s'),
			'vvfAuthorizedBy' => $this->session->userdata('v_UserName')
			);
		}
		else{
		$insert_data = array(
			'vvfAuthorizedStatus' => NULL,
			'vvfAuthorizedDate' => NULL,
			'vvfAuthorizedBy' => NULL
			);
		}
		$this->update_model->vo3_lock_authorize_asset($insert_data);
		redirect('contentcontroller/vo3_Asset_Number?rpt_no='.$this->input->get('rpt_no').'&asset='.$this->input->get('asset'));
	}
	public function delete_vo3_asset(){
		$data['rpt_no'] = $this->input->get('rpt_no');
		$data['assetno'] = $this->input->get('asset');
		$this->load->model('display_model');
		$data['records'] = $this->display_model->assets_vvf_disp($data['rpt_no'],$data['assetno']);
		$this->load->model('update_model');
		if($data['records'][0]->vvfActionflag != 'D'){

		$insert_data = array(
			'vvfActionflag' => 'D',
			'vvfTimestamp' => date('Y-m-d H:i:s'),
			);
		}
		$this->update_model->vo3_asset_update($insert_data);
		redirect('contentcontroller/vo3_Assets?rpt_no='.$this->input->get('rpt_no').'&vo=2');
	}
	public function print_vo3_report_site(){
		$this ->load->view("headprinter");
		$this ->load->view("content_print_vo3_report_site");
	}
	public function vo3_Analysis(){
		$data['rpt_no'] = $this->input->get('rpt_no');
		$data['rpt_no_array'] = explode('/',$data['rpt_no']);
		$data['period'] = $data['rpt_no_array'][2];
		$this->load->model('get_model');
		$data['records'] = $this->get_model->vvf_analysis1($data['period']);
		foreach ($data['records'] as $row) {
		if ($row->V20 > 0 OR $row->V21 > 0 OR $row->V22 > 0 OR $row->V30 > 0 OR $row->V31 > 0 OR $row->V32 > 0 OR $row->V40 > 0 OR $row->V41 > 0 OR $row->V42 > 0 OR
			$row->V4L0 > 0 OR $row->V4L1 > 0 OR $row->V4L2 > 0 OR $row->V50 > 0 OR $row->V51 > 0 OR $row->V52 > 0 OR $row->V60 > 0 OR $row->V61 > 0 OR $row->V62 > 0 OR
			$row->V70 > 0 OR $row->V71 > 0 OR $row->V72 > 0 OR $row->V80 > 0 OR $row->V81 > 0 OR $row->V82 > 0 OR $row->V90 > 0 OR $row->V91 > 0 OR $row->V92 > 0 ) {
			$data['GotData'] = 'TRUE';
		//echo '1st : ';
		//print_r($data['GotData']);
		//echo '<br>';
		//exit();
		}
		else{
			$data['GotData'] = 'FALSE';
			//echo '1st : ';
			//print_r($data['GotData']);
			//echo '<br>';
			//exit();
		}
		}
		if ($data['GotData'] == 'TRUE') {
			if (substr($data['period'],0,2) == 'P1'){
				for ($monloop = 1;$monloop <= 6;$monloop++){
					$data['monloop'] = $monloop;
			$data['recordchart2'][$monloop] = $this->get_model->vvf_analysis1month($data['period'],$data['monloop']);
					}
				}

			elseif (substr($data['period'],0,2) == 'P2'){
				for ($monloop = 7;$monloop <= 12;$monloop++){
					$data['monloop'] = $monloop;
			$data['recordchart2'][$monloop] = $this->get_model->vvf_analysis1month($data['period'],$data['monloop']);
				}
			}
		}
		//echo '2nd : ';
		//print_r($data['GotData']);
		//echo '<br>';
		//exit();
		//print_r($data['recordchart2']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vo3_Analysis",$data);
	}
	public function vo3_als(){
		$data['rpt_no'] = $this->input->get('rpt_no');
		$data['rpt_no_array'] = explode('/',$data['rpt_no']);
		$data['period'] = $data['rpt_no_array'][2];
		$this->load->model('get_model');
		$data['records'] = $this->get_model->vvf_analysis2($data['period']);
		foreach ($data['records'] as $row) {
		if ($row->V20 > 0 OR $row->V21 > 0 OR $row->V30 > 0 OR $row->V31 > 0 OR $row->V40 > 0 OR $row->V41 > 0 OR $row->V4L0 > 0 OR $row->V4L1 > 0 OR
			$row->V50 > 0 OR $row->V51 > 0 OR $row->V60 > 0 OR $row->V61 > 0 OR $row->V70 > 0 OR $row->V71 > 0 OR $row->V80 > 0 OR $row->V81 > 0 OR
			$row->V90 > 0 OR $row->V91 > 0 ) {
			$data['GotData'] = 'TRUE';
		}
		else{
			$data['GotData'] = 'FALSE';
		}
		}

		if ($data['GotData'] == 'TRUE') {
			if (substr($data['period'],0,2) == 'P1'){
				for ($monloop = 1;$monloop <= 6;$monloop++){
					$data['monloop'] = $monloop;
			$data['recordchart2'][$monloop] = $this->get_model->vvf_analysis2month($data['period'],$data['monloop']);
					}
				}

			elseif (substr($data['period'],0,2) == 'P2'){
				for ($monloop = 7;$monloop <= 12;$monloop++){
					$data['monloop'] = $monloop;
			$data['recordchart2'][$monloop] = $this->get_model->vvf_analysis2month($data['period'],$data['monloop']);
				}
			}
		}
		//print_r($data['recordchart2']);

		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vo3_als",$data);
	}

	public function technicalsummary_confirm(){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_technicalsummary_confirm");
	}

	public function wo_ppmgen_week(){
	$this ->load->view("head");
	$this ->load->view("left");
	$this ->load->view("Content_wo_ppmgen_week");
	}
	public function print_report2_wo_ppm_week_list(){
		$this ->load->view("headprinter");
		$this ->load->view("Content_print_report2_wo_ppm_week_list");
	}
	public function qap3_car(){
	$data['ssiq'] = $this->input->get('ssiq');
	$data['carid'] = $this->input->get('carid');
	$this->load->model('display_model');
	$data['record'] = $this->display_model->qap3_car($data['ssiq'],$data['carid']);
	$this ->load->view("head");
	$this ->load->view("left");
	$this ->load->view("Content_qap3_car",$data);
	}
	public function qap3_car_edit(){
	$data['ssiq'] = $this->input->get('ssiq');
	$data['carid'] = $this->input->get('carid');
	$this->load->model('display_model');
	$data['record'] = $this->display_model->qap3_cardisp($data['ssiq'],$data['carid']);
	$data['recordsiq'] = $this->display_model->qap3_carsiqdisp($data['ssiq']);
	$data['recordind'] = $this->display_model->qap3_carinddisp();
	$data['recordqc'] = $this->display_model->qap3_carqcdisp();
	//print_r($data['recordqc']);
	//exit();
	if(strlen($data['recordsiq'][0]->type_code) > 0){
	$data['recordasset'] = $this->display_model->qap3_assetcodedisp($data['recordsiq'][0]->type_code);
	}
	!empty($data['recordasset']) ? $data['assetcode'] = $data['recordasset'][0]->v_Equip_Code.' - '.$data['recordasset'][0]->v_Equip_Desc : $data['assetcode'] = '';

	$this ->load->view("head");
	$this ->load->view("left");
	$this ->load->view("Content_qap3_car_edit",$data);
	}
	public function qap3_car_confirm(){
	$this ->load->view("head");
	$this ->load->view("left");
	$this ->load->view("Content_qap3_car_confirm");
	}
	public function qap3_action(){
	$data['ssiq'] = $this->input->get('ssiq');
	$data['carid'] = $this->input->get('carid');
	$this->load->model('display_model');
	$data['record'] = $this->display_model->qap3_action($data['carid']);
	$this ->load->view("head");
	$this ->load->view("left");
	$this ->load->view("Content_qap3_action",$data);
	}
	public function qap3_action_new(){
	$data['carid'] = $this->input->get('carid');
	$this->load->model('get_model');
	$data['record'] = $this->get_model->qap3_actionnew($data['carid']);
	$this ->load->view("head");
	$this ->load->view("left");
	$this ->load->view("Content_qap3_action_new",$data);
	}
	public function qap3_action_confirm(){
	$this ->load->view("head");
	$this ->load->view("left");
	$this ->load->view("Content_qap3_action_confirm");
	}
	public function qap3_action_edit(){
	$data['ssiq'] = $this->input->get('ssiq');
	$data['carid'] = $this->input->get('carid');
	$data['sl_no'] = $this->input->get('sl_no');
	$this->load->model('display_model');
	$data['record'] = $this->display_model->qap3_actiondisp($data['carid'],$data['sl_no']);
	$this ->load->view("head");
	$this ->load->view("left");
	$this ->load->view("Content_qap3_action_edit",$data);
	}
	public function qap3_action_confirmedit(){
	$this ->load->view("head");
	$this ->load->view("left");
	$this ->load->view("Content_qap3_action_confirmedit");
	}
	public function Schedule(){

		$this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['grpsel'] = $this->input->get('grp') ? $this->input->get('grp') : '';
		$mon = (date("j") > 8) ? date("m") : date("m")-1;
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) :  $mon;
		//echo sprintf("%02d", $this->input->get('m')).date("j")."lalalalalla".$data['month'];
		//exit();
		$data['year'] = ($data['month'] == 0)  ? $data['year']-1 : $data['year'];
		$data['month'] = ($data['month'] == 0)  ? 12 : $data['month'];
		function toArray($obj)
{
    $obj = (array) $obj;//cast to array, optional
    return $obj['path'];
}

    $idArray = array_map('toArray', $this->session->userdata('accessr'));

		//echo "nilai id : ".print_r($idArray);
		$data['chkers'] = $idArray;
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_Schedule",$data);
	}

  public function Store(){
	  $this->load->model("get_model");
		$data['limit'] = 35;

		isset($_GET['numrow']) ? $data['numrow'] = $_GET['numrow'] : $data['numrow'] = 1;
		isset($_GET['p']) ? $data['page'] = $_GET['p'] : $data['page'] = 1;
		$data['start'] = ($data['page'] * $data['limit']) - $data['limit'];
		//$data['rec'] = $this->get_model->get_assetcat();
    if (isset($_GET['id'])) {
    $data['rec'] = $this->get_model->get_stock_asset();
		$data['result'] = count($data['rec']);
	    if($data['result'] > ($data['page'] * $data['limit']) ){
		$data['next'] = ++$data['page'];
		}

		$this->load->model('display_model');
		$data['record'] = $this->display_model->stock_asset($this->input->post('searchquestion'),$data['limit'],$data['start']);

		foreach($data['record'] as $row){
		$data['pricel'] = $this->display_model->stock_passet($row->ItemCode,$row->Hosp_code);
		$data['pricerec'][] = $data['pricel'];

		$data['assetl'] = $this->display_model->storeasset_detail($row->ItemCode,$row->Hosp_code);
//print_r($data['pricel']);
//exit();
		$data['assetrec'][] = $data['assetl'];
		}
    } //end if getid
		function toArray($obj)
		{
    $obj = (array) $obj;//cast to array, optional
    return $obj['path'];
		}

    $idArray = array_map('toArray', $this->session->userdata('accessr'));

		//echo "nilai id : ".print_r($idArray);
		$data['chkers'] = $idArray;
		//exit();
		$this ->load->view("head");
		$this ->load->view("left");
		$this->load->model('get_model');
		$data['hospital'] = $this->get_model->getSiteHospital();

         if($this->input->get('id')) {
		$this ->load->view("content_pstore",$data);
		 }else {
		$this ->load->view("content_chstore",$data);
		 }
	}

	public function store_item_new(){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_store_item_new");
	}
	public function store_item_confirm(){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_store_item_confirm");
	}
	public function pecodes(){
    $data['scby'] = ($this->input->post('scby')) ? $this->input->post('scby') : '';
		$data['hosp'] = $this->input->get('hosp');
		$this->load->model('display_model');
		$data['record'] = $this->display_model->pecodes($data['hosp'],$data['scby']);
		$this ->load->view("head");
		$this ->load->view("content_pop_pecodes",$data);
	}
	public function pecodes2(){
		$data['ic'] = $this->input->get('ic');
		$this->load->model('display_model');
		$data['record'] = $this->display_model->pecodes2($data['ic']);
		$this ->load->view("head");
		$this ->load->view("content_pop_pecodes2",$data);
	}
	public function ustore(){

		$this->load->model('display_model');
		$data['id'] = $this->input->get('id');
		$data['qty'] = $this->input->get('qty');
		$data['n'] = $this->input->get('n');
		$data['p'] = $this->input->get('p');
		$data['act'] = $this->input->get('act');
		$data['store'] = $this->input->get('store');
		$data['n_Site_list'] = $this->input->get('n_Site_list');
		$data['arealist'] = $this->display_model->area_list();

		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_pop_ustore",$data);
	}
	public function ustore_c(){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_pop_ustore_c");
	}
	public function pop_requests(){
    $data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		//$data['wwo']= (!($this->input->get('wwo'))) || $this->input->get('wwo') == 1 ? 1 : 2;
		$data['wwo']= ($this->input->get('wwo') <> '') ?  $this->input->get('wwo') : 1;
		$data['s']= $this->input->get('s');
		$data['hosp'] = $this->session->userdata('hosp_code');
		$this->load->model('display_model');
		if($data['wwo'] == 1){
		$data['record'] = $this->display_model->poprequest_rcm($data['hosp'],$data['year'],$data['month'],$data['s']);
		}
		elseif($data['wwo'] == 2){
		$data['record'] = $this->display_model->poprequest_ppm($data['hosp'],$data['year'],$data['month']);
		}
		else{
			//exit();
		$data['record'] = $this->display_model->poprequest_mrin($data['hosp'],$data['year'],$data['month']);
		}
		$this ->load->view("head");
		$this ->load->view("content_pop_requests",$data);
	}



	public function schedule_p_work(){
	  $data['dept']=$this->input->get('dept', TRUE);
    $data['loc']=$this->input->get('loc', TRUE);
		$this ->load->view("headprinter");
		$this ->load->view("content_schedule_p_work", $data);
	}

	public function job_schedule(){
		if ($this->input->get('p')=='SWRJI'){
			$loct = explode('-',$this->input->get('loct'));
			$data['Scheduler_Name'] = $loct[0].'-'.$this->input->get('p');
		}
		else{
			$data['Scheduler_Name'] = $this->input->get('loct').'-'.$this->input->get('p');
		}
		//$data['Scheduler_Name'] = $this->input->get('loct').'-'.$this->input->get('p');

		$this->load->model('display_model');
		$data['record'] = $this->display_model->jobsch_disp($data['Scheduler_Name']);
		if (isset($data['record'][0]->Monthly_days)) {
		$data['weekDays'] = explode(',',$data['record'][0]->Monthly_days);
			foreach ($data['weekDays'] as $rows){
				if ($rows == 'Monday'){
					$data['Monday'] = $rows;
				}
				elseif ($rows == 'Tuesday'){
					$data['Tuesday'] = $rows;
				}
				elseif ($rows == 'Wednesday'){
					$data['Wednesday'] = $rows;
				}
				elseif ($rows == 'Thursday'){
					$data['Thursday'] = $rows;
				}
				elseif ($rows == 'Friday'){
					$data['Friday'] = $rows;
				}
				elseif ($rows == 'Saturday'){
					$data['Saturday'] = $rows;
				}
				else{
					$data['Sunday'] = $rows;
				}
			}
		}

		$this ->load->view("head");
		$this ->load->view("content_job_schedule",$data);
	}
	public function job_schedule_c(){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_job_schedule_c");
	}
	public function usaCleansing_Items(){
		$this ->load->view("headprinter");
		$this ->load->view("content_usaCleansing_Items");
	}


  	public function Report_Part(){
  		$data['item']= !($this->input->get('stockpart')) || $this->input->get('stockpart') == 'Select Item Name' ? '' : $this->input->get('stockpart');
  		//echo $data['item'];
  		//exit();
  		//$data['id']= $this->input->get('id');
  		//echo $data['id'];
  		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
  		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");

  		$this->load->model('display_model');
  		// $data['record'] = $this->display_model->stock_asset();

  			// foreach($data['record'] as $row){
  			// 	if($data['item'] == $row->ItemName){
  			// 		$data['code'] = $row->ItemCode;
  			// 	}
  			// }



  			//	exit();
  		if($data['item'] <> ''){
  		$data['assetrec'] = $this->display_model->storeasset_report($data['item'],$data['month'],$data['year']);
  		$unique = array();
  			foreach($data['assetrec'] as $asset){
  				$assetCode[]=$asset->ItemCode;
  				$data['assets']=$asset->ItemCode;
  				$data['codes']=array_unique($assetCode);
  				$data['occurences'] = array_count_values($assetCode);

  		}//print_r($data['codes']);
  		//exit();
  		$data['countarray'] = count($data['assetrec']);
  		if($data['countarray']==0){
  		$data['assetrec'] = array(
  								  '0' => (object)array('ItemCode'=> null),
  			);
  			$data['codes'] = array( null,
  );
  		}

  		}
  		else {
  		$data['assetrec'] = array(
  			'0' => (object)array('ItemCode'=> null),

  			);
  			$data['codes'] = array( null,
  );
  		}
  		// echo 'exit';
  		// exit();
  		$this ->load->view("headprinter");
  		$this ->load->view("content_Report_Part",$data);
  	}


	public function visitplus(){
		//$data ['records']= array(array('n_code' => 's Date 1', 'n_name'=>'Viseit Date 2','n_time'=>'Visidt Date 3','n_rate'=>'Viseit Date 2','n_total'=>'Visidt Date 3'));
		$data['wrk_ord'] = $this->input->get('wrk_ord');
		$this->load->model("display_model");

		//if (substr($data['wrk_ord'],0,2) == 'PP'){
		if ((substr($data['wrk_ord'],0,2) == 'PP') || (substr($data['wrk_ord'],0,2) == 'RI')) {
		$data['records'] = $this->display_model->visit1ppm_tab($data['wrk_ord']);
		$data['recordjob'] = $this->display_model->jobclose_ppm($data['wrk_ord']);
		}elseif(strstr($data['wrk_ord'], '/A2/')){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_ppmvisitplus",$data);
		}
		else{
		//$data['recordcheck'] = $this->display_model->response_tab($data['wrk_ord']);
		$data['records'] = $this->display_model->visit1_tab($data['wrk_ord']);
		$data['recordjob'] = $this->display_model->jobclose_tab($data['wrk_ord']);
		$data['record'] = $this->display_model->request_tab($data['wrk_ord']);
		}
		//print_r($data['records']);
		//exit();
		//Content_workorder_visitplus
		if ((substr($data['wrk_ord'],0,2) == 'PP') || (substr($data['wrk_ord'],0,2) == 'RI')){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_ppmvisitplus" , $data);
		}
		else{
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_visitplus" , $data);
		}

	}
		public function visitplusupdate(){
		$data['wrk_ord'] = $this->input->get('wrk_ord');
		$data['visit'] = $this->input->get('visit');
		$this->load->model("display_model");
		$this->load->model('get_model');
		//if (substr($data['wrk_ord'],0,2) == 'PP'){
		if ((substr($data['wrk_ord'],0,2) == 'PP') || (substr($data['wrk_ord'],0,2) == 'RI')){
		$data['latestvisit'] = $this->get_model->latestppmvisit($data['wrk_ord']);
		$data['record'] = $this->display_model->visit1ppm_utab($data['wrk_ord'],$data['visit']);
		$data['recordjob'] = $this->display_model->jobclose_ppm($data['wrk_ord']);
		}
		else{
		$data['latestvisit'] = $this->get_model->latestvisit($data['wrk_ord']);
		$data['record'] = $this->display_model->visit1_utab($data['wrk_ord'],$data['visit']);
		$data['recordjob'] = $this->display_model->jobclose_tab($data['wrk_ord']);
		}
		if (isset($data['record'][0]->v_WrkOrdNo)){
		$data['Stime'] = explode(':',$data['record'][0]->v_Time);
		$data['Etime'] = explode(':',$data['record'][0]->v_Etime);
		$data['P1time'] = explode(':',$data['record'][0]->n_Hours1);
		$data['P2time'] = explode(':',$data['record'][0]->n_Hours2);
		$data['P3time'] = explode(':',$data['record'][0]->n_Hours3);
		$data['P1personal'] = explode('-',$data['record'][0]->v_Personal1);
		//print_r($data['P1personal']);
		//echo '<br>';
		$data['P2personal'] = explode('-',$data['record'][0]->v_Personal2);
		$data['P3personal'] = explode('-',$data['record'][0]->v_Personal3);
		$data['P1Rate'] = number_format($data['record'][0]->n_Rate1,2);
		$data['P2Rate'] = number_format($data['record'][0]->n_Rate2,2);
		$data['P3Rate'] = number_format($data['record'][0]->n_Rate3,2);
		$data['P1Trate'] = number_format($data['record'][0]->n_Total1,2);
		$data['P2Trate'] = number_format($data['record'][0]->n_Total2,2);
		$data['P3Trate'] = number_format($data['record'][0]->n_Total3,2);
		$data['Vendor'] = explode('-',$data['record'][0]->v_Vendor1);
		$data['PartRM'] = number_format($data['record'][0]->n_PartRM,2);
		$data['PartTrate'] = number_format($data['record'][0]->n_PartTotal,2);
		$data['rschReason'] = explode(':',$data['record'][0]->v_ReschReason);
		}

		//if (substr($data['wrk_ord'],0,2) == 'PP'){
		if ((substr($data['wrk_ord'],0,2) == 'PP') || (substr($data['wrk_ord'],0,2) == 'RI')){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_ppmvisitplusupdate",$data);
		}
		else{
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorder_visitplusupdate",$data);
		}
	}

	public function visitplusconfirm(){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_ppmvisitplusconfirm");
		//Content_workorder_visitplusconfirm
	}

	public function p_Schduler(){
		$data['loct'] = $this->input->get('loct');
		$data['dept'] = explode('-',$data['loct']);

		$this->load->model('display_model');
		$data['record'] = $this->display_model->job_schedule($data['dept'][0]);

		foreach ($data['record'] as $row){
			$data['d'] = explode('-',$row->Scheduler_Name);

			/*if (($row->Scheduler_Name == $data['loct'].'-PWMP') ){
				$data['PWMP'] = $row->Scheduler_Name;
			}
			else{
				if($data['d'][0] == $data['dept'][0] AND end($data['d']) == 'PWMP'){
					$data['PWMP'] = $data['dept'][0];
				}
			}
			if ($row->Scheduler_Name == $data['loct'].'-WPP'){
				$data['WPP'] = $row->Scheduler_Name;
			}
			else{
				if($data['d'][0] == $data['dept'][0] AND end($data['d']) == 'WPP'){
					$data['WPP'] = $data['dept'][0];
				}
			}*/
			if ($row->Scheduler_Name == $data['loct'].'-SWRJI'){
				$data['SWRJI'] = $row->Scheduler_Name;
			}
			else{
				if($data['d'][0] == $data['dept'][0] AND end($data['d']) == 'SWRJI'){
					$data['SWRJI'] = $data['dept'][0];
				}
			}
			/*if ($row->Scheduler_Name == $data['loct'].'-GWCS'){
				$data['GWCS'] = $row->Scheduler_Name;
			}
			else{
				if($data['d'][0] == $data['dept'][0] AND end($data['d']) == 'GWCS'){
					$data['GWCS'] = $data['dept'][0];
				}
			}*/
			if ($row->Scheduler_Name == $data['loct'].'-SPW'){
				$data['SPW'] = $row->Scheduler_Name;
			}
			/*if ($row->Scheduler_Name == $data['loct'].'-DCA'){
				$data['DCA'] = $row->Scheduler_Name;
			}
			if ($row->Scheduler_Name == $data['loct'].'-DCAP'){
				$data['DCAP'] = $row->Scheduler_Name;
			}*/
		//echo 'j ';
		//print_r($data['PWMP']);
		//echo '<br>';
		}


		$this ->load->view("head");
		$this ->load->view("content_p_Schduler",$data);
	}
	public function acg(){
		$data['month'] = ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['year'] = ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");

		isset($_POST['n_base']) ? $data['s_code'] = $_POST['n_base'] : $data['s_code'] = 'BES';
		isset($_POST['fromMonth']) ? $data['fmonth'] = $_POST['fromMonth'] : $data['fmonth'] = $data['month'];
		isset($_POST['fromMonth']) && isset($_POST['fromYear']) ? $data['pdate'] = date("Y-m-d",strtotime("-1 months", strtotime($_POST['fromYear'].'-'.$_POST['fromMonth'].'-01'))) : $data['pdate'] = date("Y-m-d", strtotime("-1 months", strtotime($data['year'].'-'.$data['month'].'-01')));
		isset($_POST['fromYear']) ? $data['fyear'] = $_POST['fromYear'] : $data['fyear'] = $data['year'];
		//exit();
		//echo $data['s_code'].'<br>'.$data['fmonth'].'<br>'.$data['fyear'].'<br>';

		$this->load->model('display_model');
		$data['keyindicator'] = $this->display_model->keyindicator($data['s_code'],$data['fmonth'],$data['fyear']);
		//print_r($data['keyindicator']);
		//exit();
		if (!$data['keyindicator']){
			$data['keyindlist'] = $this->display_model->keyindlist($data['s_code']);
		}
		$data['prev'] = $this->display_model->keyindicator($data['s_code'],date('m',strtotime($data['pdate'])),date('Y',strtotime($data['pdate'])));
		//$data['prev'] = $this->display_model->keyindicatorprev($data['s_code'],date('m',strtotime($data['pdate'])),date('Y',strtotime($data['pdate'])));
		//print_r($data['keyindlist']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_acg",$data);
	}
	public function acg_confirm(){
		$this ->load->view("headprinter");
		$this ->load->view("Content_acg_confirm");
	}
	public function fnindex_new(){
		$data['month'] = ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['year'] = ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");

		isset($_POST['n_base']) ? $data['s_code'] = $_POST['n_base'] : $data['s_code'] = 'BES';
		isset($_POST['fromMonth']) ? $data['fmonth'] = $_POST['fromMonth'] : $data['fmonth'] = $data['month'];
		isset($_POST['fromYear']) ? $data['fyear'] = $_POST['fromYear'] : $data['fyear'] = $data['year'];

		$this->load->model('display_model');
		$data['record'] = $this->display_model->acg_list($data['s_code'],$data['fmonth'],$data['fyear']);

		$this ->load->view("headprinter");
		$this ->load->view("Content_fnindex_new",$data);
	}
	public function fsfrindex_new(){
		$data['month'] = ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['year'] = ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");

		isset($_POST['n_base']) ? $data['s_code'] = $_POST['n_base'] : $data['s_code'] = 'BES';
		isset($_POST['fromMonth']) ? $data['fmonth'] = $_POST['fromMonth'] : $data['fmonth'] = $data['month'];
		isset($_POST['fromYear']) ? $data['fyear'] = $_POST['fromYear'] : $data['fyear'] = $data['year'];

		$this->load->model('display_model');
		$data['record'] = $this->display_model->financial_list($data['s_code'],$data['fmonth'],$data['fyear']);

		$this ->load->view("headprinter");
		$this ->load->view("Content_fsfrindex_new",$data);
	}
	public function fsfrinput(){
		$data['month'] = ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['year'] = ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");

		isset($_POST['n_base']) ? $data['s_code'] = $_POST['n_base'] : $data['s_code'] = 'BES';
		isset($_POST['fromMonth']) ? $data['fmonth'] = $_POST['fromMonth'] : $data['fmonth'] = $data['month'];
		isset($_POST['fromYear']) ? $data['fyear'] = $_POST['fromYear'] : $data['fyear'] = $data['year'];

		$this->load->model('display_model');
		$data['record'] = $this->display_model->financial_list($data['s_code'],$data['fmonth'],$data['fyear']);
		$this ->load->view("headprinter");
		$this ->load->view("Content_fsfrinput",$data);
	}
	public function fsfrinputcfirm(){
		$this ->load->view("headprinter");
		$this ->load->view("Content_fsfrinputcfirm");
	}
	public function delpic(){
		//echo 'masuk<br>';
		$data['imgid'] = $this->input->get('imgid');
		$data['assetno'] = $this->input->get('assetno');
		$data['sess'] = $this->input->get('sess');
		$data['hosp'] = $this->input->get('hosp');
		$insert_data = array('action_flag' => 'D');

		$this->load->model('update_model');
		$this->update_model->deleteimg($insert_data,$data['imgid'],$data['assetno'],$data['sess'],$data['hosp']);

		redirect('contentcontroller/assetupdate?asstno='.$data['assetno'].'&tab=0&parent=assets');
		//echo $this->input->get('imgid').'<br>'.$this->input->get('assetno').'<br>'.$this->input->get('sess').'<br>'.$this->input->get('hosp');
		//exit();
		//$this->load->model('delete_model');
		//$this->delete_model->
	}

	public function ASummaryListing(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this->load->model("get_model");
		$data['asset_cat'] = $this->get_model->get_assetcat();
		$this ->load->view("Content_ASummaryListing", $data);
	}
	public function ttassetmodel(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this->load->model("get_model");
		$data['asset_mod'] = $this->get_model->get_assetmod();
		$this ->load->view("ttassetmodel", $data);
	}
	public function ttassetmanufacturer(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this->load->model("get_model");
		$data['asset_man'] = $this->get_model->get_assetmanu();
		$this ->load->view("Content_ttassetmanufacturer", $data);
	}
	public function ttassettype(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this->load->model("get_model");
		$data['asset_cos'] = $this->get_model->get_assetcost();
		$this ->load->view("Content_ttassettype", $data);
	}
	public function ttassetpcmodel(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this->load->model("get_model");
		$data['asset_cosm'] = $this->get_model->get_assetcostm();
		$this ->load->view("Content_ttassetpcmodel", $data);
	}
	public function ttassetpcmanufacturer(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this->load->model("get_model");
		$data['asset_cosmanu'] = $this->get_model->get_assetcostmanu();
		$this ->load->view("Content_ttassetpcmanufacturer", $data);
	}
	public function ttassetdepart(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this->load->model("get_model");
		$data['asset_bydebt'] = $this->get_model->get_assetbdept();
		$this ->load->view("Content_ttassetdepart", $data);
	}
	public function ttassetgroupasset(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this ->load->view("ttassetgroupasset");
	}
	public function ttassetyearpurchase(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this->load->model("get_model");
		$data['asset_bydebt'] = $this->get_model->get_assetbyear();
		$this ->load->view("Content_ttassetyearpurchase", $data);
	}
	public function ttassetlocation(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this->load->model("get_model");
		$data['asset_byloc'] = $this->get_model->get_assetbloc();
		$this ->load->view("Content_ttassetlocation", $data);
	}
	public function ttassetstatus(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this->load->model("get_model");
		$data['asset_bystatus'] = $this->get_model->get_assetbstatus();
		$this ->load->view("Content_ttassetstatus", $data);
	}
	public function ttassetcondition(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this->load->model("get_model");
		$data['asset_bycond'] = $this->get_model->get_assetbcond();
		$this ->load->view("Content_ttassetcondition", $data);
	}
	public function ttassetvariation(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this->load->model("get_model");
		$data['asset_byvar'] = $this->get_model->get_assetbvar();
		$this ->load->view("Content_ttassetvariation", $data);
	}
	public function ttassetwarranty(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this ->load->view("Content_ttassetwarranty");
	}
	public function ttassetexceedwarranty(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this ->load->view("Content_ttassetexceedwarranty");
	}
	public function ttassetaging(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this ->load->view("Content_ttassetaging");
	}
	public function ttassetrequiment(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this ->load->view("Content_ttassetrequiment");
	}
	public function ttassetPartCost(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this ->load->view("Content_ttassetPartCost");
	}
	public function ttrrlate(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this->load->model("get_model");
		$data['c_lateresponse'] = $this->get_model->get_cresponselate();
		$this ->load->view("Content_ttrrlate", $data);
	}
	public function ttrrontime(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this->load->model("get_model");
		$data['c_responseontime'] = $this->get_model->get_cresponseontime();
		$this ->load->view("Content_ttrrontime", $data);
	}
	public function ttrrdepartment(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this->load->model("get_model");
		$data['wo_bydept'] = $this->get_model->get_cbydept();
		$this ->load->view("Content_ttrrdepartment", $data);
	}
	public function ttrraging(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this->load->model("get_model");
		$data['wo_byage'] = $this->get_model->get_cbyage();
		$this ->load->view("Content_ttrraging", $data);
	}
	public function ttrrtechnical(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this->load->model("get_model");
		$data['wo_bypersonnel'] = $this->get_model->get_cbypersonnel();
		$this ->load->view("Content_ttrrtechnical", $data);
	}
	public function ttrtimeframe(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this->load->model("get_model");
		$data['wo_responseontime'] = $this->get_model->get_woresponseontime();
		$this ->load->view("Content_ttrtimeframe", $data);
	}
	public function ttroutstandingtimeframe(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this->load->model("get_model");
		$data['wo_lateresponse'] = $this->get_model->get_woresponselate();
		$this ->load->view("Content_ttroutstandingtimeframe", $data);
	}
	public function ttrassettmm(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this->load->model("get_model");
		$data['wo_bymodelman'] = $this->get_model->get_wobymodelman();
		$this ->load->view("Content_ttrassettmm", $data);
	}
	public function ttrld(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this->load->model("get_model");
		$data['wo_bydept'] = $this->get_model->get_wobydept();
		$this ->load->view("Content_ttrld", $data);
	}
	public function ttrttrassetscv(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this->load->model("get_model");
		$data['wo_byscv'] = $this->get_model->get_wobyassetscv();
		$this ->load->view("Content_ttrttrassetscv", $data);
	}
	public function ttrts(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this->load->model("get_model");
		$data['wo_bypersonnel'] = $this->get_model->get_wobypersonnel();
		$this ->load->view("Content_ttrts", $data);
	}
	public function ttrctimeframe(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this->load->model("get_model");
		$data['ppmon'] = $this->get_model->get_ppmtarget();
		$this ->load->view("Content_ttrctimeframe", $data);
	}
	public function ttrcoutstandingtimeframe(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this->load->model("get_model");
		$data['ppmonoff'] = $this->get_model->get_ppmofftarget();
		$this ->load->view("Content_ttrcoutstandingtimeframe", $data);
	}
	public function ttrcdiscipline(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this ->load->view("Content_ttrcdiscipline");
	}
	public function ttrcassettmm(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this->load->model("get_model");
		$data['ppmmm'] = $this->get_model->get_ppmmm();
		$this ->load->view("Content_ttrcassettmm", $data);
	}
	public function ttrcld(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this->load->model("get_model");
		$data['ppmld'] = $this->get_model->get_ppmld();
		$this ->load->view("Content_ttrcld", $data);
	}
	public function ttrcttrassetscv(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this->load->model("get_model");
		$data['ppmscv'] = $this->get_model->get_ppmscv();
		$this ->load->view("Content_ttrcttrassetscv", $data);
	}
	public function ttrcts(){
		$this ->load->view("headreport");
		$this ->load->view("leftreport");
		$this->load->model("get_model");
		$data['ppmperson'] = $this->get_model->get_ppmbypersonnel();
		$this ->load->view("Content_ttrcts", $data);
	}
	public function Service_update(){
		$data['asstno'] = $this->input->get('asstno');
		$this->load->model('display_model');
		$data['record'] = $this->display_model->servicecontract($data['asstno']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_asset_Service_update",$data);
	}
	public function Service_confirm(){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_asset_Service_confirm");
	}
	public function delete_wo(){
		$wrk_ord = $this->input->get('wrk_ord');
		$this->load->model('update_model');
		$insert_data = array('V_actionflag' => 'D',
							 'D_timestamp' => date("Y-m-d H:i:s"));
		$this->update_model->delete_wo($insert_data,$wrk_ord);
		redirect('contentcontroller/workorder');
	}

	public function ppm_set_detail (){
		$data['assetno'] = $this->input->get('assetno');
		$data['year'] = $this->input->get('jobyear');
		$this->load->model("get_model");
		$data['records'] = $this->get_model->assetjobtyperegy($data['assetno'],$data['year']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("ppm_set_detail",$data);
	}
	public function vendor_reg (){
		//$data['assetno'] = $this->input->get('assetno');
		//$data['year'] = $this->input->get('jobyear');
		//$this->load->model("get_model");
		//$data['records'] = $this->get_model->assetjobtyperegy($data['assetno'],$data['year']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vendor_reg");
	}
	public function vendor_reg_confirm (){
		//$data['assetno'] = $this->input->get('assetno');
		//$data['year'] = $this->input->get('jobyear');
		//$this->load->model("get_model");
		//$data['records'] = $this->get_model->assetjobtyperegy($data['assetno'],$data['year']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vendor_reg_confirm");
	}
	public function vendor_reg_update (){
		//$data['assetno'] = $this->input->get('assetno');
		//$data['year'] = $this->input->get('jobyear');
		//$this->load->model("get_model");
		//$data['records'] = $this->get_model->assetjobtyperegy($data['assetno'],$data['year']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vendor_reg");
	}


	public function report_print_workorder(){
		$this->load->model("get_model");
		$data['wrk_ord'] = $this->input->get('wrk_ord');
		$this->load->model("display_model");
		$data['hosp'] = $this->display_model->list_hospinfo();
		$data['woinfo'] = $this->get_model->request_update($data['wrk_ord']);
		$data['woinfo2'] = $this->display_model->request_tab($data['wrk_ord']);
		$this ->load->view("headprinter");
		$this ->load->view("report_print_workorder", $data);
	}
	public function report_print_RSReport(){
		$data['daterange'] = $this->input->post('daterange');
		$data['wostat'] = $this->input->post('wostat');

		if($data['wostat'] == 'A' OR $this->input->get('stat') == 'A'){
			$data['status'] = 'ALL REQUESTS';
		}
		else if($data['wostat'] == 'C' OR $this->input->get('stat') == 'C'){
			$data['status'] = 'COMPLETED REQUESTS';
		}
		else{
			$data['status'] = 'INCOMPLETE REQUESTS';
		}

		if ($data['daterange'][0]){
			$data['startdate'] = date('d F Y',strtotime($data['daterange'][0]));
		}
		else if($this->input->get('sdate')){
			$data['startdate'] = date('d F Y',strtotime($this->input->get('sdate')));
		}
		else{
			$data['startdate'] = '';
		}

		if ($data['daterange'][1]){
			$data['enddate'] = date('d F Y',strtotime($data['daterange'][1]));
		}
		else if($this->input->get('edate')){
			$data['enddate'] = date('d F Y',strtotime($this->input->get('edate')));
		}
		else{
			$data['enddate'] = '';
		}

		$this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		if ($this->input->get('none') == 'closed'){
		$data['record'] = $this->display_model->wostatus($this->input->get('sdate'),$this->input->get('edate'),$this->input->get('stat'));
		}
		else{
		//$data['record'] = $this->display_model->wostatusrep($this->input->post('wrk_odrno'));
		$data['record'] = $this->display_model->wostatus(date("Y-m-d",strtotime($data['daterange'][0])),date("Y-m-d",strtotime($data['daterange'][1])),$data['wostat']);
		}
		$this ->load->view("headprinter");
		$this ->load->view("report_print_RSReport",$data);
	}
	public function report_print_PPMWOrders(){
		$data['daterange'] = $this->input->post('daterange');
		$data['wostat'] = $this->input->post('wostat');

		if($data['wostat'] == 'A' OR $this->input->get('stat') == 'A'){
			$data['status'] = 'ALL PPM WORK ORDERS';
		}
		else if($data['wostat'] == 'C' OR $this->input->get('stat') == 'C'){
			$data['status'] = 'COMPLETED PPM WORK ORDERS';
		}
		else{
			$data['status'] = 'INCOMPLETE PPM WORK ORDERS';
		}

		if ($data['daterange'][0]){
			$data['startdate'] = date('d F Y',strtotime($data['daterange'][0]));
		}
		else if($this->input->get('sdate')){
			$data['startdate'] = date('d F Y',strtotime($this->input->get('sdate')));
		}
		else{
			$data['startdate'] = '';
		}

		if ($data['daterange'][1]){
			$data['enddate'] = date('d F Y',strtotime($data['daterange'][1]));
		}
		else if($this->input->get('edate')){
			$data['enddate'] = date('d F Y',strtotime($this->input->get('edate')));
		}
		else{
			$data['enddate'] = '';
		}

		$this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		if ($this->input->get('none') == 'closed'){
		$data['record'] = $this->display_model->ppmstatus($this->input->get('sdate'),$this->input->get('edate'),$this->input->get('stat'));
		}
		else{
		//$data['record'] = $this->display_model->ppmstatusrep($this->input->post('wrk_odrno'));
		$data['record'] = $this->display_model->ppmstatus(date("Y-m-d",strtotime($data['daterange'][0])),date("Y-m-d",strtotime($data['daterange'][1])),$data['wostat']);
		}
		$this ->load->view("headprinter");
		$this ->load->view("report_print_PPMWOrders",$data);
	}
	public function report_print_ppmms(){
		$data['month'] = $this->input->get_post('n_month');
		$data['year'] = $this->input->get_post('n_year');
		$this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['record'] = $this->display_model->mppmsummary($data['month'],$data['year']);
		$this ->load->view("headprinter");
		$this ->load->view("report_print_ppmms",$data);
	}
	public function report_print_RPPMW(){
		$data['daterange'] = $this->input->post('daterange');

		if ($data['daterange'][0]){
			$data['startdate'] = date('d F Y',strtotime($data['daterange'][0]));
		}
		else if($this->input->get('sdate')){
			$data['startdate'] = date('d F Y',strtotime($this->input->get('sdate')));
		}
		else{
			$data['startdate'] = '';
		}

		if ($data['daterange'][1]){
			$data['enddate'] = date('d F Y',strtotime($data['daterange'][1]));
		}
		else if($this->input->get('edate')){
			$data['enddate'] = date('d F Y',strtotime($this->input->get('edate')));
		}
		else{
			$data['enddate'] = '';
		}

		$this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		if ($this->input->get('none') == 'closed'){
		$data['record'] = $this->display_model->reschPPM($this->input->get('sdate'),$this->input->get('edate'));
			foreach($data['record'] as $row){
				$data['recorddata'][$row->v_WrkOrdNo] = array($row);
			}
		}
		else{
		//$data['record'] = $this->display_model->ppmstatusrep($this->input->post('wrk_odrno'));
		$data['record'] = $this->display_model->reschPPM(date("Y-m-d",strtotime($data['daterange'][0])),date("Y-m-d",strtotime($data['daterange'][1])));
			foreach($data['record'] as $row){
				$data['recorddata'][$row->v_WrkOrdNo] = array($row);
			}
		}
		$this ->load->view("headprinter");
		$this ->load->view("report_print_RPPMW",$data);
	}
	public function report_ppmyearlyplanner(){
		isset($_REQUEST['n_range']) ? $data['range'] = $_REQUEST['n_range'] : $data['range'] = '';
		isset($_REQUEST['myclear']) ? $data['clearbutton'] = $_REQUEST['myclear'] : $data['clearbutton'] = '';
		isset($_REQUEST['data_file']) ? $data['datafile'] = $_REQUEST['data_file'] : $data['datafile'] = "";

		$this->load->model('display_model');
		if ($data['range'] <> ''){
			if ($data['clearbutton'] == "CLEAR"){
				$data['range'] = "";
			}
			else{
				if ($data['datafile'] == 'Y'){
					if ($data['range'] == 'E'){
						$data['record'] = $this->display_model->equiprange();
						$data['title'] = 'Equipment Code and Description';
					}
					else{
						$data['record'] = $this->display_model->deptrange();
						$data['title'] = 'User Department';
					}
				}
				else{
					$this->load->library('../controllers/assetppmplanner');
					$data['kalender'] = $this->assetppmplanner->gen_cal(date('Y'));
					$data['count'] = 0;
					foreach ($data['kalender'] as $row){
						$data['count'] += count($row);
					}
					if ($data['range'] == 'E'){
						$data['record'] = $this->display_model->equiprangebycode($this->input->post('chk_bxppm'));
						$data['titletab'] = 'Equipment Code';
					}
					else{
						$data['record'] = $this->display_model->deptrangebycode($this->input->post('chk_bxppm'));
						$data['titletab'] = 'User Department';
					}
				}
			}
		}

		$data['tabber'] = ($this->input->get('work-a') <> 0) ? $this->input->get('work-a') : '0';
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");

		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_report_ppm_yearlyplanner",$data);
	}
	public function acg_modulesf(){
		$data['month'] = ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['year'] = ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");

		$this->load->model('display_model');
		$data['servrec'] = $this->display_model->service_rec($this->session->userdata('v_UserName'));
		isset($_REQUEST['n_base']) ? $data['service'] = $_REQUEST['n_base'] : $data['service'] = 'BES';
		isset($_REQUEST['fromMonth']) ? $data['fmonth'] = $_REQUEST['fromMonth'] : $data['fmonth'] = $data['month'];
		isset($_REQUEST['fromYear']) ? $data['fyear'] = $_REQUEST['fromYear'] : $data['fyear'] = $data['year'];
		isset($_REQUEST['R_detail']) ? $data['rdetail'] = $_REQUEST['R_detail'] : $data['rdetail'] = '';
		isset($_REQUEST['No_Request']) ? $data['noreq'] = $_REQUEST['No_Request'] : $data['noreq'] = '';
		isset($_REQUEST['Dept']) ? $data['dept_c'] = $_REQUEST['Dept'] : $data['dept_c'] = '';

		$data['keyindlist'] = $this->display_model->keyindlist($data['service']);
		$data['count'] = count($data['keyindlist']);
		$data['acgparam'] = $this->display_model->acgparam($data['service'],$data['fmonth'],$data['fyear']);

		$data['limit'] = 10;
		isset($_GET['p']) ? $data['page'] = $_GET['p'] : $data['page'] = 1;
		$data['start'] = ($data['page'] * $data['limit']) - $data['limit'];

		$data['rec'] = $this->display_model->acg_modulesf_c($data['service'],$data['fmonth'],$data['fyear'],$data['rdetail'],$data['noreq'],$data['dept_c']);
		if($data['rec'][0]->jumlah > ($data['page'] * $data['limit']) ){
			$data['next'] = ++$data['page'];
		}

		$data['record'] = $this->display_model->acg_modulesf($data['service'],$data['fmonth'],$data['fyear'],$data['rdetail'],$data['noreq'],$data['dept_c'],$data['limit'],$data['start']);


		$data['totalind1pg'] = 0;
		$data['totalind2pg'] = 0;
		$data['totalind3pg'] = 0;
		$data['totalind4pg'] = 0;
		$data['totalind5pg'] = 0;
		$data['totalind6pg'] = 0;
		$data['totalind7pg'] = 0;
		$data['totalind8pg'] = 0;
		$data['totalind9pg'] = 0;
		$data['totalind10pg'] = 0;
		$data['totalind11pg'] = 0;
		$data['totalparam1pg'] = 0;
		$data['totalparam2pg'] = 0;
		$data['totalparam3pg'] = 0;
		$data['totalparam4pg'] = 0;
		$data['totalparam5pg'] = 0;
		$data['totalparam6pg'] = 0;
		$data['totalparam7pg'] = 0;
		$data['totalparam8pg'] = 0;
		$data['totalparam9pg'] = 0;
		$data['totalparam10pg'] = 0;
		$data['totalparam11pg'] = 0;
		foreach ($data['record'] as $rec){
			$data['totalind1pg'] += $rec->v_IndicatorNo1;
			$data['totalind2pg'] += $rec->v_IndicatorNo2;
			$data['totalind3pg'] += $rec->v_IndicatorNo3;
			$data['totalind4pg'] += $rec->v_IndicatorNo4;
			$data['totalind5pg'] += $rec->v_IndicatorNo5;
			$data['totalind6pg'] += $rec->v_IndicatorNo6;
			$data['totalind7pg'] += $rec->v_IndicatorNo7;
			$data['totalind8pg'] += $rec->v_IndicatorNo8;
			$data['totalind9pg'] += $rec->v_IndicatorNo9;
			$data['totalind10pg'] += $rec->v_IndicatorNo10;
			$data['totalind11pg'] += $rec->v_IndicatorNo11;

			foreach ($data['acgparam'] as $acg){

				if ($acg->v_IndicatorNo == 1){
				   if ($acg->v_Paramval != 0) {
					$data['totalparam1pg'] += $rec->v_IndicatorNo1 * ($acg->n_Revenue / $acg->v_Paramval); }
				}
				if ($acg->v_IndicatorNo == 2){
				   if ($acg->v_Paramval != 0) {
					$data['totalparam2pg'] += $rec->v_IndicatorNo2 * ($acg->n_Revenue / $acg->v_Paramval); }
				}
				if ($acg->v_IndicatorNo == 3){
					 if ($acg->v_Paramval != 0) {
					$data['totalparam3pg'] += $rec->v_IndicatorNo3 * ($acg->n_Revenue / $acg->v_Paramval); }
				}
				if ($acg->v_IndicatorNo == 4){
					 if ($acg->v_Paramval != 0) {
					$data['totalparam4pg'] += $rec->v_IndicatorNo4 * ($acg->n_Revenue / $acg->v_Paramval); }
				}
				if ($acg->v_IndicatorNo == 5){
					 if ($acg->v_Paramval != 0) {
					$data['totalparam5pg'] += $rec->v_IndicatorNo5 * ($acg->n_Revenue / $acg->v_Paramval); }
				}
				if ($acg->v_IndicatorNo == 6){
					 if ($acg->v_Paramval != 0) {
					$data['totalparam6pg'] += $rec->v_IndicatorNo6 * ($acg->n_Revenue / $acg->v_Paramval); }
				}
				if ($acg->v_IndicatorNo == 7){
					 if ($acg->v_Paramval != 0) {
					$data['totalparam7pg'] += $rec->v_IndicatorNo7 * ($acg->n_Revenue / $acg->v_Paramval); }
				}
				if ($acg->v_IndicatorNo == 8){
					 if ($acg->v_Paramval != 0) {
					$data['totalparam8pg'] += $rec->v_IndicatorNo8 * ($acg->n_Revenue / $acg->v_Paramval); }
				}
				if ($acg->v_IndicatorNo == 9){
					 if ($acg->v_Paramval != 0) {
					$data['totalparam9pg'] += $rec->v_IndicatorNo9 * ($acg->n_Revenue / $acg->v_Paramval); }
				}
				if ($acg->v_IndicatorNo == 10){
					 if ($acg->v_Paramval != 0) {
					$data['totalparam10pg'] += $rec->v_IndicatorNo10 * ($acg->n_Revenue / $acg->v_Paramval); }
				}
				if ($acg->v_IndicatorNo == 11){
					 if ($acg->v_Paramval != 0) {
					$data['totalparam11pg'] += $rec->v_IndicatorNo11 * ($acg->n_Revenue / $acg->v_Paramval); }
				}
			}
		}

		$data['totalindpg'] = array(1 => $data['totalind1pg'],
									2 => $data['totalind2pg'],
									3 => $data['totalind3pg'],
									4 => $data['totalind4pg'],
									5 => $data['totalind5pg'],
									6 => $data['totalind6pg'],
									7 => $data['totalind7pg'],
									8 => $data['totalind8pg'],
									9 => $data['totalind9pg'],
									10 => $data['totalind10pg'],
									11 => $data['totalind11pg']);

		$data['totalparampg'] = array(1 => number_format($data['totalparam1pg'],2),
									2 => number_format($data['totalparam2pg'],2),
									3 => number_format($data['totalparam3pg'],2),
									4 => number_format($data['totalparam4pg'],2),
									5 => number_format($data['totalparam5pg'],2),
									6 => number_format($data['totalparam6pg'],2),
									7 => number_format($data['totalparam7pg'],2),
									8 => number_format($data['totalparam8pg'],2),
									9 => number_format($data['totalparam9pg'],2),
									10 => number_format($data['totalparam10pg'],2),
									11 => number_format($data['totalparam11pg'],2));

		$data['recordt'] = $this->display_model->acg_modulesfx($data['service'],$data['fmonth'],$data['fyear'],$data['rdetail'],$data['noreq'],$data['dept_c']);

		$data['totalind1t'] = 0;
		$data['totalind2t'] = 0;
		$data['totalind3t'] = 0;
		$data['totalind4t'] = 0;
		$data['totalind5t'] = 0;
		$data['totalind6t'] = 0;
		$data['totalind7t'] = 0;
		$data['totalind8t'] = 0;
		$data['totalind9t'] = 0;
		$data['totalind10t'] = 0;
		$data['totalind11t'] = 0;
		$data['totalparam1t'] = 0;
		$data['totalparam2t'] = 0;
		$data['totalparam3t'] = 0;
		$data['totalparam4t'] = 0;
		$data['totalparam5t'] = 0;
		$data['totalparam6t'] = 0;
		$data['totalparam7t'] = 0;
		$data['totalparam8t'] = 0;
		$data['totalparam9t'] = 0;
		$data['totalparam10t'] = 0;
		$data['totalparam11t'] = 0;
		foreach ($data['recordt'] as $rect){
			$data['totalind1t'] += $rect->v_IndicatorNo1;
			$data['totalind2t'] += $rect->v_IndicatorNo2;
			$data['totalind3t'] += $rect->v_IndicatorNo3;
			$data['totalind4t'] += $rect->v_IndicatorNo4;
			$data['totalind5t'] += $rect->v_IndicatorNo5;
			$data['totalind6t'] += $rect->v_IndicatorNo6;
			$data['totalind7t'] += $rect->v_IndicatorNo7;
			$data['totalind8t'] += $rect->v_IndicatorNo8;
			$data['totalind9t'] += $rect->v_IndicatorNo9;
			$data['totalind10t'] += $rect->v_IndicatorNo10;
			$data['totalind11t'] += $rect->v_IndicatorNo11;

			foreach ($data['acgparam'] as $acg){
				if ($acg->v_IndicatorNo == 1){
					 if ($acg->v_Paramval != 0) {
					$data['totalparam1t'] += $rect->v_IndicatorNo1 * ($acg->n_Revenue / $acg->v_Paramval); }
				}
				if ($acg->v_IndicatorNo == 2){
					 if ($acg->v_Paramval != 0) {
					$data['totalparam2t'] += $rect->v_IndicatorNo2 * ($acg->n_Revenue / $acg->v_Paramval); }
				}
				if ($acg->v_IndicatorNo == 3){
					 if ($acg->v_Paramval != 0) {
					$data['totalparam3t'] += $rect->v_IndicatorNo3 * ($acg->n_Revenue / $acg->v_Paramval); }
				}
				if ($acg->v_IndicatorNo == 4){
					 if ($acg->v_Paramval != 0) {
					$data['totalparam4t'] += $rect->v_IndicatorNo4 * ($acg->n_Revenue / $acg->v_Paramval); }
				}
				if ($acg->v_IndicatorNo == 5){
					 if ($acg->v_Paramval != 0) {
					$data['totalparam5t'] += $rect->v_IndicatorNo5 * ($acg->n_Revenue / $acg->v_Paramval); }
				}
				if ($acg->v_IndicatorNo == 6){
					 if ($acg->v_Paramval != 0) {
					$data['totalparam6t'] += $rect->v_IndicatorNo6 * ($acg->n_Revenue / $acg->v_Paramval); }
				}
				if ($acg->v_IndicatorNo == 7){
					 if ($acg->v_Paramval != 0) {
					$data['totalparam7t'] += $rect->v_IndicatorNo7 * ($acg->n_Revenue / $acg->v_Paramval); }
				}
				if ($acg->v_IndicatorNo == 8){
					 if ($acg->v_Paramval != 0) {
					$data['totalparam8t'] += $rect->v_IndicatorNo8 * ($acg->n_Revenue / $acg->v_Paramval); }
				}
				if ($acg->v_IndicatorNo == 9){
					 if ($acg->v_Paramval != 0) {
					$data['totalparam9t'] += $rect->v_IndicatorNo9 * ($acg->n_Revenue / $acg->v_Paramval); }
				}
				if ($acg->v_IndicatorNo == 10){
					 if ($acg->v_Paramval != 0) {
					$data['totalparam10t'] += $rect->v_IndicatorNo10 * ($acg->n_Revenue / $acg->v_Paramval); }
				}
				if ($acg->v_IndicatorNo == 11){
					 if ($acg->v_Paramval != 0) {
					$data['totalparam11t'] += $rect->v_IndicatorNo11 * ($acg->n_Revenue / $acg->v_Paramval); }
				}
			}
		}
//echo $data['totalparam1pg'];
//exit();
		$data['totalindt'] = array(1 => $data['totalind1t'],
									2 => $data['totalind2t'],
									3 => $data['totalind3t'],
									4 => $data['totalind4t'],
									5 => $data['totalind5t'],
									6 => $data['totalind6t'],
									7 => $data['totalind7t'],
									8 => $data['totalind8t'],
									9 => $data['totalind9t'],
									10 => $data['totalind10t'],
									11 => $data['totalind11t']);

		$data['totalparamt'] = array(1 => number_format($data['totalparam1t'],2),
									2 => number_format($data['totalparam2t'],2),
									3 => number_format($data['totalparam3t'],2),
									4 => number_format($data['totalparam4t'],2),
									5 => number_format($data['totalparam5t'],2),
									6 => number_format($data['totalparam6t'],2),
									7 => number_format($data['totalparam7t'],2),
									8 => number_format($data['totalparam8t'],2),
									9 => number_format($data['totalparam9t'],2),
									10 => number_format($data['totalparam10t'],2),
									11 => number_format($data['totalparam11t'],2));
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_acg_modulesf",$data);
	}
	public function AssetRegis(){
		$data['tab'] = $this->input->get('tab');
		$data['assetno'] = $this->input->get('assetno');
		$data['wrk_ord'] = $this->input->get('wrk_ord');
		$data['hosp'] = $this->session->userdata('hosp_code');
		$data['service_code'] = $this->session->userdata('usersess');
		$this->load->model('get_model');

		if ($data['tab'] == 'Maintenance'){
			$data['record'] = $this->get_model->assetregrep($data['assetno'],$data['hosp'],$data['service_code']);
			$data['accrec'] = $this->get_model->accessories($data['assetno']);
			if ($data['accrec']) {
			foreach ($data['accrec'] as $row){
				$data['acc'][] = $row->v_description;
			}
			$data['acclist'] = implode(',',$data['acc']);
			}
		}
		else{
			if (substr($data['wrk_ord'],0,2) != 'PP'){
				$data['records'] = $this->get_model->wodet($data['wrk_ord'],$data['assetno']);
				$data['parts'] = $this->get_model->partrep($data['wrk_ord']);
				if ($data['parts']) {
				foreach ($data['parts'] as $row){
					$data['partr'][] = $row->v_PartName;
				}
				$data['partlist'] = implode(',',$data['partr']);
				}
			}
			else{
				$data['records'] = $this->get_model->ppmdet($data['wrk_ord'],$data['assetno']);
				$data['parts'] = $this->get_model->partrep($data['wrk_ord']);
				if ($data['parts']) {
				foreach ($data['parts'] as $row){
					$data['partr'][] = $row->v_PartName;
				}
				$data['partlist'] = implode(',',$data['partr']);
				}
				//print_r($data['records']);
				//exit();
			}
			//print_r($data['partlist']);
			//exit();
		}
		//print_r($data['records']);
		//exit();

		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_AssetRegis",$data);
	}

public function assethistory(){
		$data['assetno'] = $this->input->get('assetno');
		$data['hosp'] = $this->session->userdata('hosp_code');
		$data['service_code'] = $this->session->userdata('usersess');
		$this->load->model('get_model');
		$data['wolist'] = $this->get_model->wolist($data['assetno'],$data['hosp'],$data['service_code']);
		if ($data['wolist']) {
		foreach ($data['wolist'] as $row){
			$data['wrkno'][] = $row->V_Request_no;
		}
		$data['countwrk'] = count($data['wrkno']);
		}
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_assethistory",$data);
	}
	public function acg_report(){

		$data['month'] = ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['year'] = ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");

		//isset($_REQUEST['n_base']) ? $data['service'] = $_REQUEST['n_base'] : $data['service'] = "BES";
		isset($_REQUEST['n_base']) ? $data['service'] = $_REQUEST['n_base'] : $data['service'] = $this->session->userdata('usersess');
		isset($_REQUEST['fromMonth']) ? $data['fmonth'] = $_REQUEST['fromMonth'] : $data['fmonth'] = $data['month'];
		isset($_REQUEST['fromYear']) ? $data['fyear'] = $_REQUEST['fromYear'] : $data['fyear'] = $data['year'];
        isset($_POST['deductiont']) ? $data['t'] = $_POST['deductiont'] : $data['t'] = 1;

	//echo $data['t'];
	//exit();

		$this->load->model('display_model');
		$data['keyindlist'] = $this->display_model->keyindlist($data['service']);
		if ($this->input->get('tabIndex') == 1){
			$data['acgparam'] = $this->display_model->acgparam($data['service'],$data['fmonth'],$data['fyear']);
			$data['acgreport'] = $this->display_model->acgreport($data['service'],$data['fmonth'],$data['fyear']);
		}
		else{
		if ($data['t']==1){
		$data['deductmap'] = $this->display_model->deductmap($data['service'],$data['fmonth'],$data['fyear']);
		}elseif($data['t']==2){
		$data['deductmap'] = $this->display_model->deductmap_sh($data['service'],$data['fmonth'],$data['fyear']);
		}

		}


		//print_r($data['deductmap']);
		//exit();

		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_acg_report",$data);

	}
	public function spare_part(){
	  $this->load->model('display_model');
		$data['record'] = $this->display_model->stock_asset();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_spare_part", $data);
	}
/*
 public function joint_ins(){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_joint_ins");
	}

	public function daily_summary(){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_daily_summary");
	}
*/
	public function joint_ins(){
		$data['month'] = ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['year'] = ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");

		isset($_GET['fromMonth']) ? $data['fmonth'] = $_GET['fromMonth'] : $data['fmonth'] = $data['month'];
		isset($_GET['fromYear']) ? $data['fyear'] = $_GET['fromYear'] : $data['fyear'] = $data['year'];
		$this->load->model('get_model');
		if ($this->input->get('en') == 'JIS'){
			$data['recordloc'] = $this->get_model->hosplocjic($data['fmonth'],$data['fyear']);
			$data['record'] = $this->get_model->hospjic($data['fmonth'],$data['fyear']);
			//print_r($data['record']);
			//echo '<br><br>';

			$data['totalloc'] = 0;
			$data['rate'] = 0;
			$data['Satisfactory'] = 0;
			$data['Unstatisfactory'] = 0;
			$data['Not_Applicable'] = 0;
			$data['nullcode'] = 0;
			foreach ($data['recordloc'] as $row){
				$data['totalloc'] += $row->totalloc;
				foreach ($data['record'] as $list){
					if ($row->hospital_code == $list->hospital_code){
						if ($row->Dept_Code == $list->Dept_Code){
							if ($list->W1Unstatisfactory + $list->W1Satisfactory + $list->W1Not_Applicable + $list->W1nullcode != 0){
								$data['rate'] += $row->totalloc * 6;
								$data['Satisfactory'] += ($row->totalloc * 6) - $list->W1Unstatisfactory - $list->W1Not_Applicable - $list->W1nullcode;
								$data['Unstatisfactory'] += $list->W1Unstatisfactory;
								$data['Not_Applicable'] += $list->W1Not_Applicable;
								$data['nullcode'] += $list->W1nullcode;
							}
							else{
								$data['rate'] += 0;
								$data['Satisfactory'] += 0;
								$data['Unstatisfactory'] += 0;
								$data['Not_Applicable'] += 0;
								$data['nullcode'] += 0;
							}

							if ($list->W3Unstatisfactory + $list->W3Satisfactory + $list->W3Not_Applicable + $list->W3nullcode != 0){
								$data['rate'] += $row->totalloc * 6;
								$data['Satisfactory'] += ($row->totalloc * 6) - $list->W3Unstatisfactory - $list->W3Not_Applicable - $list->W3nullcode;
								$data['Unstatisfactory'] += $list->W3Unstatisfactory;
								$data['Not_Applicable'] += $list->W3Not_Applicable;
								$data['nullcode'] += $list->W3nullcode;
							}
							else{
								$data['rate'] += 0;
								$data['Satisfactory'] += 0;
								$data['Unstatisfactory'] += 0;
								$data['Not_Applicable'] += 0;
								$data['nullcode'] += 0;
							}

						}
						$data['records'][$row->hospital_code] = array('hospital_code' => $row->hospital_code,
														  'totalloc' => $data['totalloc'],
												          'rate' => $data['rate'],
														  'Satisfactory' => $data['Satisfactory'],
														  'Unstatisfactory' => $data['Unstatisfactory'],
														  'Not_Applicable' => $data['Not_Applicable'],
														  'nullcode' =>	$data['nullcode'] );
					}
				}
			}
			//print_r($data['records']);
			//exit();
		}
		elseif ($this->input->get('en') == 'JISFH'){
			$data['fmonth'] = $this->input->get('month');
			$data['fyear'] = $this->input->get('year');
			$data['hosp'] = $this->input->get('hosp');
			$data['recordloc'] = $this->get_model->hosplocjic($data['fmonth'],$data['fyear']);
			$data['recorddept'] = $this->get_model->deptjic($data['fmonth'],$data['fyear'],$data['hosp']);
			//print_r($data['recorddept']);
			//exit();


			foreach ($data['recordloc'] as $row){
				foreach ($data['recorddept'] as $list){
					if ($row->hospital_code == $list->hospital_code){
						if ($row->Dept_Code == $list->Dept_Code){
							$data['rate'] = 0;
							$data['Satisfactory'] = 0;
							$data['Unstatisfactory'] = 0;
							$data['Not_Applicable'] = 0;
							$data['nullcode'] = 0;
							if ($list->W1Unstatisfactory + $list->W1Satisfactory + $list->W1Not_Applicable + $list->W1nullcode != 0){
								$data['rate'] += $row->totalloc * 6;
								$data['Satisfactory'] += ($row->totalloc * 6) - $list->W1Unstatisfactory - $list->W1Not_Applicable - $list->W1nullcode;
								$data['Unstatisfactory'] += $list->W1Unstatisfactory;
								$data['Not_Applicable'] += $list->W1Not_Applicable;
								$data['nullcode'] += $list->W1nullcode;
							}
							else{
								$data['rate'] += 0;
								$data['Satisfactory'] += 0;
								$data['Unstatisfactory'] += 0;
								$data['Not_Applicable'] += 0;
								$data['nullcode'] += 0;
							}

							if ($list->W3Unstatisfactory + $list->W3Satisfactory + $list->W3Not_Applicable + $list->W3nullcode != 0){
								$data['rate'] += $row->totalloc * 6;
								$data['Satisfactory'] += ($row->totalloc * 6) - $list->W3Unstatisfactory - $list->W3Not_Applicable - $list->W3nullcode;
								$data['Unstatisfactory'] += $list->W3Unstatisfactory;
								$data['Not_Applicable'] += $list->W3Not_Applicable;
								$data['nullcode'] += $list->W3nullcode;
							}
							else{
								$data['rate'] += 0;
								$data['Satisfactory'] += 0;
								$data['Unstatisfactory'] += 0;
								$data['Not_Applicable'] += 0;
								$data['nullcode'] += 0;
							}
							$data['records'][$row->Dept_Code] = array('hospital_code' => $row->hospital_code,
							   									  'Dept_Code' => $list->Dept_Code,
							   									  'v_UserDeptDesc' => $list->v_UserDeptDesc,
														          'totalloc' => $row->totalloc,
												                  'rate' => $data['rate'],
														          'Satisfactory' => $data['Satisfactory'],
														          'Unstatisfactory' => $data['Unstatisfactory'],
														          'Not_Applicable' => $data['Not_Applicable'],
														          'nullcode' =>	$data['nullcode'] );
						}
					}
				}
			}
//print_r($data['records']);
//exit();
			$data['recordhosp'] = $this->get_model->deptlist($data['fmonth'],$data['fyear'],$data['hosp']);
			if ($data['recordhosp']) {
				foreach ($data['recordhosp'] as $row){
				$data['deptlist'][] = $row->Dept_Code;
				}
				$data['locdet'] = $this->get_model->locdet($data['deptlist'],$data['hosp']);
			}
			else{
				$data['deptlist'] = NULL;
			}
			//print_r($data['locdet']);
			//exit();
		}
		elseif ($this->input->get('en') == 'JISBMI'){
			$data['fmonth'] = $this->input->get('month');
			$data['fyear'] = $this->input->get('year');
			$data['hosp'] = $this->input->get('hosp');
			$data['dept'] = $this->input->get('dept');
			$data['recordhosp'] = $this->get_model->hosplocjic($data['fmonth'],$data['fyear']);
			$data['jicweek'] = $this->get_model->jicweek($data['fmonth'],$data['fyear'],$data['hosp'],$data['dept']); //new
			$data['recordloc'] = $this->get_model->locjic($data['fmonth'],$data['fyear'],$data['hosp'],$data['dept']);

			foreach ($data['jicweek'] as $jw){
				$data['jw'][] = $jw->ji_no;
			}

			foreach ($data['recordhosp'] as $row){
				foreach ($data['recordloc'] as $list){
					if ($row->hospital_code == $list->V_Hospitalcode){
						if ($row->Dept_Code == $list->v_UserDeptCode){
							$data['rate'] = 0;
							$data['Satisfactory'] = 0;
							$data['Unstatisfactory'] = 0;
							$data['Not_Applicable'] = 0;
							$data['nullcode'] = 0;

							if(in_array('JI/'.$data['dept'].'/W1/'.$data['fmonth'].'/'.substr($data['fyear'],-2,2),$data['jw'])){
								if ($list->W1Unstatisfactory + $list->W1Not_Applicable + $list->W1nullcode != 0){
									$data['rate'] += 6;
									$data['Satisfactory'] += 6 - $list->W1Unstatisfactory - $list->W1Not_Applicable - $list->W1nullcode;
									$data['Unstatisfactory'] += $list->W1Unstatisfactory;
									$data['Not_Applicable'] += $list->W1Not_Applicable;
									$data['nullcode'] += $list->W1nullcode;
								}
								else{
									$data['rate'] += 6;
									$data['Satisfactory'] += 6;
									$data['Unstatisfactory'] += 0;
									$data['Not_Applicable'] += 0;
									$data['nullcode'] += 0;
								}
					    	}

					    	if(in_array('JI/'.$data['dept'].'/W3/'.$data['fmonth'].'/'.substr($data['fyear'],-2,2),$data['jw'])){
								if ($list->W3Unstatisfactory + $list->W3Not_Applicable + $list->W3nullcode != 0){
									$data['rate'] += 6;
									$data['Satisfactory'] += 6 - $list->W3Unstatisfactory - $list->W3Not_Applicable - $list->W3nullcode;
									$data['Unstatisfactory'] += $list->W3Unstatisfactory;
									$data['Not_Applicable'] += $list->W3Not_Applicable;
									$data['nullcode'] += $list->W3nullcode;
								}
								else{
									$data['rate'] += 6;
									$data['Satisfactory'] += 6;
									$data['Unstatisfactory'] += 0;
									$data['Not_Applicable'] += 0;
									$data['nullcode'] += 0;
								}
					    	}
							$data['records'][$list->V_location_code] = array('V_Hospitalcode' => $row->hospital_code,
							   									  'v_UserDeptCode' => $list->v_UserDeptCode,
							   									  'V_location_code' => $list->V_location_code,
														          'v_Location_Name' => $list->v_Location_Name,
												                  'rate' => $data['rate'],
														          'Satisfactory' => $data['Satisfactory'],
														          'Unstatisfactory' => $data['Unstatisfactory'],
														          'Not_Applicable' => $data['Not_Applicable'],
														          'nullcode' =>	$data['nullcode'] );
						}
					}
				}
			}

			//print_r($data['records']);
			//exit();
		}
		elseif ($this->input->get('en') == 'JISDoc'){
			$data['fmonth'] = $this->input->get('month');
			$data['fyear'] = $this->input->get('year');
			$data['hosp'] = $this->input->get('hosp');
			$data['dept'] = $this->input->get('dept');
			$data['loc'] = $this->input->get('loc');
			$data['locname'] = $this->input->get('locname');
			$data['jicweek'] = $this->get_model->jicweek($data['fmonth'],$data['fyear'],$data['hosp'],$data['dept']); //new
			//print_r($data['jicweek']);
			//echo '<br><br>';
			$data['recordlocdate'] = $this->get_model->locdjic($data['fmonth'],$data['fyear'],$data['hosp'],$data['loc']);
			//print_r($data['recordlocdate']);
			//echo '<br><br>';
			//exit();

			foreach ($data['jicweek'] as $row){
				if (substr($row->ji_no,-8,2) == "W1"){
					$jobdate = date("Y-m-d",strtotime($data['fyear'].'-'.$data['fmonth'].'-10'));
				}
				else{
					$jobdate = date("Y-m-d",strtotime($data['fyear'].'-'.$data['fmonth'].'-20'));
				}
				$data['record'][$row->ji_no] = array('ji_no' => $row->ji_no,
													 'hospital_code' => $data['hosp'],
													 'Dept_Code' => $data['dept'],
													 'Loc_Code' => $data['loc'],
													 'Job_Date' => $jobdate,
													 'Floor' => 1,
													 'WallDoor' => 1,
													 'Ceiling' => 1,
													 'Windows' => 1,
													 'Fixtures' => 1,
													 'FurnitureFitting' => 1,
													 );
			}

			foreach ($data['record'] as $rec){
				foreach ($data['recordlocdate'] as $list){
					if ($rec['ji_no'] == $list->ji_no){
						if ($list->Floor != 0){
							$data['record'][$list->ji_no]['Floor'] = 0;
						}
						if ($list->WallDoor != 0){
							$data['record'][$list->ji_no]['WallDoor'] = 0;
						}
						if ($list->Ceiling != 0){
							$data['record'][$list->ji_no]['Ceiling'] = 0;
						}
						if ($list->Windows != 0){
							$data['record'][$list->ji_no]['Windows'] = 0;
						}
						if ($list->Fixtures != 0){
							$data['record'][$list->ji_no]['Fixtures'] = 0;
						}
						if ($list->FurnitureFitting != 0){
							$data['record'][$list->ji_no]['FurnitureFitting'] = 0;
						}
					}
				}
			}
			////print_r($data['record']);
			////exit();
		}
		elseif ($this->input->get('en') == 'JISJNum'){
			if ($this->input->get('path') == 'JISSH'){
				isset($_GET['jiweek']) ? $data['jw'] = $_GET['jiweek'] : $data['jw'] = 'W1';
				isset($_GET['dept_code']) ? $data['dcode'] = $_GET['dept_code'] : $data['dcode'] = '';
				$data['hosp'] = $this->session->userdata('hosp_code');
				if ($data['dcode'] != ''){

				if ($data['jw'] == 'W1'){
					$data['jobdate'] = date("Y-m-d",strtotime($data['fyear'].'-'.$data['fmonth'].'-10'));
				}
				else{
					$data['jobdate'] = date("Y-m-d",strtotime($data['fyear'].'-'.$data['fmonth'].'-20'));
				}

				$data['jicweek'] = $this->get_model->jicweek($data['fmonth'],$data['fyear'],$data['hosp'],strtoupper($data['dcode']));
				if ($data['jicweek']){
					foreach ($data['jicweek'] as $jw){
						$data['jwa'][] = $jw->ji_no;
					}
				}
				else{
					$data['jwa'] = NULL;
				}
				$data['jino'] = 'JI/'.strtoupper($data['dcode']).'/'.$data['jw'].'/'.$data['fmonth'].'/'.substr($data['fyear'],-2,2);

				if ($data['jwa'] && in_array($data['jino'],$data['jwa'])){
					$data['recordji'] = $this->get_model->jijic($data['fmonth'],$data['fyear'],$data['hosp'],strtoupper($data['dcode']),$data['jino']);
				} else {
					$data['recordji'] = NULL;
				}


				} else {
					$data['recordji'] = NULL;
				}


				//echo $data['hosp'];
				//exit();
			}
			else{
				$data['fmonth'] = $this->input->get('month');
				$data['fyear'] = $this->input->get('year');
				$data['hosp'] = $this->input->get('hosp');
				$data['dept'] = $this->input->get('dept');
				$data['jino'] = $this->input->get('jino');
				$data['jobdate'] = $this->input->get('date');
				$data['recordji'] = $this->get_model->jijic($data['fmonth'],$data['fyear'],$data['hosp'],$data['dept'],$data['jino']);
				//print_r($data['recordji']);
				//exit();


				//print_r($data['record']);
				//exit();
			}
			if ($data['recordji']) {
			foreach ($data['recordji'] as $row){
					if ($row->Floor != 0){
						$data['Floor'] = 0;
					}
					else{
						$data['Floor'] = 1;
					}

					if ($row->WallDoor != 0){
						$data['WallDoor'] = 0;
					}
					else{
						$data['WallDoor'] = 1;
					}

					if ($row->Ceiling != 0){
						$data['Ceiling'] = 0;
					}
					else{
						$data['Ceiling'] = 1;
					}

					if ($row->Windows != 0){
						$data['Windows'] = 0;
					}
					else{
						$data['Windows'] = 1;
					}

					if ($row->Fixtures != 0){
						$data['Fixtures'] = 0;
					}
					else{
						$data['Fixtures'] = 1;
					}

					if ($row->FurnitureFitting != 0){
						$data['FurnitureFitting'] = 0;
					}
					else{
						$data['FurnitureFitting'] = 1;
					}
					$data['record'][$row->V_location_code] = array('V_location_code' => $row->V_location_code,
																   'v_Location_Name' => $row->v_Location_Name,
																   'Floor' => $data['Floor'],
																   'WallDoor' => $data['WallDoor'],
																   'Ceiling' => $data['Ceiling'],
																   'Windows' => $data['Windows'],
																   'Fixtures' => $data['Fixtures'],
																   'FurnitureFitting' => $data['FurnitureFitting'])	;
				}
				} else {
					$data['record'] = NULL;
				}
		}
		//print_r($data['recordji']);
		//exit();
		//$this ->load->view("head");
		//$this ->load->view("left");
		$this ->load->view("headprinter");
		$this ->load->view("Content_joint_ins",$data);
	}

	public function daily_summary(){
		$data['month'] = ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['year'] = ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");

		isset($_GET['fromMonth']) ? $data['fmonth'] = $_GET['fromMonth'] : $data['fmonth'] = $data['month'];
		isset($_GET['fromYear']) ? $data['fyear'] = $_GET['fromYear'] : $data['fyear'] = $data['year'];
		$this->load->model('get_model');
    $insert_data = array(
		'a'=>'b',
	  'b'=>'x',
		'c'=>'x');
    //$this->get_model->ins_testdup($insert_data,TRUE);
    $this->get_model->updateOnDuplicate('inila',$insert_data);
		if ($this->input->get('en') == 'cls'){
			$data['record'] = $this->get_model->hosplist($data['fmonth'],$data['fyear']);
		}
		elseif ($this->input->get('en') == 'clshosp'){
			$data['fmonth'] = $this->input->get('month');
			$data['fyear'] = $this->input->get('year');
			$data['hosp'] = $this->input->get('hosp');

			$data['recordhosp'] = $this->get_model->deptlist($data['fmonth'],$data['fyear'],$data['hosp']);
			if ($data['recordhosp']) {
				foreach ($data['recordhosp'] as $row){
				$data['deptlist'][] = $row->Dept_Code;
				}
				$data['locdet'] = $this->get_model->locdet($data['deptlist'],$data['hosp']);
			}
			//print_r($data['locdet']);
			//exit();
		}
		elseif ($this->input->get('en') == 'clsdate'){
			if ($this->input->get('path') == 'DCAD') {

				$data['limit'] = 2;
				isset($_GET['p']) ? $data['page'] = $_GET['p'] : $data['page'] = 1;
				$data['start'] = ($data['page'] * $data['limit']) - $data['limit'];

				$data['rec'] = $this->get_model->datelist2l($data['month'].$data['year']);
				if(count($data['rec']) > ($data['page'] * $data['limit']) ){
					$data['next'] = ++$data['page'];
				}
				$data['recorddate'] = $this->get_model->datelist2($data['month'].$data['year'],$data['limit'],$data['start']);

				//$data['recorddate'] = $this->get_model->datelist2($data['month'].$data['year']);
			}
			else{
				$data['fmonth'] = $this->input->get('month');
				$data['fyear'] = $this->input->get('year');
				$data['dept'] = $this->input->get('dept');
				$data['hosp'] = $this->input->get('hosp');

				$data['recorddate'] = $this->get_model->datelist($data['fmonth'].$data['fyear'],$data['dept'],$data['hosp']);
			}
		}
		$this ->load->view("headprinter");
		$this ->load->view("content_daily_summary",$data);
	}
	public function fnex(){
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_fnex");
	}
	public function pop_authority(){
		$this->load->model("get_model");
		$data['assetauth'] = $this->get_model->assetauth();
		//print_r($data['assetauth']);
		//exit();
		$this ->load->view("head");
		$this ->load->view("Content_pop_authority",$data);
	}
	public function Attendance(){
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$this ->load->view("headprinter");
		//$this ->load->view("Content_Attendance",$data);
		$this ->load->view("Content_under_construction",$data);
	}
	public function complaintreport(){
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$this ->load->view("headprinter");
		$this ->load->view("Content_under_construction",$data);
		//$this ->load->view("Content_complaintreport",$data);
	}

	public function complaintlevel(){
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$this ->load->view("headprinter");
		//$this ->load->view("Content_complaintlevel",$data);
		$this ->load->view("Content_under_construction",$data);
	}

	public function visitclosed(){
		$data['wrk_ord'] = $this->input->get('wrk_ord');
		$this->load->model("display_model");
		$data['disp'] = $this->display_model->list_display($data['wrk_ord']);
		$data['record'] = $this->display_model->jobclose_tab($data['wrk_ord']);
		$data['dispasset'] = $this->display_model->request_tab($data['wrk_ord']);
		$data['P1closed'] = isset($data['record'][0]->userr) ? explode('-',$data['record'][0]->userr) : "";

		$data['recordv1'] = $this->display_model->visit1_tab($data['wrk_ord']);
		//$data['Visit1'] = $this->display_model->visit1_tab($data['wrk_ord']);
		//$data['Stimev1'] = explode(':',$data['recordv1'][0]->v_Time);
		$data['d_date'] = isset($data['disp'][0]->D_date) ? $data['disp'][0]->D_date : NULL ;
		$data['d_time'] = isset($data['disp'][0]->D_time) ? $data['disp'][0]->D_time : NULL ;
		$data['duedate'] = !is_null($data['d_date']) ? date('Y-m-d',strtotime("+13 day", strtotime($data['d_date']))) : NULL ;

		if (isset($data['record'][0]->v_Wrkordno)){

			$data['jctime'] = explode(':',$data['record'][0]->v_time);
			$data['pfsdate'] = $data['record'][0]->d_pfsdate ? explode(' ',$data['record'][0]->d_pfsdate) : '';
			$data['pfstime'] = $data['record'][0]->d_pfsdate ? explode(':',$data['pfsdate'][1]) : '';
			$data['pfedate'] = $data['record'][0]->d_pfsdate ? explode(' ',$data['record'][0]->d_pfedate) : '';
			$data['pfetime'] = $data['record'][0]->d_pfsdate ? explode(':',$data['pfedate'][1]) : '';

		//visit1
			//if (isset($data['recordv1'][0]->v_WrkOrdNo)){
				$Vtotalmin = 0;
				foreach ($data['recordv1'] as $vrec) {
					$V1time1 = strtotime($vrec->v_Time);
		    		$V1time2 = strtotime($vrec->v_Etime);
					$V1diff = $V1time2-$V1time1;
		    		$V1tc_min = $V1diff / 60;
		    		$Vtotalmin += $V1tc_min;
					/*if ($V1tc_min < 60 ){
		    		$V1tc_time = $V1tc_min. ' min';
		    		$data['time_comp1'] = $V1tc_time;
		    		}
		    		else{
		    		$bal_min = ($V1tc_min%60);
		    		$h_min = $V1tc_min - $bal_min;
		    		$hour = $h_min/60;
		    		$V1tc_time = $hour. ' hr ' .$bal_min. ' min';
		    		$data['time_comp1'] = $V1tc_time;
		    		}*/
	    		}
    	//service time
    		$serv_t = $Vtotalmin;
    		if ($serv_t < 60){
    		$serv_time = $serv_t. ' min';
    		$data['serv_time'] = $serv_time;
    		}
    		else{
    		$bal_smin = ($serv_t%60);
    		$h_smin = $serv_t - $bal_smin;
    		$Shour = $h_smin/60;
    		$serv_time = $Shour. ' hr ' .$bal_smin. ' min';
    		$data['serv_time'] = $serv_time;
    		}
    	//down time
    		$time1 = strtotime($data['disp'][0]->D_date);
    		$time2 = strtotime($data['record'][0]->d_DateDone);
    		$diff = $time2-$time1;
    		$down_min = $diff / 60;
    		if ($down_min < 60 ){
    		$down_time = $down_min. ' min';
    		$data['down_time'] = $down_time;
    		}
    		else{
    		$Dbal_min = ($down_min%60);
    		$Dh_min = $down_min - $Dbal_min;
    		$Dhour = $Dh_min/60;
    		$down_time = $Dhour. ' hr ' .$Dbal_min. ' min';
    		$data['down_time'] = $down_time;
    		}
    	//stopage
    		$stoppage1 = strtotime($data['record'][0]->d_pfsdate);
    		$stoppage2 = strtotime($data['record'][0]->d_pfedate);
    		$diffS = $stoppage2-$stoppage1;
    		$Stop_min = $diffS / 60;
    		if ($Stop_min < 60 ){
    		$Stop_time = $Stop_min. ' min';
    		$data['Stop_time'] = $Stop_time;
    		}
    		else{
    		$Sbal_min = ($Stop_min%60);
    		$Sh_min = $Stop_min - $Sbal_min;
    		$Shour = $Sh_min/60;
    		$Stop_time = $Shour. ' hr ' .$Sbal_min. ' min';
    		$data['Stop_time'] = $Stop_time;
    		}
    	//completion time
    		if ($Stop_min > 0){
    		$comp_diff = $down_min - $Stop_min;
    		if ($comp_diff < 60 ){
    		$comp_time = $comp_diff. ' min';
    		$data['comp_time'] = $comp_time;
    		}
    		else{
    		$Cbal_min = ($comp_diff%60);
    		$Ch_min = $comp_diff - $Cbal_min;
    		$Chour = $Ch_min/60;
    		$comp_time = $Chour. ' hr ' .$Cbal_min. ' min';
    		$data['comp_time'] = $comp_time;
    		}
    		}
    		else {
    		$data['comp_time'] = $data['down_time'];
    		}
    	}

		$this ->load->view("head");
		$this ->load->view("content_visitclosed",$data);
	}

public function visitjclosed(){
		$data['wrk_ord'] = $this->input->get('wrk_ord');

		$this->load->model("display_model");
		$data['ppmrec'] = $this->display_model->woppm_disp($data['wrk_ord']);
		$data['recordppm'] = $this->display_model->jobclose_ppm($data['wrk_ord']);
		$data['ppmasset'] = $this->display_model->wo_ppm($data['wrk_ord']);
		$data['PPPMperclosed'] = isset($data['recordppm'][0]->userr) ? explode('-',$data['recordppm'][0]->userr) : "";

		$data['recordv1'] = $this->display_model->visit1ppm_tab($data['wrk_ord']);
		//$data['Stimev1'] = explode(':',$data['recordv1'][0]->v_Time);
		$data['d_date'] = (isset($data['ppmrec'][0]->d_StartDt) ? $data['ppmrec'][0]->d_StartDt : NULL);
		$data['duedate'] = (isset($data['ppmrec'][0]->d_DueDt) ? $data['ppmrec'][0]->d_DueDt : NULL);

		if (isset($data['recordppm'][0]->v_Wrkordno)){

			$data['jctime'] = explode(':',$data['recordppm'][0]->v_time);
			if (isset($data['recordppm'][0]->d_pfsdate)){
				$data['pfsdate'] = explode(' ',$data['recordppm'][0]->d_pfsdate);
				$data['pfstime'] = explode(':',$data['pfsdate'][1]);
			}
			if (isset($data['recordppm'][0]->d_pfedate)){
				$data['pfedate'] = explode(' ',$data['recordppm'][0]->d_pfedate);
				$data['pfetime'] = explode(':',$data['pfedate'][1]);
			}

		//visit1
			//if (isset($data['Visit1ppm'][0]->v_WrkOrdNo)){
			$Vtotalmin = 0;
			foreach ($data['recordv1'] as $vrec){
				$V1time1 = strtotime($vrec->v_Time);
	    		$V1time2 = strtotime($vrec->v_Etime);
				$V1diff = $V1time2-$V1time1;
	    		$V1tc_min = $V1diff / 60;
	    		$Vtotalmin += $V1tc_min;
				/*if ($V1tc_min < 60 ){
	    		$V1tc_time = $V1tc_min. ' min';
	    		$data['time_comp1'] = $V1tc_time;
	    		}
	    		else{
	    		$bal_min = ($V1tc_min%60);
	    		$h_min = $V1tc_min - $bal_min;
	    		$hour = $h_min/60;
	    		$V1tc_time = $hour. ' hr ' .$bal_min. ' min';
	    		$data['time_comp1'] = $V1tc_time;
	    		}*/
    		}
    	//service time
    		$serv_t = $Vtotalmin;
    		if ($serv_t < 60){
    		$serv_time = $serv_t. ' min';
    		$data['serv_time'] = $serv_time;
    		}
    		else{
    		$bal_smin = ($serv_t%60);
    		$h_smin = $serv_t - $bal_smin;
    		$Shour = $h_smin/60;
    		$serv_time = $Shour. ' hr ' .$bal_smin. ' min';
    		$data['serv_time'] = $serv_time;
    		}
    	//down time
    		$time1 = strtotime($data['ppmrec'][0]->d_StartDt);
    		$time2 = strtotime($data['recordppm'][0]->d_DateDone);
    		$diff = $time2-$time1;
    		$down_min = $diff / 60;
    		if ($down_min < 60 ){
    		$down_time = $down_min. ' min';
    		$data['down_time'] = $down_time;
    		}
    		else{
    		$Dbal_min = ($down_min%60);
    		$Dh_min = $down_min - $Dbal_min;
    		$Dhour = $Dh_min/60;
    		$down_time = $Dhour. ' hr ' .$Dbal_min. ' min';
    		$data['down_time'] = $down_time;

    		}
    	//stopage
    		$stoppage1 = strtotime($data['recordppm'][0]->d_pfsdate);
    		$stoppage2 = strtotime($data['recordppm'][0]->d_pfedate);
    		$diffS = $stoppage2-$stoppage1;
    		$Stop_min = $diffS / 60;
    		if ($Stop_min < 60 ){
    		$Stop_time = $Stop_min. ' min';
    		$data['Stop_time'] = $Stop_time;
    		}
    		else{
    		$Sbal_min = ($Stop_min%60);
    		$Sh_min = $Stop_min - $Sbal_min;
    		$Shour = $Sh_min/60;
    		$Stop_time = $Shour. ' hr ' .$Sbal_min. ' min';
    		$data['Stop_time'] = $Stop_time;
    		}
		}

		if (isset($data['recordppm'][0]->v_Wrkordno)){
			$data['jctime'] = explode(':',$data['recordppm'][0]->v_time);
			if (isset($data['recordppm'][0]->d_pfsdate)){
				$data['pfsdate'] = explode(' ',$data['recordppm'][0]->d_pfsdate);
				$data['pfstime'] = explode(':',$data['pfsdate'][1]);
			}
			if (isset($data['recordppm'][0]->d_pfedate)){
				$data['pfedate'] = explode(' ',$data['recordppm'][0]->d_pfedate);
				$data['pfetime'] = explode(':',$data['pfedate'][1]);
			}
		}

		$this ->load->view("head");
		$this ->load->view("content_visitjclosed",$data);
	}

	public function sys_admin(){
		function toArray($obj)
		{
			$obj = (array) $obj;
			return $obj['path'];
		}
		$idArray = array_map('toArray', $this->session->userdata('accessr'));
		$data['chkers'] = $idArray;
		$this ->load->view("head");
		$this ->load->view("left");
		if ($this->input->get('gbl') == 1){
		$this->load->model("display_model");
		$data['record'] = $this->display_model->personnellist();
		$this ->load->view("Content_sys_personal",$data);
		}elseif ($this->input->get('gbl') == 2){
		$this->load->model("display_model");
		$data['record'] = $this->display_model->personnelrec($this->input->get('sys_id'));
		$this ->load->view("Content_sys_Update",$data);
		}elseif ($this->input->get('gbl') == 3){
		$this ->load->view("Content_sys_Confirm");
		}elseif ($this->input->get('us') == 1){
		$this ->load->view("Content_sys_usersetup");
		}elseif ($this->input->get('us') == 2){
		$this ->load->view("Content_sys_usersetup_update");
		}elseif ($this->input->get('us') == 3){
		$this ->load->view("Content_sys_usersetup_confirm");
		}elseif ($this->input->get('ec') == 1){
		$this ->load->view("Content_sys_equiment");
		}elseif ($this->input->get('ec') == 2){
		$this ->load->view("Content_sys_equiment_update");
		}elseif ($this->input->get('ec') == 3){
		$this ->load->view("Content_sys_equiment_confirm");
		}elseif ($this->input->get('ud') == 1){
		$this->load->model("display_model");
		$data['record'] = $this->display_model->udlist();
		$this ->load->view("Content_sys_User_Department",$data);
		}elseif ($this->input->get('ud') == 2){
		$this->load->model("display_model");
		$data['record'] = $this->display_model->udrecord($this->input->get('sys_id'));
		$this ->load->view("Content_sys_User_Department_update",$data);
		}elseif ($this->input->get('ud') == 3){
		$this ->load->view("Content_sys_User_Department_confirm");
		}elseif ($this->input->get('jt') == 1){
		$this ->load->view("Content_sys_User_jobtype");
		}elseif ($this->input->get('jt') == 2){
		$this ->load->view("Content_sys_User_jobtype_update");
		}elseif ($this->input->get('jt') == 3){
		$this ->load->view("Content_sys_User_jobtype_confirm");
		}else{
		$this ->load->view("Content_sys_admin", $data);
		}
	}

	public function pop_systemcode(){
		$this ->load->view("head");
		$this ->load->view("content_pop_systemcode");
	}
	public function pop_fWorkgroup(){
		$this ->load->view("head");
		$this ->load->view("content_pop_fWorkgroup");
	}
	public function pop_fEquipment(){
		$this ->load->view("head");
		$this ->load->view("content_pop_fEquipment");
	}
	public function pop_fType(){
		$this ->load->view("head");
		$this ->load->view("content_pop_fType");
	}
	public function pop_fProcedure(){
		$this ->load->view("head");
		$this ->load->view("content_pop_fProcedure");
	}
	public function D_Assessement(){
	  $data['month'] = ($this->input->get('mth') <> "") ? sprintf("%02d", $this->input->get('mth')) : date("m");
		$data['year'] = ($this->input->get('yr') <> "") ? $this->input->get('yr') : date("Y");
		$data['service'] = ($this->input->get('sev') <> "") ? $this->input->get('sev') : "BES";
		//echo "nilai serv".$data['service'].":".$this->input->get('sev');
		//isset($_REQUEST['n_base']) ? $data['service'] = $_REQUEST['n_base'] : $data['service'] = "BES";
		//isset($_REQUEST['fromMonth']) ? $data['fmonth'] = $_REQUEST['fromMonth'] : $data['fmonth'] = $data['month'];
		//isset($_REQUEST['fromYear']) ? $data['fyear'] = $_REQUEST['fromYear'] : $data['fyear'] = $data['year'];

		$this->load->model('display_model');
		$data['acgparam'] = $this->display_model->acgparam($data['service'],$data['month'],$data['year']);
		$data['keyindlist'] = $this->display_model->keyindlist($data['service']);
		$this ->load->view("headprinter");
		$this ->load->view("content_D_Assessement", $data);
	}

	public function D_Mapping(){
	    $data['month'] = ($this->input->get('mth') <> "") ? sprintf("%02d", $this->input->get('mth')) : date("m");
		$data['year'] = ($this->input->get('yr') <> "") ? $this->input->get('yr') : date("Y");
		$data['service'] = ($this->input->get('sev') <> "") ? $this->input->get('sev') : "BES";

		$this->load->model('display_model');
		//$data['acgparam'] = $this->display_model->acgparam($data['service'],$data['month'],$data['year']);
	   $data['keyindlist'] = $this->display_model->keyindlist($data['service']);
		$data['deductmap'] = $this->display_model->deductmap($data['service'],$data['month'],$data['year']);

		$this ->load->view("headprinter");
		$this ->load->view("content_D_Mapping", $data);
	}

	public function report_Incidences_Summary(){

	  $this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		//$data['ppmsum'] = $this->display_model->sumppm($data['month'],$data['year']);
		$data['rqsum'] = $this->display_model->sumis($data['month'],$data['year'],$this->input->get('grp'));
		//$data['complntsum'] = $this->display_model->sumcomplnt($data['month'],$data['year']);

	  $this ->load->view("headprinter");
		$this ->load->view("Content_report_is", $data);
	}
	public function report_Incidences_Listing(){
	  //echo 'nilai : '.$this->input->post('wrty-status');
	  $this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['grpsel']= $this->input->get('grp') ? $this->input->get('grp') : '';
		$data['record'] = $this->display_model->rpt_volil($data['month'],$data['year'],$this->input->get('stat'),$data['grpsel']);
		//$this ->load->view("headprinter");
		//$this ->load->view("Content_report_il", $data);
		if ($this->input->get('pdf') == 1){
		$this ->load->view("Content_report_il_pdf", $data);
		}else{
		$this ->load->view("headprinter");
		$this ->load->view("Content_report_il", $data);
		}
	}
	public function pop_fRequest12(){
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$this->load->model('display_model');
		$data['record'] = $this->display_model->tncrequest($data['month'],$data['year']);
		$this ->load->view("head");
		$this ->load->view("pop_fRequest12", $data);
	}
	public function logprintmain(){
		$data['assetno'] = $this->input->get('asstno');
		$this->load->model("get_model");
		$data['ppm_list'] = $this->get_model->assetppmlog($data['assetno']);
		$data['ppm_list_cost'] = $this->get_model->assetlaborpartbyppm($data['assetno']);
		$this ->load->view("headprinter");
		$this ->load->view("Content_logprintmain",$data);
	}
	public function logprint_U(){
		$data['assetno'] = $this->input->get('asstno');
		$this->load->model("get_model");
		$data['wo_list'] = $this->get_model->assetwolog($data['assetno']);
		$data['wo_list_cost'] = $this->get_model->assetlaborpartbywo($data['assetno']);
		$this ->load->view("headprinter");
		$this ->load->view("Content_logprint_U",$data);
	}
	public function fail_bank(){
		$data['assetno'] = $this->input->get('asstno');
		$this->load->model("display_model");
		$data['result'] = $this->display_model->searchassettag($data['assetno']);
		$data['record'] = $this->display_model->dispfailbank($this->input->get('asstno'));
		$this ->load->view("head");
    $this ->load->view("left" , $data);
		$this ->load->view("Content_fail_bank",$data);
	}

public function pop_fail(){
		$data = array();
		if($this->input->post('fileSubmit') && !empty($_FILES['userFiles']['name'])){

				//$uploadPath = 'C:/xampp/htdocs/fms/file_bank';
				$uploadPath = 'C:/inetpub/wwwroot/FEMSHospital_v3/file_bank';
				$config['upload_path'] = $uploadPath;
				$config['allowed_types'] = 'gif|jpg|png|pdf';
				$config['max_size']	= '1000';
				//$config['max_width'] = '1024';
				//$config['max_height'] = '768';
				$ext = end(explode('.',$_FILES['userFiles']['name']));

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if($this->input->get('docid') == 0){

					$this->load->model('get_model');
					$data['failseqno'] = $this->get_model->filebankseqno('DB');


					if($this->upload->do_upload('userFiles')){
						$fileData = $this->upload->data();
						$uploadData['asset_no'] = $this->input->get('assetno');
						$uploadData['Doc_name'] = $fileData['file_name'];
						$uploadData['doc_id'] = $data['failseqno'][0]->seq_NextSequenceNo;
						$uploadData['doc_path'] = $uploadPath;
						$uploadData['flag'] = "I";
						$uploadData['Date_time_stamp'] = date("Y-m-d H:i:s");
						$uploadData['user_id'] = $this->session->userdata('v_UserName');
					}

					//rename ("C:/xampp/htdocs/fms/file_bank/".$_FILES['userFiles']['name'], "C:/xampp/htdocs/fms/file_bank/".$data['failseqno'][0]->seq_NextSequenceNo.'.'.$ext);
					rename ("C:/inetpub/wwwroot/FEMSHospital_v3/file_bank/".$_FILES['userFiles']['name'], "C:/inetpub/wwwroot/FEMSHospital_v3/file_bank/".$data['failseqno'][0]->seq_NextSequenceNo.'.'.$ext);
					$this->load->model('update_model');
					$insert_data = array( 'seq_NextSequenceNo' => $data['failseqno'][0]->seq_NextSequenceNo + 1,
										  'seq_ActionFlag' => 'U',
										  'seq_ActionTimeStamp' => date('Y-m-d H:i:s'),
										  'seq_ActionUserID' => $this->session->userdata('v_UserName'));
					$this->update_model->filebankseqno_u('DB',$insert_data);
				}
				else{

					if($this->upload->do_upload('userFiles')){
						$fileData = $this->upload->data();
						//$uploadData[$i]['asset_no'] = $this->input->get('assetno');
						$uploadData['Doc_name'] = $fileData['file_name'];
						$uploadData['doc_id'] = $this->input->get('docid');
						//$uploadData[$i]['doc_path'] = $uploadPath;
						$uploadData['flag'] = "U";
						$uploadData['Date_time_stamp'] = date("Y-m-d H:i:s");
						$uploadData['user_id'] = $this->session->userdata('v_UserName');
					}

					//rename ("C:/xampp/htdocs/fms/file_bank/".$_FILES['userFiles']['name'], "C:/xampp/htdocs/fms/file_bank/".$this->input->get('docid').'.'.$ext);
					rename ("C:/inetpub/wwwroot/FEMSHospital_v3/file_bank/".$_FILES['userFiles']['name'], "C:/inetpub/wwwroot/FEMSHospital_v3/file_bank/".$this->input->get('docid').'.'.$ext);
				}

			if(!empty($uploadData)){
				if($this->input->get('docid') == 0){
					$this->load->model('insert_model');
					$this->insert_model->fileatt_bank($uploadData);
				}
				else{
					$this->load->model('update_model');
					$this->update_model->fileatt_bank_u($uploadData,$this->input->get('docid'),$this->input->get('assetno'));
				}
			}
			echo "<script>window.close();</script>";
		}

		$this ->load->view("head");
		$this ->load->view("Content_pop_fail");
	}
	public function del_licsat(){
		$insert_data = array('v_actionflag' => 'D',
							 'd_timestamp' => date('Y-m-d H:i:s'));
		$this->load->model('update_model');
		$this->update_model->dellic($insert_data,$this->input->get('licid'));
		redirect('contentcontroller/Licenses');
	}

  public function del_filebank(){
		$insert_data = array('flag' => 'D',
							 'Date_time_stamp' => date('Y-m-d H:i:s'),
							 'user_id' => $this->session->userdata('v_UserName'));
		$this->load->model('update_model');
		$this->update_model->delfile($insert_data,$this->input->get('assetno'),$this->input->get('docid'));
		redirect('contentcontroller/fail_bank?asstno='.$this->input->get('assetno').'&tab=10&parent=assets');
	}

	public function ppm_planer_export(){
		$this->load->library('../controllers/ppm_planered');
		$this->ppm_planered->index();
		//$this ->load->view("head");
		//$this ->load->view("ppm_planer_export");
	}

	public function broughtfwd(){
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$this->load->model('display_model');
		$data['records'] = $this->display_model->broughtfwd($data['month'],$data['year']);
		//print_r($data['records']);
		//exit();
		$this ->load->view("headprinter");
		$this ->load->view("Content_broughtfwd", $data);
	}

	public function pop_barchart(){
		$this ->load->view("head");
		$this ->load->view("barchart");
	}

	public function ttlexp(){
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['range']= $this->input->get('range') ? $this->input->get('range') : '1';
		$this->load->model('display_model');
		$data['recordlic']= $this->display_model->ttlexp($data['month'],$data['year'],$data['range']);
		$data['recordsta']= $this->display_model->ttlexp2($data['month'],$data['year'],$data['range']);
		for ($i=1;$i<=$data['range'];$i++){
			$data['explistlic'.$i] = 0;
			foreach ($data['recordlic'] as $row){
				if($row->month == $i){
					$data['explistlic'.$i] = $row->notlicsat;
				}
			}
		}

		for ($j=1;$j<=$data['range'];$j++){
			$data['expliststa'.$j] = 0;
			foreach ($data['recordsta'] as $row){
				if($row->month == $j){
					$data['expliststa'.$j] = $row->notlicsat;
				}
			}
		}
		//echo '<br><br>'.$data['explist1'].'<br><br>'.$data['explist2'].'<br><br>'.$data['explist3'].'<br><br>';
		//exit();
		$this ->load->view("headprinter");
		$this ->load->view("Content_ttlexp", $data);
	}

	public function Booking_no(){
		$data['tabber'] = ($this->input->get('work-a') <> 0) ? $this->input->get('work-a') : '0';
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$this->load->model('display_model');
		$data['recordbook']= $this->display_model->get_wobookinginfo($data['month'],$data['year'],$data['tabber']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_Booking_no",$data);
	}
	public function booking_list(){
	  $data['whatid'] = ($this->input->get('whatid') <> 0) ? $this->input->get('whatid') : '0';
	  $this->load->model('display_model');
		$data['recordbookdet']= $this->display_model->get_wobookingdet($data['whatid']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_Booking_list",$data);
	}

       public function del_assetppmjobreg(){
		$insert_data = array('d_Timestamp' => date("Y-m-d H:i:s"),
							 'v_ActionFlag' => 'D');
	 	$this->load->model('update_model');
	 	$this->update_model->del_assetppmjobreg($insert_data,$this->input->get('asstno'),$this->input->get('jobyear'),$this->input->get('id'));
	 	redirect('contentcontroller/assetPPMjob?asstno='.$this->input->get('asstno').'&tab=6');
	}


	public function pop_link(){
		$this->load->model("display_model");
		$data['record'] = $this->display_model->linkwo($this->input->get('n_asset_number'),$this->input->get('m'),$this->input->get('y'));
		$this ->load->view("head");
		$this ->load->view("content_link_popup",$data);
	}


       public function report_search_dwo(){
			 //echo $_REQUEST['n_wotype'] . "," . $_REQUEST['n_wono'];
		isset($_REQUEST['n_wono']) ? $data['wono'] = $_REQUEST['n_wono'] : $data['wono'] = "";
		isset($_REQUEST['data_file']) ? $data['datafile'] = $_REQUEST['data_file'] : $data['datafile'] = "";
		isset($_REQUEST['myclear']) ? $data['clearbutton'] = $_REQUEST['myclear'] : $data['clearbutton'] = "";
		isset($_REQUEST['n_wotype']) ? $data['wotype'] = $_REQUEST['n_wotype'] : $data['wotype'] = "Request";
		$this->load->model('display_model');
		if ($data['wono'] <> ''){
			if ($data['clearbutton'] == 'CLEAR'){
				$data['wono'] = "";
			}
			else{
				$data['record'] = $this->display_model->rpt_sdwo($data['wono'],$data['wotype']);
			}
		}
		//print_r($data['record']);
		//exit();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_report_search_dwol",$data);
	}

      public function report_visit_rpt(){
		isset($_REQUEST['n_wono']) ? $data['wono'] = $_REQUEST['n_wono'] : $data['wono'] = "";
		isset($_REQUEST['data_file']) ? $data['datafile'] = $_REQUEST['data_file'] : $data['datafile'] = "";
		isset($_REQUEST['myclear']) ? $data['clearbutton'] = $_REQUEST['myclear'] : $data['clearbutton'] = "";
		isset($_REQUEST['n_wotype']) ? $data['wotype'] = $_REQUEST['n_wotype'] : $data['wotype'] = "Request";
		$this->load->model('display_model');
		if ($data['wono'] <> ''){
			if ($data['clearbutton'] == 'CLEAR'){
				$data['wono'] = "";
			}
			else{
				$data['record'] = $this->display_model->rpt_visitlog($data['wono'],$data['wotype']);
			}
		}
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_report_visit_rpt",$data);
	}

	public function assetnextppm(){
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$this->load->model('get_model');
		$data['whatweek'] = $this->get_model->nexppmwk();
		//print_r($data['whatweek']);
		//echo "lalalalala : ".$data['whatweek'][0]->maxwk;

		$weektoshow = $data['whatweek'][0]->maxwk + 1;
		//$data['theweek'] = $weektoshow;
		//echo "<br>lalalalalazzzzz : ".$weektoshow;
		$data['ppm_wo']=$this->get_model->get_ppmgenloc(date("Y"),$this->session->userdata('hosp_code'),$weektoshow);

    $firstDayOfWeek = strtotime(date("Y")."W".str_pad($weektoshow,2,"0",STR_PAD_LEFT));

    //echo("The first day of week ".$weektoshow." of ".date("Y")." is ".date("d-m-Y",$firstDayOfWeek));
		$data['theweek'] = date("d-m-Y",$firstDayOfWeek);

		if($this->input->get('pdf') == 1){
		$this ->load->view("Content_report_assetnextppm_pdf", $data);
		}else{
		$this ->load->view("headprinter");
		$this ->load->view("Content_report_assetnextppm", $data);
		}

	}

	public function relworkorder(){
		$this->load->model('display_model');
		$data['record'] = $this->display_model->relworkorder($this->input->get('loc'));
		$this ->load->view("head");
		$this ->load->view("content_relworkorder",$data);
	}

   public function report_search_loc(){
		isset($_REQUEST['n_dept']) ? $data['dept'] = $_REQUEST['n_dept'] : $data['dept'] = "";
		isset($_REQUEST['n_loc']) ? $data['loc'] = $_REQUEST['n_loc'] : $data['loc'] = "";
		isset($_REQUEST['data_file']) ? $data['datafile'] = $_REQUEST['data_file'] : $data['datafile'] = "";
		isset($_REQUEST['myclear']) ? $data['clearbutton'] = $_REQUEST['myclear'] : $data['clearbutton'] = "";
		isset($_REQUEST['n_wotype']) ? $data['wotype'] = $_REQUEST['n_wotype'] : $data['wotype'] = "Request";
		$this->load->model('display_model');
		if ($data['dept'] <> '' && $data['loc'] <> ''){
			if ($data['clearbutton'] == 'CLEAR'){
				$data['dept'] = "";
				$data['loc'] = "";
			}
			else{
				$data['record'] = $this->display_model->rpt_searchlocwo($data['dept'],$data['loc'],$data['wotype']);
			}
		}
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_report_search_loc",$data);
	}

	function check($str,$param)
        {
                if ($str == 'N/A')
                {
                	$this->form_validation->set_message('check', 'The '.$param.' field can not be the word N/A');
                    return FALSE;
                }
                else
                {
                    return TRUE;
                }
        }

	public function report_fdreport(){
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['date']= ($this->input->get('jobdate') <> 0) ? $this->input->get('jobdate') : date("d-m-Y");
		if (strtotime($data['date']) >= strtotime(date("Y",strtotime($data['date'])).'-'.date("m",strtotime($data['date'])).'-09') && strtotime($data['date']) <= strtotime(date("Y",strtotime("+1 month",strtotime($data['date']))).'-'.date("m",strtotime("+1 month",strtotime($data['date']))).'-08')){
			$month = date("m",strtotime($data['date']));
			$year = date("Y",strtotime($data['date']));
		} else {
			$month = date("m",strtotime("-1 month",strtotime($data['date'])));
			$year = date("Y",strtotime("-1 month",strtotime($data['date'])));
		}
		$this->load->model('display_model');
		$data['record'] = $this->display_model->fdreport(date("Y-m-d",strtotime($data['date'])));
		$data['recoutstanding'] = $this->display_model->recoutstanding($month,$year);
		$data['recppm'] = $this->display_model->recppm($month,$year);
		$data['reccompday'] = $this->display_model->reccompday(date("Y-m-d",strtotime($data['date'])));
		$data['fdr_mi'] = $this->display_model->fdr_mi(date("Y-m-d",strtotime($data['date'])));
		//print_r($data['fdr_mi']);
		//exit();
		//echo date("Y-m-d",strtotime("+1 month",strtotime($data['date'])));
		//exit();
		if ($this->input->get('data') == '1'){
			$mi_description = $this->input->get('v1');
			$mi_rootcause = $this->input->get('v2');
			$mi_actiontaken = $this->input->get('v3');
			$othermatter = $this->input->get('v4');
			$action_by = $this->input->get('v5');

			$this->load->model('insert_model');
			$fdr_exist = $this->insert_model->fdr_exist('month',$month,'year',$year,$mi_description,$mi_rootcause,$mi_actiontaken,$othermatter,$action_by);
		}
		//print_r($data['recppm']);
		//exit();
		$this ->load->view("headprinter");
		if ($this->input->get('pdf') == 1){
		$this ->load->view("content_report_fdreport_pdf",$data);
		}else{
		$this ->load->view("content_report_fdreport",$data);
		}
	}

	public function pop_syslabour(){
		$this->load->model("display_model");
		$data['record'] = $this->display_model->laborlist();
		$this ->load->view("head");
		$this ->load->view("Content_pop_syslabour",$data);
	}

	public function mohcode(){
		$this->load->model("display_model");
		$data['record'] = $this->display_model->mohcodelist();
		$this ->load->view("head");
		$this ->load->view("content_pop_mohcode",$data);
	}

	public function report_reqwosbyyear(){
		  $this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['reqtype']= $this->input->get('req') ? $this->input->get('req') : 'A1';
		//$data['ppmsum'] = $this->display_model->sumppm($data['month'],$data['year']);
		$data['rqsum'] = $this->display_model->sumrq_y($data['month'],$data['year'],$data['reqtype'],$this->input->get('grp'));
		//$data['complntsum'] = $this->display_model->sumcomplnt($data['month'],$data['year']);


                if ($this->session->userdata('usersess') == 'FES') {
		$data['rqcivil'] = $this->display_model->sumrq_y($data['month'],$data['year'],$data['reqtype'],$this->input->get('grp'),"IIUM C");
		$data['rqmech'] = $this->display_model->sumrq_y($data['month'],$data['year'],$data['reqtype'],$this->input->get('grp'),"IIUM M");
		$data['rqelec'] = $this->display_model->sumrq_y($data['month'],$data['year'],$data['reqtype'],$this->input->get('grp'),"IIUM E");
		}
		$this ->load->view("headprinter");
		$this ->load->view("Content_report_reqwosbyyear", $data);
	}

	public function report_volubyyear(){
	    $pilape = "";
		if ($this->input->get('serv') == "ele"){
		$pilape = "IIUM E";
		} elseif ($this->input->get('serv') == "mec"){
		$pilape = "IIUM M";
		} elseif ($this->input->get('serv') == "civ"){
		$pilape = "IIUM C";
		}
	  	$this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		//$data['month']= ($data['year'] == date('Y')) ? date("m") : 11;
		$data['reqtype']= $this->input->get('req') ? $this->input->get('req') : 'A1';
		$data['grpsel']= $this->input->get('grp') ? $this->input->get('grp') : '';
		$data['record'] = $this->display_model->rpt_volu_y($data['month'],$data['year'],$this->input->get('stat'),$data['reqtype'],$this->input->get('broughtfwd'),$data['grpsel'],$pilape);

		$this ->load->view("headprinter");
		$this ->load->view("Content_report_volubyyear", $data);
	}

	public function report_fdreport2(){
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['date']= ($this->input->get('jobdate') <> 0) ? $this->input->get('jobdate') : date("d-m-Y");
		if (strtotime($data['date']) >= strtotime(date("Y",strtotime($data['date'])).'-'.date("m",strtotime($data['date'])).'-09') && strtotime($data['date']) <= strtotime(date("Y",strtotime("+1 month",strtotime($data['date']))).'-'.date("m",strtotime("+1 month",strtotime($data['date']))).'-08')){
			$month = date("m",strtotime($data['date']));
			$year = date("Y",strtotime($data['date']));
		} else {
			$month = date("m",strtotime("-1 month",strtotime($data['date'])));
			$year = date("Y",strtotime("-1 month",strtotime($data['date'])));
		}

		$this->load->model('display_model');
		$data['record'] = $this->display_model->fdrepdet1(date("Y-m-d",strtotime($data['date'])),$this->input->get('x'),$this->input->get('v'));

		$this ->load->view("headprinter");
		$this ->load->view("content_report_fdreport2",$data);
	}

	public function Unsatisfactory_by_Group(){
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$this->load->model('get_model');
		$data['record'] = $this->get_model->unsatisfactory_g($data['month'],$data['year']);
		//print_r($data['record']);
		//exit();
		$this ->load->view("headprinter");
		$this ->load->view("content_Unsatisfactory_by_Group",$data);


	}

	public function report_a2(){
		$this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['grpsel']= $this->input->get('grp') ? $this->input->get('grp') : '';
                $pilape = "";
		if ($this->input->get('serv') == "ele"){
		$pilape = "IIUM E";
		} elseif ($this->input->get('serv') == "mec"){
		$pilape = "IIUM M";
		} elseif ($this->input->get('serv') == "civ"){
		$pilape = "IIUM C";
		}
		//$data['record'] = $this->display_model->rpt_vols($data['month'],$data['year'], $this->input->get('stat'), $this->input->get('resch'),$data['grpsel'],$pilape);
		$data['reqtype'] = 'A2';
		$data['tag'] = '';
		$data['cm']= '';
		$data['limab']= '0';
		$data['recordrq'] = $this->display_model->rpt_volu($data['month'],$data['year'],$this->input->get('stat'),$data['reqtype'],$this->input->get('broughtfwd'),$data['grpsel'],$pilape,$data['tag'],$data['cm'],$data['limab']);
		if($this->input->get('pdf') == 1){
		$this ->load->view("Content_report_A2_pdf", $data);
		}else{
		$this ->load->view("headprinter");
		$this ->load->view("Content_report_A2", $data);
		}
}

public function new_item (){
		$this ->load->view("head");
		$this ->load->view("left");
		$this->load->model("display_model");
    	$this->load->model("get_model");
		$this->load->model('update_model');
	//echo "lalalalalalla : ".$this->input->post('searchquestion');
		$data['search']=($this->input->get('search')!=null ? $this->input->get('search') : $this->input->post('searchquestion'));
         if (isset($_GET['edit'])){

		$data['edititem'] = $this->get_model->get_asset_list($_GET['edit']);
	    // print_r ($data['edititem']);
		}
		$data['limit'] = 10;

        isset($_GET['pa']) ? $data['page'] = $_GET['pa'] : $data['page'] = 1;
	    $data['start'] = ($data['page'] * $data['limit']) - $data['limit'];

     	$data['records'] = $this->display_model->s_item_detail($data['limit'],$data['start'],$data['search']);

		$data['count'] = count($data['records']);

        $data['rec'] =  $this->display_model->s_item_detail('0','0',$data['search']);
		$data['maxpage']= round($data['rec'][0]->jumlah/$data['limit']);
		// echo 'test'.$data['maxpage'];
		if($data['rec'][0]->jumlah > ($data['page'] * $data['limit']) ){
	    $data['next'] = ++$data['page'];
		}


		if($this->input->get('p') == 'confirm'){
		$this ->load->view("content_new_item_confirm");
		}elseif($this->input->get('p') == 'save'){

     	$this->db->select('id');
        $this->db->from('pmis2_sa_vendor');
        $this->db->where('v_vendorcode',$this->input->post('n_vendor_code'));
        $result_array = $this->db->get()->result_array();
		$insert_data = array(

		'ItemCode'=>$this->input->post('n_code'),
		'ItemName'=>$this->input->post('n_description'),
		'ItemLoc'=>$this->input->post('n_location'),
		'PartNumber'=>$this->input->post('n_partno'),
		'PartDescription'=>$this->input->post('n_pdescription'),
	      'UnitPrice'=>$this->input->post('n_unitprice'),
		'CurrencyID'=>$this->input->post('n_currency'),
		'MeasurementID'=>$this->input->post('n_Unit_of_measurement'),
		'VendorID'=>$result_array[0]['id'],
		'Comments'=>$this->input->post('n_comments'),
		'CodeCat'=>$this->input->post('n_codecat'),
		'EquipCat'=>$this->input->post('n_equipcat'),
		'Brand'=>$this->input->post('n_brand'),
		'Model'=>$this->input->post('n_model'),

		'Dept'=>$this->session->userdata('usersess'),
		'DateCreated'=>date('Y-m-d H:i:s'),
		//'DateCreated'=>date("Y-m-d"),


		);
/* 		print_r($insert_data);
		exit(); */

		if($this->input->post('editid')){
		 $this->load->model('update_model');
		 $this->update_model->updateitems($insert_data,$this->input->post('editid'));
		 }else{
          $this->insert_model->ins_itembaru($insert_data);
		 }
	/* 	 echo $this->db->last_query();
		 exit(); */
		 redirect('contentcontroller/new_item?itemname='.$this->input->post('n_description').'&itemcode='.$this->input->post('n_code'));
		}else{
		$this ->load->view("content_new_item",$data);
		}
}

public function report_reqwosbya2(){
		  $this->load->model("display_model");
		$data['records'] = $this->display_model->list_hospinfo();
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['reqtype']=  'A2';
		//$data['ppmsum'] = $this->display_model->sumppm($data['month'],$data['year']);
		$data['rqsum'] = $this->display_model->sumrq_a2($data['month'],$data['year'],$data['reqtype'],$this->input->get('grp'));
		//$data['complntsum'] = $this->display_model->sumcomplnt($data['month'],$data['year']);


                if ($this->session->userdata('usersess') == 'FES') {
		$data['rqcivil'] = $this->display_model->sumrq_a2($data['month'],$data['year'],$data['reqtype'],$this->input->get('grp'),"IIUM C");
		$data['rqmech'] = $this->display_model->sumrq_a2($data['month'],$data['year'],$data['reqtype'],$this->input->get('grp'),"IIUM M");
		$data['rqelec'] = $this->display_model->sumrq_a2($data['month'],$data['year'],$data['reqtype'],$this->input->get('grp'),"IIUM E");
		}
		$this ->load->view("headprinter");
		$this ->load->view("Content_report_reqwosbya2", $data);
	}

public function bar_code (){

		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");

		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_stock_addplus", $data);
		/*
		if($this->input->get('p') == 'confirm'){
		$this ->load->view("content_new_item_confirm");
		}else{
		$this ->load->view("content_new_item");
		}
		*/
}

public function deductmapping_2(){
			 $data['month'] = ($this->input->get('mth') <> "") ? sprintf("%02d", $this->input->get('mth')) : date("m");
		$data['year'] = ($this->input->get('yr') <> "") ? $this->input->get('yr') : date("Y");
		$data['service'] = ($this->input->get('sev') <> "") ? $this->input->get('sev') : "BES";
	    $data['reqstatus'] = $this->input->get('reqstatus') ;


                $pilape = "";
		if ($this->input->get('serv') == "ele"){
		$pilape = "IIUM E";
		} elseif ($this->input->get('serv') == "mec"){
		$pilape = "IIUM M";
		} elseif ($this->input->get('serv') == "civ"){
		$pilape = "IIUM C";
		}
	  	$this->load->model("display_model");

		$data['records'] = $this->display_model->list_hospinfo();
		//$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		//$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['reqtype']= $this->input->get('req') ? $this->input->get('req') : '';
		$data['grpsel']= $this->input->get('grp') ? $this->input->get('grp') : '';

	    $data['tag']= $this->input->get('tag') ? $this->input->get('tag') : '';
		$data['cm']= $this->input->get('cm') ? $this->input->get('cm') : '';
		$data['limab']= $this->input->get('limab') ? $this->input->get('limab') : '0';
		$data['bfwd'] = array();
		if ($data['tag'] == 'total')
		{
			$data['records'] = $this->display_model->broughtfwd($data['month'],$data['year']);
			//$data['bfwd'] = array();
			foreach ($data['records'] as $row){
				if (($row->notcomp != 0) && ($row->comp != 0)){
					$data['bfwd'][] = $row->month;
				}
			}
		}
		$data['record'] = $this->display_model->dmapping2($data['month'],$data['year'],$data['service'],$data['reqstatus']);

		//print_r($data['record']);
		//exit();
		//$this ->load->view("headprinter");
		//$this ->load->view("Content_report_volu", $data);
		if ($this->input->get('pdf') == 1){

		$this ->load->view("Content_dmapping2_pdf", $data);
		}else{
		$this ->load->view("headprinter");
		$this ->load->view("Content_dmapping2", $data);
		}
	}

	public function stockDtail(){

		$this->load->model("display_model");
	     $data['itemd'] = $this->display_model->contentstockd($this->input->get('id'));
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_stockDlist",$data);
	}

	public function stockact(){

		$this->load->model("display_model");
	    $data['record'] = $this->display_model->stock_asset($this->input->get('id'));

		if($this->input->get('print')){

		foreach($data['record'] as $row){
		$data['rec'] =  $this->display_model->stock_details($row->ItemCode,$row->Hosp_code,'0','0');
		}
		$data['limit'] = $data['rec'][0]->jumlah;
		}else{
		$data['limit'] = 10;
		}

         isset($_GET['p']) ? $data['page'] = $_GET['p'] : $data['page'] = 1;
	   $data['start'] = ($data['page'] * $data['limit']) - $data['limit'];
		foreach($data['record'] as $row){
		$data['assetl'] = $this->display_model->stock_details($row->ItemCode,$row->Hosp_code,$data['limit'],$data['start']);
		$data['assetrec'][] = $data['assetl'];
		}
		$data['count'] = count($data['assetl']);
        $data['rec'] =  $this->display_model->stock_details($row->ItemCode,$row->Hosp_code,'0','0');
		if($data['rec'][0]->jumlah > ($data['page'] * $data['limit']) ){
			$data['next'] = ++$data['page'];
		}

		if($this->input->get('print')){
		$data['print'] = 0;
		$this ->load->view("headprinter");
		$this ->load->view("Content_print_stockactvt", $data);
		}else{
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_stockDact",$data);
	    }
	}



public function print_kewpa(){
	  $data['assetn'] = $this->input->get('asstno');
	  	$this->load->model("get_model");
	    $data['asset_det'] = $this->get_model->get_assetdet2($data['assetn']);
			$data['asset_UMDNS'] = $this->get_model->get_UMDNSAsset($data['asset_det'][0]->V_Equip_code);
		$data['assetppm'] = $this->get_model->assetppmlist($data['assetn']);
		if ((null !==$this->input->get('pr')) and ($this->input->get('none') == 'closed')){
		$data['print'] = $this->input->get('pr');
		$this ->load->view("headprinter");
		$this ->load->view("Content_print_kewpa", $data);

		}else{
		$data['print'] = 0;
			$this ->load->view("headprinter");
			$this ->load->view("Content_print_kewpa", $data);

		}
	}
	public function rcm_newconse(){ //sapik
	    $this->load->model("display_model");
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['rcmlist'] = ($this->input->get('rcmlist') ? $this->input->get('rcmlist') :'');
		$data['rcmnewconse'] = $this->display_model->rcm_newconse($data['year'],$data['month'],$data['rcmlist']);
		$this ->load->view("headprinter");
		$this ->load->view("report-rcm-newconse",$data);
        }



	public function report_newconseb4ii(){ //sapik
	     $this->load->model("display_model");
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['b4summary'] = $this->display_model->B4_summary($data['year'],$data['month']);
		$this ->load->view("headprinter");
		$this ->load->view("report-newconseb4ii",$data);

        }


	public function report_tnc_no_av12(){ //sapik
	     $this->load->model("display_model");
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['tnc_wthAV12'] = $this->display_model->tnc_wthAV12($data['year'],$data['month']);
		$this ->load->view("headprinter");
		$this ->load->view("report-tnc-no-av12-listing",$data);
        }

	public function report_clause_listing(){
	     $this->load->model("display_model");
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		//$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['clause_summary'] = $this->display_model->clause_summary($data);
		$data['clause_by_month'] = $this->display_model->clause_by_month($data);
		$data['clause_by_type'] = $this->display_model->clause_by_type($data);
		$data['clause_by_category_or_team'] = $this->display_model->clause_by_category_or_team($data);
		$this ->load->view("headprinter");
		$this ->load->view("report_clause_listing.php",$data);
        }
	public function report_yrplanwrty_listing(){
	     $this->load->model("display_model");
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['records'] = $this->display_model->yrplanwrty_listing($data['year'],$data['month']);
		$this ->load->view("headprinter");
		$this ->load->view("report-yrplanwrty-listing.php",$data);
        }
	public function report_a12newconse(){
	     $this->load->model("display_model");
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['records'] = $this->display_model->a12newconse($data['year'],$data['month']);
		$this ->load->view("headprinter");
		$this ->load->view("report-a12newconse.php",$data);
        }

    public function ppm_newconse(){
	    $this->load->model("display_model");
	    $data['status'] = ($this->input->get('ppmstatus') <> "") ? $this->input->get('ppmstatus') : "";
		$data['year']	= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']	= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['records']= $this->display_model->ppm_newconse($data);
		$this->load->view("headprinter");
		$this->load->view("report_ppm_newconse",$data);
	}

	public function report_newconseb4(){
		$this->load->model("display_model");
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['records'] = $this->display_model->report_newconseb4($data);
		$this ->load->view("headprinter");
		$this ->load->view("report_newconseb4",$data);
	}

	public function report_tnc_listing(){
		$this->load->model("display_model");
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['records'] = $this->display_model->report_tnc_listing($data);
		$this ->load->view("headprinter");
		$this ->load->view("report_tnc_listing",$data);
	}

	public function report_tnc_no_smry(){
		$this->load->model("display_model");
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['records'] = $this->display_model->report_tnc_no_smry($data);
		$this ->load->view("headprinter");
		$this ->load->view("report_tnc_av12_smry_listing",$data);
	}
	public function report_a12newconsec(){//sapik
	     $this->load->model("display_model");
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['records'] = $this->display_model->a12newconsec($this->input->get('hosp'),$this->input->get('h'),$data['year'],$data['month']);
		$this ->load->view("headprinter");
		$this ->load->view("report-a12newconsec.php",$data);
        }

  public function upload_asis(){
  $this ->load->view("head");
  $this ->load->view("left");
  $this->load->view("content_asis_upload");
        }
	public function site_store_status(){

		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['hosp']=($this->input->post('hospital')) ? $this->input->post('hospital') : $this->input->get('id');
	    $this->load->model("get_model");
		$this->load->model("display_model");
		$data['hospital'] = $this->get_model->getSiteHospital("select");
		$data['records'] = $this->display_model->getsite_status($data['hosp']);
        if ($this->input->get('ex') != 'excel'){
	     $this ->load->view("head");
		 $this ->load->view("left",$data);
        }

		$this ->load->view("Content_site_store.php",$data);
	}
  public function uploaddesk(){
    $this ->load->view("head");
    $this ->load->view("left");
    $this->load->view("content_asis_uploadx");
  //$this ->load->view("uploaddeskasis");
}
public function processupload(){
  $dapek = $this->input->get('aa');
  switch ($dapek) {
    case "1":
    ini_set('max_execution_time', 0);
    ini_set('memory_limit','2048M');
    $this->load->model('upload_services');
    $data['result']=$this->upload_services->upload_sampledata_csv();
        break;
    case "2":
    ini_set('max_execution_time', 0);
    ini_set('memory_limit','2048M');
    $this->load->model('upload_services');
    $data['result']=$this->upload_services->upload_sampledata_csv2();
        break;
    case "3":
    ini_set('max_execution_time', 0);
    ini_set('memory_limit','2048M');
    $this->load->model('upload_services');
    $data['result']=$this->upload_services->upload_sampledata_csv3();
        break;
    case "4":
    ini_set('max_execution_time', 0);
    ini_set('memory_limit','2048M');
    $this->load->model('upload_services');
    $data['result']=$this->upload_services->upload_sampledata_csv4();
        break;
    case "5":
    ini_set('max_execution_time', 0);
    ini_set('memory_limit','2048M');
    $this->load->model('upload_services');
    $data['result']=$this->upload_services->upload_sampledata_csv5();
        break;
    case "6":
    ini_set('max_execution_time', 0);
    ini_set('memory_limit','2048M');
    $this->load->model('upload_services');
    $data['result']=$this->upload_services->upload_sampledata_csv6();
        break;
    case "7":
    ini_set('max_execution_time', 0);
    ini_set('memory_limit','2048M');
    $this->load->model('upload_services');
    $data['result']=$this->upload_services->upload_sampledata_csv7();
        break;
    case "8":
    ini_set('max_execution_time', 0);
    ini_set('memory_limit','2048M');
    $this->load->model('upload_services');
    $data['result']=$this->upload_services->upload_sampledata_csv8();
        break;
    case "9":
    ini_set('max_execution_time', 0);
    ini_set('memory_limit','2048M');
    $this->load->model('upload_services');
    $data['result']=$this->upload_services->upload_sampledata_csv9();
        break;
    case "10":
    ini_set('max_execution_time', 0);
    ini_set('memory_limit','2048M');
    $this->load->model('upload_services');
    $data['result']=$this->upload_services->upload_sampledata_csv10();
        break;
    case "11":
    ini_set('max_execution_time', 0);
    ini_set('memory_limit','2048M');
    $this->load->model('upload_services');
    $data['result']=$this->upload_services->upload_sampledata_csv11();
        break;
    case "12":
    ini_set('max_execution_time', 0);
    ini_set('memory_limit','2048M');
    $this->load->model('upload_services');
    $data['result']=$this->upload_services->upload_sampledata_csv12();
        break;
    case "13":
    ini_set('max_execution_time', 0);
    ini_set('memory_limit','2048M');
    $this->load->model('upload_services');
    $data['result']=$this->upload_services->upload_sampledata_csv13();
        break;
    case "14":
    ini_set('max_execution_time', 0);
    ini_set('memory_limit','2048M');
    $this->load->model('upload_services');
    $data['result']=$this->upload_services->upload_sampledata_csv14();
        break;
    /*case "green":
        echo "Your favorite color is green!";
        break;
    default:
        echo "Your favorite color is neither red, blue, nor green!";*/
      }
      /*
  ini_set('max_execution_time', 0);
  ini_set('memory_limit','2048M');
  $this->load->model('upload_services');
$data['result']=$this->upload_services->upload_sampledata_csv();
*/
//$data['query']=$this-> upload_services->get_car_features_info();

$this->load->view('Upload_csv',$data);
}


public function chronologyplus(){
  //$data ['records']= array(array('n_code' => 's Date 1', 'n_name'=>'Viseit Date 2','n_time'=>'Visidt Date 3','n_rate'=>'Viseit Date 2','n_total'=>'Visidt Date 3'));
  $data['wrk_ord'] = $this->input->get('wrk_ord');
  $this->load->model("display_model");

  //$data['recordcheck'] = $this->display_model->response_tab($data['wrk_ord']);
  $data['records'] = $this->display_model->chronology_tab($data['wrk_ord']);
  //$data['recordjob'] = $this->display_model->jobclose_tab($data['wrk_ord']);
  //$data['record'] = $this->display_model->request_tab($data['wrk_ord']);

  //print_r($data['records']);
  //exit();

  $this ->load->view("head");
  $this ->load->view("left");
  $this ->load->view("Content_workorder_chronologyplus" , $data);

}


  public function chronologyupdate(){
  $data['wrk_ord'] = $this->input->get('wrk_ord');
  $data['visit'] = $this->input->get('visit');
  $this->load->model("display_model");
  $this->load->model('get_model');
  $data['rc'] = $this->get_model->getrootcause();
  $data['rc_parent'] = $this->get_model->getrootcause_nodash();;
  //if (substr($data['wrk_ord'],0,2) == 'PP'){
  //echo "nilai visit " . $data['visit'];
  if ($data['visit'] != "") {
  //$data['latestvisit'] = $this->get_model->latestvisit($data['wrk_ord']);
  $data['record'] = $this->display_model->chronology_tabu($data['wrk_ord'],$data['visit']);
  //$data['recordjob'] = $this->display_model->jobclose_tab($data['wrk_ord']);
  }
  //print_r($data['record']);

  $this ->load->view("head");
  $this ->load->view("left");
  $this ->load->view("Content_workorder_chronologyplusupdate",$data);

}





public function request_AP19(){
  if ($this->input->post('segment')){
  $this->load->helper(array('form', 'url'));
  // load library for form validation
      $this->load->library('form_validation');
  $this->form_validation->set_rules('n_request_type','Request Type','trim|required');
  $this->form_validation->set_rules('n_request_date','Request Date','trim|required');
  $this->form_validation->set_rules('n_hour','Hour Requested','trim|required');
  $this->form_validation->set_rules('n_min','Minute Requested','trim|required');
  $this->form_validation->set_rules('n_priority','Priority','trim|required');
  $this->form_validation->set_rules('fSummary','*Failure Report','trim|required');
  $this->form_validation->set_rules('fSummary2','*Troubleshoot/Corrective Action','trim|required');


  if($this->form_validation->run()==FALSE)
  {
  $this ->load->view("head");
  $this ->load->view("left");
  $this ->load->view("Content_requestAP19");
  }

  else
  {
  $this ->load->view("head");
  $this ->load->view("left");
  $this ->load->view("content_requestAP19_confirm");
  }
  }else{
  $this ->load->view("head");
  $this ->load->view("left");
  $this ->load->view("Content_requestAP19");
  }



}

public function save_request_AP19(){
    $is_logged_in = $this->session->userdata('usersess');

  if(!isset($is_logged_in) || $is_logged_in !=TRUE)
  redirect('logincontroller/index');

  $this->load->model('get_seqno');
  //$data['service_apa'] = $this->loginModel->validate3();
      if ($this->input->post('segment')=='workorderlist_update'){
  $this->load->model('update_model');
  $RN=$this->input->post('wrk_ord');
      $insert_data = array(
  'V_Request_no'=>$RN,
  'D_date'=> $this->input->post('n_request_date') ? date('Y-m-d ', strtotime($this->input->post('n_request_date'))).$this->input->post('n_hour').':'.str_pad($this->input->post('n_min'), 2, 0, STR_PAD_LEFT) : NULL,
  'D_time'=>$this->input->post('n_hour').':'.str_pad($this->input->post('n_min'), 2, 0, STR_PAD_LEFT),
  'V_servicecode'=>$this->session->userdata('usersess'),
  'V_requestor'=>$this->input->post('fBy'),
  'v_ref_wo_no'=>$this->input->post('n_phone_number'),
  'V_User_dept_code'=>$this->input->post('fUserDeptCode'),
  'V_Location_code'=>$this->input->post('fLocationCode'),
  'V_phone_no'=>$this->input->post('n_phone_number'),
  'V_summary'=>$this->input->post('fSummary'),
  'V_details'=>$this->input->post('fSummary2'),
  'V_priority_code'=>$this->input->post('n_priority'),
  'V_request_type'=>$this->input->post('n_request_type'),
  'V_request_status'=>'A',
  'V_hospitalcode'=>$this->session->userdata('hosp_code'),
  'V_actionflag'=>'I',
  'D_timestamp'=>date('Y-m-d H:i:s'),
  //'V_MohDesg'=>$this->input->post('n_designation'),
  'V_MohDesg'=>$this->input->post('fitem'),//avail
  'v_ref_status'=>$this->input->post('fpartprice'), //avail
  'takenby'=>$this->input->post('fvendorprice'),//avail
      'V_Asset_no'=>$this->input->post('n_asset_number')
  );
    $this->update_model->create_form($insert_data);
  //echo "<pre>";
  //print_r($insert_data);
  //exit();
  }else{
  $RN=$this->get_seqno->funcNewRequestNoAPBESYS($this->input->post('n_request_type'), '', date("Y"));
  $insert_data = array(
  'V_Request_no'=>$RN,
  'D_date'=> $this->input->post('n_request_date') ? date('Y-m-d ', strtotime($this->input->post('n_request_date'))).$this->input->post('n_hour').':'.str_pad($this->input->post('n_min'), 2, 0, STR_PAD_LEFT) : NULL,
  'D_time'=>$this->input->post('n_hour').':'.str_pad($this->input->post('n_min'), 2, 0, STR_PAD_LEFT),
  'V_servicecode'=>$this->session->userdata('usersess'),
  'V_requestor'=>$this->input->post('fBy'),
  'v_ref_wo_no'=>$this->input->post('n_phone_number'),
  'V_User_dept_code'=>$this->input->post('fUserDeptCode'),
  'V_Location_code'=>$this->input->post('fLocationCode'),
  'V_phone_no'=>$this->input->post('n_phone_number'),
  'V_summary'=>$this->input->post('fSummary'),
  'V_details'=>$this->input->post('fSummary2'),
  'V_priority_code'=>$this->input->post('n_priority'),
  'V_request_type'=>$this->input->post('n_request_type'),
  'V_request_status'=>'A',
  'V_hospitalcode'=>$this->session->userdata('hosp_code'),
  'V_actionflag'=>'I',
  'D_timestamp'=>date('Y-m-d H:i:s'),
  'V_MohDesg'=>$this->input->post('fitem'),//avail
  'v_ref_status'=>$this->input->post('fpartprice'), //avail
  'takenby'=>$this->input->post('fvendorprice'),//avail
      'V_Asset_no'=>$this->input->post('n_asset_number')
  );
  $this->insert_model->create_form($insert_data,TRUE);
    }
    if($this->input->post('chkbox') == 'ON' ){
  //echo 'text';
  redirect('contentcontroller/print_workorder?wrk_ord='.$RN);
  }else{
  redirect('contentcontroller/workorder?parent='.$this->input->post('parent').'&wonos='.$RN);
  }


}
public function report_chronology(){
		$this->load->model("get_model");
		$start= (date("Y-01-01",time()));
		$end = (date("Y-12-31",time()));
		$from = $this->input->get('from') ? $this->input->get('from') : $start;
		$to = $this->input->get('to') ? $this->input->get('to') : $end;
		//$from = $this->input->get('from') ? $this->input->get('from') : '';
		//$to = $this->input->get('to') ? $this->input->get('to') : '';
		$data['from']=$from;
		$data['to']=$to;
		$data['det'] =$this->get_model->reportChronology($from, $to);
		$this ->load->view("head");
		$this ->load->view("content_report_chronology",$data);
	}

	public function summary_chonology(){
		$this->load->model("display_model");
		$from = $this->input->get('from') ? $this->input->get('from') : '';
		$to = $this->input->get('to') ? $this->input->get('to') : '';
		$nama = $this->input->get('nama');
		$negeri = $this->input->get('negeri');
		// echo 'test'.$nama.$negeri;
		// exit();
        //$data['records'] = $this->display_model->chrology_sum_report($from, $to,$nama,$negeri);

    		$data['year']= date("Y");
    		$data['records'] = $this->display_model->chrology_sum_report($from, $to,$nama,$negeri);
    		$cost[]='';
    		if($data['records']!=null){
    		foreach($data['records'] as $key => $val){
    			$pro_id[] = $val->MIRN_No;

    		 }

    		 $data['partCosts'] = array_unique($pro_id);
    		 foreach($data['partCosts'] as $mirn){
    			$id[] = $mirn;

    		if($mirn!=null){
    			$cost[] = $this->display_model->sparepart_cost($mirn);
    		 }
    		}$data['Costs']=  $cost;
    	}else{
    		$data['Costs']=  null;
    	}



		$this ->load->view("head");
		$this ->load->view("Content_summary_chono",$data);
	}

	public function report_Part_Menu(){
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$mon = (date("j") > 8) ? date("m") : date("m")-1;
		$data['grpsel'] = $this->input->get('grp') ? $this->input->get('grp') : '';
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) :  $mon;
		$data['year'] = ($data['month'] == 0)  ? $data['year']-1 : $data['year'];
		$data['month'] = ($data['month'] == 0)  ? 12 : $data['month'];


		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_Stock_ReportPart" , $data);
	}

	public function store_report(){


		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
    $this->load->model("display_model");
    $data['record'] = $this->display_model->mrinrptin($data['month'],$data['year']);
    $this ->load->view("headprinter");
		$this ->load->view("Content_Store_rpt",$data);
	}

public function report_a10(){
 $this->load->model("display_model");
$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
$data['records'] = $this->display_model->a10new($data['year'],$data['month']);
$this ->load->view("headprinter");
$this ->load->view("report-a10.php",$data);
  }


  	public function woa10_report(){
  		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
  		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
  		$this->load->model('display_model');
  		$data['records'] = $this->display_model->wo10_rpt($data['month'],$data['year']);
  		//print_r($data['records']);
  		//exit();
  		$this ->load->view("headprinter");
  		$this ->load->view("Content_woa10sr.php", $data);
  	}


    public  function rootChild($nama) {
    	//echo $nama;
    	//$namaNospace =  str_replace("%20"," ",$nama);
    	//$result = $this->db->like('nama',$namaNospace)->get('pmis2_egm_rootcause')->result();
    	//echo $this->db->last_query();//exit();
    	//echo json_encode($result);
      $this->load->model('get_model');
      $this->get_model->rootChild($nama);
    }

}
?>
