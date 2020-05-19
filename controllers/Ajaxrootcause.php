<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajaxrootcause extends CI_Controller {
	public function index(){
	
   $wo = $this->input->get('wo');
  

	$this->load->model('get_model');
	if($this->input->get('tag') == 'CMIS'){
		$data['record'] = $this->get_model->get_cmis($wo);
	}
	else{
		$data['record'] = $this->get_model->get_photo($wo);
	}
	// print_r($data['record']);
	// echo '<br><br>';exit();
	if($this->input->get('tag') == 'CMIS'){
		foreach($data['record'] as $row){
			$extension = explode(".",$row->com_id);

			if ($extension[1] == 'docx' || $extension[1] == 'xlsx' || $extension[1] == 'pdf') {
				echo "<span class='icon-play icon' style='font-size:15px;'></span><span style='font-size:15px; font-weight:bold;'>" .$row->component_name. "</span><a href=".base_url()."uploadmrinfiles/".$row->com_id."><span class='icon-file-text2 icon'></a></span><a href='javascript:fCallCmisPhotoDel(\"".$row->asset_no."\",\"".$row->Id."\",\"photo\");'><span class='icon-cross icon' style='color:red;'></span></a>";
				echo '<br>';
				}else{
			echo "<span class='icon-play icon' style='font-size:15px;'></span><span style='font-size:15px; font-weight:bold;'>" .$row->component_name. "</span> <br/><img src=".base_url()."uploadmrinfiles/".$row->com_id." style='max-width:90%; height:auto; padding-left:5px;' ><a href='javascript:fCallCmisPhotoDel(\"".$row->asset_no."\",\"".$row->Id."\",\"".$this->input->get('tag')."\");'><span class='icon-cross icon' style='color:red;'></span></a>";
			echo '<br>';
				}
		}
	}
	else{
		
											foreach($data['record'] as $row){
												$extension = explode(".",$row->com_id);

												if ($extension[1] == 'docx' || $extension[1] == 'xlsx' || $extension[1] == 'pdf') {
													echo "<span class='icon-play icon' style='font-size:15px;'></span><span style='font-size:15px; font-weight:bold;'>" .$row->component_name. "</span><a href=".base_url()."uploadmrinfiles/".$row->com_id."><span class='icon-file-text2 icon'></a></span><a href='javascript:fCallCmisPhotoDel(\"".$row->asset_no."\",\"".$row->Id."\",\"photo\");'><span class='icon-cross icon' style='color:red;'></span></a>";
													echo '<br>';
													}else{
												echo "<span class='icon-play icon' style='font-size:15px;'></span><span style='font-size:15px; font-weight:bold;'>" .$row->component_name. "</span> <br/><img src=".base_url()."uploadmrinfiles/".$row->com_id." style='max-width:20%; height:auto; padding-left:5px;' ><a href='javascript:fCallCmisPhotoDel(\"".$row->asset_no."\",\"".$row->Id."\",\"attachment\");'><span class='icon-cross icon' style='color:red;'></span></a>";
												echo '<br>';
													}
												
											}
	}

	
	
	}
	
}
?>