<?php
$array = [
	//desk Menu//
	['Help Desk', 'contentcontroller/desk/' , 'bems_desk//','',''],
	['Help Desk', 'desk/' , 'contentcontroller/desknewrequest/','',''],
	['Help Desk', 'desk/' , 'contentcontroller/desknewrequest/','',''],
	['Help Desk', 'desk/' , 'contentcontroller/desk_complaint/','',''],
	['Help Desk', 'desk/' , 'contentcontroller/desk_complaint_update/','',''],
	['Help Desk', 'contentcontroller/desk/' , 'workorder/','',''],
	['Help Desk', 'contentcontroller/desk/' , 'workorder//','',''],
	['Help Desk', 'contentcontroller/desk/' , 'Complaint Details','contentcontroller/desk_complaint?cmplnt_no='.$this->input->post('cmplnt_no'),'desk_complaint//'],
	// End Menu //


	//Asset Menu//
	['Asset', 'assets/' , 'contentcontroller/assetupdate/','',''],
	['Asset', 'assets/' , 'contentcontroller/assetstatutory/','',''],
	['Asset', 'assets/' , 'contentcontroller/assetcontract/','',''],
	['Asset', 'assets/' , 'contentcontroller/assetworkorder/','',''],
	['Asset', 'assets/' , 'contentcontroller/assetaccessories/','',''],
	['Asset', 'assets/' , 'contentcontroller/assetlicenses/','',''],
	['Asset', 'assets/' , 'contentcontroller/assetPPMjob/','',''],
	['Asset', 'assets/' , 'contentcontroller/assetPPMplanner/','',''],
	['Asset', 'assets/' , 'contentcontroller/assetlogcards/','',''],
	['Asset', 'assets/' , 'contentcontroller/assetlogcards_M/','',''],
	['Asset', 'assets/' , 'contentcontroller/assetlogcards_U/','',''],
	['Asset', 'assets/' , 'contentcontroller/assetlogcards_C/','',''],
	['Asset', 'assets/' , 'contentcontroller/assetlogcards_Re/','',''],
	['Asset', 'assets/' , 'contentcontroller/assetmaintenancespecification/','',''],
	['Asset', 'assets/' , 'contentcontroller/assetvariationhistory/','',''],
	['Asset', 'assets/' , 'contentcontroller/assetcostcummulative/','',''],
	['Asset', 'assets/' , 'contentcontroller/assetwn/','',''],
	['Asset', 'assets/' , 'contentcontroller/assetet/','',''],
	['Asset', 'assets/' , 'contentcontroller/assetwe/','',''],
	['Asset', 'assets/' , 'contentcontroller/assetwf/','',''],
	['Asset', 'assets/' , 'contentcontroller/assetsearch/','',''],
	['Asset', 'contentcontroller/assets/' , 'asset//','',''],
	// Second Asset Menu //
	['Asset', 'assets/' , 'General Info' , 'assetupdate?asstno='.$this->input->get('assetno').'', 'contentcontroller/updateReg/'],
	//['Asset', 'assets/' , 'General Info' , 'assetupdate?asstno='.$this->input->get('assetno').'' , 'contentcontroller/confirmReg/'],
	['Asset', 'assets/' , 'General Info' , 'assetupdate?asstno='.$this->input->get('assetno').'' , 'contentcontroller/updatecom/'],
	//['Asset', 'assets/' , 'General Info' , 'assetupdate?asstno='.$this->input->get('assetno').'' , 'contentcontroller/confirmcom/'],
	['Asset', 'assets/' , 'General Info' , 'assetupdate?asstno='.$this->input->get('assetno').'' , 'contentcontroller/updatespec/'],
	//['Asset', 'assets/' , 'General Info' , 'assetupdate?asstno='.$this->input->get('assetno').'' , 'contentcontroller/confirmspec/'],
	['Asset', 'assets/' , 'General Info' , 'assetupdate?asstno='.$this->input->get('assetno').'' , 'contentcontroller/updateacqu/'],
	//['Asset', 'assets/' , 'General Info' , 'assetupdate?asstno='.$this->input->get('assetno').'' , 'contentcontroller/confirmacqu/'],
	['Asset', 'assets/' , 'General Info' , 'assetupdate?asstno='.$this->input->get('assetno').'' , 'contentcontroller/updatecommissioning/'],
	//['Asset', 'assets/' , 'General Info' , 'assetupdate?asstno='.$this->input->get('assetno').'' , 'contentcontroller/confirmcommissioning/'],
	['Asset', 'assets/' , 'General Info' , 'assetupdate?asstno='.$this->input->get('assetno').'' , 'contentcontroller/updatemaintenance/'],
	//['Asset', 'assets/' , 'General Info' , 'assetupdate?asstno='.$this->input->get('assetno').'' , 'contentcontroller/confirmmaintenance/'],
	['Asset', 'assets/' , 'Asset Statutory' , 'assetstatutory?asstno='.$this->input->get('assetno').'&tab=1', 'contentcontroller/assetstatutory_update/'],
	//['Asset', 'assets/' , 'Asset Statutory' , 'assetstatutory?asstno='.$this->input->get('assetno').'&tab=1' , 'contentcontroller/assetstatutory_update_confrim/'],
	['Asset', 'assets/' , 'Accessories' , 'assetaccessories?asstno='.$this->input->get('assetno').'&tab=4', 'contentcontroller/Accessories_update/'],
	['Asset', 'assets/' , 'Licenses' , 'assetlicenses?asstno='.$this->input->get('assetno').'&tab=5', 'contentcontroller/assetlicenses_update/'],
	['Asset', 'assets/' , 'PPM Job Register' , 'assetPPMjob?asstno='.$this->input->get('asstno').'&tab=6', 'contentcontroller/assetPPMjob_update/'],
	['Asset', 'assets/' , 'Warranty Notification' , 'assetwn?asstno='.$this->input->get('asstno').'&tab=9&parent=assets', 'contentcontroller/assetwned_update/'],
	['Asset', 'assets/' , 'Warranty Notification' , 'assetwn?asstno='.$this->input->get('asstno').'&tab=9&parent=assets', 'contentcontroller/assetwnmt_update/'],
	['Asset', 'assets/' , 'Warranty Notification' , 'assetwn?asstno='.$this->input->get('asstno').'&tab=9&parent=assets', 'contentcontroller/assetwnwpa_update/'],
	['Asset', 'assets/' , 'Warranty Notification' , 'assetwn?asstno='.$this->input->get('asstno').'&tab=9&parent=assets', 'contentcontroller/assetwnwc_update/'],
	['Asset', 'assets/' , 'Equipment Transfer' , 'assetet?asstno='.$this->input->get('asstno').'&tab=10&parent=assets', 'contentcontroller/assetet_update/'],
	['Asset', 'assets/' , 'Equipment Transfer' , 'assetet?asstno='.$this->input->get('asstno').'&tab=10&parent=assets', 'contentcontroller/assetetrttp_update/'],
	['Asset', 'assets/' , 'Equipment Transfer' , 'assetet?asstno='.$this->input->get('asstno').'&tab=10&parent=assets', 'contentcontroller/assetetrttpnos_update/'],
	// End Asset Menu //
	// Work Order Menu //
	['Work Order', 'workorder/' , 'contentcontroller/workorderlist/','',''],
	['Work Order', 'workorder/' , 'contentcontroller/response/','',''],
	['Work Order', 'workorder/' , 'contentcontroller/visitone/','',''],
	['Work Order', 'workorder/' , 'contentcontroller/visittwo/','',''],
	['Work Order', 'workorder/' , 'contentcontroller/visitthree/','',''],
	['Work Order', 'workorder/' , 'contentcontroller/personnelinvolved/','',''],
	['Work Order', 'workorder/' , 'contentcontroller/jobclose/','',''],
	['Work Order', 'workorder/' , 'contentcontroller/technicalsummary/','',''],
	['Work Order', 'workorder/' , 'contentcontroller/clause/','',''],
	['Work Order', 'contentcontroller/workorder/' , 'ppm_gen//','',''],
	['Work Order', 'workorder/','Clause ' , 'clause?wrk_ord='.$this->input->get('wrk_ord').'&wo=8', 'contentcontroller/clause_update/'],
	['Work Order', 'workorder/','Technical Summary ' , 'technicalsummary?wrk_ord='.$this->input->get('wrk_ord').'&wo=7', 'contentcontroller/technicalsummary_update/'],
	['Work Order', 'workorder/','Job Close' , 'jobclose?wrk_ord='.$this->input->get('wrk_ord').'&wo=6&parent=work', 'contentcontroller/jobclose_update/'],
	['Work Order', 'workorder/','Request' , 'workorderlist?wrk_ord='.$this->input->get('wrk_ord').'&wo=0', 'contentcontroller/workorderlist_update/'],
	['Work Order', 'workorder/','Response' , 'response?wrk_ord='.$this->input->get('wrk_ord').'&wo=1', 'contentcontroller/response_update/'],
	['Work Order', 'workorder/','Visit One' , 'visitone?wrk_ord='.$this->input->get('wrk_ord').'&wo=2', 'contentcontroller/visitone_update/'],
	['Work Order', 'workorder/','Visit Two' , 'visittwo?wrk_ord='.$this->input->get('wrk_ord').'&wo=3', 'contentcontroller/visittwo_update/'],
	['Work Order', 'workorder/','Visit Three' , 'visitthree?wrk_ord='.$this->input->get('wrk_ord').'&wo=4', 'contentcontroller/visitthree_update/'],
	// End Work Order Menu //
	// Ppm Catalog Menu //
	['PPM Catalog', 'catalogppm/' , 'contentcontroller/Wo/','',''],
	['PPM Catalog', 'catalogppm/' , 'contentcontroller/v1/','',''],
	['PPM Catalog', 'catalogppm/' , 'contentcontroller/v2/','',''],
	['PPM Catalog', 'catalogppm/' , 'contentcontroller/v3/','',''],
	['PPM Catalog', 'catalogppm/' , 'contentcontroller/PI/','',''],
	['PPM Catalog', 'catalogppm/' , 'contentcontroller/job/','',''],
	['PPM Catalog', 'catalogppm/' , 'contentcontroller/tech/','',''],
	['PPM Catalog', 'catalogppm/' , 'contentcontroller/clau/','',''],
	['PPM Catalog', 'catalogppm/','Work Order' , 'wo?wrk_ord='.$this->input->get('wrk_ord'). '&vppm=0', 'contentcontroller/wo_update/'],
	// End Ppm Catalog Menu //

	//vo menu //
	['Back To Main Page', 'Central/BES?&tab=1', 'contentcontroller/vo3_Analysis/','',''],
	['Back To Main Page', 'Central/BES?&tab=1', 'contentcontroller/vo3_report/','',''],
	['Back To Main Page', 'Central/BES?&tab=1', 'contentcontroller/vo3_vvf/','',''],
	['Back To Main Page', 'Central/BES?&tab=1', 'contentcontroller/vo3/','',''],
	['Back To Main Page', 'Central/BES?&tab=1', 'contentcontroller/vo3_C_main/','',''],
	['Back To Main Page', 'Central/BES?&tab=1', 'contentcontroller/vo3_assets_main/','',''],
	['Back To Main Page', 'Central/BES?&tab=1', 'contentcontroller/vo3_rates_main/','',''],
	['General', 'vo3_vvf?&rpt_no='.$this->input->get('rpt_no').'&vo=0' , 'contentcontroller/vo3_vvf_update/','',''],
	['Signatories', 'vo3_Signatories?&rpt_no='.$this->input->get('rpt_no').'&vo=1' , 'contentcontroller/vo3_Signatories_update/','',''],
	//vo end //

	//siq menu //
	['CAR', 'qap3_SIQ_Number_update?ssiq='.$this->input->get('ssiq').'&m='.$this->input->get('m').'&y='.$this->input->get('y'), 'contentcontroller/qap3_car_edit/','',''],
	//siq end //
];


//echo $this->uri->slash_segment(1) .$this->uri->slash_segment(2).'<br>';
foreach ($array as $list) {
//print_r($list);
//echo 'nilai c '.$list[2];
//exit();
    // $a contains the first element of the nested array,
    // and $b contains the second element.
    //echo $this->uri->slash_segment(1) .$this->uri->slash_segment(2).'abis';
if ($list[2] == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){
	//echo "A: $a; B: $b\n C: $c\n <br />" ;
	//echo $this->uri->slash_segment(1) .$this->uri->slash_segment(2);
	if ($this->input->get('parent') == 'wrkodr' ){
	echo "<div class='menu-class'>
		<a href='contentcontroller/workorder'><span class='icon-play2' valign='middle'></span> Work Order</a>
	</div>";
	}
	else {//if ($this->input->get('parent') == '' ){
	echo "<div class='menu-class'>
		<a href='$list[1]'><span class='icon-play2' valign='middle'></span> $list[0]</a>
	</div>";
	}
}
elseif ($list[4] == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){ 
	//if (isset('asstno='.$this->input->get('asstno'))){
		//print_r ('asstno='.$this->input->get('assetno'));
		//exit();
	//}
	echo "<div class='menu-class'>
		<a href='$list[1]'><span class='icon-play2' valign='middle'></span>  $list[0]</a><a href='$list[3]'> <span class='icon-play2' valign='middle'></span> $list[2]</a>
	</div>";
}
}
?>