<?php
class Mrinnew_ctrl extends CI_Controller{

	public function index(){
		$is_logged_in = $this->session->userdata('v_UserName');

		if(!isset($is_logged_in) || $is_logged_in !=TRUE)
		redirect('logincontroller/index');
		// load libraries for URL and form processing
	    $this->load->helper(array('form', 'url'));
	    // load library for form validation
	    $this->load->library('form_validation');

			$startdate = date('Y-m-d');
			$vdate = date_format(date_create($this->input->post('n_date')),'Y-m-d');
			//echo "dater : ".$startdate.' : '.$vdate;
			$paramsdt = "{$startdate},{$vdate}";

		//validation rule
		if (($this->input->post('pro') == "edit") || ($this->input->get('pro') == "edit")) {
			//echo $this->input->post('mrinno')."diermasuk aaa".$this->input->post('pro')."iiiiii".$this->input->get('pro');
			//exit();
			$this->form_validation->set_rules('n_date','Date Issue','trim|required');
		} else {
			//echo $this->input->post('mrinno')."diermasuk bbb".$this->input->post('pro')."iiiiii".$this->input->get('pro');
			//exit();
			$this->form_validation->set_rules('n_date','Date Issue','trim|required|callback_date_check['.$paramsdt.']');
		}

		$this->form_validation->set_rules('n_Case','Case','trim');
		$this->form_validation->set_rules('n_Contract','Contract','trim');
		$this->form_validation->set_rules('n_complaint','Complaint','trim');
		$this->form_validation->set_rules('n_troubleshooting','Troubleshooting','trim');
		$this->form_validation->set_rules('n_finding','Finding','trim');
		$this->form_validation->set_rules('n_comment','Comments','trim');
		$this->form_validation->set_rules('n_request','Request Number','trim');
		$this->form_validation->set_rules('n_requested','Requested Date','trim');
		$this->form_validation->set_rules('n_summary','Summary','trim');
		$this->form_validation->set_rules('n_brand','Brand / Manufacturer','trim');
		$this->form_validation->set_rules('n_description','Description','trim');
		$this->form_validation->set_rules('n_model','Model','trim');
		$this->form_validation->set_rules('n_assettag','Asset Tag Number','trim');
		$this->form_validation->set_rules('n_assetnumber','Asset Number','trim');
		$this->form_validation->set_rules('n_assetserial','Asset Serial Number','trim');
		$this->form_validation->set_rules('n_purchasecost','Purchase Cost','trim');
		$this->form_validation->set_rules('n_purchasedate','Purchase Date','trim');
		$this->form_validation->set_rules('n_age','Age','trim');


		if ($this->input->post('rows') <> '' && $this->input->post('rows') > 0){
				for ($row = 1; $row <= $this->input->post('rows'); $row++){
						$this->form_validation->set_rules('startDate'.$row,'Item Last Replaced Date','required');
				}
			}

		if($this->form_validation->run()==FALSE || $this->input->get('act') <> '')
			{
				$this->load->model('get_model');
				$data['runningno'] = $this->input->post('tempno');
				$data['recordcom'] = $this->get_model->get_components($data['runningno']);
				$data['recordatt'] = $this->get_model->get_attachments($data['runningno']);
				$this ->load->view("head");
				$this ->load->view("left");
				$this ->load->view("Content_mrin_new",$data);
			}
			else
			{
				$this ->load->view("head");
				$this ->load->view("left");
				$this ->load->view("Content_mrin_new_confirm");
			}
	}

	function comfirmation(){
		//if(!isset($is_logged_in) || $is_logged_in !=TRUE)
		//redirect('logincontroller/index');
		$is_logged_in = $this->session->userdata('usersess');

  	if(!isset($is_logged_in) || $is_logged_in !=TRUE)
  	redirect('logincontroller/index');

		$this->load->model('insert_model');
		$this->load->model('update_model');
		if ($this->input->post('pro') == 'new'){
			$this->load->model('get_model');
			//$data['new_mrin'] = $this->get_model->nextmrinnumber();
			$data['user'] = $this->get_model->tbl_user();
			$woppm = substr($this->input->post('n_request'),0,2);
			if (($woppm == "PP") || ($woppm == "SM") || ($woppm == "RI")) {
				if ($this->get_model->get_assetnowoppm($this->input->post('n_request'),"1")) {
					$data['new_mrin'] = $this->get_model->nextmrinnumberimg();
				} else {
					$data['new_mrin'] = $this->get_model->nextmrinnumber();
				}
				//echo "lalalalppm : " . substr($this->input->post('n_request'),0,2);
				//exit();
			} else {
				if ($this->get_model->get_assetnowoppm($this->input->post('n_request'),"2")) {
					$data['new_mrin'] = $this->get_model->nextmrinnumberimg();
				} else {
					$data['new_mrin'] = $this->get_model->nextmrinnumber();
				}
				//echo "lalalalrq : " . substr($this->input->post('n_request'),0,2);
				//exit();
			}

			//print_r($data['new_mrin']);
			//echo '<br><br>';
			//print_r($data['user']);
			//echo '<br><br>';
			//exit();
			if ($this->get_model->check_userimg()) {
				$insert_data = array('DocReferenceNo'  => $data['new_mrin'][0]->mrinno,
									 'RequestUserID' => $data['user'][0]->UserID,
									 'CompanyID' => $data['user'][0]->CompanyID,
									 'ZoneID'  => $data['new_mrin'][0]->ZoneID,
									 'DocTypeID' => $data['new_mrin'][0]->DocTypeID,
									 'DateCreated' => date("Y-m-d", strtotime($this->input->post('n_date'))),
									 'DateSubmitted' => date("Y-m-d", strtotime($this->input->post('n_date'))),
									 'DateChanged' => date("Y-m-d", strtotime($this->input->post('n_date'))),
									 //'DateRequired'
									 //'DateApproval'
									 //'DateClosed'
									 'Priority' => 0,
									 'Comments' => $this->input->post('n_comment'),
									 'StatusID' => 0,
									 'CreatorUserID' => $data['user'][0]->UserID,
									 'ApprComments' => "IMG BYPASS",
									 'DateApproval' => date("Y-m-d"),
									 'ApprStatusID' => 4,
									 'ApprStatusIDx' => 6,
									 'ReadFlag' => 0,
									 'CriticalFlag' => 0,
									 'AttachmentFlag' => 0,
									 'CompleteFlag' => 0,
									 'ArchiveFlag' => 0,
									 'PrevID' => 0,
									 'NextID' => 0,
									 'FromWFRoutingID' => 0,
									 'CountryID' => 12,
									 'HospitalID' => $data['new_mrin'][0]->HospitalID,
									 //'ApprZoneID'
									 //'ApprNo'
									 //'RequestRE'
									 'CategoryDate' => 0,
									 'ContractStatus' => $this->input->post('n_Contract'),
									 'Reimbursable' => 0,
									 'ReqCase' => $this->input->post('n_Case'),
									 'WorkOfOrder' => $this->input->post('n_request'),
									 //'TagID',
									 //'Description',
									 //'Brand',
									 //'Model',
									 //'SerialNo',
									 //'LocalAgent',
									 //'Total',
									 //'RNFlag',
									 //'WorkOrderDate',
									 //'AssetNo',
									 //'TagNo',
									 //'ApprComments',
									 'rone' => $this->input->post('n_complaint'),
									 'rtwo' => $this->input->post('n_troubleshooting'),
									 'rthree' => $this->input->post('n_finding'),
									 //'ApprStatusIDx',
									 //'CreatorUserIDx'
									 //'ApprCommentsx'
									 //'DateApprovalx'
									 //'ApprStatusIDxx'
									 //'CreatorUserIDxx'
									 //'ApprCommentsxx'
									 //'DateApprovalxx'
									 'service_code' => $this->session->userdata('usersess')
									 );
			} else {
			$insert_data = array('DocReferenceNo'  => $data['new_mrin'][0]->mrinno,
								 'RequestUserID' => $data['user'][0]->UserID,
								 'CompanyID' => $data['user'][0]->CompanyID,
								 'ZoneID'  => $data['new_mrin'][0]->ZoneID,
								 'DocTypeID' => $data['new_mrin'][0]->DocTypeID,
								 'DateCreated' => date("Y-m-d", strtotime($this->input->post('n_date'))),
								 'DateSubmitted' => date("Y-m-d", strtotime($this->input->post('n_date'))),
								 'DateChanged' => date("Y-m-d", strtotime($this->input->post('n_date'))),
								 //'DateRequired'
								 //'DateApproval'
								 //'DateClosed'
								 'Priority' => 0,
								 'Comments' => $this->input->post('n_comment'),
								 'StatusID' => 0,
								 'CreatorUserID' => $data['user'][0]->UserID,
								 'ApprStatusID' => 6,
								 'ReadFlag' => 0,
								 'CriticalFlag' => 0,
								 'AttachmentFlag' => 0,
								 'CompleteFlag' => 0,
								 'ArchiveFlag' => 0,
								 'PrevID' => 0,
								 'NextID' => 0,
								 'FromWFRoutingID' => 0,
								 'CountryID' => 12,
								 'HospitalID' => $data['new_mrin'][0]->HospitalID,
								 //'ApprZoneID'
								 //'ApprNo'
								 //'RequestRE'
								 'CategoryDate' => 0,
								 'ContractStatus' => $this->input->post('n_Contract'),
								 'Reimbursable' => 0,
								 'ReqCase' => $this->input->post('n_Case'),
								 'WorkOfOrder' => $this->input->post('n_request'),
								 //'TagID',
								 //'Description',
								 //'Brand',
								 //'Model',
								 //'SerialNo',
								 //'LocalAgent',
								 //'Total',
								 //'RNFlag',
								 //'WorkOrderDate',
								 //'AssetNo',
								 //'TagNo',
								 //'ApprComments',
								 'rone' => $this->input->post('n_complaint'),
								 'rtwo' => $this->input->post('n_troubleshooting'),
								 'rthree' => $this->input->post('n_finding'),
								 //'ApprStatusIDx',
								 //'CreatorUserIDx'
								 //'ApprCommentsx'
								 //'DateApprovalx'
								 //'ApprStatusIDxx'
								 //'CreatorUserIDxx'
								 //'ApprCommentsxx'
								 //'DateApprovalxx'
								 'service_code' => $this->session->userdata('usersess')
								 );
							 }
			//print_r($insert_data);
			//exit();

			if ($this->get_model->chkmrin($this->input->post('n_request'))){
				$this->update_model->u_mrinwo($insert_data,$this->input->post('n_request'));
			} else {
				$this->insert_model->newmrin($insert_data);
			}

			//$this->insert_model->newmrin($insert_data);
			//$this->send_mail_frmout('nezam@advancepact.com',$data['new_mrin'][0]->mrinno,$this->input->post('n_comment'));
			//$this->send_mail_frmout('nezam@advancepact.com',$data['new_mrin'][0]->mrinno,$this->$this->input->post('n_comment'));
			$update_data = array('asset_no' => $data['new_mrin'][0]->mrinno);
			$this->update_model->u_commassno($update_data,$this->input->post('tempno'));
			$this->update_model->u_attcassno($update_data,$this->input->post('tempno'));

			$this->update_model->u_autono($data['new_mrin'][0]->ZoneID,date("Y"));

			if ($this->input->post('rowno') <> '' && $this->input->post('rowno') > 0){
				for ($row = 1; $row <= $this->input->post('rowno'); $row++){
					if ($this->input->post('itemcode'.$row) <> ''){
						$insert_item[] = array('ItemCode' => $this->input->post('itemcode'.$row),
											   'MIRNcode' => $data['new_mrin'][0]->mrinno,
											   'Qty' => $this->input->post('n_qty'.$row),
											   'Reimbursable' => $this->input->post('a_rem'.$row),
											   'LastRepDt' => date("Y-m-d",strtotime($this->input->post('startDate'.$row))),
											   'Unit_Cost' => $this->input->post('n_price'.$row),
											   'ApprvRmk' => $this->input->post('vendor'.$row));
					}
				}
				$this->insert_model->insertmrincomp_b($insert_item);
				$update_data = array('asset_no' => $data['new_mrin'][0]->mrinno,
												 'flag' => 'U',
												 'Date_time_stamp' => date("Y-m-d H:i:s"));
						
					
						$this->update_model->update_delete_photo($update_data,$this->input->post('n_request'));
			}

					
		}
		else{
			if ($this->input->post('ApprStatusID') == 107 && $this->input->post('class_id') == 2){
				$ApprStatusId = 128;
				$DateApproval = date("Y-m-d H:i:s");
			}
			else{
				$ApprStatusId = $this->input->post('ApprStatusID');
				$DateApproval = $this->input->post('DateApproval');
			}
			if ($this->input->post('ApprStatusIDx') == 107 && $this->input->post('class_id') == 2){
				$ApprStatusIDx = 128;
				$DateApprovalx = date("Y-m-d H:i:s");
				$ApprStatusIDxx = 128;
				$DateApprovalxx = date("Y-m-d H:i:s");
			}
			else{
				$ApprStatusIDx = $this->input->post('ApprStatusIDx') != 0 ? $this->input->post('ApprStatusIDx') : NULL;
				$DateApprovalx = $this->input->post('DateApprovalx') != '' ? $this->input->post('DateApprovalx') : NULL ;
				$ApprStatusIDxx = $this->input->post('ApprStatusIDxx') != 0 ? $this->input->post('ApprStatusIDxx') : NULL;
				$DateApprovalxx = $this->input->post('DateApprovalxx') != '' ? $this->input->post('DateApprovalxx') : NULL;

			}
			$insert_data = array(//'DocReferenceNo'  => $data['new_mrin'][0]->mrinno,
								 //'RequestUserID' => $data['user'][0]->UserID,
								 //'CompanyID' => $data['user'][0]->CompanyID,
								 //'ZoneID'  => $data['new_mrin'][0]->ZoneID,
								 //'DocTypeID' => $data['new_mrin'][0]->DocTypeID,
								 'DateCreated' => date("Y-m-d", strtotime($this->input->post('n_date'))),
								 'DateSubmitted' => date("Y-m-d", strtotime($this->input->post('n_date'))),
								 'DateChanged' => date("Y-m-d", strtotime($this->input->post('n_date'))),
								 //'DateRequired'
								 'DateApproval' => $DateApproval,
								 //'DateClosed'
								 'Priority' => 0,
								 'Comments' => $this->input->post('n_comment'),
								 //'StatusID' => $this->input->post('StatusID'),
								 //'CreatorUserID' => $data['user'][0]->UserID,
								 'ApprStatusID' => $ApprStatusId,
								 //'ReadFlag' => 0,
								 //'CriticalFlag' => 0,
								 //'AttachmentFlag' => 0,
								 //'CompleteFlag' => 0,
								 //'ArchiveFlag' => 0,
								 //'PrevID' => 0,
								 //'NextID' => 0,
								 //'FromWFRoutingID' => 0,
								 //'CountryID' => 12,
								 //'HospitalID' => $data['new_mrin'][0]->HospitalID,
								 //'ApprZoneID'
								 //'ApprNo'
								 //'RequestRE'
								 //'CategoryDate' => 0,
								 'ContractStatus' => $this->input->post('n_Contract'),
								 //'Reimbursable' => 0,
								 'ReqCase' => $this->input->post('n_Case'),
								 'WorkOfOrder' => $this->input->post('n_request'),
								 //'TagID',
								 //'Description',
								 //'Brand',
								 //'Model',
								 //'SerialNo',
								 //'LocalAgent',
								 //'Total',
								 //'RNFlag',
								 //'WorkOrderDate',
								 //'AssetNo',
								 //'TagNo',
								 //'ApprComments',
								 'rone' => $this->input->post('n_complaint'),
								 'rtwo' => $this->input->post('n_troubleshooting'),
								 'rthree' => $this->input->post('n_finding'),
								 'ApprStatusIDx' => $ApprStatusIDx,
								 //'CreatorUserIDx'
								 //'ApprCommentsx'
								 'DateApprovalx' => $DateApprovalx,
								 'ApprStatusIDxx' => $ApprStatusIDxx,
								 //'CreatorUserIDxx'
								 //'ApprCommentsxx'
								 'DateApprovalxx' => $DateApprovalxx,
								 //'service_code' => $this->session->userdata('usersess')
								 );
			//print_r($insert_data);
			//exit();
			$this->update_model->newmrin_u($insert_data,$this->input->post('mrinno'));
			//$this->update_model->newmrin_u($insert_data,$this->input->get('mrinno'));
//echo "dier masuk cni roger".$this->input->post('rowno')."iiiiiiiiii";
//exit();

			$this->load->model('get_model');

			if ($this->input->post('rowno') <> '' && $this->input->post('rowno') > 0){

				for ($row = 1; $row <= $this->input->post('rowno'); $row++){
					//if ($this->input->post('id'.$row) <> ''){
					//echo "dier masuk cni roger".$this->input->post('rowno')."iiiiiiiiiixxxx".$this->input->post('mrinno').$this->input->post('itemcode'.$row)."<br>";

						if ($this->get_model->check_mirncomp($this->input->post('mrinno'),$this->input->post('itemcode'.$row))) {
							//echo "masuk true";
							if ($this->input->post('n_qty'.$row)=="0") {
								$update_item = array('ItemCode' => $this->input->post('itemcode'.$row).'D',
													   //'MIRNcode' => $data['new_mrin'][0]->mrinno,
													   'Qty' => $this->input->post('n_qty'.$row),
													   'Reimbursable' => $this->input->post('a_rem'.$row),
													   'LastRepDt' => date("Y-m-d",strtotime($this->input->post('startDate'.$row))),
													   //'Unit_Cost' => $this->input->post('n_price'.$row)
													   );
							}else{
								$update_item = array(//'ItemCode' => $this->input->post('itemcode'.$row),
													   //'MIRNcode' => $data['new_mrin'][0]->mrinno,
													   'QtyReq' => $this->input->post('n_qty'.$row),
													   'Qty' => $this->input->post('n_qty'.$row),
													   'Reimbursable' => $this->input->post('a_rem'.$row),
													   'LastRepDt' => date("Y-m-d",strtotime($this->input->post('startDate'.$row))),
													   //'Unit_Cost' => $this->input->post('n_price'.$row)
													   );
							}

						//print_r($update_item);
						//exit();
						$this->update_model->mrincomp_u($update_item,$this->input->post('mrinno'),$this->input->post('id'.$row));
						//$this->update_model->mrincomp_u($update_item,$this->input->get('mrinno'),$this->input->post('id'.$row));
					}
					else{
						//echo "masuk false";
						if ($this->input->post('itemcode'.$row) <> ''){
							if (($this->input->post('pro') == "edit") || ($this->input->get('pro') == "edit")) {
							$insert_item = array('ItemCode' => $this->input->post('itemcode'.$row),
												   'MIRNcode' => $this->input->post('mrinno'),
						 							 //'MIRNcode' => $this->input->get('mrinno'),
													 'QtyReq' => $this->input->post('n_qty'.$row),
												   'Qty' => $this->input->post('n_qty'.$row),
												   'Reimbursable' => $this->input->post('a_rem'.$row),
												   'LastRepDt' => date("Y-m-d",strtotime($this->input->post('startDate'.$row))),
												   'Unit_Cost' => $this->input->post('n_price'.$row),
												   'ApprvRmk' => $this->input->post('vendor'.$row));
												 } else {
					 		 $insert_item = array('ItemCode' => $this->input->post('itemcode'.$row),
					 								'MIRNcode' => $this->input->post('mrinno'),
					 						 		//'MIRNcode' => $this->input->get('mrinno'),
					 								'Qty' => $this->input->post('n_qty'.$row),
					 								'Reimbursable' => $this->input->post('a_rem'.$row),
					 								'LastRepDt' => date("Y-m-d",strtotime($this->input->post('startDate'.$row))),
					 								'Unit_Cost' => $this->input->post('n_price'.$row),
					 								'ApprvRmk' => $this->input->post('vendor'.$row));

												 }

							$this->insert_model->insertmrincomp($insert_item);

						}
					}//exit();
				}
				/*if ($this->input->post('id'.$row) <> ''){
					$this->update_model->editmrincomp($update_item);
				}
				else {
					$this->insert_model->insertmrincomp($insert_item);
				}*/
			}
		}

        if($this->input->post('pro') == 'new'){
		redirect('Procurement?pro=mrin&mrin='.$data['new_mrin'][0]->mrinno);
		}else{
		redirect('Procurement?pro=mrin');
		}




	}

	public function date_check($str = '', $params = '')
	{ //echo "masuk funn";
		list($startdate,$enddate) = explode(',', $params);

		if ($enddate < $startdate)
		{
			$this->form_validation->set_message('date_check', 'MRIN date cannot be lesser than current Date');
			return FALSE;
		}
		else if ($enddate > date("Y-m-d"))
		{
			$this->form_validation->set_message('date_check', 'MRIN date cannot exceed current date');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}



		 public function send_mail_frmout($emailto, $wono="", $summary="") {
         $from_email = "camsis@advancepact.com";
         //$to_email = $this->input->post('email');
         $to_email = $emailto;

         //Load email library
         $this->load->library('email');

         $this->email->from($from_email, 'CAMSIS System');
         $this->email->to($to_email);
         $this->email->subject('MRIN '.$wono.' approval');
         $this->email->message('MRIN '.$wono.' have been created & awaiting your approval.');

         //Send mail
         $this->email->send();
      }

}
?>
