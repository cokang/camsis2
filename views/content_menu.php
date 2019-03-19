<?php
        
$array = [
	//desk Menu//
	['Help Desk', 'contentcontroller/workorder?parent='.$this->input->get('parent') , 'bems_desk//','',''],
	['Help Desk', 'desk/' , 'contentcontroller/desknewrequest/','',''],
	['Help Desk', 'desk/' , 'contentcontroller/desknewrequest/','',''],
	['Help Desk', 'desk/' , 'contentcontroller/desk_complaint/','',''],
	['Help Desk', 'desk/' , 'contentcontroller/desk_complaint_update/','',''],
	['Help Desk', 'contentcontroller/desk/' , 'workorder/','',''],
	['Help Desk', 'contentcontroller/workorder?parent='.$this->input->get('parent') , 'workorder//','',''],
	['Help Desk', 'contentcontroller/desk/' , 'Complaint Details','contentcontroller/desk_complaint?cmplnt_no='.$this->input->post('cmplnt_no'),'desk_complaint//'],
	['Help Desk', 'desk/' , 'contentcontroller/desksearch/','',''],
	// End Menu //

	//Asset Menu//
	['Asset', 'contentcontroller/assets' , 'contentcontroller/assetupdate/','',''],
	['Asset', 'contentcontroller/assets' , 'contentcontroller/assetupdatepic/','',''],
	['Asset', 'contentcontroller/assets' , 'contentcontroller/assetstatutory/','',''],
	['Asset', 'contentcontroller/assets' , 'contentcontroller/assetcontract/','',''],
	['Asset', 'contentcontroller/assets' , 'contentcontroller/assetworkorder/','',''],
	['Asset', 'contentcontroller/assets' , 'contentcontroller/assetaccessories/','',''],
	['Asset', 'contentcontroller/assets' , 'contentcontroller/assetlicenses/','',''],
	['Asset', 'contentcontroller/assets' , 'contentcontroller/assetPPMjob/','',''],
	['Asset', 'contentcontroller/assets' , 'assetPPMplanner/','',''],
	['Asset', 'contentcontroller/assets' , 'contentcontroller/assetlogcards/','',''],
	['Asset', 'contentcontroller/assets' , 'contentcontroller/assetlogcards_M/','',''],
	['Asset', 'contentcontroller/assets' , 'contentcontroller/assetlogcards_U/','',''],
	['Asset', 'contentcontroller/assets' , 'contentcontroller/assetlogcards_C/','',''],
	['Asset', 'contentcontroller/assets' , 'contentcontroller/assetlogcards_Re/','',''],
	['Asset', 'contentcontroller/assets' , 'contentcontroller/fail_bank/','',''],
	['Asset', 'contentcontroller/assets' , 'contentcontroller/assetmaintenancespecification/','',''],
	['Asset', 'contentcontroller/assets' , 'contentcontroller/assetvariationhistory/','',''],
	['Asset', 'contentcontroller/assets' , 'contentcontroller/assetcostcummulative/','',''],
	['Asset', 'contentcontroller/assets' , 'contentcontroller/assetwn/','',''],
	['Asset', 'contentcontroller/assets' , 'contentcontroller/assetet/','',''],
	['Asset', 'contentcontroller/assets' , 'contentcontroller/assetwe/','',''],
	['Asset', 'contentcontroller/assets' , 'contentcontroller/assetwf/','',''],
	['Asset', 'contentcontroller/assets' , 'contentcontroller/assetsearch/','',''],
	['Asset', 'contentcontroller/assets/' , 'asset//','',''],
	// Second Asset Menu //
	['Asset', 'contentcontroller/assets' , 'General Info' , 'assetupdate?asstno='.$this->input->get('assetno').'&tab=0&parent=assets', 'contentcontroller/updateReg/'],
	//['Asset', 'assets/' , 'General Info' , 'assetupdate?asstno='.$this->input->get('assetno').'' , 'contentcontroller/confirmReg/'],
	['Asset', 'contentcontroller/assets' , 'General Info' , 'assetupdate?asstno='.$this->input->get('assetno').'&tab=0&parent=assets' , 'contentcontroller/updatecom/'],
	//['Asset', 'assets/' , 'General Info' , 'assetupdate?asstno='.$this->input->get('assetno').'' , 'contentcontroller/confirmcom/'],
	['Asset', 'contentcontroller/assets' , 'General Info' , 'assetupdate?asstno='.$this->input->get('assetno').'&tab=0&parent=assets' , 'contentcontroller/updatespec/'],
	//['Asset', 'assets/' , 'General Info' , 'assetupdate?asstno='.$this->input->get('assetno').'' , 'contentcontroller/confirmspec/'],
	['Asset', 'contentcontroller/assets' , 'General Info' , 'assetupdate?asstno='.$this->input->get('assetno').'&tab=0&parent=assets' , 'contentcontroller/updateacqu/'],
	//['Asset', 'assets/' , 'General Info' , 'assetupdate?asstno='.$this->input->get('assetno').'' , 'contentcontroller/confirmacqu/'],
	['Asset', 'assets' , 'General Info' , 'assetupdate?asstno='.$this->input->get('assetno').'&tab=0&parent=assets' , 'contentcontroller/updatecommissioning/'],
	//['Asset', 'assets/' , 'General Info' , 'assetupdate?asstno='.$this->input->get('assetno').'' , 'contentcontroller/confirmcommissioning/'],
	['Asset', 'contentcontroller/assets' , 'General Info' , 'assetupdate?asstno='.$this->input->get('assetno').'&tab=0&parent=assets' , 'contentcontroller/updatemaintenance/'],
	//['Asset', 'assets/' , 'General Info' , 'assetupdate?asstno='.$this->input->get('assetno').'' , 'contentcontroller/confirmmaintenance/'],
	['Asset', 'contentcontroller/assets' , 'Asset Statutory' , 'assetstatutory?asstno='.$this->input->get('assetno').'&tab=1', 'contentcontroller/assetstatutory_update/'],
	//['Asset', 'assets/' , 'Asset Statutory' , 'assetstatutory?asstno='.$this->input->get('assetno').'&tab=1' , 'contentcontroller/assetstatutory_update_confrim/'],
	['Asset', 'contentcontroller/assets' , 'Accessories' , 'assetaccessories?asstno='.$this->input->get('assetno').'&tab=4', 'contentcontroller/Accessories_update/'],
	['Asset', 'contentcontroller/assets' , 'Licenses' , 'assetlicenses?asstno='.$this->input->get('assetno').'&tab=5', 'contentcontroller/assetlicenses_update/'],
	['Asset', 'contentcontroller/assets' , 'PPM Job Register' , 'assetPPMjob?asstno='.$this->input->get('asstno').'&tab=6', 'contentcontroller/assetPPMjob_update/'],
	['Asset', 'assets' , 'Warranty Notification' , 'assetwn?asstno='.$this->input->get('asstno').'&tab=9&parent=assets', 'contentcontroller/assetwned_update/'],
	['Asset', 'contentcontroller/assets' , 'Warranty Notification' , 'assetwn?asstno='.$this->input->get('asstno').'&tab=9&parent=assets', 'contentcontroller/assetwnmt_update/'],
	['Asset', 'contentcontroller/assets' , 'Warranty Notification' , 'assetwn?asstno='.$this->input->get('asstno').'&tab=9&parent=assets', 'contentcontroller/assetwnwpa_update/'],
	['Asset', 'assets' , 'Warranty Notification' , 'assetwn?asstno='.$this->input->get('asstno').'&tab=9&parent=assets', 'contentcontroller/assetwnwc_update/'],
	['Asset', 'contentcontroller/assets' , 'Equipment Transfer' , 'assetet?asstno='.$this->input->get('asstno').'&tab=10&parent=assets', 'contentcontroller/assetet_update/'],
	['Asset', 'contentcontroller/assets' , 'Equipment Transfer' , 'assetet?asstno='.$this->input->get('asstno').'&tab=10&parent=assets', 'contentcontroller/assetetrttp_update/'],
	['Asset', 'contentcontroller/assets' , 'Equipment Transfer' , 'assetet?asstno='.$this->input->get('asstno').'&tab=10&parent=assets', 'contentcontroller/assetetrttpnos_update/'],
	// End Asset Menu //
	// Work Order Menu //
	['Work Order', 'workorder?parent=wrkodr' , 'contentcontroller/worksearch/','',''],
	['Work Order', 'workorder?parent=wrkodr' , 'contentcontroller/workorderlist/','',''],
	['Work Order', 'workorder?parent=wrkodr' , 'contentcontroller/response/','',''],
	['Work Order', 'workorder?parent=wrkodr' , 'contentcontroller/visitplus/','',''],
	['Work Order', 'workorder?parent=wrkodr' , 'contentcontroller/visitone/','',''],
	['Work Order', 'workorder?parent=wrkodr' , 'contentcontroller/visittwo/','',''],
	['Work Order', 'workorder?parent=wrkodr' , 'contentcontroller/visitthree/','',''],
	['Work Order', 'workorder?parent=wrkodr' , 'contentcontroller/personnelinvolved/','',''],
	['Work Order', 'workorder?parent=wrkodr' , 'contentcontroller/jobclose/','',''],
	['Work Order', 'workorder?parent=wrkodr' , 'contentcontroller/technicalsummary/','',''],
	['Work Order', 'workorder?parent=wrkodr' , 'contentcontroller/clause/','',''],
	['Work Order', 'contentcontroller/workorder?parent=wrkodr' , 'ppm_gen//','',''],
	['PPM Generator', 'ppm_gen' , 'ppm_gen_ctrl//','',''],
	['Work Order', 'workorder/','Clause ' , 'clause?wrk_ord='.$this->input->get('wrk_ord').'&wo=8', 'contentcontroller/clause_update/'],
	['Work Order', 'workorder?parent=wrkodr','Technical Summary ' , 'technicalsummary?wrk_ord='.$this->input->get('wrk_ord').'&wo=8', 'contentcontroller/technicalsummary_update/'],
	['Work Order', 'workorder?parent=wrkodr','Job Close' , 'jobclose?wrk_ord='.$this->input->get('wrk_ord').'&wo=6&parent=work', 'contentcontroller/jobclose_update/'],
	['Work Order', 'workorder?parent=wrkodr','Request' , 'workorderlist?wrk_ord='.$this->input->get('wrk_ord').'&wo=0', 'contentcontroller/workorderlist_update/'],
	['Work Order', 'workorder?parent=wrkodr','Response' , 'response?wrk_ord='.$this->input->get('wrk_ord').'&wo=1', 'contentcontroller/response_update/'],
	['Work Order', 'workorder?parent=wrkodr','Visit One' , 'visitone?wrk_ord='.$this->input->get('wrk_ord').'&wo=2', 'contentcontroller/visitone_update/'],
	['Work Order', 'workorder?parent=wrkodr','Visit Two' , 'visittwo?wrk_ord='.$this->input->get('wrk_ord').'&wo=3', 'contentcontroller/visittwo_update/'],
	['Work Order', 'workorder?parent=wrkodr','Visit Three' , 'visitthree?wrk_ord='.$this->input->get('wrk_ord').'&wo=4', 'contentcontroller/visitthree_update/'],
	// End Work Order Menu //
	// Ppm Catalog Menu //
	['PPM Catalog', 'catalogppm/' , 'contentcontroller/ppmsearch/','',''],
	['PPM Catalog', 'catalogppm/' , 'contentcontroller/wo/','',''],
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
	['Back To Main Page', 'Central', 'contentcontroller/vo3_Analysis/','',''],
	['Back To Main Page', 'Central', 'contentcontroller/vo3_report/','',''],
	['Back To Main Page', 'Central', 'contentcontroller/vo3_vvf/','',''],
	['Back To Main Page', 'contentcontroller/Central', 'contentcontroller/vo3/','',''],
	['Back To Main Page', 'Central', 'contentcontroller/vo3_C_main/','',''],
	['Back To Main Page', 'contentcontroller/Central', 'contentcontroller/vo3_assets_main/','',''],
	['Back To Main Page', 'contentcontroller/Central', 'contentcontroller/vo3_rates_main/','',''],
	['General', 'vo3_vvf?&rpt_no='.$this->input->get('rpt_no').'&vo=0' , 'contentcontroller/vo3_vvf_update/','',''],
	['Signatories', 'vo3_Signatories?&rpt_no='.$this->input->get('rpt_no').'&vo=1' , 'contentcontroller/vo3_Signatories_update/','',''],
	['Back To Main Page', 'content/'.$this->session->userdata('usersess'), 'contentcontroller/vo3_type_code/','',''],
	['Back To Main Page', 'vo3_type_code?&ratesid=120', 'contentcontroller/vo3_rate_item_update/','',''],
	//vo end //

	//siq menu //
	['CAR', 'qap3_SIQ_Number_update?ssiq='.$this->input->get('ssiq').'&m='.$this->input->get('m').'&y='.$this->input->get('y'), 'contentcontroller/qap3_car_edit/','',''],
	['SIQ PPM', 'qap3_PPM?&siq=1', 'contentcontroller/qap3_SIQ_Number_update/','',''],
	//siq end //
	
	['Back To Main Page', 'content/'.$this->session->userdata('usersess'), 'contentcontroller/joint_ins/','',''],
	['Back To Main Page', 'content/'.$this->session->userdata('usersess'), 'contentcontroller/daily_summary/','',''],
	['Back To Report', 'report_vols?m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat='.$this->input->get('stat').'&resch='.$this->input->get('resch'), 'contentcontroller/AssetRegis/','',''],
	['Back To Report', 'report_vols?m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat='.$this->input->get('stat').'&resch='.$this->input->get('resch'), 'contentcontroller/assethistory/','',''],

	//Procurement//
	['Procurement', 'contentcontroller/Procurement/'.$this->session->userdata('usersess').'?&tab=4', 'Procurement/pro_catalog/','',''],
	['Procurement', 'contentcontroller/Procurement/'.$this->session->userdata('usersess').'?&tab=4', 'Procurement/e_pr/','',''],
	['Procurement', 'contentcontroller/Procurement/'.$this->session->userdata('usersess').'?&tab=4', 'Procurement/Release_note/','',''],
	['Procurement', 'contentcontroller/Procurement/'.$this->session->userdata('usersess').'?&tab=4', 'Procurement/e_request/','',''],
	['Procurement', 'contentcontroller/Procurement/'.$this->session->userdata('usersess').'?&tab=4', 'Procurement/report/','',''],

	//stock
	['Stock', 'contentcontroller/Store?id='.$this->session->userdata('hosp_code').'', 'Procurement/release_note/','',''],
	/*['Release Note', 'contentcontroller/Store?id='.$this->session->userdata('hosp_code').'', 'Procurement/release_note/','',''],*/

];
if ($this->input->get('rs')== 1){
	$array = [
		//Report//
		['Back To Main Report', 'Schedule/', 'contentcontroller/report_RSReport/','',''],
		['Back To Main Report', 'Schedule/', 'contentcontroller/report_search_dwo/','',''],
		['Back To Main Report', 'Schedule/', 'contentcontroller/report_search_loc/','',''],
		//end report//
	];
}
//echo $this->uri->slash_segment(1) .":".$this->uri->slash_segment(2).'<br>';
$r=0;
foreach ($array as $list) {
	//print_r($list);
	//echo 'nilai c '.$list[2];
	//exit();
	    // $a contains the first element of the nested array,
	    // and $b contains the second element.
	    //echo $this->uri->slash_segment(1) .$this->uri->slash_segment(2).'abis';
	if ($list[2] == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){
		//echo "A: $a; B: $b\n C: $c\n <br />" ;
		if ($this->input->get('parent') == 'wrkodr' ){
			echo "
				<div class='menu-class'>
					<a href='contentcontroller/workorder?parent=wrkodr'><span class='icon-play2' valign='middle'></span> Work Order</a>
				</div>";
		}
		elseif ($this->input->get('siq') == 2 ){
			echo "
				<div class='menu-class'>
					<a href='qap3_SIQ?&siq=2'><span class='icon-play2' valign='middle'></span> SIQ Uptime</a>
				</div>";
		}
		elseif (
				( $this->input->get('en') == 'JISBMI')or
				( $this->input->get('en') == 'JISFH' ) or
				( $this->input->get('en') == 'JIS' ) or
				( $this->input->get('en') == 'JISDoc' )or
				( $this->input->get('en') == 'cls' ) or
				( $this->input->get('en') == 'clshosp' )or
				( $this->input->get('en') == 'clsdate' ) or
				( $this->input->get('en') == 'clsmon' )){
	
		}
		elseif (($this->input->get('en') == 'JISJNum' ) or ($this->input->get('en') == 'clsmondate' )){
			echo "
				<div class='menu-class'>
					<a href='content/".$this->session->userdata('usersess')."'><span class='icon-play2' valign='middle'></span> Back To Main Page</a>
				</div>";
		}
		elseif ( $this->input->get('resch') == 'bfbf') { 
			echo "
				<div class='menu-class'>
					<a href='report_rtlu?m=".$this->input->get('m').'&y='.$this->input->get('y').'&stat='.$this->input->get('stat').'&resch='.$this->input->get('resch').'&state='.$this->input->get('state')."'><span class='icon-play2' valign='middle'></span> Back To Main Page</a>
				</div>";
		}
		elseif (($this->input->get('state') == 'fbfb') and ($this->input->get('resch') == 'fbfb')) { 
			echo "
				<div class='menu-class'>
					<a href='report_reqwos?m=".$this->input->get('m').'&y='.$this->input->get('y').'&stat='.$this->input->get('stat').'&resch='.$this->input->get('resch').'&state='.$this->input->get('state')."'><span class='icon-play2' valign='middle'></span> Back To Main Page</a>
				</div>";
		}
		elseif ( $this->input->get('vppm') ){
			echo "
				<div class='menu-class'>
					<a href='catalogppm'><span class='icon-play2' valign='middle'></span> PPM Catalog ";
			if ($this->input->get('wrk_ord') != ''){ 
				echo " > ".$this->input->get('wrk_ord') ;
			}
			echo "</a></div>";
		}
		elseif ($this->input->get('parent') == '' ){
			echo "
				<div class='menu-class'>
					<a href='".site_url()."/$list[1]'><span class='icon-play2' valign='middle'></span> $list[0]";
			if ($this->input->get('wrk_ord') != ''){ 
				echo " > ".$this->input->get('wrk_ord') ;
			}elseif ($this->input->get('asstno') != ''){
		 		echo " > ".$result[0]->V_Tag_no." (".$this->input->get('asstno').")" ;
			}
			echo "</a></div>";
		}
		elseif ($this->input->get('parent') == 'complaint' ){
			echo "<div class='menu-class'><a href='".site_url()."/$list[1]'><span class='icon-play2' valign='middle'></span> $list[0]";
			echo "</a></div>";
		}
		else {
			echo "
				<div class='menu-class'>
					<a href='".site_url()."/$list[1]'><span class='icon-play2' valign='middle'></span> $list[0] > ".$asset_det[0]->V_Tag_no." (".$this->input->get('asstno').")</a>
				</div>";
		}
	}
	elseif ($list[4] == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){ 
		//if (isset('asstno='.$this->input->get('asstno'))){
			//print_r ('asstno='.$this->input->get('assetno'));
			//exit();
		//}
		echo "
			<div class='menu-class'>
				<a href='".site_url()."/$list[1]'><span class='icon-play2' valign='middle'></span>  $list[0]</a><a href='$list[3]'> <span class='icon-play2' valign='middle'></span> $list[2]</a>
			</div>";
	}

	/*-- buzzlee keluarkan function ni dari loop --*/
	/*-- atas alasan hasilnya keluar berulang --*/
	/*-- refer #pindah 1.0 --*/
	/*elseif (($this->input->get('asstno') != '') and ($this->input->get('tab') == '7')){
		echo "
			<div class='menu-class'>
				<a href='assets'><span class='icon-play2' valign='middle'></span> Asset";
		if ($this->input->get('wrk_ord') != ''){ 
			echo " > ".$this->input->get('wrk_ord') ;
		}elseif ($this->input->get('asstno') != ''){
			echo " > ".$result[0]->V_Tag_no." (".$this->input->get('asstno').")" ;
		}
		echo "</a></div>";
	}*/
	$list = $array[$r];
	$r++;
}

for ($i=0;$i< count($array);$i++){
	if( $array[$i][2] == $this->uri->slash_segment(1).$this->uri->slash_segment(2) ){
		$list = $array[$i];
	}else{
		if( $array[$i][0] == str_replace("/", "", $this->uri->slash_segment(1)) ){
			$list = $array[$i];
		}
	}
}
/*-- pindah 1.0 --*/
if (($this->input->get('asstno') != '') and ($this->input->get('tab') == '7')){
	echo "
		<div class='menu-class'>
			<a href='assets'><span class='icon-play2' valign='middle'></span> Asset";
	if ($this->input->get('wrk_ord') != ''){ 
		echo " > ".$this->input->get('wrk_ord') ;
	}elseif ($this->input->get('asstno') != ''){
		echo " > ".$result[0]->V_Tag_no." (".$this->input->get('asstno').")" ;
	}
	echo "</a></div>";
}
/*-- /pindah 1.0 --*/
if ($this->uri->slash_segment(1) == 'ppm_planered/'){
	echo "
		<div class='menu-class'>
			<a href='contentcontroller/assets'><span class='icon-play2' valign='middle'></span> Asset";
	echo "	</a>
		</div>";
}
if ($this->uri->slash_segment(1) .$this->uri->slash_segment(2) == 'contentcontroller/booking_list/'){
	echo "
		<div class='menu-class'>
			<a href='Booking_no?&work-a=0&parent=wrkodr'><span class='icon-play2' valign='middle'></span> Booking";
	echo "	</a>
		</div>";
}
if ('Procurement/' == $this->uri->slash_segment(1)){
	/*echo "
		<div class='menu-class'>
			<a href='contentcontroller/Store?id=".$this->session->userdata('hosp_code')."'><span class='icon-play2' valign='middle'></span> Store</a>
		</div>";*/
	//echo "dier mashuuuk";
	if($this->input->get('pro') == 'mrin'){
		// if( $this->uri->slash_segment(2)=="Release_note/" ){
		// 	echo "
		// 	<div class='menu-class'>
		// 		<a href='".site_url().$list[1].$this->session->userdata('usersess')."?&tab=4'><span class='icon-play2' valign='middle'></span>  Procurement</a>
		// 	</div>";
		// }else{
		// 	echo "
		// 	<div class='menu-class'>
		// 		<a href='".site_url().$list[1].$this->session->userdata('usersess')."?&tab=4'><span class='icon-play2' valign='middle'></span>  $list[0]</a>
		// 	</div>";
		// }
		echo "
		<div class='menu-class'>
			<a href='".site_url()."/".$list[1].$this->session->userdata('usersess')."?&tab=4'><span class='icon-play2' valign='middle'></span>  $list[0]</a>
		</div>";
	}elseif(($this->input->get('pro') == 'new') or (($this->input->get('pro') == 'pending')) ){
		if( $this->uri->slash_segment(2)=="Release_note/" ){
			echo "
			<div class='menu-class'>
				<a href='../contentcontroller/procurement/BEMS?&tab=4'><span class='icon-play2' valign='middle'></span>  Procurement</a><a href='".site_url()."/".$this->uri->slash_segment(1).rtrim($this->uri->slash_segment(2), '/')."?pro=mrin'> <span class='icon-play2' valign='middle'></span> MRIN</a>
			</div>";
		}else{
			echo "
			<div class='menu-class'>
				<a href='../contentcontroller/Store?id=".$this->session->userdata('hosp_code')."'><span class='icon-play2' valign='middle'></span>  Stock</a><a href='".site_url()."/".$this->uri->slash_segment(1).rtrim($this->uri->slash_segment(2), '/')."'> <span class='icon-play2' valign='middle'></span> Release Note</a>
			</div>";
		}
	}
		elseif(($this->input->get('po') != '')){
		echo "
		<div class='menu-class'>
			<a href='../contentcontroller/Procurement/".$this->session->userdata('usersess')."?&tab=4'>
				<span class='icon-play2' valign='middle'></span>  $list[0]
			</a>
			<a href='e_request?tab=0&y=".date('Y')."&m=".date('m')."'> 
				<span class='icon-play2' valign='middle'></span> PO Followup
			</a>
		</div>";
	}
	/*elseif ($this->uri->slash_segment(1)=="Release_note/" ) {
		echo "
		<div class='menu-class'>
			<a href='Store?id=".$this->session->userdata('hosp_code')."'><span class='icon-play2' valign='middle'></span> Store</a>
		</div>";
	}*/

}

if ('stockDtail/' == $this->uri->slash_segment(2) || 'stockact/' == $this->uri->slash_segment(2)){
	echo "
		<div class='menu-class'>
			<a href='Store?id=".$this->session->userdata('hosp_code')."'><span class='icon-play2' valign='middle'></span> Parts Catalog</a>
		</div>";
	//echo "dier mashuuuk";
}
else if ('bar_code/' == $this->uri->slash_segment(2) || 'store_item_new/' == $this->uri->slash_segment(2) || 'vendor_reg/' == $this->uri->slash_segment(2) || 'site_store_status/' == $this->uri->slash_segment(2) || 'new_item/' == $this->uri->slash_segment(2) ) 
{	
	echo "
		<div class='menu-class'>
			<a href='Store?id=".$this->session->userdata('hosp_code')."'><span class='icon-play2' valign='middle'></span> Stock</a>
		</div>";
}

else if ('sys_admin/' == $this->uri->slash_segment(2) ) 
{
	if(($this->input->get('gbl') == '1'))
	
		{	
			echo "
				<div class='menu-class'>
					<a href='sys_admin/BEMS?&tab=3'><span class='icon-play2' valign='middle'></span> Admin</a>
				</div>";
		}

		elseif (($this->input->get('ec') == '1')) {
			echo "
				<div class='menu-class'>
					<a href='sys_admin/BEMS?&tab=3'><span class='icon-play2' valign='middle'></span> Admin</a>
				</div>";
		}
		elseif (($this->input->get('us') == '1')) {
			echo "
				<div class='menu-class'>
					<a href='sys_admin/BEMS?&tab=3'><span class='icon-play2' valign='middle'></span> Admin</a>
				</div>";
		}
		elseif (($this->input->get('jt') == '1')) {
			echo "
				<div class='menu-class'>
					<a href='sys_admin/BEMS?&tab=3'><span class='icon-play2' valign='middle'></span> Admin</a>
				</div>";
		}
		elseif (($this->input->get('ud') == '1')) {
			echo "
				<div class='menu-class'>
					<a href='sys_admin/BEMS?&tab=3'><span class='icon-play2' valign='middle'></span> Admin</a>
				</div>";
		}

	}
	else if ('qap3/' == $this->uri->slash_segment(2) ) {
		echo "
				<div class='menu-class'>
					<a href='Central/BEMS?&tab=1'><span class='icon-play2' valign='middle'></span> Back To Main Page</a>
				</div>";

	}
/*else if ($this->uri->slash_segment(1) .$this->uri->slash_segment(2)  == 'Procurement/Release_note/') {
	echo "
		<div class='menu-class'>
			<a href='Store?id=".$this->session->userdata('hosp_code')."'><span class='icon-play2' valign='middle'></span> Store</a>
		</div>";
}*/


?>