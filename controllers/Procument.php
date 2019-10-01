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
	
