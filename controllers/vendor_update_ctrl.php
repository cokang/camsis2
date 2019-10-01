<?php
class Vendor_update_ctrl extends CI_Controller{

	public function index(){
		// load libraries for URL and form processing
	    $this->load->helper(array('form', 'url'));
	    // load library for form validation
	    $this->load->library('form_validation');

		//validation rule
		//echo "nilai test : ".set_value('n_vendor_name').":".set_value('n_vendor_code');
		//exit();
		if ($this->input->post('tab') != 'Delete'){

			if (empty(set_value('n_vendor_code')) ) {
				redirect('Procurement/update_delete?tab=New&code='.$this->input->post('code').'&vc='.set_value('n_vendor_name'));
			}
			//echo "masuk cni ".set_value('n_vendor_code');
			//exit();
		//$this->form_validation->set_rules('n_vendor_name','Vendor Name','trim|required');
			$this->load->model('display_model');
		$data['recordd'] = $this->display_model->vendor_update_d();
		$this->form_validation->set_rules('n_vendor_name2','Vendor Name','trim');
		$this->form_validation->set_rules('n_vendor_code','Vendor Code','trim|required');
		$this->form_validation->set_rules('n_vendor_itemid','Vendor Item Id','trim');
		$this->form_validation->set_rules('n_vendor_itemname','Vendor Item Name','trim');
		$this->form_validation->set_rules('n_price','Price','trim');
		$this->form_validation->set_rules('n_vendor_address1','Vendor Address','trim');
		$this->form_validation->set_rules('n_vendor_address2','Vendor Address2','trim');
		$this->form_validation->set_rules('n_vendor_address3','Vendor Address3','trim');
		$this->form_validation->set_rules('n_vendor_tel','Tel No','trim');
		$this->form_validation->set_rules('n_vendor_fax','Fax No','trim');
		$this->form_validation->set_rules('n_contact_person','Contact Person','trim');
		$this->form_validation->set_rules('v_status','Vendor Status','trim');
		$this->form_validation->set_rules('b_status','Bumi Status','trim');
		$this->form_validation->set_rules('gst','GST','trim');
		}
		else{
		$this->form_validation->set_rules('n_vendor_name','Vendor Name','trim');
		$this->form_validation->set_rules('n_vendor_code','Vendor Code','trim');
		}

		if($this->form_validation->run()==FALSE)
			{
				$this ->load->view("head");
				$this ->load->view("content_update_delete_vendor",$data);
			}

			else
			{
				$this ->load->view("head");
				$this ->load->view("content_update_delete_vendor_confirm");
			}
	}

	function comfirmation(){
		$this->load->model('insert_model');
		$this->load->model('update_model');
		if ($this->input->post('tab') == 'New'){
			$insert_data = array('Item_Code' => $this->input->post('code'),
								 'Vendor_Item_Code' => $this->input->post('n_vendor_itemid'),
								 'vendor_item_name' => $this->input->post('n_vendor_itemname'),
								 'Vendor' => $this->input->post('n_vendor_code'),
								 'List_Price' => $this->input->post('n_price'),
								 'Time_stamp' => date("Y-m-d H:i:s"),
								 'UserId' => $this->session->userdata('v_UserName'),
								 'flag' => 'I',
								 'gst' => $this->input->post('gst'));
			//print_r($insert_data);
			//exit();
			//echo '<br>';
			$this->insert_model->tbl_vendor($insert_data);

			$insert_data2 = array('EQUIPMENT_TYPE_NAME' => $this->input->post('n_vendor_itemname'),
								 'VENDOR_CODE' => $this->input->post('n_vendor_code'),
								 'VENDOR_NAME' => $this->input->post('n_vendor_name'),
								 'ADDRESS' => $this->input->post('n_vendor_address1'),
								 'ADDRESS2' => $this->input->post('n_vendor_address2'),
								 'ADDRESS3' => $this->input->post('n_vendor_address3'),
								 'TELEPHONE_NO' => $this->input->post('n_vendor_tel'),
								 'FAX_NO' => $this->input->post('n_vendor_fax'),
								 'CONTACT_PERSON' => $this->input->post('n_contact_person'),
								 //'POSITION' => $this->input->post('n_vendor_tel'),
								 'CONTRACTOR_SUPPLIER' => $this->input->post('v_status'),
								 'BUMI_STATUS' => $this->input->post('b_status'));
			//print_r($insert_data2);
			//exit();
			//$this->insert_model->tbl_vendor_info($insert_data2);
		}
		else if($this->input->post('tab') == 'Update'){
			$insert_data = array('Item_Code' => $this->input->post('code'),
								 'Vendor_Item_Code' => $this->input->post('n_vendor_itemid'),
								 'vendor_item_name' => $this->input->post('n_vendor_itemname'),
								 'Vendor' => $this->input->post('n_vendor_code'),
								 'List_Price' => $this->input->post('n_price'),
								 'Time_stamp' => date("Y-m-d H:i:s"),
								 'UserId' => $this->session->userdata('v_UserName'),
								 'flag' => 'U',
								 'gst' => $this->input->post('gst'));
			//print_r($insert_data);
			//exit();
			//echo '<br>';
			$this->update_model->tbl_vendor_u($insert_data,$this->input->post('code'),$this->input->post('vid'));

			$insert_data2 = array('EQUIPMENT_TYPE_NAME' => $this->input->post('n_vendor_itemname'),
								 'VENDOR_CODE' => $this->input->post('n_vendor_code'),
								 'VENDOR_NAME' => $this->input->post('n_vendor_name'),
								 'ADDRESS' => $this->input->post('n_vendor_address1'),
								 'ADDRESS2' => $this->input->post('n_vendor_address2'),
								 'ADDRESS3' => $this->input->post('n_vendor_address3'),
								 'TELEPHONE_NO' => $this->input->post('n_vendor_tel'),
								 'FAX_NO' => $this->input->post('n_vendor_fax'),
								 'CONTACT_PERSON' => $this->input->post('n_contact_person'),
								 //'POSITION' => $this->input->post('n_vendor_tel'),
								 'CONTRACTOR_SUPPLIER' => $this->input->post('v_status'),
								 'BUMI_STATUS' => $this->input->post('b_status'));
			//print_r($insert_data2);
			//exit();
			//$this->update_model->tbl_vendor_info_u($insert_data2,$this->input->post('viid'));
		}
		else if($this->input->post('tab') == 'Delete'){
			$insert_data = array(
								 'Time_stamp' => date("Y-m-d H:i:s"),
								 'UserId' => $this->session->userdata('v_UserName'),
								 'flag' => 'D');
			//print_r($insert_data);
			//exit();
			//echo '<br>';
			$this->update_model->tbl_vendor_u($insert_data,$this->input->post('code'),$this->input->post('vid'));
		}

		redirect('Procurement/pro_catalog');
	}

}
?>
