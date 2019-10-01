<?php
if ($this->input->get('ex') == 'excel'){
$filename ="ASSET WARRANTY - ".date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<?php if ($this->input->get('ex') == ''){?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">ASSET WARRANTY</div>
     <button onclick="javascript:myFunction('report_wc?m=<?=$month?>&y=<?=$year?>&none=closed');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>Schedule';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/report_wc?m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&stat=<?=$this->input->get('stat');?>&ex=excel&none=close" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
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
			<td colspan="5">ASSET WARRANTY - 60 DAYS' NOTICE OF WARRANTY EXPIRY </td>
		</tr>
	</table>
	<div id="Instruction" style="background:white;">
		<table class="tbl-wo-3" align="left">
			<tr>
				<td>Asset Warranty</td>
			</tr>
		</table>
	</div>
	<?php if ($this->input->get('ex') == ''){?>
	<div id="Instruction" class="tbl-none" style="background:white;">
		<table class="tbl-wo-3">
			<form method="post" action="">
			<tr>
				<td>Select Month :</td>
				<td>
					
						<select name="">
							<option selected value="all">1</option>
							<option  value="auw">1</option>
							<option  value="apw">2</option>
						</select>
				</td>
				<td><input type="text" size="5"> </input></td>
				<td>
					<input type="submit" value="Apply" />
				</td>
			</tr>
			<tr>
				<td colspan="3" valign="top">
					<input type="radio" name="aw" value="before warranty">before warranty<br>
					<input type="radio" name="aw" value="end of warranty">end of warranty
				</td>
			</tr>
		</table>
	</div><?php } ?>
</form>
</div>
<div class="m-div">
	<table class="tbl-wo-3" align="left">
			<tr>
				<td colspan="5">04/01/2-04/30/2</td>
			</tr>
		</table>
	<table class="tftable" border="1" style="text-align:center;">
		<tr>
			<th colspan="17">Warranty End: April&nbsp;2</th></tr>
		<tr>
			<th rowspan="3">Hospital</th>
			<th rowspan="3">Asset No</th>
			<th rowspan="3">Tag No</th>
			<th rowspan="3">Asset Description</th>
			<th rowspan="3">Manufacturer</th>
			<th rowspan="3">Model</th>
			<th rowspan="3">Serial No</th>
			<th rowspan="3">Warranty End Date</th>
			<th rowspan="3">User Department Name</th>
			<th rowspan="3">Agent</th>
			<th rowspan="3">Purchase Cost</th>
			<th colspan="4">Total WO</th>
			<th rowspan="2" colspan="2">Total Downtime (Days)</th>
			</tr>
		<tr>
			<th colspan="2">PPM</th>
			<th colspan="2">Breakdown</th>
		</tr>
		<tr>
			<th>Open</th>
			<th>Closed</th>
			<th>Open</th>
			<th>Closed</th>
			<th>PPM</th>
			<th>Breakdown</th>
		</tr>
		<?php  if (!empty($record)) {?>
				<?php $numrow = 1; foreach($record as $row):?>
		<tr>
			<td><?= ($row->V_Hospitalcode) ? $row->V_Hospitalcode : 'N/A' ?></td>
			<td><?= ($row->V_Asset_no) ? $row->V_Asset_no : 'N/A' ?></td>
			<td><?= ($row->V_Tag_no) ? $row->V_Tag_no : 'N/A' ?></td>
			<td><?= ($row->V_Asset_name) ? $row->V_Asset_name : 'N/A' ?></td>
			<td><?= ($row->V_Manufacturer) ? $row->V_Manufacturer : 'N/A' ?></td>
			<td><?= ($row->V_Model_no) ? $row->V_Model_no : 'N/A' ?></td>
			<td><?= ($row->V_Serial_no) ? $row->V_Serial_no : 'N/A' ?></td>
			<td><?= ($row->V_Wrn_end_code) ? $row->V_Wrn_end_code : 'N/A' ?></td>
			<td><?= ($row->V_User_Dept_code) ? $row->V_User_Dept_code : 'N/A' ?></td>
			<td><?= ($row->vendor_name) ? $row->vendor_name : 'N/A' ?></td>
			<td><?= ($row->N_Cost) ? $row->N_Cost : 'N/A' ?></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<?php $numrow++; ?>
			    		<?php endforeach;?>
			    		<?php }else { ?>
						<tr align="center" style="background:white; height:200px;">
	    					<td colspan="17"><span style="color:red;">NO RECORDS FOUND.</span></td>
	    				</tr>
						<?php } ?>
	</table>
</div>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">ASSET WARRANTY<br><i>Computer Generated - APBESys</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>
<?php } ?>
