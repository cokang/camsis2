<?php

class Stock_takeadd_ctrl extends CI_Controller{
	
	function index(){

    // load libraries for URL and form processing
    $this->load->helper(array('form', 'url'));
    // load library for form validation
    $this->load->library('form_validation');

        //validation rule
	$this->form_validation->set_rules('n_doc_det','Documentation Details','trim|required');
	$this->form_validation->set_rules('n_quantity','Quantity','trim');
	$this->form_validation->set_rules('n_remark','Remark','trim');
	$this->form_validation->set_rules('n_unitprice','Price Per Unit','trim');

if($this->form_validation->run()==FALSE)
		{
		$data['id'] = $this->input->post('id');
		$data['qty'] = $this->input->post('qty');
		$data['n'] = $this->input->post('n');
		$data['p'] = $this->input->post('p');
		$data['act'] = $this->input->post('act');
		$data['store'] = $this->input->post('store');
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_pop_ustore",$data);
		}
		else
		{
		$data['id'] = $this->input->post('id');
		$data['qty'] = $this->input->post('qty');
		$data['n'] = $this->input->post('n');
		$data['p'] = $this->input->post('p');
		$data['act'] = $this->input->post('act');
		$data['store'] = $this->input->post('store');
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_pop_ustore_c",$data);
		}
	}
	function confirmation(){
	$username = $this->input->post('username');
	//$userpassword = $this->input->post('password');

	$id = $this->input->post('id');
	$qty = $this->input->post('qty');
	$n = $this->input->post('n');
	$p = $this->input->post('p');
	$act = $this->input->post('act');
	$hosp = $this->input->post('store');
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
							 'Qty_Taken' => $this->input->post('n_quantity'),
							 'Action_Flag' => 'I',
							 'Last_User_Update'=>$username,
							 'Related_WO'=> $this->input->post('n_doc_det'),
							 'Remark' => $this->input->post('n_remark'),
							 'Price_Taken' => $p
		);
		$this->insert_model->store_takeadd($insert_data);

		$takeadd_data = array(
							'Qty' => $qty - $this->input->post('n_quantity'),
							'Time_Stamp' => date('Y-m-d H:i:s'),
							'Action_Flag' => 'U',
							'Last_User_Update' =>$username,
		);
		$this->update_model->store_take_update($id,$hosp,$takeadd_data);

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

		if(substr($docdetails,0,2) == 'PP' OR substr($docdetails,0,3) == 'B00'){
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

		redirect('contentcontroller/Store');

	}
	else
	{
		$this->index();
	}
	
	}
	
	elseif($act == 'add'){
	
		$insert_data = array(
	                         'ItemCode' => $id,
							 //'Store_Id'=>$this->session->userdata('hosp_code'),
							 'Store_Id'=>$hosp,
	                         'Time_Stamp' => date('Y-m-d H:i:s'),
	                         'Qty_Before' => $qty,
							 'Qty_Add' => $this->input->post('n_quantity'),
							 'Action_Flag' => 'I',
							 'Last_User_Update'=>$this->session->userdata('v_UserName'),
							 'Related_WO'=> $this->input->post('n_doc_det'),
							 'Remark' => $this->input->post('n_remark'),
							 'Price_Taken' => $p
		);
		$this->insert_model->store_takeadd($insert_data);

		$takeadd_data = array(
							'Qty' => $qty + $this->input->post('n_quantity'),
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
								'Price' => $this->input->post('n_unitprice'),
								//'Vendor_Code'
			);
		$this->insert_model->store_addprice($addprice_data);

		redirect('contentcontroller/Store');	
	}

	}//endconfirmation

}
?>