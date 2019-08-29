<?php

if ($this->input->get('parent') == 'assets' ){
	if ($this->input->get('tab') == 9){ 
		echo "<span style='float:; padding-left:3px;'>";
		echo anchor ('contentcontroller/print_wn?asstno='. $this->input->get("asstno")  , '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print Warranty Notification <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>');
		echo"</span>"; 
	}
	elseif ($this->input->get('tab') == 10) {
		echo "<span style='float:; padding-left:3px;'>";
		echo anchor ('contentcontroller/print_et?asstno='. $this->input->get("asstno"), '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print Equipment Transfer <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>');
		echo"</span>";
	}
	elseif ($this->input->get('tab') == 11) {
		echo "<span style='float:; padding-left:3px;'>";
		echo anchor ('contentcontroller/print_we?asstno='. $this->input->get("asstno"), '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print Warranty Expiry <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>');
		echo"</span>";
	}
	elseif ($this->input->get('tab') == 12) {
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
if ($this->input->get('ppm') or 'contentcontroller/Wo/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){
	echo "<span style='float:; padding-left:3px;'>";
	echo anchor ('contentcontroller/print_ppm', '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print This PPM <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>');
	echo"</span>";
	echo "<div style='height:2px;'></div><span style='float:; padding-left:3px;'>";
	echo anchor ('contentcontroller/print_chklist1', '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print Checklist <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>');
	echo"</span>";
}
elseif ($this->input->get('ppm') or 'contentcontroller/desk_complaint/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){
	echo "<span style='float:; padding-left:3px;'>";
	echo anchor ('contentcontroller/print_complaint', '<button class="btn-button btn-primary-button" style="width:97%; height:33px;">Print This Complaint <span class="icon-printer" style="float:right; margin-top:-4px; margin-right:20px; font-size:30px;"></span></button>');
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
?>








