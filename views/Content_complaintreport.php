<?php
if ($this->input->get('ex') == 'excel'){
$filename ="Complaint Level.xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<?php if ($this->input->get('ex') == ''){?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">
	Daily Patrolling Detail
	</div>
     <button onclick="javascript:myFunction('complaintreport?none=closed');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>Schedule';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/complaintreport?&ex=excel&none=close" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
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
			<td colspan="5">Daily Patrolling Detail by Month - <?php echo $this->session->userdata('usersessn');?></td>
		</tr>
	</table>
</form>
</div>
<div class="m-div">
	<table class="tftable" border="1" style="text-align:center;">
		<tr>
			<th>Month</th>
			<th>Total 2,006</th>
			<th>Percentage</th>
			<th>Rank</th>
		</tr>
		<tr>
			<td>January</td>
			<td style="background:#eee;">24 lowest</td>
			<td>6.2</td>
			<td>12</td>
		</tr>
		<tr>
			<td>February</td>
			<td>124</td>
			<td>6.2</td>
			<td>12</td>
		</tr>
		<tr>
			<td>March</td>
			<td>124</td>
			<td>6.2</td>
			<td>12</td>
		</tr>
		<tr>
			<td>April</td>
			<td>124</td>
			<td>6.2</td>
			<td>12</td>
		</tr>
		<tr>
			<td>May</td>
			<td>124</td>
			<td>6.2</td>
			<td>12</td>
		</tr>
		<tr>
			<td>June</td>
			<td>124</td>
			<td>6.2</td>
			<td>12</td>
		</tr>
		<tr>
			<td>July</td>
			<td>124</td>
			<td>6.2</td>
			<td>12</td>
		</tr>
		<tr>
			<td>August</td>
			<td style="background:#eee;">1249 Highest</td>
			<td>6.2</td>
			<td>12</td>
		</tr>
		<tr>
			<td>September</td>
			<td>124</td>
			<td>6.2</td>
			<td>12</td>
		</tr>
		<tr>
			<td>October</td>
			<td>124</td>
			<td>6.2</td>
			<td>12</td>
		</tr>
		<tr>
			<td>November</td>
			<td>124</td>
			<td>6.2</td>
			<td>12</td>
		</tr>
		<tr>
			<td>December</td>
			<td>124</td>
			<td>6.2</td>
			<td>12</td>
		</tr>
		<tr>
			<td colspan="4" class="tb-avg">
			Average Number of Complaints Reported per Month ............ 167.17<br />
			Average Number of Complaints Reported per Day ............ 5.50
			</td>
		</tr>
	</table>
	<style>
	.tb-avg{text-align:left;padding-left:10px;}
	</style>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">Complaint Level Compiled by Month<br><i>Computer Generated - APBESys</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
<?php } ?>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>
</div>
</div>

