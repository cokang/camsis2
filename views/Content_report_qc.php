<?php
if ($this->input->get('ex') == 'excel'){
$filename ="Quality Check - ".date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<?php if ($this->input->get('ex') == ''){?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">Quality Check</div>
    <button onclick="javascript:myFunction('report_qc?m=<?=$month?>&y=<?=$year?>&none=closed');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>Schedule';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/report_qc?m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&stat=<?=$this->input->get('stat');?>&ex=excel&none=close" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
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
			<td style="padding-left:10px; padding-bottom:10px;" colspan="5">ASSET REGISTER SUMMARY ALL HOSPITAL - <?php echo $this->session->userdata('usersessn');?></td>
		</tr>
	</table>
	<div id="Instruction" style="background:white; display:inline-block;">
		<table class="tbl-wo-3" align="left" border="0">
			<tr>
				<td style="padding-left:10px;" colspan="5">WO Outstanding more then 15 Days </td>
			</tr>
		</table>
	</div>
</div>
	<style>
	.header-alr tr .tdqc:nth-child(2) ,.tbl-fixed-td .tdqc:nth-child(2),
	.header-alr tr .tdqc:nth-child(3) ,.tbl-fixed-td .tdqc:nth-child(3),
	.header-alr tr .tdqc:nth-child(5) ,.tbl-fixed-td .tdqc:nth-child(5),
	.header-alr tr .tdqc:nth-child(6) ,.tbl-fixed-td .tdqc:nth-child(6),
	.header-alr tr .tdqc:nth-child(7) ,.tbl-fixed-td .tdqc:nth-child(7),
	.header-alr tr .tdqc:nth-child(9) ,.tbl-fixed-td .tdqc:nth-child(9),
	.header-alr tr .tdqc:nth-child(10) ,.tbl-fixed-td .tdqc:nth-child(10),
	.header-alr tr .tdqc:nth-child(24) ,.tbl-fixed-td .tdqc:nth-child(24){min-width: 30px;}
	.header-alr tr .tdqc:nth-child(16) ,.tbl-fixed-td .tdqc:nth-child(16),
	.header-alr tr .tdqc:nth-child(25) ,.tbl-fixed-td .tdqc:nth-child(25),
	.header-alr tr .tdqc:nth-child(26) ,.tbl-fixed-td .tdqc:nth-child(26),
	.header-alr tr .tdqc:nth-child(28) ,.tbl-fixed-td .tdqc:nth-child(28),
	.header-alr tr .tdqc:nth-child(33) ,.tbl-fixed-td .tdqc:nth-child(33),
	.header-alr tr .tdqc:nth-child(34) ,.tbl-fixed-td .tdqc:nth-child(34),
	.header-alr tr .tdqc:nth-child(35) ,.tbl-fixed-td .tdqc:nth-child(35){min-width: 50px;}
	
	.header-alr tr .tdqc:nth-child(19) ,.tbl-fixed-td .tdqc:nth-child(19),
	.header-alr tr .tdqc:nth-child(36) ,.tbl-fixed-td .tdqc:nth-child(36),
	.header-alr tr .tdqc:nth-child(37) ,.tbl-fixed-td .tdqc:nth-child(37),
	.header-alr tr .tdqc:nth-child(38) ,.tbl-fixed-td .tdqc:nth-child(38),
	.header-alr tr .tdqc:nth-child(29) ,.tbl-fixed-td .tdqc:nth-child(29){min-width: 70px;}
	.header-alr tr .tdqc:nth-child(22) ,.tbl-fixed-td .tdqc:nth-child(22),
	.header-alr tr .tdqc:nth-child(23) ,.tbl-fixed-td .tdqc:nth-child(23),
	.header-alr tr .tdqc:nth-child(20) ,.tbl-fixed-td .tdqc:nth-child(20){min-width: 80px;}
	
	.header-alr tr .tdqc:nth-child(18) ,.tbl-fixed-td .tdqc:nth-child(18),
	.header-alr tr .tdqc:nth-child(21) ,.tbl-fixed-td .tdqc:nth-child(21){min-width: 90px;}
	.header-alr tr .tdqc:nth-child(4) ,.tbl-fixed-td .tdqc:nth-child(4),
	.header-alr tr .tdqc:nth-child(17) ,.tbl-fixed-td .tdqc:nth-child(17),
	.header-alr tr .tdqc:nth-child(12) ,.tbl-fixed-td .tdqc:nth-child(12){min-width: 105px;}
	
	</style>
	<div id="constrainer">
    <div class="scrolltable">
        <table class="header-alr">
			<thead>
				<tr>
					<th>No.</th>
					<th class="tdqc">Agg</th>
					<th class="tdqc">H Code</th>
					<th class="tdqc">Work Order</th>
					<th class="tdqc">R Type</th>
					<th class="tdqc">R Sttus</th>
					<th class="tdqc">Dura</th>
					<th class="tdqc">Request Date</th>
					<th class="tdqc">Year</th>
					<th class="tdqc">Mon</th>
					<th class="tdqc">Time</th>
					<th class="tdqc">Summary</th>
					<th class="tdqc">Respond Date</th>
					<th class="tdqc">Respond Time</th>
					<th class="tdqc">Requestor</th>
					<th class="tdqc">Desig</th>
					<th class="tdqc">Phone no.</th>
					<th class="tdqc">Asset no.</th>
					<th class="tdqc">E Code</th>
					<th class="tdqc">E Desc.</th>
					<th class="tdqc">Asset Status</th>
					<th class="tdqc">Variation Status</th>
					<th class="tdqc">Asset Condition</th>
					<th class="tdqc">Age (Y)</th>
					<th class="tdqc">Cost</th>
					<th class="tdqc">Clist Code</th>
					<th class="tdqc">Dprt Code</th>
					<th class="tdqc">Location Code</th>
					<th class="tdqc">R Date</th>
					<th class="tdqc">C Date</th>
					<th class="tdqc">Make</th>
					<th class="tdqc">Manu</th>
					<th class="tdqc">Model</th>
					<th class="tdqc">Serial No.</th>
					<th class="tdqc">Brand</th>
					<th class="tdqc">Warranty End Date</th>
					<th class="tdqc">Vendor Code</th>
					<th class="tdqc">Closed Date</th>
				</tr>
			</thead>
		</table>
        <div class="bodytd asst1">
            <table class="tbl-fixed-td"><?php  
		//$formatter = new NumberFormatter('en_US', NumberFormatter::PERCENT);
		//print $formatter->format(.45);
		if (!empty($record)) {?>
				<?php $numrow = 1; foreach($record as $row):?>
		<tr>
			<td><?= $numrow ?></td>
			<td class="tdqc"><?= ($row->V_Hospitalcode) ? $row->V_Hospitalcode : 'NA' ?></td>
			<td class="tdqc"><?= ($row->Ageing) ? $row->Ageing : 'NA' ?></td>
			<td class="tdqc"><?= ($row->V_Request_no) ? $row->V_Request_no : 'NA' ?></td>
			<td class="tdqc"><?= ($row->V_request_type) ? $row->V_request_type : 'NA' ?></td>
			<td class="tdqc"><?= ($row->V_request_status) ? $row->V_request_status : 'NA' ?></td>
			<td class="tdqc"><?= ($row->Duration) ? $row->Duration : 'NA' ?></td>
			<td class="tdqc"><?= ($row->Requestdate) ? ($row->Requestdate != '0000-00-00 00:00:00' ? date("d/m/Y",strtotime($row->Requestdate)) : '-' ) : 'N/A' ?></td>
			<td class="tdqc"><?= ($row->Year) ? $row->Year : 'NA' ?></td>
			<td class="tdqc"><?= ($row->Month) ? $row->Month : 'NA' ?></td>
			<td class="tdqc"><?= ($row->D_time) ? ($row->D_time != '2015-01-' ? date("H:i",strtotime($row->D_time)) : '-' ) : 'N/A' ?></td>
			<td class="tdqc"><?= ($row->V_summary) ? $row->V_summary : 'NA' ?></td>
			<td class="tdqc"><?= ($row->Respondate) ? $row->Respondate : 'NA' ?></td>
			<td class="tdqc"><?= ($row->v_respontime) ? $row->v_respontime : 'NA' ?></td>
			<td class="tdqc"><?= ($row->V_requestor) ? $row->V_requestor : 'NA' ?></td>
			<td class="tdqc"><?= ($row->V_MohDesg) ? $row->V_MohDesg : 'NA' ?></td>
			<td class="tdqc"><?= ($row->V_phone_no) ? $row->V_phone_no : 'NA' ?></td>
			<td class="tdqc"><?= ($row->asset_no) ? $row->asset_no : 'NA' ?></td>
			<td class="tdqc"><?= ($row->Asset_Type) ? $row->Asset_Type : 'NA' ?></td>
			<td class="tdqc"><?= ($row->Type_Desc) ? $row->Type_Desc : 'NA' ?></td>
			<td class="tdqc"><?= ($row->v_AssetStatus) ? $row->v_AssetStatus : 'NA' ?></td>
			<td class="tdqc"><?= ($row->v_AssetVStatus) ? $row->v_AssetVStatus : 'NA' ?></td>
			<td class="tdqc"><?= ($row->v_AssetCondition) ? $row->v_AssetCondition : 'NA' ?></td>
			<td class="tdqc"><?= ($row->Age) ? $row->Age : 'NA' ?></td>
			<td class="tdqc"><?= ($row->N_Cost) ? $row->N_Cost : 'NA' ?></td>
			<td class="tdqc"><?= ($row->v_ChecklistCode) ? $row->v_ChecklistCode : 'NA' ?></td>
			<td class="tdqc"><?= ($row->V_User_Dept_code) ? $row->V_User_Dept_code : 'NA' ?></td>
			<td class="tdqc"><?= ($row->V_Location_code) ? $row->V_Location_code : 'NA' ?></td>
			<td class="tdqc"><?= ($row->RegisterDate) ? ($row->RegisterDate != '0000-00-00 00:00:00' ? date("d/m/Y",strtotime($row->RegisterDate)) : '-' ) : 'N/A' ?></td>
			<td class="tdqc"><?= ($row->CommissionDate) ? ($row->CommissionDate != '0000-00-00 00:00:00' ? date("d/m/Y",strtotime($row->CommissionDate)) : '-' ) : 'N/A' ?></td>
			<td class="tdqc"><?= ($row->V_Make) ? $row->V_Make : 'NA' ?></td>
			<td class="tdqc"><?= ($row->V_Manufacturer) ? $row->V_Manufacturer : 'NA' ?></td>
			<td class="tdqc"><?= ($row->V_Model_no) ? $row->V_Model_no : 'NA' ?></td>
			<td class="tdqc"><?= ($row->V_Serial_no) ? $row->V_Serial_no : 'NA' ?></td>
			<td class="tdqc"><?= ($row->V_Brandname) ? $row->V_Brandname : 'NA' ?></td>
			<td class="tdqc"><?= ($row->WarrantyEndDate) ? ($row->WarrantyEndDate != '0000-00-00 00:00:00' ? date("d/m/Y",strtotime($row->WarrantyEndDate)) : '-' ) : 'N/A' ?></td>
			<td class="tdqc"><?= ($row->V_Vendor_code) ? $row->V_Vendor_code : 'NA' ?></td>
			<td class="tdqc"><?= ($row->v_closeddate) ? ($row->v_closeddate != '0000-00-00 00:00:00' ? date("d/m/Y",strtotime($row->v_closeddate)) : '-' ) : 'N/A' ?></td>
		</tr>
		<?php $numrow++; ?>
			    		<?php endforeach;?>
			    		<?php }else { ?>
						
						<tr align="center" style="background:white; height:200px;">
	    					<td colspan="8"><span style="color:red;">NO RECORDS FOUND.</span></td>
	    				</tr>
						<?php } ?>
		
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">ASSET REGISTER SUMMARY<br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
<?php } ?>