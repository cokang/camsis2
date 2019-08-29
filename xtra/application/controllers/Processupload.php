<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Processupload extends CI_Controller {
	public function index(){
		$this->load->model('upload_services');
$data['result']=$this->upload_services->upload_sampledata_csv();
//$data['query']=$this-> upload_services->get_car_features_info();
$this->load->view('Upload_csv',$data);
	}
}
