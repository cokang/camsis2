<?php
if ($this->input->get('ex') == 'excel'){
$filename ="QAP Check - ".date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<?php if ($this->input->get('ex') == ''){?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">QAP Check</div>
    <button onclick="javascript:myFunction('report_qapc?m=<?=$month?>&y=<?=$year?>&none=closed');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>Schedule';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/report_qapc?m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&stat=<?=$this->input->get('stat');?>&ex=excel&none=close" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
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
			<td colspan="5">SIQ WORK ORDER SUMMARY ALL HOSPITAL - <?php echo $this->session->userdata('usersessn');?></td>
		</tr>
	</table>
	<div id="Instruction" style="background:white;">
		<table class="tbl-wo-3" align="left">
			<tr>
				<td colspan="5">SIQ WO </td>
			</tr>
		</table>
	</div>
</div>
	<table class="tftable" border="1" style="text-align:center;" align="center">
		<tr >
			<th rowspan="2">No.</th>
			<th rowspan="2">Hospital Code</th>
			<th rowspan="2">Asset Type</th>
			<th rowspan="2">WO</th>
			<th rowspan="2">Asset</th>
			<th colspan="2" align="center">Uptime</th>
			<th rowspan="2">Request Date</th>
			<th rowspan="2">Closed Date</th>
			<th rowspan="2">Asset Aging</th>
			<th rowspan="2">Downtime</th>

		</tr>
		<tr>
			<th>Target</th>
			<th>Actual</th>
		</tr>
		<?php  
		//$formatter = new NumberFormatter('en_US', NumberFormatter::PERCENT);
		//print $formatter->format(.45);
		if (!empty($record)) {?>
				<?php $numrow = 1; foreach($record as $row):?>
		<tr>
			<td><?= $numrow ?></td>
			<td><?= ($row->hospital_code) ? $row->hospital_code : 'NA' ?></td>
			<td><?= ($row->type_code) ? $row->type_code : 'NA' ?></td>
			<td><?= ($row->work_order_no) ? $row->work_order_no : 'NA' ?></td>
			<td><?= ($row->asset_no) ? $row->asset_no : 'NA' ?></td>
			<td><?= ($row->trpi) ? $row->trpi : 'NA' ?></td>
			<td><?= ($row->uptime_pct) ? $row->uptime_pct : 'NA' ?></td>
			<td><?= ($row->wo_dates) ? $row->wo_dates : 'NA' ?></td>
			<td><?= ($row->completed_dates) ? $row->completed_dates : 'NA' ?></td>
			<td><?= ($row->asset_age) ? $row->asset_age : 'NA' ?></td>
			<td><?= ($row->down_time) ? $row->down_time : 'NA' ?></td>
		</tr>
		<?php $numrow++; ?>
			    		<?php endforeach;?>
			    		<?php }else { ?>
						<tr align="center" style="background:white; height:200px;">
	    					<td colspan="11"><span style="color:red;">NO RECORDS FOUND.</span></td>
	    				</tr>
						<?php } ?>
	</table>
	
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">QAP Check<br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
<?php } ?>