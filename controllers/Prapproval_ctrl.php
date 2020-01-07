<?php
class Prapproval_ctrl extends CI_Controller{

	public function index(){
		// load libraries for URL and form processing
	    $this->load->helper(array('form', 'url'));
	    // load library for form validation
	    $this->load->library('form_validation');

		//validation rule
		$this->form_validation->set_rules('n_options','Option','trim|required');
		$this->form_validation->set_rules('ven_ref','Vendor Reference','trim');
		$this->form_validation->set_rules('n_remark','Remark','trim');

		if($this->form_validation->run()==FALSE)
			{
				$this->load->model('display_model');
				$data['record'] = $this->display_model->prdet($this->input->get('mrinno'));
				$data['itemrec'] = $this->display_model->itemprdet($this->input->get('mrinno'));
				$data['comrec'] = $this->display_model->comrec($this->input->get('mrinno'));
				$data['attrec'] = $this->display_model->attrec($this->input->get('mrinno'));
				$this ->load->view("head");
				$this ->load->view("left");
				$this ->load->view("Content_mrin_procure",$data);
			}
			else
			{
				$this ->load->view("head");
				$this ->load->view("left");
				$this ->load->view("Content_mrin_app_confirm");
			}
	}

	function comfirmation(){
		$this->load->model('update_model');
		$this->load->model('get_model');
		$this->load->model('display_model');
		$this->load->model('insert_model');

		if ($this->input->get('pr') == 'pending'){

			$data['newpr'] = $this->get_model->nextprnumber();

			$update_data = array('PR_No' => $data['newpr'][0]->prno);
			$this->update_model->tbl_pr_mirn($update_data,$this->input->post('mrinno'));

			$insert_pr = array('PRNo' => $data['newpr'][0]->prno,
							   'DT_Released' => date("Y-m-d H:i:s"),
							   'Procure_Logis_Comen' => $this->input->post('n_remark'),
							   'Procure_Logis_Status' => $this->input->post('n_options'),
							   'Apprv_By' => $this->session->userdata('v_UserName'));
			$this->insert_model->tbl_pr($insert_pr);

			$insert_app = array('PR_No' => $data['newpr'][0]->prno,
								'WHO_Apprv' => 'SM'.'-'.$this->session->userdata('v_UserName'));
			$this->insert_model->tbl_pr_apprv($insert_app);

			$update_prno = array('pr_next_no' => $data['newpr'][0]->pr_next_no + 1,
								 'userid' => $this->session->userdata('v_UserName'));
			$this->update_model->updatepr($update_prno,date('Y'));

			////////po no inc.
			$insert_pr = array('SM_Comen' => $this->input->post('n_remark'),
							   'SM_Status' => $this->input->post('n_options'),
							   'vendor_rmk' => $this->input->post('n_remark'),
							   'Apprv_By' => $this->session->userdata('v_UserName'),
							   'DT_Apprv' => date("Y-m-d H:i:s"));
			$this->update_model->tbl_pr_u($insert_pr,$this->input->post('prno'));

			$data['newpo'] = $this->get_model->nextponumber($this->input->post('mrinno'));

			//$data['itemrec'] = $this->display_model->itemprdet($this->input->get('mrinno'));
						$data['itemrec'] = $this->display_model->itemprdet($this->input->post('mrinno'));

			$insert_po = array('MIRN_No' => $this->input->post('mrinno'),
							   'PO_No' => $data['newpo'][0]->pono,
							   'Vendor_No' => $data['itemrec'][0]->ApprvRmk1x);
			$this->insert_model->tbl_po_mirn($insert_po);

			$update_pono = array('po_next_no' => $data['newpo'][0]->po_next_no + 1,
								 'userid' => $this->session->userdata('v_UserName'));
			$this->update_model->updatepo($update_pono,date('Y'));
			////////po no inc.

			////////po no tbl_po inc.
			$insert_tbl_po = array('PO_No' => $data['newpo'][0]->pono,
							   'PO_Date' => date("Y-m-d"),
								 'visit' => '1');
			$this->insert_model->tbl_po($insert_tbl_po);
			////////po no tbl_po inc.

		}
		else {

			$insert_pr = array('SM_Comen' => $this->input->post('n_remark'),
							   'SM_Status' => $this->input->post('n_options'),
							   'vendor_rmk' => $this->input->post('ven_ref'),
							   'Apprv_By' => $this->session->userdata('v_UserName'),
							   'DT_Apprv' => date("Y-m-d H:i:s"));
			$this->update_model->tbl_pr_u($insert_pr,$this->input->post('prno'));

			$data['newpo'] = $this->get_model->nextponumber($this->input->post('mrinno'));

			//$data['itemrec'] = $this->display_model->itemprdet($this->input->get('mrinno'));
						$data['itemrec'] = $this->display_model->itemprdet($this->input->post('mrinno'));

			$insert_po = array('MIRN_No' => $this->input->post('mrinno'),
							   'PO_No' => $data['newpo'][0]->pono,
							   'Vendor_No' => $data['itemrec'][0]->ApprvRmk1x);
			$this->insert_model->tbl_po_mirn($insert_po);

			$update_pono = array('po_next_no' => $data['newpo'][0]->po_next_no + 1,
								 'userid' => $this->session->userdata('v_UserName'));
			$this->update_model->updatepo($update_pono,date('Y'));


		}

		redirect('Procurement/e_pr?tab=2');
	}

}
?>
