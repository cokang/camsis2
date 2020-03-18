<?php $number = 0; ?>
<div class="ui-middle-screen">
<table class="table-middle-screen-2" border="0">
<tr>
    <td valign="top" style="width: 13%; border-style:none;";>
	<div class="content-workorder" align="center">
		<table class="ui-desk-style-table3" style="color:black;" cellpadding="4" cellspacing="0" width="90%">
			<form method="get" action="">
				<tr class="ui-color-contents-style-1" height="40px">
					<td class="ui-header-new" colspan="7"><span style="float: left; margin-top:5px; font-weight: bold; margin-right:7px;">Reports By Group </span>
					<?php
							$assetgroup = array(
								'' => 'All',
								'1' => 'Group 1',
								'1B' => 'Group 1B',
								'2' => 'Group 2',
								'3' => 'Group 3',
								'4' => 'Group 4',
								'5' => 'Group 5'
								);
						?>
						<?php echo form_dropdown('grp', $assetgroup, set_value('grp',$grpsel) , 'class="dropdown" style="width:140px;" onchange="this.form.submit()"'); ?>
						<input type="hidden" value="<?php echo set_value('m', ($this->input->get('m')) ? $this->input->get('m') : ''); ?>" name="m">
						<input type="hidden" value="<?php echo set_value('y', ($this->input->get('y')) ? $this->input->get('y') : ''); ?>" name="y">
					</td>
				</tr>
			</form>
			<tr style="background:#B3130A;display: block;">
				<td width="3%" height="30px">
					<a href="?y=<?= $year-1?>&m=<?= $month?>&grp=<?php echo $this->input->get('grp')?>"><img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-ui-icon2" style="padding-top:4px; padding-left:4px;"/></a>
				</td>
				<td width="3%">
					<a href="?y=<?= ($month-1 == 0) ? $year-1 :$year?>&m=<?= ($month-1 == 0) ? 12 :$month-1?>&grp=<?php echo $this->input->get('grp')?>"><img src="<?php echo base_url(); ?>images/arrow-left.png" alt="" class="ui-img-ui-icon2" style="padding-top:4px; padding-left:4px;"/></a>
				</td>
				<td width="88%" align="center" style="color:white; font-weight:bold;">
					<?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?>
				</td>
				<td width="3%">
					<a href="?y=<?= ($month+1 == 13) ? $year+1 :$year?>&m=<?= ($month+1 == 13) ? 1 :$month+1?>&grp=<?php echo $this->input->get('grp')?>"><img src="<?php echo base_url(); ?>images/arrow-right.png" alt="" class="ui-img-ui-icon2" style="padding-top:4px; padding-left:4px;"/></a>
				</td>
				<td width="3%">
					<a href="?y=<?= $year+1?>&m=<?= $month?>&grp=<?php echo $this->input->get('grp')?>"><img src="<?php echo base_url(); ?>images/arrow-right2.png" alt="" class="ui-img-ui-icon2" style="padding-top:4px; padding-left:4px;"/></a>
				</td>
			</tr>
			<?php

			function evenodd($numberx) {
				//$number++;
				if ($numberx % 2 == 0) {
					return "ui-rpt-color-style2";
				}
				else {
				   return "ui-rpt-color-style";
				}
			}
			?>

			<!--<tr>
				<td colspan="5">'Sample Function Start 090319' 'Sample Function End 090319'</td>
			</tr>-->
			<?php if (!in_array("contentcontroller/Attendance", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/Attendance?en=Report','<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Attendance Report'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/Attendance", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/Attendance?en=Detail','<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Attendance Detail'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/complaintreport", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/complaintreport','<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Daily Patrolling  Summary'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/complaintlevel", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/complaintlevel','<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Daily Patrolling  Detail'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/daily_summary", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/daily_summary?en=cls','<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Daily Cleaning Activity Summary'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/daily_summary", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/daily_summary?en=clsdate&path=DCAD','<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Daily Cleaning Activity Detail'); ?>
				</td>
			</tr>
			<?php  } ?>

			<?php  if (!in_array("contentcontroller/joint_ins", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/joint_ins?en=JIS','<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Joint Inspection Summary'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/joint_ins", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/joint_ins?en=JISJNum&path=JISSH','<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Joint Inspection Detail'); ?>
				</td>
			</tr>
			<?php  } ?>

			<?php  if (!in_array("contentcontroller/report_ppmwos", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_ppmwos?m='.$month.'&y='.$year.'&grp='.$this->input->get('grp'), '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;PPM Work Order Summary'); ?>
				</td>
			</tr>
			<?php  } ?>

			<?php  if (!in_array("contentcontroller/report_vols", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_vols?m='.$month.'&y='.$year.'&stat=fbfb&resch=nt&grp='.$this->input->get('grp'), '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;PPM Work Order Listing'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php  if (!in_array("contentcontroller/report_ppmwos", $chkers)) { ?><!--RI-->
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_ppmwos?m='.$month.'&y='.$year.'&filby=RI&grp='.$this->input->get('grp'), '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;RI Work Order Summary'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php  if (!in_array("contentcontroller/report_vols", $chkers)) { ?><!--RI-->
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_vols?m='.$month.'&y='.$year.'&filby=RI&stat=fbfb&resch=nt&grp='.$this->input->get('grp'), '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;RI Work Order Listing'); ?>
				</td>
			</tr>
			<?php  } ?>

			<?php  if (!in_array("contentcontroller/report_ppmwosf", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_ppmwos?m='.$month.'&y='.$year.'&grp='.$this->input->get('grp').'&fon=on', '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;PPM Work Order Summary (Freeze)'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php  if (!in_array("contentcontroller/report_volsf", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_vols?m='.$month.'&y='.$year.'&stat=fbfb&resch=nt&grp='.$this->input->get('grp').'&fon=on', '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;PPM Work Order Listing (Freeze)'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php  if (!in_array("contentcontroller/report_reqwos", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_reqwos?m='.$month.'&y='.$year.'&grp='.$this->input->get('grp'), '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Request Work Order Summary'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php  if (!in_array("contentcontroller/report_volu", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_volu?m='.$month.'&y='.$year.'&stat=fbfb&grp='.$this->input->get('grp'), '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Request Work Order Listing'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php  if (!in_array("contentcontroller/report_reqwosf", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_reqwos?m='.$month.'&y='.$year.'&grp='.$this->input->get('grp').'&fon=on', '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Request Work Order Summary (Freeze)'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php  if (!in_array("contentcontroller/report_voluf", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_volu?m='.$month.'&y='.$year.'&stat=fbfb&grp='.$this->input->get('grp').'&fon=on', '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Request Work Order Listing (Freeze)'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php  if (($this->session->userdata('usersess') == 'FES') || ($this->session->userdata('usersess') == 'BES')) {?>
			<?php  if (!in_array("contentcontroller/report_reqwosbyyear", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_reqwosbyyear?m='.$month.'&y='.$year.'&stat=fbfb&resch=nt&grp='.$this->input->get('grp'), '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Request Work Order Summary By Year'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php  if (!in_array("contentcontroller/report_volubyyear", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_volubyyear?m='.$month.'&y='.$year.'&stat=fbfb&resch=nt&grp='.$this->input->get('grp'), '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Request Work Order Listing By Year '); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php  } ?>
			<?php  if (!in_array("contentcontroller/report_Incidences_Summary", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_Incidences_Summary?m='.$month.'&y='.$year.'&grp='.$this->input->get('grp'), '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Incidences Report Summary'); ?>
				</td>
			<?php  } ?>
			<?php  if (!in_array("contentcontroller/report_Incidences_Listing", $chkers)) { ?>
			</tr>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_Incidences_Listing?m='.$month.'&y='.$year.'&stat=fbfb&grp='.$this->input->get('grp'), '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Incidences Report Listing'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php  if (!in_array("contentcontroller/report_cwos", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_cwos?m='.$month.'&y='.$year.'&grp='.$this->input->get('grp'), '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Complaint Summary'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php  if (!in_array("contentcontroller/report_volc", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_volc?m='.$month.'&y='.$year.'&stat=fbfb&grp='.$this->input->get('grp'), '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Complaint Listing'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php  if (!in_array("contentcontroller/report_reswos", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_reswos?m='.$month.'&y='.$year.'&grp='.$this->input->get('grp'), '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Response Time Summary'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php  if (!in_array("contentcontroller/report_rtlu", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_rtlu?m='.$month.'&y='.$year.'&grp='.$this->input->get('grp'), '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Response Time Listing'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php  if (!in_array("contentcontroller/report_sls", $chkers)) { ?>
				<?php $tabstatutoryname=($this->session->userdata('usersessn')=='HOUSEKEEPING') ? 'Chemical Approved List' : 'Statutory & License Summary';?>
				<tr class="<?php  $number++; echo evenodd($number); ?>">
					<td colspan="4">
						<?php echo anchor ('contentcontroller/report_sls?m='.$month.'&y='.$year.'&grp='.$this->input->get('grp'), '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;'.$tabstatutoryname); ?>
					</td>
				</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/spare_part", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
				<?php if ($this->session->userdata('usersess') == "SEC") { ?>
				 <?php echo anchor ('contentcontroller/spare_part','<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Equipment Summary'); ?>
				<?php } else { ?>
					<?php echo anchor ('contentcontroller/spare_part','<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Spare Part Summary'); ?>
				<?php  }?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/report_agl", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_agl?m='.$month.'&y='.$year.'&grp='.$this->input->get('grp'), '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Asset Group Summary'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/report_alr", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_alr?&grp='.$this->input->get('grp'), '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Asset Listing Report'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/report_dmc", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_dmc?m='.$month.'&y='.$year, '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Deduction Mapping Complaint'); ?>
				</td>
			</tr>
			<?php  } ?>

			<?php if (!in_array("contentcontroller/report_rmc", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_rmc?m='.$month.'&y='.$year, '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Deduction Mapping Work Order Request'); ?>
				</td>
			</tr>
			<?php  } ?>
			<!--<tr class="ui-rpt-color-style2">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_ppmwos?m='.$month.'&y='.$year, '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Camsis Performance Report'); ?>
				</td>
			</tr>-->




			<?php if (!in_array("contentcontroller/report_vossu", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_vossu?m='.$month.'&y='.$year, '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Work Order Request Status Summary'); ?>
				</td>
			</tr>
			<?php  } ?>

			<?php if (!in_array("contentcontroller/report_ppmp", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_ppmp?m='.$month.'&y='.$year, '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;PPM Work Order Performance'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/report_rcmp", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_rcmp?m='.$month.'&y='.$year, '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Work Order Request Performance'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/report_qc", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_qc?m='.$month.'&y='.$year, '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Quality Check'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/report_qapc", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_qapc?m='.$month.'&y='.$year, '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;QAP Check'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/report_qapac", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_qapac?m='.$month.'&y='.$year.'&grp='.$this->input->get('grp'), '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;QAP Asset Count'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/report_wc", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_wc?m='.$month.'&y='.$year, '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Warranty Count'); ?>
				</td>
			</tr>
			<?php  } ?>

			<!--<tr class="ui-rpt-color-style">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_tcc?m='.$month.'&y='.$year, '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;T&C Count'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-rpt-color-style2">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_tcw?m='.$month.'&y='.$year, '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;T&C Without AV12'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-rpt-color-style">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_tcac?m='.$month.'&y='.$year, '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;T&C AV12 Summary'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>-->
			<?php if (!in_array("contentcontroller/report_ppmw", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_ppmw?m='.$month.'&y='.$year, '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;PPM Warranty'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/report_vl", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_vl?m='.$month.'&y='.$year, '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Vendor Listing'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/report_rp", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_rp?m='.$month.'&y='.$year, '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Work Order Request & PPM Work Order Listing'); ?>
				</td>
			</tr>
			<!--<tr class="ui-rpt-color-style">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_cr', '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Clause Report'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>-->
			<?php  } ?>
			<?php if (!in_array("contentcontroller/report_ppmuw", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_ppmuw?m='.$month.'&y='.$year.'&grp='.$this->input->get('grp'), '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;PPM Work Order Under Warranty'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/report_rcmuw", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_rcmuw?m='.$month.'&y='.$year.'&grp='.$this->input->get('grp'), '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Work Order Request Under Warranty'); ?>
				</td>
			</tr>
			<!--<tr class="ui-rpt-color-style">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/sowr_joint_inspection', '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Schedule Of Weekly Routine Joint Inpection'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>-->
			<!--<tr class="ui-rpt-color-style2">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/weeklyperiodic_planner', '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Weekly / Periodic Planner'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>-->
			<!--<tr class="ui-rpt-color-style">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/dailyclean_planner', '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Daily Cleansing Activities Planner'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>-->
			<?php  } ?>
			<?php if (!in_array("contentcontroller/schedule_p_work", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/schedule_p_work', '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Schedule Periodic Work'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/vendor_reg", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/vendor_reg?m='.$month.'&y='.$year, '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Vendor Reg'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/vendor_reg_update", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/vendor_reg_update?m='.$month.'&y='.$year, '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Vendor Reg Update'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/AssetRegis", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/AssetRegis?tab=Maintenance','<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Asset Register'); ?>
				</td>
			</tr>
			<?php  } ?>


			<!--<tr class="ui-rpt-color-style">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/monthly_p_work', '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Periodic Work ( Monthly Planner )'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>-->
			<!--
			<tr class="ui-rpt-color-style">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/job_schedule', '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Job Schedule'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-rpt-color-style2">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/usaCleansing_Items', '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;User Department And Application Cleansing Items'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-rpt-color-style">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/gwcollection', '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;General Waste Collection Schedule'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-rpt-color-style2">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/acg', '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Customize Search'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-rpt-color-style">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/fnindex_new', '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Indicator Summary'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-rpt-color-style2">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/fsfrinput', '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Financial Input'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-rpt-color-style">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/fsfrindex_new', '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Financial Summary'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>-->


			<?php if (!in_array("contentcontroller/fnex", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/fnex','<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Financial Report'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/acg_report", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/acg_report?tabIndex=1&ag=1','<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Deduction Mapping Report'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/broughtfwd", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/broughtfwd?m='.$month.'&y='.$year,'<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Unscheduled Brought Forward WO Summary'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/report_RSReport", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_RSReport?m='.$month.'&y='.$year.'&rs=1','<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Request Work Order By Date'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/report_search_dwo", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_search_dwo?m='.$month.'&y='.$year.'&rs=1','<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Search'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/assetnextppm", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/assetnextppm?m='.$month.'&y='.$year.'&dept=','<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Asset Next PPM'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/report_search_loc", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_search_loc?m='.$month.'&y='.$year.'&rs=1','<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Search By Location'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php  if (($this->session->userdata('usersess') == 'BES') || ($this->session->userdata('usersess') == 'FES')) {?>
			<?php if (!in_array("contentcontroller/ttlexp", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/ttlexp?m='.$month.'&y='.$year.'&grp='.$this->input->get('grp'),'<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Expiring Statutory & License Report'); ?>
				</td>
			</tr>
			<?php  } ?>

			<?php  } ?><!--fes reports-->
			<?php  if (($this->session->userdata('usersess') == 'FES') || ($this->session->userdata('usersess') == 'BES')) {?>
			<?php if (!in_array("contentcontroller/report_fdreport", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
				<?php if ($this->session->userdata('usersess') == 'FES') { ?>
					<?php echo anchor ('contentcontroller/report_fdreport?m='.$month.'&y='.$year.'&grp='.$this->input->get('grp'),'<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Fes Daily Report'); ?>
				<?php } else {?>
				<?php echo anchor ('contentcontroller/report_fdreport?m='.$month.'&y='.$year.'&grp='.$this->input->get('grp'),'<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Bes Daily Report'); ?>
				<?php } ?>
				</td>
			</tr>
			<?php  } ?>



			<?php  } ?>
			<?php  if ($this->session->userdata('usersess') == 'HKS') {?>
			<?php if (!in_array("contentcontroller/Unsatisfactory_by_Group", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/Unsatisfactory_by_Group?m='.$month.'&y='.$year.'&rs=1','<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Unsatisfactory by Group'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/release_note", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/release_note_print?m='.$month.'&y='.$year.'&rs=1','<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Release Note'); ?>
				</td>
			</tr>
			<?php  } ?>

			<?php  if (!in_array("contentcontroller/report_reqwosbya2", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_reqwosbya2?m='.$month.'&y='.$year.'&stat=fbfb&resch=nt&grp='.$this->input->get('grp'), '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Schedule Corrective Maintenance (SCM) Summary'); ?>
				</td>
			</tr>
			<?php  } ?>

			<?php if (!in_array("contentcontroller/report_a2", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_a2?m='.$month.'&y='.$year.'&stat=fbfb&resch=nt&grp='.$this->input->get('grp'), '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Schedule Corrective Maintenance (SCM) Listing'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php if (!in_array("contentcontroller/woa10_report", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/woa10_report?m='.$month.'&y='.$year.'&stat=fbfb&resch=nt&grp='.$this->input->get('grp'), '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Work Order A10 Summary Report'); ?>
				</td>
			</tr>
			<?php  } ?>

			<?php  if (!in_array("contentcontroller/report_volu", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_volu?req=AP19&m='.$month.'&y='.$year.'&stat=fbfb&grp='.$this->input->get('grp'), '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Request AP19 Listing'); ?>
				</td>
			</tr>
			<?php  } ?>
			<?php  if (!in_array("contentcontroller/root_cause", $chkers)) { ?>
			<tr class="<?php  $number++; echo evenodd($number); ?>">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/root_cause', '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon2"/>&nbsp;&nbsp;&nbsp;&nbsp;Root Cause Work Order Listing'); ?>
				</td>
			</tr>
			<?php  } ?>
			<tr class="ui-header-new" style="height:2px;">
				<td align="center" colspan="7">
				</td>
			</tr>
		</table>
	</div>
	</td>
	</tr>
	</table>
</div>
