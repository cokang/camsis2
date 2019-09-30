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


function upload_sampledata_csv3()
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
                                    'AC'=> $line[23] ,
                                    'AD'=> $line[26] ,
                                    'AE'=> $line[25] ,
                                    'AF'=> $line[31]

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
  //if (substr($messages1['A'], 0, 2)=="WO") {
  if ($messages1['G']=="BEMS") {
  //$messages1['B']= date('Y-m-d H:i:s');
  $messages1['AG']= date('Y-m-d H:i:s');
  $biba = '';
  foreach ($messages1 as $k => $v) {
    if ($k == "A") {$biba = sprintf("%s='%s'", $k, str_replace("'","",$v));} else {
		$biba = $biba .",". sprintf("%s='%s'", $k, str_replace("'","",$v));}
  }
  //echo $biba,"<br>";
  //echo sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('closeddtasis', $messages1), $biba);
  $apola = sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('berdata', $messages1), $biba);

  	//print_r($duplicate_data);
  	$this->load->model('update_model');
  	$this->update_model->updateOnDuplicatex('berdata',$apola);
  }
}
return $semuaarry;
}


function upload_sampledata_csv4()
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
                                    'AC'=> $line[23] ,
                                    'AD'=> $line[26] ,
                                    'AE'=> $line[25] ,
                                    'AF'=> $line[31],
                                    'AG'=> $line[32] ,
                                    'AH'=> $line[33] ,
                                    'AI'=> $line[34] ,
                                    'AJ'=> $line[35] ,
                                    'AK'=> $line[36] ,
                                    'AL'=> $line[37] ,
                                    'AM'=> $line[38] ,
                                    'AN'=> $line[39] ,
                                    'AO'=> $line[40] ,
                                    'AP'=> $line[41] ,
                                    'AQ'=> $line[42] ,
                                    'AR'=> $line[43] ,
                                    'ASx'=> $line[44] ,
                                    'ATx'=> $line[45] ,
                                    'AU'=> $line[46] ,
                                    'AV'=> $line[47] ,
                                    'AW'=> $line[48] ,
                                    'AX'=> $line[49] ,
                                    'AY'=> $line[50] ,
                                    'AZ'=> $line[51] ,
                                    'BA'=> $line[52]

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
  if (substr($messages1['A'], 0, 2)=="SW") {
  //if ($messages1['G']=="BEMS") {
  //$messages1['B']= date('Y-m-d H:i:s');
  $messages1['BB']= date('Y-m-d H:i:s');
  $biba = '';
  foreach ($messages1 as $k => $v) {
    if ($k == "A") {$biba = sprintf("%s='%s'", $k, str_replace("'","",$v));} else {
		$biba = $biba .",". sprintf("%s='%s'", $k, str_replace("'","",$v));}
  }
  //echo $biba,"<br>";
  //echo sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('closeddtasis', $messages1), $biba);
  $apola = sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('berdataschwo', $messages1), $biba);

  	//print_r($duplicate_data);
  	$this->load->model('update_model');
  	$this->update_model->updateOnDuplicatex('berdataschwo',$apola);
  }
}
return $semuaarry;
}

function upload_sampledata_csv5()
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
                                    'AC'=> $line[23] ,
                                    'AD'=> $line[26] ,
                                    'AE'=> $line[25] ,
                                    'AF'=> $line[31],
                                    'AG'=> $line[32] ,
                                    'AH'=> $line[33] ,
                                    'AI'=> $line[34] ,
                                    'AJ'=> $line[35] ,
                                    'AK'=> $line[36] ,
                                    'AL'=> $line[37] ,
                                    'AM'=> $line[38] ,
                                    'AN'=> $line[39] ,
                                    'AO'=> $line[40] ,
                                    'AP'=> $line[41] ,
                                    'AQ'=> $line[42] ,
                                    'AR'=> $line[43] ,
                                    'ASx'=> $line[44] ,
                                    'ATx'=> $line[45] ,
                                    'AU'=> $line[46] ,
                                    'AV'=> $line[47] ,
                                    'AW'=> $line[48] ,
                                    'AX'=> $line[49] ,
                                    'AY'=> $line[50] ,
                                    'AZ'=> $line[51] ,
                                    'BA'=> $line[52],
                                    'BB'=> $line[53] ,
                                    'BC'=> $line[54] ,
                                    'BD'=> $line[55] ,
                                    'BE'=> $line[56] ,
                                    'BF'=> $line[57],
                                    'BG'=> $line[58] ,
                                    'BH'=> $line[59] ,
                                    'BI'=> $line[60] ,
                                    'BJ'=> $line[61] ,
                                    'BK'=> $line[62] ,
                                    'BL'=> $line[63] ,
                                    'BM'=> $line[64] ,
                                    'BN'=> $line[65] ,
                                    'BO'=> $line[66] ,
                                    'BP'=> $line[67] ,
                                    'BQ'=> $line[68] ,
                                    'BR'=> $line[69] ,
                                    'BS'=> $line[70] ,
                                    'BT'=> $line[71] ,
                                    'BU'=> $line[72] ,
                                    'BV'=> $line[73] ,
                                    'BW'=> $line[74] ,
                                    'BX'=> $line[75] ,
                                    'BYx'=> $line[76] ,
                                    'BZ'=> $line[77] ,
                                    'CA'=> $line[78] ,
                                    'CB'=> $line[79]

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
  if (substr($messages1['A'], 0, 2)!="As") {
  //if ($messages1['G']=="BEMS") {
  //$messages1['B']= date('Y-m-d H:i:s');
  $messages1['CC']= date('Y-m-d H:i:s');
  $biba = '';
  foreach ($messages1 as $k => $v) {
    if ($k == "A") {$biba = sprintf("%s='%s'", $k, str_replace("'","",$v));} else {
		$biba = $biba .",". sprintf("%s='%s'", $k, str_replace("'","",$v));}
  }
  //echo $biba,"<br>";
  //echo sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('closeddtasis', $messages1), $biba);
  $apola = sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('berdataequip', $messages1), $biba);

  	//print_r($duplicate_data);
  	$this->load->model('update_model');
  	$this->update_model->updateOnDuplicatex('berdataequip',$apola);
  }
}
return $semuaarry;
}

function upload_sampledata_csv6()
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
                                    'S'=> $line[18]

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
  if (substr($messages1['A'], 0, 2)!="It") {
  //if ($messages1['G']=="BEMS") {
  //$messages1['B']= date('Y-m-d H:i:s');
  $messages1['T']= date('Y-m-d H:i:s');
  $biba = '';
  foreach ($messages1 as $k => $v) {
    if ($k == "A") {$biba = sprintf("%s='%s'", $k, str_replace("'","",$v));} else {
		$biba = $biba .",". sprintf("%s='%s'", $k, str_replace("'","",$v));}
  }
  //echo $biba,"<br>";
  //echo sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('closeddtasis', $messages1), $biba);
  $apola = sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('berdatasparepart', $messages1), $biba);

  	//print_r($duplicate_data);
  	$this->load->model('update_model');
  	$this->update_model->updateOnDuplicatex('berdatasparepart',$apola);
  }
}
return $semuaarry;
}


function upload_sampledata_csv7()
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
                                    'W'=> $line[22]

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
  if (substr($messages1['A'], 0, 2)!="Se") {
  //if ($messages1['G']=="BEMS") {
  //$messages1['B']= date('Y-m-d H:i:s');
  $messages1['X']= date('Y-m-d H:i:s');
  $biba = '';
  foreach ($messages1 as $k => $v) {
    if ($k == "A") {$biba = sprintf("%s='%s'", $k, str_replace("'","",$v));} else {
		$biba = $biba .",". sprintf("%s='%s'", $k, str_replace("'","",$v));}
  }
  //echo $biba,"<br>";
  //echo sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('closeddtasis', $messages1), $biba);
  $apola = sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('berdatatnc', $messages1), $biba);

  	//print_r($duplicate_data);
  	$this->load->model('update_model');
  	$this->update_model->updateOnDuplicatex('berdatatnc',$apola);
  }
}
return $semuaarry;
}

function upload_sampledata_csv8()
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
                                    'M'=> $line[12]

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
  if (substr($messages1['A'], 0, 2)!="Ho") {
  //if ($messages1['G']=="BEMS") {
  //$messages1['B']= date('Y-m-d H:i:s');
  $messages1['N']= date('Y-m-d H:i:s');
  $biba = '';
  foreach ($messages1 as $k => $v) {
    if ($k == "A") {$biba = sprintf("%s='%s'", $k, str_replace("'","",$v));} else {
		$biba = $biba .",". sprintf("%s='%s'", $k, str_replace("'","",$v));}
  }
  //echo $biba,"<br>";
  //echo sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('closeddtasis', $messages1), $biba);
  $apola = sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('berdatautc', $messages1), $biba);

  	//print_r($duplicate_data);
  	$this->load->model('update_model');
  	$this->update_model->updateOnDuplicatex('berdatautc',$apola);
  }
}
return $semuaarry;
}

function upload_sampledata_csv9()
{

if(isset($_POST['submit'])){
  print_r($_FILES);
  exit();
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
                                    'Q'=> $line[16]

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
  if (substr($messages1['A'], 0, 2)=="BE") {
  //if ($messages1['G']=="BEMS") {
  //$messages1['B']= date('Y-m-d H:i:s');
  $messages1['R']= date('Y-m-d H:i:s');
  $biba = '';
  foreach ($messages1 as $k => $v) {
    if ($k == "A") {$biba = sprintf("%s='%s'", $k, str_replace("'","",$v));} else {
		$biba = $biba .",". sprintf("%s='%s'", $k, str_replace("'","",$v));}
  }
  //echo $biba,"<br>";
  //echo sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('closeddtasis', $messages1), $biba);
  $apola = sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('berdataeod', $messages1), $biba);

  	//print_r($duplicate_data);
  	$this->load->model('update_model');
  	$this->update_model->updateOnDuplicatex('berdataeod',$apola);
  }
}
return $semuaarry;
}

function upload_sampledata_csv10()
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
                                    'X'=> $line[23]

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
  if (substr($messages1['A'], 0, 2)!="SN") {
  //if ($messages1['G']=="BEMS") {
  //$messages1['B']= date('Y-m-d H:i:s');
  $messages1['Y']= date('Y-m-d H:i:s');
  $biba = '';
  foreach ($messages1 as $k => $v) {
    if ($k == "A") {$biba = sprintf("%s='%s'", $k, str_replace("'","",$v));} else {
		$biba = $biba .",". sprintf("%s='%s'", $k, str_replace("'","",$v));}
  }
  //echo $biba,"<br>";
  //echo sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('closeddtasis', $messages1), $biba);
  $apola = sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('berdatassn', $messages1), $biba);

  	//print_r($duplicate_data);
  	$this->load->model('update_model');
  	$this->update_model->updateOnDuplicatex('berdatassn',$apola);
  }
}
return $semuaarry;
}

function upload_sampledata_csv11()
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
                                    'S'=> $line[18]

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
  if (substr($messages1['A'], 0, 2)!="Li") {
  //if ($messages1['G']=="BEMS") {
  //$messages1['B']= date('Y-m-d H:i:s');
  $messages1['T']= date('Y-m-d H:i:s');
  $biba = '';
  foreach ($messages1 as $k => $v) {
    if ($k == "A") {$biba = sprintf("%s='%s'", $k, str_replace("'","",$v));} else {
		$biba = $biba .",". sprintf("%s='%s'", $k, str_replace("'","",$v));}
  }
  //echo $biba,"<br>";
  //echo sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('closeddtasis', $messages1), $biba);
  $apola = sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('berdatalnc', $messages1), $biba);

  	//print_r($duplicate_data);
  	$this->load->model('update_model');
  	$this->update_model->updateOnDuplicatex('berdatalnc',$apola);
  }
}
return $semuaarry;
}

function upload_sampledata_csv12()
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
                                    'L'=> $line[11]

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
  if (substr($messages1['A'], 0, 2)!="De") {
  //if ($messages1['G']=="BEMS") {
  //$messages1['B']= date('Y-m-d H:i:s');
  $messages1['M']= date('Y-m-d H:i:s');
  $biba = '';
  foreach ($messages1 as $k => $v) {
    if ($k == "A") {$biba = sprintf("%s='%s'", $k, str_replace("'","",$v));} else {
		$biba = $biba .",". sprintf("%s='%s'", $k, str_replace("'","",$v));}
  }
  //echo $biba,"<br>";
  //echo sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('closeddtasis', $messages1), $biba);
  $apola = sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('berdatadd', $messages1), $biba);

  	//print_r($duplicate_data);
  	$this->load->model('update_model');
  	$this->update_model->updateOnDuplicatex('berdatadd',$apola);
  }
}
return $semuaarry;
}

function upload_sampledata_csv13()
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
  if (substr($messages1['A'], 0, 2)!="Wa") {
  //if ($messages1['G']=="BEMS") {
  //$messages1['B']= date('Y-m-d H:i:s');
  $messages1['Q']= date('Y-m-d H:i:s');
  $biba = '';
  foreach ($messages1 as $k => $v) {
    if ($k == "A") {$biba = sprintf("%s='%s'", $k, str_replace("'","",$v));} else {
		$biba = $biba .",". sprintf("%s='%s'", $k, str_replace("'","",$v));}
  }
  //echo $biba,"<br>";
  //echo sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('closeddtasis', $messages1), $biba);
  $apola = sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('berdatawm', $messages1), $biba);

  	//print_r($duplicate_data);
  	$this->load->model('update_model');
  	$this->update_model->updateOnDuplicatex('berdatawm',$apola);
  }
}
return $semuaarry;
}

function upload_sampledata_csv14()
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
                                    'X'=> $line[23]

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
  if (substr($messages1['A'], 0, 2)!="Ho") {
  //if ($messages1['G']=="BEMS") {
  //$messages1['B']= date('Y-m-d H:i:s');
  $messages1['Y']= date('Y-m-d H:i:s');
  $biba = '';
  foreach ($messages1 as $k => $v) {
    if ($k == "A") {$biba = sprintf("%s='%s'", $k, str_replace("'","",$v));} else {
		$biba = $biba .",". sprintf("%s='%s'", $k, str_replace("'","",$v));}
  }
  //echo $biba,"<br>";
  //echo sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('closeddtasis', $messages1), $biba);
  $apola = sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string('berdatacot', $messages1), $biba);

  	//print_r($duplicate_data);
  	$this->load->model('update_model');
  	$this->update_model->updateOnDuplicatex('berdatacot',$apola);
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
