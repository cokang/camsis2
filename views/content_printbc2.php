<?php

$a = '"';
if ($this->input->get('parent') == 'assets' ){
	if ($this->input->get('tab') == 9){ 
		echo "<span style='float:; padding-left:3px;' onclick='javascript:myFunction(".$a."print_wn?asstno=".$this->input->get('asstno')."".$a.");'>";
		echo '<button class="btn-button btn-primary-button"  style="width:97%; height:33px;">Print Warranty Notification <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>';
		echo "</span>"; 
	}
	elseif ($this->input->get('tab') == 10) {
		echo "<span style='float:; padding-left:3px;' onclick='javascript:myFunction(".$a."print_et?asstno=".$this->input->get('asstno')."".$a.");'>";
		echo '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print Equipment Transfer <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>';
		echo "</span>";
	}
	elseif ($this->input->get('tab') == 11) {
		echo "<span style='float:; padding-left:3px;' onclick='javascript:myFunction(".$a."print_we?asstno=".$this->input->get('asstno')."".$a.");'>";
		echo '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print Warranty Expiry <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>';
		echo "</span>";
	}
	elseif ($this->input->get('tab') == 12) {
		echo "<span style='float:; padding-left:3px;' onclick='javascript:myFunction(".$a."print_wf?asstno=".$this->input->get('asstno')."".$a.");'>";
		echo '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print Warranty Form <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>';
		echo "</span>";
	}
}

if ($this->input->get('wrk_ord') == $this->input->get('wrk_ord')){
	if ($this->input->get('wo') or 'contentcontroller/workorderlist/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){
	echo "<span style='float:; padding-left:3px;' onclick='javascript:myFunction(".$a."print_workorder?wrk_ord=".$this->input->get('wrk_ord')."".$a.");'>";
	echo '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print This Work Order <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>';
	echo "</span>";
	echo "<div style='height:2px;'></div><span style='float:; padding-left:3px;' onclick='javascript:myFunction(".$a."print_wos?wrk_ord=".$this->input->get('wrk_ord')."".$a.");'>";
	echo '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print Work Order Status <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>';
	echo"</span>";
}
}
if ($this->input->get('vppm') or 'contentcontroller/wo/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){
	echo "<span style='float:; padding-left:3px;' onclick='javascript:myFunction(".$a."print_ppm?wrk_ord=".$this->input->get('wrk_ord')."".$a.");'>";
	echo '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print This PPM <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>';
	echo "</span>";
	echo "<div style='height:2px;'></div><span style='float:; padding-left:3px;' onclick='javascript:myFunction(".$a."print_chklist1?wrk_ord=".$this->input->get('wrk_ord')."".$a.");'>";
	echo '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print Checklist <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>';
	echo"</span>";
}
elseif ($this->input->get('ppm') or 'contentcontroller/desk_complaint/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){
	echo "<span style='float:; padding-left:3px;' onclick='javascript:myFunction(".$a."print_complaint?cmplnt_no=".$this->input->get('cmplnt_no')."".$a.");'>";
	echo '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print This Complaint <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>';
	echo "</span>";
}
if ( 'contentcontroller/wo_ppmgen_week/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){
	echo "<span style='float:; padding-left:3px;' onclick='javascript:myFunction(".$a."print_ppm".$a.");'>";
	echo '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print WORK ORDERS <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>';
	echo "</span>";
	echo "<div style='height:2px;'></div><span style='float:; padding-left:3px;' onclick='javascript:myFunction(".$a."print_report2_wo_ppm_week_list".$a.");'>";
	echo '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print WORK ORDERS <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>';
	echo "</span>";
}
?>





