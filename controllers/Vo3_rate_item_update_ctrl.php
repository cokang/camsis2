<?php
class Vo3_rate_item_update_ctrl extends CI_Controller{
	
	public function index(){
		
	// load libraries for URL and form processing
    $this->load->helper(array('form', 'url'));
    // load library for form validation
    $this->load->library('form_validation');
	
	//validation rule
	$this->form_validation->set_rules('n_category_code','Asset Category Code','trim|required');
	$this->form_validation->set_rules('n_category_desc','Asset Category Desc','trim|required');
	$this->form_validation->set_rules('n_type_code','Asset Type Code','trim|required');
	$this->form_validation->set_rules('n_type_desc','Asset Type Desc','trim|required');
	$this->form_validation->set_rules('n_status','Status','trim|required');
	$this->form_validation->set_rules('n_definition','Defition','trim');
	$this->form_validation->set_rules('n_DWRate','DW Rate','trim');
	$this->form_validation->set_rules('n_DWRate2','DW Rate2','trim');
	$this->form_validation->set_rules('n_PWRate','PW Rate','trim');
	
	if($this->form_validation->run()==FALSE)
		{
		$data['ratesid'] = $this->input->post('ratesid');
		$this->load->model('display_model');
		$data['record'] = $this->display_model->assetrates($data['ratesid']);
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vo3_rate_item_update",$data);
		}
		
		else
		{
		$this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("content_vo3_rate_item_confirm");
		}

	}

	function comfirmation(){

	if ($this->input->post('n_DWRate2')<>'') {
		$n_DWRate = $this->input->post('n_DWRate2');
	}
	if ($this->input->post('n_DWRate')=='*'){
		$n_DWRate = 999.00;
	}
	
	if ($this->input->post('n_PWRate')==''){
		$n_PWRate = 0.00;
	}
	else{
		$n_PWRate = number_format($this->input->post('n_PWRate'),2);
	}
	$Rid = $this->input->post('ratesid');
	$this->load->model('update_model');
	$insert_data = array(
	
						 'AssetCategoryCode' => $this->input->post('n_category_code'),
						 'AssetCategoryDesc' => $this->input->post('n_category_desc'),
						 'AssetTypeCode'=>$this->input->post('n_type_code'),
						 'AssetTypeDesc' => $this->input->post('n_type_desc'),
						 'Status' => $this->input->post('n_status'),
						 'AssetTypeDefinition' => $this->input->post('n_definition'),
						 'DWRate' => $n_DWRate,
						 'PWRate'=>$n_PWRate,
						 'actionflag'=>'U',
						 'datetimestamp' => date('Y-m-d H:i:s')
						);
	
	$this->update_model->vo3_rate_item_update($insert_data,$Rid);
	redirect('contentcontroller/vo3_type_code?&ratesid='.$Rid);	
	}

}
?>