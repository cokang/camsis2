<?php

if ($this->input->get('parent') == 'assets' ){
	if ($this->input->get('pf') == 1){ 
		echo "<span style='float:; padding-left:3px;'>";
		echo anchor ('contentcontroller/print_wn?asstno='. $this->input->get("asstno")  , '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print Warranty Notification <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>');
		echo"</span>"; 
	}
	elseif ($this->input->get('pf') == 2) {
		echo "<span style='float:; padding-left:3px;'>";
		echo anchor ('contentcontroller/print_et?asstno='. $this->input->get("asstno"), '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print Equipment Transfer <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>');
		echo"</span>";
	}
	elseif ($this->input->get('pf') == 3) {
		echo "<span style='float:; padding-left:3px;'>";
		echo anchor ('contentcontroller/print_we?asstno='. $this->input->get("asstno"), '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print Warranty Expiry <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>');
		echo"</span>";
	}
	elseif ($this->input->get('pf') == 4) {
		echo "<span style='float:; padding-left:3px;'>";
		echo anchor ('contentcontroller/print_wf?asstno='. $this->input->get("asstno"), '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print Warranty Form <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>');
		echo"</span>";
	}
}

if ($this->input->get('wrk_ord') == $this->input->get('wrk_ord')){
	if ($this->input->get('wo') or 'contentcontroller/workorderlist/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){
	echo "<span style='float:; padding-left:3px;'>";
	echo anchor ('contentcontroller/print_workorder?wrk_ord='.$this->input->get('wrk_ord'), '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print This Work Order <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>');
	echo"</span>";
	echo"<div style='height:2px;'></div><span style='float:; padding-left:3px;'>";
	echo anchor ('contentcontroller/print_wos?wrk_ord='.$this->input->get('wrk_ord'), '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print Work Order Status <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>');
	echo"</span>";
}
}
if ($this->input->get('vppm') or 'contentcontroller/wo/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){
	echo "<span style='float:; padding-left:3px;'>";
	echo anchor ('contentcontroller/print_ppm?wrk_ord='.$this->input->get('wrk_ord'), '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print This PPM <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>');
	echo"</span>";
	echo "<div style='height:2px;'></div><span style='float:; padding-left:3px;'>";
	if ($this->session->userdata('usersess') == "BES") {
	echo anchor ('contentcontroller/print_chklist1?wrk_ord='.$this->input->get('wrk_ord'), '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print Checklist <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>');
	} else {
	echo anchor ('contentcontroller/print_heppm?wrk_ord='.$this->input->get('wrk_ord'), '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print Checklist <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>');
	}
	echo"</span>";
}
if ('contentcontroller/assetupdate/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){
	echo "<div style='height:2px;'></div><span style='float:; padding-left:3px;'>";
	if ($this->session->userdata('usersess') == "BES") {
	echo anchor ('contentcontroller/print_chklist1?asstno='.$this->input->get('asstno'), '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print Checklist <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>');
	} else {
	echo anchor ('contentcontroller/print_heppm?asstno='.$this->input->get('asstno'), '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print Checklist <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>');
	}
	echo"</span>";
	}
elseif ($this->input->get('ppm') or 'contentcontroller/desk_complaint/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){
	echo "<span style='float:; padding-left:3px;'>";
	echo anchor ('contentcontroller/print_complaint?cmplnt_no='.$this->input->get('cmplnt_no'), '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print This Complaint <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>');
	echo"</span>";
}
if ( 'contentcontroller/wo_ppmgen_week/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){
	echo "<span style='float:; padding-left:3px;'>";
	echo anchor ('contentcontroller/print_ppm', '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print WORK ORDERS <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>');
	echo"</span>";
	echo "<div style='height:2px;'></div><span style='float:; padding-left:3px;'>";
	echo anchor ('contentcontroller/print_report2_wo_ppm_week_list', '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print WORK ORDERS <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>');
	echo"</span>";
}
if ( 'contentcontroller/acg_report/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){
	 if ($this->input->get('tabIndex') == 1){
	echo "<span style='float:; padding-left:3px;'>";
	$serv = isset($_REQUEST['n_base']) ? $_REQUEST['n_base'] : "";
	$mon = isset($_REQUEST['fromMonth']) ? $_REQUEST['fromMonth'] : "";
	$year = isset($_REQUEST['fromYear']) ? $_REQUEST['fromYear'] : "";
	echo anchor ("contentcontroller/D_Assessement?sev=". $serv ."&mth=".$mon."&yr=".$year, '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print Deduction Assessment <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>');
	echo"</span>";
	}
}
if ( 'contentcontroller/acg_report/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){
	 if ($this->input->get('tabIndex') == 2){
	echo "<span style='float:; padding-left:3px;'>";
	$serv = isset($_REQUEST['n_base']) ? $_REQUEST['n_base'] : "";
	$mon = isset($_REQUEST['fromMonth']) ? $_REQUEST['fromMonth'] : "";
	$year = isset($_REQUEST['fromYear']) ? $_REQUEST['fromYear'] : "";
	$reqstatus = isset($_POST['deductiont']) ? $data['t'] = $_POST['deductiont'] : $data['t'] = 1;
		
	echo anchor ("contentcontroller/D_Mapping?sev=". $serv ."&mth=".$mon."&yr=".$year, '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print Deduction Mapping <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>');
	echo"</span>";
		echo "<div style='height:10px;'></div><span style='float:; padding-left:3px;'>";
	echo anchor ("contentcontroller/deductmapping_2?sev=". $serv ."&mth=".$mon."&yr=".$year."&reqstatus=".$reqstatus, '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Deduction Mapping 2 <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>');
	echo"</span>";
	}
}
?>








