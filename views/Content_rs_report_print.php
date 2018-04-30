<?php
if ($this->input->get('ex') == 'excel'){
$filename ="MONTHLY PROCUREMENT REPORT - ".date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<?php if ($this->input->get('ex') == ''){?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">MONTHLY PROCUREMENT REPORT</div>
    <button onclick="javascript:myFunction('pr_report?m=<?=$month?>&y=<?=$year?>&none=closed&whatr=<?=$this->input->get('whatr');?>&whatrx=<?=$this->input->get('whatrx');?>&pr=rs');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>report';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/Procurement/pr_report?m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&whatr=<?=$this->input->get('whatr');?>&whatrx=<?=$this->input->get('whatrx');?>&stat=<?=$this->input->get('stat');?>&ex=excel&none=close&pr=rs" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
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
<table class="tftable" border="1" style="text-align:center; width:70%; margin-bottom:10px;" align="center">
		
		<tr style="text-align:center;font-weight:bold;">
				<th>MIRN Generated</th>
				<th>Pending MIRN</th>
				<th>% Pending MIRN</th>
				<th>Rejected MIRN </th>
				<th>% Rejected MIRN </th>
				<th>Approved To PR</th>
				<th>% Approved To PR</th>
				<th>Release Note</th>
				<th>% Release Note</th>
			</tr>
			<tr style="text-align:center;">
				<td><a href="<?php echo base_url();?>index.php/Procurement/pr_report?pr=rs&m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&whatr=1">179</a></td>
				<td><a href="<?php echo base_url();?>index.php/Procurement/pr_report?pr=rs&m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&whatr=2">131</a></td>
				<td>73.1844</td>
				<td><a href="<?php echo base_url();?>index.php/Procurement/pr_report?pr=rs&m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&whatr=3">0</a></td>
				<td>0.0000</td>
				<td><a href="<?php echo base_url();?>index.php/Procurement/pr_report?pr=rs&m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&whatr=4">49</a></td>
				<td>27.3743</td>
				<td><a href="<?php echo base_url();?>index.php/Procurement/pr_report?pr=rs&m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&whatr=5">0</a></td>
				<td>0.0000</td>

			</tr>
	</table>
	<?php if($this->input->get('whatr') == 2){?>
	<table class="tftable" border="1" style="text-align:center; width:70%; margin-bottom:10px;" align="center">
			<tr style="text-align:center;font-weight:bold;">
				<th>Total Pending MRIN</th>
				<th>Pending AM</th>
				<th>% Pending AM</th>
				<th>Pending Procurement</th>
				<th>%Pending Procurement</th>
				<th>Pending Specialist</th>
				<th>% Pending Specialist</th>
				<th>Pending Logistic</th>
				<th>% Pending Logistic</th>
			</tr>
			<tr style="text-align:center;">
			<td>144</td>
			<td><a href="<?php echo base_url();?>index.php/Procurement/pr_report?pr=rs&m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&whatr=2&whatrx=1">19</a></td>
			<td>13.1944</td>
			<td><a href="<?php echo base_url();?>index.php/Procurement/pr_report?pr=rs&m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&whatr=2&whatrx=2">118</a></td>
			<td>81.9444</td>
			<td><a href="<?php echo base_url();?>index.php/Procurement/pr_report?pr=rs&m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&whatr=2&whatrx=3">6</a></td>
			<td>4.1667</td>
			<td><a href="<?php echo base_url();?>index.php/Procurement/pr_report?pr=rs&m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&whatr=2&whatrx=4">1</a></td>
			<td>0.6944</td>
			</tr>
	</table>
	<?php } if(($this->input->get('whatr') == 1) or ($this->input->get('whatr') == 2)){?>
	<div id="constrainer">
    <div class="scrolltable">
        <table class="header-alr">
			<thead>
				<tr>
					<th>No.</th>
					<th>MRIN No.</th>
					<th>MRIN Date</th>
					<th>ItemCode</th>
					<th>Item Name</th>
					<th>Qty</th>
					<th>WO No.</th>
					<th>Asset Name</th>
					<th>Asset No.</th>
					<th>Tag No.</th>
					<th>Brand</th>
					<th>Model No</th>
					<th>WO Date</th>
					<th>Root Cause(1)</th>
					<th>Root Cause(2)</th>
					<th>Root Cause(3)</th>
					<th>Site<br/>Comments</th>
					<th>AM Status</th>
					<th>AM<br/>Comments</th>
					<th>HQ<br/>Procurement<br/>Status</th>
					<th>HQ<br/>Procurement<br/>Comments</th>
					<th>Specialist</th>
					<th>Specialist<br/>Status</th>
					<th>Specialist<br/>Comments</th>
					<th>HQ Logistic<br/>Status</th>
					<th>HQ Logistic<br/>Comments</th>
				</tr>
			</thead>
		</table>
        <div class="bodytd asst">
            <table class="tbl-fixed-td">
              <tr >
				<td>1</td>
				<td>MRIN/SJ/MKJ/00909/2016&nbsp;</td>
				<td>03/07/2016&nbsp;</td>
				<td>LAB-A03019&nbsp;</td>
				<td>Reagent Probe&nbsp;</td>
				<td>27&nbsp;</td>
				<td>SM/MKJ/00252/2016&nbsp;</td>
				<td>Analyzers, Laboratory, Clinical Chemistry, Automated, Discrete&nbsp;</td>
				<td>BEANL10-0001&nbsp;</td>
				<td>MKJ00144&nbsp;</td>
				<td>Olympus&nbsp;</td>
				<td>Olympus AU400&nbsp;</td>
				<td>27/06/2016&nbsp;</td>
				<td>need reagent for PPM purpose&nbsp;</td>
				<td>1-reagent urgent for PPM job 2-reagent need buy by us- from the new POG 3-27 reagent need to change&nbsp;</td>
				<td>reagent needed&nbsp;</td>
				<td>27 REAGENT NEED TO CHANGE * list reagent & price as quotation attached UTAS MAJU SDN BHD RM 31270- BEFORE GST RM 33146.20- AFTER GST EX STOCK-FARHANA-SKP&nbsp;</td>
				<td>Approved&nbsp;</td>
				<td>&nbsp;</td>
				<td>Approved&nbsp;</td>
				<td>Proceed&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>Approved&nbsp;</td>
				<td>Proceed&nbsp;</td>
				</tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php } ?>
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