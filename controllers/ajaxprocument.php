<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ajaxprocument extends CI_Controller {
	public function index(){
	if ($this->uri->slash_segment(1) == 'Procurement/') {
	 $jvtable = "update_delete";
	}
	else {
		 $jvtable = "update_delete";
		
	}
	$this->load->model('display_model');
	$data['record'] = $this->display_model->vendorlist(trim($this->input->get('ast')));
	
		echo "<script language=\"javascript\"> function fLabour(a,b,c,d){
			winProp = 'width=600,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
			Win = window.open('".$jvtable."?tab='+a+'&code='+b+'&vid='+c+'&viid='+d, '', winProp);
			Win.window.focus();
		}</script>";
		//$this->load->model("get_model");
		//$data['asset_det'] = trim($this->input->get('ast'));
		echo '<table class="ui-content-middle-menu-workorder3" width="100%" id="no-more-tables"><tr class="ui-menu-color-header" style="color:white; font-weight:bold;"><th>No</th><th style="width:40%;">Vendor Details</th><th style="width:20%;">Vendor Item Id</th><th style="width:20%;">Price (RM)</th></tr>';
		$i = 1;
		foreach ($data['record'] as $row){
		//echo trim($this->input->get('ast'));
		//print_r(trim($this->input->get('ast')));
		//$result = array_map('trim', $data['asset_det']);
		//print_r($result);
		//exit();
			echo "<tr style='color:black;' align='center'>";
			echo '<td data-title="No :">'.$i++.'</td>';
			echo '<td data-title="Vendor Details :">'.$row->VENDOR_NAME.'</td>';
			echo '<td data-title="Vendor Item Id :">'.$row->Vendor_Item_Code.'</td>';
			echo '<td data-title="Price (RM):">'.$row->List_Price.'</td>';
?>
			<td data-title=""><a href="javascript:void(0);" onclick="fLabour('Delete','<?=$row->Item_Code?>','<?=$row->v_id?>','<?=$row->vi_id?>');"><span style="color:red; font-size:12px;" class="icon-cross"></span> Delete </a></td>
			<td data-title=""><a href="javascript:void(0);" onclick="fLabour('Update','<?=$row->Item_Code?>','<?=$row->v_id?>','<?=$row->vi_id?>');"><span style="color:green; font-size:12px;" class="icon-new"></span> Update </a></td>
			
<?php
		}
			echo '</tr>';
			echo '</table>';
	}
}
?>