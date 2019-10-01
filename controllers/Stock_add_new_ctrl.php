<?php

class Stock_add_new_ctrl extends CI_Controller{

	function index(){

    // load libraries for URL and form processing
    $this->load->helper(array('form', 'url'));
    // load library for form validation
    $this->load->library('form_validation');

        //validation rule
	$this->form_validation->set_rules('n_itemcode','Item Code','trim');
	$this->form_validation->set_rules('n_itemname','Item Name','trim');
	$this->form_validation->set_rules('n_qty','Quantity','trim');
	$this->form_validation->set_rules('n_itemprice','Item Price','trim');
	//$this->form_validation->set_rules('hosp','Store Code','trim');
//echo "pakpak".$this->input->post('hosp');
//exit();
if($this->form_validation->run()==FALSE)
		{
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_store_item_new");
		}

		else
		{
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_store_item_confirm");
		}
	}
	function confirmation(){
		$itemcode = $this->input->post('n_itemcode');
		$hosp = $this->input->post('hosp');

		$this->load->model('insert_model');
		$wrk_ord_test = $this->insert_model->stock_itemexist('ItemCode',$itemcode,'Hosp_code',$hosp);

	redirect('contentcontroller/Store?id='.$hosp);


	}

}
?>
