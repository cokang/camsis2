<?php
if ($this->input->get('ex') == 'excel'){
$filename ="PPM WARRANTY - ".date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<?php if ($this->input->get('ex') == ''){?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">PPM WARRANTY </div>
     <button onclick="javascript:myFunction('report_ppmw?m=<?=$month?>&y=<?=$year?>&none=closed');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>Schedule';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/report_ppmw?m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&stat=<?=$this->input->get('stat');?>&ex=excel&none=close" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
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
			<td colspan="5">PPM WARRANTY - <?php echo $this->session->userdata('usersessn');?></td>
		</tr>
	</table>
</div>
<div class="m-div">
<?php if ($this->input->get('ex') == ''){?>
	<div id="Instruction" style="background:white; margin-left:0px;">
		<table class="tbl-wo-3" align="left">
			<form method="post" action="">
			<tr>
				<td>Period - Month</td>
				<td>
					
						<select name="">
							<option selected value="all">1</option>
							<option  value="auw">2</option>
							<option  value="apw">3</option>
						</select>
				</td>
				<td>
					Year
				</td>
				<td>
						<select name="">
							<option selected value="all">2013</option>
							<option  value="auw">2014</option>
							<option  value="apw">2015</option>
						</select>
				</td>
				<td>
					<input type="submit" value="Generate" />
				</td>
			</tr>
		</table>
	</div>
	<?php } ?>
</form>
	<table class="tftable" border="1" style="text-align:center;">
		<tr>
			<th>No.</th>
			<th>Asset No.</th>
			<th>Asset Name</th>
			<th>Serial No.</th>
			<th>Make</th>
			<th>Model</th>
			<th>User Department</th>
			<th>User Location</th>
			<th>Tag No.</th>
			<th>Vendor</th>
			<th>T&C date</th>
			<th>Warranty end date</th>
			<th>Week PPM</th>
			<th>Month PPM</th>
		</tr>
		<tr>
			<td>1</td>
			<td>JLB-BEVEN05-0003</td>
			<td>Ventilators, Transport</td>
			<td>S 2149</td>
			<td>USA</td>
			<td>pNeutron S</td>
			<td>A&E</td>
			<td>02-G-58</td>
			<td>JLB150014</td>
			<td>Warisan Impressive 03-87660073</td>
			<td>24/07/2014</td>
			<td>23/07/2015</td>
			<td>2,28 </td>
			<td>1 </td>
		</tr>
	</table>
</div>
<?php if ($this->input->get('ex') == ''){?>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">T&C AV12 WO SUMMARY<br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
		<?php } ?>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>
</div>
</div>

