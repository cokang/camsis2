<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
set_time_limit(0);
class Ajaxasismain extends CI_Controller {
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
//$this->load->model('upload_services');
//$data['result']=$this->upload_services->upload_sampledata_csv();
//$data['query']=$this-> upload_services->get_car_features_info();
//$this->load->view(' Upload_csv ',$data);
}

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
