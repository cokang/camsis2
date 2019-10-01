<?php
if ($this->input->get('ex') == 'excel'){
$filename ="RCM & PPM LISTING - ".date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<?php if ($this->input->get('ex') == ''){?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">RCM & PPM LISTING</div>
    <button onclick="javascript:myFunction('report_rp?m=<?=$month?>&y=<?=$year?>&none=closed');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>Schedule';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/report_rp?m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&stat=<?=$this->input->get('stat');?>&ex=excel&none=close" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
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
			<td colspan="5">MONTHLY RCM & PPM LISTING ALL HOSPITAL - <?= ($records[0]->v_HospitalName) ? $records[0]->v_HospitalName : 'NA' ?> - <?php echo $this->session->userdata('usersessn');?></td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center;">
		<tr>
			<th rowspan="2">Hospital</th>
			<th colspan="2">RCM</th>
			<th colspan="2">PPM</th>
		</tr>
		<tr>
			<th>Closed More Than 15 Days</th>
			<th>Not Closed</th>
			<th>Not Closed As Schedule</th>
			<th>Not Closed</th>
		</tr>
		<tr>
			<td><?= ($records[0]->v_HospitalCode) ? $records[0]->v_HospitalCode : 'NA' ?></td>
			<td><?= ($record1[0]->Total) ? $record1[0]->Total : '0' ?></td>
			<td><?= ($record2[0]->Total) ? $record2[0]->Total : '0' ?></td>
			<td><?= ($record3[0]->Total) ? $record3[0]->Total : '0' ?></td>
			<td><?= ($record4[0]->Total) ? $record4[0]->Total : '0' ?></td>
		</tr>
	</table>
</div>
<?php if ($this->input->get('ex') == ''){?>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">RCM & PPM LISTING<br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>
<?php } ?>

