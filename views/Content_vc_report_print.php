<?php
if ($this->input->get('ex') == 'excel'){
$filename ="MONTHLY PROCUREMENT REPORT - ".date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<?php if ($this->input->get('ex') == ''){?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">Asset Listing Report</div>
    <button onclick="javascript:myFunction('pr_report?pr=vc&m=<?=$month?>&y=<?=$year?>&none=closed');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>report';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/Procurement/pr_report?pr=vc&m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&stat=<?=$this->input->get('stat');?>&ex=excel&none=close" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
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
			<td style="padding-left:10px; padding-bottom:10px;" colspan="5">MONTHLY PROCUREMENT REPORT - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?></td>
		</tr>
	</table>
<?php if ($this->input->get('ex') == ''){?>
	<div id="Instruction" class="tbl-none" style="background:white;">
	<table class="tbl-wo-3">
		<tr>
			<td>Filter record - </td>
			<td>Period - Month</td>
			<td>
				<select>
				  <option value="All">All</option>
				  <option value="12">12</option>
				</select>
			</td>
			<td>Year</td>
			<td>
				<select>
				  <option value="All">All</option>
				  <option value="2015">2015</option>
				</select>
			</td>
			<td><button type="submit"  onclick="window.history.back()">Generate</button></td>
			
		</tr>
	</table>
</div>
<?php } ?>	
</div>
	<div id="constrainer">
    <div class="scrolltable">
        <table class="header-mpr">
			<thead>
				<tr>
					<th>MIRN</th>
					<th>Date</th>
					<th>Item Code</th>
					<th>Item Name</th>
					<th>WO</th>
					<th>Asset</th>
					<th>Asset No.</th>
					<th>Tag No.</th>
					<th>Brand Name</th>
					<th>Model No.</th>
					<th>Start Date</th>
					<th>Root Cause 1</th>
					<th>Root Cause 2</th>
					<th>Root Cause 3</th>
					<th>Site Comment</th>
					<th>AM Date</th>
					<th>AM Comment</th>
					<th>AM Status</th>
					<th>Procurement<br/>Date</th>
					<th>Procurement<br/>Comment</th>
					<th>Procurement<br/>Status</th>
					<th>Logistic Comment</th>
					<th>Logistic Status</th>
					<th>Vendor</th>
					<th>Cost</th>
					<th>Qty</th>
				</tr>
			</thead>
		</table>
        <div class="bodytd asst">
            <table class="tbl-fixed-mpr">
				<tr style="font-weight:bold;">
					<td>MRIN/SJ/MKJ/00909/2016</td>
					<td>03/07/2016</td>
					<td>LAB-A03019</td>
					<td>Reagent Probe</td>
					<td>SM/MKJ/00252/2016</td>
					<td>Analyzers, Laboratory, Clinical Chemistry, Automated, Discrete</td>
					<td>BEANL10-0001</td>
					<td>MKJ00144</td>
					<td>Olympus</td>
					<td>Olympus AU400</td>
					<td>27/06/2016</td>
					<td>need reagent for PPM purpose</td>
					<td>1-reagent urgent for PPM job 2-reagent need buy by us- from the new POG 3-27 reagent need to change</td>
					<td>reagent needed</td>
					<td>27 REAGENT NEED TO CHANGE * list reagent & price as quotation attached UTAS MAJU SDN BHD RM 31270- BEFORE GST RM 33146.20- AFTER GST EX STOCK-FARHANA-SKP</td>
					<td>03/07/2016<br/>20:28:24</td>
					<td></td>
					<td>4</td>
					<td>18/07/2016<br/>11:52:47</td>
					<td>Proceed</td>
					<td>4</td>
					<td>Proceed</td>
					<td>4</td>

					<td>UTAS MAJU SDN BHD(17679)</td>
					<td>31270</td>
					<td>1</td>
				</tr>
            </table>
        </div>
    </div>
</div>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">MONTHLY PROCUREMENT REPORT - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?><br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>

<?php } ?>