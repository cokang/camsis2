<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload_asis extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('insert_model');
		$this->load->library('Excel');
	}

	function index()
	{
		$this->load->view('content_upload_asis');
	}

	function import_bems_service(){
		if(isset($_FILES["bems_service_request"]["name"])){
			$bems_service_request = $this->bems_exl_toArray();
		}
		$res = array("status"=>false, "msg"=>"Please check your excel file.", "row"=>0);
		if( !empty($bems_service_request['data_insert']) ){
			$res = $this->insert_model->insert_data("closeddtasis", "Request No#", $bems_service_request['data_insert']);
		}

		echo json_encode($res);
	}

	function bems_exl_toArray(){
		$bems_data = array();
		$i=0;

		$bems_path = $_FILES["bems_service_request"]["tmp_name"];
		$bems_object = PHPExcel_IOFactory::load($bems_path);

		$totalcolumn = count($bems_object->setActiveSheetIndex(0)->toArray()[0]);

		if( $totalcolumn==31 ){
			foreach($bems_object->getWorksheetIterator() as $worksheet){
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();

				for($row=2; $row<=$highestRow; $row++){
				// for($row=4; $row<=6; $row++){
					$column_one 	= $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$column_datetime= str_replace("'", "", $worksheet->getCellByColumnAndRow(2, $row)->getValue());

					if( $column_one!="" ){
						$bems_data[$i]['Service']		= $worksheet->getCellByColumnAndRow(0, $row)->getValue();
						$bems_data[$i]['Request No#']	= $column_one;
						$bems_data[$i]['Date/Time']		= $column_datetime;
						$bems_data[$i]['Ageing Days']	= $worksheet->getCellByColumnAndRow(3, $row)->getValue();
						$bems_data[$i]['Required Date/Time']= str_replace("'", "", $worksheet->getCellByColumnAndRow(4, $row)->getValue());
						$bems_data[$i]['Requestor Name']= $worksheet->getCellByColumnAndRow(5, $row)->getValue();
						$bems_data[$i]['Asset No#']= $worksheet->getCellByColumnAndRow(6, $row)->getValue();
						$bems_data[$i]['Asset Description']= $worksheet->getCellByColumnAndRow(7, $row)->getValue();
						$bems_data[$i]['Contact No#']= $worksheet->getCellByColumnAndRow(8, $row)->getValue();
						$bems_data[$i]['User Location Code (Location of Request)']= $worksheet->getCellByColumnAndRow(9, $row)->getValue();
						$bems_data[$i]['User Location Name (Location of Request)']= $worksheet->getCellByColumnAndRow(10, $row)->getValue();
						$bems_data[$i]['User Area Code']= $worksheet->getCellByColumnAndRow(11, $row)->getValue();
						$bems_data[$i]['User Area Name']= $worksheet->getCellByColumnAndRow(12, $row)->getValue();
						$bems_data[$i]['Priority']= $worksheet->getCellByColumnAndRow(13, $row)->getValue();
						$bems_data[$i]['Status']= $worksheet->getCellByColumnAndRow(14, $row)->getValue();
						$bems_data[$i]['Details']= str_replace("'", "", $worksheet->getCellByColumnAndRow(15, $row)->getValue());
						$bems_data[$i]['User Location Code (Location of Requestor)']= $worksheet->getCellByColumnAndRow(16, $row)->getValue();
						$bems_data[$i]['User Location Name (Location of Requestor)']= $worksheet->getCellByColumnAndRow(17, $row)->getValue();
						$bems_data[$i]['Request Type']= $worksheet->getCellByColumnAndRow(18, $row)->getValue();
						$bems_data[$i]['Declaration of Decontamination']= $worksheet->getCellByColumnAndRow(19, $row)->getValue();
						$bems_data[$i]['NCR No#']= $worksheet->getCellByColumnAndRow(20, $row)->getValue();
						$bems_data[$i]['Government Asset No#']= $worksheet->getCellByColumnAndRow(21, $row)->getValue();
						$bems_data[$i]['Government Asset Description']= $worksheet->getCellByColumnAndRow(22, $row)->getValue();
						$bems_data[$i]['Technical Support Reference No']= $worksheet->getCellByColumnAndRow(23, $row)->getValue();
						$bems_data[$i]['Response Date/Time']= str_replace("'", "", $worksheet->getCellByColumnAndRow(24, $row)->getValue());
						$bems_data[$i]['Completed By']= $worksheet->getCellByColumnAndRow(25, $row)->getValue();
						$bems_data[$i]['Completed Date/Time']= str_replace("'", "", $worksheet->getCellByColumnAndRow(26, $row)->getValue());
						$bems_data[$i]['Verified By']= $worksheet->getCellByColumnAndRow(27, $row)->getValue();
						$bems_data[$i]['Verified Date/Time']= str_replace("'", "", $worksheet->getCellByColumnAndRow(28, $row)->getValue());
						$bems_data[$i]['Response Finding']= str_replace("'", "", $worksheet->getCellByColumnAndRow(29, $row)->getValue());
						$bems_data[$i]['Action Taken']= $worksheet->getCellByColumnAndRow(30, $row)->getValue();
						$bems_data[$i]['d_timestamp']= date('Y-m-d H:i:s');
						$bems_data[$i]['siapa_buat']= $this->session->userdata("v_UserName");
		
						$i++;
					}

				}
			}
		}
		
		$data_update = array();
		
		return array("data_insert"=>$bems_data, "data_update"=>$data_update, "total_row"=>$i);
	}
	
	function import_service_WO(){
		if(isset($_FILES["service_WO"]["name"])){
			$service_WO = $this->service_wo_exl_toArray();
		}
		$res = array("status"=>false, "msg"=>"Please check your excel file.", "row"=>0);
		if( !empty($service_WO['data_insert']) ){
			$res = $this->insert_model->insert_data("asisbah", "Service Work No#", $service_WO['data_insert']);
		}

		echo json_encode($res);
	}

	function service_wo_exl_toArray(){
		$data = array();
		$i=0;

		$service_wo_path = $_FILES["service_WO"]["tmp_name"];
		$service_wo_object = PHPExcel_IOFactory::load($service_wo_path);

		$totalcolumn = count($service_wo_object->setActiveSheetIndex(0)->toArray()[0]);
		
		if( $totalcolumn==30 ){
			foreach($service_wo_object->getWorksheetIterator() as $worksheet){
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();

				for($row=2; $row<=$highestRow; $row++){
				// for($row=213; $row<=215; $row++){
					if( $worksheet->getCellByColumnAndRow(0, $row)->getValue()!="" ){
						$data[$i]['Service Work No#']		= $worksheet->getCellByColumnAndRow(0, $row)->getValue();
						$data[$i]['Service Work Category']	= $worksheet->getCellByColumnAndRow(1, $row)->getValue();
						$data[$i]['Type']					= $worksheet->getCellByColumnAndRow(2, $row)->getValue();
						$data[$i]['Service Request No#']	= $worksheet->getCellByColumnAndRow(3, $row)->getValue();
						$data[$i]['Service Work Date/Time']	= str_replace("'", "", $worksheet->getCellByColumnAndRow(4, $row)->getValue());
						$data[$i]['Requestor']				= $worksheet->getCellByColumnAndRow(5, $row)->getValue();
						$data[$i]['Designation (Requestor)']= $worksheet->getCellByColumnAndRow(6, $row)->getValue();
						$data[$i]['Contact No#']			= $worksheet->getCellByColumnAndRow(7, $row)->getValue();
						$data[$i]['Asset No#']				= $worksheet->getCellByColumnAndRow(8, $row)->getValue();
						$data[$i]['Asset Type Code Description']= $worksheet->getCellByColumnAndRow(9, $row)->getValue();
						$data[$i]['Asset Work Group']		= $worksheet->getCellByColumnAndRow(10, $row)->getValue();
						$data[$i]['Under Warranty']			= $worksheet->getCellByColumnAndRow(11, $row)->getValue();
						$data[$i]['Supplier Name']			= $worksheet->getCellByColumnAndRow(12, $row)->getValue();
						$data[$i]['Supplier Contact No#']	= $worksheet->getCellByColumnAndRow(13, $row)->getValue();
						$data[$i]['Asset Process Status']	= $worksheet->getCellByColumnAndRow(14, $row)->getValue();
						$data[$i]['Contract Status']		= $worksheet->getCellByColumnAndRow(15, $row)->getValue();
						$data[$i]['Variation Status']		= $worksheet->getCellByColumnAndRow(16, $row)->getValue();
						$data[$i]['Variation Month']		= $worksheet->getCellByColumnAndRow(17, $row)->getValue();
						$data[$i]['Variation Year']			= $worksheet->getCellByColumnAndRow(18, $row)->getValue();
						$data[$i]['User Department Name']	= $worksheet->getCellByColumnAndRow(19, $row)->getValue();
						$data[$i]['User Location Name']		= str_replace("'", "", $worksheet->getCellByColumnAndRow(20, $row)->getValue());
						$data[$i]['Request Details']		= $worksheet->getCellByColumnAndRow(21, $row)->getValue();
						$data[$i]['Received By']			= $worksheet->getCellByColumnAndRow(22, $row)->getValue();
						$data[$i]['Received Date']			= str_replace("'", "", $worksheet->getCellByColumnAndRow(23, $row)->getValue());
						$data[$i]['Target Date']			= str_replace("'", "", $worksheet->getCellByColumnAndRow(24, $row)->getValue());
						$data[$i]['Target Week']			= $worksheet->getCellByColumnAndRow(25, $row)->getValue();
						$data[$i]['Priority']				= $worksheet->getCellByColumnAndRow(26, $row)->getValue();
						$data[$i]['Remarks']				= $worksheet->getCellByColumnAndRow(27, $row)->getValue();
						$data[$i]['Contract Out Register']	= $worksheet->getCellByColumnAndRow(28, $row)->getValue();
						$data[$i]['Services Work Status']	= $worksheet->getCellByColumnAndRow(29, $row)->getValue();
						$data[$i]['d_timestamp']			= date('Y-m-d H:i:s');
						$data[$i]['siapa_buat']				= $this->session->userdata("v_UserName");
					
						$i++;
					}

				}
			}
		}

		return array("data_insert"=>$data, "total_row"=>$i);
	}

	function import_equipment(){
		if(isset($_FILES["equipment"]["name"])){
			$equipment = $this->equipment_exl_toArray();
		}
		$res = array("status"=>false, "msg"=>"Please check your excel file.", "row"=>0);
		if( !empty($equipment['data_insert']) ){
			$res = $this->insert_model->insert_data("asisassetbah", "assetno", $equipment['data_insert']);
		}

		echo json_encode($res);
	}

	function equipment_exl_toArray(){
		$data = array();
		$i=0;

		$equipment_path = $_FILES["equipment"]["tmp_name"];
		$equipment_object = PHPExcel_IOFactory::load($equipment_path);

		// column 76
		$totalcolumn = count($equipment_object->setActiveSheetIndex(0)->toArray()[0]);

		if( $totalcolumn==76 ){
			foreach($equipment_object->getWorksheetIterator() as $worksheet){
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				$totalcolumn = PHPExcel_Cell::columnIndexFromString($highestColumn);

				for($row=2; $row<=$highestRow; $row++){
					if( $worksheet->getCellByColumnAndRow(0, $row)->getValue()!="" ){
						$data[$i]['assetno']					= $worksheet->getCellByColumnAndRow(0, $row)->getValue();
						$data[$i]['asetnoold']					= $worksheet->getCellByColumnAndRow(1, $row)->getValue();
						$data[$i]['Typecode']					= $worksheet->getCellByColumnAndRow(2, $row)->getValue();
						$data[$i]['typedesc']					= $worksheet->getCellByColumnAndRow(3, $row)->getValue();
						$data[$i]['assetclass']					= $worksheet->getCellByColumnAndRow(4, $row)->getValue();
						$data[$i]['govassetno']					= $worksheet->getCellByColumnAndRow(5, $row)->getValue();
						$data[$i]['assetdesc']					= $worksheet->getCellByColumnAndRow(6, $row)->getValue();
						$data[$i]['service']					= $worksheet->getCellByColumnAndRow(7, $row)->getValue();
						$data[$i]['workgrp']					= $worksheet->getCellByColumnAndRow(8, $row)->getValue();
						$data[$i]['commisiondt']				= $worksheet->getCellByColumnAndRow(9, $row)->getValue();
						$data[$i]['techsupport']				= $worksheet->getCellByColumnAndRow(10, $row)->getValue();
						$data[$i]['effectdt']					= $worksheet->getCellByColumnAndRow(11, $row)->getValue();
						$data[$i]['lifespan']					= $worksheet->getCellByColumnAndRow(12, $row)->getValue();
						$data[$i]['status']						= $worksheet->getCellByColumnAndRow(13, $row)->getValue();
						$data[$i]['Assetage']					= $worksheet->getCellByColumnAndRow(14, $row)->getValue();
						$data[$i]['yrinserv']					= $worksheet->getCellByColumnAndRow(15, $row)->getValue();
						$data[$i]['realtimestatus']				= $worksheet->getCellByColumnAndRow(16, $row)->getValue();
						$data[$i]['userloccd']					= $worksheet->getCellByColumnAndRow(17, $row)->getValue();
						$data[$i]['userlocnm']					= $worksheet->getCellByColumnAndRow(18, $row)->getValue();
						$data[$i]['userareacd']					= $worksheet->getCellByColumnAndRow(19, $row)->getValue();
						$data[$i]['userareanm']					= $worksheet->getCellByColumnAndRow(20, $row)->getValue();
						$data[$i]['userdeptname']				= $worksheet->getCellByColumnAndRow(21, $row)->getValue();
						$data[$i]['myspatacode']				= $worksheet->getCellByColumnAndRow(22, $row)->getValue();
						$data[$i]['myspatadesc']				= $worksheet->getCellByColumnAndRow(23, $row)->getValue();
						$data[$i]['manufacturer']				= $worksheet->getCellByColumnAndRow(24, $row)->getValue();
						$data[$i]['Target Week']				= $worksheet->getCellByColumnAndRow(25, $row)->getValue();
						$data[$i]['make']						= $worksheet->getCellByColumnAndRow(26, $row)->getValue();
						$data[$i]['brand']						= $worksheet->getCellByColumnAndRow(27, $row)->getValue();
						$data[$i]['model']						= $worksheet->getCellByColumnAndRow(28, $row)->getValue();
						$data[$i]['regno']						= $worksheet->getCellByColumnAndRow(29, $row)->getValue();
						$data[$i]['chasisno']					= $worksheet->getCellByColumnAndRow(30, $row)->getValue();
						$data[$i]['engno']						= $worksheet->getCellByColumnAndRow(31, $row)->getValue();
						$data[$i]['fueltype']					= $worksheet->getCellByColumnAndRow(32, $row)->getValue();
						$data[$i]['meterread']					= $worksheet->getCellByColumnAndRow(33, $row)->getValue();
						$data[$i]['spec']						= $worksheet->getCellByColumnAndRow(34, $row)->getValue();
						$data[$i]['serialno']					= $worksheet->getCellByColumnAndRow(35, $row)->getValue();
						$data[$i]['manudt']						= $worksheet->getCellByColumnAndRow(36, $row)->getValue();
						$data[$i]['powerspecunit']				= $worksheet->getCellByColumnAndRow(37, $row)->getValue();
						$data[$i]['powerspecunitwat']			= $worksheet->getCellByColumnAndRow(38, $row)->getValue();
						$data[$i]['PPM']						= $worksheet->getCellByColumnAndRow(39, $row)->getValue();
						$data[$i]['routineinspec']				= $worksheet->getCellByColumnAndRow(40, $row)->getValue();
						$data[$i]['calibrate']					= $worksheet->getCellByColumnAndRow(41, $row)->getValue();
						$data[$i]['servicestartdt']				= $worksheet->getCellByColumnAndRow(42, $row)->getValue();
						$data[$i]['maintencat']					= $worksheet->getCellByColumnAndRow(43, $row)->getValue();
						$data[$i]['maintenwo']					= $worksheet->getCellByColumnAndRow(44, $row)->getValue();
						$data[$i]['servicewo']					= $worksheet->getCellByColumnAndRow(45, $row)->getValue();
						$data[$i]['maintenwodt']				= $worksheet->getCellByColumnAndRow(46, $row)->getValue();
						$data[$i]['servicewodt']				= $worksheet->getCellByColumnAndRow(47, $row)->getValue();
						$data[$i]['cost']						= $worksheet->getCellByColumnAndRow(48, $row)->getValue();
						$data[$i]['purchasecat']				= $worksheet->getCellByColumnAndRow(49, $row)->getValue();
						$data[$i]['purchasedt']					= $worksheet->getCellByColumnAndRow(50, $row)->getValue();
						$data[$i]['warrantyduration']			= $worksheet->getCellByColumnAndRow(51, $row)->getValue();
						$data[$i]['warrantstartdt']				= $worksheet->getCellByColumnAndRow(52, $row)->getValue();
						$data[$i]['warrantenddt']				= $worksheet->getCellByColumnAndRow(53, $row)->getValue();
						$data[$i]['underwarrant']				= $worksheet->getCellByColumnAndRow(54, $row)->getValue();
						$data[$i]['pojektype']					= $worksheet->getCellByColumnAndRow(55, $row)->getValue();
						$data[$i]['pojekno']					= $worksheet->getCellByColumnAndRow(56, $row)->getValue();
						$data[$i]['pojekcost']					= $worksheet->getCellByColumnAndRow(57, $row)->getValue();
						$data[$i]['lpono']						= $worksheet->getCellByColumnAndRow(58, $row)->getValue();
						$data[$i]['mdaclasscat']				= $worksheet->getCellByColumnAndRow(59, $row)->getValue();
						$data[$i]['mdaregno']					= $worksheet->getCellByColumnAndRow(60, $row)->getValue();
						$data[$i]['larregno']					= $worksheet->getCellByColumnAndRow(61, $row)->getValue();
						$data[$i]['contractlpono']				= $worksheet->getCellByColumnAndRow(62, $row)->getValue();
						$data[$i]['disposalapprdt']				= $worksheet->getCellByColumnAndRow(63, $row)->getValue();
						$data[$i]['disposaldt']					= $worksheet->getCellByColumnAndRow(64, $row)->getValue();
						$data[$i]['disposalby']					= $worksheet->getCellByColumnAndRow(65, $row)->getValue();
						$data[$i]['disposmethod']				= $worksheet->getCellByColumnAndRow(66, $row)->getValue();
						$data[$i]['autorizationstat']			= $worksheet->getCellByColumnAndRow(67, $row)->getValue();
						$data[$i]['variationstat']				= $worksheet->getCellByColumnAndRow(68, $row)->getValue();
						$data[$i]['variationapprstat']			= $worksheet->getCellByColumnAndRow(69, $row)->getValue();
						$data[$i]['d_timestamp']				= date('Y-m-d H:i:s');
					
						$i++;
					}

				}

			}
		}

		$data_update = array();
		
		return array("data_insert"=>$data, "data_update"=>$data_update, "total_row"=>$i);
	}
}

?>