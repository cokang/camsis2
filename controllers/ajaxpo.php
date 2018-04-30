<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ajaxpo extends CI_Controller {
	public function index(){
	
	//$pono =  $_POST['poape'];
	//$pono = $this->input->get('poape');
	$pono = "";
	$pilihape = "";
	$pono = $_POST["poape"];
  //$pilihape =  $_POST['nilaidier'];
	//$pilihape = $this->input->get('nilaidier');
	$pilihape = $_POST["nilaidier"];
	//print_r($_POST);
  //echo "nilai pono : ".$pono." nilai x pono : ".$pilihape;
	//exit();
	if ($pilihape == "3") { 
	$status = array(
	"Statusc"=>$pilihape,
	"Date_Completed"=>NULL,
	"User_Closedc"=>$this->session->userdata('v_UserName'));} else {
	$status = array(
	"Statusc"=>$pilihape,
	"User_Closedc"=>$this->session->userdata('v_UserName'));}
	$this->load->model('update_model');
  $data['record'] = $this->update_model->updatepomain($status,$pono,'1');
	 

	
	
	}
	
}
?>