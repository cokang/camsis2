<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajaxjson extends CI_Controller {
	public function index(){
	
	$itemape = $_GET['itemape'];
	//echo "nilai item : " . $itemape; 
	$this->load->model('display_model');
	$data['record'] = $this->display_model->stock_assetbyitem($itemape);
	
	//print_r($data['record']);
	
	//echo "nilainyer : " . $data['record'][0]->Hosp_code . $data['record'][0]->Qty . $data['record'][0]->ItemCode . $data['record'][0]->ItemName . $data['record'][0]->Price;
	
	//[Hosp_code] => IIUM
  //          [Qty] => 10
  //          [ItemCode] => BES-00042
  //          [ItemName] => Bulb, Gold Series Laryngoscope
  //          [Price] => 20
	
	header( "Content-type: application/json" );

  $jsonAnswer = array('Hosp_code' => $data['record'][0]->Hosp_code, 
											'Qty' => $data['record'][0]->Qty, 
											'ItemCode' => $data['record'][0]->ItemCode, 
											'ItemName' => $data['record'][0]->ItemName, 
											'Price' => $data['record'][0]->Price);
  echo json_encode($jsonAnswer);
	
	/*
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
	*/
	 

	
	
	}
	
}
?>