<?php
class Scheduler extends CI_Controller{

function test_schdule2(){

	$this->load->model('insert_model');
	$insert_data=array('testid' => $this->input->get('q'));
	$this->insert_model->test($insert_data);
	//exit();
}

}
?>