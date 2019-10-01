<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<table class="ui-desk-style-table3" style="color:black;" cellpadding="4" cellspacing="0" width="90%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="7"><span style="float: left; margin-top:8px; font-weight: bold;">Schedule 4 Reports for December 2014</span></td>
			</tr>
			<tr style="background:#B3130A;">
				<td width="3%" height="30px">
							<a href="?y=<?= $year-1?>&m=<?= $month?>"><img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="3%">
							<a href="?y=<?= ($month-1 == 0) ? $year-1 :$year?>&m=<?= ($month-1 == 0) ? 12 :$month-1?>"><img src="<?php echo base_url(); ?>images/arrow-left.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="88%" align="center">
							<?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?>
							</td>
							<td width="3%">
							<a href="?y=<?= ($month+1 == 13) ? $year+1 :$year?>&m=<?= ($month+1 == 13) ? 1 :$month+1?>"><img src="<?php echo base_url(); ?>images/arrow-right.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="3%">
							<a href="?y=<?= $year+1?>&m=<?= $month?>"><img src="<?php echo base_url(); ?>images/arrow-right2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
			</tr>
			<!--<tr>
				<td colspan="5">'Sample Function Start 090319' 'Sample Function End 090319'</td>
			</tr>-->
			<tr class="ui-content-color-style">
				<td colspan="4">
					<a href="#" onclick="javascript:myFunction2('report_dmc?m=<?=$month?>&y=<?=$year?>');"><img src="<?php echo base_url()?>images/user.png"  class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;Deduction Mapping Complaint</a>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-content-color-style2">
				<td colspan="4">
					<a href="#" onclick="javascript:myFunction('report_rmc?m=<?=$month?>&y=<?=$year?>');"><img src="<?php echo base_url()?>images/user.png"  class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;Deduction Mapping Unscheduled</a>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-content-color-style">
				<td colspan="4">
					<a href="#" onclick="javascript:myFunction('report_volu?m=<?=$month?>&y=<?=$year?>');"><img src="<?php echo base_url()?>images/user.png"  class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;Work Order Listing Unscheduled</a>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-content-color-style2">
				<td colspan="4">
					<a href="#" onclick="javascript:myFunction('report_vols?m=<?=$month?>&y=<?=$year?>');"><img src="<?php echo base_url()?>images/user.png"  class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;Work Order Listing Scheduled</a>
				</td>
				<td>&nbsp;</td>
			</tr>
			
			<tr class="ui-content-color-style">
				<td colspan="4">
					<a href="#" onclick="javascript:myFunction('report_rtlu?m=<?=$month?>&y=<?=$year?>');"><img src="<?php echo base_url()?>images/user.png"  class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;Response Time Listing Unscheduled</a>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-content-color-style2">
				<td colspan="4">
					<a href="#" onclick="javascript:myFunction('report_agl?m=<?=$month?>&y=<?=$year?>');"><img src="<?php echo base_url()?>images/user.png"  class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;Asset Group Listing</a>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-content-color-style">
				<td colspan="4">
					<a href="#" onclick="javascript:myFunction('report_vossu?m=<?=$month?>&y=<?=$year?>');"><img src="<?php echo base_url()?>images/user.png"  class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;Work Order Status Summary Unscheduled</a>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-content-color-style2">
				<td colspan="4">
					<a href="#" onclick="javascript:myFunction('report_alr');"><img src="<?php echo base_url()?>images/user.png"  class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;Asset Listing Report</a>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-content-color-style">
				<td colspan="4">
					<a href="#" onclick="javascript:myFunction('report_ppmp?m=<?=$month?>&y=<?=$year?>');"><img src="<?php echo base_url()?>images/user.png"  class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;PPM PERFORMANCE</a>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-content-color-style2">
				<td colspan="4">
					<a href="#" onclick="javascript:myFunction('report_rcmp?m=<?=$month?>&y=<?=$year?>');"><img src="<?php echo base_url()?>images/user.png"  class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;RCM PERFORMANCE</a>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-content-color-style">
				<td colspan="4">
					<a href="#" onclick="javascript:myFunction('report_qc?m=<?=$month?>&y=<?=$year?>');"><img src="<?php echo base_url()?>images/user.png"  class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;Quality Check</a>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-content-color-style2">
				<td colspan="4">
					<a href="#" onclick="javascript:myFunction('report_qapc?m=<?=$month?>&y=<?=$year?>');"><img src="<?php echo base_url()?>images/user.png"  class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;QAP Check</a>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-content-color-style">
				<td colspan="4">
					<a href="#" onclick="javascript:myFunction('report_qapac?m=<?=$month?>&y=<?=$year?>');"><img src="<?php echo base_url()?>images/user.png"  class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;QAP Asset Count</a>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-content-color-style2">
				<td colspan="4">
					<a href="#" onclick="javascript:myFunction('report_wc?m=<?=$month?>&y=<?=$year?>');"><img src="<?php echo base_url()?>images/user.png"  class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;Warranty Count</a>
				</td>
				<td>&nbsp;</td>
			</tr>
			<!--<tr class="ui-content-color-style">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_tcc?m='.$month.'&y='.$year, '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;T&C Count'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-content-color-style2">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_tcw?m='.$month.'&y='.$year, '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;T&C Without AV12'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-content-color-style">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_tcac?m='.$month.'&y='.$year, '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;T&C AV12 Summary'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>-->
			<tr class="ui-content-color-style">
				<td colspan="4">
					<a href="#" onclick="javascript:myFunction('report_ppmw?m=<?=$month?>&y=<?=$year?>');"><img src="<?php echo base_url()?>images/user.png"  class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;PPM Warranty</a>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-content-color-style2">
				<td colspan="4">
					<a href="#" onclick="javascript:myFunction('report_vl?m=<?=$month?>&y=<?=$year?>');"><img src="<?php echo base_url()?>images/user.png"  class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;Vendor Listing</a>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-content-color-style">
				<td colspan="4">
					<a href="#" onclick="javascript:myFunction('report_rp?m=<?=$month?>&y=<?=$year?>');"><img src="<?php echo base_url()?>images/user.png"  class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;RCM & PPM Listing</a>
				</td>
				<td>&nbsp;</td>
			</tr>
			<!--<tr class="ui-content-color-style">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/report_cr', '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;Clause Report'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>-->
			<tr class="ui-content-color-style2">
				<td colspan="4">
					<a href="#" onclick="javascript:myFunction('report_ppmuw?m=<?=$month?>&y=<?=$year?>');"><img src="<?php echo base_url()?>images/user.png"  class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;PPM Under Warranty</a>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-content-color-style">
				<td colspan="4">
					<a href="#" onclick="javascript:myFunction('report_ppmuw?m=<?=$month?>&y=<?=$year?>');"><img src="<?php echo base_url()?>images/user.png"  class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;RCM Under Warranty</a>
				</td>
				<td>&nbsp;</td>
			</tr>
			<!--<tr class="ui-content-color-style">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/sowr_joint_inspection', '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;Schedule Of Weekly Routine Joint Inpection'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>-->
			<!--<tr class="ui-content-color-style2">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/weeklyperiodic_planner', '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;Weekly / Periodic Planner'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>-->
			<!--<tr class="ui-content-color-style">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/dailyclean_planner', '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;Daily Cleansing Activities Planner'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>-->
			<!--<tr class="ui-content-color-style2">
				<td colspan="4">
					<a href="#" onclick="javascript:myFunction('schedule_p_work?m=<?=$month?>&y=<?=$year?>');"><img src="<?php echo base_url()?>images/user.png"  class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;Schedule Periodic Work</a>
				</td>
				<td>&nbsp;</td>
			</tr>-->
			<!--<tr class="ui-content-color-style">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/monthly_p_work', '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;Periodic Work ( Monthly Planner )'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>-->
			<tr class="ui-content-color-style2">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/job_schedule', '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;Job Schedule'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>
			<!--<tr class="ui-content-color-style2">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/usaCleansing_Items', '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;User Department And Application Cleansing Items'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>-->
			<!--<tr class="ui-content-color-style">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/gwcollection', '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;General Waste Collection Schedule'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>-->
			<tr class="ui-content-color-style">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/acg', '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;Customize Search'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-content-color-style2">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/fnindex_new', '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;Indicator Summary'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-content-color-style">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/fsfrinput', '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;Financial Input'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-content-color-style2">
				<td colspan="4">
					<?php echo anchor ('contentcontroller/fsfrindex_new', '<img src="'. base_url() .'images/user.png" alt="" class="ui-icon"/>&nbsp;&nbsp;&nbsp;&nbsp;Financial Summary'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="ui-header-new" style="height:2px;">
				<td align="center" colspan="7">
				</td>
			</tr>
		</table>
	</div>
</div>