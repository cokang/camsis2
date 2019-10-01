<?php
class Upload_services extends CI_Model
{
function __construct()
{
parent::__construct();
}
function upload_sampledata_csv()
{

if(isset($_POST['submit'])){
$fp = fopen($_FILES['userfile']['tmp_name'],'r') or die("can't open file");
$semuaarry = array();

while(($line = fgetcsv($fp)) !== FALSE)
{


 //check whether there are duplicate rows of data in database
                $prevQuery = array(
                                    'A'=> $line[0] ,
                                    'B'=> $line[1] ,
                                    'C'=> $line[2] ,
                                    'D'=> $line[3] ,
                                    'E'=> $line[4] ,
                                    'F'=> $line[5] ,
                                    'G'=> $line[7] ,
                                    'H'=> $line[8] ,
                                    'I'=> $line[9] ,
                                    'J'=> $line[10] ,
                                    'K'=> $line[11] ,
                                    'L'=> $line[13] ,
                                    'M'=> $line[12] ,
                                    'N'=> $line[14] ,
                                    'O'=> $line[15] ,
                                    'P'=> $line[16] ,
                                    'Q'=> $line[17] ,
                                    'R'=> $line[18] ,
                                    'S'=> $line[19] ,
                                    'T'=> $line[20] ,
                                    'U'=> $line[6] ,
                                    'V'=> $line[21] ,
                                    'W'=> $line[22] ,
                                    'X'=> $line[28] ,
                                    'Y'=> $line[29] ,
                                    'Z'=> $line[30] ,
                                    'AA'=> $line[24] ,
                                    'AB'=> $line[27] ,
                                    'AC'=> $line[23] ,
                                    'AD'=> $line[26] ,
                                    'AE'=> $line[25] ,
                                    'AF'=> $line[31] ,
                                    'AG'=> $line[32] ,
                                    'AH'=> $line[33] ,
                                    'AI'=> $line[34] ,
                                    'AJ'=> $line[35] ,
                                    'AK'=> $line[36] ,
                                    'AL'=> $line[37] ,
                                    'AM'=> $line[38] ,

                                    );
                array_push($semuaarry,$prevQuery);
                //print_r($prevQuery);
  /*                                  'cust_name' => $line[2] ,
                                    'size' => $line[3] ,
                                    'colour' => $line[4],
                                    'process_description' => $line[5],
                                    'output' => $line[6],
                                    'material_part' => $line[7],
                                    'printingOutput' => $line[8]

                                    );

                $q=$this->db->select('sindi_productprocess_temp', $prevQuery)
                            ->where('articleno',$line[0],
                                    'product_description', $line[1] ,
                                    'cust_name' , $line[2] ,
                                    'size', $line[3] ,
                                    'colour' , $line[4],
                                    'process_description' , $line[5],
                                    'output', $line[6],
                                    'material_part', $line[7],
                                    'printingOutput', $line[8]);

                $prevResult = $this -> db->query($q);

                if($prevResult->num_rows > 0){
                    //update process data

                    $data = array(
                                'articleno' => $line[0] ,
                                    'product_description' => $line[1] ,
                                    'cust_name' => $line[2] ,
                                    'size' => $line[3] ,
                                    'colour' => $line[4],
                                    'process_description' => $line[5],
                                    'output' => $line[6],
                                    'material_part' => $line[7],
                                    'printingOutput' => $line[8]

                                );


                    $this->db->set
                    (
                                    'articleno',$line[0],
                                    'product_description', $line[1] ,
                                    'cust_name' , $line[2] ,
                                    'size', $line[3] ,
                                    'colour' , $line[4],
                                    'process_description' , $line[5],
                                    'output', $line[6],
                                    'material_part', $line[7],
                                    'printingOutput', $line[8]
                    );

                    $this->db-where
                    (
                                    'articleno',$line[0],
                                    'product_description', $line[1] ,
                                    'cust_name' , $line[2] ,
                                    'size', $line[3] ,
                                    'colour' , $line[4],
                                    'process_description' , $line[5],
                                    'output', $line[6],
                                    'material_part', $line[7],
                                    'printingOutput', $line[8]
                    );

                    $this->db->update('sindi_productprocess_temp');


                }else{
                for($i = 0, $j = count($line); $i < $j; $i++)
            {
                     $data = array(
                                    'articleno' => $line[0] ,
                                    'product_description' => $line[1] ,
                                    'cust_name' => $line[2] ,
                                    'size' => $line[3] ,
                                    'colour' => $line[4],
                                    'process_description' => $line[5],
                                    'output' => $line[6],
                                    'material_part' => $line[7],
                                    'printingOutput' => $line[8]

               );

            $data['crane_features']=$this->db->insert('sindi_productprocess_temp', $data);
                }
                 $i++;
            }*/
}
fclose($fp) or die("can't close file");

}
for ($x = 0; $x <= count($semuaarry)-1; $x++) {
	$messages1 = $semuaarry[$x];
  if ($messages1['A']=="BEMS") {
  $messages1['AN']= date('Y-m-d H:i:s');
  $biba = '';
  foreach ($messages1 as $k => $v) {
    if ($k == "A") {$biba = sprintf("%s='%s'", $k, str_replace("'","",$v));} else {
		$biba = $biba .",". sprintf("%s='%s'", $k, str_replace("'","",$v));}
  }
  //echo $biba,"<br>";
  //echo sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('closeddtasis', $messages1), $biba);
  $apola = sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('closeddtasis', $messages1), $biba);

  	//print_r($duplicate_data);
  	$this->load->model('update_model');
  	$this->update_model->updateOnDuplicatex('closeddtasis',$apola);
  }
  //print_r($messages1);
  /*
	array_push($messages1, date('Y-m-d H:i:s'));
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
echo sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('closeddtasis', $messages1), $biba);
$apola = sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('closeddtasis', $messages1), $biba);

	//print_r($duplicate_data);
	$this->load->model('update_model');
	$this->update_model->updateOnDuplicatex('closeddtasis',$apola);
    //echo "The number is: $messages1[a] <br>";
    */
}
return $semuaarry;
}


function upload_sampledata_csv2()
{

if(isset($_POST['submit'])){
$fp = fopen($_FILES['userfile']['tmp_name'],'r') or die("can't open file");
$semuaarry = array();

while(($line = fgetcsv($fp)) !== FALSE)
{

//if (!empty($playerlist)) {
 //check whether there are duplicate rows of data in database
 if (array_key_exists("1",$line)) {
                $prevQuery = array(
                                    'A'=> $line[0] ,
                                    'B'=> $line[1] ,
                                    'C'=> $line[2] ,
                                    'D'=> $line[3] ,
                                    'E'=> $line[4] ,
                                    'F'=> $line[5] ,
                                    'G'=> $line[6] ,
                                    'H'=> $line[7] ,
                                    'I'=> $line[8] ,
                                    'J'=> $line[9] ,
                                    'K'=> $line[10] ,
                                    'L'=> $line[11] ,
                                    'M'=> $line[12] ,
                                    'N'=> $line[13] ,
                                    'O'=> $line[14] ,
                                    'P'=> $line[15] ,
                                    'Q'=> $line[16] ,
                                    'R'=> $line[17] ,
                                    'S'=> $line[18] ,
                                    'T'=> $line[19] ,
                                    'U'=> $line[20] ,
                                    'V'=> $line[21] ,
                                    'W'=> $line[22] ,
                                    'X'=> $line[23] ,
                                    'Y'=> $line[24] ,
                                    'Z'=> $line[25] ,
                                    'AA'=> $line[26] ,
                                    'AB'=> $line[27] ,
                                    'AC'=> $line[28]

                                    );
                array_push($semuaarry,$prevQuery);
              }
}
fclose($fp) or die("can't close file");
//print_r($semuaarry);
//exit();

}
for ($x = 0; $x <= count($semuaarry)-1; $x++) {
	$messages1 = $semuaarry[$x];
  if (substr($messages1['A'], 0, 2)=="WO") {
  $messages1['AE']= date('Y-m-d H:i:s');
  $biba = '';
  foreach ($messages1 as $k => $v) {
    if ($k == "A") {$biba = sprintf("%s='%s'", $k, str_replace("'","",$v));} else {
		$biba = $biba .",". sprintf("%s='%s'", $k, str_replace("'","",$v));}
  }
  //echo $biba,"<br>";
  //echo sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('closeddtasis', $messages1), $biba);
  $apola = sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('asisbah', $messages1), $biba);

  	//print_r($duplicate_data);
  	$this->load->model('update_model');
  	$this->update_model->updateOnDuplicatex('asisbah',$apola);
  }
}
return $semuaarry;
}

function get_car_features_info()
{
$get_cardetails=$this->db->query("select * from sindi_productprocess_temp");
return $get_cardetails;
}
}
