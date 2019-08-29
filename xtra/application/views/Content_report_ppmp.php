<?php
if ($this->input->get('ex') == 'excel'){
$filename ="PPM Work Order Performance - ".date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<?php if ($this->input->get('ex') == ''){?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">PPM Work Order Performance</div>
    <button onclick="javascript:myFunction('report_ppmp?m=<?=$month?>&y=<?=$year?>&none=closed');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>Schedule';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/report_ppmp?m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&stat=<?=$this->input->get('stat');?>&ex=excel&none=close" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
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
			<td colspan="5">MONTHLY PPM PERFORMANCE REPORT <?= ($records[0]->v_HospitalCode) ? $records[0]->v_HospitalCode : 'NA' ?> - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?></td>
		</tr>
	</table>
<?php if ($this->input->get('ex') == ''){?>
	<div id="Instruction">
	<center>View List : 
<form method="post" action="">
<select name="wrty-status">
	<option selected value="all">All</option>
	<option  value="auw">Asset Under Warranty</option>
	<option  value="apw">Asset Post Warranty</option>
</select>
<input type="submit" value="Apply" /></center>
</form>
</div>
<?php } ?>
	<table class="tftable" border="1" style="text-align:center;" align="center">
		<tr >
			<th>Hospital</th>
			<th>WO Generated</th>
			<th>WO Closed</th>
			<th>% Closed</th>
			<th>QAP WO Closed</th>
			<th>Closed As Scheduled</th>
			<th>% Closed As Scheduled</th>
			<th>Closed Not As Scheduled</th>
			<th>% Closed Not As Scheduled</th>
			<th>QAP Closed Not As Scheduled</th>
			<th>Not Closed</th>
			<th>% Not Closed</th>
			<th>QAP Not Closed</th>
		</tr>
		<?php  
		//$formatter = new NumberFormatter('en_US', NumberFormatter::PERCENT);
		//print $formatter->format(.45);
		if (!empty($record)) {?>
				<?php $numrow = 1; foreach($record as $row):?>
		<tr>
			<td><?= ($row->v_hospitalcode) ? $row->v_hospitalcode : 'N/A' ?></td>
			<td><?= ($row->Total) ? $row->Total : 'N/A' ?></td>
			<td><?= ($row->ctotal) ? $row->ctotal : 'N/A' ?></td>
			<td><?= ($row->ctotal) ? sprintf("%.2f%%", ($row->ctotal/$row->Total) * 100) : 'N/A' ?></td>
			<td><?= ($row->qctotal) ? $row->qctotal : 'N/A' ?></td>
			<td><?= ($row->cstotal) ? $row->cstotal : 'N/A' ?></td>
			<td><?= ($row->Total) ? sprintf("%.2f%%", ($row->cstotal/$row->Total) * 100) : 'N/A' ?></td>
			<td><?= ($row->Total) ? ($row->Total - $row->cstotal) : 'N/A' ?></td>
			<td><?= ($row->Total) ? sprintf("%.2f%%", (($row->Total - $row->cstotal)/$row->Total) * 100) : 'N/A' ?></td>
			<td><?= ($row->qcnstota) ? $row->qcnstota : 'N/A' ?></td>
			<td><?= ($row->nctotal) ? $row->nctotal : 'N/A' ?></td>
			<td><?= ($row->Total) ? sprintf("%.2f%%", ($row->nctotal/$row->Total) * 100) : 'N/A' ?></td>
			<td><?= ($row->qnctotal) ? $row->qnctotal : 'N/A' ?></td>
		</tr>
		<?php $numrow++; ?>
			    		<?php endforeach;?>
			    		<?php }else { ?>
						<tr align="center" style="background:white; height:200px;">
	    					<td colspan="20"><span style="color:red;">NO RECORDS FOUND.</span></td>
	    				</tr>
						<?php } ?>	

	</table>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">PPM PERFORMANCE Report - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?><br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
<?php } ?>