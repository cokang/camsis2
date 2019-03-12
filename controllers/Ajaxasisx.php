<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
set_time_limit(0);
class Ajaxasisx extends CI_Controller {
	public function index(){
		$boh = array();
		$file = fopen("C:\inetpub\wwwroot\FEMSHospital_v32\application\controllers\BEMS_Service_Request_09_Mar_2018.csv","r");
		while(! feof($file))
			{
			//print_r(fgetcsv($file));
			array_push($boh,fgetcsv($file));
			}
fclose($file);
echo "nilai boh : ".count($boh);
print_r($boh);
exit();
		//$this->readExcel();
		//$this->readExcel2();
		//exit();
		/*
		$this->load->model('update_model');
    $insert_data = array(
			'A' => 'WO/BEMS/MLK001/1711/000219',
			'B' => 'Unscheduled',
			'C' => 'Corrective Maintenance',
			'D' => 'SR/MLK001/20171122/B010342',
			'E' => '22-Nov-2017 09:31',
			'F' => 'Mohd Naqib Bin Johari',
			'G' => 'Hospital Asst. Engineer',
			'H' => '0172586772',
			'I' => 'MKA1146134',
			'J' => 'Dialyzer Reprocessing Units',
			'K' => 'W2',
			'L' => 'No',
			'M' => '',
			'N' => '',
			'O' => '',
			'P' => '',
			'Q' => '',
			'R' => '',
			'S' => '',
			'T' => 'Haemodialysis',
			'U' => 'UNIT HAEMODIALYSIS',
			'V' => 'Dialyzer Reprocessing Units MKA1146134 rosak. MA Sabri HDU',
			'W' => 'Mohammad Hidhir Bin Atip',
			'X' => '22-Nov-2017',
			'Y' => '',
			'Z' => '',
			'AA' => 'Normal',
			'AB' => '',
			'AC' => 'No',
			'AD' => 'Completed',
			'AE' => '2019-01-30 16:39:02');
    //$this->get_model->ins_testdup($insert_data,TRUE);
    $this->update_model->updateOnDuplicate('asisbah',$insert_data);
		*/
echo "abisss";
//exit();
//$messages = $_POST['info'];
$messages = json_decode($_POST['info']);
echo("nanananan : ".$messages[0][0].":".$messages[1][0].":".$messages[2][0]);
//print_r($messages);
echo("nilai kire: ".count($messages));
$duplicate_data = array();
for ($x = 0; $x <= count($messages)-1; $x++) {
	$messages1 = $messages[$x];
	array_push($messages1, date('Y-m-d H:i:s'));
	//$messages1['30'] = date('Y-m-d H:i:s');
	$kunci = 'A';
	$arrayNum = count($messages1);
	$biba = '';
	for( $i = 0 ; $i < $arrayNum ; $i++ )
	{
    $fee_id_value = $messages1[$i];
    unset($messages1[$i]);
    $messages1[$kunci] = $fee_id_value;
		if ($i == 0) {$biba = sprintf("%s='%s'", $kunci, $fee_id_value);} else {
		$biba = $biba .",". sprintf("%s='%s'", $kunci, $fee_id_value);}
		$kunci++;
	}
	//echo $biba;
	//echo $this->db->insert_string('asisbah', $messages1);
	//echo $duplicate_data;
echo sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('asisbah', $messages1), $biba);
$apola = sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('asisbah', $messages1), $biba);

	//print_r($duplicate_data);
	$this->load->model('update_model');
	$this->update_model->updateOnDuplicatex('asisbah',$apola);
    //echo "The number is: $messages1[a] <br>";
}
//$messages1 = $messages[0];
//print_r($messages1);
//foreach ($messages as $value) {
//	print_r($value);
//}
//foreach($messages as $msg){
//    echo $msg;
//}

		}
		function readExcel2()
		{
			$boh = array();
			$file = fopen("C:\inetpub\wwwroot\FEMSHospital_v32\application\controllers\BEMS_Service_Request_09_Mar_2018.csv","r");
			while(! feof($file))
			  {
			  print_r(fgetcsv($file));
				array_push($boh,fgetcsv($file));
			  }
	fclose($file);
	echo "nilai boh : ".count($boh);
		}
		function readExcel()
		{
        $this->load->library('csvreader');
        $result =   $this->csvreader->parse_file('C:\inetpub\wwwroot\FEMSHospital_v32\application\controllers\BEMS_Service_Request_09_Mar_2018.csv');

        $data['csvData'] =  $result;
				echo "nilai : ".count($data['csvData']);
				print_r($data['csvData']);
				exit();
				$this->load->model('update_model');
				foreach ($data['csvData'] as $value) {
					//$this->load->model('update_model');
			    //$this->get_model->ins_testdup($insert_data,TRUE);
			    $this->update_model->updateOnDuplicate('closeddtasis',$value);
				}
				//$this->load->model('update_model');
		    //$this->get_model->ins_testdup($insert_data,TRUE);
		    //$this->update_model->updateOnDuplicate('asisbah',$data['csvData']);

        //$this->load->view('view_csv', $data);
			}
}
?>
