<?php
class amapproval_ctrl extends CI_Controller{

	public function index(){
		// load libraries for URL and form processing
	    $this->load->helper(array('form', 'url'));
	    // load library for form validation
	    $this->load->library('form_validation');
		
		//validation rule
		$this->form_validation->set_rules('n_Payment','Payment','trim');
		$this->form_validation->set_rules('chkbox','Return','trim');
		$this->form_validation->set_rules('n_options','Option','trim|required');
		$this->form_validation->set_rules('n_remark','Remark','trim');
		
		if($this->form_validation->run()==FALSE)
			{
				$this->load->model('display_model');
				$data['record'] = $this->display_model->mrindet($this->input->get('mrinno'));
				$data['itemrec'] = $this->display_model->itemdet($this->input->get('mrinno'));
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
		$this->load->model('display_model');
		$data['itemrec'] = $this->display_model->itemdet($this->input->post('mrinno'));
		if ($this->input->post('classid') == 1){
			$this->load->model('update_model');
			$insert_data = array('ApprStatusID' => $this->input->post('n_options'),
								 'ApprComments' => $this->input->post('n_remark'),
								 'DateApproval' => date("Y-m-d H:i:s"),
								 'ApprStatusIDx' => ($this->input->post('n_options') == 4) ? 6 : NULL,
								 'DateApprovalx' => ($this->input->post('n_options') == 4) ? date("Y-m-d H:i:s") : NULL);
			$this->update_model->mrinapp_u($insert_data,$this->input->post('mrinno'));

			foreach($data['itemrec'] as $row){
				$insert_data = array('QtyReq' => $this->input->post('qty'.$row->Id),
									 'DtApprv' => date("Y-m-d H:i:s"));
				$this->update_model->mrincomp_u($insert_data,$this->input->post('mrinno'),$row->Id);
			}
		}
		else if ($this->input->post('classid') == 3){
			$this->load->model('update_model');
			$update_data = array('ReadFlag' => $this->input->post('chkbox') == 1 ? $this->input->post('chkbox') : 0,
								 'ApprStatusIDx' => $this->input->post('n_options'),
								 'ApprCommentsx' => $this->input->post('n_remark'),
								 'DateApprovalx' => date("Y-m-d H:i:s"),
								 'ApprStatusIDxx' => $this->input->post('n_options'),
								 'ApprCommentsxx' => $this->input->post('n_remark'),
								 'DateApprovalxx' => date("Y-m-d H:i:s"));
			$this->update_model->mrinapp_u($update_data,$this->input->post('mrinno'));

			$this->load->model('insert_model');
			$insert_data = array('MirnCode' => $this->input->post('mrinno'),
								 'Payment_Opt' => $this->input->post('n_Payment'));
			$this->insert_model->mrin_payment($insert_data);

			foreach($data['itemrec'] as $row){
				$insert_data = array('QtyReqfx' => $this->input->post('qty'.$row->Id),
									 'DtApprv1x' => date("Y-m-d H:i:s"),
									 'Unit_Costx' => $this->input->post('price'.$row->Id),
									 'ApprvRmk1x' => $this->input->post('vendor'.$row->Id),
									 'Part_Exchg' => $this->input->post('partc'.$row->Id) == 1 ? $this->input->post('partc'.$row->Id) : 0);
				$this->update_model->mrincomp_u($insert_data,$this->input->post('mrinno'),$row->Id);
			}

			if ($this->input->post('n_options') == '4'){
				$insert_pr = array('MIRN_No' => $this->input->post('mrinno'));
				$this->insert_model->in_pr($insert_pr);
			}
			
		}

		redirect('Procurement?pro=mrin');
	}

}
?>