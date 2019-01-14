<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Procurement extends CI_Controller {

	function __construct(){
   parent::__construct();

      $this->load->helper('pdf_helper');

	}

	public function index(){
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$this ->load->view("head");
		$this ->load->view("left");
		//if ($this->input->get('pro') == 'mrin'){
		//	$data['mrintype']= $this->input->get('tab') != '' ? $this->input->get('tab') : 0;
		//	if ($data['mrintype'] == 0) {
		//		 $data['mrintype'] = 3;
		//	} elseif ($data['mrintype'] == 3) {
		//		 $data['mrintype'] = 0;
		//	}
		if ($this->input->get('pro') == 'mrin'){
			//$data['mrintype']= $this->input->get('tab') != '' ? $this->input->get('tab') : 0;
			$data['mrintype']= $this->input->get('tab') != '' ? $this->input->get('tab') : 3;
			if ($data['mrintype'] == 0) {
				$data['mrintype'] = 3;
			} elseif ($data['mrintype'] == 3) {
				$data['mrintype'] = 0;
			}
			//echo "lalalal : ".$data['mrintype'];
			$data['msg_nodata'] = '';
			$search = '';
			if( isset($_POST['searchquestion']) ){
				if( $this->input->post("searchquestion") == "" ){
					$data['msg_nodata'] = "NO MRIN SELECTED";
				}else{
					$data['msg_nodata'] = $this->input->post('searchquestion')." NOT FOUND";
				}
				$search = $this->input->post('searchquestion');
			}
			//echo "lalalal : ".$data['mrintype'];
			$this->load->model('display_model');
			$data['user'] = $this->display_model->user_class($this->session->userdata('v_UserName'));
			$data['record']= $this->display_model->mrinlist($data['month'],$data['year'],$data['mrintype'], $data['user'][0]->class_id,$search);
			$data['status'] = $this->display_model->status_table();
			//print_r($data['status']);
			//exit();
			$this ->load->view("Content_mrin",$data);
		}elseif ($this->input->get('pro') == 'approved'){
			$this->load->model('display_model');
			$data['record'] = $this->display_model->mrindet($this->input->get('mrinno'));
			$data['itemrec'] = $this->display_model->itemdet($this->input->get('mrinno'));
			$data['comrec'] = $this->display_model->comrec($this->input->get('mrinno'));
			$data['attrec'] = $this->display_model->attrec($this->input->get('mrinno'));
			$data['user'] = $this->display_model->user_class($this->session->userdata('v_UserName'));
			//print_r($data['record']);
			//exit();
			$this ->load->view("Content_mrin_procure",$data);
		}elseif ($this->input->get('pro') == 'pending'){
			$this->load->model('display_model');
			$data['record'] = $this->display_model->mrindet($this->input->get('mrinno'));
			$data['itemrec'] = $this->display_model->itemdet($this->input->get('mrinno'));
			$data['comrec'] = $this->display_model->comrec($this->input->get('mrinno'));
			print_r($data['itemrec']);
			if (!($data['itemrec'])) {
			//echo "ade data";
			redirect('Procurement?pro=mrin');
			}
			$data['attrec'] = $this->display_model->attrec($this->input->get('mrinno'));
			$data['user'] = $this->display_model->user_class($this->session->userdata('v_UserName'));
			$this ->load->view("Content_mrin_procure",$data);
		}elseif ($this->input->get('pro') == 'new'){
			$this->load->model('get_model');
			$this->load->model('update_model');
			$data['run_no'] = $this->get_model->run_no();
			$update_data = array('Run_no' => $data['run_no'][0]->Run_no + 1,
								 'time_stamp' => date("Y-m-d H:i:s"));
			$this->update_model->uprun_no($update_data);
			$data['runningno'] = 'temp'.$data['run_no'][0]->Run_no;
			//print_r($data['run_no']);
			//exit();
			$this ->load->view("Content_mrin_new",$data);
		}elseif ($this->input->get('pro') == 'edit'){
			$this->load->model('display_model');
			$this->load->model('get_model');
			$data['record'] = $this->display_model->mrindetedit($this->input->get('mrinno'));
			$data['recordcom'] = $this->get_model->get_components($this->input->get('mrinno'));
			$data['recordatt'] = $this->get_model->get_attachments($this->input->get('mrinno'));
			$data['recordis'] = $this->get_model->get_items($this->input->get('mrinno'));
			$data['user'] = $this->display_model->user_class($this->session->userdata('v_UserName'));
			//print_r($data['record']);
			//exit();
			$this ->load->view("Content_mrin_new",$data);
		}

	}
	public function asset3_comm_new(){
		//echo $this->db->last_query();
		$this->load->model('get_model');
		if ($this->input->get('tag') == 'component'){
			$data['componentdet'] = $this->get_model->component_det($this->input->get('mrinno'),$this->input->get('id'));
		}
		else{
			$data['attachmentdet'] = $this->get_model->attachment_det($this->input->get('mrinno'),$this->input->get('id'));
		}

		if ($this->input->get('MC') == '1'){
			if ($this->input->get('tag') == 'component'){
				$data['comp_details'] = $this->get_model->comprunno();
			}
			else{
				$data['attc_details'] = $this->get_model->attcrunno();
			}

			if ($_FILES){
				$config['upload_path']          = 'C:\inetpub\wwwroot\FEMSHospital_v3\uploadmrinfiles';
				//$config['upload_path']          = '/var/www/vhosts/camsis2.advancepact.com/httpdocs/uploadmrinfiles';
	            $config['allowed_types']        = 'jpg|jpeg|gif|tif|png|doc|docx|xls|xlsx|pdf';
	            $config['max_size']             = '1000';
	            $config['max_width']            = 'auto';
	            $config['max_height']           = 'auto';
	            $ext = explode(".",$_FILES["image_file"]['name']);

	            if ($this->input->get('tag') == 'component'){
	            	$new_name = 'comm_'.$data['comp_details'][0]->component_no.'.'.$ext[1];
	            }
				else{
					$new_name = 'attach_'.$data['attc_details'][0]->Attachment_no.'.'.$ext[1];
				}

				$config['file_name'] = $new_name;

	            $this->load->library('upload', $config);

	            if ( ! $this->upload->do_upload('image_file'))
	            {
	                    $data['error'] = array($this->upload->display_errors());
	            }
	            else
	            {

	                    $data['upload_data'] = $this->upload->data();

	                    if ($this->input->get('tag') == 'component'){
		                    $data['upload_data']['asset_no'] = $this->input->get('mrinno');
		                    $data['upload_data']['component_name'] = $this->input->post('att_name');
		                    $data['upload_data']['com_id'] = $data['upload_data']['file_name'];
		                    $data['upload_data']['user_id'] = $this->session->userdata('v_UserName');
		                }
		                else{
		                	$data['upload_data']['asset_no'] = $this->input->get('mrinno');
		                    $data['upload_data']['Doc_name'] = $this->input->post('att_name');
		                    $data['upload_data']['doc_id'] = $data['upload_data']['file_name'];
		                    $data['upload_data']['user_id'] = $this->session->userdata('v_UserName');
		                }

	                    if ($this->input->get('id') == ''){
	                    	$this->load->model('insert_model');
		                    if ($this->input->get('tag') == 'component'){
								$insert_data = array('asset_no' => $data['upload_data']['asset_no'],
													 'component_name' => $data['upload_data']['component_name'],
													 'com_id' => $data['upload_data']['com_id'],
													 'com_path' => $data['upload_data']['file_path'],
													 'flag' => 'I',
													 'Date_time_stamp' => date("Y-m-d H:i:s"),
													 'user_id' => $data['upload_data']['user_id']);

								$data['insertid'] = $this->insert_model->component_details($insert_data);
							}
			                else{
			                	$insert_data = array('asset_no' => $data['upload_data']['asset_no'],
													 'Doc_name' => $data['upload_data']['Doc_name'],
													 'doc_id' => $data['upload_data']['doc_id'],
													 'doc_path' => $data['upload_data']['file_path'],
													 'flag' => 'I',
													 'Date_time_stamp' => date("Y-m-d H:i:s"),
													 'user_id' => $data['upload_data']['user_id']);

								$data['insertid'] = $this->insert_model->attachment_details($insert_data);
			                }
						}
						else{
							$this->load->model('update_model');
							if ($this->input->get('tag') == 'component'){
								$insert_data = array(//'asset_no' => $data['upload_data']['asset_no'],
													 'component_name' => $data['upload_data']['component_name'],
													 'com_id' => $data['upload_data']['com_id'],
													 'com_path' => $data['upload_data']['file_path'],
													 'flag' => 'U',
													 'Date_time_stamp' => date("Y-m-d H:i:s"),
													 'user_id' => $data['upload_data']['user_id']);

								$this->update_model->update_delete_comm($insert_data,$this->input->get('mrinno'),$this->input->get('id'));
							}
			                else{
			                	$insert_data = array(//'asset_no' => $data['upload_data']['asset_no'],
												 'Doc_name' => $data['upload_data']['Doc_name'],
												 'doc_id' => $data['upload_data']['doc_id'],
												 'doc_path' => $data['upload_data']['file_path'],
												 'flag' => 'U',
												 'Date_time_stamp' => date("Y-m-d H:i:s"),
												 'user_id' => $data['upload_data']['user_id']);

								$this->update_model->update_delete_attc($insert_data,$this->input->get('mrinno'),$this->input->get('id'));
			                }
						}

						//$this->load->model('get_model');
				        //$data['comp_details'] = $this->get_model->comprunno();

						$this->load->model('update_model');
						if ($this->input->get('tag') == 'component'){
					        $update_data = array('component_no' => $data['comp_details'][0]->component_no + 1,
					        					 'date_time_stamp' => date("Y-m-d H:i:s"),
					        					 'user_id' => $this->session->userdata('v_UserName'));
					        $this->update_model->up_comrunno($update_data);
					    }
			            else{
			            	$update_data = array('Attachment_no' => $data['attc_details'][0]->Attachment_no + 1,
					        					 'date_time_stamp' => date("Y-m-d H:i:s"),
					        					 'user_id' => $this->session->userdata('v_UserName'));
					        $this->update_model->up_attrunno($update_data);
			            }
	            }
	        }
		}
		else{
			$data['upload_data'] = NULL;
			$data['insertid'] = '';
		}
		$this ->load->view("head");
		$this ->load->view("asset3_comm_new",$data);
	}



	public function asset3_comm_newpo()
		{  $this->load->model('get_model');
		if ($this->input->get('tag') == 'component'){
			$data['componentdet'] = $this->get_model->po_com_det($this->input->get('pono'),$this->input->get('id'));
		}
		else{
			$data['attachmentdet'] = $this->get_model->poattachment_det($this->input->get('pono'),$this->input->get('id'));
		}

		if ($this->input->get('MC') == '1'){
			if ($this->input->get('tag') == 'component'){
				$data['comp_details'] = $this->get_model->comprunno();
			}
			else{
				$data['attc_details'] = $this->get_model->attcrunno();
			}

			if ($_FILES){

				//$config['upload_path']          = '/var/www/vhosts/camsis2.advancepact.com/httpdocs/uploadpofiles';
	            $config['allowed_types']        = 'jpg|jpeg|gif|tif|png|doc|docx|xls|xlsx|pdf';
	            $config['max_size']             = '1000';
	            $config['max_width']            = 'auto';
	            $config['max_height']           = 'auto';
	            $ext = explode(".",$_FILES["image_file"]['name']);

	            if ($this->input->get('tag') == 'component'){
	            	$new_name = 'comm_'.$data['comp_details'][0]->component_no.'.'.$ext[1];
	            }
				else{
					$new_name = 'attach_'.$data['attc_details'][0]->Attachment_no.'.'.$ext[1];
				}
				if ($this->input->get('tag') == 'component'){
	            	$config['upload_path']          = 'C:\inetpub\wwwroot\FEMSHospital_v3\uploadpofiles';
								//$config['upload_path']          = '/var/www/vhosts/camsis2.advancepact.com/httpdocs/uploadpofiles';
	            }
				else{
					$config['upload_path']          = 'C:\inetpub\wwwroot\FEMSHospital_v3\uploadfinfiles';
					//$config['upload_path']          = '/var/www/vhosts/camsis2.advancepact.com/httpdocs/uploadfinfiles';
				}

				$config['file_name'] = $new_name;

	            $this->load->library('upload', $config);

	            if ( ! $this->upload->do_upload('image_file'))
	            {
	                    $data['error'] = array($this->upload->display_errors());
	            }
	            else
	            {

	                    $data['upload_data'] = $this->upload->data();

	                    if ($this->input->get('tag') == 'component'){

		                    $data['upload_data']['PO_No'] = $this->input->get('pono');
							 //$data['upload_data']['visit'] = $this->input->get('vis');
		                    $data['upload_data']['component_name'] = $this->input->post('att_name');
		                    $data['upload_data']['com_id'] = $data['upload_data']['file_name'];
		                    $data['upload_data']['user_id'] = $this->session->userdata('v_UserName');
		                }
		                else{
		                	$data['upload_data']['PO_No'] = $this->input->get('pono');
		                    $data['upload_data']['Doc_name'] = $this->input->post('att_name');
		                    $data['upload_data']['doc_id'] = $data['upload_data']['file_name'];
		                    $data['upload_data']['user_id'] = $this->session->userdata('v_UserName');
		                }

	                    if ($this->input->get('id') == ''){
	                    	$this->load->model('insert_model');
		                    if ($this->input->get('tag') == 'component'){
								$insert_data = array('PO_No' => $data['upload_data']['PO_No'],
													 'component_name' => $data['upload_data']['component_name'],
													 'com_id' => $data['upload_data']['com_id'],
													 'com_path' => $data['upload_data']['file_path'],
													 'flag' => 'I',
													 'Date_time_stamp' => date("Y-m-d H:i:s"),
													 'user_id' => $data['upload_data']['user_id']);

								$data['insertid'] = $this->insert_model->pocom_details($insert_data);
							}
			                else{
			                	$insert_data = array('PO_No' => $data['upload_data']['PO_No'],
													 'Doc_name' => $data['upload_data']['Doc_name'],
													 'doc_id' => $data['upload_data']['doc_id'],
													 'doc_path' => $data['upload_data']['file_path'],
													 'flag' => 'I',
													 'Date_time_stamp' => date("Y-m-d H:i:s"),
													 'user_id' => $data['upload_data']['user_id']);

								$data['insertid'] = $this->insert_model->poattachment_details($insert_data);
			                }

						}

						else{
							$this->load->model('update_model');
							if ($this->input->get('tag') == 'component'){
								$insert_data = array(//'PO_No' => $data['upload_data']['PO_No'],
													 'component_name' => $data['upload_data']['component_name'],
													 'com_id' => $data['upload_data']['com_id'],
													 'com_path' => $data['upload_data']['file_path'],
													 'flag' => 'U',
													 'Date_time_stamp' => date("Y-m-d H:i:s"),
													 'user_id' => $data['upload_data']['user_id']);

								$this->update_model->update_delpo_comm($insert_data,$this->input->get('pono'),$this->input->get('id'));

							}
			                else{
			                	$insert_data = array(//'PO_No' => $data['upload_data']['PO_No'],
												 'Doc_name' => $data['upload_data']['Doc_name'],
												 'doc_id' => $data['upload_data']['doc_id'],
												 'doc_path' => $data['upload_data']['file_path'],
												 'flag' => 'U',
												 'Date_time_stamp' => date("Y-m-d H:i:s"),
												 'user_id' => $data['upload_data']['user_id']);

								$this->update_model->update_delpo_attc($insert_data,$this->input->get('pono'),$this->input->get('id'));
			                }
								echo $this->db->last_query();
	                            exit();
						}

						//$this->load->model('get_model');
				        //$data['comp_details'] = $this->get_model->comprunno();

						$this->load->model('update_model');
						if ($this->input->get('tag') == 'component'){
					        $update_data = array('component_no' => $data['comp_details'][0]->component_no + 1,
					        					 'date_time_stamp' => date("Y-m-d H:i:s"),
					        					 'user_id' => $this->session->userdata('v_UserName'));
					        $this->update_model->up_comrunno($update_data);
					    }
			            else{
			            	$update_data = array('Attachment_no' => $data['attc_details'][0]->Attachment_no + 1,
					        					 'date_time_stamp' => date("Y-m-d H:i:s"),
					        					 'user_id' => $this->session->userdata('v_UserName'));
					        $this->update_model->up_attrunno($update_data);
			            }
	            }
	        }
		}
		else{
			$data['upload_data'] = NULL;
			$data['insertid'] = '';
		}
		$this ->load->view("head");
		$this ->load->view("asset3_comm_new_po",$data);
	}

	public function e_pr(){
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$this ->load->view("head");
		$this ->load->view("left");
		$this->load->model('display_model');
		if ($this->input->get('pr') == 'pending'){
		$data['record'] = $this->display_model->prdet($this->input->get('mrinno'));
		$data['itemrec'] = $this->display_model->itemprdet($this->input->get('mrinno'));
		$data['comrec'] = $this->display_model->comrec($this->input->get('mrinno'));
		$data['attrec'] = $this->display_model->attrec($this->input->get('mrinno'));
		$this ->load->view("Content_mrin_procure",$data);
		}elseif ($this->input->get('pr') == 'approved'){
		$data['record'] = $this->display_model->prdet($this->input->get('mrinno'));
		$data['itemrec'] = $this->display_model->itemprdet($this->input->get('mrinno'));
		$data['comrec'] = $this->display_model->comrec($this->input->get('mrinno'));
		$data['attrec'] = $this->display_model->attrec($this->input->get('mrinno'));
		$this ->load->view("Content_mrin_procure",$data);
		}else{
		$data['tab']= ($this->input->get('tab') != '') ? $this->input->get('tab') : 0;
		if ($data['tab'] != 2){
			$data['record'] = $this->display_model->prlist($data['month'],$data['year'],$this->input->get('tab'));
		}
		else{
			$data['record'] = $this->display_model->polist($data['month'],$data['year']);
		}
		//print_r($data['record']);
		//exit();
		$this ->load->view("asset3_e_pr", $data);
		}
	}
	public function e_po_print(){
		$this->load->model('display_model');
		$data['record'] = $this->display_model->prdet($this->input->get('mrin'));
		$data['itemrec'] = $this->display_model->itemprdet($this->input->get('mrin'));
		$data['vencd'] = $this->display_model->findvencd($this->input->get('mrin'));
		$data['veninfo'] = $this->display_model->findvencd((isset($data['vencd'][0]->Vendor)) ? $data['vencd'][0]->Vendor : 'noval');
		$data['podetail'] = $this->display_model->podet($this->input->get('po'));
		$favcolor = "red";
		$hospapa = "";
		$hoswakil = "";
		//echo "bnbnn :".$this->input->get('mrin')."<br>";
		$hospapa = substr(substr($this->input->get('mrin'),0,8),-3);
		//echo "lalalala :".$hospapa."bababab";
		switch ($hospapa) {
			case "HSA" :
			case "HSI" :
			case "PER" :
			case "KTG" :
			case "MER" :
			case "MKJ" :
			case "SGT" :
			case "TGK" :
			case "MUR" :
			case "KLN" :
			case "BPH" :
			case "PON" :
			case "KUL" :
       $hospapa = "HSA";
			 $hoswakil = "Norhayati bt Yunos";
       break;
    	case "MKA" :
			case "AGJ" :
			case "JAS" :
			case "TMP" :
       $hospapa = "MKA";
			 $hoswakil = "NurAisyah bt Sulaiman";
       break;
    	case "JLB" :
			case "JMP" :
			case "PDX" :
			case "KPL" :
			case "SBN" :
       $hoswakil = "Muhamad Fazuan Bin Yuosoff";
			 $hospapa = "SBN";
			 break;
    	case "IIU":
       $hoswakil = "Wakil IIUM";
			 $hospapa = "IIUM";
			 break;
    	default:
			//echo "pegi def";
       $hospapa = "IIUM";
		}
		$data['hospdet'] = $this->display_model->pohosp($hospapa);
		//echo "nilai ".$hoswakil.$hospapa."abis";
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$this ->load->view("headprinter");
		//$this ->load->view("e_po_print", $data);
		if ($this->input->get('pdf') == 1){
		$this ->load->view("e_po_pdf", $data);
		}else{
		$this ->load->view("e_po_print", $data);
		}
	}
	public function report(){
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$this ->load->view("head");
		$this ->load->view("left");
		if ($this->input->get('pr') == 'pending'){
			$this ->load->view("Content_mrin_procure",$data);
		}elseif ($this->input->get('pr') == 'approved'){
			$this ->load->view("Content_mrin_procure",$data);
		}else{
			$this ->load->view("asset3_report_pro", $data);
		}
	}
	public function pr_report(){
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$this ->load->view("headprinter");
		if ($this->input->get('pr') == 'rs'){
			$this ->load->view("Content_rs_report_print",$data);
		}elseif ($this->input->get('pr') == 'vc'){
			$this ->load->view("Content_vc_report_print",$data);
		}elseif ($this->input->get('pr') == 'vr'){
			$this ->load->view("Content_vr_report_print",$data);
		}
	}
	public function e_request(){
		//echo "lalalalalalla masuk";
		$whattab = ($this->input->get('tab')) ? $this->input->get('tab') : '0';
		//echo "okokookookokoo masuk";
		//echo "ghghghg : " . $whattab;
		$this->load->model('display_model');
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['udept'] = $this->display_model->getuserpodept();
		//print_r($data['udept']);
		//echo "nilainya : ".$data['udept'][0]->dept;
		//exit();
		if ($data['udept'] == 'NONE') {
			$data['polist'] = $this->display_model->getthepo($whattab,$data['month'], $data['year']);
		} else {
			$data['polist'] = $this->display_model->getthepo($whattab,$data['month'], $data['year'],$data['udept'][0]->dept);
		}
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_e_request",$data);
	}
	public function po_follow_up2(){

		$this->load->model('display_model');
		$this->load->model('get_model');
		$this->load->model('get_model');
		$this->load->model('update_model');
		$data['run_no'] = $this->get_model->run_no();
		$update_data = array('Run_no' => $data['run_no'][0]->Run_no + 1,
							 'time_stamp' => date("Y-m-d H:i:s"));
		$this->update_model->uprun_no($update_data);
		$data['runningno'] = 'temp'.$data['run_no'][0]->Run_no;


		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['pono']= $this->input->get('po');
		$data['whattab']= ($this->input->get('tab') <> 0) ? $this->input->get('tab') : '0';

		//if ($data['whattab']==3) { $data['whattab'] = 0; }
		//$data['whattab']= $data['whattab'] + 1;
		$data['pofollow'] = $this->display_model->getpofollow($data['pono'],($data['whattab'] == '3') ? 1 : $data['whattab']+1);
		$visitwhat = "0";
		$visitwhat = $this->input->get('tab') + 1;
		$data['pocom'] = $this->display_model->getpocom($data['pono'],($data['whattab'] == '3') ? 1 : $data['whattab']+1);
		$data['pocat'] = $this->display_model->getpoat($data['pono'],$visitwhat);
		$this ->load->view("head");
		$this ->load->view("left");
		$fgf = (($data['whattab'] == '0')||($data['whattab'] == '3')) ? 1 : $data['whattab'];

		//echo "nmnmnmn : ".$data['whattab']."::".$fgf;
		$this->load->model("get_model");
		$data['chk'] = $this->get_model->chkpo($this->input->get('po'),(($data['whattab'] == '0')||($data['whattab'] == '3')) ? 1 : $data['whattab']);

		//print_r($data);
		//echo "nak brim";
		//$data['runn'] = $this->input->post('tempno');


		if ($this->input->get('powhat') == ''){
			$this ->load->view("Content_po_follow_up2",$data);
		}
		elseif($this->input->get('powhat') == 'update') {


			//print_r($data);
			$this ->load->view("Content_po_follow_up2_update",$data);
		}
		elseif ($this->input->get('powhat') == 'confirm'){

			// load libraries for URL and form processing
			$this->load->helper(array('form', 'url'));
			// load library for form validation
			$this->load->library('form_validation');

			//$this->load->model('get_model');
			//$data['chk'] = $this->get_model->chkpo($this->input->post('n_pono'),"1");
			//validation rule
			//echo "sblm dier masuk cni laaaa".$this->input->get('po');
			if ($this->input->get('po')=="3") {
				//echo "dier masuk cni laaaa";
				$this->form_validation->set_rules('n_pono','PO No.',"is_unique[tbl_po.PO_No]|required");
				$this->form_validation->set_message('is_unique', 'The PO No. '.$this->input->post('n_pono').' is already taken');
				$this->form_validation->set_rules('n_podt','PO Date','required');
			}
			//if($this->form_validation->run()==FALSE)
			//{echo "okokokokokoko";}
			//echo $this->db->last_query();
			//echo validation_errors();
			//exit();
			if($this->form_validation->run()==FALSE)
			{
			$data['runningno'] = $this->input->post('tempno');
			$data['recordcom'] = $this->get_model->get_pocom($data['runningno']);
			$data['recordatt'] = $this->get_model->get_poattached($data['runningno']);
			}
	    else
		$data['runningno'] = $this->input->post('tempno');
		$data['recordcom'] = $this->get_model->get_pocom($data['runningno']);
		$data['recordatt'] = $this->get_model->get_poattached($data['runningno']);
		$this ->load->view("Content_po_follow_up2_update",$data);


		}

	}

	public function po_follow_upsv(){
		//echo "nilai ::".$this->input->post('n_partsrm');
		$visitwhat = "0";
		$visitwhat = $this->input->get('tab') + 1;
		$statuswhat = "N";
		if ($this->input->post('n_completeddt') != "") {
		$statuswhat = "C";
		}
		$closingdt = (($this->input->post('n_codcdt')) != '') ? date('y-m-d',strtotime($this->input->post('n_codcdt'))) : NULL;
		$subdt = (($this->input->post('n_completeddt')) != '') ? date('y-m-d',strtotime($this->input->post('n_completeddt'))) : NULL;
		$dt1 = (($this->input->post('n_dodt')) != '') ? date('y-m-d',strtotime($this->input->post('n_dodt'))) : NULL;
		$dt2 = (($this->input->post('n_invdt')) != '') ? date('y-m-d',strtotime($this->input->post('n_invdt'))) : NULL;
		$dt3 = (($this->input->post('n_mddt')) != '') ? date('y-m-d',strtotime($this->input->post('n_mddt'))) : NULL;
		//echo "nilai post : ".$this->input->post('n_codcdt')."nilai nktest : ".$nktest;
		//exit();


		if ($visitwhat == 4) {
 			$insert_data = array(
						'Date_Completedc'=>date('y-m-d',strtotime($this->input->post('n_completeddt'))),
						'User_Closedc'=>$this->session->userdata('v_UserName'));
			$this->load->model('update_model');
			$this->update_model->updatepomain($insert_data,$this->input->get('po'),'1');
			$this->load->model('update_model');
			$update_data = array('PO_No' => $this->input->get('po'),'visit'=>$visitwhat);
			$this->update_model->u_pocommassno($update_data,$this->input->post('tempno'));
			$this->update_model->u_poattcassno($update_data,$this->input->post('tempno'));
			//echo "masuk nk save";
			//exit();
		}

		else {
			$this->load->model("get_model");
			$data['chk'] = $this->get_model->chkpo($this->input->get('po'),$visitwhat);
			//print_r($data['chk']);
			//exit();


			if ($data['chk']){

				$insert_data = array(
					'Status'=>$statuswhat,
					'Date_Completed'=>$subdt,
					'User_Closed'=>$this->session->userdata('v_UserName'),
					'Invoice_No'=>$this->input->post('n_inv'),
					'parts_rm'=>$this->input->post('n_partsrm'),
					'labor_rm'=>$this->input->post('n_labourm'),
					'cs_rm'=>$this->input->post('n_ctrlstorerm'),
					'cost_rm'=>$this->input->post('n_costrm'),
					'do_no'=>$this->input->post('n_do'),
					'do_date'=>$dt1,
					'invoice_date'=>$dt2,
					'status_set'=>$this->input->post('n_status_list'),
					'visit'=>$visitwhat,
					'recipient_code'=>$this->input->post('n_receipient'),
					'gst_rm'=>$this->input->post('n_gstrm'),

					'totalcost'=>$this->input->post('n_totalrm'),
					'md_appdt'=>$dt3,
					'dept'=>$this->input->post('n_dept'),
					//'closingdtcc'=>(!($this->input->post('n_codcdt'))) ? date('y-m-d',strtotime($this->input->post('n_codcdt'))) : NULL,
					'closingdtcc'=>$closingdt,
					'vendor'=>$this->input->post('n_vendor'),
					'paytype'=>$this->input->post('n_paytype')
				);
				$this->load->model('update_model');
				$this->update_model->updatepomain($insert_data,$this->input->get('po'),$visitwhat);
				$update_data = array('PO_No' => $this->input->get('po'),'visit'=>$visitwhat);
				$this->update_model->u_pocommassno($update_data,$this->input->post('tempno'));
				$this->update_model->u_poattcassno($update_data,$this->input->post('tempno'));

			} else {


				if ($this->input->get('tab') == "1111") {
					$visitwhat = "1";
					$a=$this->input->post('n_pono');
					$b=date('y-m-d',strtotime($this->input->post('n_podt')));
				} else {
					$a=$this->input->get('po');
					$b=$data['chk'][0]->PO_Date;
				}

				$insert_data = array(

					'PO_No'=>$a,
					'PO_Date'=>$b,
					'Status'=>$statuswhat,
					'Date_Completed'=>$subdt,
					'User_Closed'=>$this->session->userdata('v_UserName'),
					'Invoice_No'=>$this->input->post('n_inv'),
					'parts_rm'=>$this->input->post('n_partsrm'),
					'labor_rm'=>$this->input->post('n_labourm'),
					'cs_rm'=>$this->input->post('n_ctrlstorerm'),
					'cost_rm'=>$this->input->post('n_costrm'),
					'do_no'=>$this->input->post('n_do'),
					'do_date'=>$dt1,
					'invoice_date'=>$dt2,
					'status_set'=>$this->input->post('n_status_list'),
					'visit'=>$visitwhat,
					'recipient_code'=>$this->input->post('n_receipient'),
					'gst_rm'=>$this->input->post('n_gstrm'),
					'totalcost'=>$this->input->post('n_totalrm'),
					'md_appdt'=>$dt3,
					'dept'=>$this->input->post('n_dept'),
					'closingdtcc'=>$closingdt,
					'vendor'=>$this->input->post('n_vendor'),
					'paytype'=>$this->input->post('n_paytype')
				);

				$this->load->model('insert_model');
				$this->insert_model->tbl_po($insert_data);

				$this->load->model('update_model');
				$update_data = array('PO_No' => $a,'visit'=>$visitwhat);
				$this->update_model->u_pocommassno($update_data,$this->input->post('tempno'));
				$this->update_model->u_poattcassno($update_data,$this->input->post('tempno'));

			}
		}

		 //closed 4
		//echo $this->db->last_query();
		//exit();
		if ($this->input->get('tab') == "1111") {
			redirect('Procurement/po_follow_up2?tab=0&po='.$a);
		} else {
			//redirect('Procurement/po_follow_up2?tab=0&po='.$this->input->get('po'));}
			redirect('Procurement/po_follow_up2?tab='.$this->input->get('tab').'&po='.$this->input->get('po'));
		}
	}

	public function assetdetailname(){
		$this->load->model("display_model");
		$data['records'] = $this->display_model->list_personel();
		$this ->load->view("head");
		$this ->load->view("content_detail_name",$data);
	}
	public function pro_catalog(){
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$this->load->model('display_model');
		$data['record'] = $this->display_model->stock_asset();
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_pro_catalog",$data);
	}

	public function update_delete(){
		$this->load->model('display_model');
		$data['record'] = $this->display_model->vendor_update($this->input->get('code'),$this->input->get('vid'));
		//print_r($data['record']);
		//exit();
		$this ->load->view("head");
		//if ($this->input->get('tab') == 'Confirm'){

		//}else{
		$this ->load->view("content_update_delete_vendor",$data);
		//}
	}
	public function Release_note(){
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		//validation rule
		$data["data_item_specification"] = "";
		$this->form_validation->set_rules('rn_status','<b>*Status</b>','trim|required');
		$this->form_validation->set_rules('shipment_type','*Shipment Type','trim|required');
		$this->form_validation->set_rules('courier','*Courier','trim|required');
		$this->form_validation->set_rules('area','<b>*Area</b>','trim|required');
		$this->form_validation->set_rules('itemCode[]','<b>*Item</b>','callback_ItemIsExist');
		// $this->form_validation->set_rules('consignment_note','Consignment Note','trim|required');
		// $this->form_validation->set_rules('consignment_date','Consignment Date','trim|required');
		// $this->form_validation->set_rules('accessories','Accessories','trim');
		// echo "<pre>";var_export($this->input->post());die;
		$this->load->model("display_model");
		$data['year']		= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']		= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['records']	= $this->display_model->get_release_note($data);
		$data['arealist']	= $this->display_model->area_list();
		$this ->load->view("head");
		$this ->load->view("left");
		$data["save_link"] = "/Release_note?pro=new";

		if  ($this->input->get('pro') == 'new') {
			$area = "";
			$datefrom = "";
			$dateto = "";
			if( isset($_POST["area"]) && $_POST["area"]!="" ){
				$area = $this->input->post("area");
			}
			if( isset($_POST["datefrom"]) && $_POST["datefrom"]!="" ){
				$datefrom = $this->input->post("datefrom");
			}
			if( isset($_POST["dateto"]) && $_POST["dateto"]!="" ){
				$dateto = $this->input->post("dateto");
			}
			$data["data_item_specification"] = $this->display_model->releaseNote_get_itemspecification($area,$datefrom, $dateto)['table'];

			if($_SERVER['REQUEST_METHOD'] === 'POST' && $this->form_validation->run() == false){

				$data["save_link"] = "/Release_note?pro=new";
				$data["formType"] = "new";
				$this ->load->view("Content_Release_note_newedit",$data);
			}else if($_SERVER['REQUEST_METHOD'] === 'POST' && $this->form_validation->run() == true){

				$data["formType"] = "edit";
				$data["save_link"] = "/save_release_note";
				$data["data_item_specification"] = "";
				$area = "";

				$datefrom = "";
				$dateto = "";
				/* if( isset($_POST["area"]) && $_POST["area"]!="" ){
					$area = $this->input->post("area");
				}
				if( isset($_POST["datefrom"]) && $_POST["datefrom"]!="" ){
					$datefrom = $this->input->post("datefrom");
				}
				if( isset($_POST["dateto"]) && $_POST["dateto"]!="" ){
					$dateto = $this->input->post("dateto");
				} */
		        $area = $this->input->post("area");
				$data["data_item_specification"] = $this->display_model->releaseNote_get_itemspecification($area,$datefrom, $dateto)['table'];
				$this ->load->view("Content_Release_note_newedit",$data);
			}else{
				$data["save_link"] = "/Release_note?pro=new";
				$data["formType"] = "new";
				$this ->load->view("Content_Release_note_newedit",$data);
			}

		} elseif ($this->input->get('pro') == 'view'){
		//$this->load->model('get_model');
		$data["formType"] = "view";
		$tmp["rn"]= ($this->input->get("rn")) ? $this->input->get("rn") : "";
		$data['rndet'] = $this->display_model->getrndetail($this->input->get("rn"));
		//echo "<pre>";
		//print_r($data['rndet']);
        $data["data_item_specification"] = $this->display_model->releaseNote_get_itemspecification($tmp,"","")['table'];
		$this ->load->view("Content_Release_note_newedit",$data);
		}

		else{
			$this ->load->view("Content_Release_note",$data);
		}
	}

	public function releaseNote_get_itemspecification(){
		$this->load->model("display_model");
			$site		= "";
			$datefrom	= "";
			$dateto 	= "";
			if( isset($_POST['site']) && $this->input->post("site")!="" ){
				$site = $this->input->post("site");
			}
			if( isset($_POST['datefrom']) && $this->input->post("datefrom")!="" ){
				$datefrom = date("m-d-Y", strtotime($this->input->post("datefrom")));
			}
			if( isset($_POST['dateto']) && $this->input->post("dateto")!="" ){
				$dateto = date("m-d-Y", strtotime($this->input->post("dateto")));
			}
		$res	= json_encode($this->display_model->releaseNote_get_itemspecification($site,$datefrom,$dateto));
		echo $res;
	}

	public function save_release_note(){
		$this->load->model("insert_model");
		$res = $this->insert_model->save_release_note();
		if( $res ){
			redirect("/procurement/Release_note");
		}else{
			redirect("/procurement/Release_note?pro=edit");
		}
	}

	public function report_progress(){
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$this ->load->view("headprinter");
		$this ->load->view("content_report_progress",$data);
	}

	public function update_delete_comm(){
		$this->load->model('update_model');
		if ($this->input->get('act') == 'delete'){
			$update_data = array('flag' => 'D',
								 'Date_time_stamp' => date("Y-m-d H:i:s"),
								 'user_id' => $this->session->userdata('v_UserName'));
		}
		else if ($this->input->get('act') == 'update'){
			if ($this->input->get('tag') == 'component'){
				$update_data = array('component_name' => $this->input->post('att_name'),
									 'flag' => 'U',
									 'Date_time_stamp' => date("Y-m-d H:i:s"),
									 'user_id' => $this->session->userdata('v_UserName'));
			} else {
				$update_data = array('Doc_name' => $this->input->post('att_name'),
									 'flag' => 'U',
									 'Date_time_stamp' => date("Y-m-d H:i:s"),
									 'user_id' => $this->session->userdata('v_UserName'));
			}
		}

		if ($this->input->get('tag') == 'component'){
			$this->update_model->update_delete_comm($update_data,$this->input->get('mrinno'),$this->input->get('id'));
		}
		else{
			$this->update_model->update_delete_attc($update_data,$this->input->get('mrinno'),$this->input->get('id'));
		}

		$this ->load->view("asset3_comm_new");
	}

	public function update_delete_pocom(){
		$this->load->model('update_model');

		if ($this->input->get('act') == 'delete' && $this->input->get('tag') == 'component'){
			$this->load->model('delete_model');
			$this->delete_model->deletepocom($this->input->get('pono'),$this->input->get('link'),$this->input->get('id'));


		} else {
		$this->load->model('delete_model');
		 $this->delete_model->deletepoat($this->input->get('pono'),$this->input->get('link'),$this->input->get('id'));

		}

		 if ($this->input->get('act') == 'update'){
			if ($this->input->get('tag') == 'component'){
				$update_data = array('component_name' => $this->input->post('att_name'),
									 'flag' => 'U',
									 'Date_time_stamp' => date("Y-m-d H:i:s"),
									 'user_id' => $this->session->userdata('v_UserName'));
									 $this->update_model->update_delpo_comm($update_data,$this->input->get('pono'),$this->input->get('id'));
			} else {
				$update_data = array('Doc_name' => $this->input->post('att_name'),
									 'flag' => 'U',
									 'Date_time_stamp' => date("Y-m-d H:i:s"),
									 'user_id' => $this->session->userdata('v_UserName'));
									 	$this->update_model->update_delpo_attc($update_data,$this->input->get('pono'),$this->input->get('id'));
			}
		}


		$this ->load->view("asset3_comm_new_po");
	}

	public function pop_item(){
		$this->load->model('get_model');
		$data['codecat'] = $this->get_model->get_codecat();
		$data['codec'] = $this->input->get('codecat') <> '' ? $this->input->get('codecat') : '';
		$data['record'] = $this->get_model->get_itemdet($data['codec']);

		$this ->load->view("head");
		$this ->load->view("content_pop_item",$data);
	}

	public function pop_price(){
		$this->load->model('get_model');
		$data['record'] = $this->get_model->get_priceven($this->input->get('itemcode'));
		//print_r($data['record']);
		//exit();
		$this ->load->view("head");
		$this ->load->view("content_pop_price",$data);
	}
	public function e_pr_print(){
		$this->load->model('display_model');
		$data['record'] = $this->display_model->prdet($this->input->get('mrinno'));
		$data['itemrec'] = $this->display_model->itemprdet($this->input->get('mrinno'));
		//print_r($data['record']);
		//exit();
		$this ->load->view("headprinter");
		$this ->load->view("Content_e_pr_print",$data);
	}

	public function print_release_note(){
		$data["RN_No"] = $this->input->get("RN_No");
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : "";//date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : "";//date("m");
		$this->load->model("display_model");
		$data["record"] = $this->display_model->get_release_note($data);
		if($this->input->get('pdf') == 1){
			$this ->load->view("print_release_note_pdf", $data);
		}else{
			$this ->load->view("headprinter", $data);
			$this->load->view("print_release_note");
		}
	}

	public function ItemIsExist($item){
		if(is_null($item)) {
			$this->form_validation->set_message('ItemIsExist', 'No <b>*Item</b> Selected');
			return false;
		}
		return true;
	}

	public function rprt_po_list(){
	    $this->load->model("display_model");
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['records'] = $this->display_model->porpt_table1($data['year'],$data['month']);
		if ($this->input->get('whatr')){
		$data['records2'] = $this->display_model->porpt_table2($data['year'],$data['month'],$this->input->get('whatr'),$this->input->get('whathosp'));

		 foreach($data['records2'] as $key => $vendor)
     {
         $records3  = $this->display_model->porpt_table3($vendor->DocReferenceNo);
         $data['records2'][$key]->Specialist =  ($records3[0]->Specialist) ? $records3[0]->Specialist : '' ;
         $data['records2'][$key]->Status =  ($records3[0]->Status) ? $records3[0]->Status : '';
         $data['records2'][$key]->Remark =  ($records3[0]->Remark) ? $records3[0]->Remark : '';
     }
	 //print "<pre>";
	 //print_r($data['records2']);
		}

	    $totalwo = $this->display_model->porpt_totalwo($data['year'],$data['month'])[0]->Total; //1
	    $data['totalwo'] =  ($totalwo) ? $totalwo : 0;
	    $totalcwo =  $this->display_model->porpt_totalcwo($data['year'],$data['month'])[0]->Total;//2
		$data['totalcwo'] =  ($totalcwo) ? $totalcwo : 0;
		if (is_numeric($data['totalwo']) && is_numeric($data['totalcwo']) ){
		$data['totalpcwo'] = (!empty($data['totalwo']) && !empty($data['totalcwo']) ) ? number_format(($data['totalcwo'] / $data['totalwo']) * 100, 4) : '0';
		}
		$totalscwo = $this->display_model->porpt_totalscwo($data['year'],$data['month'])[0]->Total;//3
		$data['totalscwo'] = ($totalscwo) ? $totalscwo : 0;
		if (is_numeric($data['totalwo']) && is_numeric($data['totalscwo']) ){
		$data['totalpscwo'] = (!empty($data['totalwo']) && !empty($data['totalscwo']) ) ? number_format(($data['totalscwo'] / $data['totalwo']) * 100, 4) :'0';
		}
		$totalnscwo = $this->display_model->porpt_totalnscwo($data['year'],$data['month'])[0]->Total;//4
		$data['totalnscwo'] = ($totalnscwo) ? $totalnscwo : 0;
		if (is_numeric($data['totalwo']) && is_numeric($data['totalnscwo']) ){
		$data['totalpnscwo'] = (!empty($data['totalwo']) && !empty($data['totalnscwo'])) ? number_format(($data['totalnscwo'] / $data['totalwo']) * 100, 4) : '0';
		}
		$totalncwo = $this->display_model->porpt_totalncwo($data['year'],$data['month'])[0]->Total;//5
		$data['totalncwo'] = ($totalncwo) ? $totalncwo : 0;
		if (is_numeric($data['totalwo']) && is_numeric($data['totalncwo'])){
		$data['totalpncwo'] = (!empty($data['totalwo']) && !empty($data['totalncwo'])) ? number_format(($data['totalncwo'] / $data['totalwo']) * 100, 4) : '0' ;
		}

		$totalpam = $this->display_model->porpt_totalpam($data['year'],$data['month'])[0]->Total;
		$data['totalpam'] = ($totalpam) ? $totalpam :0;
		$totalall = 0;
		if (is_numeric($data['totalwo']) && is_numeric($data['totalpam'])){
		$totalall = $data['totalpam'];
		$data['totalpamp'] = (!empty($data['totalwo']) && !empty($data['totalpam'])) ? number_format(($data['totalpam'] / $data['totalcwo']) * 100, 4) : '0';
		}
	    $totalppr = $this->display_model->porpt_totalppr($data['year'],$data['month'])[0]->Total;
	    $data['totalppr'] = ($totalppr) ? $totalppr : 0;
		if (is_numeric($data['totalwo']) && is_numeric($data['totalppr']) ){
		$totalall = $totalall + $data['totalppr'];
	    $data['totalpprp'] = (!empty($data['totalwo']) && !empty($data['totalppr']) ) ? number_format(($data['totalppr'] / $data['totalcwo']) * 100, 4) :'0';
		}
		$totalplc = $this->display_model->porpt_totalplc($data['year'],$data['month'])[0]->Total;
		$data['totalplc'] = ($totalplc) ? $totalplc : 0;
		if (is_numeric($data['totalwo']) && is_numeric($data['totalplc']) ){
		$totalall = $totalall + $data['totalplc'];
	    $data['totalplcp'] = (!empty($data['totalplc']) && !empty($data['totalcwo'])) ? number_format(($data['totalplc'] / $data['totalcwo']) * 100, 4) :'0';
		}
		$data['totalpsp'] = $data['totalcwo'] - $totalall;
	    $data['totalpspp'] = (!empty($data['totalplc']) && !empty($data['totalcwo'])) ? number_format(($data['totalpsp'] / $data['totalcwo']) * 100, 4) :'0' ;
	    $this ->load->view("headprinter");
		$this ->load->view("report_po_listing.php", $data);

	}

	public function report_mrin_listing(){
		$this->load->model("display_model");
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");

		$this->load->view("headprinter");
		$data['records_by_hospcode']= array();
		$data['records']			= $this->display_model->report_mrin_listing($data);
		$data['totalwo']			= $this->display_model->totalwo($data);
		$data['totalpcwo']			= $this->display_model->totalpcwo($data)['totalpcwo'];//pending mrin
		$data['totalcwo']			= $this->display_model->totalpcwo($data)['totalcwo'];//pending mrin
		$data['totalscwo']			= $this->display_model->totalpscwo($data)['totalscwo'];//reject mrin
		$data['totalpscwo']			= $this->display_model->totalpscwo($data)['totalpscwo'];//reject mrin
		$data['totalnscwo']			= $this->display_model->totalpnscwo($data)['totalnscwo'];//pending PR
		$data['totalpnscwo']		= $this->display_model->totalpnscwo($data)['totalpnscwo'];//pending PR
		$data['totalncwo']			= $this->display_model->totalpncwo($data)['totalncwo'];//Release Note
		$data['totalpncwo']			= $this->display_model->totalpncwo($data)['totalpncwo'];//Release Note
		if( isset($_GET["whatr"]) && $_GET["whatr"]==21 ){
			$data['totalall']			= $this->display_model->totalpamp($data)['totalall'];
			$data['totalpam']			= $this->display_model->totalpamp($data)['totalpam'];
			$data['totalpamp']			= $this->display_model->totalpamp($data)['totalpamp'];
			$data['totalppr']			= $this->display_model->totalppr($data)['totalppr'];
			$data['totalall']			= $this->display_model->totalppr($data)['totalall'];
			$data['totalpprp']			= $this->display_model->totalppr($data)['totalpprp'];
			$data['totalplc']			= $this->display_model->totalplc($data)['totalplc'];
			$data['totalplcp']			= $this->display_model->totalplc($data)['totalplcp'];
			$data['totalpsp']			= $this->display_model->totalplc($data)['totalpsp'];
			$data['totalpspp']			= $this->display_model->totalplc($data)['totalpspp'];
		}
		$data['whatr']				= $this->display_model->whatr($data);
		$data['whatr2']				= $this->display_model->whatr2($data);
		if( isset($_GET["whathosp"]) && $this->input->get("whathosp")!="" ){
			$data['records_by_hospcode'] = $this->display_model->report_mrin_listing_getby_hospcode($data);
		}
		$this->load->view("report_mrin_listing", $data);
	}





}
?>
