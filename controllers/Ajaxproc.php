<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajaxproc extends CI_Controller {
	public function index(){
	
	
	if ($this->input->get('option') == 'pono')
{
   $pono = $this->input->get('pono');
   if(isset($_POST['foo'])) {
   echo "a sentence".$_POST['foo']." with something in the middle.";
}
	

	$this->load->model('get_model');
	//$this->load->model('display_model');
	if($this->input->get('tag') == 'component'){	
    $data['record'] = $this->get_model->get_pocom($pono);
   //$data['record'] = $this->display_model->getpocom($pono,$this->input->get('visit'));

}
	else{
		$data['record'] = $this->get_model->get_poattached($pono);
	}
	//print_r($data['record']);
	//echo '<br><br>';
	if($this->input->get('tag') == 'component'){
		foreach($data['record'] as $row){
			$extension = explode(".",$row->com_id);

			if ($extension[1] == 'doc' || $extension[1] == 'docx' || $extension[1] == 'xls' || $extension[1] == 'xlsx' || $extension[1] == 'pdf') {
			echo "<span class='icon-play icon' style='font-size:15px;'></span><span style='font-size:15px; font-weight:bold;'>" .$row->component_name. "</span><a href=".base_url()."uploadpofiles/".$row->com_id."><span class='icon-file-text2 icon'></a></span><a href='javascript:fCallLocatiod(\"".$row->PO_No."\",\"".$row->Id."\",\"".$this->input->get('tag')."\");'><span class='icon-cross icon' style='color:red;'></span></a><a href='javascript:fCallLocatioe(\"".$row->PO_No."\",\"".$row->Id."\",\"".$this->input->get('tag')."\");'><span class='icon-new icon'></span></a>";
			echo '<br>';
			} else {
			echo "<span class='icon-play icon' style='font-size:15px;'></span><span style='font-size:15px; font-weight:bold;'>" .$row->component_name. "</span> <br/><img src=".base_url()."uploadpofiles/".$row->com_id." style='width:50px; height:50px; padding-left:5px;' ><a href='javascript:fCallLocatiod(\"".$row->PO_No."\",\"".$row->Id."\",\"".$this->input->get('tag')."\");'><span class='icon-cross icon' style='color:red;'></span></a><a href='javascript:fCallLocatioe(\"".$row->PO_No."\",\"".$row->Id."\",\"".$this->input->get('tag')."\");'><span class='icon-new icon'></span></a>";
			echo '<br>';
			}
		}
	}
	else{
		foreach($data['record'] as $row){
			$extension = explode(".",$row->doc_id);

			if ($extension[1] == 'doc' || $extension[1] == 'docx' || $extension[1] == 'xls' || $extension[1] == 'xlsx' || $extension[1] == 'pdf') {
			echo "<span class='icon-play icon' style='font-size:15px;'></span><span style='font-size:15px; font-weight:bold;'>" .$row->Doc_name. "</span><a href=".base_url()."uploadpofiles/".$row->doc_id."><span class='icon-file-text2 icon'></a></span><a href='javascript:fCallLocatiod(\"".$row->PO_No."\",\"".$row->Id."\",\"".$this->input->get('tag')."\");'><span class='icon-cross icon' style='color:red;'></span></a><a href='javascript:fCallLocatioe(\"".$row->PO_No."\",\"".$row->Id."\",\"".$this->input->get('tag')."\");'><span class='icon-new icon'></span></a>";
			echo '<br>';
			} else {
			echo "<span class='icon-play icon' style='font-size:15px;'></span><span style='font-size:15px; font-weight:bold;'>" .$row->Doc_name. "</span> <br/><img src=".base_url()."uploadpofiles/".$row->doc_id." style='width:50px; height:50px; padding-left:5px;' ><a href='javascript:fCallLocatiod(\"".$row->PO_No."\",\"".$row->Id."\",\"".$this->input->get('tag')."\");'><span class='icon-cross icon' style='color:red;'></span></a><a href='javascript:fCallLocatioe(\"".$row->PO_No."\",\"".$row->Id."\",\"".$this->input->get('tag')."\");'><span class='icon-new icon'></span></a>";
			echo '<br>';
			}
		}
	}
}
else
{
   $mrinno = $this->input->get('mrinno');
   if(isset($_POST['foo'])) {
   echo "a sentence".$_POST['foo']." with something in the middle.";
}
	

	$this->load->model('get_model');
	if($this->input->get('tag') == 'component'){
		$data['record'] = $this->get_model->get_components($mrinno);
	}
	else{
		$data['record'] = $this->get_model->get_attachments($mrinno);
	}
	//print_r($data['record']);
	//echo '<br><br>';
	if($this->input->get('tag') == 'component'){
		foreach($data['record'] as $row){
			$extension = explode(".",$row->com_id);

			if ($extension[1] == 'doc' || $extension[1] == 'docx' || $extension[1] == 'xls' || $extension[1] == 'xlsx' || $extension[1] == 'pdf') {
			echo "<span class='icon-play icon' style='font-size:15px;'></span><span style='font-size:15px; font-weight:bold;'>" .$row->component_name. "</span><a href=".base_url()."uploadmrinfiles/".$row->com_id."><span class='icon-file-text2 icon'></a></span><a href='javascript:fCallLocatiod(\"".$row->asset_no."\",\"".$row->Id."\",\"".$this->input->get('tag')."\");'><span class='icon-cross icon' style='color:red;'></span></a><a href='javascript:fCallLocatioe(\"".$row->asset_no."\",\"".$row->Id."\",\"".$this->input->get('tag')."\");'><span class='icon-new icon'></span></a>";
			echo '<br>';
			} else {
			echo "<span class='icon-play icon' style='font-size:15px;'></span><span style='font-size:15px; font-weight:bold;'>" .$row->component_name. "</span> <br/><img src=".base_url()."uploadmrinfiles/".$row->com_id." style='width:50px; height:50px; padding-left:5px;' ><a href='javascript:fCallLocatiod(\"".$row->asset_no."\",\"".$row->Id."\",\"".$this->input->get('tag')."\");'><span class='icon-cross icon' style='color:red;'></span></a><a href='javascript:fCallLocatioe(\"".$row->asset_no."\",\"".$row->Id."\",\"".$this->input->get('tag')."\");'><span class='icon-new icon'></span></a>";
			echo '<br>';
			}
		}
	}
	else{
		foreach($data['record'] as $row){
			$extension = explode(".",$row->doc_id);

			if ($extension[1] == 'doc' || $extension[1] == 'docx' || $extension[1] == 'xls' || $extension[1] == 'xlsx' || $extension[1] == 'pdf') {
			echo "<span class='icon-play icon' style='font-size:15px;'></span><span style='font-size:15px; font-weight:bold;'>" .$row->Doc_name. "</span><a href=".base_url()."uploadmrinfiles/".$row->doc_id."><span class='icon-file-text2 icon'></a></span><a href='javascript:fCallLocatiod(\"".$row->asset_no."\",\"".$row->Id."\",\"".$this->input->get('tag')."\");'><span class='icon-cross icon' style='color:red;'></span></a><a href='javascript:fCallLocatioe(\"".$row->asset_no."\",\"".$row->Id."\",\"".$this->input->get('tag')."\");'><span class='icon-new icon'></span></a>";
			echo '<br>';
			} else {
			echo "<span class='icon-play icon' style='font-size:15px;'></span><span style='font-size:15px; font-weight:bold;'>" .$row->Doc_name. "</span> <br/><img src=".base_url()."uploadmrinfiles/".$row->doc_id." style='width:50px; height:50px; padding-left:5px;' ><a href='javascript:fCallLocatiod(\"".$row->asset_no."\",\"".$row->Id."\",\"".$this->input->get('tag')."\");'><span class='icon-cross icon' style='color:red;'></span></a><a href='javascript:fCallLocatioe(\"".$row->asset_no."\",\"".$row->Id."\",\"".$this->input->get('tag')."\");'><span class='icon-new icon'></span></a>";
			echo '<br>';
			}
		}
	}
}
	
	
	}
	
}
?>