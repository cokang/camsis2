<?php
if ($this->input->get('ex') == 'excel'){
$filename ="PROGRESS WORK ORDER - ".date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<?php if ($this->input->get('ex') == ''){?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">PROGRESS WORK ORDER</div>
    <button onclick="javascript:myFunction('report_progress?pr=vc&m=<?=$month?>&y=<?=$year?>&none=closed');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>../contentcontroller/Procurement/BES?&tab=4';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/Procurement/report_progress?pr=vc&m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&stat=<?=$this->input->get('stat');?>&ex=excel&none=close" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
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
			<td style="padding-left:10px; padding-bottom:10px;" colspan="5">PROGRESS WORK ORDER - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?></td>
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
					<th style="min-width:30px;">NO</th>
					<th>SITE</th>
					<th>HOSP</th>
					<th>WORK ORDER DATE</th>
					<th>MONTH WORK ORDER</th>
					<th>REQUEST WORK ORDER NO</th>
					<th>CATEGORY(B-BIOMED, I-IMG)</th>
					<th>TYPE OF WORK ORDER (PPM/RCM)</th>
					<th>STATUS WORK ORDER (O - OPEN , C- CLOSED)</th>
					<th style="min-width:300px;">CATEGORY WORK ORDER <br />( MP - MRIN PENDING, PP- PO PENDING, IH - IN HOUSE,   RIW- REIMBURSMENT WORK, WR-WARRANTY, BER - BEYOND ECONOMIC REPAIR) </th>
					<th>PETTY CASH (Y/N)</th>
					<th>ASSET NO</th>
					<th>TAG NO</th>
					<th>EQPT NAME</th>
					<th>BRAND</th>
					<th>MODEL</th>
					<th>EQUIPMENT PRICE (RM)</th>
					<th>EQUIP TYPE (SPECIALIST GROUP)</th>
					<th>MRIN DATE RCVD</th>
					<th>MONTH MRIN</th>
					<th>MRIN NO</th>
					<th>PART DESCRIPTION</th>
					<th>PART NUMBER</th>
					<th>FMI CATEGORY GROUP</th>
					<th>JITI / JITV</th>
					<th>LS</th>
					<th>CC/CNC</th>
					<th>QTY</th>
					<th>PO DATE</th>
					<th>MONTH OF PO</th>
					<th>PO NO</th>
					<th>CATEGORY VENDOR (LOCAL/OVERSEAS)</th>
					<th>VENDOR</th>
					<th>AMOUNT (RM) </th>
					<th>GST (6%) (RM) </th>
					<th>PARTS (RM)/UNIT </th>
					<th>LABOUR (RM) </th>
					<th>CENTRAL STORE (RM) </th>
					<th>COST (RM)</th>
					<th>GST (6%) (RM) </th>
					<th>STATUS (C/P) </th>
					<th>RECEIPIENT </th>
					<th>DO</th>
					<th>DATE</th>
					<th>TAX INV / INV</th>
					<th>DATE</th>
					<th>O / C</th>
					<th>MONTH CLOSED</th>
					<th>PARTS (RM)/UNIT </th>
					<th>LABOUR (RM) </th>
					<th>CENTRAL STORE (RM) </th>
					<th>COST (RM)</th>
					<th>GST (6%) (RM) </th>
					<th>STATUS (C/P) </th>
					<th>RECEIPIENT </th>
					<th>DO</th>
					<th>DATE</th>
					<th>TAX INV / INV</th>
					<th>DATE</th>
					<th>O / C</th>
					<th>MONTH CLOSED</th>
					<th>PARTS (RM)/UNIT </th>
					<th>LABOUR (RM) </th>
					<th>CENTRAL STORE (RM) </th>
					<th>COST (RM)</th>
					<th>GST (6%) (RM) </th>
					<th>STATUS (C/P) </th>
					<th>RECEIPIENT </th>
					<th>DO</th>
					<th>DATE</th>
					<th>TAX INV / INV</th>
					<th>DATE</th>
					<th>O / C</th>
					<th>MONTH CLOSED</th>
					<th>PAYMENT DATE</th>

				</tr>
			</thead>
		</table>
        <div class="bodytd asst">
            <table class="tbl-fixed-mpr">
				<tr style="font-weight:bold;">
					<td style="min-width:30px;">1</td>
					<td>SITE</td>
					<td>KTG</td>
					<td>12/07/2016</td>
					<td>MONTH WORK ORDER</td>
					<td>KTG/AP/B00023/16</td>
					<td>CATEGORY(B-BIOMED, I-IMG)</td>
					<td>RCM</td>
					<td>A</td>
					<td style="min-width:300px;">CATEGORY WORK ORDER ( MP - MRIN PENDING, PP- PO PENDING, IH - IN HOUSE,   RIW- REIMBURSMENT WORK, WR-WARRANTY, BER - BEYOND ECONOMIC REPAIR) </td>
					<td>PETTY CASH (Y/N)</td>
					<td>BEECG03-0008</td>
					<td>KTG04612</td>
					<td>Electrocardiographs, Multichannel, Non-Interpretative</td>
					<td>WELCH ALLYN</td>
					<td>CP100</td>
					<td>6500</td>
					<td></td>
					<td>13/07/2016 17:30:50</td>
					<td>MONTH MRIN</td>
					<td>MRIN/SJ/KTG/00947/2016</td>
					<td>SSY Main PCB CP100/200 Pattern 10</td>
					<td>408515</td>
					<td></td>
					<td>JITI / JITV</td>
					<td>LS</td>
					<td>CC/CNC</td>
					<td>1</td>
					<td>21/07/2016</td>
					<td>MONTH OF PO</td>
					<td>PO/OPU-02/JHR/KTG/G2016/0343</td>
					<td>CATEGORY VENDOR (LOCAL/OVERSEAS)</td>
					<td>WELCH ALLYN MALAYSIA SDN BHD</td>
					<td>2556.46 </td>
					<td>GST (6%) (RM) </td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>C/O</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>C/O</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>C/O</td>
					<td></td>
					<td></td>
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
			<td width="50%">PROGRESS WORK ORDER - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?><br><i>Computer Generated - MYAPBESYS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>

<?php } ?>