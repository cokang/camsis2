<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ajaxstore extends CI_Controller {
	public function index(){
	
	
  //echo "nilai pono : ".$pono." nilai x pono : ".$pilihape;
	//exit();
	$id = $_POST["itemcd"];
	$qty = $_POST["sQtyb"];
	$qtyt = $_POST["sQtyt"];
	$wono = $_POST["wo"];
	$mirn = $_POST["mirncd"];
	$hosp = $this->session->userdata('hosp_code');
	$username = $this->session->userdata('v_UserName');
	//echo "nilai pono : ".$id." nilai x pono : ".$mirn;
	//exit();
	
	$this->load->model('display_model');
	$pricea = $this->display_model->stock_passet($id,$hosp);
	$p = $pricea[0]->Price;
	//print_r($pricea);
	//echo "nilai pono : ".$id." nilai x pono : ".$mirn. "price".$pricea[0]->Price;
	//exit();
	
	$this->load->model('insert_model');
	$this->load->model('update_model');
	
	$insert_data = array(
	             'ItemCode' => $id,
							 //'Store_Id'=>$this->session->userdata('hosp_code'),
							 'Store_Id'=>$hosp,
	             'Time_Stamp' => date('Y-m-d H:i:s'),
	             'Qty_Before' => $qty,
							 'Qty_Taken' => $qtyt,
							 'Action_Flag' => 'I',
							 'Last_User_Update'=>$username,
							 'Related_WO'=> $wono,
							 'Remark' => $wono,
							 'Price_Taken' => $p
		);
		$this->insert_model->store_takeadd($insert_data);

		$takeadd_data = array(
							'Qty' => $qty - $qtyt,
							'Time_Stamp' => date('Y-m-d H:i:s'),
							'Action_Flag' => 'U',
							'Last_User_Update' =>$username,
		);
		$this->update_model->store_take_update($id,$hosp,$takeadd_data);
		
		$takeadd_data2 = array(
							'who_del' => 'store',
							'unit_cost' => $p
		);
		$this->update_model->store_take_updatemirncomp($id,$mirn,$takeadd_data2);
		
		$adekex = $this->display_model->itemdet($mirn);
		
		print_r($adekex);
		
		echo "dh nk masuk";
		
		if (!($adekex)) {
		echo "xder data";
		} else {
		echo "ade data";
		}
		//exit();
		if (!($adekex)) {
		 echo "sekali dier masuk la";
			 $takeadd_data3 = array(
							'ApprStatusIDx' => '129',
							'ApprStatusIDxx' => '129',
							'ApprCommentsx' => 'Item taken from '. $hosp .' store'
						);
			$this->update_model->store_take_updatematerialreq($mirn,$takeadd_data3);
		
		}
		//exit();
/*
		$pricetotal = $p * $qty;
		$docdetails = $wono;

		$update_job = array(
							'v_PartName' => $n,
							//'n_PartRM' => $p,
							//'n_PartAmount' => $qty,
							//'n_PartTotal' => $pricetotal,
							'd_Timestamp' => date('Y-m-d H:i:s'),
							'v_Actionflag' => 'U'
		);
		$this->update_model->store_takevisit_update($docdetails,$hosp,$update_job);

		if(substr($docdetails,0,2) == 'PP' OR substr($docdetails,0,3) == 'B00'){
			$update_ppm = array(
							 	'd_Timestamp' => date('Y-m-d H:i:s')
		);
		$this->update_model->store_takeppm_update($docdetails,$hosp,$update_ppm);
		 
*/	

		}
}
?>