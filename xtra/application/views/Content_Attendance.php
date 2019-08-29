<?php if ($this->input->get('ex') == ''){?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">
	<?php if($this->input->get('en') == 'Report'){echo 'Attendance Report'; }else{echo 'Attendance Detail';}?>
	</div>
     <button onclick="javascript:myFunction('Attendance?m=<?=$month?>&y=<?=$year?>&none=closed&en=<?php echo $this->input->get('en');?>&ex=ex');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>Schedule';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/Attendance?en=<?=$this->input->get('en');?>&ex=excel&none=close" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
	<?php } ?>
</div>
<?php } ?>
<?php
if ($this->input->get('ex') == 'excel'){
$filename ="excelAttendance.xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<div class="menu" style="position:relative;">
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_headprint.php';?>
<?php } ?>
<div class="m-div">
	<table class="rport-header">
		<tr>
			<td colspan="5"><?php if($this->input->get('en') == 'Report'){echo 'Attendance Report'; }else{echo 'Attendance Detail';}?> - <?php echo $this->session->userdata('usersessn');?></td>
		</tr>
	</table>
</form>
</div>
<div class="m-div">
	<table class="tftable" border="1" style="text-align:center;">
		<tr>
			<th colspan="6">Employee Name : Jones,Susan C (7081)</th></tr>
		<tr>
			<th rowspan="2">Date</th>
			<th rowspan="2">Fiscal Period</th>
			<th colspan="3">Attendance Summary</th>
			<th rowspan="2">Total</th>
			</tr>
		<tr>
			<th>Work hrs.</th>
			<th>Sick hrs.</th>
			<th>Vacation hrs.</th>
		</tr>
		<tr>
			<td>04/26/1999</td>
			<td>1997/17 Qtr:2</td>
			<td>11.0</td>
			<td>0.0</td>
			<td>0.0</td>
			<td>11.0</td>
		</tr>
		<tr align="center" style="background:white; height:200px;">
			<td colspan="6" ><span style="color:red;">NO RECORDS FOUND.</span></td>
		</tr>
	</table>
</div>
<?php if ($this->input->get('ex') == ''){?>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%"><?php if($this->input->get('en') == 'Report'){echo 'Attendance Report'; }else{echo 'Attendance Detail';}?><br><i>Computer Generated - APBESys</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
<?php } ?>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>
</div>
</div>

