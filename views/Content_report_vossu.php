<?php
if ($this->input->get('ex') == 'excel'){
$filename ="Work Order Status Summary Unscheduled - ".date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<?php if ($this->input->get('ex') == ''){?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">Work Order Status Summary Unscheduled</div>
    <button onclick="javascript:myFunction('report_vossu?m=<?=$month?>&y=<?=$year?>&none=closed');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>Schedule';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/report_vossu?m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&stat=<?=$this->input->get('stat');?>&ex=excel&none=close" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
	<?php } ?>
</div>
<?php } ?>
<div class="menu" style="position:relative;">
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_headprint.php';?>
<?php } ?>


<div class="m-div">
	<table class="rport-header">
		<tr>
			<td colspan="5">WORK ORDER RESPONSE SUMMARY - UNSCHEDULED - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> 
- <?php echo $this->session->userdata('usersessn');?></td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center; width:70%;" align="center">
		<tr>
			<th rowspan="2" width="25%">Period</th>
			<th rowspan="2" width="25%">Number of Request</th>
			<th colspan="2">Response Time</th>
		</tr>
		<tr>
			<th width="25%">On Time</td>
			<th width="25%">Late</td>
		</tr>
		<tr>								
			<td><?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
			<td><?= count($record) ?></td>
			<td><?= $kira['nOnTime'] ?></td>
			<td><?= $kira['nLate'] ?></td>
		</tr>
	</table>
	<div id="Instruction" class="tbl-none">
    	<table class="rport-header"  style="width:100%; text-align:center;" border="0">
			<tr>
				<td colspan="5"><i>The following is for your information only and will not be printed.</i></td>
			</tr>
		</table>
		<table class="tftable" border="1" style="text-align:center; width:70%;" align="center">
			<tr style="text-align:center;font-weight:bold;">
				<th>Priority</th>
				<th>Total Cases</th>
				<th>Maximum Allowed Response Time<br>(minute)</th>
				<th>Average Response Time</th>
			</tr>
			<tr style="text-align:center;">
				<td>Normal</td>
				<td><?=$kira['nNCases']?></td>
				<td><?=$kira['time_minN']?></td>
				<td><?= ($kira['time_minN'] != 0) && ($kira['nNCases'] != 0) ? $kira['time_minN']/$kira['nNCases'] : "0" ?></td>
			</tr>
			<tr style="text-align:center;">
				<td>Emergency</td>
				<td><?=$kira['nECases']?></td>
				<td><?=$kira['time_minE']?></td>
				<td><?= ($kira['time_minE'] != 0) && ($kira['nECases'] != 0) ? $kira['time_minE']/$kira['nECases'] : "0" ?></td>
			</tr>
			<tr style="text-align:center;vertical-align:top;color:red;font-weight:bold;">
				<td>Your attention is required:<br>CLOSED cases but NO RESPONSE INFORMATION</td>
				<td><?= $kira['nCErrorCases']  ?>&nbsp;</td>
				<td colspan="2"><?=$kira['nCErrorNo']?><br>&nbsp;</td>
			</tr>
			<tr style="text-align:center;">
				<th style="text-align:right;font-weight:bold;">Grand Total</th>
				<th style="font-weight:bold;"><?=$kira['nNCases']+$kira['nECases']+$kira['nCErrorCases']?></th>
				<th colspan="2">&nbsp;</th>
			</tr>
		</table>
		<table class="rport-header"  style="width:100%; text-align:center;" border="0">
			<tr>
				<td colspan="5"><i>All requests starting with 'RQ' are included in this report.</i></td>
			</tr>
			<tr>
				<td colspan="5"><i>All requests starting with 'AV' are NOT included in this report.</i></td>
			</tr>
		</table>
</div>
	
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td colspan="5">Work Order Response Summary - Unscheduled - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?><br><i>Computer Generated - CAMSIS</i></td>
		</tr>
	</table>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
<?php } ?>
<div class="menu" style="position:relative;">
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_headprint.php';?>
<?php } ?>

<div class="m-div">
	<table class="rport-header">
		<tr>
			<td colspan="5">WORK ORDER COMPLETION SUMMARY - UNSCHEDULED - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?>	</td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center; width:70%;" align="center">
		<tr style="font-weight:bold;text-align:center;">
			<th rowspan="2" width="220">Request Type</th>
			<th colspan="3">Work Order</th>
			<th colspan="2">Completed</th>
			<th colspan="2">Outstanding</th>
		</tr>
		<tr style="font-weight:bold;text-align:center;">
			<th>Generated</th>
			<th>Brought Forward</th>
			<th>Total</th>
			<th>Within<br>15 Days</th>
			<th>More than<br>15 Days</th>
			<th>Within<br>15 Days</th>
			<th>More than<br>15 Days</th>
		</tr>
		<tr style="text-align:center;">
			<th style="text-align:left;font-weight:bold;">Work Orders</th>
			<td>19&nbsp;</td>
			<td>0&nbsp;</td>
			<td>19&nbsp;</td>
			<td>12&nbsp;</td>
			<td>0&nbsp;</td>
			<td>6&nbsp;</td>
			<td>1&nbsp;</td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center; width:70%; margin-top:20px;" align="center">
		<tr>
		<tr style="font-weight:bold;text-align:center;">
			<th rowspan="2" width="220">Request Type</th>
			<th colspan="3">Work Order</th>
			<th colspan="2">Completed</th>
			<th colspan="2">Outstanding</th>
		</tr>
		<tr style="font-weight:bold;text-align:center;">
			<th>Generated</th>
			<th>Brought Forward</th>
			<th>Total</th>
			<th>Within<br>15 Days</th>
			<th>More than<br>15 Days</th>
			<th>Within<br>15 Days</th>
			<th>More than<br>15 Days</th>
		</tr>
		<tr style="text-align:center;">
			<th style="text-align:left;font-weight:bold;">User Request (A8)</th>
			<td>4&nbsp;</td>
			<td>0&nbsp;</td>
			<td>4&nbsp;</td>
			<td>4&nbsp;</td>
			<td>0&nbsp;</td>
			<td>0&nbsp;</td>
			<td>0&nbsp;</td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center; width:70%; margin-top:20px;" align="center">
		<tr>
		<tr style="font-weight:bold;text-align:center;">
			<th rowspan="2" width="220">Request Type</th>
			<th colspan="3">Work Order</th>
			<th colspan="2">Completed</th>
			<th colspan="2">Outstanding</th>
		</tr>
		<tr style="font-weight:bold;text-align:center;">
			<th>Generated</th>
			<th>Brought Forward</th>
			<th>Total</th>
			<th>Within<br>15 Days</th>
			<th>More than<br>15 Days</th>
			<th>Within<br>15 Days</th>
			<th>More than<br>15 Days</th>
		</tr>
		<tr style="text-align:center;">
			<th style="text-align:left;font-weight:bold;">Corrective Maintenance (A5)</th>
			<td>0&nbsp;</td>
			<td>0&nbsp;</td>
			<td>0&nbsp;</td>
			<td>0&nbsp;</td>
			<td>0&nbsp;</td>
			<td>0&nbsp;</td>
			<td>0&nbsp;</td>
		</tr>
	</table>
</div>

<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">Work Order Response Summary - Unscheduled - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?><br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>

<?php } ?>