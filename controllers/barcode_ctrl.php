<?php
class barcode_ctrl extends CI_Controller{

	public function index(){
		// load libraries for URL and form processing
		echo "masuk dah ";
		$rowno = $this->input->post('rows');
		echo "<br> nilai row ".$rowno;
		echo "<br> ".$this->input->post('act')." ?? nilai : ".$this->input->post('itemcode1');
		//exit();
		$emprow = 0;
			if ($rowno > 0){
				for($i = 1;$i <= $rowno;$i++){
					if ($this->input->post('itemcode'.$i) <> '') {
					echo "<br>nilai ".$i." : ".$this->input->post('itemcode'.$i);
					echo "<br>nilai3 ".$i." : ".$this->input->post('itemcode3'.$i);
					echo "<br>nilai4 ".$i." : ".$this->input->post('itemcode4'.$i);
					echo "<br>nilai5 ".$i." : ".$this->input->post('itemcode5'.$i);
					echo "<br>nilai6 ".$i." : ".$this->input->post('itemcode6'.$i);
					echo "<br>nilai7 ".$i." : ".$this->input->post('itemcode7'.$i);
					echo "<br>nilai8 ".$i." : ".$this->input->post('itemcode8'.$i);
					echo "<br>nilai9 ".$i." : ".$this->input->post('itemcode9'.$i);
					/*
						echo form_hidden('itemcode'.($i - $emprow),$this->input->post('itemcode'.$i));
						echo form_hidden('n_qty'.($i - $emprow),$this->input->post('n_qty'.$i));
						echo form_hidden('a_rem'.($i - $emprow),$this->input->post('a_rem'.$i));
						echo form_hidden('startDate'.($i - $emprow),$this->input->post('startDate'.$i));
						echo form_hidden('n_price'.($i - $emprow),$this->input->post('n_price'.$i));
						echo form_hidden('vendor'.($i - $emprow),$this->input->post('vendor'.$i));
						echo form_hidden('id'.($i - $emprow),$this->input->post('id'.$i));
					*/
					}
					else{
						$emprow = $emprow + 1;
					}
				}
			}
		
		//exit();
		
	//$username = $this->input->post('username');
	$username = $this->session->userdata('v_UserName');
	//$userpassword = $this->input->post('password');
	$emprow = 0;
			if ($rowno > 0){
				for($i = 1;$i <= $rowno;$i++){
					if ($this->input->post('itemcode'.$i) <> '') {
					

	$id = $this->input->post('itemcode'.$i);
	$qty = $this->input->post('itemcode3'.$i);
	$n = $this->input->post('itemcode8'.$i);
	$p = $this->input->post('itemcode7'.$i);
	$act = $this->input->post('act');
	$hosp = "IIUM";
	//$hosp = $this->session->userdata('hosp_code');
	//$hosp = 'MKA';//test

	$this->load->model('insert_model');
	$this->load->model('update_model');

//verified user
	if ($act == 'take'){
	if($username != '')
	{
		$insert_data = array(
	                         'ItemCode' => $id,
							 //'Store_Id'=>$this->session->userdata('hosp_code'),
							 'Store_Id'=>$hosp,
	                         'Time_Stamp' => date('Y-m-d H:i:s'),
	                         'Qty_Before' => $qty,
							 'Qty_Taken' => $this->input->post('itemcode5'.$i),
							 'Action_Flag' => 'I',
							 'Last_User_Update'=>$username,
							 'Related_WO'=> $this->input->post('itemcode4'.$i),
							 'Remark' => $this->input->post('itemcode6'.$i),
							 'Price_Taken' => $p
		);
//print_r($insert_data);
//exit();
		$this->insert_model->store_takeadd($insert_data);

//echo "<br>".$this->db->last_query();
//exit();
		$takeadd_data = array(
							'Qty' => $qty - $this->input->post('itemcode5'.$i),
							'Time_Stamp' => date('Y-m-d H:i:s'),
							'Action_Flag' => 'U',
							'Last_User_Update' =>$username,
		);
		$this->update_model->store_take_update($id,$hosp,$takeadd_data);
//echo "<br>".$this->db->last_query();
		$pricetotal = $p * $qty;
		$docdetails = $this->input->post('n_doc_det');

		$update_job = array(
							'v_PartName' => $n,
							'n_PartRM' => $p,
							'n_PartAmount' => $qty,
							'n_PartTotal' => $pricetotal,
							'd_Timestamp' => date('Y-m-d H:i:s'),
							'v_Actionflag' => 'U'
		);
		$this->update_model->store_takevisit_update($docdetails,$hosp,$update_job);
//echo "<br>".$this->db->last_query();
		if(substr($docdetails,0,2) == 'PP' OR substr($docdetails,0,1) == 'B'){
			$update_ppm = array(
							 	'd_Timestamp' => date('Y-m-d H:i:s')
		);
		$this->update_model->store_takeppm_update($docdetails,$hosp,$update_ppm);
		}
		else{
			$update_rcm = array(
							 	'D_timestamp' => date('Y-m-d H:i:s')
		);
		$this->update_model->store_takercm_update($docdetails,$hosp,$update_rcm);
		
		}
//echo "<br>".$this->db->last_query();
//exit();
		//redirect('contentcontroller/bar_code');

	}
	else
	{
		$this->index();
	}
	
	}
	
	elseif($act == 'add'){
	//echo "masuk add";
	//exit();
		$insert_data = array(
	                         'ItemCode' => $id,
							 //'Store_Id'=>$this->session->userdata('hosp_code'),
							 'Store_Id'=>$hosp,
	                         'Time_Stamp' => date('Y-m-d H:i:s'),
	                         'Qty_Before' => $qty,
							 'Qty_Add' => $this->input->post('itemcode5'.$i),
							 'Action_Flag' => 'I',
							 'Last_User_Update'=>$this->session->userdata('v_UserName'),
							 'Related_WO'=> $this->input->post('itemcode4'.$i),
							 'Remark' => $this->input->post('itemcode6'.$i),
							 'Price_Taken' => $this->input->post('itemcode9'.$i)
							 //'Price_Taken' => $p
		);
		$this->insert_model->store_takeadd($insert_data);

		$takeadd_data = array(
							'Qty' => $qty + $this->input->post('itemcode5'.$i),
							'Time_Stamp' => date('Y-m-d H:i:s'),
							'Action_Flag' => 'U',
							'Last_User_Update' =>$this->session->userdata('v_UserName'),
		);
		$this->update_model->store_take_update($id,$hosp,$takeadd_data);

		$addprice_data = array(
								'ItemCode' => $id,
								'User_Update' => $this->session->userdata('v_UserName'),
								//'Hosp_code' => $this->session->userdata('hosp_code'),
								'Hosp_code' => $hosp,
								'Time_Stamp' => date('Y-m-d H:i:s'),
								'Price' => $this->input->post('itemcode9'.$i),
								//'Vendor_Code'
			);
		$this->insert_model->store_addprice($addprice_data);

		//redirect('contentcontroller/Store');	
		//redirect('contentcontroller/bar_code');
	}
	

	//}//endconfirmation
											}
					else{
						$emprow = $emprow + 1;
					}
				}
			}
	
	redirect('contentcontroller/bar_code');
	
	   
	}
	
	function comfirmation(){
		$this->load->model('insert_model');
		$this->load->model('update_model');
		if ($this->input->post('pro') == 'new'){
			$this->load->model('get_model');
			$data['new_mrin'] = $this->get_model->nextmrinnumber();
			$data['user'] = $this->get_model->tbl_user();
			//print_r($data['new_mrin']);
			//echo '<br><br>';
			//print_r($data['user']);
			//echo '<br><br>';
			
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
			//print_r($insert_data);
			//exit();
			
			$this->insert_model->newmrin($insert_data);

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

			if ($this->input->post('rowno') <> '' && $this->input->post('rowno') > 0){
				for ($row = 1; $row <= $this->input->post('rowno'); $row++){
					if ($this->input->post('id'.$row) <> ''){
						$update_item = array(//'ItemCode' => $this->input->post('itemcode'.$row),
											   //'MIRNcode' => $data['new_mrin'][0]->mrinno,
											   'Qty' => $this->input->post('n_qty'.$row),
											   'Reimbursable' => $this->input->post('a_rem'.$row),
											   'LastRepDt' => date("Y-m-d",strtotime($this->input->post('startDate'.$row))),
											   //'Unit_Cost' => $this->input->post('n_price'.$row)
											   );

						$this->update_model->mrincomp_u($update_item,$this->input->post('mrinno'),$this->input->post('id'.$row));
					}
					else{
						if ($this->input->post('itemcode'.$row) <> ''){
							$insert_item = array('ItemCode' => $this->input->post('itemcode'.$row),
												   'MIRNcode' => $this->input->post('mrinno'),
												   'Qty' => $this->input->post('n_qty'.$row),
												   'Reimbursable' => $this->input->post('a_rem'.$row),
												   'LastRepDt' => date("Y-m-d",strtotime($this->input->post('startDate'.$row))),
												   'Unit_Cost' => $this->input->post('n_price'.$row),
												   'ApprvRmk' => $this->input->post('vendor'.$row));

							$this->insert_model->insertmrincomp($insert_item);

						}
					}
				}
				/*if ($this->input->post('id'.$row) <> ''){
					$this->update_model->editmrincomp($update_item);
				} 
				else {
					$this->insert_model->insertmrincomp($insert_item);
				}*/
			}
		}

		redirect('Procurement?pro=mrin');
		

		
	}

}
?>