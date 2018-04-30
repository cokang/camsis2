<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ajaxasset extends CI_Controller {
	public function index(){
		$this->load->model("get_model");
		$data['asset_det'] = $this->get_model->get_assetdetx(trim($this->input->get('ast')));
		echo '<table class="ui-content-middle-menu-workorder3" width="100%" id="no-more-tables"><tr class="ui-menu-color-header" style="color:white; font-weight:bold;"><th>No</th><th >Asset Image</th><th>Asset No</th><th>Asset Name</th><th>User<br />Dept</th><th>Location</th><th>Condition</th><th>Status</th><th>Model</th><th>Manu<br />Facturer</th><th>Serial No</th><th>Purchase <br />Cost</th></tr>';
		$i = 1;
		//print_r(trim($this->input->get('ast')));
		//$result = array_map('trim', $data['asset_det']);
		//print_r($result);
		//exit();
		foreach ($data['asset_det'] as $row){
			echo "<tr style='color:black;' align='center'>";
			echo '<td data-title="No :">'.$i++.'</td>';
			if ($row->file_name){
			echo '<td data-title="Asset Image :"><a href="assetupdate?asstno='.$row->V_Asset_no.'&tab=0&parent=assets" class="a-asset-link"><img src="'.base_url().'uploadassetimages/'.$row->file_name.'" alt="" class="ui-picture-asset"/></a></td>';
			}else{
			echo '<td data-title="Asset Image :"><a href="assetupdate?asstno='.$row->V_Asset_no.'&tab=0&parent=assets" class="a-asset-link"><img src="'.base_url().'uploadassetimages/No_image_available.jpg" alt="" class="ui-picture-asset"/></a></td>';
			}
			echo '<td data-title="Asset No :">'.$row->V_Tag_no.'</td>';
			echo '<td data-title="Asset Name :">'.$row->V_Asset_name.'</td>';
			echo '<td data-title="User Dept:">'.$row->V_User_Dept_code.' ('.$row->v_UserDeptDesc.')</td>';
			echo '<td data-title="Location:">'.$row->V_Location_code.'</td>';
			echo '<td data-title="Condition:">'.$row->V_AssetCondition.'</td>';
			echo '<td data-title="Status:">'.$row->v_AssetStatus.'</td>';
			echo '<td data-title="Model:">'.$row->V_Model_no.'</td>';
			echo '<td data-title="Manufacturer:">'.$row->V_Manufacturer.'</td>';
			echo '<td data-title="Serial No:">'.$row->V_Serial_no.'</td>';
			echo '<td data-title="Purchase Cost:">RM'.number_format($row->N_Cost,2).'</td>';
			echo '</tr>';
		}
			echo '</table>';
	}
}